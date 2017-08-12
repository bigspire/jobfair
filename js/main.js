
(function( $ ) {
	$( ".ui-autocomplete-input" ).live( "autocompleteopen", function() {
	var autocomplete = $( this ).data( "autocomplete" ),
		menu = autocomplete.menu;

	if ( !autocomplete.options.selectFirst ) {
		return;
	}
	//the requested term no longer matches the search, so drop out of this now
	if(autocomplete.term != $(this).val()){
		//console.log("mismatch! "+autocomplete.term+'|'+$(this).val());
		return;
	}
	//hack to prevent clearing of value on mismatch
	menu.options.blur = function(event,ui){return}
	menu.activate( $.Event({ type: "mouseenter" }), menu.element.children().first() );
	});
}( jQuery ));
//*Note: The following script is used to Focusing Tooltip Content
var focus_first = '1';
var form_submit  = '';
set_tooltip();
var inc_call = 0;
var auto = '';
var page_url = jQuery("#page_url").val();
var pack_initial_value = jQuery("#pack_initial_value").val() != undefined ? jQuery("#pack_initial_value").val() : '' ;
function call_keypress_value(event,this_control){	
	last_foucs_txt = []; last_foucs_index = [];
	var keycode = event.keyCode ? event.keyCode : event.charCode;
	var c = String.fromCharCode(keycode);
	cur_txt = cur_txt + c;
	keypress_value(jQuery(this_control));
}
var dropdown_tab = -1;
/*Note: The Following script is used to call keypress_value function when user type on the jquery selectbox*/
jQuery(".auto_dropdown").live("focusout",function(){
	if(jQuery("#validate_form").length>0){
		var function_name =jQuery("#validate_form").val();
		var element_name = jQuery(this).parents(".jquery-custom-selectboxes-replaced").find("select").attr("name");
		window[function_name](element_name,'',jQuery("[name='"+element_name+"']").index(jQuery(this).next("[name='"+element_name+"']")));
	}
});
function dropdown_search(){
	jQuery(".auto_dropdown").find("a").live("keyup",function(event){
	if(event.keyCode == 9) {
		/*
		var cur_index = jQuery(".auto_dropdown").index(jQuery(this).parent(".auto_dropdown"));
		if(dropdown_tab == cur_index && dropdown_tab >=0 && jQuery(".field_multiple").length == 0){
			dropdown_tab = -1;
			if(jQuery(this).parents(".field_multiple:eq(0)").next(".field_multiple").find(".auto_dropdown").length){
				jQuery(this).parents(".field_multiple:eq(0)").find(".jquery-selectbox-list").hide();
				jQuery(this).parents(".field_multiple:eq(0)").next(".field_multiple").find(".jquery-selectbox").click();
			}else{
				if(jQuery(this).parents(".field_multiple:eq(0)").next(".field_multiple").length){
					jQuery(this).parents(".field_multiple:eq(0)").next(".field_multiple").find("input,textarea").eq(0).focus();
				}else {
					if(jQuery(".field_multiple").length == 0) {
						
						setTimeout(function(){jQuery(".jquery-selectbox-list").hide();},500);
					}
					jQuery(this).parents("li").next("li").find("input,textarea").eq(0).focus();
				}
			}	
			return false;
		}
		if(cur_index !=  dropdown_tab){
			dropdown_tab = cur_index;
		}else{
			dropdown_tab = -1;
		}		
		*/
			if(jQuery("#validate_form").length>0){
				var function_name =jQuery("#validate_form").val();
				
				var element_name = jQuery(this).parent(".auto_dropdown1").next("select").attr("name");
				if(element_name){
					window[function_name](element_name,'',jQuery("[name='"+element_name+"']").index(this));
				}	
			}
				
		}else{
			dropdown_tab = -1;
			call_keypress_value(event,jQuery(this));
		}	
	});
}



function set_tooltip() {
    jQuery(document).ready(function() {
	
    jQuery("input").each(function(i) {
  
    if (jQuery("input:eq(" + i + ")").hasClass('frm_tip') == true) {

        jQuery("input:eq(" + i + ")").attr("title", "<span class='tip_top'></span><span class='tip_mid'><span>" + jQuery("input:eq(" + i + ")").attr("title") + "</span></span>");
            }
        });    
	jQuery("textarea").each(function(i) {
  
    if (jQuery("textarea:eq(" + i + ")").hasClass('frm_tip') == true) {

        jQuery("textarea:eq(" + i + ")").attr("title", "<span class='tip_top'></span><span class='tip_mid'><span>" + jQuery("textarea:eq(" + i + ")").attr("title") + "</span></span>");
            }
        });
    });
}

// add title attripute for all multiple class
            jQuery(".multi").each(function(i) {
                jQuery(".multi:eq(" + i + ")").attr("title", "<span class='tip_top'></span><span class='tip_mid'><span>" + jQuery(".multi:eq(" + i + ")").attr("title") + "</span></span>");
            });

            //add firm_tip class to which one have firm_tip in select 
            jQuery("select").each(function(i) {
                if (jQuery("select:eq(" + i + ")").hasClass('frm_tip') == true) {
                    jQuery("select:eq(" + i + ")").parent().addClass("frm_tip");
                }
            });
			//add firm_tip class to which one have firm_tip in select 
            jQuery("select").each(function(i) {
                if (jQuery("select:eq(" + i + ")").hasClass('frm_tip_left') == true) {
                    jQuery("select:eq(" + i + ")").parent().addClass("frm_tip_left");
                }
            });
			
			//add title attripute to which one have firm_tip in select  parent
            jQuery(".frm_tip_left").each(function(i) {
                if (jQuery("select:eq(" + i + ")").hasClass('frm_tip_left') == true) {
                    jQuery("select:eq(" + i + ")").parent().attr("title", "<span class='tip_btm'></span><span class='tip_mid_btm'><span>" + jQuery("select:eq(" + i + ")").attr("title") + "</span></span>");
                }
            });
            //add title attripute to which one have firm_tip in select  parent
            jQuery(".frm_tip").each(function(i) {
                if (jQuery("select:eq(" + i + ")").hasClass('frm_tip') == true) {
                    jQuery("select:eq(" + i + ")").parent().attr("title", "<span class='tip_top'></span><span class='tip_mid'><span>" + jQuery("select:eq(" + i + ")").attr("title") + "</span></span>");
                }
            });
//Note: The Following script is used to get the index of the array based upon the values;
if (!Array.prototype.indexOf) {
    Array.prototype.indexOf = function(elt /*, from*/) { var len = this.length >>> 0; var from = Number(arguments[1]) || 0; from = (from < 0) ? Math.ceil(from) : Math.floor(from); if (from < 0) from += len; for (; from < len; from++) { if (from in this && this[from] === elt) return from; } return -1; };
}


/*Note: The following script is used to validate the registration form*/
/* -- Start --*/
/*Note: The Following code for service registration page*/
var email_exists = '';
/*
field = 'email';

function check_email_exists(field){
var reg = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    // var reg = /^([a-zA-Z0-9_\.\-])+\@([a-zA-Z0-9\-])*\.$/;
    val = document.getElementById(field).value;
	if(reg.test(val) == true) {
		var page_redirect = 'check_email_exists';
		        /*Note: The following script is used to redirect to particular page and get the value
		jQuery.post(jQuery("#page_url").val()+page_redirect,{email_address:trim(val)},function(data){
			if(data == 'email_exist'){
				jQuery("#email_invalid").val(0);
				//validation = false;
				check_fields = check_fields && false;
				jQuery('#'+field).parent('div').addClass('message');
				jQuery('#'+field).parent('div').find(".errorMsg").show().text(email_address_try_another_error);
			}
			else{
				jQuery("#email_invalid").val(1);
			}
		});
	}
	
 }  
 */

 /*Note The Following function is used to validate the captcha code*/
function security_code_check(){
	     if(jQuery.trim(jQuery("#security").val())!='')
		 var cap_val=jQuery.trim(jQuery("#security").val());

	    jQuery.ajax({
			type: "POST",
			data: "captcha="+cap_val+"",
			url: jQuery("#page_url").val()+"get_captcha/",
			error : function(){
			//alert("ERER");
			},
			success: function(msg){
				security_code_focus="focused";

			if(msg=="true"){
			   security_code_exists='false';
			   jQuery('#security').parent('div').removeClass('message');
			   jQuery('#security').parent('div').find(".errorMsg").hide();
			}
            else{
                jQuery('#security').parent('div').addClass('message');
				security_code_exists='true';
				if(jQuery.trim(jQuery("#security").val()) != '')
					jQuery('#security').parent('div').find(".errorMsg").show().text("Incorrect value entered");
				else
					jQuery('#security').parent('div').find(".errorMsg").show().text("Please enter the text in the image");
			}


			}

		 });
}
 /* placement enquiry */
 
 function validate_placement_enquiry(par_field_name,event_name) {
	if($("#form_submit").is(':enabled')){
  		/*Note: The following script is used for to show/hide the placeholder text*///Note: show the processing text when user submit the form
	    if(par_field_name == undefined){
		 	jQuery("#form_submit").attr("disabled","disabled").html("<span class='processing'>"+Processing+"</span>");
		    jQuery("#cancel").hide();		   
		}

		//check_email_exists("email_address");
		//Note: assign field name
		var field_name = new Array('ins_name', 'placement_coord', 'email_address','landline', 'mobile1','address','city','state','desc','attachment','security');
		//Note: assign field type
		var field_type = new Array("required", "required", "email", "landline","required","required","required","dropdown","required","doc_empty","required");
		//Note: assign field basic message  //(This will be used for your login)
		var field_msg = new Array('','','','','','','','','','','');
		//Note: assign field basic error message
		
		var field_error_msg = new Array(ins_name_error, placement_coord_error, email_error,err_landline_no, mob_num_error,address_error, city_error, state_error,description_error,file_error,captcha_txt_error);
		//Note: assign field advance error message
		var field_adv_error_msg = new Array('', '', email_address_valid_error,advance_err_landline_no, '', '','','','','','incorrect security code');
		var field_length=field_name.length;
		var set_foucs=undefined;

		//Note: to get particular field name and field type when user foucus out the control
		if(par_field_name!=undefined){
			var index=-1;
			index =field_name.indexOf(''+par_field_name+'');
			field_type = new Array(field_type[index]);
			field_name = new Array(field_name[index]);
			field_msg = new Array(field_msg[index]);
			field_error_msg = new Array(field_error_msg[index]);
			field_adv_error_msg = new Array(field_adv_error_msg[index]);
			set_foucs='false';
		}
		var validation = item_validation(field_name, field_type,field_msg,field_error_msg,field_adv_error_msg,set_foucs);
			if(security_code_exists == "false"){
			jQuery('#security').parent('div').removeClass('message');
			jQuery('#security').parent('div').find(".errorMsg").hide().text("Please enter the text in the image");
		}
		else if(security_code_exists =='true'){
			 jQuery('#security').parent('div').addClass('message');
			if(jQuery.trim(jQuery("#security").val()) != '')
					jQuery('#security').parent('div').find(".errorMsg").show().text("Incorrect value entered");
				else
					jQuery('#security').parent('div').find(".errorMsg").show().text("Please enter the text in the image");
		}
		if(event_name == 'blur'){
			check_fields = false;
			return false;
		}
		if(par_field_name!=undefined){
			return false;
		}
		if (validation == true && security_code_exists == 'false' && field_length == field_name.length && par_field_name == undefined) {
			jQuery('#security').parent('div').removeClass('message');
			jQuery('#security').parent('div').find(".errorMsg").hide().text("Please enter the text in the image");
			return true;
		} else {
			jQuery("#form_submit").html("<span>"+submit+"</span>").removeAttr("disabled", "disabled");
			jQuery("#cancel").show();
			return false;
		}
	}
	return false;
 }
 
 /* Business Enquiry */
 
  function validate_business_enquiry(par_field_name,event_name) {
	if($("#form_submit").is(':enabled')){
 		/*Note: The following script is used for to show/hide the placeholder text*///Note: show the processing text when user submit the form
	    if(par_field_name==undefined){
		 	jQuery("#form_submit").attr("disabled","disabled").html("<span class='processing'>"+Processing+"</span>");
		    jQuery("#cancel").hide();
		}
		
		//check_email_exists("email_address");
		//Note: assign field name
		var field_name = new Array('first_name', 'last_name' ,'designation', 'email_address', 'mobile_no','company','city','cstate','desc','attachment','security');
		//Note: assign field type
		var field_type = new Array("required", "required", "required", "email", "phone",'required',"required","dropdown","required","doc_empty","required");
		//Note: assign field basic message  //(This will be used for your login)
		var field_msg = new Array('','','','','','','','','','','');
		//Note: assign field basic error message
		var field_error_msg = new Array(first_name_error,last_name_error,designation_error,email_error,mob_num_error,comapany_error,city_error,state_error,desc_error,file_error,captcha_txt_error);
		//Note: assign field advance error message
		var field_adv_error_msg = new Array('', '', '',email_address_valid_error,mobile_number_valid_error,'', '', '','',file_error_adv,captcha_txt_incorrect);
		var field_length=field_name.length;
		var set_foucs=undefined;

		//Note: to get particular field name and field type when user foucus out the control
		if(par_field_name!=undefined){
			var index=-1;
			index =field_name.indexOf(''+par_field_name+'');
			field_type = new Array(field_type[index]);
			field_name = new Array(field_name[index]);
			field_msg = new Array(field_msg[index]);
			field_error_msg = new Array(field_error_msg[index]);
			field_adv_error_msg = new Array(field_adv_error_msg[index]);
				set_foucs='false';
		}
		var validation = item_validation(field_name, field_type,field_msg,field_error_msg,field_adv_error_msg,set_foucs);
			if(security_code_exists == "false"){
			jQuery('#security').parent('div').removeClass('message');
			jQuery('#security').parent('div').find(".errorMsg").hide().text("Please enter the text in the image");
		}
		else if(security_code_exists =='true'){
			 jQuery('#security').parent('div').addClass('message');
			if(jQuery.trim(jQuery("#security").val()) != '')
					jQuery('#security').parent('div').find(".errorMsg").show().text("Incorrect value entered");
				else
					jQuery('#security').parent('div').find(".errorMsg").show().text("Please enter the text in the image");
		}
		if(event_name == 'blur'){
			check_fields = false;
			return false;
		}
		if(par_field_name!=undefined){
			return false;
		}

		if (validation == true && security_code_exists == 'false' && field_length == field_name.length && par_field_name == undefined) {
		jQuery('#security').parent('div').removeClass('message');
			jQuery('#security').parent('div').find(".errorMsg").hide().text("Please enter the text in the image");
			return true;

		} else {
		  jQuery("#form_submit").html("<span>"+submit+"</span>").removeAttr("disabled", "disabled");
		  jQuery("#cancel").show();
		  return false;
		}
		
	}
	return false;
 }

 /*Note: The following script is used to valiate the form of job seekers details*/
 // --- Start ----
 function validate_profile_info(par_field_name,event_name) {
	if($("#form_submit").is(':enabled')){
		/*Note: The following script is used for to show/hide the placeholder text*///Note: show the processing text when user submit the form
	    if(par_field_name==undefined){
		 	jQuery("#form_submit").attr("disabled","disabled").html("<span class='processing'>"+Processing+"</span>");
		    jQuery("#cancel").hide();
		}
		
		//check_email_exists("email_address");
		//Note: assign field name
		var field_name = new Array('full_name', 'parent_name', 'dob','gender', 'present_door_no','present_street_name','present_area1','present_city','present_state_id','present_district_id','present_pincode', 'permanent_door_no','permanent_street_name','permanent_area1','permanent_city','permanent_state_id','permanent_district_id','permanent_pincode', 'mobile_no1', "language","mother_tongue_id","nationality","marital_status","profile_photo");
		//Note: assign field type
		var field_type = new Array("required", "required", "required",'radio', "required","required","required","required", "dropdown", "dropdown", "required", "required","required","required","required", "dropdown", "dropdown", "required", "phone", "fcbkrequired", "dropdown","required","dropdown","image_empty");
		//Note: assign field basic message  //(This will be used for your login)
		var field_msg = new Array('','','','','','','','','','','','','','','','','','','','','','','','');
		//Note: assign field basic error message
		var field_error_msg = new Array(full_name_error, parent_name_error, dob_error,gender_select_error, street_no_error, street_name_error, area1_error, city_town_error, state_error, district_error, pincode_error,street_no_error, street_name_error, area1_error, city_town_error, state_error, district_error, pincode_error, mobile_number_error, language_proficiency_error, mother_tongue, nationality_error,marital_status_error, photo_upload_error);
		//Note: assign field advance error message
		var field_adv_error_msg = new Array('', '', '','', '', '', '', '', '', '', '', '', '', '', '', '', '', '', mobile_number_adv_error, '', '', photo_upload_advance_error, email_address_valid_error,'','', '', '');
		var field_length=field_name.length;
		var set_foucs=undefined;

		//Note: to get particular field name and field type when user foucus out the control
		if(par_field_name!=undefined){
			var index=-1;
			index =field_name.indexOf(''+par_field_name+'');
			field_type = new Array(field_type[index]);
			field_name = new Array(field_name[index]);
			field_msg = new Array(field_msg[index]);
			field_error_msg = new Array(field_error_msg[index]);
			field_adv_error_msg = new Array(field_adv_error_msg[index]);
				set_foucs='false';
		}
		var validation = item_validation(field_name, field_type,field_msg,field_error_msg,field_adv_error_msg,set_foucs);
		if(event_name == 'blur'){
			check_fields = false;
			return false;
		}
		if(par_field_name!=undefined){
			return false;
		}

		if (validation == true && field_length == field_name.length && par_field_name == undefined) {
			var id_no = 0,height_type='';
			jQuery("[name='id_no'] option").each(function(){	
				if(jQuery(this).attr("selectedindex")){
					id_no = jQuery(this).val();
				}
			});
			jQuery("[name='id_no']").val(id_no);
			jQuery("[name='height_type'] option").each(function(){	
				if(jQuery(this).attr("selectedindex")){
					height_type = jQuery(this).val();
				}
			});
			jQuery("[name='height_type']").val(height_type);
			var main_input = jQuery.trim(jQuery("#language").next(".holder").find(".maininput").val());
			if(main_input!=''){
				jQuery("#language").html(jQuery("#language").html()+"<option value='"+main_input+"' selected='selected'>"+main_input+"</option>");
			}
			var sfield_name = new Array("id_no","height_type");
			jQuery(sfield_name).map(function(i){
				var seleted_value = '';
				jQuery("[name='"+sfield_name[i]+"'] option").each(function(){	
					if(jQuery(this).attr("selected") == "selected"){
						jQuery("[name='"+sfield_name[i]+"']").val(jQuery(this).val());
					}
				});
				
			
				
			});
			return true;

		} else {
		  jQuery("#form_submit").html("<span>"+save+"</span>").removeAttr("disabled", "disabled");
		  jQuery("#cancel").show();
		  return false;
		}
	}
	return false;
 }

 function validate_education_info(par_field_name,event_name,control_index) {
	if($("#form_submit").is(':enabled')){
		//Note: show the processing text when user submit the form

		if (par_field_name == undefined) {
			jQuery("#form_submit").html("<span class='processing'>"+Processing+"</span>").attr("disabled", "disabled");
			jQuery("#cancel").hide();
		}
    
		/* validate 10th standard field */
		        //Note: assign field name
        var field_name_10 = new Array('school_year_passing','school_marks_percentage');
        //Note: assign field type
        var field_type_10 = new Array("dropdown","mark");
        //Note: assign field basic message  //(This will be used for your login)
        var field_msg_10 = new Array('','');
        //Note: assign field basic error message
        var field_error_msg_10 = new Array(year_passing_error,mark_error);
        //Note: assign field advance error message
        var field_adv_error_msg_10 = new Array('', '');
		

		/* validate 12th standard field 
        //Note: assign field name
        var field_name_12 = new Array('hsc_school_name','hsc_school_type', 'hsc_school_year_passing','hsc_school_marks_percentage', 'groups_id');
        //Note: assign field type
        var field_type_12 = new Array("required","dropdown","dropdown", "mark", "dropdown");
        //Note: assign field basic message  //(This will be used for your login)
        var field_msg_12 = new Array( '', '', '','','');
        //Note: assign field basic error message
        var field_error_msg_12 = new Array(school_name_error,school_type_error,year_passing_error, mark_error, department_name_error);
        //Note: assign field advance error message
        var field_adv_error_msg_12 = new Array( '', '', '','','');*/
		
		field_name = field_name_10;//jQuery.merge(field_name_10, field_name_12);
		field_type = field_type_10;//jQuery.merge(field_type_10, field_type_12);
		field_msg = field_msg_10;//jQuery.merge(field_msg_10, field_msg_12);
		field_error_msg = field_error_msg_10;//jQuery.merge(field_error_msg_10, field_error_msg_12);
		field_adv_error_msg = field_adv_error_msg_10;//jQuery.merge(field_adv_error_msg_10, field_adv_error_msg_12);
		
        if (jQuery("#experience:checked").val() == 'on') {
		
              var field_name1 = new Array("after_school","degree","departments", "year_passing","percentage_marks", "institute_name", "university",  "course_type");
            var field_type1 = new Array("sheepit_dropdown","sheepit_dropdown", "sheepit_dropdown", "sheepit_dropdown", "sheepit_mark", "sheepit_required", "sheepit_required", "sheepit_dropdown");
			  //Note: assign field basic message  //(This will be used for your login)
            var field_msg1 = new Array('', '', '', '', '', '', '', '');
            //Note: assign field basic error message
            var field_error_msg1 = new Array(qualification_error, degree_error, specialization_error,year_passing_error, mark_error ,institute_name_error, university_error,  course_type_error);
            //Note: assign field advance error message
            var field_adv_error_msg1 = new Array('', '',  '', '', '', '', '', '');
            jQuery.merge(field_name, field_name1); jQuery.merge(field_type, field_type1); jQuery.merge(field_msg, field_msg1);
            jQuery.merge(field_error_msg, field_error_msg1); jQuery.merge(field_adv_error_msg, field_adv_error_msg1);
        
		}
	
        var field_length = field_name.length;
        var set_foucs = undefined;
        //Note: to get particular field name and field type when user foucus out the control
        if (par_field_name != undefined) {
			par_field_name = par_field_name.replace(/\[]/g,'');
			var index = -1;
			var sheepit_control = jQuery("[name='"+par_field_name+"']:eq("+control_index+")").attr("id");
			
				//Note: to get the particular control index from the array of field name
			    if(( sheepit_control!=undefined && sheepit_control!='') ){ //&& field_name.indexOf(''+sheepit_control.replace('0','')+'')!=-1
				  index =field_name.indexOf(''+sheepit_control.replace(/\d|_inc_count/g,'')+'');
				} 
				else
				  index =field_name.indexOf(''+par_field_name+'');
				
            //Note: to get the particular control index from the array of field name
			//index = field_name.indexOf('' + par_field_name + '');

            field_type = new Array(field_type[index]);
            field_name = new Array(field_name[index]);
            field_msg = new Array(field_msg[index]);
            field_error_msg = new Array(field_error_msg[index]);
            field_adv_error_msg = new Array(field_adv_error_msg[index]);
            set_foucs = 'false';
		}

     var validation = item_validation(field_name, field_type, field_msg, field_error_msg, field_adv_error_msg,set_foucs,undefined,control_index);

	 if(jQuery(".x_std").find(".message").length == 0)
	   jQuery(".tenth").removeClass("fillDetail");
	 else
		jQuery(".tenth").addClass("fillDetail");	 
      if(jQuery(".xii_std").find(".message").length == 0)
	   jQuery(".twelth").removeClass("fillDetail");
	 else
		jQuery(".twelth").addClass("fillDetail"); 
		
    if (event_name == 'blur') {
        check_fields = false;
        return false;
    }
    if (par_field_name != undefined) {
        return;
    }

    if ((validation == true && field_length == field_name.length && par_field_name == undefined)) {
		
		var sfield_name = new Array("school_type","hsc_school_type","school_year_passing","hsc_school_year_passing");
		jQuery(sfield_name).map(function(i){
			var seleted_value = '';
			jQuery("[name='"+sfield_name[i]+"'] option").each(function(){	
				if(jQuery(this).attr("selectedindex")){
					seleted_value = jQuery(this).val();
				}
			});
			jQuery("[name='"+sfield_name[i]+"']").val(seleted_value);
			
		});
		
        return true;
    } else {
    jQuery("#form_submit").html("<span>"+save+"</span>").removeAttr("disabled", "disabled");
        jQuery("#cancel").show();
        return false;
    }
   }	
    return false;

 }
 jQuery(".validate_family_details").click(function(){
	if($(this).is(':enabled')){
		jQuery(this).prop("disabled",true);
		jQuery(this).html("<span class='processing'>"+Processing+"</span>");
		jQuery("#cancel").hide();
		jQuery("#submit").click();
	}
});
 
 function validate_expeirence_info(par_field_name,event_name,control_index){
	
	if($("#form_submit").is(':enabled')){
		//Note: show the processing text when user submit the form

		if (par_field_name == undefined) {
			jQuery("#form_submit").html("<span class='processing'>"+Processing+"</span>").attr("disabled", "disabled");
			jQuery("#cancel").hide();
		}
		 if (jQuery("[name='experience']:checked").val() != "I have experience")  {
			 var skill_set = jQuery.trim(jQuery("#skill_sets_annoninput :text").val());
			if(skill_set != '') { 
				jQuery("select#skill_sets").html(jQuery("select#skill_sets").html()+"<option selected='selected'>"+skill_set+"</option>");
			}
			return true;
		 }
		
	        //Note: assign field name
			  
				 field_name = new Array('exp_year-exp_month', 'current_salary', 'company_name','exp_from_year-exp_from_month','exp_to_year-exp_to_month', 'job_type', 'job_location', 'position');
				//Note: assign field type
	
					field_type = new Array("total_exp", "required", "sheepit_required", 'sheepit_work_period','sheepit_work_period',"sheepit_dropdown", "sheepit_required", "sheepit_required");
				
				//Note: assign field basic message  //(This will be used for your login)
				 field_msg = new Array('', '', '', '', '', '', '', '', '','');
				 field_error_msg = new Array(total_experience_error, current_salary_error, company_name_error,work_experience_error,work_experience_error, job_type_error, job_location_error,  position_error);
				//Note: assign field advance error message
				 field_adv_error_msg = new Array('', '', '', '', '', '', '', '','');
			 
	        //Note: assign field basic error message
	        
	        var field_length = field_name.length;
	        var set_foucs = undefined;
	        //Note: to get particular field name and field type when user foucus out the control
	        if (par_field_name != undefined) {
	            var index = -1;
	           	par_field_name = par_field_name.replace(/\[]/g,'');
				
			var index = -1;
			var sheepit_control = jQuery("[name='"+par_field_name+"']:eq("+control_index+")").attr("id");
			
				//Note: to get the particular control index from the array of field name
			    if(( sheepit_control!=undefined && sheepit_control!='') ){ //&& field_name.indexOf(''+sheepit_control.replace('0','')+'')!=-1
				  index =field_name.indexOf(''+sheepit_control.replace(/\d|_inc_count/g,'')+'');
				} 
				else
				  index =field_name.indexOf(''+par_field_name+'');
	            //Note: to get the particular control index from the array of field name
				index = field_name.indexOf('' + par_field_name + '');
	            field_type = new Array(field_type[index]);
	            field_name = new Array(field_name[index]);
	            field_msg = new Array(field_msg[index]);
	            field_error_msg = new Array(field_error_msg[index]);
	            field_adv_error_msg = new Array(field_adv_error_msg[index]);
	            set_foucs = 'false';
	        }


	        validation = item_validation(field_name, field_type, field_msg, field_error_msg, field_adv_error_msg,set_foucs);
	    
		
	  
	    if (event_name == 'blur') {
	        check_fields = false;
	        return false;
	    }
	    if (par_field_name != undefined) {
	        return;
	    }
		
	    if ((validation == true && field_length == field_name.length && par_field_name == undefined)) {
			
			var confirm_location = true;
			if(jQuery.trim(jQuery("#job_location_inc").val()).toLowerCase() == jQuery.trim(jQuery("#present_city").val()).toLowerCase()){
				
				confirm_location = false;
			}	
			 var skill_set = jQuery.trim(jQuery("#skill_sets_annoninput :text").val());
			 if(skill_set != '') { 
				jQuery("select#skill_sets").html(jQuery("select#skill_sets").html()+"<option selected='selected'>"+skill_set+"</option>");
			}
			if(confirm_location){
					$.alerts.dialogClass = 'confirm_';
					$.alerts.okButton = '&nbsp;Yes&nbsp;';
					$.alerts.cancelButton = '&nbsp;No&nbsp;';
					jConfirm(alrt_update_present_address, 'Confirmation', function(r) {
						jQuery("#submit_form").closest("form").removeAttr("onsubmit");
						jQuery("#submit_form").removeAttr("disabled", "disabled");
						if(r == true){
							jQuery("#submit_form").closest("form").append("<input type='hidden' name='update_address' value='yes'/>");
							
						}
						jQuery("#submit_form").attr("submit","submit").click();
					});	
				
			}	
			else
				return true;
	    } else {
			jQuery("#form_submit").html("<span>"+save+"</span>").removeAttr("disabled", "disabled");
			jQuery("#cancel").show();
	        return false;
	    }
	}	
	return false;
  
 }
 // --- End   ----
jQuery(document).ready(function() {
	//Retain min and max experience in advance search form
	if(jQuery("#search_min_exp").length > 0 && jQuery("#search_min_exp").val() != ''){
		var ratain_value = jQuery("#search_min_exp").val();
		ratain_value = ratain_value == 'Fresher' ? '0 Month' :ratain_value;
		var index = jQuery("#min_exp option[value='"+ratain_value+"']").index();
		jQuery("#min_exp option[value='"+ratain_value+"']").attr("selected","selected").attr("selectedindex",index); // retain min experience
		jQuery("#min_exp").after('<input type="hidden" name="min_exp_name" id="min_exp_name" value="'+jQuery("#search_min_exp").val()+'"/>');
	}	
	if(jQuery("#search_max_exp").length > 0 && jQuery("#search_max_exp").val() != ''){
		var index = jQuery("#max_exp option[value='"+jQuery("#search_max_exp").val()+"']").index();
		jQuery("#max_exp option[value='"+jQuery("#search_max_exp").val()+"']").attr("selected","selected").attr("selectedindex",index);// retain max experience
		jQuery("#max_exp").after('<input type="hidden" name="max_exp_name" id="max_exp_name" value="'+jQuery("#search_max_exp").val()+'"/>');
	}
				
  // function to get the refferal details
	jQuery("#referral_code").bind("blur",function(e){ 
	
		if(jQuery(this).val() != '') {
				//jQuery('#referral_code').parent('div').addClass('message');
				jQuery('#referral_code').parent('div').find("span.available").hide();
				//jQuery('#referral_code').parent('div').find(".errorMsg").show().text(checking);
			jQuery.post(jQuery("#page_url").val()+"registration/",{action:'refer_details',referral_code:jQuery(this).val(),request_type:'ajax'},function(data){
			
				if(data == 'wrong') {
					jQuery('#referral_code').parent('div').find(".errorMsg").show().text('');
					jQuery('#referral_code').parent('div').removeClass('message');
					//jQuery('#referral_code').parent('div').find(".errorMsg").show().text(err_referral_code);
				}
				else if(data != ''){
					jQuery('#referral_code').parent('div').find(".errorMsg").show().text('');
					jQuery('#referral_code').parent('div').removeClass('message');
					jQuery('#referral_code').parent('div').find("span.available").show();
					var detail = jQuery.trim(data).split('~');
					if(detail[0] == 'E') {
						jQuery('#email_address').val(detail[1]);
					}					
					else if(detail[0] == 'M') {
						jQuery('#mobile1').val(detail[1]);
					}
					else {
						jQuery('#referral_code').parent('div').find("span.available").hide();
					}
				}
				else {
					jQuery('#referral_code').parent('div').find(".errorMsg").show().text('');
					jQuery('#referral_code').parent('div').removeClass('message');
				}
			});
		}
		else if(jQuery(this).val() == '') {
			jQuery('#referral_code').parent('div').find(".errorMsg").show().text('');
			jQuery('#referral_code').parent('div').removeClass('message');
			jQuery('#referral_code').parent('div').find("span.available").hide();
		}
	});
});

if($('#cur_page').length > 0){
	if($('#after_school_inc').val() != '6'  && $('#after_school_inc').val() != '7' && $('#after_school_inc').val() != '' ){
		$('.degreeDiv').show();
	}else{
		$('.degreeDiv').hide();
	}
	if($('#exp_year').val() > 0){
		$('.monthDiv').show();
		$('.industryDiv').show();
	}else{
		$('.monthDiv').hide();
		$('.industryDiv').hide();
	}
	if($('#reference').val() == '10'){
		$('#refer_others').show();
	}else{
		$('#refer_others').hide();
	}
	
}


function validate_reg_step(par_field_name,event_name){
	if($("#form_submit").is(':enabled')){
		jQuery("#photo").parent('.field').removeClass("message");
		jQuery("#photo").next(".errorMsg").hide();
	
	 if(par_field_name==undefined && jQuery("#validate_form").attr('name') == 'validate_reg_step'){
		 jQuery("#form_submit").attr("disabled","disabled").html("<span class='processing'>"+Processing+"</span>");
	 }
		if($('#after_school_inc').val() == '' || $('#after_school_inc').val() == '6' || $('#after_school_inc').val() == '7'){
			//Note: assign field name
			var field_name = new Array('full_name','mobile1','cstate','cdistrict',"after_school_inc",'exp_year','skill_sets',"email_address","password","cpassword");
			//Note: assign field type
			var field_type = new Array("required",'phone','dropdown','dropdown','dropdown','dropdown','required', "email", "password", "password");
			//Note: assign field basic message  //(This will be used for your login)
			var field_msg = new Array('','','','','','','','','','');
			//Note: assign field basic error message
			var field_error_msg = new Array(full_name_error,mobile_number_error,state_error, district_error,qualification_error,total_experience_error,skill_sets_bacis_error
			, email_address_error, password_error, cpassword_error);
			//Note: assign field advance error message
			var field_adv_error_msg = new Array('','','','','','','','','','');
		}else{
			//Note: assign field name
			var field_name = new Array('full_name','mobile1','cstate','cdistrict',"after_school_inc","degree_inc", "department_inc",'exp_year','skill_sets',"email_address","password","cpassword");
			//Note: assign field type
			var field_type = new Array("required",'phone','dropdown','dropdown','dropdown','dropdown','dropdown','dropdown','required', "email", "password", "password");
			//Note: assign field basic message  //(This will be used for your login)
			var field_msg = new Array('','','','','','','','','','','','');
			//Note: assign field basic error message
			var field_error_msg = new Array(full_name_error,mobile_number_error,state_error, district_error,qualification_error, degree_error, specialization_error,total_experience_error,
			skill_sets_bacis_error, email_address_error, password_error, cpassword_error);
			//Note: assign field advance error message
			var field_adv_error_msg = new Array('','','','','','','','','','','','');
		}
		var field_length=field_name.length;
		var set_foucs=undefined;
		//Note: to get particular field name and field type when user foucus out the control
		if(par_field_name!=undefined){
			var index=-1;
		    //Note: to get the particular control index from the array of field name
            if(field_name.indexOf(''+par_field_name+'-cpassword')!=-1)
			  index =field_name.indexOf(''+par_field_name+'-cpassword');
			else if(field_name.indexOf('password-'+par_field_name+'')!=-1)
			  index =field_name.indexOf('password-'+par_field_name+'');
			else
			index =field_name.indexOf(''+par_field_name+'');
			field_type = new Array(field_type[index]);
			field_name = new Array(field_name[index]);
			field_msg = new Array(field_msg[index]);
			field_error_msg = new Array(field_error_msg[index]);
			field_adv_error_msg = new Array(field_adv_error_msg[index]);
			set_foucs='false';
		}
		
		var validation = item_validation(field_name, field_type,field_msg,field_error_msg,field_adv_error_msg,set_foucs);
		
		if(event_name == 'blur'){
			check_fields = false;
			return false;
		}		
		if(par_field_name!=undefined){
			if(par_field_name == "email_address" && validation == false){
				jQuery(".available").hide();
			}
			return false;
		}
	email_exists = 'false';
	
	if(validation == true && email_exists == 'false' && field_length == field_name.length && par_field_name == undefined) {
		jQuery('#email_address').parent('div').removeClass('message');
		jQuery('#email_address').parent('div').find(".errorMsg").hide();	
		if(jQuery("select#pdistrict option:selected").val() !=undefined && jQuery("#h_pdistrict").length) 
			jQuery("#h_pdistrict").val(jQuery("select#pdistrict option:selected").val());
			return true;
		}else{
			jQuery("#form_submit").html("<span>Register</span>").removeAttr("disabled", "disabled");
			jQuery(".errorField").show();
			return false;
		}
	}
	
	return false;
}


		
		

