var cur_form_name = "customForm";
var error_fields = [];

check_fields = true;
var control_count = 0;

function item_validation(field_name, field_type, control_count, focus_set, field_msgg, field_error_msgg, field_adv_error_msg) {


    //control_count = document.getElementById("Business_Category_count").value;
    check_fields = true;
    var n = field_name.length;

    var field_msg = field_msgg == undefined ? new Array() : field_msgg;
    var field_error_msg = field_error_msgg == undefined ? new Array() : field_error_msgg;
    var field_adv_error_msg = field_adv_error_msg == undefined ? new Array() : field_adv_error_msg;
    error_fields = new Array();
    for (i = 0; i < n; i++) {
        if (field_name[i])
            error_fields.push(field_name[i]);
    }

    for (i = 0; i < n; i++) {
        if (field_msg == undefined) {
            field_msg[i] = '';
        }
        if (field_msg == undefined) {
            field_error_msg[i] = '';
        }
        if (field_adv_error_msg == undefined) {
            field_adv_error_msg[i] = '';
        }
        switch (field_type[i]) {
            case "not_required":
                not_required_validation(field_name[i], field_msg[i], field_error_msg[i], field_adv_error_msg[i]);
                break;
            case "date":
                date_validate(field_name[i], field_msg[i], field_error_msg[i], field_adv_error_msg[i]);
                break;
            case "required":
                required_validation(field_name[i], field_msg[i], field_error_msg[i], field_adv_error_msg[i]);
                break;
            case "require":
                require_validation(field_name[i], field_msg[i], field_error_msg[i], field_adv_error_msg[i]);
                break;
            case "required_max":
                required_validation_max(field_name[i], field_msg[i], field_error_msg[i], field_adv_error_msg[i]);
                break;
            case "file_pdf":
                pdf_file_validtion(field_name[i], field_msg[i], field_error_msg[i], field_adv_error_msg[i]);
                break;
            case "password":
                password_validtion(field_name[i], field_msg[i], field_error_msg[i], field_adv_error_msg[i]);
                break;
            case "image_file":
                report_file_validation(field_name[i], field_msg[i], field_error_msg[i], field_adv_error_msg[i]);
                break;
            case "radio":
                radio_validation(field_name[i], field_msg[i], field_error_msg[i], field_adv_error_msg[i]);

                break;
            case "checkbox":
                radio_checkbox(field_name[i], field_msg[i], field_error_msg[i], field_adv_error_msg[i]);

                break;
            case "compare_date":
                compare_date_validation(field_name[i], field_msg[i], field_error_msg[i], field_adv_error_msg[i]);
                break;
            case "compare_date_equal":
                compare_date_equal_validation(field_name[i], field_msg[i], field_error_msg[i], field_adv_error_msg[i]);
                break;
            case "dropdown":
                dropdown_validation(field_name[i], field_msg[i], field_error_msg[i], field_adv_error_msg[i]);

                break;
            case "dropdown_sheep":
                dropdown_validation_sheepit(field_name[i], control_count, field_msg[i], field_error_msg[i], field_adv_error_msg[i]);
                break;
            case "float":
                float_validation(field_name[i], field_msg[i], field_error_msg[i], field_adv_error_msg[i]);
                break;
            case "float_optional":
                float_optional_validation(field_name[i], field_msg[i], field_error_msg[i], field_adv_error_msg[i]);
                break;
            case "numeric":
                numeric_validation(field_name[i], field_msg[i], field_error_msg[i], field_adv_error_msg[i]);
                break;
            case "email":
                email_validation(field_name[i], field_msg[i], field_error_msg[i], field_adv_error_msg[i]);
                break;
            case "alpha_numeric":
                alphanumeric_validation(field_name[i], field_msg[i], field_error_msg[i], field_adv_error_msg[i]);
                break;
            case "image":
                image_type_validation(field_name[i], field_msg[i], field_error_msg[i], field_adv_error_msg[i]);
                break;
        }
    }
    if (focus_set != 'false') {
        focus_error(error_fields, control_count);
    }
    return check_fields;
}

//dynamicall validate the graduate function
function dynamic_jquery_graduate_validation(field_name, field_type, control_count, focus_set, field_msgg, field_error_msgg, field_adv_error_msg) {
    check_fields = true;
    var n = field_name.length;

    var field_msg = field_msgg == undefined ? new Array() : field_msgg;
    var field_error_msg = field_error_msgg == undefined ? new Array() : field_error_msgg;
    var field_adv_error_msg = field_adv_error_msg == undefined ? new Array() : field_adv_error_msg;
    error_fields = new Array();
    var inc = 0;
    var k;
    // control_count = control_count - 1;
    //alert(control_count);
    for (j = 0; j < field_name.length; j++) {


        for (i = 0; i < control_count; i++) {

            if (document.getElementsByName(field_name[j] + i)) {
                if (field_type[j] == "required") {
                    required_validation(field_name[j] + i, field_msg[j], field_error_msg[j], field_adv_error_msg[j]);

                }
                if (field_type[j] == "dropdown") {
                    dropdown_validation(field_name[j] + i, field_msg[j], field_error_msg[j], field_adv_error_msg[j]);
                }

            }

        }


    }
    return check_fields;

}

//dynamic jQuery option test validation

