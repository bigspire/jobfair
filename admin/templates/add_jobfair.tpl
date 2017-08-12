{* Purpose : To add jobfair.
   Created : Nikitasa
   Date : 17-11-2016 *}	
   
   
{include file='include/header.tpl'}
{include file='include/menu.tpl'}

<!-- Content wrapper -->
<div class="wrapper">
<div id="container" class="content nNote">
{if $EXIST_MSG}
   <div id="flashMessage" class="nNote nFailure hideit dismiss">{$EXIST_MSG}</div>
   {/if}
   <div class="title"><h5>Add Job Fair</h5>
   
   
   </div>
   
   <div class="breadCrumb module">
                    <ul>
                        <li class="firstB"><a href="">Dashboard</a> </li>
                        <li><a href="jobfair.php">Job Fair</a></li>                                           
                        <li>Add Job Fair</li>
                    </ul>					
	</div>
				
				<div class="fix"></div>
   <!-- Form begins -->
	<form action="add_jobfair.php" method="post" name="company" id="formID" class="mainForm" enctype="multipart/form-data" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"></div> 
		<fieldset>
			<div class="widget first m0">
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
				 				<input type="text" name="partner" value="{$smarty.post.partner}" tabindex="4" class="validate[required]" id="req1"> 
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
								<textarea name="other" tabindex="10" class="validate[required]" id="req1" cols="4" rows="4">{$other}</textarea> 
				 				<span class="error-message">{$otherErr}</span>
							</div><div class="fix"></div>
					 </div>
					
				</div>					
					   
			   <div class="floatleft threeOne">
                <div class="rowElem noborder pb0">
                	<label class="topLabel"> Date <span class="mandatory">*</span></label>
                	<div class="formBottom">
							<input name="jobfair_date" value="{$jobfair_date}" tabindex="2" type="text" maxlength="45"  class="datepic">			 
							<span class="error-message">{$jobfair_dateErr}</span>
					 	</div><div class="fix"></div>
					 </div>

					 <div class="rowElem noborder pb0">
						 <label class="topLabel">Partner Logo  </label>
					 	 <div class="formBottom">
							<input name="logo" type="file" tabindex="5" class="upload" id="logo"><br>
							<span class="error-message">{$attachmentuploadErr}</span>
						 </div><div class="fix"></div>
					 </div>
					 
					 <div class="rowElem noborder pb0">
					  <label class="topLabel">Description <span class="mandatory">*</span> </label>
					  <div class="formBottom">
						<textarea name="description" tabindex="8" class="validate[required]" id="req1" cols="4" rows="4">{$description}</textarea>  <br>
						<span class="error-message">{$descriptionErr}</span>
					  </div><div class="fix"></div>
					</div>
					
					 <div class="rowElem noborder pb0">
					 <label class="topLabel">Status <span class="mandatory">*</span></label>
					 <div class="formBottom">						
							<select name="status" style="width:300px" tabindex="11">
					{if isset($status)}
							{html_options style="width:300px" options=$type selected=$status}			
					{/if}
					</select> 	
						<br>
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
						<select style="width:300px" name="state" class="validate[required]" id="state" tabindex="6">
							<option value="">Choose any one</option>
							{html_options options=$state selected=$smarty.post.state}
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
					 		<input name="contact_person" value="{$smarty.post.contact_person}" type="text" tabindex="12" class="validate[required]" id="req1" maxlength="45"> 
 						 </div><div class="fix"></div>
 						 </div>
					 </div>
					 
					<div class="floatleft threeOne">
                  <div class="rowElem noborder pb0"><label class="topLabel">Email Address</label>
                  <div class="formBottom">
					 		<input name="email" value="{$smarty.post.email}" type="text" tabindex="13" class="validate[required]" id="req1"> 
							<span class="error-message">{$emailErr}</span>
						</div><div class="fix"></div></div>
					</div>
				
					 <div class="floatleft threeOne">
                   <div class="rowElem noborder pb0">
                   <label class="topLabel">Contact No.</label>
                   <div class="formBottom">
						 <input name="cont_no" value="{$smarty.post.cont_no}" type="text" tabindex="14" class="validate[required]" id="req1" maxlength="45">
						 <span class="error-message">{$cont_noErr}</span>
						 </div><div class="fix"></div></div>
					 </div>
				
					<div class="m10">
					<a href="jobfair.php"><input type="button" class="jsRedirect greyishBtn submitForm" val="jobfair.php" value="Cancel"></a>
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