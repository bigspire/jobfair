<a id="error_focus" >&nbsp;</a>
<div class="cf floatL mt10 errorMsg" id="pcColor"  style="display:none">
						<div class="pcLeft errorField" style=""></div>
						<div class="profileComplete errorField" style=""><p>{$search_lang->JText('ERR_ADV_SEARCH')}</p></div>
						<div class="pcRight errorField" style=""></div>
			</div>
			

				
				
				<form method="post" action="{$url}{$language_url}advanced_search/" id="adv_form">
				<input type="hidden" name="program_sel" id="program_sel"/>
						<input type="hidden" name="course_sel" id="course_sel"/>
						<input type="hidden" name="specialization_sel" id="specialization_sel"/>
						<input type="hidden" name="program_sel_id" id="program_sel_id"/>
						<input type="hidden" name="course_sel_id" id="course_sel_id"/>
						<input type="hidden" name="specialization_sel_id" id="specialization_sel_id"/>
			<ul class="qualification cf adSearch" style="width:966px;">
				<li><label>{$search_lang->JText('LBL_KEYWORDS')}</label>
				<div class="field">
				<div class="frm_tip multiple multi" title="{$search_lang->JText('TIP_KEYWORDS')}">
					<input type="text" name="keywords"  id="keywords" class="advBox largeBox {if $search_keywords eq ''}placeholder{/if}" placeholder="Keyword(s)" value="{$search_keywords}"/>
					
					<!--<select id="keywords" name="keywords[]">
						{section name=keywords loop=$search_keywords}
                               {if $search_keywords[keywords]}<option class='selected' value="{$search_keywords[keywords]}">{$search_keywords[keywords]}</option>{/if}
                        {/section}
            </select>-->
			</div><br/>
			<span id="keywords_id_error" style="display:none;" class="advError">{$search_lang->JText('ERR_KEYWORDS')}</span>
				</div>
				</li>
				<li><label>{$search_lang->JText('LBL_LOCATION')}</label>
				<div class="field">
					
					<div class="frm_tip multiple multi" title="{$search_lang->JText('TIP_LOCATION')}">
					<input type="text" name="location" id="location" class="advBox largeBox {if $search_location eq ''}placeholder{/if}" value="{$search_location}"  placeholder="Location(s)"/>
				<!--<select id="location" name="location[]">
               	{section name=location loop=$search_location}
                            {if $search_location[location]}<option class='selected' value="{$search_location[location]}">{$search_location[location]}</option>{/if}
                        {/section}
            </select>-->
				</div>
				<br/>
			<span id="location_id_error" style="display:none;" class="advError">{$search_lang->JText('ERR_LOCATION')}</span>
				</div>
				</li>
				<!--<li><label>{$search_lang->JText('LBL_EDUCATION')}</label>
				<div class="field">
			
					<input name="education" id="education" class="largeBox advBox frm_tip {if $search_education eq ''}placeholder{/if}" value="" placeholder="Education" title="{$search_lang->JText('TIP_EDUCATION')}"/>
						<div class="frm_tip multiple multi" title="{$search_lang->JText('TIP_EDUCATION')}">
						<select id="educations" name="educations">
							
				        </select>
					</div>
					<br/>
					<span id="educations_id_error" style="display:none;" class="advError">{$search_lang->JText('ERR_EDUCATION')}</span>
				</div>
				</li>-->
				
				
				
				<span {if $smarty.get.search_from eq 'advance' || $smarty.get.pagen neq 'view_jobs'}{else}style="display:none"{/if}>
					<li><label>Qualification </label>
				<div class="program floatL">
				<label>Program </label>
				<div class="field">
