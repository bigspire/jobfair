<?php /* Smarty version 2.6.26, created on 2017-01-27 15:55:39
         compiled from registration.tpl */ ?>
<?php echo '
<style>
.qualification label{float:left;width:140px !important; }
ul.qualification li.clear { background:none !important; height: 22px !important;  border-bottom: 2px solid #efefef;}
.langDropDown{top:0 !important}
</style>
'; ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => '../include/top.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

    <!-- Primary Page Layout
================================================== -->
    <div id="headerContainer">
        <div class="container">
         
           <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => '../include/header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>           
         
		  
		   <form id="registration_step1" name="registration_step1" class="fileupload reg_forms" method="post" enctype="multipart/form-data">
            <!--HEADER-->
            <div class="innerPage">
				<div class="pageHeader">
			  <h1 class="pageTitle floatL"><?php echo $this->_tpl_vars['reg_lang']->JText('LBL_JOBSEEKER_REG'); ?>
</h1>
			  
			  <div style="float:left;height:10px;">					
					<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => '../include/lang_dropdown.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>						
              </div>
				
			  <h2 style="float:right"><span class="active"><a href="<?php echo $this->_tpl_vars['url']; ?>
<?php echo $this->_tpl_vars['language_url']; ?>
"><?php echo $this->_tpl_vars['menu_lang']->JText('LINK_HOME'); ?>
</a> <img src="<?php echo $this->_tpl_vars['url']; ?>
images/bullet_green3.png"></span> <?php echo $this->_tpl_vars['reg_lang']->JText('LBL_JOBSEEKER_REG'); ?>

                   </h2>
			
			
		
						
							
			</div>
			
		
							
			<div class="cf floatL mt25" id="pcColor">
						<!--div class="pcLeft errorField" style="<?php echo $this->_tpl_vars['field_error_disp']; ?>
"></div>
						<div class="profileComplete errorField" style="<?php echo $this->_tpl_vars['field_error_disp']; ?>
"><p><?php echo $this->_tpl_vars['reg_lang']->JText('MSG_ERROR_REG'); ?>
</p></div>
						<div class="pcRight errorField" style="<?php echo $this->_tpl_vars['field_error_disp']; ?>
"></div-->
			</div>
                
               
                <ul class="qualification cf regLeft">
                  <li>
                        <label>
                            <?php echo $this->_tpl_vars['reg_lang']->JText('LBL_FULL_NAME'); ?>
<sup>*</sup></label>
                        <div class="field<?php echo $this->_tpl_vars['error'][0][1]; ?>
">
							<?php if ($_POST['full_name']): ?>	
                            <?php $this->assign('name', $_POST['full_name']); ?>
							<?php else: ?>
							<?php $this->assign('name', $_GET['name']); ?>
							<?php endif; ?>
							<input name="full_name" placeholder="(Incl. Surname)" maxlength="100" id="full_name" class="largeBox"  value="<?php echo $this->_tpl_vars['name']; ?>
"/>
                            <span class="errorMsg"  style="<?php if ($this->_tpl_vars['error'][0][1] == ''): ?>display: none<?php endif; ?>"><?php echo $this->_tpl_vars['error'][0][0]; ?>
</span>
                        </div>
                    </li>
                    <li class="floatL">
                        <label>
                            <?php echo $this->_tpl_vars['reg_lang']->JText('LBL_MOBILE_NO1'); ?>
<sup>*</sup>
							
							</label>
							
                        <div class="field<?php echo $this->_tpl_vars['error'][1][1]; ?>
<?php if ($this->_tpl_vars['mobile_exists']): ?> message<?php endif; ?>">
							<?php if ($_POST['full_name']): ?>	
                            <?php $this->assign('mob', $_POST['mobile1']); ?>
							<?php else: ?>
							<?php $this->assign('mob', $_GET['mobile']); ?>
							<?php endif; ?>
							
						   <input name="mobile1" maxlength="11" class="frm_tip largeBox" id="mobile1" value="<?php echo $this->_tpl_vars['mob']; ?>
" title="<?php echo $this->_tpl_vars['reg_lang']->JText('TIP_MOBILE'); ?>
"/>
							<span class="errorMsg width_230" style="<?php if (( $this->_tpl_vars['error'][1][1] == '' ) && ( $this->_tpl_vars['mobile_exists_class'] == '' )): ?>display: none<?php endif; ?>"><?php echo $this->_tpl_vars['error'][1][0]; ?>
<?php echo $this->_tpl_vars['mobile_exists']; ?>
</span>
							</div>
							
                    </li>
					
					
					

							
								
							 <li>
                                    <label>
                                      <?php echo $this->_tpl_vars['reg_lang']->JText('LBL_HIGH_EDUCATION'); ?>
<sup>*</sup></label>
                                    <div class="field<?php echo $this->_tpl_vars['error'][4][1]; ?>
">
                                        <select name="after_school[]" id="after_school_inc" class="default-usage-select2 school_rel">
                                            <option value="">Qualification</option>
												<option value="6" <?php if ($_POST['after_school'][0] == '6'): ?> selectedindex="6" selected='selected' <?php endif; ?>>10<sup>th</sup></option>
												<option value="7" <?php if ($_POST['after_school'][0] == '7'): ?> selectedindex="7" selected='selected' <?php endif; ?>>12<sup>th</sup></option>
												<option value="1" <?php if ($_POST['after_school'][0] == '1'): ?> selectedindex="1" selected='selected' <?php endif; ?>>ITI/ Vocational/ Others</option>

												<option value="2" <?php if ($_POST['after_school'][0] == '2'): ?> selectedindex="2" selected='selected' <?php endif; ?>>Diploma Studies</option>
												<option value="3" <?php if ($_POST['after_school'][0] == '3'): ?> selectedindex="3" selected='selected' <?php endif; ?>>UG Programme</option>
												
												<option value="4" <?php if ($_POST['after_school'][0] == '4'): ?> selectedindex="4" selected='selected' <?php endif; ?>>PG Programme</option>

                                        </select>
										<span class="errorMsg" style="<?php if ($this->_tpl_vars['error'][4][1] == ''): ?>display: none<?php endif; ?>"><?php echo $this->_tpl_vars['error'][4][0]; ?>
</span>
										</div>
										
								
										
                                </li>

		
		<div class="degreeDiv"  style="display:none">
		<li>
                        <label>
                            <?php echo $this->_tpl_vars['reg_lang']->JText('LBL_DEGREE'); ?>
<sup>*</sup></label>
                        <div class="field_multiple">
                           
							
							<div class="field">
						
							<span class="field_multiple field<?php echo $this->_tpl_vars['error'][50][1]; ?>
">
                              <select name="degree[]" id="degree_inc" class="default-usage-select2">		
											<option value="">Degree</option>
										
												<?php unset($this->_sections['after_course']);
$this->_sections['after_course']['name'] = 'after_course';
$this->_sections['after_course']['loop'] = is_array($_loop=$this->_tpl_vars['after_course'][0]) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['after_course']['show'] = true;
$this->_sections['after_course']['max'] = $this->_sections['after_course']['loop'];
$this->_sections['after_course']['step'] = 1;
$this->_sections['after_course']['start'] = $this->_sections['after_course']['step'] > 0 ? 0 : $this->_sections['after_course']['loop']-1;
if ($this->_sections['after_course']['show']) {
    $this->_sections['after_course']['total'] = $this->_sections['after_course']['loop'];
    if ($this->_sections['after_course']['total'] == 0)
        $this->_sections['after_course']['show'] = false;
} else
    $this->_sections['after_course']['total'] = 0;
if ($this->_sections['after_course']['show']):

            for ($this->_sections['after_course']['index'] = $this->_sections['after_course']['start'], $this->_sections['after_course']['iteration'] = 1;
                 $this->_sections['after_course']['iteration'] <= $this->_sections['after_course']['total'];
                 $this->_sections['after_course']['index'] += $this->_sections['after_course']['step'], $this->_sections['after_course']['iteration']++):
$this->_sections['after_course']['rownum'] = $this->_sections['after_course']['iteration'];
$this->_sections['after_course']['index_prev'] = $this->_sections['after_course']['index'] - $this->_sections['after_course']['step'];
$this->_sections['after_course']['index_next'] = $this->_sections['after_course']['index'] + $this->_sections['after_course']['step'];
$this->_sections['after_course']['first']      = ($this->_sections['after_course']['iteration'] == 1);
$this->_sections['after_course']['last']       = ($this->_sections['after_course']['iteration'] == $this->_sections['after_course']['total']);
?>
												
												<option value="<?php echo $this->_tpl_vars['after_course'][0][$this->_sections['after_course']['index']]['id']; ?>
" <?php if ($_POST['degree'][0] == $this->_tpl_vars['after_course'][0][$this->_sections['after_course']['index']]['id']): ?> selectedindex="<?php echo $this->_tpl_vars['after_course'][0][$this->_sections['after_course']['index']]['index']+1; ?>
" selected="selected" <?php endif; ?>><?php echo $this->_tpl_vars['after_course'][0][$this->_sections['after_course']['index']]['course_name']; ?>
</option>
												<?php endfor; endif; ?>
									
										</select>
                                        <span class="errorMsg" style="<?php if ($this->_tpl_vars['error'][50][1] == ''): ?>display: none<?php endif; ?>"><?php echo $this->_tpl_vars['error'][50][0]; ?>
</span>
							</span>
							
						
                            </div>
							<div class="clearB"></div>
							<!--span class="errorMsg" style="margin-left: 20px; <?php if ($this->_tpl_vars['error'][3][1] == ''): ?>display: none<?php endif; ?>"><?php echo $this->_tpl_vars['error'][3][0]; ?>
</span-->
                        </div>
                    </li>

		<li>
                <label><?php echo $this->_tpl_vars['reg_lang']->JText('LBL_SPECIALIZATION'); ?>
 <sup>*</sup></label>
							
				<div class="field<?php echo $this->_tpl_vars['error'][60][1]; ?>
">
					<select name="departments[]" id="department_inc" class="default-usage-select2">		
						<option value="">Specialization</option>
						<?php if ($_POST['departments'][0] == '0'): ?>
							<option value="0" selected="selected" selectedindex="1">Nil</option>
						<?php else: ?>
							<?php unset($this->_sections['specialization']);
$this->_sections['specialization']['name'] = 'specialization';
$this->_sections['specialization']['loop'] = is_array($_loop=$this->_tpl_vars['specialization'][0]) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['specialization']['show'] = true;
$this->_sections['specialization']['max'] = $this->_sections['specialization']['loop'];
$this->_sections['specialization']['step'] = 1;
$this->_sections['specialization']['start'] = $this->_sections['specialization']['step'] > 0 ? 0 : $this->_sections['specialization']['loop']-1;
if ($this->_sections['specialization']['show']) {
    $this->_sections['specialization']['total'] = $this->_sections['specialization']['loop'];
    if ($this->_sections['specialization']['total'] == 0)
        $this->_sections['specialization']['show'] = false;
} else
    $this->_sections['specialization']['total'] = 0;
if ($this->_sections['specialization']['show']):

            for ($this->_sections['specialization']['index'] = $this->_sections['specialization']['start'], $this->_sections['specialization']['iteration'] = 1;
                 $this->_sections['specialization']['iteration'] <= $this->_sections['specialization']['total'];
                 $this->_sections['specialization']['index'] += $this->_sections['specialization']['step'], $this->_sections['specialization']['iteration']++):
$this->_sections['specialization']['rownum'] = $this->_sections['specialization']['iteration'];
$this->_sections['specialization']['index_prev'] = $this->_sections['specialization']['index'] - $this->_sections['specialization']['step'];
$this->_sections['specialization']['index_next'] = $this->_sections['specialization']['index'] + $this->_sections['specialization']['step'];
$this->_sections['specialization']['first']      = ($this->_sections['specialization']['iteration'] == 1);
$this->_sections['specialization']['last']       = ($this->_sections['specialization']['iteration'] == $this->_sections['specialization']['total']);
?>
								<option value="<?php echo $this->_tpl_vars['specialization'][0][$this->_sections['specialization']['index']]['id']; ?>
" <?php if ($_POST['departments'][0] == $this->_tpl_vars['specialization'][0][$this->_sections['specialization']['index']]['id']): ?> selectedindex="<?php echo $this->_tpl_vars['specialization'][0][$this->_sections['specialization']['index']]['index']+1; ?>
" selected="selected" <?php endif; ?>><?php echo $this->_tpl_vars['specialization'][0][$this->_sections['specialization']['index']]['specialization']; ?>
</option>
							<?php endfor; endif; ?>							
						<?php endif; ?>	
						
					</select>
					<span class="errorMsg"><?php echo $this->_tpl_vars['error'][60][0]; ?>
</span>
					
				
				</div>
               
              </li>
	
		</div>		  
			
							
			   <li>
                            <label>
                                <?php echo $this->_tpl_vars['reg_lang']->JText('LBL_TOTAL_EXP'); ?>
<sup>*</sup></label>
							<div class="error_total_exp">	
                            <div class="field<?php echo $this->_tpl_vars['error'][5][1]; ?>
">
                                <select name="exp_year" id="exp_year" class="default-usage-select2">
                                    <option value="">In Years</option>
									<option value="0" <?php if ($_POST['exp_year'] == '0'): ?> selectedindex="<?php echo 0; ?>
" selected='selected'<?php endif; ?>>Fresher</option>
									<?php unset($this->_sections['year']);
$this->_sections['year']['name'] = 'year';
$this->_sections['year']['start'] = (int)1;
$this->_sections['year']['loop'] = is_array($_loop=26) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['year']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['year']['show'] = true;
$this->_sections['year']['max'] = $this->_sections['year']['loop'];
if ($this->_sections['year']['start'] < 0)
    $this->_sections['year']['start'] = max($this->_sections['year']['step'] > 0 ? 0 : -1, $this->_sections['year']['loop'] + $this->_sections['year']['start']);
else
    $this->_sections['year']['start'] = min($this->_sections['year']['start'], $this->_sections['year']['step'] > 0 ? $this->_sections['year']['loop'] : $this->_sections['year']['loop']-1);
if ($this->_sections['year']['show']) {
    $this->_sections['year']['total'] = min(ceil(($this->_sections['year']['step'] > 0 ? $this->_sections['year']['loop'] - $this->_sections['year']['start'] : $this->_sections['year']['start']+1)/abs($this->_sections['year']['step'])), $this->_sections['year']['max']);
    if ($this->_sections['year']['total'] == 0)
        $this->_sections['year']['show'] = false;
} else
    $this->_sections['year']['total'] = 0;
if ($this->_sections['year']['show']):

            for ($this->_sections['year']['index'] = $this->_sections['year']['start'], $this->_sections['year']['iteration'] = 1;
                 $this->_sections['year']['iteration'] <= $this->_sections['year']['total'];
                 $this->_sections['year']['index'] += $this->_sections['year']['step'], $this->_sections['year']['iteration']++):
$this->_sections['year']['rownum'] = $this->_sections['year']['iteration'];
$this->_sections['year']['index_prev'] = $this->_sections['year']['index'] - $this->_sections['year']['step'];
$this->_sections['year']['index_next'] = $this->_sections['year']['index'] + $this->_sections['year']['step'];
$this->_sections['year']['first']      = ($this->_sections['year']['iteration'] == 1);
$this->_sections['year']['last']       = ($this->_sections['year']['iteration'] == $this->_sections['year']['total']);
?>									
										<option value="<?php echo $this->_sections['year']['index']; ?>
" <?php if ($_POST['exp_year'] == $this->_sections['year']['index']): ?> selectedindex="<?php echo $this->_sections['year']['index']+1; ?>
" selected='selected'<?php endif; ?>><?php echo $this->_sections['year']['index']; ?>
 Year<?php if ($this->_sections['year']['index'] != '1'): ?>s<?php endif; ?></option> 
									<?php endfor; endif; ?>
                                    </select>
									<span class="errorMsg width_230" style="<?php if ($this->_tpl_vars['error'][5][1] == ''): ?>display: none<?php endif; ?>"><?php echo $this->_tpl_vars['error'][5][0]; ?>
</span>  
							</div>
							 <div class="monthDiv" style="margin-left:163px;display:none">		
                                <select name="exp_month" id="exp_month" class="default-usage-select2">
                                    <option value="">In Months</option>
									<?php unset($this->_sections['month']);
$this->_sections['month']['name'] = 'month';
$this->_sections['month']['start'] = (int)1;
$this->_sections['month']['loop'] = is_array($_loop=12) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['month']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['month']['show'] = true;
$this->_sections['month']['max'] = $this->_sections['month']['loop'];
if ($this->_sections['month']['start'] < 0)
    $this->_sections['month']['start'] = max($this->_sections['month']['step'] > 0 ? 0 : -1, $this->_sections['month']['loop'] + $this->_sections['month']['start']);
else
    $this->_sections['month']['start'] = min($this->_sections['month']['start'], $this->_sections['month']['step'] > 0 ? $this->_sections['month']['loop'] : $this->_sections['month']['loop']-1);
if ($this->_sections['month']['show']) {
    $this->_sections['month']['total'] = min(ceil(($this->_sections['month']['step'] > 0 ? $this->_sections['month']['loop'] - $this->_sections['month']['start'] : $this->_sections['month']['start']+1)/abs($this->_sections['month']['step'])), $this->_sections['month']['max']);
    if ($this->_sections['month']['total'] == 0)
        $this->_sections['month']['show'] = false;
} else
    $this->_sections['month']['total'] = 0;
if ($this->_sections['month']['show']):

            for ($this->_sections['month']['index'] = $this->_sections['month']['start'], $this->_sections['month']['iteration'] = 1;
                 $this->_sections['month']['iteration'] <= $this->_sections['month']['total'];
                 $this->_sections['month']['index'] += $this->_sections['month']['step'], $this->_sections['month']['iteration']++):
$this->_sections['month']['rownum'] = $this->_sections['month']['iteration'];
$this->_sections['month']['index_prev'] = $this->_sections['month']['index'] - $this->_sections['month']['step'];
$this->_sections['month']['index_next'] = $this->_sections['month']['index'] + $this->_sections['month']['step'];
$this->_sections['month']['first']      = ($this->_sections['month']['iteration'] == 1);
$this->_sections['month']['last']       = ($this->_sections['month']['iteration'] == $this->_sections['month']['total']);
?>
										<option value="<?php echo $this->_sections['month']['index']; ?>
" <?php if ($_POST['exp_month'] == $this->_sections['month']['index']): ?> selectedindex="<?php echo $this->_sections['month']['index']+1; ?>
" selected='selected'<?php endif; ?>><?php echo $this->_sections['month']['index']; ?>
 Month<?php if ($this->_sections['month']['index'] != '1'): ?>s<?php endif; ?></option>
                                    <?php endfor; endif; ?>
                                </select>
								<span class="errorMsg width_230"><?php echo $this->_tpl_vars['error'][10][0]; ?>
</span>
                              
                            </div>
							
						  </div>
                        </li>
						
						<div class="industryDiv"  style="display:none">
						 <li>
						 <label>
                                Current Industry<sup>*</sup></label>
						   <div class="field<?php echo $this->_tpl_vars['indus_error_class']; ?>
">
                                   <select name="industry_user" id="industry_user" class="default-usage-select2" >
                                    <option value="">Industry</option>
									<?php unset($this->_sections['list_industry']);
$this->_sections['list_industry']['name'] = 'list_industry';
$this->_sections['list_industry']['loop'] = is_array($_loop=$this->_tpl_vars['list_industry']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['list_industry']['show'] = true;
$this->_sections['list_industry']['max'] = $this->_sections['list_industry']['loop'];
$this->_sections['list_industry']['step'] = 1;
$this->_sections['list_industry']['start'] = $this->_sections['list_industry']['step'] > 0 ? 0 : $this->_sections['list_industry']['loop']-1;
if ($this->_sections['list_industry']['show']) {
    $this->_sections['list_industry']['total'] = $this->_sections['list_industry']['loop'];
    if ($this->_sections['list_industry']['total'] == 0)
        $this->_sections['list_industry']['show'] = false;
} else
    $this->_sections['list_industry']['total'] = 0;
if ($this->_sections['list_industry']['show']):

            for ($this->_sections['list_industry']['index'] = $this->_sections['list_industry']['start'], $this->_sections['list_industry']['iteration'] = 1;
                 $this->_sections['list_industry']['iteration'] <= $this->_sections['list_industry']['total'];
                 $this->_sections['list_industry']['index'] += $this->_sections['list_industry']['step'], $this->_sections['list_industry']['iteration']++):
$this->_sections['list_industry']['rownum'] = $this->_sections['list_industry']['iteration'];
$this->_sections['list_industry']['index_prev'] = $this->_sections['list_industry']['index'] - $this->_sections['list_industry']['step'];
$this->_sections['list_industry']['index_next'] = $this->_sections['list_industry']['index'] + $this->_sections['list_industry']['step'];
$this->_sections['list_industry']['first']      = ($this->_sections['list_industry']['iteration'] == 1);
$this->_sections['list_industry']['last']       = ($this->_sections['list_industry']['iteration'] == $this->_sections['list_industry']['total']);
?>
                                    <option value="<?php echo $this->_tpl_vars['list_industry'][$this->_sections['list_industry']['index']]['id']; ?>
" <?php if ($_POST['industry_user'] == $this->_tpl_vars['list_industry'][$this->_sections['list_industry']['index']]['id']): ?> selectedindex="<?php echo $this->_tpl_vars['list_industry'][$this->_sections['list_industry']['index']]['index']+1; ?>
" selected='selected'<?php endif; ?>><?php echo $this->_tpl_vars['list_industry'][$this->_sections['list_industry']['index']]['industry_name']; ?>
</option>
                                    <?php endfor; endif; ?>
                                </select>
										<span class="errorMsg width_230" style="<?php if ($this->_tpl_vars['indus_error'] == ''): ?>display: none<?php endif; ?>"><?php echo $this->_tpl_vars['indus_error']; ?>
</span>
										</div>
			 </li>
					</div>
					
					
					      <li>
                            <label>
                                <?php echo $this->_tpl_vars['reg_lang']->JText('LBL_SKILL_SETS'); ?>
<sup>*</sup></label>
                            <div class="field<?php echo $this->_tpl_vars['error'][6][1]; ?>
">
                                <textarea rows="3" style="width:225px;" cols="10" name="skill_sets" id='skill_sets' class="frm_tip" title="Please mention your skill sets clearly, as this will be used as 'keywords' when companies search for relevant resumes."><?php echo $_POST['skill_sets']; ?>
</textarea>
                                <span class="errorMsg width_230" style="<?php if ($this->_tpl_vars['error'][6][1] == ''): ?>display: none<?php endif; ?>"><?php echo $this->_tpl_vars['error'][6][0]; ?>
</span>
                            </div>
                        </li>
					
			  <li>
						<label>
						<?php echo $this->_tpl_vars['reg_lang']->JText('LBL_RESUME'); ?>

						
						<span class="help-blurb with-icon">
<span class="text">?</span><span class="info-box"><span class="tp"><span class="i"></span></span><span class="md"><span class="i"> <?php echo $this->_tpl_vars['reg_lang']->JText('TIP_RESUME'); ?>
</span></span><span class="bt"><span class="i"></span></span></span>
</span>
						</label>	
                         <div class="field<?php echo $this->_tpl_vars['error'][70][1]; ?>
<?php echo $this->_tpl_vars['resume_error'][0][1]; ?>
">
                            <input name="job_resume" id="resume" type="file" style="height: 25px;" />
                            <span class="errorMsg width_230" style="<?php if (( $this->_tpl_vars['error'][70][1] == '' && $this->_tpl_vars['error'] ) || ( $this->_tpl_vars['resume_error'][0][1] == '' && $this->_tpl_vars['resume_error'] )): ?>display: none<?php endif; ?>"><?php echo $this->_tpl_vars['error'][70][0]; ?>
<?php echo $this->_tpl_vars['resume_error'][0][0]; ?>
</span>
                        </div>
                    </li>
			  
                    
                  
                    <!--li class="next cf width_bar">
                        <input type="hidden" id="validate_form" name="validate_reg_step" value="validate_reg_step" />
                        <input type="hidden" id="email_invalid" /><input type="hidden" id="mobile_invalid" />
						<input type="hidden" name="reg_focus_field" id="reg_focus_field" value="reg_focus_field"/>
							<input type="hidden" name="cur_action" id="cur_action" value="registration"/>
								<input type="hidden" name="cur_page" id="cur_page" value="registration"/>
								<input type="hidden" name="hdnSwitch" id="hdnSwitch" value="0"/>
							
                         <input type="submit"  value="submit" id="submit_form" class="rounded jsRedirect" style="display:none;" />

								 
								
								 <a href="javascript:void(0);">
                            <button style="margin-left:185px;"  name="go" class="small step2" id="form_submit" value="submit"  type="button">
                                <span><?php echo $this->_tpl_vars['reg_lang']->JText('LBL_STEP33'); ?>
 Register</span></button></a>
								
								
								<a href="<?php echo $this->_tpl_vars['url']; ?>
<?php echo $this->_tpl_vars['language_url']; ?>
login" rel="" id="close_later" class="laterContact" style="margin-left:10px;">Sign In</a>
								
								</li-->
                </ul>
				
				<ul class="qualification cf regRight">
               
					
				   <li class="floatL">
                        <label>
                            <?php echo $this->_tpl_vars['reg_lang']->JText('LBL_CURRENT_LOC'); ?>
<sup>*</sup>
							
							</label>
							
                        <div class="field<?php echo $this->_tpl_vars['error'][2][1]; ?>
">
                            
							  <select name="cstate" id="cstate" class="default-usage-select2" >
                                    <option value="">State</option>
									<?php unset($this->_sections['list_states']);
$this->_sections['list_states']['name'] = 'list_states';
$this->_sections['list_states']['loop'] = is_array($_loop=$this->_tpl_vars['list_states']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['list_states']['show'] = true;
$this->_sections['list_states']['max'] = $this->_sections['list_states']['loop'];
$this->_sections['list_states']['step'] = 1;
$this->_sections['list_states']['start'] = $this->_sections['list_states']['step'] > 0 ? 0 : $this->_sections['list_states']['loop']-1;
if ($this->_sections['list_states']['show']) {
    $this->_sections['list_states']['total'] = $this->_sections['list_states']['loop'];
    if ($this->_sections['list_states']['total'] == 0)
        $this->_sections['list_states']['show'] = false;
} else
    $this->_sections['list_states']['total'] = 0;
if ($this->_sections['list_states']['show']):

            for ($this->_sections['list_states']['index'] = $this->_sections['list_states']['start'], $this->_sections['list_states']['iteration'] = 1;
                 $this->_sections['list_states']['iteration'] <= $this->_sections['list_states']['total'];
                 $this->_sections['list_states']['index'] += $this->_sections['list_states']['step'], $this->_sections['list_states']['iteration']++):
$this->_sections['list_states']['rownum'] = $this->_sections['list_states']['iteration'];
$this->_sections['list_states']['index_prev'] = $this->_sections['list_states']['index'] - $this->_sections['list_states']['step'];
$this->_sections['list_states']['index_next'] = $this->_sections['list_states']['index'] + $this->_sections['list_states']['step'];
$this->_sections['list_states']['first']      = ($this->_sections['list_states']['iteration'] == 1);
$this->_sections['list_states']['last']       = ($this->_sections['list_states']['iteration'] == $this->_sections['list_states']['total']);
?>
                                    <option value="<?php echo $this->_tpl_vars['list_states'][$this->_sections['list_states']['index']]['id']; ?>
" <?php if ($_POST['cstate'] == $this->_tpl_vars['list_states'][$this->_sections['list_states']['index']]['id']): ?> selectedindex="<?php echo $this->_tpl_vars['list_states'][$this->_sections['list_states']['index']]['index']+1; ?>
" selected='selected'<?php endif; ?>><?php echo $this->_tpl_vars['list_states'][$this->_sections['list_states']['index']]['state_name']; ?>
</option>
                                    <?php endfor; endif; ?>
                                </select>
								<span class="errorMsg width_155" style="<?php if ($this->_tpl_vars['error'][2][1] == ''): ?>display: none;<?php endif; ?>"><?php echo $this->_tpl_vars['error'][2][0]; ?>
</span>
							</div>
							
                    </li>
					
					 <li class="floatL">
                        <label>
                            District <sup>*</sup>
							
							</label>
							
                        <div class="field<?php echo $this->_tpl_vars['error'][3][1]; ?>
">
                            
						<select name="cdistrict" id="cdistrict" class="default-usage-select2" >
                                <option value="District">District</option>
									<?php if ($_POST['cstate'] > '0'): ?>
									<?php unset($this->_sections['list_cdistricts']);
$this->_sections['list_cdistricts']['name'] = 'list_cdistricts';
$this->_sections['list_cdistricts']['loop'] = is_array($_loop=$this->_tpl_vars['list_cdistricts']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['list_cdistricts']['show'] = true;
$this->_sections['list_cdistricts']['max'] = $this->_sections['list_cdistricts']['loop'];
$this->_sections['list_cdistricts']['step'] = 1;
$this->_sections['list_cdistricts']['start'] = $this->_sections['list_cdistricts']['step'] > 0 ? 0 : $this->_sections['list_cdistricts']['loop']-1;
if ($this->_sections['list_cdistricts']['show']) {
    $this->_sections['list_cdistricts']['total'] = $this->_sections['list_cdistricts']['loop'];
    if ($this->_sections['list_cdistricts']['total'] == 0)
        $this->_sections['list_cdistricts']['show'] = false;
} else
    $this->_sections['list_cdistricts']['total'] = 0;
if ($this->_sections['list_cdistricts']['show']):

            for ($this->_sections['list_cdistricts']['index'] = $this->_sections['list_cdistricts']['start'], $this->_sections['list_cdistricts']['iteration'] = 1;
                 $this->_sections['list_cdistricts']['iteration'] <= $this->_sections['list_cdistricts']['total'];
                 $this->_sections['list_cdistricts']['index'] += $this->_sections['list_cdistricts']['step'], $this->_sections['list_cdistricts']['iteration']++):
$this->_sections['list_cdistricts']['rownum'] = $this->_sections['list_cdistricts']['iteration'];
$this->_sections['list_cdistricts']['index_prev'] = $this->_sections['list_cdistricts']['index'] - $this->_sections['list_cdistricts']['step'];
$this->_sections['list_cdistricts']['index_next'] = $this->_sections['list_cdistricts']['index'] + $this->_sections['list_cdistricts']['step'];
$this->_sections['list_cdistricts']['first']      = ($this->_sections['list_cdistricts']['iteration'] == 1);
$this->_sections['list_cdistricts']['last']       = ($this->_sections['list_cdistricts']['iteration'] == $this->_sections['list_cdistricts']['total']);
?>
                                    <option value="<?php echo $this->_tpl_vars['list_cdistricts'][$this->_sections['list_cdistricts']['index']]['id']; ?>
" <?php if ($_POST['cdistrict'] == $this->_tpl_vars['list_cdistricts'][$this->_sections['list_cdistricts']['index']]['id']): ?> selectedindex="<?php echo $this->_tpl_vars['list_cdistricts'][$this->_sections['list_cdistricts']['index']]['index']+1; ?>
" selected="selected" <?php endif; ?>><?php echo $this->_tpl_vars['list_cdistricts'][$this->_sections['list_cdistricts']['index']]['district_name']; ?>
</option>
                                    <?php endfor; endif; ?>
									<?php endif; ?>
                                </select>
								<span class="errorMsg width_155" style="<?php if ($this->_tpl_vars['error'][3][1] == ''): ?>display: none;<?php endif; ?>"><?php echo $this->_tpl_vars['error'][3][0]; ?>
</span>
							</div>
							
                    </li>
					
					
			      
                    <li>
                        <label>
                           <?php echo $this->_tpl_vars['reg_lang']->JText('LBL_EMAIL_ADDRESS'); ?>
 <sup>*</sup>
                        </label>
                        <div class="field<?php echo $this->_tpl_vars['error'][7][1]; ?>
<?php echo $this->_tpl_vars['email_exists_class']; ?>
">
                            <?php if ($_POST['email_address']): ?>	
                            <?php $this->assign('mail', $_POST['email_address']); ?>
							<?php else: ?>
							<?php $this->assign('mail', $_GET['email']); ?>
							<?php endif; ?>
							
							<input name="email_address" maxlength="200" id="email_address" class="frm_tip largeBox" title="<?php echo $this->_tpl_vars['reg_lang']->JText('TIP_EMAIL_ADDRESS'); ?>
" value='<?php if ($this->_tpl_vars['mail'] != ''): ?><?php echo $this->_tpl_vars['mail']; ?>
<?php elseif ($this->_tpl_vars['refer_email'] != ''): ?><?php echo $this->_tpl_vars['refer_email']; ?>
<?php else: ?><?php echo $_SESSION['user_email_address']; ?>
<?php endif; ?>'/>
							
                            <span class="errorMsg width_230" style="<?php if (( $this->_tpl_vars['error'][7][1] == '' ) && ( $this->_tpl_vars['email_exists_class'] == '' )): ?>display: none<?php endif; ?>"><?php echo $this->_tpl_vars['error'][7][0]; ?>
<?php echo $this->_tpl_vars['email_exists']; ?>
</span>
							<span class="available width_230" style="<?php echo $this->_tpl_vars['mail_available']; ?>
"><?php echo $this->_tpl_vars['reg_lang']->JText('MSG_EMAIL_AVAILABLE'); ?>
</span>
                        </div>
                    </li> 
                    <li>
                        <label>
                            <?php echo $this->_tpl_vars['reg_lang']->JText('LBL_PASSWORD'); ?>
 <sup>*</sup>
										</label>
							<div class="field<?php echo $this->_tpl_vars['error'][8][1]; ?>
">
                            <input type="password" name="password" maxlength="32" id="password" title="<?php echo $this->_tpl_vars['reg_lang']->JText('TIP_PASSWORD'); ?>
" class="frm_tip largeBox"/>
                            <span class="errorMsg width_230" style="<?php if (( $this->_tpl_vars['error'][8][1] == '' )): ?>display: none<?php endif; ?>"><?php echo $this->_tpl_vars['error'][8][0]; ?>
</span>
							</div>
                    </li> 
                    <li>
                        <label>
                            <?php echo $this->_tpl_vars['reg_lang']->JText('LBL_CON_PASSWORD'); ?>
 <sup>*</sup>
										</label>
							<div class="field<?php echo $this->_tpl_vars['error'][9][1]; ?>
<?php echo $this->_tpl_vars['password_mismatch_class']; ?>
">
                            <input type="password" name="cpassword" maxlength="32" id="cpassword" title="<?php echo $this->_tpl_vars['reg_lang']->JText('TIP_CON_PASSWORD'); ?>
" class="frm_tip largeBox"/>
                            <span class="errorMsg width_230" style="<?php if (( $this->_tpl_vars['error'][9][1] == '' ) && ( $this->_tpl_vars['password_mismatch_class'] == '' )): ?>display: none<?php endif; ?>"><?php echo $this->_tpl_vars['error'][9][0]; ?>
<?php echo $this->_tpl_vars['password_mismatch']; ?>
</span>
							</div>
                    </li> 
					
					 <li class="floatL">
                        <label>
                           <?php echo $this->_tpl_vars['reg_lang']->JText('LBL_HOW_KNOW_JOBFAC'); ?>

							
							</label>
							
                        <div class="field">
						<select name="reference" id="reference" class="default-usage-select2" >
                                    <option value="">Select</option>
									<?php unset($this->_sections['list_reference']);
$this->_sections['list_reference']['name'] = 'list_reference';
$this->_sections['list_reference']['loop'] = is_array($_loop=$this->_tpl_vars['list_reference']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['list_reference']['show'] = true;
$this->_sections['list_reference']['max'] = $this->_sections['list_reference']['loop'];
$this->_sections['list_reference']['step'] = 1;
$this->_sections['list_reference']['start'] = $this->_sections['list_reference']['step'] > 0 ? 0 : $this->_sections['list_reference']['loop']-1;
if ($this->_sections['list_reference']['show']) {
    $this->_sections['list_reference']['total'] = $this->_sections['list_reference']['loop'];
    if ($this->_sections['list_reference']['total'] == 0)
        $this->_sections['list_reference']['show'] = false;
} else
    $this->_sections['list_reference']['total'] = 0;
if ($this->_sections['list_reference']['show']):

            for ($this->_sections['list_reference']['index'] = $this->_sections['list_reference']['start'], $this->_sections['list_reference']['iteration'] = 1;
                 $this->_sections['list_reference']['iteration'] <= $this->_sections['list_reference']['total'];
                 $this->_sections['list_reference']['index'] += $this->_sections['list_reference']['step'], $this->_sections['list_reference']['iteration']++):
$this->_sections['list_reference']['rownum'] = $this->_sections['list_reference']['iteration'];
$this->_sections['list_reference']['index_prev'] = $this->_sections['list_reference']['index'] - $this->_sections['list_reference']['step'];
$this->_sections['list_reference']['index_next'] = $this->_sections['list_reference']['index'] + $this->_sections['list_reference']['step'];
$this->_sections['list_reference']['first']      = ($this->_sections['list_reference']['iteration'] == 1);
$this->_sections['list_reference']['last']       = ($this->_sections['list_reference']['iteration'] == $this->_sections['list_reference']['total']);
?>
                                    <option value="<?php echo $this->_tpl_vars['list_reference'][$this->_sections['list_reference']['index']]['id']; ?>
" <?php if ($_POST['reference'] == $this->_tpl_vars['list_reference'][$this->_sections['list_reference']['index']]['id']): ?> selectedindex="<?php echo $this->_tpl_vars['list_reference'][$this->_sections['list_reference']['index']]['index']+1; ?>
" selected='selected'<?php endif; ?>><?php echo $this->_tpl_vars['list_reference'][$this->_sections['list_reference']['index']]['title']; ?>
</option>
                                    <?php endfor; endif; ?>
                                </select>
								
						<input type="text" style="display:none" maxlength="60" id="refer_others"  value="<?php echo $_POST['refer_others']; ?>
" class="largeBox"  name="refer_others">

							</div>
							
                    </li>
					
					
						<li>
                        <label>
                            <?php echo $this->_tpl_vars['reg_lang']->JText('LBL_REFERRAL_CODE'); ?>
<span class="help-blurb with-icon">
<span class="text">?</span><span class="info-box"><span class="tp"><span class="i"></span></span><span class="md"><span class="i"><?php echo $this->_tpl_vars['reg_lang']->JText('TIP_REFERRAL_CODE'); ?>
</span></span><span class="bt"><span class="i"></span></span></span>
</span>
						</label>
						<div class="field">
						<input type="text" id="referral_code"  value="<?php echo $_POST['referral_code']; ?>
" class="largeBox" maxlength="6" name="referral_code">
								<span class="available" style="display:none;"><?php echo $this->_tpl_vars['reg_lang']->JText('MSG_VALID_CODE'); ?>
</span>
						</div>
					</li>

					

                  
                </ul>
				
				  <div class="next cf  newReg" style="float:left;clear:both;">
                        <input type="hidden" id="validate_form" name="validate_reg_step" value="validate_reg_step" />
                        <input type="hidden" id="email_invalid" /><input type="hidden" id="mobile_invalid" />
						<input type="hidden" name="reg_focus_field" id="reg_focus_field" value="reg_focus_field"/>
							<input type="hidden" name="cur_action" id="cur_action" value="registration"/>
								<input type="hidden" name="cur_page" id="cur_page" value="registration"/>
								<input type="hidden" name="hdnSwitch" id="hdnSwitch" value="0"/>
							
                         <input type="submit"  value="submit" id="submit_form" class="rounded jsRedirect" style="display:none;" />

								 
								
								 <a href="javascript:void(0);">
                            <button style="margin-left:350px;"  name="go" class="small step2" id="form_submit" value="submit"  type="button">
                                <span><?php echo $this->_tpl_vars['reg_lang']->JText('LBL_REGISTER'); ?>
</span></button></a>
								
								
								<a href="<?php echo $this->_tpl_vars['url']; ?>
<?php echo $this->_tpl_vars['language_url']; ?>
login" rel="" id="close_later" class="laterContact" style="margin-left:10px;">Sign In</a>
								
								</div>
				<!--input type="submit" name="hdnFrm" value="hdnFrm" style="display:" id="hdnFrm"/-->
                </form>
            </div>
        </div>
        <!--CONTAINER-->
    </div>
    <!--HEADER CONTAINER-->
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => '../include/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>	  
	
	<input type="hidden" value="0" id="contact_popup"/>