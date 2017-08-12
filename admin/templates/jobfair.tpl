{* Purpose : To list jobfair.
   Created : Nikitasa
   Date : 16-11-2016 *}	
   
   
{include file='include/header.tpl'}
{include file='include/menu.tpl'}

<!-- Content wrapper -->
<div class="wrapper">
	
	<div class="nNote stats_new">
   	<ul>  
   	</ul>
  		<div class="fix"></div>
   </div>		
   {if $SUCCESS_MSG}
   <div id="flashMessage" class="nNote nSuccess hideit dismiss">{$SUCCESS_MSG}</div>
   {/if}
   {if $ALERT_MSG}
   <div id="flashMessage" class="nNote nFailure hideit dismiss">{$ALERT_MSG}</div>
   {/if}
    <!-- Content -->
    <div class="content">
    	<div class="title"><h5>Job Fair</h5>
		
		</div>
    
    <!-- Dynamic table -->
		
				<div class="breadCrumb module">
                    <ul>
                        <li class="firstB"><a href="#">Dashboard</a> </li>
                        <li><a href="jobfair.php">Job Fair</a></li>                                           
                        <li>List Job Fair</li>
                    </ul>
			<!--a href="javascript:void(0)" title="" style="float:right" class="btn14 mr15 bConfirmAll"><img src="/jobfac_admin/img/icons/dark/trash.png" class="vmiddle" alt=""> Delete</a><br>
			<a href="#" title="" style="float:right" class="btn14 mr15 bEditAll"><img src="/jobfac_admin/img/icons/dark/pencil.png" class="vmiddle" alt=""> Edit</a-->
			<div class="num"><a class="blueNum" href="add_jobfair.php" title="Add Job Fair">Add Job Fair</a></div>	
      </div>
		
	
	<form action="jobfair.php" onsubmit="return submit_search(this, 'jobfair')" id="searchFrm" name="searchFrm" method="post" class="" accept-charset="utf-8">
	<div style="display:none;"><input type="hidden" name="_method" value="POST"></div>		
			
	<div class="widget">      
	  <div class="table">
		 <div class="head"><h5 class="iFrames">List Job Fair</h5>
			<a class="jsRedirect btn14 mr10 mt5" style="float:right" title="" href="jobfair.php" val="jobfair.php"> Reset</a>
			<a class="btn14 mr10 mt5" style="float:right" title="" href="javascript:submit_search(document.searchFrm, 'jobfair');"><img src="img/icons/dark/magnify.png" class="vmiddle" alt=""> Search</a>
			<div class="dataTables_filter" id="example_filter"><label>Search: 
			 	
				<input name="search" id="search" type="text" class="ac_input" placeholder="eg: infosys, tcs, wipro" value="{$smarty.get.search}" autocomplete="off" tabindex="1">
			 
 				<input name="date_from" value="{$smarty.get.date_from}" type="text" class="datepic" placeholder="From Date" id="">
 				<input name="date_to" value="{$smarty.get.date_to}" type="text" class="datepic" placeholder="To Date"  id="">
			
 				<input type="hidden" name="data[Company][webroot]" id="webroot" value="jobfair.php">
 				<input type="hidden" name="data[Company][hdnSubmit]" id="CompanyHdnSubmit">				

				<div class="srch"></div></label>
				<label>
				    {html_options name='status' class="input-medium" placeholder="" style="clear:left"  options=$type selected=$status}
	         </label>
	         </div>
		 </div>
		
			
            <div class="dataTables_wrapper" id="example_wrapper"> <table cellspacing="0" cellpadding="0" border="0" id="example" class="display">
                <thead>
                    <tr>
					
					<th class="ui-state-default" rowspan="1" colspan="1" style="width: 120px">
					<a href="jobfair.php?field=title&order={$order}&page={$smarty.get.page}&keyword={$keyword}&status={$status}&f_date={$f_date}&t_date={$t_date}">
					<div class="DataTables_sort_wrapper">Title<span class="DataTables_sort_icon css_right {$sort_field_title}"></span></div></a></th>
					
					<th class="ui-state-default" rowspan="1" colspan="1" style="width: 90px;">
					<a href="jobfair.php?field=jobfair_date&order={$order}&page={$smarty.get.page}&keyword={$keyword}&status={$status}&f_date={$f_date}&t_date={$t_date}">
					<div class="DataTables_sort_wrapper">Date<span class="DataTables_sort_icon css_right {$sort_field_jobfair_date}"></span></div></a></th>
					
					<th class="ui-state-default" rowspan="1" colspan="1" style="width: 100px;">
					<a href="jobfair.php?field=location&order={$order}&page={$smarty.get.page}&keyword={$keyword}&status={$status}&f_date={$f_date}&t_date={$t_date}">
					<div class="DataTables_sort_wrapper">Location<span class="DataTables_sort_icon css_right {$sort_field_location}"></span></div></a></th>
					
					<th class="ui-state-default" rowspan="1" colspan="1" style="width: 140px;">
					<a href="jobfair.php?field=partner&order={$order}&page={$smarty.get.page}&keyword={$keyword}&status={$status}&f_date={$f_date}&t_date={$t_date}">
					<div class="DataTables_sort_wrapper">Partner With<span class="DataTables_sort_icon css_right {$sort_field_partner}"></span></div></a></th>
					
					<th class="ui-state-default" rowspan="1" colspan="1" style="width: 60px;">
					
					<div class="DataTables_sort_wrapper"># Reg.<span class="DataTables_sort_icon css_right {$sort_field_reg}"></span></div>
					</th>
					
					<th class="ui-state-default" rowspan="1" colspan="1" style="width: 35px;">
					<a href="jobfair.php?field=status&order={$order}&page={$smarty.get.page}&keyword={$keyword}&status={$status}&f_date={$f_date}&t_date={$t_date}">
					<div class="DataTables_sort_wrapper">Status<span class="DataTables_sort_icon css_right {$sort_field_status}"></span></div></a></div></th>
					
					<th class="ui-state-default" rowspan="1" colspan="1" style="width: 145px;">
					<a href="jobfair.php?field=created_date&order={$order}&page={$smarty.get.page}&keyword={$keyword}&status={$status}&f_date={$f_date}&t_date={$t_date}">
					<div class="DataTables_sort_wrapper">Created Date<span class="DataTables_sort_icon css_right {$sort_field_created_date}"></span></div></a></th>
					
					<th class="ui-state-default" rowspan="1" colspan="1" style="width: 145px;">
					<a href="jobfair.php?field=modified_date&order={$order}&page={$smarty.get.page}&keyword={$keyword}&status={$status}&f_date={$f_date}&t_date={$t_date}">
					<div class="DataTables_sort_wrapper">Modified Date<span class="DataTables_sort_icon css_right {$sort_field_modified_date}"></span></div></a></div></th>
					
					<th class="ui-state-default" rowspan="1" colspan="1" style="width: 135px;">
					<div class="DataTables_sort_wrapper">Action</div>
					</th>
					
					</tr>
                </thead>
             <tbody>
             {foreach from=$data item=item key=key}		
					{if $item.title}					
   					{if $key % 2 == 0}
      					{assign var="grade" value="gradeA odd"}
   					{else}
      					{assign var="grade" value="gradeA even"}
      				{/if}

			 		<tr class="{$grade}">
						 <td><a href="view_jobfair.php?id={$item.id}">{ucwords($item.title)}</a></td>
				 		 <td>{$item.jobfair_date}</td>
						 <td>{ucwords($item.location)} </td>
						 <td>{ucwords($item.partner)}</td>
						 <td align="center">{$item.reg}</td>
						 <td class="center">
						 <img border="0" class="mr5 vmiddle tipS" original-title="{$item.status}" src="{$item.status_cls}">			
						 </td>						
						 <td class="center">{$item.created_date}</td>
						 <td class="center">{$item.modified_date}</td>
						 
						 
 						 <td class="center">

 						{*{if $item.jobfair >= $current_date}*}
 						   <img class="mr5 vmiddle" src="img/icons/dark/pencil.png"><a href="edit_jobfair.php?id={$item.id}">Edit</a> &nbsp; 
 						   <img  class="mr5 vmiddle" alt=""  width="12" height="12"  src="img/icons/dark/trash.png">
 						   <a id="{$item.id}" value="#" class="bConfirm2" href="javascript:void(0)">Delete</a><br>
 						{*{/if}*}
 							&nbsp;  <img  class="mr5 vmiddle" alt=""  width="12" height="12"  src="img/icons/dark/clock.png">
 							<a id=""  value="#" val="set_reminder.php?id={$item.id}&title={$item.title}&jobfair_date={$item.jobfair_date}" class="set_reminder" href="javascript:void(0)">Reminder</a>
 						 </td>
 						 			
               </tr>
             
               {/if}
					{/foreach}
             </tbody></table>
			 <div class="dataTables_info" id="DataTables_Table_8_info">
			 </div>
								<div class="table-pagination" id="DataTables_Table_8_paginate">
								 	
								</div>
								&nbsp;
			  <div class="fg-toolbar ui-toolbar ui-widget-header ui-corner-bl ui-corner-br ui-helper-clearfix">
			  <div id="example_length" class="dataTables_length">
				{$page_info}
				</div>
				
				<!--div class="dataTables_paginate fg-buttonset ui-buttonset fg-buttonset-multi ui-buttonset-multi paging_full_numbers" id="example_paginate"><span class="toFirst ui-corner-tl ui-corner-bl fg-button ui-button ui-state-disabled" id="example_first">First</span><span class="previous fg-button ui-button ui-state-disabled" id="example_previous">Prev</span><span><span class="fg-button ui-button ui-state-disabled">1</span><span class="fg-button ui-button">2</span><span class="fg-button ui-button">3</span><span class="fg-button ui-button">4</span><span class="fg-button ui-button">5</span></span><span class="next fg-button ui-button" id="example_next">Next</span><span class="last ui-corner-tr ui-corner-br fg-button ui-button" id="example_last">Last</span></div-->
				
				<div class="dataTables_paginate fg-buttonset ui-buttonset fg-buttonset-multi ui-buttonset-multi paging_full_numbers" id="example_paginate">
				{$page_links}
				</div>
				
				
				</div>
				</div>
        </div>
			<input type="hidden" id="webroot_remind" value="set_reminder.php">
			<input type="hidden" id="page" value="jobfair">		
			<input type="hidden" id="web_root" value="delete_jobfair.php">	
				    </div>
	<div class="fix">
	</div>
</form>

</div>
  	
  </div>		
		</div>
		
{include file='include/footer.tpl'}