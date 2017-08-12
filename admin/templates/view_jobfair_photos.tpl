{* Purpose : To view jobfair photos.
   Created : Nikitasa
   Date : 24-01-2017 *}	
   
   
{include file='include/header.tpl'}
{include file='include/menu.tpl'}

<!-- Content wrapper -->
<div class="wrapper">
<div id="container" class="content nNote">	
    	<div class="title"><h5>View Job Fair Photos</h5></div>
        <!-- Form begins -->
	<form action="jobfair_photos.php" method="post" name="company" id="formID" class="mainForm" enctype="multipart/form-data" accept-charset="utf-8">
	<div style="display:none;"><input type="hidden" name="_method" value="POST"></div> 
	 <fieldset>
			<div class="breadCrumb module">
               <ul>
                   <li class="firstB"><a href="#">Dashboard</a> </li>                               
                   <li><a href="jobfair_photos.php">Job Fair Photos</a></li>
                   <li>View Job Fair Photos</li>
					</ul>	
			</div>
			
			<div class="widget first">
             <div class="head"><h5 class="iList">View Job Fair Photo Details</h5></div>
					<div class="floatleft_view_odd">
					 {foreach from=$data item=item key=key}
					     <div class="rowElem_view"><label>Title</label><div class="formRight_view">{ucwords($item.title)}</div><div class="fix"></div></div>
                    <div class="rowElem_view"><label>Status</label><div class="formRight_view">{ucwords($item.status)}</div><div class="fix"></div></div>
					{/foreach}                    
                    </div>
					<div class="floatleft_view_even">
						<div class="rowElem_view"><label>Job Fair Photos</label>
						{foreach from=$data1 item=item key=key}
						{if $item.photo}
						<div class="formRight_view">
						<img src="timthumb.php?src=uploads/photo/{$item.photo}&h=100&q=100">
						</div>
						{/if}
						{/foreach}
						</div>
						</div>	
					
			</div>
			
			<div class="m10">
				<a href="jobfair_photos.php"><input type="button" val="jobfair_photos.php" class="jsRedirect greyishBtn submitForm" value="Back"></a>
				<div class="fix"></div>
 				</div>
       </fieldset>
     </form>
	 </div>	
</div>
{include file='include/footer.tpl'}