//dynamicall validate the online test 
function dynamic_jquery_option_validation(field_name, field_type, control_count, focus_set, field_msgg, field_error_msgg, field_adv_error_msg, focus_filed) {
  
    check_fields = true;
    var n = field_name.length;
    var focus_field_name = focus_filed == '' ? 'not_show' : '';

    var field_msg = field_msgg == undefined ? new Array() : field_msgg;
    var field_error_msg = field_error_msgg == undefined ? new Array() : field_error_msgg;
    var field_adv_error_msg = field_adv_error_msg == undefined ? new Array() : field_adv_error_msg;
    error_fields = new Array();
    var inc = 0;

    var vals = "";
    var tests = true;
    var images = true;
    for (i = 0; i < control_count; i++) {
        vals = "";
        for (j = 0; j < field_name.length; j++) {


            //get the check box value

            if (jQuery("[id='" + "text_" + i + "']:checked").val() == "text") {
                vals = "text";
            }
            if (jQuery("[id='" + "text_" + i + "']:checked").val() == "image") {
                vals = "image";
            }




            if (field_type[j] == "checkbox") {

                if (jQuery("[name='" + field_name[j] + "_" + i + "']:checked").length > 0) {

                    radio_checkbox(field_name[j] + "_" + i, field_msg[j], field_error_msg[j], field_adv_error_msg[j]);

                }



            }
            if (field_type[j] == "required") {


                required_validation(field_name[j] + "_" + i, field_msg[j], field_error_msg[j], field_adv_error_msg[j]);
                if (check_fields == false && focus_field_name == '') {
                    focus_field_name = field_name[j] + "_" + i;
                }
            }

            if (field_type[j] == "dropdown") {


                dropdown_validation(field_name[j] + "_" + i, field_msg[j], field_error_msg[j], field_adv_error_msg[j]);
                if (check_fields == false && focus_field_name == '') {
                    focus_field_name = field_name[j] + "_" + i;
                }
            }


            if (field_type[j] == "multiple_option") {


                for (var l = 1; l < 5; l++) {
                    if (vals == "text") {



                        if (document.getElementById(field_name[j] + "1_q" + i) != undefined && document.getElementById(field_name[j] + "2_q" + i) != undefined && document.getElementById(field_name[j] + "3_q" + i) != undefined && document.getElementById(field_name[j] + "4_q" + i) != undefined) {
                          
                            val1 = document.getElementById(field_name[j] + "1_q" + i).value;
                            val2 = document.getElementById(field_name[j] + "2_q" + i).value;
                            val3 = document.getElementById(field_name[j] + "3_q" + i).value;
                            val4 = document.getElementById(field_name[j] + "4_q" + i).value;
                            // this is for set the focus field (text)
                            if (trim(val1) == '' && focus_field_name == '') focus_field_name = field_name[j] + "1_q" + i;
                            if (trim(val2) == '' && focus_field_name == '') focus_field_name = field_name[j] + "2_q" + i;
                            if (trim(val3) == '' && focus_field_name == '') focus_field_name = field_name[j] + "3_q" + i;
                            if (trim(val4) == '' && focus_field_name == '') focus_field_name = field_name[j] + "4_q" + i;
                          
                            if (val1 != undefined || val2 != undefined || val3 != undefined || val4 != undefined) {
                               
                                // if option type text whether single field is empty means display the error field
                                if ((trim(val1) == '' || val1.length == 0) || (trim(val2) == '' || val2.length == 0) || (trim(val3) == '' || val3.length == 0) || (trim(val4) == '' || val4.length == 0)) {
                                    tests = false;
                                  
                                    if (document.getElementById(field_name[j] + "4_q" + i + "_error") != null) {
                                        jQuery("#" + field_name[j] + "4_q" + i + "_error").addClass("error-message");
                                        document.getElementById(field_name[j] + "4_q" + i + "_error").innerHTML = "Please select all";

                                    }
                                    check_fields = check_fields && false;
                                }
                                else {
                                    tests = true;
                                }

                            }

                            if (document.getElementById(field_name[j] + "4_q" + i + "_error") != null) {
                                if (tests == true)
                                    document.getElementById(field_name[j] + "4_q" + i + "_error").innerHTML = "";


                            }
                        }

                    }


                    if (vals == "image") {




                        if (document.getElementById(field_name[j] + "1_q" + i) != null) {
                            val1 = document.getElementById(field_name[j] + "1_q" + i).value;
                            val2 = document.getElementById(field_name[j] + "2_q" + i).value;
                            val3 = document.getElementById(field_name[j] + "3_q" + i).value;
                            val4 = document.getElementById(field_name[j] + "4_q" + i).value;
                            var reg = /^.+(.jpg|.JPG|.PNG|.png|.gif|.GIF|.bmp|.BMP|.jpeg|.JPEG)$/;

                            if (val1 != undefined || val2 != undefined || val3 != undefined || val4 != undefined) {
                                if (reg.test(val1) == false && focus_field_name == '') focus_field_name = field_name[j] + "1_q" + i;
                                if (reg.test(val2) == false && focus_field_name == '') focus_field_name = field_name[j] + "2_q" + i;
                                if (reg.test(val3) == false && focus_field_name == '') focus_field_name = field_name[j] + "3_q" + i;
                                if (reg.test(val4) == false && focus_field_name == '') focus_field_name = field_name[j] + "4_q" + i;
                                // this is for set the focus field (image)
                                if (reg.test(val1) == false || reg.test(val2) == false || reg.test(val3) == false || reg.test(val4) == false) {
                                // if option type image whether single field is empty means display the error field
                                    images = false;
                                    if (document.getElementById(field_name[j] + "4_q" + i + "_error") != null) {
                                        document.getElementById(field_name[j] + "4_q" + i + "_error").className = "error-message";
                                        document.getElementById(field_name[j] + "4_q" + i + "_error").innerHTML = "Please select all";
                                    }
                                    check_fields = check_fields && false;
                                }
                                else {
                                    images = true;
                                }

                            }

                            if (document.getElementById(field_name[j] + "4_q" + i + "_error") != null) {
                                if (images == true)
                                    document.getElementById(field_name[j] + "4_q" + i + "_error").innerHTML = "";


                            }
                        }

                       
                    }
                }


            }


        }




    }
    if (focus_field_name != 'not_show') {
        jQuery("#" + focus_field_name).focus();
    }
    return check_fields;

}

