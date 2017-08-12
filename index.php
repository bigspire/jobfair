<?php
/**
 * This is a index file for display index page.
 * @copyright   Copyright 20011-2012, BigSpire Software (P) Ltd
 */
ini_set('display_errors', 0);
error_reporting(0);
ob_start();
session_start();


//include the smarty config
if(count($_GET) == 0){ 
	include('config/smarty.config.php');
	include('config/dbconfig.php');
	include('classes/class.function.php'); 
	include('classes/class.com_function.php'); 
	include('classes/class.validation.php'); 
	include 'classes/class.page_title.php';
	// Check site maintenance
	$cfn->check_maintenance(constant('MAINTENANCE'));
	$url = str_replace('index.php','',$_SERVER['PHP_SELF']);
	$smarty->assign('url',$url);
	//$smarty->assign('language_name', $language_name = 'en');
	$smarty->assign('string_obj' , $fn);
	if($_SERVER['REQUEST_URI'] != '' && strstr($_SERVER['REQUEST_URI'],'index.php')){
	header('Location: '.$url.$language_url);die;
}	
//hot jobs at footer page
	/*$i=0;
	$hot_jobs = $mysql_obj->query("call fr_get_hot_jobs(0,10)");
	if($hot_jobs->num_rows)
	while($hot_jobs_row[] = $mysql_obj->fetch_array($hot_jobs)){
		$smarty->assign('hot_jobs' , $hot_jobs_row);
		$en_id_hot[] = $cfn->encrypt($hot_jobs_row[$i]['id']);	
		$smarty->assign('en_id_hot',$en_id_hot);	
		$i++;
	}
	*/
		
	// featured jobs
	// $feature_jobs = $mysql_obj->query("call fr_get_featured_jobs(10)");
	// while($feature_jobs_row[] = $mysql_obj->fetch_array($feature_jobs)){
		// $smarty->assign('feature_jobs' , $feature_jobs_row);
	// }
	
	//recent jobs
	
	$i=0;
	$recent_job_result = $mysql_obj->query("call fr_get_recently_added_jobs('0','10','".$fn->print_date()."')");
	if($recent_job_result->num_rows)
	while($recent_job_result_row[] = $mysql_obj->fetch_array($recent_job_result)){
		// show company name for recruiter only
		if(!empty($recent_job_result_row[$i]['job_company'])){
			$recent_job_result_row[$i]['company_name'] = $recent_job_result_row[$i]['job_company'];
		}else{
			$recent_job_result_row[$i]['company_name'] = $recent_job_result_row[$i]['company_name'];
		}
		$smarty->assign('recent_jobs' , $recent_job_result_row);
		$en_id_recent[] = $cfn->encrypt($recent_job_result_row[$i]['jobs_id']);	
		$smarty->assign('en_id_recent',$en_id_recent);	
		$i++;
	}
	
	// browser compatibility message
	$browser_error_message_new = $cfn->show_browser_error('jobseeker'); 
	$smarty->assign('browser_error_message',$browser_error_message_new);
	$smarty->assign('language_name', 'en');
	//$smarty->assign('language_url', 'en/');
}
	//if we get reset password link
	if(($_GET['email']!= '') && ($_GET['otp']!= '') && ($_GET['ttl']!= '') ) {
		header("Location: ".$url.$language_url."reset_password/?email=".$_GET['email']."&otp=".$_GET['otp']."&ttl=".$_GET['ttl']);
	}
	if(($_GET['email']!= '') && ($_GET['otp']!= '') && ($_GET['ttl']!= '') && ($_GET['emp']!= '') ) {
		header("Location: ".$url.$language_url."emp_reset_password/?email=".$_GET['email']."&otp=".$_GET['otp']."&ttl=".$_GET['ttl']);
	}	
	if(($_GET['email']!= '') && ($_GET['otp']!= '') && ($_GET['ttl']!= '') && ($_GET['page_to'] == 'college_reset_password') ) {
		header("Location: ".$url.$language_url."college_reset_password/?email=".$_GET['email']."&otp=".$_GET['otp']."&ttl=".$_GET['ttl']);
	}
	
	// show testimonials 
	$testi_data = $mysql_obj->query("call fr_voice_of_customer('0','5')");
	while($testi_row = $mysql_obj->fetch_array($testi_data)){
		$tdata[] = $testi_row;
	}
	$smarty->assign('testimonial_data', $tdata);
	$smarty->assign('cfn_obj' , $cfn);
	//$fn->reg_clear_session();
	$lang = $fn->set_language($language_name);
	
	$news_obj = new factory($lang.'_news'); //ini file name
	$smarty->assign('news_lang', $news_obj);

	$foot_obj = new factory($lang.'_footer');
	$smarty->assign('footer_lang', $foot_obj);

	$menu_obj = new factory($lang.'_menu');
	$smarty->assign('menu_lang', $menu_obj);

	$smarty->assign('string_obj' , $fn);

	// create page title object to assign page titles	
	$title_obj = new page_title($lang. '_title');	
	$smarty->assign('PAGE_TITLE', $title_obj->JText_('PAGE_TITLE_HOME'));
	
	//jobs by industry
	$jobs_industry_result = $mysql_obj->query("call fr_get_jobs_industry('".$fn->print_date()."',0,18,'');");
	while($jobs_industry_row[] = $mysql_obj->fetch_array($jobs_industry_result)){
		$smarty->assign('jobs_industry' , $jobs_industry_row);	
	}

	//latest news
	$i=0;
	$latest_update_result = $mysql_obj->query("call fr_get_latest_updates('en')");	
	while($latest_update_row[] = $mysql_obj->fetch_array($latest_update_result)){
		
		$smarty->assign('latest_update' , $latest_update_row);
		$encrypted_id[] = $cfn->encrypt($latest_update_row[$i]['id']);
		$i++;
		$smarty->assign('en_id',$encrypted_id);
	}
	//jobs by location
	
	
	$jobs_location_result = $mysql_obj->query("call fr_get_jobs_location('','".$fn->print_date()."','0','100','')");
	$location_list = array();$location_name_count = array();
	if($jobs_location_result->num_rows){
		while($jobs_location_row = $mysql_obj->fetch_array($jobs_location_result)){
			$split_location = explode(',',$jobs_location_row['location']);
			foreach($split_location as $location){
				$location = trim(strtolower($location));
				if($location){
					if(!$cfn->in_array_r(trim(strtolower($location)),$location_list)){
						$location_list[$location]['url_location'] = $cfn->qstring_before_replace($location);
						$location_list[$location]['location'] = $location;
					}
					$location_name_count[$location] = intval($location_name_count[$location])+1;
				}
			}
			
		}
	}
	if(count($location_name_count) > 0)
		arsort($location_name_count);
	$smarty->assign('jobs_location' , $location_list);
	$smarty->assign('location_name_count',$location_name_count);
	
	//jobs by company
	$jobs_company_result = $mysql_obj->query("call fr_get_jobs_company('".$fn->print_date()."','0','18','')");
	$i = 0;
	while($jobs_company_row[] = $mysql_obj->fetch_array($jobs_company_result)){
		$jobs_company_row[$i]['url_company_name'] = $cfn->qstring_before_replace($jobs_company_row[$i]['company_name']);
		$smarty->assign('jobs_company' , $jobs_company_row);
		$i++;
	}
	
	/* JOBS BY DEPARTMENT */
	$jobs_dept = $mysql_obj->query("call fr_get_jobs_department('".$fn->print_date()."','0','18','')");
	$i = 0;
	while($jobs_dept_row[] = $mysql_obj->fetch_array($jobs_dept)){
		$jobs_dept_row[$i]['url_dept_name'] = $cfn->qstring_before_replace($jobs_dept_row[$i]['department']);
		$smarty->assign('jobs_dept' , $jobs_dept_row);
		$i++;
	}
	
	$smarty->assign('fn',$fn);
	//clear the session
	$fn->reg_clear_session();

	//if the refer friends submitted
	if($_POST['refer_friend'] == 'submit'){
		$encrypted_address = $cfn->encrypt($_POST['ref_address']);
		$encrypted_address_query = '&ref_addr='.$encrypted_address;
		header('location:'.$url.$language_url.'refer_site_friends/?'.$encrypted_address_query);
		die;
		//validate fields
		$validation=array(1);
		if(!is_numeric($_POST['ref_address'])) {
			$validationtype=array('w_email');
		}
		else {
			$validationtype=array('mobile');
		}
		$field=array('ref_address');
		$error_msg = array('Enter valid email address or mobile number');					
		$fn_valid->general_alert_error1 = '';	
		$fn_form = $fn_valid->validate_form($_POST,$validation,$validationtype,$field,$error_msg);		
		if($fn_form == 1) {
			$encrypted_address = $cfn->encrypt($_POST['ref_address']);
			$encrypted_address_query = '&ref_addr='.$encrypted_address;
			if($_SESSION['user_id'] == '') {
				
				header('location:'.$url.$language_url.'login/?redirect_uri=refer_site_friends'.$encrypted_address_query);
			}
			else {
				header('location:'.$url.$language_url.'refer_site_friends/?'.$encrypted_address_query);
			}
		}
		//echo "<pre>"; print_r($fn_form); die;		
	}
	
