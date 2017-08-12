<div id="header" class="cf">
                
              
					<div class="headerLeftTop cf">
				  {if (( $payment_login eq 'company' || $company_page neq '' || $renew_plan eq 'yes' || $smarty.get.pagen eq 'emp_payment_failed' || $smarty.get.pagen eq 'emp_payment_success' || $smarty.get.pagen eq 'additional_purchase' || $upgrade_packages eq 'yes' || $smarty.get.pagen eq 'employer_payments') && $smarty.session.em_id gt 0) || ($smarty.session.co_id > 0 && ($payment_login eq 'college' || $smarty.get.pagen eq 'college_plans' || $smarty.get.pagen eq 'college_payment_failed' || $smarty.get.pagen eq 'college_additional_purchase' || $college_page eq 'college' || $smarty.get.pagen eq 'college_payment_success'))}
				 
						
						<div class="right cf loginTabs" style="width:auto;">				
					{if $payment_login eq 'college' || $college_page neq '' || $smarty.get.pagen eq 'college_plans' || $smarty.get.pagen eq 'college_additional_purchase' || $smarty.get.pagen eq 'college_payment_failed' || $smarty.get.pagen eq 'college_payment_success'}
					
						<ul class="cf"><span class="freeJob floatL">{$menu_lang->JText('MSG_JOB_SEEKER_WELCOME')}, <span class="welcomeName">{$smarty.session.co_college_name|lower|capitalize}</span></span>
							<li><a href="{$co_webroot}dashboard/" class="resume">Dashboard</a></li>
                        	<li class=""><a id="logout" href="{$co_webroot}logout/" class="refers">{$menu_lang->JText('LINK_JOB_SEEKER_LOGOUT')} </a> </li>
                        </ul>						
					{else}
						<ul class="cf"><span class="freeJob floatL">{$menu_lang->JText('MSG_JOB_SEEKER_WELCOME')}, <span class="welcomeName">{$smarty.session.em_company_name|capitalize}</span></span>
							<li><a href="{$emp_webroot}dashboard/" class="resume">Dashboard</a></li>
                        	<li class=""><a id="logout" href="{$emp_webroot}logout/" class="refers">{$menu_lang->JText('LINK_JOB_SEEKER_LOGOUT')} </a> </li>
                        </ul>
					{/if}
                    </div>
				  {else}
				  {if $smarty.session.user_id > 0}
					
					
					<div class="left">
                            <ul class="cf"  style="width:225px">
							
							<!--li class="last login" style="padding-right:0px"><span style="margin: 7px 0 0;color:#666666;">Need Help? </span><span class="phoneSup">(044) 4900 4900 </span></li-->
					  </ul></div>  
					<div class="right cf loginTabs" style="width:auto;">				
					
					 
						<ul class="cf"><span class="freeJob floatL">
						
						  
						  
						{$menu_lang->JText('MSG_JOB_SEEKER_WELCOME')}, <span class="welcomeName">{$smarty.session.new_user_first_name}</span></span>
						{if $smarty.get.pagen neq 'index'}<li><a href="{$url}">{$menu_lang->JText('MENU_HOME')}</a></li>{/if}
						
													
								<li class=""><a  id="Settings" href="{$url}settings/" class="logout">{$menu_lang->JText('LINK_SETTING')}</a> </li>								
								<li class=""><a id="logout" href="{$url}logout/" class="refers">{$menu_lang->JText('LINK_JOB_SEEKER_LOGOUT')} </a> </li>
                        </ul>
                    </div>				
                 {/if}
				 
				 {/if}
				 
				 {if $smarty.session.user_id eq ''}
				   
                        <div class="left">
                            <ul class="cf"  style="width:242px">
								
								{if $smarty.get.pagen neq '' && $smarty.get.pagen neq 'index'}								
								<li><a href="{$url}">{$menu_lang->JText('MENU_HOME')}</a></li>				
								{/if}
								 <li><a href="{$url}registration/">Registration</a></li>	
							  <li class="last"><a href="{$url}refer_site_friends/">Refer Friends</a></li>	
							  <!--li class="last login" style="padding-right:0px"><span style="margin: 7px 0 0;color:#666666;">Need Help? </span><span class="phoneSup">(044) 4900 4900 </span></li>
							     <!--li class="last" style="padding-right:0px"><a href="{$url}search_jobs/?show=premium_jobs">{$footer_lang->JText('LINK_PREMIUM_JOBS')}</a></li>
							
													
								<li class="need_help">Need Help?</li>			
								
							
								<li class="last online_chat"><span id="phplive_btn_1372222327" onclick="phplive_launch_chat_0(0)" style="cursor: pointer;"></span></li-->
                               
							</ul>
                        </div>
						{if  (($payment_login eq '' && $company_page eq '' && $college_page eq '' && $renew_plan neq 'yes' && $smarty.get.pagen neq 'college_additional_purchase' && $smarty.get.pagen neq 'college_payment_failed' && $smarty.get.pagen neq 'college_payment_success' && $smarty.get.pagen neq 'emp_payment_failed' && $smarty.get.pagen neq 'emp_payment_success' && $smarty.get.pagen neq 'additional_purchase' && $upgrade_packages neq 'yes' && $smarty.get.pagen neq 'employer_payments') || ($smarty.session.em_id eq '' && $smarty.session.co_id eq '' )) }
						<form  method="post" name="header_login_form" action="{if $smarty.get.pagen neq 'login'}{$url}login/{else}{$smarty.server.REQUEST_URI}{/if}"  >
                        <div class="right cf">
                            <ul class="cf">
                                <li><span class="login">{$menu_lang->JText('LBL_JOB_SEEKER_LOGIN')}</span></li>
                                <li>
                                    <div class="loginBg"><input class="placeholder" placeholder="email address" name="login_email" type="text" id="text"/></div></li>
                                <li>
                                    <div class="loginBg"><input class="placeholder" placeholder="password" name="login_password" type="password"/></div></li>
                                <li>
								 <input type="hidden" id="validate_top_login" name="validate_top_login" value="validate_top_login" />
                                    <button class="small" type="submit" id="validate_login" name="login" value="submit">
                                        <span class="">{$menu_lang->JText('BTN_LOGIN')}</span></button>
                                </li>
                            </ul>
                        </div>					
						</form>    
					{/if}						
                  {/if}				  
			</div>	
			
			  <a href="{$url}{if $smarty.session.user_id}profile/{/if}">
                    <img class="logo" src="{$url}images/jobsfactory_logo.png" alt="Jobs Factory"></a>
					
					
		  <div class="headerLeft cf">	
		
			
					<!--HEADER LEFT TOP-->
                    <div class="nav">
                        <div class="navRightBg navigation" style="clear:left;">
                           
							{if $smarty.session.user_id > 0 }
							 <ul class="navList cf">
								<li><a href="{$url}profile/" {$profile_selected}>{$menu_lang->JText('MENU_MY_PROFILE')}</a></li>
												<li><a class="{$gen_resume_selected}" href="{$url}generate_your_resume/">{$menu_lang->JText('LBL_GENERATE_RESUME')}</a></li>	

								 <li style="border:none"><a href="{$url}search_jobs/" class="{$search_jobs_selected}">{$menu_lang->JText('LINK_SEARCH_JOBS')} <span class="findJob">&nbsp;&nbsp;&nbsp;</span>
								  </a>
								  
									  <ul>
                       				   	  <li><a href="{$url}more_location/">{$menu_lang->JText('LINK_SEARCH_LOCATION')}</a></li>
                     				       <!--li><a href="{$url}more_company/">{$menu_lang->JText('LINK_SEARCH_COMPANY')}</a></li-->
										   <li><a href="{$url}more_department/">{$menu_lang->JText('LINK_SEARCH_DEPT')}</a></li>
                        				    <li><a href="{$url}more_industry/">{$menu_lang->JText('LINK_SEARCH_INDUSTRY')}</a></li>
                       					     <li><a href="{$url}advanced_search/">{$menu_lang->JText('LINK_ADV_SEARCH')}</a></li>
											  <li><a href="{$url}search_jobs/?show=premium_jobs">{$footer_lang->JText('LINK_PREMIUM_JOBS')}</a></li>									 
											
                    				   </ul>							
								</li>
								
								
								<li><a href="{$url}applied_jobs/" class="{$applied_jobs_selected} {if ($menu_count.applied_jobs_count) > 0}count{/if}">{$menu_lang->JText('MENU_APPLIED_JOBS')}<span {if $menu_count.applied_jobs_count > 0}{else}style="display:none"{/if} class="numberMiddle applied_jobs_count">{$menu_count.applied_jobs_count}</span></a></li>
								
								<li><a href="{$url}saved_jobs/" class="{$saved_jobs_selected} {if ($menu_count.saved_jobs_count) > 0}count{/if}">{$menu_lang->JText('LINK_SAVED_SEARCHES')} <span {if $menu_count.saved_jobs_count > 0}{else}style="display:none"{/if} class="numberMiddle saved_jobs_count">{$menu_count.saved_jobs_count}</span></a></li>
								
								<li><a href="{$url}job_alerts/" {$inbox_selected} {if ($menu_count.job_alerts_count+$TOTAL_UNREAD+$TOTAL_UNREAD_KC+$TOTAL_UNREAD_EN) > 0}class="count"{/if}>{$menu_lang->JText('MENU_INBOX')}<span {if ($menu_count.job_alerts_count+$TOTAL_UNREAD+$TOTAL_UNREAD_KC+$TOTAL_UNREAD_EN) > 0}{else}style="display:none"{/if} class="numberMiddle inbox_count">{$menu_count.job_alerts_count+$TOTAL_UNREAD+$TOTAL_UNREAD_KC+$TOTAL_UNREAD_EN}</span></a> </li>
								
				
				<li><a href="{$url}refer_site_details/" class="{$refer_fnd_selected} {if ($referral_menu.friends_referred) > 0}count{/if}">{$menu_lang->JText('LBL_REFER_FRIENDS')} <span {if $referral_menu.friends_referred > 0}{else}style="display:none"{/if} class="numberMiddle online_test_count">{$referral_menu.friends_referred}</span></a></li>
				
				
				
				 	<!--li><a href="{$url}refer_site_details/" class="resume">{$menu_lang->JText('LBL_REFER_FRIENDS')}</a><span {if $referral_menu.friends_referred > 0}{else}style="display:none"{/if} class="numberMiddle online_test_count" style="top:-7px; left:-1px;">{$referral_menu.friends_referred}</span></li-->
					
					

