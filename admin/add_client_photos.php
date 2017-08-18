<?php
/* 
   Purpose : To add Client photos.
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

if(!empty($_POST)){
	// Validating the required fields 
	// contact number size validation
	if(!isset($_POST['req_photo']) && empty($_FILES['req_photo']['name'])){
		$smarty->assign('req_photoErr', 'Please upload the photos');	
		$test = 'error';		
	}
	
	// array for printing correct field name in error message
	$fieldtype = array('1', '1');
	$actualfield = array('Client Req. title','status');
   $field = array('client_id' => 'client_idErr', 'status' => 'statusErr');
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
	
	$req_size = 3145728;
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
		
		// checking the file size is less than 3 MB		
		else if($fun->size_validation($attachmentsize,$req_size)){
			$attachmentuploadErr = 'Attachment file size must be less than 3 MB';
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
			$query = "CALL add_client_photos('".$mysql->real_escape_str($_POST['client_id'])."',
		 	'".$mysql->real_escape_str($_POST['status'])."','".$admin_users_id."', '".$date."')";
			// Calling the function that makes the insert
			try{
				// calling mysql exe_query function
				if(!$result = $mysql->execute_query($query)){
					throw new Exception('Problem in executing add client photos');
				}
				$row = $mysql->display_result($result);
				$last_id = $row['inserted_id'];
				// free the memory
				$mysql->clear_result($result);
				// call the next result
				$mysql->next_query();
			}catch(Exception $e){
				echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
		
			// update the attached file
			if(!empty($_FILES['req_photo']['name'])){
				$new_file = $last_id.'_'.$_FILES['req_photo']['name'];
				// upload the file
				$path = $uploaddir.$new_file;
				move_uploaded_file($_FILES['req_photo']['tmp_name'], $path);
				// query to update the file
				$query = "CALL update_client_req_photo('".$last_id."','".$new_file."')";
				try{
					if(!$result = $mysql->execute_query($query)){
						throw new Exception('Problem in updating client photo file');
					}
					$obj = $mysql->display_result($result);
					$affected_rows = $obj['affected_rows'];
					// call the next result
					$mysql->next_query();
				}catch(Exception $e){
					echo 'Caught exception: ',  $e->getMessage(), "\n";
				}
			}
			if(!empty($last_id) && !empty($affected_rows)){
				// redirecting to list page
				header("Location: client_photos.php?current_status=created&status=".$_POST['status']."");		
			}
	  }
}

// smarty drop down array for status
$smarty->assign('type', array('' => 'Choose any one', '1' => 'Active', '2' => 'Inactive'));
// status field validation
$status = isset($_POST['status']) ? $_POST['status'] : ($_GET['status'] != '' ? $_GET['status'] : '1');
$smarty->assign('status', $status);

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
// assign page title
$smarty->assign('page_title' , 'Add Client Photos'); 
// display smarty file
$smarty->display('add_client_photos.tpl');
?>