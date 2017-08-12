<?php
/* 
Purpose : To Delete job fair.
Created : Nikitasa
Date : 18-11-2016
*/
session_start(); 
include 'configs/smartyconfig.php';
// include mysql class
include('classes/class.mysql.php');
// Connecting Database
$mysql->connect_database();
// include function validation class
include('classes/class.function.php');

if(isset($_GET['id'])){
   // get record id   
	$id = $_GET['id'];
	if(($fun->isnumeric($id)) || ($fun->is_empty($id)) || ($id == 0)){
  		header('Location:page_error.php');
	}

   // Escapes special characters in a string for use in an SQL statement
	$id = $mysql->real_escape_str($id);
   // delete job fair details
 	$query = "CALL delete_jobfair('".$id."')";

   try{
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in deleting');
		} 
   	header('Location:jobfair.php?page='.$_GET['page'].'&current_status=deleted');
   }catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}	
}
$c_c = $mysql->close_connection();
?>