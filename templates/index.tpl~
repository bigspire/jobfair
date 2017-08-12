{include file='../include/top.tpl'}
<!-- Primary Page Layout
================================================== -->
    <div id="headerContainer">
        <div class="container">
			{include file='../include/header.tpl'}           
          {include file='../include/search.tpl'} 
            <div id="topHeader" class="cf">
                <div class="leftCarousel slider-wrapper theme-default">
                    <div id="slider" class="nivoSlider">
					<img src="{$url}images/jobs_everyone.jpg" width="639">
                    <img src="{$url}images/young_india.jpg" width="639">
					<img src="{$url}images/creating_livelihoods.jpg" width="639">
					<img src="{$url}images/community_outreach.jpg" width="639">						
                    </div>
					
					   <form action="registration/">
					   
                <div class="sliderContent">
				{if $smarty.session.user_id eq ''}
                    <button class="red" type="submit">
                        <span>{$news_lang->JText('BTN_REGISTER')}</span></button>
						{/if}
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
								<p class="readmore"><a href="{$url}how_it_works/">Read More >></a></p>
							
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
									<p class="readmore"><a href="{$url}how_it_works/">Read More >></a></p>
							
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
									<p class="readmore"><a href="{$url}how_it_works/">Read More >></a></p>
							
						</div>
					</div>
					
					</div>		
				
                </div>
         
            </div>
			
			
			<!--CATEGORY-->
            <div class="cf recentAct">
                <div class="recentJobs empLogos">
                    <!--h2>
                       {$menu_lang->JText('TIT_HOT_JOBS')}</h2-->
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
                       {$menu_lang->JText('TIT_JOB_LOCATION')}</h2>
                    <ul class="cf">
					{assign var=index value=0}
					{foreach from=$location_name_count key=k item=v}
						{if $jobs_location[$k].location neq ''}
						{if $index lt 18}
							{assign var=tlocation value=$jobs_location[$k].location|capitalize|truncate:12:"..":true}
							<li><a  {if $tlocation neq $jobs_location[$k].location|capitalize} class="tipN" original-title="{$jobs_location[$k].location|capitalize}"{/if} href="{$url}{$language_url}search_jobs/?location={$jobs_location[$k].url_location}&searchby=locations" >{$tlocation}</a></li>
						{assign var=index value=$index+1}
						{/if}
						{/if}
					{/foreach}
					
                    </ul>
                    <p>
                        <a href="{$url}{$language_url}more_location/">{$menu_lang->JText('LINK_MORE_LOCATIONS')}</a> </p>
                </div>
				
				
				      <!--div class="categoryCol">
                    <h2 class="company">
                        {$menu_lang->JText('TIT_JOB_COMPANY')}</h2>
                    <ul class="cf">
					{section name=jobs_com loop=$jobs_company}	
						{assign var=tcompany value=$jobs_company[jobs_com].company_name|capitalize|truncate:13:"..":true}
                        <li><a {if $tcompany neq $jobs_company[jobs_com].company_name|capitalize} class="tipN" original-title="{$jobs_company[jobs_com].company_name|capitalize}"{/if} href="{$url}{$language_url}search_jobs/?keywords=&company={$jobs_company[jobs_com].url_company_name}&searchby=companies">{$tcompany}</a></li>
                    {/section}  
                    </ul>
                    <p>
                        <a href="{$url}{$language_url}more_company/">{$menu_lang->JText('LINK_MORE_COMPANIES')}</a></p>
                </div-->
				
                <div class="categoryCol">
                    <h2 class="company">
                        {$menu_lang->JText('TIT_JOB_DEPT')}</h2>
                    <ul class="cf">
					{section name=jobs_com loop=$jobs_dept}	
						{assign var=tcompany value=$jobs_dept[jobs_com].department|capitalize|truncate:13:"..":true}
                        <li><a {if $tcompany neq $jobs_dept[jobs_com].department|capitalize} class="tipN" original-title="{$jobs_dept[jobs_com].department|capitalize}"{/if} href="{$url}{$language_url}search_jobs/?keywords=&department={$jobs_dept[jobs_com].department}&searchby=departments">{$tcompany}</a></li>
                    {/section}  
                    </ul>
                    <p>
                        <a href="{$url}{$language_url}more_department/">{$menu_lang->JText('LINK_MORE_DEPARTMENT')}</a></p>
                </div>
				
				
                <div class="categoryCol last">
                    <h2 class="industry">
                        {$menu_lang->JText('TIT_JOB_INDUSTRY')}</h2>
                    <ul class="cf">
					{section name=jobs_ind loop=$jobs_industry}
					{assign var=tindustry value=$jobs_industry[jobs_ind].industry_name|capitalize|truncate:13:"..":true}
                        <li><a {if $tindustry neq $jobs_industry[jobs_ind].industry_name|capitalize} class="tipN" original-title="{$jobs_industry[jobs_ind].industry_name|capitalize}"{/if} href="{$url}{$language_url}search_jobs/?industries={$jobs_industry[jobs_ind].industry_name}&searchby=industry" title="{$jobs_industry[jobs_ind].industry_name|capitalize}" >{$tindustry}</a></li>
                    {/section}  
                    </ul>
                    <p>
					
                        <a href="{$url}{$language_url}more_industry/">{$menu_lang->JText('LINK_MORE_INDUSTRIES')}</a></p>
                </div>
            </div>


			

{section name=testi loop=$testimonial_data}
<div class="client_spk news nd">
        <div class="title">{$cfn_obj->string_truncate($testimonial_data[testi].message,150)}</div>
        <div class="name">{$testimonial_data[testi].client_name}, {$testimonial_data[testi].designation}, {$testimonial_data[testi].company}</div>
      </div>
{/section}
	  
            <!--CATEGORY-->
            <div class="cf recentAct">
                <div class="recentJobs">
                    <!--h2>
                       {$menu_lang->JText('TIT_HOT_JOBS')}</h2-->
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
                       {$menu_lang->JText('TIT_REFER_FRIENDS')} </h2>
                    <p>
                        {$menu_lang->JText('LBL_HELP_FRIEND')}</p>
                    <div class="form cf">
						<form name="ref_frnd" method="post" >
                        <div class="loginBg"><input placeholder="email or mobile no" type="text" name="ref_address" id="ref_address" value="" class="placeholder"></div>
                       
						<!--span style="float:left;margin-top:7px;">
                       <a class="button-link smallBtn referBtn" id="refer_friend" href="javascript:void();">{$menu_lang->JText('BTN_SUBMIT')}</a>
					   <input type="hidden" name="refer_friend" id="refer_FD"/>
						</span-->
					   <button class="small referBtn floatR" type="submit" name="refer_friend" id="refer_friend" value="submit" style="width:60px; margin-right:35px;clear:none">
                            <span class="">{$menu_lang->JText('BTN_SUBMIT')}</span></button>
							
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

	<input type="hidden" value="{$jobfair_form_sent}" id="jobfairPopup"/>
	<input type="hidden" value="{$req_form_sent}" id="reqPopup"/>
	
{include file='../include/footer.tpl'}