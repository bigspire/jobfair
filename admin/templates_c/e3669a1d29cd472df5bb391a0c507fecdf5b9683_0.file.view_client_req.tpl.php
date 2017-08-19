<?php
/* Smarty version 3.1.29, created on 2017-08-19 12:21:37
  from "C:\xampp\htdocs\2017\jobfair_jobfac\jobfair\admin\templates\view_client_req.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5997dff9434de3_88403022',
  'file_dependency' => 
  array (
    'e3669a1d29cd472df5bb391a0c507fecdf5b9683' => 
    array (
      0 => 'C:\\xampp\\htdocs\\2017\\jobfair_jobfac\\jobfair\\admin\\templates\\view_client_req.tpl',
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
function content_5997dff9434de3_88403022 ($_smarty_tpl) {
?>
	
    
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:include/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:include/menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>



<!-- Content wrapper -->
<div class="wrapper">
<div id="container" class="content nNote">
    	<div class="title"><h5>View Client Req.</h5>
		</div>
		<div class="breadCrumb module" style="height:0px;">
                    <ul>
                        <li class="firstB"><a href="#">Dashboard</a> </li>
                        <li><a href="jobfair.php">Job Fair</a></li>   
						<li><a href="client_req.php">List Client Req.</a></li>                                    
                        <li>View Client Req.</li>
                    </ul>
      </div>
        <!-- Form begins -->
	<form action="jobfair.html" method="post" name="company" id="formID" class="mainForm" enctype="multipart/form-data" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"></div> 
			<fieldset>
			  <div class="widget first">
                    <div class="head"><h5 class="iList">View Requirement Details</h5></div>
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
				   <div class="floatleft_view_odd">
               <div class="rowElem_view"><label>Company Name</label><div class="formRight_view"><?php echo $_smarty_tpl->tpl_vars['item']->value['company_name'];?>
</div>
               <div class="fix"></div>
               </div>
					<div class="rowElem_view"><label>Position</label><div class="formRight_view"><?php echo $_smarty_tpl->tpl_vars['item']->value['position'];?>
</div>
					<div class="fix"></div>
					</div>
					<div class="rowElem_view"><label>Drive Date</label><div class="formRight_view"><?php echo $_smarty_tpl->tpl_vars['item']->value['drive_date'];?>
</div>
					<div class="fix"></div>
					</div>
					</div>
					
					<div class="floatleft_view_even">
					<div class="rowElem_view"><label>Qualification</label><div class="formRight_view"><?php echo $_smarty_tpl->tpl_vars['item']->value['qualification'];?>
 
					</div><div class="fix"></div></div>
					<div class="rowElem_view"><label>Work Location</label><div class="formRight_view"><?php echo $_smarty_tpl->tpl_vars['item']->value['work_loc'];?>
</div><div class="fix"></div></div>
					<div class="rowElem_view"><label>Contact No.</label><div class="formRight_view"><?php echo $_smarty_tpl->tpl_vars['item']->value['contact_no'];?>
</div><div class="fix"></div></div>
					</div>
					
					<div class="floatleft_view_odd">
                        <div class="rowElem_view"><label>Email Address</label><div class="formRight_view"><?php echo $_smarty_tpl->tpl_vars['item']->value['email_address'];?>
</div><div class="fix"></div></div>
					<div class="rowElem_view"><label>No. of Vacancy</label><div class="formRight_view">
						 <?php echo $_smarty_tpl->tpl_vars['item']->value['no_vacancy'];?>
</div></div>
						 <div class="rowElem_view"><label>Status</label><div class="formRight_view">
						 <?php echo $_smarty_tpl->tpl_vars['item']->value['status'];?>
</div></div>
					</div>
					<div class="floatleft_view_even">
					<div class="rowElem_view"><label>Salary Details</label><div class="formRight_view">
						 <?php echo $_smarty_tpl->tpl_vars['item']->value['salary'];?>
</div></div>
					<div class="rowElem_view"><label>Venue Details</label><div class="formRight_view">
						 <?php echo $_smarty_tpl->tpl_vars['item']->value['venue'];?>
</div></div>
					<div class="rowElem_view"><label>Company Logo</label><div class="formRight_view">
						<?php if ($_smarty_tpl->tpl_vars['item']->value['client_logo']) {?>
							<img src="timthumb.php?src=uploads/req_logo/<?php echo $_smarty_tpl->tpl_vars['item']->value['client_logo'];?>
&w=200&q=100">
						<?php }?>
						</div><div class="fix"></div>
					</div>
					</div>
					
						
					<div class="floatleft_view_odd">
						<div class="lastRow rowElem_view"><label>About Company</label>
							<div class="formRight_view"><?php echo ucfirst(nl2br($_smarty_tpl->tpl_vars['item']->value['about_company']));?>
</div>
						<div class="fix"></div>
						</div>
					</div>
					
						
					<div class="fix"></div>
						</div>
						
					<div class="widget first">
               <div class="head"><h5 class="iList">Pop-up Details</h5></div>
               <div class="floatleft_view_odd">
                   <div class="rowElem_view"><label>Start Date</label><div class="formRight_view"><?php echo $_smarty_tpl->tpl_vars['item']->value['start_date'];?>
</div><div class="fix"></div></div>
				 	<div class="rowElem_view"><label>End Date</label><div class="formRight_view"><?php echo $_smarty_tpl->tpl_vars['item']->value['end_date'];?>
</div><div class="fix"></div></div> </div>
				    <div class="fix"></div>
				    <div class="fix"></div>
				   </div>
				   
					<div class="widget" id="">
                    <div class="head"><h5 class="iList">Record History</h5></div>
					 <div class="floatleft_view_odd">
                <div class="rowElem_view history_width"><label>Created Date</label><div class="formRight_view"><?php echo $_smarty_tpl->tpl_vars['item']->value['created_date'];?>
</div><div class="fix"></div></div>
				    <div class="rowElem_view history_width"><label>Modified Date</label><div class="formRight_view"><?php echo $_smarty_tpl->tpl_vars['item']->value['modified_date'];?>
</div><div class="fix"></div>
				    </div>
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
				<a href="client_req.php"><input type="button" class="jsRedirect greyishBtn submitForm" val="client_req.php" value="Back"></a>
				<div class="fix"></div>
 				</div>			
 </form>    
 </div>
</div>	
</div>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:include/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
