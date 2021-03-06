<?php
/* 
   Purpose : To edit client req.
   Created : Nikitasa
   Date : 28-11-2016 
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
	$query = "CALL check_valid_client_req('".$getid."')";
	try{
		// calling mysql execute query function
		if(!$result = $mysql->execute_query($query)){ 
			throw new Exception('Problem in checking client requirement details');
		}
		$row = $mysql->display_result($result);
		$total = $row['total'];
		if($total == 0){ 
			header("Location:client_req.php?current_status=msg");
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
	$query = "CALL get_client_req('$getid')";
	try{
		// calling mysql exe_query function
		if(!$result = $mysql->execute_query($query)){ 
			throw new Exception('Problem in executing get job fair');
		}
		$row = $mysql->display_result($result);
		$smarty->assign('job_drive_date', $fun->date_display_format($row['drive_date']));
		$smarty->assign('job_start_date', $fun->date_display_format($row['start_date']));
		$smarty->assign('job_end_date', $fun->date_display_format($row['end_date']));
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
	// from - to date validation
	$fdate=strtotime($fun->convert_date($_POST['job_start_date']));
	$tdate=strtotime($fun->convert_date($_POST['job_end_date']));	
	if($fun->validity_diff($fdate, $tdate) != true){
		$validityE = 'Please select the correct end date'; 
		$test = 'error';		
		$smarty->assign('end_dateErr',$validityE);
	}
	// contact number size validation
	if($fun->size_of_phonenumber($_POST['contact_no']) == true){
		$er['contact_noErr'] = 'Please enter the valid size'; 
		$test = 'error';		
	}	
	// contact number validation
	if($fun->is_phonenumber($_POST['contact_no']) == true){
		$er['contact_noErr'] = 'Please enter the valid contact number'; 
		$test = 'error';		
	}	
	// no of vacancy validation
	if($fun->is_phonenumber($_POST['no_vacancy']) == true){
		$er['no_vacancyErr'] = 'Please enter only numerics'; 
		$test = 'error';		
	}
   // email validation
	if($fun->email_validation($_POST['email_address']) == true){
		$er['emailErr'] = 'Please enter the valid email'; 
		$test = 'error';		
	}	
	
	// job fair date validation
	if($_POST['job_drive_date'] >= date("d/m/Y")){
		$er['drive_dateErr'] = 'Please enter valid drive date'; 
		$test = 'error';		
	}
	// error variables assigning to smarty
	$field_var = array('contact_noErr', 'emailErr', 'no_vacancyErr', 'drive_dateErr');
	foreach ($field_var as $field_var){
		$smarty->assign($field_var,$er[$field_var]);
	}
	// array for printing correct field name in error message
	$fieldtype = array('0', '0', '0', '0', '0', '0','0','1','1','0','1','1','0','0');
	$actualfield = array('company name', 'qualification', 'email', 'venue', 'work location',
	'vacancy','company details','drive date', 'status', 'contact no', 'start date', 'end date', 'position', 'salary');
   $field = array('company_name' => 'company_nameErr', 'qualification' => 'qualificationErr', 'email_address' => 'emailErr', 
   'venue' => 'venueErr', 'work_loc' => 'work_locErr','no_vacancy' => 'no_vacancyErr', 'about_company' => 'about_companyErr', 
   'job_drive_date' => 'drive_dateErr', 'status' => 'statusErr', 'contact_no' => 'contact_noErr', 'job_start_date' => 'start_dateErr',
    'job_end_date' => 'end_dateErr', 'position' => 'positionErr', 'salary' => 'salaryErr');
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
	if(!empty($_FILES['client_logo']['name'])){
		// upload directory
		$uploaddir = 'uploads/req_logo/'; 
		$attachmentsize = $_FILES['client_logo']['size'];
		$attachmenttype = $_FILES['client_logo']['type'];		
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
	$drive_date = $fun->convert_date($_POST['job_drive_date']);
	$start_date = $fun->convert_date($_POST['job_start_date']);
	$end_date = $fun->convert_date($_POST['job_end_date']);
	// set admin user id as i
	$admin_users_id = 1;
	
	if(empty($test)){
		// query to insert into database. 
		$query = "CALL edit_client_req('".$getid."','".$mysql->real_escape_str($drive_date)."', '".$mysql->real_escape_str($_POST['position'])."', 
			'".$mysql->real_escape_str($_POST['work_loc'])."', '".$mysql->real_escape_str($_POST['qualification'])."', 
			'".$mysql->real_escape_str($_POST['company_name'])."', 
			'".$mysql->real_escape_str($_POST['email_address'])."', '".$mysql->real_escape_str($_POST['contact_no'])."', 
			'".$mysql->real_escape_str($_POST['no_vacancy'])."', '".$mysql->real_escape_str($_POST['venue'])."', 
			'".$mysql->real_escape_str($_POST['about_company'])."', '".$mysql->real_escape_str($start_date)."', 
			'".$mysql->real_escape_str($end_date)."', '".$mysql->real_escape_str($_POST['status'])."', 
			 '".$mysql->real_escape_str($_POST['salary'])."', 
			'".$date."','".$admin_users_id."')";
		// Calling the function that makes the insert
		try{
			// calling mysql exe_query function
			if(!$result = $mysql->execute_query($query)){
				throw new Exception('Problem in executing edit client req');
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
		if(!empty($_FILES['client_logo']['name'])){
			$new_file = $getid.'_'.$_FILES['client_logo']['name'];
			// upload the file
			$path = $uploaddir.$new_file;
			move_uploaded_file($_FILES['client_logo']['tmp_name'], $path);
			// query to update the file
			$query = "CALL update_req_logo('".$getid."','".$new_file."')";
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
	}
	if(!empty($affected_rows)){
		// redirecting to view page
		header("Location: client_req.php?current_status=updated&status=".$_POST['status']."");		
	}
}

// smarty drop down array for status
$smarty->assign('type', array('' => 'Choose any one', '1' => 'Active', '2' => 'Inactive'));

// closing mysql
$mysql->close_connection();
// assign page title
$smarty->assign('page_title' , 'Edit Client Req'); 
// display smarty file
$smarty->display('edit_client_req.tpl');
?>