<?php
/* 
Purpose : To validate mail contents.
Created : Nikitasa
Date : 16-11-2016
*/

class mailContent extends fun{
	
	/* function to print the ticket html for front end */
	function get_ticket_mail($form_data,$type_data,$user_name,$admin_name){ 
	  $name = $user_name;
	  $admin_name = $admin_name;
     $priority = $this->it_ticket_priority($form_data['priority']);
	  $subject = $form_data['subject'];
	  $description = $form_data['description'];
	  $it_ticket_type = $type_data;
	  $ticket_file = $form_data['ticket_file'];
	  $content = <<< EOD
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body style="margin:0; padding:0; background:#e1e1e1;">

<table width="700" border="0" align="center" cellpadding="0" cellspacing="0" style="border:2px solid #fff; background:#fff; margin-bottom:40px">
  <tr style="background:#438eb9;">
    <td width="436" height="80" style="padding-left:20px;"><img src="<?php echo Configure::read('WEBSITE').$this->webroot; ?>img/logo2.png" border="0"  /></td>
    <td width="269" align="right" style="padding-right:20px;"></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="490" valign="top"  style="padding:0 20px;"><h1 style="font:bold 15px Arial, Helvetica, sans-serif; color:#676767; margin:0 0 10px 0;">Dear {$admin_name},</h1>
          <p style="font:13px Arial, Helvetica, sans-serif; color:#676767; margin:0;">You have received a ticket from  {$name}. Please login to MyPDCA and update the ticket details.</p><br />

          <p style="font:bold 13px Arial, Helvetica, sans-serif; color:#676767; margin:0;">Below are the new ticket details,</p>
          <table width="100%" border="0" cellspacing="2" cellpadding="10" style="border:1px solid #ededed; font:bold 13px Arial, Helvetica, sans-serif; color:#6f6e6e; margin:10px 0 20px 0;">
          
             <tr style="background:#f5f4f4;">
			  		<td width="100">Priority</td>
              	<td style="color:#2a2a2a;">{$priority}</td>
              	<td width="100">Subject</td>
              	<td style="color:#2a2a2a;">{$subject}</td>  
            </tr>
			   <tr style="background:#f5f4f4;">
              	<td width="100">Description</td>
              	<td style="color:#2a2a2a;">{$description}</td>
              	<td width="100">Type</td>
              	<td style="color:#2a2a2a;">{$it_ticket_type}</td>     
            </tr>
          </table>
        
</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
 <tr>
    <td height="80" colspan="2" valign="top" bgcolor="#ededed" style="font:normal 12px Arial, Helvetica, sans-serif; color:#6f6e6e; padding:0 20px">
    <p >Note: This is system generated mail. Please do not reply to this email ID. if you have a query or need 
any clarification you may
email us.  <a href="mailto:finance@career-tree.in" style="color:#e56712;">hr@career-tree.in</a> 
</p>
    </td>
  </tr>
</table>
</body>
</html>

EOD;
	return $content;
}
	
/* function to print the change asset html for front end */
	function get_change_asset_mail($form_data,$user_name,$admin_name){ 
	  $name = $user_name;
	  $admin_name = $admin_name;
	  $message = $form_data['message'];
	  $content = <<< EOD
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body style="margin:0; padding:0; background:#e1e1e1;">

<table width="700" border="0" align="center" cellpadding="0" cellspacing="0" style="border:2px solid #fff; background:#fff; margin-bottom:40px">
  <tr style="background:#438eb9;">
    <td width="436" height="80" style="padding-left:20px;"><img src="<?php echo Configure::read('WEBSITE').$this->webroot; ?>img/logo2.png" border="0"  /></td>
    <td width="269" align="right" style="padding-right:20px;"></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="490" valign="top"  style="padding:0 20px;"><h1 style="font:bold 15px Arial, Helvetica, sans-serif; color:#676767; margin:0 0 10px 0;">Dear {$admin_name},</h1>
          <p style="font:13px Arial, Helvetica, sans-serif; color:#676767; margin:0;">
		  You have received a change asset request from   {$name}. Please login to MyPDCA and update the change asset request details.</p><br />

          <p style="font:bold 13px Arial, Helvetica, sans-serif; color:#676767; margin:0;">Below are the new change asset request details,</p>
          <table width="100%" border="0" cellspacing="2" cellpadding="10" style="border:1px solid #ededed; font:bold 13px Arial, Helvetica, sans-serif; color:#6f6e6e; margin:10px 0 20px 0;">
          
             <tr style="background:#f5f4f4;">
			  		<td width="100">Message</td>
              	<td style="color:#2a2a2a;">{$message}</td>
            </tr>
          </table>
        
</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
 <tr>
    <td height="80" colspan="2" valign="top" bgcolor="#ededed" style="font:normal 12px Arial, Helvetica, sans-serif; color:#6f6e6e; padding:0 20px">
    <p >Note: This is system generated mail. Please do not reply to this email ID. if you have a query or need 
any clarification you may
email us.  <a href="mailto:finance@career-tree.in" style="color:#e56712;">hr@career-tree.in</a> 
</p>
    </td>
  </tr>
</table>
</body>
</html>

EOD;
	return $content;

	}	
	
/* function to print the ticket html for back end */
	function get_ticket_back_mail($form_data,$obj,$name){ 
	  $name = $name;
	  $priority = $this->ticket_priority($obj['priority']);
	  $status = $this->ticket_status_id($form_data['it_ticket_status_id']);
	  $content = <<< EOD
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body style="margin:0; padding:0; background:#e1e1e1;">

<table width="700" border="0" align="center" cellpadding="0" cellspacing="0" style="border:2px solid #fff; background:#fff; margin-bottom:40px">
  <tr style="background:#438eb9;">
    <td width="436" height="80" style="padding-left:20px;"><img src="<?php echo Configure::read('WEBSITE').$this->webroot; ?>img/logo2.png" border="0"  /></td>
    <td width="269" align="right" style="padding-right:20px;"></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="490" valign="top"  style="padding:0 20px;"><h1 style="font:bold 15px Arial, Helvetica, sans-serif; color:#676767; margin:0 0 10px 0;">Dear {$name},</h1>
          <p style="font:13px Arial, Helvetica, sans-serif; color:#676767; margin:0;">
          Your ticket has been updated. Please login to MyPDCA and check the ticket details.</p><br />

          <p style="font:bold 13px Arial, Helvetica, sans-serif; color:#676767; margin:0;">Below are the new updated ticket details,</p>
          <table width="100%" border="0" cellspacing="2" cellpadding="10" style="border:1px solid #ededed; font:bold 13px Arial, Helvetica, sans-serif; color:#6f6e6e; margin:10px 0 20px 0;">
          
             <tr style="background:#f5f4f4;">
			  		<td width="100">Employee Name</td>
              	<td style="color:#2a2a2a;">{$obj['full_name']}</td>
              	<td width="100">Type</td>
              	<td style="color:#2a2a2a;">{$obj['type']}</td>
            </tr>
            <tr style="background:#f5f4f4;">
			  		<td width="100">Subject</td>
              	<td style="color:#2a2a2a;">{$obj['subject']}</td>
              	<td width="100">Description</td>
              	<td style="color:#2a2a2a;">{$obj['description']}</td>
            </tr>
            <tr style="background:#f5f4f4;">
			  		<td width="100">Priority</td>
              	<td style="color:#2a2a2a;">{$priority}</td>
              	<td width="100">Status</td>
              	<td style="color:#2a2a2a;">{$status}</td>
            </tr>
          </table>
        
</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
 <tr>
    <td height="80" colspan="2" valign="top" bgcolor="#ededed" style="font:normal 12px Arial, Helvetica, sans-serif; color:#6f6e6e; padding:0 20px">
    <p >Note: This is system generated mail. Please do not reply to this email ID. if you have a query or need 
any clarification you may
email us.  <a href="mailto:finance@career-tree.in" style="color:#e56712;">hr@career-tree.in</a> 
</p>
    </td>
  </tr>
</table>
</body>
</html>

EOD;
	return $content;

	}

/* function to print the change asset info html for back end */
	function get_change_asset_back_mail($form_data,$rows,$name){ 
	  $name = $name;
	  $status = $this->dashboard_status($form_data['status']);
	  $type = $this->it_brand_type($rows['type']);
	  $content = <<< EOD
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body style="margin:0; padding:0; background:#e1e1e1;">

<table width="700" border="0" align="center" cellpadding="0" cellspacing="0" style="border:2px solid #fff; background:#fff; margin-bottom:40px">
  <tr style="background:#438eb9;">
    <td width="436" height="80" style="padding-left:20px;"><img src="<?php echo Configure::read('WEBSITE').$this->webroot; ?>img/logo2.png" border="0"  /></td>
    <td width="269" align="right" style="padding-right:20px;"></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="490" valign="top"  style="padding:0 20px;"><h1 style="font:bold 15px Arial, Helvetica, sans-serif; color:#676767; margin:0 0 10px 0;">Dear {$name},</h1>
          <p style="font:13px Arial, Helvetica, sans-serif; color:#676767; margin:0;">
		  Your change asset request has been updated. Please login to MyPDCA and check the updated details.</p><br />

          <p style="font:bold 13px Arial, Helvetica, sans-serif; color:#676767; margin:0;">Below are the new change asset request updated details,</p>
          <table width="100%" border="0" cellspacing="2" cellpadding="10" style="border:1px solid #ededed; font:bold 13px Arial, Helvetica, sans-serif; color:#6f6e6e; margin:10px 0 20px 0;">
          
             <tr style="background:#f5f4f4;">
             	<td width="100">Employee</td>
              	<td style="color:#2a2a2a;">{$rows['first_name']}</td>
              	<td width="100">Type</td>
              	<td style="color:#2a2a2a;">{$type}</td>
             </tr>
             <tr style="background:#f5f4f4;">
              	<td width="100">Message</td>
              	<td style="color:#2a2a2a;">{$rows['message']}</td>
			  		<td width="100">Status</td>
              	<td style="color:#2a2a2a;">{$status}</td>
             </tr>
          </table>
        
</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
 <tr>
    <td height="80" colspan="2" valign="top" bgcolor="#ededed" style="font:normal 12px Arial, Helvetica, sans-serif; color:#6f6e6e; padding:0 20px">
    <p >Note: This is system generated mail. Please do not reply to this email ID. if you have a query or need 
any clarification you may
email us.  <a href="mailto:finance@career-tree.in" style="color:#e56712;">hr@career-tree.in</a> 
</p>
    </td>
  </tr>
</table>
</body>
</html>

EOD;
	return $content;

	}		
}
$content = new mailContent();