//remove class
function remove_class(fiels_names) {

    var n = fiels_names.length;
    for (j = 0; j < fiels_names.length; j++) {
        for (i = 0; i < control_count; i++) {

            if (document.getElementById(fiels_names[j] + i + "_error") != null) {

                document.getElementById(fiels_names[j] + i + "_error").innerHTML = "";

                document.getElementById(fiels_names[j] + i + "_error").className = "";


            }
        }

    }
}


//dynamically validate the experience function

function dynamic_jquery_experience_validation(field_name, field_type, control_count, focus_set, field_msgg, field_error_msgg, field_adv_error_msg) {
    check_fields = true;



    var n = field_name.length;

    var field_msg = field_msgg == undefined ? new Array() : field_msgg;
    var field_error_msg = field_error_msgg == undefined ? new Array() : field_error_msgg;
    var field_adv_error_msg = field_adv_error_msg == undefined ? new Array() : field_adv_error_msg;
    error_fields = new Array();
    var inc = 0;
    var k;
    // control_count = control_count - 1;
    // alert(control_count);
    for (j = 0; j < field_name.length; j++) {


        for (i = 0; i < control_count; i++) {

            if (document.getElementsByName(field_name[j] + i)) {

                if (field_type[j] == "required") {
                    required_validation(field_name[j] + "_" + i, field_msg[j], field_error_msg[j], field_adv_error_msg[j]);

                }
                if (field_type[j] == "dropdown") {
                    dropdown_validation(field_name[j] + "_" + i, field_msg[j], field_error_msg[j], field_adv_error_msg[j]);
                }
                if (field_type[j] == "image_file") {
                    report_file_validation(field_name[j] + "_" + i, field_msg[j], field_error_msg[j], field_adv_error_msg[j]);
                }
            }

        }


    }

    return check_fields;

}
/* field required validation */
function required_validation(field, msg, error_msg, adv_error_msg) {


    if (document.getElementById(field) != null) {

        val = document.getElementById(field).value;

        if (val != undefined) {
            document.getElementById(field).value = trim(document.getElementById(field).value);
            if (trim(val) == '' || val.length == 0) {

                jQuery("#" + field).addClass("error");

                if (document.getElementById(field + "_error") != null) {

                    document.getElementById(field + "_error").className = "error-message";

                    if (error_msg)
                        document.getElementById(field + "_error").innerHTML = error_msg;
                }
                check_fields = check_fields && false;

            }
            else {
                jQuery("#" + field).removeClass("error");
                if (document.getElementById(field + "_error") != null) {
                    if (msg)
                        document.getElementById(field + "_error").innerHTML = "";

                    document.getElementById(field + "_error").className = "";
                }

            }
        }
    }

}
/* field required validation */
function require_validation(field, msg, error_msg, adv_error_msg) {


    if (document.getElementById(field) != null) {


        val = document.getElementById(field).value;
        var va = jQuery("[name=apprentice]:checked").length;

        if (val != undefined && va == 0) {
            document.getElementById(field).value = trim(document.getElementById(field).value);
            if (trim(val) == '' || val.length == 0) {

                jQuery("#" + field).addClass("error");

                if (document.getElementById(field + "_error") != null) {

                    document.getElementById(field + "_error").className = "error-message";

                    if (error_msg)
                        document.getElementById(field + "_error").innerHTML = error_msg;
                }
                check_fields = check_fields && false;

            }
            else {
                jQuery("#" + field).removeClass("error");
                if (document.getElementById(field + "_error") != null) {
                    if (msg)
                        document.getElementById(field + "_error").innerHTML = "";

                    document.getElementById(field + "_error").className = "";
                }

            }
        }

    }

}
function date_validate(field, msg, error_msg, adv_error_msg) {
    val = document.getElementById(field).value;
    var filter = new RegExp("(0[123456789]|10|11|12)([/])([1-2][0-9][0-9][0-9])");
    var tt = filter.test(val);
    if (!tt) {
        jQuery("#" + field).addClass("error");

        if (document.getElementById(field + "_error") != null) {
            document.getElementById(field + "_error").className = "error-message";
            if (error_msg)
                document.getElementById(field + "_error").innerHTML = error_msg;
        }
        check_fields = check_fields && false;
    }
    else {
        jQuery("#" + field).removeClass("error");
        if (document.getElementById(field + "_error") != null) {
            if (msg)
                document.getElementById(field + "_error").innerHTML = "";

            document.getElementById(field + "_error").className = "";
        }
    }

}
/* field required validation */
function required_validation_com(field, msg, error_msg) {
    val = document.getElementById(field).value;
    document.getElementById(field).value = trim(document.getElementById(field).value);

    var radioButtons = document.getElementsByName("business_type");
    var value = "";
    for (var x = 0; x < radioButtons.length; x++) {
        if (radioButtons[x].checked) {
            value = radioButtons[x].value;
        }
    }

    if ((trim(val) == '' || val.length == 0) && value == "B") {

        jQuery("#" + field).addClass("error");
        if (document.getElementById(field + "_error") != null) {
            if (error_msg)
                document.getElementById(field + "_error").innerHTML = error_msg;
            document.getElementById(field + "_error").className = "nameInfo error";
        }
        check_fields = check_fields && false;
    }
    else {
        jQuery("#" + field).removeClass("error");
        document.getElementById(field + "_error").className = "nameInfo";
        if (msg)
            document.getElementById(field + "_error").innerHTML = msg;
    }
}

