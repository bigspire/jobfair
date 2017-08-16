<?php
/* 
   Purpose : To view client photos.
   Created : Nikitasa
   Date : 16-08-2017 
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
$get_client_id = $_GET['get_client_id'];
// select and execute query and fetch the result
$query = "CALL view_client_photos('".$id."')"; 
try{
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing view page');
	}
	// check record exists
	if($result->num_rows){
		// calling mysql fetch_result function
		$i = '0';
		while($obj = $mysql->display_result($result)){  
			$data[] = $obj;
			$data[$i]['company_name'] = $obj['company_name'];
			$data[$i]['position'] = $obj['position'];
			$data[$i]['created_date'] = $fun->date_time_format($obj['created_date']);
			$data[$i]['modified_date'] = $fun->date_time_format($obj['modified_date']);
			$data[$i]['status'] = $fun->change_status($obj['status']);
			$i++;	
		}
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

$query = "CALL get_req_photos('".$get_client_id."')";
try{
	// calling mysql exe_query function
	if(!$result = $mysql->execute_query($query)){ 
		throw new Exception('Problem in executing get client req. photos');
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
$smarty->assign('data', $data); 
$smarty->assign('data1', $data1); 
// assign page title
$smarty->assign('page_title' , 'View Client Photos'); 
// display smarty file
$smarty->display('view_jobfair_photos.tpl');
?>