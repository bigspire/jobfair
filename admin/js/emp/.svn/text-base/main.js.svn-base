/*
 * 
 * Online CV Project
 * @author Marius Hogas
 * @email mhogas@gmail.com
 * 
 */
 
 $(function() {
	$("select, .check, .check :checkbox, input:radio, input:file").uniform();
 });

  $(function() {
// Dropdown
   if(jQuery.isFunction(jQuery.fn.dropdown) == true){
		$('.dropdown-toggle').dropdown();	
   }
 });	
			var modal = (function(){
				var 
				method = {},
				$overlay,
				$modal,
				$content,
				$close;

				// Center the modal in the viewport
				method.center = function () {
					var top, left;

					top = Math.max($(window).height() - $modal.outerHeight(), 0) / 2;
					left = Math.max($(window).width() - $modal.outerWidth(), 0) / 2;

					$modal.css({
						top:top + $(window).scrollTop(), 
						left:left + $(window).scrollLeft()
					});
				};

				// Open the modal
				method.open = function (settings) {
					$content.empty().append(settings.content);

					$modal.css({
						width: settings.width || 'auto', 
						height: settings.height || 'auto'
					});

					method.center();
					$(window).bind('resize.modal', method.center);
					$modal.show();
					$overlay.show();
				};

				// Close the modal
				method.close = function () {
					$modal.hide();
					$overlay.hide();
					$content.empty();
					$(window).unbind('resize.modal');
				};

				// Generate the HTML and add it to the document
				$overlay = $('<div id="overlay"></div>');
				$modal = $('<div id="modal"></div>');
				$content = $('<div id="modal_content"></div>');
				$close = $('<a id="close" href="#">close</a>');

				$modal.hide();
				$overlay.hide();
				$modal.append($content, $close);

				$(document).ready(function(){
					$('body').append($overlay, $modal);						
				});

				$close.click(function(e){
					e.preventDefault();
					method.close();
				});

				return method;
			}());

			 // Wait until the DOM has loaded before querying the document
			$(document).ready(function(){

				$('a.change_password').click(function(e){ 
					modal.open({content: '<div class="widget"><div class="body"><div class="messageTo"><a href="#" title="" class="uName"><img src="images/live/face3.png" alt="" /></a><span> Change Password for <strong>suresh</strong></span> </div><div class="formRow fluid"><div class="grid5"> <label>New Password:</label><div class="clear"></div><input type="password" class="error" name="password" placeholder="********"><label class="error" generated="true" for="bazinga">Please enter the password</label></div><div class="grid5"> <label>New Password:</label><div class="clear"></div><input type="password" class="error" name="password" placeholder="********"><label class="error" generated="true" for="bazinga">Please enter the confirm password</label></div> <div class="clear"></div> </div><div class="mesControls"><div class="sendBtn sendwidget"><input type="submit" name="submit" class="buttonM bLightBlue" value="Submit" /></div><div class="clear"></div></div></div></div>'});
					e.preventDefault();
				});
				
				
			}); 
			
	
			/* $(document).ready(function(){
				var myHilitor = new Hilitor("Keyword"); 
				myHilitor.apply("2011 freshers engineers category");
				$(".offMode").click(function(){
				myHilitor.remove();
				$(".offMode").toggle();
				$(".onMode").toggle();
				});
				$(".onMode").click(function(){
				myHilitor.apply("2011 freshers engineers category");
				$(".offMode").toggle();
				$(".onMode").toggle();
				});
			}); */
			
	jQuery(document).ready(function(){
		/* function to show the alert message for single record delete */
		$(".bConfirm").click( function() {
			id = this.id;	
			jConfirm('Are you sure you want to delete?', 'Confirmation!', function(r) {
			if(r){	
				var webroot = jQuery("#webroot").val();
				//alert(webroot+'delete/'+id);
				document.searchFrm.action = webroot+'delete/'+id;
				document.searchFrm.submit();				
			}
		});
	});
			
	$(".bInactive").click( function() {
		id = this.id;
		status = 1;
		jConfirm('Are you sure you want to inactive?', 'Confirmation!', function(r) {
			if(r){	
				var webroot = jQuery("#webroot").val();
				//alert(webroot+'delete/'+id);
				document.searchFrm.action = webroot+'update_status/'+id+'/'+status;
				document.searchFrm.submit();				
			}
		});		
	});
	$(".nSuccess").click(function(){
		$(".nSuccess").slideToggle("slow");
		});
	});
		
		
	/* function to select/deselect check boxes in list page */ 
	$(document).ready(function() {  
		// when the user clicks on the check box	
		$("#chkMul").click( function() {
		alert("sdfsd");
			hdn_status = $("#chk_status").attr('value');
			alert(hdn_status);
			hdn_status == 0 ? $("#chk_status").val(1) : $("#chk_status").val(0);
			$("input[name='chk[]']").each(function() {
				this.checked = hdn_status  == 0 ? true : false
			});
		});
	});
	
	/* function to process the search form */
function submit_search(frm, module){
	location.href = frm.webroot.value+'?'+load_module_vars(module, frm);
	return false;
}
/* function to load the module variables */
function load_module_vars(m, frm){
	switch(m){
		case 'company_user':
		search = (frm.search.value == 'type to filter...') ? '' : frm.search.value;
		status = (frm.status.value == '') ? 2 : frm.status.value;
		no_of_records = (frm.no_of_records.value == '') ? 10 : frm.no_of_records.value;
		vars = 'search='+search+'&status='+status+'&no_of_records='+no_of_records;
		break;
	}
	return vars;
}

function reset(frm){
	location.href = frm.webroot.value;
	return true;
}