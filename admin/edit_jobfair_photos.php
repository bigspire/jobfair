<?php
/* 
   Purpose : To edit job fair photos.
   Created : Nikitasa
   Date : 22-11-2016 
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
	$success_msg = 'Jobfair photo removed successfully!';
	$smarty->assign('success_msg',$success_msg);
} 
	
$get_jobfair_id = $_GET['get_jobfair_id'];
$smarty->assign('get_jobfair_id',$get_jobfair_id);

// validate url 
if(($fun->isnumeric($get_jobfair_id)) || ($fun->is_empty($get_jobfair_id)) || ($get_jobfair_id == 0)){
  header('Location:page_error.php');
}
// if id is not database then redirect to list page
if($get_jobfair_id != ''){

	$query = "CALL check_valid_jobfair_photos('".$get_jobfair_id."')";
	try{
		// calling mysql execute query function
		if(!$result = $mysql->execute_query($query)){ 
			throw new Exception('Problem in checking job fair photo details');
		}
		$row = $mysql->display_result($result);
		$total = $row['total'];
		if($total == 0){ 
			header("Location:jobfair_photos.php?current_status=msg");
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
	$query = "CALL get_jobfair_photos('$get_jobfair_id')";
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){ 
			throw new Exception('Problem in executing get job fair photos');
		}
		$row = $mysql->display_result($result);
		/*$_SESSION['photo'] = $row['photo'];
		$smarty->assign('photo', $_SESSION['photo']);*/
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
	
if(!empty($_POST)){

	// array for printing correct field name in error message
	$fieldtype = array('1','1');
	$actualfield = array('job fair title','status');
    $field = array('jobfair_id' => 'jobfair_idErr','status' => 'statusErr');
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
			$query = "CALL edit_jobfair_photos('".$get_jobfair_id."','".$mysql->real_escape_str($_POST['jobfair_id'])."', 
				'".$mysql->real_escape_str($_POST['status'])."','".$admin_users_id."', '".$date."')";
			// Calling the function that makes the insert
			try{
				// calling mysql exe_query function
				if(!$result = $mysql->execute_query($query)){
					throw new Exception('Problem in executing edit job fair photos');
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
				header("Location: jobfair_photos.php?current_status=updated&status=".$_POST['status']."");		
			}
	  }
}

// smarty drop down array for status
$smarty->assign('type', array('1' => 'Active', '2' => 'Inactive'));

// smarty drop down for State
$query = "CALL get_jobfair_name()";
try{
	// calling mysql exe_query function
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing get jobfair');
	}
	$jobfairs = array();
	$jobfair_id = array();
	while($jobfair = $mysql->display_result($result)){
		if(($jobfairs[$jobfair['id']] = $jobfair['title']) != '') {
    		$jobfairs[$jobfair['id']] = ucwords($jobfair['title']).' ('. $fun->format_date($jobfair['jobfair_date']).')';		   
    		$jobfair_id[] = $jobfair['id'];    
    	}		   
	}
	$smarty->assign('jobfair',$jobfairs);
	// free the memory
	$mysql->clear_result($result);
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}
// closing mysql
$mysql->close_connection();
$smarty->assign('data', $data);
// assign page title
$smarty->assign('page_title' , 'Edit Job Fair Photos'); 
// display smarty file
$smarty->display('edit_jobfair_photos.tpl');
?>