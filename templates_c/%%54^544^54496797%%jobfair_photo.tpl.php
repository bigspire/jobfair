<?php /* Smarty version 2.6.26, created on 2017-01-25 13:12:28
         compiled from jobfair_photo.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'jobfair_photo.tpl', 23, false),array('modifier', 'date_format', 'jobfair_photo.tpl', 25, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => '../include/top.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<!-- Add required fancyBox files -->
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['url']; ?>
fancybox/source/jquery.fancybox.css" type="text/css" media="screen" />

    <!-- Primary Page Layout
================================================== -->
<div id="headerContainer"  class="headerProfile" >
<div class="container">
    	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => '../include/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>  
		
      <div class="innerPage">
	   <div class="pageHeader">
			<h1 class="pageTitle floatL">Jobfair - Photo Gallery</h1>
			<h2 style="float:right"><span class="active"><a href="<?php echo $this->_tpl_vars['url']; ?>
<?php echo $this->_tpl_vars['language_url']; ?>
"><?php echo $this->_tpl_vars['menu_lang']->JText('LINK_HOME'); ?>
</a></span> 
			<img src="<?php echo $this->_tpl_vars['url']; ?>
images/bullet_green3.png"> <span class="stepDetails">Jobsfactory's Jobfair Photos</span></h2>
			</div>
			 
			<div class="cf" id="profile">
				
		<div class="floatL mt25">
		<?php $_from = $this->_tpl_vars['gal_data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>	
		<?php if (count($this->_tpl_vars['photo_data']) > '0'): ?>
		<div class="fairGal">
		<h2 class="fairHead"><?php echo $this->_tpl_vars['item']['title']; ?>
, <?php echo ((is_array($_tmp=$this->_tpl_vars['item']['jobfair_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%e %b, %Y") : smarty_modifier_date_format($_tmp, "%e %b, %Y")); ?>
, <?php echo $this->_tpl_vars['item']['location']; ?>
</h2>
		<ul class="fanBox">
		<?php $_from = $this->_tpl_vars['photo_data'][$this->_tpl_vars['key']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
		<?php if ($this->_tpl_vars['item'] != ''): ?>	
		<li><a class="fancybox" rel="myGallery" href="<?php echo $this->_tpl_vars['url']; ?>
admin/uploads/photo/<?php echo $this->_tpl_vars['item']; ?>
">
		<img src="<?php echo $this->_tpl_vars['url']; ?>
admin/timthumb.php?src=admin/uploads/photo/<?php echo $this->_tpl_vars['item']; ?>
&w=150&h=150&q=100"/>
		</a>
		</li>	
		<?php endif; ?>
		<?php endforeach; endif; unset($_from); ?>
		</ul>	
		</div>
		<?php endif; ?>
		<?php endforeach; endif; unset($_from); ?>
		</div>

   </div>    
     </div>
  </div><!--CONTAINER-->
</div><!--HEADER CONTAINER-->


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => '../include/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>	
<script type="text/javascript" src="<?php echo $this->_tpl_vars['url']; ?>
fancybox/source/jquery.fancybox.pack.js"></script>
<!-- Optional, Add mousewheel effect -->
<script type="text/javascript" src="<?php echo $this->_tpl_vars['url']; ?>
fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>	
<?php echo '
<script type="text/javascript">
$(document).ready(function(){		
	$(".fancybox").fancybox();	
});
</script>
'; ?>