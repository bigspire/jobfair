<?php /* Smarty version 2.6.26, created on 2017-08-18 16:41:13
         compiled from index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'capitalize', 'index.tpl', 119, false),array('modifier', 'truncate', 'index.tpl', 119, false),)), $this); ?>
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
          <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => '../include/search.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> 
            <div id="topHeader" class="cf">
                <div class="leftCarousel slider-wrapper theme-default">
                    <div id="slider" class="nivoSlider">
					<img src="<?php echo $this->_tpl_vars['url']; ?>
images/jobs_everyone.jpg" width="639">
                    <img src="<?php echo $this->_tpl_vars['url']; ?>
images/young_india.jpg" width="639">
					<img src="<?php echo $this->_tpl_vars['url']; ?>
images/creating_livelihoods.jpg" width="639">
					<img src="<?php echo $this->_tpl_vars['url']; ?>
images/community_outreach.jpg" width="639">						
                    </div>
					
					   <form action="registration/">
					   
                <div class="sliderContent">
				<?php if ($_SESSION['user_id'] == ''): ?>
                    <button class="red" type="submit">
                        <span><?php echo $this->_tpl_vars['news_lang']->JText('BTN_REGISTER'); ?>
</span></button>
						<?php endif; ?>
                </div>
				
                </form>
                </div>
               <div class="rightContainer" id="">
				<div id="jFtabs" class="jFtabs">
						<ul id="tabs-menu" class="tabs-menu">
						<li><a  href="#user" class="selected first">Jobseekers</a></li>
						<li><a href="#emp" class="">Employers</a></li>
						<li><a class="last" href="#col">Colleges</a></li>
					</ul>
						
						<div id="jobsTab">
						<div id="user" class="expand">
							<ul >
								<li>Wide-ranging opportunities </li>
								<li>Auto resume generation </li>
								<li>Participate in job fairs</li>
								<li>Earning reward points and gifts</li>
								<li>Perform self-assessment</li>
								<li>Online career counseling services</li>
								<li>Understand and prepare for hot jobs</li>
							</ul>
								<p class="readmore"><a href="<?php echo $this->_tpl_vars['url']; ?>
how_it_works/">Read More >></a></p>
							
						</div>
					
						<div id="emp"  class="nd collapsed">
						<ul>
								<li>Registered pool of candidates</li>
								<li>Unrestricted access to the database</li>
								<li>Interview calls through sms </li>
								<li>Invitation to attend the job fairs</li>
								<li>Customized job postings</li>
								<li>Client managed user-access control</li>
								<li>Customized pay option</li>
									
							</ul>
									<p class="readmore"><a href="<?php echo $this->_tpl_vars['url']; ?>
how_it_works/">Read More >></a></p>
							
						</div>
						
						<div id="col" class="nd collapsed" >
						
							<ul>
								<li>Access to Reputed companies</li>
								<li>Exclusive web space</li>
								<li>Invite Employers to your campus </li>
								<li>Live dash board for effective usage</li>
								<li>Photo Galleries of the events</li>
								<li>Customized pay options</li>
								<li>Instant data of the Placed Students</li>
								
							</ul>
									<p class="readmore"><a href="<?php echo $this->_tpl_vars['url']; ?>
how_it_works/">Read More >></a></p>
							
						</div>
					</div>
					
					</div>		
				
                </div>
         
            </div>
			
			
			<!--CATEGORY-->
            <div class="cf recentAct">
                <div class="recentJobs empLogos">
                    <!--h2>
                       <?php echo $this->_tpl_vars['menu_lang']->JText('TIT_HOT_JOBS'); ?>
</h2-->
					     <h2> Top Employers
                       </h2>
				
                    <div class="cf" >
					
                        <div class="slideshow" id="logo_updates">
                        </div>
                    </div>
                </div>
               
				
                <!--REFER FRIEND-->
            </div>
            
			<!--TOP HEADER-->
            <div id="category" class="cf">
                <div class="categoryCol">
                    <h2 class="location" style="padding-left: 40px;">
                       <?php echo $this->_tpl_vars['menu_lang']->JText('TIT_JOB_LOCATION'); ?>
</h2>
                    <ul class="cf">
					<?php $this->assign('index', 0); ?>
					<?php $_from = $this->_tpl_vars['location_name_count']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
						<?php if ($this->_tpl_vars['jobs_location'][$this->_tpl_vars['k']]['location'] != ''): ?>
						<?php if ($this->_tpl_vars['index'] < 18): ?>
							<?php $this->assign('tlocation', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['jobs_location'][$this->_tpl_vars['k']]['location'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 12, "..", true) : smarty_modifier_truncate($_tmp, 12, "..", true))); ?>
							<li><a  <?php if ($this->_tpl_vars['tlocation'] != ((is_array($_tmp=$this->_tpl_vars['jobs_location'][$this->_tpl_vars['k']]['location'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp))): ?> class="tipN" original-title="<?php echo ((is_array($_tmp=$this->_tpl_vars['jobs_location'][$this->_tpl_vars['k']]['location'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
"<?php endif; ?> href="<?php echo $this->_tpl_vars['url']; ?>
<?php echo $this->_tpl_vars['language_url']; ?>
search_jobs/?location=<?php echo $this->_tpl_vars['jobs_location'][$this->_tpl_vars['k']]['url_location']; ?>
&searchby=locations" ><?php echo $this->_tpl_vars['tlocation']; ?>
</a></li>
						<?php $this->assign('index', $this->_tpl_vars['index']+1); ?>
						<?php endif; ?>
						<?php endif; ?>
					<?php endforeach; endif; unset($_from); ?>
					
                    </ul>
                    <p>
                        <a href="<?php echo $this->_tpl_vars['url']; ?>
<?php echo $this->_tpl_vars['language_url']; ?>
more_location/"><?php echo $this->_tpl_vars['menu_lang']->JText('LINK_MORE_LOCATIONS'); ?>
</a> </p>
                </div>
				
				
				      <!--div class="categoryCol">
                    <h2 class="company">
                        <?php echo $this->_tpl_vars['menu_lang']->JText('TIT_JOB_COMPANY'); ?>
</h2>
                    <ul class="cf">
					<?php unset($this->_sections['jobs_com']);
$this->_sections['jobs_com']['name'] = 'jobs_com';
$this->_sections['jobs_com']['loop'] = is_array($_loop=$this->_tpl_vars['jobs_company']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['jobs_com']['show'] = true;
$this->_sections['jobs_com']['max'] = $this->_sections['jobs_com']['loop'];
$this->_sections['jobs_com']['step'] = 1;
$this->_sections['jobs_com']['start'] = $this->_sections['jobs_com']['step'] > 0 ? 0 : $this->_sections['jobs_com']['loop']-1;
if ($this->_sections['jobs_com']['show']) {
    $this->_sections['jobs_com']['total'] = $this->_sections['jobs_com']['loop'];
    if ($this->_sections['jobs_com']['total'] == 0)
        $this->_sections['jobs_com']['show'] = false;
} else
    $this->_sections['jobs_com']['total'] = 0;
if ($this->_sections['jobs_com']['show']):

            for ($this->_sections['jobs_com']['index'] = $this->_sections['jobs_com']['start'], $this->_sections['jobs_com']['iteration'] = 1;
                 $this->_sections['jobs_com']['iteration'] <= $this->_sections['jobs_com']['total'];
                 $this->_sections['jobs_com']['index'] += $this->_sections['jobs_com']['step'], $this->_sections['jobs_com']['iteration']++):
$this->_sections['jobs_com']['rownum'] = $this->_sections['jobs_com']['iteration'];
$this->_sections['jobs_com']['index_prev'] = $this->_sections['jobs_com']['index'] - $this->_sections['jobs_com']['step'];
$this->_sections['jobs_com']['index_next'] = $this->_sections['jobs_com']['index'] + $this->_sections['jobs_com']['step'];
$this->_sections['jobs_com']['first']      = ($this->_sections['jobs_com']['iteration'] == 1);
$this->_sections['jobs_com']['last']       = ($this->_sections['jobs_com']['iteration'] == $this->_sections['jobs_com']['total']);
?>	
						<?php $this->assign('tcompany', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['jobs_company'][$this->_sections['jobs_com']['index']]['company_name'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 13, "..", true) : smarty_modifier_truncate($_tmp, 13, "..", true))); ?>
                        <li><a <?php if ($this->_tpl_vars['tcompany'] != ((is_array($_tmp=$this->_tpl_vars['jobs_company'][$this->_sections['jobs_com']['index']]['company_name'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp))): ?> class="tipN" original-title="<?php echo ((is_array($_tmp=$this->_tpl_vars['jobs_company'][$this->_sections['jobs_com']['index']]['company_name'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
"<?php endif; ?> href="<?php echo $this->_tpl_vars['url']; ?>
<?php echo $this->_tpl_vars['language_url']; ?>
search_jobs/?keywords=&company=<?php echo $this->_tpl_vars['jobs_company'][$this->_sections['jobs_com']['index']]['url_company_name']; ?>
&searchby=companies"><?php echo $this->_tpl_vars['tcompany']; ?>
</a></li>
                    <?php endfor; endif; ?>  
                    </ul>
                    <p>
                        <a href="<?php echo $this->_tpl_vars['url']; ?>
<?php echo $this->_tpl_vars['language_url']; ?>
more_company/"><?php echo $this->_tpl_vars['menu_lang']->JText('LINK_MORE_COMPANIES'); ?>
</a></p>
                </div-->
				
                <div class="categoryCol">
                    <h2 class="company">
                        <?php echo $this->_tpl_vars['menu_lang']->JText('TIT_JOB_DEPT'); ?>
</h2>
                    <ul class="cf">
					<?php unset($this->_sections['jobs_com']);
$this->_sections['jobs_com']['name'] = 'jobs_com';
$this->_sections['jobs_com']['loop'] = is_array($_loop=$this->_tpl_vars['jobs_dept']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['jobs_com']['show'] = true;
$this->_sections['jobs_com']['max'] = $this->_sections['jobs_com']['loop'];
$this->_sections['jobs_com']['step'] = 1;
$this->_sections['jobs_com']['start'] = $this->_sections['jobs_com']['step'] > 0 ? 0 : $this->_sections['jobs_com']['loop']-1;
if ($this->_sections['jobs_com']['show']) {
    $this->_sections['jobs_com']['total'] = $this->_sections['jobs_com']['loop'];
    if ($this->_sections['jobs_com']['total'] == 0)
        $this->_sections['jobs_com']['show'] = false;
} else
    $this->_sections['jobs_com']['total'] = 0;
if ($this->_sections['jobs_com']['show']):

            for ($this->_sections['jobs_com']['index'] = $this->_sections['jobs_com']['start'], $this->_sections['jobs_com']['iteration'] = 1;
                 $this->_sections['jobs_com']['iteration'] <= $this->_sections['jobs_com']['total'];
                 $this->_sections['jobs_com']['index'] += $this->_sections['jobs_com']['step'], $this->_sections['jobs_com']['iteration']++):
$this->_sections['jobs_com']['rownum'] = $this->_sections['jobs_com']['iteration'];
$this->_sections['jobs_com']['index_prev'] = $this->_sections['jobs_com']['index'] - $this->_sections['jobs_com']['step'];
$this->_sections['jobs_com']['index_next'] = $this->_sections['jobs_com']['index'] + $this->_sections['jobs_com']['step'];
$this->_sections['jobs_com']['first']      = ($this->_sections['jobs_com']['iteration'] == 1);
$this->_sections['jobs_com']['last']       = ($this->_sections['jobs_com']['iteration'] == $this->_sections['jobs_com']['total']);
?>	
						<?php $this->assign('tcompany', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['jobs_dept'][$this->_sections['jobs_com']['index']]['department'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 13, "..", true) : smarty_modifier_truncate($_tmp, 13, "..", true))); ?>
                        <li><a <?php if ($this->_tpl_vars['tcompany'] != ((is_array($_tmp=$this->_tpl_vars['jobs_dept'][$this->_sections['jobs_com']['index']]['department'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp))): ?> class="tipN" original-title="<?php echo ((is_array($_tmp=$this->_tpl_vars['jobs_dept'][$this->_sections['jobs_com']['index']]['department'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
"<?php endif; ?> href="<?php echo $this->_tpl_vars['url']; ?>
<?php echo $this->_tpl_vars['language_url']; ?>
search_jobs/?keywords=&department=<?php echo $this->_tpl_vars['jobs_dept'][$this->_sections['jobs_com']['index']]['department']; ?>
&searchby=departments"><?php echo $this->_tpl_vars['tcompany']; ?>
</a></li>
                    <?php endfor; endif; ?>  
                    </ul>
                    <p>
                        <a href="<?php echo $this->_tpl_vars['url']; ?>
<?php echo $this->_tpl_vars['language_url']; ?>
more_department/"><?php echo $this->_tpl_vars['menu_lang']->JText('LINK_MORE_DEPARTMENT'); ?>
</a></p>
                </div>
				
				
                <div class="categoryCol last">
                    <h2 class="industry">
                        <?php echo $this->_tpl_vars['menu_lang']->JText('TIT_JOB_INDUSTRY'); ?>
</h2>
                    <ul class="cf">
					<?php unset($this->_sections['jobs_ind']);
$this->_sections['jobs_ind']['name'] = 'jobs_ind';
$this->_sections['jobs_ind']['loop'] = is_array($_loop=$this->_tpl_vars['jobs_industry']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['jobs_ind']['show'] = true;
$this->_sections['jobs_ind']['max'] = $this->_sections['jobs_ind']['loop'];
$this->_sections['jobs_ind']['step'] = 1;
$this->_sections['jobs_ind']['start'] = $this->_sections['jobs_ind']['step'] > 0 ? 0 : $this->_sections['jobs_ind']['loop']-1;
if ($this->_sections['jobs_ind']['show']) {
    $this->_sections['jobs_ind']['total'] = $this->_sections['jobs_ind']['loop'];
    if ($this->_sections['jobs_ind']['total'] == 0)
        $this->_sections['jobs_ind']['show'] = false;
} else
    $this->_sections['jobs_ind']['total'] = 0;
if ($this->_sections['jobs_ind']['show']):

            for ($this->_sections['jobs_ind']['index'] = $this->_sections['jobs_ind']['start'], $this->_sections['jobs_ind']['iteration'] = 1;
                 $this->_sections['jobs_ind']['iteration'] <= $this->_sections['jobs_ind']['total'];
                 $this->_sections['jobs_ind']['index'] += $this->_sections['jobs_ind']['step'], $this->_sections['jobs_ind']['iteration']++):
$this->_sections['jobs_ind']['rownum'] = $this->_sections['jobs_ind']['iteration'];
$this->_sections['jobs_ind']['index_prev'] = $this->_sections['jobs_ind']['index'] - $this->_sections['jobs_ind']['step'];
$this->_sections['jobs_ind']['index_next'] = $this->_sections['jobs_ind']['index'] + $this->_sections['jobs_ind']['step'];
$this->_sections['jobs_ind']['first']      = ($this->_sections['jobs_ind']['iteration'] == 1);
$this->_sections['jobs_ind']['last']       = ($this->_sections['jobs_ind']['iteration'] == $this->_sections['jobs_ind']['total']);
?>
					<?php $this->assign('tindustry', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['jobs_industry'][$this->_sections['jobs_ind']['index']]['industry_name'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 13, "..", true) : smarty_modifier_truncate($_tmp, 13, "..", true))); ?>
                        <li><a <?php if ($this->_tpl_vars['tindustry'] != ((is_array($_tmp=$this->_tpl_vars['jobs_industry'][$this->_sections['jobs_ind']['index']]['industry_name'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp))): ?> class="tipN" original-title="<?php echo ((is_array($_tmp=$this->_tpl_vars['jobs_industry'][$this->_sections['jobs_ind']['index']]['industry_name'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
"<?php endif; ?> href="<?php echo $this->_tpl_vars['url']; ?>
<?php echo $this->_tpl_vars['language_url']; ?>
search_jobs/?industries=<?php echo $this->_tpl_vars['jobs_industry'][$this->_sections['jobs_ind']['index']]['industry_name']; ?>
&searchby=industry" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['jobs_industry'][$this->_sections['jobs_ind']['index']]['industry_name'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
" ><?php echo $this->_tpl_vars['tindustry']; ?>
</a></li>
                    <?php endfor; endif; ?>  
                    </ul>
                    <p>
					
                        <a href="<?php echo $this->_tpl_vars['url']; ?>
<?php echo $this->_tpl_vars['language_url']; ?>
more_industry/"><?php echo $this->_tpl_vars['menu_lang']->JText('LINK_MORE_INDUSTRIES'); ?>
</a></p>
                </div>
            </div>


			

<?php unset($this->_sections['testi']);
$this->_sections['testi']['name'] = 'testi';
$this->_sections['testi']['loop'] = is_array($_loop=$this->_tpl_vars['testimonial_data']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['testi']['show'] = true;
$this->_sections['testi']['max'] = $this->_sections['testi']['loop'];
$this->_sections['testi']['step'] = 1;
$this->_sections['testi']['start'] = $this->_sections['testi']['step'] > 0 ? 0 : $this->_sections['testi']['loop']-1;
if ($this->_sections['testi']['show']) {
    $this->_sections['testi']['total'] = $this->_sections['testi']['loop'];
    if ($this->_sections['testi']['total'] == 0)
        $this->_sections['testi']['show'] = false;
} else
    $this->_sections['testi']['total'] = 0;
if ($this->_sections['testi']['show']):

            for ($this->_sections['testi']['index'] = $this->_sections['testi']['start'], $this->_sections['testi']['iteration'] = 1;
                 $this->_sections['testi']['iteration'] <= $this->_sections['testi']['total'];
                 $this->_sections['testi']['index'] += $this->_sections['testi']['step'], $this->_sections['testi']['iteration']++):
$this->_sections['testi']['rownum'] = $this->_sections['testi']['iteration'];
$this->_sections['testi']['index_prev'] = $this->_sections['testi']['index'] - $this->_sections['testi']['step'];
$this->_sections['testi']['index_next'] = $this->_sections['testi']['index'] + $this->_sections['testi']['step'];
$this->_sections['testi']['first']      = ($this->_sections['testi']['iteration'] == 1);
$this->_sections['testi']['last']       = ($this->_sections['testi']['iteration'] == $this->_sections['testi']['total']);
?>
<div class="client_spk news nd">
        <div class="title"><?php echo $this->_tpl_vars['cfn_obj']->string_truncate($this->_tpl_vars['testimonial_data'][$this->_sections['testi']['index']]['message'],150); ?>
</div>
        <div class="name"><?php echo $this->_tpl_vars['testimonial_data'][$this->_sections['testi']['index']]['client_name']; ?>
, <?php echo $this->_tpl_vars['testimonial_data'][$this->_sections['testi']['index']]['designation']; ?>
, <?php echo $this->_tpl_vars['testimonial_data'][$this->_sections['testi']['index']]['company']; ?>
</div>
      </div>
<?php endfor; endif; ?>
	  
            <!--CATEGORY-->
            <div class="cf recentAct">
                <div class="recentJobs">
                    <!--h2>
                       <?php echo $this->_tpl_vars['menu_lang']->JText('TIT_HOT_JOBS'); ?>
</h2-->
					     <h2> Latest Updates
                       </h2>
				
                    <div class="cf">
					
                        <div class="slideshow" id="job_updates">
                        </div>
                    </div>
                </div>
                <!--RECENT JOBS LEFT-->
                <div class="referFriend">
                    <h2>
                       <?php echo $this->_tpl_vars['menu_lang']->JText('TIT_REFER_FRIENDS'); ?>
 </h2>
                    <p>
                        <?php echo $this->_tpl_vars['menu_lang']->JText('LBL_HELP_FRIEND'); ?>
</p>
                    <div class="form cf">
						<form name="ref_frnd" method="post" >
                        <div class="loginBg"><input placeholder="email or mobile no" type="text" name="ref_address" id="ref_address" value="" class="placeholder"></div>
                       
						<!--span style="float:left;margin-top:7px;">
                       <a class="button-link smallBtn referBtn" id="refer_friend" href="javascript:void();"><?php echo $this->_tpl_vars['menu_lang']->JText('BTN_SUBMIT'); ?>
</a>
					   <input type="hidden" name="refer_friend" id="refer_FD"/>
						</span-->
					   <button class="small referBtn floatR" type="submit" name="refer_friend" id="refer_friend" value="submit" style="width:60px; margin-right:35px;clear:none">
                            <span class=""><?php echo $this->_tpl_vars['menu_lang']->JText('BTN_SUBMIT'); ?>
</span></button>
							
                    </form>
					</div>
                </div>
				
                <!--REFER FRIEND-->
            </div>
            <!--RECENT JOBS-->
        </div>
        <!--CONTAINER-->
    </div>
    <!--HEADER CONTAINER-->

	<input type="hidden" value="<?php echo $this->_tpl_vars['jobfair_form_sent']; ?>
" id="jobfairPopup"/>
	<input type="hidden" value="<?php echo $this->_tpl_vars['req_form_sent']; ?>
" id="reqPopup"/>
	
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => '../include/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>