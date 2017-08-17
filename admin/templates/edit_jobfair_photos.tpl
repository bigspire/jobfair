{* Purpose : To edit jobfair photos.
   Created : Nikitasa
   Date : 24-01-2017 *}	
   
   
{include file='include/header.tpl'}
{include file='include/menu.tpl'}

<!-- Content wrapper -->
<div class="wrapper">
<div id="container" class="content nNote">
{if $EXIST_MSG}
   <div id="flashMessage" class="nNote nFailure hideit dismiss">{$EXIST_MSG}</div>
{/if}

{if $success_msg}
   <div id="flashMessage" class="nNote nFailure hideit dismiss">{$success_msg}</div>
   
{/if}

    	<div class="title"><h5>Edit Job Fair Photos</h5></div>
   	 
        <!-- Form begins -->
	<form action="edit_jobfair_photos.php?get_jobfair_id={$get_jobfair_id}" method="post" name="company" id="formID" class="mainForm" enctype="multipart/form-data" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"></div> 
		<fieldset>
		<div class="breadCrumb module">
                    <ul>
                        <li class="firstB"><a href="">Dashboard</a> </li>
                        <li><a href="jobfair_photos.php">Job Fair Photos</a></li>                                           
                        <li>Edit Job Fair Photos</li>
                    </ul>					
	    </div>
			<div class="widget first">
                    <div class="head"><h5 class="iList">Edit Job Fair Photos	
					

</h5><div class="num"><span><span class="mandatory">*</span> fields are mandatory</span></div></div>
					
               <div class="floatleft threeOne">
                    <div class="rowElem noborder pb0"><label class="topLabel">Job Fair Title <span class="mandatory">*</span></label><div class="formBottom">
							<select style="width:300px" name="jobfair_id" tabindex="1">
							<option value="">Choose any one</option>
							{html_options options=$jobfair selected=$jobfair_id}					
							</select> <br>
							<span class="error-message">{$jobfair_idErr}</span>
					      </div><div class="fix"></div>
					     </div>
               </div>					
					
					
					<div class="floatleft_view_odd">
						<div class="">
						<div class="formRight_view" style="width:100%">
						{foreach from=$data item=item key=key}
						{if $item.photo}
<<<<<<< HEAD
						<br><img src="timthumb.php?src=admin/uploads/photo/{$item.photo}&w=200&q=100">
=======
						<div align="center" style="border:2px dotted #e0e0e0; width:180px;float:left;padding:10px;margin:5px;">
						<img src="timthumb.php?src=admin/uploads/photo/{$item.photo}&w=160&q=100">
						<!-- br> <a href="{$url}remove_jobfair_photos.php?id={$item.id}" class="bConfirmPhotos">Remove</a -->
						
						<br> <a id="{$item.id}|{$item.jobfair_id}" value="javascript:void(0)" class="bConfirmPhotos" href="javascript:void(0)">Remove</a>
						<input type="hidden" id="remove" value="remove_jobfair_photos.php">
>>>>>>> 30cc881e0ab6b7cdf64b315feb18a97b426d901c
						
					
						</div>
						{/if}
						{/foreach}
						</div>
						</div>
					</div>
					
					
				
					 
					 
					 
					 
					<div class="floatleft threeOne">
                    
					<div class="rowElem noborder pb0"><label class="topLabel">Status <span class="mandatory">*</span></label><div class="formBottom">
						<select style="width:300px" name="status"  class="validate[required]" id="req1" tabindex="5">
							<option value="">Choose any one</option>
							{html_options options=$type selected=$status}	
						</select>  <br>
					<span class="error-message">{$statusErr}</span>
					</div><div class="fix"></div>
					</div>         
               
               </div>
					
					
					<br><br><br><br><br><br>
					
					<div class="m10">
				    <a href="jobfair_photos.php"><input type="button" class="jsRedirect greyishBtn submitForm" val="jobfair_photos.php" value="Cancel"></a>
						<input type="submit" class="greyishBtn submitForm" value="Submit">
                        <div class="fix"></div>
 				   </div>
		
               <div class="fix"></div>
                </div>
<input type="hidden" name="data[Company][created_date]" value="2016-11-08 17:12:52" id="CompanyCreatedDate"><input type="hidden" name="data[Company][created_by]" value="5" id="CompanyCreatedBy">				
       </form>    </div>
</div>	
	</div>	
		</div>
{include file='include/footer.tpl'}