function validate_step1(par_field_name,event_name) {
	if($("#form_submit").is(':enabled')){
	jQuery("#photo").parent('.field').removeClass("message");
	jQuery("#photo").next(".errorMsg").hide();
	/* */
/*Note: The following script is used for to show/hide the placeholder text*/
        //Note: show the processing text when user submit the form
	    if(par_field_name==undefined && jQuery("#validate_form").attr('name') == 'validate_step1'){
		 	jQuery("#form_submit").attr("disabled","disabled").html("<span class='processing'>"+Processing+"</span>");
		    //jQuery("#cancel").hide();
		}
		
		//check_email_exists("email_address");
		//Note: assign field name
		var field_name = new Array('full_name', 'pname', 'dob','gender', 'cstreet_no','cstreet_name','carea1','ccity','cstate','cdistrict','cpincode', 'pstreet_no','pstreet_name','parea1','pcity','pstate','pdistrict','ppincode', 'mobile1', "language","mother_tongue","nationality","marital_status","photo","email_address","password","cpassword");
		//Note: assign field type
		var field_type = new Array("required", "required", "required",'radio', "required","required","required","required", "dropdown", "dropdown", "required", "required","required","required","required", "dropdown", "dropdown", "required", "phone", "fcbkrequired", "dropdown","required","dropdown", "image_empty", "email", "password", "password");
		//Note: assign field basic message  //(This will be used for your login)
		var field_msg = new Array('','','','','','','','','','','','','','','','','','','','','','','','','','','');
		//Note: assign field basic error message
		var field_error_msg = new Array(full_name_error, parent_name_error, dob_error,gender_select_error, street_no_error, street_name_error, area1_error, city_town_error, state_error, district_error, pincode_error,street_no_error, street_name_error, area1_error, city_town_error, state_error, district_error, pincode_error, mobile_number_error, language_proficiency_error, mother_tongue,nationality_error,marital_status_error, photo_upload_error, email_address_error, password_error, cpassword_error);
		//Note: assign field advance error message
		var field_adv_error_msg = new Array('', '', '','', '', '', '', '', '', '', '', '', '', '', '', '', '', '', mobile_number_adv_error, '', '','','', photo_upload_advance_error, email_address_valid_error, '', '');
		var field_length=field_name.length;
		var set_foucs=undefined;
		//Note: to get particular field name and field type when user foucus out the control
		if(par_field_name!=undefined){
			var index=-1;
		    var sheepit_control = jQuery("[name='"+par_field_name+"']").attr("id");
		    //Note: to get the particular control index from the array of field name
            if(field_name.indexOf(''+par_field_name+'-cpassword')!=-1)
			  index =field_name.indexOf(''+par_field_name+'-cpassword');
			else if(field_name.indexOf('password-'+par_field_name+'')!=-1)
			  index =field_name.indexOf('password-'+par_field_name+'');
			else if(( sheepit_control!=undefined && sheepit_control!='') && field_name.indexOf(''+sheepit_control.replace('0','')+'')!=-1)
			  index =field_name.indexOf(''+sheepit_control.replace('0','')+'');
			else
			  index =field_name.indexOf(''+par_field_name+'');
			field_type = new Array(field_type[index]);
			field_name = new Array(field_name[index]);
			field_msg = new Array(field_msg[index]);
			field_error_msg = new Array(field_error_msg[index]);
			field_adv_error_msg = new Array(field_adv_error_msg[index]);
				set_foucs='false';
		}
		
		var validation = item_validation(field_name, field_type,field_msg,field_error_msg,field_adv_error_msg,set_foucs);
		
		/*
		if(email_exists=='true')
		{
			jQuery("#email").addClass("error");
			jQuery("#email_error").addClass("error").text(email_address_try_another_error);
		}else if(email_exists =='false'){
			jQuery("#email").removeClass("error");
			//(This will be used for your login)
			jQuery("#email_error").removeClass("error").text(email_address_error);
		}
	    else if(email_exists =='' && par_field_name == 'email'){
			jQuery("#email").addClass("error");
			jQuery("#email_error").text(email_address_error);

		}
		*/

		 if(event_name == 'blur'){
			check_fields = false;
			return false;
		}
		
		if(par_field_name!=undefined){
			if(par_field_name == "email_address" && validation == false){
				jQuery(".available").hide();
			}
			return false;
		}

email_exists = 'false';
/*
var exist_val = jQuery("#email_invalid").val();
if( exist_val == '1') {
	email_exists = 'false';
}
else if(exist_val == '0') {
	email_exists = 'true';
}
*/

if (validation == true && email_exists == 'false' && field_length == field_name.length && par_field_name == undefined) {
		jQuery('#email_address').parent('div').removeClass('message');
		jQuery('#email_address').parent('div').find(".errorMsg").hide();
    //document.forms["service_register"].submit();
    //window.location.href = "registration_step2.php";
	if(par_field_name==undefined && jQuery("#validate_form").attr('name') == 'step1_step3'){
		 	jQuery("#goto_step3").attr("disabled","disabled").html("<span class='processing'>"+Processing+"</span>");
			return true;
		    //jQuery("#cancel").hide();
	}
	var main_input = jQuery.trim(jQuery("#language").next(".holder").find(".maininput").val());
	if(main_input!=''){
		jQuery("#language").html(jQuery("#language").html()+"<option value='"+main_input+"' selected='selected'>"+main_input+"</option>");
	}
	if(jQuery("select#pdistrict option:selected").val() !=undefined && jQuery("#h_pdistrict").length) 
		jQuery("#h_pdistrict").val(jQuery("select#pdistrict option:selected").val());
    return true;

} else {
	  jQuery("#form_submit").html("<span>"+go_to_step2+"</span>").removeAttr("disabled", "disabled");
	  jQuery(".errorField").show();
	  // jQuery("#cancel").show();
	  
	  return false;
}
}
	return false;

}

/* -- -- */

jQuery('#goto_step3').live('click', function(){ 
	jQuery('#validate_form').attr('name', 'step1_step3');
	jQuery("#submit_form").val('step3').click();
	
});



var back_step1 = '';
var back_step2 = '';
/* go back to step1 from step2 or step3 without complete the step*/
jQuery('#goto_step1').live('click', function(){
	back_step1 = 'true';
	jQuery("#submit_form").val('step1').click();
});

/* go back to step2 from step3 without complete the step*/
jQuery('#goto_step2').live('click', function(){
	back_step2 = 'true';
	jQuery("#submit_form").val('step2').click();
});

/*Note: The following script is used to validate step 2 registration form*/
function validate_step2(par_field_name, event_name,control_index) {
	if($("#form_submit").is(':enabled')){
		//if we go back
		if((back_step1 == 'true')) {
			return true;
		}

	jQuery(".errorField").hide();
    //Note: show the processing text when user submit the form

    if (par_field_name == undefined) {
        jQuery("#form_submit").html("<span class='processing'>"+Processing+"</span>").attr("disabled", "disabled");
        //jQuery("#cancel").hide();
    }
    
		/* validate 10th standard field */
		        //Note: assign field name
        var field_name = new Array('sch_year_of_passing','sch_mark','hsc_sch_mark');
        //Note: assign field type
        var field_type = new Array("dropdown","mark","mark");
        //Note: assign field basic message  //(This will be used for your login)
        var field_msg = new Array( '','');
        //Note: assign field basic error message
        var field_error_msg = new Array(year_passing_error,mark_error,mark_error);
        //Note: assign field advance error message
        var field_adv_error_msg = new Array( '', 'msg: % of marks must not be zero',"optional");
		

		/* validate 12th standard field
        //Note: assign field name
        var field_name_12 = new Array( '','', '');
        //Note: assign field type
        var field_type_12 = new Array("", "", "");
        //Note: assign field basic message  //(This will be used for your login)
        var field_msg_12 = new Array( '', '', '');
        //Note: assign field basic error message
        var field_error_msg_12 = new Array('', '', '');
        //Note: assign field advance error message
        var field_adv_error_msg_12 = new Array( '', '', '');
		
		field_name = jQuery.merge(field_name_10, field_name_12);
		field_type = jQuery.merge(field_type_10, field_type_12);
		field_msg = jQuery.merge(field_msg_10, field_msg_12);
		field_error_msg = jQuery.merge(field_error_msg_10, field_error_msg_12);
		field_adv_error_msg = jQuery.merge(field_adv_error_msg_10, field_adv_error_msg_12);*/

        if ((jQuery("#experience:checked").val() == 'on') && (jQuery('input:radio[name=graduation_add]:checked').val() == 'add_now')) {
		
           var field_name1 = new Array("after_school","degree", "departments", "year_of_passing","mark", "institute_name", "university", "course_type");
           var field_type1 = new Array("sheepit_dropdown","sheepit_dropdown", "sheepit_dropdown", "sheepit_dropdown", "sheepit_mark", "sheepit_required", "sheepit_required", "sheepit_dropdown");
          
            //Note: assign field basic message  //(This will be used for your login)
            var field_msg1 = new Array('', '', '', '', '', '', '', '');
            //Note: assign field basic error message
            var field_error_msg1 = new Array(qualification_error, degree_error, specialization_error, year_passing_error, mark_error ,institute_name_error, university_error, course_type_error);
            //Note: assign field advance error message
            var field_adv_error_msg1 = new Array('', '',  '', '', 'msg: % of marks must not be zero', '', '', '');
            jQuery.merge(field_name, field_name1); jQuery.merge(field_type, field_type1); jQuery.merge(field_msg, field_msg1);
            jQuery.merge(field_error_msg, field_error_msg1); jQuery.merge(field_adv_error_msg, field_adv_error_msg1);
        
		}
	
        var field_length = field_name.length;
        var set_foucs = undefined;
        //Note: to get particular field name and field type when user foucus out the control
        if (par_field_name != undefined) {
		//	par_field_name = par_field_name.replace(/\[]/g,'');
			var index = -1;
            var sheepit_control = jQuery("[name='"+par_field_name+"']:eq("+control_index+")").attr("id");
			
				//Note: to get the particular control index from the array of field name
			    if(( sheepit_control!=undefined && sheepit_control!='') ){ //&& field_name.indexOf(''+sheepit_control.replace('0','')+'')!=-1
				  index =field_name.indexOf(''+sheepit_control.replace(/\d|_inc_count/g,'')+'');
				} 
				else
				  index =field_name.indexOf(''+par_field_name+'');
				
            //Note: to get the particular control index from the array of field name
			//index = field_name.indexOf('' + par_field_name + '');

            field_type = new Array(field_type[index]);
            field_name = new Array(field_name[index]);
            field_msg = new Array(field_msg[index]);
            field_error_msg = new Array(field_error_msg[index]);
            field_adv_error_msg = new Array(field_adv_error_msg[index]);
            set_foucs = 'false';
    }

     var validation = item_validation(field_name, field_type, field_msg, field_error_msg, field_adv_error_msg,set_foucs);
	 	if(jQuery(".x_std").find(".message").length == 0)
			jQuery(".tenth").removeClass("fillDetail");
	 else
			jQuery(".tenth").addClass("fillDetail");	
	/*		
      if(jQuery(".xii_std").find(".message").length == 0)
	   jQuery(".twelth").removeClass("fillDetail");
	 else
		jQuery(".twelth").addClass("fillDetail"); 
	*/
    if (event_name == 'blur') {
        check_fields = false;
        return false;
    }
    if (par_field_name != undefined) {
        return;
    }

    if ((validation == true && field_length == field_name.length && par_field_name == undefined)) {
        //document.forms["service_register"].submit();
        //window.location.href = "registration_step3.php";
        return true;
    } else {
    jQuery("#form_submit").html("<span>"+go_to_step3+"</span>").removeAttr("disabled", "disabled");
		jQuery(".errorField").show();
        // jQuery("#cancel").show();
        return false;
    }
	}
    return false;
}


	/*Note: The following script is used to validate the step 3 registration form*/
	function validate_step3(par_field_name, event_name) {
		if($("#form_submit").is(':enabled')){
		//if we go back
		if((back_step1 == 'true') || (back_step2 == 'true')) {
			return true;
		}
		jQuery(".errorField").hide();
	
	    //Note: show the processing text when user submit the form
	    if (par_field_name == undefined) {
	        jQuery("#form_submit").html("<span class='processing'>"+Processing+"</span>").attr("disabled", "disabled");
	        //jQuery("#cancel").hide();
	    }
	    var validation = true,form_success = 'yes';

	  
	        form_success = '';
			var field_name='',field_type='',field_msg='',field_error_msg='',field_adv_error_msg='';
	        //Note: assign field name
			  
				 field_name = new Array('exp_year-exp_month', 'skill_sets', 'company_name', 'exp_from_year-exp_from_month', 'job_type', 'job_location', 'current_salary', 'position', 'nature_of_responsibility', 'company_name','exp_from_year-exp_from_month', 'job_type', 'job_location', 'position', 'nature_of_responsibility','resume');
				//Note: assign field type
				if (jQuery("[name='experience']:checked").val() == "I have experience") {
					field_type = new Array("total_exp", "required", " ", "sheepit_work_period","dropdown", "required", " ", "required", " ", " ", "sheepit_work_period","sheepit_dropdown", "sheepit_required", "sheepit_required", " ", "doc");
				} 
				else {
					field_type = new Array("", "", "", "", "", "", "", "", "", " ","", "", "", "", "", " ", "");
				}
				//Note: assign field basic message  //(This will be used for your login)
				 field_msg = new Array('', '', '', '', '', '', '', '', '','');
				 field_error_msg = new Array(total_experience_error, skill_sets_bacis_error, company_name_error, work_experience_error, job_type_error, job_location_error, current_salary_error, position_error, responsibility_error,company_name_error, work_experience_error, job_type_error, job_location_error, position_error, responsibility_error, resume_basic_error);
				//Note: assign field advance error message
				 field_adv_error_msg = new Array('', '', '', '', '', '', '', '', '','', '', '', '', '', '', resume_advance_error);
			 
	        //Note: assign field basic error message
	        
	        var field_length = field_name.length;
	        var set_foucs = undefined;
	        //Note: to get particular field name and field type when user foucus out the control
	        if (par_field_name != undefined) {
	            var index = -1;
	            var sheepit_control = jQuery("[name='" + par_field_name + "']").attr("id");
	            //Note: to get the particular control index from the array of field name
	            index = field_name.indexOf('' + par_field_name + '');
	            field_type = new Array(field_type[index]);
	            field_name = new Array(field_name[index]);
	            field_msg = new Array(field_msg[index]);
	            field_error_msg = new Array(field_error_msg[index]);
	            field_adv_error_msg = new Array(field_adv_error_msg[index]);
	            set_foucs = 'false';
	        }


	        validation = item_validation(field_name, field_type, field_msg, field_error_msg, field_adv_error_msg,set_foucs);
	   
		
	  
	    if (event_name == 'blur') {
	        check_fields = false;
	        return false;
	    }
	    if (par_field_name != undefined) {
	        return;
	    }


	    if (form_success == 'yes' || (validation == true && field_length == field_name.length && par_field_name == undefined)) {
	        //document.forms["service_register"].submit();
	        //window.location.href = "registration_success.php";
	        return true;
	    } else {

	        jQuery("#form_submit").html("<span>"+done+"</span>").removeAttr("disabled", "disabled");
				jQuery(".errorField").show();
	        // jQuery("#cancel").show();
	        return false;
	    }
	}	
	    return false;



	}
/* -- End --*/


/*Note: The Following function is used to submit the form when out focus the control */
jQuery(document).ready(function(){


     jQuery(".assing_state").change(function(){
		jQuery("[name='state_value']").val(jQuery(".assing_state option:selected").text());
	 });
	
	
	//Note: if the form has validate_form element, execute the following statement
	if(jQuery("#validate_form").length>0){
		// remove datepicker button error msg
		jQuery(".datepicker").focus(function(){	
			var control = jQuery(this);
			if(jQuery("[data-event]").length > 0){
				jQuery("[data-event]").click(function(){
					jQuery(control).blur();
				});
			}
		});	
		// remove radio button error msg
		jQuery(".radio").live("click",function(){
			  var control = jQuery(this).parents(".field");
			  control.removeClass("message");
			  control.find(".errorMsg").hide();
			
		});
		
		jQuery("#submit_form").live("click",function(e){
			if(jQuery(this).attr("submit") == "submit") {jQuery(this).prop("disabled",false);return true;}
			e.stopPropagation();
			//jQuery("form input,form select,form radio").on("blur");
			var	function_name = jQuery("#validate_form").val();
			form_submit = "form_submit";
			var cond = window[function_name]();
			if(cond == false){
				jQuery(this).closest("form").attr("onsubmit","return false;");
				jQuery(this).prop("disabled",true);
			}else{
				jQuery(this).closest("form").removeAttr("onsubmit");
				jQuery(this).prop("disabled",false);
			}
			return cond;

		});
		jQuery("#form_submit").live("keydown",function(e){
			var keyCode = e.which || e.keyCode;
			if(keyCode == 13){
				jQuery(this).trigger({type:"mousedown",keyCode:1,ktype:"keydown"});
			}
		});
		jQuery("#form_submit").live("mousedown",function(e){
			var keyCode = e.which || e.keyCode;
			if(keyCode == '1'){
				if(jQuery(this).find("span").text() != Processing){
					jQuery("#submit_form").prop("disabled",false);
				}
				e.stopPropagation();
				if(e.ktype == "keydown"){
					setTimeout(function(){
						//jQuery("form input,form select,form radio").off("blur");
						jQuery("#submit_form").click();
					},0);
				}else{
					jQuery("#submit_form").click();
				}
			}
		});
		var blur_event = true;
        if(jQuery("#validate_form").length > 0){
			
		//jQuery("#form_submit").parents("form").find("input:eq(0)").focus();	
		
		jQuery("form input,form textarea,form select,form radio,form checkbox").live("keypress keydown blur change",function(e){ //,.jquery-selectbox-currentItem: a, .jquery-selectbox2-currentItem: a
		if("verification_code" == jQuery(this).attr("id") || jQuery(this).closest('form').attr('id') == "search_jobs_form" || jQuery(this).closest('form').attr('name') == "header_login_form") return;
		var function_name =jQuery("#validate_form").val();
		var element_name = jQuery(this).attr("name");
		if(element_name == undefined && jQuery(this).hasClass("maininput")) {
			element_name = jQuery(this).parents(".holder").prev("select").attr("id");
		}
		
		/*if(jQuery(this).parent(".jquery-selectbox-currentItem").hasClass(".jquery-selectbox-currentItem"))
			alert(jQuery(this).parent(".jquery-selectbox-currentItem").next("select").attr("id"));*/
			if(e.type == 'change' && jQuery(this).is(":file")){
				e.type = 'blur';
			}
             if(this.id == "form_submit") {
					e.stopPropagation();
					jQuery("#submit_form").prop("disabled",false);
			 		jQuery("#submit_form").click();
			 }
			 else if(e.keyCode == 9 && e.type == 'keydown'){
				window[function_name](element_name,'',jQuery("[name='"+element_name+"']").index(this));
			 }
			  else if(e.type == 'blur' || e.type == 'focusout'){
		
						if(form_submit == 'form_submit'){
							form_submit = 'yes';
						}
				
						//jQuery("#form_submit").trigger({type:"click",keysCode:'13'});
						setTimeout(function(){window[function_name](element_name,'',jQuery("[name='"+element_name+"']").index(this))},0);

			 }
			 else if(e.type == 'keypress') {
				if (e.which == 13 && !jQuery(this).is("textarea") && jQuery(this).attr("rows") == undefined){
					e.stopPropagation();
					jQuery("#submit_form").prop("disabled",false);
					jQuery("#submit_form").click();
					
				 }
			 }
		  /*  else if(e.type == 'blur') {
			var control = this;
			   setTimer.timer = setTimeout(function () {
					window[function_name](jQuery(control).attr("name"),'blur');
			}, 300);


			}*/
			 else if(e.which == 0){
			    	 window[function_name](element_name);

			 }else if(this.id == 'form_submit' && e.type == 'click') {

				return (window[function_name]());

			 }
		});
		}
	}

});

jQuery('select:[placeholder]').live("click",function(e){	
	 jQuery("#"+this.id+" option:selected").removeClass('placeholder');
	 jQuery("#"+this.id).removeClass("placeholder");		
});
		
/*Note: The following script is used for to show/hide the placeholder text*/
jQuery('[placeholder]').live("focusin keyup", function(e) {
    var input = jQuery(this);
    if (input.is("input") || input.is("textarea")) {
	   if(e.type == 'keyup'){
			if(input.val() != input.attr('placeholder') && jQuery.trim(input.val()) != ''){
				input.removeClass('placeholder');
			}
	   }
       if (e.type == 'focusin') {
			if (input.val() == input.attr('placeholder')) {
				input.val('');
                //input.removeClass('placeholder');
                jQuery(input).clearQueue();

            }
		}
    }
});
/*Note: The following script is used for to show/hide the placeholder text*/
jQuery('[placeholder]').live('blur', function(e) {
       var input = jQuery(this);
	   
        if (jQuery("#" + this.id).is("select")) {
            if (e.type == 'click') {
			  jQuery("#" + this.id).removeClass("placeholder");
            }
        }
        if (jQuery(this).is("input") && e.type == "focusout") {

		    if (input.val() == '' || input.val().toLowerCase() == input.attr('placeholder').toLowerCase()) {
                input.addClass('placeholder');
                input.val(input.attr('placeholder'));
            }
        }
}).blur();
/* function for home page banner transition */
jQuery(window).load(function() {
	if(jQuery('#slider').length){ 
		jQuery('#slider').nivoSlider({effect:'fade',pauseTime: 6000, directionNav:true,
        controlNav:true,        controlNavThumbs:false,        pauseOnHover:true, manualAdvance:false});
	}
});


//call the testimonial,recent jobs click function automatically
// testimonial_click();
// function testimonial_click() {
	// setInterval(function(){jQuery(".next_button_t").click();},5000);
// }
//setTimeout(function(){jQuery(".next_button_t").click();},5000);
// get the click count of recent jobs
// var res_job_count = 0;
// function new_count(res_job_count1) {
	// jQuery.post(jQuery("#page_url").val()+jQuery("#language_url").val()+"recent_jobs/",{count:res_job_count1,total:'total'},function(data){
		// jQuery('div.slide_inner').show("slide", { direction: "left" }, 1000);	
		
		// if(res_job_count1 == -1)
			// res_job_count =  (data - 1);
		// else if(data == res_job_count1)
			// res_job_count =  0;
			// get_recent_jobs((res_job_count*2));
	// });
// }
	if(jQuery("[name='login_password']").length) {
		jQuery("[name='login_password']").click(function(){
			jQuery(this).focus();
		});
	}	
/* function to slide the recent jobs in the home page */
	// jQuery("#page_url").val()+"premium_jobs
	if(jQuery("#job_updates").length > 0){
		jQuery.getJSON(jQuery("#page_url").val()+"latest_updates/?count=0&url="+jQuery("#page_url").val()+jQuery("#language_url").val(), function (data) {
			
			jQuery("#job_updates").agile_carousel({
						carousel_data: data,
						carousel_outer_height: 135,
						carousel_height: 240,
						slide_height: 240,
						carousel_outer_width: 200,
						slide_width: 350,           
						timer: 5000,
						continuous_scrolling: true,
						number_slides_visible: 2,
						current_slide_number:1,
						control_set_1: "previous_button,group_numbered_buttons,next_button"	
			});
			
		});
	}
	
	if(jQuery("#logo_updates").length > 0){ 
		jQuery.getJSON(jQuery("#page_url").val()+"logo_updates/?count=0&url="+jQuery("#page_url").val()+jQuery("#language_url").val(), function (data) {
			jQuery("#logo_updates").agile_carousel({
						carousel_data: data,
						carousel_outer_height: 330,
						carousel_height: 330,
						slide_height: 330,
						carousel_outer_width: 270,
						slide_width: 133,           
						timer: 12000,
						continuous_scrolling: true,
						number_slides_visible: 7,
						current_slide_number:1,
						control_set_1: "previous_button,group_numbered_buttons,next_button"	
			});
			
		});
	}	
/* function to slide the testimonial in the home page */

	/*jQuery.getJSON(jQuery("#page_url").val()+"get_testimonial/?count="+0+"&url="+jQuery("#page_url").val()+jQuery("#language_url").val(), function (data) {
			
			jQuery("#testimonials").agile_carousel({
						carousel_data: data,
						carousel_outer_height: 86,
						carousel_height: 240,
						slide_height: 240,
						carousel_outer_width: 280,
						slide_width: 350,           
						timer: 4000,
						continuous_scrolling: true,
						number_slides_visible: 1,
						current_slide_number:1,
						control_set_1: ""	
			});
		});
	*/
	

// get the click count of testimonial
//count the click for assign the limit
// var res_job_count_t = 0;
// if(jQuery('#job_updates_t').length){ 
	// get_recent_jobs_t(res_job_count_t);
// }
// jQuery(".next_button_t").live("click",function(){
	// jQuery('div.job_updates_t').hide('fast');
	// res_job_count_t++;
	// new_count_t(res_job_count_t);
		
// });
// jQuery(".previous_button_t").live("click",function(){
	
	// jQuery('div.job_updates_t').hide('fast');
	// res_job_count_t--;
	// new_count_t(res_job_count_t);
	
// });

//fuction to get the limit of testimonial dynamically
// function new_count_t(res_job_count1_t) {
	
	//jQuery('div.job_updates_t').html('<img style="padding-top:35px; padding-left:140px;" src="'+jQuery("#page_url").val()+'images/loader.gif">');
	
	// jQuery.post(jQuery("#page_url").val()+jQuery("#language_url").val()+"get_testimonial/",{count:res_job_count1_t,total:'total'},function(data){
	// jQuery('div.job_updates_t').show("slide", { direction: "left" }, 1000);	
		// if(res_job_count1_t == -1)
			// res_job_count_t =  (data - 1);
		// else if(data == res_job_count1_t)
			// res_job_count_t =  0;
			// get_recent_jobs_t((res_job_count_t));
	// });
// }


/* function to slide the testimonial in the home page */
// function get_recent_jobs_t(res_job_count_t){	

		// jQuery.post(jQuery("#page_url").val()+"get_testimonial/?count="+res_job_count_t+"&url="+jQuery("#page_url").val()+jQuery("#language_url").val(), function (data) {
		  
	        // jQuery(".job_updates_t").html(data);
	       jQuery(".job_updates_t").show('fast');
		// });				
	// }
// ready
	//Note: for slide recent activity
function split( val ) {
			return val.split( /,\s*/ );

			}

function extractLast( term ) {
			return split( term ).pop();
		}
