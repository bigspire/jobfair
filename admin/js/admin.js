/* function used to toggle the div */
$(document).ready(function() {
    $('.dismiss').click(function() {
		$(".dismiss").slideToggle("slow");
	});	
	
	 /* to redirect */
	 $(".jsRedirect").each(function() {
		$(this).click(function() {
			location.href=jQuery(this).attr("val");
		});
	});
	
	$('#formID').submit(function(){ 
		// Disable the 'Next' button to prevent multiple clicks		
		$('input[type=submit]', this).attr('value', 'Processing...');
		$('input[type=submit]', this).attr('disabled', 'disabled');
		if($('#prog_width').val() == '1'){ 
			$('input[type=submit]', this).css('width', 'auto');
		}
	});
	
	/*$('.dd').mouseover(function () {
		$('ul.menu_body').Toggle(100);
	});
	*/
});

/* function to process the search form */
function submit_search(frm, module){
	location.href = frm.webroot.value+load_module_vars(module, frm);	
	return false;
}
/* function to load the module variables */
function load_module_vars(m, frm){
	switch(m){
		case 'user':
		search = (frm.search.value == 'eg: kumar, lakshmi') ? '' : frm.search.value;
		vars = '?search='+search+'&role_id='+frm.role_id.value+'&status='+frm.status.value;
		break;
		case 'job':
		search = (frm.search.value == 'eg: junior mechanic, electrician') ? '' : frm.search.value;
		vars = '?search='+search+'&industry_id='+frm.industry_id.value+'&department_id='+frm.department_id.value+'&status='+frm.status.value+'&date_from='+frm.date_from.value+'&date_to='+frm.date_to.value+'&company='+frm.company_id.value;
		break;
		case 'company':
		search = (frm.search.value == 'eg: infosys, tcs, wipro') ? '' : frm.search.value;
		vars = '?search='+search+'&status='+frm.status.value;
		break;
		case 'offline_test_result':
		search = (frm.search.value == 'eg: ram, ram@yahoo.com') ? '' : frm.search.value;
		vars = '?search='+search;
		break;
		case 'enquiry':
		search = (frm.search.value == 'eg: kumar, lakshmi') ? '' : frm.search.value;
		vars = '?search='+search+'&status='+frm.status.value;
		break;
		case 'contact':
		search = (frm.search.value == '') ? '' : frm.search.value;
		date_from = (frm.date_from.value == '') ? '' : frm.date_from.value;
		date_to = (frm.date_from.value == '') ? '' : frm.date_to.value;
		vars = '?search='+search+'&status='+frm.status.value+'&date_from='+date_from+'&date_to='+date_to;
		break;
		case 'applied':
		search = (frm.search.value == 'eg: junior mechanic, electrician') ? '' : frm.search.value;
		applied_from = (frm.applied_from.value == 'Applied From...') ? '' : frm.applied_from.value;
		applied_to = (frm.applied_to.value == 'Applied To...') ? '' : frm.applied_to.value;
		vars = '?search='+search+'&status='+frm.status.value+'&applied_from='+applied_from+'&applied_to='+applied_to;
		break;
		case 'search':		
		search = (frm.search.value == 'Enter search text...') ? '' : frm.search.value;
		city = (frm.location.value == 'Location') ? '' : frm.location.value;
		mobile = (frm.mobile.value == 'Mobile No...') ? '' : frm.mobile.value;
		state = (frm.state_id.value == '') ? 0 : frm.state_id.value;
		exp_salary = (frm.exp_salary.value == 'Expected Salary...') ? '' : frm.exp_salary.value;		
		specialization = (frm.specialization.value == '') ? 0 : frm.specialization.value;			
		vars = '?search='+search+'&qualification='+frm.qualification.value+'&specialization='+frm.specialization.value+'&min_exp='+frm.min_exp.value+'&max_exp='+frm.max_exp.value+'&min_age='+frm.min_age.value+'&max_age='+frm.max_age.value+'&location='+city+'&state_id='+state+'&year_passing_from='+frm.year_passing_fromYear.value+'&year_passing_to='+frm.year_passing_toYear.value+'&exp_salary='+exp_salary+'&mobile='+mobile+'&srch=1';
		validate_search(search,frm.qualification.value,frm.specialization.value,frm.min_exp.value,frm.max_exp.value,frm.min_age.value,frm.max_age.value,city,state,frm.year_passing_fromYear.value,frm.year_passing_toYear.value,exp_salary,mobile);		
		break;
		case 'jobseeker': 
		search = (frm.search.value == 'eg: kumar, lakshmi') ? '' : frm.search.value;
		date_from = (frm.date_from.value == 'Date From...') ? '' : frm.date_from.value;
		status = (frm.status.value == '') ? '' : frm.status.value;
		date_to = (frm.date_to.value == 'Date To...') ? '' : frm.date_to.value;		
		city = (frm.city.value == 'city') ? '' : frm.city.value;
		state = (frm.state_id.value == 'state') ? '' : frm.state_id.value;
		photo = (frm.photo_verify.value == 'state') ? '' : frm.photo_verify.value;
		user = (frm.user_verify.value == 'state') ? '' : frm.user_verify.value;
		vars = '?search='+search+'&date_from='+date_from+'&date_to='+date_to+'&city='+city+'&state_id='+state+'&photo_verify='+photo+'&user_verify='+user+'&status='+status;
		break;
		case 'online_test':
		search = (frm.search.value == 'type here...') ? '' : frm.search.value;
		vars = '?search='+search+'&status='+frm.status.value;
		break;
		case 'testimonials':
		search = (frm.search.value == 'type here...') ? '' : frm.search.value;
		vars = '?search='+search+'&status='+frm.status.value;
		break;	
		case 'refer_friends':
		search = (frm.search.value == 'type here...') ? '' : frm.search.value;
		vars = '?search='+search+'&status='+frm.status.value;
		break;	
		case 'emp_news':
		search = (frm.search.value == 'type here...') ? '' : frm.search.value;
		inbox = (frm.inbox_type.value == '') ? '' : frm.inbox_type.value;
		vars = '?search='+search+'&status='+frm.status.value+'&type='+inbox;
		break;
		case 'transactions':
		search = (frm.search.value == 'type here...') ? '' : frm.search.value;
		tran = (frm.tran_type.value == '') ? '' : frm.tran_type.value;
		vars = '?search='+search+'&status='+frm.status.value+'&user_type='+tran;	
		break;
		case 'latest_news':
		search = (frm.search.value == 'type here...') ? '' : frm.search.value;
		vars = '?search='+search+'&status='+frm.status.value+'&language='+frm.language.value;
		break;
		case 'report':			
		date_from = (frm.date_from.value == 'Date From...') ? '' : frm.date_from.value;
		date_to = (frm.date_to.value == 'Date To...') ? '' : frm.date_to.value;			
		vars = '?date_from='+date_from+'&date_to='+date_to;
		break;
		case 'reportLoc':
		drop1 = (frm.dropdown1.value == '') ? '' : frm.dropdown1.value;	
		date_from = (frm.date_from.value == 'Date From...') ? '' : frm.date_from.value;
		date_to = (frm.date_to.value == 'Date To...') ? '' : frm.date_to.value;			
		vars = drop1+'?date_from='+date_from+'&date_to='+date_to;
		break;				
		case 'reportQual':
		drop1 = (frm.dropdown1.value == '') ? '' : frm.dropdown1.value;
		drop2 = (frm.dropdown2.value == '') ? '' : '/'+frm.dropdown2.value;
		date_from = (frm.date_from.value == 'Date From...') ? '' : frm.date_from.value;
		date_to = (frm.date_to.value == 'Date To...') ? '' : frm.date_to.value;			
		vars = drop1+drop2+'?date_from='+date_from+'&date_to='+date_to;
		break;
		case 'jobfair':		
		search = (frm.search.value == '') ? '' : frm.search.value;
		status = (frm.status.value == '') ? '' : frm.status.value;	
		date_from = (frm.date_from.value == '') ? '' : frm.date_from.value;
		date_to = (frm.date_to.value == '') ? '' : frm.date_to.value;			
		vars = '?status='+frm.status.value+'&search='+search+'&date_from='+date_from+'&date_to='+date_to;
		break;
	}
	return vars;
}

