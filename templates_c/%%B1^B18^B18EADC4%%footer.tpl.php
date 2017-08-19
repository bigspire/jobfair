<?php /* Smarty version 2.6.26, created on 2017-08-18 19:28:32
         compiled from ../include/footer.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'capitalize', '../include/footer.tpl', 9, false),array('modifier', 'date_format', '../include/footer.tpl', 125, false),)), $this); ?>
    <div id="footer">
	<input type="hidden" id="front_index"/>
        <div class="container cf">
            <div class="footerCol" style="width:175px">
                <h2>
                    <?php echo $this->_tpl_vars['footer_lang']->JText('LBL_RECENT_JOBS'); ?>
</h2>
                <ul>	
				<?php unset($this->_sections['featured']);
$this->_sections['featured']['name'] = 'featured';
$this->_sections['featured']['loop'] = is_array($_loop=$this->_tpl_vars['recent_jobs']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['featured']['show'] = true;
$this->_sections['featured']['max'] = $this->_sections['featured']['loop'];
$this->_sections['featured']['step'] = 1;
$this->_sections['featured']['start'] = $this->_sections['featured']['step'] > 0 ? 0 : $this->_sections['featured']['loop']-1;
if ($this->_sections['featured']['show']) {
    $this->_sections['featured']['total'] = $this->_sections['featured']['loop'];
    if ($this->_sections['featured']['total'] == 0)
        $this->_sections['featured']['show'] = false;
} else
    $this->_sections['featured']['total'] = 0;
if ($this->_sections['featured']['show']):

            for ($this->_sections['featured']['index'] = $this->_sections['featured']['start'], $this->_sections['featured']['iteration'] = 1;
                 $this->_sections['featured']['iteration'] <= $this->_sections['featured']['total'];
                 $this->_sections['featured']['index'] += $this->_sections['featured']['step'], $this->_sections['featured']['iteration']++):
$this->_sections['featured']['rownum'] = $this->_sections['featured']['iteration'];
$this->_sections['featured']['index_prev'] = $this->_sections['featured']['index'] - $this->_sections['featured']['step'];
$this->_sections['featured']['index_next'] = $this->_sections['featured']['index'] + $this->_sections['featured']['step'];
$this->_sections['featured']['first']      = ($this->_sections['featured']['iteration'] == 1);
$this->_sections['featured']['last']       = ($this->_sections['featured']['iteration'] == $this->_sections['featured']['total']);
?>
                    <li><a href="<?php echo $this->_tpl_vars['url']; ?>
<?php echo $this->_tpl_vars['language_url']; ?>
view_jobs/<?php echo $this->_tpl_vars['fn']->replace_jobs_string($this->_tpl_vars['recent_jobs'][$this->_sections['featured']['index']]['job_title']); ?>
/<?php echo $this->_tpl_vars['fn']->replace_jobs_string($this->_tpl_vars['recent_jobs'][$this->_sections['featured']['index']]['company_name']); ?>
/?id=<?php echo $this->_tpl_vars['en_id_recent'][$this->_sections['featured']['index']]; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['recent_jobs'][$this->_sections['featured']['index']]['job_title'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</a></li>
				<?php endfor; endif; ?>
                </ul>
            </div>
           
            <div class="footerCol">
                <h2>
                    <?php echo $this->_tpl_vars['footer_lang']->JText('LBL_JOBSEEKER'); ?>
</h2>
                <ul>
                    <li><a href="<?php echo $this->_tpl_vars['url']; ?>
<?php echo $this->_tpl_vars['language_url']; ?>
registration/"><?php echo $this->_tpl_vars['footer_lang']->JText('LINK_JOBSEEKER_REG'); ?>
</a></li>
                    <li><a href="<?php echo $this->_tpl_vars['url']; ?>
<?php echo $this->_tpl_vars['language_url']; ?>
login/"><?php echo $this->_tpl_vars['footer_lang']->JText('LINK_JOBSEEKER_LOGIN'); ?>
</a></li>					
                    <!--li><a href="#"><?php echo $this->_tpl_vars['footer_lang']->JText('LINK_GENERAL'); ?>
</a></li-->
                    <li><a href="<?php echo $this->_tpl_vars['url']; ?>
<?php echo $this->_tpl_vars['language_url']; ?>
more_location/"><?php echo $this->_tpl_vars['footer_lang']->JText('LINK_JOBS_LOCATION'); ?>
</a></li>
                    <li><a href="<?php echo $this->_tpl_vars['url']; ?>
<?php echo $this->_tpl_vars['language_url']; ?>
more_industry/"><?php echo $this->_tpl_vars['footer_lang']->JText('LINK_JOBS_INDUSTRY'); ?>
</a></li>
                    <!--li><a href="<?php echo $this->_tpl_vars['url']; ?>
<?php echo $this->_tpl_vars['language_url']; ?>
more_company/"><?php echo $this->_tpl_vars['footer_lang']->JText('LINK_JOBS_COMPANY'); ?>
</a></li-->
					 <li><a href="<?php echo $this->_tpl_vars['url']; ?>
<?php echo $this->_tpl_vars['language_url']; ?>
advanced_search/"><?php echo $this->_tpl_vars['footer_lang']->JText('LINK_ADV_SEARCH'); ?>
</a></li>
					  <li><a href="<?php echo $this->_tpl_vars['url']; ?>
<?php echo $this->_tpl_vars['language_url']; ?>
refer_friends_rewards/"><?php echo $this->_tpl_vars['footer_lang']->JText('LINK_REFER_FRIENDS'); ?>
</a></li>
					   <li><a href="<?php echo $this->_tpl_vars['url']; ?>
<?php echo $this->_tpl_vars['language_url']; ?>
generate_resume_free/"><?php echo $this->_tpl_vars['footer_lang']->JText('LINK_GEN_RESUME'); ?>
</a></li>
					    <li><a href="javascript:void(0);" class="report_bug"><?php echo $this->_tpl_vars['footer_lang']->JText('LINK_REPORT_BUG'); ?>
</a></li>
							  <li><a href="<?php echo $this->_tpl_vars['url']; ?>
<?php echo $this->_tpl_vars['language_url']; ?>
faq/?section=jobseekers"><?php echo $this->_tpl_vars['footer_lang']->JText('LINK_FAQ'); ?>
</a></li>
						
					  
					
                </ul>
            </div>
             <div class="footerCol">
                <h2>
                    <?php echo $this->_tpl_vars['footer_lang']->JText('LBL_EMPLOYER'); ?>
</h2>
                <ul>
                    <li><a href="<?php echo $this->_tpl_vars['url']; ?>
<?php echo $this->_tpl_vars['language_url']; ?>
emp_packages/"><?php echo $this->_tpl_vars['footer_lang']->JText('LINK_EMPLOYER_REG'); ?>
</a></li>
                    <li><a href="<?php echo $this->_tpl_vars['url']; ?>
<?php echo $this->_tpl_vars['language_url']; ?>
emp_login/" target="_blank"><?php echo $this->_tpl_vars['footer_lang']->JText('LINK_EMPLOYER_LOGIN'); ?>
</a></li>	


<li><a href="<?php echo $this->_tpl_vars['url']; ?>
employers/job_posting/"><?php echo $this->_tpl_vars['footer_lang']->JText('LINK_JOB_POSTING'); ?>
</a></li>	
<li><a href="<?php echo $this->_tpl_vars['url']; ?>
employers/search_resumes/"><?php echo $this->_tpl_vars['footer_lang']->JText('LINK_SEARCH_RESUMES'); ?>
</a></li>	
<li><a href="<?php echo $this->_tpl_vars['url']; ?>
employers/responses/"><?php echo $this->_tpl_vars['footer_lang']->JText('LINK_RESPONSES'); ?>
</a></li>	
<li><a href="<?php echo $this->_tpl_vars['url']; ?>
employers/send_sms_email/"><?php echo $this->_tpl_vars['footer_lang']->JText('LINK_SEND_SMS'); ?>
</a></li>	
<li><a href="<?php echo $this->_tpl_vars['url']; ?>
employers/candidate_details/"><?php echo $this->_tpl_vars['footer_lang']->JText('LINK_VIEW_CANDIATE'); ?>
</a></li>

<li><a href="<?php echo $this->_tpl_vars['url']; ?>
employers/search_campus/"><?php echo $this->_tpl_vars['footer_lang']->JText('LINK_SRCH_EMP'); ?>
</a></li>		 
  <li><a href="javascript:void(0);" class="report_bug"><?php echo $this->_tpl_vars['footer_lang']->JText('LINK_REPORT_BUG'); ?>
</a></li>
                    <!--li><a href="#"><?php echo $this->_tpl_vars['footer_lang']->JText('LINK_GENERAL'); ?>
</a></li-->
                  	  <li><a href="<?php echo $this->_tpl_vars['url']; ?>
<?php echo $this->_tpl_vars['language_url']; ?>
faq/?section=employers"><?php echo $this->_tpl_vars['footer_lang']->JText('LINK_FAQ'); ?>
</a></li>
					  
					
                </ul>
            </div>
			 <div class="footerCol">
                <h2>
                    <?php echo $this->_tpl_vars['footer_lang']->JText('LBL_COLLEGE'); ?>
</h2>
                <ul>
               
					 <li><a href="<?php echo $this->_tpl_vars['url']; ?>
<?php echo $this->_tpl_vars['language_url']; ?>
college_registration/"> <?php echo $this->_tpl_vars['footer_lang']->JText('LBL_REGISTRATION'); ?>
</a></li>
                    
                    <li><a href="<?php echo $this->_tpl_vars['url']; ?>
<?php echo $this->_tpl_vars['language_url']; ?>
college_login/" target="_blank"><?php echo $this->_tpl_vars['footer_lang']->JText('LBL_LOGIN'); ?>
</a></li>
					   <li><a href="<?php echo $this->_tpl_vars['url']; ?>
<?php echo $this->_tpl_vars['language_url']; ?>
campus_placement/"><?php echo $this->_tpl_vars['footer_lang']->JText('LBL_PLACEMENTS'); ?>
</a></li>
					<li><a href="<?php echo $this->_tpl_vars['url']; ?>
colleges/college_info/"><?php echo $this->_tpl_vars['footer_lang']->JText('LBL_COLLEGE_INFO'); ?>
</a></li>
					<li><a href="<?php echo $this->_tpl_vars['url']; ?>
colleges/search_employer/"><?php echo $this->_tpl_vars['footer_lang']->JText('LBL_SEARCH_EMPLOYER'); ?>
</a></li>
                    <li><a href="<?php echo $this->_tpl_vars['url']; ?>
colleges/invitations/"><?php echo $this->_tpl_vars['footer_lang']->JText('LBL_INVITATIONS'); ?>
</a></li>
                 
                    <li><a href="<?php echo $this->_tpl_vars['url']; ?>
colleges/students/"><?php echo $this->_tpl_vars['footer_lang']->JText('LBL_STUDENT'); ?>
</a></li>  
                    <li><a href="<?php echo $this->_tpl_vars['url']; ?>
colleges/photo_gallery/"><?php echo $this->_tpl_vars['footer_lang']->JText('LBL_PHOTO_GALLERY'); ?>
</a></li>
					  <li><a href="javascript:void(0);" class="report_bug"><?php echo $this->_tpl_vars['footer_lang']->JText('LINK_REPORT_BUG'); ?>
</a></li>
                    <li><a href="<?php echo $this->_tpl_vars['url']; ?>
<?php echo $this->_tpl_vars['language_url']; ?>
faq/?section=college"><?php echo $this->_tpl_vars['footer_lang']->JText('LINK_FAQ'); ?>
</a></li>
                </ul>
            </div>
			 <div class="footerCol">
                <h2>
                    <?php echo $this->_tpl_vars['footer_lang']->JText('LBL_CONTACT_US'); ?>
</h2>
                <ul>
               
					 <li><a href="<?php echo $this->_tpl_vars['url']; ?>
<?php echo $this->_tpl_vars['language_url']; ?>
about_us/"> <?php echo $this->_tpl_vars['footer_lang']->JText('LINK_ABOUT_MELA'); ?>
</a></li>
                    
                    <li><a href="<?php echo $this->_tpl_vars['url']; ?>
<?php echo $this->_tpl_vars['language_url']; ?>
features/"><?php echo $this->_tpl_vars['footer_lang']->JText('LINK_FEATURES'); ?>
</a></li>
					<!--li><a href="<?php echo $this->_tpl_vars['url']; ?>
<?php echo $this->_tpl_vars['language_url']; ?>
team/"><?php echo $this->_tpl_vars['footer_lang']->JText('LINK_OUR_TEAM'); ?>
</a></li-->
					<li><a href="<?php echo $this->_tpl_vars['url']; ?>
<?php echo $this->_tpl_vars['language_url']; ?>
business_enquiry/"><?php echo $this->_tpl_vars['footer_lang']->JText('LINK_BUS_ENQ'); ?>
</a></li>
                    <li><a href="<?php echo $this->_tpl_vars['url']; ?>
<?php echo $this->_tpl_vars['language_url']; ?>
placement_enquiry/"><?php echo $this->_tpl_vars['footer_lang']->JText('LINK_PLACEMENT'); ?>
</a></li>
                    <!--li><a href="#"><?php echo $this->_tpl_vars['footer_lang']->JText('LINK_GENERAL'); ?>
</a></li-->
                    <li><a href="<?php echo $this->_tpl_vars['url']; ?>
<?php echo $this->_tpl_vars['language_url']; ?>
partner_with_us/"><?php echo $this->_tpl_vars['footer_lang']->JText('LINK_PARTNER'); ?>
</a></li>
                    <li><a href="<?php echo $this->_tpl_vars['url']; ?>
<?php echo $this->_tpl_vars['language_url']; ?>
contact_us/"><?php echo $this->_tpl_vars['footer_lang']->JText('LINK_CONTACT_US'); ?>
</a></li>  
                    <!--li><a href="#"><?php echo $this->_tpl_vars['footer_lang']->JText('LINK_HELP'); ?>
</a></li-->
					<li><a href="javascript:void(0)" class="feedBack"><?php echo $this->_tpl_vars['footer_lang']->JText('LINK_FEEDBACK'); ?>
</a></li>
					<li><a href="<?php echo $this->_tpl_vars['url']; ?>
how_it_works/"><?php echo $this->_tpl_vars['footer_lang']->JText('LINK_HOW_WORK'); ?>
</a></li>
                    <li><a href="#"></a></li>
                </ul>
            </div>
        </div>
    </div>
    <!--FOOTER-->
    <div id="copyRight">
        <p>
           <!-- <?php echo $this->_tpl_vars['footer_lang']->JText('LBL_COPYRIGHT'); ?>
 -->
Copyright © 2016 jobsfactory.in 
<a style="margin-left:100px;" href="<?php echo $this->_tpl_vars['url']; ?>
<?php echo $this->_tpl_vars['language_url']; ?>
privacy_policy/"><?php echo $this->_tpl_vars['footer_lang']->JText('LINK_POLICY'); ?>
</a> | <a href="<?php echo $this->_tpl_vars['url']; ?>
<?php echo $this->_tpl_vars['language_url']; ?>
disclaimer/"><?php echo $this->_tpl_vars['footer_lang']->JText('LINK_DISCLAIMER'); ?>
</a>

            | <a href="<?php echo $this->_tpl_vars['url']; ?>
<?php echo $this->_tpl_vars['language_url']; ?>
terms_conditions/"><?php echo $this->_tpl_vars['footer_lang']->JText('LINK_TERMS_CONDITIONS'); ?>
</a></p>
    </div>
    <!-- End Document
================================================== -->
<!-- Primary Page Layout
================================================== -->
		<div id="basic-modal-content" class="supportB">
			<h3>WARNING!</h3>
	<?php echo $this->_tpl_vars['browser_error_message']; ?>

	<h3 class="browser mt15">Supported Browsers</h3>
		<ul>
			<li><img src="<?php echo $this->_tpl_vars['url']; ?>
images/ie.png">Internet Explorer: <span>8, 9</span></li>
			<li><img src="<?php echo $this->_tpl_vars['url']; ?>
images/google-chrome.png">Google Chrome <span>14</span> and <span>above</span></li>
			<li><img src="<?php echo $this->_tpl_vars['url']; ?>
images/firefox.png">Mozilla Firefox: <span>4</span> and <span>above</span></li>
			<li><img src="<?php echo $this->_tpl_vars['url']; ?>
images/opera.png">Opera: <span>10</span> and <span>above</span></li>
			<li><img src="<?php echo $this->_tpl_vars['url']; ?>
images/safari.png">Apple Safari: <span>4</span> and <span>above</span></li>
       </ul>
		
			
		</div>
		<input type="hidden" class="root_url" id="page_url" value="<?php echo $this->_tpl_vars['url']; ?>
"/>
<input type="hidden" id="created_date" value="<?php echo ((is_array($_tmp=$_SESSION['USER_CREATED'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y/%m/%d') : smarty_modifier_date_format($_tmp, '%Y/%m/%d')); ?>
"/>
 <?php if ($this->_tpl_vars['browser_error_message'] != ''): ?><input type="hidden" id="older_browser" name="older_browser" value="yes" /><?php endif; ?>
<input type="hidden" id="language_url" value="<?php echo $this->_tpl_vars['language_url']; ?>
"/>
<!-- End Document
================================================== -->
    <script type="text/javascript" src="<?php echo $this->_tpl_vars['url']; ?>
js/jquery-1.7.1.min.js"></script>

    <script type="text/javascript" src="<?php echo $this->_tpl_vars['url']; ?>
js/jquery.nivo.slider.js"></script>
	
    <script src="<?php echo $this->_tpl_vars['url']; ?>
js/agile_carousel.a1.1.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo $this->_tpl_vars['url']; ?>
js/jquery.selectbox-0.6.1.js"></script>
    <script type="text/javascript" src="<?php echo $this->_tpl_vars['url']; ?>
js/jquery.totemticker.js"></script>
	
	 <script type="text/javascript" src="<?php echo $this->_tpl_vars['url']; ?>
js/jquery.tipsy.js"></script>
	 <script type="text/javascript" src="<?php echo $this->_tpl_vars['url']; ?>
js/custom-form-elements.js"></script>
	<script type="text/javascript" src="<?php echo $this->_tpl_vars['url']; ?>
js/jquery.slimscroll.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->_tpl_vars['url']; ?>
js/language/<?php echo $this->_tpl_vars['language_name']; ?>
-validation_message.js"></script>
	
	<?php if ($_GET['pagen'] == 'employer_registration' || $_GET['pagen'] == 'placement_enquiry' || $_GET['pagen'] == 'college_registration' || $_GET['pagen'] == 'registration' || $_GET['pagen'] == 'attend_test' || $_GET['pagen'] == 'business_enquiry' || $_GET['pagen'] == 'employer_payments' || $_GET['pagen'] == 'edit_family_details' || $_GET['pagen'] == 'edit_experience_details' || $_GET['pagen'] == 'edit_education_details' || $_GET['pagen'] == 'edit_personal_details' || $_GET['pagen'] == 'registration' || $_GET['pagen'] == 'refer_friends' || $_GET['pagen'] == 'view_inbox' || $_GET['pagen'] == 'view_job_alert' || $_GET['pagen'] == 'view_posting_alerts' || $_GET['pagen'] == 'refer_site_friends' || $_GET['pagen'] == 'inbox' || $_GET['pagen'] == 'job_alerts' || $_GET['pagen'] == 'posting_alerts' || $_GET['pagen'] == 'view_inbox'): ?>
	
	<script type="text/javascript" src="<?php echo $this->_tpl_vars['url']; ?>
js/jquery.sheepItPlugin-1.0.0.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->_tpl_vars['url']; ?>
js/custom_validation.js"></script>
    <?php endif; ?>
	<?php if ($_GET['pagen'] == 'login' || $_GET['pagen'] == 'emp_login' || $_GET['pagen'] == 'college_login' || $_GET['pagen'] == 'settings'): ?>
	<script type="text/javascript" src="<?php echo $this->_tpl_vars['url']; ?>
js/custom_validation.js"></script>
	<?php endif; ?>
	<script type="text/javascript" src="<?php echo $this->_tpl_vars['url']; ?>
js/jquery.simplemodal.js"></script>
	<script type="text/javascript" src="<?php echo $this->_tpl_vars['url']; ?>
js/basic.js"></script>
    <?php if ($_GET['pagen'] == 'view_jobs' || $_GET['pagen'] == 'edit_expectation_details' || $_GET['pagen'] == 'edit_experience_details' || $_GET['pagen'] == 'registration' || $_GET['pagen'] == 'edit_work_authorization_details' || $_GET['pagen'] == 'edit_personal_details' || $_GET['pagen'] == 'advanced_search' || $_GET['pagen'] == 'search_jobs' || $_GET['pagen'] == 'inbox' || $_GET['pagen'] == 'job_alerts' || $_GET['pagen'] == 'posting_alerts' || $_GET['pagen'] == 'view_inbox' || $_GET['pagen'] == 'applied_jobs' || $_GET['pagen'] == 'saved_jobs' || $_GET['pagen'] == 'refer_friends' || $_GET['pagen'] == 'view_inbox' || $_GET['pagen'] == 'view_job_alert' || $_GET['pagen'] == 'view_posting_alerts' || $_GET['pagen'] == 'refer_site_friends'): ?>
		<script type="text/javascript" src="<?php echo $this->_tpl_vars['url']; ?>
js/jquery.fcbkcomplete.js"></script>
	<?php endif; ?>
		<script type="text/javascript" src="<?php echo $this->_tpl_vars['url']; ?>
js/jquery-ui-1.8.23.custom.min.js"></script>	
	<?php if ($_GET['pagen'] == 'faq' || $_GET['pagen'] == 'generate_your_resume' || $_GET['pagen'] == 'placement_enquiry' || $_GET['pagen'] == 'advanced_search' || $_GET['pagen'] == 'edit_affirmative_action' || $_GET['pagen'] == 'edit_experience_details' || $_GET['pagen'] == 'edit_work_authorization_details' || $_GET['pagen'] == 'edit_education_details' || $_GET['pagen'] == 'registration' || $_GET['pagen'] == 'edit_personal_details' || $_GET['pagen'] == 'search_jobs' || $_GET['pagen'] == 'inbox' || $_GET['pagen'] == 'job_alerts' || $_GET['pagen'] == 'posting_alerts' || $_GET['pagen'] == 'view_inbox' || $_GET['pagen'] == 'applied_jobs' || $_GET['pagen'] == 'saved_jobs' || $_GET['pagen'] == 'refer_friends' || $_GET['pagen'] == 'view_inbox' || $_GET['pagen'] == 'view_job_alert' || $_GET['pagen'] == 'view_posting_alerts' || $_GET['pagen'] == 'emp_packages' || $_GET['pagen'] == 'additional_purchase' || $_GET['pagen'] == 'employer_registration' || $_GET['pagen'] == 'refer_site_friends' || $_GET['pagen'] == 'employer_payments'): ?>
		<script type="text/javascript" src="<?php echo $this->_tpl_vars['url']; ?>
js/custom-form-elements.js"></script>
	<?php endif; ?>	
	<?php if ($_GET['pagen'] == 'generate_your_resume' || $_GET['pagen'] == 'search_result'): ?>
	<script type="text/javascript" src="<?php echo $this->_tpl_vars['url']; ?>
js/jquery.tipsy.js"></script>
	<?php endif; ?>
	<script type="text/javascript" src="<?php echo $this->_tpl_vars['url']; ?>
js/main.js"></script>
    <?php if ($_GET['pagen'] == 'search_jobs' || $_GET['pagen'] == 'view_jobs'): ?>
		<script type="text/javascript" src="<?php echo $this->_tpl_vars['url']; ?>
js/hilitor.js"></script>	
	<?php endif; ?>
	
		<script type="text/javascript" src="<?php echo $this->_tpl_vars['url']; ?>
js/jquery.alerts.js"></script>
	
    <script type="text/javascript" src="<?php echo $this->_tpl_vars['url']; ?>
js/jquery.tools.min.js"></script>
	<?php if ($this->_tpl_vars['share_this'] == 'share_this'): ?>
	 <?php echo '
		<script type="text/javascript">var switchTo5x=true;</script>
		<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
		<script type="text/javascript">stLight.options({publisher: "e6d93224-2e2c-4202-baf1-bab9207bb9a8"});</script>
     '; ?>

	 <?php endif; ?>
	 <?php if ($_GET['pagen'] == 'registration'): ?>
		<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
		<script src="<?php echo $this->_tpl_vars['url']; ?>
js/jquery.ui.widget.js"></script>

		<script src="<?php echo $this->_tpl_vars['url']; ?>
js/jquery.iframe-transport.js"></script>
		<!-- The basic File Upload plugin -->
		<script src="<?php echo $this->_tpl_vars['url']; ?>
js/jquery.fileupload.js"></script>
		<!-- The File Upload file processing plugin -->
		<script src="<?php echo $this->_tpl_vars['url']; ?>
js/jquery.fileupload-fp.js"></script>
		<!-- The File Upload user interface plugin -->
		<script src="<?php echo $this->_tpl_vars['url']; ?>
js/jquery.fileupload-ui.js"></script>
	 <?php endif; ?>
	



	 
	<!--<?php echo '
	<script type="text/JavaScript">
(function() {
	var phplive_e_1372222327 = document.createElement("script") ;
	phplive_e_1372222327.type = "text/javascript" ;
	phplive_e_1372222327.async = true ;
	phplive_e_1372222327.src = "//t2.phplivesupport.com/bigspire/js/phplive_v2.js.php?v=0|1372222327|0|" ;
	document.getElementById("phplive_btn_1372222327").appendChild( phplive_e_1372222327 ) ;
})();
</script>
'; ?>
 -->

<?php if ($_GET['pagen'] == 'pre_register' || $_GET['pagen'] == 'jobfair2016'): ?>
<script src="http://malsup.github.io/jquery.cycle2.js"></script>
<script src="http://malsup.github.io/jquery.cycle2.carousel.js"></script>
<?php echo '
<script>
$.fn.cycle.defaults.autoSelector = \'.slideshow\';
</script>
'; ?>

<?php endif; ?>
</body>
</html>