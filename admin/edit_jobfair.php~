<?php
/* 
   Purpose : To edit job fair.
   Created : Nikitasa
   Date : 18-11-2016 
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
	$query = "CALL check_valid_jobfair('".$getid."')";
	try{
		// calling mysql execute query function
		if(!$result = $mysql->execute_query($query)){ 
			throw new Exception('Problem in checking job fair details');
		}
		$row = $mysql->display_result($result);
		$total = $row['total'];
		if($total == 0){ 
			header("Location:jobfair.php?current_status=msg");
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
	$query = "CALL get_jobfair('$getid')";
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){ 
			throw new Exception('Problem in executing get job fair');
		}
		$row = $mysql->display_result($result);
		$smarty->assign('job_fair_date', $fun->date_display_format($row['jobfair_date']));
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
	if($fun->size_of_phonenumber($_POST['contact_no']) == true){
		$er['cont_noErr'] = 'Please enter the valid size'; 
		$test = 'error';		
	}	
	// contact number validation
	if($fun->is_phonenumber($_POST['contact_no']) == true){
		$er['cont_noErr'] = 'Please enter the valid contact number'; 
		$test = 'error';		
	}	
   // email validation
	if($fun->email_validation($_POST['contact_email']) == true){
		$er['emailErr'] = 'Please enter the valid email'; 
		$test = 'error';		
	}	
	// error variables assigning to smarty
	$field_var = array('cont_noErr', 'emailErr');
	foreach ($field_var as $field_var){
		$smarty->assign($field_var,$er[$field_var]);
	}
	// array for printing correct field name in error message
	$fieldtype = array('0', '1', '0', '1', '0', '0','0','0','1');
	$actualfield = array('job fair title', 'job fair date', 'location', 'state', 'venue', 'description',
	'eligibility criteria','other details','status');
   $field = array('title' => 'titleErr', 'job_fair_date' => 'jobfair_dateErr', 'location' => 'locationErr', 
   'state_id' => 'stateErr', 'venue' => 'venueErr','description' => 'descriptionErr', 'eligibility' => 'eligibilityErr', 
   'others' => 'otherErr', 'status' => 'statusErr');
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
	// convert date
	$jobfair_date = $fun->convert_date($_POST['job_fair_date']);
	//  pass by default admin users id as 1
	$admin_users_id = '1';
	
	// query to check whether job fair is exist or not. 
	$query = "CALL check_jobfair_exist('".$getid."','".$jobfair_date."')";
	// calling the function that makes the insert
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in checking exist jobfair');
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
			$query = "CALL edit_jobfair('".$getid."','".$mysql->real_escape_str($_POST['title'])."', '".$mysql->real_escape_str($jobfair_date)."', 
				'".$mysql->real_escape_str($_POST['location'])."', '".$mysql->real_escape_str($_POST['partner'])."', 
				'".$mysql->real_escape_str($_POST['state_id'])."', 
				'".$mysql->real_escape_str($_POST['venue'])."', '".$mysql->real_escape_str($_POST['description'])."', 
				'".$mysql->real_escape_str($_POST['eligibility'])."', '".$mysql->real_escape_str($_POST['others'])."', 
				'".$mysql->real_escape_str($_POST['status'])."', '".$mysql->real_escape_str($_POST['contact_person'])."', 
				'".$mysql->real_escape_str($_POST['contact_email'])."', '".$mysql->real_escape_str($_POST['contact_no'])."', 
				'".$date."','".$admin_users_id."')";
			// Calling the function that makes the insert
			try{
				// calling mysql exe_query function
				if(!$result = $mysql->execute_query($query)){
					throw new Exception('Problem in executing edit jobfair');
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
			if(!empty($_FILES['logo']['name'])){
				$new_file = $getid.'_'.$_FILES['logo']['name'];
				// upload the file
				$path = $uploaddir.$new_file;
				move_uploaded_file($_FILES['logo']['tmp_name'], $path);
				// query to update the file
				$query = "CALL update_logo('".$getid."','".$new_file."')";
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
		if(!empty($affected_rows)){
			// redirecting to view page
			header("Location: jobfair.php?current_status=updated&status=".$_POST['status']."");		
		}
	}
}

// smarty drop down array for status
$smarty->assign('type', array('1' => 'Active', '2' => 'Inactive'));

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
$smarty->assign('page_title' , 'Edit Job Fair'); 
// display smarty file
$smarty->display('edit_jobfair.tpl');
?>