/* function to validate the search */
function validate_search(search,qualification,specialization,min_exp,max_exp,min_age,max_age,city,state_id,year_passing_from,year_passing_to,exp_salary,mobile){
	if(search == '' && qualification == '' && specialization == '' && min_exp == '' && max_exp == '' && min_age == '' && max_age == '' && city == '' && state_id == '' && year_passing_from == '' && year_passing_to == '' && exp_salary == '' && mobile == ''){
		document.getElementById('srch_error').style.display = 'block';
		return false;	
	}else{
		document.getElementById('srch_error').style.display = 'none';
		return true;
	}	
}
/* function to show the alert message for single record delete */
 $(document).ready(function() {    
	$(".bConfirm2").click( function() {
		id = this.id;	
		jConfirm('Are you sure you want to delete?', 'Confirmation!', function(r) {
			if(r){	
				webroot = $("#web_root").attr('value');
				document.searchFrm.action = webroot+'?id='+id;
				document.searchFrm.submit();				
			}
		});
	});
});

/* function to show the alert message for single record delete */
 $(document).ready(function() {    
	$(".bConfirm").click( function() {
		id = this.id;	
		jConfirm('Are you sure you want to delete?', 'Confirmation!', function(r) {
			if(r){	
				document.searchFrm.action = webroot+'delete/'+id;
				document.searchFrm.submit();				
			}
		});
	});
});

/* function to show the alert message for photos remove */
 $(document).ready(function(){
	$(".bConfirmPhotos").click( function(){
		var id = $(this).attr('id');
		if(confirm("Are you sure you want to remove?")){
			removePic = $("#remove").attr('value');
			location.href = removePic+'?get_jobfair_id='+id;
		}
	});
});

$(document).ready(function(){
	$(".bConfirmPhotos1").click( function(){
		var id = $(this).attr('id');
		if(confirm("Are you sure you want to remove?")){
			removePic = $("#remove").attr('value');
			location.href = removePic+'?get_client_id='+id;
		}
	});
});

/* function to show the alert message for record status updation */
 $(document).ready(function() {    
	$(".sConfirm").click( function() {
		id = this.id;		
		split_id = id.split('_');
		status_msg = (split_id[2] == 1) ? 'inactive the record?' : 'activate the record?';
		status_val = (split_id[2] == 1) ? 0 : 1;
		jConfirm('Are you sure you want to '+status_msg, 'Confirmation!', function(r) {
			if(r){	
				document.searchFrm.action = webroot+'change_status/'+split_id[1]+'/'+status_val;
				document.searchFrm.submit();				
			}
		});
	});
});

/* function to show the alert message for verify/unverify the users and photo */
 $(document).ready(function() {    
	$(".sVerify").click( function() {
		id = this.id;		
		split_id = id.split('_');	
		var status_val;
		 // check whether its user update or photo verify
		if(split_id[0] == 'U'){
			status_msg = (split_id[3] == 'W' ? 'Please take one action [Press Esc to Close]' : (split_id[3] == 'Y' ?  'Are you sure you want to unverify?' : 'Are you sure you want to verify'));
			action = 'verify_user/';
			$.alerts.okButton = (split_id[3] == 'W') ? '&nbsp;Approve&nbsp;' :  '&nbsp;Yes&nbsp;';
			$.alerts.cancelButton = (split_id[3] == 'W') ? '&nbsp;Reject&nbsp;' :  '&nbsp;No&nbsp;';			
		}else if(split_id[0] == 'P'){
			status_msg = (split_id[3] == '2' ? 'Please take one action [Press Esc to Close]' : (split_id[3] == '1' ?  'Are you sure you want to unverify?' : 'Are you sure you want to verify'));
			$.alerts.okButton = (split_id[3] == '2') ? '&nbsp;Approve&nbsp;' :  '&nbsp;Yes&nbsp;';
			$.alerts.cancelButton = (split_id[3] == '2') ? '&nbsp;Reject&nbsp;' :  '&nbsp;No&nbsp;';
			action = 'verify_photo/';
		}else if(split_id[0] == 'C'){
			status_msg = (split_id[3] == '2' ? 'Please take one action [Press Esc to Close]' : (split_id[3] == '1' ?  'Are you sure you want to unverify?' : 'Are you sure you want to verify'));
			$.alerts.okButton = (split_id[3] == '2') ? '&nbsp;Approve&nbsp;' :  '&nbsp;Yes&nbsp;';
			$.alerts.cancelButton = (split_id[3] == '2') ? '&nbsp;Reject&nbsp;' :  '&nbsp;No&nbsp;';
			action = 'change_status/';
		}else if(split_id[0] == 'S'){
			status_msg = (split_id[3] == 'W' ? 'Please take one action [Press Esc to Close]' : (split_id[3] == 'A' ?  'Are you sure you want to unverify?' : 'Are you sure you want to verify'));
			$.alerts.okButton = (split_id[3] == 'W') ? '&nbsp;Approve&nbsp;' :  '&nbsp;Yes&nbsp;';
			$.alerts.cancelButton = (split_id[3] == 'W') ? '&nbsp;Reject&nbsp;' :  '&nbsp;No&nbsp;';
			action = 'approve_request/';
			webroot = $('#webroot2').val();	
			params = '/'+split_id[5]+'/'+split_id[6];	
		}
	
		var params = '';
		
		jConfirm(status_msg, 'Confirmation!', function(r) {
			if(r){
				if (action == 'verify_user/'){ 
					status_val = (split_id[3] == 'W') ? 'Y' : split_id[3];					
				}else if (action == 'verify_photo/'){ 
					status_val = (split_id[3] == '2') ? '1' : split_id[3];					
				}else if (action == 'change_status/'){ 
					status_val = (split_id[3] == '2') ? '1' : split_id[3];					
				}else if (action == 'approve_request/'){ 
					status_val = (split_id[3] == 'W') ? 'A' : split_id[3];					
				}
				
			
			}else{				
				// process only when reject button is pressed. Donot process the form for 'No' pressed
				if(status_msg == 'Please take one action [Press Esc to Close]'){
					if (action == 'verify_user/'){ 
						status_val = 'N';					
					}else if (action == 'verify_photo/'){ 
						status_val = 0;					
					}else if (action == 'change_status/'){ 
						status_val = 0;	
					}else if (action == 'approve_request/'){ 
						status_val = 'R';
								
					}
						
				}
				
				
			}
			if(status_val != undefined){
				document.searchFrm.action = webroot+action+split_id[2]+'/'+status_val+'/'+split_id[4]+params;
				
				document.searchFrm.submit();
			}
		});
	});
});

