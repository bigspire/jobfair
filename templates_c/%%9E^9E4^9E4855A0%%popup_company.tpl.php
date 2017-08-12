<?php /* Smarty version 2.6.26, created on 2017-01-25 14:08:59
         compiled from ../include/popup_company.tpl */ ?>
 <div class="slider2">
<?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
<?php if ($this->_tpl_vars['item']['logo'] != ''): ?>
<div class="slide">
<?php if ($this->_tpl_vars['item']['job_url']): ?>
<img src="<?php echo $this->_tpl_vars['url']; ?>
admin/timthumb.php?src=admin/uploads/logo/<?php echo $this->_tpl_vars['item']['logo']; ?>
&h=40&q=100" rel="<?php echo $this->_tpl_vars['item']['job_url']; ?>
" class="change_job" style="cursor: pointer" title = "<?php echo $this->_tpl_vars['item']['company_name']; ?>
"  width = "100" height = "40"/>
<?php else: ?>
<img src="<?php echo $this->_tpl_vars['url']; ?>
admin/timthumb.php?src=admin/uploads/logo/<?php echo $this->_tpl_vars['item']['logo']; ?>
&h=40&q=100" title = "<?php echo $this->_tpl_vars['item']['company_name']; ?>
"  width = "100" height = "40"/>
<?php endif; ?>
</div>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>		 
</div>   