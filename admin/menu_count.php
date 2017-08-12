<?php
/* 
Purpose : To count total created job fair and client requirement
Created : Nikitasa
Date : 18-11-2016
*/

session_start();
//if($_SESSION['userDetail']['id'] == ''){
// fetch admin details
$uid = $_GET['admin_id'] ? $_GET['admin_id'] : $_SESSION['userDetail']['id']; 
$query = "CALL get_admin_user_details('".$uid."')";
try{
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in getting admin details');
	}
	// calling mysql fetch_result function
	$row = $mysql->display_result($result);
	$_SESSION['roles_id'] = $row['roles_id'];
	$row['format_date'] = date('l d-M-Y h:i a', strtotime($row['last_login']));
	$_SESSION['userDetail'] = $row;
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

// fetch theme 
$query = "CALL get_theme_user_details('".$row['themes_id']."')";
try{
	if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in getting theme details');
	}
	// calling mysql fetch_result function
	$row = $mysql->display_result($result);
	$_SESSION['themeDetail'] = $row;
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}
	
// get user modules
$query = "call get_user_modules('".$_SESSION['roles_id']."')";
try{
	// calling mysql exe query function
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing get user modules');
	}
	$modules = array();
	while($row = $mysql->display_result($result)){
		$modules[$row['modules_id']] = strtolower(preg_replace("/[-\s]/",'_',$row['module_name'])); 
	}
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}
// assign smarty for module names
foreach($modules as $key => $record){
	$smarty->assign($record, 1); 
}	
		
//}
// redirecting to login page,if session is empty
if($_SESSION['userDetail']['id'] == ''){
	session_destroy();
	header('Location:error.php');
}


// fetch all menu count
$query = 'CALL count_menu_tabs2()';
try{
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing count page');
	}
	// calling mysql fetch_result function
	$obj = $mysql->display_result($result);
	// assign all count variables here
	$smarty->assign('obj', $obj); 
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

$query = 'CALL count_subtab_inbox()';
try{
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing count page');
	}
	// calling mysql fetch_result function
	$obj = $mysql->display_result($result);
	$count_inbox = $obj['count_kc'] + $obj['count_emp_news'];
	
	// assign all count variables here
	$smarty->assign('count_inbox', $count_inbox); 
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

$query = 'call count_em_transactions("","")';
try{
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing count page');
	}
	// calling mysql fetch_result function
	$qry_result = $mysql->display_result($result);
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

$query = 'call count_co_transactions("","")';
try{
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing count page');
	}
	// calling mysql fetch_result function
	$qry_result2 = $mysql->display_result($result);
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

$query = 'call count_em_add_transactions("","")';
try{
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing count page');
	}
	// calling mysql fetch_result function
	$qry_result3 = $mysql->display_result($result);
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

$query = 'call count_co_add_transactions("","")';
try{
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing count page');
	}
	// calling mysql fetch_result function
	$qry_result4 = $mysql->display_result($result);
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

$count_purchase = $qry_result['total']+$qry_result2['total']+$qry_result3['total']+$qry_result4['total'];
// assign all count variables here
$smarty->assign('count_purchase', $count_purchase); 

// fetch job fair count
$query = 'CALL count_jobfair()';
try{
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing job fair count page');
	}
	// calling mysql fetch_result function
	$obj_jobfair = $mysql->display_result($result);
	
	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

// fetch client requirement count
$query = 'CALL count_client_req()';
try{
	if(!$result = $mysql->execute_query($query)){
		throw new Exception('Problem in executing client req count page');
	}
	// calling mysql fetch_result function
	$obj_client = $mysql->display_result($result);

	// free the memory
	$mysql->clear_result($result);
	// call the next result
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}
// assign job fair count variables here
$smarty->assign('jobfair_count', $obj_jobfair['count']);
// assign client req count here
$smarty->assign('client_req_count', $obj_client['count']); 
?>