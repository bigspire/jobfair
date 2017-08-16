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

$getid = $_GET['id'];
$get_jobfair_id = $_GET['get_jobfair_id'];
$smarty->assign('getid',$getid);

// validate url 
if(($fun->isnumeric($getid)) || ($fun->is_empty($getid)) || ($getid == 0)){
  header('Location:page_error.php');
}
// if id is not database then redirect to list page
if($getid !=''){
	$query = "CALL check_valid_client_req_photos('".$getid."')";
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
	$query = "CALL get_client_req_photos('$getid')";
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){ 
			throw new Exception('Problem in executing get client req. photos');
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
	
	$query = "CALL get_req_photos('$get_jobfair_id')";
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
	// Validating the required fields 
	
	// upload field validation
	if(empty($_SESSION['photo'])){
		$smarty->assign('photoErr', 'Please upload the photos');	
		$test = 'error';		
	}
	
	// array for printing correct field name in error message
	$fieldtype = array('1', '0', '1', '1');
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
	
	$req_size = 1048576;
	// upload the file if attached
	if(!empty($_FILES['req_photo']['name'])){
		// upload directory
		$uploaddir = 'uploads/req_photo/'; 
		$attachmentsize = $_FILES['req_photo']['size'];
		$attachmenttype = $_FILES['req_photo']['type'];		
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
			$query = "CALL edit_client_req_photos('".$getid."','".$mysql->real_escape_str($_POST['client_id'])."', 
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
		
			// update the attached file
			if(!empty($_FILES['photo']['name'])){
				$new_file = $getid.'_'.$_FILES['photo']['name'];
				// $smarty->assign('new_file',$_SESSION['new_file']);
				// upload the file
				$path = $uploaddir.$new_file;
				move_uploaded_file($_FILES['photo']['tmp_name'], $path);
				// query to update the file
				$query = "CALL update_client_req_photo('".$getid."','".$new_file."')";
				try{
					if(!$result = $mysql->execute_query($query)){
						throw new Exception('Problem in updating client req. photo file');
					}
					// call the next result
					$mysql->next_query();
				}catch(Exception $e){
					echo 'Caught exception: ',  $e->getMessage(), "\n";
				}
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