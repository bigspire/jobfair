<?php
ini_set('display_errors', 0);
error_reporting(0);
session_start(); 
ob_start();
include('config/smarty.config.php');
include('config/dbconfig.php');
include('classes/class.mysql.php');  
include('classes/class.function.php'); 
include('classes/class.com_function.php'); 
include('classes/class.validation.php');        
include('classes/class.page_title.php');
include('classes/class.image_resize.php');
// Check site maintenance
$cfn->check_maintenance(constant('MAINTENANCE'));
/*include('classes/content.php');
echo $content->content_feedback_notifications('Kumaresan','St Josheph\'s college of arts and science','');die;*/
$smarty->assign('fn',$fn);
//clear browser cache
$cfn->disable_cache();
$smarty->assign('webroot',constant('webroot'));
$smarty->assign('admin_path',admin_path);
$smarty->assign('session_id',$_SESSION['USER_ID']);
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
// switch to tamil or hindi language
$language_code = array('ta','hi','en','te','ma','gu','ka');
$page = $_GET['pagen'];$language_url ='';
foreach($language_code as $code){
	if($_GET['pagen'] == $code){
		$page = $_GET['pagenew'];
		$language_url = $code;
		break;
	}
}
$url = str_replace('htaccess.php','',$_SERVER['PHP_SELF']);
$smarty->assign('url',$url);
if($_SERVER['REQUEST_URI'] != '' && (strstr($_SERVER['REQUEST_URI'],'htaccess.php') || $page == 'index')){
	header('Location: '.$url.$language_url.'/');die;
}
//$page=trim($_GET['pagen']).'.php';

// browser compatibility message
$browser_error_message_new = $cfn->show_browser_error('jobseeker'); 
$smarty->assign('browser_error_message',$browser_error_message_new);

if(file_exists($page.'.php')){
	/*if($page != 'employer_registration' && $page != 'emp_packages'){
		if($_SESSION['user_custom_package'] != '' && count($_POST) == 0){
			foreach($_SESSION as $key=>$value){
				if(substr($key,0,12) == 'user_custom_'){
					unset($_SESSION[$key]);
				 }  
			}
		}
	}*/
	
	//clear the session
	//$fn->reg_clear_session();	
	
	include($page.'.php');
	
	
	
}
else if($page == ''){
	include("index.php"); 
}
//The given page not exist 
else{	
	//$fn->frontend_authenticate($url);

	$lang = $fn->set_language($language_name);
	
	// language file 

	$menu_obj = new factory($lang.'_menu');
	$smarty->assign('menu_lang', $menu_obj);

	$foot_obj = new factory($lang.'_footer');
	$smarty->assign('footer_lang', $foot_obj);
		
	$smarty->display('page_not_found.tpl');
}
?>
