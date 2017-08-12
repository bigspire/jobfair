<?php
/**
 * This is a class file for to find browser details.
 * @copyright     Copyright 2011-2012, BigSpire Software (P) Ltd
 * @author        SATHISH M
 * @created       27-Feb-2013
 * @link          http://jobsfactory.in
 */


class common_function{

 	public $key = enc_key;
	
	/* check for maintenance */
	function check_maintenance($st){
		//  && $_SERVER['REMOTE_ADDR'] != '117.206.94.125'
		if($st == '1'){
			echo "<span style='font-size:18px;font-family:arial;text-align:'>Website is under scheduled maintenance.. will be back in few minutes...</span>";
			die;
		}
	}	
	
   /*Get the browser name */
   function  browser_name($type='name')  { 
		$useragent = $_SERVER["HTTP_USER_AGENT"];
		if (preg_match('|MSIE ([0-9].[0-9]{1,2})|',$useragent,$matched)) {
			$browser_version=$matched[1];
			$browser = 'IE';
		} elseif (preg_match( '|Opera ([0-9].[0-9]{1,2})|',$useragent,$matched)) {
			$browser_version=$matched[1];
			$browser = 'Opera';
		}elseif(preg_match('|Firefox/([0-9\.]+)|',$useragent,$matched)) {
			$browser_version=$matched[1];
			$browser = 'Firefox';
		}
		elseif(preg_match('|Chrome/([0-9\.]+)|',$useragent,$matched)) {
			$browser_version=$matched[1];
			$browser = 'AppleMAC-Safari';
		}
		elseif(preg_match('|Safari/([0-9\.]+)|',$useragent,$matched)) {
			$browser_version=$matched[1];
			$browser = 'Safari';
		} 
		else {
	
			// browser not recognized!
			$browser_version = 0;
			$browser= 'other';
		}
		if($type=='version')
			return strtolower($browser_version);
			return strtolower($browser); 			
   }
   
    /*  clean function is for strip the magic symbols	 */
	function clean($str){ 
		$str = @trim($str);		
		$mysqli = new mysqli(HOST,USERNAME,PASSWORD,DBASE);
		return $mysqli->real_escape_string($str);
	}
	
   function user_active(){
		return $active = "style='color:#0B55C4'";
   }
   //Note: The following function is used to get job seekers experience in words.
     function get_job_seeker_exp_str($experience_year){
		$total_exp = explode('.',$experience_year);
		$experince = ($total_exp[0] > 0 ? $total_exp[0].' year'.($total_exp[0] > 1 ? 's':'').' ': '').(($total_exp[0] > 0 && $total_exp[1] > 0 )? 'and ' : '').($total_exp[1] > 0 ?$total_exp[1].' month'.($total_exp[1] > 1 ?'s':''):'');
		$experince = $experince == '' ? 'Fresher' : $experince;
		return ucwords($experince);
	}
     function get_min_str($min_exp){
	   $min_max_str = 'Fresher';
		if($min_exp == '0') {
			$min_max_str = 'Fresher';
		}
		elseif($min_exp < 1){
			$min_max_str = str_replace('0.','',$min_exp).' Months';
		}
		
		elseif($min_exp >= 1 ){
			$min_max_str = $min_exp.' Year'.($min_exp > 1 ? 's':'');
		}
		return $min_max_str;			
	}
	function get_max_str($max_exp){
	   $min_max_str = '';
		if($max_exp == '0') {
			$min_max_str = '';
		}
		elseif(($max_exp < 1 && $max_exp != 0)){
			$min_max_str = str_replace('0.','',$max_exp).' Months';
		}
		elseif($max_exp >= 1){
			$min_max_str = $max_exp.' Year'.($max_exp > 1 ? 's':'');
		}
		return $min_max_str;			
	}
	function get_min_max_str($min_exp,$max_exp){
		$min_max_str = 'Fresher';
		if($min_exp == '0' && ($max_exp == '0' || $max_exp == '')) {
			$min_max_str = 'Fresher';
		}
		elseif($min_exp < 1 && ($max_exp < 1 && $max_exp != 0)){
			if($min_exp == $max_exp)
				$min_max_str = str_replace('0.','',$min_exp).' Months';
			else
				$min_max_str = str_replace('0.','',$min_exp).' - '.str_replace('0.','',$max_exp).' Months';
		}
		elseif($min_exp < 1 && $max_exp >= 1){
			$min_exp = str_replace('0.','',$min_exp);
			$min_max_str = $min_exp.($min_exp > 0 ?' Months' :'').' - '.$max_exp.' Year'.($max_exp > 1 ? 's':'');
		}
		elseif($min_exp >= 1 && $max_exp >= 1){
			if($min_exp == $max_exp)
				$min_max_str = $max_exp.' Years';
			else
				$min_max_str = $min_exp.' - '.$max_exp.' Years';
		}
		elseif($min_exp < 1 && $max_exp == 0){
			$min_max_str = str_replace('0.','',$min_exp).' Months';
		}
		elseif($min_exp >= 1 && $max_exp == 0){
			$min_max_str = str_replace('0.','',$min_exp).' Year'.($min_exp > 1 ? 's':'');;
		}
		
		return $min_max_str;			
	}

   
	/*Compare the browsers version whether it is older version or not */
	function browser_lower_vesrion() {
		$browser_name =  $this->browser_name('name');
		$browser_nversion =  $this->browser_name('version');
		$older_version = 'none';
		switch($browser_name) {
			case 'ie':
				if($browser_nversion <= 7 )
					$older_version = 'Internet Explorer';
				break;			
			case 'firefox':
				if($browser_nversion < 4 )
					$older_version = 'Firefox';
				break;			
			default:
				$older_version = 'none';		
		}
		return $older_version;
	}	
	
