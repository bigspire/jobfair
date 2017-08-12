<?php
// get the inbox record count and assign it in smarty
$sql_count_job_alerts = "call fr_get_interview_call_unread_count('".$_SESSION['user_id']."')"; 
if(!$get_count_query_ja = $mysql_obj->query($sql_count_job_alerts)){
	throw new Exception('Problem in executing get job alerts count');
}
if($get_count_query_res_ja = $mysql_obj->fetch_array($get_count_query_ja)){
	$count_ja = $get_count_query_res_ja['read_status'];
	$smarty->assign('count_ja', $count_ja);
}

/* for job posting alert counts */	
$reg_date = explode('-', $_SESSION['USER_CREATED']);		
$path = "uploads/read_info/posting/"; 
$file_name = $fn->check_posting_read_exists($path, $reg_date);	
if($_GET['pagen'] == 'view_posting_alerts' || ($_POST['selected_msgs'] != '' && $_POST['job_action'] != '')) {
		$file_name = $fn->check_posting_read_exists($path, $reg_date);
		if($_GET['by'] == 'posting_alerts' && $_POST['job_action'] != ''){
		$_POST['selected_msgs'][0] = $_GET['id'];
	}
		if($_POST['selected_msgs'] != '' && $_POST['job_action'] != ''){
			foreach($_POST['selected_msgs'] as $enid){
				$cid = $cfn->decrypt($enid,'','');
				$f_res = $fn->file_insert_job_id($path.$file_name,$cid,$cfn->encrypt($_SESSION['user_id']),$_POST['job_action']);
			}
		}else{
			$f_res = $fn->file_insert_job_id($path.$file_name,$id,$cfn->encrypt($_SESSION['user_id']));
		}
		
}
if(!$file_name) { 
	// create the file for the user_error
	$fn->create_posting_read_file($path, $cfn->encrypt($_SESSION['user_id']),$reg_date);		
}else{
	if(!is_writable($path.$file_name)) {	
		echo 'problem in creating the file '.$file_name; 
	}
	$read_id = $fn->get_posting_read_file($path.$file_name, $cfn->encrypt($_SESSION['user_id']));
	$read_array = explode(',',$read_id);			
	foreach($read_array as $key => $value){
		$value = trim($value);
		if($value != '') {
			$read_job_array[$key] = $value;
		}
	}
}

		
		
// find the count of job posting alerts			
$sql_count_job_posting = "call fr_list_posting_alerts('','','$searchtxt','0','0','".$fn->print_date()."','".$_SESSION['user_id']."')";
$result_query_job_posting = $mysql_obj->query($sql_count_job_posting);
$result_query_job_posting_count = $mysql_obj->fetch_array($result_query_job_posting);
$smarty->assign('total_records',$result_query_job_posting_count['count']);
// substract the total records and read records
$unread_job_posting_count = $result_query_job_posting_count['count'] - count($read_job_array);

$smarty->assign("TOTAL_UNREAD", $unread_job_posting_count);

/* for inbox - employment news and kenowledge centre counts */	
// get the job seeker keywords for listing argument
$sql_get_keywords = "call fr_job_seekers_keywords('".$_SESSION['user_id']."')"; 
if(!$get_keywords = $mysql_obj->query($sql_get_keywords)){
	throw new Exception('Problem in executing get keywords');
}
if($get_keywords_res1 = $mysql_obj->fetch_array($get_keywords)){
	$program_name_id = $get_keywords_res1['program_details_id'] > 0 ? $get_keywords_res1['program_details_id'] : 0 ;
	$degree_name_id = $get_keywords_res1['course_details_id'] > 0 ? $get_keywords_res1['course_details_id'] : 0 ;
	$spl_name_id = $get_keywords_res1['specialization_id'] > 0 ? $get_keywords_res1['specialization_id'] : 0 ;
}
		
// find the count of job posting alerts			
$en_path = "uploads/read_info/inbox/en/";	
$en_file_name = $fn->check_posting_read_exists($en_path, $reg_date);

