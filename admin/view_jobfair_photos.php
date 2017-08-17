<?php
/* 
   Purpose : To view job fair photos.
   Created : Nikitasa
   Date : 24-01-2017 
*/
session_start(); 
//include smarty config file
include 'configs/smartyconfig.php';
// include mysql class
include('classes/class.mysql.php');
// Connecting Database
$mysql->connect_database();
// include function validation class
include('classes/class.function.php');
// include menu count 
include('menu_count.php');

// get record id   
$id = $_GET['id'];
$get_jobfair_id = $_GET['get_jobfair_id'];
// select and execute query and fetch the result
$query = "CALL view_jobfair_photos('".$get_jobfair_id."')"; 
try{
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing view page');
	}
	// check record exists
	if($result->num_rows){
		// calling mysql fetch_result function
		$obj = $mysql->display_result($result); 
		$smarty->assign('status', $fun->change_status($obj['status'])); 	
		$smarty->assign('data', $obj); 	
	}else{
		header('Location:page_error.php');
	}
	// free the memory
	$mysql->clear_result($result);
	// next query execution
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

$query = "CALL get_photos('$get_jobfair_id')";
try{
	// calling mysql exe_query function
	if(!$result = $mysql->execute_query($query)){ 
		throw new Exception('Problem in executing get job fair photos');
	}
	$i = '0';
	while($obj = $mysql->display_result($result))
	{
 		$data1[] = $obj;
 		$data1[$i]['photo'] = $obj['photo'];
		$i++;
	}  
		
	// free the memory
	$mysql->clear_result($result);
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

// calling mysql close db connection function
$c_c = $mysql->close_connection();

// here assign smarty variables
$smarty->assign('id' , $_GET['id']); 
$smarty->assign('data1', $data1); 
// assign page title
$smarty->assign('page_title' , 'View Job Fair Photos'); 
// display smarty file
$smarty->display('view_jobfair_photos.tpl');
?>