{literal}
<style>
.qualification label{float:left;width:140px !important; }
ul.qualification li.clear { background:none !important; height: 22px !important;  border-bottom: 2px solid #efefef;}
.langDropDown{top:0 !important}
</style>
{/literal}

{include file='../include/top.tpl'}

    <!-- Primary Page Layout
================================================== -->
    <div id="headerContainer">
        <div class="container">
         
           {include file='../include/header.tpl'}           
         
		  
		   <form id="registration_step1" name="registration_step1" class="fileupload reg_forms" method="post" enctype="multipart/form-data">
            <!--HEADER-->
            <div class="innerPage">
				<div class="pageHeader">
			  <h1 class="pageTitle floatL">{$reg_lang->JText('LBL_JOBSEEKER_REG')}</h1>
			  
			  <div style="float:left;height:10px;">					
					{include file='../include/lang_dropdown.tpl'}						
              </div>
				
			  <h2 style="float:right"><span class="active"><a href="{$url}{$language_url}">{$menu_lang->JText('LINK_HOME')}</a> <img src="{$url}images/bullet_green3.png"></span> {$reg_lang->JText('LBL_JOBSEEKER_REG')}
                   </h2>
			
			
		
						
							
			</div>
			
		
							
			<div class="cf floatL mt25" id="pcColor">
						<!--div class="pcLeft errorField" style="{$field_error_disp}"></div>
						<div class="profileComplete errorField" style="{$field_error_disp}"><p>{$reg_lang->JText('MSG_ERROR_REG')}</p></div>
						<div class="pcRight errorField" style="{$field_error_disp}"></div-->
			</div>
                
               
                <ul class="qualification cf regLeft">
                  <li>
                        <label>
                            {$reg_lang->JText('LBL_FULL_NAME')}<sup>*</sup></label>
                        <div class="field{$error[0][1]}">
							{if $smarty.post.full_name}	
                            {assign var = "name" value=$smarty.post.full_name}
							{else}
							{assign var = "name" value=$smarty.get.name}
							{/if}
							<input name="full_name" placeholder="(Incl. Surname)" maxlength="100" id="full_name" class="largeBox"  value="{$name}"/>
                            <span class="errorMsg"  style="{if $error[0][1] eq ''}display: none{/if}">{$error[0][0]}</span>
                        </div>
                    </li>
                    <li class="floatL">
                        <label>
                            {$reg_lang->JText('LBL_MOBILE_NO1')}<sup>*</sup>
							
							</label>
							
                        <div class="field{$error[1][1]}{if $mobile_exists} message{/if}">
							{if $smarty.post.full_name}	
                            {assign var = "mob" value=$smarty.post.mobile1}
							{else}
							{assign var = "mob" value=$smarty.get.mobile}
							{/if}
							
						   <input name="mobile1" maxlength="11" class="frm_tip largeBox" id="mobile1" value="{$mob}" title="{$reg_lang->JText('TIP_MOBILE')}"/>
							<span class="errorMsg width_230" style="{if ($error[1][1] eq '') && ($mobile_exists_class eq '' )}display: none{/if}">{$error[1][0]}{$mobile_exists}</span>
							</div>
							
                    </li>
					
					
					

							
								
							 <li>
                                    <label>
                                      {$reg_lang->JText('LBL_HIGH_EDUCATION')}<sup>*</sup></label>
                                    <div class="field{$error[4][1]}">
                                        <select name="after_school[]" id="after_school_inc" class="default-usage-select2 school_rel">
                                            <option value="">Qualification</option>
												<option value="6" {if $smarty.post.after_school[0] eq '6'} selectedindex="6" selected='selected' {/if}>10<sup>th</sup></option>
												<option value="7" {if $smarty.post.after_school[0] eq '7'} selectedindex="7" selected='selected' {/if}>12<sup>th</sup></option>
												<option value="1" {if $smarty.post.after_school[0] eq '1'} selectedindex="1" selected='selected' {/if}>ITI/ Vocational/ Others</option>

												<option value="2" {if $smarty.post.after_school[0] eq '2'} selectedindex="2" selected='selected' {/if}>Diploma Studies</option>
												<option value="3" {if $smarty.post.after_school[0] eq '3'} selectedindex="3" selected='selected' {/if}>UG Programme</option>
												
												<option value="4" {if $smarty.post.after_school[0] eq '4'} selectedindex="4" selected='selected' {/if}>PG Programme</option>

                                        </select>
										<span class="errorMsg" style="{if $error[4][1] eq ''}display: none{/if}">{$error[4][0]}</span>
										</div>
										
								
										
                                </li>

		
		<div class="degreeDiv"  style="display:none">
		<li>
                        <label>
                            {$reg_lang->JText('LBL_DEGREE')}<sup>*</sup></label>
                        <div class="field_multiple">
                           
							
							<div class="field">
						
							<span class="field_multiple field{$error[50][1]}">
                              <select name="degree[]" id="degree_inc" class="default-usage-select2">		
											<option value="">Degree</option>
										
												{section name=after_course loop=$after_course[0]}
												
												<option value="{$after_course[0][after_course].id}" {if $smarty.post.degree[0] eq $after_course[0][after_course].id} selectedindex="{$after_course[0][after_course].index+1}" selected="selected" {/if}>{$after_course[0][after_course].course_name}</option>
												{/section}
									
										</select>
                                        <span class="errorMsg" style="{if $error[50][1] eq ''}display: none{/if}">{$error[50][0]}</span>
							</span>
							
						
                            </div>
							<div class="clearB"></div>
							<!--span class="errorMsg" style="margin-left: 20px; {if $error[3][1] eq ''}display: none{/if}">{$error[3][0]}</span-->
                        </div>
                    </li>

		<li>
                <label>{$reg_lang->JText('LBL_SPECIALIZATION')} <sup>*</sup></label>
							
				<div class="field{$error[60][1]}">
					<select name="departments[]" id="department_inc" class="default-usage-select2">		
						<option value="">Specialization</option>
						{if $smarty.post.departments[0] eq '0'}
							<option value="0" selected="selected" selectedindex="1">Nil</option>
						{else}
							{section name=specialization loop=$specialization[0]}
								<option value="{$specialization[0][specialization].id}" {if $smarty.post.departments[0] eq $specialization[0][specialization].id} selectedindex="{$specialization[0][specialization].index+1}" selected="selected" {/if}>{$specialization[0][specialization].specialization}</option>
							{/section}							
						{/if}	
						
					</select>
					<span class="errorMsg">{$error[60][0]}</span>
					
				
				</div>
               
              </li>
	
		</div>		  
			
							
			   <li>
                            <label>
                                {$reg_lang->JText('LBL_TOTAL_EXP')}<sup>*</sup></label>
							<div class="error_total_exp">	
                            <div class="field{$error[5][1]}">
                                <select name="exp_year" id="exp_year" class="default-usage-select2">
                                    <option value="">In Years</option>
									<option value="0" {if $smarty.post.exp_year eq '0'} selectedindex="{0}" selected='selected'{/if}>Fresher</option>
									{section name=year start=1 loop=26 step=1}									
										<option value="{$smarty.section.year.index}" {if $smarty.post.exp_year eq $smarty.section.year.index} selectedindex="{$smarty.section.year.index+1}" selected='selected'{/if}>{$smarty.section.year.index} Year{if $smarty.section.year.index neq '1'}s{/if}</option> 
									{/section}
                                    </select>
									<span class="errorMsg width_230" style="{if $error[5][1] eq ''}display: none{/if}">{$error[5][0]}</span>  
							</div>
							 <div class="monthDiv" style="margin-left:163px;display:none">		
                                <select name="exp_month" id="exp_month" class="default-usage-select2">
                                    <option value="">In Months</option>
									{section name=month start=1 loop=12 step=1}
										<option value="{$smarty.section.month.index}" {if $smarty.post.exp_month eq $smarty.section.month.index} selectedindex="{$smarty.section.month.index+1}" selected='selected'{/if}>{$smarty.section.month.index} Month{if $smarty.section.month.index neq '1'}s{/if}</option>
                                    {/section}
                                </select>
								<span class="errorMsg width_230">{$error[10][0]}</span>
                              
                            </div>
							
						  </div>
                        </li>
						
						<div class="industryDiv"  style="display:none">
						 <li>
						 <label>
                                Current Industry<sup>*</sup></label>
						   <div class="field{$indus_error_class}">
                                   <select name="industry_user" id="industry_user" class="default-usage-select2" >
                                    <option value="">Industry</option>
									{section name=list_industry loop=$list_industry}
                                    <option value="{$list_industry[list_industry].id}" {if $smarty.post.industry_user eq $list_industry[list_industry].id} selectedindex="{$list_industry[list_industry].index+1}" selected='selected'{/if}>{$list_industry[list_industry].industry_name}</option>
                                    {/section}
                                </select>
										<span class="errorMsg width_230" style="{if $indus_error eq ''}display: none{/if}">{$indus_error}</span>
										</div>
			 </li>
					</div>
					
					
					      <li>
                            <label>
                                {$reg_lang->JText('LBL_SKILL_SETS')}<sup>*</sup></label>
                            <div class="field{$error[6][1]}">
                                <textarea rows="3" style="width:225px;" cols="10" name="skill_sets" id='skill_sets' class="frm_tip" title="Please mention your skill sets clearly, as this will be used as 'keywords' when companies search for relevant resumes.">{$smarty.post.skill_sets}</textarea>
                                <span class="errorMsg width_230" style="{if $error[6][1] eq ''}display: none{/if}">{$error[6][0]}</span>
                            </div>
                        </li>
					
			  <li>
						<label>
						{$reg_lang->JText('LBL_RESUME')}
						
						<span class="help-blurb with-icon">
<span class="text">?</span><span class="info-box"><span class="tp"><span class="i"></span></span><span class="md"><span class="i"> {$reg_lang->JText('TIP_RESUME')}</span></span><span class="bt"><span class="i"></span></span></span>
</span>
						</label>	
                         <div class="field{$error[70][1]}{$resume_error[0][1]}">
                            <input name="job_resume" id="resume" type="file" style="height: 25px;" />
                            <span class="errorMsg width_230" style="{if ($error[70][1] eq '' && $error) || ($resume_error[0][1] eq '' && $resume_error)}display: none{/if}">{$error[70][0]}{$resume_error[0][0]}</span>
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
                                <span>{$reg_lang->JText('LBL_STEP33')} Register</span></button></a>
								
								
								<a href="{$url}{$language_url}login" rel="" id="close_later" class="laterContact" style="margin-left:10px;">Sign In</a>
								
								</li-->
                </ul>
				
				<ul class="qualification cf regRight">
               
					
				   <li class="floatL">
                        <label>
                            {$reg_lang->JText('LBL_CURRENT_LOC')}<sup>*</sup>
							
							</label>
							
                        <div class="field{$error[2][1]}">
                            
							  <select name="cstate" id="cstate" class="default-usage-select2" >
                                    <option value="">State</option>
									{section name=list_states loop=$list_states}
                                    <option value="{$list_states[list_states].id}" {if $smarty.post.cstate eq $list_states[list_states].id} selectedindex="{$list_states[list_states].index+1}" selected='selected'{/if}>{$list_states[list_states].state_name}</option>
                                    {/section}
                                </select>
								<span class="errorMsg width_155" style="{if $error[2][1] eq ''}display: none;{/if}">{$error[2][0]}</span>
							</div>
							
                    </li>
					
					 <li class="floatL">
                        <label>
                            District <sup>*</sup>
							
							</label>
							
                        <div class="field{$error[3][1]}">
                            
						<select name="cdistrict" id="cdistrict" class="default-usage-select2" >
                                <option value="District">District</option>
									{if $smarty.post.cstate gt '0'}
									{section name=list_cdistricts loop=$list_cdistricts}
                                    <option value="{$list_cdistricts[list_cdistricts].id}" {if $smarty.post.cdistrict eq $list_cdistricts[list_cdistricts].id} selectedindex="{$list_cdistricts[list_cdistricts].index+1}" selected="selected" {/if}>{$list_cdistricts[list_cdistricts].district_name}</option>
                                    {/section}
									{/if}
                                </select>
								<span class="errorMsg width_155" style="{if $error[3][1] eq ''}display: none;{/if}">{$error[3][0]}</span>
							</div>
							
                    </li>
					
					
			      
                    <li>
                        <label>
                           {$reg_lang->JText('LBL_EMAIL_ADDRESS')} <sup>*</sup>
                        </label>
                        <div class="field{$error[7][1]}{$email_exists_class}">
                            {if $smarty.post.email_address}	
                            {assign var = "mail" value=$smarty.post.email_address}
							{else}
							{assign var = "mail" value=$smarty.get.email}
							{/if}
							
							<input name="email_address" maxlength="200" id="email_address" class="frm_tip largeBox" title="{$reg_lang->JText('TIP_EMAIL_ADDRESS')}" value='{if $mail neq ''}{$mail}{elseif $refer_email neq ''}{$refer_email}{else}{$smarty.session.user_email_address}{/if}'/>
							
                            <span class="errorMsg width_230" style="{if ($error[7][1] eq '') && ($email_exists_class eq '' )}display: none{/if}">{$error[7][0]}{$email_exists}</span>
							<span class="available width_230" style="{$mail_available}">{$reg_lang->JText('MSG_EMAIL_AVAILABLE')}</span>
                        </div>
                    </li> 
                    <li>
                        <label>
                            {$reg_lang->JText('LBL_PASSWORD')} <sup>*</sup>
										</label>
							<div class="field{$error[8][1]}">
                            <input type="password" name="password" maxlength="32" id="password" title="{$reg_lang->JText('TIP_PASSWORD')}" class="frm_tip largeBox"/>
                            <span class="errorMsg width_230" style="{if ($error[8][1] eq '')}display: none{/if}">{$error[8][0]}</span>
							</div>
                    </li> 
                    <li>
                        <label>
                            {$reg_lang->JText('LBL_CON_PASSWORD')} <sup>*</sup>
										</label>
							<div class="field{$error[9][1]}{$password_mismatch_class}">
                            <input type="password" name="cpassword" maxlength="32" id="cpassword" title="{$reg_lang->JText('TIP_CON_PASSWORD')}" class="frm_tip largeBox"/>
                            <span class="errorMsg width_230" style="{if ($error[9][1] eq '') && ($password_mismatch_class eq '' )}display: none{/if}">{$error[9][0]}{$password_mismatch}</span>
							</div>
                    </li> 
					
					 <li class="floatL">
                        <label>
                           {$reg_lang->JText('LBL_HOW_KNOW_JOBFAC')}
							
							</label>
							
                        <div class="field">
						<select name="reference" id="reference" class="default-usage-select2" >
                                    <option value="">Select</option>
									{section name=list_reference loop=$list_reference}
                                    <option value="{$list_reference[list_reference].id}" {if $smarty.post.reference eq $list_reference[list_reference].id} selectedindex="{$list_reference[list_reference].index+1}" selected='selected'{/if}>{$list_reference[list_reference].title}</option>
                                    {/section}
                                </select>
								
						<input type="text" style="display:none" maxlength="60" id="refer_others"  value="{$smarty.post.refer_others}" class="largeBox"  name="refer_others">

							</div>
							
                    </li>
					
					
						<li>
                        <label>
                            {$reg_lang->JText('LBL_REFERRAL_CODE')}<span class="help-blurb with-icon">
<span class="text">?</span><span class="info-box"><span class="tp"><span class="i"></span></span><span class="md"><span class="i">{$reg_lang->JText('TIP_REFERRAL_CODE')}</span></span><span class="bt"><span class="i"></span></span></span>
</span>
						</label>
						<div class="field">
						<input type="text" id="referral_code"  value="{$smarty.post.referral_code}" class="largeBox" maxlength="6" name="referral_code">
								<span class="available" style="display:none;">{$reg_lang->JText('MSG_VALID_CODE')}</span>
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
                                <span>{$reg_lang->JText('LBL_REGISTER')}</span></button></a>
								
								
								<a href="{$url}{$language_url}login" rel="" id="close_later" class="laterContact" style="margin-left:10px;">Sign In</a>
								
								</div>
				<!--input type="submit" name="hdnFrm" value="hdnFrm" style="display:" id="hdnFrm"/-->
                </form>
            </div>
        </div>
        <!--CONTAINER-->
    </div>
    <!--HEADER CONTAINER-->
    {include file='../include/footer.tpl'}	  
	
	<input type="hidden" value="0" id="contact_popup"/>