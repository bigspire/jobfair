<?php
/* Smarty version 3.1.29, created on 2017-08-21 16:59:40
  from "F:\xampp\htdocs\jobfair_svn\jobfair\admin\templates\add_client_req.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_599ac424c6da53_67047556',
  'file_dependency' => 
  array (
    '1c54fc3861d91b9feec5396dafb711748c96c773' => 
    array (
      0 => 'F:\\xampp\\htdocs\\jobfair_svn\\jobfair\\admin\\templates\\add_client_req.tpl',
      1 => 1481780028,
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
function content_599ac424c6da53_67047556 ($_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once 'F:\\xampp\\htdocs\\jobfair_svn\\jobfair\\admin\\vendor\\smarty-3.1.29\\libs\\plugins\\function.html_options.php';
?>
	
   
   
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:include/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:include/menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<!-- Content wrapper -->
<div class="wrapper">
<div id="container" class="content nNote">
    	<div class="title"><h5>Add Client Req.</h5></div>

        <!-- Form begins -->
	<form action="add_client_req.php" method="post" name="company" id="formID" class="mainForm" enctype="multipart/form-data" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"></div> 
			<fieldset>
			 <div class="breadCrumb module">
                    <ul>
                        <li class="firstB"><a href="">Dashboard</a> </li>
                        <li><a href="client_req.php">Client Req</a></li>                                           
                        <li>Add Client Req</li>
                    </ul>					
	       </div>
			<div class="widget first">
          <div class="head"><h5 class="iList">Client Requirement Info</h5><div class="num"><span><span class="mandatory">*</span> fields are mandatory</span></div></div>
				<div class="floatleft threeOne">
                    <div class="rowElem noborder pb0"><label class="topLabel">Company Name <span class="mandatory">*</span></label><div class="formBottom">
				<input name="company_name" value="<?php echo $_smarty_tpl->tpl_vars['company_name']->value;?>
" type="text" maxlength="45" tabindex="1" class="validate[required]" id="req1">			 
	<span class="error-message"><?php echo $_smarty_tpl->tpl_vars['company_nameErr']->value;?>
</span>
					
					</div><div class="fix"></div></div>
                    
					 <div class="rowElem noborder pb0"><label class="topLabel">Qualification <span class="mandatory">*</span></label><div class="formBottom">
				 <input type="text" name="qualification" value="<?php echo $_smarty_tpl->tpl_vars['qualification']->value;?>
" tabindex="4" class="validate[required]" id="req1"> 
				 	<span class="error-message"><?php echo $_smarty_tpl->tpl_vars['qualificationErr']->value;?>
</span>
				</div><div class="fix"></div></div>
					
				<div class="rowElem noborder pb0"><label class="topLabel">Email Address<span class="mandatory"> *</span></label><div class="formBottom"> 
				<input name="email" value="<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
" type="text" maxlength="45" tabindex="7" class="validate[required]" id="req1">
					<span class="error-message"><?php echo $_smarty_tpl->tpl_vars['emailErr']->value;?>
</span>
				</div><div class="fix"></div>
				</div>
				
				<div class="rowElem noborder pb0"><label class="topLabel">Salary Details<span class="mandatory"> *</span></label><div class="formBottom"> 
				<input name="salary" value="<?php echo $_smarty_tpl->tpl_vars['salary']->value;?>
" type="text" maxlength="45" tabindex="10" class="validate[required]" id="req1">
					<span class="error-message"><?php echo $_smarty_tpl->tpl_vars['salaryErr']->value;?>
</span>
				</div><div class="fix"></div>
				</div>
				
				 <div class="rowElem noborder pb0">
						 <label class="topLabel">Company Logo  </label>
					 	 <div class="formBottom">
							<input name="client_logo" type="file" tabindex="5" class="upload" id="client_logo"><br>
							<span class="error-message"><?php echo $_smarty_tpl->tpl_vars['attachmentuploadErr']->value;?>
</span>
						 </div><div class="fix"></div>
					 </div>
					
					</div>					
					   <div class="floatleft threeOne">
                    <div class="rowElem noborder pb0"><label class="topLabel">Position<span class="mandatory">*</span> </label><div class="formBottom">
					
				  <input name="position" value="<?php echo $_smarty_tpl->tpl_vars['position']->value;?>
" type="text" maxlength="45" tabindex="2" class="validate[required]" id="req1"> <br>
						<span class="error-message"><?php echo $_smarty_tpl->tpl_vars['positionErr']->value;?>
</span>

					</div><div class="fix"></div></div>
                   
					
					 <div class="rowElem noborder pb0"><label class="topLabel">Work Location<span class="mandatory"> *</span></label><div class="formBottom"> 
					 
				 <input name="work_loc" value="<?php echo $_smarty_tpl->tpl_vars['work_loc']->value;?>
" type="text" maxlength="45" tabindex="5" class="validate[required]" id="req1">

				
				 	<span class="error-message"><?php echo $_smarty_tpl->tpl_vars['work_locErr']->value;?>
</span>

					</div><div class="fix"></div>
					</div>
					
					
				
					 <div class="rowElem noborder pb0"><label class="topLabel">No. of Vacancy <span class="mandatory"> * </span></label><div class="formBottom">
					
				 <input name="no_vacancy" value="<?php echo $_smarty_tpl->tpl_vars['no_vacancy']->value;?>
" type="text" tabindex="8" class="validate[required]" id="req1"> 
						<span class="error-message"><?php echo $_smarty_tpl->tpl_vars['no_vacancyErr']->value;?>
</span>

					</div><div class="fix"></div></div>
					
					<div class="rowElem noborder pb0"><label class="topLabel">Venue Details<span class="mandatory">*</span> </label><div class="formBottom">
					
				  <textarea name="venue" tabindex="11" class="validate[required]" id="req1" cols="4" rows="4"><?php echo $_smarty_tpl->tpl_vars['venue']->value;?>
</textarea> <br>
						<span class="error-message"><?php echo $_smarty_tpl->tpl_vars['venueErr']->value;?>
</span>

					</div><div class="fix"></div></div>
					
					 </div>
					
					<div class="floatleft threeOne">
                    <div class="rowElem noborder pb0"><label class="topLabel">Drive Date <span class="mandatory"> * </span></label><div class="formBottom">
					
				 <input name="drive_date" value="<?php echo $_smarty_tpl->tpl_vars['drive_date']->value;?>
" type="text" tabindex="3" class="datepic" id=""> 
						<span class="error-message"><?php echo $_smarty_tpl->tpl_vars['drive_dateErr']->value;?>
</span>

					</div><div class="fix"></div></div>
					 

 <div class="rowElem noborder pb0"><label class="topLabel">Contact No. <span class="mandatory"> *</span></label><div class="formBottom"> 
					 
				 <input name="contact_no" value="<?php echo $_smarty_tpl->tpl_vars['contact_no']->value;?>
" type="text" maxlength="45" tabindex="6" class="validate[required]" id="req1">
<span class="error-message"><?php echo $_smarty_tpl->tpl_vars['contact_noErr']->value;?>
</span>
</div><div class="fix"></div>
</div>

<div class="rowElem noborder pb0"><label class="topLabel">Status <span class="mandatory">*</span></label><div class="formBottom">
<select name="status" style="width:335px" tabindex="9" >
					<?php if (isset($_smarty_tpl->tpl_vars['status']->value)) {?>
							<?php echo smarty_function_html_options(array('style'=>"width:300px",'options'=>$_smarty_tpl->tpl_vars['type']->value,'selected'=>$_smarty_tpl->tpl_vars['status']->value),$_smarty_tpl);?>
			
					<?php }?>
					</select><br>
	<span class="error-message"><?php echo $_smarty_tpl->tpl_vars['statusErr']->value;?>
</span>
					
					</div><div class="fix"></div></div>
					
					<div class="rowElem noborder pb0"><label class="topLabel">About Company <span class="mandatory"> * </span></label><div class="formBottom">
					
				 <textarea name="about_company" tabindex="12" class="validate[required]" id="req1" cols="4" rows="4"><?php echo $_smarty_tpl->tpl_vars['about_company']->value;?>
</textarea> 
						<span class="error-message"><?php echo $_smarty_tpl->tpl_vars['about_companyErr']->value;?>
</span>
					</div><div class="fix"></div></div>
					
                  
					 
                    </div>
					
                 
                    <div class="fix"></div>
                </div>
             
			<div class="widget first">
                    <div class="head"><h5 class="iList">Pop-up Details</h5><div class="num"><span><span class="mandatory">*</span> fields are mandatory</span></div></div>
					
                    <div class="floatleft threeOne">
                   
                    <div class="rowElem noborder pb0"><label class="topLabel">Start Date<span class="mandatory">*</span></label><div class="formBottom">
					 <input name="start_date" value="<?php echo $_smarty_tpl->tpl_vars['start_date']->value;?>
" type="text" tabindex="13" class="datepic" > 
				<span class="error-message"><?php echo $_smarty_tpl->tpl_vars['start_dateErr']->value;?>
</span>

				</div><div class="fix"></div></div>
				</div>
					
					   <div class="floatleft threeOne">
                   
                  	<div class="rowElem noborder pb0"><label class="topLabel">End Date<span class="mandatory"> *</span></label><div class="formBottom">
					 <input name="end_date" value="<?php echo $_smarty_tpl->tpl_vars['end_date']->value;?>
" type="text" tabindex="14" class="datepic"  maxlength="45"> 
				<span class="error-message"><?php echo $_smarty_tpl->tpl_vars['end_dateErr']->value;?>
</span>
 												
												
												</div><div class="fix"></div></div>
					 
					
				
					 
					 
                    </div>
					
						   <div class="floatleft threeOne">
                   
                  <br><br><br>
					 
					
                </div>
				
				 
				
					  <div class="m10">
				<a href="client_req.php"><input type="button" class="jsRedirect greyishBtn submitForm" val="client_req.php" value="Cancel"></a>
						<input type="submit" class="greyishBtn submitForm" value="Submit">
                        <div class="fix"></div>
 				</div>
           </div></fieldset>
		   	
<input type="hidden" name="data[Company][created_date]" value="2016-11-08 17:12:52" id="CompanyCreatedDate"><input type="hidden" name="data[Company][created_by]" value="5" id="CompanyCreatedBy">				
       </form>    </div>
</div>	
		
		
		</div>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:include/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