if(($_GET['pagen'] == 'view_inbox' && $_GET['action'] == 'emp_news') || ($_POST['page_frm'] && $_GET['action'] == 'emp_news' && $_POST['msg_action'] != '')) {	
	$inbox_path = $_GET['action'] == 'knowledge_centre' ? $kc_path : $en_path;
	$inbox_file_name = $_GET['action'] == 'knowledge_centre' ? $en_file_name : $kc_file_name;
	$file_name_en = $fn->check_posting_read_exists($inbox_path, $reg_date);
	if($_GET['by'] == 'inbox' && $_POST['msg_action'] != ''){
		$_POST['selected_msgs'][0] = $_GET['id'];
	}
	if($_POST['selected_msgs'] != '' && $_POST['msg_action'] != ''){
		foreach($_POST['selected_msgs'] as $enid){
			$cid = $cfn->decrypt($enid,'','');
			$f_res = $fn->file_insert_job_id($inbox_path.$file_name_en,$cid,$cfn->encrypt($_SESSION['user_id']),$_POST['msg_action']);
		}
	}else{
		$f_res = $fn->file_insert_job_id($inbox_path.$file_name_en,$id,$cfn->encrypt($_SESSION['user_id']));
	}	
}
$sql_count_en = "call fr_list_inbox('$field','$order','$searchtxt','1','EN','".$mysql->real_escape_string($_SESSION['user_id'])."','','','".$program_name_id."','".$degree_name_id."','".$spl_name_id."','')";
$result_query_en = $mysql_obj->query($sql_count_en);
if($result_query_en->num_rows)
$result_query_en_count = $mysql_obj->fetch_array($result_query_en);
$smarty->assign('total_records_en',$result_query_en_count['count']);
if($en_file_name) {
	$read_id_en = $fn->get_posting_read_file($en_path.$en_file_name, $cfn->encrypt($_SESSION['user_id']));
	if($read_id_en){
		$read_en_array = explode(',',$read_id_en);
		//Note: remove empty values
		$i = 0;
		foreach($read_en_array as $emp_value){
			if(trim($emp_value) == '') {
				unset($read_en_array[$i]);
			}	
			$i++;
		}
		$read_id_en = implode(',',$read_en_array);
	}
	if($read_id_en != '') {
		$read_en_array = explode(',',$read_id_en);
		foreach($read_en_array as $key => $value){
			$value = trim($value);
			if($value != '') {
				$read_en_array[$key] = $value;
			}
		}
		$smarty->assign('READ_ID_EN', $read_en_array);
		//$result_query_en_count['count'].':'.count($read_en_array);
		
		$total_unread_en =  $result_query_en_count['count'] - count($read_en_array);
		
		if($total_unread_en < 0){
			$total_unread_en = 0;
		}
	}
	else {
		$total_unread_en = $result_query_en_count['count'];
		
	}
}
else{
	// create the file for the user_error
	$fn->create_posting_read_file($en_path, $cfn->encrypt($_SESSION['user_id']),$reg_date);	
	$en_file_name = $fn->check_posting_read_exists($en_path, $reg_date); 
	$total_unread_en = $result_query_kc_count['count'];
	
}		


// substract the total records and read records
$smarty->assign("TOTAL_UNREAD_EN", $total_unread_en);	



// find the count of job posting alerts		
$kc_path = "uploads/read_info/inbox/kc/";	
$kc_file_name = $fn->check_posting_read_exists($kc_path, $reg_date);
if(($_GET['pagen'] == 'view_inbox' && $_GET['action'] == 'knowledge_centre') || ($_POST['page_frm'] && $_GET['action'] == 'knowledge_centre' && $_POST['msg_action'] != '')) {
	$inbox_path = $_GET['action'] == 'knowledge_centre' ? $kc_path : $en_path;
	$inbox_file_name = $_GET['action'] == 'knowledge_centre' ? $en_file_name : $kc_file_name;
	$file_name_kc = $fn->check_posting_read_exists($inbox_path, $reg_date);
	if($_GET['by'] == 'inbox' && $_POST['msg_action'] != ''){
		$_POST['selected_msgs'][0] = $_GET['id'];
	}
	if($_POST['selected_msgs'] != '' && $_POST['msg_action'] != ''){
		foreach($_POST['selected_msgs'] as $enid){
			$cid = $cfn->decrypt($enid,'','');
			$f_res = $fn->file_insert_job_id($inbox_path.$file_name_kc,$cid,$cfn->encrypt($_SESSION['user_id']),$_POST['msg_action']);	
		}
	}else{
		$f_res = $fn->file_insert_job_id($inbox_path.$file_name_kc,$id,$cfn->encrypt($_SESSION['user_id']));
	}
}
$sql_count_kc = "call fr_list_inbox('$field','$order','$searchtxt','1','NF','".$mysql->real_escape_string($_SESSION['user_id'])."','','','".$program_name_id."','".$degree_name_id."','".$spl_name_id."','')";
$result_query_kc = $mysql_obj->query($sql_count_kc);
if($result_query_kc->num_rows)
$result_query_kc_count = $mysql_obj->fetch_array($result_query_kc);
$smarty->assign('total_records_kc',$result_query_kc_count['count']);
if($kc_file_name) {
	$read_id_kc = $fn->get_posting_read_file($kc_path.$kc_file_name, $cfn->encrypt($_SESSION['user_id']));
	if($read_id_kc){
		$read_kc_array = explode(',',$read_id_kc);
		//Note: remove empty values
		$i = 0;
		foreach($read_kc_array as $emp_value){
			if(trim($emp_value) == '') {
				unset($read_kc_array[$i]);
			}	
			$i++;
		}
		$read_id_kc = implode(',',$read_kc_array);
	}
	if($read_id_kc != '') {
		$read_kc_array = explode(',',$read_id_kc);			
		foreach($read_kc_array as $key => $value){
			$value = trim($value);
			if($value != '') {
				$read_kc_array[$key] = $value;
			}
		}
		$smarty->assign('READ_ID_KC', $read_kc_array);
		$total_unread_kc =  $result_query_kc_count['count'] - count($read_kc_array);
	}
	else {
		$total_unread_kc = $result_query_kc_count['count'];
	}
}
else{
	$fn->create_posting_read_file($kc_path, $cfn->encrypt($_SESSION['user_id']),$reg_date);	
	$kc_file_name = $fn->check_posting_read_exists($kc_path, $reg_date); 
	$total_unread_kc = $result_query_kc_count['count'];
}		
// substract the total records and read records
$smarty->assign("TOTAL_UNREAD_KC", $total_unread_kc);	
		
	

?>