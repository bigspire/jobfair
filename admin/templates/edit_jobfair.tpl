{* Purpose : To edit jobfair.
   Created : Nikitasa
   Date : 18-11-2016 *}	
   
   
{include file='include/header.tpl'}
{include file='include/menu.tpl'}

<!-- Content wrapper -->
<div class="wrapper">
<div id="container" class="content nNote">
	{if $EXIST_MSG}
   <div id="flashMessage" class="nNote nFailure hideit dismiss">{$EXIST_MSG}</div>
   {/if}
   <div class="title"><h5>Edit Job Fair</h5></div>
   	
   <!-- Form begins -->
	<form action="edit_jobfair.php?id={$getid}" method="post" name="company" id="formID" class="mainForm" enctype="multipart/form-data" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"></div> 
		<fieldset>
		 <div class="breadCrumb module">
                    <ul>
                        <li class="firstB"><a href="">Dashboard</a> </li>
                        <li><a href="jobfair.php">Job Fair</a></li>                                           
                        <li>Edit Job Fair</li>
                    </ul>					
	    </div>
			<div class="widget first">
             <div class="head"><h5 class="iList">Job Fair Info</h5><div class="num"><span><span class="mandatory">*</span> fields are mandatory</span></div></div>
					<div class="floatleft threeOne">
					
					 	<div class="rowElem noborder pb0">
					 		<label class="topLabel"> Title <span class="mandatory">*</span></label>
					 		<div class="formBottom">
								<input name="title"  value="{$title}" type="text" maxlength="45" tabindex="1"  class="" id="req1">			 
								<span class="error-message">{$titleErr}</span>
							</div><div class="fix"></div>
						</div>
					
						<div class="rowElem noborder pb0">
							<label class="topLabel">Partner With </label>
							<div class="formBottom">
				 				<input type="text" name="partner" value="{if $partner}{$partner}{else}{$smarty.post.partner}{/if}" tabindex="4" class="validate[required]" id="req1"> 
							</div><div class="fix"></div>
						</div>
					
					  <div class="rowElem noborder pb0">
					  		<label class="topLabel">Venue<span class="mandatory"> *</span></label>
					  		<div class="formBottom"> 
					 			<textarea name="venue" tabindex="7" class="validate[required]" id="req1" cols="4" rows="4">{$venue}</textarea> 
				 				<span class="error-message">{$venueErr}</span>
							</div><div class="fix"></div>
					  </div>
					 
					 <div class="rowElem noborder pb0">
					 		<label class="topLabel">Others <span class="mandatory"> *</span></label>
					 		<div class="formBottom"> 
								<textarea name="others" tabindex="10" class="validate[required]" id="req1" cols="4" rows="4">{if $others}{$others}{else}{$smarty.post.others}{/if}</textarea> 
				 				<span class="error-message">{$otherErr}</span>
							</div><div class="fix"></div>
					 </div>
					
				</div>					
					   
			   <div class="floatleft threeOne">
                <div class="rowElem noborder pb0">
                	<label class="topLabel"> Date <span class="mandatory">*</span></label>
                	<div class="formBottom">
							<input name="job_fair_date" value="{$job_fair_date}" tabindex="2" type="text" maxlength="45"  class="datepic">			 
							<span class="error-message">{$jobfair_dateErr}</span>
					 	</div><div class="fix"></div>
					 </div>

					 <div class="rowElem noborder pb0">
						 <label class="topLabel">Partner Logo  </label>
					 	 <div class="formBottom">
							<input name="logo" type="file" tabindex="5" class="upload" id="logo">
							{if $partner_logo}
							<img src="timthumb.php?src=uploads/{$partner_logo}&w=200&q=100">
							{/if}
							<br>
							<span class="error-message">{$attachmentuploadErr}</span>
						 </div><div class="fix"></div>
					 </div>
					 
					 <div class="rowElem noborder pb0">
					  <label class="topLabel">Description <span class="mandatory">*</span> </label>
					  <div class="formBottom">
						<textarea name="description" tabindex="7" class="validate[required]" id="req1" cols="4" rows="4">{$description}</textarea>  <br>
						<span class="error-message">{$descriptionErr}</span>
					  </div><div class="fix"></div>
					</div>
					
					 <div class="rowElem noborder pb0">
					 <label class="topLabel">Status <span class="mandatory">*</span></label>
					 <div class="formBottom">
						<select style="width:300px" name="status"  class="validate[required]" tabindex="11" id="req1">
							<option value="">Choose any one</option>
							{html_options options=$type selected=$status}	
						</select> <br>
						<span class="error-message">{$statusErr}</span>
					 </div><div class="fix"></div>
					 </div>
                   
				</div>
					
				<div class="floatleft threeOne">
                <div class="rowElem noborder pb0"><label class="topLabel">Location <span class="mandatory"> * </span></label>
                <div class="formBottom">
							<input name="location" value="{$location}" type="text" tabindex="3" class="validate[required]" id="req1"> 
							<span class="error-message">{$locationErr}</span>
					 </div><div class="fix"></div>
					 </div>
					
					<div class="rowElem noborder pb0">
					<label class="topLabel">State <span class="mandatory"> * </span></label>
					<div class="formBottom">
						<select style="width:300px" name="state_id" class="validate[required]" id="req1" tabindex="6">
							<option value="">Choose any one</option>
							{html_options options=$state selected=$state_id}
						</select><br>
						<span class="error-message">{$stateErr}</span>
					</div><div class="fix"></div>
					</div>
					
						
					 <div class="rowElem noborder pb0">
					 <label class="topLabel">Eligibility Criteria<span class="mandatory"> *</span></label>
					 <div class="formBottom"> 
					  	<textarea name="eligibility" tabindex="9" class="validate[required]" id="req1" cols="4" rows="4">{$eligibility}</textarea> 
				 	  	<span class="error-message">{$eligibilityErr}</span>
 					 </div><div class="fix"></div>
					 </div>
				</div>
				 <div class="fix"></div>
         </div>
				
				<div class="widget first">
                    <div class="head"><h5 class="iList">Partner Contact Details</h5><div class="num"><span><span class="mandatory">*</span> fields are mandatory</span></div></div>
					 <div class="floatleft threeOne">
                   <div class="rowElem noborder pb0"><label class="topLabel">Contact Person</label>
                   <div class="formBottom">
					 		<input name="contact_person" value="{if $contact_person}{$contact_person}{else}{$smarty.post.contact_person}{/if}" type="text" tabindex="12" class="validate[required]" id="req1" maxlength="45"> 
 						 </div><div class="fix"></div>
 						 </div>
					 </div>
					 
					<div class="floatleft threeOne">
                  <div class="rowElem noborder pb0"><label class="topLabel">Email Address</label>
                  <div class="formBottom">
					 		<input name="contact_email" value="{if $contact_email}{$contact_email}{else}{$smarty.post.contact_email}{/if}" type="text" tabindex="13" class="validate[required]" id="req1"> 
							<span class="error-message">{$emailErr}</span>
						</div><div class="fix"></div></div>
					</div>
				
					 <div class="floatleft threeOne">
                   <div class="rowElem noborder pb0">
                   <label class="topLabel">Contact No.</label>
                   <div class="formBottom">
						 <input name="contact_no" value="{if $contact_no}{$contact_no}{else}{$smarty.post.contact_no}{/if}" type="text" tabindex="14" class="validate[required]" id="req1" maxlength="45">
						 <span class="error-message">{$cont_noErr}</span>
						 </div><div class="fix"></div></div>
					 </div>
				
					<div class="m10">
					<a href="jobfair.php"><input type="button" val="jobfair.php" class="jsRedirect greyishBtn submitForm" value="Cancel"></a>
						<input type="submit" class="greyishBtn submitForm" value="Submit">
                   <div class="fix"></div>
 					</div>
           </div>
           </fieldset>
		   <input type="hidden" name="data[Company][created_date]" value="2016-11-08 17:12:52" id="CompanyCreatedDate"><input type="hidden" name="data[Company][created_by]" value="5" id="CompanyCreatedBy">				
     </form>    
    </div>
  </div>			
</div>
{include file='include/footer.tpl'}