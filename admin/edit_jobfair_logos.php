<?php
/* 
   Purpose : To edit job fair logos.
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


$getid = $_GET['id'];
$smarty->assign('getid',$getid);
// validate url 
if(($fun->isnumeric($getid)) || ($fun->is_empty($getid)) || ($getid == 0)){
  header('Location:page_error.php');
}
// if id is not database then redirect to list page
if($getid !=''){
	$query = "CALL check_valid_jobfair_logo('".$getid."')";
	try{
		// calling mysql execute query function
		if(!$result = $mysql->execute_query($query)){ 
			throw new Exception('Problem in checking job fair logo details');
		}
		$row = $mysql->display_result($result);
		$total = $row['total'];
		if($total == 0){ 
			header("Location:jobfair_logos.php?current_status=msg");
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
	$query = "CALL get_jobfair_logos('$getid')";
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){ 
			throw new Exception('Problem in executing get job fair');
		}
		$row = $mysql->display_result($result);
		$_SESSION['log'] = $row['logo'];
		$smarty->assign('log', $_SESSION['log']);
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
if(!empty($_POST)){
	// Validating the required fields 
	
	// contact number size validation
	if(empty($_SESSION['log'])){
		$smarty->assign('logoErr', 'Please upload the logo');	
		$test = 'error';		
	}
	
	// array for printing correct field name in error message
	$fieldtype = array('1', '0', '1', '1');
	$actualfield = array('job fair title', 'company name','status');
   $field = array('jobfair_id' => 'jobfair_idErr', 'company_name' => 'company_nameErr', 'status' => 'statusErr');
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
	
	$req_size = 1048576;
	// upload the file if attached
	if(!empty($_FILES['log']['name'])){
		// upload directory
		$uploaddir = 'uploads/logo/'; 
		$attachmentsize = $_FILES['log']['size'];
		$attachmenttype = $_FILES['log']['type'];		
		// file extensions
		$extensions = array('jpeg','jpg','png','gif','pdf','zip'); 
		$attachment_ext = explode('/', $attachmenttype)	;
		$attach_ext = end($attachment_ext); 
		// checking the file extension is jpg,jpeg,pdf,zip or png
		if($fun->extension_validation($attach_ext,$extensions) == true){		
			$attachmentuploadErr = 'Attachment must be jpg, jpeg, png';
			$test = 'error';
		}
		// checking the file size is less than 1 MB		
		else if($fun->size_validation($attachmentsize,$req_size)){
			$attachmentuploadErr = 'Attachment file size must be less than 1 MB';
			$test = 'error';
		}				
	}	
	$smarty->assign('attachmentuploadErr', $attachmentuploadErr);	
	
	// assigning the current date
	$date = $fun->current_date();
	
	// assign admin user is as 1
	$admin_users_id = 1;
	if(empty($test)){
			// query to insert into database. 
			$query = "CALL edit_jobfair_logos('".$getid."','".$mysql->real_escape_str($_POST['jobfair_id'])."', '".$mysql->real_escape_str($_POST['job_url'])."', 
				'".$mysql->real_escape_str($_POST['company_name'])."', '".$mysql->real_escape_str($_POST['status'])."',
				'".$admin_users_id."', '".$date."')";
			// Calling the function that makes the insert
			try{
				// calling mysql exe_query function
				if(!$result = $mysql->execute_query($query)){
					throw new Exception('Problem in executing edit job fair logo');
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
		
			// update the attached file
			if(!empty($_FILES['log']['name'])){
				$new_file = $getid.'_'.$_FILES['log']['name'];
				// $smarty->assign('new_file',$_SESSION['new_file']);
				// upload the file
				$path = $uploaddir.$new_file;
				move_uploaded_file($_FILES['log']['tmp_name'], $path);
				// query to update the file
				$query = "CALL update_jobfair_logo('".$getid."','".$new_file."')";
				try{
					if(!$result = $mysql->execute_query($query)){
						throw new Exception('Problem in updating job fair logo file');
					}
					// call the next result
					$mysql->next_query();
				}catch(Exception $e){
					echo 'Caught exception: ',  $e->getMessage(), "\n";
				}
			}
			if(!empty($affected_rows)){
				// redirecting to view page
				header("Location: jobfair_logos.php?current_status=updated&status=".$_POST['status']."");		
			}
	  }
}

// smarty drop down array for status
$smarty->assign('type', array('1' => 'Active', '2' => 'Inactive'));

if($row['jobfair_id'] != ''){
	// smarty drop down for State
	$query = "CALL get_jobfair_name('".$row['jobfair_id']."')";
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
}else{
	// smarty drop down for State
	$query = "CALL get_jobfair_name('')";
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
}

// closing mysql
$mysql->close_connection();
// assign page title
$smarty->assign('page_title' , 'Edit Job Fair Logo'); 
// display smarty file
$smarty->display('edit_jobfair_logos.tpl');
?>