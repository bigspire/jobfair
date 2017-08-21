<?php /* Smarty version 2.6.26, created on 2017-08-19 18:15:59
         compiled from ../include/lang_dropdown.tpl */ ?>

<?php $this->assign('lsel', $this->_tpl_vars['language_name']); ?>
<?php if ($this->_tpl_vars['lsel'] == 'ta'): ?>
<?php $this->assign('ta_sel', 'selected'); ?>
<?php elseif ($this->_tpl_vars['lsel'] == 'gu'): ?>
<?php $this->assign('gu_sel', 'selected'); ?>
<?php elseif ($this->_tpl_vars['lsel'] == 'te'): ?>
<?php $this->assign('te_sel', 'selected'); ?>
<?php elseif ($this->_tpl_vars['lsel'] == 'ma'): ?>
<?php $this->assign('ma_sel', 'selected'); ?>
<?php elseif ($this->_tpl_vars['lsel'] == 'hi'): ?>
<?php $this->assign('hi_sel', 'selected'); ?>
<?php elseif ($this->_tpl_vars['lsel'] == 'ka'): ?>
<?php $this->assign('ka_sel', 'selected'); ?>
<?php else: ?>
<?php $this->assign('en_sel', 'selected'); ?>
<?php endif; ?>	
		
<div class="langDropDown searchOrder" style="margin-right:70px;">	

<select name="Language"  class="default-usage-select" onchange="change_language()">
<option value="en" <?php echo $this->_tpl_vars['en_sel']; ?>
>English</option>
<option value="ta" <?php echo $this->_tpl_vars['ta_sel']; ?>
><?php echo $this->_tpl_vars['reg_lang']->JText('LBL_TAMIL'); ?>
</option>
<option value="te" <?php echo $this->_tpl_vars['te_sel']; ?>
><?php echo $this->_tpl_vars['reg_lang']->JText('LBL_TELUGU'); ?>
</option>
<option value="ka" <?php echo $this->_tpl_vars['ka_sel']; ?>
><?php echo $this->_tpl_vars['reg_lang']->JText('LBL_KANNADA'); ?>
</option>
<option value="hi" <?php echo $this->_tpl_vars['hi_sel']; ?>
><?php echo $this->_tpl_vars['reg_lang']->JText('LBL_HINDI'); ?>
</option>
<option value="ma" <?php echo $this->_tpl_vars['ma_sel']; ?>
><?php echo $this->_tpl_vars['reg_lang']->JText('LBL_MARATHI'); ?>
</option>
<option value="gu" <?php echo $this->_tpl_vars['gu_sel']; ?>
><?php echo $this->_tpl_vars['reg_lang']->JText('LBL_GUJARAT'); ?>
</option>
</select> 

</div>