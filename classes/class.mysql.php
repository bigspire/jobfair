<?php
//include database configuration.
include($link_url."config/dbconfig.php");
class mysql{
	public $con;
	/*public $prev_plan_details = array();
	public $prev_college_plan_details = array();*/
	//connect to database
	function __construct(){
		$this->con = mysqli_connect(HOST,USERNAME,PASSWORD);
		if(!$this->con){
			//die('Database connection Failed').mysql_error(); // used for development purpose
			die('Due to some technical issues, Site is down. Sorry for the inconvenience caused. Please try after some time.'); // used for live mode
		}
		$this->selectdb();
		/*Note: get previous plan details
		if($_SESSION['em_id'] != '') {
			$this->prev_plan_details = $this->get_prev_plan_details($_SESSION['em_company_id']);
		}
		//Note: get previous plan details[college]
		if($_SESSION['co_id'] != '') {
			$this->prev_college_plan_details = $this->get_college_prev_plan_details($_SESSION['co_college_id']);
		}*/	
	}
	//Select Database
	function selectdb(){
		mysqli_select_db($this->con,DBASE);
	}
	//Execute sql queries
	function execute_query($sqlquery){  
		
		/*if($result = mysqli_query($this->con,$sqlquery) == TRUE){		
			return $result;
		}else{
			echo ('problem in executing the query'. $sqlquery);
		}
		*/
		$result = mysqli_query( $this->con, $sqlquery);    
		return $result;
		
	}
	// fetch the result set in association type
	function fetch_assoc($result){ 
	  return mysqli_fetch_assoc($result);
	}
	
	// executing the sql queries
	function query($query){	
		 $mysqli = new mysqli(HOST,USERNAME,PASSWORD,DBASE);
		
	     /* if($result = $mysqli->query($query) == TRUE){
			return $result;
		 }else{
			echo ('problem in executing the query'. $query);
		}	*/
		
		return $mysqli->query($query);
	}
		// executing the sql queries
	function multi_query($query){	
		 $mysqli = new mysqli(HOST,USERNAME,PASSWORD,DBASE);
	     /* if($result = $mysqli->query($query) == TRUE){
			return $result;
		 }else{
			echo ('problem in executing the query'. $query);
		}	*/
		
		return $mysqli->query($query);
	}
	/*Note: get previous plan details of college*/
	 function get_college_prev_plan_details($college_id) {
		$cur_date = date('Y-m-d H:i:s');
		//$this->write_file("call co_get_prev_plan_details('".$college_id."','".$cur_date."')");
		$prev_plan_qry = "call co_get_prev_plan_details('".$college_id."','".$cur_date."')";  
		if(!$prev_plan_qrry = $this->query($prev_plan_qry)){
			throw new Exception('Problem in executing get previous plan details');
		}
		if($prev_plan_qrry->num_rows){
			return  $this->fetch_assoc($prev_plan_qrry);
					
		}
	 }
	//Note: Check college plan upgrade
	function check_college_plan_upgrade($cur_date){
		$return = 0;
		//$purchase_type = intval($this->prev_college_plan_details['purchase_id']);
		if(!$package_expiry_qry = $this->query("call co_get_plan_details('".$_SESSION['co_college_id']."','".$cur_date."','')")){
			throw new Exception('Problem in executing package expirty date(in class mysql)');
		}
		if($package_expiry_qry->num_rows){
			$package_expiry_res = $this->fetch_array($package_expiry_qry);
			/*$expiry_date = strtotime('1 month',strtotime($package_expiry_res['expiry_date']));
			$expiry_date = date('Y-m-d',$expiry_date);*/
			$expiry_date = strtotime($package_expiry_res['expiry_date']);
			$cur_date = date('Y-m-d',strtotime($cur_date));
			if($package_expiry_res['max_package_amount'] != '' && !(intval($package_expiry_res['max_package_amount']) > intval($package_expiry_res['amount'])) && $package_expiry_res['package_name'] != 'Custom'){
				$return = 3;
			}
			elseif(intval($package_expiry_res['amount']) > 0 && $expiry_date < $cur_date){
				$return = 1;
			}elseif($package_expiry_res['package_name'] == 'Custom') {
				$return = 2;
			}	 
		}else{
		   $return = 4;
		}
		
		/*if($package_expiry_qry->num_rows){
			$package_expiry_res = $this->fetch_array($package_expiry_qry);
			if(intval($package_expiry_res['amount']) > 0){
				$return = 1;
			}	 
		}else{
		   $return = 2;
		}*/
		return $return;
	}
	
	//Note: Check college plan renew
	function check_college_plan_renew($college_id,$cur_date,$type = ''){
		$return = 0;
		if(!$package_expiry_qry = $this->query("call co_get_plan_details('".$college_id."','".$cur_date."','')")){
			throw new Exception('Problem in executing package expirty date');
		}
		if($package_expiry_qry->num_rows){
			$package_expiry_res = $this->fetch_array($package_expiry_qry);
			if($type == 'show_result') {
				return $package_expiry_res;
			}
			$expiry_date = date('Y-m-d H:i:s',strtotime($package_expiry_res['expiry_date']));
			$cur_date = date('Y-m-d H:i:s',strtotime($cur_date));
			if(intval($package_expiry_res['amount']) == 0){ //  || (intval($package_expiry_res['amount']) > 0 && $expiry_date < $cur_date)
				$return = 1;
			}	 
		}
		if($type == '')
			return $return;
	}
	
	//Note: Check company plan upgrade
	function check_plan_upgrade($cur_date){
		$return = 0;
		//$purchase_type = intval($this->prev_plan_details['purchase_id']);
		if(!$package_expiry_qry = $this->query("call em_get_plan_details('".$_SESSION['em_company_id']."','".$cur_date."','')")){
			throw new Exception('Problem in executing package expirty date(in class mysql)');
		}
		if($package_expiry_qry->num_rows){
			$package_expiry_res = $this->fetch_array($package_expiry_qry);
			/*$expiry_date = strtotime('1 month',strtotime($package_expiry_res['expiry_date']));
			$expiry_date = date('Y-m-d',$expiry_date);*/
			$expiry_date = strtotime($package_expiry_res['expiry_date']);
			$cur_date = date('Y-m-d',strtotime($cur_date));
			if(!(intval($package_expiry_res['max_package_amount']) > intval($package_expiry_res['amount'])) && $package_expiry_res['package_type'] == 'S'){
				$return = 3;
			}
			elseif(intval($package_expiry_res['amount']) > 0 && $expiry_date < $cur_date){
				$return = 1;
			}elseif($package_expiry_res['package_type'] == 'C') {
				$return = 2;
			}	 
		}else{
		   $return = 4;
		}
		return $return;
	}
	
	//Note: Check company plan renew
	function check_plan_renew($cur_date,$type = '',$company_id){
		$return = 0;
		//$purchase_type = $this->get_prev_plan_details($company_id);
		if(!$package_expiry_qry = $this->query("call em_get_plan_details('".$company_id."','".$cur_date."','')")){
		 throw new Exception('Problem in executing package expirty date');
		}
		if($package_expiry_qry->num_rows){
			$package_expiry_res = $this->fetch_array($package_expiry_qry);
			if($type == 'show_result') {
				return $package_expiry_res;
			}
			$expiry_date = date('Y-m-d H:i:s',strtotime($package_expiry_res['expiry_date']));
			$cur_date = date('Y-m-d H:i:s',strtotime($cur_date));
			if(intval($package_expiry_res['amount']) == 0){ //  || (intval($package_expiry_res['amount']) > 0 && $expiry_date < $cur_date)
				$return = 1;
			}	 
		}
		if($type == '')
			return $return;
	}
	
	//Note: get the package name
	// function get_package_name($id){
		// if(!$get_package_qry = $this->query("call fr_get_package('".$id."')")){
			// throw new Exception('Problem in executing package name');
		// }
		// if($get_package_qry->num_rows){
			// $package_res = $this->fetch_array($get_package_qry);
			// $pack_name = $package_res['package_name'];
		// }
		// return $pack_name;
	// }
	
	// fetch the result set in array format
	function fetch_array($result){
		return mysqli_fetch_array($result);
	}
	function num_fields($result) {
	 return mysqli_num_fields($result);
	}
	//Get the count
	function getcount($result){
		return mysqli_num_rows($result);
	}
	public function GetDomain($url)
	{
		$nowww = ereg_replace('www\.','',$url);
		$domain = parse_url($nowww);
		if(!empty($domain["host"]))
		{
			return $domain["host"];
		}
		else
		{
			return $domain["path"];
		}
 
	}
	//Return a number of Rowss
	public function countRecords($query){
	  //$count = mysql_num_rows($query);
	  return mysqli_num_rows(mysql_query($query));
	}
	
