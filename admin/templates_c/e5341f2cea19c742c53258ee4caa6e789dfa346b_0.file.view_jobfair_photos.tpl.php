<?php
<<<<<<< HEAD:admin/templates_c/e5341f2cea19c742c53258ee4caa6e789dfa346b_0.file.view_jobfair_photos.tpl.php
/* Smarty version 3.1.29, created on 2017-08-16 14:58:53
  from "F:\xampp\htdocs\jobfair_svn\jobfair\admin\templates\view_jobfair_photos.tpl" */
=======
/* Smarty version 3.1.29, created on 2017-08-16 18:35:33
  from "C:\xampp\htdocs\2017\jobfair_jobfac\jobfair\admin\templates\view_jobfair_photos.tpl" */
>>>>>>> 30cc881e0ab6b7cdf64b315feb18a97b426d901c:admin/templates_c/3e5efc2e440e143ac7d02add6a95710e4e76ef17_0.file.view_jobfair_photos.tpl.php

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
<<<<<<< HEAD:admin/templates_c/e5341f2cea19c742c53258ee4caa6e789dfa346b_0.file.view_jobfair_photos.tpl.php
  'unifunc' => 'content_59941055e265c1_84779017',
=======
  'unifunc' => 'content_5994431d6c13f3_39140887',
>>>>>>> 30cc881e0ab6b7cdf64b315feb18a97b426d901c:admin/templates_c/3e5efc2e440e143ac7d02add6a95710e4e76ef17_0.file.view_jobfair_photos.tpl.php
  'file_dependency' => 
  array (
    'e5341f2cea19c742c53258ee4caa6e789dfa346b' => 
    array (
<<<<<<< HEAD:admin/templates_c/e5341f2cea19c742c53258ee4caa6e789dfa346b_0.file.view_jobfair_photos.tpl.php
      0 => 'F:\\xampp\\htdocs\\jobfair_svn\\jobfair\\admin\\templates\\view_jobfair_photos.tpl',
      1 => 1485254552,
=======
      0 => 'C:\\xampp\\htdocs\\2017\\jobfair_jobfac\\jobfair\\admin\\templates\\view_jobfair_photos.tpl',
      1 => 1502888729,
>>>>>>> 30cc881e0ab6b7cdf64b315feb18a97b426d901c:admin/templates_c/3e5efc2e440e143ac7d02add6a95710e4e76ef17_0.file.view_jobfair_photos.tpl.php
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
<<<<<<< HEAD:admin/templates_c/e5341f2cea19c742c53258ee4caa6e789dfa346b_0.file.view_jobfair_photos.tpl.php
function content_59941055e265c1_84779017 ($_smarty_tpl) {
=======
function content_5994431d6c13f3_39140887 ($_smarty_tpl) {
>>>>>>> 30cc881e0ab6b7cdf64b315feb18a97b426d901c:admin/templates_c/3e5efc2e440e143ac7d02add6a95710e4e76ef17_0.file.view_jobfair_photos.tpl.php
?>
	
   
   
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:include/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:include/menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<!-- Content wrapper -->
<div class="wrapper">
<div id="container" class="content nNote">	
    	<div class="title"><h5>View Job Fair Photos</h5></div>
        <!-- Form begins -->
	<form action="jobfair_photos.php" method="post" name="company" id="formID" class="mainForm" enctype="multipart/form-data" accept-charset="utf-8">
	<div style="display:none;"><input type="hidden" name="_method" value="POST"></div> 
	 <fieldset>
			<div class="breadCrumb module">
               <ul>
                   <li class="firstB"><a href="#">Dashboard</a> </li>                               
                   <li><a href="jobfair_photos.php">Job Fair Photos</a></li>
                   <li>View Job Fair Photos</li>
					</ul>	
			</div>
			
			<div class="widget first">
             <div class="head"><h5 class="iList">View Job Fair Photo Details</h5></div>
					<div class="floatleft_view_odd">
					 
					     <div class="rowElem_view"><label>Title</label><div class="formRight_view"><?php echo ucwords($_smarty_tpl->tpl_vars['data']->value['title']);?>
</div><div class="fix"></div></div>
                    <div class="rowElem_view"><label>Status</label><div class="formRight_view"><?php echo ucwords($_smarty_tpl->tpl_vars['status']->value);?>
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
						<img src="timthumb.php?src=admin/uploads/photo/<?php echo $_smarty_tpl->tpl_vars['item']->value['photo'];?>
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
				<a href="jobfair_photos.php"><input type="button" val="jobfair_photos.php" class="jsRedirect greyishBtn submitForm" value="Back"></a>
				<div class="fix"></div>
 				</div>
       </fieldset>
     </form>
	 </div>	
</div>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:include/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
