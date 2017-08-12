<?php
include_once('class.mysql.php');
class validation_function extends mysql
{
	public $valid = true;
	public $group_error_msg = '';
	public $general_alert_error = '';
	public $general_alert_error1 = '';
	public $post_value ;
	
	//functionto replace the place holder values
	public function valid_placeholder($post) {
		$default_value = array('House no.','Street no./name','Area 1','Area 2','City/Town','District','Pincode','ID No.','**********','School Type','Standard');
		foreach($post as $key=>$value) {
			if(in_array($post[$key],$default_value)){
			      $post[$key] = "";
			}
		}
		return $post;
	}
	
 	function validate_form($post,$validation,$valid_type,$field,$error_msg,$max_length='',$max_size = '')
	{
	
		// call the placeholder replace function
		$post = $this->valid_placeholder($post);

		for($i = 0; $i <= count($post); $i++)
		{
			if($validation[$i] == 1)
			{
		
				switch($valid_type[$i])
				{
					case 'text':
					$error[$i]=$this->valid_text($post[$field[$i]],$field[$i],$error_msg[$i],$max_length[$i],'');
					break;
					case 'maxlength_only':
					$error[$i]=$this->valid_maxlength($post[$field[$i]],$field[$i],$error_msg[$i],$max_length[$i],'');
					break;
					case 'landline':
					$error[$i]=$this->valid_landline($this->trim_data($post[$field[$i]]),$field[$i],$error_msg[$i],'');
					break;					
					case 'mobile':
					$error[$i]=$this->valid_mobile($this->trim_data($post[$field[$i]]),$field[$i],$error_msg[$i],'');
					break;
					case 'sheepit_text':
					$error[$i]=$this->valid_sheepit_text($this->trim_data($post[$field[$i]][0]),$field[$i],$error_msg[$i],'');
					break;
					case 'group_validate':
					$error[$i]=$this->group_required_validation($post,$field[$i],$error_msg[$i]);
					break;
					case 'image':
					$error[$i]=$this->valid_image($this->trim_data($_FILES[$field[$i]]['name']),$_FILES[$field[$i]]['type'],$this->trim_data($_FILES[$field[$i]]['size']),$error_msg[$i],'');
					break;	
					case 'image_empty':
					$error[$i]=$this->valid_image_empty($this->trim_data($_FILES[$field[$i]]['name']),$_FILES[$field[$i]]['type'],$this->trim_data($_FILES[$field[$i]]['size']),$error_msg[$i],'');
					break;					
					case 'image_empty_nopng':
					$error[$i]=$this->valid_image_empty_nopng($_FILES[$field[$i]]['name'],$_FILES[$field[$i]]['type'],$this->trim_data($_FILES[$field[$i]]['size']),$error_msg[$i],'');
					break;
					case 'doc':
					$error[$i]=$this->valid_doc($this->trim_data($_FILES[$field[$i]]['name']),$_FILES[$field[$i]]['type'],$this->trim_data($_FILES[$field[$i]]['size']),$error_msg[$i],'');
					break;
					case 'doc_empty':
					$error[$i]=$this->valid_doc_empty($this->trim_data($_FILES[$field[$i]]['name']),$_FILES[$field[$i]]['type'],$this->trim_data($_FILES[$field[$i]]['size']),$error_msg[$i],'');
					break;					
					case 'all_file_empty':
					$error[$i]=$this->valid_all_file_empty($this->trim_data($_FILES[$field[$i]]['name']),$_FILES[$field[$i]]['type'],$this->trim_data($_FILES[$field[$i]]['size']),$error_msg[$i],'',$max_size[$i]);
					break;
					case 'array_checkbox':
					$error[$i]=$this->valid_array_checkbox($post[$field[$i]],$error_msg[$i]);
					break;					
					case 'multi_checkbox':
					$error[$i]=$this->valid_multiple_checkbox($post[$field[$i]],$error_msg[$i]);
					break;
					case 'alpha':
					$error[$i]=$this->valid_alpha($this->trim_data($post[$field[$i]]),$error_msg[$i]);
					 break;				 
					 case 'email':
					$error[$i]=$this->valid_email($this->trim_data($post[$field[$i]]),$error_msg[$i]);
					 break;
					 case 'w_email':
					$error[$i]=$this->valid_without_empty_email($this->trim_data($post[$field[$i]]),$error_msg[$i]);
					 break;
					 case 'date':
					$error[$i]=$this->valid_date($this->trim_data($post[$field[$i]]),$error_msg[$i]);
					 break;
					 case 'select': 
					 $error[$i] = $this->valid_select($post[$field[$i]],$error_msg[$i],'');					
					 break;				
					 case 'select_anyone':
					 $error[$i] = $this->valid_select_anyone($post,$field[$i],$error_msg[$i],'');
					 break;	
					 case 'radio':
					 $error[$i] = $this->valid_select_radio($post[$field[$i]],$error_msg[$i]);
					 break;
					 case 'number':
					 $error[$i] = $this->valid_number($post[$field[$i]],$error_msg[$i],'');
					 break;
					 case 'decimal':
					 $error[$i] = $this->valid_decimal($post[$field[$i]],$error_msg[$i],'');
					 break;
					 case 'zipcode':
					 $error[$i] = $this->valid_zipcode($post[$field[$i]],$error_msg[$i]);
					 break;
					 case 'website':
					 $error[$i] = $this->valid_website($post[$field[$i]],$error_msg[$i]);
					 case 'valid_leads':
					 $error[$i] = $this->valid_leads($post[$field[$i]],$error_msg[$i]);
					 break;					 
					 case 'password':
					 $error[$i] = $this->valid_password($post[$field[$i]],$error_msg[$i]);
					 break;					
					 case 'cpassword':
					 $error[$i] = $this->valid_password($post[$field[$i]],$error_msg[$i]);
					 break;
				}
			}
		}
		
		if($this->valid == false)
		{
			return $error;
		}
		else
		{
			return true;
		}
	}
function valid_date($post_date,$error_msg)
{
	if(!$post_date)
    {
		$errormsg[]=$error_msg;
		$errormsg[]=" message";
		$this->valid=false;
		return $errormsg;
    }	
}
// image validation without empty
	function valid_image_empty_nopng($post_text,$type,$post_size,$error_msg)
	{
		$error_msg1 =  explode('-',$error_msg);
		if(!$post_text)
		{
		
			$errormsg[]= $error_msg1['0'];
			$errormsg[]=" error";
			$this->valid=false;
			return $errormsg;

		} 
		
		else if($post_text != '') {
			$file_format = array('image/jpeg','image/pjpeg','image/gif');
			if(!in_array(strtolower($type),$file_format)){	
				$errormsg[]= $error_msg1['1'];
				$errormsg[]=" error";
				$this->valid=false;
				return $errormsg;
			}else{
				if($post_size > 1024000) {
					$errormsg[]= $error_msg1['2'];
					$errormsg[]=" error";
					$this->valid=false;
					return $errormsg;
				}
			}
		
		}
	}
/* trim the data only if its a string */
function trim_data($data){
	if(gettype($data) == 'string'){
		return trim($data);
	}else if(gettype($data) == 'array'){
		foreach ($data as $value) {
			return trim($value);
		}
	}else{
		return trim($data);
	}
		
}

function valid_text($post_text,$name,$error_msg,$max_length,$dont_show)
{
	$len = strlen($this->trim_data($post_text));
	$error_msg = explode('-',$error_msg);
	if(!$this->trim_data($post_text))
	{	
		if ($dont_show == ''){
			$errormsg[]=$error_msg[0];
			$errormsg[]=" message";
			$this->valid=false;
			return $errormsg;
		}	
		else{
			$this->group_error_msg = $this->group_error_msg . ', ' . $error_msg;
		}
	}elseif(intval($max_length) > 0 && $len>$max_length) {
		$errormsg[]=$error_msg[1];
		$errormsg[]=" message";
		$this->valid=false;
		return $errormsg;
	}
	
}

/* Function to validate the maximum length only */
function valid_maxlength($post_text,$name,$error_msg,$max_length,$dont_show)
	{
		$len = strlen($this->trim_data($post_text));
		if(intval($max_length) > 0 && $len>$max_length && $post_text!= '') {
			$errormsg[]=$error_msg;
			$errormsg[]=" error";
			$this->valid=false;
			return $errormsg;
		}
}

//function to validate landline number
function valid_landline($post_text,$name,$error_msg,$dont_show)
	{
		if(!$this->trim_data($post_text))
		{	
			if ($dont_show == ''){
				$errormsg[]=$error_msg;
				$errormsg[]=" message";
				$this->valid=false;
				return $errormsg;
			}	
			else{
				$this->group_error_msg = $this->group_error_msg . ', ' . $error_msg;
			}
		}
		else{
			if(!preg_match("/^[0-9]\d{2,4}[- ]{1}\d{6,8}$/i", $post_text)) {    
				$errormsg[]=$error_msg[1];
				$errormsg[]="error";
				$this->valid=false;
				return $errormsg;
			}	
			else{	
				   $this->group_error_msg = $this->group_error_msg . ', ' . $error_msg;
			}
		}
}

//function to validate landline number
function valid_mobile($post_text,$name,$error_msg,$dont_show)
	{
		$error_msg = explode('-',$error_msg);
		if(!$this->trim_data($post_text))
		{	
		
			if ($dont_show == ''){
				$errormsg[]=$error_msg[0];
				$errormsg[]=" message";
				$this->valid=false;
				return $errormsg;
			}	
			else{
					
				   $this->group_error_msg = $this->group_error_msg . ', ' . $error_msg;
			}
		}
		else{
			if(!preg_match("/^0?[0-9]{1}\d{9}$/i", $post_text) && !preg_match("/^[0-9]\d{2,4}[- ]{1}\d{6,8}$/i", $post_text)) {    
				$errormsg[]=$error_msg[1];
				$errormsg[]=" message";
				$this->valid=false;
				return $errormsg;
			}	
			else{	
				   $this->group_error_msg = $this->group_error_msg . ', ' . $error_msg;
			}
			
		
		}
}

function valid_password($post_text,$error_msg)
	{
	
		if(!$this->trim_data($post_text))
		{	
				$errormsg[]=$error_msg;
				$errormsg[]=" message";
				$this->valid=false;
				return $errormsg;
		}
}
function valid_sheepit_text($post_text,$name,$error_msg,$dont_show)
	{
	
		if(!$post_text)
		{	
		
			if ($dont_show == ''){
				$errormsg[]=$error_msg;
				$errormsg[]=" message";
				$this->valid=false;
				return $errormsg;
			}	
			else{
					
				   $this->group_error_msg = $this->group_error_msg . ', ' . $error_msg;
			}
		}
}
/* field group required validation */
function group_required_validation($post,$field, $error_msg) {

    $this->group_error_msg = '';

    if ($field != '') {
        $split_field = explode('-',$field);
		
        $error_msg1 =  explode('-',$error_msg);
        $error_filed = ""; $split_field1 = '';
        for ($i = 0; $i < count($split_field); $i++) {
		
            $split_field1 = explode(':',$split_field[$i]);

            if ($split_field1[1] == "text") {

                $this->valid_text($this->trim_data($post[$split_field1[0]][0]),$split_field1[0],$error_msg1[$i], $max_length[$i], "dont_show");

            }
            else if ($split_field1[1] == "select") {

                $this->valid_select($this->trim_data($post[$split_field1[0]][0]),$error_msg1[$i], "dont_show");
            }
            else if ($split_field1[1] == "decimal") {
			
                $this->valid_decimal($this->trim_data($post[$split_field1[0]][0]),  $error_msg1[$i],"dont_show");
            }
			else if ($split_field1[1] == "number") {

                $this->valid_number($this->trim_data($post[$split_field1[0]][0]),  $error_msg1[$i],"dont_show");
            }
        }
   
		$this->group_error_msg = substr($this->group_error_msg,1,strlen($this->group_error_msg));

        if ($this->group_error_msg != "") {
		    $this->group_error_msg = $this->general_alert_error.$this->group_error_msg.$this->general_alert_error1;
            $errormsg[]=$this->group_error_msg ;
			$errormsg[]=" message";
			$this->valid=false;
			return $errormsg;
        }
         

    }
}
	function valid_select_anyone($post,$field,$error_msg,$dont_show=''){
		// select dropdown value 
		if ($field != '') {
			$split_field = explode('-',$field);
			$i = 0 ;
			$valid = 'false';
     		while ($i < count($split_field)) {
				if(($_POST[$split_field[$i]] != '') && ($_POST[$split_field[$i]] != '-1')) {
					$valid = 'true';
					break;
				}
				$i++;
			}
			if($valid == 'false'){
				$errormsg[]=$error_msg;
				$errormsg[]=" message";
				$this->valid=false;
				return $errormsg;
			}
		}
	}

function valid_array_checkbox($post_checkbox,$error_msg){
	if(!$post_checkbox)
    {
		$errormsg[]=$error_msg;
		$errormsg[]=" message";
		$this->valid=false;
		return $errormsg;
    }
}

function valid_multiple_checkbox($post_checkbox,$error_msg){
	if(empty($post_checkbox))
    {
		$errormsg[]=$error_msg;
		$errormsg[]=" message";
		$this->valid=false;
		return $errormsg;
    }
}
function valid_number($post_date,$error_msg,$dont_show = '')
{

		// value is in array
		if(is_array($post_date))  {

			foreach($post_date as $key=>$post_date) {
				if($post_date != ''){
					if(!is_numeric($this->trim_data($post_date)))
					{
						if($dont_show == '') {
							$errormsg[]=$error_msg;
							$errormsg[]=" message";
							$this->valid=false;
							return $errormsg;  
						} 
					}
				}
				else{
					if($dont_show == '') {
						$errormsg[]=$error_msg;
						$errormsg[]=" message";
						$this->valid=false;
						return $errormsg;  
					}
				}
			}
		}

	if($post_date != ''){
		if(!is_numeric($this->trim_data($post_date)))
		{
			if ($dont_show == ''){
				$errormsg[]=$error_msg;
				$errormsg[]=" message";
				$this->valid=false;
				return $errormsg;
			}	
			else{
					
				   $this->group_error_msg = $this->group_error_msg . ', ' . $error_msg;
			}
		}
	}
	else{
		if ($dont_show == ''){
				$errormsg[]=$error_msg;
				$errormsg[]=" message";
				$this->valid=false;
				return $errormsg;
			}	
			else{
					
				   $this->group_error_msg = $this->group_error_msg . ', ' . $error_msg;
			}
	}
	
}function valid_decimal($post_date,$error_msg,$dont_show='')
{

	if($post_date != ''){
		if(ereg('^[0-9]+\.[0-9]{2}$', $this->trim_data($post_date)))
		{
			if ($dont_show == ''){
				$errormsg[]=$error_msg;
				$errormsg[]=" message";
				$this->valid=false;
				return $errormsg;
			}	
			else{
					
				   $this->group_error_msg = $this->group_error_msg . ', ' . $error_msg;
			}
		}
	}
	else{
		if ($dont_show == ''){
				$errormsg[]=$error_msg;
				$errormsg[]=" message";
				$this->valid=false;
				return $errormsg;
			}	
			else{
					
				   $this->group_error_msg = $this->group_error_msg . ', ' . $error_msg;
			}
	}
	
}
/*Note: The following function is used to validate the website*/
function valid_website($post_date,$error_msg)
{
   $split_error = explode('-',$error_msg);
	if($post_date != ''){
		$regexp = '/^http[s]*\:\/\/[wwW]{3}\.+[a-zA-Z0-9]+\.[a-zA-Z]{2,3}.*$|^http[s]*\:\/\/[a-zA-Z0-9]+\.[a-zA-Z]{2,3}.*$|^[wwW]{3}\.+[a-zA-Z0-9]+\.[a-zA-Z]{2,3}.*$|^http[s]*\:\/\/[^w]{3}[a-zA-Z0-9]+\.[a-zA-Z]{2,3}.*$|http[s]*\:\/\/[0-9]{2,3}\.[0-9]{2,3}\.[0-9]{2,3}\.[0-9]{2,3}.*$/';
		if(!preg_match($regexp, $post_date))
		{
			$errormsg[]=$split_error[1];
			$errormsg[]=" message";
			$this->valid=false;
			return $errormsg;  
		}
	}
	else{
		$errormsg[]=$split_error[0];
		$errormsg[]=" message";
		$this->valid=false;
		return $errormsg;  
	}
}
function valid_zipcode($post_date,$error_msg)
{
	if($post_date != ''){
		if(!is_numeric($this->trim_data($post_date)) && !preg_match('/[-]/', $post_date))
		{
			$errormsg[]=$error_msg;
			$errormsg[]=" message";
			$this->valid=false;
			return $errormsg;  
		}
	}
	else{
		$errormsg[]=$error_msg;
		$errormsg[]=" message";
		$this->valid=false;
		return $errormsg;  
	}
}
	function valid_email($post_email,$error_msg)
	
