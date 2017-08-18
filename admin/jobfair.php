<?php
/* 
   Purpose : To list and search job fair.
   Created : Nikitasa
   Date : 16-11-2016 
*/

session_start(); 
//include smarty config file
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

$keyword = $_GET['search'];
$f_date = $_GET['date_from'];
$t_date = $_GET['date_to'];    
$from_date = $fun->convert_date($f_date);
$to_date = $fun->convert_date($t_date); 

// to display the data using status filter
if(isset($_GET['status'])){
	$status = $_GET['status'];
}else{
	$status = '1';
}

// post url for paging
if($_GET){
	$post_url .= '&keyword='.$keyword;
	$post_url .= '&status='.$status;
	$post_url .= '&f_date='.$f_date;
	$post_url .= '&t_date='.$t_date;
}


// count the total no. of records
$query = "CALL list_jobfair('".$keyword."','".$status."','".$from_date."','".$to_date."','0','0','','','".$_GET['action']."')";
try{
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing job fair page');
	}
	// fetch result
	$data_num = $mysql->display_result($result);
	// count result
	$count = $data_num['total'];
	if($count == 0){
		if($keyword){
			$alert_msg = 'No job fair "' .$keyword. '" is found in our database';
		}else{
			$alert_msg = 'No job fair found in our database';
		}
	}
	$page = $_GET['page'] ?  $_GET['page'] : 1;
	$limit = 10;
	include('paging_call.php');	

	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}
// set the condition to check ascending or descending order		
$order = ($_GET['order'] == 'desc') ? 'asc' :  'desc';	
$sort_fields = array('1' => 'title','jobfair_date','location','partner','status','created_date','modified_date');
$org_fields = array('1' => 'title','jobfair_date', 'location','partner','status','created_date','modified_date');


// to set the sorting image
foreach($sort_fields as $key => $s_field){
	if($s_field != $_GET['field']){ 
		$smarty->assign('sort_field_'.$s_field, "ui-icon ui-icon-carat-2-n-s");	
	}else{	
		if($_GET['order'] == 'desc'){
			$smarty->assign('sort_field_'.$_GET['field'], "ui-icon ui-icon-carat-1-s");
		}else{
			$smarty->assign('sort_field_'.$_GET['field'], "ui-icon ui-icon-carat-1-n");
		}		
	}			
}
// if no fields are set, set default sort image
if(empty($_GET['field']) && empty($keyword)){		
	$order = 'desc';			
	$field = 'j.created_date';			
	$smarty->assign('sort_field_created_date', 'ui-icon ui-icon-carat-1-s');
}	
$smarty->assign('order', $order);
// set the original field for the sql query
if($search_key = array_search($_GET['field'], $sort_fields)){
	$field =  $org_fields[$search_key];
}

// fetch all records
$query = "CALL list_jobfair('".$keyword."','".$status."','".$from_date."','".$to_date."','$start','$limit','".$field."','".$order."','".$_GET['action']."')";

try{
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing job fair page');
	}
	// calling mysql fetch_result function
	$i = '0';
	while($obj = $mysql->display_result($result))
	{
 		$data[] = $obj;
 		$data[$i]['status'] = $fun->change_status($obj['status']);
		$data[$i]['status_cls'] = $fun->status_cls($obj['status']);
		$data[$i]['jobfair_date'] = $fun->created_date_format($obj['jobfair_date']);
		$data[$i]['jobfair'] = $obj['jobfair_date'];
		$data[$i]['created_date'] = $fun->date_time_format($obj['created_date']);
		$data[$i]['modified_date'] = $fun->date_time_format($obj['modified_date']);
	    $i++;
 		$pno[]=$paging->print_no();
 		$smarty->assign('pno',$pno);
	}

	// assign software status into array 
	$type = array('' => 'All Status', '1' => 'Active', '2' => 'Inactive');

	// create,update,delete message validation
	if($_GET['current_status'] == 'deleted' || $_GET['current_status'] == 'created' || $_GET['current_status'] == 'updated' ){
  		$success_msg = 'Job Fair  ' . $_GET['current_status'] . ' successfully';
	}else if($_GET['current_status'] == 'msg'){
		$success_msg = 'This record is not available in our database';
	}	
	// validating pagination
	$total_pages = ceil($count / $limit);

	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

// get current date 
$current_date = $fun->display_date();
// call to export the excel data
if($_GET['action'] == 'export'){ 
	include('classes/class.excel.php');
	$excelObj = new libExcel();
	
	// fetch all records
	$query = "CALL get_jobfair_reg_details('".$_GET['id']."')";

	try{
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in executing job fair excel page');
		}
		// calling mysql fetch_result function
		$i = '0';
		while($obj = $mysql->display_result($result))
		{
			$dataexcl[] = $obj;
			$i++;
		}
		// free the memory
		$mysql->clear_result($result);
	}catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
	
	// function to print the excel header
	$excelObj->printHeader($header = array('Name','Email','Mobile','Degree','Spec.','Registered On') ,$col = array('A','B','C','D','E','F'));  
	// function to print the excel data
	$excelObj->printCell($dataexcl, $count,$col = array('A','B','C','D','E','F'), $field = array('full_name','email_id','mobile_no1','course_name','specialization','created_date'),'Jobfair_'.$current_date);
}

// calling mysql close db connection function
$c_c = $mysql->close_connection();

$paging->posturl($post_url);

// assign smarty variables here
$smarty->assign('page_links',$paging->print_link_frontend());
$smarty->assign('type', $type);
$smarty->assign('status', $status);
$smarty->assign('data', $data);
$smarty->assign('page' , $page); 
$smarty->assign('total_pages' , $total_pages); 	
$smarty->assign('keyword' , $keyword); 
$smarty->assign('f_date', $f_date);
$smarty->assign('t_date', $t_date);	
$smarty->assign('ALERT_MSG', $alert_msg);
$smarty->assign('SUCCESS_MSG', $success_msg);
$smarty->assign('ERROR_MSG', $erro_msg);
$smarty->assign('current_date', date('Y-m-d'));
// assign page title
$smarty->assign('page_title' , "Job Fair");  
// display smarty file
$smarty->display('jobfair.tpl');
?>