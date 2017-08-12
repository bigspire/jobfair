<?php
/* 
   Purpose : To add client req.
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


if(!empty($_POST)){
	// Validating the required fields 
	// from - to date validation
	$fdate=strtotime($fun->convert_date($_POST['start_date']));
	$tdate=strtotime($fun->convert_date($_POST['end_date']));	
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
	if($fun->email_validation($_POST['email']) == true){
		$er['emailErr'] = 'Please enter the valid email'; 
		$test = 'error';		
	}	

	// job fair date validation
	if($_POST['drive_date'] <= date("d/m/Y")){
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
   $field = array('company_name' => 'company_nameErr', 'qualification' => 'qualificationErr', 'email' => 'emailErr', 
   'venue' => 'venueErr', 'work_loc' => 'work_locErr','no_vacancy' => 'no_vacancyErr', 'about_company' => 'about_companyErr', 
   'drive_date' => 'drive_dateErr', 'status' => 'statusErr', 'contact_no' => 'contact_noErr', 'start_date' => 'start_dateErr',
    'end_date' => 'end_dateErr', 'position' => 'positionErr', 'salary' => 'salaryErr');
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
	$drive_date = $fun->convert_date($_POST['drive_date']);
	$start_date = $fun->convert_date($_POST['start_date']);
	$end_date = $fun->convert_date($_POST['end_date']);
	// set admin user id as i
	$admin_users_id = 1;
	
	if(empty($test)){
		// query to insert into database. 
		$query = "CALL add_client_req('".$mysql->real_escape_str($drive_date)."', '".$mysql->real_escape_str($_POST['position'])."', 
			'".$mysql->real_escape_str($_POST['work_loc'])."', '".$mysql->real_escape_str($_POST['qualification'])."', 
			'".$mysql->real_escape_str($_POST['company_name'])."', 
			'".$mysql->real_escape_str($_POST['email'])."', '".$mysql->real_escape_str($_POST['contact_no'])."', 
			'".$mysql->real_escape_str($_POST['no_vacancy'])."', '".$mysql->real_escape_str($_POST['venue'])."', 
			'".$mysql->real_escape_str($_POST['about_company'])."', '".$mysql->real_escape_str($start_date)."', 
			'".$mysql->real_escape_str($end_date)."', '".$mysql->real_escape_str($_POST['status'])."', 
			'".$mysql->real_escape_str($_POST['salary'])."', 
			'".$date."','".$admin_users_id."')";
		// Calling the function that makes the insert
		try{
			// calling mysql exe_query function
			if(!$result = $mysql->execute_query($query)){
				throw new Exception('Problem in executing add client req');
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
		if(!empty($_FILES['client_logo']['name'])){
			$new_file = $last_id.'_'.$_FILES['client_logo']['name'];
			// upload the file
			$path = $uploaddir.$new_file;
			move_uploaded_file($_FILES['client_logo']['tmp_name'], $path);
			// query to update the file
			$query = "CALL update_req_logo('".$last_id."','".$new_file."')";
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
	if(!empty($last_id)){
		// redirecting to view page
		header("Location: client_req.php?current_status=created&status=".$_POST['status']."");		
	}
}

// smarty drop down array for status
$smarty->assign('type', array('' => 'Choose any one', '1' => 'Active', '2' => 'Inactive'));
$status = isset($_POST['status']) ? $_POST['status'] : ($_GET['status'] != '' ? $_GET['status'] : '1');
$smarty->assign('status', $status);

// closing mysql
$mysql->close_connection();
// assign page title
$smarty->assign('page_title' , 'Add Client Req'); 
// display smarty file
$smarty->display('add_client_req.tpl');
?>