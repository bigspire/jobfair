<?php /* Smarty version 2.6.26, created on 2017-08-22 14:59:41
         compiled from ../include/popup_drives.tpl */ ?>
<div class="slider3">
<?php $_from = $this->_tpl_vars['photo_data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
<div class="slide">
<img src="<?php echo $this->_tpl_vars['url']; ?>
admin/timthumb.php?src=admin/uploads/req_photo/<?php echo $this->_tpl_vars['item']['photo']; ?>
&h=130&w=230&q=100" style="cursor: pointer"  title = "Drive Photos" class=""/>
</div>	
<?php endforeach; endif; unset($_from); ?>		 
</div>   