/* function to show the alert message for multiple record delete */
 $(document).ready(function() {  
	chk_status = false;
	var record_delete = '';
	webroot = $("#webroot").attr('value');
	$(".bConfirmAll").click( function() {		
		$("input[name='chk[]']").each(function() {
			if(this.checked == true){
				record_delete += this.value+'-';
				chk_status = true;				
			}			
		});
		// if no checkboxes are selected
		if(chk_status == false){
			jAlert('Please choose a record to delete', 'Alert!', function(r) {});
		}else{
			jConfirm('Are you sure you want to delete?', 'Confirmation!', function(r) {
				// when ok button clicked
				if(r){				
					record_list = record_delete.slice(0, (record_delete.length - 1)); 
					document.searchFrm.action = webroot+'delete/'+record_list;
					document.searchFrm.submit();
				}
			});					
		}
	});
});



/* function to edit the selected check boxes in list page */ 
$(document).ready(function() {  
	chk_status = false;
	var record_edit = '';
	webroot = $("#webroot").attr('value');
	edit_action = $("#edit_action").attr('value');	
	$(".bEditAll").click( function() {		
		$("input[name='chk[]']").each(function() {
			if(this.checked == true){
				record_edit = this.value;
				chk_status = true;					
			}				
		});
			// when the record selected
			if(chk_status == true){
				location.href = webroot+edit_action+record_edit;
			}else{
				jAlert('Please choose a record to edit', 'Alert!', function(r) {});
			}
		
	});
	
});

/* function to select/deselect check boxes in list page */ 
$(document).ready(function() {  
	// when the user clicks on the check box	
	$("#chkMul").click( function() {
		hdn_status = $("#chk_status").attr('value');
		hdn_status == 0 ? $("#chk_status").val(1) : $("#chk_status").val(0);
		$("input[name='chk[]']").each(function() {
			this.checked = hdn_status  == 0 ? true : false
		});
	});
})


$(document).ready(function() { 
	
	if(jQuery('#searchNC').length > 0){ 
		$('#searchNC').ready(function () {
			page = $("#page").attr('value'); 
			jQuery('#searchNC').autocomplete('autocomplete_search.php?page='+page, {
				width: 180,
				selectFirst: false,
				// dataType: "json",				
			});	
		});
	}
	
	/*
	  // for auto complete	search
	 if($('#search').length > 0){
		$( "#search")
		  .bind( "keydown", function( event ){ 
			// for asset type search			
			if ( event.keyCode === $.ui.keyCode.TAB &&
				$( this ).autocomplete( "instance" ).menu.active ){
				event.preventDefault();
			}
		  })
		  .autocomplete({
			source: function( request, response ) { 
			  $.getJSON( "autocomplete_search.php", {
				term: extractLast( request.term ),page:$('#page').val(),
			  }, response );
			},
			search: function() {
			  // custom minLength
			  var term = extractLast( this.value );
			  if ( term.length < 2 ) {
				return false;
			  }
			},
			focus: function() {
			  // prevent value inserted on focus
			  return false;
			},
			select: function( event, ui ){
				if(ui.item.value != 'No Results!'){
				  var terms = split( this.value );
				  // remove the current input
				  terms.pop();
				  // add the selected item
				  terms.push( ui.item.value );
				  // add placeholder to get the comma-and-space at the end
				  terms.push( "" );
				  this.value = terms.join( ", " );
				  return false;
			  }else{
				return false;
			  }			  
			}
		});
	}*/
});


// search companies
$(document).ready(function() { 
	if(jQuery('#company_id').length > 0){ 
		$('#company_id').ready(function () {
			webroot = $("#webroot").attr('value'); 
			jQuery('#company_id').autocomplete(webroot+'list_company/', {
				width: 180,
				selectFirst: false
			});	
		});	
	}
});


// search jobseekers email
$(document).ready(function() { 
	if(jQuery('#jobseeker_email').length > 0){ 
		$('#jobseeker_email').ready(function () {
			webroot = $("#webroot").attr('value'); 
			jQuery('#jobseeker_email').autocomplete(webroot+'search_auto_offline_test/', {
				width: 268,
				selectFirst: false, 
				onItemSelect:get_name					
			});	
		});	
	}
});



// when the search link is clicked in the add/edit offline test results
 jQuery(document).ready(function() {
	jQuery("#adv_search").click(function(){ 
			var url = jQuery("#webroot_pass").val();
			//alert(url);
			overlay_box(url,830,500);
			return false;
	});
}); 


 function get_name(li) { 
	findUserDetails(li);	
}

function findUserDetails(li) {
	if( li == null ) return alert("No match!");
	// if coming from an AJAX call, let's use the CityId as the value
	if( !!li.extra ) var sValue = li.extra[0];
	// otherwise, let's just display the value in the text box
	else var sValue = li.selectValue;
	split_sValue = sValue.split(',');
	$("#jobseeker_email").val(split_sValue[1]);
	$("#full_name").val(split_sValue[0]);
	$("#dob").val(split_sValue[2]);
}  

/* function to get the candidate details */
function get_candidate_detail(){
	split_value = document.getElementById("candidate_id").value.split("|");
	parent.document.getElementById("jobseeker_email").value = split_value[0];
	parent.document.getElementById("full_name").value = split_value[1];
	parent.document.getElementById("dob").value = split_value[2];
}

// to unset all the fields under Aptitude test
function unset_app(){
	if(document.getElementById("test_app").checked == true){
		for(i=1;i<=5;i++){
			document.getElementById("ap_"+i).value = '';
		}
		document.getElementById("test1").style.display = 'none';
	}else{
		document.getElementById("test1").style.display = '';
	}
}

// to unset all the fields under PDT test
function unset_pdt(){
	if(document.getElementById("test_pdt").checked == true){
		for(i=1;i<=5;i++){
			document.getElementById("pdt_"+i).value = '';
		}
		document.getElementById("test2").style.display = 'none';
	}else{
		document.getElementById("test2").style.display = '';
	}
}

// to unset all the fields under NMT test
function unset_nmt(){
	if(document.getElementById("test_nmt").checked == true){
		for(i=1;i<=4;i++){
			document.getElementById("nmt_"+i).value = '';
		}
		document.getElementById("test3").style.display = 'none';
	}else{
		document.getElementById("test3").style.display = '';
	}
}

// to unset all the fields under PET test
function unset_pet(){
	if(document.getElementById("test_pet").checked == true){
		document.getElementById("pet_time").value = '';
		document.getElementById("test4").style.display = 'none';
	}else{
		document.getElementById("test4").style.display = '';
	}
}