	// assign the error message for older versions */
	function show_browser_error($page_name) {
		$old_browser_name =  $this->browser_lower_vesrion();
		$error_msg = '';
		if($old_browser_name != 'none') {
			if($page_name == 'jobseeker') {
				$error_msg = '<p>"You are using a older version of '.$old_browser_name.'. Some features may not work correctly. Please upgrade your browser."</p>';
			}			
			else if($page_name == 'employer') {
				$error_msg = '<div class="nNote nAlert floatL"><p>You are using a older version of '.$old_browser_name.'. Some features may not work correctly. Please upgrade your browser.<a href="javascript:void(0);" class="support modern">Supported Browsers</a> </p></div>';
			}
		}
		return $error_msg;
	}
	

	/* string truncate*/
	function string_truncate($message,$length){ 	
		$message = strip_tags($message);
		$dots = '..';
	    $len = strlen($message);
		if($len > $length){	
			$position =  strpos($message,' ',$length);	
			if($position){
				return $message = substr($message,0,$position).$dots;		
			}else{
				return $message = substr($message,0,$length).$dots;
			}				
		}
		else{
			return $message;		
		}			
	}
	//Note: the following function is used to get os name
	
	function getOS() {
		$user_agent = $_SERVER['HTTP_USER_AGENT'];
		$os_platform  =  "Unknown OS Platform";
		$os_array  =   array(
							'/windows nt 6.3/i'     =>  'Windows 8',
							'/windows nt 6.2/i'     =>  'Windows 8',
							'/windows nt 6.1/i'     =>  'Windows 7',
							'/windows nt 6.0/i'     =>  'Windows Vista',
							'/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
							'/windows nt 5.1/i'     =>  'Windows XP',
							'/windows xp/i'         =>  'Windows XP',
							'/windows nt 5.0/i'     =>  'Windows 2000',
							'/windows me/i'         =>  'Windows ME',
							'/win98/i'              =>  'Windows 98',
							'/win95/i'              =>  'Windows 95',
							'/win16/i'              =>  'Windows 3.11',
							'/macintosh|mac os x/i' =>  'Mac OS X',
							'/mac_powerpc/i'        =>  'Mac OS 9',
							'/linux/i'              =>  'Linux',
							'/ubuntu/i'             =>  'Ubuntu',
							'/iphone/i'             =>  'iPhone',
							'/ipod/i'               =>  'iPod',
							'/ipad/i'               =>  'iPad',
							'/android/i'            =>  'Android',
							'/blackberry/i'         =>  'BlackBerry',
							'/webos/i'              =>  'Mobile'
						 );
		foreach ($os_array as $regex => $value) {
			if (preg_match($regex, $user_agent)) {
				$os_platform  =  $value;
				break;
			}
		}

		return $os_platform;

	}
	 
	 
/* 	 function string_truncate_dec($message,$length){
	 if(strlen($message) > $length){	
		    $end_index =  strpos($message,' ',$length);
			if($end_index > 0)
				$message = substr($message,0,$end_index).'..';
			echo $message;
		}
		else{
			echo $message;
		}
	 }  */ 

	 
	/* function to get the age using dob */
	function getAge($date) { // Y-m-d format
		return intval(substr(date('Ymd') - date('Ymd', strtotime($date)), 0, -4));
	}
	

