<?php /* Smarty version 2.6.26, created on 2017-08-14 19:47:05
         compiled from ../include/popup_gallery.tpl */ ?>
<div class="slider3">
<?php $_from = $this->_tpl_vars['photo_data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
<?php if ($this->_tpl_vars['item']['id'] != ''): ?>
<div class="slide">
<img src="<?php echo $this->_tpl_vars['url']; ?>
admin/timthumb.php?src=admin/uploads/photo/<?php echo $this->_tpl_vars['item']['photo']; ?>
&h=130&w=230&q=100" style="cursor: pointer" rel="<?php echo $this->_tpl_vars['url']; ?>
jobfair_photo/" title = "Jobfair Photos" class="change_job"/>
</div>	
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>		 
</div>   