// to unset all the fields under GTE test
function unset_gte(){
	if(document.getElementById("test_gte").checked == true){
		document.getElementById("gte_avg").value = '';
		document.getElementById("test5").style.display = 'none';
	}else{
		document.getElementById("test5").style.display = '';
	}
}

/* function to overlay all the light box features */
function overlay_box(url, w, h, show_close,refresh){ 
	jQuery(document).ready(function() {
			jQuery.fancybox({                
				'autoScale': true,
				'href':url,
				'hideOnOverlayClick': true,
				'padding': 0,			
				'type': 'iframe',
				'showCloseButton': show_close,
				'centerOnScroll': true,
				'width' :w,
				'height': h,
				'onClosed': function() {
					if(refresh){
						parent.location.reload(true); 
					}
				}
			});		
	});
}
// when the change password link is clicked
jQuery(document).ready(function() {
	jQuery("#change_password").click(function(){ 
			var url = jQuery("#webroot_pass").val();
			overlay_box(url,500,350);
			return false;
	});
});

jQuery(document).ready(function() {
	jQuery(".set_reminder").click(function(){ 
			var url = $(this).attr('val');
			overlay_box(url,600,550);
			return false;
	});
	$(function(){
		$( ".datepic" ).datepicker({
			changeMonth: true,
			changeYear: true,
			dateFormat: "dd/mm/yy"
		});
	});

});


/*
// when the call for interview is clicked
jQuery(document).ready(function() {
	jQuery(".call").click(function(){ 
			var url = jQuery("#webroot_pass").val();
			overlay_box(url,680,510);
			return false;
	});
});
 */

// used to open call for interview dialog box
jQuery(document).ready(function() {
	jQuery(".call").click(function(){ 
		id = this.id;
		split_id = id.split(',');		
		var url = jQuery("#webroot_pass").val()+''+split_id[2]+'/'+split_id[0]+'/'+split_id[1]+'/'+split_id[3];		
		overlay_box(url,680,510);
		return false;
	});
	
	jQuery(".update_payment").click(function(){ 
		url = this.href;	
		overlay_box(url,680,510, 1, 1);
		return false;
	});	
	
	// function for the overlay in all pages
	jQuery(".update_overlay").click(function(){ 
		url = this.href;
		dim = this.rel;
		dimen = dim.split('-');
		overlay_box(url,parseInt(dimen[0]),parseInt(dimen[1]), 1, 1);		
		return false;
	});
});

/* function to show the alert message for multiple call interview */
$(document).ready(function() {  
	chk_status = false;
	var call_id = '';
	web_root = $("#url").attr('value');
$(".multiple_call").click( function() {	
		$("input[name='chk[]']").each(function() {
			if(this.checked == true){
				call_id += this.value+'-';
				chk_status = true;				
			}			
		});
		// if no checkboxes are selected
		if(chk_status == false){
			jAlert('Please choose a record to call for interview', 'Alert!', function(r) {});
		}else{
			record_list = call_id.slice(0, (call_id.length - 1)); 
			var url = web_root+'/'+record_list+'/';
			overlay_box(url,680,510);
			return false;
			//document.searchFrm.submit();
		}
});
});

// actions performed once the interview call status updated
function open_edit(id,action){
	if(document.getElementById("edit"+id).style.display == 'none'){
		document.getElementById("update"+id).style.display = 'none';
		document.getElementById("edit"+id).style.display = '';
	}else{
		document.getElementById("update"+id).style.display = '';
		document.getElementById("edit"+id).style.display = 'none';
	}
	if(action == 'cancel'){
		document.getElementById('err_status'+id).style.display ='';
		document.getElementById('err_remarks'+id).style.display ='';
	}else{
		document.getElementById('err_status'+id).style.display ='none';
		document.getElementById('err_remarks'+id).style.display ='none';
	}
}

// validate the update interview call status
function validate_interview(id){
	var ret = true;
	var field_id = new Array('status','remarks');
	var err_id = new Array('err_status','err_remarks');
	for(i=0;i< field_id.length;i++){
		if(document.getElementById(field_id[i]+id).value == ''){
			document.getElementById(err_id[i]+id).style.display ='';
			ret = false;
		}else{
			document.getElementById(err_id[i]+id).style.display ='none';
		}
	}
	return ret;
}

/*Note: The following function is used to close the fancy box*/
function close_fancy(){
	window.top.window.jQuery.fancybox.close();
}
/* hide history tab by default */
jQuery(document).ready(function() {
	jQuery("#rec_history").hide();
		// when click on the record history, show it.
		$("#history").click( function() {
			jQuery("#rec_history").toggle();
		});
		
	// when the theme updated
	$(".change_theme").click( function() {
		url_var = this.id;
		url_var = url_var.split('_');		
		submit_form(document.profileFrm, 'profile/?theme_id='+url_var[0]+'&theme_css='+url_var[1]);
			
	});
});	

// to find the average in the offline test results
function find_average(value,test,id) {
	if(value != ''){
		if(isNaN(value)){
			document.getElementById(id).value = '';
			alert('Please enter only digits');
		}else{
			if(test == 'PDT'){
				ids = new Array('pdt_1', 'pdt_3');
			}else{
				ids = new Array('ap_1', 'ap_2', 'ap_3', 'ap_4');
			}
			sum = 0;
			len = ids.length;
			//alert(len);
			for(i = 0; i < len; i++){
				if(document.getElementById(ids[i]).value == ''){
					sum += 0;
				}else{
					sum += parseInt(document.getElementById(ids[i]).value);
				}
				average = sum/len;
			}
			if(test == 'PDT'){
				document.getElementById("pdt_5").value = average;
			}else{
				document.getElementById("ap_5").value = sum;
			}
		}
	}
}

// to find whether the value is a number or not
function is_number(value,id){
	if(value != ''){
		if(isNaN(value)){
			document.getElementById(id).value = '';
			alert('Please enter only digits');
		}
	}
}



 $(function() {
        $("#addAll").click(function() {
            var add = 0;
            $(".amt").each(function() {
            add += Number($(this).val());
        });
        $("#para").text("Sum of all textboxes is : " + add);
     });
});


/* function used to submit the form */
function submit_form(frm, url){	
	var webroot = jQuery("#webroot").val();
	frm = eval(frm);
	frm.action = webroot+url;
	frm.submit();	
}

