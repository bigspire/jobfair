<?php
/* 
   Purpose : To view job fair.
   Created : Nikitasa
   Date : 17-11-2016 
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
// select and execute query and fetch the result
$query = "CALL view_jobfair('".$id."')"; 
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
			$data[$i]['jobfair_date'] = $fun->created_date_format($obj['jobfair_date']);
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
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

// calling mysql close db connection function
$c_c = $mysql->close_connection();

// here assign smarty variables
$smarty->assign('id' , $_GET['id']); 
$smarty->assign('data', $data); 
// assign page title
$smarty->assign('page_title' , 'View Job Fair'); 
// display smarty file
$smarty->display('view_jobfair.tpl');
?>