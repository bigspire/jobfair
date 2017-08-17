{* Purpose : To view client photos.
   Created : Nikitasa
   Date : 16-08-2017 *}	
   
   
{include file='include/header.tpl'}
{include file='include/menu.tpl'}

<!-- Content wrapper -->
<div class="wrapper">
<div id="container" class="content nNote">	
    	<div class="title"><h5>View Client Req. Photos</h5></div>
        <!-- Form begins -->
	<form action="client_photos.php" method="post" name="company" id="formID" class="mainForm" enctype="multipart/form-data" accept-charset="utf-8">
	<div style="display:none;"><input type="hidden" name="_method" value="POST"></div> 
	 <fieldset>
			<div class="breadCrumb module">
               <ul>
                   <li class="firstB"><a href="#">Dashboard</a> </li>                               
                   <li><a href="client_photos.php">Client Photos</a></li>
                   <li>View Client Req. Photos</li>
					</ul>	
			</div>
			
			<div class="widget first">
             <div class="head"><h5 class="iList">View Client Req. Photo Details</h5></div>
					<div class="floatleft_view_odd">
					 
					     <div class="rowElem_view"><label>Client Req. Title</label>
						 <div class="formRight_view">{$position} ({$company_name})</div>
						 <div class="fix"></div></div>
                    <div class="rowElem_view"><label>Status</label>
					<div class="formRight_view">{ucwords($status)}</div><div class="fix"></div></div>
					                  
                    </div>
					
					
						
					<div class="floatleft_view_odd">
						<div class="">
						<div class="formRight_view" style="width:100%">
						{foreach from=$data1 item=item key=key}
						{if $item.photo}
						<div align="center" style="border:2px dotted #e0e0e0; width:180px;float:left;padding:10px;margin:5px;">
						<img src="timthumb.php?src=admin/uploads/req_photo/{$item.photo}&w=160&q=100">
						</div>
						{/if}
						{/foreach}
						</div>
						</div>
					</div>	
					
			</div>
			
			<div class="m10">
				<a href="client_photos.php"><input type="button" val="client_photos.php" class="jsRedirect greyishBtn submitForm" value="Back"></a>
				<div class="fix"></div>
 				</div>
       </fieldset>
     </form>
	 </div>	
</div>
{include file='include/footer.tpl'}