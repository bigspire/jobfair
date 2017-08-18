<?php
/* 
   Purpose : To list and search client photos.
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


$keyword = $_GET['search'];

// to display the data using status filter
if(isset($_GET['status'])){
	$status = $_GET['status'];
}else{
	$status = '1';
}

//post url for paging
if($_GET){
	$post_url .= '&keyword='.$keyword;
	$post_url .= '&status='.$status;
}


// count the total no. of records
$query = "CALL list_client_photo('".$keyword."','".$status."','0','0','','','".$_GET['action']."')";
try{
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing client page');
	}
	// fetch result
	$data_num = $mysql->display_result($result);
	// count result
	$count = $data_num['total'];
	if($count == 0){
		if($keyword){
			$alert_msg = 'No client photos "' .$keyword. '" is found in our database';
		}else{
			$alert_msg = 'No client photos found in our database';
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
$sort_fields = array('1' => 'title','no_of_photos','status','created_date','modified_date');
$org_fields = array('1' => 'title','no_of_photos','status','created_date','modified_date');


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
	$field = 'created_date';			
	$smarty->assign('sort_field_created_date', 'ui-icon ui-icon-carat-1-s');
}		
$smarty->assign('order', $order);
// set the original field for the sql query
if($search_key = array_search($_GET['field'], $sort_fields)){
	$field =  $org_fields[$search_key];
}

// fetch all records
$query = "CALL list_client_photo('".$keyword."','".$status."','$start','$limit','".$field."','".$order."','".$_GET['action']."')";

try{
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing client page');
	}
	// calling mysql fetch_result function
	$i = '0';
	while($obj = $mysql->display_result($result))
	{
 		$data[] = $obj;
 		$data[$i]['status'] = $fun->change_status($obj['status']);
		$data[$i]['status_cls'] = $fun->status_cls($obj['status']);
		$data[$i]['created_date'] = $fun->date_time_format($obj['created_date']);
		$data[$i]['modified_date'] = $fun->date_time_format($obj['modified_date']);
		$data[$i]['drive_date'] = $fun->format_date($obj['drive_date']);
	    $i++;
 		$pno[]=$paging->print_no();
 		$smarty->assign('pno',$pno);
	}

	// assign software status into array 
	$type = array('' => 'All Status', '1' => 'Active', '2' => 'Inactive');

	// create,update,delete message validation
	if($_GET['current_status'] == 'deleted' || $_GET['current_status'] == 'created' || $_GET['current_status'] == 'updated' ){
  		$success_msg = 'Client Req. photos ' . $_GET['current_status'] . ' successfully';
	}else if($_GET['current_status'] == 'msg'){
		$success_msg = 'This record is not available in our database';
	}
	// validating pagination
	$total_pages = ceil($count / $limit);

	// free the memory
	$mysql->clear_result($result);
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
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
$smarty->assign('ALERT_MSG', $alert_msg);
$smarty->assign('SUCCESS_MSG', $success_msg);
$smarty->assign('ERROR_MSG', $erro_msg);
  
// assign page title
$smarty->assign('page_title' , 'Client Photos'); 
// display smarty file
$smarty->display('client_photos.tpl');
?>