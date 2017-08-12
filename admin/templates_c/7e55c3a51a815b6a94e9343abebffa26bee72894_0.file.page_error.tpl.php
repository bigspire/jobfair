<?php
/* Smarty version 3.1.29, created on 2016-12-02 11:45:22
  from "/var/www/html/jobfair_jobfac/admin/templates/page_error.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5841117a02e842_38456612',
  'file_dependency' => 
  array (
    '7e55c3a51a815b6a94e9343abebffa26bee72894' => 
    array (
      0 => '/var/www/html/jobfair_jobfac/admin/templates/page_error.tpl',
      1 => 1480586076,
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
function content_5841117a02e842_38456612 ($_smarty_tpl) {
?>


	<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:include/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
		
	<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:include/menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	
	<div class="container-fluid" id="content">
		<div id="main">
			<div class="container-fluid">
				<div class="page-header">	
				</div>
				<div class="breadcrumbs">
					<ul>
						<li>
							
							<i class="icon-angle-right"></i>
						</li>
					</ul>
				</div>
						<div class="row-fluid  footer_div previewDiv" >
					<div class="span12">
						<div class="box box-bordered box-color">
						<form action=" " name="" id="formID" class="" method="post" accept-charset="utf-8">	
							
						<div class="dataTables_wrapper"><br>
						<h1 align="center"><?php echo $_smarty_tpl->tpl_vars['ntfd']->value;?>
</h1> 
						<h3 align="center"><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</h3><br><br>
						<a href="jobfair.php" ><button type="button" style="margin-left:600px;" val="jobfair.php" class="jsRedirect btn regCancel">Back</button></a>
							</div>
						 </form>						
						 </div>
					</div>
				</div>
			 </div>
	    </div>			
	</div>
	<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:include/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
