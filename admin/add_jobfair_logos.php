<?php
/* 
   Purpose : To add job fair logos.
   Created : Nikitasa
   Date : 19-11-2016 
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
	if(!isset($_POST['logo']) && empty($_FILES['logo']['name'])){
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
	if(!empty($_FILES['logo']['name'])){
		// upload directory
		$uploaddir = 'uploads/logo/'; 
		$attachmentsize = $_FILES['logo']['size'];
		$attachmenttype = $_FILES['logo']['type'];		
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
			$query = "CALL add_jobfair_logos('".$mysql->real_escape_str($_POST['jobfair_id'])."', '".$mysql->real_escape_str($_POST['url'])."', 
				'".$mysql->real_escape_str($_POST['company_name'])."', '".$mysql->real_escape_str($_POST['status'])."',
				'".$admin_users_id."', '".$date."')";
			// Calling the function that makes the insert
			try{
				// calling mysql exe_query function
				if(!$result = $mysql->execute_query($query)){
					throw new Exception('Problem in executing add job fair logo');
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
			if(!empty($_FILES['logo']['name'])){
				$new_file = $last_id.'_'.$_FILES['logo']['name'];
				// $smarty->assign('new_file',$_SESSION['new_file']);
				// upload the file
				$path = $uploaddir.$new_file;
				move_uploaded_file($_FILES['logo']['tmp_name'], $path);
				// query to update the file
				$query = "CALL update_jobfair_logo('".$last_id."','".$new_file."')";
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
			if(!empty($last_id)){
				// redirecting to view page
				header("Location: jobfair_logos.php?current_status=created&status=".$_POST['status']."");		
			}
	  }
}

// smarty drop down array for status
$smarty->assign('type', array('' => 'Choose any one', '1' => 'Active', '2' => 'Inactive'));
// status field validation
$status = isset($_POST['status']) ? $_POST['status'] : ($_GET['status'] != '' ? $_GET['status'] : '1');
$smarty->assign('status', $status);

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
    	$jobfairs[$jobfair['id']] = ucwords($jobfair['title']).' ('. $fun->format_date($jobfair['jobfair_date']).')';    		   
    	$jobfair_id[] = $jobfair['id'];    		   
	}
	$smarty->assign('jobfair',$jobfairs);
	// free the memory
	$mysql->clear_result($result);
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}
// closing mysql
$mysql->close_connection();
// assign page title
$smarty->assign('page_title' , 'Add Job Fair Logo'); 
// display smarty file
$smarty->display('add_jobfair_logos.tpl');
?>