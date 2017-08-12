<?php 

class MailerComponent
{     
    /**
     * PHPMailer object.
     * 
     * @access private
     * @var object
     */
    var $m;
	var $url ='';
	
    
    /**
     * Creates the PHPMailer object and sets default values.
     * Must be called before working with the component!
     *
     * @access public
     * @return void
     */
    function init($to, $sub, $msg, $attach = null,  $from,$attach_name = '')
    {
		
    
		// Include the class file and create PHPMailer instance
		
        include_once($this->url.'libs/phpmailer/class.phpmailer.php');
	

	    $this->m = new PHPMailer;
		
		//For Local purpose
		$this->SMTPAuth   = true;
		$this->Mailer = 'smtp'; 
		$this->IsSMTP(true);
		//$this->SMTPDebug  = 2;  
	
		
		
		$this->SMTPSecure = "ssl";                 // sets the prefix to the servier
		$this->Host = 'smtp.gmail.com';     // sets GMAIL as the SMTP server
		$this->Port       = 465;                   // set the SMTP port for the GMAIL server
		
		$this->Username   = "testing@bigspire.com";  // GMAIL username
		$this->Password   = "bigspire1230";            // GMAIL password
	
		
		$this->Subject = $sub;
		$this->Body = $msg;
		$this->Body = $msg;
		$this->From   = $from;
		$this->FromName = $from;
		$this->AddAddress($to, $to); 			
		$this->IsHTML(true);
		if($attach != null){
			$this->AddAttachment($attach,  $attach_name);
		}	
     }

    function __set($name, $value)
    {
        $this->m->{$name} = $value;
    }
    
    function __get($name)
    {
        if (isset($this->m->{$name})) {
            return $this->m->{$name};
        }
    }
             
    function __call($method, $args)
    {
        if (method_exists($this->m, $method)) {
            return call_user_func_array(array($this->m, $method), $args);
        }
    }
}
$mailer = new MailerComponent();
//$mailer->url = $link_url;
?>
