    <div id="footer">
	<input type="hidden" id="front_index"/>
        <div class="container cf">
            <div class="footerCol" style="width:175px">
                <h2>
                    {$footer_lang->JText('LBL_RECENT_JOBS')}</h2>
                <ul>	
				{section name=featured loop=$recent_jobs}
                    <li><a href="{$url}{$language_url}view_jobs/{$fn->replace_jobs_string($recent_jobs[featured].job_title)}/{$fn->replace_jobs_string($recent_jobs[featured].company_name)}/?id={$en_id_recent[featured]}">{$recent_jobs[featured].job_title|capitalize}</a></li>
				{/section}
                </ul>
            </div>
           
            <div class="footerCol">
                <h2>
                    {$footer_lang->JText('LBL_JOBSEEKER')}</h2>
                <ul>
                    <li><a href="{$url}{$language_url}registration/">{$footer_lang->JText('LINK_JOBSEEKER_REG')}</a></li>
                    <li><a href="{$url}{$language_url}login/">{$footer_lang->JText('LINK_JOBSEEKER_LOGIN')}</a></li>					
                    <!--li><a href="#">{$footer_lang->JText('LINK_GENERAL')}</a></li-->
                    <li><a href="{$url}{$language_url}more_location/">{$footer_lang->JText('LINK_JOBS_LOCATION')}</a></li>
                    <li><a href="{$url}{$language_url}more_industry/">{$footer_lang->JText('LINK_JOBS_INDUSTRY')}</a></li>
                    <!--li><a href="{$url}{$language_url}more_company/">{$footer_lang->JText('LINK_JOBS_COMPANY')}</a></li-->
					 <li><a href="{$url}{$language_url}advanced_search/">{$footer_lang->JText('LINK_ADV_SEARCH')}</a></li>
					  <li><a href="{$url}{$language_url}refer_friends_rewards/">{$footer_lang->JText('LINK_REFER_FRIENDS')}</a></li>
					   <li><a href="{$url}{$language_url}generate_resume_free/">{$footer_lang->JText('LINK_GEN_RESUME')}</a></li>
					    <li><a href="javascript:void(0);" class="report_bug">{$footer_lang->JText('LINK_REPORT_BUG')}</a></li>
							  <li><a href="{$url}{$language_url}faq/?section=jobseekers">{$footer_lang->JText('LINK_FAQ')}</a></li>
						
					  
					
                </ul>
            </div>
             <div class="footerCol">
                <h2>
                    {$footer_lang->JText('LBL_EMPLOYER')}</h2>
                <ul>
                    <li><a href="{$url}{$language_url}emp_packages/">{$footer_lang->JText('LINK_EMPLOYER_REG')}</a></li>
                    <li><a href="{$url}{$language_url}emp_login/" target="_blank">{$footer_lang->JText('LINK_EMPLOYER_LOGIN')}</a></li>	


<li><a href="{$url}employers/job_posting/">{$footer_lang->JText('LINK_JOB_POSTING')}</a></li>	
<li><a href="{$url}employers/search_resumes/">{$footer_lang->JText('LINK_SEARCH_RESUMES')}</a></li>	
<li><a href="{$url}employers/responses/">{$footer_lang->JText('LINK_RESPONSES')}</a></li>	
<li><a href="{$url}employers/send_sms_email/">{$footer_lang->JText('LINK_SEND_SMS')}</a></li>	
<li><a href="{$url}employers/candidate_details/">{$footer_lang->JText('LINK_VIEW_CANDIATE')}</a></li>

