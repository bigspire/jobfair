<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">	
<link href="css/default.css" rel="stylesheet" type="text/css">
<link href="css/orange.css" rel="stylesheet" type="text/css">
<link href="css/jquery-ui-timepicker-addon.css" rel="stylesheet" type="text/css">

<link href="http://fonts.googleapis.com/css?family=Cuprum" rel="stylesheet" type="text/css">
<script type="text/javascript" src="{$url}js/jquery.min.js"></script>
<script type="text/javascript" src="{$url}js/jquery-ui-1.8.21.custom.min.js"></script>
<script type="text/javascript" src="{$url}js/jquery-ui-timepicker-addon.js"></script>

<script type="text/javascript" src="{$url}js/admin.js"></script>
</head>

<body style="min-height:85%">
<div id="content">			
<!-- Content wrapper -->
<div class="wrapper">	
{if $ALERT_MSG}
   <div id="flashMessage" class="nNote nSuccess hideit dismiss">{$ALERT_MSG}</div>
   {/if}
<div id="container" class="content nNote" style="padding-bottom:0px">
  <div class="title"><h5>Set Reminder :: {ucwords($smarty.get.title)}</h5></div>
   <!-- Form begins -->
	<form action="set_reminder.php?id={$smarty.get.id}&title={$smarty.get.title}&jobfair_date={$url_date}" method="post" name="change" id="formID" class="mainForm" accept-charset="utf-8">
	<div style="display:none;"><input type="hidden" name="_method" value="POST"></div>            
	<fieldset>
		<div class="widget first">
        <div class="head"><h5 class="iList">Please fill the details below</h5><div class="num"><span><span class="mandatory">*</span> fields are mandatory</span></div></div>
			{foreach from=$data item=item key=key}
				
				<!-- check for reminder date is not empty -->
				{if $item.reminder_date_check}
					<!-- compare reminder date with current date -->
					{if $item.reminder_date_check|strtotime gt $check_date|strtotime}
						{assign var="disable" value=""}
					{else}
						{assign var="disable" value="readonly"}
					{/if}
				{/if}
				<!-- for retaining date values -->
				{if $disable eq '' && $smarty.post.jobfair_date neq ''}
					{assign var="reminder_value" value=$smarty.post['reminder'][$key]}
				{else} 
					{assign var="reminder_value" value=$item.reminder_date}
				{/if}
				<!-- for retaining type values -->
				{if $disable eq '' && $smarty.post.jobfair_date neq ''}
					{assign var="reminder_type" value=$smarty.post['type'][$key]}
				{else}
					{assign var="reminder_type" value=$item.type}
				{/if}
				
				<div class="floatleft twoOne">
					<input type="hidden" name="reminder_id_{$key}" value="{$item.id}">
					
                 <div class="rowElem noborder pb0"><label class="topLabel"> Reminder  <span class="mandatory"> *</span></label><div class="formBottom">            
               <input type="text" name="reminder[]" {$disable} value="{$reminder_value}" maxlength="45" tabindex="5" class="datepicRemind" id="reminder_{$key}"> </div>
                <span class="error-message">{$reminderErr}</span><div class="fix"></div></div>
                 <div class="rowElem noborder pb0">
					  <div class="formBottom"> 
						 <input type="radio" {$disable} name="type[{$key}]" {if $reminder_type == 'M'}{'checked'}{/if} value="M" maxlength="30" tabindex="5" class="" id=""> Email
						 <input type="radio" {$disable} name="type[{$key}]" {if $reminder_type == 'S'}{'checked'}{/if} value="S" maxlength="30" tabindex="5" class="" id=""> SMS
						 <input type="radio" {$disable} name="type[{$key}]" {if $reminder_type == 'B'}{'checked'}{/if} value="B" maxlength="30" tabindex="5" class="" id=""> Both
					  </div><div class="fix"></div>
					  <span class="error-message">{$error_type[$key]}</span>		
					 </div>
            </div>
		    {/foreach}
			<input type="hidden" name="jobfair_date" id="jobfair_date" value="{$rem_date}">
			<input type="hidden" name="created_date" id="created_date" value="{$todayDate}">
			 <input type="hidden" name="reminder_count" value="{$reminderCount}" id="">		
			<div class="fix"></div>
              <a href="javascript:close_fancy();"><input type="button" class="jsRedirect greyishBtn submitForm" val="javascript:close_fancy();" value="Cancel"></a>
					<input type="submit" class="greyishBtn submitForm" value="Submit">
					<div class="fix"></div>
       </div>
		</fieldset>		   
     	
	 </form>    
    </div>
</div>		
</div>
{literal}
<script type="text/javascript">
$(function(){
	
	$( ".datepicRemind" ).datetimepicker({
			changeMonth: true,
			timeFormat: "HH:mm",
			changeYear: true,
			dateFormat: "dd/mm/yy",
			maxDate:$('#jobfair_date').val(),
			minDate:$('#created_date').val()
		});
	});
</script>
{/literal}
</body></html>