<?php
include_once('class.mysql.php');
class india_job_function extends mysql{

	public $key = enc_key;
	/* language translation */
	 function set_language($prefix){
		switch($prefix){
			case 'en':
				return $prefix;
				break;
			case 'ta':
				return $prefix;
				break;
			case 'hi':
				return $prefix;
				break;
			case 'te':
				return $prefix;
				break;
			case 'ma':
				return $prefix;
				break;
			case 'ka':
				return $prefix;
				break;
			case 'gu':
				return $prefix;
				break;
			default:
				return 'en';
		}
	 }
	
	/* function to show the job fair reg. code */
	function get_fair_code($type){
		switch($type){
			case '1':
				return 'C';
				break;
			case '2':
				return 'D';
				break;
			case '3':
				return 'E';
				break;
			case '4':
				return 'F';
				break;			
			case '6':
				return 'A';
				break;	
			case '7':
				return 'B';
				break;				
		}
	}
		
	/* function to encrypt alone */
	function one_way_encrypt($plain){
		return trim($this->replace_encrypt_string(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $this->key, $plain, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND)))));
	}
	
		
	function replace_encrypt_string($subject) {
		return $String = preg_replace('~[^a-zA-Z0-9]+~', '', $subject);;
	}
	
	function get_random_numbers($limit=6){
		return substr(number_format(time() * rand(),0,'',''),0,$limit);
	}
	 function frontend_authenticate($url){
		if($_SESSION['user_id'] == ''){
		   header("Location:$url".'login/');
		}   
	 }


	function get_others_completeness(){
		if($_SESSION['user_show_education_complete'] == '' || $_SESSION['user_show_education_complete'] == '1'){
			$_SESSION['user_show_education_complete'] = '1';
		    return 'education'.'-edit_education_details-ALRT_PROFILE_EDUCATION-'.$this->get_profile_completeness($_SESSION['user_id'],'education');
	   }
		elseif($_SESSION['user_show_expectations_complete'] == '' || $_SESSION['user_show_expectations_complete'] == '1'){
			$_SESSION['user_show_expectations_complete'] = '1';
			return 'expectations'.'-edit_expectation_details-ALRT_PROFILE_EXPECTATIONS-'.$this->get_profile_completeness($_SESSION['user_id'],'expectations');
	   }	
	   elseif($_SESSION['user_show_my_self_complete'] == '' || $_SESSION['user_show_my_self_complete'] == '1'){
			$_SESSION['user_show_my_self_complete'] = '1';
			return 'my_self'.'-edit_myself_details-ALRT_PROFILE_MY_SELF-'.$this->get_profile_completeness($_SESSION['user_id'],'about_my_self');
	   }
	   elseif($_SESSION['user_show_family_complete'] == '' || $_SESSION['user_show_family_complete'] == '1'){
			$_SESSION['user_show_family_complete'] = '1';
		    return 'family'.'-edit_family_details-ALRT_PROFILE_MY_FAMILY-'.$this->get_profile_completeness($_SESSION['user_id'],'family');
	   }
	}
	/*Note: The following function is used to user profile completeness*/
	function get_profile_completeness($user_id,$type=''){
		if($user_id == '') $user_id = $_SESSION['user_id'];
		//echo "call fr_get_profile_completeness($user_id,'$type')";
		$mysql_obj = new mysql();

		$profile_completeness_query = $mysql_obj->query("call fr_get_profile_completeness($user_id,'$type')");
		/*if($type == '')
			$fields = array('full_name','parent_name','dob','email_id','present_door_no','present_street_name',
			'present_area1','present_city','present_pincode','permanent_door_no','permanent_street_name',
			'permanent_area1','permanent_city','permanent_pincode',
			'mobile_no1','height','height_type','weight','id_no','school_name','school_type','school_year_passing','school_marks_percentage',
			'expected_salary','expected_work_location','preferred_job_type','current_position','id_cards_id','languages_id',
			'industry_id','present_state_id','permanent_state_id','present_district_id','permanent_district_id','preferred_department',
			'gender','photo',
			'favourite_subjects','friend_quality','fav_games','ambition','father_name','mother_name','father_education','mother_education','father_occupation','mother_occupation','father_salary','mother_salary','father_place','mother_place','no_brothers','no_sisters');
	    */
		if($profile_completeness_query->num_rows){
			if($profile_completeness_res = $mysql_obj->fetch_array($profile_completeness_query)){
		if($type == ''){
			$fields1 = array('full_name','parent_name','dob','email_id','present_door_no','present_street_name',
			'present_area1','present_city','present_pincode','permanent_door_no','permanent_street_name',
			'permanent_area1','permanent_city','permanent_pincode','gender','photo',
			'mobile_no1','height','height_type','weight','id_no','id_cards_id','languages_id','present_state_id','permanent_state_id','present_district_id','permanent_district_id',
			'school_name','school_type','school_year_passing','school_marks_percentage',
			'expected_salary','expected_work_location','preferred_job_type','departments_id','industry_id'
			);
			if($profile_completeness_res['is_graduated'] =='1'){ 
				$fields2 = array('institute','course_type','year_passing','percentage_marks','university','course_details_id','specialization_id');
			}
			$fields = array_merge((array)$fields1, (array)$fields2);
			
			
		}
		elseif($type == 'personal'){
			$fields = array('full_name','parent_name','dob','email_id','present_door_no','present_street_name',
				'present_area1','present_city','present_pincode','permanent_door_no','permanent_street_name',
				'permanent_area1','permanent_city','permanent_pincode','gender','photo',
				'mobile_no1','height','height_type','weight','id_no','id_cards_id','languages_id','present_state_id','permanent_state_id','present_district_id','permanent_district_id'
			);
		}
		elseif($type == 'education') {
		
			$fields1 = array('school_name','school_type','school_year_passing','school_marks_percentage');
			if($profile_completeness_res['is_graduated'] =='1'){
				$fields2 = array('institute','course_type','year_passing','percentage_marks','university','course_details_id','specialization_id');
			}
			
			$fields = array_merge((array)$fields1, (array)$fields2);
		}	
	    elseif($type == 'expectations')
			$fields = array('expected_salary','expected_work_location','preferred_job_type','departments_id','industry_id');
		elseif($type == 'about_my_self1')
			$fields = array('favourite_subjects','friend_quality','fav_games','ambition');
		elseif($type == 'family1')
			$fields = array('father_name','mother_name','father_education','mother_education','father_occupation','mother_occupation','father_salary','mother_salary','father_place','mother_place','no_brothers','no_sisters');	
	    elseif($type == 'work_authorization')
			$fields = array('country','usa_status');
		elseif($type == 'affirmative_action')
			$fields = array('category','physically_challenged','description');
		elseif($type == 'resume')
			$fields = array('resume');
		elseif($type == 'experience')  {
			$fields = array('experience_year','current_salary','company_name','experience','position','job_location','job_type','responsibility');
		}	
        else
              return '0';	   
		 $total_count = count($fields);

		$i =0;
			
			foreach($fields as $key){
					if(trim($profile_completeness_res[$key]) == '' || ($type == 'experience' && $profile_completeness_res[$key] == '0')){
						$i++;
					}
			}
		
			}else{
				 return '-1';
			}
			
			if($i == 0){
				 return 100;
			}	 
			else if($i != $total_count){
				 return round((($total_count-$i)/$total_count) * 100);
			}
			return 0;
		}
		return -1;
	}
   function escapes($str) {
		$str = trim($str);
		$str = mysql_real_escape_string($str);
		return $str;
   }
   
   function add_plus($str) {
		//str_replace(',',',+',str_replace(" ","+",trim($str)));
		return str_replace(" ","+",trim($str));
   }
     
   function real_string($string,$mysqli){  
		if(trim($string)=='')
			return "NULL";
		else 
			return mysqli_real_escape_string($mysqli,$string); 
	}
	
	
	function real_string_number($string){  
		if(trim($string)=='')
			return "NULL";
		else 
			return "'".$string."'";
	}

	
	function plus_add_search($str)   {
		if(trim($str)!='' && trim($str)!='all')
			return '+'.(str_replace(' ',' +',$str));
        return '';			
   }
   function replace_jobs_string($str) {
		$match = array("/[^a-zA-Z0-9]/", "/_+/", "/_$/");
		$replace = array("_", "_", "");
		$str = strtolower(preg_replace($match, $replace , $str));
		return $str;
   }
   function plus_replace($str){
		return mysql_real_escape_string(str_replace("%27","'",(str_replace("+"," ",$str))));
   }
   
   function strreplace($str){
   return str_replace("\\'","'",(str_replace("\'","'",$str)));
   }
  
   
   /* to get the current date of the system */
   function print_date(){
		// get local time using api
		//$ip = $_SERVER['REMOTE_ADDR'];
		/*$ip = '122.165.71.170';
		$json = file_get_contents("http://api.easyjquery.com/ips/?ip=".$ip."&full=true");
		$json = json_decode($json,true);
		date_default_timezone_set($json['localTimeZone']);	
		*/
		date_default_timezone_set('Asia/Calcutta');

		return date('Y-m-d H:i:s');
   }
   
   // function to display date
	function display_date(){
		$display = date('Y/m/d');
		return $display;
	}
	
	// function to display date
	function date_format($date){
		if(($date != '') && ($date != '0000-00-00')){
			$date_format = date('d', strtotime($date)).'<sup>'.date('S', strtotime($date)).'</sup>'.date(' M', strtotime($date)).date(' Y', strtotime($date));
			return $date_format;
		}
	}
		// function to display date
	function drive_date_format($date){
		if(($date != '') && ($date != '0000-00-00')){
			$date_format = date('d', strtotime($date)).'<sup style="vertical-align:super">'.date('S', strtotime($date)).'</sup>'.date(' M', strtotime($date));
			return $date_format;
		}
	}

	function authenticate()
	{	
		if(isset($_SESSION['session_id'])){
			$user_id  = '';
			$sess_id  = '';
			//If session had a value
			if(isset($_SESSION['EMP_USERID'])){
				//Assign session values to the variable for authenticate
				$user_id  =$_SESSION['EMP_USERID'];
				$sess_id  = $_SESSION['session_id']; 
			}	
		}
		else{
	
			header('Location: '.$url);
		}
	}
	
	/* function to get the aexpiry date */
	function getexpiry_date($date,$duration,$day_type) { // Y-m-d format
		//$duration = 30;
		//$day_type = 'days';
		//$duration = $day_type == 'day' ? $duration-1 : $duration ;
		$exp_date = strtotime($duration.' '.$day_type,strtotime($date)) ;	
		$exp_date1 = strtotime('-1 day',strtotime(date('Y-m-d',$exp_date))) ;	
		return date('Y-m-d',$exp_date1 );
	}
	
	
	/* function for destroy the session value */
	function reg_clear_session() {	
		session_start(); 
		if(!empty($_SESSION['user_step1_success'])){
			// if not registration page		
			if($_GET['pagen'] != 'registration_step1' && $_GET['pagen'] != 'registration_step2' && $_GET['pagen'] != 'registration_step3'){
				if(!empty($_SESSION['user_photo_path'])){
					if(file_exists('uploads/candidates/photos/tmp/'.$_SESSION['user_photo_path'])) {
							unlink('uploads/candidates/photos/tmp/'.$_SESSION['user_photo_path']);
							unset($_SESSION['msg_user_photo']);
					}
				}					
				session_destroy();
				
			}
		}
		
	}
	
	/*Note: The function is used to the count details menus (inbox/applied jobs/saved jobs)*/
	function get_menu_count(){
	  if($_SESSION['user_id'] !=''){
		$mysql_obj = new mysql();
		$date = $this->print_date() ; 
		$oneMonthAgo = strtotime('-1 month',strtotime($date)) ; 
		$oneMonthAgo = date('Y-m-d',$oneMonthAgo );
		// get the job seeker keywords for listing argument
	    $sql_get_keywords = "call fr_job_seekers_keywords('".$_SESSION['user_id']."')"; 
		if(!$get_keywords = $mysql_obj->query($sql_get_keywords)){
			throw new Exception('Problem in executing get keywords');
		}
		if($get_keywords_res1 = $mysql_obj->fetch_array($get_keywords)){
			$program_name_id = $get_keywords_res1['program_details_id'] > 0 ? $get_keywords_res1['program_details_id'] : 0 ;
			$degree_name_id = $get_keywords_res1['course_details_id'] > 0 ? $get_keywords_res1['course_details_id'] : 0 ;
			$spl_name_id = $get_keywords_res1['specialization_id'] > 0 ? $get_keywords_res1['specialization_id'] : 0 ;
		}	


		$menu_count_qry = $mysql_obj->query("call  fr_get_menus_count('".$_SESSION['user_id']."','".$date."','".$oneMonthAgo."','".$program_name_id."','".$degree_name_id."','".$spl_name_id."')");//
		if($menu_count_qry->num_rows){
		   $menu_count  = $mysql_obj->fetch_array($menu_count_qry);
		   return $menu_count;
		  
		}	
		}
	}
	
		//function to get the time difference in hr,nint,sec,days
		function dateDifference($day_1,$day_2) {
		   $diff = strtotime($day_1) - strtotime($day_2);

		   $sec   = $diff % 60;
		   $diff  = intval($diff / 60);
		   $min   = $diff % 60;
		   $diff  = intval($diff / 60);
		   $hours = $diff % 24;
		   $days  = intval($diff / 24);

		   return $hours.'~'.$min.'~'.$sec.'~'.$days;
		}
	
		//Note: get the file name and extension
		function get_file_desc($file_name){
			$index=strpos(strrev($file_name),strrev('.'));  
			if ($index){  
				$index=strlen($file_name)-strlen('.')-$index;  
				$new_file_name = substr($file_name,0,$index);
				$new_file_extension = trim(substr($file_name,$index+1,strlen($file_name)));
			} 	
			return array($new_file_name,$new_file_extension);
		}		
		
		//Note: get the file name and remove the id from that
		function remove_ids($file_name,$id_count,$seperator){
			//get only the file name without id
			$a = explode($seperator,$file_name);
			for($i=$id_count; $i < count($a);$i++) {
				$file_res.=$a[$i];
				if($i != (count($a)-1))
				$file_res.=$seperator;
			}	
			return $file_res;
		}
	
	/* function to check the existence of the read file */
	function check_posting_read_exists($path, $reg_date){
		$file_month = $this->get_read_file_format($reg_date[1]);  
		if(file_exists($path.''.$file_month.'_'.$reg_date[0].'.ini')){
			return $file_month.'_'.$reg_date[0].'.ini';
		}else{
			return false;
		}
	}
	
	/* function to create the read file for the posting alert */
	function create_posting_read_file($path, $user_id, $reg_date){		
		$file_month = $this->get_read_file_format($reg_date[1]);
		$fp = fopen($path.$file_month.'_'.$reg_date[0].'.ini', "a+") or die('problem in opening file');
		if(fgets($fp) != ''){$new_line = "\n";}
		fwrite($fp, $new_line.$user_id); 
		fclose($fp);
	}
	
	/* function to get the read file formats */
	function get_read_file_format($month){ 
		if($month <= 3){
			$file_month = '01';
		}else if($month >= 4 && $month <= 6){
			$file_month = '04';
		}	
		else if($month >=7 && $month <= 9){
			$file_month = '07';
		}
		else if($month >= 10 && $month <= 12){
			$file_month = '10';
		}	
		return $file_month;
	}
	
	/* function to open the file and get the read ids*/
	function get_posting_read_file($path, $id){
		$file_handle = fopen($path, "r+") or die('problem in opening file');		
		if(flock($file_handle,LOCK_EX)){
			while(!feof($file_handle)) {
			   $line = fgets($file_handle);  
			   if (strstr($line, $id)) {
					flock($file_handle,LOCK_UN);
					fclose($file_handle);			
					return $this->get_read_ids($line);				
			   }	   
			}
			if($line != ''){$new_line = "\n";}
			fwrite($file_handle, $new_line.$id); 
			flock($file_handle,LOCK_UN);
		}		
		fclose($file_handle);	
	}
	
	
	/* function to get the read ids*/
	function get_read_ids($line){
		$id = explode(" ", $line);
		return $id[1];
	}
	function get_rate_value($value,$value2,$max_limit){
		
		/*if($max_limit > 0){
		
			$value2 = ($value2 <= 0 || (($value * $max_limit) < $value2)) ? $value : $value2;
		}
		if(($value2%$value) == 0)
		   return $value2;
		else 
		   return $value;
		*/
		return $value2;
	}
	
	/* insert job id */
	function file_insert_job_id($path,$job_id,$user_id,$action='R'){ 
		$read_ids =  $this->get_posting_read_file($path, $user_id);
		$matched = 0;
		$split_read_ids = explode(",",$read_ids);
		$count = intval(count($split_read_ids));
		$j = trim($read_ids) == '' ? $count-1 : $count;
		for($i= 0;$i < $count; $i++){
			if(strstr(trim($split_read_ids[$i]),'-D')) continue;
			if(trim($split_read_ids[$i]) == trim($job_id) && $action == 'R') {
				$matched.=$job_id;
			}
			//Note: unread records
			if($action == 'U' && trim($split_read_ids[$i]) == trim($job_id)){
				unset($split_read_ids[$i]);
			}	
			//Note: delete records
			elseif($action == 'D'){
				if(trim($split_read_ids[$i]) == trim($job_id))
					$split_read_ids[$i] = trim($split_read_ids[$i]).'-D';
				elseif(!in_array(trim($job_id),$split_read_ids) && !in_array(trim($job_id).'-D',$split_read_ids)){
					$split_read_ids[$j] = trim($job_id).'-D';
					$j++;
				}	
			}
		}
		//Note: remove empty values
		$i = 0;
		foreach($split_read_ids as $emp_value){
			if(trim($emp_value) == '')
				unset($split_read_ids[$i]);
			$i++;
		}
		$read_ids = implode(',',$split_read_ids);
		/*foreach(explode(",",$read_ids) as $value) {
			if(trim($value) == trim($job_id)) {
				$matched.=$job_id;
			}
		}*/
		
		if($matched == 0) {
			$fr = fopen($path, "r") or die('problem in opening file');
			if(flock($fr,LOCK_EX)){
				$read_ids = trim($read_ids);
				$comma = ($read_ids == '') ? '' : ','; 
				$match = $user_id; 
				
				$replace = $user_id.' '.$read_ids.$comma.($action == 'R' ? $job_id : '');
				
				$lines = '';
				$new_line = "\n";		
				$i = 0;
				while(!feof($fr)) {
					 $line = fgets($fr); 
						if (strstr($line, $match)) {
							if($i == 1 || $job_id != ''){$new_line = '';}
							if($job_id != ''){$new_line2 = "\n";}
								$line = $new_line.$replace.$new_line2;				
						}				
					 	$lines .= $line;
					$i++;
				}
			}
			fclose($fr);
			$fw = fopen($path, "w+") or die('problem in opening file');
			if(flock($fw,LOCK_EX)){
				fputs($fw, $lines); 
				flock($fw,LOCK_UN);
			}
			fclose($fw);
			
			
		}
	}

	// function to get the key words without string
	function get_keywords($keyword){
		$result_key = '';
		if($keyword != '') {
			$split_keyword = preg_split("/[,+]+/", $keyword);		
			$comma = ',';			
			$count_srch = count($split_keyword);
			foreach($split_keyword as  $key => $value){					
				if(intval($value) == 0){
					$result_key .=  $comma.$value; 
				}					
			}
		}
		return $result_key;
	}	
	
	// function to get the key words without string
	function get_sql_keywords($keyword){
		$result_key = '';
		if($keyword != '') {
			$split_keyword = preg_split("/[,+]+/", $keyword);		
			$comma = ',';			
			$count_srch = count($split_keyword);
			foreach($split_keyword as  $key => $value){					
				if(intval($value) == 0){
					if($value != '')
					$result_key .=  ',"'.$value.'"'; 
				}					
			}
		}
		return substr($result_key,1);
	}	 
	
	/* function to clear the features session */
	
	function clear_college_session_features(){
		unset($_SESSION['co_edit_additional_subscription']);
		unset($_SESSION['co_edit_custom_total_amount']); 
		unset($_SESSION['co_edit_custom_students_count']); 
		unset($_SESSION['co_edit_custom_users_count']);
		
	}
	function clear_session_features(){
		unset($_SESSION['em_edit_additional_subscription']);
		unset($_SESSION['em_edit_custom_total_amount']); 
		unset($_SESSION['em_edit_custom_jobs_count']); 
		unset($_SESSION['em_edit_custom_cv_count']); 
		unset($_SESSION['em_edit_custom_user_count']); 
		unset($_SESSION['em_edit_custom_sms_count']); 
		unset($_SESSION['em_edit_custom_mail_count']); 
		unset($_SESSION['em_edit_custom_premium_count']); 		
		unset($_SESSION['em_edit_custom_user_month']); 
	}
	/*Note: The following function is used to check present and permanent address are same*/
	function is_same_address($result) {
		$present_address_field = array('present_door_no','present_street_name','present_area1','present_area2','present_city','present_pincode','present_state_id','present_district_id');
		$permanent_address_field = array('permanent_door_no','permanent_street_name','permanent_area1','permanent_area2','permanent_city','permanent_pincode','permanent_state_id','permanent_district_id');
		for($i = 0; $i < count($present_address_field); $i++) {
			if($result[$present_address_field[$i]] != $result[$permanent_address_field[$i]]){
				return 0;
			}
		}
		return 1;
	}
	/*Note: The following function is used to send mail*/
	function send_mail($ses,$mailer,$from,$to,$subject,$content,$attachment = null) {
		//error_reporting(0);
		$mailer->addTo($to);		
		if($from != ''){
			$mailer->setFrom($from);
		}else{
			$mailer->setFrom(amz_from_email);
		}
		$mailer->setSubject($subject);
		if($attachment != null && $attachment !=''){
			$mailer->setMessageFromFile($attachment,$content);
		}else{
			$mailer->setMessageFromString(null,$content);
		}
		try {
			$mail_res = $ses->sendEmail($mailer);
			if(!$mail_res){				
				throw new Exception('Problem in sending mail');
			}
			return $mail_res;
		}
		catch (Exception  $e) {
			return $mail_res;
		}		
	}
	function clear_payment_session(){	
		foreach($_SESSION as $key=>$value){
		if(substr($key,0,12) == 'user_custom_'){
			unset($_SESSION[$key]);
		} 
		if(substr($key,0,15) == 'em_edit_custom_'){
			unset($_SESSION[$key]);
		} 
		}unset($_SESSION['user_payment_selection']);
		unset($_SESSION['co_total_amount']);$_SESSION['co_no_students']; $package_details['no_users'];
	}
