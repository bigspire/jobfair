<?php
/* All contents are set here */
class Content{

/*Note: Content for account activation*/
function content_account_activation($name,$activation,$status,$login_url,$payment_url,$type = 'E'){
 $this->webroot = webroot;
 $url = $this->webroot;
 $logon_message = 'To experience the difference in your selection process Log on to ';
 if($type == 'C'){
	$logon_message = 'To help your students reach next trajectory Log on to ';
 }
 $message = 'Pleasure to have you with us. We would like to help you.';
 $style = 'width:550px;';
 $message1 = '<p style="font-size:12px;line-height:20px;">
				 Your  account is pending for approval  as your registration did not comply with the rules of Jobsfactory.
			</p>';
 if($status == 1 && $activation['package_name'] != '') {
	$package_name = $activation['package_name'];
	$expiry_date =  date('d-M-Y',strtotime($activation['expiry_date']));
	$message  = '
	Your account is successfully registered with Jobsfactory.  Pleasure to have You with Us.
	<p style="font-size:12px;">You can make the payment now by clicking the link below.</p>
	';
	$payment_message  = '<p style="font-size:12px;">
					<a href="'.$url.$payment_url.'" class="active" style="background: #C6DDFF; border: 1px solid #829CE0; color: #1858BA;font: bold 13px Arial,Helvetica,sans-serif; padding: 6px;margin:10px 8px; text-decoration:none; float:left;">PAYMENT  WINDOW</a></p>';
 }elseif($status == 1 && $activation['package_name'] == ''){
	$package_name = 'Trial Pack';
	$expiry_date =  date('d-M-Y',strtotime($activation['valid_till']));
	$message  = 'Your account is successfully registered with Jobsfactory.  Pleasure to have You with Us.
	<p style="font-size:12px;">You can login now by clicking the link below.</p>';
	$payment_message  = '<p style="font-size:12px;">
						<a href="'.$url.$login_url.'" class="active" style="background: #C6DDFF; border: 1px solid #829CE0; color: #1858BA;font: bold 13px Arial,Helvetica,sans-serif; padding: 6px;margin:10px 8px; text-decoration:none; float:left;">Login Now</a></p>';
 }
 $congratulations = '';
 if($status == 1) {
	$message1= '';
	$congratulations = '<p style="font-size:12px;line-height:20px;">Congratulations!</p>';$support_content = '';
	$style = 'width:265px;';
		$account_details = '<div style=" float:left; width:265px; margin-left:20px; margin-top:30px;">
			<div style=" background:#f2f2f2;    border:1px solid #e4e4e4;    padding: 0px 7px;">
				<p style="font-size:12px;line-height:15px;">Your Account Details:</p>
				<ul style="padding-left:1px">
									<li style=" font-size:13px; padding:0 0 2px 0;list-style-type:none;"><span style="font-weight:bold; width:75px; float:left;">Package:</span> <span>'.$package_name.'</span></li>
									<li style=" font-size:13px; padding:2px 0px;list-style-type:none;"><span style="font-weight:bold; width:75px; float:left;">Expiry:</span> <span>Up to '.$expiry_date.'</span></li>
				</ul>
				</div>
				<p style="font-size:12px;line-height:20px;"></p>
			
</div>';
 }else{
	$rejected_div1 = '<div style=" float:left; width:265px; margin-left:20px; margin-top:30px;">
			<p style="font-size:12px;line-height:20px;"></p>
		</div>';
 }
	
 $content = <<< EOD
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>

<body style="font-family:Arial, Helvetica, sans-serif; color:#222222;">
<div class="mailContent" style="margin:0 auto;width:600px; background:#FFF; border:1px solid #6D6D6D;">
	<div class="topHeader" style=" padding:10px; border-bottom:1px solid #8C8C8C; margin:0;"><img src="{$url}images/jobsfactory_logo.png"></div>
	<div class="getDetails" style=" margin:0 25px;">
			<div style=" float:left; {$style}">
				<h2 style="color:#2D2D2D; font-size:16px;">Dear {$name},</h2>
				{$congratulations}
			
				<p style="font-size:12px;line-height:20px;">
				{$message}
				
				</p>
				{$message1}
				{$payment_message}
				<p>
				</p>
			</div>
		{$account_details}
		{$rejected_div}
<p style="font-size:12px;line-height:20px; clear:left; border-top:1px solid #D8D8D8; padding-top:10px;">
For further assistance and clarification please do write to us <a href="mailto:support@jobsfactory.in" style="color:#035CAF; font-size:13px;">support@jobsfactory.in</a> or call our customer care centre - ph no. 044 - 4900 4900.</p>
			<div style="clear:left;">
				<h3 style="font-size:16px; color:#2d2d2d; border-bottom:1px solid #3f3f3f">Jobsfactory  - <span style="font-size:13px">Your Search Ends Here!</span> </h3>
				
				<p style="font-size:12px;line-height:20px;">
				<b style="font-size:13px;">
				Jobsfactory</b> is the only online portal that is designed exclusively for the <b>Frontline Executives</b>. 
				Jobsfactory is the <b>bridge that connects</b> Job Seekers , 
				Employers and Colleges  together and gives freedom to directly interface with each other. 
				</p>
				<p style="font-size:12px;line-height:20px;">
				The <b>Job seeker</b> can find all jobs whose CTC is Rs 6Lakhs and below per annum, cutting across all types of industries from all the industrially developed States of India.  
				</p>
				<p style="font-size:12px;line-height:20px;">
				The <b>Employer</b> can stretch the selection from the wide range of available candidates who are 10th Standard Qualified & above.   
				</p>
				<p style="font-size:12px;line-height:20px;">
				The <b>Colleges</b> can post their Placement invites to the Employers and share their profile and students resumes directly through the Portal.
				</p>
				<p style="font-size:12px;line-height:20px;">
				{$logon_message} <a href="http://www.jobsfactory.in" style="color:#035CAF; font-size:13px;">www.jobsfactory.in</a>.
			

				</div>	
		</div>
			<div class="footer" style="border-top:1px solid #8C8C8C; padding: 0 0 10px 10px;  margin:0;">
					<p style="font-size:12px;line-height:20px;">With Regards, <br /><span style="font-size:12px; font-weight:bold; color:#2D2D2D;">Jobsfactory</span>
					
					</p>
				<span style="font-size:11px;">Please do not reply to this auto generated mail.</span>
				
		</div>
		
</div>
</body>
</html>


EOD;
	return $content;
	
}
/*Note: Content for payment failed or canceled*/
function content_payment_failed($name,$trans_status,$type){
	$this->webroot = webroot;
 $url = $this->webroot;
 $logon_message = 'To experience the difference in your selection process Log on to ';
 if($type == 'C'){
	$logon_message = 'To help your students reach next trajectory Log on to ';
 }
 if($trans_status == 'Failed'){
	$content = '<p style="font-size:12px;line-height:18px; height:25px;">Sorry, your transaction has been failed due to some reasons by the paymen gateway.</p>';
 }else{
	$content = '<p style="font-size:12px;line-height:18px; height:25px;">You have cancelled the online payment.</p>';
 }
 
  $content = <<< EOD
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>

<body style="font-family:Arial, Helvetica, sans-serif; color:#222222;">
<div class="mailContent" style="margin:0 auto;width:600px; background:#FFF; border:1px solid #6D6D6D;">
	<div class="topHeader" style=" padding:10px; border-bottom:1px solid #8C8C8C; margin:0;"><img src="{$url}images/jobsfactory_logo.png"></div>
		<div class="getDetails" style=" margin:0 25px;">
			<div style=" float:left; width:;">
			
				<h2 style="color:#2D2D2D; font-size:16px;">Dear {$name},</h2>
				
				{$content}

			</div>
		
			


<p style="font-size:12px;line-height:20px; clear:left; border-top:1px solid #D8D8D8; padding-top:10px;">
For further assistance and clarification please do write to us <a href="mailto:support@jobsfactory.in" style="color:#035CAF; font-size:13px;">support@jobsfactory.in</a> or call our customer care centre - ph no. 044 - 4900 4900.</p>
			<div style="clear:left;">
				<h3 style="font-size:16px; color:#2d2d2d; border-bottom:1px solid #3f3f3f">Jobsfactory  - <span style="font-size:13px">Your Search Ends Here!</span> </h3>
				
				<p style="font-size:12px;line-height:20px;">
				<b style="font-size:13px;">
				Jobsfactory</b> is the only online portal that is designed exclusively for the <b>Frontline Executives</b>. 
				Jobsfactory is the <b>bridge that connects</b> Job Seekers , 
				Employers and Colleges  together and gives freedom to directly interface with each other. 
				</p>
				<p style="font-size:12px;line-height:20px;">
				The <b>Job seeker</b> can find all jobs whose CTC is Rs 6Lakhs and below per annum, cutting across all types of industries from all the industrially developed States of India.  
				</p>
				<p style="font-size:12px;line-height:20px;">
				The <b>Employer</b> can stretch the selection from the wide range of available candidates who are 10th Standard Qualified & above.   
				</p>
				<p style="font-size:12px;line-height:20px;">
				The <b>Colleges</b> can post their Placement invites to the Employers and share their profile and students resumes directly through the Portal.
				</p>
				<p style="font-size:12px;line-height:20px;">
				{$logon_message} <a href="http://www.jobsfactory.in" style="color:#035CAF; font-size:13px;">www.jobsfactory.in</a>.
			

				</div>	
		</div>
			<div class="footer" style="border-top:1px solid #8C8C8C; padding: 0 0 10px 10px;  margin:0;">
					<p style="font-size:12px;line-height:20px;">With Regards, <br /><span style="font-size:12px; font-weight:bold; color:#2D2D2D;">Jobsfactory</span>
					
					</p>
				<span style="font-size:11px;">Please do not reply to this auto generated mail.</span>
				
		</div>
		
</div>
</body>
</html>


EOD;
	return $content;
}
/*Note: Content for Payment receipt*/
function content_payment_receipt($name,$payment_id,$amount,$tran_ref_no,$purchase_date,$tran_id,$tran_mode,$subscription_details,$type = 'E'){
$this->webroot = webroot;
 $url = $this->webroot;
 $logon_message = 'To experience the difference in your selection process Log on to ';
 if($type == 'C'){
	$logon_message = 'To help your students reach next trajectory Log on to ';
 }
 $package_message = 'Your Additional Package Details:';
 if($subscription_details['subscription'] == 'package'){
	$package_message = 'Your Subscription Details:';
	$subscription_details_msg = '<li style=" font-size:13px; padding:0 0 2px 0;list-style-type:none;"><span style="font-weight:bold; width:200px; float:left;">Package Name</span> <span>'.$subscription_details['package_name'].'</span></li>
			<li style=" font-size:13px; padding:2px 0px;list-style-type:none;clear:left;"><span style="font-weight:bold; width:200px; float:left;">Expiry Date</span> <span>Up to '.date('d-M-Y',strtotime($subscription_details['expiry_date'])).'</span></li>';
		if(trim($subscription_details['purchase_type']) == 'U' || trim($subscription_details['purchase_type']) == 'R'){
			$purchase_type_msg= '<li style=" font-size:13px; padding:2px 0px;list-style-type:none;clear:left;"><span style="font-weight:bold; width:200px; float:left;">Purchase Type</span>'.($subscription_details['purchase_type'] == 'U' ? 'Upgrade Plan' : 'Payment Renewal').'<span></span></li>';
		}		 
 }elseif($subscription_details[0]['subscription'] == 'cl_additional'){
	$purchase_type_msg= '<li style=" font-size:13px; padding:2px 0px;list-style-type:none;clear:left;"><span style="font-weight:bold; width:200px; float:left;">Purchase Type</span> Additional Purchase <span></span></li>';
	for($i = 1; $i < count($subscription_details); $i++){
		switch ($subscription_details[$i]['subscription_type']) {
			case "S":
				$subscription_details_msg .= '<li style=" font-size:13px; padding:2px 0px;list-style-type:none;clear:left;"><span style="font-weight:bold; width:200px; float:left;">No. of Profiles</span>'.($subscription_details[$i]['subscription_count']).'<span></span></li>';
				break;
			case "U":
				$subscription_details_msg .= '<li style=" font-size:13px; padding:2px 0px;list-style-type:none;clear:left;"><span style="font-weight:bold; width:200px; float:left;">No. of Users</span>'.($subscription_details[$i]['subscription_count']).'<span></span></li>';
				break;					
		}
	}
 }
 elseif($subscription_details[0]['subscription'] == 'emp_additional'){
	$purchase_type_msg= '<li style=" font-size:13px; padding:2px 0px;list-style-type:none;clear:left;"><span style="font-weight:bold; width:200px; float:left;">Purchase Type</span> Additional Purchase <span></span></li>';
	for($i = 1; $i < count($subscription_details); $i++){
		switch ($subscription_details[$i]['subscription_type']) {
			case "C":
				$subscription_details_msg .= '<li style=" font-size:13px; padding:2px 0px;list-style-type:none;clear:left;"><span style="font-weight:bold; width:200px; float:left;">No. of CV Access</span>'.($subscription_details[$i]['subscription_count']).'<span></span></li>';
				break;
			case "J":
				$subscription_details_msg .= '<li style=" font-size:13px; padding:2px 0px;list-style-type:none;clear:left;"><span style="font-weight:bold; width:200px; float:left;">No. of Jobs</span>'.($subscription_details[$i]['subscription_count']).'<span></span></li>';
				break;
			case "U":
				$subscription_details_msg .= '<li style=" font-size:13px; padding:2px 0px;list-style-type:none;clear:left;"><span style="font-weight:bold; width:200px; float:left;">No. of Users</span>'.($subscription_details[$i]['subscription_count']).'<span></span></li>';
				break;					
			case "P":
				$subscription_details_msg .= '<li style=" font-size:13px; padding:2px 0px;list-style-type:none;clear:left;"><span style="font-weight:bold; width:200px; float:left;">No. of Premium Jobs</span>'.($subscription_details[$i]['subscription_count']).'<span></span></li>';
				break;					
			case "S":
				$subscription_details_msg .= '<li style=" font-size:13px; padding:2px 0px;list-style-type:none;clear:left;"><span style="font-weight:bold; width:200px; float:left;">No. of SMS</span>'.($subscription_details[$i]['subscription_count']).'<span></span></li>';
				break;					
			case "M":
				$subscription_details_msg .= '<li style=" font-size:13px; padding:2px 0px;list-style-type:none;clear:left;"><span style="font-weight:bold; width:200px; float:left;">No. of Mails</span>'.($subscription_details[$i]['subscription_count']).'<span></span></li>';
				break;					
		}
	}
 }
 $content = <<< EOD
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>

<body style="font-family:Arial, Helvetica, sans-serif; color:#222222;">
<div class="mailContent" style="margin:0 auto;width:600px; background:#FFF; border:1px solid #6D6D6D;">
	<div class="topHeader" style=" padding:10px; border-bottom:1px solid #8C8C8C; margin:0;"><img src="{$url}images/jobsfactory_logo.png"></div>
		<div class="getDetails" style=" margin:0 25px;">
			<div style=" float:left; width:;">
			
				<h2 style="color:#2D2D2D; font-size:16px;">Dear {$name},</h2>
				<p style="font-size:12px;line-height:18px; height:25px;">Greetings from Jobsfactory!</p>
				<p style="font-size:12px;line-height:20px;">
				Please quote these payment details for any queries in future transactions.

			</div>
			<div style=" float:left; clear:left; width:465px; margin-left:px; margin-top:5px;">
			<div style=" background:#f2f2f2;    border:1px solid #e4e4e4;    padding: 0px 7px;">
				<p style="font-size:12px;line-height:15px;">Your Transaction Details are,</p>
				<ul style="padding-left:1px">
			<li style=" font-size:13px; padding:2px 0px;list-style-type:none;clear:left;"><span style="font-weight:bold; width:200px; float:left;">Transaction Ref. No.</span> <span>{$tran_ref_no}</span></li>
			<li style=" font-size:13px; padding:2px 0px;list-style-type:none;clear:left;"><span style="font-weight:bold; width:200px; float:left;">Transaction Id</span> <span>{$tran_id}</span></li>
			<li style=" font-size:13px; padding:2px 0px;list-style-type:none;clear:left;"><span style="font-weight:bold; width:200px; float:left;"></span> <span></span></li>
			{$purchase_type_msg}
			<li style=" font-size:13px; padding:0 0 2px 0;list-style-type:none;"><span style="font-weight:bold; width:200px; float:left;">Payment Id</span> <span>{$payment_id}</span></li>
			<li style=" font-size:13px; padding:2px 0px;list-style-type:none;clear:left;"><span style="font-weight:bold; width:200px; float:left;">Amount</span> <span>Rs.{$amount}</span></li>
			
			<li style=" font-size:13px; padding:2px 0px;list-style-type:none;clear:left;"><span style="font-weight:bold; width:200px; float:left;">Date of Purchase</span> <span>{$purchase_date}</span></li>
			
			<li style=" font-size:13px; padding:2px 0px;list-style-type:none;clear:left;"><span style="font-weight:bold; width:200px; float:left;">Transaction Mode</span> <span>{$tran_mode}</span></li>
				</ul>
				</div>
					
					<div style=" background:#f2f2f2;    border:1px solid #e4e4e4;    padding: 0px 7px;margin-top:10px;">
				<p style="font-size:12px;line-height:15px;">{$package_message}</p>
				<ul style="padding-left:1px">
				{$subscription_details_msg}
					</ul>
				
				</div>
				<p style="font-size:12px;line-height:20px;"></p>
			
</div>

<p style="font-size:12px;line-height:20px; clear:left; border-top:1px solid #D8D8D8; padding-top:10px;">
For further assistance and clarification please do write to us <a href="mailto:support@jobsfactory.in" style="color:#035CAF; font-size:13px;">support@jobsfactory.in</a> or call our customer care centre - ph no. 044 - 4900 4900.</p>
			<div style="clear:left;">
				<h3 style="font-size:16px; color:#2d2d2d; border-bottom:1px solid #3f3f3f">Jobsfactory  - <span style="font-size:13px">Your Search Ends Here!</span> </h3>
				
				<p style="font-size:12px;line-height:20px;">
				<b style="font-size:13px;">
				Jobsfactory</b> is the only online portal that is designed exclusively for the <b>Frontline Executives</b>. 
				Jobsfactory is the <b>bridge that connects</b> Job Seekers , 
				Employers and Colleges  together and gives freedom to directly interface with each other. 
				</p>
				<p style="font-size:12px;line-height:20px;">
				The <b>Job seeker</b> can find all jobs whose CTC is Rs 6Lakhs and below per annum, cutting across all types of industries from all the industrially developed States of India.  
				</p>
				<p style="font-size:12px;line-height:20px;">
				The <b>Employer</b> can stretch the selection from the wide range of available candidates who are 10th Standard Qualified & above.   
				</p>
				<p style="font-size:12px;line-height:20px;">
				The <b>Colleges</b> can post their Placement invites to the Employers and share their profile and students resumes directly through the Portal.
				</p>
				<p style="font-size:12px;line-height:20px;">
				{$logon_message} <a href="http://www.jobsfactory.in" style="color:#035CAF; font-size:13px;">www.jobsfactory.in</a>.
			

				</div>	
		</div>
			<div class="footer" style="border-top:1px solid #8C8C8C; padding: 0 0 10px 10px;  margin:0;">
					<p style="font-size:12px;line-height:20px;">With Regards, <br /><span style="font-size:12px; font-weight:bold; color:#2D2D2D;">Jobsfactory</span>
					
					</p>
				<span style="font-size:11px;">Please do not reply to this auto generated mail.</span>
				
		</div>
		
</div>
</body>
</html>


EOD;
	return $content;
}
/*Note: Content for about to expire or expired*/
function content_package_expire($name,$package_name,$expiry_date,$is_expired,$is_trial,$purchase_type,$purchase_url,$remaining_days){
$this->webroot = webroot;
 $url = $this->webroot;
 $message = '';
 if(!$is_expired) {
	$message = 'Your subscription with Jobsfactory will be expiring in another in <span  style="font-weight:bold;"> '.$remaining_days.' days </span>. 
	Kindly Log on to your Account and chose your package option for next 12 months.';
}else{
	$message = '
	Your subscription with Jobsfactory has expired. Kindly Click the below link to '.($is_trial ? 'upgrade ' : 'renew').' your account.
	<p style="font-size:12px;">
	<a href="'.$purchase_url.'" class="active" style="background: #C6DDFF; border: 1px solid #829CE0; color: #1858BA;font: bold 13px Arial,Helvetica,sans-serif; padding: 6px;margin:10px 8px; text-decoration:none; float:left;">'.$purchase_type.'</a></p>
	';
}
 $content = <<< EOD
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>

<body style="font-family:Arial, Helvetica, sans-serif; color:#222222;">
<div class="mailContent" style="margin:0 auto;width:600px; background:#FFF; border:1px solid #6D6D6D;">
	<div class="topHeader" style=" padding:10px; border-bottom:1px solid #8C8C8C; margin:0;"><img src="{$url}images/jobsfactory_logo.png"></div>
		<div class="getDetails" style=" margin:0 25px;">
			<div style=" float:left; width:265px;">
				<h2 style="color:#2D2D2D; font-size:16px;">Dear {$name},</h2>
				<p style="font-size:12px;line-height:18px; height:25px;">Greetings from Jobsfactory!</p>
				<p style="font-size:12px;line-height:18px;">Thank you for being part of the family of Jobsfactory and we have enjoyed your active presence with us. We wish to continue enjoying your association in future too. </p>
				<p style="font-size:12px;line-height:20px;">
				
				{$message}

				</p>
			</div>
			<div style=" float:left; width:265px; margin-left:20px; margin-top:30px;">
			<div style=" background:#f2f2f2;    border:1px solid #e4e4e4;    padding: 0px 7px;">
				<p style="font-size:12px;line-height:15px;">Your present Account Details:</p>
				<ul style="padding-left:1px">
									<li style=" font-size:13px; padding:0 0 2px 0;list-style-type:none;"><span style="font-weight:bold; width:75px; float:left;">Package:</span> <span>{$package_name}</span></li>
									<li style=" font-size:13px; padding:2px 0px;list-style-type:none;"><span style="font-weight:bold; width:75px; float:left;">Expiry:</span> <span>{$expiry_date}</span></li>
				</ul>
				</div>
				<p style="font-size:12px;line-height:20px;"></p>
			
</div>
<p style="font-size:12px;line-height:20px; clear:left; border-top:1px solid #D8D8D8; padding-top:10px;">
For further assistance and clarification please do write to us <a href="mailto:support@jobsfactory.in" style="color:#035CAF; font-size:13px;">support@jobsfactory.in</a> or call our customer care centre - ph no. 044 - 4900 4900.</p>
			<div style="clear:left;">
				<h3 style="font-size:16px; color:#2d2d2d; border-bottom:1px solid #3f3f3f">Jobsfactory  - <span style="font-size:13px">Your Search Ends Here!</span> </h3>
				<p style="font-size:12px;line-height:20px;">
				<b style="font-size:13px;">
				Jobsfactory</b> is the only online portal that is designed exclusively for the <b>Frontline Executives</b>. 
				Jobsfactory is the <b>bridge that connects</b> Job Seekers , 
				Employers and Colleges  together and gives freedom to directly interface with each other. 
				</p>
				<p style="font-size:12px;line-height:20px;">
				The <b>Job seeker</b> can find all jobs whose CTC is Rs 6Lakhs and below per annum, cutting across all types of industries from all the industrially developed States of India.  
				</p>
				<p style="font-size:12px;line-height:20px;">
				The <b>Employer</b> can stretch the selection from the wide range of available candidates who are 10th Standard Qualified & above.   
				</p>
				<p style="font-size:12px;line-height:20px;">
				The <b>Colleges</b> can post their Placement invites to the Employers and share their profile and students resumes directly through the Portal.
				</p>
				<p style="font-size:12px;line-height:20px;">
				To take yourself to the next trajectory Log on to <a href="http://www.jobsfactory.in" style="color:#035CAF; font-size:13px;">www.jobsfactory.in</a>.
			

				</div>	
		</div>	
		<div class="footer" style="border-top:1px solid #8C8C8C; padding: 0 0 10px 10px;  margin:0;">
					<p style="font-size:12px;line-height:20px;">With Regards, <br />
					<span style="font-size:12px; font-weight:bold; color:#2D2D2D;">Jobsfactory</span>
					
					</p>
					<span style="font-size:11px;">Please do not reply to this auto generated mail.</span>
				
				
		</div>			
</div>
</body>
</html>

EOD;
	return $content;
}


/*Note: Content for about to expire or expired*/
function loyalty_reward_alert($name,$email,$expiry){
$this->webroot = webroot;
 $url = $this->webroot;

 $content = <<< EOD
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>

<body style="font-family:Arial, Helvetica, sans-serif; color:#222222;">
<div class="mailContent" style="margin:0 auto;width:600px; background:#FFF; border:1px solid #6D6D6D;">
	<div class="topHeader" style=" padding:10px; border-bottom:1px solid #8C8C8C; margin:0;"><a href="{$url}emp_login/"><img src="{$url}images/jobsfactory_logo.png"></a></div>
		<div class="getDetails" style=" margin:0 25px;">
			<div style=" float:left; width:;">
				<h2 style="color:#2D2D2D; font-size:16px;">Dear {$name},</h2>
				<p style="font-size:12px;line-height:18px; height:25px;">Greetings to <b>jobsfactory.in!</b></p>
				<p style="font-size:12px;line-height:18px;">We appreciate your registration in our portal and staying active. At <a href="http://jobsfactory.in">jobsfactory.in</a> we are committed to providing you with the best service possible. We have launched aggressive campaigning across the country for candidate enrollments and the no.of jobseekers registration is on sharp rise.
<br><br>
In recognition of your active participation in the portal so far, we extend your trail pack (free usage) for the next 9 months period as a "Loyalty Reward", which is a one-time offer. Along with the offer extension we have the pleasure in supporting you with few value-added services as well.
 </p>
				<p style="font-size:12px;line-height:20px;">
				
				<b><u>Value Added Services:</u></b> <b>Search Resumes option</b> and reaching candidates through <b>SMS option</b> are now enabled for you to find the right talent of your choice. I am sure you will find our portal adding value to your selection process.
<br><br>
The more you stay active, post jobs, renew jobs and invite candidates - the greater the value-added services from us.


				</p>
			</div>
			
			<div style=" float:left; width:415px; margin-left:20px; margin-top:10px;">
			<div style=" background:#f2f2f2;    border:1px solid #e4e4e4;    padding: 0px 7px;">
				<p style="font-size:12px;line-height:15px;">Your Account Details:</p>
				<ul style="padding-left:1px">
									<li style=" font-size:13px; padding:0 0 2px 0;list-style-type:none;"><span style="font-weight:bold; width:145px; float:left;">Login Email Id:</span> <span>{$email}</span></li>

									<li style=" font-size:13px; padding:2px 0px;list-style-type:none;"><span style="font-weight:bold; width:145px; float:left;margin-top:px;">Package New Expiry:</span> <span>{$expiry}</span></li>
				</ul>
								<p style="font-size:12px;line-height:18px;margin-left:95px;"><a href="{$url}emp_login/" class="active" style="background: #C6DDFF; border: 1px solid #829CE0; color: #1858BA; font: bold 13px Arial,Helvetica,sans-serif; padding: 6px;margin:10px 1px; width:137px; text-decoration:none;">Click here to Login</a></p>

				</div>
				<p style="font-size:12px;line-height:20px;"></p>
			
</div>
			
<p style="font-size:12px;line-height:20px; clear:left; border-top:1px solid #D8D8D8; padding-top:10px;">
For further assistance and clarification please do write to us <a href="mailto:support@jobsfactory.in" style="color:#035CAF; font-size:13px;">support@jobsfactory.in</a> or call our customer care centre - ph no. 044 - 4900 4900.</p>
			<div style="clear:left;">
				<h3 style="font-size:16px; color:#2d2d2d; border-bottom:1px solid #3f3f3f">Jobsfactory  - <span style="font-size:13px">Your Search Ends Here!</span> </h3>
				<p style="font-size:12px;line-height:20px;">
				<b style="font-size:13px;">
				Jobsfactory</b> is the only online portal that is designed exclusively for the <b>Frontline Executives</b>. 
				Jobsfactory is the <b>bridge that connects</b> Job Seekers , 
				Employers and Colleges  together and gives freedom to directly interface with each other. 
				</p>
				<p style="font-size:12px;line-height:20px;">
				The <b>Job seeker</b> can find all jobs whose CTC is Rs 6Lakhs and below per annum, cutting across all types of industries from all the industrially developed States of India.  
				</p>
				<p style="font-size:12px;line-height:20px;">
				The <b>Employer</b> can stretch the selection from the wide range of available candidates who are 10th Standard Qualified & above.   
				</p>
				<p style="font-size:12px;line-height:20px;">
				The <b>Colleges</b> can post their Placement invites to the Employers and share their profile and students resumes directly through the Portal.
				</p>
				<p style="font-size:12px;line-height:20px;">
				To take yourself to the next trajectory Log on to <a href="http://www.jobsfactory.in" style="color:#035CAF; font-size:13px;">www.jobsfactory.in</a>.
			

				</div>	
		</div>	
		<div class="footer" style="border-top:1px solid #8C8C8C; padding: 0 0 10px 10px;  margin:0;">
					<p style="font-size:12px;line-height:20px;">With Regards, <br />
					Mohammed Imran <br>
					Phone: 91-8754594850 <br>
					<span style="font-size:12px; font-weight:bold; color:#2D2D2D;">Jobsfactory</span>
					
					</p>
					<span style="font-size:11px;">Please do not reply to this auto generated mail.</span>
				
				
		</div>			
</div>
</body>
</html>

EOD;

	return $content;
}

/*Note: Content of acknowlegment for report bug*/
function content_acknowlegment($name,$message,$type=''){
	if($type == '')	{
		$message1 = '<p style="font-size:12px;line-height:18px; height:25px;">We thank you for your involvement and wish to have your continuous association in future too.</p>';
	}elseif($type == 'RB'){
		$message1 = '<p style="font-size:12px;line-height:18px; height:25px;">Regretting for this discomfort, we assure we will check and rectify shortly.</p>
					<p style="font-size:12px;line-height:18px; height:25px;">Thank you for your involvement and wish to have your continuous association in future too.</p>';
	}elseif($type == 'BE'){
		$message1 = '<p style="font-size:12px;line-height:18px; height:25px;">It is our privilege to have you on the portal.  Our team will get in touch with you shortly. </p>';
	}elseif($type == 'QC'){
		$message1 = '<p style="font-size:12px;line-height:18px; height:25px;">At <b>jobsfactory.in</b> we are committed to providing you with the best service possible.</p>';
		$message1 .= '<p style="font-size:12px;line-height:18px; height:25px; padding-top:5px;">Once you complete your registration with some basic information about your education,

experience and other credentials you will get access to the following features of <b>jobsfactory.in.</b></p>';
		$message1 .= '<p style="font-size:12px;line-height:18px; height:25px;"><strong style="font-size:16px;"><u>Features:</u></strong><br>
1. Wide-ranging opportunities of your choice in the form of job alerts and 
employment news. <br>
2. Exclusive web space through unique Job seeker ID.<br>
3. Portal access in regional languages apart from English and Hindi.<br>
4. Auto resume generation without any payment attached.<br>
5. Opportunities to participate in job fairs.<br>
6. Earning reward points and gifts by connecting friends.<br>
7. Understand and prepare for the hot jobs.<br>
8. Perform self-assessment through online tests.<br>
9. Identify the employers who have viewed your profile.<br>
10. Get online career counseling services from eminent practitioners and much more..</p>';
$message1 .= '<p style="font-size:12px;line-height:18px; height:25px;">We thank you for your involvement and wish to have your continuous association in future too.</p>'; 

	}
	
 $this->webroot = webroot;
 $url = $this->webroot;
 $content = <<< EOD
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>

<body style="font-family:Arial, Helvetica, sans-serif; color:#222222;">
<div class="mailContent" style="margin:0 auto;width:600px; background:#FFF; border:1px solid #6D6D6D;">
	<div class="topHeader" style=" padding:10px; border-bottom:1px solid #8C8C8C; margin:0;"><img src="{$url}images/jobsfactory_logo.png"></div>
			<div class="getDetails" style=" margin:0 10px 20px 10px;">
				<h2 style="color:#2D2D2D; font-size:16px;">Dear {$name},</h2>
				<p style="font-size:12px;line-height:18px; height:25px;">Greetings to <b>jobsfactory.in!</b></p>
				<p style="font-size:12px;line-height:18px; height:25px;">{$message}.</p>
				{$message1}
				<p style="font-size:12px;line-height:20px; clear:left; border-top:1px solid #D8D8D8; padding-top:10px;">
For further assistance and clarification please do write to us <a href="mailto:support@jobsfactory.in" style="color:#035CAF; font-size:13px;">support@jobsfactory.in</a>
 or call our customer care centre - ph no. 044 - 4900 4900.</p>
			<div style="clear:left;">
				<h3 style="font-size:16px; color:#2d2d2d; border-bottom:1px solid #3f3f3f">Jobsfactory  - <span style="font-size:13px">Your Search Ends Here!</span> </h3>
				<p style="font-size:12px;line-height:20px;">
				<b style="font-size:13px;">
				Jobsfactory</b> is the only online portal that is designed exclusively for the <b>Frontline Executives</b>. 
				Jobsfactory is the <b>bridge that connects</b> Job Seekers , 
				Employers and Colleges  together and gives freedom to directly interface with each other. 
				</p>
				<p style="font-size:12px;line-height:20px;">
				The <b>Job seeker</b> can find all jobs whose CTC is Rs 6Lakhs and below per annum, cutting across all types of industries from all the industrially developed States of India.  
				</p>
				<p style="font-size:12px;line-height:20px;">
				The <b>Employer</b> can stretch the selection from the wide range of available candidates who are 10th Standard Qualified & above.   
				</p>
				<p style="font-size:12px;line-height:20px;">
				The <b>Colleges</b> can post their Placement invites to the Employers and share their profile and students resumes directly through the Portal.
				</p>
				<p style="font-size:12px;line-height:20px;">
				To take yourself to the next trajectory Log on to <a href="http://www.jobsfactory.in" style="color:#035CAF; font-size:13px;">www.jobsfactory.in</a>.
			

				</div>	
		</div>	
		<div class="footer" style="border-top:1px solid #8C8C8C; padding: 0 0 10px 10px;  margin:0;">
					<p style="font-size:12px;line-height:20px;">With Regards, <br />
					<span style="font-size:12px; font-weight:bold; color:#2D2D2D;">Jobsfactory</span>
					
					</p>
					<span style="font-size:11px;">Please do not reply to this auto generated mail.</span>
				
				
		</div>			
</div>
</body>
</html>

EOD;
	return $content;
}
/*Note: Content of college feedback*/
function content_feedback_notifications($name,$college_name,$feedback_url){
$fn = new india_job_function();
 $this->webroot = webroot;
 $url = $this->webroot;
 $content = <<< EOD
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Jobsfactory � Invitation Received</title>
</head>

<body style="font-family:Arial, Helvetica, sans-serif; color:#222222;">
<div class="mailContent" style="margin:0 auto;width:600px; background:#FFF; border:1px solid #6D6D6D;">
	<div class="topHeader" style=" padding:10px; border-bottom:1px solid #8C8C8C; margin:0;"><img src="{$url}images/jobsfactory_logo.png"></div>
			<div class="getDetails" style=" margin:0 10px 20px 10px;">
				<h2 style="color:#2D2D2D; font-size:16px;">Dear {$name},</h2>
				<p style="font-size:12px;line-height:18px; height:25px;">Greetings from Jobsfactory!</p>
				<p style="font-size:12px;line-height:18px; height:35px;">
					We are pleased to know that you have successfully completed your Campus Drive  at  <b style="font-size:13px;">"{$college_name}"</b>.
				</p>
				<p style="font-size:12px;line-height:18px; height:25px;">
				We would request your support in serving you much better.  Kindly help us in giving your valuable feed back and  your experience during the Campus drive. 
				</p>
				
				<p style="font-size:12px;line-height:28px; height:25px;">Please <a href="{$feedback_url}">click here</a> to complete the feedback form.</p>
				<p style="font-size:12px;line-height:18px; height:25px;">
				Thanking You for your continuous support.
				</p>
				<p style="font-size:12px;line-height:20px; clear:left; border-top:1px solid #D8D8D8; padding-top:10px;">
For further assistance and clarification please do write to us <a href="mailto:support@jobsfactory.in" style="color:#035CAF; font-size:13px;">support@jobsfactory.in</a> or call our customer care centre - ph no. 044 - 4900 4900.</p>
			<div style="clear:left;">
				<h3 style="font-size:16px; color:#2d2d2d; border-bottom:1px solid #3f3f3f">Jobsfactory  - <span style="font-size:13px">Your Search Ends Here!</span> </h3>
				<p style="font-size:12px;line-height:20px;">
				<b style="font-size:13px;">
				Jobsfactory</b> is the only online portal that is designed exclusively for the <b>Frontline Executives</b>. 
				Jobsfactory is the <b>bridge that connects</b> Job Seekers , 
				Employers and Colleges  together and gives freedom to directly interface with each other. 
				</p>
				<p style="font-size:12px;line-height:20px;">
				The <b>Job seeker</b> can find all jobs whose CTC is Rs 6Lakhs and below per annum, cutting across all types of industries from all the industrially developed States of India.  
				</p>
				<p style="font-size:12px;line-height:20px;">
				The <b>Employer</b> can stretch the selection from the wide range of available candidates who are 10th Standard Qualified & above.   
				</p>
				<p style="font-size:12px;line-height:20px;">
				The <b>Colleges</b> can post their Placement invites to the Employers and share their profile and students resumes directly through the Portal.
				</p>
				<p style="font-size:12px;line-height:20px;">
				To experience the difference in your selection process Log on to <a href="http://www.jobsfactory.in" style="color:#035CAF; font-size:13px;">www.jobsfactory.in</a>.
			

				</div>	
		</div>
			<div class="footer" style="border-top:1px solid #8C8C8C; padding: 0 0 10px 10px;  margin:0;">
					<p style="font-size:12px;line-height:20px;">With Regards, <br /><span style="font-size:12px; font-weight:bold; color:#2D2D2D;">Jobsfactory</span>
					
					</p>
				<span style="font-size:11px;">Please do not reply to this auto generated mail.</span>
				
		</div>
</div>
</body>
</html>

EOD;
	return $content;
}
/*Note: Content of resume mail alerts */
function content_resume_mail_alert($name,$saved_search_key,$resume_details){
$fn = new india_job_function();
$cfn   = new common_function();
 $this->webroot = webroot;
 $home = home;
 $url = $this->webroot;
 $body_content = '';
  $this->emp_mail_webroot = emp_mail_webroot;
 $backend_url = $this->emp_mail_webroot;
 for($i=0;$i<count($resume_details);$i++){
	$course_name = trim($resume_details[$i]['course_name']) != '' ? $resume_details[$i]['course_name'].(trim($resume_details[$i]['specialization']) != '' ? ' - '.trim($resume_details[$i]['specialization']) : '') : ($resume_details[$i]['hsc_school_marks_percentage'] ? '12th' : '10th');
	$experience = $cfn->get_job_seeker_exp_str($resume_details[$i]['experience_year']); 
	$body_content .= 	'<tr style="background:#F2F2F2;">
						<td style="padding:5px 0;font-size:12px; text-align:center;">'.($i+1).'</td>
						<td style="padding:5px 8px;font-size:12px; text-align:left;"><a href="'.$backend_url.'view_candidate/?refer_page=mail&id='.$cfn->encrypt($resume_details[$i]['user_id']).'" style="color:#14638D;">'.ucwords($resume_details[$i]['full_name']).'</a></td>
						<td style="padding:5px 8px;font-size:12px; text-align:left;"><a href="'.$backend_url.'view_candidate/?refer_page=mail&id='.$cfn->encrypt($resume_details[$i]['user_id']).'" style="color:#14638D;">'.($resume_details[$i]['gender'] == 'M' ? 'Male' : 'Female').'</a></td>
						<td style="padding:5px 8px;font-size:12px; text-align:left;"><a href="'.$backend_url.'view_candidate/?refer_page=mail&id='.$cfn->encrypt($resume_details[$i]['user_id']).'" style="color:#14638D;">'.$course_name.'</a></td>
						<td style="padding:5px 8px;font-size:12px; text-align:left;"><a href="'.$backend_url.'view_candidate/?refer_page=mail&id='.$cfn->encrypt($resume_details[$i]['user_id']).'" style="color:#14638D;">'.$experience.'</a></td>
						<td style="padding:5px 8px;font-size:12px; text-align:left;"><a href="'.$backend_url.'view_candidate/?refer_page=mail&id='.$cfn->encrypt($resume_details[$i]['user_id']).'" style="color:#14638D;">'.ucwords(trim($resume_details[$i]['present_city'])).'</a></td> 
						</tr>';
}
 
$content.= <<< EOD
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Jobsfactory - Resume Alerts</title>
</head>

<body style="font-family:Arial, Helvetica, sans-serif; color:#222222;">
<div class="mailContent" style="margin:0 auto;width:600px; background:#FFF; border:1px solid #6D6D6D;">
	<div class="topHeader" style=" padding:10px; border-bottom:1px solid #8C8C8C; margin:0;"><img src="{$url}images/jobsfactory_logo.png"></div>
			<div class="getDetails" style=" margin:0 10px;">
				<h2 style="color:#2D2D2D; font-size:16px;">Dear {$name},</h2>
				<p style="font-size:12px;line-height:18px; height:25px;">Greetings from Jobsfactory!</p>
				<p style="font-size:12px;line-height:18px; height:25px;">
				The following Resumes on our portal are matching  your Search <span style="font-size:14px; color:#ED6B2A;">"{$saved_search_key}"</span>  .
				You can scan and post the Jobs to the preferred  candidates.
				</p>
				
			
			<table style="width:100%; background:#ffffff; margin:20px 0; border:1px solid #ccc; padding:0; ">
			  <thead>
			 <tr>
				 <th style="width:5%; background:#E2E2E2;border:1px solid #DBDBDB; padding:5px 0;font-size:12px;">S.No</th>
				 <th style="width:21%; background:#E2E2E2;border:1px solid #DBDBDB; padding:5px 0;font-size:12px;">Name</th>
				<th style="width:12%; background:#E2E2E2;border:1px solid #DBDBDB; padding:5px 0;font-size:12px;">Gender</th>
				 <th style="width:32%; background:#E2E2E2;border:1px solid #DBDBDB; padding:5px 0;font-size:12px;">Qualification</th>
				 <th style="width:16%; background:#E2E2E2;border:1px solid #DBDBDB; padding:5px 0;font-size:12px;">Experience</th>
				 <th style="width:28%; background:#E2E2E2;border:1px solid #DBDBDB; padding:5px 0;font-size:12px;">Location</th>
				
			 </tr>
			 </thead>
			 <tbody>
					{$body_content}
			  </tbody>
			 </table>
		<p style="font-size:12px;"><b>Wish you all the Very Best!</b></p>
<p style="font-size:12px;line-height:20px; clear:left; border-top:1px solid #D8D8D8; padding-top:10px;">
For further assistance and clarification please do write to us <a href="mailto:support@jobsfactory.in" style="color:#035CAF; font-size:13px;">support@jobsfactory.in</a> or call our customer care centre - ph no. 044 - 4900 4900.</p>
			<div style="clear:left;">
				<h3 style="font-size:16px; color:#2d2d2d; border-bottom:1px solid #3f3f3f">Jobsfactory  - <span style="font-size:13px">Your Search Ends Here!</span> </h3>
				<p style="font-size:12px;line-height:20px;">
				<b style="font-size:13px;">
				Jobsfactory</b> is the only online portal that is designed exclusively for the <b>Frontline Executives</b>. 
				Jobsfactory is the <b>bridge that connects</b> Job Seekers , 
				Employers and Colleges  together and gives freedom to directly interface with each other. 
				</p>
				<p style="font-size:12px;line-height:20px;">
				The <b>Job seeker</b> can find all jobs whose CTC is Rs 6Lakhs and below per annum, cutting across all types of industries from all the industrially developed States of India.  
				</p>
				<p style="font-size:12px;line-height:20px;">
				The <b>Employer</b> can stretch the selection from the wide range of available candidates who are 10th Standard Qualified & above.   
				</p>
				<p style="font-size:12px;line-height:20px;">
				The <b>Colleges</b> can post their Placement invites to the Employers and share their profile and students resumes directly through the Portal.
				</p>
				<p style="font-size:12px;line-height:20px;">
				To experience the difference in your selection process Log on to <a href="http://www.jobsfactory.in" style="color:#035CAF; font-size:13px;">www.jobsfactory.in</a>.
			

				</div>	
		</div>
			<div class="footer" style="border-top:1px solid #8C8C8C; padding: 0 0 10px 10px;  margin:0;">
					<p style="font-size:12px;line-height:20px;">With Regards, <br /><span style="font-size:12px; font-weight:bold; color:#2D2D2D;">Jobsfactory</span>
					
					</p>
				<span style="font-size:11px;">Please do not reply to this auto generated mail.</span>
				
		</div>
</div>
</body>
</html>


EOD;
	return $content;
}

/*Note: Content of send job alert */
function content_inactive_mail_alert($name){
$fn = new india_job_function();
$cfn   = new common_function();
 $this->webroot = webroot;
 $home = home;
 $url = $this->webroot;
 $body_content = '';


$content.= <<< EOD
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Jobsfactory - Posting Alerts</title>
</head>

<body style="font-family:Arial, Helvetica, sans-serif; color:#222222;">
<div class="mailContent" style="margin:0 auto;width:600px; background:#FFF; border:1px solid #6D6D6D;">

	<div class="topHeader" style=" padding:10px; border-bottom:1px solid #8C8C8C; margin:0;"><img src="{$url}images/jobsfactory_logo.png"></div>
			<div class="getDetails" style=" margin:0 10px;">
				<h2 style="color:#2D2D2D; font-size:16px;">Dear {$name},</h2>
				<p style="font-size:12px;line-height:18px; height:25px;">Greetings from Jobsfactory!</p>
				<p style="font-size:12px;line-height:18px;">Thank you for being part of the family of Jobsfactory and we have enjoyed your active presence with us. We wish to continue enjoying your association in future too. </p>
				<p style="font-size:12px;line-height:18px;">You haven't logged in from last three months. Please let us know how we can serve you much better and reach your need.  Kindly post your feedback today.</p>
				
	<p style="font-size:12px;line-height:20px; clear:left; border-top:1px solid #D8D8D8; padding-top:10px;">
For further assistance and clarification please do write to us <a href="mailto:support@jobsfactory.in" style="color:#035CAF; font-size:13px;">support@jobsfactory.in</a> or call our customer care centre - ph no. 044 - 4900 4900.</p>
			<div style="clear:left;">
				<h3 style="font-size:16px; color:#2d2d2d; border-bottom:1px solid #3f3f3f">Jobsfactory  - <span style="font-size:13px">Your Search Ends Here!</span> </h3>
				<p style="font-size:12px;line-height:20px;">
				<b style="font-size:13px;">
				Jobsfactory</b> is the only online portal that is designed exclusively for the <b>Frontline Executives</b>. 
				Jobsfactory is the <b>bridge that connects</b> Job Seekers , 
				Employers and Colleges  together and gives freedom to directly interface with each other. 
				</p>
				<p style="font-size:12px;line-height:20px;">
				The <b>Job seeker</b> can find all jobs whose CTC is Rs 6Lakhs and below per annum, cutting across all types of industries from all the industrially developed States of India.  
				</p>
				<p style="font-size:12px;line-height:20px;">
				The <b>Employer</b> can stretch the selection from the wide range of available candidates who are 10th Standard Qualified & above.   
				</p>
				<p style="font-size:12px;line-height:20px;">
				The <b>Colleges</b> can post their Placement invites to the Employers and share their profile and students resumes directly through the Portal.
				</p>
				<p style="font-size:12px;line-height:20px;">
				To take yourself to the next trajectory Log on to <a href="http://www.jobsfactory.in" style="color:#035CAF; font-size:13px;">www.jobsfactory.in</a>.
			

				</div>	
		</div>
			<div class="footer" style="border-top:1px solid #8C8C8C; padding: 0 0 10px 10px;  margin:0;">
					<p style="font-size:12px;line-height:20px;">With Regards, <br /><span style="font-size:12px; font-weight:bold; color:#2D2D2D;">Jobsfactory</span>
					
					</p>
				<span style="font-size:11px;">Please do not reply to this auto generated mail.</span>
				
		</div>
</div>
</body>
</html>

EOD;
	return $content;
}

/*Note: Content of send job alert */
function content_job_mail_alert($name,$job_details){
$fn = new india_job_function();
$cfn   = new common_function();
 $this->webroot = webroot;
 $home = home;
 $url = $this->webroot;
 $body_content = '';
 for($i=0;$i<count($job_details);$i++){	
	$body_content .= '	<tr style="background:#F2F2F2;">
						<td style=" padding:5px 0;font-size:12px; text-align:center;">'.($i+1).'</td>
						<td style=" padding:5px 8px;font-size:12px; text-align:left;"><a href="'.$url.'en/view_jobs/'.($fn->replace_jobs_string($job_details[$i]['job_title']).'/?id='.$cfn->encrypt($job_details[$i]['id'])).'" style="color:#14638D;">'.($job_details[$i]['job_title']).'</a></td>
						<td style=" padding:5px 8px;font-size:12px; text-align:left;"><a href="'.$url.'en/search_jobs/?keywords='.($job_details[$i]['company_name']).'" style="color:#14638D;">'.($job_details[$i]['company_name']).'</a></td>
						<td style=" padding:5px 8px;font-size:12px; text-align:left;"><a href="'.$url.'en/search_jobs/?location='.($job_details[$i]['location']).'" style="color:#14638D;">'.($job_details[$i]['location']).'</a></td>
						</tr>';
}

$content.= <<< EOD
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Jobsfactory - Posting Alerts</title>
</head>

<body style="font-family:Arial, Helvetica, sans-serif; color:#222222;">
<div class="mailContent" style="margin:0 auto;width:600px; background:#FFF; border:1px solid #6D6D6D;">

	<div class="topHeader" style=" padding:10px; border-bottom:1px solid #8C8C8C; margin:0;"><img src="{$url}images/jobsfactory_logo.png"></div>
			<div class="getDetails" style=" margin:0 10px;">
				<h2 style="color:#2D2D2D; font-size:16px;">Dear {$name},</h2>
				<p style="font-size:12px;line-height:18px; height:25px;">Greetings from Jobsfactory!</p>
				<p style="font-size:12px;line-height:18px;">Job postings from the employers on our portal are matching to your profile.  You can apply for all or any of the following Jobs by clicking the link below:</p>
				
			
			<table style="width:100%; background:#ffffff; margin:20px 0; border:1px solid #ccc; padding:0; ">
			  <thead>
			 <tr>
				 <th style="width:5%; background:#E2E2E2;border:1px solid #DBDBDB; padding:5px 0;font-size:12px;">S.No</th>
				 <th style="width:26%; background:#E2E2E2;border:1px solid #DBDBDB; padding:5px 0;font-size:12px;">Title</th>
				 <th style="width:21%; background:#E2E2E2;border:1px solid #DBDBDB; padding:5px 0;font-size:12px;">Company</th>
				  <th style="width:21%; background:#E2E2E2;border:1px solid #DBDBDB; padding:5px 0;font-size:12px;">Location</th>
				
			 </tr>
			 </thead>
			 <tbody>
			 {$body_content}
			 </tbody>

			   
			 </table>
		<p style="font-size:12px;"><b>Wish you all the Very Best!</b></p>
<p style="font-size:12px;line-height:20px; clear:left; border-top:1px solid #D8D8D8; padding-top:10px;">
For further assistance and clarification please do write to us <a href="mailto:support@jobsfactory.in" style="color:#035CAF; font-size:13px;">support@jobsfactory.in</a> or call our customer care centre - ph no. 044 - 4900 4900.</p>
			<div style="clear:left;">
				<h3 style="font-size:16px; color:#2d2d2d; border-bottom:1px solid #3f3f3f">Jobsfactory  - <span style="font-size:13px">Your Search Ends Here!</span> </h3>
				<p style="font-size:12px;line-height:20px;">
				<b style="font-size:13px;">
				Jobsfactory</b> is the only online portal that is designed exclusively for the <b>Frontline Executives</b>. 
				Jobsfactory is the <b>bridge that connects</b> Job Seekers , 
				Employers and Colleges  together and gives freedom to directly interface with each other. 
				</p>
				<p style="font-size:12px;line-height:20px;">
				The <b>Job seeker</b> can find all jobs whose CTC is Rs 6Lakhs and below per annum, cutting across all types of industries from all the industrially developed States of India.  
				</p>
				<p style="font-size:12px;line-height:20px;">
				The <b>Employer</b> can stretch the selection from the wide range of available candidates who are 10th Standard Qualified & above.   
				</p>
				<p style="font-size:12px;line-height:20px;">
				The <b>Colleges</b> can post their Placement invites to the Employers and share their profile and students resumes directly through the Portal.
				</p>
				<p style="font-size:12px;line-height:20px;">
				To take yourself to the next trajectory Log on to <a href="http://www.jobsfactory.in" style="color:#035CAF; font-size:13px;">www.jobsfactory.in</a>.
			

				</div>	
		</div>
			<div class="footer" style="border-top:1px solid #8C8C8C; padding: 0 0 10px 10px;  margin:0;">
					<p style="font-size:12px;line-height:20px;">With Regards, <br /><span style="font-size:12px; font-weight:bold; color:#2D2D2D;">Jobsfactory</span>
					
					</p>
				<span style="font-size:11px;">Please do not reply to this auto generated mail.</span>
				
		</div>
</div>
</body>
</html>

EOD;
	return $content;
}

/*Note: Content of reset password */
function content_reset_pass($username,$link,$type='R'){
 $this->webroot = webroot;
 $url = $this->webroot; 
 $logon_message = 'To experience the difference in your selection process Log on to ';
 if($type == 'C'){
	$logon_message = 'To help your students reach next trajectory Log on to ';
 }
 elseif($type == 'R'){
	$logon_message = 'To take yourself to the next trajectory Log on to ';
 }
 
$content = <<< EOD
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Jobsfactory - Reset Password</title>
</head>

<body style="font-family:Arial, Helvetica, sans-serif; color:#222222;">
<div class="mailContent" style="margin:0 auto;width:600px; background:#FFF; border:1px solid #6D6D6D;">
	<div class="topHeader" style=" padding:10px; border-bottom:1px solid #8C8C8C; margin:0;"><img src="{$url}images/jobsfactory_logo.png"></div>
			<div class="getDetails" style="margin:0 10px;">
				<h2 style="color:#2D2D2D; font-size:16px;">Dear {$username},</h2>
				<p style="font-size:12px;line-height:18px; height:25px;">Greetings from Jobsfactory!</p>
				<p style="height:25px;font-size:12px;line-height:18px;">
				We have received a password reset request from you.  Please ignore if you haven't requested.</p>
				<p style="height:25px;font-size:12px;line-height:18px;">
				You can click the below link OR you can copy the link to reset your password 
				</p>
				<p style="height:25px;font-size:12px;line-height:18px;">
				<a href="{$link}" style="color:#035CAF;">{$link}</a></p>
				
		
<p style="font-size:12px;line-height:20px; clear:left; border-top:1px solid #D8D8D8; padding-top:10px;">
For further assistance and clarification please do write to us <a href="mailto:support@jobsfactory.in" style="color:#035CAF; font-size:13px;">support@jobsfactory.in</a> or call our customer care centre - ph no. 044 - 4900 4900.</p>
			<div style="clear:left;">
				<h3 style="font-size:16px; color:#2d2d2d; border-bottom:1px solid #3f3f3f">Jobsfactory  - <span style="font-size:13px">Your Search Ends Here!</span> </h3>
				<p style="font-size:12px;line-height:20px;">
				<b style="font-size:13px;">
				Jobsfactory</b> is the only online portal that is designed exclusively for the <b>Frontline Executives</b>. 
				Jobsfactory is the <b>bridge that connects</b> Job Seekers , 
				Employers and Colleges  together and gives freedom to directly interface with each other. 
				</p>
				<p style="font-size:12px;line-height:20px;">
				The <b>Job seeker</b> can find all jobs whose CTC is Rs 6Lakhs and below per annum, cutting across all types of industries from all the industrially developed States of India.  
				</p>
				<p style="font-size:12px;line-height:20px;">
				The <b>Employer</b> can stretch the selection from the wide range of available candidates who are 10th Standard Qualified & above.   
				</p>
				<p style="font-size:12px;line-height:20px;">
				The <b>Colleges</b> can post their Placement invites to the Employers and share their profile and students resumes directly through the Portal.
				</p>
				<p style="font-size:12px;line-height:20px;">
				{$logon_message} <a href="http://www.jobsfactory.in" style="color:#035CAF; font-size:13px;">www.jobsfactory.in</a>.
			

				</div>	
		</div>
			<div class="footer" style="border-top:1px solid #8C8C8C; padding: 0 0 10px 10px;  margin:0;">
					<p style="font-size:12px;line-height:20px;">With Regards, <br /><span style="font-size:12px; font-weight:bold; color:#2D2D2D;">Jobsfactory</span>
					
					</p>
				<span style="font-size:11px;">Please do not reply to this auto generated mail.</span>
				
		</div>
</div>
</body>
</html>

EOD;
	return $content;
}

/*Note: Content of reset password */
function college_content_reset_pass($username,$link){
 $this->webroot = webroot;
 $url = $this->webroot; 
$content = <<< EOD
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Jobsfactory - Reset Password</title>
</head>

<body style="font-family:Arial, Helvetica, sans-serif; color:#222222;">
<div class="mailContent" style="margin:0 auto;width:600px; background:#FFF; border:1px solid #6D6D6D;">
	<div class="topHeader" style=" padding:10px; border-bottom:1px solid #8C8C8C; margin:0;"><img src="{$url}images/jobsfactory_logo.png"></div>
			<div class="getDetails" style="margin:0 10px;">
				<h2 style="color:#2D2D2D; font-size:16px;">Dear {$username},</h2>
				<p style="height:25px;font-size:12px;line-height:18px;">We have received a password reset request from you. Please <a href="{$link}" style="color:#035CAF;">Click this link</a> to reset your password. or copy this {$link}</p>
				
		</div>	
			<div class="footer" style="border-top:1px solid #8C8C8C; padding: 0 0 10px 10px;  margin:0;">
					<p style="font-size:12px;line-height:20px;">From <br /><span style="font-size:12px; font-weight:bold; color:#2D2D2D;">JobsFactory</span>
					
					</p>
					<span style="font-size:11px;"><b>Note:</b> If you didn't request for resetting password please ignore.</span>
				
		</div>
			
</div>
</body>
</html>

EOD;
	return $content;
}

/*Note: Content of registration success*/
function content_register_success($name,$user_name,$password,$link){
 $this->webroot = webroot;
 $url = $this->webroot;
$content = <<< EOD
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<body style="font-family:Arial, Helvetica, sans-serif; color:#222222;">
<div class="mailContent" style="margin:0 auto;width:600px; background:#FFF; border:1px solid #6D6D6D;">
	<div class="topHeader" style=" padding:10px; border-bottom:1px solid #8C8C8C; margin:0;"><img src="{$url}images/jobsfactory_logo.png"></div>
		<div class="getDetails" style=" margin:0 25px;">
			<div style=" float:left; width:265px;">
				<h2 style="color:#2D2D2D; font-size:16px;">Dear {$name},</h2>
				<p style="font-size:13px;line-height:10px;">Welcome to <b>Jobsfactory!</b></p>
				<p style="font-size:12px;line-height:20px;">
				It is our privilege to have you on the portal. You will find our search engine value adding in your job search process as it enables you to find the job of your choice.
				</p>
				<p style="font-size:12px;line-height:20px;">
					<b style="color:#2D2D2D; font-size:13px;">Wishing you the very best in your search choices ...</b>
				</p>
			</div>
			<div style=" float:left; width:265px; margin-left:20px; margin-top:20px;">
			<div style=" background:#f2f2f2;    border:1px solid #e4e4e4;    padding: 0px 7px;">
				<p style="font-size:12px;line-height:15px;">Your username and password details are given below:</p>
				<ul style="padding-left:1px">
									<li style=" font-size:13px; padding:0 0 2px 0;list-style-type:none;"><span style="font-weight:bold; width:75px; float:left;">Username:</span> <span>{$user_name}</span></li>
									<li style=" font-size:13px; padding:2px 0px;list-style-type:none;"><span style="font-weight:bold; width:75px; float:left;">Password:</span> <span>{$password}</span></li>
				</ul>
				</div>
				<p style="font-size:12px;line-height:20px;">Please click this link <a href="{$url}jobseeker_activation/?id={$link}/" style="color:#ED7723; font-size:13px; font-weight:bold">Activation URL</a> to verify your account before logging in to use the portal.</p>
			
</div>
<p style="font-size:12px;line-height:20px; clear:left; border-top:1px solid #D8D8D8; padding-top:10px;">
For further assistance and clarification please do write to us <a href="mailto:support@jobsfactory.in" style="color:#035CAF; font-size:13px;">support@jobsfactory.in</a> or call our customer care centre - ph no. 044 - 4900 4900.</p>
			<div style="clear:left;">
				<h3 style="font-size:16px; color:#2d2d2d; border-bottom:1px solid #3f3f3f">Jobsfactory  - <span style="font-size:13px">Your Search Ends Here!</span> </h3>
				
				<p style="font-size:12px;line-height:20px;">
				<b style="font-size:13px;">
				Jobsfactory</b> is the only online portal that is designed exclusively for the <b>Frontline Executives</b>. 
				Jobsfactory is the <b>bridge that connects</b> Job Seekers , 
				Employers and Colleges  together and gives freedom to directly interface with each other. 
				</p>
				<p style="font-size:12px;line-height:20px;">
				The <b>Job seeker</b> can find all jobs whose CTC is Rs 6Lakhs and below per annum, cutting across all types of industries from all the industrially developed States of India.  
				</p>
				<p style="font-size:12px;line-height:20px;">
				The <b>Employer</b> can stretch the selection from the wide range of available candidates who are 10th Standard Qualified & above.   
				</p>
				<p style="font-size:12px;line-height:20px;">
				The <b>Colleges</b> can post their Placement invites to the Employers and share their profile and students resumes directly through the Portal.
				</p>
				<p style="font-size:12px;line-height:20px;">
				To take yourself to the next trajectory Log on to <a href="http://www.jobsfactory.in" style="color:#035CAF; font-size:13px;">www.jobsfactory.in</a>.
			

				</div>	
		</div>
			<div class="footer" style="border-top:1px solid #8C8C8C; padding: 0 0 10px 10px;  margin:0;">
					<p style="font-size:12px;line-height:20px;">With Regards, <br /><span style="font-size:12px; font-weight:bold; color:#2D2D2D;">Jobsfactory</span>
					
					</p>
				<span style="font-size:11px;">Please do not reply to this auto generated mail.</span>
				
		</div>
		
</div>
</body>
</html>
EOD;
$content;
	return $content;
}



/*Note: Content of mail activation*/
function content_acknowledgement($name,$login_url,$type = 'E'){
	
 $this->webroot = webroot;
 $url = $this->webroot;
 $logon_message = 'To help your students reach next trajectory Log on to ';
 if($type == 'E'){
	$logon_message = 'To experience the difference in your selection process Log on ';	
 }
 
$content = <<< EOD
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Jobsfactory - Account Verification</title>
</head>

<body style="font-family:Arial, Helvetica, sans-serif; color:#222222;">
<div class="mailContent" style="margin:0 auto;width:600px; background:#FFF; border:1px solid #6D6D6D;">
	<div class="topHeader" style=" padding:10px; border-bottom:1px solid #8C8C8C; margin:0;"><img src="{$url}images/jobsfactory_logo.png"></div>
			<div class="getDetails" style=" margin:0 10px 20px 10px;">
				<h2 style="color:#2D2D2D; font-size:16px;">Dear {$name},</h2>
				<p style="font-size:12px;line-height:18px; height:25px;">
				Appreciate for registering with Jobsfactory. Your account will be processed for approval.  You will receive a mail from Jobsfactory once your account is activated. 
				</p>
		<div style="margin-top:30px"></div>
		<p style="font-size:12px;line-height:20px; clear:left; border-top:1px solid #D8D8D8; padding-top:10px;">
For further assistance and clarification please do write to us <a href="mailto:support@jobsfactory.in" style="color:#035CAF; font-size:13px;">support@jobsfactory.in</a> or call our customer care centre - ph no. 044 - 4900 4900.</p>
			<div style="clear:left;">
				<h3 style="font-size:16px; color:#2d2d2d; border-bottom:1px solid #3f3f3f">Jobsfactory  - <span style="font-size:13px">Your Search Ends Here!</span> </h3>
				
				<p style="font-size:12px;line-height:20px;">
				<b style="font-size:13px;">
				Jobsfactory</b> is the only online portal that is designed exclusively for the <b>Frontline Executives</b>. 
				Jobsfactory is the <b>bridge that connects</b> Job Seekers , 
				Employers and Colleges  together and gives freedom to directly interface with each other. 
				</p>
				<p style="font-size:12px;line-height:20px;">
				The <b>Job seeker</b> can find all jobs whose CTC is Rs 6Lakhs and below per annum, cutting across all types of industries from all the industrially developed States of India.  
				</p>
				<p style="font-size:12px;line-height:20px;">
				The <b>Employer</b> can stretch the selection from the wide range of available candidates who are 10th Standard Qualified & above.   
				</p>
				<p style="font-size:12px;line-height:20px;">
				The <b>Colleges</b> can post their Placement invites to the Employers and share their profile and students resumes directly through the Portal.
				</p>
				<p style="font-size:12px;line-height:20px;">
				{$logon_message}<a href="http://www.jobsfactory.in" style="color:#035CAF; font-size:13px;">www.jobsfactory.in</a>.
			

				</div>	
		</div>
			<div class="footer" style="border-top:1px solid #8C8C8C; padding: 0 0 10px 10px;  margin:0;">
					<p style="font-size:12px;line-height:20px;">With Regards, <br /><span style="font-size:12px; font-weight:bold; color:#2D2D2D;">Jobsfactory</span>
					
					</p>
				<span style="font-size:11px;">Please do not reply to this auto generated mail.</span>
				
		</div>
		
</div>
</body>
</html>

EOD;
	return $content;
}


/*Note: Content of employer registration success*/
function content_emp_register_success($name,$user_name,$password,$link){
 $this->webroot = webroot;
 $url = $this->webroot; 
$content = <<< EOD
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Jobsfactory - Employer Registration</title>
</head>

<body style="font-family:Arial, Helvetica, sans-serif; color:#222222;">
<div class="mailContent" style="margin:0 auto;width:600px; background:#FFF; border:1px solid #6D6D6D;">
	<div class="topHeader" style=" padding:10px; border-bottom:1px solid #8C8C8C; margin:0;"><img src="{$url}images/jobsfactory_logo.png"></div>
		<div class="getDetails" style=" margin:0 25px;">
			<div style=" float:left; width:265px;">
				<h2 style="color:#2D2D2D; font-size:16px;">Dear {$name},</h2>
				<p style="font-size:13px;line-height:10px;">Welcome to <b>Jobsfactory!</b></p>
				<p style="font-size:12px;line-height:20px;">
					It is our privilege to have you on the portal.  
					You will find our search engine value adding in your selection process as it enables you to find the right talent of your choice.
			    </p>
				<p style="font-size:12px;line-height:20px;">
					<b style="color:#2D2D2D; font-size:13px;">Wishing you the very best in your search choices ...</b>
				</p>
			</div>
			<div style=" float:left; width:265px; margin-left:20px; margin-top:20px;">
			<div style=" background:#f2f2f2;    border:1px solid #e4e4e4;    padding: 0px 7px;">
				<p style="font-size:12px;line-height:15px;">Your username and password details are given below:</p>
				<ul style="padding-left:1px">
									<li style=" font-size:13px; padding:0 0 2px 0;list-style-type:none;"><span style="font-weight:bold; width:75px; float:left;">Username:</span> <span>{$user_name}</span></li>
									<li style=" font-size:13px; padding:2px 0px;list-style-type:none;"><span style="font-weight:bold; width:75px; float:left;">Password:</span> <span>{$password}</span></li>
				</ul>
				</div>
				<p style="font-size:12px;line-height:20px;">Please click this link <a href="{$url}emp_activation/?id={$link}/" style="color:#ED7723; font-size:13px; font-weight:bold">Activation URL</a> to verify your account before logging in to use the portal.</p>
			
</div>
<p style="font-size:12px;line-height:20px; clear:left; border-top:1px solid #D8D8D8; padding-top:10px;">
For further assistance and clarification please do write to us <a href="mailto:support@jobsfactory.in" style="color:#035CAF; font-size:13px;">support@jobsfactory.in</a> or call our customer care centre - ph no. 044 - 4900 4900.</p>
			<div style="clear:left;">
				<h3 style="font-size:16px; color:#2d2d2d; border-bottom:1px solid #3f3f3f">Jobsfactory  - <span style="font-size:13px">Your Search Ends Here!</span> </h3>
				
				<p style="font-size:12px;line-height:20px;">
				<b style="font-size:13px;">
				Jobsfactory</b> is the only online portal that is designed exclusively for the <b>Frontline Executives</b>. 
				Jobsfactory is the <b>bridge that connects</b> Job Seekers , 
				Employers and Colleges  together and gives freedom to directly interface with each other. 
				</p>
				<p style="font-size:12px;line-height:20px;">
				The <b>Job seeker</b> can find all jobs whose CTC is Rs 6Lakhs and below per annum, cutting across all types of industries from all the industrially developed States of India.  
				</p>
				<p style="font-size:12px;line-height:20px;">
				The <b>Employer</b> can stretch the selection from the wide range of available candidates who are 10th Standard Qualified & above.   
				</p>
				<p style="font-size:12px;line-height:20px;">
				The <b>Colleges</b> can post their Placement invites to the Employers and share their profile and students resumes directly through the Portal.
				</p>
				<p style="font-size:12px;line-height:20px;">
				To experience the difference in your selection process Log on <a href="http://www.jobsfactory.in" style="color:#035CAF; font-size:13px;">www.jobsfactory.in</a>.
			

				</div>	
		</div>
			<div class="footer" style="border-top:1px solid #8C8C8C; padding: 0 0 10px 10px;  margin:0;">
					<p style="font-size:12px;line-height:20px;">With Regards, <br /><span style="font-size:12px; font-weight:bold; color:#2D2D2D;">Jobsfactory</span>
					
					</p>
				<span style="font-size:11px;">Please do not reply to this auto generated mail.</span>
				
		</div>
		
</div>
</body>
</html>

EOD;
	return $content;
}

/*Note: Content of employer registration success*/
function content_college_register_success($name,$email,$password,$link){
 $this->webroot = webroot;
 $url = $this->webroot; 
$content = <<< EOD
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Jobsfactory - College Registration</title>
</head>

<body style="font-family:Arial, Helvetica, sans-serif; color:#222222;">
<div class="mailContent" style="margin:0 auto;width:600px; background:#FFF; border:1px solid #6D6D6D;">
	<div class="topHeader" style=" padding:10px; border-bottom:1px solid #8C8C8C; margin:0;"><img src="{$url}images/jobsfactory_logo.png"></div>
		<div class="getDetails" style=" margin:0 25px;">
			<div style=" float:left; width:265px;">
				<h2 style="color:#2D2D2D; font-size:16px;">Dear {$name},</h2>
				<p style="font-size:13px;line-height:10px;">Welcome to <b>Jobsfactory!</b></p>
				<p style="font-size:12px;line-height:20px;">
				It is our privilege to have you on the portal.  You will find our search engine value adding in choosing right organization and enables you to place your students of their choice.
				</p>
				<p style="font-size:12px;line-height:20px;">
					<b style="color:#2D2D2D; font-size:13px;">Wishing you the very best in your search choices ...</b>
				</p>
			</div>
			<div style=" float:left; width:265px; margin-left:20px; margin-top:20px;">
			<div style=" background:#f2f2f2;    border:1px solid #e4e4e4;    padding: 0px 7px;">
				<p style="font-size:12px;line-height:15px;">Your username and password details are given below:</p>
				<ul style="padding-left:1px">
									<li style=" font-size:13px; padding:0 0 2px 0;list-style-type:none;"><span style="font-weight:bold; width:75px; float:left;">Username:</span> <span>{$email}</span></li>
									<li style=" font-size:13px; padding:2px 0px;list-style-type:none;"><span style="font-weight:bold; width:75px; float:left;">Password:</span> <span>{$password}</span></li>
				</ul>
				</div>
				<p style="font-size:12px;line-height:20px;">Please click this link <a href="{$url}college_activation/?id={$link}/" style="color:#ED7723; font-size:13px; font-weight:bold">Activation URL</a> to verify your account before logging in to use the portal.</p>
			
</div>
<p style="font-size:12px;line-height:20px; clear:left; border-top:1px solid #D8D8D8; padding-top:10px;">
For further assistance and clarification please do write to us <a href="mailto:support@jobsfactory.in" style="color:#035CAF; font-size:13px;">support@jobsfactory.in</a> or call our customer care centre - ph no. 044 - 4900 4900.</p>
			<div style="clear:left;">
				<h3 style="font-size:16px; color:#2d2d2d; border-bottom:1px solid #3f3f3f">Jobsfactory  - <span style="font-size:13px">Your Search Ends Here!</span> </h3>
				
				<p style="font-size:12px;line-height:20px;">
				<b style="font-size:13px;">
				Jobsfactory</b> is the only online portal that is designed exclusively for the <b>Frontline Executives</b>. 
				Jobsfactory is the <b>bridge that connects</b> Job Seekers , 
				Employers and Colleges  together and gives freedom to directly interface with each other. 
				</p>
				<p style="font-size:12px;line-height:20px;">
				The <b>Job seeker</b> can find all jobs whose CTC is Rs 6Lakhs and below per annum, cutting across all types of industries from all the industrially developed States of India.  
				</p>
				<p style="font-size:12px;line-height:20px;">
				The <b>Employer</b> can stretch the selection from the wide range of available candidates who are 10th Standard Qualified & above.   
				</p>
				<p style="font-size:12px;line-height:20px;">
				The <b>Colleges</b> can post their Placement invites to the Employers and share their profile and students resumes directly through the Portal.
				</p>
				<p style="font-size:12px;line-height:20px;">
				To help your students reach next trajectory Log on to <a href="http://www.jobsfactory.in" style="color:#035CAF; font-size:13px;">www.jobsfactory.in</a>.
			

				</div>	
		</div>
			<div class="footer" style="border-top:1px solid #8C8C8C; padding: 0 0 10px 10px;  margin:0;">
					<p style="font-size:12px;line-height:20px;">With Regards, <br /><span style="font-size:12px; font-weight:bold; color:#2D2D2D;">Jobsfactory</span>
					
					</p>
				<span style="font-size:11px;">Please do not reply to this auto generated mail.</span>
				
		</div>
		
</div>

</body>
</html>

EOD;
	return $content;
}

/*Note: Content of refer jobs friends */
function content_refer_jobs($name,$from,$from_email,$title,$company,$message,$jobs_id){
$fn = new india_job_function();
 $this->webroot = webroot;
 $url = $this->webroot;
 $titles = explode('~',$title);
 $job_id = explode('~',$jobs_id);
 $company = explode('~',$company);
 $count = count($titles); 
$content.= <<< EOD
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Jobsfactory - Refer Jobs</title>
</head>

<body style="font-family:Arial, Helvetica, sans-serif; color:#222222;">
<div class="mailContent" style="margin:0 auto;width:600px; background:#FFF; border:1px solid #6D6D6D;">
	<div class="topHeader" style=" padding:10px; border-bottom:1px solid #8C8C8C; margin:0;"><img src="{$url}images/jobsfactory_logo.png"></div>
			<div class="getDetails" style=" margin:0 10px;">
				<h2 style="color:#2D2D2D; font-size:16px;">Dear Friend,</h2>
				<p><a href="#" style="color:#1155CC;">{$name}</a></p>
				<p style="font-size:12px;line-height:18px; height:25px;">Greetings from Jobsfactory!</p>
				<p style="font-size:12px;line-height:18px; height:35px;">
				<span style="color:#ED7723;">{$from} ({$from_email})</span> is a registered  member of Jobsfactory . He is referring you few jobs from the Jobsfactory portal.
				</p>
				<p style="font-size:12px;line-height:18px; height:10px;">
				You can apply for all or any of  the following Jobs by clicking the link below:
				</p>
			
			<table style="width:100%; background:#ffffff; margin:20px 0; border:1px solid #ccc; padding:0; ">
			  <thead>
			 <tr>
				 <th style="width:5%; background:#E2E2E2;border:1px solid #DBDBDB; padding:5px 0;font-size:12px;">S.No</th>
				 <th style="width:34%; background:#E2E2E2;border:1px solid #DBDBDB; padding:5px 0;font-size:12px;">Job Title</th>
				 <th style="width:21%; background:#E2E2E2;border:1px solid #DBDBDB; padding:5px 0;font-size:12px;">Company</th>
				
			 </tr>
			 </thead>
			 <tbody>

EOD;
	for($i=0;$i<$count-1;$i++) 
	{
$sno = $i+1;
$content.= <<< EOD
				<tr style="background:#F2F2F2;">
			 	<td style=" padding:5px 0;font-size:12px; text-align:center;">{$sno}</td>
				<td style=" padding:5px 8px;font-size:12px; text-align:left;"><a href="{$url}en/view_jobs/{$fn->replace_jobs_string(trim($titles[$i]))}/{$fn->replace_jobs_string(trim($company[$i]))}/?id={$job_id[$i]}" style="color:#14638D;">{$titles[$i]}</a></td>
			 	<td style=" padding:5px 8px;font-size:12px; text-align:left;"><a href="{$url}en/search_jobs/?keywords=&company={$company[$i]}&searchby=companies" style="color:#14638D;">{$company[$i]}</a></td>	 
				</tr>
EOD;
	
	}
$content.= <<< EOD
		
			 </tbody>
			 </table>
			<p style="font-size:12px;"><b>Wish you all the Very Best!</b></p>
			<p style="font-size:12px;line-height:20px; clear:left; border-top:1px solid #D8D8D8; padding-top:10px;">
For further assistance and clarification please do write to us <a href="mailto:support@jobsfactory.in" style="color:#035CAF; font-size:13px;">support@jobsfactory.in</a> or call our customer care centre - ph no. 044 - 4900 4900.</p>
			<div style="clear:left;">
				<h3 style="font-size:16px; color:#2d2d2d; border-bottom:1px solid #3f3f3f">Jobsfactory  - <span style="font-size:13px">Your Search Ends Here!</span> </h3>
				<p style="font-size:12px;line-height:20px;">
				<b style="font-size:13px;">
				Jobsfactory</b> is the only online portal that is designed exclusively for the <b>Frontline Executives</b>. 
				Jobsfactory is the <b>bridge that connects</b> Job Seekers , 
				Employers and Colleges  together and gives freedom to directly interface with each other. 
				</p>
				<p style="font-size:12px;line-height:20px;">
				The <b>Job seeker</b> can find all jobs whose CTC is Rs 6Lakhs and below per annum, cutting across all types of industries from all the industrially developed States of India.  
				</p>
				<p style="font-size:12px;line-height:20px;">
				The <b>Employer</b> can stretch the selection from the wide range of available candidates who are 10th Standard Qualified & above.   
				</p>
				<p style="font-size:12px;line-height:20px;">
				The <b>Colleges</b> can post their Placement invites to the Employers and share their profile and students resumes directly through the Portal.
				</p>
				<p style="font-size:12px;line-height:20px;">
				To take yourself to the next trajectory Log on to <a href="http://www.jobsfactory.in" style="color:#035CAF; font-size:13px;">www.jobsfactory.in</a>.
			

				</div>		
				</div>	
		<div class="footer" style="border-top:1px solid #8C8C8C; padding: 0 0 10px 10px;  margin:0;">
					<p style="font-size:12px;line-height:20px;">With Regards, <br /><span style="font-size:12px; font-weight:bold; color:#2D2D2D;">Jobsfactory</span>
					
					</p>
			<span style="font-size:11px;">Please do not reply to this auto generated mail.</span>
				
		</div>			
</div>
</body>
</html>

EOD;
	return $content;
}

/*Note: Content of refer site friends */
function content_refer_site($to,$from,$from_email,$referral_code,$encrypt_email){
 $this->webroot = webroot;
 $url = $this->webroot;
  if(isset($_SESSION['user_id'])) {
		$message ='<p style="font-size:12px;line-height:18px; height:32px;">
	 <span style="color:#ED7723">'.$from.' ('.$from_email.')</span> 
	 is a registered  member of Jobsfactory. He is gifting you this invitation and wishes to see you  as part of Jobsfactory Family.
	 </p>
				
				<p style="font-size:12px;">Please use this referral code at the time of your registration and gift your friend with reward points.</p>
				<p style="font-size:12px;"><span style="font-size:13px; font-style:italic;">Referral Code</span> - 
				<span style="font-size:21px;width:137px; text-decoration:none;color:#EA7D09; border:1px solid #FFDEAD; padding:1px 6px; background:#FFFAF2;">'.$referral_code.'</span>';

 }else{
	     $message ='<p style="font-size:12px;line-height:18px; height:32px;">Your friend has referred and invited you to register and apply for Jobs.</p>
				
				<p style="font-size:12px;margin-bottom:25px;">Refer more friends and get more gifts.';
 }
 
$content.= <<< EOD
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Jobsfactory - Refer Friends</title>
</head>

<body style="font-family:Arial, Helvetica, sans-serif; color:#222222;">
<div class="mailContent" style="margin:0 auto;width:600px; background:#FFF; border:1px solid #6D6D6D;">
	<div class="topHeader" style=" padding:10px; border-bottom:1px solid #8C8C8C; margin:0;"><img src="{$url}images/jobsfactory_logo.png"></div>
			<div class="getDetails" style=" margin:0 25px;">
				<h2 style="color:#2D2D2D; font-size:16px;">Dear Friend,<br/>
				
				</h2>
				<p><a href="#" style="color:#1155CC;">{$to}</a></p>
				{$message}
				
				<a href="{$url}registration_step1/" class="active" style="background: #C6DDFF; border: 1px solid #829CE0; color: #1858BA;font: bold 13px Arial,Helvetica,sans-serif; padding: 6px;margin:0px 8px; width:84px; text-decoration:none; float:right;">Register Now</a>
				
				</p>
	
		
	<p style="font-size:12px;line-height:20px; clear:left; border-top:1px solid #D8D8D8; padding-top:10px;">
For further assistance and clarification please do write to us <a href="mailto:support@jobsfactory.in" style="color:#035CAF; font-size:13px;">support@jobsfactory.in</a> or call our customer care centre - ph no. 044 - 4900 4900.</p>
			<div style="clear:left;">
				<h3 style="font-size:16px; color:#2d2d2d; border-bottom:1px solid #3f3f3f">Jobsfactory  - <span style="font-size:13px">Your Search Ends Here!</span> </h3>
				<p style="font-size:12px;line-height:20px;">
				<b style="font-size:13px;">
				Jobsfactory</b> is the only online portal that is designed exclusively for the <b>Frontline Executives</b>. 
				Jobsfactory is the <b>bridge that connects</b> Job Seekers , 
				Employers and Colleges  together and gives freedom to directly interface with each other. 
				</p>
				<p style="font-size:12px;line-height:20px;">
				The <b>Job seeker</b> can find all jobs whose CTC is Rs 6Lakhs and below per annum, cutting across all types of industries from all the industrially developed States of India.  
				</p>
				<p style="font-size:12px;line-height:20px;">
				The <b>Employer</b> can stretch the selection from the wide range of available candidates who are 10th Standard Qualified & above.   
				</p>
				<p style="font-size:12px;line-height:20px;">
				The <b>Colleges</b> can post their Placement invites to the Employers and share their profile and students resumes directly through the Portal.
				</p>
				<p style="font-size:12px;line-height:20px;">
				To take yourself to the next trajectory Log on to <a href="http://www.jobsfactory.in" style="color:#035CAF; font-size:13px;">www.jobsfactory.in</a>.
			

				</div>		
				</div>	
		
			<div class="footer" style="border-top:1px solid #8C8C8C; padding: 0 0 10px 10px;  margin:0;">
					<p style="font-size:12px;line-height:20px;">With Regards, <br /><span style="font-size:12px; font-weight:bold; color:#2D2D2D;">Jobsfactory</span>
					
					</p>
			<span style="font-size:11px;">Please do not reply to this auto generated mail.</span>
				
		</div>		
</div>
</body>
</html>


EOD;
	return $content;
}

/*Note: Content of job fair */
function content_jobfair($name,$code,$data,$date_format,$fee){
 $this->webroot = webroot;
 //$url = $this->webroot ? $this->webroot : 'http://jobsfactory.in/'; 
 $venue = nl2br($data['venue']);
 $qual = nl2br($data['eligibility']);
 $other = nl2br($data['others']);
 $desc = nl2br($data['description']);
 $fee_txt = $fee ? "<span style='color:#2D2D2D; font-size:13px;font-weight:bold'>".' Registration fee Rs '.$fee.'/- </span>' : '';
$content.= <<< EOD
<html xmlns="http://www.w3.org/1999/xhtml"><head></head><body style="font-family:Arial, Helvetica, sans-serif; color:#222222;">
<div class="mailContent" style="margin:0 auto;width:600px; background:#FFF; border:1px solid #6D6D6D;">
	<div class="topHeader" style=" padding:10px; border-bottom:1px solid #8C8C8C; margin:0;">
	<a href="http://jobsfactory.in/"><img src="http://jobsfactory.in/images/jobsfactory_logo.png"></a>
	<!--a href="http://jobsfactory.in/registration/"><img src="http://jobsfactory.in/images/connect2career2.png" style="float:right;margin-right:20px;"
	width="220" height="55"></a-->
	</div>
		<div class="getDetails" style=" margin:0 25px;">
			<div style=" float:left; width:;">
				<h2 style="color:#2D2D2D; font-size:16px;">Dear {$name},</h2>
				<h3 style="font-size:14px;line-height:20px;font-weight:normal">
{$desc}
			</h3>

				<p style="font-size:14px;line-height:20px;">You registration is completed and your registration number is - 
				<span style="font-size:21px;width:137px; text-decoration:none; border:1px solid #000000; padding:1px 6px;">{$code}</span></p>



				
				</p>
				<p style="font-size:14px;line-height:20px;">
				<strong><u>Job Fair Venue details:</u> </strong>
				<br>
				{$venue} <br>
Date : <b>{$date_format}, Time: 09:00 AM</b> <br>


				</p>

				<p style="font-size:12px;line-height:20px;">
					<span style="color:#2D2D2D; font-size:13px;">{$qual} </span>
				</p>
				
				<p style="font-size:12px;line-height:20px;">
					<span style="color:#2D2D2D; font-size:13px;">{$other} </span>
				</p>
				
				<p style="font-size:12px;line-height:20px;">
				
					{$fee_txt}
				</p>
				
			</div>
		<!--p style="font-size:12px;line-height:20px;">
Companies like <b>ABT Maruti, TVS training and Services, Acer India Pvt. Ltd, IndusInd Bank, Apollo Hospitals, 
DFHL, HCL  </b>are participating in this Job Fair and many more being added everyday.				</p-->
				
			
<p style="font-size:12px;line-height:20px; clear:left; border-top:1px solid #D8D8D8; padding-top:10px;">
You may refer your friends also to participate in this Job Fair and get benefited out it. <a href="http://jobsfactory.in/refer_site_friends/" style="color:#035CAF; font-size:13px;">Click Here to Refer Friends</a></p>
			<div style="clear:left;">
				<p style="font-size:12px;;font-weight:;color:#2d2d2d;">				Hurry up registration closes on <b>$date_format</b> and interviews will be scheduled on first come first serve basis 
</p>
				
				<p style="font-size:12px;line-height:20px;">
				<p style="font-size:13px;">
				</p>
			
				
				<p style="font-size:12px;line-height:20px;">For any further assistance, reach us at <a href="mailto:jobfair16@jobsfactory.in">jobfair16@jobsfactory.in</a>    |   <a href="http://jobsfactory.in">www.jobsfactory.in</a> | 044-4900 4900</p></div>	
				
				<p style="font-size:12px;line-height:20px;">We look forward to helping you build a great career.</p>
		</div>
			<div class="footer" style="border-top:1px solid #8C8C8C; padding: 0 0 10px 20px;  margin:0;">
					<p style="font-size:12px;line-height:20px;">With Regards, <br><span style="font-size:12px; font-weight:bold; color:#2D2D2D;">Team Jobsfactory.IN</span>
					
					</p>
				<span style="font-size:11px;">Please do not reply to this auto generated mail.</span>
				
		</div>
		
</div>

</body></html>



EOD;
	return $content;
}


/*Note: Content of refer site friends */
function content_refer_inbox_message($to,$message,$message_website,$from,$email){
 $this->webroot = webroot;
 $url = $this->webroot;
 if($message_website != ''){
	$message_website = '<p style="font-size:13px;line-height:18px; height:20px;">For additional information please click - <a href="'.$message_website.'">'.$message_website.'</a></p>';
 }
 $content.= <<< EOD
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Jobsfactory -  Mail Friends</title>
</head>

<body style="font-family:Arial, Helvetica, sans-serif;">
<div class="mailContent" style="margin:0 auto;width:600px; background:#FFF; border:1px solid #D1D1D1;">
	<div class="topHeader" style=" padding:10px; border-bottom:1px solid #8C8C8C; margin:0;"><img src="{$url}images/jobsfactory_logo.png"></div>
			<div class="getDetails" style=" margin:0 10px;">
				<h2 style="color:#2D2D2D; font-size:16px;">Dear Friend,</h2>
				<p style="font-size:13px;line-height:18px; height:20px;">{$to}</p>
				<p style="font-size:12px;line-height:18px; height:25px;">Greetings from Jobsfactory!</p>
				<p style="font-size:12px;line-height:18px; height:25px;">
				{$from} ({$email}) is a registered member of Jobsfactory. 
				He found the following  information useful for you to keep yourself updated.
				</p>
				<p align="justify" style="font-size:12px;line-height:30px;">{$message}</p>
				{$message_website}
				
		<p style="font-size:12px;line-height:10px; clear:left; border-top:1px solid #D8D8D8; padding-top:10px;">
For further assistance and clarification please do write to us <a href="mailto:support@jobsfactory.in" style="color:#035CAF; font-size:13px;">support@jobsfactory.in</a> or call our customer care centre - ph no. 044 - 4900 4900.</p>
			<div style="clear:left;">
				<h3 style="font-size:16px; color:#2d2d2d; border-bottom:1px solid #3f3f3f">Jobsfactory  - <span style="font-size:13px">Your Search Ends Here!</span> </h3>
				<p style="font-size:12px;line-height:20px;">
				<b style="font-size:13px;">
				Jobsfactory</b> is the only online portal that is designed exclusively for the <b>Frontline Executives</b>. 
				Jobsfactory is the <b>bridge that connects</b> Job Seekers , 
				Employers and Colleges  together and gives freedom to directly interface with each other. 
				</p>
				<p style="font-size:12px;line-height:20px;">
				The <b>Job seeker</b> can find all jobs whose CTC is Rs 6Lakhs and below per annum, cutting across all types of industries from all the industrially developed States of India.  
				</p>
				<p style="font-size:12px;line-height:20px;">
				The <b>Employer</b> can stretch the selection from the wide range of available candidates who are 10th Standard Qualified & above.   
				</p>
				<p style="font-size:12px;line-height:20px;">
				The <b>Colleges</b> can post their Placement invites to the Employers and share their profile and students resumes directly through the Portal.
				</p>
				<p style="font-size:12px;line-height:20px;">
				To take yourself to the next trajectory Log on to <a href="http://www.jobsfactory.in" style="color:#035CAF; font-size:13px;">www.jobsfactory.in</a>.
			

				</div>		
				</div>	
		
			<div class="footer" style="border-top:1px solid #8C8C8C; padding: 0 0 10px 10px;  margin:0;">
					<p style="font-size:12px;line-height:20px;">With Regards, <br /><span style="font-size:12px; font-weight:bold; color:#2D2D2D;">Jobsfactory</span>
					
					</p>
			<span style="font-size:11px;">Please do not reply to this auto generated mail.</span>
				
		</div>		
</div>
</body>
</html>

EOD;
	return $content;
}

/*Note: Content of business enquiry */
function content_business_enquiry($name1,$name2,$des,$email,$mobile,$company,$desc,$city,$state,$link,$admin_fname,$admin_lname){
 $this->webroot = webroot;
 $url = $this->webroot;
 $content = <<<EOD
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Jobsfactory - Business Enquiry</title>
</head>

<body style="font-family: Arial,Helvetica,sans-serif;">
<div class="mailContent" style="background:#FFFFFF;    border: 1px solid #D1D1D1;    margin: 0 auto;    width: 600px;">
	<div class="topHeader" style=" padding:10px; border-bottom:1px solid #8C8C8C; margin:0;"><img src="{$url}images/jobsfactory_logo.png"></div>
			<div class="getDetails" style="margin: 0 10px;">
				<h2 style="color: #2D2D2D; font-size: 16px;">Dear {$admin_fname},</h2>

				<p style="font-size: 12px; height: 25px; line-height: 18px;">You have received a Business Enquiry. Please check the details below, </p>
			
				<ul style="float: right; margin:0px 50px 30px 0px; width: 538px;">
					<li style="border-left: 1px solid #EBD7F7;    border-right: 1px solid #EBD7F7;    border-top: 1px solid #EBD7F7;    clear: left;    float: left;    font-size: 13px;    list-style-type: none;    margin: 0 10px;    padding: 0;    width: 538px;"><span class="head fBold" style="float: left; color: #444244;    font-weight: bold;font-size: 13px;    padding: 6px;    width: 100px;">First Name</span><span class="desc" style=" border-left: 1px solid #EBD7F7;float: left;color: #423F3F;font-size: 13px;    padding: 6px; width:350px;">{$name1}</span></li>
					<li class="pink" style="background: #EBD7F7; border-left: 1px solid #EBD7F7;    border-right: 1px solid #EBD7F7;    border-top: 1px solid #EBD7F7;    clear: left;    float: left;    font-size: 13px;    list-style-type: none;    margin: 0 10px;    padding: 0;    width: 538px;"><span class="head fBold" style="float: left; color: #444244;    font-weight: bold;font-size: 13px;    padding: 6px;    width: 100px;">Last Name</span><span class="desc" style=" border-left: 1px solid #EBD7F7;float: left;color: #423F3F;font-size: 13px;    padding: 6px; width:350px;">{$name2}</span></li>
					<li style="border-left: 1px solid #EBD7F7;    border-right: 1px solid #EBD7F7;    border-top: 1px solid #EBD7F7;    clear: left;    float: left;    font-size: 13px;    list-style-type: none;    margin: 0 10px;    padding: 0;    width: 538px;"><span class="head fBold" style="float: left; color: #444244;    font-weight: bold;font-size: 13px;    padding: 6px;    width: 100px;">Designation</span><span class="desc" style=" border-left: 1px solid #EBD7F7;float: left;color: #423F3F;font-size: 13px;    padding: 6px; width:350px;">{$des}</span></li>
					<li class="pink" style="background: #EBD7F7;border-left: 1px solid #EBD7F7;    border-right: 1px solid #EBD7F7;    border-top: 1px solid #EBD7F7;    clear: left;    float: left;    font-size: 13px;    list-style-type: none;    margin: 0 10px;    padding: 0;    width: 538px;"><span class="head fBold" style="float: left; color: #444244;    font-weight: bold;font-size: 13px;    padding: 6px;    width: 100px;">Email Address</span><span class="desc" style=" border-left: 1px solid #EBD7F7;float: left;color: #423F3F;font-size: 13px;    padding: 6px; width:350px;">{$email}</span></li>
					<li style="border-left: 1px solid #EBD7F7;    border-right: 1px solid #EBD7F7;    border-top: 1px solid #EBD7F7;    clear: left;    float: left;    font-size: 13px;    list-style-type: none;    margin: 0 10px;    padding: 0;    width: 538px;"><span class="head fBold" style="float: left; color: #444244;    font-weight: bold;font-size: 13px;    padding: 6px;    width: 100px;">Mobile</span><span class="desc" style=" border-left: 1px solid #EBD7F7;float: left;color: #423F3F;font-size: 13px;    padding: 6px; width:350px;">{$mobile}</span></li>
					<li class="pink" style="background: #EBD7F7;border-left: 1px solid #EBD7F7;    border-right: 1px solid #EBD7F7;    border-top: 1px solid #EBD7F7;    clear: left;    float: left;    font-size: 13px;    list-style-type: none;    margin: 0 10px;    padding: 0;    width: 538px;"><span class="head fBold" style="float: left; color: #444244;    font-weight: bold;font-size: 13px;    padding: 6px;    width: 100px;">Company</span><span class="desc" style=" border-left: 1px solid #EBD7F7;float: left;color: #423F3F;font-size: 13px;    padding: 6px; width:350px;">{$company}</span></li>
					<li style="border-left: 1px solid #EBD7F7;    border-right: 1px solid #EBD7F7;    border-top: 1px solid #EBD7F7;    clear: left;    float: left;    font-size: 13px;    list-style-type: none;    margin: 0 10px;   padding: 0;    width: 538px;"><span class="head fBold" style="float: left; color: #444244;    font-weight: bold;font-size: 13px;    padding: 6px;    width: 100px;">City</span><span class="desc" style=" border-left: 1px solid #EBD7F7;float: left;color: #423F3F;font-size: 13px;    padding: 6px; width:350px;">{$city}</span></li>
					<li class="pink" style="background: #EBD7F7;border-left: 1px solid #EBD7F7;    border-right: 1px solid #EBD7F7;    border-top: 1px solid #EBD7F7;    clear: left;    float: left;    font-size: 13px;    list-style-type: none;    margin: 0 10px;    padding: 0;    width: 538px;"><span class="head fBold" style="float: left; color: #444244;    font-weight: bold;font-size: 13px;    padding: 6px;    width: 100px;">State</span><span class="desc" style=" border-left: 1px solid #EBD7F7;float: left;color: #423F3F;font-size: 13px;    padding: 6px; width:350px;">{$state}</span></li>
					<li class="last" style="border-left: 1px solid #EBD7F7;border-bottom: 1px solid #D8D8D8; border-right: 1px solid #EBD7F7;    border-top: 1px solid #EBD7F7;    clear: left;    float: left;    font-size: 13px;    list-style-type: none;    margin: 0 10px;    padding: 0;    width: 538px;"><span class="head fBold" style="float: left; color: #444244;    font-weight: bold;font-size: 13px;    padding: 6px;    width: 100px;">Description</span><span class="desc" style=" border-left: 1px solid #EBD7F7;float: left;color: #423F3F;font-size: 13px;    padding: 6px; width:350px;">{$desc}</span></li>
					</ul>
		</div>	
		<div style="clear:both"></div>
		<div class="footer" style="border-top:1px solid #8C8C8C; padding: 0 0 10px 10px;  margin:0;">
					<p style="font-size:12px;line-height:20px;">From <br /><span style="font-size:12px; font-weight:bold; color:#2D2D2D;">JobsFactory</span>
					
					</p>
				<span style="font-size:11px;"><b>Note:</b> This is auto generate email. Please do not reply to this mail</span>
				
		</div>	
		
</div>
</body>
</html>

EOD;
	return $content;
}

/*Note: Content of placement enquiry */
function content_placement_enquiry($name,$email,$coord,$landline,$mobile,$address,$city,$state,$desc,$link,$admin_fname,$admin_lname){
 $this->webroot = webroot;
 $url = $this->webroot;
 if($address == ''){ 
	$address == '---'; 
 }
 if($landline == '' ){
	$landline = '---';
}
if($desc == '' ){
	$desc = '---';
}
 $content = <<< EOD
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Jobsfactory - Placement Enquiry</title>
</head>

<body style="font-family: Arial,Helvetica,sans-serif;">
<div class="mailContent" style="background:#FFFFFF;    border: 1px solid #D1D1D1;    margin: 0 auto;    width: 600px;">
	<div class="topHeader" style=" padding:10px; border-bottom:1px solid #8C8C8C; margin:0;"><img src="{$url}images/jobsfactory_logo.png"></div>
			<div class="getDetails" style="margin: 0 10px;">
				<h2 style="color: #2D2D2D; font-size: 16px;">Dear {$admin_fname},</h2>
				<p style="font-size: 12px; height: 25px; line-height: 18px;">You have received a Placement Enquiry. Please check the details below, </p>
			
				<ul style="float: right; margin:0px 50px 30px 0px; width: 538px;">
					<li style="border-left: 1px solid #EBD7F7;    border-right: 1px solid #EBD7F7;    border-top: 1px solid #EBD7F7;    clear: left;    float: left;    font-size: 13px;    list-style-type: none;    margin: 0 10px;    padding: 0;    width: 538px;"><span class="head fBold" style="float: left; color: #444244;    font-weight: bold;font-size: 13px;    padding: 6px;   width: 154px;">Institute Name</span><span class="desc" style=" border-left: 1px solid #EBD7F7;float: left;color: #423F3F;font-size: 13px;    padding: 6px; width:350px;">{$name}</span></li>
					<li class="pink" style="background: #EBD7F7; border-left: 1px solid #EBD7F7;    border-right: 1px solid #EBD7F7;    border-top: 1px solid #EBD7F7;    clear: left;    float: left;    font-size: 13px;    list-style-type: none;    margin: 0 10px;    padding: 0;    width: 538px;"><span class="head fBold" style="float: left; color: #444244;    font-weight: bold;font-size: 13px;    padding: 6px;   width: 154px;">Placement Coordinator</span><span class="desc" style=" border-left: 1px solid #EBD7F7;float: left;color: #423F3F;font-size: 13px;    padding: 6px; width:350px;">{$coord}</span></li>
					<li style="border-left: 1px solid #EBD7F7;    border-right: 1px solid #EBD7F7;    border-top: 1px solid #EBD7F7;    clear: left;    float: left;    font-size: 13px;    list-style-type: none;    margin: 0 10px;    padding: 0;    width: 538px;"><span class="head fBold" style="float: left; color: #444244;    font-weight: bold;font-size: 13px;    padding: 6px;   width: 154px;">Email Address</span><span class="desc" style=" border-left: 1px solid #EBD7F7;float: left;color: #423F3F;font-size: 13px;    padding: 6px; width:350px;">{$email}</span></li>
					<li class="pink" style="background: #EBD7F7;border-left: 1px solid #EBD7F7;    border-right: 1px solid #EBD7F7;    border-top: 1px solid #EBD7F7;    clear: left;    float: left;    font-size: 13px;    list-style-type: none;    margin: 0 10px;    padding: 0;    width: 538px;"><span class="head fBold" style="float: left; color: #444244;    font-weight: bold;font-size: 13px;    padding: 6px;    width: 154px;">Landline No</span><span class="desc" style=" border-left: 1px solid #EBD7F7;float: left;color: #423F3F;font-size: 13px;    padding: 6px; width:350px;">{$landline}</span></li>
					<li style="border-left: 1px solid #EBD7F7;    border-right: 1px solid #EBD7F7;    border-top: 1px solid #EBD7F7;    clear: left;    float: left;    font-size: 13px;    list-style-type: none;    margin: 0 10px;    padding: 0;    width: 538px;"><span class="head fBold" style="float: left; color: #444244;    font-weight: bold;font-size: 13px;    padding: 6px;    width: 154px;">Mobile No</span><span class="desc" style=" border-left: 1px solid #EBD7F7;float: left;color: #423F3F;font-size: 13px;    padding: 6px; width:350px;">{$mobile}</span></li>
					<li class="pink" style="background: #EBD7F7;border-left: 1px solid #EBD7F7;    border-right: 1px solid #EBD7F7;    border-top: 1px solid #EBD7F7;    clear: left;    float: left;    font-size: 13px;    list-style-type: none;    margin: 0 10px;    padding: 0;    width: 538px;"><span class="head fBold" style="float: left; color: #444244;    font-weight: bold;font-size: 13px;    padding: 6px;    width: 154px;">Address</span><span class="desc" style=" border-left: 1px solid #EBD7F7;float: left;color: #423F3F;font-size: 13px;    padding: 6px; width:350px;">{$address}</span></li>
					<li style="border-left: 1px solid #EBD7F7;    border-right: 1px solid #EBD7F7;    border-top: 1px solid #EBD7F7;    clear: left;    float: left;    font-size: 13px;    list-style-type: none;    margin: 0 10px;    padding: 0;    width: 538px;"><span class="head fBold" style="float: left; color: #444244;    font-weight: bold;font-size: 13px;    padding: 6px;    width: 154px;"></span>City<span class="desc" style=" border-left: 1px solid #EBD7F7;float: left;color: #423F3F;font-size: 13px;    padding: 6px; width:350px;">{$city}</span></li>
					<li class="pink" style="background: #EBD7F7;border-left: 1px solid #EBD7F7;    border-right: 1px solid #EBD7F7;    border-top: 1px solid #EBD7F7;    clear: left;    float: left;    font-size: 13px;    list-style-type: none;    margin: 0 10px;    padding: 0;    width: 538px;"><span class="head fBold" style="float: left; color: #444244;    font-weight: bold;font-size: 13px;    padding: 6px;    width: 154px;">State</span><span class="desc" style=" border-left: 1px solid #EBD7F7;float: left;color: #423F3F;font-size: 13px;    padding: 6px; width:350px;">{$state}</span></li>
					<li class="last" style="border-left: 1px solid #EBD7F7;border-bottom: 1px solid #D8D8D8; border-right: 1px solid #EBD7F7;    border-top: 1px solid #EBD7F7;    clear: left;    float: left;    font-size: 13px;    list-style-type: none;    margin: 0 10px;    padding: 0;    width: 538px;"><span class="head fBold" style="float: left; color: #444244;    font-weight: bold;font-size: 13px;    padding: 6px;    width: 154px;">Description</span><span class="desc" style=" border-left: 1px solid #EBD7F7;float: left;color: #423F3F;font-size: 13px;    padding: 6px; width:350px;">{$desc}</span></li>
				</ul>
		</div>	
		<div style="clear:both"></div>
		<div class="footer" style="border-top:1px solid #8C8C8C; padding: 0 0 10px 10px;  margin:0;">
					<p style="font-size:12px;line-height:20px;">From <br /><span style="font-size:12px; font-weight:bold; color:#2D2D2D;">JobsFactory</span>
					
					</p>
				<span style="font-size:11px;"><b>Note:</b> This is auto generate email. Please do not reply to this mail</span>
				
		</div>			
</div>
</body>
</html>

EOD;
	return $content;
}

/* function to send mail after user activation */

function content_user_activation($user,$message){
	 $this->webroot = webroot;
	$url = $this->webroot; 
	if($message != ''){
		$web_resume_find = '<p style="font-size:12px;line-height:18px; height:25px;">'.$message.'</p>';
	}
$content = <<< EOD
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Jobsfactory - Account Verification</title>
</head>

<body style="font-family:Arial, Helvetica, sans-serif; color:#222222;">
<div class="mailContent" style="margin:0 auto;width:600px; background:#FFF; border:1px solid #6D6D6D;">
	<div class="topHeader" style=" padding:10px; border-bottom:1px solid #8C8C8C; margin:0;"><img src="{$url}images/jobsfactory_logo.png"></div>
			<div class="getDetails" style=" margin:0 10px 20px 10px;">
				<h2 style="color:#2D2D2D; font-size:16px;">Hello {$user},</h2>
				<p style="font-size:12px;line-height:20px;">Congratulations!</p>
				<p style="font-size:12px;line-height:18px; height:25px;">Pleasure to have You with Us. Your account is successfully registered with Jobsfactory.</p>
				{$web_resume_find}
				<p style="font-size:12px;line-height:18px;"><a href="{$url}login/" class="active" style="background: #C6DDFF; border: 1px solid #829CE0; color: #1858BA; font: bold 13px Arial,Helvetica,sans-serif; padding: 6px;margin:10px 1px; width:137px; text-decoration:none;">Click here to Login</a></p>
				<p style="font-size:12px;line-height:20px; clear:left; border-top:1px solid #D8D8D8; padding-top:10px;">
For further assistance and clarification please do write to us <a href="mailto:support@jobsfactory.in" style="color:#035CAF; font-size:13px;">support@jobsfactory.in</a> or call our customer care centre - ph no. 044 - 4900 4900.</p>
			<div style="clear:left;">
				<h3 style="font-size:16px; color:#2d2d2d; border-bottom:1px solid #3f3f3f">Jobsfactory  - <span style="font-size:13px">Your Search Ends Here!</span> </h3>
				<p style="font-size:12px;line-height:20px;">
				<b style="font-size:13px;">
				Jobsfactory</b> is the only online portal that is designed exclusively for the <b>Frontline Executives</b>. 
				Jobsfactory is the <b>bridge that connects</b> Job Seekers , 
				Employers and Colleges  together and gives freedom to directly interface with each other. 
				</p>
				<p style="font-size:12px;line-height:20px;">
				The <b>Job seeker</b> can find all jobs whose CTC is Rs 6Lakhs and below per annum, cutting across all types of industries from all the industrially developed States of India.  
				</p>
				<p style="font-size:12px;line-height:20px;">
				The <b>Employer</b> can stretch the selection from the wide range of available candidates who are 10th Standard Qualified & above.   
				</p>
				<p style="font-size:12px;line-height:20px;">
				The <b>Colleges</b> can post their Placement invites to the Employers and share their profile and students resumes directly through the Portal.
				</p>
				<p style="font-size:12px;line-height:20px;">
				To take yourself to the next trajectory Log on to <a href="http://www.jobsfactory.in" style="color:#035CAF; font-size:13px;">www.jobsfactory.in</a>.
			

				</div>	
		</div>	
		<div class="footer" style="border-top:1px solid #8C8C8C; padding: 0 0 10px 10px;  margin:0;">
					<p style="font-size:12px;line-height:20px;">With Regards, <br />
					<span style="font-size:12px; font-weight:bold; color:#2D2D2D;">Jobsfactory</span>
					
					</p>
					<span style="font-size:11px;">Please do not reply to this auto generated mail.</span>
				
				
		</div>			
</div>
</body>
</html>


EOD;

	return $content;
	
}

/* function to alert inactive js */
function inactive_jobseeker_alert($name, $email, $link ){
	$this->webroot = webroot;
 $url = $this->webroot;
	$content = <<< EOD
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Jobsfactory - Account Verification</title>
</head>

<body style="font-family:Arial, Helvetica, sans-serif; color:#222222;">
<div class="mailContent" style="margin:0 auto;width:600px; background:#FFF; border:1px solid #6D6D6D;">
	<div class="topHeader" style=" padding:10px; border-bottom:1px solid #8C8C8C; margin:0;"><img src="{$url}images/jobsfactory_logo.png"></div>
			<div class="getDetails" style=" margin:0 10px 20px 10px;">
				<h2 style="color:#2D2D2D; font-size:16px;">Dear {$name},</h2>
				<p style="font-size:12px;line-height:20px;">We thank you for registering your resume with www.jobsfactory.in.</p>
				<p style="font-size:12px;line-height:20px;">
You need to go one-step further to <a href="{$url}jobseeker_activation/?id={$link}/"><b>Activate your Account</b></a> to access the portal. Activation is an important step in recognising and verification of your profile before it is released for the employers to view and invite you for interviews, if they find your profile suitable.
<br><br>
Immediately after your registration with us we have sent you an email with the link for activation of your profile. It looks like you have missed to see the same. Doesn't matter! 
<br><br>
We are sharing the same Activation URL herewith and you are required to <a href="{$url}jobseeker_activation/?id={$link}/"><b>click this link</b></a> to activate your account before logging-in to use the portal. Please also find your user name and password to login after the activation
</p>
<div style=" float:left; width:415px; margin-left:20px; margin-top:10px;">
			<div style=" background:#f2f2f2;    border:1px solid #e4e4e4;    padding: 0px 7px;">
				<p style="font-size:12px;line-height:15px;">Your Account Details:</p>
				<ul style="padding-left:1px">
									<li style=" font-size:13px; padding:0 0 2px 0;list-style-type:none;"><span style="font-weight:bold; width:145px; float:left;">Login Email Id:</span> <span>{$email}</span></li>

									<li style=" font-size:13px; padding:2px 0px;list-style-type:none;"><span style="font-weight:bold; width:145px; float:left;margin-top:px;">Password:</span> <span>*******</span></li>
				</ul>

				</div>	
</div>	
			
<br><br>
<div style="font-size:12px;line-height:20px;float:left;"><br>
I am sure you will find our job portal adding value in your job search process. We have launched a country-wide aggressive campaigning for job postings and the no.of jobs posted is on the rise.
<br><br>
Wishing you the very best in your job search!
</div>

				<p style="font-size:12px;line-height:20px; clear:left; border-top:1px solid #D8D8D8; padding-top:10px;">
For further assistance and clarification please do write to us <a href="mailto:support@jobsfactory.in" style="color:#035CAF; font-size:13px;">support@jobsfactory.in</a> or call our customer care centre - ph no. 044 - 4900 4900.</p>
			<div style="clear:left;">
				<h3 style="font-size:16px; color:#2d2d2d; border-bottom:1px solid #3f3f3f">Jobsfactory  - <span style="font-size:13px">Your Search Ends Here!</span> </h3>
				<p style="font-size:12px;line-height:20px;">
				<b style="font-size:13px;">
				Jobsfactory</b> is the only online portal that is designed exclusively for the <b>Frontline Executives</b>. 
				Jobsfactory is the <b>bridge that connects</b> Job Seekers , 
				Employers and Colleges  together and gives freedom to directly interface with each other. 
				</p>
				<p style="font-size:12px;line-height:20px;">
				The <b>Job seeker</b> can find all jobs whose CTC is Rs 6Lakhs and below per annum, cutting across all types of industries from all the industrially developed States of India.  
				</p>
				<p style="font-size:12px;line-height:20px;">
				The <b>Employer</b> can stretch the selection from the wide range of available candidates who are 10th Standard Qualified & above.   
				</p>
				<p style="font-size:12px;line-height:20px;">
				The <b>Colleges</b> can post their Placement invites to the Employers and share their profile and students resumes directly through the Portal.
				</p>
				<p style="font-size:12px;line-height:20px;">
				To take yourself to the next trajectory Log on to <a href="http://www.jobsfactory.in" style="color:#035CAF; font-size:13px;">www.jobsfactory.in</a>.
			

				</div>	
		</div>	
		<div class="footer" style="border-top:1px solid #8C8C8C; padding: 0 0 10px 10px;  margin:0;">
					<p style="font-size:12px;line-height:20px;">With Regards, <br />
					<span style="font-size:12px; font-weight:bold; color:#2D2D2D;">Team Jobsfactory.in</span>
					
					</p>
					<span style="font-size:11px;">Please do not reply to this auto generated mail.</span>
				
				
		</div>			
</div>
</body>
</html>


EOD;

return $content;

}

/* function to alert for profile incomplete js */
function profile_incomplete_alert($name, $email){
	$this->webroot = webroot;
 $url = $this->webroot;
	$content = <<< EOD
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Jobsfactory - Account Verification</title>
</head>

<body style="font-family:Arial, Helvetica, sans-serif; color:#222222;">
<div class="mailContent" style="margin:0 auto;width:600px; background:#FFF; border:1px solid #6D6D6D;">
	<div class="topHeader" style=" padding:10px; border-bottom:1px solid #8C8C8C; margin:0;"><img src="{$url}images/jobsfactory_logo.png"></div>
			<div class="getDetails" style=" margin:0 10px 20px 10px;">
				<h2 style="color:#2D2D2D; font-size:16px;">Dear {$name},</h2>
				<p style="font-size:12px;line-height:20px;">You have registered on jobsfactory.in few days ago but were unable to complete your profile.</p>
			
<div style=" float:left; width:415px; margin-left:20px; margin-top:10px;">
			<div style=" background:#f2f2f2;    border:1px solid #e4e4e4;    padding: 0px 7px;">
				<p style="font-size:12px;line-height:15px;">Your Account Details:</p>
				<ul style="padding-left:1px">
									<li style=" font-size:13px; padding:0 0 2px 0;list-style-type:none;"><span style="font-weight:bold; width:145px; float:left;">Login Email Id:</span> <span>{$email}</span></li>

									<li style=" font-size:13px; padding:2px 0px;list-style-type:none;"><span style="font-weight:bold; width:145px; float:left;margin-top:px;">Password:</span> <span>*******</span></li>
				<li style="height:32px;font-size:13px; padding:2px 0px;list-style-type:none;">
						<a href="{$url}login/" class="active" style="background: #C6DDFF; border: 1px solid #829CE0; color: #1858BA;font: bold 13px Arial,Helvetica,sans-serif; padding: 6px;margin:10px 8px; text-decoration:none; float:left;">Login Now</a>
						</li>

	
	
	</ul>
			</div>	
				
	
</div>	
			
<br><br>
<div style="font-size:12px;line-height:20px;float:left;"><br>
Recruiters contact only those jobseekers who have completed their profile. We highly recommend you to complete your profile as recruiters will shortlist candidates for interview with complete details and updated resume.<br>
 There are more than 3 Lakh jobs on Jobsfactory.IN and many more being added everyday.
We are unable to send some of the best job openings matching your profile without your complete details.

</div>

				<p style="font-size:12px;line-height:20px; clear:left; border-top:1px solid #D8D8D8; padding-top:10px;">
For further assistance and clarification please do write to us <a href="mailto:support@jobsfactory.in" style="color:#035CAF; font-size:13px;">support@jobsfactory.in</a> or call our customer care centre - ph no. 044 - 4900 4900.</p>
			<div style="clear:left;">
				<h3 style="font-size:16px; color:#2d2d2d; border-bottom:1px solid #3f3f3f">Jobsfactory  - <span style="font-size:13px">Your Search Ends Here!</span> </h3>
				<p style="font-size:12px;line-height:20px;">
				<b style="font-size:13px;">
				Jobsfactory</b> is the only online portal that is designed exclusively for the <b>Frontline Executives</b>. 
				Jobsfactory is the <b>bridge that connects</b> Job Seekers , 
				Employers and Colleges  together and gives freedom to directly interface with each other. 
				</p>
				<p style="font-size:12px;line-height:20px;">
				The <b>Job seeker</b> can find all jobs whose CTC is Rs 6Lakhs and below per annum, cutting across all types of industries from all the industrially developed States of India.  
				</p>
				<p style="font-size:12px;line-height:20px;">
				The <b>Employer</b> can stretch the selection from the wide range of available candidates who are 10th Standard Qualified & above.   
				</p>
				<p style="font-size:12px;line-height:20px;">
				The <b>Colleges</b> can post their Placement invites to the Employers and share their profile and students resumes directly through the Portal.
				</p>
				<p style="font-size:12px;line-height:20px;">
				To take yourself to the next trajectory Log on to <a href="http://www.jobsfactory.in" style="color:#035CAF; font-size:13px;">www.jobsfactory.in</a>.
			

				</div>	
		</div>	
		<div class="footer" style="border-top:1px solid #8C8C8C; padding: 0 0 10px 10px;  margin:0;">
					<p style="font-size:12px;line-height:20px;">With Regards, <br />
					<span style="font-size:12px; font-weight:bold; color:#2D2D2D;">Team Jobsfactory.in</span>
					
					</p>
					<span style="font-size:11px;">Please do not reply to this auto generated mail.</span>
				
				
		</div>			
</div>
</body>
</html>

EOD;

return $content;

}


}

$content = new Content(); // create object for the class

?>