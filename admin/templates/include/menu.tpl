{* Purpose : To add the navigation menu to all files.
   Created : Nikitasa
   Date : 16-11-2016 *}

 <div id="content">			
<!-- Top navigation bar -->
<div id="topNav">
    <div class="fixed">
        <div class="wrapper">
       	
		
		    <div class="userNav" style="float:left;margin-left:10px;">
                <ul>				
					  <li class="dd "><a href="#" "padding:8px 2px 6px 14px" alt="">
					  <img src="../img/userPic.png" style="padding:8px 2px 6px 14px" alt="">
					  <span>Hello, {$smarty.session.userDetail['first_name']}!</span></a>
				  
				   <ul class="menu_body">
                         <li><a style="width:80px" class="sProfile" href="/administrator/users/profile/{$smarty.session.userDetail['id']}">Profile</a></li>
								{if $settings}
                         <li><a style="width:80px" class="sSetting" href="/administrator/users/settings/">Settings </a></li>
                         {/if}
						<li><a style="width:80px" class="sLogout" href="/administrator/login/logout">Logout</a>
						
						</li>
                     
                   </ul>
				</li>
				</ul>
			</div>
					
			<div class="lastLogin"><img src="img/icons/topnav/mainWebsite.png"> <span>Last Login: {$smarty.session.userDetail['format_date']} .</span></div>
					
			<input type="hidden" name="data[misc_overlay]" id="misc_overlay" value="../dashboard/miscellaneous/">  

		
 
			<div class="userNav">
			
                <ul>		
					 
					<li class="dd"><a style="cursor:default;" href="javascript:void(0)"><img src="img/icons/topnav/tasks.png" alt=""><span>Miscellaneous</span></a>
				  
				   <ul class="menu_body">
				    <li><a style="width:90px;" rel="email-stats" class="sWeb" target="_blank" href="#">Website</a></li>
				     <li><a style="width:90px;cursor:default;" rel="email-stats" class="misc_overlay sEmail" href="javascript:void(0)">Email</a></li>
					 
                    <li><a style="width:90px;cursor:default;" rel="sms-stats" class="misc_overlay sMobile" href="javascript:void(0)">
							SMS</a></li>
                  
                    <li><a style="width:90px;cursor:default;" rel="online-stats" class="misc_overlay sOnline" href="javascript:void(0)">Online Users</a></li>
							
							
                        </ul>
					</li>
				
			
				 	{if $refer_friends}
					  <li class=""><a href="/administrator/refer_friends/" title=""><img style="padding-top:11px" src="img/icons/topnav/icon-news.png" alt=""><span>Refer Site </span><span class="numberTop">{$obj['refer_friends_total']}</span></a></li>
						{/if}		
				
				 	
					  <!--li class=""><a href="/jobfac_admin/course_requests/" title=""><img style="padding-top:11px" src="/jobfac_admin/img/icons/topnav/icon-email.png" alt="" /><span>Course Req.</span></a></li-->
								
				  
				 {if $business_enquiry}
				   <li class=""><a href="/administrator/enquiries/" title=""><img src="img/icons/topnav/messages.png" alt=""><span>Enquiries</span><span class="numberTop">{$obj['enquiry_total']}</span></a></li>
					{/if}					
						
					{if $contacts}			
				<li class=""><a href="/administrator/contact/" title=""><img src="img/icons/topnav/messages.png" alt=""><span>Contacts</span><span class="numberTop">{$obj['contact_unregister']+$obj['contact_register']}{if $obj['contact_register']}({$obj['contact_register']}){/if}</span></a></li>
					{/if}
					
					{if $latest_news || $testimonials}
					<li class="dd"><a style="cursor:default;" href="javascript:void(0)"><img src="img/icons/topnav/tasks.png" alt=""><span>Latest News</span></a>
				  
				   <ul class="menu_body">
                       {if $latest_news}     
						   <li><a style="width:90px;" class="sNews" href="/administrator/latest_news/">Latest News</a><span class="numberLeft">{$obj['latest_news']}</span></li>
						   	{/if}												
							
							 {if $testimonials}
							  <li><a style="width:90px;" class="sTesti" href="/administrator/testimonials/">Testimonials</a><span class="numberLeft">{$obj['testimonials_count']}</span></li>
							   {/if}                   
                        </ul>
					</li>
					{/if}
					
					
				{if $jobfair  || $client_req }	
				<li class="dd activeNav"><a style="cursor:default;" href="javascript:void(0)"><img src="img/icons/topnav/tasks.png" alt=""><span>Job Fair</span></a>
				  
				   <ul class="menu_body">
                        {if $jobfair}    
						   <li><a style="width:90px;" class="sTesti" href="jobfair.php">Job Fair</a>{if $jobfair_count}<span class="numberLeft">{$jobfair_count}{/if}</span></li>
						   <li><a style="width:90px;" class="sTesti" href="jobfair_logos.php">Job Fair Logos</a></li>
						   <li><a style="width:90px;" class="sTesti" href="jobfair_photos.php">Job Fair Photos</a></li>
					{/if}
						   	{if $client_req}
							<li><a style="width:90px;" class="sTesti" href="client_req.php">Client Req. </a>{if $client_req_count}<span class="numberLeft">{$client_req_count}{/if}</span></li>
							<li><a style="width:90px;" class="sTesti" href="client_photos.php">Client Photos</a></li>
							{/if}                  
                        </ul>
					</li>
					{/if}
					
				
                </ul>
            </div>
            <div class="fix"></div>
        </div>
    </div>
