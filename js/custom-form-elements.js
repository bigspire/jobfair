/*

CUSTOM FORM ELEMENTS

Created by Ryan Fait
www.ryanfait.com

The only things you may need to change in this file are the following
variables: checkboxHeight, radioHeight and selectWidth (lines 24, 25, 26)

The numbers you set for checkboxHeight and radioHeight should be one quarter
of the total height of the image want to use for checkboxes and radio
buttons. Both images should contain the four stages of both inputs stacked
on top of each other in this order: unchecked, unchecked-clicked, checked,
checked-clicked.

You may need to adjust your images a bit if there is a slight vertical
movement during the different stages of the button activation.

The value of selectWidth should be the width of your select list image.

Visit http://ryanfait.com/ for more information.

*/



var checkboxHeight = "25";
var radioHeight = "25";
var selectWidth = "190";
// for inbox check boxes
if(document.getElementById('page_frm') != null){
	if(document.getElementById('page_frm').value == 'inbox'){
		var checkboxHeight = "19";
	}
}
/* No need to change anything after this */
function get_check_height(em_id, em_type){ 
    em_id = em_id.split('-'); 
	if((em_id[0] == 'small_chk' || jQuery("#"+em_id).attr("small_chk") == 'small_chk') && em_type == 'checkbox'){
		return "19"; 
	}else{
		return "19";
	}
}

/* No need to change anything after this */
function get_radio_height(em_id, em_type){ 
	em_id = em_id.split('-'); 
	if(em_id[0] == 'small_radio' && em_type == 'radio'){
		return "19"
	}else{
		return "25"
	}
}

/* No need to change anything after this */