/* function to validate the add form of jobseeker */	
function jobseeker_validate() {
    //this is used to  validate  Login Info,Present Address,Permanent Address,Qualification (School)
    var ret = true;
     //Note: assign field name
    field_name = new Array('email','password-c_password','full_name', 'p_name', 'date_birth', 'street_no', 'street_name', 'area', 'city', 'state', 'district', 'pin', 'p_street_no', 'p_street_name', 'p_area', 'p_city', 'p_state', 'p_district', 'p_pin', 'mobile_no', 'language', 'mother_tongue', 'school_name', 'year_passing', 'school_type', 'mark_perc', 'school_std');
     //Note: assign field type
    field_type = new Array("email", "password", "required", "required", "required", "required", "required", "required", "required", "dropdown", "dropdown", "required", "required", "required", "required", "required", "dropdown", "dropdown", "required", "required", "required", "dropdown",  "required", "dropdown", "dropdown", "required", "dropdown");
     //Note: assign field basic message
    field_msg = new Array("Please enter the email address","Please enter the password-Please enter the confirm password"," Please  enter the full name", "Please  enter the parent/spouse name", "Please enter your date of birth", "Street no?", "Please  enter street name", "Please  enter area", "Please  enter city", "Please select state", "Please select district", "Please enter pin no", "Please  enter the street no", "Please  enter street name", "Please  enter area", "Please  enter city", "Please select state", "Please select district", "Please enter pin no", "Please enter your mobile number", "Please select your language proficiency", "Please select your Mother Tongue",  "Please enter the School Name", "Please enter the year of passing", "Please enter the School Type", "Please enter your % of marks", "Please enter your Standard");
      //Note: assign field basic error message
     field_error_msg = new Array("Please enter the email address", "Please enter the password-Please enter the confirm password", " Please  enter the full name", "Please  enter the parent/spouse name", "Please enter your date of birth", "Enter street no.", "Please  enter street name", "Please  enter area", "Please  enter city", "Please select state", "Select district", "Please enter pin no", "Enter street no.", "Please  enter street name", "Please  enter area", "Please  enter city", "Please select state", "Select district", "Please enter pin no", "Please enter your mobile number", "Please select your language proficiency", "Please select your mother tongue",  "Please enter the School Name", "Please enter the year of passing", "Please enter the School Type", "Please enter your % of marks", "Please enter your Standard");
     //Note: assign field advance error message
     field_adv_error_msg = new Array("Please enter the valid email address", "Please enter the password-Please enter the confirm password", " Please  enter the full name", "Please enter the parent/spouse name", "Please enter your date of birth", "Enter street no.", "Please  enter street name", "Please  enter area", "Please  enter city", "Please select state", "Select district", "Please enter pin no", "Please  enter the street no", "Please  enter street name", "Please enter area", "Please  enter city", "Please select state", "Select district", "Please enter pin no", "Please enter your mobile number", "Please select your language proficiency", "Please select your Mother Tongue",  "Please enter the School Name", "Please enter the year of passing", "Please enter the School Type", "Please enter your % of marks", "Please enter your Standard");
      
	 //Note: assign field advance error message
           
	control_count = (document.getElementById("user_final_count") != undefined && document.getElementById("user_final_count") != null) ? document.getElementById("user_final_count").value:0;
     
    var n_val = item_validation(field_name, field_type, control_count, '', field_msg, field_error_msg, field_adv_error_msg);
	
    //var graduate = jQuery('input:radio[name=graduate]:checked').val();
    //var freshers = jQuery('input:radio[name=freshers]:checked').val();
	
	var graduate = jQuery('input:radio[id=Graduate1]:checked').val(); 	

		//this is used to  validate for Are you a Graduate under Qualification (College
     if (graduate == "1") {
                //Note: assign field name
        field_names = new Array('cource', 'institute', 'university', 'year_of_passing', 'specialization', 'per_of_marks', 'course_type');
                //Note: assign field type
        field_types = new Array("dropdown", "required", "dropdown", "dropdown", "dropdown", "required", "dropdown");
                //Note: assign field basic message
        field_msgs = new Array("Please enter the course details", "Please enter the Institute", "Please enter the university", "Please enter the year of passing", "Please enter the specialization", "Please enter your % of marks", "Please enter the course type");
                //Note: assign field basic error message
        field_error_msgs = new Array("Please enter the course details", "Please enter the Institute", "Please enter the university", "Please enter the year of passing", "Please enter the specialization", "Please enter your % of marks", "Please enter the course type");
                //Note: assign field advance error message
         field_adv_error_msgs = new Array("Please enter the course details", "Please enter the Institute", "Please enter the university", "Please enter the year of passing", "Please enter the specialization", "Please enter your % of marks", "Please enter the course type");
                //Note: assign field advance error message

        control_counts = (document.getElementById("user_final_count") != undefined && document.getElementById("user_final_count") != null) ? document.getElementById("user_final_count").value : 0;

        focus_sets = new Array('cource', 'institute', 'university', 'year_of_passing', 'specialization', 'per_of_marks', 'course_type');

        var graduate_val = dynamic_jquery_graduate_validation(field_names, field_types, control_counts, focus_sets, field_msgs, field_error_msgs, field_adv_error_msgs);
        }
        else {
            field_names = new Array('cource', 'institute', 'university', 'year_of_passing', 'specialization', 'per_of_marks', 'course_type');
            remove_class(field_names);
            ret =true;
        }

		var freshers = jQuery('input:radio[id=Fresher0]:checked').val(); 

       if (freshers == 0) {            
                //this is used to  validate for Are you a Fresher under Work Experience
                //Note: assign field name
                field_name = new Array('year_exp', 'month_exp', 'job_location', 'work_response', 'cur_salary', 'position', 'resume', 'company_name', 'job_type');
                //Note: assign field type
                field_type = new Array("dropdown", "dropdown", "required", "required", "required", "required", "image_file", "required", "dropdown");
                //Note: assign field basic message
                field_msg = new Array("Please enter year Experience", "Please enter month Experience", "Please enter your job location", "Please enter the Nature of Work/Responsibility", "Please enter your current salary", "Please enter the Position Last Held", "Please upload your resume", "Please enter the company name", "Please enter the job type");
                //Note: assign field basic error message
                field_error_msg = new Array("Please enter year Experience", "Please enter month Experience", "Please enter your job location", "Please enter the Nature of Work/Responsibility", "Please enter your current salary", "Please enter the Position Last Held", "Please upload your resume", "Please enter the company name", "Please enter the job type");
                //Note: assign field advance error message
                field_adv_error_msg = new Array("Please enter year Experience", "Please enter month Experience", "Please enter your job location", "Please enter the Nature of Work/Responsibility", "Please enter your current salary", "Please enter the Position Last Held", "Please upload your resume", "Please enter the company name", "Please enter the job type");
                //Note: assign field advance error message
                control_count = (document.getElementById("user_final_counts") != undefined && document.getElementById("user_final_counts") != null) ? document.getElementById("user_final_counts").value : 0;
                focus_set = new Array('year_exp', 'month_exp', 'job_location', 'work_response', 'cur_salary', 'position', 'resume', 'company_name', 'job_typ');
			

                var fresher_val = dynamic_jquery_experience_validation(field_name, field_type, control_count, focus_set, field_msg, field_error_msg, field_adv_error_msg);
            }
        else{
             field_names = new Array('year_exp', 'month_exp', 'job_location', 'work_response', 'cur_salary', 'position', 'resume', 'company_name', 'job_type');
             remove_class(field_names);
             ret = true;
		}
          

        if (n_val != true || (graduate_val != true && graduate == 1) || (fresher_val != true && freshers == 0)) {
            ret = false;
            jQuery("#flashMessage").show();
        }
        else {
            jQuery("#flashMessage").hide();
        }
		
        return  ret;       
}	

/* function to add multiple work experience and graduation */

