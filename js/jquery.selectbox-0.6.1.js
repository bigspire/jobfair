/**
 * jQuery custom selectboxes
 * 
 * Copyright (c) 2008 Krzysztof Suszyński (suszynski.org)
 * Licensed under the MIT License:
 * http://www.opensource.org/licenses/mit-license.php
 *
 * @version 0.6.1
 * @category visual
 * @package jquery
 * @subpakage ui.selectbox
 * @author Krzysztof Suszyński <k.suszynski@wit.edu.pl>
**/
var i = 1;
var replacement_focus = '';
var dont_click = '';
jQuery.fn.selectbox = function(options) { 
    /* Default settings */
	if(options == undefined){ options = 'jquery-selectbox';} 
    var settings = {
		className: options,
        animationSpeed: "Normal",
        listboxMaxSize: 10,
        replaceInvisible: false
    };

    var commonClass = 'jquery-custom-selectboxes-replaced';
    var listOpen = false;
    var showList = function(listObj) {
        var selectbox = listObj.parents('.' + settings.className + '');
        listObj.slideDown(settings.animationSpeed, function() {
            listOpen = true;
			
        });
        selectbox.addClass('selecthover');
        jQuery(document).bind('click', onBlurList);
        return listObj;
    }
    var hideList = function(listObj) {
        var selectbox = listObj.parents('.' + settings.className + '');
        listObj.slideUp(settings.animationSpeed, function() {
            listOpen = false;
            jQuery(this).parents('.' + settings.className + '').removeClass('selecthover');
        });
        jQuery(document).unbind('click', onBlurList);
        return listObj;
    }
    var onBlurList = function(e) {
        var trgt = e.target;
        var currentListElements = jQuery('.' + settings.className + '-list:visible').parent().find('*').andSelf();
        if (jQuery.inArray(trgt, currentListElements) < 0 && listOpen) {
            hideList(jQuery('.' + commonClass + '-list'));
        }

        return false;
    }
	
    /* Processing settings */
    settings = jQuery.extend(settings, options || {});

    /* Wrapping all passed elements */
    return this.each(function() {

        var _this = jQuery(this);
	
        /*if (_this.filter(':visible').length == 0 && !settings.replaceInvisible)
            return;*/
		
        // modified by ravi for language drop down in the header	
        if (i == 1) { langClass = 'jquery-lang-select'; } else { langClass = ''; } i++;
        var replacement = jQuery(
			'<div class="' + settings.className + ' ' + commonClass + ' ' + langClass + '">' +
				'<div class="' + settings.className + '-moreButton" />' +
				'<div class="' + settings.className + '-list ' + commonClass + '-list" />' +
				'<span class="' + settings.className + '-currentItem auto_dropdown" />' +
			'</div>'
		);
        jQuery('option', _this).each(function(k, v) {
            var v = jQuery(v);
            var listElement = jQuery('<span class="' + settings.className + '-item value-' + v.val() + ' item-' + k + '"><a  tabindex="-1" style="color:#414141" href="javascript:void(0);">' + v.text() + '<a/></span>');
            listElement.click(function() {
			
	           var thisListElement = jQuery(this);
                var thisReplacment = thisListElement.parents('.' + settings.className);
                var thisIndex = thisListElement[0].className.split(' ');
                for (k1 in thisIndex) {
                    if (/^item-[0-9]+$/.test(thisIndex[k1])) {
                        thisIndex = parseInt(thisIndex[k1].replace('item-', ''), 10);
                        break;
                    }
                };
                var thisValue = thisListElement[0].className.split(' ');
                for (k1 in thisValue) {
                    if (/^value-.+$/.test(thisValue[k1])) {
                        thisValue = thisValue[k1].replace('value-', '');
                        break;
                    }
                };
                thisReplacment
					.find('.' + settings.className + '-currentItem')
					.html("<a href='javascript:void(0);'  style='color:#414141'>"+thisListElement.text()+"</a>");
                var dd = (thisReplacment).find('select');
                var options = $('option', dd);
				if(jQuery("#"+dd.attr("id")+"_name").length > 0)
					jQuery("#"+dd.attr("id")+"_name").val(thisListElement.text());
				else{
					jQuery("#"+dd.attr("id")).after("<input type='hidden' not_consider='not_consider' value='"+thisListElement.text()+"' id='"+ dd.attr("id") +"_name' name='"+ dd.attr("id") +"_name'/>");
				}				
                options.each(function(i) {
                    
                    if ($(this).text() == thisListElement.text()) {
                        $(this).attr("selectedIndex", i);
						$(this).attr("selected", "selected");
                    } else {
                        $(this).removeAttr("selectedindex");
						$(this).removeAttr("selected");
                    }

                });
                thisReplacment
					.find('select')
					.val(thisValue)
					.triggerHandler('change');
                var thisSublist = thisReplacment.find('.' + settings.className + '-list');
                if (thisSublist.filter(":visible").length > 0) {
                    hideList(thisSublist);
                } else {
                    showList(thisSublist);
                }
            }).bind('mouseenter', function() {
                jQuery(this).addClass('listelementhover');
            }).bind('mouseleave', function() {
                jQuery(this).removeClass('listelementhover');
            });
            jQuery('.' + settings.className + '-list', replacement).append(listElement);
            if (v.filter(':selected').length > 0) {
                jQuery('.' + settings.className + '-currentItem', replacement).html("<a href='javascript:void(0);'  style='color:#414141'>"+v.text()+"</a>");
            }
        });
		
		replacement.click(function(event,hide_focus) {

			var thisMoreButton = jQuery(this).find('.' + settings.className + '-moreButton');
            var otherLists = jQuery('.' + settings.className + '-list')
				.not(thisMoreButton.siblings('.' + settings.className + '-list'));
            hideList(otherLists);
            var thisList = thisMoreButton.siblings('.' + settings.className + '-list');
			
			if (thisList.filter(":visible").length > 0  && hide_focus == undefined) {
				hideList(thisList);
			}
			else{
				showList(thisList);
				if(hide_focus != 'hide_focus'){
					jQuery(this).find(".auto_dropdown a").trigger("focus",['show_focus']);
				}	
			}
			
        }).bind('mouseenter', function() {
            jQuery(this).addClass('morebuttonhover');
        }).bind('mouseleave', function() {
            jQuery(this).removeClass('morebuttonhover');
        });
        _this.hide().replaceWith(replacement).appendTo(replacement);
        var thisListBox = replacement.find('.' + settings.className + '-list');
        var thisListBoxSize = thisListBox.find('.' + settings.className + '-item').length;
        if (thisListBoxSize > settings.listboxMaxSize)
            thisListBoxSize = settings.listboxMaxSize;
        if (thisListBoxSize == 0)
            thisListBoxSize = 1;
        var thisListBoxWidth = Math.round(_this.width() + 5);
        if (jQuery.browser.safari)
            thisListBoxWidth = thisListBoxWidth;
        //		replacement.css('width', 300 + 'px');
        //		thisListBox.css({
        //		    width: Math.round(299) + 'px'
        //            //,height: thisListBoxSize + 'em'
        //		});
    });
}
jQuery.fn.unselectbox = function(){
	var commonClass = 'jquery-custom-selectboxes-replaced';
	return this.each(function() {
		var selectToRemove = jQuery(this).filter('.' + commonClass);
		selectToRemove.replaceWith(selectToRemove.find('select').show());		
	});
}