	{
	$error_msg1 =  explode('-',$error_msg);
	if(!$this->trim_data($post_email))
		{
			$errormsg[]= $error_msg1[0]; ;
			$errormsg[]=" message";
			$this->valid=false;
			return $errormsg;
		}
	
    if(filter_var($post_email, FILTER_VALIDATE_EMAIL) === FALSE)
		{
			$errormsg[]=$error_msg1[1]; 
			$errormsg[]=" message";
			$this->valid=false;
			return $errormsg;
		}	
	}
	function valid_without_empty_email($post_email,$error_msg)
	{
		if($this->trim_data($post_email))
		{
			if(eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $post_email) == false) {
				$errormsg[]=$error_msg;
				$errormsg[]=" message";
				$this->valid=false;
				return $errormsg;
			}
			else {
				$this->valid=true;
			}
		}
	}
	
	function valid_alpha($post_text,$error_msg)
	{

		if(!$this->trim_data($post_text))
		{
			$errormsg[]=$error_msg;
			$errormsg[]=" message";
			$this->valid=false;
			return $errormsg;
		}
		elseif(!ctype_alnum($post_text)){
			$errormsg[]='Only Alpha numeric characters are allowed';
			$errormsg[]=" message";
			$this->valid=false;
			return $errormsg;
		}	
	}	
	
	
	function lastIndexOf($string,$item){
    $index=strpos(strrev($string),strrev($item));
    if ($index){
        $index=strlen($string)-strlen($item)-$index;
        return $index;
    }
        else
        return -1;
 }

	function valid_image($post_text,$type,$post_size,$error_msg)
	{
		/*
		if(!$post_text)
		{
		
			$errormsg[]=$error_msg;
			$errormsg[]=" message";
			$this->valid=false;
			return $errormsg;

		} 
		*/
		if($post_text != '') {
			// split the error message
			$error_msg1 =  explode('-',$error_msg);
			$file_format = array('image/jpeg','image/pjpeg','image/gif','image/png');
			if(!in_array(strtolower($type),$file_format)){	
				$errormsg[]= $error_msg1['0'];
				$errormsg[]=" message";
				$this->valid=false;
				return $errormsg;
			}else{
				if($post_size > 1024000) {
					$errormsg[]= $error_msg1['1'];
					$errormsg[]=" message";
					$this->valid=false;
					return $errormsg;
				}
			}
		
		}
	}	
	
	// image validation without empty
	function valid_image_empty($post_text,$type,$post_size,$error_msg)
	{
		$error_msg1 =  explode('-',$error_msg);
		if(!$post_text)
		{
		
			$errormsg[]= $error_msg1['0'];
			$errormsg[]=" message";
			$this->valid=false;
			return $errormsg;

		} 
		
		else if($post_text != '') {
			$file_format = array('image/jpeg','image/pjpeg','image/gif','image/png');
			if(!in_array(strtolower($type),$file_format)){	
				$errormsg[]= $error_msg1['1'];
				$errormsg[]=" message";
				$this->valid=false;
				return $errormsg;
			}else{
				if($post_size > 1024000) {
					$errormsg[]= $error_msg1['2'];
					$errormsg[]=" message";
					$this->valid=false;
					return $errormsg;
				}
			}
		
		}
	}	
	
	// validation for document like resume
	function valid_doc($post_text,$type,$post_size,$error_msg)
	{
		$error_msg1 =  explode('-',$error_msg);
		if(!$post_text)
		{
			$errormsg[]= $error_msg1['0'];
			$errormsg[]=" message";
			$this->valid=false;
			return $errormsg;

		}else{
			$file_format = array('application/octet-stream', 'application/msword','application/vnd.openxmlformats-officedocument.wordprocessingml.document');
			if(!in_array(strtolower($type),$file_format)){			
				$errormsg[]= $error_msg1['1'];
				$errormsg[]=" message";
				$this->valid=false;
				return $errormsg;
			}else{
				if($post_size > 512000) {
					$errormsg[]= $error_msg1['2'];
					$errormsg[]=" message";
					$this->valid=false;
					return $errormsg;
				}
			}
		}
		
		
	}
	
	
	// validation for document for placement enquiry
	function valid_doc_empty($post_text,$type,$post_size,$error_msg)
	{
	
		$error_msg1 =  explode('-',$error_msg);
		
		if($post_text)
		{
			$file_format = array('application/msword','application/vnd.openxmlformats-officedocument.wordprocessingml.document');
			if(!in_array(strtolower($type),$file_format)){		
				$errormsg[]= $error_msg1['1'];
				$errormsg[]=" message";
				$this->valid=false;
				return $errormsg;
			}else{
				if($post_size > 512000) {
					$errormsg[]= $error_msg1['2'];
					$errormsg[]=" message";
					$this->valid=false;
					return $errormsg;
				}
			}
		}
		
		
	}
		
		
		// validation for all file for if not empty
	function valid_all_file_empty($post_text,$type,$post_size,$error_msg,$max_size)
	{
		$error_msg1 =  explode('-',$error_msg);
		if($post_text)
		{
			
			$file_format = array('doc','docx','jpg','jpeg','gif','png','pdf','xls','xlsx','zip','rar');
			$ext = strtolower(pathinfo($post_text, PATHINFO_EXTENSION));
			if(!in_array(strtolower($ext),$file_format)){		
				$errormsg[]= $error_msg1['0'];
				$errormsg[]=" message";
				$this->valid=false;
				return $errormsg;
			}else{
				$file_size = ($max_size > 0) ? 1024000*$max_size : 1024000;
				if($post_size > $file_size) {
					$errormsg[]= $error_msg1['1'];
					$errormsg[]=" message";
					$this->valid=false;
					return $errormsg;
				}
			}
		}
		
		
	}
	
	
	
	function valid_select($post_option,$error_msg,$dont_show='')
	{
		// select dropdown value is in array
		
		if(is_array($post_option))  {
			foreach($post_option as $key=>$option_value) {
				if(($option_value == '-1') || ($option_value == '')) {
					$errormsg[]=$error_msg;
					$errormsg[]=" message";
					$this->valid=false;
					return $errormsg;
				}
				
			}
		}

		if(($post_option == '-1') || ($post_option == '') )
		{
			if($dont_show == ''){
				$errormsg[]=$error_msg;
				$errormsg[]=" message";
				$this->valid=false;
				return $errormsg;
			}
	        else
			{
			   $this->group_error_msg = $this->group_error_msg . ', ' . $error_msg;
			}
		}
	}	
	
	function valid_select_radio($post_option,$error_msg)
	{
		if($post_option == '')
		{
			$errormsg[]=$error_msg;
			$errormsg[]=" message";
			$this->valid=false;
			return $errormsg;
		}
	}
	function validate_password($psw,$cpsw)
	{
		if($psw && $cpsw)
		{
			if($psw!=$cpsw)
				return false;
			else
				return true;   
		}
		return true;
	  
	}
	//vaidate leads insert
	function valid_leads($post_value)
	{
		
		$default_value = array('City','Zipcode','I need to buy a new LCD Television for my home or I need to buy a bicycle or design a new website for my blog etc','buy color tv or book flight ticket or purchase new guitar etc','When do you want this to be completed?','Please select requirement type');

		if(!$this->trim_data($post_value) || in_array($post_value,$default_value))
		{
			
			$errormsg[]="style='border:1px solid #ff0000'";
			$errormsg[]='This field cannot be left blank';
			$errormsg[]="error";
			$this->valid=false;
			return $errormsg;
		}	
	}
	
}


$fn_valid = new validation_function();
?>