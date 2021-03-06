<?php
/* Smarty version 3.1.29, created on 2017-08-22 14:44:51
  from "C:\xampp\htdocs\2017\jobfair_jobfac\jobfair\admin\templates\set_reminder.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_599bf60bb9dd23_99156436',
  'file_dependency' => 
  array (
    'b42c36fead0a929a2a6a656c424de90bf3f843ab' => 
    array (
      0 => 'C:\\xampp\\htdocs\\2017\\jobfair_jobfac\\jobfair\\admin\\templates\\set_reminder.tpl',
      1 => 1502517722,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_599bf60bb9dd23_99156436 ($_smarty_tpl) {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">	
<link href="css/default.css" rel="stylesheet" type="text/css">
<link href="css/orange.css" rel="stylesheet" type="text/css">
<link href="css/jquery-ui-timepicker-addon.css" rel="stylesheet" type="text/css">

<link href="http://fonts.googleapis.com/css?family=Cuprum" rel="stylesheet" type="text/css">
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
js/jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
js/jquery-ui-1.8.21.custom.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
js/jquery-ui-timepicker-addon.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
js/admin.js"><?php echo '</script'; ?>
>
</head>

<body style="min-height:85%">
<div id="content">			
<!-- Content wrapper -->
<div class="wrapper">	
<?php if ($_smarty_tpl->tpl_vars['ALERT_MSG']->value) {?>
   <div id="flashMessage" class="nNote nSuccess hideit dismiss"><?php echo $_smarty_tpl->tpl_vars['ALERT_MSG']->value;?>
</div>
   <?php }?>
<div id="container" class="content nNote" style="padding-bottom:0px">
  <div class="title"><h5>Set Reminder :: <?php echo ucwords($_GET['title']);?>
</h5></div>
   <!-- Form begins -->
	<form action="set_reminder.php?id=<?php echo $_GET['id'];?>
&title=<?php echo $_GET['title'];?>
&jobfair_date=<?php echo $_smarty_tpl->tpl_vars['url_date']->value;?>
" method="post" name="change" id="formID" class="mainForm" accept-charset="utf-8">
	<div style="display:none;"><input type="hidden" name="_method" value="POST"></div>            
	<fieldset>
		<div class="widget first">
        <div class="head"><h5 class="iList">Please fill the details below</h5><div class="num"><span><span class="mandatory">*</span> fields are mandatory</span></div></div>
			<?php
$_from = $_smarty_tpl->tpl_vars['data']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_item_0_saved_item = isset($_smarty_tpl->tpl_vars['item']) ? $_smarty_tpl->tpl_vars['item'] : false;
$__foreach_item_0_saved_key = isset($_smarty_tpl->tpl_vars['key']) ? $_smarty_tpl->tpl_vars['key'] : false;
$_smarty_tpl->tpl_vars['item'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['item']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
$__foreach_item_0_saved_local_item = $_smarty_tpl->tpl_vars['item'];
?>
				
				<!-- check for reminder date is not empty -->
				<?php if ($_smarty_tpl->tpl_vars['item']->value['reminder_date_check']) {?>
					<!-- compare reminder date with current date -->
					<?php if (strtotime($_smarty_tpl->tpl_vars['item']->value['reminder_date_check']) > strtotime($_smarty_tpl->tpl_vars['check_date']->value)) {?>
						<?php $_smarty_tpl->tpl_vars["disable"] = new Smarty_Variable('', null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "disable", 0);?>
					<?php } else { ?>
						<?php $_smarty_tpl->tpl_vars["disable"] = new Smarty_Variable("readonly", null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "disable", 0);?>
					<?php }?>
				<?php }?>
				<!-- for retaining date values -->
				<?php if ($_smarty_tpl->tpl_vars['disable']->value == '' && $_POST['jobfair_date'] != '') {?>
					<?php $_smarty_tpl->tpl_vars["reminder_value"] = new Smarty_Variable($_POST['reminder'][$_smarty_tpl->tpl_vars['key']->value], null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "reminder_value", 0);?>
				<?php } else { ?> 
					<?php $_smarty_tpl->tpl_vars["reminder_value"] = new Smarty_Variable($_smarty_tpl->tpl_vars['item']->value['reminder_date'], null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "reminder_value", 0);?>
				<?php }?>
				<!-- for retaining type values -->
				<?php if ($_smarty_tpl->tpl_vars['disable']->value == '' && $_POST['jobfair_date'] != '') {?>
					<?php $_smarty_tpl->tpl_vars["reminder_type"] = new Smarty_Variable($_POST['type'][$_smarty_tpl->tpl_vars['key']->value], null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "reminder_type", 0);?>
				<?php } else { ?>
					<?php $_smarty_tpl->tpl_vars["reminder_type"] = new Smarty_Variable($_smarty_tpl->tpl_vars['item']->value['type'], null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "reminder_type", 0);?>
				<?php }?>
				
				<div class="floatleft twoOne">
					<input type="hidden" name="reminder_id_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
					
                 <div class="rowElem noborder pb0"><label class="topLabel"> Reminder  <span class="mandatory"> *</span></label><div class="formBottom">            
               <input type="text" name="reminder[]" <?php echo $_smarty_tpl->tpl_vars['disable']->value;?>
 value="<?php echo $_smarty_tpl->tpl_vars['reminder_value']->value;?>
" maxlength="45" tabindex="5" class="datepicRemind" id="reminder_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"> </div>
                <span class="error-message"><?php echo $_smarty_tpl->tpl_vars['reminderErr']->value;?>
</span><div class="fix"></div></div>
                 <div class="rowElem noborder pb0">
					  <div class="formBottom"> 
						 <input type="radio" <?php echo $_smarty_tpl->tpl_vars['disable']->value;?>
 name="type[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
]" <?php if ($_smarty_tpl->tpl_vars['reminder_type']->value == 'M') {
echo 'checked';
}?> value="M" maxlength="30" tabindex="5" class="" id=""> Email
						 <input type="radio" <?php echo $_smarty_tpl->tpl_vars['disable']->value;?>
 name="type[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
]" <?php if ($_smarty_tpl->tpl_vars['reminder_type']->value == 'S') {
echo 'checked';
}?> value="S" maxlength="30" tabindex="5" class="" id=""> SMS
						 <input type="radio" <?php echo $_smarty_tpl->tpl_vars['disable']->value;?>
 name="type[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
]" <?php if ($_smarty_tpl->tpl_vars['reminder_type']->value == 'B') {
echo 'checked';
}?> value="B" maxlength="30" tabindex="5" class="" id=""> Both
					  </div><div class="fix"></div>
					  <span class="error-message"><?php echo $_smarty_tpl->tpl_vars['error_type']->value[$_smarty_tpl->tpl_vars['key']->value];?>
</span>		
					 </div>
            </div>
		    <?php
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_0_saved_local_item;
}
if ($__foreach_item_0_saved_item) {
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_0_saved_item;
}
if ($__foreach_item_0_saved_key) {
$_smarty_tpl->tpl_vars['key'] = $__foreach_item_0_saved_key;
}
?>
			<input type="hidden" name="jobfair_date" id="jobfair_date" value="<?php echo $_smarty_tpl->tpl_vars['rem_date']->value;?>
">
			<input type="hidden" name="created_date" id="created_date" value="<?php echo $_smarty_tpl->tpl_vars['todayDate']->value;?>
">
			 <input type="hidden" name="reminder_count" value="<?php echo $_smarty_tpl->tpl_vars['reminderCount']->value;?>
" id="">		
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

<?php echo '<script'; ?>
 type="text/javascript">
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
<?php echo '</script'; ?>
>

</body></html><?php }
}
