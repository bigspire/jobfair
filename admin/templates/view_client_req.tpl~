{* Purpose : To view client requirement.
   Created : Nikitasa
   Date : 28-11-2016 *}	
    
{include file='include/header.tpl'}
{include file='include/menu.tpl'}


<!-- Content wrapper -->
<div class="wrapper">
<div id="container" class="content nNote">
    	<div class="title"><h5>View Client Req.</h5>
		</div>
		<div class="breadCrumb module" style="height:0px;">
                    <ul>
                        <li class="firstB"><a href="#">Dashboard</a> </li>
                        <li><a href="jobfair.php">Job Fair</a></li>   
						<li><a href="client_req.php">List Client Req.</a></li>                                    
                        <li>View Client Req.</li>
                    </ul>
      </div>
        <!-- Form begins -->
	<form action="jobfair.html" method="post" name="company" id="formID" class="mainForm" enctype="multipart/form-data" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"></div> 
			<fieldset>
			  <div class="widget first">
                    <div class="head"><h5 class="iList">View Requirement Details</h5></div>
                    {foreach from=$data item=item key=key}
				   <div class="floatleft_view_odd">
               <div class="rowElem_view"><label>Company Name</label><div class="formRight_view">{$item.company_name}</div>
               <div class="fix"></div>
               </div>
					<div class="rowElem_view"><label>Position</label><div class="formRight_view">{$item.position}</div>
					<div class="fix"></div>
					</div>
					<div class="rowElem_view"><label>Drive Date</label><div class="formRight_view">{$item.drive_date}</div>
					<div class="fix"></div>
					</div>
					</div>
					
					<div class="floatleft_view_even">
					<div class="rowElem_view"><label>Qualification</label><div class="formRight_view">{$item.qualification} 
					</div><div class="fix"></div></div>
					<div class="rowElem_view"><label>Work Location</label><div class="formRight_view">{$item.work_loc}</div><div class="fix"></div></div>
					<div class="rowElem_view"><label>Contact No.</label><div class="formRight_view">{$item.contact_no}</div><div class="fix"></div></div>
					</div>
					
					<div class="floatleft_view_odd">
                        <div class="rowElem_view"><label>Email Address</label><div class="formRight_view">{$item.email_address}</div><div class="fix"></div></div>
					<div class="rowElem_view"><label>No. of Vacancy</label><div class="formRight_view">
						 {$item.no_vacancy}</div></div>
						 <div class="rowElem_view"><label>Status</label><div class="formRight_view">
						 {$item.status}</div></div>
					</div>
					<div class="floatleft_view_even">
					<div class="rowElem_view"><label>Salary Details</label><div class="formRight_view">
						 {$item.salary}</div></div>
					<div class="rowElem_view"><label>Venue Details</label><div class="formRight_view">
						 {$item.venue}</div></div>
					<div class="rowElem_view"><label>Company Logo</label><div class="formRight_view">
						{if $item.client_logo}
							<img src="timthumb.php?src=uploads/req_logo/{$item.client_logo}&w=200&q=100">
						{/if}
						</div><div class="fix"></div>
					</div>
					</div>
					
						
					<div class="floatleft_view_odd">
						<div class="lastRow rowElem_view"><label>About Company</label>
							<div class="formRight_view">{ucfirst($item.about_company|nl2br)}</div>
						<div class="fix"></div>
						</div>
					</div>
					
						
					<div class="fix"></div>
						</div>
						
					<div class="widget first">
               <div class="head"><h5 class="iList">Pop-up Details</h5></div>
               <div class="floatleft_view_odd">
                   <div class="rowElem_view"><label>Start Date</label><div class="formRight_view">{$item.start_date}</div><div class="fix"></div></div>
				 	<div class="rowElem_view"><label>End Date</label><div class="formRight_view">{$item.end_date}</div><div class="fix"></div></div> </div>
				    <div class="fix"></div>
				    <div class="fix"></div>
				   </div>
				   
					<div class="widget" id="">
                    <div class="head"><h5 class="iList">Record History</h5></div>
					 <div class="floatleft_view_odd">
                <div class="rowElem_view history_width"><label>Created Date</label><div class="formRight_view">{$item.created_date}</div><div class="fix"></div></div>
				    <div class="rowElem_view history_width"><label>Modified Date</label><div class="formRight_view">{$item.modified_date}</div><div class="fix"></div>
				    </div>
				    </div>
					 <div class="fix"></div>
				   </div>
				   {/foreach}	  
				<div class="m10">
				<a href="client_req.php"><input type="button" class="jsRedirect greyishBtn submitForm" val="client_req.php" value="Back"></a>
				<div class="fix"></div>
 				</div>			
 </form>    
 </div>
</div>	
</div>
{include file='include/footer.tpl'}