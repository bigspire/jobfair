{* Purpose : To edit jobfair logos.
   Created : Nikitasa
   Date : 22-11-2016 *}	
   
   
{include file='include/header.tpl'}
{include file='include/menu.tpl'}

<!-- Content wrapper -->
<div class="wrapper">
<div id="container" class="content nNote">
{if $EXIST_MSG}
   <div id="flashMessage" class="nNote nFailure hideit dismiss">{$EXIST_MSG}</div>
{/if}

    	<div class="title"><h5>Edit Job Fair Logo</h5></div>
   	 
        <!-- Form begins -->
	<form action="edit_jobfair_logos.php?id={$getid}" method="post" name="company" id="formID" class="mainForm" enctype="multipart/form-data" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"></div> 
		<fieldset>
		<div class="breadCrumb module">
                    <ul>
                        <li class="firstB"><a href="">Dashboard</a> </li>
                        <li><a href="jobfair_logos.php">Job Fair Logos</a></li>                                           
                        <li>Edit Job Fair Logo</li>
                    </ul>					
	    </div>
			<div class="widget first">
                    <div class="head"><h5 class="iList">Edit Job Fair Logo	
					

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
                    
						  <div class="rowElem noborder pb0"><label class="topLabel">Job URL </label><div class="formBottom">
							<input name="job_url" value="{if $job_url}{$job_url}{else}{$smarty.post.job_url}{/if}" type="text" tabindex="4" class="validate[required]" id="req1"> 
							</div><div class="fix"></div>
						  </div>
               </div>					
					
					<div class="floatleft threeOne">
					   
					 <div class="rowElem noborder pb0"><label class="topLabel">Company Name <span class="mandatory"> * </span></label><div class="formBottom">
							<input name="company_name" value="{$company_name}" type="text" tabindex="2" class="validate[required]" id="req1"> 
						<span class="error-message">{$company_nameErr}</span>
						</div><div class="fix"></div>
					 </div>
                    	
					<div class="rowElem noborder pb0"><label class="topLabel">Status <span class="mandatory">*</span></label><div class="formBottom">
						<select style="width:300px" name="status"  class="validate[required]" id="req1" tabindex="5">
							<option value="">Choose any one</option>
							{html_options options=$type selected=$status}	
						</select>  <br>
					<span class="error-message">{$statusErr}</span>
					</div><div class="fix"></div>
					</div>         
               
               </div>
					
					<div class="floatleft threeOne">
                <div class="rowElem noborder pb0"><label class="topLabel">Company Logo <span class="mandatory">*</span> </label><div class="formBottom">
					 <input name="log" value="{$smarty.session.log}" type="file" tabindex="3" class="validate[required]" id="logo">
					  <br>
						<span class="error-message">{if $log}<br><img src="timthumb.php?src=uploads/logo/{$logo}&w=200&q=100">
						{else}{$logoErr}{/if} {$attachmentuploadErr}</span>
					</div><div class="fix"></div></div>
					 </div>
					<br><br><br><br><br><br>
					
					<div class="m10">
				    <a href="jobfair_logos.php"><input type="button" class="jsRedirect greyishBtn submitForm" val="jobfair_logos.php" value="Cancel"></a>
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