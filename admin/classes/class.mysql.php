<?php
/* 
Purpose : To add database functions.
Created : Nikitasa
Date : 16-11-2016
*/
include 'configs/dbconfig.php';
class mysql{
	var $link;
	// connect database function 
	public function connect_database(){		
		$this->link = mysqli_connect(Host,Username,Password,Database);
		if(!$this->link){
			die('Unable to connect');
		}
		// return $this->link;
   }
	// query execution
	public function execute_query($query){		  
		$result = mysqli_query( $this->link, $query);  
		// mysqli_more_results($this->link);   
		return $result;
	}
  	
	
	// next query execution
	public function next_query(){		      
		mysqli_next_result($this->link);		
	}
	
	// result display	    
	public function display_result($result){ 
		$obj = mysqli_fetch_assoc($result);
		return $obj;
	} 
	
	// clear the results	    
	public function clear_result($result){ 
		mysqli_free_result($result);
   } 

	// real escape string 
	public function real_escape_str($str){
		return mysqli_real_escape_string($this->link, $str);
	}	
	// number of rows	
	public function num_rows($result){ 
		$num = mysqli_num_rows($result);
	   return $num;
	}            
	// close connection
	public function close_connection(){
		//mysqli_close($res);	
		mysqli_close($this->link);	
	}
} 
$mysql = new mysql();
?>