<li><a href="{$url}employers/search_campus/">{$footer_lang->JText('LINK_SRCH_EMP')}</a></li>		 
  <li><a href="javascript:void(0);" class="report_bug">{$footer_lang->JText('LINK_REPORT_BUG')}</a></li>
                    <!--li><a href="#">{$footer_lang->JText('LINK_GENERAL')}</a></li-->
                  	  <li><a href="{$url}{$language_url}faq/?section=employers">{$footer_lang->JText('LINK_FAQ')}</a></li>
					  
					
                </ul>
            </div>
			 <div class="footerCol">
                <h2>
                    {$footer_lang->JText('LBL_COLLEGE')}</h2>
                <ul>
               
					 <li><a href="{$url}{$language_url}college_registration/"> {$footer_lang->JText('LBL_REGISTRATION')}</a></li>
                    
                    <li><a href="{$url}{$language_url}college_login/" target="_blank">{$footer_lang->JText('LBL_LOGIN')}</a></li>
					   <li><a href="{$url}{$language_url}campus_placement/">{$footer_lang->JText('LBL_PLACEMENTS')}</a></li>
					<li><a href="{$url}colleges/college_info/">{$footer_lang->JText('LBL_COLLEGE_INFO')}</a></li>
					<li><a href="{$url}colleges/search_employer/">{$footer_lang->JText('LBL_SEARCH_EMPLOYER')}</a></li>
                    <li><a href="{$url}colleges/invitations/">{$footer_lang->JText('LBL_INVITATIONS')}</a></li>
                 
                    <li><a href="{$url}colleges/students/">{$footer_lang->JText('LBL_STUDENT')}</a></li>  
                    <li><a href="{$url}colleges/photo_gallery/">{$footer_lang->JText('LBL_PHOTO_GALLERY')}</a></li>
					  <li><a href="javascript:void(0);" class="report_bug">{$footer_lang->JText('LINK_REPORT_BUG')}</a></li>
                    <li><a href="{$url}{$language_url}faq/?section=college">{$footer_lang->JText('LINK_FAQ')}</a></li>
                </ul>
            </div>
			 <div class="footerCol">
                <h2>
                    {$footer_lang->JText('LBL_CONTACT_US')}</h2>
                <ul>
               
					 <li><a href="{$url}{$language_url}about_us/"> {$footer_lang->JText('LINK_ABOUT_MELA')}</a></li>
                    
                    <li><a href="{$url}{$language_url}features/">{$footer_lang->JText('LINK_FEATURES')}</a></li>
					<!--li><a href="{$url}{$language_url}team/">{$footer_lang->JText('LINK_OUR_TEAM')}</a></li-->
					<li><a href="{$url}{$language_url}business_enquiry/">{$footer_lang->JText('LINK_BUS_ENQ')}</a></li>
                    <li><a href="{$url}{$language_url}placement_enquiry/">{$footer_lang->JText('LINK_PLACEMENT')}</a></li>
                    <!--li><a href="#">{$footer_lang->JText('LINK_GENERAL')}</a></li-->
                    <li><a href="{$url}{$language_url}partner_with_us/">{$footer_lang->JText('LINK_PARTNER')}</a></li>
                    <li><a href="{$url}{$language_url}contact_us/">{$footer_lang->JText('LINK_CONTACT_US')}</a></li>  
                    <!--li><a href="#">{$footer_lang->JText('LINK_HELP')}</a></li-->
					<li><a href="javascript:void(0)" class="feedBack">{$footer_lang->JText('LINK_FEEDBACK')}</a></li>
					<li><a href="{$url}how_it_works/">{$footer_lang->JText('LINK_HOW_WORK')}</a></li>
                    <li><a href="#"></a></li>
                </ul>
            </div>
        </div>
    </div>
    <!--FOOTER-->
    <div id="copyRight">
        <p>
           <!-- {$footer_lang->JText('LBL_COPYRIGHT')} -->
Copyright © 2016 jobsfactory.in 
<a style="margin-left:100px;" href="{$url}{$language_url}privacy_policy/">{$footer_lang->JText('LINK_POLICY')}</a> | <a href="{$url}{$language_url}disclaimer/">{$footer_lang->JText('LINK_DISCLAIMER')}</a>

            | <a href="{$url}{$language_url}terms_conditions/">{$footer_lang->JText('LINK_TERMS_CONDITIONS')}</a></p>
    </div>
    <!-- End Document
================================================== -->
<!-- Primary Page Layout
================================================== -->
		<div id="basic-modal-content" class="supportB">
			<h3>WARNING!</h3>
	{$browser_error_message}
	<h3 class="browser mt15">Supported Browsers</h3>
		<ul>
			<li><img src="{$url}images/ie.png">Internet Explorer: <span>8, 9</span></li>
			<li><img src="{$url}images/google-chrome.png">Google Chrome <span>14</span> and <span>above</span></li>
			<li><img src="{$url}images/firefox.png">Mozilla Firefox: <span>4</span> and <span>above</span></li>
			<li><img src="{$url}images/opera.png">Opera: <span>10</span> and <span>above</span></li>
			<li><img src="{$url}images/safari.png">Apple Safari: <span>4</span> and <span>above</span></li>
       </ul>
		
			
		</div>
		<input type="hidden" class="root_url" id="page_url" value="{$url}"/>
