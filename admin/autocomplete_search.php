<?php 
/* 
   Purpose : remote search.
   Created : Nikitasa
   Date : 17-11-2016 
*/

// include mysql class
include('classes/class.mysql.php');
// Connecting Database
$mysql->connect_database();
// include function validation class
include('classes/class.function.php');
error_reporting(0);

//get search term
$keyword = $_GET['q'];
if($_GET['page'] == 'jobfair'){
	// get matched data from jobfair
	$query = "CALL search_jobfair('".$keyword."')";
	try{	
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in executing job fair page');
		}
		// iterate until get the matched results
		while($obj = $mysql->display_result($result)){
			$data[] = strtolower($fun->match_results($keyword,$obj['title']));		
			$data[] = strtolower($fun->match_results($keyword,$obj['location']));
			$data[] = strtolower($fun->match_results($keyword,$obj['partner']));
		}
		
		if(count($data) > 0){
			// filter the duplicate values
			$unique_result = array_unique($data);	
			// display the search results
			foreach($unique_result as $res){
				if(!empty($res)){ 
					$unique[] = $res;
				}
			}
		}
		// free the memory
		$mysql->clear_result($result);		
   }catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
   }
}else if($_GET['page'] == 'jobfair_logos'){
	// get matched data from jobfair logo
	$query = "CALL search_jobfair_logos('".$keyword."')";
	try{	
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in executing job fair logo page');
		}
		// iterate until get the matched results
		while($obj = $mysql->display_result($result)){
			$data[] = strtolower($fun->match_results($keyword,$obj['title']));		
			$data[] = strtolower($fun->match_results($keyword,$obj['company']));
		}
		
		if(count($data) > 0){
			// filter the duplicate values
			$unique_result = array_unique($data);	
			// display the search results
			foreach($unique_result as $res){
				if(!empty($res)){ 
					$unique[] = $res;
				}
			}
		}
		// free the memory
		$mysql->clear_result($result);		
   }catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
   }
}else if($_GET['page'] == 'client_req'){
	// get matched data from client req
	$query = "CALL search_client_req('".$keyword."')";
	try{	
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in executing client req page');
		}
		// iterate until get the matched results
		while($obj = $mysql->display_result($result)){
			$data[] = strtolower($fun->match_results($keyword,$obj['work_loc']));		
			$data[] = strtolower($fun->match_results($keyword,$obj['company_name']));
			$data[] = strtolower($fun->match_results($keyword,$obj['position']));
		}
		
		if(count($data) > 0){
			// filter the duplicate values
			$unique_result = array_unique($data);	
			// display the search results
			foreach($unique_result as $res){
				if(!empty($res)){ 
					$unique[] = $res;
				}
			}
		}
		// free the memory
		$mysql->clear_result($result);		
   }catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
   }
}else if($_GET['page'] == 'jobfair_photos'){
	// get matched data from jobfair photos
	$query = "CALL search_jobfair_photos('".$keyword."')";
	try{	
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in executing jobfair photos page');
		}
		// iterate until get the matched results
		while($obj = $mysql->display_result($result)){
			$data[] = strtolower($fun->match_results($keyword,$obj['title']));		
		}
		
		if(count($data) > 0){
			// filter the duplicate values
			$unique_result = array_unique($data);	
			// display the search results
			foreach($unique_result as $res){
				if(!empty($res)){ 
					$unique[] = $res;
				}
			}
		}
		// free the memory
		$mysql->clear_result($result);		
   }catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
   }
}else if($_GET['page'] == 'client_photos'){
	// get matched data from client photos
	$query = "CALL search_client_photos('".$keyword."')";
	try{	
		if(!$result = $mysql->execute_query($query)){
			throw new Exception('Problem in executing client photos page');
		}
		// iterate until get the matched results
		while($obj = $mysql->display_result($result)){
			$data[] = strtolower($fun->match_results($keyword,$obj['position']));		
			$data[] = strtolower($fun->match_results($keyword,$obj['company_name']));
		}
		
		if(count($data) > 0){
			// filter the duplicate values
			$unique_result = array_unique($data);	
			// display the search results
			foreach($unique_result as $res){
				if(!empty($res)){ 
					$unique[] = $res;
				}
			}
		}
		// free the memory
		$mysql->clear_result($result);		
   }catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
   }
}

if(!empty($unique)){
	// display the search results
	foreach($unique as $res):
		if(!empty($res)): 
			echo $res."\n";
		endif;
	endforeach;
}else{
	echo $no_data = 'No Results!';
	// echo json_encode($no_data); 
}
// calling mysql close db connection function
$c_c = $mysql->close_connection(); 
?>