jQuery(document).ready(function() {
	/*Note: The following script is used for bring job name, email address or mobile and show in autocomplete*/	
	if(jQuery("#referral_keywords").length)
		autocomplete_single("referral_keywords","get_referral_keywords");		
	/*Note: The following script is used for bring job keywords/location and show in autocomplete*/	
	if(jQuery.isFunction(jQuery.fn.autocomplete) && (jQuery("#searchtxt").length) && (jQuery("#page_name").val() == 'job_alerts')){
		autocomplete("searchtxt","get_job_alerts");		
	}	
	/*Note: The following script is used for listing company in settings autocomplete*/	
	// $(":focus").each(function() {
		// alert("Focused Elem_id = "+ this.id );
	// });


	if(jQuery.isFunction(jQuery.fn.autocomplete) && (jQuery(".block_company").length) && (jQuery("#page_name").val() == 'settings')){
		autocomplete_single("block_company1","get_block_company");		
	}
	
	if(jQuery.isFunction(jQuery.fn.autocomplete) && (jQuery("#sel_company_name").length) ){
			autocomplete_single("sel_company_name","get_block_company");		
	}
	if(jQuery.isFunction(jQuery.fn.autocomplete) && (jQuery("#search_keyword").length || jQuery("#keywords").length) && (jQuery("#search_location").length || jQuery("#location").length)){
		autocomplete("search_keyword","get_keywords");		
		autocomplete("keywords","get_keywords");		
		autocomplete("search_location","get_locations");
		autocomplete("location","get_locations");		
	}
	/*Note: The following script is used for bring job education details and show in autocomplete*/	
	
	if(jQuery.isFunction(jQuery.fn.autocomplete)){
	
	    if(jQuery("#education").length)
			autocomplete("education","get_education",fcbk);		
		if(jQuery("#adv_form").find("#company").length)
			autocomplete("adv_form #company","get_company");		
		if(jQuery("#roles_name").length)
			autocomplete("roles_name","get_roles_name",fcbk);
		if(jQuery("#department_name1").length)
			autocomplete("department_name","get_departments",fcbk);				
	}
});	
    function focus_control(field){
		jQuery("#"+field).focus();
	}
	function fcbk(field,value){
	  value = value.substring(0,value.length-2);
	  var control =  jQuery("#"+field).next();
	  jQuery("#"+field).val("");
	  control.find(".maininput").val(value);
	  if(control.find(".maininput").val() != ''){
		control.find(".maininput").trigger("click");
		control.find(".maininput").trigger({type:"keydown",keyCode:13,focus:field,dont_check:'dont_check'});
	  }	
	  return false;
	}
	var validate_search_jobs = true;
	/*Note: The following script is used for search jobs*/
	jQuery("#search_jobs_form input").keydown(function(event){
		if(event.keyCode == 13){
		   setTimeout(function(){jQuery("#search_jobs").click();},1);
		}
	});
	if(jQuery("#search_jobs").length > 0){ 
		jQuery("#search_jobs").click(function(){
			if(!validate_search_jobs) {
				validate_search_jobs = true;
				return;
			}	
			var search_text = "" , location = "";
			
			if(jQuery("#search_keyword").attr("placeholder") != jQuery("#search_keyword").val()) 
				search_text = jQuery("#search_keyword").val().replace(/\#/g, "sharp");
				
			if(jQuery("#search_location").attr("placeholder") != jQuery("#search_location").val()) 
				location = jQuery("#search_location").val();
			/*if(jQuery.trim(jQuery("#search_keyword").next(".holder").find(".maininput").val())!='')
				search_text = search_text + ','+jQuery.trim(jQuery("#search_keyword").next(".holder").find(".maininput").val());*/
			
			if(jQuery.trim(jQuery("#search_location").next(".holder").find(".maininput").val()) !='')
				location = location + ',' + jQuery.trim(jQuery("#search_location").next(".holder").find(".maininput").val());
			search_text = jQuery.trim(search_text);location = jQuery.trim(location);	
			if(search_text[search_text.length-1] == ',') { search_text = search_text.substring(0,search_text.length-1); }
			if(location[location.length-1] == ',') { location = location.substring(0,location.length-1); }
		    if(search_text != '' || location != ''){			
				search_text = search_text.replace(/, /g,',');search_text = search_text.replace(/ /g,'+');
				location = location.replace(/, /g,',');location = location.replace(/ /g,'+');
				//var language_url = jQuery("#lang_url").attr("lang");
			    //language_url = language_url == undefined ? "en/" : language_url;
				var qstring_url = '?';
				if(search_text != '' && location == '')
					qstring_url = qstring_url + 'keywords='+search_text;
				else if(search_text == '' && location != '')
					qstring_url = qstring_url + 'location='+location;
				else
					qstring_url = qstring_url + 'keywords='+search_text+'&location='+location;
				
				window.location = jQuery("#page_url").val()+"search_jobs/"+qstring_url;
			}	
		});
	}

	/*Note: The following script is used for autocomplete*/
	function autocomplete(field,page_name,callback){
	jQuery("#"+field).bind( "keydown", function( event ) {
		if(event.keyCode == 13) {
			if(jQuery(".ui-autocomplete").is(":visible") == true)
				validate_search_jobs = false;
		}
		if ( event.keyCode === jQuery.ui.keyCode.TAB && jQuery( this ).data( "autocomplete" ).menu.active ) {
			event.preventDefault();
		}
	}).autocomplete({
		    selectFirst: true,
			source: function(request, response) {
				var value = jQuery.trim(request.term);
				if(value !='') 
					value = value.replace(/ /g, "`");
				$.getJSON(jQuery("#page_url").val()+page_name+"/"+"/?request_type=ajax", { term: value }, response);
			},
			focus: function() {
				// prevent value inserted on focus
				return false;
			},
			
			minLength: 1,//search after two characters
			max: 10,
			select: function(event,ui){
				
					var terms = split( this.value );
					// remove the current input
					terms.pop();
					// add the selected item
					terms.push( ui.item.value );
					// add placeholder to get the comma-and-space at the end
					terms.push( "" );
					this.value = terms.join( ", " );
					if(callback){
						callback(field,this.value);
					}
			return false;
		   }
	  });
}	

/*Note: The following script is used for autocomplete using class*/
	function autocomplete_single(field,page_name,callback){
	
	jQuery("#"+field).bind( "keydown", function( event ) {
	
		if ( event.keyCode === jQuery.ui.keyCode.TAB &&
				jQuery( this ).data( "autocomplete" ).menu.active ) {
			event.preventDefault();
		}
	  }).autocomplete({
			selectFirst: true,
			source: function(request, response) {
				var value = jQuery.trim(request.term);
				if(value !='') 
					value = value.replace(/ /g, "`");
				$.getJSON(jQuery("#page_url").val()+page_name+"/"+"/?request_type=ajax", { term: value }, response);
			},
			focus: function() {
					// prevent value inserted on focus
					return false;
			},
			
			minLength: 1,//search after two characters
			max: 10,
			select: function(event,ui){
					var terms = split( this.value );
					// remove the current input
					terms.pop();
					// add the selected item
					terms.push( ui.item.value );
					// add placeholder to get the comma-and-space at the end
					terms.push( "" );
					this.value = terms.join( "" );
					if(callback){
						callback(field,this.value);
					}
			return false;
		   }
	  });
}

/* function to load the vertical ticker for news */		
if(jQuery('#vertical-ticker').length){ 
	jQuery('#vertical-ticker').totemticker({
		row_height	:	'80px',
		next		:	'#ticker-next',
		previous	:	'#ticker-previous',
		stop		:	'#stop',
		start		:	'#start',
		mousestop	:	true,
		speed       :   800,
		interval    :   2000,
		direction	:	'down'
	});	
}

/* function to show/hide the graduate details */
jQuery(document).ready(function(){

	/*
	if((jQuery("#after_schools0").val() != undefined) && (jQuery("#after_schools0").val() < 0)) {

	}
	*/

	if(jQuery("input:checkbox[name=experience]:checked").length == 0) {

		jQuery("div#sheepItForm_controls ul li.add").css("display","none");
		//jQuery("div#sheepItForm").css("display","");
	}else{
	
		jQuery("div#sheepItForm_controls ul li.add").css("display","");
	}
	//jQuery(".not_graduate").show("fast");
	jQuery("div#sheepItForm").css("display","none");
	jQuery("ul.not_graduate1").css("display","");
	jQuery("ul.graduation").css("display","");
	jQuery("#registration_step2 .checkbox,#education .checkbox").live("click",function(){
		//jQuery(".not_graduate").toggle();
		var val=jQuery('input:checkbox[name=experience]:checked').val();
		
		if(val == 'on') {	
			jQuery("span.graduation_add").show();
			
			if(jQuery('input:radio[name=graduation_add]:checked').val() == 'add_now' || jQuery('input:radio[name=graduation_add]').length == 0){
				jQuery("ul.not_graduate1").css("display","");
				jQuery("div.not_graduate,ul.not_graduate").css("display","");
				jQuery("ul.graduation").css("display","");
				jQuery("div#sheepItForm").css("display","");
				jQuery("div#sheepItForm_controls ul li.add").css("display","");
			}	
		}
		else{
			// hide the error message
			jQuery('#registration_step2 #not_graduate,#education div#not_graduate,#education div#sheepItForm').find('div').removeClass('message');
			jQuery('#registration_step2 #not_graduate,#education div#not_graduate,#education div#sheepItForm').find('span.errorMsg').hide();
			/*
			jQuery("[id^=sheepItForm]").each( function() {
				jQuery('div#'+this.id).hide();
			});
			jQuery('div#sheepItForm_controls').show();
			*/
			jQuery("ul.not_graduate1").css("display","none");
			jQuery("div.not_graduate,ul.not_graduate").css("display","none");
			jQuery("ul.graduation").css("display","none");
			jQuery("div#sheepItForm").css("display","none");
			jQuery("span.graduation_add").hide();
		}
	});
	
	
//hide the graduation details during click i will add later
jQuery(".graduation_add").live("click",function(){
		var val_1 =jQuery('input:radio[name=graduation_add]:checked').val();
		if(jQuery.trim(val_1) == 'add_now') {
			jQuery("ul.not_graduate1").css("display","");
			jQuery("div.not_graduate,ul.not_graduate").css("display","");
			jQuery("ul.graduation").css("display","");
			jQuery("div#sheepItForm").css("display","");
			jQuery("div#sheepItForm_controls ul li.add").css("display","");
			return false;
		}
		else{

			// hide the error message
			jQuery('#registration_step2,#education div#not_graduate,#registration_step2,#education div#sheepItForm').find('div').removeClass('message');
			jQuery('#registration_step2,#education div#not_graduate,#registration_step2,#education div#sheepItForm').find('span.errorMsg').hide();
			/*
			jQuery("[id^=sheepItForm]").each( function() {
				jQuery('div#'+this.id).hide();
			});
			jQuery('div#sheepItForm_controls').show();
			*/
			jQuery("ul.not_graduate1").css("display","none");
			jQuery("div.not_graduate,ul.not_graduate").css("display","none");
			jQuery("ul.graduation").css("display","none");
			jQuery("div#sheepItForm").css("display","none");
			return false;

		}		
});

/* function to show/hide the experience details */	
jQuery(".radio").live("click",function(){

	var val=jQuery('input:radio[name=experience]:checked').val();
	if(val == "I have experience"){
		jQuery(".donot_experience").show();
		jQuery(".exp_star").show();
		jQuery("#frsh_skill_sets").hide();
	}
	else if(val == "I donot have experience, I am a fresher"){
		jQuery(".donot_experience").hide();
		jQuery(".exp_star").hide();
		jQuery("#frsh_skill_sets").show();
		jQuery('#resume').parent('div').removeClass('message');
		jQuery('#resume').parent('div').find(".errorMsg").hide();
	}
});
});
	if(jQuery("form#education1").length > 0)
		jQuery(".checkbox").live("click",function(){
			var val=jQuery('input:#is_graduated:checked').val();
			
			if(val == "on"){
				jQuery("div#not_graduate").css("display","")
			}
			else {
				jQuery("div#not_graduate").css("display","none");
			}
	   });
	
   
	jQuery("#is_graduated").click(function(){
	
		if(jQuery('#is_graduated:checked').val() == "on"){
		   jQuery("#not_graduate").show();
			
		}else{
			jQuery("#not_graduate").hide();
		}
	});
// year subtraction function (used for datepicker)
function getdate(year) {
	var currentTime = new Date();
	currentTime.setDate(currentTime.getDate() - (365*year));
	//var d = new Date(currentTime);
	var d = new Date(currentTime);
	var day = d.getDate();
	var month = d.getMonth();
	var month = month+1;
	var year = d.getFullYear();
	newdate =  day+"/"+month+"/"+year;
	return newdate;
}

/* function to datepicker */
jQuery(function() {
    if (jQuery.isFunction(jQuery.fn.datepicker) == true) {
        jQuery(".datepicker").datepicker({
			maxDate: "-18Y",
			minDate: "-60Y",
			yearRange: "-60:-18",
            dateFormat: 'dd/mm/yy',
            changeMonth: true,
            changeYear: true
        });
    }
});


/* function to datepicker */
jQuery(function() {
    if (jQuery.isFunction(jQuery.fn.datepicker) == true) {
        jQuery(".datepicker1").datepicker({
			//maxDate: "+15Y",
			minDate: "0",
			//yearRange: "+60:+15",
            dateFormat: 'dd/mm/yy',
            changeMonth: true,
            changeYear: true
        });
    }
});


jQuery(document).ready(function() {
 
	jQuery(".others").each(function(){
			jQuery(this).next().find(".holder").hide();
		});
		jQuery(".others").live("click",function(){
		    if(jQuery(this).attr("checked") == "checked")
				jQuery(this).next().find(".holder").show();
			else
				jQuery(this).next().find(".holder").hide();
		});
 
});

/*function to language proficiency*/
jQuery(document).ready(function() {

    if (jQuery.isFunction(jQuery.fn.fcbkcomplete) == true) {
		jQuery("#language").fcbkcomplete({
			json_url: jQuery("#page_url").val()+"language_proficiency/",
            addontab: true,
            input_min_size: 0,		
            height: 10,
            cache: true,
            newel: false,
			input_select_own : true
			//complete_text : 'eg : English ,Hindi, Tamil etc..'
         });
		 /*jQuery("#keywords").fcbkcomplete({
			json_url: jQuery("#page_url").val()+"get_keywords/",
            addontab: true,
            input_min_size: 0,		
            height: 10,
            cache: true,
			maxitems: 5,
            newel: false
			//complete_text : "eg: asp.net, php etc.."
         });
		 jQuery("#location").fcbkcomplete({
			json_url: jQuery("#page_url").val()+"get_locations/",
            addontab: true,
            input_min_size: 0,
            height: 10,
            cache: true,
			maxitems: 5,
            newel: false
			//complete_text : 'eg: chennai, bangalore etc..'
         });*/
		 jQuery("#educations").ready(function(){ 
			jQuery("#educations").fcbkcomplete({
				json_url: jQuery("#page_url").val()+"get_education/",
				addontab: true,
				input_min_size: 0,
				height: 10,
				width: 318,
				cache: true,
				maxitems: 5,
				newel: false
				//complete_text : 'eg: 10, 12, BSc, B.E etc..'
			});
		});	
		
    }
    /*Note: The following script is used for to give the anchor tag in the text of  jquery-selectbox-currentItem class.(mainly user for focus the control)*/
    /* -- Start -- */
    jQuery(".jquery-selectbox-currentItem").each(function() {
		if(jQuery.trim(jQuery(this).text()) != ''){
			jQuery(this).html("<a href='javascript:void(0);' style='color:#414141'>" + jQuery(this).text() + "</a>");
		}	
    });
	
   

	 
    /* -- End -- */
});
/*Note: The following function is used to get the query string values*/
function qstring(key){
	qs = (function(a) {
	if (a == "") return {};
	var b = {};
	for (var i = 0; i < a.length; ++i) {
		var p=a[i].split('=');
		if (p.length != 2) continue;
		b[p[0]] = decodeURIComponent(p[1].replace(/\+/g, "~"));
	}
	return b;
    })(window.location.search.substr(1).split('&'));
	return qs[key];
}

jQuery(document).ready(function(){     

		/* function to load the stylish drop down */
	var settings = ["jquery-selectbox"];
	
	$(".default-usage-select").selectbox(settings[0]).bind('change', function(){	
	$('<div>Value of .default-usage-select changed to: '+$(this).val()+'</div>').appendTo('#demo-default-usage .demoTarget').fadeOut(5000, function(){
		$(this).remove();
		});
	});
	// for only long drop down		
	var settings = ["jquery-selectbox2"];	
	$(".default-usage-select2").selectbox(settings[0]).bind('change', function(){
	});
	
	
	if(jQuery.isFunction(jQuery.fn.fcbkcomplete) == true){ 
	jQuery("#experience_form").find("select#skill_sets").ready(function(){ 
		  jQuery("#experience_form").find("select#skill_sets").fcbkcomplete({
				addontab: true,
				input_min_size: 0,
				height: 10,
				cache: true,
				maxitems: 10,
				newel: false
				//complete_text : 'eg: 10, 12, BSc, B.E etc..'
			});
	});		
	
	jQuery("#work_form").find("select#country").ready(function(){ 

			jQuery("#work_form").find("select#country").fcbkcomplete({
				addontab: true,
				input_min_size: 0,
				height: 10,
				cache: true,
				maxitems: 5,
				newel: false
				//complete_text : 'eg: 10, 12, BSc, B.E etc..'
			});
			jQuery("#form_submit1").click(function(){
				var maininput = jQuery.trim(jQuery("#country_annoninput").find(".maininput").val());
				if(maininput != '') {
					jQuery("#work_form").find("select#country").append('<option class="selected"  selected="selected" value="'+maininput+'">'+maininput+'</option>');
				}	
			});
			
	});	
	
	/*jQuery("select#company").ready(function(){ 

			jQuery("select#company").fcbkcomplete({
				json_url: jQuery("#page_url").val()+"get_company/",
				addontab: true,
				input_min_size: 0,
				height: 10,
				cache: false,
				input_name:'adv_company',
				maxitems: 5,
				newel: false
				//complete_text : 'eg: 10, 12, BSc, B.E etc..'
			});
	});	*/
	 jQuery("select#roles").ready(function(){ 
			jQuery("select#roles").fcbkcomplete({
				json_url: jQuery("#page_url").val()+"get_roles_name/",
				addontab: true,
				input_min_size: 0,
				height: 10,
				cache: true,
				maxitems: 5,
				newel: false
				//complete_text : 'eg: Accountant, Junior Developer etc..'
			});
	});	
	jQuery("select#department").ready(function(){ 
			jQuery("select#department").fcbkcomplete({
				json_url: jQuery("#page_url").val()+"get_departments/",
				addontab: true,
				input_min_size: 0,
				input_name:'adv_dept',
				height: 10,
				cache: true,
				maxitems: 5,
				newel: false
				//complete_text : 'eg: Agriculture, Computer science etc.. '
			});
	});	
	//Note: Enable fcbkcomplete option for roles,department,industry in advance search form
	jQuery("select#industry").ready(function(){ 
		jQuery("select#industry").fcbkcomplete({
				json_url: jQuery("#page_url").val()+"get_industry_details/",
				addontab: true,
				input_min_size: 0,
				input_name:'adv_industry',
				height: 10,
				maxitems: 5,
				cache: true,
				newel: false
				//complete_text : 'eg: Electrical, Mechanical etc.'
				
		});
	});
	}
	jQuery("select[name='min_exp']").change(function(){
		load_min_exp_values(jQuery(this));
	});
	function load_min_exp_values(control){
		if(jQuery(control).prev('.auto_dropdown').length > 0)
			 selected_value = jQuery(control).prev('.auto_dropdown').text();
 
		jQuery("#max_exp").html("<option value=''>Loading....</option>");
		var element = jQuery("#max_exp");
		
		jQuery(element).html('<option value="">Loading...</option></option>')
		var add_element = false;
		jQuery("option",jQuery(control)).each(function(){
			if(selected_value == jQuery(this).text()  ){
				jQuery(element).html('<option value="">Max Exp</option>');
				add_element = true;
			}	
			if(add_element == true &&  jQuery(this).text()!= 'Min Exp'  && jQuery(this).text()!= 'Fresher'){
				jQuery(element).html(jQuery(element).html()+'<option value="'+jQuery(this).text()+'">'+jQuery(this).text()+'</option></option>');
			}
		});
		jQuery(element).html(jQuery(element).html()+'<option value="50 Years">50 Years</option></option>');
		jQuery(element).prev().prev().html("");
		var after_add = jQuery(element).parents(".jquery-custom-selectboxes-replaced").find(element);
		var before_control =jQuery(element).parents(".jquery-custom-selectboxes-replaced").parent();
		jQuery(element).parents(".jquery-custom-selectboxes-replaced").remove();
		before_control.prepend(after_add);
		var settings = 'jquery-selectbox';
		jQuery(element).selectbox(settings).bind('change', function(){
			jQuery('<div>Value of .default-usage-select changed to: '+jQuery(this).val()+'</div>').appendTo('#demo-default-usage .demoTarget').fadeOut(5000, function(){
				jQuery(this).remove(); 
			});
		});
	
	}
	load_drop_down_values();
	function load_drop_down_values(){
	jQuery("select[name='after_school[]'],select[name='degree[]'],select#cstate,select#pstate,select#present_state_id,select#permanent_state_id,select#sch_year_of_passing").unbind("change");
	/* onchange function for load the current districts */
	 jQuery("select[name='reference'],select[name='after_school[]'],select[name='exp_year'],select#state,select[name='degree[]'],select#cstate,select#pstate,select#present_state_id,select#permanent_state_id,select#sch_year_of_passing").change(function(event){
		
		/* toggle degree div */
		if(jQuery("#cur_page").length > 0){	
			if(this.name == 'after_school[]') {
				if($(this).val() == '6' || $(this).val() == '7'){
					$('.degreeDiv').hide();
				}else{
					$('.degreeDiv').show();
				}
			}
			if(this.name == 'exp_year') {
				if($(this).val() > '0'){
					$('.monthDiv').show();
					$('.industryDiv').show();
				}else{
					$('.monthDiv').hide();
					$('.industryDiv').hide();
				}
			} 
			if(this.name == 'reference') { 
				if($(this).val() == '10'){
					$('#refer_others').show();
				}else{
					$('#refer_others').hide();
				}
			}
		}
				
		//dynamically select the district id
		
		var district_id = '';
		var settings = 'jquery-selectbox2';
		if(this.name == 'after_school[]') {
			var id = jQuery(this).attr("id").replace("after_school","degree");
			district_id = "#"+id;
			var page_redirect = 'get_course_details/';
			settings = 'jquery-selectbox2';
		}
		if(this.name == 'degree[]') {
			var id = jQuery(this).attr("id").replace("degree","department");
			district_id = "#"+id;
		
			var page_redirect = 'get_specialization_details/';
			settings = 'jquery-selectbox2';
		}
		if(this.id == 'cstate') {
			district_id = "#cdistrict";
			var page_redirect = 'get_districts/';
		}
		else if (this.id == 'pstate') {
			district_id = "#pdistrict";
			var page_redirect = 'get_districts/';
		}	
		else if(this.id == 'present_state_id') {
			district_id = "#present_district_id";
			var page_redirect = 'get_districts/';
		}
		else if (this.id == 'state') {
			district_id = "#district";
			var page_redirect = 'get_districts/';
		}
		else if (this.id == 'permanent_state_id') {
			district_id = "#permanent_district_id";
			var page_redirect = 'get_districts/';
		}	
		else if (this.id == 'sch_year_of_passing') {
			district_id = "#hsc_sch_year_of_passing";
			var page_redirect = 'registration_step2/';
		}
		var selected_value = '';
		/*if(jQuery(this).prev('.jquery-selectbox-currentItem').length > 0)
			 selected_value = jQuery(this).prev('.jquery-selectbox-currentItem').text();
		else if(jQuery(this).prev('.jquery-selectbox2-currentItem').length > 0)	 
			selected_value = jQuery(this).prev('.jquery-selectbox2-currentItem').text();
		*/
		if(jQuery(this).prev('.auto_dropdown').length > 0)
			 selected_value = jQuery(this).prev('.auto_dropdown').text();
	
		var id = '';
		
		jQuery("option",jQuery(this)).each(function(){
			if(selected_value == jQuery(this).text())
				id = jQuery(this).val();
		});
		/*Note: The following script is used to redirect to particular page and get the value*/
		if(page_redirect != undefined && id !=''){
		
			var default_text = jQuery(district_id).find("option:eq(0)").text();
				
			jQuery(district_id).html("<option value=''>Loading....</option>");
					var element = jQuery(district_id);
					jQuery(element).prev().prev().html("");
						var after_add = jQuery(district_id).parents(".jquery-custom-selectboxes-replaced").find(district_id);
						var before_control =jQuery(district_id).parents(".jquery-custom-selectboxes-replaced").parent();
						jQuery(district_id).parents(".jquery-custom-selectboxes-replaced").remove();
						before_control.prepend(after_add);
						jQuery(district_id).selectbox(settings).bind('change', function(){
							jQuery('<div>Value of .default-usage-select changed to: '+jQuery(this).val()+'</div>').appendTo('#demo-default-usage .demoTarget').fadeOut(5000, function(){
								jQuery(this).remove(); 
							});
					
						});
	        
			jQuery.post(jQuery("#page_url").val()+page_redirect,{state_id:id,request_type:'ajax'},function(data){
			
				if(data!=''){
					jQuery(district_id).html(data);
				}	
				else{
					if(page_redirect == 'get_specialization_details/'){
						jQuery(district_id).html("<option value='' >Specialization</option><option value='0'>Nil</option>");
					}	
				}	
					
					var element = jQuery(district_id);
					jQuery(element).prev().prev().html("");
						var after_add = jQuery(district_id).parents(".jquery-custom-selectboxes-replaced").find(district_id);
						var before_control =jQuery(district_id).parents(".jquery-custom-selectboxes-replaced").parent();
						jQuery(district_id).parents(".jquery-custom-selectboxes-replaced").remove();
						before_control.prepend(after_add);
						jQuery(district_id).selectbox(settings).bind('change', function(){
							jQuery('<div>Value of .default-usage-select changed to: '+jQuery(this).val()+'</div>').appendTo('#demo-default-usage .demoTarget').fadeOut(5000, function(){
								jQuery(this).remove(); 
							});
					
						});
				if(data!=''){		
					/*jQuery(district_id+" option").each(function(i){
						jQuery(element).prev().prev().append("<span class='jquery-selectbox-item value-"+jQuery(this).val()+" item-"+i+"'>"+jQuery(this).text()+"</span>");
					});*/
					load_drop_down_values();
					/*Note: The Following script is used to call keypress_value function when user type on the jquery selectbox*/
					//jQuery(".auto_dropdown").find("a").unbind("keyup");
					cur_txt = '';
					//dropdown_search();
					if(page_redirect == 'get_course_details/'){
						jQuery(district_id).change();
					}
			 }			 
			
			 if(event.district_change == "yes"){
				
				jQuery(district_id).prev('.jquery-selectbox-currentItem').html(event.district_data);
				
				var selected_value = jQuery(district_id).prev('.jquery-selectbox-currentItem').find("a").text();
				jQuery('select'+district_id+' option').each(function(i){
					if(selected_value == jQuery(this).text()){
						jQuery(this).attr("selectedindex",i).attr("selected","selected");
						jQuery("select"+district_id+"").after("<input type='hidden' id='h_pdistrict' name='"+district_id+"' value='"+jQuery(this).attr("value")+"'/>");
						return false;
					}else{
						jQuery(this).removeAttr("selectedindex").removeAttr("selected");
					}
				});
			 }
			});
			
		}		
    });
	}
	/*Note: The following script is used for to select or unselect the industry or departments in advance search form*/
	jQuery("[name='industries[]'],[name='departments[]']").live("change",function(){
		var selected_value = jQuery(this).val();
		var field_name = jQuery(this).attr("name");

		var field = field_name == "industries[]" ? "industry" : "department";

		var control =  jQuery("#"+field).next();
		var li = null,index = 0;
		jQuery(control).find("li").each(function(i){
			if(jQuery(this).attr("rel") == selected_value)
				li = jQuery(this);
			 index = i; 
		});
		if(jQuery(this).attr("checked") ){
			if(index < 5) {
				jQuery(this).parent("span").addClass("fBold");
			}			
			
			var value = selected_value;
	        control.find(".maininput").val(value).trigger("click");
			control.find(".maininput").trigger({type:"keydown",keyCode:13,focus:field,selected_value:value});
			control.find("li:[rel='"+selected_value+"']").find(".closebutton").click(function(){
				jQuery("[name='"+field_name+"']:[value='"+jQuery.trim(selected_value)+"']").prev(".checkbox").css("background-position","0px 0px");
				jQuery("[name='"+field_name+"']:[value='"+jQuery.trim(selected_value)+"']").removeAttr("checked");
				jQuery("[name='"+field_name+"']:[value='"+jQuery.trim(selected_value)+"']").parent("span").removeClass("fBold");
				
			});
			if(!(index < 5)) {
				jQuery(this).parent("span").find(".checkbox").css("background-position"," 0px 0px");
				jQuery(this).removeAttr("checked","checked");
			}
		}else{
			var li ='',index=0;
			
	        jQuery(control).find("li").each(function(i){
				if(jQuery(this).attr("rel") == selected_value)
				  li = jQuery(this);
				 index = i; 
			});
			jQuery("[name='"+field_name+"']:[value='"+jQuery.trim(selected_value)+"']").removeAttr("checked");
			jQuery("[name='"+field_name+"']:[value='"+jQuery.trim(selected_value)+"']").parent("span").removeClass("fBold");
			//	var li =control.find("li:[rel='"+selected_value+"']");
		
			if(index == 5) 
				jQuery("#"+field+"_id_error").hide();
			li.find(".closebutton").trigger("click");
		}
		
	});
	//Note: The following script is used to load industry details in advance search form
	jQuery("[name='industry_name'],[name='department_name']").keyup(function(){
	        var field_name = jQuery(this).attr("name");
			
			var check_box_name = field_name == "department_name" ? "departments" : "industries";
			var search_keyword = jQuery(this).val();
			var call_page_name = "get_industry_details/";
			var alias_name = 'i';
			if(field_name == "department_name") {
				call_page_name = "get_departments/";
					alias_name = 'd';
			}	

		  	jQuery.post(jQuery("#page_url").val()+call_page_name,{search:search_keyword,request_type:'ajax'},function(data){
			
			   if(data!=''){
	
			      jQuery("[name='"+field_name+"']").next('.fieldScroll').html("");
				  if(jQuery.trim(data) !='null') {
				  data = data.replace(/\[\"|\"\]|\"/g, "");
				  data  = data.split(",");
				 
				  jQuery(data).each(function(i){
				     var cur_value = jQuery.trim(data[i]).replace(/\`/g,',');
					 if(cur_value != ''){
						jQuery("[name='"+field_name+"']").next('.fieldScroll').append("<span><input id='small_chk-"+alias_name+i+"'class='styled' type='checkbox' value='"+cur_value+"' name='"+check_box_name+"[]'  />"+cur_value+"</span>");
					}
				 });
				 //Load Custome checkbox design for industry/department checkbox
				 Custom.init();
					}
					
				}
			});
		
	});		
	
	//Note: Show/Hide for to give other values
	jQuery(".others").each(function(){
		if(jQuery(this).attr("checked") == "checked")
			jQuery(this).next().find(".holder").show();
		else
			jQuery(this).next().find(".holder").hide();
	});
	   /*Note: The following script is used for to give the anchor tag in the text of  jquery-selectbox-currentItem class.(mainly user for focus the control)*/
    /* -- Start -- */
	
	/*jQuery(".jquery-selectbox-currentItem").each(function() {
	
	     jQuery(this).html("<a href='javascript:void(0)' style='color:#414141'>" + jQuery(this).html() + "</a>");
    });*/

    /*jQuery(".jquery-selectbox-currentItem").find("a").live("focus",function() {
		jQuery(this).parents(".jquery-selectbox").click();
    });*/
    /* -- End -- */

});
/*Note: The following script is used to retain the form values of advanced search*/
function retain_values(splited_value,field){
		var other_values = '';
		for(var i=0;i<splited_value.length;i++){
			splited_value[i] = jQuery.trim(splited_value[i]);
		}
		
		jQuery("[name='"+field+"[]']").each(function(){
			if(jQuery.inArray(jQuery.trim(jQuery(this).val()),splited_value) != -1 ){
				jQuery(this).attr('checked','checked');
			}
		});
		for(var i=0;i<splited_value.length;i++){
			var match1 = false;
			jQuery("[name='"+field+"[]']").each(function(){
				if(jQuery.trim(jQuery(this).val()) == jQuery.trim(splited_value[i]))
					match1 = true;
			});
			if(match1 == false)
				other_values = other_values + ',' +jQuery.trim(splited_value[i]);
		}
		other_values = other_values.split(',');
		if(other_values.length>1){
		
			jQuery("[name='"+field+"[]'].others").attr("checked","checked");
			jQuery("[name='"+field+"[]'].others").next().find(".holder").show();
			jQuery(other_values).each(function(i){
                 if(jQuery.trim(other_values[i])!=''){
					jQuery("select#"+field+"").append("<option class='selected' value='"+jQuery.trim(other_values[i])+"'>"+jQuery.trim(other_values[i])+"</option>");
				
				}
			});
		}else{
			jQuery("[name='"+field+"[]'].others").removeAttr("checked");
		}
		
}



/*Note: The following script is used to dyamically add industry using sheepit (javascript library)*/
jQuery(document).ready(function() {
if (jQuery.isFunction(jQuery.fn.sheepIt) && jQuery('#brotherForm').length > 0) {
	
	    //var init_count = jQuery("#no_of_qualification").val();
		//init_count = parseInt(init_count); 
		var inFormsCount = parseInt(0);//init_count > 0 ? 0  : 0;
		var brotherForm = jQuery('#brotherForm').sheepIt({
            separator: '',
            allowRemoveLast: true,
            allowRemoveCurrent: true,
            allowRemoveAll: true,
            allowAdd: true,
            allowAddN: false,
            removeCurrentConfirmation: false,
            maxFormsCount: 10,
            minFormsCount: inFormsCount,
            indexFormat: '_inc_count',
			// removeCurrentConfirmationMsg: 'Do you want to remove?',
            iniFormsCount: inFormsCount,
            afterAdd: function(source, newForm) {
				  document.getElementById("brother_count").value++;
				jQuery(document).ready(function(){
					if(jQuery(".frm_tip_left").length > 0) frm_tip_left();
					if(jQuery(".frm_tip").length > 0) frm_tip();
				});
				
            }
        });
   var sisterForm = jQuery("#sisterForm").sheepIt({
            separator: '',
            allowRemoveLast: true,
            allowRemoveCurrent: true,
            allowRemoveAll: true,
            allowAdd: true,
            allowAddN: false,
            removeCurrentConfirmation: false,
            maxFormsCount: 10,
            minFormsCount: inFormsCount,
            indexFormat: '_inc_count',
            // removeCurrentConfirmationMsg: 'Do you want to remove?',
            iniFormsCount: inFormsCount,
            afterAdd: function(source, newForm) {
               document.getElementById("sister_count").value++;

                jQuery(document).ready(function(){
					if(jQuery(".frm_tip_left").length > 0) frm_tip_left();
					if(jQuery(".frm_tip").length > 0) frm_tip();
				});
            }
        });
    }

    if (jQuery.isFunction(jQuery.fn.sheepIt) && jQuery('#sheepItForm').length > 0) {
	    var init_count = 0,maxCount = 5;
		if(jQuery("#no_of_qualification").length){
			init_count = jQuery("#no_of_qualification").val();
			init_count = parseInt(init_count); 
			maxCount =  maxCount - init_count;
			maxCount = maxCount == 0 ? -1 : maxCount;
		}	
		var inFormsCount =	0;//init_count > 0 ? init_count  : 0;
		var sheepItForm = jQuery('#sheepItForm').sheepIt({
            separator: '',
            allowLast: true,
            allowRemoveCurrent: true,
            allowRemoveAll: true,
            allowAdd: true,
            allowAddN: false,
            removeCurrentConfirmation: false,
            maxFormsCount: maxCount,
            minFormsCount: inFormsCount,
            indexFormat: '_inc_count',
            // removeCurrentConfirmationMsg: 'Do you want to remove?',
            iniFormsCount: inFormsCount,
            afterAdd: function(source, newForm) {
                document.getElementById("after_school_count").value++;
				jQuery(document).ready(function(){
				
					if(jQuery(".frm_tip_left").length > 0)
							frm_tip_left();
					if(jQuery(".frm_tip").length > 0) 
						frm_tip();
					
					
				});
				
			}
        });
		

    }
	if (jQuery.isFunction(jQuery.fn.sheepIt) && jQuery('#expForm').length > 0) {
		
			var year1 = jQuery("select[name='exp_from_year[]']:eq(0)").val();
			
			var  to_selected_value = jQuery("select[name='exp_to_year[]']:eq(0)").val();
			if(!to_selected_value) 
				to_selected_value  = 'Till_Date';
			load_experience_year(year1,0,to_selected_value,'');
			jQuery("select[name='exp_to_month[]']").each(function(){
				jQuery(this).change();
			});
	    //var init_count = jQuery("#no_of_qualification").val();
		//init_count = parseInt(init_count); 
		
		var inFormsCount = 0;//init_count > 0 ? 0  : 0;
				
	
        var sheepItForm = jQuery('#expForm').sheepIt({
            separator: '',
            allowRemoveLast: true,
            allowRemoveCurrent: true,
            allowRemoveAll: true,
            allowAdd: true,
            allowAddN: false,
            removeCurrentConfirmation: false,
            maxFormsCount: 5,
            minFormsCount: inFormsCount,
            indexFormat: '_inc_count',
            // removeCurrentConfirmationMsg: 'Do you want to remove?',
            iniFormsCount: inFormsCount,
            afterAdd: function(source, newForm) {
				if(jQuery("#exp_count").length)
                document.getElementById("exp_count").value++;
                jQuery(document).ready(function(){
					if(jQuery(".frm_tip_left").length > 0) frm_tip_left();
					if(jQuery(".frm_tip").length > 0) frm_tip();
					
					
				});
				show_total_experience();	
				var total_length = parseInt(jQuery("select[name='exp_from_year[]']").length);
				var year1 = jQuery("select[name='exp_from_year[]']:eq("+(total_length-2)+")").val();
				if(year1 != 'Year') {
					var  to_selected_value = jQuery("select[name='exp_to_year[]']:eq("+(total_length-2)+")").val();
					if(!to_selected_value) 
						to_selected_value  = 'Till_Date';
					load_experience_year(year1,(total_length-2),to_selected_value,'');
				}
            }
        });

    }
	
});



/* function to implement present and permanent address are same (same as above)*/	

jQuery(document).ready(function(){

	// call when the checkbox of address is clicked
   	jQuery("#registration_step1").find(".checkbox").live("click",function(){
		var address_same = jQuery('input:checkbox[name=address_same]:checked').val();
		//get the state, district dropdown
		var cstate_select = jQuery("#cstate").html();
		var cdistrict_select = jQuery("#cdistrict").html();
		var cstate = jQuery("#cstate").prev('.jquery-selectbox-currentItem').html();
        var cdistrict = jQuery("#cdistrict").prev('.jquery-selectbox-currentItem').html();
		 var cdistrict_load = jQuery('.jquery-selectbox-list:eq(2)').html();

	
		if(address_same == undefined) {
		
			//remove the state, district dropdown
			jQuery("#pstate").find("option").removeAttr("selected").removeAttr("selectedindex");
			jQuery("#pdistrict").find("option").removeAttr("selected").removeAttr("selectedindex");
			jQuery("#pstate").prev('.jquery-selectbox-currentItem').html('<a href="javascript:void(0)" style="color: rgb(65, 65, 65);">State</a>');
            jQuery("#pdistrict").prev('.jquery-selectbox-currentItem').html('<a href="javascript:void(0)" style="color: rgb(65, 65, 65);">District</a>');
			jQuery("#pstreet_no").val('House no.');
			jQuery('#pstreet_name').val('Street no./name');
			jQuery('#parea1').val('Area 1');
			jQuery('#parea2').val('Area 2');
			jQuery('#pcity').val('City/Town');			
			jQuery('#ppincode').val('Pincode');
			//add the plceholder class
			jQuery("#pstreet_no").addClass('placeholder');
			jQuery("#pstreet_name").addClass('placeholder');
			jQuery("#parea1").addClass('placeholder');
			jQuery("#parea2").addClass('placeholder');
			jQuery("#pcity").addClass('placeholder');
			jQuery("#ppincode").addClass('placeholder');
		}
		else if(address_same == 'on') {	
		// find whether all the fields are filled		
			//Note: assign field name
			jQuery("#pstate").prev('.jquery-selectbox-currentItem').html('<a href="javascript:void(0)" style="color: rgb(65, 65, 65);">'+jQuery("#cstate").prev('.jquery-selectbox-currentItem').text()+'</a>');
            jQuery("#pdistrict").prev('.jquery-selectbox-currentItem').html('<a href="javascript:void(0)" style="color: rgb(65, 65, 65);">'+jQuery("#cdistrict").prev('.jquery-selectbox-currentItem').text()+'</a>');
			jQuery("#pstreet_no").val(jQuery('#cstreet_no').val());
			jQuery('#pstreet_name').val(jQuery('#cstreet_name').val());
			jQuery('#parea1').val(jQuery('#carea1').val());
			jQuery('#parea2').val(jQuery('#carea2').val());
			jQuery('#pcity').val(jQuery('#ccity').val());
			jQuery('#ppincode').val(jQuery('#cpincode').val());
			if(jQuery('#cstreet_no').val() != 'House no.') {
				jQuery("#pstreet_no").removeClass('placeholder');
				jQuery('#pstreet_no').parent('span').removeClass('message');
				jQuery('#pstreet_no').parent('span').find(".errorMsg").hide();	
			}
			if(jQuery('#cstreet_name').val() != 'Street no./name') {
				jQuery("#pstreet_name").removeClass('placeholder');
				jQuery('#pstreet_name').parent('span').removeClass('message');
				jQuery('#pstreet_name').parent('span').find(".errorMsg").hide();	
			}
			if(jQuery('#carea1').val() != 'Area 1') {
				jQuery("#parea1").removeClass('placeholder');
				jQuery('#parea1').parent('span').removeClass('message');
				jQuery('#parea1').parent('span').find(".errorMsg").hide();
			}
			if(jQuery('#carea2').val() != 'Area 2') {
				jQuery("#parea2").removeClass('placeholder');
				jQuery('#parea2').parent('span').removeClass('message');
				jQuery('#parea2').parent('span').find(".errorMsg").hide();
			}
			if(jQuery('#ccity').val() != 'City/Town') {
				jQuery("#pcity").removeClass('placeholder');
				jQuery('#pcity').parent('span').removeClass('message');
				jQuery('#pcity').parent('span').find(".errorMsg").hide();
			}
			if(jQuery('#cpincode').val() != 'Pincode') {
				jQuery("#ppincode").removeClass('placeholder');
				jQuery('#ppincode').parent('span').removeClass('message');
				jQuery('#ppincode').parent('span').find(".errorMsg").hide();
			}
			//add the state, district dropdown
			jQuery("#pstate").html(cstate_select);
			jQuery("#pdistrict").html(cdistrict_select);
			var error_display = jQuery("#cstate").prev('.jquery-selectbox-currentItem').parents(".jquery-custom-selectboxes-replaced").next(".errorMsg").css("display");		
			jQuery("#pstate").prev('.jquery-selectbox-currentItem').parents(".jquery-custom-selectboxes-replaced").next(".errorMsg").css("display",error_display);
			if(error_display == 'none'){
				jQuery("#pstate").prev('.jquery-selectbox-currentItem').parents(".field_multiple").removeClass("message");
			}else{
				jQuery("#pstate").prev('.jquery-selectbox-currentItem').parents(".field_multiple").addClass("message");
			}			
			error_display = jQuery("#cdistrict").prev('.jquery-selectbox-currentItem').parents(".jquery-custom-selectboxes-replaced").next(".errorMsg").css("display");
			jQuery("#pdistrict").prev('.jquery-selectbox-currentItem').parents(".jquery-custom-selectboxes-replaced").next(".errorMsg").css("display",error_display);
			if(error_display == 'none'){
				jQuery("#pdistrict").prev('.jquery-selectbox-currentItem').parents(".field_multiple").removeClass("message");
			}else{
			   jQuery("#pdistrict").prev('.jquery-selectbox-currentItem').parents(".field_multiple").addClass("message");
			}			
			
		//	jQuery('#cstate').html(cstate);
			jQuery("select#pstate").trigger({type:"change",district_change:'yes',district_data:cdistrict,district_control:jQuery("#pdistrict").prev('.jquery-selectbox-currentItem')});
			
			
			
		}

	});
// call when the checkbox of address is clicked
   	jQuery("[name='profile'] .checkbox").live("click",function(){

		var address_same = jQuery('input:checkbox[name=address_same]:checked').val();
		//get the state, district dropdown
			 
		var cstate_select = jQuery("#present_state_id").html();
		var cdistrict_select =  jQuery("#present_district_id").html();
		var cstate = jQuery("#present_state_id").prev('.jquery-selectbox-currentItem').html();
        var cdistrict = jQuery("#present_district_id").prev('.jquery-selectbox-currentItem').html();
		var cdistrict_load = jQuery("#present_district_id").prev('.jquery-selectbox-currentItem').prev('.jquery-selectbox-list').html();
		var cstate_sel = jQuery("#present_state_id").prev('.jquery-selectbox-currentItem').html();
		
		if(address_same == undefined) {
			jQuery("#permanent_state_id").find("option").removeAttr("selected").removeAttr("selectedindex");
			jQuery("#permanent_district_id").find("option").removeAttr("selected").removeAttr("selectedindex");
			//remove the state, district dropdown
			jQuery("#permanent_state_id").prev('.jquery-selectbox-currentItem').html('<a href="javascript:void(0);" style="color:#414141">State</a>');
			jQuery("#permanent_district_id").prev('.jquery-selectbox-currentItem').html('<a href="javascript:void(0)" style="color: rgb(65, 65, 65);">District</a>');
           // jQuery('.jquery-selectbox-currentItem:eq(4)').html('<a href="javascript:void(0)" style="color: rgb(65, 65, 65);">District</a>');
			jQuery("#permanent_door_no").val('House no.');
			jQuery('#permanent_street_name').val('Street no./name');
			jQuery('#permanent_area1').val('Area 1');
			jQuery('#permanent_area2').val('Area 2');
			jQuery('#permanent_city').val('City/Town');			
			jQuery('#permanent_pincode').val('Pincode');
			//add the plceholder class
			jQuery("#permanent_door_no").addClass('placeholder');
			jQuery("#permanent_street_name").addClass('placeholder');
			jQuery("#permanent_area1").addClass('placeholder');
			jQuery("#permanent_area2").addClass('placeholder');
			jQuery("#permanent_city").addClass('placeholder');
			jQuery("#permanent_pincode").addClass('placeholder');
		}
		else if(address_same == 'on') {	
		// find whether all the fields are filled		
			//Note: assign field name
			jQuery("#permanent_state_id").prev('.jquery-selectbox-currentItem').html(cstate_sel);
			jQuery("#permanent_door_no").val(jQuery('#present_door_no').val());
			jQuery('#permanent_street_name').val(jQuery('#present_street_name').val());
			jQuery('#permanent_area1').val(jQuery('#present_area1').val());
			jQuery('#permanent_area2').val(jQuery('#present_area2').val());
			jQuery('#permanent_city').val(jQuery('#present_city').val());
			jQuery('#permanent_pincode').val(jQuery('#present_pincode').val());
			if(jQuery('#present_door_no').val() != 'Street no.') {
				jQuery("#permanent_door_no").removeClass('placeholder');
			}
			if(jQuery('#present_street_name').val() != 'Street name') {
				jQuery("#permanent_street_name").removeClass('placeholder');
			}
			if(jQuery('#present_area1').val() != 'Area 1') {
				jQuery("#permanent_area1").removeClass('placeholder');
			}
			if(jQuery('#present_area2').val() != 'Area 2') {
				jQuery("#permanent_area2").removeClass('placeholder');
			}
			if(jQuery('#present_city').val() != 'City/Town') {
				jQuery("#permanent_city").removeClass('placeholder');
			}
			if(jQuery('#present_pincode').val() != 'Pincode') {
				jQuery("#permanent_pincode").removeClass('placeholder');
			}
			//add the state, district dropdown
			jQuery("#permanent_state_id").html(cstate_select);
			jQuery("#permanent_district_id").html(cdistrict_select);
			jQuery("#permanent_state_id").prev('.jquery-selectbox-currentItem').html(cstate);
			jQuery("#permanent_district_id").prev('.jquery-selectbox-currentItem').html(cdistrict);	
			jQuery("select#permanent_state_id").trigger({type:"change",district_change:'yes',district_data:cdistrict,district_control:jQuery("#permanent_district_id").prev('.jquery-selectbox-currentItem')});
		
			//jQuery("#permanent_district_id").prev('.jquery-selectbox-currentItem').prev('.jquery-selectbox-list').html(cdistrict_load);			
			
		}

	});
});
var cur_txt = '',last_foucs_txt = [],last_foucs_index = [],wait,child_control = null;
//Note: The following script is used to find and focus the search element in selectbox dropdown
function keypress_value(control){

	if(wait) {
        clearTimeout(wait);
        wait = null;
    }
	var is_find = 0;

	jQuery(control).parent().prev().find("a").each(function(i){

	  if(i > 0){
	    
		if(jQuery(this).parents(".jquery-custom-selectboxes-replaced-list").find('.jquery-selectbox-item').length > 0)
			jQuery(this).parents(".jquery-custom-selectboxes-replaced-list").find('.jquery-selectbox-item').removeClass("listelementhover");
		else if(jQuery(this).parents(".jquery-custom-selectboxes-replaced-list").find('.jquery-selectbox2-item').length > 0)
			jQuery(this).parents(".jquery-custom-selectboxes-replaced-list").find('.jquery-selectbox2-item').removeClass("listelementhover");
			
		if(jQuery(this).text().substring(0,cur_txt.length).toLowerCase() == cur_txt.toLowerCase()){
		
	   		if(jQuery.inArray(i,last_foucs_index) != -1 && last_foucs_txt[i] == cur_txt) {
				
			}else{
				is_find = 1;
				last_foucs_index.push(i);
				last_foucs_txt[i] = cur_txt;
				jQuery(this).focus();
			//	control.text('').text(jQuery(this).text());
				child_control  = jQuery(this);
				
				jQuery(this).parent().addClass("listelementhover");
				wait = setTimeout("clear_search_txt()", 1000);
				return false;
			}
			last_foucs_index.push(i);
			last_foucs_txt[i] = cur_txt;
			
	   }
	  } 
	});
	//clear the current search text, if search keyword not exits in the items
	if(is_find == 0){
		last_foucs_index = []; last_foucs_txt = [];
	    cur_txt = '';
	}
		
}
//Note: The following script is used to clear the text of search keyword for manual selectbox dropdown search
function clear_search_txt(old_search_txt){
	if(child_control != null){
		cur_txt = '';wait = null;
		//child_control.focus().click();
	}
}

jQuery(document).ready(function(){
 
 jQuery("input").live("keypress",function(event){
 
	if(event.which == 0){	

		var control = jQuery(this).parents("li");
		if(control != undefined){
		
			if(control.next("li").find(".auto_dropdown1").length > 0){
			   var  error_field = control.next("li").find(".auto_dropdown").next("select").attr("id");
				jQuery("#" + error_field).prev().click();
				jQuery("#" + error_field).prev().find("a").focus();
								
			}
		}
	}
 });

 //Note: The following script is used to call when focus selectbox dropdown
 jQuery(".auto_dropdown").find("a").live("focus",function(event,show_focus) {
 
	if(show_focus == undefined){
		var index = jQuery("a").index(this);
		setTimeout("trigger_click("+index+")", 100);
	}	
	var selected_text = jQuery(this).parent().text();
	if(cur_txt != undefined){	
		cur_txt = '';
	}
	jQuery(this).parent().prev(".jquery-custom-selectboxes-replaced-list").find("span").removeClass("listelementhover");
	
});

/*Note: The Following script is used to call keypress_value function when user type on the jquery selectbox*/
dropdown_search();
if(jQuery(".jquery-selectbox-list").length) {
	jQuery("input,textarea").live("focus",function(){
		dropdown_tab = -1;
		jQuery(".jquery-selectbox-list").hide();
	});
}
	
jQuery(".jquery-custom-selectboxes-replaced-list").find("span").live("click",function(event){
	dropdown_tab = jQuery(".auto_dropdown").index(jQuery(this).parents(".jquery-custom-selectboxes-replaced-list").next(".auto_dropdown"));
	if(jQuery("#validate_form").length>0){
		var function_name =jQuery("#validate_form").val();
		var element_name = jQuery(this).parents(".jquery-custom-selectboxes-replaced").find("select").attr("name");
		/*var index = jQuery("[name='"+element_name+"']").index(this)
		setTimeout(function(){
		alert(index);
		 window[function_name](element_name,'',index)
		 },2000);*/
		window[function_name](element_name,'',jQuery("[name='"+element_name+"']").index(jQuery(this).parents(".jquery-custom-selectboxes-replaced").find("select")));
	}
});		
jQuery(".jquery-custom-selectboxes-replaced-list").find("a").live("keyup",function(event){
	var keycode = event.keyCode ? event.keyCode : event.charCode;
	var c = String.fromCharCode(keycode);

	var this_control = jQuery(this).parents('.jquery-custom-selectboxes-replaced-list').next(".jquery-selectbox-currentItem").find("a");
	if(this_control.length == 0){
		this_control = jQuery(this).parents('.jquery-custom-selectboxes-replaced-list').next(".jquery-selectbox2-currentItem").find("a");
	}	
	if(keycode  == 38 || keycode == 40){
		jQuery(this).parents(".jquery-custom-selectboxes-replaced-list").find('.jquery-selectbox-item').removeClass("listelementhover");
		if(this_control.length == 0){
			jQuery(this).parents(".jquery-custom-selectboxes-replaced-list").find('.jquery-selectbox2-item').removeClass("listelementhover");
		}	
		jQuery(this).parent().addClass("listelementhover");

	}	
	else if(keycode == 9)  {
		if(jQuery(this).text()!=this_control.text()) jQuery(this).click(); 
		//alert(jQuery(this).parents(".jquery-custom-selectboxes-replaced-list").nextUntil("input").attr("class"));
	}
	else{
		cur_txt = cur_txt + c;
		keypress_value(jQuery(this_control));
		
	}
});

	/*Note: The following script is used for to do more/less in search results page*/
	/* -- Start -- */
    jQuery(".moreInfo").live("click",function(){
		var control = jQuery(this).parents(".less_desc"); 
		control.next(".more_desc").show();
		control.hide();
	});
	jQuery(".lessInfo").live("click",function(){
		var control = jQuery(this).parents(".more_desc"); 
		control.prev(".less_desc").show();
		control.hide();
	});
	 jQuery(".moreSkills").live("click",function(){
		jQuery(".less_skills:eq("+jQuery(".moreSkills").index(this)+")").hide();
		jQuery(".more_skills:eq("+jQuery(".moreSkills").index(this)+")").show();	
		jQuery(".lessSkills:eq("+jQuery(".moreSkills").index(this)+")").show();
		jQuery(this).hide();
	});
	jQuery(".lessSkills").live("click",function(){
		jQuery(".less_skills:eq("+jQuery(".lessSkills").index(this)+")").show();
		jQuery(".more_skills:eq("+jQuery(".lessSkills").index(this)+")").hide();				
		jQuery(".moreSkills:eq("+jQuery(".lessSkills").index(this)+")").show();
		jQuery(this).hide();
	});
	 jQuery(".moreEligibility").live("click",function(){

		jQuery(".less_eligibility:eq("+jQuery(".moreEligibility").index(this)+")").hide();
		jQuery(".more_eligibility:eq("+jQuery(".moreEligibility").index(this)+")").show();	
		jQuery(".lessEligibility:eq("+jQuery(".moreEligibility").index(this)+")").show();
		jQuery(this).hide();
	});
	jQuery(".lessEligibility").live("click",function(){
		jQuery(".less_eligibility:eq("+jQuery(".lessEligibility").index(this)+")").show();
		jQuery(".more_eligibility:eq("+jQuery(".lessEligibility").index(this)+")").hide();				
		jQuery(".moreEligibility:eq("+jQuery(".lessEligibility").index(this)+")").show();
		jQuery(this).hide();
	});
	/* -- End -- */

	/*Note: The following script is used for to search the jobs by removing the keywords in search results page*/
	// --- Start
	if(jQuery(".boldX,.no_search").length > 0){ 
		if(jQuery(".boldX").length == 1){
			jQuery(".boldX:eq(0)").parent().css("cursor","default");
			jQuery(".boldX:eq(0)").remove();
		}
		if(jQuery(".no_search").length == 1){
			jQuery(".no_search:eq(0)").parent().css("cursor","default");
			jQuery(".no_search:eq(0)").remove();
		}			
	jQuery(".boldX,.no_search").live("click",function(){
		var program_id,course_id;
		
		if(jQuery(this).parent().hasClass("programBg"))
			program_id = jQuery(this).parent().attr("program_id");
		if(jQuery(this).parent().hasClass("courseBg")){
			course_id = jQuery(this).parent().attr("course_id");	
		}	
	
		jQuery(this).parent().remove();
		var value ='',search_qry_string;
		// get keywords values
		var keywords = jQuery(".keyBg").map(function(){
			value = jQuery.trim(jQuery(this).text());
			value = value.substring(0,value.length-2);
		  return value ;
		}).get().join(",");value ='';
		search_qry_string = "?keywords="+keywords;
		// get location values
	    var location = jQuery(".locBg").map(function(){
			value = jQuery.trim(jQuery(this).text());
			value = value.substring(0,value.length-2);
		  return value ;
		}).get().join(",");value ='';
		if(location) search_qry_string = search_qry_string+"&location="+location.replace(/ /g,'+');
		//get program values
		var program = jQuery(".programBg").map(function(){
			value = jQuery.trim(jQuery(this).attr("id"));
			return value ;
		}).get().join(",");value ='';
		if(program) search_qry_string = search_qry_string+"&program="+program;
		//get course values
		var course = jQuery(".courseBg").map(function(){

			if(jQuery.trim(jQuery(this).attr("program_id")) == program_id){
						
			}else{
				value = jQuery.trim(jQuery(this).attr("id"));
				return value ;
			}
		}).get().join(",");value ='';
		if(course) search_qry_string = search_qry_string+"&course="+course;
		//get specialization values
		var specialization = jQuery(".specializationBg").map(function(){
			if(jQuery.trim(jQuery(this).attr("program_id")) == program_id || jQuery.trim(jQuery(this).attr("course_id")) == course_id){
			}else{
				value = jQuery.trim(jQuery(this).attr("id"));
				return value ;
			}
		}).get().join(",");value ='';
		if(specialization) search_qry_string = search_qry_string+"&specialization="+specialization;
		// get X Std
	    var x_std = jQuery(".x_std").map(function(){
			value = jQuery.trim(jQuery(this).text());
			value = value.substring(0,value.length-2);
		  return value ;
		}).get().join(",");value ='';
		if(x_std) search_qry_string = search_qry_string+"&x_std="+1;
		// get XII Std
		var xii_std = jQuery(".xii_std").map(function(){
			value = jQuery.trim(jQuery(this).text());
			value = value.substring(0,value.length-2);
		  return value ;
		}).get().join(",");value ='';
		if(xii_std) search_qry_string = search_qry_string+"&xii_std="+1;
		
		if(location) search_qry_string = search_qry_string+"&location="+location;
		// get education values
		var education = jQuery(".eduBg").map(function(){
			value = jQuery.trim(jQuery(this).text());
			value = value.substring(0,value.length-2);
		  return value ;
		}).get().join(",");value ='';
		// get company_name values
		var company_name = jQuery(".comBg1").map(function(){
			value = jQuery.trim(jQuery(this).text());
			value = value.substring(0,value.length-2);
		  return value ;
		}).get().join(",");value ='';
		// get industries values
		var industries = jQuery(".indBg").map(function(){
		value = jQuery.trim(jQuery(this).text());
		value = value.substring(0,value.length-2);
		  return value ;
		}).get().join(",");value ='';

		// get roles values
		var roles = jQuery(".roleBg").map(function(){
			value = jQuery.trim(jQuery(this).text());
			value = value.substring(0,value.length-2);
		  return value ;
		}).get().join(",");value ='';
	
		
		// get department values
		var department = jQuery(".deptBg").map(function(){
			value = jQuery.trim(jQuery(this).text());
			value = value.substring(0,value.length-2);
		  return value ;
		}).get().join(",");
		if(education) search_qry_string = search_qry_string+"&education="+education;
		var min_exp = jQuery(".min_exp").text();
		min_exp = min_exp.substring(0,min_exp.length-2);
		
		if(min_exp) search_qry_string = search_qry_string+"&min_exp="+min_exp;
		var max_exp = jQuery(".max_exp").text(); max_exp = max_exp.substring(0,max_exp.length-2);
		if(max_exp) search_qry_string = search_qry_string+"&max_exp="+max_exp;
		var min_salary = jQuery(".min_salary").text(); min_salary = min_salary.substring(0,min_salary.length-2);
		if(min_salary) search_qry_string = search_qry_string+"&min_salary="+min_salary;
		var max_salary = jQuery(".max_salary").text(); max_salary = max_salary.substring(0,max_salary.length-2);
		if(max_salary) search_qry_string = search_qry_string+"&max_salary="+max_salary;
		if(company_name) search_qry_string = search_qry_string+"&company="+company_name;
		
		if(industries) search_qry_string = search_qry_string+"&industries="+industries;
		
		if(roles) search_qry_string = search_qry_string+"&roles="+roles;
		if(department) search_qry_string = search_qry_string+"&department="+department;
		var job_type = jQuery(".job_type").text(); job_type = job_type.substring(0,job_type.length-2);
		if(job_type) search_qry_string = search_qry_string+"&job_type="+job_type;
		var job_posted = jQuery(".job_posted").text(); job_posted = job_posted.substring(0,job_posted.length-2);
		if(job_posted) search_qry_string = search_qry_string+"&job_posted="+job_posted;

	
		var search_from = '';
		if(qstring("search_from"))
			search_from ="&search_from=advance";
			
	    var search_qry_string = search_qry_string.replace(/\#/g,'sharp');
		window.location.href = jQuery("#page_url").val()+jQuery("#language_url").val()+"search_jobs/"+search_qry_string+search_from;
	});
	}
	// --- End
});	
// execute your scripts when the DOM is ready. this is a good habit
  jQuery(function() {
     jQuery(".more_desc").each(function(i){
	     if(jQuery.trim(jQuery(this).find("#span_more_desc").text()) == jQuery.trim(jQuery(".less_desc:eq("+i+")").find("#span_less_desc").text())){
			jQuery(".moreInfo:eq("+i+")").hide();
		 }else{
			jQuery(".moreInfo:eq("+i+")").show();
		 }		 
	 });
	 
	  jQuery(".more_skills").each(function(i){
		if(jQuery.trim(jQuery(this).find("#span_more_skills").text()) == jQuery.trim(jQuery(".less_skills:eq("+i+")").find("#span_less_skills").text())){
			
			jQuery(".moreSkills:eq("+i+")").hide();
		 }else{
		 
			jQuery(".moreSkills:eq("+i+")").show();
		 }		 
	 });
	   jQuery(".more_eligibility").each(function(i){
	     if(jQuery.trim(jQuery(this).find("#span_more_eligibility").text()) == jQuery.trim(jQuery(".less_eligibility:eq("+i+")").find("#span_less_eligibility").text())){
			jQuery(".moreEligibility:eq("+i+")").hide();
		 }else{
			jQuery(".moreEligibility:eq("+i+")").show();
		 }		 
	 });
      jQuery(".remove_qualification").click(function(){
	      var  return_form = false;
		  jQuery(this).parent("ul").find("input,select").each(function(){
			   if(jQuery.trim(jQuery(this).val()) !=''){
					return_form = true;
					return;
			   }
		  });
		  
		  if(return_form){
			var control = jQuery(this);
			$.alerts.dialogClass = 'confirm_';	$.alerts.okButton = '&nbsp;Yes&nbsp;';	$.alerts.cancelButton = '&nbsp;No&nbsp;';
			jConfirm(alert_remove, 'Confirmation', function(r) {
					if(r == true)
						control.parent("ul").remove();
		    });	
		  }	

	  });
	  jQuery(".remove_current").live("click",function(){	
	  	 var  return_form = false;
		 
		 jQuery(this).closest("ul").find("input,select").each(function(){
			   if(jQuery(this).attr("not_consider") == undefined && jQuery.trim(jQuery(this).val()) !=''){
			   		return_form = true;
					return;
			   }
		  });
		 var control = jQuery(this);
		  if(return_form){
			$.alerts.dialogClass = 'confirm_';	$.alerts.okButton = '&nbsp;Yes&nbsp;';	$.alerts.cancelButton = '&nbsp;No&nbsp;';
			jConfirm(alert_remove, 'Confirmation', function(r) {
					if(r == true)
						control.prev("a").click();
		    });
		  }else{
			control.prev("a").click();
		  }		  
		 
				
	  });
	   frm_tip();
       frm_tip_left();
	   

    });

	function frm_tip(){
		 // select all desired input fields and attach tooltips to them
		 if(jQuery.isFunction(jQuery.fn.tooltip)){
			jQuery(".frm_tip").each(function(){
				jQuery(this).tooltip({
					// place tooltip on the right edge
					position: "center right",
					// a little tweaking of the position
					offset: [-2, 10],
					// use the built-in fadeIn/fadeOut effect
					effect: "fade",
					// custom opacity setting
					opacity: 1
				});	
			});
			  
		 }
	}
	function frm_tip_left(){
		if(jQuery.isFunction(jQuery.fn.tooltip)){
			jQuery(".frm_tip_left").each(function(){
				jQuery(this).tooltip({
					// place tooltip on the right edge
					position: "center left",
					// a little tweaking of the position
					offset: [-8, -42],
					// use the built-in fadeIn/fadeOut effect
					effect: "fade",
					// custom opacity setting
					opacity: 1
				});	   
			});	
		}
	}
    
jQuery(document).ready(function() {
	
  /*Note: The following script is used for to reset the advanced search form*/
  // -- Start 
  jQuery("#adv_form input").keydown(function(event){
	if(event.keyCode == 13){
		return false;
	}
	
  });
	if(jQuery("#payment_selection_trial").length){
		jQuery("#payment_selection_trial").click(function(event){
			jQuery("[name='payment_submit']").val("Trail").click();
		});
	}
	if(jQuery("#payment_selection_submit").length) {	
		jQuery("#payment_selection_submit").click(function(event){
			if(jQuery("#advance_search_msg").html() == Processing) return;
			$.alerts.okButton = '&nbsp;Yes&nbsp;';	$.alerts.cancelButton = '&nbsp;No&nbsp;';
			$.alerts.selectButton = 'ok'; $.alerts.okBtnClass = 'blueBtn'; $.alerts.cancelBtnClass = "basicBtn";
			var control = jQuery(this);
			jConfirm('Are you sure? Please confirm.', 'Confirmation', function(r) {
				if(r == true){
					jQuery("#advance_search_msg").html(Processing);
					var payment_mode = 0;
					jQuery("[name='pay_mode']").each(function(i){
						if(jQuery(this).is(":checked")){
							payment_mode = i;
							return false;
						}
					});
					jQuery("[name='payment_submit']").val(payment_mode).click();
				}
			});	
			return false;
		});
	}	
  	/*Note: The following script is used for advance search page*/
	if(jQuery("#advance_search").length > 0){
		jQuery("#advance_search").click(function(event){
		if(jQuery("#advance_search_msg").html() == Processing) {return false;}
		jQuery("#advance_search_msg").html(Processing);
		
	 // jQuery("#advance_search").attr("disabled","disabled");
	   // disable form submit when user press enter key
	  
	   if(event.keyCode == 13){ 
			jQuery("#advance_search_msg").html(submit);
			// jQuery("#advance_search").attr("disabled","disabled");
			return false;
	    }
	   var program_sel= 0,course_sel = 0,specialization_sel= 0;
  	   var keywords = '',education = '',location = '',min_exp='',max_exp='',min_salary='',max_salary='',industry='',company='',roles='',departments='',job_type='',job_posted='';
		/*jQuery("#keywords option").each(function(){
		   if(keywords!='') keywords = keywords + ",";
		    keywords = keywords + jQuery(this).attr("value");
		});
		
		jQuery("#location option").each(function(){
		   if(location!='') location = location + ",";
		    location = location + jQuery(this).attr("value");
		});*/
		keywords = jQuery.trim(jQuery("#keywords").val());
		location = jQuery.trim(jQuery("#location").val());

        if(keywords == 'Keyword(s)') keywords =  "";
		if(location == 'Location(s)') location =  "";
		if(education == 'Education') education =  "";
		jQuery("[name='job_type'] option").each(function(){
		   if(jQuery(this).attr("selectedindex") > 0)
			job_type  = jQuery(this).val();
		   
		});
		jQuery("[name='job_posted'] option").each(function(){
		   if(jQuery(this).attr("selectedindex") > 0)
			job_posted  = jQuery(this).val();
		});
		min_exp = jQuery("#min_exp_name").length >0 ? jQuery("#min_exp_name").val() :'';
		max_exp = jQuery("#max_exp_name").length >0 ? jQuery("#max_exp_name").val() :'';
		min_salary = jQuery("#min_salary").val();
		max_salary = jQuery("#max_salary").val();
		jQuery("[name='industry[]'],[name='industry[]'] option").each(function(){
			if(jQuery(this).attr("checked") =="checked")
		      	industry = jQuery(this).attr("value") != '' ?industry +","+ jQuery(this).attr("value") : industry;
			if(jQuery(this).attr("selected") =="selected"){
				industry = jQuery(this).attr("value") != '' ?industry +","+ jQuery(this).attr("value") : industry;
				
			}
		});
		jQuery("[name='educations[]'],[name='educations[]'] option").each(function(){
			if(jQuery(this).attr("checked") =="checked")
		      	education = jQuery(this).attr("value") != '' ?education +","+ jQuery(this).attr("value") : education;
			if(jQuery(this).attr("selected") =="selected"){
				education = jQuery(this).attr("value") != '' ?education +","+ jQuery(this).attr("value") : education;
				
			}
		});
		jQuery("[name='roles[]'],[name='roles[]'] option").each(function(){
		
			if(jQuery(this).attr("checked") =="checked"){
				roles = jQuery(this).attr("value") != '' ?roles +","+ jQuery(this).attr("value") : roles;
				}
			if(jQuery(this).attr("selected") =="selected"){
				roles = jQuery(this).attr("value") != '' ? roles +","+ jQuery(this).attr("value") : roles;
			}
		});
		/*jQuery("[name='company[]'],[name='company[]'] option").each(function(){
		
			if(jQuery(this).attr("checked") =="checked"){
				company = jQuery(this).attr("value") != '' ?company +","+ jQuery(this).attr("value") : company;
				}
			if(jQuery(this).attr("selected") =="selected"){
				company = jQuery(this).attr("value") != '' ? company +","+ jQuery(this).attr("value") : company;
			}
		});*/
		company = jQuery.trim(jQuery("#company").val());
		if(company == 'Enter Company(s)') company =  "";
			jQuery("[name='department[]'],[name='department[]'] option").each(function(){
		
			if(departments!='') departments = departments + ",";
			if(jQuery(this).attr("checked") =="checked")
		      	    departments = jQuery(this).attr("value") != ''? departments +","+ jQuery(this).attr("value"):departments;
			if(jQuery(this).attr("selected") =="selected"){
				departments = jQuery(this).attr("value") != ''? departments +","+ jQuery(this).attr("value"):departments;
				
			}
		});
		industry = industry.substring(1, industry.length);
		roles = roles.substring(1, roles.length);

		departments = departments.substring(1, departments.length);
	    keywords = jQuery.trim(keywords);location = jQuery.trim(location);	
		if(keywords[keywords.length-1] == ',') { keywords = keywords.substring(0,keywords.length-1); }
		if(location[location.length-1] == ',') { location = location.substring(0,location.length-1); }
			program_sel = jQuery(".tagsinput:.program").find("span.input").map(function(){
				 return jQuery.trim(jQuery(this).parent(".tag").attr("id"))+"+"+jQuery.trim(jQuery(this).text());
			}).get().join(",");
			var course_id='',program_id='',specialization_id='',control='';
			course_sel = jQuery(".tagsinput:.course").find("span.input").map(function(){
				control = jQuery(this).parent(".tag");
				course_id = control.attr("id");
				 program_id = control.removeClass("tag").attr("class");
				 control.addClass("tag");
				 return course_id+"+"+jQuery.trim(program_id)+"+"+jQuery.trim(jQuery(this).text());
				 
			}).get().join(",");
			specialization_sel = jQuery(".tagsinput:.specialization").find("span.input").map(function(){
			control = jQuery(this).parent(".tag");	
				 specialization_id = control.attr("id");
				 program_id = jQuery.trim(control.removeClass("tag").attr("class")).replace(/\ /g,'+');
				 control.addClass("tag");
				return specialization_id+"+"+program_id+"+"+jQuery.trim(jQuery(this).text());
				
			}).get().join(",");
			jQuery("#program_sel").val(program_sel); jQuery("#course_sel").val(course_sel); jQuery("#specialization_sel").val(specialization_sel);
		    
		jQuery("#keywords").val(keywords);
		jQuery("#location").val(location)
		jQuery("#company").val(company)
		//jQuery("#education").val(education);
	
        if(program_sel != '' || specialization_sel != '' || course_sel != ''  || keywords != '' || location != '' || company!='' || education!='' || min_exp != '' || max_exp != '' || (min_salary != 'Min Salary' && min_salary != '') || (max_salary != 'Max Salary' && max_salary !='') || industry !='' || roles !='' || departments !='' || job_type != '' || job_posted !=''){
			jQuery("#reset_adv_form").hide();
			return true;	
		}	
		else{
			jQuery(".errorMsg").show(); 
			window.location.hash = "error_focus";
			//jQuery("#advance_search").removeAttr("disabled");
			jQuery("#advance_search_msg").html(submit);
			return false;
		}		
	  });
	}
  /*Note: The following script is used to reset the advacesearch form by clicking the reset button*/
  jQuery("#reset_adv_form").click(function(){
	$.alerts.dialogClass = 'confirm_';	$.alerts.okButton = '&nbsp;Yes&nbsp;';	$.alerts.cancelButton = '&nbsp;No&nbsp;';
	jConfirm(alrt_form_reset, 'Confirmation', function(r) {
	   if(r == true){
			document.getElementById("adv_form").reset();
			jQuery(".field").find(".errorMsg").hide();
			jQuery("#keywords,#location,#company").val("");
			jQuery("#adv_form").find("input").addClass("placeholder");
			jQuery("#adv_form").find(".bit-box").remove();
			jQuery("#adv_form").find(".advError").hide();
			jQuery(".fBold").removeClass("fBold");
			jQuery(".jquery-selectbox-currentItem").each(function(i){
				jQuery(this).text(jQuery(".jquery-selectbox-list:eq("+i+")").find(".item-0").text());
			});
			jQuery(".tagsinput:.program").find(".remove_tags").each(function(){
				jQuery(this).click();
			});
			jQuery(".checkbox").each(function(){
				this.style.backgroundPosition = "0px 0px";
			});
			jQuery("[name='industry_name'],[name='department_name']").keyup();
			jQuery("select.hidden").each(function(){
			    jQuery(this).find("option").remove();
			});
			jQuery("select option:selected").each(function(){
				jQuery(this).removeAttr("selected").removeAttr("selectedindex");;
			});
			jQuery("#min_exp_name,#max_exp_name,#job_posted_name,#job_type_name").val("");
			//window.location.href = jQuery("#adv_search_page").val();
			jQuery(".maininput:eq(0)").focus();	
		}
	});
	
	 
  });
  // -- End
  
  //jQuery(".frm_tip").each(function() {
    	//jQuery('.tooltip').html("<span class='tip_top'></span><span class='tip_mid'><span>" + jQuery(this).attr("title") + "</span></span>");
  //  });
  
  //restrict the unwanted values in mark field in step 2 
	jQuery("#sheepItForm_add").live("click",function() {
		//jQuery('#[id^=mark]').find('.mark').replaceWith('.test3');
		jQuery("[id^=mark]").each( function() {
			//restrict the unwanted values in height, weight, mark field in step 1 
			var marks_id = jQuery(this).attr('id');
	
			jQuery("#"+marks_id).live("keypress", function(event) {
				
			var regex = new RegExp("^[.0-9]+$");
			var mark_length = jQuery(this).val().length;
;
			var mark_digit = 'true';
			/*
			if(mark_length == 2) {
				if(jQuery(this).val() == 10) {
					regex = new RegExp("^[.0]+$"); 
				}
				else if(jQuery(this).val() > 10){
					regex = new RegExp("^[.]+$"); 
				}
				else {
					regex = new RegExp("^[.0]+$"); 
				}
			} 
			else if(mark_length == 3) {
				if(jQuery(this).val() == 100) { 
					regex = new RegExp("^[.]+$"); 
				}
				else {
					regex = new RegExp("^[0-9]+$");
				}
			}
			else if(mark_length == 4) {
				if(jQuery(this).val() >= 100) {
					regex = new RegExp("^[0]+$"); 
				}
				else {
					regex = new RegExp("^[0-9]+$"); 
				}
			}
			else{
				regex = new RegExp("^[.0-9]+$"); 
			}
			*/
				
				
				var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
				if (!regex.test(key) && (event.which) != 8 && event.which!=0) {
					event.preventDefault();
					return false;
				}
			});
		});
	});
	
  jQuery(".numeric").live("keypress", function(event) {
  var regex = new RegExp("^[0-9 ]+$"); 
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key) && (event.which) != 8 && event.which!=0) {
		
            event.preventDefault();
            return false;
        }
  });
  jQuery(".percentage").live("keypress", function(event) {
  var regex = new RegExp("^[0-9.]+$"); 
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
	var exists_dot = false,dont_allow = false;
	this.value = jQuery.trim(this.value);
	if(this.value.indexOf('.') != -1 && key == '.'){
		exists_dot = true;
	}
	if(this.value.indexOf('.') != -1){
		var split_valie = this.value.split('.');
		if(split_valie[1].length >= 1 && (event.which) != 8 && event.which!=0){
			dont_allow = true;
		}
	}
	if ((!regex.test(key) && (event.which) != 8 && event.which!=0) || exists_dot || dont_allow) {
		event.preventDefault();
        return false;
    }
  });
	jQuery(".contactno").live("keypress",function(event){
		var regex = new RegExp("^[0-9 -]+$"); 
		var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
		var exists_space = false,dont_allow = false;
		//this.value = this.value.replace(/^\s+/,"");
		if(this.value.indexOf(' ') != -1 && key == ' '){
			//exists_space = true;
		}
		if(this.value.indexOf('-') != -1 && key == '-'){
			exists_space = true;
		}
		if ((!regex.test(key) && (event.which) != 8 && event.which!=0) || exists_space) {
			event.preventDefault();
			return false;
		}
	});
	//restrict the unwanted values in height, weight in step 1  , mark field in step 2 , expexted salary in step 3
	jQuery("#height,#weight,#hsc_school_marks_percentage,#school_marks_percentage,#sch_mark,#hsc_sch_mark,#mark_inc_count,#marks0,#expected_salary,#current_salary,.mobile,#mobile_no,#mobile1,#mobile2,#mobile_no2,#landline,#landline1,#landline2,#landline_no,#cpincode,#ppincode,#branches,#employee_strength").live("keypress", function(event) {
		var exists_space = false;
		var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
		if(this.id == 'mobile1' || this.id == 'mobile2' || this.id == 'mobile_no2') {
			var regex = new RegExp("^[0-9]+$"); 
		}
		else if (this.id.indexOf("landline") >=0) {
			var regex = new RegExp("^[0-9 -]+$"); 
			//this.value = this.value.replace(/^\s+/,"");
			if(this.value.indexOf(' ') != -1 && key == ' '){
				//exists_space = true;
			}
			if(this.value.indexOf('-') != -1 && key == '-'){
				exists_space = true;
			}
			
		}
		else {
			var regex = new RegExp("^[.0-9]+$"); 
		}
	
		if(this.id == 'cpincode' || this.id == 'ppincode'){
			var regex = new RegExp("^[0-9]$"); 
		}
		if ((!regex.test(key) && (event.which) != 8 && event.which!=0) || exists_space) {
		
            event.preventDefault();
            return false;
        }
	});
	
});

//the sticky header only for above ie7 and all other browsers 
if (document.all && !document.querySelector) {
}
else{
/*function to show sticky header*/
// -- Start -- //
 $(function() {
    
       var clonedHeaderRow;
    
       $(".persist-area").each(function() {
           clonedHeaderRow = $(".persist-header", this);
           clonedHeaderRow
             .before(clonedHeaderRow.clone())
             .css("width", clonedHeaderRow.width())
             .addClass("floatingHeader");
             
       });
       
    $(window)
      .scroll(UpdateTableHeaders)
     .trigger("scroll");

}); 

function UpdateTableHeaders() {

       $(".persist-area").each(function() {
       
           var el             = $(this),
               offset         = el.offset(),
               scrollTop      = $(window).scrollTop(),
               floatingHeader = $(".floatingHeader", this)
           
           if ((scrollTop > offset.top) && (scrollTop < offset.top + el.height())) {
               floatingHeader.css({
                "visibility": "visible"
               });
           } else {
               floatingHeader.css({
                "visibility": "hidden"
               });      
           };
       });
	   /*Note: The following scirpt is used to select/unselect the checkbox*/
		if(jQuery("#searchResultTable .checkbox:eq(1)").length > 0){
		    
			jQuery("#searchResultTable .checkbox:eq(1)").click(function(){
				//unselect checkbox
				
				if(this.style.backgroundPosition == "0px 0px"){
				    jQuery("#searchResultTable .checkbox").each(function(){
						this.style.backgroundPosition = '0px 0px';
						jQuery(this).next().removeAttr("checked");
					});
				}
			
				//select checkbox
				else if(this.style.backgroundPosition  != "0px 0px"){
					var background_position = this.style.backgroundPosition;
					jQuery("#searchResultTable .checkbox").each(function(){
						this.style.backgroundPosition = background_position;
						jQuery(this).next().attr("checked","checked");
					});
				}
			});
		}	
	 
}

}
// -- End -- //  
//Note: The following script is used for to validate login form
jQuery(document).ready(function(){
	//Note: Enter key form submit for header login form
	jQuery("form[name='header_login_form'] input").bind("keypress",function(e){
		//this is used to stop to validate the registration step1 during press enter on top form
		if(e.which == 13){
			jQuery("#validate_login").click();
		}
	});
	jQuery("form[name='header_login_form'] input").bind("focus",function(e){
	});
	if(jQuery("#validate_login").length){
		jQuery("[name='login_email'],[name='login_password']").keypress(function(e){
			var code = e.keyCode || e.which;
			if(jQuery("[name='submit']").find("span").text() == Processing){
				return false;
			}
			if(code == 13){
				setTimeout(function(){
				jQuery("[name='submit']").find("span").text(Processing).click();
				},10);
				
			}
		});	
	}
	jQuery("#validate_login").click(function(){
		var login_email = jQuery.trim(jQuery("[name='login_email']").val());
		var login_password = jQuery.trim(jQuery("[name='login_password']").val());
		if(login_email == '' || login_password == '' || login_password == jQuery.trim(jQuery("[name='login_password']").attr("placeholder")) || login_email == jQuery.trim(jQuery("[name='login_email']").attr("placeholder")))
			return false;
		return true;	   
	});
});

  
jQuery(document).ready(function(){	
	//auto expand input
	$('.maininput').live('paste', function (event) {
		var input = jQuery(this);
		setTimeout(function() {
			var newsize = (0 > input.val().length) ? 0 : (input.val().length + 1);
			input.attr("size", newsize).width(parseInt(input.css('font-size')) * newsize);
		}, 1);
        
	});
	//show alert message if no jobs selected in search result durind refer friends
	if(jQuery("form:[name='view_jobs']").length == 0){
		jQuery('.multitple_refer,.multitple_refer1').live('click',function() {	
			if(jQuery("#logout").length >= 0){
				if(jQuery("[name='selected_jobs[]']:checked").length > 0) {
					jQuery("#search_job_submit").val('refer_selected').click();
					return true;;
				}
				else {
					$.alerts.dialogClass = 'alert_';
					$.alerts.okButton = '&nbsp;Ok&nbsp;';
					jAlert(alrt_job_refer_msg, 'Alert');
				}
			}	
			else	
				window.location.href = jQuery("#page_url").val()+"login/?redirect_uri=search_jobs/"+jQuery("#sorting_query_string").val();
			return false;
		});
	}
	jQuery("#dismiss,#dismiss1").live("click",function(){
		jQuery(this).parents("#pcColor").hide("fast");
		
	});
	
	
	// show and hide the affirmative action description
	jQuery("#physically_challenged").change(function(){
		if(jQuery(this).find("[selected='selected']").index() == 1){
			jQuery(".affir_desc").slideDown();
		}
		else if(jQuery("select[name='physically_challenged']").val() == 'N') {
			jQuery(".affir_desc").slideUp();
		}
	});
	
	//hide 
	jQuery("#dismiss_disclimer").live("click",function(){	
		jQuery(this).parents(".verification").hide("fast");
		if(jQuery("#disclaimer_page").val() != undefined)
		jQuery.post(jQuery("#page_url").val()+jQuery("#disclaimer_page").val(),{hide_disclaimer_info:'yes',request_type:'ajax'},function(data){	
		});
	});	
	
	//hide the refer site details.
	jQuery("#refer_details_dismiss").live("click",function(){	
			jQuery(this).parents(".verification").hide("fast");
	});	
	
	//hide the refer site details alert.
	jQuery("#refer_alert_dismiss").live("click",function(){	
		jQuery(this).parents("#pcColor").hide("fast");
		jQuery.post(jQuery("#page_url").val()+"refer_site_details/",{hide_refer_site_detail_alert:'yes',request_type:'ajax'},function(data){	
		});
	});
	// remove the search job link message in applied jobs and saved jobs
	jQuery(".dismiss_search_job").live("click",function(){
		jQuery(this).parents(".matchJob").hide("fast");
	});
	jQuery(".lnk_profile_dismiss").click(function(){
		jQuery.post(jQuery("#page_url").val()+"profile/",{hide_profile_complete:'yes',request_type:'ajax'},function(data){	
		});
	});
	jQuery(".hide_account_status").click(function(){
		jQuery.post(jQuery("#page_url").val()+"profile/",{hide_account_status:'yes',request_type:'ajax'},function(data){	
		});
	});
	jQuery(".lnk_others_dismiss").click(function(){
	    var dismiss = jQuery(this).attr('dismiss');
		jQuery.post(jQuery("#page_url").val()+"profile/",{hide_complete:dismiss,request_type:'ajax'},function(data){
		});
	});
	if(jQuery("form:[name='view_jobs']").length == 0){
		jQuery(".btnApply").click(function(){	
			if(jQuery("#logout").length >= 0){
				if(jQuery("[name='selected_jobs[]']:checked").length > 0) {
					jQuery("#search_job_submit").val('apply_selected').click();
					return true;;
				}
				else {
					$.alerts.dialogClass = 'alert_';
					$.alerts.okButton = '&nbsp;Ok&nbsp;';
					jAlert(alrt_job_apply_msg, 'Alert');
				}
			}	
			else	
				window.location.href = jQuery("#page_url").val()+"login/?redirect_uri=search_jobs/"+jQuery("#sorting_query_string").val()+jQuery("#order_str").val();
			return false;
		});
		
		jQuery(".btnSave").click(function(){	
			if(jQuery("#logout").length >= 0){
				if(jQuery("[name='selected_jobs[]']:checked").length > 0) {
					jQuery("#search_job_submit").val('save_selected').click();
					return true;
				}
				else {
					$.alerts.dialogClass = 'alert_';
					$.alerts.okButton = '&nbsp;Ok&nbsp;';
					jAlert(alrt_job_save_msg, 'Alert');
				}
			}	
			else	
				window.location.href = jQuery("#page_url").val()+"login/?redirect_uri=search_jobs/"+jQuery("#sorting_query_string").val();	
			return false;	
		});

		jQuery("[name='remove_selected']").click(function(){
			if(jQuery("[name='selected_jobs[]']:checked").length > 0){
				var control = jQuery(this);
				$.alerts.dialogClass = 'confirm_';	$.alerts.okButton = '&nbsp;Yes&nbsp;';	$.alerts.cancelButton = '&nbsp;No&nbsp;';
				jConfirm(alrt_remove_jobs, 'Confirmation', function(r) {
					if(r == false) 
						return false;
					else{
						control.closest("form").find("[name='submit_by']").val("remove_selected");
					    control.closest("form").submit();
					}
						
						
				});	
				
				
			}else{
				$.alerts.dialogClass = 'alert_';
				$.alerts.okButton = '&nbsp;Ok&nbsp;';
				jAlert(alrt_job_remove_msg, 'Alert');
				return false;
			}
			return false;			
		});
	}
	
	// view job page change the apply text
	if(jQuery("form:[name='view_jobs']").length > 0){
		jQuery(".btnApply").live("click",function(){
		if($(this).is(':enabled') == false) {return false;}
		index = jQuery(".btnApply").index(this);
			if(jQuery("#logout").length > 0){
				if(jQuery(".btnApply:eq("+index+")").find("span").text() != 'Applied'){	
					setTimeout(function(){ jQuery(".btnApply:eq("+index+")").attr("disabled","disabled").find("span").text(Applying);},0);
					return true;
				}
				else {
					return false;
				}
			}
				
		});
	}
//===== Progressbar (Jquery UI) =====//
        
		if(jQuery.isFunction(jQuery.fn.progressbar) == true){
			var progressbar_value = jQuery("#profile_completeness").val();
			$( "#progressbar" ).progressbar({
				value: parseInt(progressbar_value)
			});
		}
	/*Note: The following script is used for to highlight the searched text in search results page*/
	// --- Start --- //
	if(window.Hilitor != undefined && jQuery(".noFound").length == 0 && ( jQuery.trim(qstring("highlight")) == '' || qstring("highlight") == undefined )) {
	
		var myHilitor = new Hilitor(jQuery("#searchResultTable").length ? "searchResultTable" : 'profile',undefined,jQuery("#searchResultTable").length ? undefined : '|SCRIPT|FORM|LABEL|A|H3');
		var company_details = jQuery("[name='company[]']").map(function(){
			value = jQuery.trim(jQuery(this).text());
			return value ;
		}).get().join(", ");
        var job_type  = jQuery("#job_type option:selected").val();
		job_type = job_type == 'All' ? '':job_type;
		var job_location = jQuery("#search_location").val();
		job_location = job_location == "Location(s)" ? "": job_location;
		var job_keywords = jQuery("#search_keywords").val();
		job_keywords = job_keywords == "Keyword(s)" ? "" : job_keywords;
		var company = qstring('company') ?  qstring('company') : '';
		var course_search = '';
		var searchKeywords = job_keywords+" "+job_location+" "+" "+company+" "+jQuery("#search_industries").val().replace(/\'/g, "")+" "+jQuery("#search_education").val()+" "+jQuery("#search_departments").val()+" "+jQuery("#search_min_exp").val()+" "+jQuery("#search_max_exp").val()+" "+jQuery("#search_min_salary").val()+" "+jQuery("#search_max_salary").val()+" "+company_details+" "+job_type;
		if(jQuery("#searchResultTable").length == 0){
			course_search = qstring("program");
			course_search = course_search + " "+ qstring("course");
			course_search = course_search + " " + qstring("specialization");
			course_search = jQuery.trim(course_search);
			if(course_search != ''){
				var myHilitor2 = new Hilitor('qualification',undefined,'|SCRIPT|FORM|LABEL|A|H3:BUTTON');
				myHilitor2.apply(course_search); 
			}
		}
		if(jQuery.trim(searchKeywords)!='') {
			if(jQuery("#searchResultTable").length == 0){
				var myHilitor1 = new Hilitor('jobMsg',undefined,'|SCRIPT|FORM|LABEL|A|H3:BUTTON');
				myHilitor1.apply(searchKeywords); 
			}
			myHilitor.apply(searchKeywords); 
		}
		
		
	}	
	// --- End   --- //
});	
/*Note: The following script is used to sumit the login page*/
		jQuery("#login").click(function(){
			jQuery("#login").attr("disabled","disabled").html("<span class='processing'>"+Processing+"</span>");
			jQuery("#submit_login").click();
		});

/*Note: The following script is used to sumit the save resume page*/
		jQuery("#resume_save").live("click",function(){
			if($(this).is(':enabled')){
				jQuery("#resume_save").attr("disabled","disabled").html("<span class='processing'>"+Processing+"</span>");
				jQuery("#save_resume").click();
			}
		});
		/*Note: The following script is used to sumit the forgot password page*/
		jQuery("#password_forgot").live("click",function(){
			if($(this).is(':enabled')){
				jQuery(this).prop('disabled', true);
				jQuery("#password_forgot").html("<span class='processing'>"+Processing+"</span>");
				jQuery("#forgot_password").click();
			}
		});
/*Note: The following script is used to sumit the reset password page*/
	/*Note: The following script is used for search jobs*/
		jQuery("#new_password,#new_confirm_password").keypress(function(event){
			if(event.keyCode == 13){
				jQuery('#reset_pass').click();
			}
		});
		jQuery("#reset_pass").live("click",function(){
			if($(this).is(':enabled')){
				jQuery("#reset_pass").attr("disabled","disabled").html("<span class='processing'>"+Processing+"</span>");
				jQuery("#password_reset").click();
			}
		});
/*Note: The following script is used to sumit the forgot password page*/
		jQuery("#download_resume").live("click",function(){
			jQuery("#resume_download").click();
		});
		function refer_friends_fbck(){
			if(jQuery("#refer_email").closest('form').attr('id') == "refer_friends") {
				jQuery("#refer_email").next(".holder").remove();
				jQuery("#refer_email").next(".facebook-auto").remove();
			jQuery("#refer_email").fcbkcomplete({
                    //json_url: jQuery("#page_url").val()+"get_refered_email/",
                    addontab: true,                   
                    input_min_size: 0,
					maxitems: 25,
					width: 450,
                    height: 10,
					cache: true,
					newel: false
				
			});
			if(jQuery("form.refer_site_friends").length > 0){
				jQuery("#refer_email_annoninput").find(".maininput").focus();
			}
		}
		}
jQuery(document).ready(function(){
		//Note: The following script is used for to restrict the user to type more than 250 in college registration form for branches field
		jQuery("#branches").live("keypress select",function(event){
			if(event.type == 'select'){
				jQuery(this).data("is_select_text",true);
				return false;
			}
			var regex = new RegExp("^[0-9]+$"); 
			var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
			var $this = $(this);
			var value = $this.val()+''+key;
			if(jQuery(this).data("is_select_text") && event.which!=0){
				value = $this.val();
				jQuery(this).removeData("is_select_text");
			}
			if ((!regex.test(key) && (event.which) != 8 && event.which!=0) ||  parseInt(value) > 250 ) {
				event.preventDefault();
				return false;
			}
		});
	//first field focus for both emp and job seeker login and forgot pwd
	if(jQuery("#login_focus_field").val() == 'login_focus_field'){
		jQuery("#login_email").focus();
	}
	
	/*
	//first field focus for job seeker and emp registration page
	if(jQuery("#reg_focus_field").val() == 'reg_focus_field'){
		jQuery("#full_name").focus();
	}
	
	//first field focus for business enquiry
	if(jQuery("#business_focus_field").val() == 'business_focus_field'){
		jQuery("#first_name").focus();
	}
	
	//first field focus for placement enquery
	if(jQuery("#placement_focus_field").val() == 'placement_focus_field'){
		jQuery("#ins_name").focus();
	}
	
	//first field focus for college registration
	if(jQuery("#college_focus_field").val() == 'college_focus_field'){
		jQuery("#college_name").focus();
	}
	//first field focus for college registration
	if(jQuery("#college_focus_field").val() == 'college_focus_field'){
		jQuery("#college_name").focus();
	}*/
// function to load the refer friend email 
	jQuery("#refer_email").ready(function(){ 
		refer_friends_fbck();
	});

   /*Note: The following script is used for hide/show save or apply link in search results page*/ 
   // -- Start
   if(jQuery("#logout").length == 0){
		jQuery(".save").live("mouseover",function(){
			jQuery(".saveApply:eq("+jQuery(".save").index(this)+")").show();
			jQuery(".save:eq("+jQuery(".save").index(this)+")").hide();

		 });
		jQuery(".saveApply").live("mouseout",function(){
			jQuery(".saveApply:eq("+jQuery(".saveApply").index(this)+")").hide();
			jQuery(".save:eq("+jQuery(".saveApply").index(this)+")").show();

		 });
		 jQuery(".after_login").live("mouseover",function(){
			jQuery(".before_login:eq("+jQuery(".after_login").index(this)+")").show();
			jQuery(".after_login:eq("+jQuery(".after_login").index(this)+")").hide();

		 });
		jQuery(".before_login").live("mouseout",function(){
			jQuery(".before_login:eq("+jQuery(".before_login").index(this)+")").hide();
			jQuery(".after_login:eq("+jQuery(".before_login").index(this)+")").show();

		 });
		 jQuery(".multitple_save").live("mouseover",function(){
			jQuery(".multitple_saveApply:eq("+jQuery(".multitple_save").index(this)+")").show();
			jQuery(".multitple_save:eq("+jQuery(".multitple_save").index(this)+")").hide();

		 });
		jQuery(".multitple_saveApply").live("mouseout",function(){
			jQuery(".multitple_saveApply:eq("+jQuery(".multitple_saveApply").index(this)+")").hide();
			jQuery(".multitple_save:eq("+jQuery(".multitple_saveApply").index(this)+")").show();

		 });
		 	 jQuery(".multitple_apply").live("mouseover",function(){
			jQuery(".multitple_apply1:eq("+jQuery(".multitple_apply").index(this)+")").show();
			jQuery(".multitple_apply:eq("+jQuery(".multitple_apply").index(this)+")").hide();

		 });
		jQuery(".multitple_apply1").live("mouseout",function(){
			jQuery(".multitple_apply1:eq("+jQuery(".multitple_apply1").index(this)+")").hide();
			jQuery(".multitple_apply:eq("+jQuery(".multitple_apply1").index(this)+")").show();

		 });
		  	 jQuery(".multitple_refer").live("mouseover",function(){
			jQuery(".multitple_refer1:eq("+jQuery(".multitple_refer").index(this)+")").show();
			jQuery(".multitple_refer:eq("+jQuery(".multitple_refer").index(this)+")").hide();

		 });
		jQuery(".multitple_refer1").live("mouseout",function(){
			jQuery(".multitple_refer1:eq("+jQuery(".multitple_refer1").index(this)+")").hide();
			jQuery(".multitple_refer:eq("+jQuery(".multitple_refer1").index(this)+")").show();

		 });
    	//dynamick refer friends link
		jQuery(".refer").live("mouseover",function(){
			jQuery(".referApply:eq("+jQuery(".refer").index(this)+")").show();
			jQuery(".refer:eq("+jQuery(".refer").index(this)+")").hide();

		 });
		jQuery(".referApply").live("mouseout",function(){
			jQuery(".referApply:eq("+jQuery(".referApply").index(this)+")").hide();
			jQuery(".refer:eq("+jQuery(".referApply").index(this)+")").show();

		});
	}
	// -- End
	/*Note The following script is used to for to save/apply jobs */
	// -- Start
	else{
	
		
		 //Note: Apply jobs
		 jQuery(".apply_jobs").live("click",function(){
			 var control = jQuery(this);
			 var index = jQuery(".apply_jobs").index(this);
			 var remove_jobs = jQuery(this).next();
			 if(remove_jobs != undefined && remove_jobs.hasClass("remove_jobs"))
				remove_jobs.hide();
			 if($(".apply_jobs:eq("+index+")").attr('disabled') == 'disabled') return false;
			 var job_id =jQuery(".apply_jobs:eq("+index+")").attr("job_id");
			 jQuery(".apply_jobs:eq("+index+")").attr("disabled","disabled").html("<span>"+Applying+"</span>");
			 jQuery(".remove_jobs:eq("+index+")").next("button").hide();
			 jQuery.post(jQuery("#page_url").val()+'saved_jobs/',{jobs_id:jQuery.trim(job_id),apply_jobs :'apply_jobs',request_type:'ajax'},function(data){
			 var split_data = data.split('|');
			 //Note: Show error message, if jobseeker account is rejected
			 if(split_data[0] == "rejected" || split_data[0] == "waiting"){
				 jQuery(".apply_jobs:eq("+index+")").removeAttr("disabled").html("<span>"+apply+"</span>");
				jQuery("#pcColor").find(".successLeft").removeClass("successLeft").addClass("pcLeft");
				jQuery("#pcColor").find(".successRight").removeClass("successRight").addClass("pcRight");
				jQuery("#pcColor").find(".successCenter").removeClass("successCenter").addClass("profileComplete");
				jQuery("#pcColor").show().find("#msg").text(split_data[0] == "rejected" ? msg_account_rejected : msg_account_waiting);		
				
			 }
			 else if(split_data[0] == 'applied'){
				control.parents("tbody").find("a.save_jobs,a.saveJob").hide();
				var tbody = control.parents("tbody");
				//Note: set applied jobs count
				var applied_jobs_count = parseInt(split_data[2]);
				if(applied_jobs_count > 0 )	jQuery(".applied_jobs_count").text(applied_jobs_count).show();
				else jQuery(".applied_jobs_count").hide();
				//Note: set saved jobs count
				var saved_jobs_count = parseInt(split_data[3]);
				if(saved_jobs_count > 0 )	jQuery(".saved_jobs_count").text(saved_jobs_count).show();
				else jQuery(".saved_jobs_count").hide();
				
				var sec_ago = jQuery.trim(split_data[4]) == 'ago' ? '1 sec ago' : split_data[4];
				var remove_tr1 = jQuery(".apply_jobs:eq("+index+")").parents("tr").next("tr").next("tr");
				//jQuery(".apply_jobs:eq("+index+")").after("<span class=\"exp fBold\">"+sec_ago+"</span>");
				jQuery(".apply_jobs:eq("+index+")").replaceWith("<button class=\"small cursorDef\" name=\"apply\" style=\"cursor:default\" onclick=\"javascript:return false;\" type=\"submit\"><span>Applied</span></button>");
				jQuery(".remove_jobs:eq("+index+")").next("button").show();
				
				if(jQuery("form[name='saved_jobs']").length > 0){
					tbody.remove();
					var total_records = parseInt(jQuery("#total_records").text());
					jQuery("#total_records").text(total_records-1);
				}
				jQuery("#pcColor").show().find("#msg").text(msg_jobs_applied);
				if(jQuery("#pcColor").find(".pcLeft").length){
					jQuery("#pcColor").find(".pcLeft").removeClass("pcLeft").addClass("successLeft");
					jQuery("#pcColor").find(".pcRight").removeClass("pcRight").addClass("successRight");
					jQuery("#pcColor").find(".profileComplete").removeClass("profileComplete").addClass("successCenter");
				}				
             }
			 //Note: The following script is used to scroll to top page to see the jobs applied message
			 var root = jQuery("html, body");
				root.animate({
					scrollTop : jQuery("#pcColor").offset().top
				},500);
			if(remove_jobs != undefined)
				remove_jobs.show();
					 
			 });
			 return false;
		 });
		 //Note: Remove Jobs
		  jQuery("[name='remove_jobs']").live("click",function(){
		    var control = jQuery(this);
			var apply_jobs = jQuery(this).prev();
			 if(apply_jobs != undefined && apply_jobs.hasClass("apply_jobs"))
				apply_jobs.hide();	
			var index = jQuery(".remove_jobs").index(control);
			 if(jQuery(".remove_jobs:eq("+index+")").attr('disabled') == 'disabled') return false;
			$.alerts.dialogClass = 'confirm_';	$.alerts.okButton = '&nbsp;Yes&nbsp;';	$.alerts.cancelButton = '&nbsp;No&nbsp;';
			jConfirm(alrt_remove_jobs, 'Confirmation', function(r) {
					if(r == false){
						if(apply_jobs.length)
							apply_jobs.show();
						return false;
					}	
					else{
						var job_id =jQuery(".remove_jobs:eq("+index+")").attr("job_id");
						jQuery(".remove_jobs:eq("+index+")").attr('disabled',"disabled").html("<span>"+Removing+"</span>");
						jQuery(".remove_jobs:eq("+index+")").prev("button").hide();
						var page_name = jQuery("form[name='saved_jobs']").length > 0 ? 'saved_jobs/' : (jQuery("form[name='applied_jobs']").length > 0 ? 'applied_jobs/':'');
						jQuery.post(jQuery("#page_url").val()+page_name,{jobs_id:jQuery.trim(job_id),remove_jobs :'remove_jobs',request_type:'ajax'},function(data){
							var split_data = data.split('|');
							if(split_data[0] == 'removed'){
								//Note: set applied jobs count
								var applied_jobs_count = parseInt(split_data[2]);
								if(applied_jobs_count > 0 )	{
									jQuery(".applied_jobs_count").text(applied_jobs_count).show();
									jQuery(".totalResult").find("span:eq(0)").text(applied_jobs_count);
								}	
								else {
									jQuery(".applied_jobs_count").hide();
								}	
								//Note: set saved jobs count
								var saved_jobs_count = parseInt(split_data[3]);
								if(saved_jobs_count > 0 ) {
									jQuery(".saved_jobs_count").text(saved_jobs_count).show();
									jQuery(".totalResult").find("span:eq(0)").text(saved_jobs_count);
								}		
								else {
									jQuery(".saved_jobs_count").hide();
									
								}	
								
								control.parents("tbody").remove();
								jQuery("#pcColor").show().find("#msg").text(msg_jobs_removed);
								//Note: The following script is used to scroll to top page to see the jobs removed message
								var root = jQuery("html, body");
								root.animate({
									scrollTop: jQuery("#pcColor").offset().top
								},500);
								if(jQuery("#pcColor").find(".pcLeft").length){
									jQuery("#pcColor").find(".pcLeft").removeClass("pcLeft").addClass("successLeft");
									jQuery("#pcColor").find(".pcRight").removeClass("pcRight").addClass("successRight");
									jQuery("#pcColor").find(".profileComplete").removeClass("profileComplete").addClass("successCenter");
								}
							}	
						});
					}					
			});	
			
			 return false;
		 });
		 //Note: Save jobs
		 jQuery(".save_jobs").live("click",function(){
			var index = jQuery(".save_jobs").index(this);
			 if($(".save_jobs:eq("+index+")").attr('disabled') == 'disabled') return false;
			 var job_id =jQuery(".save_jobs:eq("+index+")").attr("job_id");
			 jQuery(".save_jobs:eq("+index+")").attr("disabled","disabled").html(Saving);
			 jQuery(".save_jobs:eq("+index+")").trigger("mouseout");
			 jQuery.post(jQuery("#page_url").val()+'saved_jobs/',{jobs_id:jQuery.trim(job_id),save_jobs :'save_jobs',request_type:'ajax'},function(data){
			 var split_data = data.split('|');

			 if(split_data[0] == 'saved')
				//Note: set applied jobs count
					var applied_jobs_count = parseInt(split_data[2]);
					if(applied_jobs_count > 0 )	jQuery(".applied_jobs_count").text(applied_jobs_count).show();
					else jQuery(".applied_jobs_count").hide();
					//Note: set saved jobs count
					var saved_jobs_count = parseInt(split_data[3]);
					if(saved_jobs_count > 0 )	jQuery(".saved_jobs_count").text(saved_jobs_count).show();
					else jQuery(".saved_jobs_count").hide();
				   jQuery(".save_jobs:eq("+index+")").replaceWith("<a class=\"saveJob\" href=\"javascript:void(0);\">"+lbl_jobs_saved+"</a>");
					jQuery("#pcColor").show().find("#msg").text(msg_jobs_saved);
				 
			 });
			 		 return false;
		 });
	}
	// -- End
	//Note: The following script is used for to update resumet title
	// --- Start --- 
	jQuery(".editResume").click(function(){
		jQuery("#resume_title_content").hide();
		jQuery(".updateResume").toggle();	
		jQuery("#resume_success").hide();
		jQuery("#resume_error").hide();		
	});
	jQuery(".cancelResume").click(function(){
		jQuery(".updateResume").toggle();jQuery("#resume_title_content").show();					   
	});
	jQuery("#resume_title").keypress(function(e){
		if(e.keyCode == 13){
			jQuery('.updateRes').click();
		}
	});
	jQuery(".updateRes").click(function(){
		var title = jQuery.trim(jQuery("#resume_title").val());
		jQuery("#resume_error").hide();
		if(title == '') {jQuery("#resume_error").show(); return false;}
		var updateRes = jQuery(this).text();
		jQuery(this).text(msg_updating); jQuery(".cancelResume").hide();jQuery("#pipe").hide();
		jQuery.post(jQuery("#page_url").val()+"profile/",{resume:'update',resume_title:title,request_type:'ajax'},function(data){
		jQuery("#presume_title").text(title);jQuery(".updateRes").text(updateRes);
		jQuery(".updateResume").toggle();jQuery("#pipe").show();
		jQuery(".cancelResume").show();
		jQuery("#resume_title_content").show();
			if(data ==  "success"){
				jQuery("#resume_success").show();
			}else if(data == "error"){
				jQuery("#resume_success").show();
			}
		});
	});
	jQuery(".resumeClose").click(function(){
		jQuery("#resume_success").hide();
		
	});
	// --- End ---
});
/* function to validate the employee login
function validate_login(par_field_name,event_name) {
		//Note: assign field name
		var field_name = new Array('login_email', 'login_password');
		//Note: assign field type
		var field_type = new Array("email", "required");
		//Note: assign field basic message  //(This will be used for your login)
		var field_msg = new Array('','');
		//Note: assign field basic error message
		var field_error_msg = new Array(email_address_error,'Please enter your password');
		//Note: assign field advance error message
		var field_adv_error_msg = new Array(email_address_valid_error,'');
		var field_length=field_name.length;
		var set_foucs=undefined;

		//Note: to get particular field name and field type when user foucus out the control
		if(par_field_name!=undefined){
			var index=-1;
		    index =field_name.indexOf(''+par_field_name+'');
			field_type = new Array(field_type[index]);
			field_name = new Array(field_name[index]);
			field_msg = new Array(field_msg[index]);
			field_error_msg = new Array(field_error_msg[index]);
			field_adv_error_msg = new Array(field_adv_error_msg[index]);
				set_foucs='false';
		}
		var validation = item_validation(field_name, field_type,field_msg,field_error_msg,field_adv_error_msg,set_foucs);
				
		 if(event_name == 'blur'){
			check_fields = false;
			return false;
		}
		if(par_field_name!=undefined){
			return false;
		}


if (validation == true   && field_length == field_name.length && par_field_name == undefined ) {
	jQuery('#security').parent('div').find(".errorMsg").hide().text("Please enter the text in the image");
	if(par_field_name==undefined){
		 	jQuery("#form_submit").attr("disabled","disabled").html("<span class='processing'>"+Processing+"</span>");
	}
	return true;

} else {
		jQuery(".errorField").show();
	return false;
}
	return false;

}*/

/* function to validate the employee registration */
function validate_emp_registration(par_field_name,event_name) {
		if($("#form_submit").is(':enabled') == false) {return false;}
		var emp_strength = 'true';
		if(jQuery.trim(jQuery("#employee_strength").val()) > 35000 && jQuery.trim(jQuery("#employee_strength").val()) != '') {
			emp_strength = 'false';
		}
		//Note: assign field name
		var field_name = new Array('first_name','last_name', 'contact_no','company_name','company_logo','address','landline','city','state','company_profile','website','email_address','password','cpassword','security','rec_firm','district','termsCond');
		//Note: assign field type
		var field_type = new Array("required","required", "contact_no", "required", "image_empty",  "required" ,"landline","required", "dropdown", "required","website", "email", "password", "password",'required','radio','dropdown','checkbox');
		//Note: assign field basic message  //(This will be used for your login)
		var field_msg = new Array('','','','','','','','','','','','','','','');
		//Note: assign field basic error message
		var field_error_msg = new Array(first_name_error,last_name_error, contact_number_error, err_comapny_name, photo_upload_error, err_comapny_address,err_landline_no ,err_comapny_city, state_error, err_comapny_profile,err_website,email_address_error, password_error, cpassword_error,'Please enter the text in the image','Please select any one','Please select the district', 'Please agree to Terms');
		//Note: assign field advance error message
		var field_adv_error_msg = new Array('','', contact_number_adv_error,'',photo_upload_advance_error, '', advance_err_landline_no, '', '',  '',adv_url_valid_error,'', email_address_valid_error, '','incorrect security code','');
		var field_length=field_name.length;
		var set_foucs=undefined;

		//Note: to get particular field name and field type when user foucus out the control
		if(par_field_name!=undefined){
			var index=-1;
		    var sheepit_control = jQuery("[name='"+par_field_name+"']").attr("id");
		    //Note: to get the particular control index from the array of field name
            if(field_name.indexOf(''+par_field_name+'-cpassword')!=-1)
			  index =field_name.indexOf(''+par_field_name+'-cpassword');
			else if(field_name.indexOf('password-'+par_field_name+'')!=-1)
			  index =field_name.indexOf('password-'+par_field_name+'');
			else if(( sheepit_control!=undefined && sheepit_control!='') && field_name.indexOf(''+sheepit_control.replace('0','')+'')!=-1)
			  index =field_name.indexOf(''+sheepit_control.replace('0','')+'');
			else
			  index =field_name.indexOf(''+par_field_name+'');
			field_type = new Array(field_type[index]);
			field_name = new Array(field_name[index]);
			field_msg = new Array(field_msg[index]);
			field_error_msg = new Array(field_error_msg[index]);
			field_adv_error_msg = new Array(field_adv_error_msg[index]);
				set_foucs='false';
		}
	
		var validation = item_validation(field_name, field_type,field_msg,field_error_msg,field_adv_error_msg,set_foucs);
		if(security_code_exists == "false"){
			jQuery('#security').parent('div').removeClass('message');
			jQuery('#security').parent('div').find(".errorMsg").hide().text("Please enter the text in the image");
		}
		else if(security_code_exists =='true'){
			 jQuery('#security').parent('div').addClass('message');
			if(jQuery.trim(jQuery("#security").val()) != '')
					jQuery('#security').parent('div').find(".errorMsg").show().text("Incorrect value entered");
				else
					jQuery('#security').parent('div').find(".errorMsg").show().text("Please enter the text in the image");
		}
		
		 if(event_name == 'blur'){
			check_fields = false;
			return false;
		}
		if(par_field_name!=undefined){
			return false;
		}
		var indus_validate = true;
		// validate for industry
		if(jQuery(".empIndus").is(":visible")){
			indus_validate = validate_industry();
		}

email_exists = 'false';

if (validation == true  && indus_validate == true && security_code_exists == 'false' && email_exists == 'false' && field_length == field_name.length && par_field_name == undefined && emp_strength == 'true') {
	/*jQuery('#security').parent('div').find(".errorMsg").hide().text("Please enter the text in the image");*/
	if(par_field_name==undefined){
			if(jQuery("#package_amount").length > 0){
			//	Processing = 'Redirecting to Payment Gateway.. Pls wait..';
			//	jQuery("#form_submit").css("width","");
			}	
		 	jQuery("#form_submit").attr("disabled","disabled").html("<span class='processing'>"+Processing+"</span>");
			jQuery("#emp_registration_cancel").hide();
			jQuery('#email_address').parent('div').removeClass('message');
			jQuery('#email_address').parent('div').find(".errorMsg").hide();
			jQuery('#security').parent('div').removeClass('message');
	}
	jQuery("#error_email_address").text("");
    return true;

} else {
		jQuery(".errorField").show();
	  //jQuery("#form_submit").html("<span>"+go_to_step2+"</span>").removeAttr("disabled", "disabled");
	  return false;
}
	return false;

}

//restrict employee strength upto 35000 
$("#employee_strength").keyup(function(e) {
		var $this = $(this);
		var val = $this.val();
		if (val > 35000){
			e.preventDefault();
			jQuery("#employee_strength").parent('.field').addClass("message");
			jQuery("#employee_strength").next(".errorMsg").show().text(err_max_value_emp_strength);
			return false;
		}
});

	/*Note: The following script is used for search jobs*/
	jQuery("#searchtxt").keypress(function(event){
		if(event.keyCode == 13){
			jQuery('button.inbox_search').click();
		}
	});
//inbox searh text 
jQuery('button.inbox_search').live('click',function() {
	if(jQuery(".faq_search").length){
		if(jQuery("#sel_section").val()) {
			return true;
		}
		return false;
	}else{
		if(jQuery.trim(jQuery('.searchtxt').val())!= 'Enter Search Keywords...' && jQuery.trim(jQuery('.searchtxt').val())!= '') {
			if(jQuery('#sorting_query_string').val()!= undefined) {
				var redirect_url = jQuery('#sorting_query_string').val();
				window.location.href = redirect_url+'&searchtxt='+jQuery.trim(jQuery('.searchtxt').val());
			}
		}
	}
});

//in view inbox page mail to friends button click function
jQuery('button#refer_friend_inbox,#cancel_message').live('click',function() {
	//call refer friend submit
	jQuery("form#refer_friends").toggle("slow");
	return false;
	//jQuery('#refer_frnd').click();
});

//cancel the employer registration
jQuery('button#emp_registration_cancel').live('click',function() {
	window.location.href = jQuery("#page_url").val()+'emp_login/';
});
jQuery('[name="company_name"]').live('blur',function(event){
	var company_name = jQuery.trim(jQuery(this).val());
	//var before_control = jQuery(".next").prev();
	//var control = jQuery(".next").html();
	//.hide();
	if(company_name != '') {	
		setTimeout(function(){	jQuery('#company_name').parent('div').find(".errorMsg").show().text(checking);},10);
		jQuery('#company_name').parent('div').find(".errorMsg").show().text(checking);
		jQuery(".company_name_available").hide();
		jQuery.post(jQuery("#page_url").val()+'employer_registration/',{exists_company_name:trim(company_name)},function(data){
			if(data == 1) {
				jQuery(".company_name_available").show();
				jQuery('#company_name').parent('div').removeClass('message');
				jQuery('#company_name').parent('div').find(".errorMsg").hide().text("");
				
			}else if(data == 0){
				jQuery('#company_name').parent('div').addClass('message');
				jQuery('#company_name').parent('div').find(".errorMsg").show().text(company_name_try_another_error);
				jQuery(".company_name_available").hide();
			}
			jQuery(".next").show();
			//before_control.after('<li style="width:898px;" class="next cf mb25">'+control+'</li>');
		});
	}else{
		jQuery(".company_name_available").hide();
		jQuery('#company_name').parent('div').removeClass('message');
		jQuery('#company_name').parent('div').find(".errorMsg").show().text('');
		jQuery(".company_name_available").hide();
	}
});

	/* function to validate the refer friends */
	function validate_refer_friends(par_field_name,event_name) {
			if($("#form_submit").is(':enabled') == false) {return false;}
			if(jQuery('#submit_form').val() != 'cancel') {
			var contact_id = jQuery('input:radio[name=refer]:checked').val();
			var entered_email = jQuery.trim(jQuery("#refer_email_annoninput :text").val());
			
			if(entered_email != '') { 
				if(contact_id == 'mobile') {
					var reg = /^([0-9])+$/;
				}
				else {
					var reg = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				}
				if(reg.test(entered_email) == true) {
				
					jQuery("select#refer_email").html(jQuery("select#refer_email").html()+"<option selected='selected'>"+entered_email+"</option>");
				}	
			}

	
		
			//Note: assign field name



			var field_name = new Array('refer_email','message');
			//Note: assign field type
			var field_type = new Array("fcbkrequired","required");
			//Note: assign field basic message  //(This will be used for your login)
			var field_msg = new Array('');
			//Note: assign field basic error message
			var new_error = contact_id == 'mobile' ? error_refer_mobile : error_refer_email ;
			var field_error_msg = new Array(new_error,error_enter_message);
			//Note: assign field advance error message
			var field_adv_error_msg = new Array('');
			var field_length=field_name.length;
			var set_foucs=undefined;

			//Note: to get particular field name and field type when user foucus out the control
			if(par_field_name!=undefined){
				var index=-1;
		    	  index =field_name.indexOf(''+par_field_name+'');
				field_type = new Array(field_type[index]);
				field_name = new Array(field_name[index]);
				field_msg = new Array(field_msg[index]);
				field_error_msg = new Array(field_error_msg[index]);
				field_adv_error_msg = new Array(field_adv_error_msg[index]);
					set_foucs='false';
			}
		
			var validation = item_validation(field_name, field_type,field_msg,field_error_msg,field_adv_error_msg,set_foucs);
			 if(event_name == 'blur'){
				check_fields = false;
				return false;
			}
			if(par_field_name!=undefined){
				return false;
			}


	if (validation == true && field_length == field_name.length && par_field_name == undefined) {

		if(par_field_name==undefined){
				jQuery("#form_submit").attr("disabled","disabled").html("<span class='processing'>"+Processing+"</span>");
				jQuery("#cancel").hide();
				 jQuery("#cancel_message").hide();
		}
		return true;

	} else {
		  //jQuery("#form_submit").html("<span>"+go_to_step2+"</span>").removeAttr("disabled", "disabled");
		  return false;
	}
		return false;
		}

	}
	
	// slidetoggle of right side message in refer friends
	jQuery("#refer_right_dismiss").live("click",function() {
		jQuery(".refer_right_text").slideToggle("fast");
	});
	
	//var val=jQuery('input:radio[name=experience]:checked').val();
	//dynamically change the email mobile number msg
	var mobile_number_value = '',mobile_number_value1='',email_address_value='',email_address_value1='';
	jQuery(".radio").live("click", function() {
		
		if(jQuery("#refer_email").closest('form').attr('id') == "refer_friends") {
			if(jQuery('input:radio[name=refer]:checked').val() == 'email') {
				mobile_number_value = jQuery("#refer_email").html();
				mobile_number_value1 = jQuery("#refer_email").next('.holder').html();
				jQuery("span.phone").hide();
				if(email_address_value){
					jQuery("#refer_email").html(email_address_value); 
					jQuery("#refer_email").next('.holder').html(email_address_value1);
				}else{
					jQuery("#refer_email").html("");
					jQuery("#refer_email").next('.holder').find('.bit-box').remove();
				}
				jQuery("span.mail").show();
				jQuery(".tip_mid span").text("You can add multiple email address separated by comma");
			}
			else {
				email_address_value = jQuery("#refer_email").html();
				email_address_value1 = jQuery("#refer_email").next('.holder').html();
				jQuery("span.mail").hide();
				if(mobile_number_value){
					jQuery("#refer_email").html(mobile_number_value); 
					jQuery("#refer_email").next('.holder').html(mobile_number_value1);
				}
				else{
					jQuery("#refer_email").html("");
					jQuery("#refer_email").next('.holder').find('.bit-box').remove();
				}				
				jQuery("span.phone").show();
				jQuery(".tip_mid span").text("You can add multiple mobile number separated by comma");
			}
			
		}
		refer_friends_fbck();
	});	
	jQuery('span.refer_more_jobs').live('click', function() {
		if(jQuery('form:[name=refer_friends]')) {
			jQuery('span.refer_more_jobs').hide();
			jQuery('ul.less_jobs').hide();
			jQuery('span.refer_less_jobs').show();
			jQuery('ul.more_jobs').show();
		}	
	});	
	jQuery('span.refer_less_jobs').live('click', function() {
		if(jQuery('form:[name=refer_friends]')) {
			jQuery('span.refer_less_jobs').hide();
			jQuery('ul.more_jobs').hide();
			jQuery('span.refer_more_jobs').show();
			jQuery('ul.less_jobs').show();
		}	
});
//Note: Generate Resume Script
jQuery(document).ready(function(){
   
   if(jQuery("form#emp_registration").length > 0) {
		jQuery(".checkbox").live("click",function(event){
			var selecte_value = jQuery.trim(jQuery(this).next("input:[name='industry[]']").attr("ind_val"));
			if(jQuery(this).next("input:[name='industry[]']").attr("checked") == 'checked') {	
				//alert("<li>"+selecte_value+"&nbsp;&nbsp;<a href=\"javascript:void(0)\" class=\"remove_tags\" title=\"Removing tag\">x</a></li>");
				jQuery("ul.qualSelect").append("<li><span class=\"ind_name\">"+selecte_value+"</span><a href=\"javascript:void(0)\" class=\"closebutton\" title=\"Removing tag\"></a></li>");
				if(event.click == 'auto'){
					jQuery(this).click();
				}
			}
			else if(jQuery(this).next("input:[name='industry[]']").attr("checked") == undefined) {
				 jQuery("ul.qualSelect li").each(function(){
					var li_val = jQuery.trim(jQuery(this).find('span.ind_name').html());
					if(selecte_value == li_val) {
						jQuery(this).remove();
					}
				 });
			}
			validate_emp_registration('industry[]','blur');
			return false;
			
		});

		jQuery(".closebutton").live("click",function(){
			jQuery(this).parent('li').remove();
			var remove_value = jQuery.trim(jQuery(this).prev(".ind_name").text());
			var value = '';
			jQuery(".list_industry").find(":checkbox").each(function(){
				//Note: only for posting jobs for industry
				value = jQuery(this).attr("ind_val"); 
				if(remove_value == value){
					//jQuery(this).removeAttr("checked").trigger({type:'click','click':'auto'});
					jQuery(this).click();
				}
			});
			validate_emp_registration('industry[]','blur');
			return false;
		});
	}
	if(jQuery("#generate_resume_form").length > 0){	
	    //Note: set detault status
		jQuery("#generate_resume_form").find(".is_default").click(function(){
		
			if(jQuery(this).hasClass("no_default") == true){
					var conf = false;
					jQuery("[name='resume_id']").val(jQuery("[resume_id='resume_id']:eq("+jQuery(".is_default").index(this)+")").val());
					jQuery("[name='submit_by']").val('default').click();
					/*$.alerts.dialogClass = 'confirm_';	$.alerts.okButton = '&nbsp;Yes&nbsp;';	$.alerts.cancelButton = '&nbsp;No&nbsp;';
					jConfirm(alrt_default_resume, 'Confirmation', function(r) {
						if(r == true){
							jQuery("[name='submit_by']").val('default').click();	
						}
					});	*/
					
					
				}
			return false;
		});
		//Note: update status (active/inactive)
		jQuery("#generate_resume_form").find(".is_status").click(function(){
		
					jQuery("[name='resume_status']").val(jQuery(this).find("img").attr("status"));
					jQuery("[name='resume_id']").val(jQuery("[resume_id='resume_id']:eq("+jQuery(".is_status").index(this)+")").val());
					jQuery("[name='submit_by']").val('delete').click();
				
			
			return false;
		});
		//Note: delete resume [single]
		jQuery("#generate_resume_form").find(".is_delete").click(function(){
				var control = jQuery(this);
				$.alerts.dialogClass = 'confirm_';	$.alerts.okButton = '&nbsp;Yes&nbsp;';	$.alerts.cancelButton = '&nbsp;No&nbsp;';
				jConfirm(alert_remove, 'Confirmation', function(r) {
					if(r == false) 
						return false;
					else{
						jQuery("[name='resume_id']").val(jQuery("[resume_id='resume_id']:eq("+jQuery(".is_delete").index(control)+")").val());
						jQuery("[name='submit_by']").val('delete').click();
						}
						
						
				});	
				return false;
		});
		//Note: delete resume [multiple]
		jQuery("#generate_resume_form").find("[name='delete_resume']").click(function(){
			if(jQuery("[name='selected_resumes[]']:checked").length > 0) {
				var control = jQuery(this);
				$.alerts.dialogClass = 'confirm_';	$.alerts.okButton = '&nbsp;Yes&nbsp;';	$.alerts.cancelButton = '&nbsp;No&nbsp;';
				jConfirm(alert_remove, 'Confirmation', function(r) {
					if(r == false) 
						return false;
					else{
						control.closest("form").find("[name='submit_by']").val("multiple_delete").click();
					    
					}
						
						
				});	
				return false;
			}
			else {
				$.alerts.dialogClass = 'alert_';
				$.alerts.okButton = '&nbsp;Ok&nbsp;';
				jAlert(alrt_resume_delete, 'Alert');
				return false;
			}
		});
		//Note: download resume
		jQuery("#generate_resume_form").find(".download").click(function(){
			jQuery("[name='resume_id']").val(jQuery("[resume_id='resume_id']:eq("+jQuery(".download").index(this)+")").val());
			jQuery("[name='submit_by']").val('download').click();
				
		});
		jQuery("#generate_resume_form").find("#generate_resume").click(function(){
			if($(this).is(':enabled') == false) {return false;}
			if(jQuery("#generate_resume_form").find("#total_records").val() >= 5){
				$.alerts.dialogClass = 'alert_';
				$.alerts.okButton = '&nbsp;Ok&nbsp;';
				jAlert(alrt_resume_generate_limit, 'Alert');			   
				return false;  
			}
			/*The Follwoing script is used to show Generating resume... text in my profie page*/
			var control = jQuery(this).attr("name");
			jQuery("[cancel='cancel']").hide();
			window.setTimeout("disableButton('" +control + "')", 0);
			jQuery("#submit_resume").val("generate_resume");
			return true;
		});
		
	}
	
});


//form submission for inbox actions
jQuery(document).ready(function(){
	jQuery("#msg_action").change(function(){
		var control = jQuery(this);
		if(control.val() != null) { 
			if((jQuery("[name='selected_msgs[]']:checked").length > 0) || control.hasClass("view_inbox") || (control.closest("form").attr("name") == 'view_inbox') || (control.closest("form").attr("name") == 'view_job_alert')){
				if(control.val() == 'D') {
					$.alerts.dialogClass = 'confirm_';	$.alerts.okButton = '&nbsp;Yes&nbsp;';	$.alerts.cancelButton = '&nbsp;No&nbsp;';
					jConfirm(alrt_remove_jobs, 'Confirmation', function(r) {
						if(r == false) 
							return false;
						else{
							control.closest("form").submit();
						}
					});
				}
				else{
					control.closest("form").submit();
				}
			}
			else {
				jQuery.alerts.dialogClass = 'alert_';
				jQuery.alerts.okButton = '&nbsp;Ok&nbsp;';
				jAlert(jQuery(this).attr("name") == 'job_action' ? alrt_job_select :alrt_message_select, 'Alert');
				return false;
			}
		}
		else {
			jQuery.alerts.dialogClass = 'alert_';
			jQuery.alerts.okButton = '&nbsp;Ok&nbsp;';
			jAlert(alrt_action_select, 'Alert');
			return false;
		}
		//alert(jQuery(this).val());
	});
	
	// hide the refer friend message in inbox
	jQuery("#cancel_message").live("click",function(){
//			jQuery("#submit_form").val("cancel").click();
	});
	
});


/*Note: The following script is used to show image before upload it  in registration step1*/
$(function () {
 if(jQuery("#registration_step1").length > 0) {
	   var page_url = jQuery("#page_url").val();
		jQuery("#dismiss_photo").click(function(){
			jQuery(".verification").hide("fast");
			jQuery.post(page_url+"registration_step1/",{hide_msg_photo:'dismiss',request_type:'ajax'},function(data){
			
			});
		});	
		jQuery(".remove_photo").click(function(){
		    var control = jQuery(this);
			jConfirm(alrt_remove_photo, 'Confirmation', function(r) {
				if(r == true){
						jQuery(control).html("<span>"+lbl_removing_photo+"</span>");
						jQuery.post(page_url+"registration_step1/",{remove_photo:'remove_photo',request_type:'ajax'},function(data){
							jQuery(".loadedImg,.verification,.remove_photo").hide();
							jQuery("#photo").parent('.field').removeClass("message");
							jQuery("#photo").next(".errorMsg").hide();
							
						});
					}
				});	
		});
		$('#photo').fileupload({
			 dataType: 'json',
			 add: function (e, data) {
				jQuery("#progress").show();
				data.submit();
			 },
			 progressall: function (e, data) {
				
				    var percentage = Math.round(data.loaded / data.total * 100, 10);
					var progress = parseInt(data.loaded / data.total * 100, 10);
					$('#progress .bar').css(
					'width',
					percentage + '%'
					);
					jQuery("#percentage_loading").text(progress+" %").show();
			},
			fail: function(e,data){
				$.each(data.result, function (index, file) {
						//alert(index); alert(file);
				});
			 },
			 done: function (e, data) {
			
				$.each(data.result, function (index, file) {
					jQuery("#progress").hide().find(".bar").css("width","0%");
					 jQuery("#percentage_loading").hide();
					 if (file.error != undefined) {
						jQuery("#photo").parent('.field').addClass("message");
						if (file.error == 'Filetype not allowed') {
							jQuery("#photo").next(".errorMsg").show().text(photo_upload_error);
						}
						else if (file.error == 'File is too big') {
							jQuery("#photo").next(".errorMsg").show().text(photo_upload_advance_error);
						}else{
							jQuery("#photo").next(".errorMsg").show().text(file.error);
						}
					}else{
							jQuery("#photo").parent('.field').removeClass("message");
							jQuery("#photo").next(".errorMsg").hide();
							
							jQuery(".loadedImg,.verification,.remove_photo").show();
							jQuery(".verification .msg").html(success_photo_upload);
							jQuery(".remove_photo").html("<span>"+lbl_remove_photo+"</span>");
							jQuery("#photo_preview").attr("src",page_url+file.name);
					}
				
				});
			}
		});
 }
});
/*Note: function to calculate the experience details*/
function calculate_year_month_exp(start_year,start_month,end_year,end_month,interval) {
	var date1 = new Date(start_year, start_month-1, 1);
	var date2 = new Date(end_year, end_month, 0);
	var second=1000, minute=second*60, hour=minute*60, day=hour*24, week=day*7;
    var timediff = date2 - date1;
    if (isNaN(timediff)) return NaN;
    switch (interval) {
        case "years": return date2.getFullYear() - date1.getFullYear();
        case "months": return (
            ( date2.getFullYear() * 12 + date2.getMonth() )
            -
            ( date1.getFullYear() * 12 + date1.getMonth() )
        );
        case "weeks"  : return Math.floor(timediff / week);
        case "days"   : return Math.floor(timediff / day); 
        case "hours"  : return Math.floor(timediff / hour); 
        case "minutes": return Math.floor(timediff / minute);
        case "seconds": return Math.floor(timediff / second);
        default: return undefined;
    }
}
function load_experience_year(year,index,to_selected_value,action){
		var control = jQuery("select[name='exp_from_year[]']:eq("+index+")");
		var selected_value = year; 
		jQuery("select[name='exp_to_year[]']:eq("+index+")").html("<option value=''>Loading....</option>");
		var element = jQuery("select[name='exp_to_year[]']:eq("+index+")");
		jQuery(element).html('<option value="">Loading...</option></option>')
		var add_element = true;
		//load  experience to date
		jQuery("option",jQuery(control)).each(function(i){
			if(selected_value == jQuery(this).text()  ){
				jQuery(element).html(jQuery(element).html()+'<option value="'+jQuery(this).text()+'">'+jQuery(this).text()+'</option></option>');
				add_element = false;
			}else{
				if(i == 0){
					jQuery(element).html('<option value="">Year</option>');
					if(index == 0){
						jQuery(element).html('<option value="">Year</option><option value="Till_Date">Till Date</option>');	
					}
				}	
			}
			if(add_element == true &&  jQuery(this).text()!= 'Year'){
				jQuery(element).html(jQuery(element).html()+'<option value="'+jQuery(this).text()+'">'+jQuery(this).text()+'</option></option>');
			}
		});
		jQuery(element).find("option").each(function(i){
			if(jQuery(this).val() == to_selected_value) {
				jQuery(this).prop("selected",true);
				jQuery(this).attr("selectedindex",i);
			}
		});
		//jQuery(element).find("option[value='"+to_selected_value+"']").attr("selected","selected");
		jQuery(element).prev().prev().html("");
		var after_add = jQuery(element).parents(".jquery-custom-selectboxes-replaced").find(element);
		var before_control =jQuery(element).parents(".jquery-custom-selectboxes-replaced").parent();
		jQuery(element).parents(".jquery-custom-selectboxes-replaced").remove();
		before_control.prepend(after_add);
		var settings = 'jquery-selectbox';
		jQuery(element).selectbox(settings).bind('change', function(){
			jQuery('<div>Value of .default-usage-select changed to: '+jQuery(this).val()+'</div>').appendTo('#demo-default-usage .demoTarget').fadeOut(5000, function(){
				jQuery(this).remove(); 
			});
		});
		if(action == 'dont') return;
		//load  experience from date

		jQuery("select[name='exp_from_year[]']:gt("+index+")").each(function(i){
			var cur_index = i+1;
			element =  jQuery(this);
			var from_selected_value = jQuery(this).val();
		
			jQuery(element).html('<option value="">Loading...</option></option>');
			add_element = false;
			jQuery("option",jQuery(control)).each(function(i){
				if(selected_value == jQuery(this).text()  ){
					jQuery(element).html('<option value="">Year</option>');
					add_element = true;
				}
			
				if(add_element == true &&  jQuery(this).text()!= 'Year'){	
					jQuery(element).html(jQuery(element).html()+'<option value="'+jQuery(this).text()+'">'+jQuery(this).text()+'</option></option>');
				}
			});
			jQuery(element).find("option").each(function(i){
				if(jQuery(this).val() == from_selected_value) {
					jQuery(this).prop("selected",true);
					jQuery(this).attr("selectedindex",i);
				}
			});
			jQuery(element).prev().prev().html("");
			var after_add = jQuery(element).parents(".jquery-custom-selectboxes-replaced").find(element);
			var before_control =jQuery(element).parents(".jquery-custom-selectboxes-replaced").parent();
			jQuery(element).parents(".jquery-custom-selectboxes-replaced").remove();
			before_control.prepend(after_add);
			
			var settings = 'jquery-selectbox';
			jQuery(element).selectbox(settings).bind('change', function(){
				jQuery('<div>Value of .default-usage-select changed to: '+jQuery(this).val()+'</div>').appendTo('#demo-default-usage .demoTarget').fadeOut(5000, function(){
					jQuery(this).remove(); 
				});
			});
			var year1 = jQuery("select[name='exp_from_year[]']:eq("+cur_index+")").val();
			to_selected_value = jQuery("select[name='exp_to_year[]']:eq("+cur_index+")").val();
			//if(year1 != '')
				load_experience_year(year1,cur_index,to_selected_value,'dont');
		});
		
		show_total_experience();
	}
	//show the calculated experience in step3
	function show_total_experience() {
	
		jQuery("select[name='exp_from_year[]'],select[name='exp_from_month[]'],select[name='exp_to_year[]'],select[name='exp_to_month[]']").unbind("change");
		jQuery("select[name='exp_from_year[]'],select[name='exp_from_month[]'],select[name='exp_to_year[]'],select[name='exp_to_month[]']").change(function(){
			var control_name = jQuery(this).attr("name");
			var index = jQuery("[name='"+control_name+"']").index(this);
			var year1 = jQuery("select[name='exp_from_year[]']:eq("+index+") option:selected").val();
			var year2 = jQuery("select[name='exp_to_year[]']:eq("+index+") option:selected").val();
			var month1 = jQuery("select[name='exp_from_month[]']:eq("+index+") option:selected").val();
			var month2 = jQuery("select[name='exp_to_month[]']:eq("+index+") option:selected").val();
			var month2_selected_value = jQuery("select[name='exp_to_month[]']:eq("+index+") option:[selectedindex]").val();
			if(year2.toLowerCase()  == 'till_date') {
				var today = new Date();
				year2 = today.getFullYear();
			}
			if(month2 == null || month2_selected_value == 'Till Date' || month2.toLowerCase()  == 'till_date') {
				var today = new Date();
				month2 = today.getMonth()+1;
			}
			if(year2 > 0 && year1 > 0 && month2 > 0 && month1 > 0) {

				// cal the calculate experience function
				var diff_month = (calculate_year_month_exp(year1,month1,year2,month2,'months'));
				var date_difference_year = Math.floor(diff_month/12);
				var date_difference_month = Math.floor(diff_month%12);
				var exp_year='',exp_month='';
				if(date_difference_year > 0) {
				if(date_difference_year > 1) {
					exp_year = date_difference_year+" years";
				}
				else {
					exp_year = date_difference_year+" year";
				}
			}
		
		
			if(date_difference_month > 0) {
				if(date_difference_month > 1) {
					exp_month = date_difference_month+" months";
				}
				else {
					exp_month = date_difference_month+" month";
				}
			}
				var exp_diff = exp_year+" "+exp_month;
				//add the experience in html
				if(exp_diff != '' && exp_diff != undefined) {
					var exp_index = jQuery(this).index(this);
					jQuery("span.totalExp:eq("+index+")").html(exp_diff);
					jQuery("[name='experience_str[]']:eq("+index+")").val(date_difference_year+'.'+date_difference_month);
					jQuery("span.totalExp:eq("+index+")").next("[name='exp_from_to_text[]']").val(exp_diff);
					
				}
			}
			if(control_name == "exp_from_year[]"){
				
				var  to_selected_value = jQuery("select[name='exp_to_year[]']:eq("+index+")").val();
				load_experience_year(year1,index,to_selected_value);
			}
		});	
	}

/*Note: The following script for index page refer friends form*/
jQuery(document).ready(function(){
	
	//show the calculated experience in step3
	show_total_experience();
	jQuery("#refer_friend").live('click',function() {
		if(jQuery("#ref_address").val() != '' && jQuery("#ref_address").val() != 'email or mobile no') {
			return true;
		}
		else{
			return false;
		}
	});
			
	
	jQuery("#attend_test").live('click',function() {
		if($(this).is(':enabled') == false) {return false;}
			  // Note:assign class name
        var field_class = new Array('validate');
        //Note :assign field field type
        var field_type = new Array('question_radio');
        //Note: assign field basic error message
        var field_error_msg = new Array(err_choose_any_one);
        //Note: assign field advance error message
        var field_adv_error_msg = new Array('');
        var val123= item_validation(field_class, field_type, '', field_error_msg, field_adv_error_msg);
			
        if(val123 == true ) {
			jQuery("#attend_test").attr("disabled","disabled").html("<span class='processing'>"+Processing+"</span>");
			jQuery("#cancel_test").hide();	
			jQuery("#submit").click();	
		}
	});
	
	//dynamic number of questions answered html replacement
	jQuery("[id^=app]").live("click",function() {
		var answered = jQuery('input:radio[name='+jQuery("[name^=app]")+']:checked').length;
		jQuery('.answered_options').html(answered);
	});
	
	jQuery("#cancel_test").live('click',function() {
		jQuery("#submit").val('test_cancel').click();
	});
		
		//function used to load the more company, industry, location details using ajax.
	jQuery('.list_more').live('click',function() {
	
		var li_index = jQuery('.list_more').index(this);
		jQuery("li a.list_more").removeClass("allJobs");
		jQuery("li a.list_more:eq(" + li_index + ")").addClass("allJobs");
		jQuery('.lists').html('<li style="text-align:center;background:none;list-style: none; float:left; display:block; text-align;"><img  src="'+jQuery("#page_url").val()+'images/loader.gif"></li>');
		var msg = '';
		jQuery('.lists_empty').hide();
		li_class = jQuery(this);
		var page_to = li_class.closest('form').attr('name');
		if(page_to == 'more_company') {
			msg = msg_no_company;
		}
		else if(page_to == 'more_industry') {
			msg = msg_no_industry;
		}else if(page_to == 'more_department') {
			msg = msg_no_dept;
		}
		else {
			msg = msg_no_location;
		}
		var starting = li_class.text();
		var starting_length = li_class.text().length;
			jQuery.post(jQuery("#page_url").val()+page_to,{starting_txt:starting,more_list:page_to,request_type:'ajax'},function(data){
			
				if(data != '') {
					jQuery('.lists').html('<ul class="mt15 lists">'+data+'</ul>');
				}
				else {
					jQuery('.lists').html('');
					jQuery('.lists_empty').show();
					jQuery('.lists_empty').find('.profileComplete').html("<p>"+msg+" '"+starting+"'</p>")
				}
				
			});

	});
	
	
	//call the remaining time function in attend online test 
	if(jQuery('#total_test_time').val() != undefined) {
	var start_time = jQuery('#current_test_time').val().split(':');
		var start_time_hr_sec = start_time[0]*60*60;
		var start_time_min_sec = start_time[1]*60;
		
	var total_test_time = jQuery('#total_test_time').val().split(':');
		var hrs = total_test_time[0];
		var mins = total_test_time[1];
		var secs = total_test_time[2];
		var total_hr_sec = hrs*60*60;
		var total_min_sec = mins*60;
		//add the entry time and total test time
		var total_test_now_time = parseInt(start_time_hr_sec)+parseInt(start_time_min_sec)+parseInt(start_time[2])+parseInt(total_hr_sec)+parseInt(total_min_sec)+parseInt(total_test_time[2]);

		remain_time(hrs,mins,secs,total_test_now_time);
	}
});
  //function to submit the butons inside anchor tag
jQuery(document).ready(function(){
    jQuery("a button.jsRedirect").each(function() {
		jQuery(this).click(function() {
			location.href=jQuery(this).closest("a").attr("href");
       });
	});
});


var security_code_exists='';
jQuery(document).ready(function() {
	jQuery("#security").keyup(function(){
	
	   security_code_check();
	});
	jQuery("#refresh_captcha").click(function(){
	     var url =""+jQuery("#page_url").val()+"";
		 jQuery("#security").val("");
         if(security_code_exists!=undefined)
			 security_code_exists = '';
		 document.getElementById('captcha').src=""+url+""+"get_captcha/?rnd=" + Math.random();
	});

});
/*Note: The following scirpt is used for school subject in registration step 2*/
jQuery(document).ready(function(){
    if(jQuery(".listSub").length > 0){
		jQuery(".listSub").click(function(e) {
			jQuery(".list").slideToggle("fast");
			e.stopPropagation();
		});
		jQuery(document).click(function(e) {
			if(jQuery(".list").css("display") == "block"){
				jQuery(".list").slideToggle("fast");
			}
		});
		jQuery(".list").click(function(e) {
			e.stopPropagation();
		});
	}

	//jo alert view more function
	jQuery(".view_more_job_alert_profile").live("click",function(){
		jQuery('.less_job_alert_profile').hide();
		jQuery('.more_job_alert_profile').show();
	});	
	jQuery(".view_more_job_alert_description").live("click",function(){
		jQuery('.less_job_alert_description').hide();
		jQuery('.more_job_alert_description').show();
	});
	
  
});

		
if(jQuery('#total_test_time').val() != undefined) {	
//function to load the remain time in attend online test
//note:used to set the auto refresh,within and particular time
function remain_time(hrs,mins,secs,total_test_now_time) {

	//calculate the current time in secs
	var now = new Date();
	var outStr = now.getHours()+':'+now.getMinutes()+':'+now.getSeconds();
	var cur_time = outStr.split(':');
	var cur_time_hr_sec = cur_time[0]*60*60;
	var cur_time_min_sec = cur_time[1]*60;
	var cur_total_secs = parseInt(cur_time_hr_sec)+parseInt(cur_time_min_sec)+parseInt(cur_time[2]);
	var time = 900;
	var sec = secs;
	var min = mins;
	var hour = hrs;
	if(total_test_now_time != undefined) {
		var total_test_now_time1 = total_test_now_time;
	}
	var t;
	
		var sample;
		sec -= 1
		if (sec < 10) {
			sample = 0 + sec;
			sec = (("0" + (sec)).slice(-2));
		}
		if (min < 10) {
			sample = 0 + min;
			min = (("0" + (min)).slice(-2));
		}
		if (((sec == -1) && (min == 0) && (hour == 0)) || (cur_total_secs >= total_test_now_time1 ) ) {
		//TIME OUT ALERT MESSAGE
				$.alerts.dialogClass = 'alert_';
				$.alerts.okButton = '&nbsp;Ok&nbsp;';
				jAlert(alert_time_up, 'Alert');
				jQuery(".blueBtn").click(function(){
					if($("#attend_test").is(':enabled') == false) {return false;}
					jQuery("#attend_test").attr("disabled","disabled").html("<span class='processing'>"+Processing+"</span>");
					jQuery("#cancel_test").hide();
					jQuery("#submit").val('test_time_out').click();	
				});	
			return;
		}
		if (sec < 0) {
			sec = 59;
			min -= 1;
		}
		if (min < 0) {
			min = 59;
			hour -= 1;
		}
		else
			jQuery('.remaining_time').html(hour + ":" + min + ":" + sec);
			//document.getElementById("remain").innerHTML = hour + ":" + min + ":" + sec;
		
	setTimeout("remain_time("+hour+","+min+","+sec+","+total_test_now_time+")", 1000);

}

}

 function trigger_click(index){
     var controls = jQuery("a:eq("+index+")");
	jQuery(controls).parent().trigger("click",["hide_focus"])
 }
 function disableButton(buttonID) {
 jQuery("[name='"+buttonID+"']").css("cursor","default").html("<span class='processing'>"+Processing+"</span>");
	if(document.getElementById(buttonID))
		document.getElementById(buttonID).disabled = true;
	else{
		 jQuery("[name='"+buttonID+"']").attr("disabled","disabled");
	}
	
	
}
 jQuery(document).ready(function(){
	 
	jQuery(".premium_radio").live("click",function(){
	var premium_id = jQuery('input:radio[name=premium]:checked').val();
		if (premium_id != undefined){
			var page_url = jQuery("#page_url").val();
			window.location.href = page_url+'employer_registration/?premium_id='+premium_id;
		}else{
			jAlert('Please select Premium Jobs to buy', 'Alert');
			return false;
		}

	});
	
	/*The Follwoing script is used to show processing text in my profie page*/
	jQuery("[save='save']").click(function(){
		var control = jQuery(this).attr("name");
		jQuery("[cancel='cancel']").hide();
        window.setTimeout("disableButton('" +control + "')", 0);
		
		
	});
	/*The Following script is used to highlight the empty text box */
 	if(jQuery("#no_fill_form").length > 0){

		jQuery(":text,textarea").each(function(){
			if((jQuery(this).attr("placeholder") == jQuery(this).val()) || jQuery.trim(jQuery(this).val()) == ''){
				jQuery(this).addClass("no_fill");
			}
		});
		jQuery(".no_fill").focusout(function(){
			if((jQuery(this).attr("placeholder") != jQuery(this).val()) && jQuery.trim(jQuery(this).val()) != ''){
				jQuery(this).removeClass("no_fill");
			}	
			else{
				jQuery(this).addClass("no_fill");
			}
		});
	}
		
 });
 
/*Note: The following script is used for order by event*/
function order_by(){
	 if(jQuery("#order_by option[value='"+jQuery("#order_by").attr("field")+"']").length > 0){
			jQuery(".order_by_icon").hide();
			if(jQuery("#order_by").attr("field") != 'relevance' && jQuery("#order_by").attr("field") != 'premium_jobs') {
				jQuery(".order_by_icon").show();
			}	
		}
		jQuery("#order_by option[value='"+jQuery("#order_by").attr("field")+"']").attr("selected","selected");
		jQuery("#order_by").prev(".jquery-selectbox-currentItem").html("<a style=\"color:#414141\" href=\"javascript:void(0)\">"+jQuery("#order_by option:selected").text()+"</a>");
		var highlight = (jQuery.trim(qstring("highlight")) != undefined && jQuery.trim(qstring("highlight")) != '') ? "&highlight="+jQuery.trim(qstring("highlight")) : ''; 
		jQuery(".order_by_icon").click(function(){
			var page_name = jQuery("#page_name").val();
			var search_qry_stirng = jQuery("#sorting_query_string").val() != undefined ? jQuery("#sorting_query_string").val() : '';
			window.location.href = jQuery("#page_url").val()+jQuery("#language_url").val()+page_name+"/?field="+jQuery("#order_by").val()+"&order="+jQuery("#order_by").attr("order")+search_qry_stirng+highlight;
		});		
		jQuery("#order_by").change(function(){
			var orderby = jQuery("#order_by").attr("order") == 'asc' ? 'desc' : 'asc';
			if(qstring('field') == jQuery(this).val()) {
				orderby = jQuery("#order_by").attr("order");
			}
			var page_name = jQuery("#page_name").val();
			var search_qry_stirng = jQuery("#sorting_query_string").val() != undefined ? jQuery("#sorting_query_string").val() : '';
			window.location.href = jQuery("#page_url").val()+jQuery("#language_url").val()+page_name+"/?field="+jQuery(this).val()+"&order="+orderby+search_qry_stirng+highlight;
			//get_saved_jobs(jQuery("#page_url").val()+jQuery("#language_url").val()+page_name+"/?field="+jQuery(this).val()+"&order="+jQuery(this).attr("order")+search_qry_stirng+"&ajax=ajax",'ajax_form');
		});
}
 jQuery(document).ready(function(){
	/*Note: The following script is used to sorting the search results records*/
	if(jQuery("#order_by").length > 0) {
	   order_by();
	 }
   	 
	 remove_anchor();
	 

	 /* seeting page activate and deactivate the jobseeker */
	 jQuery("#active_jobseeker,#deactive_jobseeker").live("click",function() {
		var status = this.id == 'active_jobseeker' ? 'deactivate' : 'activate' ;
		var msg_status = this.id == 'active_jobseeker' ? 'Deactivate' : 'Activate' ;
		$.alerts.dialogClass = 'confirm_';	$.alerts.okButton = '&nbsp;Yes&nbsp;';	$.alerts.cancelButton = '&nbsp;No&nbsp;';
		jConfirm('Are you sure you want to '+msg_status+'?', 'Confirmation!', function(r) {
			if(r == true){
				jQuery("[name='activate_account']").val(status).click();
			}
		});


	 });

});

/* dynamic function for call the alert function */
function call_alert(action_value) {
	jAlert('Please select '+action_value.toLowerCase(), 'Alert!', function(r) {
	});	
}
/* dynamic function for call confirmation */
function call_confirm(status,redirect_query) {
	$.alerts.dialogClass = 'confirm_';	$.alerts.okButton = '&nbsp;Yes&nbsp;';	$.alerts.cancelButton = '&nbsp;No&nbsp;';
	jConfirm('Are you sure you want to '+status+'?', 'Confirmation!', function(r) {
		if(r == true){
			window.location.href=jQuery("#page_url").val()+jQuery("#language_url").val()+redirect_query;	
		}
    });
}

/* remove empty anchor tags*/	
function remove_anchor(){
	jQuery(".right a").each(function(){
			if(jQuery.trim(jQuery(this).text()) == ''){
				jQuery(this).remove();
			}
	});
}
/*show/hide FAQ*/
jQuery(document).ready(function() {
//hide the answer taq if open
	jQuery(".faq_category").live("click", function() {
        jQuery(this).next(".faq_ans").slideToggle("fast");
    });
    jQuery(".headBg").live("click", function() {
		jQuery(this).next(".faqAns").slideToggle("fast");
    });

    });
/***ADD Block Companies***/
// jQuery(document).ready(function(){
// jQuery(".editSettings").click(function(){
				// jQuery(".updateResume").slideToggle();					   
// });		
// });



/* for edit settings page */
jQuery(document).ready(function() {
  
  jQuery(".changePassword").live("click", function() {
		jQuery(".changePasswordSpan").slideToggle();
        jQuery(".passwordSet").slideToggle();
    });
	
	 jQuery("#cancel_pwd").live("click", function() {
		jQuery(".changePasswordSpan").slideToggle();
        jQuery(".passwordSet").slideToggle();
    });
	if(jQuery(".blocked_company").length){
		jQuery(".blocked_company").click(function(){
			jQuery(".blocked_company_list").show();
			jQuery(".blocked_company_list").html("Loading...");
			jQuery.post(page_url+"settings/",{blcoked_list:"company"},function(data){
				jQuery(".blocked_company_list").html(data);
				jQuery(".block_company").each(function(){
					autocomplete_single(jQuery(this).attr("id"),"get_block_company");	
				});
				// for edit company only show the remove link for first
				if(jQuery("#edit_settings_page").val() == 'edit_settings_page') {
					jQuery(".deleteThisRow").show();
				}
				jQuery(".blocked_company_list").hide();
				jQuery(".updateResume").slideToggle();
				jQuery(".editSettings").hide();
				jQuery(".edit_hyphen").hide();				
			});
			
		});
	}
    jQuery(".editSettings").live("click", function() {
		
    });
    jQuery(".cancelSet").live("click", function() {
        jQuery(".updateResume").slideToggle();
		jQuery(".editSettings").show();
		jQuery(".edit_hyphen").show();
	});
});
// trigger event when button is clicked
$(".addThisRow").live("click",function() {
	// add new row to table using addTableRow function
    addTableRow($("table"));

    jQuery(".deleteThisRow").each(function(i) {

        if (i != 0)
            jQuery(this).show();
    });

    // prevent button redirecting to new page
    return false;
});
jQuery(".deleteThisRow:eq(0)").hide();

// function to add a new row to a table by cloning the last row and 
// incrementing the name and id values by 1 to make them unique
function addTableRow(table) {
  
    // clone the last row in the table
	var $tr = $(table).find("tbody tr:last").clone();

    // get the name attribute for the input and select fields
    $tr.find("input,select,a").attr("id", function() {

        var parts = this.id.match(/([0-9a-zA-Z_-]+)(\d+)$/);

        return parts[1] + ++parts[2];
    }).attr("value", function() {

        var parts = this.id.match(/(\D+)(\d+)$/);

        return "";
    });
    $tr.find(".errorMsg").html('');
    $tr.find(".message").removeClass("message");
    $tr.find(".deleteThisRow").show();
	$tr.show();
    // append the new row to the table
    $(table).find("tbody tr:last").after($tr);
	if($tr.find(".block_company").length > 0 ){
		// remove the notneeded attributes for newly opened text box 
		$tr.find(".block_company").removeAttr("action_id");
		$tr.find(".block_company").removeAttr("action_val");
		autocomplete_single($tr.find(".block_company").attr("id"),"get_block_company");	
	}	
    
  

};
//when you click on the button called "delete", the function inside will be triggered.
$('.deleteThisRow').live('click', function() {
//get and save the removed companies
	var already_removed = jQuery("#remove_blocked").val();
	// save the deleted fields id
	var td_index = ($('.deleteThisRow').index(this));
	var deleted_comp = (jQuery(".deleteThisRow:eq("+td_index+")").parent('td').find('input').attr('action_id'));
	if(already_removed == '') {
		jQuery("#remove_blocked").val(deleted_comp);
	}
	else {
		jQuery("#remove_blocked").val(already_removed+","+deleted_comp);
	}
    var rowLength = $('.row').length;
	
	//this line makes sure that we don't ever run out of rows.
	if ((rowLength > 1) || (jQuery("#edit_settings_page").val() == 'edit_settings_page' && rowLength > 0)) {
		if(jQuery("#edit_settings_page").val() == 'edit_settings_page' && rowLength == 1){
		    var row_control = $(this).parent().parent();
			if(row_control.length){
				row_control.hide();
			}
		}else{
			deleteRow(this);
		}
		

    }
});
//delete the current node
function deleteRow(currentNode) {
    $(currentNode).parent().parent().remove();
}



function validate_block_company(par_field_name, event_name) {
	if($("#form_submit").is(':enabled') == false) {return false;}
    //Note: show the processing text when user submit the form
    var Processing = "Processing...";
    var save = "Save";
    if (par_field_name == undefined) {
        jQuery("#form_submit").html("<span class='processing'>" + Processing + "</span>").attr("disabled", "disabled");
        jQuery("#cancel").hide();
    }
    
   

    //Note: assign field name

    field_name = new Array('block_company');
    //Note: assign field type

    field_type = new Array( "sheepit_required");

    //Note: assign field basic message  //(This will be used for your login)
    field_msg = new Array('');
    field_error_msg = new Array("Please enter the company name");
    //Note: assign field advance error message
    field_adv_error_msg = new Array('');

    //Note: assign field basic error message

    var field_length = field_name.length;
    var set_foucs = undefined;
    //Note: to get particular field name and field type when user foucus out the control
    if (par_field_name != undefined) {
        var index = -1;
        var sheepit_control = jQuery("[name='" + par_field_name + "']").attr("id");
        //Note: to get the particular control index from the array of field name
        index = field_name.indexOf('' + par_field_name + '');
        field_type = new Array(field_type[index]);
        field_name = new Array(field_name[index]);
        field_msg = new Array(field_msg[index]);
        field_error_msg = new Array(field_error_msg[index]);
        field_adv_error_msg = new Array(field_adv_error_msg[index]);
        set_foucs = 'false';
    }


    validation = item_validation(field_name, field_type, field_msg, field_error_msg, field_adv_error_msg, set_foucs);

    jQuery(".message").each(function() {
        jQuery(this).attr("style","background:none!important");
    });

    if (event_name == 'blur') {
        check_fields = false;
        return false;
    }
    if (par_field_name != undefined) {
        return;
    }

    if ((validation == true && field_length == field_name.length && par_field_name == undefined)) {
		// ajax validation
		var block_company = jQuery(".block_company").map(function(){
			if(jQuery(this).parents(".row").css("display") != 'none'){
				value = jQuery.trim(jQuery(this).val())+'~'+jQuery.trim(this.id)+'~'+jQuery.trim(jQuery(this).attr("action_val"))+'~'+jQuery.trim(jQuery(this).attr("action_id"));
				return value ;
		   }
		}).get().join(",");
		jQuery.post(jQuery("#page_url").val()+"settings/",{company_name:trim(block_company),action:'block_company_check',request_type:'ajax'},function(data){
			
			if(data != '' && data != undefined) {
				var result = (data).split('*');
				var unavail_result = (result[0]).split('~');
				var exist_result = (result[1]).split('~');
				var unavail_error_id = (unavail_result.slice(0, -1));
				var exist_error_id = (exist_result.slice(0, -1));
				if(unavail_error_id.length > 0) {
					jQuery(''+unavail_error_id+'').parent('td').addClass('message');
					jQuery(''+unavail_error_id+'').parent('td').find(".errorMsg").show().text('Company not available');	
					jQuery("#submit_form").closest("form").removeAttr("onsubmit");
					jQuery("#submit_form").prop("disabled",false);
				}
				if(exist_error_id.length > 0) {		
					jQuery(''+exist_error_id+'').parent('td').addClass('message');
					jQuery(''+exist_error_id+'').parent('td').find(".errorMsg").show().text('Company already blocked');
					jQuery("#submit_form").closest("form").removeAttr("onsubmit");
					jQuery("#submit_form").prop("disabled",false);
				}
			   jQuery(".message").each(function() {
					jQuery(this).attr("style","background:none!important");
			   });
				if(exist_error_id.length > 0 || unavail_error_id.length > 0) {	
					jQuery("#submit_form").removeAttr("disabled");
					jQuery("#form_submit").html("<span>" + save + "</span>").removeAttr("disabled", "disabled");
					jQuery("#cancel").show();
				}
				else {
					// deleted company ids
					already_removed = jQuery("#remove_blocked").val();
					jQuery.post(jQuery("#page_url").val()+"settings/",{company_name:trim(block_company),save_company:'save_company',deleted_company:already_removed,request_type:'ajax'},function(data){
						//	document.write(data);
						jQuery("#remove_blocked").val('');
			
						if(data != '') {
							window.location.href = jQuery("#page_url").val()+jQuery("#language_url").val()+"settings/?block_status="+data;
						}
						else {
							window.location.href = jQuery("#page_url").val()+jQuery("#language_url").val()+"settings/?block_status=fail";
						}
						// jQuery("#save_company").val('save_company');
						// jQuery("#form_submit").html("<span>" + save + "</span>").removeAttr("disabled", "disabled");
						// jQuery("#cancel").show();
						// return true;
					});
				}
			}
		});
		// jQuery("#cancel").hide();
		// jQuery("#form_submit").html("<span>" + Processing + "</span>").removeAttr("disabled", "disabled");
    } else {
		var save = "submit";
        jQuery("#form_submit").html("<span>" + save + "</span>").removeAttr("disabled", "disabled");
        jQuery("#cancel").show();
		setTimeout(function(){
			jQuery("#submit_form").closest("form").removeAttr("onsubmit");
			jQuery("#submit_form").prop("disabled",false);
		},10);
        return false;
    }
	return false;

}
/*Note: The following function is used to get the custom package amount details based upon the user selection */
	var total_price = jQuery(".total_price").html();
	function get_college_custom_package_amount(){
		var  amount = jQuery("#custom_amount").text();
		var student_value = 0,user_value = 0;
		var new_values = pack_initial_value.split(',');
		student_value = jQuery("select:[name=students] option:selected").val();
		user_value = jQuery("select:[name=users] option:selected").val();
		jQuery(".btn_custom_package").hide();
		jQuery(".total_price").show().text("Loading...");
		var page_url = jQuery("#page_url").val()+"college_plans/";
		if(jQuery("form#college_additional_purchase").length){
			page_url = jQuery("#page_url").val()+"college_additional_purchase/";
		}
		jQuery.post(page_url,{action:'get_custom_rates',student:student_value,user:user_value,request_type:'ajax'},function(data){
			data = jQuery.parseJSON(data);
			jQuery(".total_price").hide();
			if(data.amount > 0)
				jQuery(".total_price").show();
				
			if(data.success == '1') {
				jQuery(".total_price").html(total_price);
				jQuery("#custom_amount").text(data.amount);
				jQuery("[name='total_amount']").val(data.amount);
			}else{
				jQuery(".total_price").html(total_price);
				jQuery("#custom_amount").text(amount);
				jQuery("[name='total_amount']").val(amount);
			}
			jQuery(".btn_custom_package").show();
		});
	}
    function get_custom_package_amount(){
		var  amount = jQuery("#custom_amount").text();
		var job_value=0,user_value=0,cv_access_value=0,sms_value=0,mail_value=0,premium_job_value=0;
		var new_values = pack_initial_value.split(',');
		
		job_value = jQuery("[custom_pack='custom_pack']:eq(0)").attr("checked") == "checked" ? ($( ".rating_txt:eq(0)" ).html() > 0 ? $( ".rating_txt:eq(0)" ).html() : new_values[0]) : 0;
		cv_access_value = jQuery("[custom_pack='custom_pack']:eq(1)").attr("checked") == "checked" ? ($( ".rating_txt:eq(1)" ).html() > 0 ? $( ".rating_txt:eq(1)" ).html() : new_values[1]) : 0;
		user_value = jQuery("[custom_pack='custom_pack']:eq(2)").attr("checked") == "checked" ? ($( ".rating_txt:eq(2)" ).html() > 0 ? $( ".rating_txt:eq(2)" ).html() : new_values[2]) : 0;
		sms_value = jQuery("[custom_pack='custom_pack']:eq(3)").attr("checked") == "checked" ? ($( ".rating_txt:eq(3)" ).html() > 0 ? $( ".rating_txt:eq(3)" ).html() : new_values[3]) : 0;
		mail_value = jQuery("[custom_pack='custom_pack']:eq(4)").attr("checked") == "checked" ? ($( ".rating_txt:eq(4)" ).html() > 0 ? $( ".rating_txt:eq(4)" ).html() : new_values[4]) : 0;
		premium_job_value = jQuery("[custom_pack='custom_pack']:eq(5)").attr("checked") == "checked" ? ($( ".rating_txt:eq(5)" ).html() > 0 ? $( ".rating_txt:eq(5)" ).html() : new_values[5]) : 0;
		
		
			/*
		job_value = jQuery("[custom_pack='custom_pack']:eq(0)").attr("checked") == "checked" ? $( ".rating_txt:eq(0)" ).html()  : 0;
		cv_access_value = jQuery("[custom_pack='custom_pack']:eq(1)").attr("checked") == "checked" ? $( ".rating_txt:eq(1)" ).html(): 0;
		user_value = jQuery("[custom_pack='custom_pack']:eq(2)").attr("checked") == "checked" ? $( ".rating_txt:eq(2)" ).html(): 0;
		sms_value = jQuery("[custom_pack='custom_pack']:eq(3)").attr("checked") == "checked" ? $( ".rating_txt:eq(3)" ).html(): 0;
		mail_value = jQuery("[custom_pack='custom_pack']:eq(4)").attr("checked") == "checked" ? $( ".rating_txt:eq(4)" ).html(): 0;
		premium_job_value = jQuery("[custom_pack='custom_pack']:eq(5)").attr("checked") == "checked" ? $( ".rating_txt:eq(5)" ).html() : 0;
		 */

		
		jQuery(".btn_custom_package").hide();
		jQuery(".total_price").text("Loading...");
		var page_url = jQuery("#page_url").val()+"emp_packages/",month=0;
		if(jQuery("form#additional_purchase").length){
			page_url = jQuery("#page_url").val()+"additional_purchase/";
			month =  jQuery("[name='user_month'] option:selected").val();
			
			if(month  != 3 && month  != 6 && month != 9 && month != 12){
				month  = 6;
				jQuery("[name='user_month'] option:eq(1)").attr("selected","selected");
			}
			
		}
		jQuery.post(page_url,{action:'get_custom_rates',job:job_value,user:user_value,cv_access:cv_access_value,sms:sms_value,mail:mail_value,premium_job:premium_job_value,user_month:month,request_type:'ajax'},function(data){
			data = jQuery.parseJSON(data);
			jQuery("#custom_amount").html("");
			if(data.success == '1') {
				jQuery(".total_price").html(total_price);
				jQuery("#custom_amount").text(data.amount);
				jQuery("[name='total_amount']").val(data.amount);
			}else{
				jQuery(".total_price").html(total_price);
				jQuery("#custom_amount").text(amount);
				jQuery("[name='total_amount']").val(amount);
			}
			jQuery(".btn_custom_package").show();
		});
	}
	
/*Script for Pricing and Plan*/
jQuery(document).ready(function(){
	if(jQuery("form#college_additional_purchase").length) {
		if(qstring('buy') == 'users' || qstring('buy') == 'profiles'){
			if(qstring('buy') == 'users')
				jQuery("select:[name='users'] option:eq(1)").attr("selected","selected");
			else
				jQuery("select:[name='students'] option:eq(1)").attr("selected","selected");
		
		}else{
			if(document.referrer.indexOf('payment_selection') == -1) {
				if(jQuery("select:[name='users'] option:selected").index() < 2)
					jQuery("select:[name='users'] option:eq(1)").attr("selected","selected");
				if(jQuery("select:[name='students'] option:selected").index() < 2)
					jQuery("select:[name='students'] option:eq(1)").attr("selected","selected");
			}		
		}
		get_college_custom_package_amount();
		jQuery("select:[name='students'],select:[name='users']").change(function(){
			get_college_custom_package_amount();
		});
	}
	//Note: Custom package form submit
	jQuery(".btn_custom_package").click(function(){
		if(jQuery(this).closest("form").attr("name") == 'college_additional_purchase'){
			var custom_student = jQuery("select:[name='students'] option:selected").val();
			var custom_user = jQuery("select:[name='users'] option:selected").val();
			if(parseInt(jQuery("#custom_amount").text()) > 0 && (parseInt(custom_student) > 0 || parseInt(custom_user) > 0) ){
				jQuery(".errorCustom").text("");
				jQuery("[name='buy_now']").val("CUSTOM_PACKAGE");
				return true;
			}	
			else{
				$.alerts.dialogClass = 'alert_';
				$.alerts.okButton = '&nbsp;Ok&nbsp;';
				jAlert("Please select no. of profiles or users");
			}
			
		}else{
			var custom_job = jQuery("[name='custom_job']").attr("checked");
			var custom_cv = jQuery("[name='custom_cv']").attr("checked");
			if(parseInt(jQuery("#custom_amount").text()) > 0 && (custom_job == "checked" || custom_cv == "checked" || jQuery("form#additional_purchase").length == 1) ){
				jQuery(".errorCustom").text("");
				jQuery("[name='buy_now']").val("CUSTOM_PACKAGE");
				return true;
			}	
			else{
				$.alerts.dialogClass = 'alert_';
				$.alerts.okButton = '&nbsp;Ok&nbsp;';
				
				//Note: show error message, if user not selected jobs and cv access
				if(custom_job != "checked" && custom_cv != "checked" && jQuery("form#additional_purchase").length == 0)
					jAlert("You need to select Job Postings or CV Access", 'Alert');
				else
					jAlert("Please select atleast one option");
			}
		}		
		return false;	
	});
	
	$(function() {
		//Note: The following script is used to get custom package amount details using ajax
		if(jQuery("form#additional_purchase").length == 1) {
			get_custom_package_amount();
		}
		if(jQuery("form#college_additional_purchase").length == 1) {
			//get_college_custom_package_amount();
		}
		
		jQuery("[name='user_month']").change(function(){
			get_custom_package_amount();
		});
		if(jQuery("[custom_pack='custom_pack']").length > 0) {
			jQuery(".rating_txt").each(function(){
				var text = jQuery(this).text();

				jQuery(this).prev(".custom_count").val(text);
			});
		}
	
		jQuery("[custom_pack='custom_pack']").change(function(){
			var plan_html = jQuery(this).parents("td").next("td").find(".plan_option").text();
			custom_job = jQuery("[custom_pack='custom_pack']:eq(0)").attr("checked");
			custom_cv = jQuery("[custom_pack='custom_pack']:eq(1)").attr("checked");
			jQuery(".errorCustom").text("");
			if(custom_job != "checked" && custom_cv != "checked" && jQuery("form#additional_purchase").length == 0) {
				jQuery(".errorCustom").text("You need to select Job Postings or CV Access");
			}	
			if(jQuery(this).attr("checked") == "checked"){
				if(jQuery("form#additional_purchase").length && jQuery(this).attr("name") == "custom_user"){
					jQuery(".companyUser,#validity").show();
				}
				jQuery(this).parents("td").next("td").find(".plan_option").html(plan_html);
				jQuery(this).parents("tr").find(".rating_txt").show();
			}else{
				if(document.referrer.indexOf("payment_selection") == -1){
					jQuery(this).parents("td").next("td").find(".plan_option").html("<s>"+plan_html+"</s>");
					jQuery(this).parents("tr").find(".rating_txt").hide();
					if(jQuery("form#additional_purchase").length && jQuery(this).attr("name") == "custom_user"){
						jQuery(".companyUser,#validity").hide();
						
					}
				}
			}
			if(jQuery(this).attr("name") != 'custom_user' || jQuery("form#additional_purchase").length == 1) {
				get_custom_package_amount();
			}	
		});
		
		// only for additional purchase page
		if(jQuery("#page_name").val() == 'additional_purchase') {	
			jQuery(".checkbox").live("click",function() {
				var index = jQuery(".checkbox").index(this);
				if(jQuery(".styled:eq("+index+")").attr("checked") == 'checked') {
					jQuery(".rating_txt:eq("+index+")").show();
				}
				else if(jQuery(".styled:eq("+index+")").attr("checked") == undefined) {
					jQuery(".rating_txt:eq("+index+")").hide();
				}
			});
		}			
		
		// only for additional purchase page
		if(jQuery("#page_name").val() == 'emp_packages') {	
			jQuery(".checkbox").live("click",function() {
				var index = jQuery(".checkbox").index(this);
				var pack_value_array = pack_initial_value.split(',');
				switch(index){
					case 0:
						if(parseInt(jQuery(".job_post").html()) <= 0) {
							jQuery(".job_post").html(pack_value_array[0]);
							jQuery("#jobs_count").val(pack_value_array[0]);
						}
						break;
					case 1:
						if(parseInt(jQuery(".cv_access").html()) <= 0) {
							jQuery(".cv_access").html(pack_value_array[1]);
							jQuery("#cv_count").val(pack_value_array[1]);
						}
						break;
					case 2:
						if(parseInt(jQuery(".comp_users").html()) <= 0) {
							jQuery(".comp_users").html(pack_value_array[2]);
							jQuery("#user_count").val(pack_value_array[2]);
						}
						break;					
					case 3:
						if(parseInt(jQuery(".sms_post").html()) <= 0) {
							jQuery(".sms_post").html(pack_value_array[3]);
							jQuery("#sms_count").val(pack_value_array[3]);
						}
						break;					
					case 4:
						if(parseInt(jQuery(".mail_post").html()) <= 0) {
							jQuery(".mail_post").html(pack_value_array[4]);
							jQuery("#mail_count").val(pack_value_array[4]);
						}
						break;					
					case 5:
						if(parseInt(jQuery(".premium_post").html()) <= 0) {
							jQuery(".premium_post").html(pack_value_array[5]);
							jQuery("#premium_count").val(pack_value_array[5]);
						}
						break;
					default:
						break;

				}
			});
		}		
		
		
	   var multiple_max_value = new Array(200,50,25,100,50,20);
	   var default_value_array = pack_initial_value.split(',');

	   if(jQuery("#payment_action").val() == 'edit') {
			var new_job_post = parseInt(jQuery(".job_post").html())/default_value_array[0];
			var new_cv_count = parseInt(jQuery(".cv_access").html())/default_value_array[1];
			var new_user_count = parseInt(jQuery(".comp_users").html())/default_value_array[2];
			var new_sms_count = parseInt(jQuery(".sms_post").html())/default_value_array[3];
			var new_mail_count = parseInt(jQuery(".mail_post").html())/default_value_array[4];
			var new_premium_count = parseInt(jQuery(".premium_post").html())/default_value_array[5];
			var values = new Array(new_job_post,new_cv_count,new_user_count,new_sms_count,new_mail_count,new_premium_count);	
	   }
	   else {
			var values = new Array(1,1,1,1,1,1);
	   }
	  jQuery("[custom_pack='custom_pack']").each(function(i){
			var min_value = 1;
			var max_value = multiple_max_value[i];			
			var default_value = 0;
			var div = jQuery("[custom_pack='custom_pack']:eq("+i+")");
			//default_value = $( ".rating_txt:eq("+i+")" ).html(); 
			default_value = default_value_array[i]; 
			$( ".slider-range-max:eq("+i+")" ).slider({
				range: "max",
				min: min_value,
				max: max_value,
				value: values[i],
				slide: function( event, ui ) {
					
					if(jQuery("[custom_pack='custom_pack']:eq("+i+")").attr("checked") == "checked"){
						//$( "#amount" ).val( ui.value );
						set_rating_msg(ui.value,i,default_value);
					}else{
						call_alert(" the feature");
						return false;
					}					
				}
			});
			//$( "#amount" ).val( $( ".slider-range-max" ).slider( "value" ) );
		});
	});
	/*Note: The following function is used to assign the rating values*/
	function set_rating_msg(v,index,default_value){
		msg = parseInt(default_value)*parseInt(v);
		$( ".custom_count:eq("+index+")" ).val( msg );
		$( ".rating_txt:eq("+index+")" ).html( msg );
		get_custom_package_amount();
	}	

	
});

//Note: The following script is used for advance resume search
	jQuery("[chk_check='chk_check']").live("change",function(event){
	if(event.search == 'dont')  return false;
		
		 
		if(jQuery(this).attr("name").indexOf("chk_program") >= 0 || jQuery(this).attr("name").indexOf('chk_degree') >= 0){
	
			var get = jQuery(this).attr("name").indexOf("chk_program") >= 0 ? 'course' : 'specialization';
			var load_div = jQuery(this).attr("name").indexOf("chk_program") >= 0 ? 'degree_div' : 'specialization_div';
			var control_name =jQuery(this).attr("name").indexOf("chk_program") >= 0 ? 'chk_degree' : 'chk_specialization';
			var search_id = jQuery(this).attr("name").indexOf("chk_program") >= 0 ? 'program_id' : 'course_id';
			var optional_field = jQuery(this).attr("name").indexOf("chk_program") >= 0 ? 'Any Degree' : 'Any Specialization';
			
			var selected_value = jQuery.trim(jQuery(this).attr("id"));
			
			var chk_id = jQuery(this).attr("id").replace(/uniform-/g, "");
			var chk1_id = jQuery(this).parents("[chk_id]").attr("chk_id");
	
			jQuery("#"+search_id).val(selected_value);
			
			if(jQuery(this).attr("checked")){
			
			 if(jQuery(this).parents(".div_chk").next("#tags_tagsinput").find("span.tag").length == 5){
				return false;
			}
				jQuery("."+load_div).html("Loading...");
				
				jQuery.post(page_url+"get_search_form_details",{id:selected_value,'get':get,request_type:'ajax'},function(data){
			
					if(data != ''){
						var course_list = jQuery.parseJSON(data);
						
						jQuery("."+load_div).html("");
						
						
						var chk2_id = '';	
						if(chk1_id != undefined){
							chk2_id = "chk1_id="+chk1_id;
						}
					
						jQuery(course_list).each(function(e){
							jQuery("."+load_div).append(
							"<span "+chk2_id+" chk_id="+selected_value+"><input type=\"checkbox\" id="+
							jQuery.trim(course_list[e].key)+" val='"+jQuery.trim(course_list[e].value)+"' value='"+
							jQuery.trim(course_list[e].value)+"' name='"+control_name+"' chk_check='chk_check' "+control_name+"="+control_name+" class='styled' /> <b class='checkValue'>"+jQuery.trim(course_list[e].value)+"</b></span>");
						});
					
				attempt_init = 2;		
				Custom.init();
					
					}else{
						jQuery("."+load_div).html("No "+get+" Found");
					}
							
				});
			}else{
			
				jQuery("."+load_div).find("span").each(function(){
					if(jQuery(this).attr("chk_id") == selected_value){	
						jQuery(this).remove();	
					}
				});
				jQuery("span:[chk1_id]").each(function(){
					if(jQuery(this).attr("chk1_id") == selected_value){	
						jQuery(this).remove();	
					}
				});
			}
		}
	});
	jQuery("[chk_check='chk_check']").live("change",function(event){
		var selecte_value = jQuery.trim(jQuery(this).val());
		 var chk_id = jQuery(this).attr("id").replace(/uniform-/g, "");
		var chk1_id = jQuery(this).parents("[chk_id]").attr("chk_id");
		var chk2_id = jQuery(this).parents("[chk1_id]").attr("chk1_id");
        chk2_id = chk2_id == undefined ? '' : chk2_id;
		if(jQuery(this).attr("checked")){

			 var id = '';
			 if(jQuery(this).attr("id")!='' && jQuery(this).attr("id") != undefined){
			   id = "id="+jQuery(this).attr("id");
			 } 
			 
			 if(jQuery(this).parents(".div_chk").next("#tags_tagsinput").find("span.tag").length == 5){
				//jQuery(this).removeAttr("checked").parent("span").removeClass("checked");
				var error_msg = jQuery(this).hasClass("chk_check_ind") ? "You can add max. of 5 Industries" : "Max 5";
				if(jQuery(this).parents(".div_chk").next("#tags_tagsinput").next(".max_error").length == 0){
					jQuery(this).parents(".div_chk").next("#tags_tagsinput").after("<div style='clear:left;color:red' class='max_error'>"+error_msg+"</div>");
				}
				jQuery(this).removeAttr("checked").trigger({type:'click','click':'auto'});
				return;
			 }else{
	
				if(jQuery(this).parents(".div_chk").next("#tags_tagsinput").next(".max_error").length > 0){
					jQuery(this).parents(".div_chk").next("#tags_tagsinput").next(".max_error").remove();
				}	
			 }
			 
			jQuery(this).parents(".div_chk").next("#tags_tagsinput").find(".qualSelect").append(
			
			"<li "+id+" class=\"tag "+chk1_id+" "+chk2_id+"\"><span class=\"input\" >"+selecte_value+"&nbsp;&nbsp;</span><a href=\"javascript:void(0)\" class=\"remove_tags closebutton\" title=\"Removing tag\"></a></li>"
			);
		}else{

			if(chk_id != 'undefined'){
				jQuery(".tag").each(function(){
					if(jQuery.trim(jQuery(this).attr("class")).indexOf(chk_id) != -1){ 
						jQuery(this).remove();
					}	
				});
			}
		
			jQuery(this).parents(".div_chk").next("#tags_tagsinput").find(".input").each(function(){
				if(selecte_value == jQuery.trim(jQuery(this).text())){
					
					if(jQuery(this).parents("#tags_tagsinput").next(".max_error").length > 0){
							jQuery(this).parents("#tags_tagsinput").next(".max_error").remove();
					}
					jQuery(this).parent(".tag").remove();
					
					return false;
				}
			});
			
		}
		
	});
	jQuery(".remove_tags").live("click",function(){
		var remove_value = jQuery.trim(jQuery(this).prev(".input").text());
		var value = '';
		jQuery(this).parents("#tags_tagsinput").prev(".div_chk").find(":checkbox").each(function(){
			value = jQuery(this).val();
			if(remove_value == value){
				jQuery(this).removeAttr("checked").trigger({type:'change','click':'auto'});
			}
		});
		return false;
		
	});
/***Show/Hide Packages***/
jQuery(document).ready(function(){
	jQuery(".hide_message").click(function(){
		jQuery(".messages").slideUp("fast");
		jQuery(".show_message").show();
		jQuery(this).hide();
	});
	jQuery(".show_message").click(function(){
		jQuery(".messages").slideDown("fast");
		jQuery(".hide_message").show();
		jQuery(this).hide();
	
	});
jQuery(".hidePack").click(function(){
				jQuery(".packageList").slideToggle("fast");			
				jQuery(".showPack").show();
								jQuery(".hidePack").hide();
});		
jQuery(".showPack").click(function(){
				jQuery(".packageList").slideToggle("fast");			
				jQuery(".showPack").hide();
								jQuery(".hidePack").show();
});	



	/* this script is used to claim gift  */
	jQuery(".claim").live("click",function(){ 
		var page_name = jQuery("[id='page_name']").val();
		if(jQuery(this).hasClass("claim")){
			var control = jQuery(this);
			var id_points = jQuery(this).attr("id");
			id_value = id_points.split('-'); 
			if(parseInt(id_value[2]) < parseInt(id_value[1])){
				jAlert("Sorry, you do not have enough points to claim this gift");
			}else{
				jConfirm(alrt_claim_gift, 'Confirmation', function(r){
					if(r == true){
					jQuery("#gift_id").val(id_value[0]);
					jQuery("#req_points").val(id_value[1]);
					jQuery("#rewardFrm").submit();
					}
				});
			}
		}
	});
	
});
//===== Tooltips =====//
jQuery(document).ready(function(){
	/*if(jQuery("a").find("button").length > 0){
		jQuery("a").find("button").live("click",function(){
			alert(jQuery(this).parent("a").attr("href"));
			var href = jQuery(this).parent("a").attr("href");
			window.location.href= href;
			
		});
	}
	*/
	$('.tipN').tipsy({gravity: 'n',fade: true, html:true});
	$('.tipS').tipsy({gravity: 's',fade: true, html:true});
	$('.tipW').tipsy({gravity: 'w',fade: true, html:true});
	$('.tipE').tipsy({gravity: 'e',fade: true, html:true});
});

/* for language drop down */
$(document).ready(function()
{

$(".account").click(function()
{
var X=$(this).attr('id');
if(X==1)
{
$(".submenu").hide();
$(this).attr('id', '0');
}
else
{
$(".submenu").show();
$(this).attr('id', '1');
}

});

//Mouse click on sub menu
$(".submenu").mouseup(function()
{
return false
});

//Mouse click on my account link
$(".account").mouseup(function()
{
return false
});


//Document Click
$(document).mouseup(function()
{
$(".submenu").hide();
$(".account").attr('id', '');
});
});

$(document).ready(function(){
	/* Note: The following script is used to validate the change password in setting page */
	jQuery("#con_password,#new_password").keypress(function(e){
		if(e.keyCode == 13){
			jQuery('#change_pwd').click();
		}
	});
	jQuery(".change_pwd").live("click",function(){
		var password = jQuery.trim(jQuery("#new_password").val());
		var cpassword = jQuery.trim(jQuery("#con_password").val());
		if((password == '' || password.length < 4) || cpassword == ''){
			if(password == ''){
				jQuery(".password_err").show().text("Please enter new Password");
			}
			else if (password.length < 4) {
				jQuery(".password_err").show().text("Password Must be Min. 4 char");
			}
			else{
				jQuery(".new_password").removeClass("password_err").next("span").hide();
			}
			if(cpassword == ''){
				jQuery(".new_password_err").text("Please enter confirm Password");
			}		
			else if (cpassword.length < 4) {
				jQuery(".new_password_err").show().text("Password Must be Min. 4 char");
			}else{
				jQuery(".con_password").removeClass("new_password_err").next("span").hide();
			}
		}
		else if(password != cpassword){
			jQuery(".new_password").removeClass("password_err").next("span").hide();
			jQuery(".con_password").addClass("new_password_err").next("span").show().text("Password and Confirm Password Mismatch");
		}else{
			jQuery(".new_password").removeClass("password_err").next("span").hide();
			jQuery(".con_password").removeClass("new_password_err").next("span").hide();
			var save = "Processing";
			jQuery("#change_pwd").html("<span>" + save + "</span>").removeAttr("disabled", "disabled");
			jQuery("#cancel_pwd").hide();
			jQuery("#set_password").click();
		}
	});			
});

// validate payments page
function validate_payment_type(par_field_name,event_name) {
	if($("#form_submit").is(':enabled') == false) {return false;}
 		/*Note: The following script is used for to show/hide the placeholder text*///Note: show the processing text when user submit the form
	if(par_field_name==undefined){
		jQuery("#form_submit").attr("disabled","disabled").html("<span class='processing'>"+Processing+"</span>");
	}
	//Note: assign field name
	var field_name = new Array('card_name', 'card_number' ,'cvv', 'expiry_date');
		//Note: assign field type
	var field_type = new Array("required", "required", "required","required");
	//Note: assign field basic message  //(This will be used for your login)
	var field_msg = new Array('','','','');
	//Note: assign field basic error message
	var field_error_msg = new Array('Please enter your card name','Please enter your card number','Please enter your cvv','Please enter expiry date');
	//Note: assign field advance error message
	var field_adv_error_msg = new Array('', '', '','');
	var field_length=field_name.length;
	var set_foucs=undefined;
	//Note: to get particular field name and field type when user foucus out the control
	if(par_field_name!=undefined){
		var index=-1;
		index =field_name.indexOf(''+par_field_name+'');
		field_type = new Array(field_type[index]);
		field_name = new Array(field_name[index]);
		field_msg = new Array(field_msg[index]);
		field_error_msg = new Array(field_error_msg[index]);
		field_adv_error_msg = new Array(field_adv_error_msg[index]);
		set_foucs='false';
	}
	var validation = item_validation(field_name, field_type,field_msg,field_error_msg,field_adv_error_msg,set_foucs);

	if(par_field_name!=undefined){
		return false;
	}

	if (validation == true  && field_length == field_name.length && par_field_name == undefined) {
		return true;

	} else {
	  jQuery("#form_submit").html("<span>"+submit+"</span>").removeAttr("disabled", "disabled");
	  jQuery("#cancel").show();
	  return false;
	}
	return false;
 }
 /*Note: The following script is used for employer packages*/
jQuery(document).ready(function(){
	jQuery(".submit_plan").live("click",function(){
		if(jQuery("[name='plan_price']:checked").length){
			if(jQuery(this).text() == "Upgrade"){
				//jQuery(this).attr("name","standard_package").attr("value",jQuery("[name='plan_price']:checked").val());
				jQuery(".submit_package").attr("name","standard_package").val(jQuery("[name='plan_price']:checked").val()).click();
				return true;
				
			}else{
				var plan_url = jQuery("[name='plan_price']:checked").parents("td").find(".plan_url").val();
				if(plan_url!=''){
					//jQuery(this).attr("name","submit_package").attr("value",plan_url);
					jQuery(".submit_package").val(plan_url).click();
					return true;
					//window.location.href = plan_url;
				}
			}	
		}else{
			$.alerts.dialogClass = 'alert_';
			$.alerts.okButton = '&nbsp;Ok&nbsp;';
			jAlert("Please Choose any one Option", 'Alert');
			return false;
		}
	});
}); 
jQuery(document).ready(function(){
	jQuery(".feedBack").live("click",function(){ 
		// Display an external page using an iframe
		var src = jQuery(".root_url").val()+"feedback/";
		$.modal('<iframe id="feed_back_frame" src="' + src + '" height="415" width="600" style="border:0">', {	
			containerCss:{
				backgroundColor:"#fff", 
				borderColor:"#fff", 
				height:434, 
				padding:0, 
				width:630
			},
			overlayClose:true
		})
	});	
	
	$(document).ready(function(){
		if($('#jobfairPopup').val() == '1'){
			var src = jQuery(".root_url").val()+"jobfair_popup/";
			$.modal('<iframe src="' + src + '" scrolling = "no" height="510" width="820" style="border:0">', {
				//closeHTML:"",
				containerCss:{
					backgroundColor:"#fff", 
					borderColor:"#fff", 
					height:530, 
					padding:0, 
					width:830
				},
				//overlayClose:true
			});
		}
	});
	
	$(document).ready(function(){
		if($('#reqPopup').val() == '1'){
			var src = jQuery(".root_url").val()+"req_popup/";
			$.modal('<iframe src="' + src + '" scrolling = "yes" height="450" width="820" style="border:0">', {
				//closeHTML:"",
				containerCss:{
					backgroundColor:"#fff", 
					borderColor:"#fff", 
					height:470, 
					padding:0, 
					width:830
				},
				//overlayClose:true
			});
		}
	});
	
	
	jQuery(document).ready(function(){
		jQuery(".iframeBox").live("click",function(){ 
		// Display an external page using an iframe		
		if(jQuery(this).attr('rel') == 'jobfair') {
			var src = jQuery(".root_url").val()+"jobfair_popup/"+jQuery(this).attr('id');
		}else if(jQuery(this).attr('rel') == 'drive') {
			var src = jQuery(".root_url").val()+"req_popup/"+jQuery(this).attr('id');	
		}
		$.modal('<iframe id="feed_back_frame" src="' + src + '" height="450" width="820" style="border:0">', {	
			containerCss:{
				backgroundColor:"#fff", 
				borderColor:"#fff", 
				height:470, 
				padding:0, 
				width:830
			},
			//overlayClose:true
			})
		});
	});
	/* auto pop up to get user min. details 
	if($('#contactPopup').val() == '1'){	 
		// Display an external page using an iframe
		
		var src = jQuery(".root_url").val()+"pre_register/";
		$.modal('<iframe id="feed_back_frame" src="' + src + '" height="400" width="600" style="border:0">', {	
			
		});
	}
	
	*/	
	/* auto pop up to get user min. details 
	if($('#contactPopup').val() == '1'){	 
		// Display an external page using an iframe
		
		var src = jQuery(".root_url").val()+"pre_register/";
		$.modal('<iframe id="feed_back_frame" src="' + src + '" height="210" width="650" style="border:0">', {	
			containerCss:{
				backgroundColor:"#fff", 
				borderColor:"#fff", 
				height:350, 
				padding:0, 
				width:660
			},
			overlayClose:false,
			escClose :false
			
		});
		//$('.modalCloseImg').hide();		
	}
	*/
	
	
	// set cookie to hide the pop up form
	//setCookie('auto_contact', '1', '1');
	
	jQuery(".report_bug").live("click",function(){ 
		// Display an external page using an iframe
		var src = jQuery(".root_url").val()+"report_bug/";
		$.modal('<iframe id="report_bug_frame" src="' + src + '" height="540" width="617" style="border:0">', {	
			containerCss:{
				backgroundColor:"#fff", 
				borderColor:"#fff", 
				height:560, 
				padding:0, 
				width:630
			},
			overlayClose:true
		})
		
	});	
	
	
	
	// Display an user compatibility page using an iframe
	if(jQuery("#older_browser").val() == 'yes') {
		//var src = page_url+"support_browsers/";
		$(".supportB").modal({onOpen: function (dialog) {
			dialog.overlay.fadeIn('fast', function () {
				dialog.data.hide();
				dialog.container.fadeIn('fast', function () {
					dialog.data.slideDown('fast');	 
				});
			});
		}});	
		$(".supportB").modal({onClose: function (dialog) {
			dialog.data.fadeOut('slow', function () {
				dialog.container.hide('slow', function () {
					dialog.overlay.slideUp('slow', function () {
						$.modal.close();
					});
				});
			});
		}});
	}


	// Opening animations
	jQuery("#searchTips").click(function(){ 
		$("#basic-modal-content").modal({onOpen: function (dialog) {
			dialog.overlay.fadeIn('fast', function () {
				dialog.data.hide();
				dialog.container.fadeIn('fast', function () {
					dialog.data.slideDown('fast');	 
				});
			});
		}});	
		$("#basic-modal-content").modal({onClose: function (dialog) {
			dialog.data.fadeOut('slow', function () {
				dialog.container.hide('slow', function () {
					dialog.overlay.slideUp('slow', function () {
						$.modal.close();
					});
				});
			});
		}});
	});
	
});
jQuery(document).ready(function(){

	jQuery("a button.jsRedirect").each(function() {
		jQuery(this).click(function() { 
			location.href=$(this).closest("a").attr("href");
		});
	}); 	
	
	//===== Progressbar (Jquery UI) =====//
	var progress_val = parseInt(jQuery("#profile_completeness").val());
	$(function() {
		$( "#progressbar" ).progressbar({
			value: progress_val
		});
	});
	
	/* function to slide the campus packages */
	
	var campus_mul_max_value = new Array(5,5,5,5, 25,25,25,25);
	var campus_values = new Array(1,1,1,1,1,1,1,1);
	var campus_default_array = new Array(200,200,200,200,1,1,1,1);
	var campus_default_multiply_array = ['0','1.5','4','9','Unlimited'];
	  jQuery(".slider-range-max").each(function(i){ 			
			var min_value = 1;
			var max_value = campus_mul_max_value[i];			
			var default_value = 0;
			var div = jQuery("[college_pack='college_pack']:eq("+i+")");		
			default_value = parseFloat(campus_default_array[i]); 
			multiply_value = parseFloat(campus_default_multiply_array[i]);
			$( ".slider-range-max:eq("+i+")" ).slider({ 
				range: "max",

				min: min_value,
				max: max_value,
				value: campus_values[i],
				slide: function( event, ui ) {	
					//i = (i > 3)  ? i-4 : i;
					var flag = i;
					var default_values = default_value;
					var type = 'student';
					if($( ".slider-range-max:eq("+i+")" ).hasClass("slider-range-users") == true){
						flag = i - 4;
						type = 'user';
					}else{
						if(campus_default_multiply_array[parseInt(ui.value)-1] == 'Unlimited') {
							default_values = campus_default_multiply_array[parseInt(ui.value)-1];
						}
						else
							default_values = parseInt(default_value) + (parseInt(default_value) * parseFloat(campus_default_multiply_array[parseInt(ui.value)-1]));
					}		
				
					if(jQuery("[college_pack='college_pack']:eq("+flag+")").attr("checked") == "checked"){
						//$( "#amount" ).val( ui.value );
						set_rating_msg(ui.value,i,default_values,type);default_values = '';
					}else{						
						default_values = '';
						call_alert(" the college type");
						return false;
					}					

				}
			});
			//$( "#amount" ).val( $( ".slider-range-max" ).slider( "value" ) );
		});
		
		function set_rating_msg(v,index,default_value,type){
			if(type == 'user')
				msg = parseInt(default_value)*parseInt(v);
			else
				msg = default_value;
			$( ".custom_count:eq("+index+")" ).val( msg );
			$( ".rating_txt:eq("+index+")" ).html( msg );					
			$( "#rating_txt" ).html( msg );
		}	
});

/*Note: The following script is used for college packages*/
jQuery(document).ready(function(){
	jQuery("#mother_tongue_id").change(function() {
		jQuery("#mother_tongue").val(jQuery(this).val());
	});
	if(jQuery("form:#college_package").length){
		jQuery("[name='students'],[name='users']").live("change",function(){
			var index = (jQuery("[name='"+jQuery(this).attr("name")+"']").index(this));
			if(jQuery("[name='category']:checked").length){
				var category_id = jQuery("[name='category']:checked").val();
				var package_id = 'custom_package';
				var no_students = (jQuery("[name='students']").val());
				var no_users = (jQuery("[name='users']").val());
				jQuery(".custom_package_amount").text("Loading...");
					jQuery(".custom_package_duration").hide();
				jQuery("[name='submit']").css("visibility","hidden");
				// edited by ravi 30/12/2014
				//no_users = no_users > 1 ? no_users : 0;
				jQuery.post(jQuery("#page_url").val()+"college_plans/",{action:'get_rates',package_id:package_id,category_id:category_id,no_users:no_users,no_students:no_students},function(data){
					data = jQuery.parseJSON(data);
					jQuery(".custom_paid_package").show();
					if(data.success == '1') {
						jQuery(".custom_package_amount").html("Rs. "+data.custom_amount+"/");
					}else{
						jQuery(".custom_package_amount").html("Rs. "+data.custom_amount+"/");
					}
					jQuery("[name='submit']").css("visibility","");
						jQuery(".custom_package_duration").show();
				});
			}
		});
		jQuery(".radio").live("click",function() {
			if(jQuery(this).next("[name='category']").length) {
				jQuery("[name='submit']").css("visibility","hidden");
				var package_id='',category_id='',no_users='',no_students='',index=0;
				package_id = jQuery("[paid_plan='paid_plan']:eq(0)").val();
				var packages_id = jQuery("[paid_plan='paid_plan']").map(function(){
					return jQuery(this).val();
				}).get().join(",");
				category_id = jQuery(this).next("[name='category']").val();
				no_students = (jQuery("[name='students']").val());
				no_users = (jQuery("[name='users']").val());
				// edited by ravi 30/12/2014
				//no_users = no_users > 1 ? no_users : 0;	
					total_price = jQuery(".package_amount").text();
					jQuery(".package_amount").text("Loading...");
					jQuery(".package_duration").hide();
					jQuery(".paid_package").show()
				if(no_students > 0 && no_users > 0) {
					jQuery(".custom_package_amount").text("Loading...");
					jQuery(".custom_package_duration").hide();
					jQuery(".custom_paid_package").show()
				}
				
				jQuery.post(jQuery("#page_url").val()+"college_plans/",{action:'get_rates',package_id:package_id,packages_id:packages_id,category_id:category_id,no_users:no_users,no_students:no_students,pending_package:jQuery("#college_plan").length},function(data){
				
					data = jQuery.parseJSON(data);
					
					jQuery(".paid_package").show();
					if(data.success == '1') {
						jQuery(data.package_amount).each(function(i){						

						//jQuery(".package_amount").html("Rs. "+data.amount+"/");
							jQuery(".package_amount:eq("+i+")").html("Rs. "+data.package_amount[i]+"/");
							
						});
						//jQuery(".package_amount").html("Rs. "+data.amount+"/");
						if(data.custom_amount){
							jQuery(".custom_paid_package").show();
							jQuery(".custom_package_amount").html("Rs. "+data.custom_amount+"/");
						}
					}else{						
						jQuery(".package_amount").html(total_price);
						if(data.custom_amount){
							jQuery(".custom_paid_package").show();
							jQuery(".custom_package_amount").html("Rs. "+data.custom_amount+"/");
						}						
					}
					jQuery(".package_duration").show();
					jQuery(".custom_package_duration").show();
					jQuery("[name='submit']").css("visibility","");
				});
			}
		});
	}
	jQuery(".submit_college_plan").click(function(){
		var index = 0,category_id='',package_id='';
		package_id = jQuery("[name='pack']:checked").val();
		jQuery("[name='no_students']").val(jQuery("[name='students']").val());
		jQuery("[name='no_users']").val(jQuery("[name='users']").val());
		if(!jQuery("[name='category']:checked").length){
			jAlert('Please choose your institute category','Alert');
		}else if(!jQuery("[name='pack']:checked").length){		
			jAlert('Please choose any one pack','Alert');
		}
		else if(jQuery("[name='pack']:checked").attr("pack") == 'custom'){
			if(jQuery("[name='students']").val() == '--'){
				jAlert('Please select no. of students','Alert');
			}else if (jQuery("[name='users']").val() == '--' ){
				jAlert('Please select no. of users','Alert');
			}else{
				window.location.href = jQuery("#page_url").val()+jQuery("#language_url").val()+"college_registration/?category_id="+category_id+"&package_id="+package_id;
				return true;
			}
		}
		else{
			window.location.href = jQuery("#page_url").val()+jQuery("#language_url").val()+"college_registration/?category_id="+category_id+"&package_id="+package_id;
			return true;
		}
		return false;
	});
	
	
	//if we click the address as same
	if(jQuery('form#college_registration').length > 0) {
		jQuery('.checkbox').live('click',function() {
			var check_val=jQuery.trim(jQuery('input:checkbox[name=address_same]:checked').val());
			if(check_val == 'on') {
				var clg_address = jQuery.trim(jQuery("#college_address").val());
				if(clg_address != '') {
					jQuery("#address").val(clg_address);
					jQuery("#address").next('.errorMsg').hide();
					jQuery("#address").parent('.field').removeClass('message');
				}
			}
			else {
				jQuery("#address").val('');
			}
		});
	}
}); 
		
/* function to validate the college registration */
function validate_college_registration(par_field_name,event_name) {
		if($("#form_submit").is(':enabled') == false) {return false;}
		//Note: assign field name
		var field_name = new Array('first_name','last_name','contact_no','college_name', 'college_logo', 'year_of_establishment','affiliation','accreditations','branches','college_address','address','city','state','landline1','landline2','website','email_address','password','cpassword','security','district');
		//Note: assign field type
		var field_type = new Array("required","required","contact_no","required", "image", "required",  "required" ,"required", "required", "required", "required", "required","required", "landline", "","website","email","password", "password","required",'dropdown');
		//Note: assign field basic message  //(This will be used for your login)
		var field_msg = new Array('','','','','','','','','','','','','','','','','','','','');
		//Note: assign field basic error message
		var field_error_msg = new Array( first_name_error,last_name_error, contact_number_error,full_clg_name_error, err_logo_upload, err_establishment, err_affiliation,err_accreditations,err_branches,err_college_address,err_address,err_city,err_state,err_landline_no1 ,err_landline_no2, err_website, email_address_error, password_error, cpassword_error,'Please enter the text in the image','Please select the district');
		//Note: assign field advance error message
		var field_adv_error_msg = new Array('','',contact_number_adv_error,'', logo_upload_error, '','','','','','','','',err_valid_landine,'', adv_url_valid_error, email_address_valid_error, '', '','incorrect security code');
		var field_length=field_name.length;
		var set_foucs=undefined;
		//Note: to get particular field name and field type when user foucus out the control
		if(par_field_name!=undefined){
			var index=-1;
			index =field_name.indexOf(''+par_field_name+'');
			field_type = new Array(field_type[index]);
			field_name = new Array(field_name[index]);
			field_msg = new Array(field_msg[index]);
			field_error_msg = new Array(field_error_msg[index]);
			field_adv_error_msg = new Array(field_adv_error_msg[index]);
			set_foucs='false';
			
		}
	var validation = item_validation(field_name, field_type,field_msg,field_error_msg,field_adv_error_msg,set_foucs);
	security_code_check();
	var clg_branch = 'true';
	if(jQuery.trim(jQuery("#branches").val()) > 250) {
		clg_branch = 'false';
		jQuery("#branches").parent('.field').addClass("message");
		jQuery("#branches").next(".errorMsg").show().text(err_max_value_clg_branch);
	}
	if(event_name == 'blur'){
		check_fields = false;
		return false;
	}
	if(par_field_name!=undefined){
		return false;
	}
	
	if (validation == true && field_length == field_name.length && par_field_name == undefined && clg_branch == 'true') {
		if(par_field_name==undefined){
				if(jQuery("#package_amount").length > 0){
//					jQuery("#form_submit").after("<span>Redirecting to Payment Gateway.. Pls wait..");
				}	
				jQuery("#form_submit").attr("disabled","disabled").html("<span class='processing'>"+Processing+"</span>");
				jQuery("#college_registration_cancel").hide();
				jQuery('#email_address').parent('div').removeClass('message');
				jQuery('#email_address').parent('div').find(".errorMsg").hide();
				jQuery('#security').parent('div').find(".errorMsg").hide().text("Please enter the text in the image");
				
		}
		return true;
	} else {
		jQuery(".errorField").show();
				jQuery(".errorField").focus();
		  return false;
	}
		return false;

}

jQuery(document).ready(function(){
	//Note: Profile submit button focus
	if(jQuery(".welcomeName").length){
		jQuery("[name='submit']").keydown(function(e){
			var keyCode = e.which || e.keyCode;
			if(keyCode == 13 && (jQuery(this).hasClass("expecation_submit") || jQuery(this).hasClass('affirmative_submit'))){
				jQuery(this).click();
			}
		});
		jQuery(".jquery-selectbox-currentItem").live("keydown",function(e){
			var keyCode = e.which || e.keyCode;
			if(keyCode == 9){
			    var ctrl_name = jQuery(this).next().attr("name");
				if( ctrl_name == 'job_type' || ctrl_name == 'physically_challenged'){
					setTimeout(function(){
						if(ctrl_name == 'physically_challenged' && jQuery("[name='"+ctrl_name+"'] [selectedindex]").val() == 'Y'){
							jQuery(".description").focus();
						}else{
							jQuery("[name='submit']").focus(); 
						}
					},0);
				}
			}
		});
		jQuery("[name='job_type'] - .jquery-selectbox-currentItem,#profile_photo,#school_marks_percentage,#skill_sets_annoninput .maininput,#about_yourself,#sisterForm_add,#country_annoninput .maininput,[name='resume'],#join_date,#description").live("keydown",function(e){
			var keyCode = e.which || e.keyCode;
			if(keyCode == 9){
				setTimeout(function(){
					if(jQuery("[name='form_submit1']").length) {
						jQuery("[name='form_submit1']").focus();
					}	
					else{	
						jQuery("[name='submit']").focus(); 
					}	
				},0);
			}
		});
	}
//restrict college branches upto 250 
	$("#branches").live("keyup paste",function(e) {	
		var $this = jQuery(this);
		setTimeout(function() {
			var val = $this.val();
			if (val > 250){
				e.preventDefault();
				jQuery("#branches").parent('.field').addClass("message");
				jQuery("#branches").next(".errorMsg").show().text(err_max_value_clg_branch);
				return false;
			}else if(isNaN(val)){
				$this.val("");
			}
		}, 1);
		
		
			
	});
		//cancel the college registration
	jQuery('button#college_registration_cancel').live('click',function() {
		window.location.href = jQuery("#page_url").val()+'college_login/';
	});

	//Note: Print payment success receipt
	jQuery(".print_receipt").click(function(){
		var html = jQuery("html").html();
		w = window.open();
		w.document.writeln("<html>");
		w.document.writeln(html);
		w.document.writeln("</html>");
		jQuery("#header,#footer,#copyRight,.profileBtn",w.document).hide();
		jQuery("title",w.document).text("Payment Receipt");
		w.document.close();
		w.focus();
		w.print();
		w.close();
		return false;
	});
});
 jQuery(document).ready(function() {
	 jQuery(".expecation_submit").click(function(){
		var sfield_name = new Array("preferred_dept","job_type");
		jQuery(sfield_name).map(function(i){
			var seleted_value = '';
			jQuery("[name='"+sfield_name[i]+"'] option").each(function(){	
				if(jQuery(this).is(":selected")){
					seleted_value = jQuery(this).val();
				}
			});
			jQuery("[name='"+sfield_name[i]+"']").val(seleted_value);
			
		});
 });
	/*jQuery("[name='refer_selected']").click(function(){
		if(jQuery("#refer_friends_url").length > 0){
			jQuery("#refer_friends_url").trigger("click");
			return false;
		}
	});*/
	if(jQuery.isFunction(jQuery.fn.fcbkcomplete) == true){
		jQuery("#work_location").fcbkcomplete({
						addontab: true,                   
						input_min_size: 0,
						maxitems: 25,
						width: 305,
						height: 10,
						cache: true,
						newel: false
					
				});
		}
		if(jQuery("#work_location").length){
			jQuery("#form_submit1").click(function(){
				var maininput = jQuery.trim(jQuery("#work_location_annoninput").find(".maininput").val());
				if(maininput != '') {
					jQuery("#work_location").append('<option class="selected"  selected="selected" value="'+maininput+'">'+maininput+'</option>');
				}	
			});
		}
	//Note: Resend mail
	if(jQuery(".resnd_link").length){
		jQuery(".resnd_link").click(function(){
			jQuery("[name='resend_mail']").click();
		});
	}
	//Note: validate present address
	if(jQuery("#clear_present_address").length) {
		jQuery("#submit_form").click();
	}
 });
 
 /* for payment modes selection */
  jQuery(document).ready(function() {
	jQuery('.payRadio').click(function(){
		if($("input:checked").val() == 'cq'){
			jQuery('#cq').show();
			jQuery('#op').hide();
			jQuery('#dd').hide();
		}else if($("input:checked").val() == 'op'){
			jQuery('#op').show();
			jQuery('#cq').hide();
			jQuery('#dd').hide();
		}else{
			jQuery('#dd').show();
			jQuery('#cq').hide();
			jQuery('#op').hide();
		}
	});
	//Note: dismiss job status
	if(jQuery(".lnk_job_status_dismiss").length){
		jQuery(".lnk_job_status_dismiss").click(function(){
			jQuery.ajax({
				type: "POST",
				data: {dismiss_job_status:1},
				url: page_url+'profile/',
				success:function(data){
					//alert(data);
				}
			});
		});
	}
	
	// jQuery extension
	(function($){
		$.fn.extend({
			contains: function(str) {
				return this.filter(function(){
					return $(this).html().indexOf(str) != -1;
				});
			}
		});
	})(jQuery);

	
	
	//Note: validate update job status form
	if(jQuery("form:#update_job_status").length){
		if (jQuery.isFunction(jQuery.fn.datepicker) == true) {
			jQuery(".datepicker_join_date").datepicker({
				minDate: new Date(jQuery("#created_date").val()),
				dateFormat: 'dd/mm/yy',
				changeMonth: true,
				changeYear: true
			});
		}
		jQuery("#submit_job_status").click(function(e){
			var job_status = jQuery("[name='got_job']:checked").val();
			if(job_status == 0) {
				jQuery("#submit_job_status").attr("disabled","disabled").find("span").text("Processing");
				jQuery("#cancel").hide();
				
				return true;
			}
			else{
				var sel_company_name = jQuery.trim(jQuery("#sel_company_name").val());
				var is_join = jQuery("[name='is_join']:checked").val();
				jQuery("#sel_company_name").next(".errorMsg").hide(); jQuery("[name='is_join'],[name='got_job']").parent().find(".errorMsg").hide();
				if(sel_company_name == '' || is_join == undefined || job_status == undefined){
					if(job_status == undefined){
						jQuery("[name='got_job']").parent().find(".errorMsg").show().text("Please select any one");
					}else{
						if(is_join == undefined){
							jQuery("[name='is_join']").parent().find(".errorMsg").show().text("Please select any one");
						}
						if(sel_company_name == ''){
						jQuery("#sel_company_name").next(".errorMsg").show().text("Please enter the company name");
						}
					}
					return false;
				}
				
			}
			
			setTimeout(function(){ jQuery("#submit_job_status").attr("disabled","disabled").find("span").text("Processing");},1);
			
			jQuery("#cancel").hide();
			return true;
		});
	}
	//Note: The following script is used for send vefication number to job seeker
	//--Start
		//Note: The following script is used to scroll to mobile filed, when after loaded the form
		//--Start
		if(window.location.href.indexOf("#mobile_verify") != -1){
			if($("#mobile_verify").length){
				var $root = $('html, body');
				var href = "mobile_verify";
				$root.animate({
					scrollTop: $("#mobile_verify").offset().top
				}, 500, function () {
					window.location.hash = href;
				});
			}
		}
		//--End
		
		var no_send = 0;
	    //Note: open/hide the send verfication button, when we click verify link 
		jQuery(".verify_mobile").click(function(){
			jQuery("#send_verification").removeAttr("disabled");
			jQuery(".send_verification").slideToggle();
		});
		//Note: hide the form of update verfication status, if click cancel button
		jQuery("#cancel_verify").click(function(){
			jQuery(".submit_verification").slideToggle();
			jQuery(".verify_link").slideToggle();
			jQuery(".verification_code_success").hide();
		});
		jQuery(".verification_code_success").click(function(){
			jQuery(".verification_code_success").slideToggle();
		});
		//Note: The following script is used to update the mobile verfication status
		jQuery("#submit_verify").click(function(e){
			var verification_code = jQuery.trim(jQuery(".verification_code").val());
			var mobile_number = jQuery.trim(jQuery("#mobile_no1").val());
			//Note: allow to verify the mobile verification , if verification code is not empty
			if(verification_code != ''){
				jQuery("#submit_verify").attr("disabled","disabled");
				jQuery(".verification_code_error").hide();jQuery("#cancel_verify").hide();jQuery(this).find("span").text("Submitting..");
				//Note: check and update the mobile verification status using jquery post method
				jQuery.post(page_url+"edit_personal_details/",{mobile_no:mobile_number,verification_code:verification_code,mobile_verification:'yes'},function(data){
					//Note: Show error, if given verification is not matched with mobile verification code
					if(data == '0'){
						jQuery(".verification_code_error").show().text("Invalid verification code");
						jQuery("#submit_verify").removeAttr("disabled");
						jQuery("#cancel_verify").show();jQuery("#submit_verify").find("span").text("Submit");
					}
					//Note: show mobile verified success message and hide the verification form
					else if(data == 1){
						jQuery(".verify_link").remove();
						jQuery(".send_verification").hide();
						jQuery(".submit_verification").slideToggle();
						jQuery(".verification_code_success").hide();
						jQuery(".verification_success").show();
					}
					
				});
			}
			else{
				jQuery(".verification_code_error").show().text("Please enter verification code");
			}
			jQuery("#form_submit").find("span").text(save);
			jQuery("#form_submit").find("span").removeClass("processing");
			jQuery("#cancel").show();
		});
		//Note: The following script is used to send verifation code to job seeker
		jQuery("#send_verification").click(function(){
			jQuery(".verification_code_success").hide();
			var mobile_number = jQuery.trim(jQuery("#mobile_no1").val());
			if(no_send == 0 && mobile_number != ''){
				no_send = 1;
				jQuery(this).attr("disabled","disabled");
				jQuery("#send_verification").find("span").text("Sending..");
				jQuery.post(page_url+"edit_personal_details/",{mobile_no:mobile_number,mobile_verification:'yes'},function(data){
					no_send = 0;
					jQuery("#send_verification").find("span").text("Send Verification Code");
					var split_data = data.split("-");
					if(split_data[1] != '' && split_data[1] != undefined) {
						jQuery(".mobile_no1_errorMsg").show().text("Problem in sending sms. Pls try after sometime");
						jQuery(".send_verification").slideToggle();
					}else{
						//Note: show error , if jobseeker not updated current verification mobile number [data is 0]
						if(data == '0'){
							jQuery(".mobile_no1_errorMsg").show().text("Please update your mobile no. before verifying");
						}
						//Note: hide verify and send verification button,if verification code sent[data is 1]
						else if(data == 1){
							jQuery(".verification_code_success").show();
							jQuery(".send_verification").slideToggle();
							jQuery(".submit_verification").slideToggle();
							jQuery(".verify_link").slideToggle();
						}
						//Note: show error, if jobseeker exceeded the limit of mobile verification attempt.[data is 2]
						else if(data == 2){
							jQuery(".mobile_no1_errorMsg").show().text("You have reached todays limit. Pls try again tomorrow.");
							jQuery(".send_verification").slideToggle();
						}
					}
				});
			}
		});
	//-- End
	
 });

/* call when we change language */ 
function change_language(){ 
	sel = jQuery("[name='Language'] option:selected").val();	
	if(sel == 'en'){sel=''}else{sel=sel+'/'};
	$(".reg_forms").attr('action', jQuery("#home_root").val()+sel+jQuery("#cur_action").val()+'/'); 
	$(".reg_forms").attr('onsubmit', 'return true'); 
	$('#hdnSwitch').val(1);
	jQuery(".reg_forms").submit();		
}

/* function to call modal for images */
jQuery(document).ready(function() {				
	// Opening animations
	jQuery(".static_img").click(function(){ 
		id = $(this).attr('rel');			
		$("#static-img-"+id).modal({onOpen: function (dialog) {
			$('#simplemodal-container').css({"width":"auto","left":"4%","height":"80%","top":"5%"  });
			dialog.overlay.fadeIn('fast', function () {
				dialog.data.hide();
				dialog.container.fadeIn('fast', function () {
					dialog.data.slideDown('fast');	 
				});
			});
		}});	
		$("#static-img-"+id).modal({onClose: function (dialog) {
			dialog.data.fadeOut('slow', function () {
				dialog.container.hide('slow', function () {
					dialog.overlay.slideUp('slow', function () {
						$.modal.close();
					});
				});
			});
		}});
	});	
	
	// Opening animations
	jQuery(".static_img").mouseenter(function(){ 
		$(this).next("span").addClass("dPhoto");
		//$(this).next("span").removeClass("vh"); 			
	});
	// Opening animations
	jQuery(".static_img").mouseleave(function(){
		$(this).next("span").removeClass("dPhoto"); 	
		//$(this).next("span").addClass("vh"); 		
	});
		
});

/* for home page tabs */
$(document).ready(function(){
	$(".rightContainer, .hiwContainer").delegate("a", "click", function(){						
		var currentTab = $(this).attr('href');	
		if($(currentTab).length > 0){
			$(".rightContainer ul li > a, .hiwContainer ul li > a").removeClass("selected");
			$(this).addClass("selected");
			$('#jobsTab div').hide();
			$(currentTab).show();		
			return false;	
		}
	});
});

var news = $('.news')
current = 0;
news.hide();
Rotator();
function Rotator() {
    $(news[current]).fadeIn('slow').delay(4000).fadeOut('slow');
    $(news[current]).queue(function() {
        current = current < news.length - 1 ? current + 1 : 0;
        Rotator();
        $(this).dequeue();
    });
}

$(document).ready(function(){
	/* when the rec. firm is clicked in emp. reg */
	jQuery(".radio").live("click",function() {
		if(jQuery(".styled:eq(0)").is(':checked') == true) {
			$('.empIndus').hide();
		}else{
			$('.empIndus').show();
			
		}		
	});
});

/* for slim scrollt */
$(function(){
    $('#inner-content-div').slimScroll({
        height: '415px',
		color: '#e31d23',
		size: '5px',
		railOpacity: 0.8,
		disableFadeOut:true
    });
});

function validate_industry(){
	//Note: assign field name
	var field_name = new Array('industry[]');
	//Note: assign field type
	var field_type = new Array('checkbox');
	//Note: assign field basic message  //(This will be used for your login)
	var field_msg = new Array('');
	//Note: assign field basic error message
	var field_error_msg = new Array('Please select an industry');
	//Note: assign field advance error message
	var field_adv_error_msg = new Array('');
	
	var validation = item_validation(field_name, field_type,field_msg,field_error_msg,field_adv_error_msg,false);
	
	return validation;
}

/* function to get cookie */
function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
    }
    return "";
}

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
	// d.setTime(d.getTime() + (exdays*24*60*60*1000));
    d.setTime(d.getTime() + (exdays*60*60*1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
}

/*
// when we click the refer btn in home
jQuery(document).ready(function() {
	jQuery('#refer_friend').click(function(){ 
		if($('#ref_address').val() != 'email or mobile no'){
			jQuery("#refer_FD").val('submit');
			document.ref_frnd.submit();	
		}else{
			return false;
		}
	});
});
*/