	/* function used to check the authentication */
	function check_authentication($type, $id){
		switch($type){
			case 'lead':
			$auth =  $this->check_lead_auth($id);
		}
		return $auth;
	}
	
	//Note: The following function is used to update job seeker resume title
	function update_resume_title($user_id,$cur_date) {
		try{
			$mysql = new mysqli(HOST,USERNAME,PASSWORD,DBASE);
			if(!$get_login_user_details = $this->query("call fr_get_jobseeker_details('".$user_id."','".$cur_date."')")) {
					throw new Exception('Problem in executing get job seeker details');
			}
			if($get_login_user_details->num_rows) {
				if($login_user_details[] = $this->fetch_array($get_login_user_details)){
					$resume_title =trim($login_user_details[0]['resume_title']);
					$total_exp = explode('.',$login_user_details[0]['experience_year']);
					//check graduation
					if($login_user_details[0]['course_name'] != '' ) {
						$school_std = 0;
						$qualification = $login_user_details[0]['course_name'];
						$percentage_marks = $login_user_details[0]['percentage_marks'];
					}
					else {
						$school_std = 1;
						if($login_user_details[0]['hsc_school_year_passing'] == '') {
							$qualification = '10th standard, '.$login_user_details[0]['school_marks_percentage'].'% of marks';
						}
						else {
						$qualification = '12th standard, '.$login_user_details[0]['hsc_school_marks_percentage'].'% of marks';
						}
					}
					//check experience
					$experince = ($total_exp[0] > 0 ? $total_exp[0].' year'.($total_exp[0] > 1 ? 's':'').' ': '').(($total_exp[0] > 0 && $total_exp[1] > 0 )? ' and ' : '').($total_exp[1] > 0 ?$total_exp[1].' month'.($total_exp[1] > 1 ?'s':''):'');
					if($experince != '')
						$experince	= $experince.' of experience';
					//$experince = ($login_user_details[0]['experience_year'] > 0) ? $login_user_details[0]['experience_year'].' of experience' : '' ;
					//check role
					$role = ($login_user_details[0]['current_position'] != '') ? $login_user_details[0]['current_position'] : '' ;
					$role = $role != '' ? ', '.$role : '' ;
					if(($experince != '') && ($school_std == 1)) {
						$resume_title  = $experince.$role;
					}
					else {
						$percentage_marks = $experince == '' ? ($percentage_marks != '' ? ', '.$percentage_marks.'% of marks, ' : '') : '';
						if($experince == '')
						{	
							$experince = 'Fresher'.($percentage_marks == '' ? ', ':'');
							$resume_title  = $experince.$percentage_marks.$qualification;
						}else{
							$resume_title  = $experince.$percentage_marks.$role.', '.$qualification;
						}
						
					}
					
					if(!$this->query("call fr_save_resume_title('".$user_id."','".$mysql->real_escape_string($resume_title)."')")) {	
						throw new Exception('Problem in executing update resume title');
					}
				} 
			}
		}		
		catch (Exception  $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
	}
	/*Note: The following function is used to get package details by package id*/
	function get_college_package_details_id($package_id,$category_id) {
		
		if(!$package_query = $this->query("call co_get_package_details_id('".$package_id."','".$category_id."')")){
				throw new Exception('Problem in executing get package details id');
		}
		if($package_query->num_rows)
			$package_details = $this->fetch_assoc($package_query);
		return 	$package_details;
		
	}
	
	/*Note: The following function is used to get package details by package id*/
	function get_package_details_id($package_id) {
		//echo "call fr_get_package_details_id('".$package_id."')";
		if(!$package_query = $this->query("call fr_get_package_details_id('".$package_id."')")){
				throw new Exception('Problem in executing get package details id');
		}
		if($package_query->num_rows)
			$package_details = $this->fetch_assoc($package_query);
		return 	$package_details;
		
	}
	 /*Note: get previous plan details*/
	 function get_prev_plan_details($company_id) {
		$cur_date = date('Y-m-d H:i:s');
		$prev_plan_qry = "call em_get_prev_plan_details('$company_id','".$cur_date."')";  
		if(!$prev_plan_qrry = $this->query($prev_plan_qry)){
			throw new Exception('Problem in executing get previous plan details');
		}
		if($prev_plan_qrry->num_rows){
			return  $this->fetch_assoc($prev_plan_qrry);
					
		}
	 }
	/*Note: get plan details company users*/
	function get_plan_of_company($company_id,$cur_date){
		//$purchase_type = $this->get_prev_plan_details($company_id);
		$plan_qry = "call em_get_plan_details('$company_id','$cur_date','')";  
		if(!$plan_qrry = $this->query($plan_qry)){
			throw new Exception('Problem in executing get plan of company(in class mysql)');
		}
		if($plan_qrry->num_rows){
		  return  $this->fetch_assoc($plan_qrry);
		}
		else{
			//Note: get expired plan details
			 $plan_qry = "call em_get_plan_details('".$company_id."','$cur_date','Y')";  
			if(!$plan_qrry = $this->query($plan_qry)){
				throw new Exception('Problem in executing get plan of company(in class mysql)');
			}
			if($plan_qrry->num_rows){
				return  $this->fetch_assoc($plan_qrry);
			}	
		}
	}
		/*Note: get plan details college*/
	function get_plan_of_college($college_id,$cur_date){
		//$purchase_type = intval($this->prev_college_plan_details['purchase_id']);
		$plan_qry = "call co_get_plan_details('".$college_id."','$cur_date','')";
		if(!$plan_qrry = $this->query($plan_qry)){
			throw new Exception('Problem in executing get plan of college(in class mysql)');
		}
		if($plan_qrry->num_rows){
		  return  $this->fetch_assoc($plan_qrry);
		}else{
		
			//Note: get expired plan details
			 $plan_qry = "call co_get_plan_details('".$college_id."','$cur_date','Y')";  
			if(!$plan_qrry = $this->query($plan_qry)){
				throw new Exception('Problem in executing get plan of college(in class mysql)');
			}
			if($plan_qrry->num_rows){
				return  $this->fetch_assoc($plan_qrry);
			}	
		}
	}	
	/* function to check the lead auth */
	function check_lead_auth($lead_id){
		// check the authentication of the lead for this user
		return true;
		
	}
	function write_file($str){		
		$f = fopen("uploads/test/file.txt", "a+");
		fwrite($f, $str);
		fclose($f);
	}
	/*Note: The following function is used to get expiry date of the new plan expiry*/
	function get_approve_college_plan_expiry($college_id,$cur_plan_details,$today_date,$package_id,$category_id,$plan_type=''){
		//Note: Upgrade Plan
		if($plan_type == 'U'){
			if(intval($cur_plan_details['amount']) > 0) {
				$current_plan_expiry_date =  $cur_plan_details['expiry_date'];
			}
		}
		//Note: Renew Plan
		elseif($plan_type == 'R') {
			$package_expiry_res = $this->check_college_plan_renew($college_id,$today_date,'show_result');
			$expiry_date = date('Y-m-d H:i:s',strtotime($package_expiry_res['expiry_date']));
			$cur_date = date('Y-m-d H:i:s',strtotime($today_date));
			if($expiry_date > $cur_date){
				$renew_plan_start_date = $package_expiry_res['renew_expiry_date'];
			}
		}
		$no_users = '0';
		//Note: get expiry date to update company users valid till and company expiry date		
		if($current_plan_expiry_date != ''){
			$expiry_date = $current_plan_expiry_date; 
			
		}else{
			//Note: get the particular plan details
			if(!$pack_detail_query = $this->query("call co_get_package_details_id('".$package_id."','".$category_id."')")){
				throw new Exception('Problem in executing get package details id');
			}
			$pack_detail_res = $this->fetch_assoc($pack_detail_query);
			$no_users = intval($pack_detail_res['no_users']);
			if($pack_detail_res['package_duration_type'] == 'Y') {
				$exp_value = $pack_detail_res['package_duration'].' year';
			}
			elseif($pack_detail_res['package_duration_type']  == 'M') {
				$exp_value = $pack_detail_res['package_duration'].' month';
			}
			elseif($pack_detail_res['package_duration_type']  == 'D') {
				$exp_value = $pack_detail_res['package_duration'].' days';
			}
			if($renew_plan_start_date != '')
				$expiry_date = strtotime($exp_value,strtotime($renew_plan_start_date)) ; 
			else {
				$expiry_date = strtotime($exp_value,strtotime($today_date)) ; 
				$expiry_date = strtotime('-1 day',$expiry_date);
			}	
			$expiry_date = date('Y-m-d H:i:s',$expiry_date); 
		}
		return array($expiry_date,$no_users);
	}
	/*Note: Update College Plan Expiry Date*/	
	function update_college_plan_expiry($purchase_date,$plan_expiry,$college_id){
		if(!$plan_expiry = $this->query("call fr_update_college_plan_expiry('".$purchase_date."','".$plan_expiry."','$college_id')")){
			throw new Exception('Problem in executing to update plan expiry details');
		}
	}
	/*Note: Update College User Valid Till*/
	function update_college_user_valid_till($college_id,$college_user_id,$expiry_date,$no_users){
		//Note: User College user valid till based upon on the package expiry date
		//-- start
		//Note: update college admin user valid till
		if($college_user_id > 0){
			$update_user_validity_query = $this->query("call co_update_user_validity('".$expiry_date."','".$college_user_id."')");
			if($update_user_validity_query->num_rows) {
				$no_users = $no_users-1;
			}
		}
		//Note: get last logged in user details
		if(!$get_user_login_qry = $this->query("call co_get_last_login_users('".$college_id."')")){
			throw new Exception('Problem in executing get last login user details');
		}
		if($get_user_login_qry->num_rows) {
			$i = 0;
			while($user_res = $this->fetch_array($get_user_login_qry)){
				if($no_users > $i) {
					//Note: increase the company user validity
					$update_user_validity_query1 = $this->query("call co_update_user_validity('".$expiry_date."','".$user_res['id']."')");
					if($update_user_validity_query1->num_rows) {
						$i++;
					}
				}
			}
		}
		//-- End
	}
	
	/*Note: The following function is used to insert transaction and purchase details for upgrade plan,renew plan or new plan*/
	function insert_college_transaction_purchase_detail($plan_type,$trans_amount,$trans_status,$trans_response,$trans_id,$trans_ref,$merchant_ref_no,$payment_id,$college_id,$college_user_id,$package_id,$category_id,$rates_id,$plan_details,$today_date,$payment_type,$response = '',$custom_data,$error_no,$auth,$return_message = '0'){
		$mysql = new mysqli(HOST,USERNAME,PASSWORD,DBASE);
		//Note: get current plan details of college
		$custom_data = explode('S',$custom_data);
		if($custom_data[3] == 1 || $custom_data[3] == 2 || $return_message == '1'){
			$rpackage_type = $custom_data[3];
			$rtransaction_id  = $custom_data[4];
			$rpurchase_id  = $custom_data[5];
			$rpackage_id  = $custom_data[6];
			$rcategory_id  = $custom_data[7];
			if($rcategory_id != $category_id){	
				$update_category_id = $category_id;
			}
		}	
		$cur_plan_details = $this->get_college_expiry_date($college_id);
		//Note: Upgrade Plan
		if($plan_type == 'collegeupgrade'){
			if(intval($cur_plan_details['amount']) > 0) {
				$upgrade_pack_id = $cur_plan_details['id'];
				$purchase_type = 'U';
				$current_plan_expiry_date =  $cur_plan_details['expiry_date'];
			}
		}
		//Note: Renew Plan
		elseif($plan_type == 'collegerenew' || $plan_type == 'collegecustomrenew') {
			$package_expiry_res = $this->check_college_plan_renew($college_id,$today_date,'show_result');
			$expiry_date = date('Y-m-d H:i:s',strtotime($package_expiry_res['expiry_date']));
			$cur_date = date('Y-m-d H:i:s',strtotime($today_date));
			$purchase_type = 'R';
			if($expiry_date > $cur_date){
				$renew_plan_start_date = $package_expiry_res['renew_expiry_date'];
			}
			
		
		} 
		//Note: Inser package details, if user choosen the custom package
		if((($plan_type == 'collegerenew' && $package_id == 'custom') ||  $plan_type == 'collegecustomrenew' || $plan_type == 'collegecustomnew') && $return_message == '0') {
			$custom_purchase_details = explode('S',$plan_details);
			//Index 0 - job count    //Index 1 - cv access counnt    
			$no_students  = $custom_purchase_details[0];
			$no_users = $custom_purchase_details[1];
			//Note: Insert Custom package Details
			if($rpackage_type == 2){
				$exist_package_id = intval($rpackage_id);
				
			}
			if(!$save_custom_package_qry = $this->query("call co_save_packages('Custom','$no_students','$no_users','1','Y','".$today_date."','".intval($exist_package_id)."')")){
				throw new Exception('Problem in executing insert package details');
			}
			if($save_custom_package_qry->num_rows){
				$custome_package = $this->fetch_assoc($save_custom_package_qry);
				$package_id = $custome_package['inserted_id'];
			}
		}	
		
		
			//Note: delete custom package details
			if($rpackage_type == 2 || $rpackage_type == 1){
				if($package_id != 'custom' && $package_id != $rpackage_id && $rpackage_id != 'custom' && intval($rpackage_id) >0){
					if(!$delete_package_query = $this->query("call co_delete_package('".$rpackage_id."')")){
						throw new Exception('Problem in executing delete package details');
					}
				}
			}
			$plan_package_id = $package_id;
			//Note: get the particular plan details
			if(!$pack_detail_query = $this->query("call co_get_package_details_id('".$plan_package_id."','".$category_id."')")){
				throw new Exception('Problem in executing get package details id');
			}
			$pack_detail_res = $this->fetch_assoc($pack_detail_query);
			
			$duration_type =  $pack_detail_res['package_duration_type'] == 'M' ? 'months' : 'years';
			$duration = $pack_detail_res['package_duration'];
			$no_users = intval($pack_detail_res['no_users']);
			$exp_date = strtotime("$duration $duration_type",strtotime($today_date)) ; 
			$valid_till = date('Y-m-d',$exp_date ); 
			
			if($valid_till ==  date('Y-m-d')){
				$valid_till = date('Y-m-d',strtotime(date("Y-m-d", strtotime($valid_till)) . " +1 year")); 
			}						
			
			//Update college category id 
			if($trans_status == 'Completed'){
				if(intval($update_category_id) > 0) {
					if(!$update_category = $this->query("call co_update_college_category_id('$college_id','$update_category_id')")){
						throw new Exception('Problem in executing update college category');
					}
				}
			}
			
			 //Note: Insert Transaction and Purchase Details
			if(!$save_transaction_query = $this->query("call co_save_transaction_details('".$trans_id."','$trans_status','".$mysql->real_escape_string($trans_response)."','".$trans_ref."','".$trans_amount."','$merchant_ref_no','$payment_id','".$today_date."','$payment_type','$response','".$mysql->real_escape_string($auth)."','".$mysql->real_escape_string($error_no)."','".$college_id."','".intval($rtransaction_id)."','0')")){
				throw new Exception('Problem in executing save transaction details');
			}
			$save_transaction_res = $this->fetch_assoc($save_transaction_query);
			//save the purchase details
			
			if($pack_detail_res['package_duration_type'] == 'Y') {
				$exp_value = $pack_detail_res['package_duration'].' year';
			}
			elseif($pack_detail_res['package_duration_type']  == 'M') {
				$exp_value = $pack_detail_res['package_duration'].' month';
			}
			elseif($pack_detail_res['package_duration_type']  == 'D') {
				$exp_value = $pack_detail_res['package_duration'].' days';
			}
			
			//Note: get expiry date to update company and company user expiry date
			if($current_plan_expiry_date != ''){
				$expiry_date = $current_plan_expiry_date; 
				
			}else{
				if($renew_plan_start_date != '')
					$expiry_date = strtotime($exp_value,strtotime($renew_plan_start_date)) ; 
				else {
					$expiry_date = strtotime($exp_value,strtotime($today_date)) ; 
					$expiry_date = strtotime('-1 day',$expiry_date);
				}	
				$expiry_date = date('Y-m-d H:i:s',$expiry_date ); 
			}
			
			//Note: update purchase details	
			if(!$save_purchase_query = $this->query("call co_save_purchase_details('".$plan_package_id."','".$rates_id."','".$save_transaction_res['inserted_id']."','".$expiry_date."','".$college_id."','$purchase_type','".intval($upgrade_pack_id)."','".intval($rpurchase_id)."','".$today_date."','$trans_amount')")){
				throw new Exception('Problem in executing save purchase details');
			}
			$save_purchase_res = $this->fetch_assoc($save_purchase_query);
			//Note: Update college  purchase and expiry date of the plan
			if($trans_status == 'Completed') { 
				if(((intval($cur_plan_details['amount']) == 0) || ($cur_plan_details['expiry_date'] < date('Y-m-d') && ($custom_data[3] == 1 || $custom_data[3] == 2))) && $trans_status == 'Completed') {
					$purchase_date = $today_date; $plan_expiry = $expiry_date;
					if(!$plan_expiry = $this->query("call fr_update_college_plan_expiry('".$purchase_date."','".$plan_expiry."','$college_id')")){
						throw new Exception('Problem in executing to update plan expiry details');
					}
				}
			}
			
			$from_date = $today_date;
			if($renew_plan_start_date != ''){
				$from_date = $renew_plan_start_date;
				$from_date =  date('Y-m-d',strtotime('+1 day',strtotime($from_date)));
			}
			
			//Note: Update validity till of college users 
			if($trans_status == 'Completed') { //($plan_type == 'collegerenew' || $plan_type == 'collegecustomrenew' || $plan_type == 'collegecustomnew') && 
				//Note: User college user valid till based upon on the package expiry date
				//-- start
				
				//Note: update college admin user valid till
				$update_user_validity_query = $this->query("call co_update_user_validity('".$expiry_date."','".$college_user_id."')");
				if($update_user_validity_query->num_rows) {
					$no_users = $no_users-1;
				}
				//Note: get last logged in user details
				
				if(!$get_user_login_qry = $this->query("call co_get_last_login_users('".$college_id."')")){
					throw new Exception('Problem in executing get last login user details');
				}
				if($get_user_login_qry->num_rows) {
					$i = 0;
					while($user_res = $this->fetch_array($get_user_login_qry)){
						if($no_users > $i) {
							//Note: update the college user validity
							$update_user_validity_query1 = $this->query("call co_update_user_validity('".$expiry_date."','".$user_res['id']."')");
							if($update_user_validity_query1->num_rows) {
								$i++;
							}
						}
					}
				}
			//-- End
			
			}
			//Note: The following script are used to send mail to user about their payment details
			//if($trans_status == 'Completed'){
				//Note: object creation for mail sending
				if($trans_status != 'Pending'){
					$fn = new india_job_function(); $content = new Content(); 
					$ses = new SimpleEmailService(amz_token, amz_signature);$ses->enableVerifyPeer(false);
					$mailer = new SimpleEmailServiceMessage(); $mailer->setFrom('noreply@jobsfactory.in');
				}
				
				if($trans_status == 'Completed'){
					$subscription_details['package_name']  = $pack_detail_res['package_name'];
					$subscription_details['expiry_date']  = $expiry_date; $subscription_details['purchase_type']  = $purchase_type;
					$subscription_details['subscription'] = 'package';
					$method_name = $this->get_payment_method($payment_type);
					$mail_content = $content->content_payment_receipt(ucwords($save_transaction_res['first_name']),$payment_id,$trans_amount,$merchant_ref_no,date('d-M-Y'),$trans_id,$method_name,$subscription_details,'C');
					$mail_res = $fn->send_mail($ses,$mailer,amz_from_email,$save_transaction_res['email_address'],'Jobs Factory - Payment Receipt!', $mail_content, NULL);
					if(trim($mail_res['MessageId']) != '' && $return_message == '1'){ 
						echo $mail_content.'<br/>';
						return 'Mail sent successfully';
					}
				}elseif($trans_status == 'Failed' || $trans_status == 'CANCELED'){
					$mail_content = $content->content_payment_failed(ucwords($save_transaction_res['first_name']),$trans_status,'C');
					$mail_res = $fn->send_mail($ses,$mailer,amz_from_email,$save_transaction_res['email_address'],'Jobs Factory - Payment '.($trans_status == 'Failed' ? 'Failed!' : 'Canceled!'), $mail_content, NULL);	
				}
				
			//}
	}
		/*Note: check pending transaction details*/
	function check_pending_transaction_details($type ='',$cur_date){
		$pending_transaction_qry = "call em_get_pending_transaction('".$_SESSION['em_company_id']."','$type','$cur_date')"; 
		if(!$pending_transaction_qrry = $this->query($pending_transaction_qry)){
			throw new Exception('Problem in executing to get pending transaction query(in class mysql)');
		}
		if($pending_transaction_qrry->num_rows){
			return  $this->fetch_assoc($pending_transaction_qrry);
		}
	}
	/*Note: check college pending transaction details*/
	function check_college_pending_transaction_details($type='',$cur_date){
		$pending_transaction_qry = "call co_get_pending_transaction('".$_SESSION['co_college_id']."','$type','$cur_date')"; 
		if(!$pending_transaction_qrry = $this->query($pending_transaction_qry)){
			throw new Exception('Problem in executing to get college pending transaction query(in class mysql)');
		}
		if($pending_transaction_qrry->num_rows){
			return  $this->fetch_assoc($pending_transaction_qrry);
		}
	}
	/*Note: The following function is used to get expiry date of the new plan expiry*/
	function get_approve_company_plan_expiry($company_id,$cur_plan_details,$today_date,$package_id,$plan_type=''){
		//Note: Upgrade Plan
		if($plan_type == 'U'){
			if(intval($cur_plan_details['amount']) > 0) {
				$current_plan_expiry_date =  $cur_plan_details['expiry_date'];
			}
		}
		//Note: Renew Plan
		elseif($plan_type == 'R') {
			$package_expiry_res = $this->check_plan_renew($today_date,'show_result',$company_id);
			$expiry_date = date('Y-m-d H:i:s',strtotime($package_expiry_res['expiry_date']));
			$cur_date = date('Y-m-d H:i:s',strtotime($today_date));
			if($expiry_date > $cur_date){
				$renew_plan_start_date = $package_expiry_res['renew_expiry_date'];
			}
		}
		$no_users = '0';
		//Note: get expiry date to update company users valid till and company expiry date		
		if($current_plan_expiry_date != ''){
			$expiry_date = $current_plan_expiry_date; 
			
		}else{
			//Note: get the particular plan details
			if(!$pack_detail_query = $this->query("call fr_get_package_details_id('".$package_id."')")){
				throw new Exception('Problem in executing get package details id');
			}
			$pack_detail_res = $this->fetch_assoc($pack_detail_query);
			$no_users = intval($pack_detail_res['no_users']);
			if($pack_detail_res['package_duration_type'] == 'Y') {
				$exp_value = $pack_detail_res['package_duration'].' year';
			}
			elseif($pack_detail_res['package_duration_type']  == 'M') {
				$exp_value = $pack_detail_res['package_duration'].' month';
			}
			elseif($pack_detail_res['package_duration_type']  == 'D') {
				$exp_value = $pack_detail_res['package_duration'].' days';
			}
			if($renew_plan_start_date != '')
				$expiry_date = strtotime($exp_value,strtotime($renew_plan_start_date)) ; 
			else {
				$expiry_date = strtotime($exp_value,strtotime($today_date)) ; 
				$expiry_date = strtotime('-1 day',$expiry_date);
			}	
			$expiry_date = date('Y-m-d H:i:s',$expiry_date); 
		}
		return array($expiry_date,$no_users);
	}
	/*Note: Update Company Plan Expiry Date*/	
	function update_company_plan_expiry($purchase_date,$plan_expiry,$company_id){
		if(!$plan_expiry = $this->query("call fr_update_company_plan_expiry('".$purchase_date."','".$plan_expiry."','$company_id')")){
			throw new Exception('Problem in executing to update plan expiry details');
		}
	}
	//Note: get current plan expiry date of company
	function get_company_expiry_date($id){
		$plan_expiry_qry = "call em_get_plan_expiry_date('".$id."')"; 
		if(!$exec_plan_expiry_qry = $this->query($plan_expiry_qry)){
			throw new Exception('Problem in executing for to get company plan expiry date');
		}
		if($exec_plan_expiry_qry->num_rows){
			return $cur_plan_details = $this->fetch_assoc($exec_plan_expiry_qry);
		}
	}
	//Note: get current plan expiry date of college
	function get_college_expiry_date($id){
		$plan_expiry_qry = "call co_get_plan_expiry_date('".$id."')"; 
		if(!$exec_plan_expiry_qry = $this->query($plan_expiry_qry)){
			throw new Exception('Problem in executing for to get college plan expiry date');
		}
		if($exec_plan_expiry_qry->num_rows){
			return $cur_plan_details = $this->fetch_assoc($exec_plan_expiry_qry);
		}
	}
	/*Note: Update Company User Valid Till*/
	function update_company_user_valid_till($company_id,$comp_user_id,$expiry_date,$no_users,$purchase_type,$type = 'package'){
	
		//Note: User company user valid till based upon on the package expiry date
		//-- start
		//Note: update company admin user valid till
		if($comp_user_id > 0){
			$update_user_validity_query = $this->query("call em_update_user_validity('".$expiry_date."','".$comp_user_id."')");
			if($update_user_validity_query->num_rows) {
				$no_users = $no_users-1;
			}
		}
		//Note: get last logged in user details
		if(!$get_user_login_qry = $this->query("call em_get_last_login_users('".$company_id."')")){
			throw new Exception('Problem in executing get last login user details');
		}
		if($get_user_login_qry->num_rows) {
			$i = 0;
			while($user_res = $this->fetch_array($get_user_login_qry)){
				if($no_users > $i) {
					if(($purchase_type == 'R' && $user_res['valid_till'] >= $user_res['plan_expiry'] ) || ($type == 'additional' && $user_res['valid_till'] < date('Y-m-d'))){
						//Note: increase the company user validity
						$update_user_validity_query1 = $this->query("call em_update_user_validity('".$expiry_date."','".$user_res['id']."')");
						if($update_user_validity_query1->num_rows) {
							$i++;
						}
					}
				}
			}
		}
		//-- End
	}
	
	/*Note: The following function is used to insert transaction and purchase details for upgrade plan,renew plan or new plan*/
	function insert_transaction_purchase_detail($plan_type,$trans_amount,$trans_status,$trans_response,$trans_id,$trans_ref,$merchant_ref_no,$payment_id,$company_id,$comp_user_id,$package_id,$plan_details,$today_date,$payment_type,$response = '',$error_no ='',$auth='',$return_message = '0'){
		
		$mysql = new mysqli(HOST,USERNAME,PASSWORD,DBASE);
		$custom_data = explode('S',$package_id);
		if($custom_data[1] == 1 || $custom_data[1] == 2 || $return_message == '1'){
			$package_id = $custom_data[0];
			$rpackage_type = $custom_data[1];
			$rtransaction_id  = $custom_data[2];
			$rpurchase_id  = $custom_data[3];
			$rpackage_id  = $custom_data[4];
		}
		//Note: get current plan details of company
		$cur_plan_details = $this->get_company_expiry_date($company_id);
		//Note: Upgrade Plan
		if($plan_type == 'upgrade'){
			
			if(intval($cur_plan_details['amount']) > 0) {
				$upgrade_pack_id = $cur_plan_details['id'];
				$purchase_type = 'U';
				$current_plan_expiry_date =  $cur_plan_details['expiry_date'];
			}
		}
		//Note: Renew Plan
		elseif($plan_type == 'renew' || $plan_type == 'customrenew') {
			$package_expiry_res = $this->check_plan_renew($today_date,'show_result',$company_id);
			$expiry_date = date('Y-m-d H:i:s',strtotime($package_expiry_res['expiry_date']));
			$cur_date = date('Y-m-d H:i:s',strtotime($today_date));
			$purchase_type = 'R';
			if($expiry_date > $cur_date){
				$renew_plan_start_date = $package_expiry_res['renew_expiry_date'];
			}
		
		} 
	  
		//Note: Inser package details, if user choosen the custom package
		if((($plan_type == 'upgrade' && $package_id == 'custom') ||  $plan_type == 'customrenew' || $plan_type == 'customnew') && $return_message == '0') {
			$custom_purchase_details = explode('S',$plan_details);
			//Index 0 - job count    //Index 1 - cv access counnt     // Index 2 - User Count
			//Index 3 - Sms Count  // Index 4 - Mail Count			//Index 5 - Premium Job Count    
			//Index 6 - Total Amount
			$package_amount = $custom_purchase_details[6];
			$jobs_count  = $custom_purchase_details[0];
			$cv_count = $custom_purchase_details[1];
			$user_count = $custom_purchase_details[2];
			$sms_count = $custom_purchase_details[3];
			$mail_count = $custom_purchase_details[4];
			$premium_count = $custom_purchase_details[5];
			
			$exist_package_id = 0;
			if($rpackage_type == 2){
				$exist_package_id = intval($rpackage_id);
			}
			//Note: Insert Custom package Details
			if(!$save_custom_package_qry = $this->query("call em_save_packages('Custom','$trans_amount','$user_count','$jobs_count','30','".(intval($cv_count) > 0 ? 'Y':'N')."','$cv_count',
			'$mail_count','".(intval($sms_count) > 0?'Y':'N')."','$sms_count','N','0','1','Y','".(intval($premium_count) > 0?'Y':'N')."','$premium_count','C','".$today_date."','$exist_package_id')")){
				throw new Exception('Problem in executing insert package details');
			}
			if($save_custom_package_qry->num_rows){
				$custome_package = $this->fetch_assoc($save_custom_package_qry);
				$package_id = $custome_package['inserted_id'];
			}
		}	
			//Note: delete custom package details
			if($rpackage_type == 2 || $rpackage_type == 1){
			
				if($package_id != 'custom' && $package_id != $rpackage_id && intval($rpackage_id) >0){
					if(!$delete_package_query = $this->query("call em_delete_package('".intval($rpackage_id)."')")){
						throw new Exception('Problem in executing delete package details');
					}
				}
			}
			
			$plan_package_id = $package_id;
			//Note: get the particular plan details
			$this->write_file(";call fr_get_package_details_id('".$plan_package_id."');");
			if(!$pack_detail_query = $this->query("call fr_get_package_details_id('".$plan_package_id."')")){
				throw new Exception('Problem in executing get package details id');
			}
			$pack_detail_res = $this->fetch_assoc($pack_detail_query);
			
			$duration_type =  $pack_detail_res['package_duration_type'] == 'M' ? 'months' : 'years';
			$duration = $pack_detail_res['package_duration'];
			$no_users = intval($pack_detail_res['no_users']);
			$exp_date = strtotime("$duration $duration_type",strtotime($today_date)) ; 
			$valid_till = date('Y-m-d',$exp_date ); 
			
			if($valid_till ==  date('Y-m-d')){
				$valid_till = date('Y-m-d',strtotime(date("Y-m-d", strtotime($valid_till)) . " +1 year")); 
			}						
			
			//Note: Insert Transaction and Purchase Details
			$this->write_file(";call fr_save_transaction_details('".$trans_id."','$trans_status','".$mysql->real_escape_string($trans_response)."','".$trans_ref."','".$trans_amount."','$merchant_ref_no','$payment_id','".$today_date."','$payment_type','$response','".$mysql->real_escape_string($auth)."','".$mysql->real_escape_string($error_no)."','".$company_id."','".intval($rtransaction_id)."','0');");
			if(!$save_transaction_query = $this->query("call fr_save_transaction_details('".$trans_id."','$trans_status','".$mysql->real_escape_string($trans_response)."','".$trans_ref."','".$trans_amount."','$merchant_ref_no','$payment_id','".$today_date."','$payment_type','$response','".$mysql->real_escape_string($auth)."','".$mysql->real_escape_string($error_no)."','".$company_id."','".intval($rtransaction_id)."','0')")){
				throw new Exception('Problem in executing save transaction details');
			}
			$save_transaction_res = $this->fetch_assoc($save_transaction_query);
			//save the purchase details
			if($pack_detail_res['package_duration_type'] == 'Y') {
				$exp_value = $pack_detail_res['package_duration'].' year';
			}
			elseif($pack_detail_res['package_duration_type']  == 'M') {
				$exp_value = $pack_detail_res['package_duration'].' month';
			}
			elseif($pack_detail_res['package_duration_type']  == 'D') {
				$exp_value = $pack_detail_res['package_duration'].' days';
			}
		    //Note: get expiry date to update company users valid till and company expiry date		
			if($current_plan_expiry_date != ''){
				$expiry_date = $current_plan_expiry_date; 
				
			}else{
				if($renew_plan_start_date != '')
					$expiry_date = strtotime($exp_value,strtotime($renew_plan_start_date)) ; 
				else {
					$expiry_date = strtotime($exp_value,strtotime($today_date)) ; 
					$expiry_date = strtotime('-1 day',$expiry_date);
				}	
				$expiry_date = date('Y-m-d H:i:s',$expiry_date); 
			}
			//Note: save purchase details
			$this->write_file(";call fr_save_purchase_details('".$plan_package_id."','".$save_transaction_res['inserted_id']."','".$expiry_date."','".$company_id."','$purchase_type','".intval($upgrade_pack_id)."','".intval($rpurchase_id)."','".$today_date."','$trans_amount');");
			if(!$save_purchase_query = $this->query("call fr_save_purchase_details('".$plan_package_id."','".$save_transaction_res['inserted_id']."','".$expiry_date."','".$company_id."','$purchase_type','".intval($upgrade_pack_id)."','".intval($rpurchase_id)."','".$today_date."','$trans_amount')")){
				throw new Exception('Problem in executing save purchase details');
			}
		//	$this->write_file('Amount:'.$cur_plan_details['amount'].', Plan Expiry Date:'.$cur_plan_details['expiry_date'].', Expiry Date:'.$expiry_date.', Today Date:'.date('Y-m-d').', Trans Status:'.$trans_status.', Query:'."call fr_update_company_plan_expiry('".$purchase_date."','".$plan_expiry."','$company_id')");
			//Note: Update company  purchase and expiry date of the plan
			if($trans_status == 'Completed' ) { 
				if((intval($cur_plan_details['amount']) == 0 || $cur_plan_details['expiry_date'] < date('Y-m-d')) && $trans_status == 'Completed') {
					$purchase_date = $today_date; $plan_expiry = $expiry_date;
					if(!$plan_expiry = $this->query("call fr_update_company_plan_expiry('".$purchase_date."','".$plan_expiry."','$company_id')")){
						throw new Exception('Problem in executing to update plan expiry details');
					}
				}
			}
			
			
			
			//Note: Update validity till of company users valid till
			if($trans_status == 'Completed' ) { //$plan_type == 'renew' || $plan_type == 'customrenew' || $plan_type == 'upgrade') {
				//Note: User company user valid till based upon on the package expiry date
				//-- start
				$this->update_company_user_valid_till($company_id,$comp_user_id,$expiry_date,$no_users,$purchase_type);
				//-- End
			}
			//Note: The following script are used to send mail to user about their payment details
			//Note: object creation for mail sending
				
			if($trans_status != 'Pending'){
				$fn = new india_job_function(); $content = new Content(); 
				$ses = new SimpleEmailService(amz_token, amz_signature);$ses->enableVerifyPeer(false);
				$mailer = new SimpleEmailServiceMessage(); $mailer->setFrom('noreply@jobsfactory.in');
			}
		
			if($trans_status == 'Completed'){
				$subscription_details['package_name']  = $pack_detail_res['package_name'];
				$subscription_details['expiry_date']  = $expiry_date; $subscription_details['purchase_type']  = $purchase_type;
				$subscription_details['subscription'] = 'package';
				//$this->write_file('Going to sent a payment mail to company user (Employer File Path:-'.employer_file_path.')');
				$method_name = $this->get_payment_method($payment_type);
				$mail_content = $content->content_payment_receipt(ucwords($save_transaction_res['first_name']),$payment_id,$trans_amount,$merchant_ref_no,date('d-M-Y'),$trans_id,$method_name,$subscription_details);
				$mail_res = $fn->send_mail($ses,$mailer,amz_from_email,$save_transaction_res['email_address'],'Jobs Factory - Payment Receipt!', $mail_content, NULL);
				if(trim($mail_res['MessageId']) != '' && $return_message == '1'){ 
					echo $mail_content.'<br/>';
					return 'Mail sent successfully';
				}
			}elseif($trans_status == 'Failed' || $trans_status == 'CANCELED'){
				$mail_content = $content->content_payment_failed(ucwords($save_transaction_res['first_name']),$trans_status,'E');
				$mail_res = $fn->send_mail($ses,$mailer,amz_from_email,$save_transaction_res['email_address'],'Jobs Factory - Payment '.($trans_status == 'Failed' ? 'Failed!' : 'Canceled!'), $mail_content, NULL);
			}			
	}
	/*Note: The following function is used to get payment type name*/
	function get_payment_method($payment_type){
		$type_name = 'Credit Card';
		if($payment_type == 'CQ')
			$type_name = 'Cheque';
		elseif($payment_type == 'DD')		
			$type_name = 'Demand Draft';
		return $type_name;	
	}
	/*Note: The following function is used to insert additional purchase details*/
	function insert_additional_purchase_details($today_date,$trans_amount,$trans_status,$trans_response,$trans_id,$trans_ref_no,$merchant_ref_no,$payment_id,$company_id,$company_users_id,$package_id,$additinal_details,$payment_type,$response = '',$error_no ='',$auth='',$return_message = '0') {
		$mysql = new mysqli(HOST,USERNAME,PASSWORD,DBASE);
		$additinal_purchase_details = explode('S',$additinal_details);
		//Index 0 - job count    //Index 1 - cv access counnt     // Index 2 - User Count
		//Index 3 - user validity month    //Index 4 - Sms Count  // Index 5 - Mail Count
		//Index 6 - Premium Job Count     // Index 7 - Total Amount
		
		$custom_data = explode('S',$package_id);
		if(intval($custom_data[2]) > 0){
			$rtransaction_id  = $custom_data[2];
		}
	
	    //Note: get current active plan details of employer
		$plan_qry = "call em_get_plan_details('".$company_id."','".$today_date."','')"; 
		if(!$plan_qrry = $this->query($plan_qry)){
			throw new Exception('Problem in executing get plan of company');
		}
		if($plan_qrry->num_rows){
			$package_res =  $this->fetch_assoc($plan_qrry);
			$package_id = $package_res['id'];
			//note: save transaction details
			if(!$save_transaction_query = $this->query("call fr_save_transaction_details('".$trans_id."','$trans_status','".$mysql->real_escape_string($trans_response)."','$trans_ref_no','".$trans_amount."','$merchant_ref_no','$payment_id','".$today_date."','$payment_type','$response','".$mysql->real_escape_string($auth)."','".$mysql->real_escape_string($error_no)."','".$company_id."','".intval($rtransaction_id)."','1')")){
				throw new Exception('Problem in executing save transaction details');
			}
			$save_transaction_res = $this->fetch_assoc($save_transaction_query);
			//Note: delete subscription details, when user update their pending transaction payment mode after login
			if(intval($rtransaction_id) > 0 && $return_message == '0') {	
				$this->query("call em_delete_additional_subscription('$rtransaction_id')");
			}
			//Note: Insert jobs subscription details
			if($additinal_purchase_details[0] > 0 ){
				$this->query("call save_additional_subscription('J','".$additinal_purchase_details[0]."','".$today_date."','".$save_transaction_res['inserted_id']."','$package_id','0','".$company_id."')");
			}
			//Note: Insert cv access subscription details
			if($additinal_purchase_details[1] > 0 ){
				$this->query("call save_additional_subscription('C','".$additinal_purchase_details[1]."','".$today_date."','".$save_transaction_res['inserted_id']."','$package_id','0','".$company_id."')");
			}
			//Note: Insert user subscription details
			if($additinal_purchase_details[2] > 0 && $return_message == '0'){
				$this->query("call save_additional_subscription('U','".$additinal_purchase_details[2]."','".$today_date."','".$save_transaction_res['inserted_id']."','$package_id','".$additinal_purchase_details[3]."','".$company_id."')");
			}
			if($additinal_purchase_details[2] > 0) {
				if($trans_status == 'Completed'){
					$plan_expiry_date = date('Y-m-d',strtotime($package_res['expiry_date']));
					$validity = $additinal_purchase_details[3];
					$no_users = intval($additinal_purchase_details[2]);
					$valid_till = $plan_expiry_date;
					if($validity > 0){
						$new_valid_till = date('Y-m-d',strtotime("$validity months -1 day"));
						if(date('Y-m-d') < $new_valid_till && $new_valid_till <=  $valid_till){
							$valid_till = $new_valid_till;
						}
					}
					$this->update_company_user_valid_till($company_id,0,$valid_till,$no_users,'','additional');
				}
			}
			//Note: Insert sms subscription details
			if($additinal_purchase_details[4] > 0 ){
				$this->query("call save_additional_subscription('S','".$additinal_purchase_details[4]."','".$today_date."','".$save_transaction_res['inserted_id']."','$package_id','0','".$company_id."')");
			}
			//Note: Insert mail subscription details
			if($additinal_purchase_details[5] > 0 ){
				$this->query("call save_additional_subscription('M','".$additinal_purchase_details[5]."','".$today_date."','".$save_transaction_res['inserted_id']."','$package_id','0','".$company_id."')");
			}
			//Note: Insert premium job subscription details
			if($additinal_purchase_details[6] > 0 ){
				$this->query("call save_additional_subscription('P','".$additinal_purchase_details[6]."','".$today_date."','".$save_transaction_res['inserted_id']."','$package_id','0','".$company_id."')");
			}
			//Note: The following script are used to send mail to user about their payment details
			//Note: object creation for mail sending
				if($trans_status != 'Pending'){
					$fn = new india_job_function(); $content = new Content(); 
					$ses = new SimpleEmailService(amz_token, amz_signature);$ses->enableVerifyPeer(false);
					$mailer = new SimpleEmailServiceMessage(); $mailer->setFrom('noreply@jobsfactory.in');
				}
			if($trans_status == 'Completed'){
				//Note: Get Subscription Details to send in mail
				$sql_qry = "call em_get_subscription_details('".$save_transaction_res['inserted_id']."')";
				if(!$view_package_query = $this->query($sql_qry)){
					throw new Exception('Problem in executing view additional package detail');
				}
				if($view_package_query->num_rows){
					$subscription_details[0]['subscription'] = 'emp_additional';
					while($additional_subscription = $this->fetch_assoc($view_package_query)){
						$subscription_details[]  = $additional_subscription;
					}
				}
				//$this->write_file('Going to sent a payment mail to company user (Employer File Path:-'.employer_file_path.')');
				$method_name = $this->get_payment_method($payment_type);
				$mail_content = $content->content_payment_receipt(ucwords($save_transaction_res['first_name']),$payment_id,$trans_amount,$merchant_ref_no,date('d-M-Y'),$trans_id,$method_name,$subscription_details);
				$mail_res = $fn->send_mail($ses,$mailer,amz_from_email,$save_transaction_res['email_address'],'Jobs Factory - Payment Receipt!', $mail_content, NULL);
				if(trim($mail_res['MessageId']) != '' && $return_message == '1'){ 
					echo $mail_content.'<br/>';
					return 'Mail sent successfully';
				}
			}elseif($trans_status == 'Failed' || $trans_status == 'CANCELED'){
				$mail_content = $content->content_payment_failed(ucwords($save_transaction_res['first_name']),$trans_status,'E');
				$mail_res = $fn->send_mail($ses,$mailer,amz_from_email,$save_transaction_res['email_address'],'Jobs Factory - Payment '.($trans_status == 'Failed' ? 'Failed!' : 'Canceled!'), $mail_content, NULL);
			}
		}
	}
		/* function to restrict to access more than one user for same account (employers) */
	function multi_user_restriction($id,$ip,$browser_name,$version,$user_id){
		$authenticate_users = "call em_check_authenticate_user('".$_SESSION['em_id']."')"; 
		if(!$execute_authenticate_users = $this->query($authenticate_users)){
			throw new Exception('Problem in executing get authedication details');
		}
		if(!$execute_authenticate_users->num_rows){
			return 'I';
		}
		$user_online_qry = $this->query("call em_check_multiuser_login('$id','$ip','$browser_name','$version','$user_id')");
		if(!$user_online_qry->num_rows){
			return 'I';
		}	
	}
/* function to restrict to access more than one user for same account (college users) */
	function college_multi_user_restriction($id,$ip,$browser_name,$version,$user_id){
		$authenticate_users = "call co_check_authenticate_user('".$_SESSION['co_id']."')"; 
		if(!$execute_authenticate_users = $this->query($authenticate_users)){
			throw new Exception('Problem in executing get authentication details');
		}
		if(!$execute_authenticate_users->num_rows){
			return 'I';
		}
		$user_online_qry = $this->query("call co_check_multiuser_login('$id','$ip','$browser_name','$version','$user_id')");
		if(!$user_online_qry->num_rows){
			return 'I';
		}
		
	}
	/*Note: The following function is used to user profile completeness*/
	function get_company_profile_completeness($company_id,$type=''){
		$percentage = '-1'; 
		if($company_id == '') $company_id = $_SESSION['co_company_id'];
			$profile_completeness_query = $this->query("call em_get_profile_completeness($company_id)");
			if($profile_completeness_query->num_rows){
				if($profile_completeness_res = $this->fetch_array($profile_completeness_query)){
					$fields = array('company_name','logo','website','landline_no','office_address','company_profile','city','vision_values','services_offered','employee_strength','financial_performance','geographical_presence','customers','future_plans','certifications','state_id');
					$total_count = count($fields);
					$i =0;
					
					foreach($fields as $key){
						if(trim($profile_completeness_res[$key]) == ''){
							$i++;
						}
					}
					
		
				}else{
					$percentage = '-1';
				}
				if($i == 0){
					$percentage = '100';
				}	 
				else if($i != $total_count){ 
					$percentage = round((($total_count-$i)/$total_count) * 100);
					   
				}
				
		 }
		 
		 $percentage = intval($percentage);
		 if($percentage >=0 && $percentage <=50)
			$percentage_class = 'nFailure';
		 elseif($percentage >=51 && $percentage <=79)
			$percentage_class = 'nWarning';
         else
			$percentage_class = 'nSuccess'; 
		 $arr_percentage = array($percentage,$percentage_class);
		 return $arr_percentage;
		 
	}
	function get_college_profile_completeness($college_id,$type=''){
		$percentage = '-1'; 
		if($college_id == '') $college_id = $_SESSION['co_college_id'];
			$profile_completeness_query = $this->query("call co_get_profile_completeness($college_id,'$type')");
			if($profile_completeness_query->num_rows){
				if($profile_completeness_res = $this->fetch_array($profile_completeness_query)){
					if($type == 'home')
						$fields = array('college_name','logo','year_estd','affiliation','accreditation','college_branches',
								'address','communication_address','city','state_id','landline_no1','landline_no2',
								'website');
					elseif($type == 'about_us')
						$fields = array('vision','mission','brief_history','milestones','achievements','renowed_alumini',
								'alumini_network','male_students','female_students','campus_ready_students','brochure');								
					elseif($type == 'faculty')
						$fields = array('position_name','position_no','no_faculty','qualification_course_id','ratio','student_course_details_id');								
				    elseif($type == 'infrastructure')
						$fields = array('total_area','no_class_rooms','lab_details','playground_area');								
					elseif($type == 'academics')
						$fields = array('academic_type','academic_value','academic_course_details_id','specialization_id');	
					elseif($type == 'placement')
						$fields = array('students_placed_last_year','packages_high','packages_average','packages_low','companies_hired_recently','companies_hired_tilldate',
									'companies_come_regular','placement_no_students','placement_industry');	
					else
						$fields = array('college_name','logo','year_estd','affiliation','accreditation','college_branches',
								'address','communication_address','city','state_id','landline_no1','landline_no2',
								'contact_person','mobile','website','vision','mission','brief_history','milestones','achievements','renowed_alumini',
								'alumini_network','male_students','female_students','campus_ready_students',
								'no_faculty','qualification_course_id','ratio','student_course_details_id',
								'total_area','no_class_rooms','lab_details','playground_area','academic_type','academic_value','academic_course_details_id','specialization_id',
								'students_placed_last_year','packages_high','packages_average','packages_low','companies_hired_recently','companies_hired_tilldate',
								'companies_come_regular','placement_no_students','placement_industry','brochure');
					$total_count = count($fields);
					$i =0;
					
					foreach($fields as $key){
						if(trim($profile_completeness_res[$key]) == ''){
							$i++;
						}
					}
					
		
				}else{
					$percentage = '-1';
				}
				if($i == 0){
					$percentage = '100';
				}	 
				else if($i != $total_count){ 
					$percentage = round((($total_count-$i)/$total_count) * 100);
					   
				}
				
		 }
		 
		 $percentage = intval($percentage);
		 if($percentage >=0 && $percentage <=50)
			$percentage_class = 'nFailure';
		 elseif($percentage >=51 && $percentage <=79)
			$percentage_class = 'nWarning';
         else
			$percentage_class = 'nSuccess'; 
		 $arr_percentage = array($percentage,$percentage_class);
		 return $arr_percentage;
		 
	}
	/*Note: The following function is used to get jobs eligibility*/
	function get_job_eligibility($job_id) {
		//Note: The following sp is used to get jobs program details (Eg. UG,PG,ITI,Diploma)
		$program_qry = "call fr_get_jobs_program('".$job_id."');"; 
		if(!$program_qrry = $this->query($program_qry)){
			throw new Exception('Problem in executing get program details');
		}
		if($program_qrry->num_rows){
			$program_values = array();
			$k = 0;
			while($program_res = $this->fetch_array($program_qrry)){
				$program_values[$k]['program_name'] = $program_res['program_name'];
				//Note: The following sp is used to get jobs course details by program id (Eg. Bachelor of Arts, Master of Law )
				$course_query = "call fr_get_jobs_course('".$program_res['id']."');"; 
				if(!$execute_course_query = $this->query($course_query)){
					throw new Exception('Problem in executing get program course details');
				}
				while($course_res = $this->fetch_array($execute_course_query)){
					$program_values[$k]['degree_name'][] = $course_res['course_name'];
					//Note: The following sp is used to get jobs course specialization details by course id (Eg. Computer Science,Economics,English)
					$specialization_query = "call fr_get_jobs_specialization('".$course_res['id']."');"; 
					if(!$excute_specialization_query = $this->query($specialization_query)){
						throw new Exception('Problem in executing get specialization details');
					}
					$spcialization = '';
					while($specialization_res = $this->fetch_array($excute_specialization_query)){
						$spcialization .= ', '.$specialization_res['specialization'];
					}
					$program_values[$k]['specialization'][] = substr($spcialization,2,strlen($spcialization));
				}
				$k++;
			}
			return $program_values;
		
		}
	}
	/*Note: The following function is used to insert college additional purchase details*/
	function insert_college_additional_purchase_details($today_date,$trans_amount,$trans_status,$trans_response,$trans_id,$trans_ref_no,$merchant_ref_no,$payment_id,$college_id,$college_users_id,$package_id,$additinal_details,$payment_type,$response = '',$error_no='',$auth='',$return_message ='0') {
		$additinal_purchase_details = explode('S',$additinal_details); //Index 0 - student count    //Index 1 - User counnt // Index 2 - Total Amount
		$custom_data = explode('S',$package_id);
		//Note: assign transaction id, when approve purchase
		if(intval($custom_data[4]) > 0){
			$rtransaction_id  = $custom_data[4];
		}
		$mysql = new mysqli(HOST,USERNAME,PASSWORD,DBASE);
		$plan_qry = "call co_get_plan_details('".$college_id."','".$today_date."','')";  
		if(!$plan_qrry = $this->query($plan_qry)){
			throw new Exception('Problem in executing get plan of college');
		}
		if($plan_qrry->num_rows){
			$package_res =  $this->fetch_assoc($plan_qrry);
			$package_id = $package_res['id'];
			//Note: delete subscription details, when user update their pending transaction payment mode after login
			if(intval($rtransaction_id) > 0 && $return_message == '0') {	
				$this->query("call co_delete_additional_subscription('$rtransaction_id')");
			}
			//note: save transaction details
			if(!$save_transaction_query = $this->query("call co_save_transaction_details('".$trans_id."','$trans_status','".$mysql->real_escape_string($trans_response)."','$trans_ref_no','".$trans_amount."','$merchant_ref_no','$payment_id','".$today_date."','$payment_type','$response','".$mysql->real_escape_string($auth)."','".$mysql->real_escape_string($error_no)."','".$college_id."','".intval($rtransaction_id)."','1')")){
				throw new Exception('Problem in executing save transaction details');
			}
			$save_transaction_res = $this->fetch_assoc($save_transaction_query);
					
			//Note: Insert students subscription details
			if($additinal_purchase_details[0] > 0 ){
				$this->query("call fr_save_college_additional_subscription('S','".$additinal_purchase_details[0]."','".$today_date."','".$save_transaction_res['inserted_id']."','$package_id','".$college_id."','".$package_res['college_category_id']."')");
			}
			
			//Note: Insert user subscription details
			if($additinal_purchase_details[1] > 0 && $return_message == '0' ){
				$this->query("call fr_save_college_additional_subscription('U','".$additinal_purchase_details[1]."','".$today_date."','".$save_transaction_res['inserted_id']."','$package_id','".$college_id."','".$package_res['college_category_id']."')");
				
			}
			if($additinal_purchase_details[1] > 0) {
				if($trans_status == 'Completed'){
						//Note: get last logged in user details
						if(!$get_user_login_qry = $this->query("call co_get_last_login_users('".$college_id."')")){
								throw new Exception('Problem in executing get last login user details');
						}
						if($get_user_login_qry->num_rows) {
							$i = 0;
							$no_users = intval($additinal_purchase_details[1]);
							$plan_expiry_date = date('Y-m-d',strtotime($package_res['expiry_date']));
							while($user_res = $this->fetch_array($get_user_login_qry)){
								 if($no_users > $i && $user_res['valid_till'] < $plan_expiry_date) {
									//Note: increase the company user validity
									$update_user_validity_query = $this->query("call co_update_user_validity('".$plan_expiry_date."','".$user_res['id']."')");
									if($update_user_validity_query->num_rows) {
										$i++;
									}
								}
							
							}
							
					}
				}
			}
			//Note: The following script are used to send mail to user about their payment details
			//Note: object creation for mail sending
			if($trans_status != 'Pending'){
				$fn = new india_job_function(); $content = new Content(); 
				$ses = new SimpleEmailService(amz_token, amz_signature);$ses->enableVerifyPeer(false);
				$mailer = new SimpleEmailServiceMessage(); $mailer->setFrom('noreply@jobsfactory.in');
			}
			if($trans_status == 'Completed'){
				//Note: Get Subscription Details to send in mail
				$sql_qry = "call co_get_subscription_details('".$save_transaction_res['inserted_id']."')";
				if(!$view_package_query = $this->query($sql_qry)){
					throw new Exception('Problem in executing view additional package detail');
				}
				if($view_package_query->num_rows){
					$subscription_details[0]['subscription'] = 'cl_additional';
					while($additional_subscription = $this->fetch_assoc($view_package_query)){
						$subscription_details[]  = $additional_subscription;
					}
				}
				//$this->write_file('Going to sent a payment mail to college user (Employer File Path:-'.employer_file_path.')');
				$method_name = $this->get_payment_method($payment_type);
				$mail_content = $content->content_payment_receipt(ucwords($save_transaction_res['first_name']),$payment_id,$trans_amount,$merchant_ref_no,date('d-M-Y'),$trans_id,$method_name,$subscription_details,'C');
				$mail_res = $fn->send_mail($ses,$mailer,amz_from_email,$save_transaction_res['email_address'],'Jobs Factory - Payment Receipt!', $mail_content, NULL);
				if(trim($mail_res['MessageId']) != '' && $return_message == '1'){ 
					echo $mail_content.'<br/>';
					return 'Mail sent successfully';
				}
			}elseif($trans_status == 'Failed' || $trans_status == 'CANCELED'){
				$mail_content = $content->content_payment_failed(ucwords($save_transaction_res['first_name']),$trans_status,'C');
				$mail_res = $fn->send_mail($ses,$mailer,amz_from_email,$save_transaction_res['email_address'],'Jobs Factory - Payment '.($trans_status == 'Failed' ? 'Failed!' : 'Canceled!'), $mail_content, NULL);
			}
			
			
		}
	}
	/*Note:  The following function is used to get mobile verification status */
	function get_mobile_verification_status(){
		$status = '0';
		$verification_qry = "call fr_get_mobile_verification_status('".$_SESSION['user_id']."')";  
		if(!$exe_verification_qry = $this->query($verification_qry)){
			throw new Exception('Problem in executing get mobile verification status');
		}
		if($exe_verification_qry->num_rows){
			$result = $this->fetch_assoc($exe_verification_qry);
			$status = intval($result['status']);
		}
		return $status;
	}
	/*Note:  The following function is used to check active mobile number is already updated for current login user */
	function check_jobseeker_mobileno($mobile_number){
		$status = '0';
		$mobile_no_qry = "call fr_check_jobseeker_mobileno('".$_SESSION['user_id']."','$mobile_number')";  
		if(!$exe_mobile_no_qry = $this->query($mobile_no_qry)){
			throw new Exception('Problem in executing get mobile verification status');
		}
		if($exe_mobile_no_qry->num_rows){
			$result = $this->fetch_assoc($exe_mobile_no_qry);
			$status = intval($result['id']);
		}
		return $status;
	}
	function get_total_verify_count($mobile_number,$cur_date){
		$count = '0';
		$mobile_no_qry = "call fr_get_mobile_verification_count('".$_SESSION['user_id']."','$mobile_number','$cur_date')";  
		if(!$exe_mobile_no_qry = $this->query($mobile_no_qry)){
			throw new Exception('Problem in executing get mobile verification count');
		}
		if($exe_mobile_no_qry->num_rows){
			$result = $this->fetch_assoc($exe_mobile_no_qry);
			$count = intval($result['count']);
		}
		return $count;
	}
	
 }
$mysql_obj = new mysql();
$mysql = new mysqli(HOST,USERNAME,PASSWORD,DBASE);
if(count($_GET) == 2){
$smarty->assign('url','../../');
}
?>