document.write('<style type="text/css">input.styled { display: none; } select.styled { position: relative; width: ' + selectWidth + 'px; opacity: 0; filter: alpha(opacity=0); z-index: 5; } .disabled { opacity: 0.5; filter: alpha(opacity=50); }</style>');
var attempt_init = 1;
var Custom = {
	init: function() {
	
		var inputs = document.getElementsByTagName("input"), span = Array(), textnode, option, active;
		for(a = 0; a < inputs.length; a++) {
		
			if((inputs[a].type == "checkbox" || inputs[a].type == "radio") && inputs[a].className == "styled") {
			 if(jQuery(inputs[a]).prev(".checkbox").length > 0) continue;
				span[a] = document.createElement("span");
				span[a].className = inputs[a].type;
              	
				// call when the check box is loaded by default
				var checkboxHeight = get_check_height(inputs[a].id,inputs[a].type );
				// call when the radio button is loaded by default
				var radioHeight = get_radio_height(inputs[a].id,inputs[a].type );
				if(inputs[a].checked == true) {

					if(inputs[a].type == "checkbox") {
						position = "0 -" + (checkboxHeight*2) + "px";
						span[a].style.backgroundPosition = position;
					} else {
						position = "0 -" + (radioHeight*2) + "px";
						span[a].style.backgroundPosition = position;
					}
				}
				inputs[a].parentNode.insertBefore(span[a], inputs[a]);
				inputs[a].onchange = Custom.clear;
				if(!inputs[a].getAttribute("disabled")) {
					span[a].onmousedown = Custom.pushed;
					span[a].onmouseup = Custom.check;
				} else {
					span[a].className = span[a].className += " disabled";
				}
			}
		}
		inputs = document.getElementsByTagName("select");
		for(a = 0; a < inputs.length; a++) {
			if(inputs[a].className == "styled") {
				option = inputs[a].getElementsByTagName("option");
				active = option[0].childNodes[0].nodeValue;
				textnode = document.createTextNode(active);
				for(b = 0; b < option.length; b++) {
					if(option[b].selected == true) {
						textnode = document.createTextNode(option[b].childNodes[0].nodeValue);
					}
				}
				span[a] = document.createElement("span");
				span[a].className = "select";
				span[a].id = "select" + inputs[a].name;
				span[a].appendChild(textnode);
				inputs[a].parentNode.insertBefore(span[a], inputs[a]);
				if(!inputs[a].getAttribute("disabled")) {
					inputs[a].onchange = Custom.choose;
				} else {
					inputs[a].previousSibling.className = inputs[a].previousSibling.className += " disabled";
				}
			}
		}
		document.onmouseup = Custom.clear;
	
		Custom.focus();
		/*Note: */
		//Note: The following script is used to get custom package amount details using ajax
		if(jQuery("form#additional_purchase").length == 1) {
			var addtional_purchase = Array("users","jobs","premium_jobs","cv_access","mails","sms");
			var chk_addtional_purchase = Array("custom_user","custom_job","custom_premium","custom_cv","custom_mail","custom_sms");
			if(qstring("buy") !='' && jQuery.inArray(qstring("buy"),addtional_purchase) >= 0){
				var index = jQuery.inArray(qstring("buy"),addtional_purchase);
				jQuery("[name='"+chk_addtional_purchase[index]+"']").attr("checked","checked").prev(".checkbox").click();
				jQuery("[name='"+chk_addtional_purchase[index]+"']").change();
			}else{
				if(document.referrer.indexOf("payment_selection") == -1){
					jQuery("[custom_pack='custom_pack']").attr("checked","checked").prev(".checkbox").click();
					jQuery("[custom_pack='custom_pack']").change();
				}else{
					jQuery("[custom_pack='custom_pack']").each(function(){
						if(jQuery(this).prop("checked")){
							jQuery(this).prev(".checkbox").click();
							jQuery(this).change();
						}
					});
				}				
			}
			
		}
		jQuery("[subjects='subjects']").prev(".checkbox").click(function(){
			var selected_jobs_count = jQuery("[subjects='subjects']:checked").length;
			if(selected_jobs_count > 0){
				jQuery("#select_subjects").hide();
				jQuery(".selected_jobs_msg").show().find("#count").text(selected_jobs_count);
				
			}else{
				jQuery("#select_subjects").show();
				jQuery(".selected_jobs_msg").hide();
			}
		});
		jQuery("[industry='industry']").prev(".checkbox").click(function(){
			var selected_industry_count = jQuery("[industry='industry']:checked").length;
			if(selected_industry_count > 0){
				jQuery("#select_industries").hide();
				jQuery(".selected_industry_msg").show().find("#count").text(selected_industry_count);
				
			}else{
				jQuery("#select_industries").show();
				jQuery(".selected_industry_msg").hide();
			}
		});
		/*Note: The following scirpt is used for custom package plan*/
		if(jQuery(".custom_package .checkbox:eq(0)").length > 0){
			jQuery(".custom_package .checkbox").unbind("click");
			jQuery(".custom_package .checkbox").click(function(){
				jQuery(this).next().change();
			});
		}
		/*Note: The following script is used for update job status*/
		if(jQuery("#update_job_status").length && jQuery(".field .radio:eq(0)").length > 0){
			jQuery(".field .radio").unbind("click");
			jQuery(".field .radio").click(function(){
				if(jQuery(this).next().attr("name") == "got_job"){
					if(jQuery(this).next().val() == 1){
						jQuery(".hide_job_status").show();
						if(jQuery("[name='is_join']:checked").val() !=1){
							jQuery(".join_date").hide();
						}
					}else{
						jQuery(".hide_job_status").hide();
					}
				}else if(jQuery(this).next().attr("name") == "is_join"){
					jQuery("[name='is_join']").parent().find(".errorMsg").hide();
					if(jQuery(this).next().val() == 1){
						jQuery(".join_date").show();
					}else{
						jQuery(".join_date").hide();
					}
				}
			});
			
			
		}	
		/*Note: The following scirpt is used for advance search form*/
		if(jQuery("#adv_form .checkbox:eq(0)").length > 0){	
			jQuery("#adv_form .checkbox").unbind("click");
			jQuery("#adv_form .checkbox").each(function(){
				jQuery(this).next().unbind("change");
			});
			jQuery("#adv_form .checkbox").click(function(){
				jQuery(this).next().change();
			});
			if(attempt_init == 2) return;
			/*Note: The following script is used to retain the form values of advanced search*/  
			if(jQuery(".modifySearch").length > 0){
			
				var split_industry = jQuery("#search_industries").length ? jQuery("#search_industries").val().replace(/\'/g, " ").split(',') : '';
				jQuery(split_industry).each(function(i){
					/*jQuery("[name='industries[]']:[value='"+jQuery.trim(split_department[i])+"']").attr("checked","checked");
					jQuery("[name='industries[]']:[value='"+jQuery.trim(split_department[i])+"']").prev(".checkbox").click();*/
					jQuery("[name='industries[]']").each(function(){
						
						if(jQuery.trim(jQuery(this).val().toLowerCase()) == jQuery.trim(split_industry[i].toLowerCase())){
							jQuery(this).attr("checked","checked");
							jQuery(this).prev(".checkbox").click();
						}	
					});
					
				});
				var split_education = jQuery("#search_education").length ? jQuery("#search_education").val().replace(/\'/g, " ").split(',') :'';
				retain_values(split_education,'educations'); // retain education
				var split_department = jQuery("#search_departments").length ? jQuery("#search_departments").val().replace(/\'/g, " ").split(',') :'';
				jQuery(split_department).each(function(i){
					jQuery("[name='departments[]']:[value='"+split_department[i]+"']").attr("checked","checked");
					jQuery("[name='departments[]']:[value='"+split_department[i]+"']").prev(".checkbox").click();
				});
				/*if(jQuery("#search_min_exp").val() != ''){
					var index = jQuery("#min_exp option[value='"+jQuery("#search_min_exp").val()+"']").index();
					jQuery("#min_exp option[value='"+jQuery("#search_min_exp").val()+"']").attr("selected","selected").attr("selectedindex",index); // retain min experience
					jQuery("#min_exp").after('<input type="hidden" name="min_exp_name" id="min_exp_name" value="'+jQuery("#search_min_exp").val()+'"/>');
				}	
				if(jQuery("#search_max_exp").val() != ''){
					//load_min_exp_values(jQuery("select[name='min_exp'])");
					var index = jQuery("#max_exp option[value='"+jQuery("#search_max_exp").val()+"']").index();
					jQuery("#max_exp option[value='"+jQuery("#search_max_exp").val()+"']").attr("selected","selected").attr("selectedindex",index);// retain max experience
					jQuery("#max_exp").after('<input type="hidden" name="max_exp_name" id="max_exp_name" value="'+jQuery("#search_max_exp").val()+'"/>');
				}*/
				
				if(jQuery.trim(qstring("job_type")) != ''){
				    var job_type = jQuery.trim(qstring("job_type"));
					var index = jQuery("#job_type option[value='"+job_type+"']").index();
					jQuery("#job_type option[value='"+job_type+"']").attr("selected","selected").attr("selectedindex",index); // retain job type	
					jQuery("#job_type").prev(".auto_dropdown").find("a").text(job_type);
					if(jQuery("#job_type_name").length) {
						jQuery("#job_type_name").val(job_posted);
					}else{
						jQuery("#job_type").after('<input type="hidden" name="job_type_name" id="job_type_name" value="'+job_type+'">');
					}	
					
				}
				if(jQuery.trim(qstring("job_posted")) != ''){
					var job_posted = jQuery.trim(qstring("job_posted"));
					var index = jQuery("#job_posted option[value='"+job_posted+"']").index();
					jQuery("#job_posted option[value='"+job_posted+"']").attr("selected","selected").attr("selectedindex",index); // retain job type	
					jQuery("#job_posted").prev(".auto_dropdown").find("a").text(job_posted);
					if(jQuery("#job_posted_name").length) {
						jQuery("#job_posted_name").val(job_posted);
					}else{
						jQuery("#job_posted").after('<input type="hidden" name="job_posted_name" id="job_posted_name" value="'+job_posted+'">');
					}	
				}
			
			   if(jQuery("#search_min_salary").val() != '')
					jQuery("#min_salary").removeClass("placeholder").val(jQuery("#search_min_salary").val()); // retain min salary
			   if(jQuery("#search_max_salary").val() != '')
					jQuery("#max_salary").removeClass("placeholder").val(jQuery("#search_max_salary").val());	// retain max salary
					var x_std = qstring("x_std");
					if(x_std == '1'){
						jQuery("[name='X_std']").trigger({type:"click",search:"dont"});
					}
					var xii_std = qstring("xii_std");
					if( xii_std == '1'){
						jQuery("[name='XII_std']").trigger({type:"click",search:"dont"});
					}
				  
				var program = qstring("program");
				
					if(program){
						var split_program = program.split(",");
						jQuery(split_program).map(function(e){
							split_programs = split_program[e].split("~");
						
							jQuery("[name='chk_program']:[value='"+split_programs[1]+"']").attr("checked","checked").trigger({type:"change",search:"dont"});
						});
					}
					var course = qstring("course");
					if(course){
						var split_course = course.split(",");
						jQuery(split_course).map(function(e){
							split_courses = split_course[e].split("~");
					
							jQuery("[name='chk_degree']:[value='"+split_courses[2]+"']").attr("checked","checked").trigger({type:"change",search:"dont"});
						});
					}
					var specialization = qstring("specialization");
					
					if(specialization){
						var split_specialization = specialization.split(",");
						jQuery(split_specialization).map(function(e){
							split_specializations = split_specialization[e].split("~");
							
							jQuery("[name='chk_specialization']:[value='"+split_specializations[3]+"']").attr("checked","checked").trigger({type:"change",search:"dont"});
						});
					}
				//Note:  show/hide advance search form	
				jQuery(".modifySearch").click(function(){
					jQuery("#showAdvance").toggle("slow");
					//jQuery("#hideAdvance").toggle("slow");
					//jQuery("#modifyAdvance").toggle("slow");
				});

			}
		}
		/*Note: The following scirpt is used to select/unselect the checkbox*/
		if(jQuery("#searchResultTable .checkbox:eq(0)").length > 0){
		    jQuery("#searchResultTable .checkbox:eq(0)").unbind("click");
			var all_select_complete =  1; var backgroud_position = '',backgroud_position1;
			jQuery("#searchResultTable .checkbox:gt(0)").click(function(){
				if(jQuery(this).parents(".headCheck").length == 0){
					var control = this;
					if(backgroud_position == '') {
						backgroud_position = control.style.backgroundPosition;
					}else{
						backgroud_position1 = control.style.backgroundPosition;
					}
					var total_check = jQuery("#searchResultTable .checkbox").length;
					var total_head  = jQuery(".headCheck .checkbox").length;
					var total_child = total_check - total_head;
					var total_check = jQuery("#searchResultTable .checkbox").next("[checked='checked']").length - jQuery(".headCheck .checkbox").next("[checked='checked']").length;
					
					if(total_check == total_child){
						jQuery(".headCheck .checkbox").attr("style","background-position: "+backgroud_position);
						jQuery(".headCheck .checkbox").next().attr("checked","checked");
						
					}else{
						jQuery(".headCheck .checkbox").attr("style","background-position: 0px 0px;");
						jQuery(".headCheck .checkbox").next().removeAttr("checked");
					}
			
				}
			});
			jQuery("#searchResultTable .checkbox:eq(0)").click(function(){
				var control = this;
				if(backgroud_position == '') {
					backgroud_position = control.style.backgroundPosition;
				}else{
					backgroud_position1 = control.style.backgroundPosition;
				}
				if(all_select_complete == 1){
					all_select_complete = 0;
					//unselect checkbox
					if(jQuery(this).next().attr("checked") == undefined){
					//	jQuery(".action:eq(0)").text("D:"+backgroud_position1);
						jQuery("#searchResultTable .checkbox").attr("style","background-position: 0px 0px;");
						jQuery("#searchResultTable .checkbox").next().removeAttr("checked");
					}
					//select checkbox
					else if(jQuery(this).next().attr("checked") == "checked"){
					//	jQuery(".action:eq(0)").text("S:"+backgroud_position);
						jQuery("#searchResultTable .checkbox").attr("style","background-position: "+backgroud_position);
						jQuery("#searchResultTable .checkbox").next().attr("checked","checked");
					}
					all_select_complete = 1;
				}
				
			});
		}
		//Note: The following script is used to show the package amount
		if(jQuery("[name='category']").length) { 
			jQuery("[name='category']").each(function(){
				if(jQuery(this).attr("checked") == "checked") { 
					jQuery(this).prev(".radio").click();
					return false;
				}
			});
		}	
		
	},
	focus: function(){
			jQuery(".radio").html("<a href='javascript:void(0)' class='a_radio'>&nbsp;</a>");
		    jQuery(".radio").find("a").focus(function() {
				jQuery(this).parent().mouseup();
				
			});	
	},
	pushed: function() {
	
		element = this.nextSibling;
			// call when the checkbox is clicked
		var checkboxHeight = get_check_height(element.id,element.type);
		// call when the radio button is loaded by default
		var radioHeight = get_radio_height(element.id,element.type);
		if(element.checked == true && element.type == "checkbox") {
			this.style.backgroundPosition = "0 -" + checkboxHeight*3 + "px";
		} else if(element.checked == true && element.type == "radio") {
			this.style.backgroundPosition = "0 -" + radioHeight*3 + "px";
		} else if(element.checked != true && element.type == "checkbox") {
			this.style.backgroundPosition = "0 -" + checkboxHeight + "px";
		} else {
			this.style.backgroundPosition = "0 -" + radioHeight + "px";
		}
	},
	check: function() { 

		element = this.nextSibling;
		// call when the check box is clicked	
		var checkboxHeight =	get_check_height(element.id,element.type);
		// call when the radio button is loaded by default
		var radioHeight = get_radio_height(element.id,element.type);
		if(element.checked == true && element.type == "checkbox") {
			this.style.backgroundPosition = "0 0";
			element.checked = false;
		} else {
			if(element.type == "checkbox") {
				this.style.backgroundPosition = "0 -" + checkboxHeight*2 + "px";
			} else {
				this.style.backgroundPosition = "0 -" + radioHeight*2 + "px";
				group = this.nextSibling.name;
				inputs = document.getElementsByTagName("input");
				for(a = 0; a < inputs.length; a++) {
					if(inputs[a].name == group && inputs[a] != this.nextSibling) {
						inputs[a].previousSibling.style.backgroundPosition = "0 0";
					}
				}
			}
			element.checked = true;
		}
	},
	clear: function() {
		inputs = document.getElementsByTagName("input");
		for(var b = 0; b < inputs.length; b++) {
		// call when the check box is cleared		
			var checkboxHeight =	get_check_height(inputs[b].id,inputs[b].type);
			// call when the radio button is loaded by default
			var radioHeight = get_radio_height(inputs[b].id,inputs[b].type);
			if(inputs[b].type == "checkbox" && inputs[b].checked == true && inputs[b].className == "styled") {
				inputs[b].previousSibling.style.backgroundPosition = "0 -" + checkboxHeight*2 + "px";
			} else if(inputs[b].type == "checkbox" && inputs[b].className == "styled") {
				inputs[b].previousSibling.style.backgroundPosition = "0 0";
			} else if(inputs[b].type == "radio" && inputs[b].checked == true && inputs[b].className == "styled") {
				inputs[b].previousSibling.style.backgroundPosition = "0 -" + radioHeight*2 + "px";
			} else if(inputs[b].type == "radio" && inputs[b].className == "styled") {
				inputs[b].previousSibling.style.backgroundPosition = "0 0";
			}
		}
	},
	choose: function() {
		option = this.getElementsByTagName("option");
		for(d = 0; d < option.length; d++) {
			if(option[d].selected == true) {
				document.getElementById("select" + this.name).childNodes[0].nodeValue = option[d].childNodes[0].nodeValue;
			}
		}
	}
	
}
window.onload = Custom.init; 