jQuery(document).ready(function() {	
		if(document.getElementById("user_final_count") != undefined){
            var sheepItForm = {};			
			document.getElementById("user_final_count").value == 0;			
            sheepItForm = jQuery('#sheepItForm').sheepIt({
                separator: '',
                allowRemoveLast: false,
                allowRemoveCurrent: true,
                allowRemoveAll: false,
                allowAdd: true,
                allowAddN: false,
                removeCurrentConfirmation: false,
                maxFormsCount: 50,
                minFormsCount: 1,
                indexFormat: '_inc_count',
                removeCurrentConfirmationMsg: 'Do you want to remove?',
                iniFormsCount: 1,
                afterAdd: function(source, newForm) {

                    document.getElementById("user_final_count").value++;
                }
            });
        jQuery("#sheepItForm").hide();
		}	
});
/* for mutiple fresher option (dynamically) text box and image browse button */
jQuery(document).ready(function() {
	jQuery('#page_name').ready(function() {
		if(document.getElementById("user_final_counts") != undefined){
			var sheepItForm = {};
            document.getElementById("user_final_counts").value == 0;
            sheepItForm = jQuery('#sheepItForms').sheepIt({
            separator: '',
                allowRemoveLast: false,
                allowRemoveCurrent: true,
                allowRemoveAll: false,
                allowAdd: true,
                allowAddN: false,
                removeCurrentConfirmation: false,
                maxFormsCount: 50,
                minFormsCount: 1,
                indexFormat: '_inc_counts',
                removeCurrentConfirmationMsg: 'Do you want to remove?',
                iniFormsCount: 1,
                afterAdd: function(source, newForm) {
                    document.getElementById("user_final_counts").value++;
                }
            });
           jQuery("#sheepItForms").hide();
		}
	});
});

        function select_graduate(){			
            var val1 = jQuery('input:radio[id=Graduate1]:checked').val(); 	
			var val2 = jQuery('input:radio[id=Graduate0]:checked').val()
		
            if (val1 == "1"){
                jQuery("#sheepItForm").show();            
            }
            else if (val2 == "0") {
				jQuery("#sheepItForm").hide();          
            }
        }

        function select_fresher() {
			var val1 = jQuery('input:radio[id=Fresher1]:checked').val();
			var val2 = jQuery('input:radio[id=Fresher0]:checked').val();
            if (val1 == "1") {
                jQuery("#sheepItForms").hide();    
				jQuery(".erro-message neg").text("");   
            }
            else if (val2 == "0") {
				jQuery("#sheepItForms").show();   

            }
        }

        jQuery(".modulecheck").click(function() {
            var val = jQuery("#"+this.id).is(':checked');  
            if (val == true) {
                jQuery("#" + this.value).show();
            }
            if (val == false) {
                jQuery("#" + this.value).hide();
            }
        });

/* function used to load the date picker */
jQuery(document).ready(function() {
	if(jQuery('.date_pick').length > 0){ 
		$(function() {
			$( ".date_pick" ).datepicker({
				changeMonth: true,
				changeYear: true,
				dateFormat: "yy-mm-dd"
			});
		});
	}
	
	if(jQuery('.date_picker').length > 0){ 
		$(function() {
			$( ".date_picker" ).datepicker({			
				dateFormat: "dd-mm-yy"
			});
		});
	}
});

/* create xmlhttp request object for ajax call */
var xmlhttp;
function create_xmlhttp(){	
	if(window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
	}
	else{
		xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
	}
}

/* function to load the departments */
function load_departments(course_id, load_id){
	if(isNaN(course_id)){
		course_id = 'S';
	}else{
		course_id = 'G';
	}
	create_xmlhttp();
	webroot = $("#webroot").attr('value'); 
	url = webroot+'departments/'+course_id;	
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200){	
			$('#'+load_id).html(xmlhttp.responseText);						
		}else if(xmlhttp.readyState == 1){
			$('#'+load_id).html('<option>Loading...</option>');
		}		
	}	
	xmlhttp.open('POST',url,true);
	xmlhttp.send(url);
}


/* function to load the districts */
function load_districts(dist_id, load_id){
	create_xmlhttp();
	webroot = $("#webroot").attr('value'); 
	url = webroot+'districts/'+dist_id;	
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200){		
			$('#'+load_id).html(xmlhttp.responseText);						
		}else if(xmlhttp.readyState == 1){
			$('#'+load_id).html('<option>Loading...</option>');
		}		
	}	
	xmlhttp.open('POST',url,true);
	xmlhttp.send(url);
}
/* function to show/hide the placeholder text in search form 

jQuery(document).ready(function() {

	jQuery('select:[placeholder]').live("click",function(e){	
		jQuery("#"+this.id+" option:selected").removeClass('placeholder');
		jQuery("#"+this.id).removeClass("placeholder");		
	});			

	jQuery('[placeholder]').live("keypress keyup focusin",function(e){	
		var input = jQuery(this);	
		if(input.is("input")){
			
			if(e.type == 'keypress'){
				if (input.val() == input.attr('placeholder')) {
					input.val('');
					input.removeClass('placeholder');
				}
			}	
			
			if(e.type == 'keyup'){
				if(jQuery.trim(input.val())== ''){
					input.val(input.attr('placeholder'));
					input.addClass('placeholder');
				}
			}

			if(e.type == 'focusin'){
				if (input.val() == input.attr('placeholder') || input.val() == '') {
					input.val('');
					input.removeClass('placeholder');		
				}
			}		
		}
	});

	jQuery('[placeholder]').live('blur',function(e) {
	   var input = jQuery(this);
	   if(jQuery("#"+this.id).is("select")){
			if(jQuery("#"+this.id+" option:selected").index() == 0){
				jQuery("#"+this.id).addClass("placeholder");
				jQuery("#"+this.id+" option:selected").addClass('placeholder');
			}else{
				jQuery("#"+this.id).removeClass("placeholder");
				jQuery("#"+this.id+" option:selected").removeClass('placeholder');
			}
		}  
		if(jQuery(this).is("input"))
			if (input.val() == '' || input.val().toLowerCase() == input.attr('placeholder').toLowerCase()) {
				input.addClass('placeholder');	
				input.val(input.attr('placeholder'));
			}
	}).blur();

});

*/


/* function to add class for the options in the language proficiency */
jQuery(document).ready(function(){ 
	$('select#language2 option').each(function(){
		//var theText = $(this).html();		
		$(this).addClass('selected');	
	 });
});

/* facebook multiple check box 
$(document).ready(function(){  
	var webroot = jQuery("#webroot").val(); 	
    $("#language2").fcbkcomplete({
        json_url: webroot+'languages/',
        addontab: true,                   
        input_min_size: 0,
        height: 10,
        cache: true,
        newel: true
    });
	
});
*/