<!--<input class="largeBox frm_tip" name="name" placeholder="Select Education..." title="Tip: This will be your Maximum Education">-->
			<div class="fieldScroll div_chk" style="width:200px;">
				<span><input type="checkbox" id="x"  name="X_std"  value="X" class="styled" chk_check="chk_check" /><b class="checkValue">X</b></span>
				<span><input type="checkbox" id="xii"  name="XII_std" value="XII" class="styled" chk_check="chk_check" /><b class="checkValue">XII</b></span>
				{section name=list_course loop=$list_course}
					<span><input type="checkbox" id="{$list_course[list_course].en_id}" value="{$list_course[list_course].program_name}" name="chk_program" chk_check="chk_check" class="styled" /> <b class="checkValue">{$list_course[list_course].program_name}</b></span>
				{/section}
					 			
					</div>
				
					<div class="tagsinput program" id="tags_tagsinput"  style="clear:both">
						<ul class="qualSelect">
							
						</ul>
					</div>
				</div>
					</div>
					
					<div class="degree floatL">
				<label>Degree</label><div class="field">

					<div class="fieldScroll  div_chk degree_div" style="width:300px;">
						   	
							{section name=course loop=$course_sel}
							{if $course_sel[course]|trim neq ''}
								<span  chk_id="{$course_sel_id[course][1]}"><input type="checkbox" id="{$course_sel_id[course][0]}" value="{$course_sel[course]}" name="chk_degree" checked="checked" class="styled" chk_check="chk_check" /> <b class="checkValue">{$course_sel[course]}</b></span>
							{/if}
							{/section}
					</div>
					<div class="tagsinput course" id="tags_tagsinput"  style="clear:both">
					<ul class="qualSelect">
						
					</ul>
					</div>
					
					</div>
					</div>
					
					
						<div class="specialization floatL">
				<label>Specialization</label><div class="field">

			<div class="fieldScroll div_chk specialization_div" style="width:220px;">
					
					   	{section name=specialization loop=$specialization_sel}
							{if $specialization_sel[specialization]|trim neq ''}
								<span  chk1_id="{$specialization_id[specialization][2]}" chk_id='{$specialization_id[specialization][1]}'><input type="checkbox" id="{$specialization_id[specialization][0]}" value="{$specialization_sel[specialization]}" checked="checked" name="chk_specialization" class="styled" chk_check="chk_check" /> <b class="checkValue">{$specialization_sel[specialization]}</b></span>
							{/if}
						{/section}
						
					</div>
					<div class="tagsinput specialization" id="tags_tagsinput" style="clear:both">
					<ul class="qualSelect">
						
					</ul>
					</div>
					</div>
					</div>
					</li>
				
				
				
				
				
				
				<li><label>{$search_lang->JText('LBL_EXPERIENCE')} </label>
				<div class="field" title="tip">
					<span class="floatLeft" style="width:160px;">
					<select name="min_exp" id="min_exp" class="default-usage-select">
					<option value="">Min Exp</option>
					{assign var=inc value=3}
					{section name=month loop=53}
						{if $smarty.section.month.index >3}
						<option value="{$smarty.section.month.index-3} Year{if $smarty.section.month.index-3 >1}s{/if}">{$smarty.section.month.index-3} Year{if $smarty.section.month.index-3 >1}s{/if}</option>
						{elseif $smarty.section.month.index eq 0}
						<option value="0 Month">Fresher</option>
						{else}
						<option value="{math equation="x * y" x=$smarty.section.month.index y=3} Months">{math equation="x * y" x=$smarty.section.month.index y=3} Months</option>
						{/if}
					{/section}	
	
					</select>
					</span>
					<span class="">
					<select name="max_exp" id="max_exp" class="default-usage-select">
					<option value="">Max Exp</option>

					{section name=year loop=54}
					    {if $smarty.section.year.index >3}
						
								<option value="{$smarty.section.year.index-3} Year{if $smarty.section.year.index-3 >1}s{/if}">{$smarty.section.year.index-3} Year{if $smarty.section.year.index-3 >1}s{/if}</option>
							
						{elseif $smarty.section.year.index eq 0}
						{else}
						
								<option value="{math equation="x * y" x=$smarty.section.year.index y=3} Months">{math equation="x * y" x=$smarty.section.year.index y=3} Months</option>
					
						{/if}
						<!--{if $smarty.section.year.index eq 0}
						<option value="3 Months">3 Months</option>
						{else}
						<option value="{$smarty.section.year.index} Year{if $smarty.section.year.index >1}s{/if}">{$smarty.section.year.index} Year{if $smarty.section.year.index >1}s{/if}</option>
						{/if}-->
					{/section}	
					</select>
					</span>
					
				</div>
				</li>

			
				<li><label>{$search_lang->JText('LBL_CURRENT_SALARY')}</label>
				<div class="field">
					
				
				<input name="min_salary" id="min_salary" class="placeholder advTbox frm_tip" placeholder="Min Salary" title="{$search_lang->JText('TIP_SALARY')}"/>
					<input name="max_salary" id="max_salary" class="placeholder advTbox frm_tip" placeholder="Max Salary" title="{$search_lang->JText('TIP_SALARY')}" style="margin-left:4px;"/></div>
				</li>
				
				<li><label>{$search_lang->JText('LBL_INDUSTRY')}</label>
				<div class="field" id="adv_search_industry">
					<!-- input class="largeBox advBox frm_tip" autocomplete="off" name="industry_name" placeholder="Search and Select Industry..." title="{$search_lang->JText('TIP_INDUSTRY')}"/-->
					<div class="fieldScroll">
					{section name=industry loop=$industry}

						<span><input type="checkbox" id="small_chk-i{$smarty.section.industry.index+1}" class="styled" value="{$industry[industry].industry_name|trim}" name="industries[]"  /> <b class="checkValue">{$industry[industry].industry_name|trim}</b></span> 

					{/section}
					</div>
					<div class="otherSearch">
						<select id="industry" name="industry[]">
							
						</select>
					</div>
					<br/>
			<span id="industry_id_error" style="display:none;" class="advError">{$search_lang->JText('ERR_INDUSTRY')}</span>
				</div>
			</li>
			<li><label>{$search_lang->JText('LBL_COMPANY')}</label>
				
