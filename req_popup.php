<?php
/**
 * This is a pop up file for display pop up page.
 * @copyright     Copyright 2016, BigSpire Software (P) Ltd
 * @author        Nikita
 * @created       22-11-2016
 * @link          http://jobsfactory.in
 */

// fetch venue and instructions
$query = "CALL fr_get_client_req_popup('".date('Y-m-d')."', '".$_GET['pagenew']."')";
try{
	if(!$result_data = $mysql_obj->query($query)){
		throw new Exception('Problem in executing get req. pop up details');
	}
	while($row[] = $mysql_obj->fetch_assoc($result_data)){ 
		// fetch logos for the jobfair		
	}
	$smarty->assign('fair_data', $row);
	
}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
}


// fetch photos
$query = "CALL fr_get_req_photo_popup()";
try{
	if(!$result = $mysql_obj->query($query)){
		throw new Exception('Problem in executing get req photo details');
	}
	while($object[] = $mysql_obj->fetch_assoc($result)){ 
		$smarty->assign('photo_data', $object);

	}
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}
$smarty->display('req_popup.tpl');

?>