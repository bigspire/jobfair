<?php
/* Smarty version 3.1.29, created on 2017-08-17 18:21:57
  from "F:\xampp\htdocs\jobfair_svn\jobfair\admin\templates\edit_client_photos.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5995916daa7c76_28575460',
  'file_dependency' => 
  array (
    '097686d8c234154a720dd2bbae81b885638504e8' => 
    array (
      0 => 'F:\\xampp\\htdocs\\jobfair_svn\\jobfair\\admin\\templates\\edit_client_photos.tpl',
      1 => 1502973476,
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
function content_5995916daa7c76_28575460 ($_smarty_tpl) {
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
<?php }
if ($_smarty_tpl->tpl_vars['success_msg']->value) {?>
   <div id="flashMessage" class="nNote nFailure hideit dismiss"><?php echo $_smarty_tpl->tpl_vars['success_msg']->value;?>
</div>
   
<?php }?>

    	<div class="title"><h5>Edit Client Req. Photos</h5></div>
   	 
        <!-- Form begins -->
	<form action="edit_client_photos.php?get_client_id=<?php echo $_smarty_tpl->tpl_vars['get_client_id']->value;?>
" method="post" name="company" id="formID" class="mainForm" enctype="multipart/form-data" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"></div> 
		<fieldset>
		<div class="breadCrumb module">
                    <ul>
                        <li class="firstB"><a href="">Dashboard</a> </li>
                        <li><a href="client_photos.php">Client Req. Photos</a></li>                                           
                        <li>Edit Client Req. Photos</li>
                    </ul>					
	    </div>
			<div class="widget first">
                    <div class="head"><h5 class="iList">Edit Client Req. Photos	
					

</h5><div class="num"><span><span class="mandatory">*</span> fields are mandatory</span></div></div>
					
               <div class="floatleft threeOne">
                    <div class="rowElem noborder pb0"><label class="topLabel">Client Req. Title <span class="mandatory">*</span></label><div class="formBottom">
							<select style="width:300px" name="client_id" tabindex="1">
							<option value="">Choose any one</option>
							<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['client']->value,'selected'=>$_smarty_tpl->tpl_vars['client_id']->value),$_smarty_tpl);?>
					
							</select> <br>
							<span class="error-message"><?php echo $_smarty_tpl->tpl_vars['client_idErr']->value;?>
</span>
					      </div><div class="fix"></div>
					     </div>
               </div>					
					
					<div class="floatleft_view_odd">
						<div class="">
						<div class="formRight_view" style="width:100%">
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
						<?php if ($_smarty_tpl->tpl_vars['item']->value['photo']) {?>
						<div align="center" style="border:2px dotted #e0e0e0; width:180px;float:left;padding:10px;margin:5px;">
						<img src="timthumb.php?src=admin/uploads/req_photo/<?php echo $_smarty_tpl->tpl_vars['item']->value['photo'];?>
&w=160&q=100">
						
						<br> <a id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
|<?php echo $_smarty_tpl->tpl_vars['item']->value['req_id'];?>
" value="javascript:void(0)" class="bConfirmPhotos1" href="javascript:void(0)">Remove</a>
						<input type="hidden" id="remove" value="remove_client_photos.php">
						
					
						</div>
						<?php }?>
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
						</div>
						</div>
					</div>
					 
					<div class="floatleft threeOne">
                    
					<div class="rowElem noborder pb0"><label class="topLabel">Status <span class="mandatory">*</span></label><div class="formBottom">
						<select style="width:300px" name="status"  class="validate[required]" id="req1" tabindex="5">
							<option value="">Choose any one</option>
							<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['type']->value,'selected'=>$_smarty_tpl->tpl_vars['status']->value),$_smarty_tpl);?>
	
						</select>  <br>
					<span class="error-message"><?php echo $_smarty_tpl->tpl_vars['statusErr']->value;?>
</span>
					</div><div class="fix"></div>
					</div>         
               
               </div>
					
					
					<br><br><br><br><br><br>
					
					<div class="m10">
				    <a href="client_photos.php"><input type="button" class="jsRedirect greyishBtn submitForm" val="client_photos.php" value="Cancel"></a>
						<input type="submit" class="greyishBtn submitForm" value="Submit">
                        <div class="fix"></div>
 				   </div>
		
               <div class="fix"></div>
                </div>
<input type="hidden" name="data[Company][created_date]" value="2016-11-08 17:12:52" id="CompanyCreatedDate"><input type="hidden" name="data[Company][created_by]" value="5" id="CompanyCreatedBy">				
       </form>    </div>
</div>	
	</div>	
		</div>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:include/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