<div class="field">
					
					<div class="frm_tip multiple multi" title="{$search_lang->JText('TIP_COMPANY')}">
					<input class="largeBox advBox" id="company" name="company" value="{$company_name}" placeholder="Enter Company(s)" title="{$search_lang->JText('TIP_COMPANY')}">
					
					</div>
					<br/>
						<span id="company_id_error" style="display:none;" class="advError">You can add max. of 5 Company</span>
					</div>
			
				
			</li>
		
	
			<li><label>{$search_lang->JText('LBL_DEPARMENT')}</label>
				<div class="field">
					<!--input class="largeBox advBox frm_tip" autocomplete="off" name="department_name" placeholder="Search and Select Department..." title="{$search_lang->JText('TIP_DEPARTMENT')}"/-->
					<div class="fieldScroll">
					{section name=department loop=$adv_department}

						<span><input class="styled" id="small_chk-d{$smarty.section.department.index+1}" type="checkbox" value="{$adv_department[department].department|trim}" name="departments[]"  /> <b class="checkValue">{$adv_department[department].department|trim}</b></span> 

					{/section}
					</div>
					<div class="otherSearch">
						<select id="department" name="department[]">
							
						</select>
					</div>
					<br/>
			<span id="department_id_error" style="display:none;" class="advError">{$search_lang->JText('ERR_DEPARTMENTS')}</span>
				</div>
			</li>
			<li>
					<label>{$search_lang->JText('LBL_JOB_TYPE')}</label>
					<div class="field">
						
					<select name="job_type"id="job_type" class="default-usage-select">
						<option value="All">All</option>
						<option value="Full Time">Full Time</option>
						<option value="Part Time">Part Time</option>
						<option value="Contract">Contract</option>
						<option value="Internship">Internship</option>
						</select>
					
					</div>
				</li>
				<li>
					<label>{$search_lang->JText('LBL_JOB_POSTED')}</label>
					<div class="field">
						<select name="job_posted"id="job_posted" class="default-usage-select">
							<option value="">All</option>
							<option value="Recently">Recently</option>
							<option value="With in 15 days">With in 15 days</option>
							<option value="With in 30 days">With in 30 days</option>
						</select>
					</div>
				</li>
				
			</span>
				<li class="next cf width_bar">
				<!--<button class="left" type="button"><< Go to Step 1</button>-->
				<input type="hidden" value="inbox" id="page_frm" name="page_frm"/>
				<button class="small left" type="submit" id="advance_search" style="margin-left:132px;"><span id="advance_search_msg">{$search_lang->JText('BTN_SUBMIT')}</span></button>
				<button type="button" class="small left resetBtn" id="reset_adv_form" style="margin-left:10px;"><span>{$search_lang->JText('BTN_RESET')}</span></button>
				</li>
			</ul>
			<input id="page" type="hidden" value="adv_search" name="page">
		</form>