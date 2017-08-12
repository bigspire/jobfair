{* Purpose : To edit client req.
   Created : Nikitasa
   Date : 28-11-2016 *}	
   
   
{include file='include/header.tpl'}
{include file='include/menu.tpl'}

<!-- Content wrapper -->
<div class="wrapper">

 
<div id="container" class="content nNote">
    	<div class="title"><h5>Edit Client Req.</h5></div>
   	 
        <!-- Form begins -->
	<form action="edit_client_req.php?id={$getid}" method="post" name="company" id="formID" class="mainForm" enctype="multipart/form-data" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"></div> 
			<fieldset>
			<div class="breadCrumb module">
                    <ul>
                        <li class="firstB"><a href="">Dashboard</a> </li>
                        <li><a href="client_req.php">Client Req</a></li>                                           
                        <li>Edit Client Req</li>
                    </ul>					
	    </div>
	    
			<div class="widget first">
          <div class="head"><h5 class="iList">Client Requirement Info</h5><div class="num"><span><span class="mandatory">*</span> fields are mandatory</span></div></div>
				<div class="floatleft threeOne">
                    <div class="rowElem noborder pb0"><label class="topLabel">Company Name <span class="mandatory">*</span></label><div class="formBottom">
				<input name="company_name" value="{$company_name}" type="text" maxlength="45" tabindex="1" class="validate[required]" id="req1">			 
	<span class="error-message">{$company_nameErr}</span>
					
					</div><div class="fix"></div></div>
                    
					 <div class="rowElem noborder pb0"><label class="topLabel">Qualification <span class="mandatory">*</span></label><div class="formBottom">
				 <input type="text" name="qualification" value="{$qualification}" tabindex="4" class="validate[required]" id="req1"> 
				 	<span class="error-message">{$qualificationErr}</span>
				</div><div class="fix"></div></div>
					
				<div class="rowElem noborder pb0"><label class="topLabel">Email Address<span class="mandatory"> *</span></label><div class="formBottom"> 
				<input name="email_address" value="{$email_address}" type="text" maxlength="45" tabindex="7" class="validate[required]" id="req1">
					<span class="error-message">{$emailErr}</span>
				</div><div class="fix"></div>
				</div>
						<div class="rowElem noborder pb0"><label class="topLabel">Salary Details<span class="mandatory"> *</span></label><div class="formBottom"> 
				<input name="salary" value="{$salary}" type="text" maxlength="45" tabindex="10" class="validate[required]" id="req1">
					<span class="error-message">{$salaryErr}</span>
				</div><div class="fix"></div>
				</div>
				
				 <div class="rowElem noborder pb0">
						 <label class="topLabel">Company Logo  </label>
					 	 <div class="formBottom">
							<input name="client_logo" type="file" tabindex="5" class="upload" id="client_logo">
							{if $client_logo}
							<img src="timthumb.php?src=uploads/req_logo/{$client_logo}&w=200&q=100">
							{/if}
							<br>
							<span class="error-message">{$attachmentuploadErr}</span>
						 </div><div class="fix"></div>
					 </div>
					
					</div>					
					   <div class="floatleft threeOne">
                    <div class="rowElem noborder pb0"><label class="topLabel">Position<span class="mandatory">*</span> </label><div class="formBottom">
					
				  <input name="position" value="{$position}" type="text" maxlength="45" tabindex="2" class="validate[required]" id="req1"> <br>
						<span class="error-message">{$positionErr}</span>

					</div><div class="fix"></div></div>
                   
					
					 <div class="rowElem noborder pb0"><label class="topLabel">Work Location<span class="mandatory"> *</span></label><div class="formBottom"> 
					 
				 <input name="work_loc" value="{$work_loc}" type="text" maxlength="45" tabindex="5" class="validate[required]" id="req1">

				
				 	<span class="error-message">{$work_locErr}</span>

					</div><div class="fix"></div>
					</div>
					
					
				
					 <div class="rowElem noborder pb0"><label class="topLabel">No. of Vacancy <span class="mandatory"> * </span></label><div class="formBottom">
					
				 <input name="no_vacancy" value="{$no_vacancy}" type="text" tabindex="8" class="validate[required]" id="req1"> 
						<span class="error-message">{$no_vacancyErr}</span>

					</div><div class="fix"></div></div>
					
					<div class="rowElem noborder pb0"><label class="topLabel">Venue Details<span class="mandatory">*</span> </label><div class="formBottom">
					
				  <textarea name="venue" tabindex="11" class="validate[required]" id="req1" cols="11" rows="4">{$venue}</textarea> <br>
						<span class="error-message">{$venueErr}</span>

					</div><div class="fix"></div></div>
					
					
					
					 </div>
					
					<div class="floatleft threeOne">
                    <div class="rowElem noborder pb0"><label class="topLabel">Drive Date <span class="mandatory"> * </span></label><div class="formBottom">
					
				 <input name="job_drive_date" value="{$job_drive_date}" type="text" tabindex="3" class="datepic" id=""> 
						<span class="error-message">{$drive_dateErr}</span>

					</div><div class="fix"></div></div>
					 

 <div class="rowElem noborder pb0"><label class="topLabel">Contact No. <span class="mandatory"> *</span></label><div class="formBottom"> 
					 
				 <input name="contact_no" value="{$contact_no}" type="text" maxlength="45" tabindex="6" class="validate[required]" id="req1">