// check job fair pop up
$query = "CALL fr_check_jobfair('".date('Y-m-d')."')";
try{
	if(!$result = $mysql_obj->query($query)){
		throw new Exception('Problem in getting job fair count');
	}
	$row = $mysql_obj->fetch_assoc($result);
}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
}

if($row['total'] != '' && $row['total'] != '0'){
	$smarty->assign('jobfair_form_sent' , 1);
}else{
	// check client requirement pop up
	$query = "CALL fr_check_req('".date('Y-m-d')."')";
	try{
		if(!$result = $mysql_obj->query($query)){
			throw new Exception('Problem in getting client req count');
		}
		$obj = $mysql_obj->fetch_assoc($result); 
	}catch(Exception $e){
			echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
	if($obj['total'] != '' && $obj['total'] != '0'){
		$smarty->assign('req_form_sent' , 1);
	}
}
// fetching job fair titles to display in the menu
$query = "CALL fr_get_jobfair_title()";
try{
	if(!$result = $mysql_obj->query($query)){
		throw new Exception('Problem in getting job fair count');
	}
	while($row = $mysql_obj->fetch_assoc($result)){
		$jobfair[$row['id']] = ucwords($row['location']).' ('.$fn->drive_date_format($row['jobfair_date']).')';
	}
	$smarty->assign('jobfair',$jobfair);
}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
}
// fetching drive locations to display in the menu
$query = "CALL fr_get_drives()";
try{
	if(!$result = $mysql_obj->query($query)){
		throw new Exception('Problem in getting job fair count');
	}
	while($row = $mysql_obj->fetch_assoc($result)){
		$drives[$row['id']] = ucwords($row['work_loc']).' ('.$fn->drive_date_format($row['drive_date']).')';
	}
	$smarty->assign('drives',$drives);
}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
}

// display the home page
$smarty->assign('dashboard_selected',"class='selected'");
$smarty->assign('menu_count',$fn->get_menu_count());
// remove temp. images in uploaded in reg.
$smarty->display('index.tpl');
?>