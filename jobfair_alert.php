<?php
/**
 * 
 * @copyright     Copyright 20011-2012, BigSpire Software (P) Ltd
 * @author        KUMARESAN G
 * @created       04-Jun-2013
 * @link          http://jobsfactory.in
 */
include('config/dbconfig.php');
$link_url = '/var/www/html/';
include('config/smarty.config.php');
include('classes/class.mysql.php');  
include('classes/class.function.php'); 
include('classes/class.com_function.php'); 
include('classes/content.php'); 
define('amz_token','AKIAJ5SXI34L574BLW6Q');
define('amz_signature','e6a7lvHV8k4gNp0f/g8iPKytPOjoJZ+QWowJShbI');
define('amz_from_email','info@jobsfactory.in'); 
include('classes/class.mailer.php');

set_time_limit(0);
	
try {
	/*Note: The following code is used for to send reminder about job fair to registered users*/
	// -- Start --
	
	// get job fair details
	$query = "CALL fr_get_jobfair_popup('".date('Y-m-d')."','')";
	try{
		if(!$result = $mysql_obj->query($query)){
			throw new Exception('Problem in executing get job fair details');
		}
		$obj = $mysql_obj->fetch_assoc($result);
		$jobfair_date = $obj['jobfair_date'];
	}catch(Exception $e){
			echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
	
	// check job fair exists
	if($obj['id'] != ''){
		// get job fair reminder details
		$query = "CALL fr_get_jobfair_reminder('".$obj['id']."')";
		try{
			// calling mysql exe query function
			if(!$result = $mysql_obj->query($query)){
				throw new Exception('Problem in executing get reminders details');
			}
			// $no_of_reminder = $result->num_rows;
			while($row = $mysql_obj->fetch_assoc($result)){
				$reminder[] = $row;
			}
		}catch(Exception $e){
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}	
		
		$sent_mail_list .='<b>The name of the jobseekers who received the email</b>';
		$sent_mail_list .='<ol>';
		$sent_sms_list .='<b>The name of the jobseekers who received the sms</b>';
		$sent_sms_list .='<ol>';
		// iterate the reminders
		foreach($reminder as $remind){ 
			// run only on three days
			$company_query = "call fr_tn_registerd_jobseeker('".$obj['state_id']."')";
			if(!$execute_company_query = $mysql_obj->query($company_query)){
				throw new Exception('Problem in executing the main query');
			}
			// if reminder has set
			if(($remind['reminder_date'] != '') && (strtotime(date('Y-m-d H:i:s')) > strtotime($remind['reminder_date']))){
				// if job seeker exists
				if($execute_company_query->num_rows){					
					while($company_res = $mysql_obj->fetch_assoc($execute_company_query)){
						if($company_res['email_id'] == 'nikita@bigspire.com'){	 		
							// get job fair reg. no		
							if(!empty($company_res['qualification_id'])){
								$program_id = $company_res['qualification_id'];
							}else if($company_res['program_details_id']){
								$program_id = $company_res['program_details_id'];
							}else if($company_res['hsc_school_name']){
								$program_id = '7';
							}else if($company_res['school_name']){
								$program_id = '6';
							}
							// get job fair code
							$reg_code = $fn->get_fair_code($program_id).'-'.($company_res['id'] + 1000);	
							$date_format = date('d', strtotime($jobfair_date)).date('S', strtotime($jobfair_date)).date(' M', strtotime($jobfair_date)).date(' Y', strtotime($jobfair_date));		 												 
							// check reminder already sent for the job seeker
							// get job fair reminder sent details
							$reminder_type = $remind['type'] == 'B' ? 'M' : $remind['type'];

							$query = "CALL fr_check_reminder_send('".$company_res['id']."','".$reminder_type."',
										'".$obj['id']."','".$remind['reminder_date']."','".$remind['id']."')";
										
							try{
								if(!$result = $mysql_obj->query($query)){
									throw new Exception('Problem in getting sent reminder details');
								}
								$obj_mail = $mysql_obj->fetch_assoc($result);
							}catch(Exception $e){
								echo 'Caught exception: ',  $e->getMessage(), "\n";
							}
							if($obj_mail['total'] == '0'){ 
								// check the reminder type
								if($reminder_type == 'M'){
									$ses = new SimpleEmailService(amz_token, amz_signature);
									$ses->enableVerifyPeer(false);
									$mailer = new SimpleEmailServiceMessage();
									$mailer->setFrom(email_address);
									// send job fair mail 						
									$jobfair_content = $content->content_jobfair(ucwords(trim(stripslashes($company_res['full_name']))),$reg_code,$obj,$date_format,
									$obj['fee']);
									$subject = 'Welcome to '.$obj['title'];
									// send mail to the user
									$mail_res = $fn->send_mail($ses,$mailer,amz_from_email,$company_res['email_id'],'Jobsfactory - '.$subject, $jobfair_content, NULL);								
									if(trim($mail_res['MessageId']) != ''){
										$sent_mail_list .='<li>'.$company_res['email_id'].' - '.$company_res['full_name'].'</li>';														
										// save reminder users table
										if(!$update_remainder = $mysql_obj->query("call fr_save_reminder_sent('M','".$company_res['id']."','".$obj['id']."','".date('Y-m-d H:i:s')."','".$remind['id']."')")){
											throw new exception('Error update email remainder details');
										}
									}
								}
							}
							// check reminder already sent for the jobseeker
							// get job fair reminder sent details
							$reminder_type = $remind['type'] == 'B' ? 'S' : $remind['type'];
							
							$query = "CALL fr_check_reminder_send('".$company_res['id']."','".$reminder_type."',
										'".$obj['id']."','".$remind['reminder_date']."','".$remind['id']."')";
							try{
								if(!$result = $mysql_obj->query($query)){
									throw new Exception('Problem in getting sent reminder details');
								}
								$obj_sms = $mysql_obj->fetch_assoc($result);
							}catch(Exception $e){
								echo 'Caught exception: ',  $e->getMessage(), "\n";
							}
							if($obj_sms['total'] == '0'){
								// check the reminder type to send 
								if($reminder_type == 'S'){
									$loc = $obj['location'];
									$message = 'JOB FAIR – '.$obj['title'].' registration no. is '.$reg_code." Pls show this no. to participate in the job fair on ".$date_format." at ".$loc." More details go to www.jobsfactory.IN";
									$sms_result = $cfn->send_sms($company_res['mobile_no1'],$message);
									$sent_sms_list .='<li>'.$company_res['mobile_no1'].' - '.$company_res['full_name'].'</li>';
									// save reminder users table
									if(!$update_remainder = $mysql_obj->query("call fr_save_reminder_sent('S','".$company_res['id']."','".$obj['id']."','".date('Y-m-d H:i:s')."','".$remind['id']."')")){
										throw new exception('Error update sms remainder details');
									}
								}
							 }
						}
					}
					$sent_mail_list .='</ol>';
					$sent_sms_list .='</ol>';
				}
				unset($remind);
			}
			
		}
			// print mail alert				
			if(!$sent_mail_list){
				echo "<br><b>No mail alerts sent</b>";
			}else{
				echo $sent_mail_list;
			}
			
			// print sms alert	
			if(!$sent_sms_list){
				echo "<br><b>No sms alerts sent</b>";
			}else{
				echo $sent_sms_list;
			}			
	}
}catch (Exception  $e) { // catch the exception thrown
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}
?>