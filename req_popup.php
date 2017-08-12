<?php
/**
 * This is a pop up file for display pop up page.
 * @copyright     Copyright 2016, BigSpire Software (P) Ltd
 * @author        Nikita
 * @created       28-11-2016
 * @link          http://jobsfactory.in
 */

// fetch venue and instructions
$query = "CALL fr_get_client_req_popup('".date('Y-m-d')."', '".$_GET['pagenew']."')";
try{
	if(!$result = $mysql_obj->query($query)){
		throw new Exception('Problem in executing get client req details');
	}
	$row = $mysql_obj->fetch_assoc($result); 
	$smarty->assign('salary', $row['salary']);
	$smarty->assign('client_logo', $row['client_logo']);
	$smarty->assign('position', $row['position']);
	$smarty->assign('qualification', $row['qualification']);
	$smarty->assign('no_vacancy', $row['no_vacancy']);
	$smarty->assign('venue', $row['venue']);
	$smarty->assign('contact_no', $row['contact_no']);
	$smarty->assign('email_address', $row['email_address']);
	$smarty->assign('about_company', $row['about_company']);
	$smarty->assign('company_name', $row['company_name']);
	$smarty->assign('work_loc', $row['work_loc']);
}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
}
$smarty->display('req_popup.tpl');
?>