/* field required validation */
function password_validtion(field, msg, error_msg, adv_error_msg) {

    val = field.split("-");
    msg = msg.split("-");
    error_msg = error_msg.split("-");
    if (document.getElementById(val[0]) != undefined && document.getElementById(val[1]) != undefined) {
        psw = document.getElementById(val[0]).value;
        cpsw = document.getElementById(val[1]).value;

        if (trim(psw) == '' || trim(cpsw) == '' || psw.length == 0 || cpsw.length == 0) {
            if (trim(psw) == '' || psw.length == 0) {
                document.getElementById(val[0]).className = "textBox error";
                if (document.getElementById(val[0] + "_error") != null) {
                    document.getElementById(val[0] + "_error").className = "error-message";
                    if (error_msg[0])
                        jQuery("#" + val[0] + "_error").text(error_msg[0]);

                }
                check_fields = check_fields && false;
            }
            else {
                document.getElementById(val[0]).className = 'textBox';
                document.getElementById(val[0] + "_error").className = "message";
                if (msg[0])
                    jQuery("#" + val[0] + "_error").text('');
            }
            if (trim(cpsw) || cpsw.length == 0) {
                document.getElementById(val[1]).className = "textBox error";
                if (document.getElementById(val[1] + "_error") != null) {
                    document.getElementById(val[1] + "_error").className = "error-message";
                    if (error_msg[1])
                        jQuery("#" + val[1] + "_error").text(error_msg[1]);
                }
                check_fields = check_fields && false;
            }
            else {
                document.getElementById(val[1]).className = 'textBox';
                document.getElementById(val[1] + "_error").className = "message";
                if (msg[1])
                    jQuery("#" + val[1] + "_error").text('');
            }
        }

        else if ((psw) != (cpsw)) {
            if (trim(psw) != '') {
                document.getElementById(val[0]).className = 'textBox';
                document.getElementById(val[0] + "_error").className = "message";
                if (msg[0])
                    jQuery("#" + val[0] + "_error").text('');
            }
            if (trim(cpsw) != '') {
                document.getElementById(val[1]).className = 'textBox';
                document.getElementById(val[1] + "_error").className = "message";
                if (msg[1])
                    jQuery("#" + val[1] + "_error").text('');
            }
            if ((psw) != (cpsw)) {
                document.getElementById(val[1]).className = "textBox error";
                if (document.getElementById(val[1] + "_error") != null) {
                    document.getElementById(val[1] + "_error").className = "error-message";
                    document.getElementById(val[1] + "_error").innerHTML = "Password and Confirm Password Mismatch!";
                }
                check_fields = check_fields && false;
            }
        }
        else {
            document.getElementById(val[0]).className = 'textBox';
            document.getElementById(val[0] + "_error").className = "message";
            document.getElementById(val[1]).className = 'textBox';
            document.getElementById(val[1] + "_error").className = "message";
            if (msg[0])
                jQuery("#" + val[0] + "_error").text('');
            if (msg[1])
                jQuery("#" + val[1] + "_error").text('');
        }
    }
}
/* Email Formate validations*/
function email_validation(field, msg, error_msg, adv_error_msg) {

    required_validation(field, msg, error_msg);

    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    val = document.getElementById(field).value;

    if ((reg.test(val) == false || trim(val) == '')) {
        jQuery("#" + field).addClass("error");
        check_fields = check_fields && false;
        if (document.getElementById(field + "_error")) {
            jQuery("#" + field + "_error").addClass("error-message");
            if (error_msg)
                jQuery("#" + field + "_error").text((adv_error_msg != undefined && adv_error_msg != '' && trim(val) != "") ? adv_error_msg : error_msg);

        }
    }
    else {
        jQuery("#" + field).removeClass("error-message");
        jQuery("#" + field + "_error").removeClass("error-message");
        if (msg)
            jQuery("#" + field + "_error").text();
    }

}
/* Numberic Validations*/
function numeric_validation(field, msg, error_msg, adv_error_msg) {
    required_validation(field);
    val = document.getElementById(field).value;
    var objRegExp = /(^-?\d\d*\.\d*$)|(^-?\d\d*$)|(^-?\.\d\d*$)/;
    if (objRegExp.test(val) == false || (trim(val) == '' || val.length == 0)) {

        jQuery("#" + field).addClass("error");
        check_fields = check_fields && false;
        if (document.getElementById(field + "_error") != null) {
            document.getElementById(field + "_error").className = "nameInfo error";
            if (error_msg)
                jQuery("#" + field + "_error").text((adv_error_msg != undefined && adv_error_msg != '' && trim(val) != "") ? adv_error_msg : error_msg);
        }
    } else {
        jQuery("#" + field).removeClass("error");
        if (msg)
            jQuery("#" + field + "_error").text(msg);
        document.getElementById(field + "_error").className = "nameInfo";
    }

}