	function copy_file($source, $destination){ 
		
		if(move_uploaded_file($source, $destination)){
			return true;
		}else{
			return false;
		}
	}
	
		
	/* function to encrypt alone */
	function one_way_encrypt($plain){
		return trim($this->replace_encrypt_string(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $this->key, $plain, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND)))));
	}
	//Note: get invitation status
	function get_invitation_text($status){	
		switch($status){
			case 'A':
			        $text = 'Interested'; 
					break;
			case 'R':		
					$text = 'Not Interested'; 
					break;
			default:
					$text = 'Response Awaited';
					 
		}
		return $text;
	}
	//Note: get invitation type
    function get_invitation_type($type){	
		if($type == 'S')
		  return 'Sent';
		return 'Received';  
	}
	function replace_encrypt_string($subject) {
		return $String = preg_replace('~[^a-zA-Z0-9]+~', '', $subject);;
	}

	
	function file_upload($logo_res,$temp,$path){
		$file_result = $this->get_file_desc($logo_res);
		$file_image_name = $file_result[0];
		$file_image_exe = $file_result[1];
		$en_file_name = $this->one_way_encrypt($file_image_name).'.'.$file_image_exe; 
		$res = $this->copy_file($temp, $path.$en_file_name); 
	}
	
		
		//Note: get the file name and extension
		function get_file_desc($file_name){
			$index=strpos(strrev($file_name),strrev('.'));  
			if ($index){  
				$index=strlen($file_name)-strlen('.')-$index;  
				$new_file_name = substr($file_name,0,$index);
				$new_file_extension = trim(substr($file_name,$index+1,strlen($file_name)));
			} 	
			return array($new_file_name,$new_file_extension);
		}	
	
	/* function to encrypt the id in the url */
	function decrypt($cypher, $field, $order) {
		// get the cypher from the url
		if($field!=''){
			$explode_url = explode("&", $_SERVER['QUERY_STRING']);
			$order = $order - 1;
			$encrypt_id = explode($field.'=', $explode_url[$order]);
			$encrypt_id[1] = str_replace('%20','+',$encrypt_id[1]);
			$cypher = ($encrypt_id[1]);		
		}else{
			$cypher =str_replace('%20','+',str_replace(' ','+',$cypher));

		}
		return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $this->key, base64_decode($cypher), MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND)));
    }
			
	/* function to encrypt the id in the url */
	 function encrypt($plain) {	
        return trim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $this->key, $plain, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND))));
    }
		/*Note: The following function send_sms is used for to send jobs details to users*/
	function send_sms($mobile_numbers,$message) {
	
		$uname = sms_username;  //use your sms api username
		$pwd  = sms_password;  //use your sms api password
		$to = $mobile_numbers;//reciever 10 digit number (use comma (,) for multiple users. eg: 9999999999,8888888888,7777777777)
		$sms = urlencode($message);//sms content
		$sender = sms_api_id;//use your sms api sender id
		$sms_url = sms_url."?username=$uname&pass=$pwd&senderid=$sender&message=$sms&dest_mobileno=$to&response=Y";
		$status = $this->openurl($sms_url);		
		return $status;
		/*if (preg_match("/Your message is successfully sent to/i", $status)) {
			return 'Success';
		}else {
			return 'Problem in sending SMS';
		}*/
	}
	
	/*Note: The following function is used for to send sms to job seekers*/
	 function openurl($url) {
	    /*$ch = @curl_init($url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 60);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		return $result = trim(curl_exec($ch));
		*/
		if($fp = @fopen($url, "rb")){
		$result = "";
		while(!feof($fp)){
			$result .= fgets($fp, 4096);
		}	
		@fclose($fp);	 
		}
		return $result;
	}
	
	function show_time_with_str($old_date,$days){
		 $old_date;
	    $time = '';
		$nowtime = time();
		$oldtime = strtotime($old_date);
		
		 $display_time = $this->time_diff($nowtime-$oldtime);
		if(strstr($display_time,'days ago')){
			if(intval(str_replace('days ago','',$display_time)) > $days) {
				$time = date('d-M-Y',$oldtime);
			}	 
			else
				$time = $this->time_diff($nowtime-$oldtime);
		}else{
				$time = $this->time_diff($nowtime-$oldtime);
		}	
		
		return $time;
	}
    
	function time_diff($s){ 
		// $time = get_post_time('G', true, $post);
		//$s = time() - $time;
		if($s>=1) {
		$td = "$s sec";
		}   
		if($s>59) { 
			$m = (int)($s/60); 
			$s = $s-($m*60); // sec left over 
			$td = "$m min";// if($s>1) $td .="s"; 
		} 
		if($m>59){ 
			$hr = (int)($m/60); 
			$m = $m-($hr*60); // min left over 
			$td = "$hr hr"; if($hr>1) $td .= "s"; 
			//if($m>0) $td .= ", $m min";  if($m>1) $td .= "s"; 
		} 
		if($hr>23){
		
			$d = (int)($hr/24); 
			$hr = $hr-($d*24); // hr left over 
			$td = "$d day"; if($d>1) $td .= "s"; 
			/*if($d<3){ 
				if($hr>0) $td .= ", $hr hr"; if($hr>1) $td .= "s"; 
			} */
		} 
		$td .= ($td=="now")? "":" ago"; // in this example "ago" 
		if(trim($td) == 'ago')	return '1 sec ago';
		return $td;
		
   }
   
   	// function to download the file with rename
	function download_file($file,$newname,$remove_file = false){
		if (file_exists($file)) {
			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header("Content-Disposition: attachment; filename=\"".basename($newname). "\"");
			header('Content-Transfer-Encoding: binary');
			header('Expires: 0');
			header('Cache-Control: must-revalidate');
			header('Pragma: public');
			header('Content-Length: ' . filesize($file));
			ob_clean();
			flush();
			readfile($file);
			//Note: Delete file after download it. if remove_file value is true
			if($remove_file){
				unlink($file);
			}
			exit;
			
		}
	}
	/* function to read the resume */	
	function read_resume($filename){
		$file_extension = substr($filename, strlen($filename)-4, 4);
		if($file_extension == 'docx'){
			$doc = $this->read_file_docx($filename);
		}else{
			$doc = $this->read_file_doc($filename);
		}
		$match = array("'",'"',"’","‘",'“','”','–','–','-');
		$replace = array("'",'"',"'","'",'"','"','-','-','');
		$doc = str_replace($match, $replace , $doc);
//		$doc = htmlentities($doc);
		return $doc;
	}
	/*Note: get today date (Y-m-d)*/
	function get_date(){
		return date('Y-m-d');
	}
	/*Note: The following function is used to get job seekers resume content to store in database*/
	function get_resume_content($file_path){
		$text = $this->read_resume($file_path);
		if($text == ''){
			return ''; // ... Error:  no data, no permissions, or no page ... 
		} 
		/* Remove HTML syntax */
		$text = strip_tags($text);
		$match = array("'", '"');
		$replace = array('', '');
		$text = str_replace($match, $replace , $text);
		
		/*Decode HTML character references */
		$text = html_entity_decode( $text, ENT_QUOTES, "utf-8" );
		/* Process the page's words */
		mb_regex_encoding( "utf-8" );
		$words = mb_split( ' +', $text );
		/* Stem the words */
		$words = preg_split("/[\s,]+/", $text);
		foreach ( $words as $key => $word ){
			$words[$key] = strtolower($word); 
		}
		/* Remove stop words */
		$stopWordsFilename = 'uploads/stop_words.txt';
		$stopText  = file_get_contents( $stopWordsFilename );
		$stopWords = preg_split("/[\s,]+/", $stopText);
		foreach ( $stopWords as $key => $word ){
			$stopWords[$key] = strtolower(trim($word)); 
		}
		// Removes the duplicate words
		$words = array_unique( $words );
		$words = array_diff( $words, $stopWords );
		/* Count keyword usage */
		$keywordCounts = array_count_values( $words );
		arsort( $keywordCounts, SORT_NUMERIC );
		$uniqueKeywords = array_keys( $keywordCounts );
		foreach($uniqueKeywords as $key =>  $keyword){
			$unique_keywords .= $keyword.' ';
		}
		return $unique_keywords;
	}
	
	/* function to read the docx file */
	function read_file_docx($filename){ 
	
		$striped_content = '';
		$content = '';
		if(!$filename || !file_exists($filename)){ return false;}
		$zip = zip_open($filename);
		if (!$zip || is_numeric($zip)) return false;
		while ($zip_entry = zip_read($zip)) {
			if (zip_entry_open($zip, $zip_entry) == FALSE) continue;
			if (zip_entry_name($zip_entry) != "word/document.xml") continue;
			$content .= zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));
			zip_entry_close($zip_entry);
		}// end while
		
		zip_close($zip);
		$content = str_replace('</w:r></w:p></w:tc><w:tc>', "  ", $content);
		$content = str_replace('</w:r></w:p>', "\r\n", $content);
		$content = str_replace('</w:p>', "\r\n\n", $content);		
		$content = str_replace(array('.com', '.in'), array(".com \r\n", ".in \r\n"), $content);
		$content = str_replace(array(':'), ": ", $content);
		$striped_content = strip_tags($content);
		return $striped_content;
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
    //The following function is used to replace special character to +
	function qstring_before_replace($string){
		$find_string = array(', ', ' ','#');
		$replace_string = array(',', '+','sharp');
		return str_replace($find_string, $replace_string, trim($string));
	}
	function qstring_after_replace($string){
		$find_string = array('+');
		$replace_string = array(' ');
		return str_replace($find_string, $replace_string, $string);
	}
	function in_array_r($needle, $haystack, $strict = false) {
		foreach ($haystack as $item) {
			if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && $this->in_array_r($needle, $item, $strict))) {
				return true;
			}
		}
		return false;
	}
	/*Note: The following function is used to truncate the filename, when uploading*/
	function truncate_file_name($id,$file_name,$length){
		if($file_name != '') {
			$path_parts = pathinfo($file_name);
			$file_name = substr($path_parts['filename'],0,$length).'.'.$path_parts['extension'];
			if($id != ''){
				$file_name = $id.'_'.$file_name;
			}
		}
		return $file_name;
	}
	/* function to read the doc file */
	function read_file_doc($filename){
	
		if(file_exists($filename)){
			if(($fh = fopen($filename, 'r')) !== false){
				$headers = fread($fh, 0xA00);
				// 1 = (ord(n)*1) ; Document has from 0 to 255 characters
				$n1 = ( ord($headers[0x21C]) - 1 );
				// 1 = ((ord(n)-8)*256) ; Document has from 256 to 63743 characters
				$n2 = ( ( ord($headers[0x21D]) - 8 ) * 256 );
				// 1 = ((ord(n)*256)*256) ; Document has from 63744 to 16775423 characters
				$n3 = ( ( ord($headers[0x21E]) * 256 ) * 256 );				// 1 = (((ord(n)*256)*256)*256) ; Document has from 16775424 to 4294965504 characters
				$n4 = ( ( ( ord($headers[0x21F]) * 256 ) * 256 ) * 256 );
				// Total length of text in the document
				$textLength = ($n1 + $n2 + $n3 + $n4);
				if($textLength <= 0)
				  return '';
				$extracted_plaintext = fread($fh, $textLength);
				
				// simple print character stream without new lines
				//echo $extracted_plaintext;
				// if you want to see your paragraphs in a new line, do this
				return  $extracted_plaintext;
				// need more spacing after each paragraph use another nl2br
			}
		}
	}
	/*Note: The following script is used to return the recrypted session value*/
	function get_encrypted_session_id(){
		return $this->encrypt(session_id());
	}
	/* function to disable the browser cache */
	function disable_cache(){			 
		header( 'Expires: Sat, 26 Jul 1997 05:00:00 GMT' ); 
		header( 'Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT' ); 
		header( 'Cache-Control: no-store, no-cache, must-revalidate' ); 
		header( 'Cache-Control: post-check=0, pre-check=0', false ); 
		header( 'Pragma: no-cache' ); 
	}


	
}
$cfn = new common_function();

?>