{* Purpose : To add client photos.
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
  
  <div class="title"><h5>Add Client Req. Photos</h5></div>
   	
	   <div class="fix"></div>
        <!-- Form begins -->
	<form action="add_client_photos.php" method="post" name="company" id="formID" class="mainForm" enctype="multipart/form-data" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"></div> 
		<fieldset>
		<div class="breadCrumb module">
                    <ul>
                        <li class="firstB"><a href="">Dashboard</a> </li>
                        <li><a href="client_photos.php">Client Photos</a></li>                                           
                        <li>Add Client Photos</li>
                    </ul>				
	   </div>
			<div class="widget first">
                    <div class="head"><h5 class="iList">Add Client Req. Photos	
				

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
					
					<div class="floatleft threeOne">
                <div class="rowElem noborder pb0"><label class="topLabel">Client Req. Photos <span class="mandatory">*</span> </label><div class="formBottom">
					 <input name="req_photo" value="{$smarty.post.req_photo}" type="file" tabindex="3" class="validate[required]" id="logo">
					  <br>
						<span class="error-message">{$req_photoErr} {$attachmentuploadErr}</span>
					</div><div class="fix"></div></div>
					 </div>
					 
					<div class="floatleft threeOne">				   
                    	
					<div class="rowElem noborder pb0"><label class="topLabel">Status <span class="mandatory">*</span></label><div class="formBottom">
					<select name="status" style="width:300px" tabindex="5">
					{if isset($status)}
							{html_options style="width:300px" options=$type selected=$status}			
					{/if}
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
                </fieldset>
<input type="hidden" name="data[Company][created_date]" value="2016-11-08 17:12:52" id="CompanyCreatedDate">
<input type="hidden" name="data[Company][created_by]" value="5" id="CompanyCreatedBy">				
       </form>    </div>
</div>	
{include file='include/footer.tpl'}