//chk if an object is an array or not.
function isArray(obj, value) {
    var bool = false;
    for (n = 0; n <= obj.length - 1; n++) {
        if (obj[n] == value && value != "||")
            bool = true;
    }
    return bool;
}
/* Dropdown validation */
function dropdown_validation_sheepit(field, control_count, msg, error_msg) {

    var drop_values = new Array();
 
    for (var i = 0; i < control_count - 1; i++) {
        if (document.getElementById(field + i) != null) {
            val = document.getElementById(field + i).selectedIndex;
         
            var drop_value;
            drop_value = document.getElementById(field + i).value;
            check_id = isArray(drop_values, drop_value);
            if (document.getElementById(field + i + "_error") != undefined) {
                document.getElementById(field + i + "_error").className = 'nameInfo'
                if (error_msg)
                    document.getElementById(field + i + "_error").innerHTML = error_msg;
            }
            if (check_id == true && val != 0) {

                if (document.getElementById(field + i + "_error") != undefined) {
                    document.getElementById(field + i + "_error").className = 'error-message'
                    // document.getElementById(field + i + "_error").innerHTML = "Business Category Already Exists";
                }
                document.getElementById(field + i).className = "reg error";
                if (document.getElementById(field + i + "_error") != null) {
                    document.getElementById(field + i + "_error").className = "nameInfo error";
                    if (error_msg)
                        document.getElementById(field + i + "_error").innerHTML = error_msg;
                }
                check_fields = check_fields && false;
            }
            else {
                if (val == 0) {
                    document.getElementById(field + i).className = "reg error";
                    if (document.getElementById(field + i + "_error") != null) {
                        document.getElementById(field + i + "_error").className = "error-message";
                        if (error_msg)
                            document.getElementById(field + i + "_error").innerHTML = error_msg;
                    }
                    check_fields = check_fields && false;
                }
                else {
                    document.getElementById(field + i).className = 'reg';
                    if (document.getElementById(field + i + "_error") != null) {
                        document.getElementById(field + i + "_error").className = "nameInfo";
                        if (msg)
                            document.getElementById(field + i + "_error").innerHTML = msg;
                    }
                }
            }
            drop_values[i] = document.getElementById(field + i).value;

        }
    }

}
/* Dropdown validation */
function dropdown_validation(field, msg, error_msg, adv_error_msg) {

   
    if (document.getElementById(field) != null) {

        val = document.getElementById(field).selectedIndex;
    

        var e = document.getElementById(field);
        if (val == 0) {

            //document.getElementById(field).className = "reg error";
            jQuery("#" + field).addClass("reg error");
            
            if (document.getElementById(field + "_error") != null) {
                document.getElementById(field + "_error").className = "error-message";
                if (error_msg)
                    document.getElementById(field + "_error").innerHTML = error_msg;
            }
            check_fields = check_fields && false;
        }
        else {
            //document.getElementById(field).className = 'reg';
            jQuery("#" + field).removeClass("error");
            if (document.getElementById(field + "_error") != null) {
                document.getElementById(field + "_error").className = "message";
                if (msg)
                    document.getElementById(field + "_error").innerHTML = '';
            }
        }
    }
}

/* this function is used to focus a control which one first get error */
function focus_error(field, control_count) {
    for (i = 0; i < field.length; i++) {

        split_id = field[i].split("-");
        if (document.getElementById("" + field[i] + "0") != undefined) {
            var j = 0;
            var focus = true;
            do {
                if (jQuery("#" + field[i] + j).hasClass("error") && focus == true) {
                    focus = false;
                    document.getElementById(field[i] + j).focus();
                }
                j = j + 1;
            } while (document.getElementById("" + field[i] + j + "") != undefined)
            if (focus == false)
                break;
        }

        // For password and confirm password
        if (split_id[0] != "" && split_id[1] != "") {

            if ((document.getElementById(split_id[0]) != null) && (document.getElementById(split_id[1]) != null)) {

                if (jQuery("#" + split_id[0]).hasClass("error") || document.getElementById(split_id[0]).style.border == "1px solid rgb(255, 0, 0)" || document.getElementById(split_id[0]).style.border == "#ff0000 1px solid") {

                    document.getElementById(split_id[0]).focus();
                    break;
                }
                else if (jQuery("#" + split_id[1]).hasClass("error") || document.getElementById(split_id[1]).style.border == "1px solid rgb(255, 0, 0)" || document.getElementById(split_id[1]).style.border == "#ff0000 1px solid") {

                    document.getElementById(split_id[1]).focus();
                    break;
                }
            }

        }


        if ((document.getElementById(field[i]) != null)) {

            if (jQuery("#" + field[i]).hasClass("error") || document.getElementById(field[i]).style.border == "1px solid rgb(255, 0, 0)" || document.getElementById(field[i]).style.border == "#ff0000 1px solid") {

                document.getElementById(field[i]).focus();
                break;
            }
            else if ((document.getElementById(field[i] + "_error") != null)) {
                if (document.getElementById(field[i] + "_error").innerHTML != "") {
                    // jQuery("#" + field[i] + " input:radio:checked").focus()
                    if (document.getElementById(field[i] + "_0") != null) {
                        document.getElementById(field[i] + "_0").focus();
                        break;
                    }

                }
            }
        }
        else if (document.getElementsByName(field[i]) != undefined) {

            if (document.getElementById(field[i] + "_error") != undefined && jQuery("#" + field[i] + "_error").hasClass("error")) {
                if (typeof (window.jQuery) != "undefined")
                    jQuery("[name=" + field[i] + "]:first").focus();
                break;
            }
        }
        error_fields = [];
    }
}


