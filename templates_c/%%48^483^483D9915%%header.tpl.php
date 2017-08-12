<?php /* Smarty version 2.6.26, created on 2017-08-12 11:21:12
         compiled from ../include/header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'lower', '../include/header.tpl', 11, false),array('modifier', 'capitalize', '../include/header.tpl', 11, false),array('modifier', 'count', '../include/header.tpl', 219, false),)), $this); ?>
<div id="header" class="cf">
                
              
					<div class="headerLeftTop cf">
				  <?php if (( ( $this->_tpl_vars['payment_login'] == 'company' || $this->_tpl_vars['company_page'] != '' || $this->_tpl_vars['renew_plan'] == 'yes' || $_GET['pagen'] == 'emp_payment_failed' || $_GET['pagen'] == 'emp_payment_success' || $_GET['pagen'] == 'additional_purchase' || $this->_tpl_vars['upgrade_packages'] == 'yes' || $_GET['pagen'] == 'employer_payments' ) && $_SESSION['em_id'] > 0 ) || ( $_SESSION['co_id'] > 0 && ( $this->_tpl_vars['payment_login'] == 'college' || $_GET['pagen'] == 'college_plans' || $_GET['pagen'] == 'college_payment_failed' || $_GET['pagen'] == 'college_additional_purchase' || $this->_tpl_vars['college_page'] == 'college' || $_GET['pagen'] == 'college_payment_success' ) )): ?>
				 
						
						<div class="right cf loginTabs" style="width:auto;">				
					<?php if ($this->_tpl_vars['payment_login'] == 'college' || $this->_tpl_vars['college_page'] != '' || $_GET['pagen'] == 'college_plans' || $_GET['pagen'] == 'college_additional_purchase' || $_GET['pagen'] == 'college_payment_failed' || $_GET['pagen'] == 'college_payment_success'): ?>
					
						<ul class="cf"><span class="freeJob floatL"><?php echo $this->_tpl_vars['menu_lang']->JText('MSG_JOB_SEEKER_WELCOME'); ?>
, <span class="welcomeName"><?php echo ((is_array($_tmp=((is_array($_tmp=$_SESSION['co_college_name'])) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)))) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</span></span>
							<li><a href="<?php echo $this->_tpl_vars['co_webroot']; ?>
dashboard/" class="resume">Dashboard</a></li>
                        	<li class=""><a id="logout" href="<?php echo $this->_tpl_vars['co_webroot']; ?>
logout/" class="refers"><?php echo $this->_tpl_vars['menu_lang']->JText('LINK_JOB_SEEKER_LOGOUT'); ?>
 </a> </li>
                        </ul>						
					<?php else: ?>
						<ul class="cf"><span class="freeJob floatL"><?php echo $this->_tpl_vars['menu_lang']->JText('MSG_JOB_SEEKER_WELCOME'); ?>
, <span class="welcomeName"><?php echo ((is_array($_tmp=$_SESSION['em_company_name'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</span></span>
							<li><a href="<?php echo $this->_tpl_vars['emp_webroot']; ?>
dashboard/" class="resume">Dashboard</a></li>
                        	<li class=""><a id="logout" href="<?php echo $this->_tpl_vars['emp_webroot']; ?>
logout/" class="refers"><?php echo $this->_tpl_vars['menu_lang']->JText('LINK_JOB_SEEKER_LOGOUT'); ?>
 </a> </li>
                        </ul>
					<?php endif; ?>
                    </div>
				  <?php else: ?>
				  <?php if ($_SESSION['user_id'] > 0): ?>
					
					
					<div class="left">
                            <ul class="cf"  style="width:225px">
							
							<!--li class="last login" style="padding-right:0px"><span style="margin: 7px 0 0;color:#666666;">Need Help? </span><span class="phoneSup">(044) 4900 4900 </span></li-->
					  </ul></div>  
					<div class="right cf loginTabs" style="width:auto;">				
					
					 
						<ul class="cf"><span class="freeJob floatL">
						
						  
						  
						<?php echo $this->_tpl_vars['menu_lang']->JText('MSG_JOB_SEEKER_WELCOME'); ?>
, <span class="welcomeName"><?php echo $_SESSION['new_user_first_name']; ?>
</span></span>
						<?php if ($_GET['pagen'] != 'index'): ?><li><a href="<?php echo $this->_tpl_vars['url']; ?>
"><?php echo $this->_tpl_vars['menu_lang']->JText('MENU_HOME'); ?>
</a></li><?php endif; ?>
						
													
								<li class=""><a  id="Settings" href="<?php echo $this->_tpl_vars['url']; ?>
settings/" class="logout"><?php echo $this->_tpl_vars['menu_lang']->JText('LINK_SETTING'); ?>
</a> </li>								
								<li class=""><a id="logout" href="<?php echo $this->_tpl_vars['url']; ?>
logout/" class="refers"><?php echo $this->_tpl_vars['menu_lang']->JText('LINK_JOB_SEEKER_LOGOUT'); ?>
 </a> </li>
                        </ul>
                    </div>				
                 <?php endif; ?>
				 
				 <?php endif; ?>
				 
				 <?php if ($_SESSION['user_id'] == ''): ?>
				   
                        <div class="left">
                            <ul class="cf"  style="width:242px">
								
								<?php if ($_GET['pagen'] != '' && $_GET['pagen'] != 'index'): ?>								
								<li><a href="<?php echo $this->_tpl_vars['url']; ?>
"><?php echo $this->_tpl_vars['menu_lang']->JText('MENU_HOME'); ?>
</a></li>				
								<?php endif; ?>
								 <li><a href="<?php echo $this->_tpl_vars['url']; ?>
registration/">Registration</a></li>	
							  <li class="last"><a href="<?php echo $this->_tpl_vars['url']; ?>
refer_site_friends/">Refer Friends</a></li>	
							  <!--li class="last login" style="padding-right:0px"><span style="margin: 7px 0 0;color:#666666;">Need Help? </span><span class="phoneSup">(044) 4900 4900 </span></li>
							     <!--li class="last" style="padding-right:0px"><a href="<?php echo $this->_tpl_vars['url']; ?>
search_jobs/?show=premium_jobs"><?php echo $this->_tpl_vars['footer_lang']->JText('LINK_PREMIUM_JOBS'); ?>
</a></li>
							
													
								<li class="need_help">Need Help?</li>			
								
							
								<li class="last online_chat"><span id="phplive_btn_1372222327" onclick="phplive_launch_chat_0(0)" style="cursor: pointer;"></span></li-->
                               
							</ul>
                        </div>
						<?php if (( ( $this->_tpl_vars['payment_login'] == '' && $this->_tpl_vars['company_page'] == '' && $this->_tpl_vars['college_page'] == '' && $this->_tpl_vars['renew_plan'] != 'yes' && $_GET['pagen'] != 'college_additional_purchase' && $_GET['pagen'] != 'college_payment_failed' && $_GET['pagen'] != 'college_payment_success' && $_GET['pagen'] != 'emp_payment_failed' && $_GET['pagen'] != 'emp_payment_success' && $_GET['pagen'] != 'additional_purchase' && $this->_tpl_vars['upgrade_packages'] != 'yes' && $_GET['pagen'] != 'employer_payments' ) || ( $_SESSION['em_id'] == '' && $_SESSION['co_id'] == '' ) )): ?>
						<form  method="post" name="header_login_form" action="<?php if ($_GET['pagen'] != 'login'): ?><?php echo $this->_tpl_vars['url']; ?>
login/<?php else: ?><?php echo $_SERVER['REQUEST_URI']; ?>
<?php endif; ?>"  >
                        <div class="right cf">
                            <ul class="cf">
                                <li><span class="login"><?php echo $this->_tpl_vars['menu_lang']->JText('LBL_JOB_SEEKER_LOGIN'); ?>
</span></li>
                                <li>
                                    <div class="loginBg"><input class="placeholder" placeholder="email address" name="login_email" type="text" id="text"/></div></li>
                                <li>
                                    <div class="loginBg"><input class="placeholder" placeholder="password" name="login_password" type="password"/></div></li>
                                <li>
								 <input type="hidden" id="validate_top_login" name="validate_top_login" value="validate_top_login" />
                                    <button class="small" type="submit" id="validate_login" name="login" value="submit">
                                        <span class=""><?php echo $this->_tpl_vars['menu_lang']->JText('BTN_LOGIN'); ?>
</span></button>
                                </li>
                            </ul>
                        </div>					
						</form>    
					<?php endif; ?>						
                  <?php endif; ?>				  
			</div>	
			
			  <a href="<?php echo $this->_tpl_vars['url']; ?>
<?php if ($_SESSION['user_id']): ?>profile/<?php endif; ?>">
                    <img class="logo" src="<?php echo $this->_tpl_vars['url']; ?>
images/jobsfactory_logo.png" alt="Jobs Factory"></a>
					
					
		  <div class="headerLeft cf">	
		
			
					<!--HEADER LEFT TOP-->
                    <div class="nav">
                        <div class="navRightBg navigation" style="clear:left;">
                           
							<?php if ($_SESSION['user_id'] > 0): ?>
							 <ul class="navList cf">
								<li><a href="<?php echo $this->_tpl_vars['url']; ?>
profile/" <?php echo $this->_tpl_vars['profile_selected']; ?>
><?php echo $this->_tpl_vars['menu_lang']->JText('MENU_MY_PROFILE'); ?>
</a></li>
												<li><a class="<?php echo $this->_tpl_vars['gen_resume_selected']; ?>
" href="<?php echo $this->_tpl_vars['url']; ?>
generate_your_resume/"><?php echo $this->_tpl_vars['menu_lang']->JText('LBL_GENERATE_RESUME'); ?>
</a></li>	

								 <li style="border:none"><a href="<?php echo $this->_tpl_vars['url']; ?>
search_jobs/" class="<?php echo $this->_tpl_vars['search_jobs_selected']; ?>
"><?php echo $this->_tpl_vars['menu_lang']->JText('LINK_SEARCH_JOBS'); ?>
 <span class="findJob">&nbsp;&nbsp;&nbsp;</span>
								  </a>
								  
									  <ul>
                       				   	  <li><a href="<?php echo $this->_tpl_vars['url']; ?>
more_location/"><?php echo $this->_tpl_vars['menu_lang']->JText('LINK_SEARCH_LOCATION'); ?>
</a></li>
                     				       <!--li><a href="<?php echo $this->_tpl_vars['url']; ?>
more_company/"><?php echo $this->_tpl_vars['menu_lang']->JText('LINK_SEARCH_COMPANY'); ?>
</a></li-->
										   <li><a href="<?php echo $this->_tpl_vars['url']; ?>
more_department/"><?php echo $this->_tpl_vars['menu_lang']->JText('LINK_SEARCH_DEPT'); ?>
</a></li>
                        				    <li><a href="<?php echo $this->_tpl_vars['url']; ?>
more_industry/"><?php echo $this->_tpl_vars['menu_lang']->JText('LINK_SEARCH_INDUSTRY'); ?>
</a></li>
                       					     <li><a href="<?php echo $this->_tpl_vars['url']; ?>
advanced_search/"><?php echo $this->_tpl_vars['menu_lang']->JText('LINK_ADV_SEARCH'); ?>
</a></li>
											  <li><a href="<?php echo $this->_tpl_vars['url']; ?>
search_jobs/?show=premium_jobs"><?php echo $this->_tpl_vars['footer_lang']->JText('LINK_PREMIUM_JOBS'); ?>
</a></li>									 
											
                    				   </ul>							
								</li>
								
								
								<li><a href="<?php echo $this->_tpl_vars['url']; ?>
applied_jobs/" class="<?php echo $this->_tpl_vars['applied_jobs_selected']; ?>
 <?php if (( $this->_tpl_vars['menu_count']['applied_jobs_count'] ) > 0): ?>count<?php endif; ?>"><?php echo $this->_tpl_vars['menu_lang']->JText('MENU_APPLIED_JOBS'); ?>
<span <?php if ($this->_tpl_vars['menu_count']['applied_jobs_count'] > 0): ?><?php else: ?>style="display:none"<?php endif; ?> class="numberMiddle applied_jobs_count"><?php echo $this->_tpl_vars['menu_count']['applied_jobs_count']; ?>
</span></a></li>
								
								<li><a href="<?php echo $this->_tpl_vars['url']; ?>
saved_jobs/" class="<?php echo $this->_tpl_vars['saved_jobs_selected']; ?>
 <?php if (( $this->_tpl_vars['menu_count']['saved_jobs_count'] ) > 0): ?>count<?php endif; ?>"><?php echo $this->_tpl_vars['menu_lang']->JText('LINK_SAVED_SEARCHES'); ?>
 <span <?php if ($this->_tpl_vars['menu_count']['saved_jobs_count'] > 0): ?><?php else: ?>style="display:none"<?php endif; ?> class="numberMiddle saved_jobs_count"><?php echo $this->_tpl_vars['menu_count']['saved_jobs_count']; ?>
</span></a></li>
								
								<li><a href="<?php echo $this->_tpl_vars['url']; ?>
job_alerts/" <?php echo $this->_tpl_vars['inbox_selected']; ?>
 <?php if (( $this->_tpl_vars['menu_count']['job_alerts_count']+$this->_tpl_vars['TOTAL_UNREAD']+$this->_tpl_vars['TOTAL_UNREAD_KC']+$this->_tpl_vars['TOTAL_UNREAD_EN'] ) > 0): ?>class="count"<?php endif; ?>><?php echo $this->_tpl_vars['menu_lang']->JText('MENU_INBOX'); ?>
<span <?php if (( $this->_tpl_vars['menu_count']['job_alerts_count']+$this->_tpl_vars['TOTAL_UNREAD']+$this->_tpl_vars['TOTAL_UNREAD_KC']+$this->_tpl_vars['TOTAL_UNREAD_EN'] ) > 0): ?><?php else: ?>style="display:none"<?php endif; ?> class="numberMiddle inbox_count"><?php echo $this->_tpl_vars['menu_count']['job_alerts_count']+$this->_tpl_vars['TOTAL_UNREAD']+$this->_tpl_vars['TOTAL_UNREAD_KC']+$this->_tpl_vars['TOTAL_UNREAD_EN']; ?>
</span></a> </li>
								
				
				<li><a href="<?php echo $this->_tpl_vars['url']; ?>
refer_site_details/" class="<?php echo $this->_tpl_vars['refer_fnd_selected']; ?>
 <?php if (( $this->_tpl_vars['referral_menu']['friends_referred'] ) > 0): ?>count<?php endif; ?>"><?php echo $this->_tpl_vars['menu_lang']->JText('LBL_REFER_FRIENDS'); ?>
 <span <?php if ($this->_tpl_vars['referral_menu']['friends_referred'] > 0): ?><?php else: ?>style="display:none"<?php endif; ?> class="numberMiddle online_test_count"><?php echo $this->_tpl_vars['referral_menu']['friends_referred']; ?>
</span></a></li>
				
				
				
				 	<!--li><a href="<?php echo $this->_tpl_vars['url']; ?>
refer_site_details/" class="resume"><?php echo $this->_tpl_vars['menu_lang']->JText('LBL_REFER_FRIENDS'); ?>
</a><span <?php if ($this->_tpl_vars['referral_menu']['friends_referred'] > 0): ?><?php else: ?>style="display:none"<?php endif; ?> class="numberMiddle online_test_count" style="top:-7px; left:-1px;"><?php echo $this->_tpl_vars['referral_menu']['friends_referred']; ?>
</span></li-->
					
					

<li style="background:none"><a href="<?php echo $this->_tpl_vars['url']; ?>
online_tests/" class="<?php echo $this->_tpl_vars['take_up_test_selected']; ?>
 <?php if (( $this->_tpl_vars['menu_count']['online_test_count'] ) > 0): ?>count<?php endif; ?>"><?php echo $this->_tpl_vars['menu_lang']->JText('MENU_TAKE_UP_TESTS'); ?>
<span <?php if ($this->_tpl_vars['menu_count']['online_test_count'] > 0): ?><?php else: ?>style="display:none"<?php endif; ?> class="numberMiddle online_test_count"><?php echo $this->_tpl_vars['menu_count']['online_test_count']; ?>
</span></a></li>				
							</ul>
							<?php else: ?>
							 <ul class="navList cf">
							     <li style="border:none"><a href="<?php echo $this->_tpl_vars['url']; ?>
search_jobs/" class="<?php echo $this->_tpl_vars['search_jobs_selected']; ?>
"><?php echo $this->_tpl_vars['menu_lang']->JText('LINK_SEARCH_JOBS'); ?>
 <span class="findJob">&nbsp;&nbsp;&nbsp;</span>
								  </a>
									  <ul>
                       				   	  <li><a href="<?php echo $this->_tpl_vars['url']; ?>
more_location/"><?php echo $this->_tpl_vars['menu_lang']->JText('LINK_SEARCH_LOCATION'); ?>
</a></li>
                     				       <!--li><a href="<?php echo $this->_tpl_vars['url']; ?>
more_company/"><?php echo $this->_tpl_vars['menu_lang']->JText('LINK_SEARCH_COMPANY'); ?>
</a></li-->
										    <li><a href="<?php echo $this->_tpl_vars['url']; ?>
more_department/"><?php echo $this->_tpl_vars['menu_lang']->JText('LINK_SEARCH_DEPT'); ?>
</a></li>
                        				    <li><a href="<?php echo $this->_tpl_vars['url']; ?>
more_industry/"><?php echo $this->_tpl_vars['menu_lang']->JText('LINK_SEARCH_INDUSTRY'); ?>
</a></li>
                       					     <li><a href="<?php echo $this->_tpl_vars['url']; ?>
advanced_search/"><?php echo $this->_tpl_vars['menu_lang']->JText('LINK_ADV_SEARCH'); ?>
</a></li>
											  <li><a href="<?php echo $this->_tpl_vars['url']; ?>
search_jobs/?show=premium_jobs"><?php echo $this->_tpl_vars['footer_lang']->JText('LINK_PREMIUM_JOBS'); ?>
</a></li>									 
											
                    				    </ul>							
								</li>
								
                                <li style="border:none"><a href="<?php echo $this->_tpl_vars['url']; ?>
login/" class="<?php echo $this->_tpl_vars['job_seeker_selected']; ?>
"><?php echo $this->_tpl_vars['menu_lang']->JText('MENU_JOB_SEEKERS'); ?>
 <span class="findJob">&nbsp;&nbsp;&nbsp;</span></a>
																	  <ul>
											  <li><a href="<?php echo $this->_tpl_vars['url']; ?>
login/"><?php echo $this->_tpl_vars['menu_lang']->JText('BTN_LOGIN'); ?>
</a></li>	
											 <li><a href="<?php echo $this->_tpl_vars['url']; ?>
registration/">Registration</a></li>	
                     				       <li><a href="<?php echo $this->_tpl_vars['url']; ?>
generate_resume_free/"><?php echo $this->_tpl_vars['menu_lang']->JText('LBL_GENERATE_RESUME'); ?>
</a></li>
											
											
										   <li><a href="<?php echo $this->_tpl_vars['url']; ?>
refer_friends_rewards/"><?php echo $this->_tpl_vars['menu_lang']->JText('LBL_REFER_FRIENDS'); ?>
</a></li>
										   
										    <!--li><a href="<?php echo $this->_tpl_vars['url']; ?>
news/"><?php echo $this->_tpl_vars['menu_lang']->JText('MENU_LATEST_NEWS'); ?>
</a></li-->
										   </ul>
										   
										   </li>
										   
                                <li style="border:none"><a href="<?php echo $this->_tpl_vars['url']; ?>
emp_login/" class="<?php echo $this->_tpl_vars['emp_selected']; ?>
"><?php echo $this->_tpl_vars['menu_lang']->JText('MENU_EMPLOYERS'); ?>
 <span class="findJob">&nbsp;&nbsp;&nbsp;</span></a>
																	  <ul>
																	   <li><a href="<?php echo $this->_tpl_vars['url']; ?>
emp_login/"><?php echo $this->_tpl_vars['menu_lang']->JText('BTN_LOGIN'); ?>
</a></li>
																	  <li><a href="<?php echo $this->_tpl_vars['url']; ?>
emp_packages/"><?php echo $this->_tpl_vars['menu_lang']->JText('MENU_PACKAGES'); ?>
</a></li>
																		
																		</ul>
								</li>


                           
							

                                <li><a href="<?php echo $this->_tpl_vars['url']; ?>
college_login/" class="<?php echo $this->_tpl_vars['camp_selected']; ?>
" ><?php echo $this->_tpl_vars['menu_lang']->JText('MENU_COLLEGE'); ?>
  <span class="findJob">&nbsp;&nbsp;&nbsp;</span></a>
								 <ul>
									 <li><a href="<?php echo $this->_tpl_vars['url']; ?>
college_login/"><?php echo $this->_tpl_vars['menu_lang']->JText('BTN_LOGIN'); ?>
</a></li>
																	  <li><a href="<?php echo $this->_tpl_vars['url']; ?>
college_plans/"><?php echo $this->_tpl_vars['menu_lang']->JText('MENU_COLLEGE_PLAN'); ?>
</a></li>
																	  
																		<li><a href="<?php echo $this->_tpl_vars['url']; ?>
campus_placement/"><?php echo $this->_tpl_vars['menu_lang']->JText('MENU_COLLEGE_PLACEMENT'); ?>
</a></li>
																		</ul>

								</li>
								
								     <!--li><a href="<?php echo $this->_tpl_vars['url']; ?>
features/" class="<?php echo $this->_tpl_vars['features_selected']; ?>
"><?php echo $this->_tpl_vars['footer_lang']->JText('LINK_FEATURES'); ?>
</a></li-->
								
								  <!--li><a href="<?php echo $this->_tpl_vars['url']; ?>
how_it_works/" class="<?php echo $this->_tpl_vars['works_selected']; ?>
"><?php echo $this->_tpl_vars['menu_lang']->JText('LINK_HOW_IT_WORKDS'); ?>
</a></li-->
								
								  <li><a href="<?php echo $this->_tpl_vars['url']; ?>
news/" class="<?php echo $this->_tpl_vars['news_selected']; ?>
"><?php echo $this->_tpl_vars['menu_lang']->JText('LINK_LATEST_UPDATES'); ?>
</a></li>
								  
								   <li><a href="<?php echo $this->_tpl_vars['url']; ?>
about_us/" class="<?php echo $this->_tpl_vars['about_selected']; ?>
"><?php echo $this->_tpl_vars['footer_lang']->JText('LINK_ABOUT_MELA'); ?>
</a>
								   
								    <!--ul>
									 <li><a href="<?php echo $this->_tpl_vars['url']; ?>
team/"><?php echo $this->_tpl_vars['footer_lang']->JText('LINK_OUR_TEAM'); ?>
</a></li>
								 <li><a href="<?php echo $this->_tpl_vars['url']; ?>
partner_with_us/"><?php echo $this->_tpl_vars['footer_lang']->JText('LINK_PARTNER'); ?>
</a></li>
								
						</ul-->
																		
																		</li>
								   
                           
								
								
								 <li><a href="javascript:void(0)" class="<?php echo $this->_tpl_vars['help_selected']; ?>
""" ><?php echo $this->_tpl_vars['menu_lang']->JText('LINK_HELP'); ?>
 <span class="findJob">&nbsp;&nbsp;&nbsp;</span></a>	  <ul style="">										  
												<li><a href="<?php echo $this->_tpl_vars['url']; ?>
faq/"><?php echo $this->_tpl_vars['menu_lang']->JText('MENU_FAQ'); ?>
</a></li>
												 <li><a href="<?php echo $this->_tpl_vars['url']; ?>
contact_us/"><?php echo $this->_tpl_vars['footer_lang']->JText('LINK_CONTACT_US'); ?>
</a></li>
											  <li><a href="javascript:void(0);" class="feedBack"><?php echo $this->_tpl_vars['menu_lang']->JText('LINK_FEEDBACK'); ?>
</a></li>
											 <li><a href="javascript:void(0);" class="report_bug"><?php echo $this->_tpl_vars['menu_lang']->JText('LINK_REPORT_BUG'); ?>
</a></li>
											
									</ul>
								 </li>
								 
								  <?php if (count($this->_tpl_vars['drives']) == 0): ?>
								  <?php $this->assign('style', "background:none"); ?>
								  <?php endif; ?>
								 
								 <?php if (count($this->_tpl_vars['jobfair']) > 0): ?>	
								 
								  <li style="<?php echo $this->_tpl_vars['style']; ?>
"><a href="javascript:void(0)" class="<?php echo $this->_tpl_vars['fair_selected']; ?>
""" >Jobfair <span class="findJob">&nbsp;&nbsp;&nbsp;</span></a>	  <ul style="">										  
								<li><a href="<?php echo $this->_tpl_vars['url']; ?>
jobfair_photo/">Photo Gallery</a></li>

											<?php $_from = $this->_tpl_vars['jobfair']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
						      		<!-- <li><a href="jobfair_popup/<?php echo $this->_tpl_vars['k']; ?>
" class="iframeBox" val="42_80""><?php echo $this->_tpl_vars['v']; ?>
</a></li> -->
							      		<li><a id="<?php echo $this->_tpl_vars['k']; ?>
" rel='jobfair' href="javascript:void(0);" class="iframeBox" value="<?php echo $this->_tpl_vars['k']; ?>
"><?php echo $this->_tpl_vars['v']; ?>
</a></li>

							      		<?php endforeach; endif; unset($_from); ?>  						
											
									</ul>
								 </li>
								 <?php endif; ?>
								 
								 <?php if (count($this->_tpl_vars['drives']) > 0): ?>
								  <li style="background:none"><a href="javascript:void(0)" class="<?php echo $this->_tpl_vars['help_selected']; ?>
""" >Drives <span class="findJob">&nbsp;&nbsp;&nbsp;</span></a>	  <ul style="width:137px">										  
											<?php $_from = $this->_tpl_vars['drives']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
<!--							      		<li><a href=""><?php echo $this->_tpl_vars['v']; ?>
</a></li>-->
							      		<li><a id="<?php echo $this->_tpl_vars['k']; ?>
" rel='drive' href="javascript:void(0);" class="iframeBox" value="<?php echo $this->_tpl_vars['k']; ?>
"><?php echo $this->_tpl_vars['v']; ?>
</a></li>
							      		<?php endforeach; endif; unset($_from); ?>  
											
									</ul>
								 </li>
								 <?php endif; ?>
								 
							</ul>
						    <?php endif; ?>
							
							
							  
							  
                            </ul>
							
		
	
                        </div>						
						
                    </div>
					
					
                    <!--NAV-->
                </div>
                <!--HEADER LEFT-->
            </div>
			
			
            <!--HEADER-->