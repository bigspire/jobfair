<?php
/* Smarty version 3.1.29, created on 2017-08-17 18:28:46
  from "F:\xampp\htdocs\jobfair_svn\jobfair\admin\templates\add_jobfair_photos.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_599593064dacd9_74474518',
  'file_dependency' => 
  array (
    'f27c7f8c68ded4643ecb7d38976a564abaef8b43' => 
    array (
      0 => 'F:\\xampp\\htdocs\\jobfair_svn\\jobfair\\admin\\templates\\add_jobfair_photos.tpl',
      1 => 1485247626,
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
function content_599593064dacd9_74474518 ($_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once 'F:\\xampp\\htdocs\\jobfair_svn\\jobfair\\admin\\vendor\\smarty-3.1.29\\libs\\plugins\\function.html_options.php';
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
  
  <div class="title"><h5>Add Job Fair Photos</h5></div>
   	
	   <div class="fix"></div>
        <!-- Form begins -->
	<form action="add_jobfair_photos.php" method="post" name="company" id="formID" class="mainForm" enctype="multipart/form-data" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"></div> 
		<fieldset>
		<div class="breadCrumb module">
                    <ul>
                        <li class="firstB"><a href="">Dashboard</a> </li>
                        <li><a href="jobfair_photos.php">Job Fair Photos</a></li>                                           
                        <li>Add Job Fair Photos</li>
                    </ul>					
	   </div>
			<div class="widget first">
                    <div class="head"><h5 class="iList">Add Job Fair Photos	
				

</h5><div class="num"><span><span class="mandatory">*</span> fields are mandatory</span></div></div>
					
               <div class="floatleft threeOne">
                    <div class="rowElem noborder pb0"><label class="topLabel">Job Fair Title <span class="mandatory">*</span></label><div class="formBottom">
							<select style="width:300px" name="jobfair_id" tabindex="1">
							<option value="">Choose any one</option>
							<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['jobfair']->value,'selected'=>$_smarty_tpl->tpl_vars['jobfair_id']->value),$_smarty_tpl);?>
					
							</select> <br>
							<span class="error-message"><?php echo $_smarty_tpl->tpl_vars['jobfair_idErr']->value;?>
</span>
					      </div><div class="fix"></div>
					     </div>

               </div>					
					
					<div class="floatleft threeOne">
                <div class="rowElem noborder pb0"><label class="topLabel">Job Fair Photos <span class="mandatory">*</span> </label><div class="formBottom">
					 <input name="photo" value="<?php echo $_POST['photo'];?>
" type="file" tabindex="3" class="validate[required]" id="logo">
					  <br>
						<span class="error-message"><?php echo $_smarty_tpl->tpl_vars['photoErr']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['attachmentuploadErr']->value;?>
</span>
					</div><div class="fix"></div></div>
					 </div>
					 
					<div class="floatleft threeOne">				   
                    	
					<div class="rowElem noborder pb0"><label class="topLabel">Status <span class="mandatory">*</span></label><div class="formBottom">
					<select name="status" style="width:300px" tabindex="5">
					<?php if (isset($_smarty_tpl->tpl_vars['status']->value)) {?>
							<?php echo smarty_function_html_options(array('style'=>"width:300px",'options'=>$_smarty_tpl->tpl_vars['type']->value,'selected'=>$_smarty_tpl->tpl_vars['status']->value),$_smarty_tpl);?>
			
					<?php }?>
					</select>  <br>
					<span class="error-message"><?php echo $_smarty_tpl->tpl_vars['statusErr']->value;?>
</span>
					</div><div class="fix"></div>
					</div>         
               
               </div>
					
					
					<br><br><br><br><br><br>
					
					<div class="m10">
				    <a href="jobfair_photos.php"><input type="button" class="jsRedirect greyishBtn submitForm" val="jobfair_photos.php" value="Cancel"></a>
						<input type="submit" class="greyishBtn submitForm" value="Submit">
                        <div class="fix"></div>
 				   </div>
		
               <div class="fix"></div>
                </div>
                </fieldset>
<input type="hidden" name="data[Company][created_date]" value="2016-11-08 17:12:52" id="CompanyCreatedDate">
<input type="hidden" name="data[Company][created_by]" value="5" id="CompanyCreatedBy">				
       </form>    </div>
</div>	
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:include/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
