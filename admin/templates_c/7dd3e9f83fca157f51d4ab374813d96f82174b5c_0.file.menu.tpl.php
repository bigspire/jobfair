<?php
/* Smarty version 3.1.29, created on 2017-01-24 09:48:23
  from "/var/www/html/jobfair_jobfac/admin/templates/include/menu.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5886d58f74bc35_82925905',
  'file_dependency' => 
  array (
    '7dd3e9f83fca157f51d4ab374813d96f82174b5c' => 
    array (
      0 => '/var/www/html/jobfair_jobfac/admin/templates/include/menu.tpl',
      1 => 1485231483,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5886d58f74bc35_82925905 ($_smarty_tpl) {
?>


 <div id="content">			
<!-- Top navigation bar -->
<div id="topNav">
    <div class="fixed">
        <div class="wrapper">
       	
		
		    <div class="userNav" style="float:left;margin-left:10px;">
                <ul>				
					  <li class="dd "><a href="#" "padding:8px 2px 6px 14px" alt="">
					  <img src="../img/userPic.png" style="padding:8px 2px 6px 14px" alt="">
					  <span>Hello, <?php echo $_SESSION['userDetail']['first_name'];?>
!</span></a>
				  
				   <ul class="menu_body">
                         <li><a style="width:80px" class="sProfile" href="/administrator/users/profile/<?php echo $_SESSION['userDetail']['id'];?>
">Profile</a></li>
								<?php if ($_smarty_tpl->tpl_vars['settings']->value) {?>
                         <li><a style="width:80px" class="sSetting" href="/administrator/users/settings/">Settings </a></li>
                         <?php }?>
						<li><a style="width:80px" class="sLogout" href="/administrator/login/logout">Logout</a>
						
						</li>
                     
                   </ul>
				</li>
				</ul>
			</div>
					
			<div class="lastLogin"><img src="img/icons/topnav/mainWebsite.png"> <span>Last Login: <?php echo $_SESSION['userDetail']['format_date'];?>
 .</span></div>
					
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
				
			
				 	<?php if ($_smarty_tpl->tpl_vars['refer_friends']->value) {?>
					  <li class=""><a href="/administrator/refer_friends/" title=""><img style="padding-top:11px" src="img/icons/topnav/icon-news.png" alt=""><span>Refer Site </span><span class="numberTop"><?php echo $_smarty_tpl->tpl_vars['obj']->value['refer_friends_total'];?>
</span></a></li>
						<?php }?>		
				
				 	
					  <!--li class=""><a href="/jobfac_admin/course_requests/" title=""><img style="padding-top:11px" src="/jobfac_admin/img/icons/topnav/icon-email.png" alt="" /><span>Course Req.</span></a></li-->
								
				  
				 <?php if ($_smarty_tpl->tpl_vars['business_enquiry']->value) {?>
				   <li class=""><a href="/administrator/enquiries/" title=""><img src="img/icons/topnav/messages.png" alt=""><span>Enquiries</span><span class="numberTop"><?php echo $_smarty_tpl->tpl_vars['obj']->value['enquiry_total'];?>
</span></a></li>
					<?php }?>					
						
					<?php if ($_smarty_tpl->tpl_vars['contacts']->value) {?>			
				<li class=""><a href="/administrator/contact/" title=""><img src="img/icons/topnav/messages.png" alt=""><span>Contacts</span><span class="numberTop"><?php echo $_smarty_tpl->tpl_vars['obj']->value['contact_unregister']+$_smarty_tpl->tpl_vars['obj']->value['contact_register'];
if ($_smarty_tpl->tpl_vars['obj']->value['contact_register']) {?>(<?php echo $_smarty_tpl->tpl_vars['obj']->value['contact_register'];?>
)<?php }?></span></a></li>
					<?php }?>
					
					<?php if ($_smarty_tpl->tpl_vars['latest_news']->value || $_smarty_tpl->tpl_vars['testimonials']->value) {?>
					<li class="dd"><a style="cursor:default;" href="javascript:void(0)"><img src="img/icons/topnav/tasks.png" alt=""><span>Latest News</span></a>
				  
				   <ul class="menu_body">
                       <?php if ($_smarty_tpl->tpl_vars['latest_news']->value) {?>     
						   <li><a style="width:90px;" class="sNews" href="/administrator/latest_news/">Latest News</a><span class="numberLeft"><?php echo $_smarty_tpl->tpl_vars['obj']->value['latest_news'];?>
</span></li>
						   	<?php }?>												
							
							 <?php if ($_smarty_tpl->tpl_vars['testimonials']->value) {?>
							  <li><a style="width:90px;" class="sTesti" href="/administrator/testimonials/">Testimonials</a><span class="numberLeft"><?php echo $_smarty_tpl->tpl_vars['obj']->value['testimonials_count'];?>
</span></li>
							   <?php }?>                   
                        </ul>
					</li>
					<?php }?>
					
					
				<?php if ($_smarty_tpl->tpl_vars['jobfair']->value || $_smarty_tpl->tpl_vars['client_req']->value) {?>	
				<li class="dd activeNav"><a style="cursor:default;" href="javascript:void(0)"><img src="img/icons/topnav/tasks.png" alt=""><span>Job Fair</span></a>
				  
				   <ul class="menu_body">
                        <?php if ($_smarty_tpl->tpl_vars['jobfair']->value) {?>    
						   <li><a style="width:90px;" class="sTesti" href="jobfair.php">Job Fair</a><?php if ($_smarty_tpl->tpl_vars['jobfair_count']->value) {?><span class="numberLeft"><?php echo $_smarty_tpl->tpl_vars['jobfair_count']->value;
}?></span></li>
						   <li><a style="width:90px;" class="sTesti" href="jobfair_logos.php">Job Fair Logos</a></li>
						   <li><a style="width:90px;" class="sTesti" href="jobfair_photos.php">Job Fair Photos</a></li>
					<?php }?>
						   	<?php if ($_smarty_tpl->tpl_vars['client_req']->value) {?>
							<li><a style="width:90px;" class="sTesti" href="client_req.php">Client Req. </a><?php if ($_smarty_tpl->tpl_vars['client_req_count']->value) {?><span class="numberLeft"><?php echo $_smarty_tpl->tpl_vars['client_req_count']->value;
}?></span></li>
							<?php }?>                  
                        </ul>
					</li>
					<?php }?>
					
				
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
				<?php if ($_smarty_tpl->tpl_vars['dashboard']->value) {?>		
		     <li class="iStat"><a class="" href="/administrator/dashboard/" title="Dashboard"><span>Dashboard</span></a></li>
			 	<?php }?>		 
				<?php if ($_smarty_tpl->tpl_vars['admin_users']->value) {?>	 
        	<li class="iadmUser"><a class="" href="/administrator/users/" title="Admin Users"><span>Admin </span></a><span class="numberMiddle"><?php echo $_smarty_tpl->tpl_vars['obj']->value['admin_total'];?>
</span></li>
				<?php }?>		
			<?php if ($_smarty_tpl->tpl_vars['job_seekers']->value) {?>
			<li class="iUser"><a class="" href="/administrator/jobseekers/" title="Job Seekers"><span>Job Seekers</span></a>
			<span class="numberMiddle"><?php echo $_smarty_tpl->tpl_vars['obj']->value['job_seeker_total'];?>
 <?php if ($_smarty_tpl->tpl_vars['obj']->value['job_seeker_inactive']) {?>(<?php echo $_smarty_tpl->tpl_vars['obj']->value['job_seeker_inactive'];?>
)<?php }?></span>
			
			</li>
			<?php }?>
						
			
			
				<?php if ($_smarty_tpl->tpl_vars['company']->value) {?>
			<li class="ijobs"><a class="" href="/administrator/companies/" title="Employers"><span>Employers</span></a><span class="numberMiddle"><?php echo $_smarty_tpl->tpl_vars['obj']->value['company_total'];?>
</span></li>
			<?php }?>		
			
			<?php if ($_smarty_tpl->tpl_vars['colleges']->value) {?>
			<li class="iCollege"><a class="" href="/administrator/colleges/" title="Colleges"><span>Colleges</span></a><span class="numberMiddle"><?php echo $_smarty_tpl->tpl_vars['obj']->value['college_count'];?>
</span></li>
			<?php }?>		
			
			<?php if ($_smarty_tpl->tpl_vars['transactions']->value) {?>	
			<li class="iTran"><a class="" href="/administrator/transactions/" title="Transactions"><span>Purchase</span></a><span class="numberMiddle"><?php echo $_smarty_tpl->tpl_vars['count_purchase']->value;?>
</span></li>
			<?php }?>			
				
			<!--li class="iApplied"><a class="" href="/jobfac_admin/applied/"  title="Applied Users"><span>Responses</span></a><span class="numberMiddle"></span></li-->
						
				
			<!--li class="iSearch"><a  class="" href="/jobfac_admin/search/" title=""><span>Search</span></a></li--> 
						<?php if ($_smarty_tpl->tpl_vars['tests']->value) {?>
						<li class="iGlobe"><a class="" href="/administrator/online_tests/" title="Tests"><span>Tests</span></a><span class="numberMiddle"><?php echo $_smarty_tpl->tpl_vars['obj']->value['test_total'];?>
</span></li>	
						<?php }?>
	
							
				
				
			 <?php if ($_smarty_tpl->tpl_vars['inbox']->value) {?>
			<li class="iInbox"><a class="" href="/administrator/inbox/?type=en" title="Inbox"><span>Inbox</span></a><span class="numberMiddle"><?php echo $_smarty_tpl->tpl_vars['count_inbox']->value;?>
</span></li>
			 <?php }?>		
			
		
			<?php if ($_smarty_tpl->tpl_vars['reports']->value) {?>
			<li class="iReport"><a class="" href="/administrator/reports/jobseekers/location/" title="Reports"><span>Reports</span></a></li>
			<?php }?>			
			
			
        </ul>
    </div>
    <div class="fix"></div>
</div><?php }
}