<input type="hidden" id="created_date" value="{$smarty.session.USER_CREATED|date_format:'%Y/%m/%d'}"/>
 {if $browser_error_message neq ''}<input type="hidden" id="older_browser" name="older_browser" value="yes" />{/if}
<input type="hidden" id="language_url" value="{$language_url}"/>
<!-- End Document
================================================== -->
    <script type="text/javascript" src="{$url}js/jquery-1.7.1.min.js"></script>

    <script type="text/javascript" src="{$url}js/jquery.nivo.slider.js"></script>
	
    <script src="{$url}js/agile_carousel.a1.1.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="{$url}js/jquery.selectbox-0.6.1.js"></script>
    <script type="text/javascript" src="{$url}js/jquery.totemticker.js"></script>
	
	 <script type="text/javascript" src="{$url}js/jquery.tipsy.js"></script>
	 <script type="text/javascript" src="{$url}js/custom-form-elements.js"></script>
	<script type="text/javascript" src="{$url}js/jquery.slimscroll.min.js"></script>
	<script type="text/javascript" src="{$url}js/language/{$language_name}-validation_message.js"></script>
	
	{if  $smarty.get.pagen eq  'employer_registration' || $smarty.get.pagen eq  'placement_enquiry' || $smarty.get.pagen eq  'college_registration' || $smarty.get.pagen eq  'registration' || $smarty.get.pagen eq  'attend_test' || $smarty.get.pagen eq  'business_enquiry' || $smarty.get.pagen eq  'employer_payments' || $smarty.get.pagen eq  'edit_family_details' || $smarty.get.pagen eq 'edit_experience_details' || $smarty.get.pagen eq 'edit_education_details'  || $smarty.get.pagen eq 'edit_personal_details' || $smarty.get.pagen eq 'registration' || $smarty.get.pagen eq 'refer_friends' || $smarty.get.pagen eq 'view_inbox'|| $smarty.get.pagen eq 'view_job_alert' || $smarty.get.pagen eq 'view_posting_alerts' || $smarty.get.pagen eq 'refer_site_friends' || $smarty.get.pagen eq 'inbox' || $smarty.get.pagen eq 'job_alerts' || $smarty.get.pagen eq 'posting_alerts' || $smarty.get.pagen eq 'view_inbox'}
	
	<script type="text/javascript" src="{$url}js/jquery.sheepItPlugin-1.0.0.min.js"></script>
	<script type="text/javascript" src="{$url}js/custom_validation.js"></script>
    {/if}
	{if $smarty.get.pagen eq  'login' || $smarty.get.pagen eq  'emp_login' || $smarty.get.pagen eq  'college_login' || $smarty.get.pagen eq  'settings'}
	<script type="text/javascript" src="{$url}js/custom_validation.js"></script>
	{/if}
	<script type="text/javascript" src="{$url}js/jquery.simplemodal.js"></script>
	<script type="text/javascript" src="{$url}js/basic.js"></script>
    {if  $smarty.get.pagen eq 'view_jobs' || $smarty.get.pagen eq 'edit_expectation_details' || $smarty.get.pagen eq 'edit_experience_details' ||  $smarty.get.pagen eq 'registration' ||  $smarty.get.pagen eq 'edit_work_authorization_details' || $smarty.get.pagen eq 'edit_personal_details' ||  $smarty.get.pagen eq 'advanced_search' || $smarty.get.pagen eq 'search_jobs' || $smarty.get.pagen eq 'inbox' || $smarty.get.pagen eq 'job_alerts'  || $smarty.get.pagen eq 'posting_alerts' || $smarty.get.pagen eq 'view_inbox' || $smarty.get.pagen eq 'applied_jobs' || $smarty.get.pagen eq 'saved_jobs' || $smarty.get.pagen eq 'refer_friends' || $smarty.get.pagen eq 'view_inbox' || $smarty.get.pagen eq 'view_job_alert' || $smarty.get.pagen eq 'view_posting_alerts' || $smarty.get.pagen eq 'refer_site_friends'}
		<script type="text/javascript" src="{$url}js/jquery.fcbkcomplete.js"></script>
	{/if}
		<script type="text/javascript" src="{$url}js/jquery-ui-1.8.23.custom.min.js"></script>	
	{if  $smarty.get.pagen eq 'faq' ||   $smarty.get.pagen eq 'generate_your_resume' ||   $smarty.get.pagen eq 'placement_enquiry' || $smarty.get.pagen eq 'advanced_search' || $smarty.get.pagen eq 'edit_affirmative_action' ||  $smarty.get.pagen eq 'edit_experience_details' || $smarty.get.pagen eq 'edit_work_authorization_details' || $smarty.get.pagen eq 'edit_education_details' || $smarty.get.pagen eq 'registration' || $smarty.get.pagen eq 'edit_personal_details' ||  $smarty.get.pagen eq 'search_jobs' || $smarty.get.pagen eq 'inbox' || $smarty.get.pagen eq 'job_alerts' || $smarty.get.pagen eq 'posting_alerts' || $smarty.get.pagen eq 'view_inbox' || $smarty.get.pagen eq 'applied_jobs' || $smarty.get.pagen eq 'saved_jobs' || $smarty.get.pagen eq 'refer_friends' || $smarty.get.pagen eq 'view_inbox'|| $smarty.get.pagen eq 'view_job_alert' || $smarty.get.pagen eq 'view_posting_alerts' || $smarty.get.pagen eq 'emp_packages' || $smarty.get.pagen eq 'additional_purchase' || $smarty.get.pagen eq 'employer_registration' || $smarty.get.pagen eq 'refer_site_friends' || $smarty.get.pagen eq 'employer_payments'}
		<script type="text/javascript" src="{$url}js/custom-form-elements.js"></script>
	{/if}	
	{if $smarty.get.pagen eq 'generate_your_resume' || $smarty.get.pagen eq 'search_result'}
	<script type="text/javascript" src="{$url}js/jquery.tipsy.js"></script>
	{/if}
	<script type="text/javascript" src="{$url}js/main.js"></script>
    {if $smarty.get.pagen eq 'search_jobs' ||  $smarty.get.pagen eq 'view_jobs'}
		<script type="text/javascript" src="{$url}js/hilitor.js"></script>	
	{/if}
	
		<script type="text/javascript" src="{$url}js/jquery.alerts.js"></script>
	
    <script type="text/javascript" src="{$url}js/jquery.tools.min.js"></script>
	{if $share_this eq 'share_this'}
	 {literal}
		<script type="text/javascript">var switchTo5x=true;</script>
		<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
		<script type="text/javascript">stLight.options({publisher: "e6d93224-2e2c-4202-baf1-bab9207bb9a8"});</script>
     {/literal}
	 {/if}
	 {if $smarty.get.pagen eq 'registration'}
		<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
		<script src="{$url}js/jquery.ui.widget.js"></script>

		<script src="{$url}js/jquery.iframe-transport.js"></script>
		<!-- The basic File Upload plugin -->
		<script src="{$url}js/jquery.fileupload.js"></script>
		<!-- The File Upload file processing plugin -->
		<script src="{$url}js/jquery.fileupload-fp.js"></script>
		<!-- The File Upload user interface plugin -->
		<script src="{$url}js/jquery.fileupload-ui.js"></script>
	 {/if}
	



	 
	<!--{literal}
	<script type="text/JavaScript">
(function() {
	var phplive_e_1372222327 = document.createElement("script") ;
	phplive_e_1372222327.type = "text/javascript" ;
	phplive_e_1372222327.async = true ;
	phplive_e_1372222327.src = "//t2.phplivesupport.com/bigspire/js/phplive_v2.js.php?v=0|1372222327|0|" ;
	document.getElementById("phplive_btn_1372222327").appendChild( phplive_e_1372222327 ) ;
})();
</script>
{/literal} -->

{if $smarty.get.pagen eq 'pre_register' || $smarty.get.pagen eq 'jobfair2016'}
<script src="http://malsup.github.io/jquery.cycle2.js"></script>
<script src="http://malsup.github.io/jquery.cycle2.carousel.js"></script>
{literal}
<script>
$.fn.cycle.defaults.autoSelector = '.slideshow';
</script>
{/literal}
{/if}
</body>
</html>
