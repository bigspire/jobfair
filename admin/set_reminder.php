<?php
/* 
   Purpose : To set job fair reminder.
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

$getid = $_GET['id'];

// convert job fair date
$jobfair_date = $_GET['jobfair_date'];
$jobfair_timestamp = strtotime($jobfair_date);
$rem_date = date('d/m/Y', $jobfair_timestamp);
$check_date = date('Y-m-d H:i:s');
$url_date = date('d-M-Y', $jobfair_timestamp);
// get database values
$query = "CALL get_reminder('$getid')";
try{
	// calling mysql exe_query function
	if(!$result = $mysql->execute_query($query)){ 
		throw new Exception('Problem in executing get job fair');
	}
	// calling mysql fetch_result function
	$i = '0';
	while($obj = $mysql->display_result($result)){
		$data[] = $obj;
 		$data[$i]['id'] =  $obj['id'];
 		if(($obj['reminder_date'] != 0000-00-00) || ($obj['reminder_date'] != '')){ 
 			$data[$i]['reminder_date'] =  date('d/m/Y H:i', strtotime($obj['reminder_date']));
 		}
		$data[$i]['reminder_date_check'] =  $obj['reminder_date'];
		$data[$i]['type'] = $obj['type'];
		$i++;	
	}
	$smarty->assign('reminderCount',$i);
	// free the memory
	$mysql->clear_result($result);
	// next query execution
	$mysql->next_query();
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

if(!empty($_POST)){
	// Validating the required fields 
	// reminder option validation
	$count = count($_POST['reminder']);
	for($i = 0; $i < $count; $i++){
		$time = explode(' ',$_POST['reminder'][$i]);
		// format reminder date
		$date = $time[0];
		$dateformat = explode('/',$date);
		$time_split =  explode(':',$time[1]);
		$date_format = $dateformat[2].'-'.$dateformat[1].'-'.$dateformat[0];
		$time_format = $date_format.' '.$time_split[0].':'.$time_split[1];
		if(strtotime($time_format) > strtotime($check_date)){		
			if($_POST['reminder'][$i] != '' && $_POST['type'][$i] == ''){ 
				$er[$i] = 'Please select the reminder type'; 
				$test = 'error';		
			}					
		}	
	}
	
	$smarty->assign('error_type',$er);	
	if(empty($test)){
		for($i = 0; $i <= 2; $i++){
			// assigning the current date
			$mod_date = $fun->current_date();
			// format reminder time
			$time = explode(' ',$_POST['reminder'][$i]);
			$time_split =  explode(':',$time[1]);
			// format reminder date
			$date = $time[0];
			$dateformat = explode('/',$date);
			$date_format = $dateformat[2].'-'.$dateformat[1].'-'.$dateformat[0];
			// convert date
			$reminder = $date_format.' '.$time_split[0].':'.$time_split[1];
			// query to insert into database. 
			$rem_id = $_POST['reminder_id_'.$i];
			// compare reminder date with current date 
			if(strtotime($check_date) < strtotime($reminder)){
				$query = "CALL edit_reminder('".$rem_id."','".$mysql->real_escape_str($reminder)."','".$mysql->real_escape_str($_POST['type'][$i])."', '".$mod_date."')";
				
				// calling the function that makes the insert
				try{
					// calling mysql exe_query function
					if(!$result = $mysql->execute_query($query)){
						$alert_msg1 = 'Problem in saving the job fair reminder. Pls check the errors.';
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
			}		
		}
		
		if(!empty($affected_rows)){
			$alert_msg = 'Job Fair Reminder updated successfully!';	
		}
	}
}

// closing mysql
$mysql->close_connection();
$smarty->assign('ALERT_MSG1' , $alert_msg1);
$smarty->assign('ALERT_MSG' , $alert_msg);
$smarty->assign('data' , $data);
$smarty->assign('check_date' , $check_date);
$smarty->assign('getid' , $getid);
$smarty->assign('rem_date' , $rem_date);
$smarty->assign('url_date' , $url_date);
$smarty->assign('todayDate' , date('d/m/Y'));
// display smarty file
$smarty->display('set_reminder.tpl');
?>