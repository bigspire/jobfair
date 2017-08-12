<?php 
define('MAINTENANCE',0);

define('DEVELOPMENT_ENVIRONMENT',1);
if (DEVELOPMENT_ENVIRONMENT == 1) {
    // error_reporting(E_ALL ^ E_NOTICE );
    ini_set('display_errors','On');
	ini_set('log_errors', 'On');
	ini_set('error_log', 'logs/error.log');
}else{
    // error_reporting(E_ALL ^ E_NOTICE);
    ini_set('display_errors','Off');
    ini_set('log_errors', 'On');
    ini_set('error_log', 'logs/error.log');
}
define('webroot','http://localhost/jobfac/');
define('admin_path', '../jobfac_admin/app/webroot/uploads');
define('emp_webroot','/jobfac_employer/');//'http://localhost/india_job/source/v1.0/');
define('co_webroot','/jobfac_campus/');//'http://localhost/india_job/source/v1.0/');
define('sms_url','http://123.63.33.43/blank/sms/user/urlsmstemp.php');
define('sms_username','ceotalent');
define('sms_password','ceotalent@654');
define('sms_api_id','JOBFAC');
define('amz_token','AKIAJ5SXI34L574BLW6Q');
define('amz_signature','e6a7lvHV8k4gNp0f/g8iPKytPOjoJZ+QWowJShbI');
define('amz_from_email','noreply@jobsfactory.in');
define('email_address','vidhya@bigspire.com');
define('enc_key','78jk8hh6hjkd4s2a1kl08653');
// define('admin_path', '../../../administator/app/webroot/uploads');
define('download_prefix','JobFac');
$employer_file_path = '..'.emp_webroot;
define('employer_file_path',$employer_file_path);
date_default_timezone_set('Asia/Calcutta');
require($link_url.'libs/Smarty.class.php');
$smarty = new Smarty();
$smarty->register_modifier('ss', 'stripslashes');
$smarty->template_dir = 'templates';
$smarty->compile_dir = 'templates_c';
$smarty->cache_dir = 'cache';
$smarty->config_dir = 'config';
?>