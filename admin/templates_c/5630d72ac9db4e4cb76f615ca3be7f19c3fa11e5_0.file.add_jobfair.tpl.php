<?php
/* Smarty version 3.1.29, created on 2017-08-19 13:14:10
  from "C:\xampp\htdocs\2017\jobfair_jobfac\jobfair\admin\templates\add_jobfair.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5997ec4aaacf62_39323064',
  'file_dependency' => 
  array (
    '5630d72ac9db4e4cb76f615ca3be7f19c3fa11e5' => 
    array (
      0 => 'C:\\xampp\\htdocs\\2017\\jobfair_jobfac\\jobfair\\admin\\templates\\add_jobfair.tpl',
      1 => 1502517722,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:include/header.tpl' => 1,
    'file:include/menu.tpl' => 1,
    'file:include/footer.tpl' => 1,
  ),
),false)) {
function content_5997ec4aaacf62_39323064 ($_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once 'C:\\xampp\\htdocs\\2017\\jobfair_jobfac\\jobfair\\admin\\vendor\\smarty-3.1.29\\libs\\plugins\\function.html_options.php';
?>
	
   
   
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:include/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:include/menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<!-- Content wrapper -->
<div class="wrapper">
<div id="container" class="content nNote">
<?php if ($_smarty_tpl->tpl_vars['EXIST_MSG']->value) {?>
   <div id="flashMessage" class="nNote nFailure hideit dismiss"><?php echo $_smarty_tpl->tpl_vars['EXIST_MSG']->value;?>
</div>
   <?php }?>
   <div class="title"><h5>Add Job Fair</h5>
   
   
   </div>
   
   <div class="breadCrumb module">
                    <ul>
                        <li class="firstB"><a href="">Dashboard</a> </li>
                        <li><a href="jobfair.php">Job Fair</a></li>                                           
                        <li>Add Job Fair</li>
                    </ul>					
	</div>
				
				<div class="fix"></div>
   <!-- Form begins -->
	<form action="add_jobfair.php" method="post" name="company" id="formID" class="mainForm" enctype="multipart/form-data" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"></div> 
		<fieldset>
			<div class="widget first m0">
             <div class="head"><h5 class="iList">Job Fair Info</h5><div class="num"><span><span class="mandatory">*</span> fields are mandatory</span></div></div>
					<div class="floatleft threeOne">
					
					 	<div class="rowElem noborder pb0">
					 		<label class="topLabel"> Title <span class="mandatory">*</span></label>
					 		<div class="formBottom">
								<input name="title"  value="<?php echo $_smarty_tpl->tpl_vars['title']->value;?>
" type="text" maxlength="45" tabindex="1"  class="" id="req1">			 
								<span class="error-message"><?php echo $_smarty_tpl->tpl_vars['titleErr']->value;?>
</span>
							</div><div class="fix"></div>
						</div>
					
						<div class="rowElem noborder pb0">
							<label class="topLabel">Partner With </label>
							<div class="formBottom">
				 				<input type="text" name="partner" value="<?php echo $_POST['partner'];?>
" tabindex="4" class="validate[required]" id="req1"> 
							</div><div class="fix"></div>
						</div>
					
					  <div class="rowElem noborder pb0">
					  		<label class="topLabel">Venue<span class="mandatory"> *</span></label>
					  		<div class="formBottom"> 
					 			<textarea name="venue" tabindex="7" class="validate[required]" id="req1" cols="4" rows="4"><?php echo $_smarty_tpl->tpl_vars['venue']->value;?>
</textarea> 
				 				<span class="error-message"><?php echo $_smarty_tpl->tpl_vars['venueErr']->value;?>
</span>
							</div><div class="fix"></div>
					  </div>
					 
					 <div class="rowElem noborder pb0">
					 		<label class="topLabel">Others <span class="mandatory"> *</span></label>
					 		<div class="formBottom"> 
								<textarea name="other" tabindex="10" class="validate[required]" id="req1" cols="4" rows="4"><?php echo $_smarty_tpl->tpl_vars['other']->value;?>
</textarea> 
				 				<span class="error-message"><?php echo $_smarty_tpl->tpl_vars['otherErr']->value;?>
</span>
							</div><div class="fix"></div>
					 </div>
					
				</div>					
					   
			   <div class="floatleft threeOne">
                <div class="rowElem noborder pb0">
                	<label class="topLabel"> Date <span class="mandatory">*</span></label>
                	<div class="formBottom">
							<input name="jobfair_date" value="<?php echo $_smarty_tpl->tpl_vars['jobfair_date']->value;?>
" tabindex="2" type="text" maxlength="45"  class="datepic">			 
							<span class="error-message"><?php echo $_smarty_tpl->tpl_vars['jobfair_dateErr']->value;?>
</span>
					 	</div><div class="fix"></div>
					 </div>

					 <div class="rowElem noborder pb0">
						 <label class="topLabel">Partner Logo  </label>
					 	 <div class="formBottom">
							<input name="logo" type="file" tabindex="5" class="upload" id="logo"><br>
							<span class="error-message"><?php echo $_smarty_tpl->tpl_vars['attachmentuploadErr']->value;?>
</span>
						 </div><div class="fix"></div>
					 </div>
					 
					 <div class="rowElem noborder pb0">
					  <label class="topLabel">Description <span class="mandatory">*</span> </label>
					  <div class="formBottom">
						<textarea name="description" tabindex="8" class="validate[required]" id="req1" cols="4" rows="4"><?php echo $_smarty_tpl->tpl_vars['description']->value;?>
</textarea>  <br>
						<span class="error-message"><?php echo $_smarty_tpl->tpl_vars['descriptionErr']->value;?>
</span>
					  </div><div class="fix"></div>
					</div>
					
					 <div class="rowElem noborder pb0">
					 <label class="topLabel">Status <span class="mandatory">*</span></label>
					 <div class="formBottom">						
							<select name="status" style="width:300px" tabindex="11">
					<?php if (isset($_smarty_tpl->tpl_vars['status']->value)) {?>
							<?php echo smarty_function_html_options(array('style'=>"width:300px",'options'=>$_smarty_tpl->tpl_vars['type']->value,'selected'=>$_smarty_tpl->tpl_vars['status']->value),$_smarty_tpl);?>
			
					<?php }?>
					</select> 	
						<br>
						<span class="error-message"><?php echo $_smarty_tpl->tpl_vars['statusErr']->value;?>
</span>
					 </div><div class="fix"></div>
					 </div>
                   
				</div>
					
				<div class="floatleft threeOne">
                <div class="rowElem noborder pb0"><label class="topLabel">Location <span class="mandatory"> * </span></label>
                <div class="formBottom">
							<input name="location" value="<?php echo $_smarty_tpl->tpl_vars['location']->value;?>
" type="text" tabindex="3" class="validate[required]" id="req1"> 
							<span class="error-message"><?php echo $_smarty_tpl->tpl_vars['locationErr']->value;?>
</span>
					 </div><div class="fix"></div>
					 </div>
					
					<div class="rowElem noborder pb0">
					<label class="topLabel">State <span class="mandatory"> * </span></label>
					<div class="formBottom">
						<select style="width:300px" name="state" class="validate[required]" id="state" tabindex="6">
							<option value="">Choose any one</option>
							<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['state']->value,'selected'=>$_POST['state']),$_smarty_tpl);?>

						</select><br>
						<span class="error-message"><?php echo $_smarty_tpl->tpl_vars['stateErr']->value;?>
</span>
					</div><div class="fix"></div>
					</div>
					
						
					 <div class="rowElem noborder pb0">
					 <label class="topLabel">Eligibility Criteria<span class="mandatory"> *</span></label>
					 <div class="formBottom"> 
					  	<textarea name="eligibility" tabindex="9" class="validate[required]" id="req1" cols="4" rows="4"><?php echo $_smarty_tpl->tpl_vars['eligibility']->value;?>
</textarea> 
				 	  	<span class="error-message"><?php echo $_smarty_tpl->tpl_vars['eligibilityErr']->value;?>
</span>
 					 </div><div class="fix"></div>
					 </div>
				</div>
				 <div class="fix"></div>
         </div>
				
				<div class="widget first">
                    <div class="head"><h5 class="iList">Partner Contact Details</h5><div class="num"><span><span class="mandatory">*</span> fields are mandatory</span></div></div>
					 <div class="floatleft threeOne">
                   <div class="rowElem noborder pb0"><label class="topLabel">Contact Person</label>
                   <div class="formBottom">
					 		<input name="contact_person" value="<?php echo $_POST['contact_person'];?>
" type="text" tabindex="12" class="validate[required]" id="req1" maxlength="45"> 
 						 </div><div class="fix"></div>
 						 </div>
					 </div>
					 
					<div class="floatleft threeOne">
                  <div class="rowElem noborder pb0"><label class="topLabel">Email Address</label>
                  <div class="formBottom">
					 		<input name="email" value="<?php echo $_POST['email'];?>
" type="text" tabindex="13" class="validate[required]" id="req1"> 
							<span class="error-message"><?php echo $_smarty_tpl->tpl_vars['emailErr']->value;?>
</span>
						</div><div class="fix"></div></div>
					</div>
				
					 <div class="floatleft threeOne">
                   <div class="rowElem noborder pb0">
                   <label class="topLabel">Contact No.</label>
                   <div class="formBottom">
						 <input name="cont_no" value="<?php echo $_POST['cont_no'];?>
" type="text" tabindex="14" class="validate[required]" id="req1" maxlength="45">
						 <span class="error-message"><?php echo $_smarty_tpl->tpl_vars['cont_noErr']->value;?>
</span>
						 </div><div class="fix"></div></div>
					 </div>
				
					<div class="m10">
					<a href="jobfair.php"><input type="button" class="jsRedirect greyishBtn submitForm" val="jobfair.php" value="Cancel"></a>
						<input type="submit" class="greyishBtn submitForm" value="Submit">
                   <div class="fix"></div>
 					</div>
           </div>
           
		   </fieldset>
		   <input type="hidden" name="data[Company][created_date]" value="2016-11-08 17:12:52" id="CompanyCreatedDate"><input type="hidden" name="data[Company][created_by]" value="5" id="CompanyCreatedBy">				
     </form>    
    </div>
  </div>			
</div>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:include/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
