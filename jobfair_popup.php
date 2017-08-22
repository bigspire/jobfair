<?php
/**
 * This is a pop up file for display pop up page.
 * @copyright     Copyright 2016, BigSpire Software (P) Ltd
 * @author        Nikita
 * @created       22-11-2016
 * @link          http://jobsfactory.in
 */


// fetch venue and instructions
$query = "CALL fr_get_jobfair_popup('".date('Y-m-d')."', '".$_GET['pagenew']."')";
try{
	if(!$result_data = $mysql_obj->query($query)){
		throw new Exception('Problem in executing get job fair details');
	}
	while($row[] = $mysql_obj->fetch_assoc($result_data)){ 
		// fetch logos for the jobfair
		$query = "CALL fr_get_jobfair_logos_popup('".$row[0]['id']."')";
		try{
			if(!$result = $mysql_obj->query($query)){
				throw new Exception('Problem in executing get job fair logos details');
			}
			while($obj[] = $mysql_obj->fetch_assoc($result)){ 
				$smarty->assign('data', $obj);
				$smarty->assign('recent', '1');
			}
		}catch(Exception $e){
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
		// get random logos from the prev. job fair
		if(count($obj) <= 1){
			// fetch logos
			$query = "CALL fr_get_alter_jobfair_logos_popup()";
			try{
				if(!$result = $mysql_obj->query($query)){
					throw new Exception('Problem in executing get job fair logos details');
				}
				while($obj[] = $mysql_obj->fetch_assoc($result)){ 
					$smarty->assign('data', $obj);
					$smarty->assign('recent', '2');
				}
			}catch(Exception $e){
				echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
		}
	}
	$smarty->assign('fair_data', array_filter($row));
	
}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
}


// fetch photos
$query = "CALL fr_get_jobfair_photo_popup()";
try{
	if(!$result = $mysql_obj->query($query)){
		throw new Exception('Problem in executing get job fair photo details');
	}
	while($object[] = $mysql_obj->fetch_assoc($result)){ 
		$smarty->assign('photo_data', $object);

	}

}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}



$smarty->display('jobfair_popup.tpl');
?>