<span class="error-message">{$contact_noErr}</span>
</div><div class="fix"></div>
</div>

<div class="rowElem noborder pb0"><label class="topLabel">Status <span class="mandatory">*</span></label><div class="formBottom">
<select name="status" style="width:335px" tabindex="9">
					{if isset($status)}
							{html_options style="width:300px" options=$type selected=$status}			
					{/if}
					</select><br>
	<span class="error-message">{$statusErr}</span>
					
					</div><div class="fix"></div></div>
					
                 <div class="rowElem noborder pb0"><label class="topLabel">About Company <span class="mandatory"> * </span></label><div class="formBottom">
					
				 <textarea name="about_company" tabindex="12" class="validate[required]" id="req1" cols="4" rows="4">{$about_company}</textarea> 
						<span class="error-message">{$about_companyErr}</span>
					</div><div class="fix"></div></div> 
					 
                    </div>
					
                 
                    <div class="fix"></div>
                </div>
                
			<div class="widget first">
                    <div class="head"><h5 class="iList">Pop-up Details</h5><div class="num"><span><span class="mandatory">*</span> fields are mandatory</span></div></div>
					
                    <div class="floatleft threeOne">
                   
                    <div class="rowElem noborder pb0"><label class="topLabel">Start Date<span class="mandatory">*</span></label><div class="formBottom">
					 <input name="job_start_date" value="{$job_start_date}" type="text" tabindex="13" class="datepic" > 
				<span class="error-message">{$start_dateErr}</span>

				</div><div class="fix"></div></div>
				</div>
					
					   <div class="floatleft threeOne">
                   
                  	<div class="rowElem noborder pb0"><label class="topLabel">End Date<span class="mandatory"> *</span></label><div class="formBottom">
					 <input name="job_end_date" value="{$job_end_date}" type="text" tabindex="14" class="datepic"  maxlength="45"> 
				<span class="error-message">{$end_dateErr}</span>
 												
												
												</div><div class="fix"></div></div>
					 
					
				
					 
					 
                    </div>
					
						   <div class="floatleft threeOne">
                   
                  <br><br><br>
					 
					
                </div>
				
				 
				
					  <div class="m10">
				<a href="client_req.php"><input type="button" class="jsRedirect greyishBtn submitForm" val="client_req.php" value="Cancel"></a>
						<input type="submit" class="greyishBtn submitForm" value="Submit">
                        <div class="fix"></div>
 				</div>
           </div></fieldset>
		   	
<input type="hidden" name="data[Company][created_date]" value="2016-11-08 17:12:52" id="CompanyCreatedDate"><input type="hidden" name="data[Company][created_by]" value="5" id="CompanyCreatedBy">				
       </form>    </div>
</div>	
		
		
		</div>
{include file='include/footer.tpl'}