jQuery(document).ready(function(){		
	jQuery(".slide").click(function(){
		jQuery(".showHide").slideToggle("slow");
	
	});
});
/* function to validate online test */
function set_tabindex() {
    jQuery(".tabindex").each(function(i) {
        jQuery(".tabindex").attr("tabindex", i);
    });
}
/* function to process the button 
function process_btn(){
	$('input[type=submit]', this).attr('value', 'Processing...');
	$('input[type=submit]', this).attr('disabled', 'disabled');
}
/* function to disable button 
function reset_btn(){
	$('input[type=submit]', this).attr('value', 'Submit');
	$('input[type=submit]', this).attr('disabled', '');
}
*/
function validate_online() {
    //this is used to  validate  test name,module name
    var ret = true;
     //Note: assign field name
    field_name = new Array('test_name', 'module_name');
    //Note: assign field type
    field_type = new Array("required", "required");
    //Note: assign field basic message
    field_msg = new Array("Please enter the test name", "Please enter the module name");
    //Note: assign field basic error message
    field_error_msg = new Array("Please enter the test name", "Please enter the test description");
    //Note: assign field advance error message
    field_adv_error_msg = new Array("Please enter the test name", "Please enter the test description");
    //Note: assign field advance error message
   
	//process_btn();
		
    var n_val = item_validation(field_name, field_type, '', '', field_msg, field_error_msg, field_adv_error_msg)


    control_count = 0;
    //this is used to  validate  question,check nox and option

    //Note: assign field name
    field_name = new Array('question', 'text', 'option', 'ans_drop');
    //Note: assign field type
    field_type = new Array("required", "checkbox", "multiple_option","dropdown");
    //Note: assign field basic message
    field_msg = new Array("Please enter the question", "Please select question type", "Please select all", "Please select the answer");
    //Note: assign field basic error message
    field_error_msg = new Array("Please enter the question", "Please select question type", "Please select all", "Please select the answer");
    //Note: assign field advance error message
    field_adv_error_msg = new Array("Please enter the question", "Please select question type", "Please select all", "Please select the answer");
    //Note: assign field advance error message

    control_count = (document.getElementById("test_final_count") != undefined && document.getElementById("test_final_count") != null) ? parseInt(document.getElementById("test_final_count").value) + 1 : 0;
	
    focus_set = new Array('question', 'text', 'option_text');


    var online_test = dynamic_jquery_option_validation(field_name, field_type, control_count, focus_set, field_msg, field_error_msg, field_adv_error_msg, n_val ? 'show' : '')

    if (n_val != true || (online_test != true)) {
        ret = false;
       //This is used to shw the flash error message
        jQuery("#flashMessage").show();
    }
    else {
        jQuery("#flashMessage").hide();
     }
            
     return ret;
}

//note:for question and option
jQuery(document).ready(function() { 
	if(jQuery.isFunction(jQuery.fn.sheepIt)&& jQuery('#test_final_count').length > 0){
    var sheepItForm = {};	
	document.getElementById("test_final_count").value == 0;	
    sheepItForm = jQuery('#sheepItForm_test').sheepIt({
        separator: '',
        allowRemoveLast: false,
        allowRemoveCurrent: true,
        allowRemoveAll: false,
		//insertNewForms: 'after',
        allowAdd: true,
        allowAddN: false,               
        maxFormsCount: Infinity,
        minFormsCount: jQuery('#min_count').val(),
        iniFormsCount: jQuery('#min_count').val(),
        indexFormat: '_inc_count',               
        afterAdd: function(source, newForm) {
		set_tabindex();		
		set_question_inc();
        document.getElementById("test_final_count").value++;
        }
     });
	}
 });
 
//This is used to dynamically change the input type to text || file
jQuery(document).ready(function() {
    jQuery(".radio_val").live("click", function() {
     var dynamic_index = jQuery(".radio_val").index(this);
     var c_val = jQuery(this).attr("class").replace(" radio_val", "");       
     var ctrl_id = jQuery(this).attr("id").replace("text_", "");
	
	 if(jQuery.trim(ctrl_id) == '_inc_count') { ctrl_id = 0;}   
	// if(jQuery.trim(ctrl_id) == '') { ctrl_id = 1;} 
	  
     var type = c_val == "opt_txt" ? "text" : "file";
     var size = c_val == "opt_txt" ? "" : "size='12'";
	
     $("#option1_q" + ctrl_id).replaceWith('<input type="' + type + '" class="option_text opt_text1" id="option1_q' + ctrl_id + '" name="data[OnlineTest][option1_q' + ctrl_id + ']" tabindex="' + ctrl_id + '"' + size + '>');
     $("#option2_q" + ctrl_id).replaceWith('<input type="' + type + '" class="option_text opt_text2" id="option2_q' + ctrl_id + '" name="data[OnlineTest][option2_q' + ctrl_id + ']" tabindex="' + ctrl_id + '"' + size + '>');
     $("#option3_q" + ctrl_id).replaceWith('<input type="' + type + '" class="option_text opt_text3" id="option3_q' + ctrl_id + '" name="data[OnlineTest][option3_q' + ctrl_id + ']" tabindex="' + ctrl_id + '"' + size + '>');
     $("#option4_q" + ctrl_id).replaceWith('<input type="' + type + '" class="option_text opt_text4" id="option4_q' + ctrl_id + '" name="data[OnlineTest][option4_q' + ctrl_id + ']" tabindex="' + ctrl_id + '"' + size + '>');
	});
});

// by click the enter to validate the form
jQuery(document).ready(function() {
    set_tabindex();
    jQuery("#test_name").focus();
    $('form input,form select').live('keypress', function(e) {
        if (e.which == 13) {
            if (validate_online())
                jQuery.this.form.submit();
             return false;
        }
     });
});

function set_question_inc(){
	jQuery(".increment").each(function(i){
		jQuery(this).text(i+1);
	});
}

jQuery(".sheepItForm_test_remove_current").live("click",function(){
	set_question_inc();
});

jQuery(document).ready(function() {
	if(jQuery(".cbox").length > 0) { 
		jQuery(".cbox").colorbox();  
	}
});

jQuery(document).ready(function() {
if(jQuery('.tiny_mce').length > 0){  
tinyMCE.init({
	mode : "textareas",
	theme : "modern",
	 width : "710",
	 height : "350"
	/* plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",
		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft,visualblocks",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
		*/

});
}
});

/* function to load the course details of the program */
function load_course(value,chk_obj){ 
	load_id = value.split('_');
	// to show the tags	
	select_value = jQuery.trim(jQuery('#'+chk_obj.id).attr("val"));	
	tag_id = chk_obj.id.split('_');
	tag_value = chk_obj.value.split('_');
	
	show_qualify_tags(select_value, chk_obj.checked,tag_id,tag_value);
	if(tag_id[0] == 'specialization') return ;
	
	// when the check box is checked only
	if(chk_obj.checked == true){
		create_xmlhttp();
		webroot = $("#webroot").attr('value');	
		url = webroot+'qualification/'+value;		
		xmlhttp.onreadystatechange = function(){
			if(xmlhttp.readyState == 4 && xmlhttp.status == 200){	
				//alert(xmlhttp.responseText);
				$('#'+load_id[0]+'_div').html(xmlhttp.responseText);						
			}else if(xmlhttp.readyState == 1){
				$('#'+load_id[0]+'_div').html('Loading...');
			}		
		}	
		xmlhttp.open('POST',url,true);
		xmlhttp.send(url);
	}else{
		$('#'+load_id[0]+'_div').html('');
	}
}