</div>
<!-- Header -->
<div id="header" class="wrapper">
    <div class="logo"><a href="" title="">
	<img src="img/200x48_1_jobfac.jpg">	</a></div>
    <div class="middleNav">
    	<ul>
				{if $dashboard}		
		     <li class="iStat"><a class="" href="/administrator/dashboard/" title="Dashboard"><span>Dashboard</span></a></li>
			 	{/if}		 
				{if $admin_users}	 
        	<li class="iadmUser"><a class="" href="/administrator/users/" title="Admin Users"><span>Admin </span></a><span class="numberMiddle">{$obj['admin_total']}</span></li>
				{/if}		
			{if $job_seekers}
			<li class="iUser"><a class="" href="/administrator/jobseekers/" title="Job Seekers"><span>Job Seekers</span></a>
			<span class="numberMiddle">{$obj['job_seeker_total']} {if $obj['job_seeker_inactive']}({$obj['job_seeker_inactive']}){/if}</span>
			
			</li>
			{/if}
						
			
			
				{if $company}
			<li class="ijobs"><a class="" href="/administrator/companies/" title="Employers"><span>Employers</span></a><span class="numberMiddle">{$obj['company_total']}</span></li>
			{/if}		
			
			{if $colleges}
			<li class="iCollege"><a class="" href="/administrator/colleges/" title="Colleges"><span>Colleges</span></a><span class="numberMiddle">{$obj['college_count']}</span></li>
			{/if}		
			
			{if $transactions}	
			<li class="iTran"><a class="" href="/administrator/transactions/" title="Transactions"><span>Purchase</span></a><span class="numberMiddle">{$count_purchase}</span></li>
			{/if}			
				
			<!--li class="iApplied"><a class="" href="/jobfac_admin/applied/"  title="Applied Users"><span>Responses</span></a><span class="numberMiddle"></span></li-->
						
				
			<!--li class="iSearch"><a  class="" href="/jobfac_admin/search/" title=""><span>Search</span></a></li--> 
						{if $tests}
						<li class="iGlobe"><a class="" href="/administrator/online_tests/" title="Tests"><span>Tests</span></a><span class="numberMiddle">{$obj['test_total']}</span></li>	
						{/if}
	
							
				
				
			 {if $inbox}
			<li class="iInbox"><a class="" href="/administrator/inbox/?type=en" title="Inbox"><span>Inbox</span></a><span class="numberMiddle">{$count_inbox}</span></li>
			 {/if}		
			
		
			{if $reports}
			<li class="iReport"><a class="" href="/administrator/reports/jobseekers/location/" title="Reports"><span>Reports</span></a></li>
			{/if}			
			
			
        </ul>
    </div>
    <div class="fix"></div>
</div>