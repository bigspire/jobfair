{*
 * This is a pop up file for display pop up page.
 * @copyright     Copyright 2016, BigSpire Software (P) Ltd
 * @author        Nikita
 * @created       22-11-2016
 * @link          http://jobsfactory.in *}
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Bootstrap -->
    <link href="{$url}bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="{$url}css/popup.css" rel="stylesheet">
	<link href="{$url}css/jquery.bxslider.css" rel="stylesheet">
	

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  
  <div align="center" style="margin-top:10px;">
<div id="bx-pager2" class="bx-pager2">
{foreach from=$fair_data item=item key=key}
  {if $item.company_name}
<span class="bx-pager-item" style="margin:10px;font-size:17px;">
<a href="" data-slide-index="{$key}" class="bx-pager-link">{$item.company_name|ucwords}</a>
</span>
{/if}
{/foreach}
</div>
</div>

  <div class="slider1"> 
  {foreach from=$fair_data item=item key=key}
  {if $item.company_name}
	<div class="slide container">
      <!-- Example row of columns -->	 
	 <div class="row">
	   <!-- Partner logo -->
	   {if $item.client_logo}   
		
		<!-- No partner logo -->
		<div class="col-sm-11" style="text-align:center">		
		<div class="compLogo">
		<img src="{$url}admin/timthumb.php?src=uploads/req_logo/{$item.client_logo}&h=70&q=100">
        </div>		        
        </div>
        {/if}
	
	
	   </div>
	  
	  <div class="row" style="text-align:center;">
	  <div class="col-sm-11">
	  <h2><span class="jobfair_title" style="clear:both;width:">{$item.position}, {$item.work_loc}</span></h2>
          <p class="fair_desc">{$item.description} </p>
	  </div>
	  </div>
	  
	  
      <div class="row">
        <div class="col-sm-4" style="z-index:-99;position:absolute;opacity:0.1;left:40%;top:15%;border:0px solid red;margin-top:;">
          <img src="{$url}images/pop_img2.jpg" >
        </div>
        <div class="col-sm-4 rightBar">
          <h2>Pre-Register</h2>
       <form action="{$url}registration/" onsubmit="return validate_form()" method="post" class="theForm form-prereg">
        <label for="inputEmail" class="sr-only">Full Name</label>
        <input type="text" name="full_name" required value="{$name}" id="inputEmail" class="full_name form-control" placeholder="Full Name" autofocus="">
        <label for="inputPassword" class="sr-only">Email Address</label>
        <input type="text" name="email" required value="{$email}" id="inputPassword" class="email form-control" placeholder="Email Address">   
	<label for="inputPassword" class="sr-only">Mobile No.</label>
        <input type="text" name="mobile" required value="{$mobile}" id="inputPassword" class="mobile form-control" placeholder="Mobile No.">    		
       <input type="submit" class="btn btn-warning regBtn"   id="close_modal" value="Submit">
      </form>
       
         <!-- <p><a class="btn btn-warning regBtn" href="#" role="button">Submit &raquo;</a>
		 </p>-->
        </div>
		 <div class="col-sm-4 rightBar">
          <h2>Venue</h2>
          <p>{$item.venue|nl2br} <br>
		  
		  Contact Email: {$item.email_address}

		  Contact No: {$item.contact_no}<br>
		  </p>
		  <h2>Date</h2>
          <p>{$item.drive_date|date_format}<br>
		  Timing: 09:00 AM Onwards </p>
		 
		
		 
          <!--p  style="margin-top:20px;"><a class="btn btn-info" href="#" role="button">Show Direction &raquo;</a></p-->
       </div>
	   
	   <div class="col-sm-4">
	   
	   {if $item.position neq ''}
		
		<div>
				  <h2><span class="">Drive Gallery</span></h2>

		 <p>{include file='../include/popup_drives.tpl'}</p>
		</div>
		 {/if}
		 
		 
          <!--p style="margin-top:25px;"><a class="btn btn-primary" href="#" role="button">View All &raquo;</a></p-->
       </div>
	   

      </div>
	
<div class="row">  
	  
	   <div class="col-sm-4">
	   
	    <h2>Job Description</h2>
		<p>
		  No. of Openings: {$item.no_vacancy}</p>
		  <p>
		  Qualifiation: {$item.qualification}</p>
		   <p>
		  Salary: {$item.salary}</p>
		  
	   </div>
		 <div class="col-sm-8">
		 
		  <h2>About {$item.company_name}</h2>
		<p>{$item.company_name}</p>
		
		
	   </div>
	   
		  
    </div>
	 
	<!--div class="row">
        <div class="col-sm-12">
          <!--h2><span class="">Note *</span></h2-->
		  <!--h2>Eligibility</h2>
          <br><p>{$item.eligibility|nl2br} </p>
          <p>{$item.others|nl2br}</p-->
		 <!--p><a class="btn  btn-warning" href="#" role="button">View more details &raquo;</a></p>
		  </ul>
	  </div>
		 
      </div-->
	<input type="hidden" value="{$item.id}" id="jobfair_{$key}">
	</div>
	
	{/if}
	{/foreach}
	
	
	</div>		
	
	
	<input type="hidden" value="{$url}registration/" class="redirect_url"/>	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{$url}bootstrap/js/bootstrap.min.js"></script>
	<!--script src="{$url}bootstrap/js/jquery.validate-1.14.0.min.js"></script-->
	<!--script src="{$url}bootstrap/js/jquery-validate.bootstrap-tooltip.min.js"></script-->
	<script src="{$url}js/jquery.bxslider.min.js"></script>

	
{if $key gt '1'}
{literal}
<script type="text/javascript">
$(document).ready(function(){
		  $('.slider1').bxSlider({
			minSlides: 1,
			slideMargin: 10,
			auto:true,
			autoHover:true,
			controls:false,
			pager:true,
			pagerCustom: '#bx-pager2',
			// adaptiveHeight: true,
			onSlideNext: function(){
			// do mind-blowing JS stuff here
			// alert('A slide has finished transitioning. Bravo. Click OK to continue!');
			// validate_form();
		  },
			/*
			,
		  onSliderLoad: function(){
			// do mind-blowing JS stuff here
			// alert('A slide has finished transitioning. Bravo. Click OK to continue!');
			validate_form();
		  },
		  onSlideAfter: function(){
			// do mind-blowing JS stuff here
			// alert('A slide has finished transitioning. Bravo. Click OK to continue!');
			validate_form();
		  },
		  onSlidePrev: function(){
			// do mind-blowing JS stuff here
			// alert('A slide has finished transitioning. Bravo. Click OK to continue!');
			validate_form();
		  }
		  ,
		  onSlideNext: function(){
			// do mind-blowing JS stuff here
			// alert('A slide has finished transitioning. Bravo. Click OK to continue!');
			validate_form();
		  } ,
		  onSlideBefore: function(){
			// do mind-blowing JS stuff here
			// alert('A slide has finished transitioning. Bravo. Click OK to continue!');
			validate_form();
		  }
		  */
		 }); 
		  
	});
	
</script>
{/literal}
{/if}	
{literal}
<script type="text/javascript">
	/* function to validate the form */
	function validate_form(){ 
		/*
		$(this).validate({
		rules: {
			email: {email:true, required: true},
			full_name: {required: true},
			mobile: {required: true}
		},
		messages: {
			mobile: "Required!",
			full_name: "Required!",
			email: "Required!"
		},
		tooltip_options: {
			// example4: {trigger:'focus'},
			email: {placement:'right',html:true,trigger:'focus'},
			full_name: {placement:'right',html:true,trigger:'focus'},
			mobile: {placement:'right',html:true,trigger:'focus'}
		},		
		submitHandler: function(form) {
			self.parent.location.href = jQuery('.redirect_url').val()+'?name='+$('.full_name').val()+'&email='+$('.email').val()
			+'&mobile='+$('.mobile').val();
			parent.jQuery(".modalCloseImg").click();
			close_popup();
		}
		});	
		*/
		// validate the 3 form fields
		//full_name = $('.full_name').eq(1).val() ? $('.full_name').eq(1).val() : $('.full_name').eq(2).val();
		//email = $('.email').eq(1).val() ? $('.email').eq(1).val() : $('.email').eq(2).val();
		//phone = $('.mobile').eq(1).val() ? $('.mobile').eq(1).val() : $('.mobile').eq(2).val();
		//fair = $('.mobile').eq(1).val() ? $('#jobfair_0').val() : $('#jobfair_1').val();
		full_name = $('.full_name').val()
		email = $('.email').val();
		phone = $('.mobile').val() ;
		fair = $('#jobfair_0').val();
		if(full_name != '' && email != '' && phone != ''){ 
			self.parent.location.href = jQuery('.redirect_url').val()+'?name='+full_name+'&email='+email+'&fair='+fair
			+'&mobile='+phone;
			parent.jQuery(".modalCloseImg").click();
			close_popup();
		 }
	}
	
	$(".change_job").click(function(){
		// self.parent.location.href = $(this).attr('rel');
		window.open($(this).attr('rel'), '', '');
 	   return false;
	});
		
		

$(document).ready(function(){		
		
		  
		  $('.slider3').bxSlider({
			slideWidth: 250,
			minSlides: 1,
			maxSlides: 1,
			slideMargin: 10,
			auto:true,
			controls:false,
			autoHover:true,
			speed:1000,
			pager:false
		  });
		  // set the height of the bxslider for showing dots
		  // $('.bx-viewport').eq(0).css('height', '420px');
		  $('.bx-viewport').eq(2).css('height', '130px');
		  // $.fn.cycle.defaults.autoSelector = '.slideshow';
		});
</script>
<style type="text/css">
p{margin:0 0 5px}
</style>
{/literal}

</body>




</html>