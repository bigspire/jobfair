<?php
/**
 * @copyright     Copyright 2011-2012, BigSpire Software (P) Ltd
 */
ob_start();
session_start();
// include(employer_file_path.'classes/class.mailer.php');
// include('classes/content.php'); 

//$message = "Your job fair registration no. is A-83828. Pls show this no. to participate in the job fair on 7th Feb'16 at Chennai. More details go to jobsfactory.IN";
//$sms_result = $cfn->send_sms('9003033020',$message);	 

	/* get the referred detail by ajax */
	if($_POST['action'] == 'refer_details' && $_POST['referral_code'] != ''){
		try {
			if(!$get_referral_query = $mysql_obj->query("call fr_get_refer_details('".$_POST['referral_code']."')")){
				throw new Exception('Problem in executing get referral details');
			}
			if($get_referral_query->num_rows) {
				if($get_referral_query_res = $mysql_obj->fetch_array($get_referral_query)){
					echo $get_referral_query_res['refer_type'].'~'.$get_referral_query_res['refer_to'];
				}
			}
			else {
				echo 'wrong';
			}
			die;
		}
		// catch the exception thrown
		catch (Exception  $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
	}	
	
	
	// when the page loads in the first time
	if(strstr($_SERVER['HTTP_REFERER'], 'registration')){ 
		//$smarty->assign('clear_photo', 1);		
		//session_destroy();
	}

    //Note: hide Thanks for uploading your photo message
	if($_POST['hide_msg_photo'] == 'dismiss'){
		$_POST['msg_photo'] = '1';
		die;
	}
	//Note: hide user preview photo
	if($_POST['remove_photo'] == 'remove_photo'){
	    unset($_POST['msg_photo']);
		unset($_POST['photo_path']);
		unset($_POST['photo']);
		unset($_POST['photo_ext']);
		unset($_POST['photo_name']);
		die;
	}
	
	if($_POST['id'] != ''){
		header('location:'.$url.$language_url.'profile/');
	}
	
	$lang = $fn->set_language($language_name);
	// language file 

	$reg_obj = new factory($lang.'_registration');
	$smarty->assign('reg_lang', $reg_obj);
	
	//object for call the errors
	$error_obj = new factory($lang.'_registration');

	$menu_obj = new factory($lang.'_menu');
	$smarty->assign('menu_lang', $menu_obj);

	$foot_obj = new factory($lang.'_footer');
	$smarty->assign('footer_lang', $foot_obj);
	
	$smarty->assign('job_seeker_selected','selected');
	$smarty->assign('field_error_disp','display:none;');
	$smarty->assign('mail_available','display:none;');
	// create page title object to assign page titles	
	$title_obj = new page_title($lang. '_title');	
	$smarty->assign('PAGE_TITLE', $title_obj->JText_('PAGE_TITLE_REG_STEP1'));
	
try {
	/* get all the states 
	if(!$list_states_query = $mysql_obj->query("call get_states()")){
		throw new Exception('Problem in executing list states');
	}
	while($states[] = $mysql_obj->fetch_array($list_states_query)){
		$smarty->assign('list_states',$states);
	}	
	*/
	/* get all the reference details 
	if(!$list_refer_query = $mysql_obj->query("call get_reference()")){
		throw new Exception('Problem in executing list references');
	}
	while($reference[] = $mysql_obj->fetch_array($list_refer_query)){
		$smarty->assign('list_reference',$reference);
	}	
	*/
		
	/* get all the industry 
	if(!$list_industry_query = $mysql_obj->query("call get_industry_details('',0,0)")){
		throw new Exception('Problem in executing list industry');
	}
	while($industry[] = $mysql_obj->fetch_array($list_industry_query)){
		$smarty->assign('list_industry',$industry);
	}
	*/
	/* get all id card details 
	if(!$list_idcards_query = $mysql_obj->query("call get_id_cards()")){
		throw new Exception('Problem in executing list id cards');
	}
	while($idcards[] = $mysql_obj->fetch_array($list_idcards_query)){
		$smarty->assign('list_idcards',$idcards);
	}
*/
			// if the js disabled, load the district after the form posted

			if($_POST['cstate'] > 0) {
				//$_POST['cstate'] = $_POST['cstate'] == '' ? $_POST['cstate'] : $_POST['cstate'];
			/* get all the districts  */
				if(!$list_cdistricts_query = $mysql_obj->query("call get_districts('".$_POST['cstate']."')")){
					throw new Exception('Problem in executing list cdistricts');
				}

				while($cdistricts[] = $mysql_obj->fetch_array($list_cdistricts_query)){
					$smarty->assign('list_cdistricts',$cdistricts);
				}
			  		
			}

			// if the js disabled, load the district after the form posted

			if($_POST['pstate'] > 0 || $_POST['pstate'] > 0) {
				$_POST['pstate'] = $_POST['pstate'] == '' ? $_POST['pstate'] : $_POST['pstate'];
			/* get all the districts  */
				if(!$list_pdistricts_query = $mysql_obj->query("call get_districts('".$_POST['pstate']."')")){
					throw new Exception('Problem in executing list pdistricts');
				}

				while($pdistricts[] = $mysql_obj->fetch_array($list_pdistricts_query)){
					$smarty->assign('list_pdistricts',$pdistricts);
				}
					
			}
			
}
// catch the exception thrown
catch (Exception  $e) {
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}


if($_POST['cur_action'] == 'registration'){ 

		// iterate the form elements
		foreach($_POST as $key => $value) {	
			
				if(!empty($value)){
					if(is_string($value)){
						$_POST[$key] = stripslashes($value);
					}
				}
		}
		
		
   		//validate fields
		$validation=array(1,1,1,1,1,1,1,1,1,1);
		
		$validationtype=array('text','number','select','select','select','select','text','email','text','text',);
		
		$field=array('full_name','mobile1','cstate','cdistrict','after_school','exp_year','skill_sets','email_address','password','cpassword');
		
		$error_msg = array($error_obj->JText_Return('ERR_FULL_NAME'),$error_obj->JText_Return('ERR_MOBILE_NO'),
		$error_obj->JText_Return('ERR_STATE'),$error_obj->JText_Return('ERR_DISTRICT'),
		$error_obj->JText_Return('ERR_QUALIFICATION'),$error_obj->JText_Return('ERR_TOTAL_EXP'),
		$error_obj->JText_Return('ERR_SKILL_SETS'),$error_obj->JText_Return('ERR_EMAIL'),
		$error_obj->JText_Return('ERR_PASSWORD'),$error_obj->JText_Return('ERR_CONFIRM_PASSWORD'));			
		$fn_valid->general_alert_error = $error_obj->JText_Return('ERR_PLEASE_ENTER');
		
		$fn_valid->general_alert_error1 = '';
		
		$fn_form=$fn_valid->validate_form($_POST,$validation,$validationtype,$field,$error_msg);

	// email alreay exist validation	
	if($_POST['email_address'] != '') {
		$email_exist = 1;
		$catch_error = '';
		try {
			if(!$check_email_query = $mysql_obj->query("call check_email_exists('".$_POST['email_address']."',0)")){
				throw new Exception('Problem in executing check email existing');
			}
			if($check_email_query->num_rows) {
				if($exist_email = $mysql_obj->fetch_array($check_email_query)){
					if($exist_email['id'] != '') {
						$email_exist = 0;
						$errormsg_email_exists = $error_obj->JText_Return('ERR_EMAIL_ALREADY_REGISTERED');
						$smarty->assign('email_exists',$errormsg_email_exists);					
						$smarty->assign('email_exists_class',' message');					
					}
					else {
						$smarty->assign('mail_available','');
					}
				}
			}
		}
		// catch the exception thrown
		catch (Exception  $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";
			$catch_error = $e->getMessage();
		}
	}
	
	
	// mobile alreay exist validation	
	if($_POST['mobile1'] != '') {
		$mobile_exist = 1;
		$catch_error = '';
		try {
			if(!$check_mobile_qry = $mysql_obj->query("call fr_check_mobile_exists('".$_POST['mobile1']."',0)")){
				throw new Exception('Problem in executing check mobile1 existing');
			}
			if($check_mobile_qry->num_rows) {
				if($exist_mobile = $mysql_obj->fetch_array($check_mobile_qry)){
					if($exist_mobile['id'] != '') {
						$mobile_exist = 0;
						$errormsg_mobile_exists = $error_obj->JText_Return('ERR_MOBILE_ALREADY_REGISTERED');
						$smarty->assign('mobile_exists',$errormsg_mobile_exists);					
						$smarty->assign('mobile_exists_class',' message');					
					}
					else {
						$smarty->assign('mobile_available','');
					}
				}
			}
		}
		// catch the exception thrown
		catch (Exception  $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";
			$catch_error = $e->getMessage();
		}
	}
	
	// validate industry
	if($_POST['exp_year'] > 0 && empty($_POST['industry_user'])) {
		$catch_error = 'industry error';
		$validate_industry = $error_obj->JText_Return('ERR_INDUSTRY');
		$smarty->assign('indus_error',$validate_industry);					
		$smarty->assign('indus_error_class',' message');
		$smarty->assign('field_error_disp','');		
	}
	
   if($fn_form == 1) {   
	// password mismatch validation
		$password_valid = 1;
		$password = $_POST['password'];
		$cpassword = $_POST['cpassword'];

		//validation for the password
		if($password && $cpassword){ 
			if($password != $cpassword){
				$password_mismatch= $error_obj->JText_Return('ERR_PASSWORD_MISMATCH');
				$password_valid = 0;
				$smarty->assign('password_mismatch',$password_mismatch);					
				$smarty->assign('password_mismatch_class',' message');			
			}
		}
   }
   else{
		// hide error message when we switch language
		if($_POST['hdnSwitch'] != 1){
			$smarty->assign('error',$fn_form);		
		}
   }
  
				

   //if the validation success redirect to next page
   if($fn_form == 1 && $password_valid == 1 && $email_exist == 1 && $mobile_exist == 1) { 
		if ($catch_error == '' ) {
			try {
				$current_date = $fn->print_date();				
				$exp_month = $_POST['exp_month'] > 0 ? $_POST['exp_month'] / 10 : '';
				$total_exp = $_POST['exp_year'] + $exp_month ;
				$is_fresher = $total_exp > 0 ? '0' : '1';
				$is_grad = $_POST['after_school'][0] == '6' || $_POST['after_school'][0] == '7'  ? '0' : '1';
				$refer_friends = $_GET['refer_friends']!='' ? '?refer_friends='.$_GET['refer_friends'] : '';
				$register_qry = "call fr_save_jobseeker_registration('".$mysql->real_escape_string($_POST['full_name'])."',
				'".$mysql->real_escape_string(strtolower($_POST['email_address']))."','".md5($_POST['password'])."','".$mysql->real_escape_string($_POST['cdistrict'])."',				
				'".$mysql->real_escape_string($_POST['mobile1'])."','0','".$mysql->real_escape_string($current_date)."',
				'".$mysql->real_escape_string($total_exp)."','".$mysql->real_escape_string($_POST['cstate'])."',
				'".$mysql->real_escape_string($_POST['skill_sets'])."','".$mysql->real_escape_string($is_fresher)."',
				'".$mysql->real_escape_string($is_grad)."','".$mysql->real_escape_string($_POST['industry_user'])."',
				'".$mysql->real_escape_string($_POST['after_school'][0])."','".$mysql->real_escape_string($_POST['reference'])."',
				'".$mysql->real_escape_string($_POST['refer_others'])."')";
				$insert = $mysql_obj->query($register_qry);
				if(!$insert) {
					throw new exception('Error inserting jobseeker details');
				}
				
				if($last_id = $mysql_obj->fetch_array($insert)) {
					$last_insert_id = $last_id['insert_id'];
					//Note: update referral code
					if(intval($last_insert_id) > 0 && intval($_POST['referral_code']) > 0) {
							if(!$update_referral_code_qry = $mysql_obj->query("call fr_update_referral_code('$last_insert_id','".$mysql->real_escape_string($_POST['referral_code'])."');")){
								throw new Exception('Problem in executing save refer details');
							}
					}
				}
				
				// insert graduation details
				if($_POST['after_school'][0] != '6' && $_POST['after_school'][0] != '7'){
						try {
						if(!$insert_graduation = $mysql_obj->query("call fr_save_graduation_details(
						'".$mysql->real_escape_string($last_insert_id)."',
						'".$mysql->real_escape_string($_POST['degree'][0])."',
						'".$mysql->real_escape_string($_POST['departments'][0])."')")){
								throw new Exception('Problem in executing insert graduation');
							}
						}
						catch(Exception $e) {
							echo $e->getMessage();
							$catch_error4 = $e->getMessage();
						}
				}
				
				
		
				//resume conversion
				//ecncryption before upload 
				$file_name = $_FILES['job_resume']['name'];
				$index=strpos(strrev($file_name),strrev('.'));  
				if ($index){  
					$index=strlen($file_name)-strlen('.')-$index;  
					$resume_filename = substr($file_name,0,$index);
					$resume_fileext = trim(substr($file_name,$index+1,strlen($file_name)));
				} 
				$resume_filename = str_replace(" ","",$resume_filename);
				$resume_filename = substr($resume_filename, 0, 35);
				if($resume_filename != '') {
					$job_resume = $resume_filename.'.'.$resume_fileext;
				}
				else {
					$job_resume = '';
				}
				
					// resume upload
				if($_FILES['job_resume']['name'] != ''){			
					$resume = substr($last_insert_id.'_'.$resume_filename,0,30);					
					/*Note: The following script is used to show user profile info.*/
					if(!$update_resume_query = $mysql_obj->query("call fr_save_generate_resume('".$resume.'.'.$resume_fileext."','".$fn->print_date()."','U','".$last_insert_id."')")){
							throw new Exception('Problem in executing update resume');
					}
					if($result = $mysql_obj->fetch_array($update_resume_query)){
							$result  = $result['inserted_id'];
							$resume_title = $result.'_'.$resume;
					}
					
					$new_resume = $cfn->one_way_encrypt($resume_title);
					$cfn->copy_file($_FILES['job_resume']['tmp_name'], 'uploads/candidates/resumes/'.$new_resume.'.'.$resume_fileext);
					//update resume keywords
					$resume_keywords =  $cfn->get_resume_content('uploads/candidates/resumes/'.$new_resume.'.'.$resume_fileext);
					$mysql_obj->query("call fr_update_resume_keywords('".$mysql->real_escape_string($resume_keywords)."','".$mysql->real_escape_string($last_insert_id)."')");
				}
				
				if($_FILES['job_resume']['name'] != ''){			
					$resume = substr($last_insert_id.'_'.$resume_filename,0,30);
					if($result = $mysql_obj->fetch_array($update_resume_query)){
							$result  = $result['inserted_id'];
							$resume_title = $result.'_'.$resume;
					}
					$new_resume = $cfn->one_way_encrypt($resume_title);
					//update resume keywords
					$resume_keywords =  $cfn->get_resume_content('uploads/candidates/resumes/'.$new_resume.'.'.$resume_fileext);
					$mysql_obj->query("call fr_update_resume_keywords('".$mysql->real_escape_string($resume_keywords)."','".$mysql->real_escape_string($last_insert_id)."')");
				}
				
			
				$_SESSION['step1_success'] = 'success';
				
				// send reg. success mail
				$reg_success_link = $cfn->encrypt(trim($_POST['email_address']).'~'.trim($last_insert_id));
						
				$registration_success_content = $content->content_register_success(ucwords(trim(stripslashes($_POST['full_name']))),$_POST['email_address'],$_POST['password'],$reg_success_link);
				$subject = 'Account Verification!';
				//send mail to the user
				$mail_res = $fn->send_mail($ses,$mailer,amz_from_email,$_POST['email_address'],'Jobsfactory - '.$subject, $registration_success_content, NULL);
				if(trim($mail_res['MessageId']) != '') {
					$sent = $sent.','.$split_act_id[$i];
					//deisplay style to success message
					$smarty->assign('forgotpass_disp',"display:block");
				}
				else{
					$failed = $failed.','.$split_act_id[$i];		
				}
				
				if(!$update_profile_completeness = $mysql_obj->query("call fr_save_profile_complete('".$last_insert_id."','".$fn->get_profile_completeness($last_insert_id,'')."','".$fn->print_date()."')")) {
						throw new exception('Error update profile completeness percentage details');
				}
				
				/*
				
				
				// send job fair reg. no			
				$reg_code = $fn->get_fair_code($_POST['after_school'][0]).'-'.($last_insert_id + 1000);					 
				// send job fair mail 						
				$jobfair_content = $content->content_jobfair(ucwords(trim(stripslashes($_POST['full_name']))),$reg_code);
				$subject = 'Welcome to JOB FAIR – KEY TO SUCCESS 2016';
				//send mail to the user
				$mail_res = $fn->send_mail($ses,$mailer,amz_from_email,$_POST['email_address'],'Jobsfactory - '.$subject, $jobfair_content, NULL);
				if(trim($mail_res['MessageId']) != ''){
					$sent = $sent.','.$split_act_id[$i];
				}else{
					$failed = $failed.','.$split_act_id[$i];		
				}
				// send job fair sms 
				$message = 'JOB FAIR – KEY TO SUCCESS registration no. is '.$reg_code." Pls show this no. to participate in the job fair on 07th Aug\'16 at Chennai. More details go to www.jobsfactory.IN";
				$sms_result = $cfn->send_sms($_POST['mobile1'],$message);
				// update reg. no. of job fair		
				if(!$update_code_sent = $mysql_obj->query("call fr_save_code_sent('".$last_insert_id."','1')")) {
						throw new exception('Error update code send details');
				}
				
				
				*/
				
				$language_url = $language_url != '' ? $language_url.'/' : '';
				header('Location: '.$url.$language_url.'registration_success/');
				
			}catch(Exception $e) {
					echo $e->getMessage();
					$catch_error1 = $e->getMessage();
			}
		}
	}else{ 
		if($_POST['hdnSwitch'] != 1){
			$smarty->assign('field_error_disp','');
		}
	}

}


$title_obj = new page_title($lang. '_title');
//Note: get referral email address
if($_GET['refer_friends'] != '' && $_POST['email_address'] == ''){	
	$smarty->assign('title_obj',$title_obj);
	$split_url =  explode('?refer_friends=',$_SERVER['REQUEST_URI']);
		if($split_url[1] != ''){
			$split_details = explode('~', $cfn->decrypt($split_url[1], '', ''));
			$email_address  = $split_details[0];
				$smarty->assign('refer_email',$email_address);
			
		}
}
$smarty->display('registration.tpl');
?>