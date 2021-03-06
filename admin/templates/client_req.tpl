{* Purpose : To list client requirements.
   Created : Nikitasa
   Date : 25-11-2016 *}	
   
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
    	<div class="title"><h5>Client Req.</h5>
		</div> 
        <!-- Dynamic table -->
		<div class="breadCrumb module">
                    <ul>
                        <li class="firstB"><a href="#">Dashboard</a> </li>
                        <li><a href="jobfair.php">Job Fair</a></li>                                           
                        <li>List Client Requirements</li>
                    </ul>
<div class="num"><a class="blueNum" href="add_client_req.php" title="Add Job Client Req.">Add Client Req.</a></div>
                </div>
<form action="client_req.php" onsubmit="return submit_search(this, 'jobfair')" id="searchFrm" name="searchFrm" method="post" class="" accept-charset="utf-8">
	<div style="display:none;"><input type="hidden" name="_method" value="POST"></div>		
			
	<div class="widget">      
	   	<div class="table">
		
            <div class="head"><h5 class="iFrames">List Client Req.</h5>
				
		<a class="jsRedirect btn14 mr10 mt5" val="client_req.php" style="float:right" title="" href="client_req.php"> Reset</a>	
		<a class="btn14 mr10 mt5" style="float:right" title="" href="javascript:submit_search(document.searchFrm, 'jobfair');">
		<img src="img/icons/dark/magnify.png" class="vmiddle" alt=""> Search</a>
		<div class="dataTables_filter" id="example_filter"><label>Search: 
			<input name="search" id="searchNC" type="text" class="ac_input" placeholder="eg: infosys, tcs, wipro" value="{$smarty.get.search}" autocomplete="off" tabindex="1">
			 
			 <input name="date_from" value="{$smarty.get.date_from}" type="text" class="datepic" placeholder="Created Date From" id="">
 			 <input name="date_to" value="{$smarty.get.date_to}" type="text" class="datepic" placeholder="Created Date To"  id="">
				
		    <input type="hidden" name="data[Company][webroot]" id="webroot" value="client_req.php">
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
					
					
					<th class="ui-state-default" rowspan="1" colspan="1" style="width: 140px;">
					<a href="client_req.php?field=company_name&order={$order}&page={$smarty.get.page}&keyword={$keyword}&status={$status}&f_date={$f_date}&t_date={$t_date}">
					<div class="DataTables_sort_wrapper">Company <span class="DataTables_sort_icon css_right {$sort_field_company_name}"></span></div></a></th>
					
					
					<th class="ui-state-default" rowspan="1" colspan="1" style="width: 120px;">
					<a href="client_req.php?field=position&order={$order}&page={$smarty.get.page}&keyword={$keyword}&status={$status}&f_date={$f_date}&t_date={$t_date}">
					<div class="DataTables_sort_wrapper">Position <span class="DataTables_sort_icon css_right {$sort_field_position}"></span></div></th>
					
					<th class="ui-state-default" rowspan="1" colspan="1" style="width: 100px;">
					<a href="client_req.php?field=drive_date&order={$order}&page={$smarty.get.page}&keyword={$keyword}&status={$status}&f_date={$f_date}&t_date={$t_date}">
					<div class="DataTables_sort_wrapper">Drive Date <span class="DataTables_sort_icon css_right {$sort_field_drive_date}"></span></div></th>
					
					<th class="ui-state-default" rowspan="1" colspan="1" style="width: 130px;">
					<a href="client_req.php?field=work_loc&order={$order}&page={$smarty.get.page}&keyword={$keyword}&status={$status}&f_date={$f_date}&t_date={$t_date}">
					<div class="DataTables_sort_wrapper">Location <span class="DataTables_sort_icon css_right {$sort_field_work_loc}"></span></div></th>
					
					
					<!--<th class="ui-state-default" rowspan="1" colspan="1" style="width: 110px;">
					<a href="client_req.php?field=no_vacancy&order={$order}&page={$smarty.get.page}&keyword={$keyword}&status={$status}&f_date={$f_date}&t_date={$t_date}">
					<div class="DataTables_sort_wrapper"># Vacancy <span class="DataTables_sort_icon css_right {$sort_field_no_vacancy}"></span></div></th>
					-->
					<th class="ui-state-default" rowspan="1" colspan="1" style="width: 110px;">
					<div class="DataTables_sort_wrapper"># Reg. <span class="DataTables_sort_icon css_right {$sort_field_reg}">
					</span></div></th>
					
					<th class="ui-state-default" rowspan="1" colspan="1" style="width: 100px;">
					<a href="client_req.php?field=start_date&order={$order}&page={$smarty.get.page}&keyword={$keyword}&status={$status}&f_date={$f_date}&t_date={$t_date}">
					<div class="DataTables_sort_wrapper">Start Date<span class="DataTables_sort_icon css_right {$sort_field_start_date}"></span></div></a></th>
					
					<th class="ui-state-default" rowspan="1" colspan="1" style="width: 100px;">
					<a href="client_req.php?field=end_date&order={$order}&page={$smarty.get.page}&keyword={$keyword}&status={$status}&f_date={$f_date}&t_date={$t_date}">
					<div class="DataTables_sort_wrapper">End Date<span class="DataTables_sort_icon css_right {$sort_field_end_date}"></span></div></a></th>
					
					<th class="ui-state-default" rowspan="1" colspan="1" style="width: 35px;">
					<a href="client_req.php?field=status&order={$order}&page={$smarty.get.page}&keyword={$keyword}&status={$status}&f_date={$f_date}&t_date={$t_date}">
					<div class="DataTables_sort_wrapper">Status<span class="DataTables_sort_icon css_right {$sort_field_status}"></span></div></a></div></th>
					
					<th class="ui-state-default" rowspan="1" colspan="1" style="width: 165px;">
					<a href="client_req.php?field=created_date&order={$order}&page={$smarty.get.page}&keyword={$keyword}&status={$status}&f_date={$f_date}&t_date={$t_date}">
					<div class="DataTables_sort_wrapper">Created Date<span class="DataTables_sort_icon css_right {$sort_field_created_date}"></span></div></a></th>
					
					<!--<th class="ui-state-default" rowspan="1" colspan="1" style="width: 165px;">
					<a href="client_req.php?field=modified_date&order={$order}&page={$smarty.get.page}&keyword={$keyword}&status={$status}&f_date={$f_date}&t_date={$t_date}">
					<div class="DataTables_sort_wrapper">Modified Date<span class="DataTables_sort_icon css_right {$sort_field_modified_date}"></span></div></a></th>
					-->
					
					<th class="ui-state-default" rowspan="1" colspan="1" style="width: 145px;"><div class="DataTables_sort_wrapper">Action</div></th>
					
					</tr>
                </thead>
             <tbody>
			 	 {foreach from=$data item=item key=key}		
					{if $item.company_name}					
   					{if $key % 2 == 0}
      					{assign var="grade" value="gradeA odd"}
   					{else}
      				   {assign var="grade" value="gradeA even"}
      			   {/if}
      				
			   <tr class="{$grade}">
					 	
				 <td><a href="view_client_req.php?id={$item.id}">{$item.company_name}</a></td>
				 <td>{$item.position}</td>
				 <td>{$item.drive_date}</td>
				 <td>{$item.work_loc}</td>
				<td align="center">
						 	<a href="client_req.php?action=export&id={$item.id}" val="client_req.php?action=export&id={$item.id}" class="btn btn-warning jsRedirect" >{$item.reg}</a>
						</td>	
				 						
             <td align="center">{$item.start_date}</td>
			    <td align="center">{$item.end_date}</td>
				 <td class="center">
			    <img border="0" class="mr5 vmiddle tipS" original-title="{$item.status}" src="{$item.status_cls}">
			    </td>						
				 <td class="center">{$item.created_date}</td>
				<!-- <td class="center">{$item.modified_date}</td>-->
             <td class="center"><img class="mr5 vmiddle" src="img/icons/dark/pencil.png"><a href="edit_client_req.php?id={$item.id}">Edit</a> &nbsp;  
             <img  class="mr5 vmiddle" alt=""  width="12" height="12"  src="img/icons/dark/trash.png"><a id="{$item.id}" value="#" class="bConfirm2" href="javascript:void(0)">Delete</a></td>
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
		<input type="hidden" id="page" value="client_req">		
		<input type="hidden" id="web_root" value="delete_client_req.php">	
	</div>
	<div class="fix">
	</div>
</form>

</div>
  	
  </div>		
		</div>
		
{include file='include/footer.tpl'}