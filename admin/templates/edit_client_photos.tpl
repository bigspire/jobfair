{* Purpose : To edit client photos.
   Created : Nikitasa
   Date : 16-08-2017 *}	
   
   
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

    	<div class="title"><h5>Edit Client Req. Photos</h5></div>
   	 
        <!-- Form begins -->
	<form action="edit_client_photos.php?get_client_id={$get_client_id}" method="post" name="company" id="formID" class="mainForm" enctype="multipart/form-data" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"></div> 
		<fieldset>
		<div class="breadCrumb module">
                    <ul>
                        <li class="firstB"><a href="">Dashboard</a> </li>
                        <li><a href="client_photos.php">Client Req. Photos</a></li>                                           
                        <li>Edit Client Req. Photos</li>
                    </ul>					
	    </div>
			<div class="widget first">
                    <div class="head"><h5 class="iList">Edit Client Req. Photos	
					

</h5><div class="num"><span><span class="mandatory">*</span> fields are mandatory</span></div></div>
					
               <div class="floatleft threeOne">
                    <div class="rowElem noborder pb0"><label class="topLabel">Client Req. Title <span class="mandatory">*</span></label><div class="formBottom">
							<select style="width:300px" name="client_id" tabindex="1">
							<option value="">Choose any one</option>
							{html_options options=$client selected=$client_id}					
							</select> <br>
							<span class="error-message">{$client_idErr}</span>
					      </div><div class="fix"></div>
					     </div>
               </div>					
					
					<div class="floatleft_view_odd">
						<div class="">
						<div class="formRight_view" style="width:100%">
						{foreach from=$data item=item key=key}
						{if $item.photo}
						<div align="center" style="border:2px dotted #e0e0e0; width:180px;float:left;padding:10px;margin:5px;">
						<img src="timthumb.php?src=admin/uploads/req_photo/{$item.photo}&w=160&q=100">
						
						<br> <a id="{$item.id}|{$item.req_id}" value="javascript:void(0)" class="bConfirmPhotos1" href="javascript:void(0)">Remove</a>
						<input type="hidden" id="remove" value="remove_client_photos.php">
						
					
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
				    <a href="client_photos.php"><input type="button" class="jsRedirect greyishBtn submitForm" val="client_photos.php" value="Cancel"></a>
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