function required_validation_max(field) {

    val = document.getElementById(field).value;
    document.getElementById(field).value = trim(document.getElementById(field).value);
    if (trim(val) == '' || val.length < 3 || val.search(/[^a-zA-Z0-9 ]/g) != -1) {
        document.getElementById(field).style.border = '1px solid #ff0000';
        check_fields = check_fields && false;
    }

    else {
        document.getElementById(field).style.border = '1px solid #B6B6B6';
    }

}
/* trim values */
function trim(val) {
    if (val != undefined)

        return val.replace(/^\s+|\s+$/g, '');

}
/*Note: Past Date validation*/
function past_date_validation(field, msg, error_msg, adv_error_msg) {

    val = document.getElementById(field).value;

    required_validation(field);

    var split = val.split("/");
    var current_date = new Date();
    var check_date = new Date(split[1] + '/' + split[0] + '/' + split[2]);
    a = Date.parse(check_date);
    b = Date.parse(current_date);
    if (b > a) {

        jQuery("#" + field).addClass("error");

        if (document.getElementById(field + "_error") != null) {
            document.getElementById(field + "_error").className = "error-message";
            if (error_msg)
                document.getElementById(field + "_error").innerHTML = error_msg;
        }
        check_fields = check_fields && false;

    }
    else {
        jQuery("#" + field).removeClass("error");
        if (document.getElementById(field + "_error") != null) {
            if (msg)
                document.getElementById(field + "_error").innerHTML = "";

            document.getElementById(field + "_error").className = "";
        }
    }
}





/* Convert string to datetime formate*/
function dateStringToTime(dateStr) {
    year = dateStr.substring(6, 8);
    month = dateStr.substring(0, 2);
    day = dateStr.substring(3, 5);

    return new Date(year, month, day).getTime();
}
/*Find between two dates*/
function dateWithin(beginDate, endDate, checkDate) {
    var split_beginDate = beginDate.split("/");
    var split_endDate = endDate.split("/");
    var split_checkDate = checkDate.split("/");
    var sd = new Date(split_beginDate[1] + '/' + split_beginDate[0] + '/' + split_beginDate[2]);
    var ed = new Date(split_endDate[1] + '/' + split_endDate[0] + '/' + split_endDate[2]);
    var cd = new Date(split_checkDate[1] + '/' + split_checkDate[0] + '/' + split_checkDate[2]);
    var starDate = new Date(sd);
    var endDate = new Date(ed);
    var middleDate = new Date(cd);
    var b, e, c;
    b = Date.parse(starDate);
    e = Date.parse(endDate);
    c = Date.parse(middleDate);
    if ((c <= e && c >= b)) {

        return true;

    }

    return false;

}
function daysBetween(date1, date2) {
    var DSTAdjust = 0;
    // constants used for our calculations below
    oneMinute = 1000 * 60;
    var oneDay = oneMinute * 60 * 24;
    // equalize times in case date objects have them
    date1.setHours(0);
    date1.setMinutes(0);
    date1.setSeconds(0);
    date2.setHours(0);
    date2.setMinutes(0);
    date2.setSeconds(0);
    // take care of spans across Daylight Saving Time changes
    if (date2 > date1) {
        DSTAdjust =
            (date2.getTimezoneOffset() - date1.getTimezoneOffset()) * oneMinute;
    } else {
        DSTAdjust =
            (date1.getTimezoneOffset() - date2.getTimezoneOffset()) * oneMinute;
    }
    var diff = Math.abs(date2.getTime() - date1.getTime()) - DSTAdjust;
    return Math.ceil(diff / oneDay);
}



/* Radio button validation */
function radio_checkbox(field, msg, error_msg, adv_error_msg) {

    var rb2 = document.getElementsByName(field);

    var radio_choice2 = false;
    if (jQuery("[name='" + field + "']:checked").length > 0) {
        radio_choice2 = true;


    }
    if (radio_choice2 == false) {
        if (jQuery("[name='" + field + "_error']").length > 0)

            jQuery("[name='" + field + "_error']").addClass("error-message");
        jQuery("[name='" + field + "_error']").html(error_msg);
        check_fields = check_fields && false;

    }
    else {
        jQuery("[name='" + field + "_error']").removeClass("error-message").addClass("message");
        jQuery("[name='" + field + "_error']").html('');
    }

}

