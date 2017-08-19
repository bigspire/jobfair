<?php
/* Smarty version 3.1.29, created on 2017-08-19 12:08:13
  from "C:\xampp\htdocs\2017\jobfair_jobfac\jobfair\admin\templates\client_req.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5997dcd58715d5_79484894',
  'file_dependency' => 
  array (
    'a36372da1801786808602d29e520e590b345d39b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\2017\\jobfair_jobfac\\jobfair\\admin\\templates\\client_req.tpl',
      1 => 1503124625,
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
function content_5997dcd58715d5_79484894 ($_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once 'C:\\xampp\\htdocs\\2017\\jobfair_jobfac\\jobfair\\admin\\vendor\\smarty-3.1.29\\libs\\plugins\\function.html_options.php';
?>
	
   
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:include/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:include/menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>



<!-- Content wrapper -->
<div class="wrapper">
	
	<div class="nNote stats_new">
   <ul>  
	</ul>
   <div class="fix"></div>
  </div>		
   <?php if ($_smarty_tpl->tpl_vars['SUCCESS_MSG']->value) {?>
   <div id="flashMessage" class="nNote nSuccess hideit dismiss"><?php echo $_smarty_tpl->tpl_vars['SUCCESS_MSG']->value;?>
</div>
   <?php }?>
   <?php if ($_smarty_tpl->tpl_vars['ALERT_MSG']->value) {?>
   <div id="flashMessage" class="nNote nFailure hideit dismiss"><?php echo $_smarty_tpl->tpl_vars['ALERT_MSG']->value;?>
</div>
   <?php }?>
    <!-- Content -->
    <div class="content">
    	<div class="title"><h5>Client Req.</h5>
		</div> 
        <!-- Dynamic table -->
		<div class="breadCrumb module">
                    <ul>
                        <li class="firstB"><a href="#">Dashboard</a> </li>
                        <li><a href="jobfair.php">Job Fair</a></li>                                           
                        <li>List Client Requirements</li>
                    </ul>
<div class="num"><a class="blueNum" href="add_client_req.php" title="Add Job Client Req.">Add Client Req.</a></div>
                </div>
<form action="client_req.php" onsubmit="return submit_search(this, 'jobfair')" id="searchFrm" name="searchFrm" method="post" class="" accept-charset="utf-8">
	<div style="display:none;"><input type="hidden" name="_method" value="POST"></div>		
			
	<div class="widget">      
	   	<div class="table">
		
            <div class="head"><h5 class="iFrames">List Client Req.</h5>
				
		<a class="jsRedirect btn14 mr10 mt5" val="client_req.php" style="float:right" title="" href="client_req.php"> Reset</a>	
		<a class="btn14 mr10 mt5" style="float:right" title="" href="javascript:submit_search(document.searchFrm, 'jobfair');">
		<img src="img/icons/dark/magnify.png" class="vmiddle" alt=""> Search</a>
		<div class="dataTables_filter" id="example_filter"><label>Search: 
			<input name="search" id="searchNC" type="text" class="ac_input" placeholder="eg: infosys, tcs, wipro" value="<?php echo $_GET['search'];?>
" autocomplete="off" tabindex="1">
			 
			 <input name="date_from" value="<?php echo $_GET['date_from'];?>
" type="text" class="datepic" placeholder="Created Date From" id="">
 			 <input name="date_to" value="<?php echo $_GET['date_to'];?>
" type="text" class="datepic" placeholder="Created Date To"  id="">
				
		    <input type="hidden" name="data[Company][webroot]" id="webroot" value="client_req.php">
		    <input type="hidden" name="data[Company][hdnSubmit]" id="CompanyHdnSubmit">				
			<div class="srch"></div></label>
			
				<label>
				<?php echo smarty_function_html_options(array('name'=>'status','class'=>"input-medium",'placeholder'=>'','style'=>"clear:left",'options'=>$_smarty_tpl->tpl_vars['type']->value,'selected'=>$_smarty_tpl->tpl_vars['status']->value),$_smarty_tpl);?>

			</label>
			</div>
			</div>
         <div class="dataTables_wrapper" id="example_wrapper"> <table cellspacing="0" cellpadding="0" border="0" id="example" class="display">
                <thead>
                    <tr>
					
					
					<th class="ui-state-default" rowspan="1" colspan="1" style="width: 140px;">
					<a href="client_req.php?field=company_name&order=<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
&page=<?php echo $_GET['page'];?>
&keyword=<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
&status=<?php echo $_smarty_tpl->tpl_vars['status']->value;?>
&f_date=<?php echo $_smarty_tpl->tpl_vars['f_date']->value;?>
&t_date=<?php echo $_smarty_tpl->tpl_vars['t_date']->value;?>
">
					<div class="DataTables_sort_wrapper">Company <span class="DataTables_sort_icon css_right <?php echo $_smarty_tpl->tpl_vars['sort_field_company_name']->value;?>
"></span></div></a></th>
					
					
					<th class="ui-state-default" rowspan="1" colspan="1" style="width: 120px;">
					<a href="client_req.php?field=position&order=<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
&page=<?php echo $_GET['page'];?>
&keyword=<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
&status=<?php echo $_smarty_tpl->tpl_vars['status']->value;?>
&f_date=<?php echo $_smarty_tpl->tpl_vars['f_date']->value;?>
&t_date=<?php echo $_smarty_tpl->tpl_vars['t_date']->value;?>
">
					<div class="DataTables_sort_wrapper">Position <span class="DataTables_sort_icon css_right <?php echo $_smarty_tpl->tpl_vars['sort_field_position']->value;?>
"></span></div></th>
					
					<th class="ui-state-default" rowspan="1" colspan="1" style="width: 100px;">
					<a href="client_req.php?field=drive_date&order=<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
&page=<?php echo $_GET['page'];?>
&keyword=<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
&status=<?php echo $_smarty_tpl->tpl_vars['status']->value;?>
&f_date=<?php echo $_smarty_tpl->tpl_vars['f_date']->value;?>
&t_date=<?php echo $_smarty_tpl->tpl_vars['t_date']->value;?>
">
					<div class="DataTables_sort_wrapper">Drive Date <span class="DataTables_sort_icon css_right <?php echo $_smarty_tpl->tpl_vars['sort_field_drive_date']->value;?>
"></span></div></th>
					
					<th class="ui-state-default" rowspan="1" colspan="1" style="width: 130px;">
					<a href="client_req.php?field=work_loc&order=<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
&page=<?php echo $_GET['page'];?>
&keyword=<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
&status=<?php echo $_smarty_tpl->tpl_vars['status']->value;?>
&f_date=<?php echo $_smarty_tpl->tpl_vars['f_date']->value;?>
&t_date=<?php echo $_smarty_tpl->tpl_vars['t_date']->value;?>
">
					<div class="DataTables_sort_wrapper">Location <span class="DataTables_sort_icon css_right <?php echo $_smarty_tpl->tpl_vars['sort_field_work_loc']->value;?>
"></span></div></th>
					
					
					<!--<th class="ui-state-default" rowspan="1" colspan="1" style="width: 110px;">
					<a href="client_req.php?field=no_vacancy&order=<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
&page=<?php echo $_GET['page'];?>
&keyword=<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
&status=<?php echo $_smarty_tpl->tpl_vars['status']->value;?>
&f_date=<?php echo $_smarty_tpl->tpl_vars['f_date']->value;?>
&t_date=<?php echo $_smarty_tpl->tpl_vars['t_date']->value;?>
">
					<div class="DataTables_sort_wrapper"># Vacancy <span class="DataTables_sort_icon css_right <?php echo $_smarty_tpl->tpl_vars['sort_field_no_vacancy']->value;?>
"></span></div></th>
					-->
					<th class="ui-state-default" rowspan="1" colspan="1" style="width: 110px;">
					<div class="DataTables_sort_wrapper"># Reg. <span class="DataTables_sort_icon css_right <?php echo $_smarty_tpl->tpl_vars['sort_field_reg']->value;?>
">
					</span></div></th>
					
					<th class="ui-state-default" rowspan="1" colspan="1" style="width: 100px;">
					<a href="client_req.php?field=start_date&order=<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
&page=<?php echo $_GET['page'];?>
&keyword=<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
&status=<?php echo $_smarty_tpl->tpl_vars['status']->value;?>
&f_date=<?php echo $_smarty_tpl->tpl_vars['f_date']->value;?>
&t_date=<?php echo $_smarty_tpl->tpl_vars['t_date']->value;?>
">
					<div class="DataTables_sort_wrapper">Start Date<span class="DataTables_sort_icon css_right <?php echo $_smarty_tpl->tpl_vars['sort_field_start_date']->value;?>
"></span></div></a></th>
					
					<th class="ui-state-default" rowspan="1" colspan="1" style="width: 100px;">
					<a href="client_req.php?field=end_date&order=<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
&page=<?php echo $_GET['page'];?>
&keyword=<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
&status=<?php echo $_smarty_tpl->tpl_vars['status']->value;?>
&f_date=<?php echo $_smarty_tpl->tpl_vars['f_date']->value;?>
&t_date=<?php echo $_smarty_tpl->tpl_vars['t_date']->value;?>
">
					<div class="DataTables_sort_wrapper">End Date<span class="DataTables_sort_icon css_right <?php echo $_smarty_tpl->tpl_vars['sort_field_end_date']->value;?>
"></span></div></a></th>
					
					<th class="ui-state-default" rowspan="1" colspan="1" style="width: 35px;">
					<a href="client_req.php?field=status&order=<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
&page=<?php echo $_GET['page'];?>
&keyword=<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
&status=<?php echo $_smarty_tpl->tpl_vars['status']->value;?>
&f_date=<?php echo $_smarty_tpl->tpl_vars['f_date']->value;?>
&t_date=<?php echo $_smarty_tpl->tpl_vars['t_date']->value;?>
">
					<div class="DataTables_sort_wrapper">Status<span class="DataTables_sort_icon css_right <?php echo $_smarty_tpl->tpl_vars['sort_field_status']->value;?>
"></span></div></a></div></th>
					
					<th class="ui-state-default" rowspan="1" colspan="1" style="width: 165px;">
					<a href="client_req.php?field=created_date&order=<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
&page=<?php echo $_GET['page'];?>
&keyword=<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
&status=<?php echo $_smarty_tpl->tpl_vars['status']->value;?>
&f_date=<?php echo $_smarty_tpl->tpl_vars['f_date']->value;?>
&t_date=<?php echo $_smarty_tpl->tpl_vars['t_date']->value;?>
">
					<div class="DataTables_sort_wrapper">Created Date<span class="DataTables_sort_icon css_right <?php echo $_smarty_tpl->tpl_vars['sort_field_created_date']->value;?>
"></span></div></a></th>
					
					<!--<th class="ui-state-default" rowspan="1" colspan="1" style="width: 165px;">
					<a href="client_req.php?field=modified_date&order=<?php echo $_smarty_tpl->tpl_vars['order']->value;?>
&page=<?php echo $_GET['page'];?>
&keyword=<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
&status=<?php echo $_smarty_tpl->tpl_vars['status']->value;?>
&f_date=<?php echo $_smarty_tpl->tpl_vars['f_date']->value;?>
&t_date=<?php echo $_smarty_tpl->tpl_vars['t_date']->value;?>
">
					<div class="DataTables_sort_wrapper">Modified Date<span class="DataTables_sort_icon css_right <?php echo $_smarty_tpl->tpl_vars['sort_field_modified_date']->value;?>
"></span></div></a></th>
					-->
					
					<th class="ui-state-default" rowspan="1" colspan="1" style="width: 145px;"><div class="DataTables_sort_wrapper">Action</div></th>
					
					</tr>
                </thead>
             <tbody>
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
					<?php if ($_smarty_tpl->tpl_vars['item']->value['company_name']) {?>					
   					<?php if ($_smarty_tpl->tpl_vars['key']->value%2 == 0) {?>
      					<?php $_smarty_tpl->tpl_vars["grade"] = new Smarty_Variable("gradeA odd", null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "grade", 0);?>
   					<?php } else { ?>
      				   <?php $_smarty_tpl->tpl_vars["grade"] = new Smarty_Variable("gradeA even", null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "grade", 0);?>
      			   <?php }?>
      				
			   <tr class="<?php echo $_smarty_tpl->tpl_vars['grade']->value;?>
">
					 	
				 <td><a href="view_client_req.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['company_name'];?>
</a></td>
				 <td><?php echo $_smarty_tpl->tpl_vars['item']->value['position'];?>
</td>
				 <td><?php echo $_smarty_tpl->tpl_vars['item']->value['drive_date'];?>
</td>
				 <td><?php echo $_smarty_tpl->tpl_vars['item']->value['work_loc'];?>
</td>
				<td align="center">
						 	<a href="client_req.php?action=export&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" val="client_req.php?action=export&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class="btn btn-warning jsRedirect" ><?php echo $_smarty_tpl->tpl_vars['item']->value['reg'];?>
</a>
						</td>	
				 						
             <td align="center"><?php echo $_smarty_tpl->tpl_vars['item']->value['start_date'];?>
</td>
			    <td align="center"><?php echo $_smarty_tpl->tpl_vars['item']->value['end_date'];?>
</td>
				 <td class="center">
			    <img border="0" class="mr5 vmiddle tipS" original-title="<?php echo $_smarty_tpl->tpl_vars['item']->value['status'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['item']->value['status_cls'];?>
">
			    </td>						
				 <td class="center"><?php echo $_smarty_tpl->tpl_vars['item']->value['created_date'];?>
</td>
				<!-- <td class="center"><?php echo $_smarty_tpl->tpl_vars['item']->value['modified_date'];?>
</td>-->
             <td class="center"><img class="mr5 vmiddle" src="img/icons/dark/pencil.png"><a href="edit_client_req.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">Edit</a> &nbsp;  
             <img  class="mr5 vmiddle" alt=""  width="12" height="12"  src="img/icons/dark/trash.png"><a id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="#" class="bConfirm2" href="javascript:void(0)">Delete</a></td>
            </tr>
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
            </tbody></table>
				<div class="dataTables_info" id="DataTables_Table_8_info">
			</div>
			<div class="table-pagination" id="DataTables_Table_8_paginate">
			</div>
			&nbsp;
			<div class="fg-toolbar ui-toolbar ui-widget-header ui-corner-bl ui-corner-br ui-helper-clearfix">
			  <div id="example_length" class="dataTables_length">
				<?php echo $_smarty_tpl->tpl_vars['page_info']->value;?>

				</div>
				
				<!--div class="dataTables_paginate fg-buttonset ui-buttonset fg-buttonset-multi ui-buttonset-multi paging_full_numbers" id="example_paginate"><span class="toFirst ui-corner-tl ui-corner-bl fg-button ui-button ui-state-disabled" id="example_first">First</span><span class="previous fg-button ui-button ui-state-disabled" id="example_previous">Prev</span><span><span class="fg-button ui-button ui-state-disabled">1</span><span class="fg-button ui-button">2</span><span class="fg-button ui-button">3</span><span class="fg-button ui-button">4</span><span class="fg-button ui-button">5</span></span><span class="next fg-button ui-button" id="example_next">Next</span><span class="last ui-corner-tr ui-corner-br fg-button ui-button" id="example_last">Last</span></div-->
				
				<div class="dataTables_paginate fg-buttonset ui-buttonset fg-buttonset-multi ui-buttonset-multi paging_full_numbers" id="example_paginate">
				<?php echo $_smarty_tpl->tpl_vars['page_links']->value;?>

				</div>
			</div>
		</div>
    </div>
		<input type="hidden" id="page" value="client_req">		
		<input type="hidden" id="web_root" value="delete_client_req.php">	
	</div>
	<div class="fix">
	</div>
</form>

</div>
  	
  </div>		
		</div>
		
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:include/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
