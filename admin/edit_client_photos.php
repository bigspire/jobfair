<?php
/* 
   Purpose : To edit Client photos.
   Created : Nikitasa
   Date : 16-08-2017 
*/
session_start();
//include smarty congig file
include 'configs/smartyconfig.php';
// include mysql class
include('classes/class.mysql.php');
// Connecting Database
$mysql->connect_database();
// include function validation class
include('classes/class.function.php');
// include paging class 
include('classes/class.paging.php');
// include menu count 
include('menu_count.php');

// image removal msg
if($_GET['action'] == 'deleted'){
	$success_msg = 'Client Req. photo removed successfully!';
	$smarty->assign('success_msg',$success_msg);
} 

$get_client_id = $_GET['get_client_id'];
$smarty->assign('get_client_id',$get_client_id);


// validate url 
if(($fun->isnumeric($get_client_id)) || ($fun->is_empty($get_client_id)) || ($get_client_id == 0)){
  header('Location:page_error.php');
}
// if id is not database then redirect to list page
if($get_client_id != ''){
	$query = "CALL check_valid_client_req_photos('".$get_client_id."')";
	try{
		// calling mysql execute query function
		if(!$result = $mysql->execute_query($query)){ 
			throw new Exception('Problem in checking client req. photo details');
		}
		$row = $mysql->display_result($result);
		$total = $row['total'];
		if($total == 0){ 
			header("Location:client_photos.php?current_status=msg");
		}
		// free the memory
		$mysql->clear_result($result);
		// next query execution
		$mysql->next_query();
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
}

// get database values
if(empty($_POST)){
	$query = "CALL get_client_req_photos('$get_client_id')";
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){ 
			throw new Exception('Problem in executing get client req. photos');
		}
		$row = $mysql->display_result($result);
		$smarty->assign('rows',$row);
		// assign the db values into session
		foreach($row as $key => $record){
			$smarty->assign($key,$record);		
		}  
		
		// free the memory
		$mysql->clear_result($result);
		// next query execution
		$mysql->next_query();
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
	
	$query = "CALL get_req_photos('$get_client_id')";
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){ 
			throw new Exception('Problem in executing get client photos');
		}
		$i = '0';
		while($obj = $mysql->display_result($result))
		{
 			$data[] = $obj;
 			$data[$i]['photo'] = $obj['photo'];
 			$_SESSION['photo'] = $obj['photo'];
			$smarty->assign('photo', $_SESSION['photo']);
			$i++;
		}  
		
		// free the memory
		$mysql->clear_result($result);
		// next query execution
		$mysql->next_query();
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
}
if(!empty($_POST)){
	
	// array for printing correct field name in error message
	$fieldtype = array('1', '1');
	$actualfield = array('Client Req. title','status');
   $field = array('client_id' => 'client_idErr','status' => 'statusErr');
	$j = 0;
	foreach ($field as $field => $er_var){ 
		if($_POST[$field] == ''){
			$error_msg = $fieldtype[$j] ? ' select the ' : ' enter the ';
			$actual_field =  $actualfield[$j];
			$er[$er_var] = 'Please'. $error_msg .$actual_field;
			$test = 'error';
			$smarty->assign($er_var,$er[$er_var]);
		}else{
			$smarty->assign($field,$_POST[$field]);	
		}
		$j++;
	}
	
	// assigning the current date
	$date = $fun->current_date();
	
	// assign admin user is as 1
	$admin_users_id = 1;
	if(empty($test)){
			// query to insert into database. 
			$query = "CALL edit_client_req_photos('".$get_client_id."','".$mysql->real_escape_str($_POST['client_id'])."', 
				'".$mysql->real_escape_str($_POST['status'])."','".$admin_users_id."', '".$date."')";
			// Calling the function that makes the insert
			try{
				// calling mysql exe_query function
				if(!$result = $mysql->execute_query($query)){
					throw new Exception('Problem in executing edit client req. photos');
				}
				$row = $mysql->display_result($result);
				$affected_rows = $row['affected_rows'];
				// free the memory
				$mysql->clear_result($result);
				// call the next result
				$mysql->next_query();
			}catch(Exception $e){
				echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
		
			if(!empty($affected_rows)){
				// redirecting to view page
				header("Location: client_photos.php?current_status=updated&status=".$_POST['status']."");		
			}
	  }
}

// smarty drop down array for status
$smarty->assign('type', array('1' => 'Active', '2' => 'Inactive'));

// smarty drop down for State
$query = "CALL get_client_name()";
try{
	// calling mysql exe_query function
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing get client');
	}
	$clients = array();
	$client_id = array();
	while($client = $mysql->display_result($result)){
    	$clients[$client['id']] = ucwords($client['company_name']).' ('. $fun->format_date($client['drive_date']).')';    		   
    	$client_id[] = $client['id'];    		   
	}
	$smarty->assign('client',$clients);
	// free the memory
	$mysql->clear_result($result);
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}
// closing mysql
$mysql->close_connection();
$smarty->assign('data', $data);
// assign page title
$smarty->assign('page_title' , 'Edit Client Photos'); 
// display smarty file
$smarty->display('edit_client_photos.tpl');
?>