/* function to show the tags for the qualifications */
function show_qualify_tags(select_value,chk_status,tag_id,tag_value){ 
	// append the tags when it is not added
	select_value_id = tag_id[0]+'_Tag_'+tag_id[1]+'_'+select_value;
	if(chk_status == true){		
		store_qualify_hdn(tag_id,tag_value,select_value_id);
		jQuery('#'+tag_id[0]+'Tags').append('<span  class="tag" id='+select_value_id+'><span>'+select_value+'&nbsp;&nbsp;</span>');
		// <a href=\"javascript:void(0)\" class=\"remove_tags\" title=\"Removing tag\">x</a></span>
	}else{
		// remove the hidden fields
		remove_qualify_hdn(tag_id,tag_value,select_value_id);
		// remove the tags when it is already added
		jQuery('#'+tag_id[0]+'Tags').find(".tag").each(function(){					
		tag_value = jQuery(this).attr('id');		
			if(select_value_id == tag_value){
				jQuery('#'+select_value_id).remove();
			}		
		});
	}
}

/*  function to store the hidden field in the form for qualification */
function remove_qualify_hdn(tag_id,tag_value,select_val){ 
	var new_str = '';
	hdnValue = (tag_id[0] == 'prog') ? tag_value[0] : tag_value[0]+'_'+tag_value[1];	
	
	store_values = jQuery('#'+tag_id[0]+'Field').val();
	// split it and create array
	store_ar = store_values.split(',');	
	// remove the selected item
	store_ar.splice($.inArray(hdnValue, store_ar),1);	
	count = store_ar.length;	
	// iterate it and assign 
	for(i = 0; i < count; i++){
		if(parseInt(store_ar[i])){
			// assign to the hidden field
			new_str += store_ar[i]+',';	
		}
	}	
	jQuery('#'+tag_id[0]+'Field').attr('value', new_str);
	
	// process and remove the hidden label
	var new_str = '';
	store_values = jQuery('#'+tag_id[0]+'FieldLabel').val();
	// split it and create array
	store_ar = store_values.split('|');
	// split the value
	select_val = select_val.split('_');	
	// remove the selected item
	store_ar.splice($.inArray(select_val[3], store_ar),1);	
	count = store_ar.length;	
	// iterate it and assign 
	for(i = 0; i < count; i++){
		if(store_ar[i] != ''){
			// assign to the hidden field
			new_str += store_ar[i]+'|';	
		}
	}

	jQuery('#'+tag_id[0]+'FieldLabel').val(new_str);
	
}

/*  function to store the hidden field in the form for qualification */
function store_qualify_hdn(tag_id,tag_value,select_val){ 
	hdnValue = (tag_id[0] == 'prog') ? tag_value[0] : tag_value[0]+'_'+tag_value[1];	
	
	if(jQuery('#'+tag_id[0]+'Field').val() == ''){
		jQuery('#'+tag_id[0]+'Field').val(hdnValue);		
	}else{
		hdnValue2 = jQuery('#'+tag_id[0]+'Field').val();		
		jQuery('#'+tag_id[0]+'Field').val(hdnValue2+','+hdnValue);		
	}
	
	// split the value and save in the hidden field
	select_val = select_val.split('_');
	// store the checkbox label in the hidden field
	if(jQuery('#'+tag_id[0]+'FieldLabel').val() == ''){
		jQuery('#'+tag_id[0]+'FieldLabel').val(select_val[3]);		
	}else{
		hdnLabel = jQuery('#'+tag_id[0]+'FieldLabel').val();
		jQuery('#'+tag_id[0]+'FieldLabel').val(hdnLabel+'|'+select_val[3]);
	}
}

/* function to remove the tags in the list */
jQuery(document).ready(function() {
	$('.remove_tags').live("click",function() {		
		r_id = jQuery(this).parent().attr('id');		
		jQuery('#'+r_id).remove();
	});						

});						
			
/* function to check and uncheck all features  of roles */
jQuery(document).ready(function() {
	if(jQuery('.check_all').length > 0){ 
		$('.check_all').click(function() {
			jQuery('.check_all').toggle();
			chk_id = jQuery(this).attr('id');	
			jQuery('.modulecheck').each(function() {
				// jQuery('.modulecheck').is(':checked') &&
				if(chk_id == 'uncheckall'){ 
					jQuery('.modulecheck').attr('checked',false);
				}else{
					jQuery('.modulecheck').attr('checked', true);
				}			
			});								
		});
	}
});

/* function to redirect the location in reports */
function redirectState(value){
	webroot = $("#webroot").attr('value');
	date_from = $("#date_from").attr('value');
	date_to = $("#date_to").attr('value');
	location.href = webroot+value+'?date_from='+date_from+'&date_to='+date_to;
}

/* function to redirect the location in reports */
function redirectReport(value,value2){
	webroot = $("#webroot").attr('value');
	date_from = $("#date_from").attr('value');
	date_to = $("#date_to").attr('value');
	location.href = webroot+value+'/'+value2+'?date_from='+date_from+'&date_to='+date_to;
}

/* function to show the left tabs in accordion */
jQuery(document).ready(function() {
	$("#accordion > li > div").click(function(){
		if(false == $(this).next().is(':visible')) {
			$('#accordion ul').slideUp(300);
		}
		$(this).next().slideToggle(300);	
		$("#accordion").find(".active").removeClass("active");
		$(this).children().addClass("active");
		
	});
	$('#accordion ul:eq(44)').show();

});

// when the change password link is clicked
jQuery(document).ready(function() {
	jQuery(".graph_overlay").click(function(){ 
			var url = jQuery("#webroot_overlay").val()+$(this).attr("rel");				
			overlay_box(url,950,650,true);
			return false;
	});
});

// when the change password link is clicked
jQuery(document).ready(function() {
	jQuery(".misc_overlay").click(function(){ 
			var url = jQuery("#misc_overlay").val()+$(this).attr("rel");		
			overlay_box(url,950,250,true);
			return false;
	});
	
	
});

// Esc key action
$(document).keyup(function(e) {
    if (e.keyCode == 27) { // Esc
        $.alerts._hide();// or whatever you want
    }
});

// tipsy and alert to close
jQuery(document).ready(function() {
	tipsy();	
	// show only in alerts page
	if($('#esc_overlay').length > 0){ 
		$(".sVerify").click(function(e) {
		  e.stopPropagation();
		  //stops click event from reaching document
		});
		
		$(document).click(function() {
		  $.alerts._hide();
		});
	}
	
	// show time picker
	if($('#test_time').length > 0){
		$('#test_time').timepicker();
	}
});
function tipsy(){
    if(jQuery.isFunction(jQuery.fn.tipsy) == true){ 
		$('.tipN').tipsy({gravity: 'n',fade: true, html:true});
		$('.tipS').tipsy({gravity: 's',fade: true, html:true});
		$('.tipW').tipsy({gravity: 'w',fade: true, html:true});
		$('.tipE').tipsy({gravity: 'e',fade: true, html:true});
	}	
}

