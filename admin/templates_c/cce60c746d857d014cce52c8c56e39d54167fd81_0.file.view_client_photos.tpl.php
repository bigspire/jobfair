<?php
/* Smarty version 3.1.29, created on 2017-08-17 18:26:19
  from "F:\xampp\htdocs\jobfair_svn\jobfair\admin\templates\view_client_photos.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59959273936d38_11649057',
  'file_dependency' => 
  array (
    'cce60c746d857d014cce52c8c56e39d54167fd81' => 
    array (
      0 => 'F:\\xampp\\htdocs\\jobfair_svn\\jobfair\\admin\\templates\\view_client_photos.tpl',
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
function content_59959273936d38_11649057 ($_smarty_tpl) {
?>
	
   
   
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:include/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:include/menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<!-- Content wrapper -->
<div class="wrapper">
<div id="container" class="content nNote">	
    	<div class="title"><h5>View Client Req. Photos</h5></div>
        <!-- Form begins -->
	<form action="client_photos.php" method="post" name="company" id="formID" class="mainForm" enctype="multipart/form-data" accept-charset="utf-8">
	<div style="display:none;"><input type="hidden" name="_method" value="POST"></div> 
	 <fieldset>
			<div class="breadCrumb module">
               <ul>
                   <li class="firstB"><a href="#">Dashboard</a> </li>                               
                   <li><a href="client_photos.php">Client Photos</a></li>
                   <li>View Client Req. Photos</li>
					</ul>	
			</div>
			
			<div class="widget first">
             <div class="head"><h5 class="iList">View Client Req. Photo Details</h5></div>
					<div class="floatleft_view_odd">
					 
					     <div class="rowElem_view"><label>Client Req. Title</label>
						 <div class="formRight_view"><?php echo $_smarty_tpl->tpl_vars['position']->value;?>
 (<?php echo $_smarty_tpl->tpl_vars['company_name']->value;?>
)</div>
						 <div class="fix"></div></div>
                    <div class="rowElem_view"><label>Status</label>
					<div class="formRight_view"><?php echo ucwords($_smarty_tpl->tpl_vars['status']->value);?>
</div><div class="fix"></div></div>
					                  
                    </div>
					
					
						
					<div class="floatleft_view_odd">
						<div class="">
						<div class="formRight_view" style="width:100%">
						<?php
$_from = $_smarty_tpl->tpl_vars['data1']->value;
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
					
			</div>
			
			<div class="m10">
				<a href="client_photos.php"><input type="button" val="client_photos.php" class="jsRedirect greyishBtn submitForm" value="Back"></a>
				<div class="fix"></div>
 				</div>
       </fieldset>
     </form>
	 </div>	
</div>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:include/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
