<?php
/* 
   Purpose : To add job fair.
   Created : Nikitasa
   Date : 17-11-2016 
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
	// job fair date validation
	/*if(($_POST['jobfair_date']) <= date('d/m/Y')){
		$er['jobfair_dateErr'] = 'Please enter correct date'; 
		$test = 'error';		
	}*/
	// contact number size validation
	if($fun->size_of_phonenumber($_POST['cont_no']) == true){
		$er['cont_noErr'] = 'Please enter the valid size'; 
		$test = 'error';		
	}	
	// contact number validation
	if($fun->is_phonenumber($_POST['cont_no']) == true){
		$er['cont_noErr'] = 'Please enter the valid contact number'; 
		$test = 'error';		
	}	
   // email validation
	if($fun->email_validation($_POST['email']) == true){
		$er['emailErr'] = 'Please enter the valid email'; 
		$test = 'error';		
	}	
	// error variables assigning to smarty
	$field_var = array('cont_noErr', 'emailErr', 'jobfair_dateErr');
	foreach ($field_var as $field_var){
		$smarty->assign($field_var,$er[$field_var]);
	}
	// array for printing correct field name in error message
	$fieldtype = array('0', '1', '0', '1', '0', '0','0','0','1');
	$actualfield = array('job fair title', 'job fair date', 'location', 'state', 'venue', 'description',
	'eligibility criteria','other details','status');
   $field = array('title' => 'titleErr', 'jobfair_date' => 'jobfair_dateErr', 'location' => 'locationErr', 
   'state' => 'stateErr', 'venue' => 'venueErr','description' => 'descriptionErr', 'eligibility' => 'eligibilityErr', 
   'other' => 'otherErr', 'status' => 'statusErr');
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
		$uploaddir = 'uploads/'; 
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
	//  pass by default admin users id as 1
	$admin_users_id = '1';
			
	// convert date
	$jobfair_date = $fun->convert_date($_POST['jobfair_date']);
	
	// query to check whether job fair is exist or not. 
	$query = "CALL check_jobfair_exist('0','".$jobfair_date."')";
	// calling the function that makes the insert
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in executing add login');
		}
		$row = $mysql->display_result($result);
		// free the memory
		$mysql->clear_result($result);
		// call the next result
		$mysql->next_query();
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
	
	if(empty($test)){
		if($row['total'] == '0'){
			// query to insert into database. 
			$query = "CALL add_jobfair('".$mysql->real_escape_str($_POST['title'])."', '".$mysql->real_escape_str($jobfair_date)."', 
				'".$mysql->real_escape_str($_POST['location'])."', '".$mysql->real_escape_str($_POST['partner'])."', 
				'".$mysql->real_escape_str($_POST['state'])."', 
				'".$mysql->real_escape_str($_POST['venue'])."', '".$mysql->real_escape_str($_POST['description'])."', 
				'".$mysql->real_escape_str($_POST['eligibility'])."', '".$mysql->real_escape_str($_POST['other'])."', 
				'".$mysql->real_escape_str($_POST['status'])."', '".$mysql->real_escape_str($_POST['contact_person'])."', 
				'".$mysql->real_escape_str($_POST['email'])."', '".$mysql->real_escape_str($_POST['cont_no'])."', 
				'".$date."','".$admin_users_id."')";
			// Calling the function that makes the insert
			try{
				// calling mysql exe_query function
				if(!$result = $mysql->execute_query($query)){
					throw new Exception('Problem in executing add job fair');
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
			
			for ($i = 1; $i <= 3; $i++){
				// query to insert into database. 
				$query = "CALL add_reminder('".$last_id."','".$date."','".$admin_users_id."')";
				// Calling the function that makes the insert
				try{
					// calling mysql exe_query function
					if(!$result = $mysql->execute_query($query)){
						throw new Exception('Problem in executing add reminder');
					}
					// call the next result
					$mysql->next_query();
				}catch(Exception $e){
					echo 'Caught exception: ',  $e->getMessage(), "\n";
				}
			}
		
			// update the attached file
			if(!empty($_FILES['logo']['name'])){
				$new_file = $last_id.'_'.$_FILES['logo']['name'];
				// upload the file
				$path = $uploaddir.$new_file;
				move_uploaded_file($_FILES['logo']['tmp_name'], $path);
				// query to update the file
				$query = "CALL update_logo('".$last_id."','".$new_file."')";
				try{
					if(!$result = $mysql->execute_query($query)){
						throw new Exception('Problem in updating logo file');
					}
					// call the next result
					$mysql->next_query();
				}catch(Exception $e){
					echo 'Caught exception: ',  $e->getMessage(), "\n";
				}
			}
		}else{
			$msg = "Job Fair date already exists";
			$smarty->assign('EXIST_MSG',$msg); 
		}
		if(!empty($last_id)){
			// redirecting to view page
			header("Location: jobfair.php?current_status=created&status=".$_POST['status']."");		
		}
	}
}

// smarty drop down array for status
$smarty->assign('type', array('' => 'Choose any one', '1' => 'Active', '2' => 'Inactive'));
$status = isset($_POST['status']) ? $_POST['status'] : ($_GET['status'] != '' ? $_GET['status'] : '1');
$smarty->assign('status', $status);

// smarty drop down for State
$query = 'CALL get_state()';
try{
	// calling mysql exe_query function
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing get state');
	}
	$states = array();
	$states_id = array();
	while($state = $mysql->display_result($result)){
    	$states[$state['id']] = $state['state_name'];    		   
    	$states_id[] = $state['id'];    		   
	}
	$smarty->assign('state',$states);
	// free the memory
	$mysql->clear_result($result);
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}


// closing mysql
$mysql->close_connection();
// assign page title
$smarty->assign('page_title' , 'Add Job Fair'); 
// display smarty file
$smarty->display('add_jobfair.tpl');
?>