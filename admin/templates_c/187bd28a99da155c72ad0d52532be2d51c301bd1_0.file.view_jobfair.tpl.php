<?php
/* Smarty version 3.1.29, created on 2016-12-15 11:09:06
  from "/var/www/html/jobfair_jobfac/admin/templates/view_jobfair.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58522c7a7b43a6_18243733',
  'file_dependency' => 
  array (
    '187bd28a99da155c72ad0d52532be2d51c301bd1' => 
    array (
      0 => '/var/www/html/jobfair_jobfac/admin/templates/view_jobfair.tpl',
      1 => 1481779685,
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
function content_58522c7a7b43a6_18243733 ($_smarty_tpl) {
?>
	
   
   
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:include/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:include/menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<!-- Content wrapper -->
<div class="wrapper">
<div id="container" class="content nNote">	
    	<div class="title"><h5>View Job Fair</h5></div>
        <!-- Form begins -->
	<form action="jobfair.php" method="post" name="company" id="formID" class="mainForm" enctype="multipart/form-data" accept-charset="utf-8">
	<div style="display:none;"><input type="hidden" name="_method" value="POST"></div> 
	 <fieldset>
			<div class="breadCrumb module">
               <ul>
                   <li class="firstB"><a href="#">Dashboard</a> </li>                               
                   <li><a href="jobfair.php">Job Fair</a></li>
                   <li>View Job Fair</li>
					</ul>	
			</div>
			
			<div class="widget first">
             <div class="head"><h5 class="iList">View Job Fair Details</h5></div>
					<div class="floatleft_view_odd">
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
					     <div class="rowElem_view"><label>Title</label><div class="formRight_view"><?php echo ucwords($_smarty_tpl->tpl_vars['item']->value['title']);?>
</div><div class="fix"></div></div>
                    <div class="rowElem_view"><label>Date</label><div class="formRight_view"><?php echo $_smarty_tpl->tpl_vars['item']->value['jobfair_date'];?>
</div><div class="fix"></div></div>
					 	  <div class="rowElem_view"><label>Location</label><div class="formRight_view"><?php echo ucwords($_smarty_tpl->tpl_vars['item']->value['location']);?>
</div></div>
					</div>
					<div class="floatleft_view_even">
						<div class="rowElem_view"><label>Partner With</label><div class="formRight_view"><?php echo ucwords($_smarty_tpl->tpl_vars['item']->value['partner']);?>
</div><div class="fix"></div></div>
						<div class="rowElem_view"><label>Partner Logo</label><div class="formRight_view">
						<?php if ($_smarty_tpl->tpl_vars['item']->value['partner_logo']) {?>
							<img src="timthumb.php?src=uploads/<?php echo $_smarty_tpl->tpl_vars['item']->value['partner_logo'];?>
&h=30&q=100">
						<?php }?>
						</div><div class="fix"></div></div>
						<div class="rowElem_view"><label>State</label><div class="formRight_view"><?php echo ucwords($_smarty_tpl->tpl_vars['item']->value['state_name']);?>
</div><div class="fix"></div></div>
					</div>
					
					<div class="floatleft_view_odd">
						<div class="rowElem_view"><label>Venue</label>
						<div class="formRight_view"><?php echo ucwords(nl2br($_smarty_tpl->tpl_vars['item']->value['venue']));?>
</div>
						<div class="fix"></div>
						</div>
						
						<div class="rowElem_view"><label>Status</label><div class="formRight_view"><?php echo ucwords($_smarty_tpl->tpl_vars['item']->value['status']);?>
</div><div class="fix"></div></div>
					</div>
					
					<div class="floatleft_view_even">
	<div class="lastRow"><label>Description</label><div class="formRight_view"><?php echo ucfirst($_smarty_tpl->tpl_vars['item']->value['description']);?>
</div>
	<div class="fix"></div>
	</div>						 	
 </div>
 
 <div class="floatleft_view_odd">
	<div class="lastRow"><label>Eligibility Criteria</label><div class="formRight_view"><?php echo ucfirst($_smarty_tpl->tpl_vars['item']->value['eligibility']);?>
</div>
	<div class="fix"></div>
	</div>						 	
 </div>
 
 <div class="floatleft_view_even">
	<div class="lastRow"><label>Others</label><div class="formRight_view"><?php echo $_smarty_tpl->tpl_vars['item']->value['others'];?>
</div>
	<div class="fix"></div>
	</div>						 	
 </div>
					
					
					<div class="fix"></div>
			</div>
						
			<div class="widget first">
             <div class="head"><h5 class="iList">Contact Details</h5></div>
             <div class="floatleft_view_even">
               <div class="rowElem_view"><label>Contact Person</label><div class="formRight_view"><?php echo ucwords($_smarty_tpl->tpl_vars['item']->value['contact_person']);?>
</div><div class="fix"></div></div>
				 	<div class="rowElem_view"><label>Email Address</label><div class="formRight_view"><?php echo $_smarty_tpl->tpl_vars['item']->value['contact_email'];?>
</div><div class="fix"></div></div>
					<div class="rowElem_view"><label>Contact No.</label><div class="formRight_view"><?php echo $_smarty_tpl->tpl_vars['item']->value['contact_no'];?>
</div><div class="fix"></div></div>
				 </div>
				 <div class="fix"></div>
				 <div class="fix"></div>
			</div>
			
			<div class="widget" id="">
            <div class="head"><h5 class="iList">Record History</h5></div>
				 <div class="floatleft_view_odd">
              <div class="rowElem_view history_width"><label>Created Date</label><div class="formRight_view"><?php echo $_smarty_tpl->tpl_vars['item']->value['created_date'];?>
</div><div class="fix"></div></div>
				  <div class="rowElem_view history_width"><label>Modified Date</label><div class="formRight_view"><?php echo $_smarty_tpl->tpl_vars['item']->value['modified_date'];?>
</div><div class="fix"></div></div> 	
				 </div>
				<div class="fix"></div>						
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
			<div class="m10">
				<a href="jobfair.php"><input type="button" val="jobfair.php" class="jsRedirect greyishBtn submitForm" value="Back"></a>
				<div class="fix"></div>
 				</div>
       </fieldset>
     </form>
	 </div>	
</div>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:include/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