/*	//Note: The following function is used to write a string in a file
	function write_file($file_path,$str,$file_mode){	
		$f = fopen($file_path, $file_mode) or die('problem in opening file');
		if(fgets($f) != ''){$new_line = PHP_EOL;}
		fwrite($f, $new_line.$str); 
		fclose($f);
	}*/
	function get_similor_jobs($job_details,$index,$cfn,$job_id){
		$experience = explode('-',$job_details[$index]['experience']);
		$salary = floatval($job_details[$index]['salary']) > 0 ? $job_details[$index]['salary'] : '';
		$job_type =  (strtolower($job_details[$index]['job_type']) == 'f') ? 'Full Time' : (strtolower($job_details[$index]['job_type']) == 'p' ? 'part time' : (strtolower($job_details[$index]['job_type']) == 'c' ? 'contract' : ''));
		$min_salary = $salary - ((20/100)*$salary);
		$max_salary = $salary + ((20/100)*$salary);
		$similor_jobs = '&type=similar_jobs&skeywords='.$cfn->qstring_before_replace($job_details[$index]['key_skills']).'&sjob_type='.$job_type.'&smin_exp='.($experience[0]).'&smax_exp='.trim($experience[1]).'&smin_salary='.trim($min_salary).'&smax_salary='.trim($max_salary).'&similar_job='.$job_id;
		return $similor_jobs;
	}
	
	/* function to get job type */
	function get_job_type($type){
		switch($type){
			case 'C':
			$job = 'Contract';
			break;
			case 'I':
			$job = 'Internship';
			break;
			case 'P':
			$job = 'Part time';
			break;
			case 'F':
			$job = 'Full time';
			break;
		}
		return $job;
	}
	
}


$fn = new india_job_function();