/* Radio button validation */
function radio_validation(field, msg, error_msg) {

    var rb2 = document.getElementsByName(field);


    var radio_choice2 = false;
    for (counter2 = 0; counter2 < rb2.length; counter2++) {
        if (rb2[counter2].checked) {
            radio_choice2 = true;
            break;
        }
    }
    if (radio_choice2 == false) {
        if (document.getElementById(field + "_error") != undefined)
            document.getElementById(field + "_error").className = "error-message";
        if (error_msg)
            document.getElementById(field + "_error").innerHTML = error_msg;
        check_fields = check_fields && false;

    }
    else {
        document.getElementById(field + "_error").className = "message";
        if (msg)
            document.getElementById(field + "_error").innerHTML = msg;
    }
}
/* Radio button validation */
function master_radio_validation(field) {

    if (field != "") {
        var selectedvalue = jQuery("#" + field + " input:radio:checked").val();
        if (selectedvalue) {
            document.getElementById(field + "_error").innerHTML = "";
        }
        else {
            document.getElementById(field + "_error").innerHTML = "Please select any one";
            check_fields = check_fields && false;
        }

    }
}
/* float validations*/
function float_validation(field) {
    val = document.getElementById(field).value;
    document.getElementById(field).value = trim(document.getElementById(field).value);
    var objRegExp = /^((\d+(\.\d*)?)|((\d*\.)?\d+))$/;
    if (trim(val) == '' || val.lenth == 0) {
        document.getElementById(field).style.border = '1px solid #ff0000';
        document.getElementById(field).value = "";
        check_fields = check_fields && false;
    }
    else if (objRegExp.test(val) == false && (trim(val) != '' || val.length !== 0)) {
        document.getElementById(field).style.border = '1px solid #ff0000';
        document.getElementById(field).value = "";
        check_fields = check_fields && false;
    }
    else {
        document.getElementById(field).style.border = '1px solid #B6B6B6';


    }

}
function float_optional_validation(field) {
    val = document.getElementById(field).value;
    var objRegExp = /^((\d+(\.\d*)?)|((\d*\.)?\d+))$/;
    if (trim(val) == '' || val.lenth == 0) {
        document.getElementById(field).style.border = '1px solid #B6B6B6';
    }
    else if (objRegExp.test(val) == false && (trim(val) != '' || val.length !== 0)) {
        document.getElementById(field).style.border = '1px solid #ff0000';
        check_fields = check_fields && false;
    }
    else {
        document.getElementById(field).style.border = '1px solid #B6B6B6';
    }


}

function exchange_rate_validation(field) {
    required_validation(field);
    val = document.getElementById(field).value;
    var objRegExp = /(?!^0*$)(?!^0*\.0*$)^\d*[0-9](\.\d*[0-9])?$/;
    if (objRegExp.test(val) == false && (trim(val) != '' || val.length !== 0)) {
        document.getElementById(field).style.border = '1px solid #ff0000';
        check_fields = check_fields && false;
    }

}





function dropdown_validation_check(field) {

    val = document.getElementById(field).selectedIndex;
    if (val == 0) {
        document.getElementById(field).style.border = '1px solid #ff0000';
        check_fields = check_fields && false;
    }
    else {
        document.getElementById(field).style.border = '1px solid #B6B6B6';

    }
}



/*travel prefix id validattion*/
function prefix_text_validation(field) {

    val = document.getElementById(field).value;
    if (val.trim() == '' || val.length <= 0 || val.length > 4) {
        document.getElementById(field).style.border = '1px solid #ff0000';
        check_fields = check_fields && false;
    }
    else {
        document.getElementById(field).style.border = '1px solid #B6B6B6';

    }
}
/* Imgage validation */
function image_type_validation(field) {

    //if (document.getElementById(field).value != '') {
    var reg = /^.+(.jpg|.JPG|.PNG|.png|.gif|.GIF|.bmp|.BMP|.jpeg|.JPEG)$/;
    val = document.getElementById(field).value;

    if (val.trim() == '' || val.trim() == null) {
        document.getElementById(field).style.border = '1px solid #ff0000';
        if (document.getElementById(field + "_error") != undefined)
            document.getElementById(field + "_error").className = "nameInfo error";
        check_fields = check_fields && false;
    }
    else if (reg.test(val) == false) {
        document.getElementById(field).style.border = '1px solid #ff0000';
        if (document.getElementById(field + '_type_error')) {
            document.getElementById(field + '_type_error').style.display = 'block'
            document.getElementById(field + '_type_error').innerHTML = 'Please attach  .xls file type only';
        }
        check_fields = check_fields && false;
    }
    else {
        document.getElementById(field).style.border = '1px solid #B6B6B6';
        if (document.getElementById(field + '_type_error')) {
            document.getElementById(field + '_type_error').style.display = 'none'
        }

    }
}