<li style="background:none"><a href="{$url}online_tests/" class="{$take_up_test_selected} {if ($menu_count.online_test_count) > 0}count{/if}">{$menu_lang->JText('MENU_TAKE_UP_TESTS')}<span {if $menu_count.online_test_count > 0}{else}style="display:none"{/if} class="numberMiddle online_test_count">{$menu_count.online_test_count}</span></a></li>				
							</ul>
							{else}
							 <ul class="navList cf">
							     <li style="border:none"><a href="{$url}search_jobs/" class="{$search_jobs_selected}">{$menu_lang->JText('LINK_SEARCH_JOBS')} <span class="findJob">&nbsp;&nbsp;&nbsp;</span>
								  </a>
									  <ul>
                       				   	  <li><a href="{$url}more_location/">{$menu_lang->JText('LINK_SEARCH_LOCATION')}</a></li>
                     				       <!--li><a href="{$url}more_company/">{$menu_lang->JText('LINK_SEARCH_COMPANY')}</a></li-->
										    <li><a href="{$url}more_department/">{$menu_lang->JText('LINK_SEARCH_DEPT')}</a></li>
                        				    <li><a href="{$url}more_industry/">{$menu_lang->JText('LINK_SEARCH_INDUSTRY')}</a></li>
                       					     <li><a href="{$url}advanced_search/">{$menu_lang->JText('LINK_ADV_SEARCH')}</a></li>
											  <li><a href="{$url}search_jobs/?show=premium_jobs">{$footer_lang->JText('LINK_PREMIUM_JOBS')}</a></li>									 
											
                    				    </ul>							
								</li>
								
                                <li style="border:none"><a href="{$url}login/" class="{$job_seeker_selected}">{$menu_lang->JText('MENU_JOB_SEEKERS')} <span class="findJob">&nbsp;&nbsp;&nbsp;</span></a>
																	  <ul>
											  <li><a href="{$url}login/">{$menu_lang->JText('BTN_LOGIN')}</a></li>	
											 <li><a href="{$url}registration/">Registration</a></li>	
                     				       <li><a href="{$url}generate_resume_free/">{$menu_lang->JText('LBL_GENERATE_RESUME')}</a></li>
											
											
										   <li><a href="{$url}refer_friends_rewards/">{$menu_lang->JText('LBL_REFER_FRIENDS')}</a></li>
										   
										    <!--li><a href="{$url}news/">{$menu_lang->JText('MENU_LATEST_NEWS')}</a></li-->
										   </ul>
										   
										   </li>
										   
                                <li style="border:none"><a href="{$url}emp_login/" class="{$emp_selected}">{$menu_lang->JText('MENU_EMPLOYERS')} <span class="findJob">&nbsp;&nbsp;&nbsp;</span></a>
																	  <ul>
																	   <li><a href="{$url}emp_login/">{$menu_lang->JText('BTN_LOGIN')}</a></li>
																	  <li><a href="{$url}emp_packages/">{$menu_lang->JText('MENU_PACKAGES')}</a></li>
																		
																		</ul>
								</li>


                           
							

                                <li><a href="{$url}college_login/" class="{$camp_selected}" >{$menu_lang->JText('MENU_COLLEGE')}  <span class="findJob">&nbsp;&nbsp;&nbsp;</span></a>
								 <ul>
									 <li><a href="{$url}college_login/">{$menu_lang->JText('BTN_LOGIN')}</a></li>
																	  <li><a href="{$url}college_plans/">{$menu_lang->JText('MENU_COLLEGE_PLAN')}</a></li>
																	  
																		<li><a href="{$url}campus_placement/">{$menu_lang->JText('MENU_COLLEGE_PLACEMENT')}</a></li>
																		</ul>

								</li>
								
								     <!--li><a href="{$url}features/" class="{$features_selected}">{$footer_lang->JText('LINK_FEATURES')}</a></li-->
								
								  <!--li><a href="{$url}how_it_works/" class="{$works_selected}">{$menu_lang->JText('LINK_HOW_IT_WORKDS')}</a></li-->
								
								  <li><a href="{$url}news/" class="{$news_selected}">{$menu_lang->JText('LINK_LATEST_UPDATES')}</a></li>
								  
								   <li><a href="{$url}about_us/" class="{$about_selected}">{$footer_lang->JText('LINK_ABOUT_MELA')}</a>
								   
								    <!--ul>
									 <li><a href="{$url}team/">{$footer_lang->JText('LINK_OUR_TEAM')}</a></li>
								 <li><a href="{$url}partner_with_us/">{$footer_lang->JText('LINK_PARTNER')}</a></li>
								
						</ul-->
																		
																		</li>
								   
                           
								
								
								 <li><a href="javascript:void(0)" class="{$help_selected}""" >{$menu_lang->JText('LINK_HELP')} <span class="findJob">&nbsp;&nbsp;&nbsp;</span></a>	  <ul style="">										  
												<li><a href="{$url}faq/">{$menu_lang->JText('MENU_FAQ')}</a></li>
												 <li><a href="{$url}contact_us/">{$footer_lang->JText('LINK_CONTACT_US')}</a></li>
											  <li><a href="javascript:void(0);" class="feedBack">{$menu_lang->JText('LINK_FEEDBACK')}</a></li>
											 <li><a href="javascript:void(0);" class="report_bug">{$menu_lang->JText('LINK_REPORT_BUG')}</a></li>
											
									</ul>
								 </li>
								 
								  {if $drives|@count eq 0}
								  {assign var="style" value="background:none"}
								  {/if}
								 
								 {if $jobfair|@count gt 0}	
								 
								  <li style="{$style}"><a href="javascript:void(0)" class="{$fair_selected}""" >Jobfair <span class="findJob">&nbsp;&nbsp;&nbsp;</span></a>	  <ul style="">										  
								<li><a href="{$url}jobfair_photo/">Photo Gallery</a></li>

											{foreach from=$jobfair key=k item=v}
						      		<!-- <li><a href="jobfair_popup/{$k}" class="iframeBox" val="42_80"">{$v}</a></li> -->
							      		<li><a id="{$k}" rel='jobfair' href="javascript:void(0);" class="iframeBox" value="{$k}">{$v}</a></li>

							      		{/foreach}  						
											
									</ul>
								 </li>
								 {/if}
								 
								 {if $drives|@count gt 0}
								  <li style="background:none"><a href="javascript:void(0)" class="{$help_selected}""" >Drives <span class="findJob">&nbsp;&nbsp;&nbsp;</span></a>	  <ul style="width:137px">										  
											{foreach from=$drives key=k item=v}
<!--							      		<li><a href="">{$v}</a></li>-->
							      		<li><a id="{$k}" rel='drive' href="javascript:void(0);" class="iframeBox" value="{$k}">{$v}</a></li>
							      		{/foreach}  
											
									</ul>
								 </li>
								 {/if}
								 
							</ul>
						    {/if}
							
							
							  
							  
                            </ul>
							
		
	
                        </div>						
						
                    </div>
					
					
                    <!--NAV-->
                </div>
                <!--HEADER LEFT-->
            </div>
			
			
            <!--HEADER-->