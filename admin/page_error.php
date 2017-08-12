<?php
/* 
Purpose : Page Error.
Created : NIkitasa
Date : 17-11-2016
*/
//include smarty congig file
include 'configs/smartyconfig.php';
$ntfd = 'Not Found';
$msg = 'The requested URL is invalid.';
$smarty->assign('ntfd', $ntfd);
$smarty->assign('msg', $msg);

// display smarty file
$smarty->display('page_error.tpl');
?>