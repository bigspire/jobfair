{* Purpose : To view jobfair.
   Created : Nikitasa
   Date : 17-11-2016 *}	
   
   
{include file='include/header.tpl'}
{include file='include/menu.tpl'}

<!-- Content wrapper -->
<div class="wrapper">
<div id="container" class="content nNote">	
    	<div class="title"><h5>View Job Fair</h5></div>
        <!-- Form begins -->
	<form action="jobfair.php" method="post" name="company" id="formID" class="mainForm" enctype="multipart/form-data" accept-charset="utf-8">
	<div style="display:none;"><input type="hidden" name="_method" value="POST"></div> 
	 <fieldset>
			<div class="breadCrumb module">
               <ul>
                   <li class="firstB"><a href="#">Dashboard</a> </li>                               
                   <li><a href="jobfair.php">Job Fair</a></li>
                   <li>View Job Fair</li>
					</ul>	
			</div>
			
			<div class="widget first">
             <div class="head"><h5 class="iList">View Job Fair Details</h5></div>
					<div class="floatleft_view_odd">
					 {foreach from=$data item=item key=key}
					     <div class="rowElem_view"><label>Title</label><div class="formRight_view">{ucwords($item.title)}</div><div class="fix"></div></div>
                    <div class="rowElem_view"><label>Date</label><div class="formRight_view">{$item.jobfair_date}</div><div class="fix"></div></div>
					 	  <div class="rowElem_view"><label>Location</label><div class="formRight_view">{ucwords($item.location)}</div></div>
					</div>
					<div class="floatleft_view_even">
						<div class="rowElem_view"><label>Partner With</label><div class="formRight_view">{ucwords($item.partner)}</div><div class="fix"></div></div>
						<div class="rowElem_view"><label>Partner Logo</label><div class="formRight_view">
						{if $item.partner_logo}
							<img src="timthumb.php?src=uploads/{$item.partner_logo}&h=30&q=100">
						{/if}
						</div><div class="fix"></div></div>
						<div class="rowElem_view"><label>State</label><div class="formRight_view">{ucwords($item.state_name)}</div><div class="fix"></div></div>
					</div>
					
					<div class="floatleft_view_odd">
						<div class="rowElem_view"><label>Venue</label>
						<div class="formRight_view">{ucwords($item.venue|nl2br)}</div>
						<div class="fix"></div>
						</div>
						
						<div class="rowElem_view"><label>Status</label><div class="formRight_view">{ucwords($item.status)}</div><div class="fix"></div></div>
					</div>
					
					<div class="floatleft_view_even">
	<div class="lastRow"><label>Description</label><div class="formRight_view">{ucfirst($item.description)}</div>
	<div class="fix"></div>
	</div>						 	
 </div>
 
 <div class="floatleft_view_odd">
	<div class="lastRow"><label>Eligibility Criteria</label><div class="formRight_view">{ucfirst($item.eligibility)}</div>
	<div class="fix"></div>
	</div>						 	
 </div>
 
 <div class="floatleft_view_even">
	<div class="lastRow"><label>Others</label><div class="formRight_view">{$item.others}</div>
	<div class="fix"></div>
	</div>						 	
 </div>
					
					
					<div class="fix"></div>
			</div>
						
			<div class="widget first">
             <div class="head"><h5 class="iList">Contact Details</h5></div>
             <div class="floatleft_view_even">
               <div class="rowElem_view"><label>Contact Person</label><div class="formRight_view">{ucwords($item.contact_person)}</div><div class="fix"></div></div>
				 	<div class="rowElem_view"><label>Email Address</label><div class="formRight_view">{$item.contact_email}</div><div class="fix"></div></div>
					<div class="rowElem_view"><label>Contact No.</label><div class="formRight_view">{$item.contact_no}</div><div class="fix"></div></div>
				 </div>
				 <div class="fix"></div>
				 <div class="fix"></div>
			</div>
			
			<div class="widget" id="">
            <div class="head"><h5 class="iList">Record History</h5></div>
				 <div class="floatleft_view_odd">
              <div class="rowElem_view history_width"><label>Created Date</label><div class="formRight_view">{$item.created_date}</div><div class="fix"></div></div>
				  <div class="rowElem_view history_width"><label>Modified Date</label><div class="formRight_view">{$item.modified_date}</div><div class="fix"></div></div> 	
				 </div>
				<div class="fix"></div>						
			</div>
			{/foreach}
			<div class="m10">
				<a href="jobfair.php"><input type="button" val="jobfair.php" class="jsRedirect greyishBtn submitForm" value="Back"></a>
				<div class="fix"></div>
 				</div>
       </fieldset>
     </form>
	 </div>	
</div>
{include file='include/footer.tpl'}