/* Alphanumeric validation */
function alphanumeric_validation(field) {
    //&& (/\d{1}[A-z]|[A-z]{1}\d/.test(val))
    var val = document.getElementById(field).value;
    document.getElementById(field).value = trim(document.getElementById(field).value);
    if (trim(val) == '' || val.length == 0) {

        document.getElementById(field).style.border = '1px solid #ff0000';
        check_fields = check_fields && false;

    }
    else if ((document.getElementById(field).value.search(/[^a-zA-Z0-9 ]/g) == -1)) {

        document.getElementById(field).style.border = '1px solid #B6B6B6';
    }
    else {

        document.getElementById(field).style.border = '1px solid #ff0000';
        check_fields = check_fields && false;
    }

}
/* file formate validation */
function report_file_validation(field, msg, error_msg, adv_error_msg) {
    if (document.getElementById(field) != null) {

        //if (document.getElementById(field).value != '') {
        var reg = /^.+(.jpg|.JPG|.PNG|.png|.gif|.GIF|.bmp|.BMP|.jpeg|.JPEG|.doc|.zip|.ZIP|.pdf|.PDF|.doc|.DOC)$/;
        val = document.getElementById(field).value;
        if (document.getElementById(field + "_error") != null) {

            if (reg.test(val) == false) {

                document.getElementById(field + "_error").className = "error-message";
                if (document.getElementById(field + '_error')) {


                    document.getElementById(field + "_error").className = "error-message";
                    document.getElementById(field + '_error').innerHTML = error_msg;
                }
                check_fields = check_fields && false;
            }
            else {
                document.getElementById(field + "_error").innerHTML = "";
                if (document.getElementById(field + '_error')) {
                    document.getElementById(field + "_error").className = "";
                }

            }
        }
    }
}
/* pdf file formate validations */
function pdf_file_validtion_optional(field) {
    //if (document.getElementById(field).value != '') {
    var reg = /^.+(.pdf|.PDF)$/;
    val = document.getElementById(field).value;

    if (trim(val) == '' || trim(val) == null) {
        check_fields = check_fields && false;
    }
    else if (reg.test(val) == false) {
        document.getElementById(field).style.border = '1px solid #ff0000';
        if (document.getElementById(field + '_type_error')) {

            document.getElementById(field + '_type_error').style.display = 'block'
            document.getElementById(field + '_type_error').innerHTML = 'Please attach  .pdf file type only';
        }
        check_fields = check_fields && false;
    }
    else {
        document.getElementById(field).style.border = '1px solid #B6B6B6';
        if (document.getElementById(field + '_type_error')) {
            document.getElementById(field + '_type_error').style.display = 'none'
        }

    }
}
function not_required_validation(field) {
    document.getElementById(field).style.border = '1px solid #B6B6B6';
}
/* pdf file formate validations */
function pdf_file_validtion(field) {
    //if (document.getElementById(field).value != '') {
    var reg = /^.+(.pdf|.PDF)$/;
    val = document.getElementById(field).value;

    if (trim(val) == '' || trim(val) == null) {
        document.getElementById(field).style.border = '1px solid #ff0000';
        if (document.getElementById(field + '_type_error')) {

            document.getElementById(field + '_type_error').style.display = 'block'
            document.getElementById(field + '_type_error').innerHTML = 'Please select file';
        }
        check_fields = check_fields && false;
    }
    else if (reg.test(val) == false) {
        document.getElementById(field).style.border = '1px solid #ff0000';
        if (document.getElementById(field + '_type_error')) {

            document.getElementById(field + '_type_error').style.display = 'block'
            document.getElementById(field + '_type_error').innerHTML = 'Please attach  .pdf file type only';
        }
        check_fields = check_fields && false;
    }
    else {
        document.getElementById(field).style.border = '1px solid #B6B6B6';
        if (document.getElementById(field + '_type_error')) {
            document.getElementById(field + '_type_error').style.display = 'none'
        }

    }
}
/*travel prefix id validattion*/
function prefix_text_validation(field) {
    val = document.getElementById(field).value;
    if (trim(val) == '' || val.length <= 0 || val.length > 4) {
        document.getElementById(field).style.border = '1px solid #ff0000';
        return 0;
    }
    else {
        document.getElementById(field).style.border = '1px solid #B6B6B6';
        return 1
    }
}
/* compare two dates validations */
function compare_date_validation(field) {

    var date = field.split("-");

    var date1 = document.getElementById(date[0]).value.split("/");
    var date2 = document.getElementById(date[1]).value.split("/");
    required_validation(date[0]);
    required_validation(date[1]);
    b = Date.parse(date1[1] + '/' + date1[0] + '/' + date1[2]);
    e = Date.parse(date2[1] + '/' + date2[0] + '/' + date2[2]);

    if (b >= e) {
        document.getElementById(date[1]).style.border = '1px solid #ff0000';
        check_fields = check_fields && false;
    }
    else if (b < e) {
        document.getElementById(date[1]).style.border = '1px solid #B6B6B6';
    }
}
/* compare two dates validations */
function compare_date_equal_validation(field) {

    var date = field.split("-");
    var date1 = document.getElementById(date[0]).value.split("/");
    var date2 = document.getElementById(date[1]).value.split("/");
    required_validation(date[0]);
    required_validation(date[1]);
    b = Date.parse(date1[1] + '/' + date1[0] + '/' + date1[2]);
    e = Date.parse(date2[1] + '/' + date2[0] + '/' + date2[2]);

    if (b > e) {
        document.getElementById(date[1]).style.border = '1px solid #ff0000';
        check_fields = check_fields && false;
    }
    else if (b <= e) {
        document.getElementById(date[1]).style.border = '1px solid #B6B6B6';
    }
}