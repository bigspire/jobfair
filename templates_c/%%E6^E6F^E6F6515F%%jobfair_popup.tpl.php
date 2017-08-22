<?php /* Smarty version 2.6.26, created on 2017-08-22 15:16:18
         compiled from jobfair_popup.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'ucwords', 'jobfair_popup.tpl', 35, false),array('modifier', 'truncate', 'jobfair_popup.tpl', 35, false),array('modifier', 'nl2br', 'jobfair_popup.tpl', 109, false),array('modifier', 'date_format', 'jobfair_popup.tpl', 113, false),)), $this); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Bootstrap -->
    <link href="<?php echo $this->_tpl_vars['url']; ?>
bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo $this->_tpl_vars['url']; ?>
css/popup.css" rel="stylesheet">
	<link href="<?php echo $this->_tpl_vars['url']; ?>
css/jquery.bxslider.css" rel="stylesheet">
	

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
<?php $_from = $this->_tpl_vars['fair_data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
  <?php if ($this->_tpl_vars['item']['title']): ?>
<span class="bx-pager-item" style="margin:10px;font-size:17px;">
<a href="#" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['title'])) ? $this->_run_mod_handler('ucwords', true, $_tmp) : ucwords($_tmp)); ?>
" data-slide-index="<?php echo $this->_tpl_vars['key']; ?>
" class="bx-pager-link"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['title'])) ? $this->_run_mod_handler('ucwords', true, $_tmp) : ucwords($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 15) : smarty_modifier_truncate($_tmp, 15)); ?>
</a>
</span>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
</div>
</div>

  <div class="slider1"> 
  <?php $_from = $this->_tpl_vars['fair_data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
  <?php if ($this->_tpl_vars['item']['title']): ?>
	<div class="slide container">
      <!-- Example row of columns -->	 
	 <div class="row">
	   <!-- Partner logo -->
	   <?php if ($this->_tpl_vars['item']['partner_logo']): ?>
        <div class="col-sm-11" style="text-align:center">		
		<div class="col-sm-4 compLogo" style="margin-left:70px;">
		<img src="<?php echo $this->_tpl_vars['url']; ?>
/images/popup/jobsfactory_logo.png">
        </div>
		<div class="col-sm-1 amper">&</div>
		<div class="col-sm-4 colLogo">
		<!-- height should be 40px -->
		<img src="<?php echo $this->_tpl_vars['url']; ?>
admin/timthumb.php?src=uploads/<?php echo $this->_tpl_vars['item']['partner_logo']; ?>
&h=70&q=100">
		</div>        
        </div>
        <?php else: ?>
		
		<!-- No partner logo -->
		<div class="col-sm-11" style="text-align:center">		
		<div class="compLogo">
		<img src="<?php echo $this->_tpl_vars['url']; ?>
/images/popup/jobsfactory_logo.png">
        </div>		        
        </div>
        <?php endif; ?>
	
	
	   </div>
	  
	  <div class="row" style="text-align:center;">
	  <div class="col-sm-11">
	  <h2><span class="jobfair_title" style="clear:both;width:"><?php echo $this->_tpl_vars['item']['title']; ?>
</span></h2>
          <p class="fair_desc"><?php echo $this->_tpl_vars['item']['description']; ?>
 </p>
	  </div>
	  </div>
	  
	  
      <div class="row">
        <div class="col-sm-4" style="z-index:-99;position:absolute;opacity:0.1;left:40%;top:15%;border:0px solid red;margin-top:;">
          <img src="<?php echo $this->_tpl_vars['url']; ?>
images/pop_img2.jpg" >
        </div>
        <div class="col-sm-4 rightBar">
          <h2>Pre-Register</h2>
       
	   <form action="<?php echo $this->_tpl_vars['url']; ?>
registration/" rel="<?php echo $this->_tpl_vars['key']; ?>
"  onsubmit="return validate_form(<?php echo $this->_tpl_vars['key']; ?>
)" method="post" class="theForm form-prereg">
        <label for="inputEmail" class="sr-only">Full Name</label>
        <input type="text" name="full_name" required value="<?php echo $this->_tpl_vars['name']; ?>
" id="inputEmail" class="full_name form-control" placeholder="Full Name" autofocus="">
        <label for="inputPassword" class="sr-only">Email Address</label>
        <input type="text" name="email" required value="<?php echo $this->_tpl_vars['email']; ?>
" id="inputPassword" class="email form-control" placeholder="Email Address">   
	<label for="inputPassword" class="sr-only">Mobile No.</label>
	<input type="text" name="mobile" required value="<?php echo $this->_tpl_vars['mobile']; ?>
" id="inputPassword" class="mobile form-control" placeholder="Mobile No.">    		
 
      	<input type="hidden" class="jobfair" value="<?php echo $this->_tpl_vars['item']['id']; ?>
" id="jobfair_<?php echo $this->_tpl_vars['key']; ?>
">

		<input type="submit" onclick="return validate_form(<?php echo $this->_tpl_vars['key']; ?>
)" rel="<?php echo $this->_tpl_vars['key']; ?>
"  class="btn btn-warning regBtn"   id="close_modal" value="Submit">
      </form>
	  
        <h2>Eligibility</h2>
	<p>Any degree, 10th, 12th, Diploma, ITI
  </p>
         <!-- <p><a class="btn btn-warning regBtn" href="#" role="button">Submit &raquo;</a>
		 </p>-->
        </div>
		 <div class="col-sm-4 rightBar">
          <h2>Venue</h2>
          <p><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['venue'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
 <br>
		  Contact No. - 9600776677<br>
		  </p>
		  <h2>Date</h2>
          <p><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['jobfair_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>
<br>
		  Timing: 09:00 AM Onwards </p>
		
          <!--p  style="margin-top:20px;"><a class="btn btn-info" href="#" role="button">Show Direction &raquo;</a></p-->
       </div>
	   
	   <div class="col-sm-4">
	   
	   <?php if ($this->_tpl_vars['data'] != ''): ?>
          <?php if ($this->_tpl_vars['recent'] == 1): ?>
		  <h2><span class="">Participating Companies..</span></h2>
          <?php elseif ($this->_tpl_vars['recent'] == 2): ?>
          <h2><span class="">Last Jobfair Companies..</span></h2>
		  <?php endif; ?>
          <p><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => '../include/popup_company.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></p>
		 <?php endif; ?>
		
		<div>
		 <p><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => '../include/popup_gallery.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></p>
		</div>
		
          <!--p style="margin-top:25px;"><a class="btn btn-primary" href="#" role="button">View All &raquo;</a></p-->
       </div>
	   

      </div>
	  
	 
<!--div class="row">
        <div class="col-sm-12">
          <!--h2><span class="">Note *</span></h2-->
		  <!--h2>Eligibility</h2>
          <br><p><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['eligibility'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
 </p>
          <p><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['others'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</p-->
		 <!--p><a class="btn  btn-warning" href="#" role="button">View more details &raquo;</a></p>
		  </ul>
		  </div>
		 
      </div-->
	</div>
	<?php endif; ?>
	<?php endforeach; endif; unset($_from); ?>
	
	
	</div>		
	
	
	<input type="hidden" value="<?php echo $this->_tpl_vars['url']; ?>
registration/" class="redirect_url"/>	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo $this->_tpl_vars['url']; ?>
bootstrap/js/bootstrap.min.js"></script>
	<!--script src="<?php echo $this->_tpl_vars['url']; ?>
bootstrap/js/jquery.validate-1.14.0.min.js"></script-->
	<!--script src="<?php echo $this->_tpl_vars['url']; ?>
bootstrap/js/jquery-validate.bootstrap-tooltip.min.js"></script-->
	<script src="<?php echo $this->_tpl_vars['url']; ?>
js/jquery.bxslider.min.js"></script>

	
<?php if ($this->_tpl_vars['key'] > '1'): ?>
<?php echo '	
<script type="text/javascript">
$(document).ready(function(){
		  $(\'.slider1\').bxSlider({
			minSlides: 1,
			slideMargin: 10,
			auto:true,
			autoHover:true,
			controls:false,
			pager:true,
			pagerCustom: \'#bx-pager2\',
			// adaptiveHeight: true,
			onSlideNext: function(){
			// do mind-blowing JS stuff here
			// alert(\'A slide has finished transitioning. Bravo. Click OK to continue!\');
			// validate_form();
		  },
			/*
			,
		  onSliderLoad: function(){
			// do mind-blowing JS stuff here
			// alert(\'A slide has finished transitioning. Bravo. Click OK to continue!\');
			validate_form();
		  },
		  onSlideAfter: function(){
			// do mind-blowing JS stuff here
			// alert(\'A slide has finished transitioning. Bravo. Click OK to continue!\');
			validate_form();
		  },
		  onSlidePrev: function(){
			// do mind-blowing JS stuff here
			// alert(\'A slide has finished transitioning. Bravo. Click OK to continue!\');
			validate_form();
		  }
		  ,
		  onSlideNext: function(){
			// do mind-blowing JS stuff here
			// alert(\'A slide has finished transitioning. Bravo. Click OK to continue!\');
			validate_form();
		  } ,
		  onSlideBefore: function(){
			// do mind-blowing JS stuff here
			// alert(\'A slide has finished transitioning. Bravo. Click OK to continue!\');
			validate_form();
		  }
		  */
		 }); 
		  
	});
	
</script>
'; ?>

<?php endif; ?>	
<?php echo '
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
			// example4: {trigger:\'focus\'},
			email: {placement:\'right\',html:true,trigger:\'focus\'},
			full_name: {placement:\'right\',html:true,trigger:\'focus\'},
			mobile: {placement:\'right\',html:true,trigger:\'focus\'}
		},		
		submitHandler: function(form) {
			self.parent.location.href = jQuery(\'.redirect_url\').val()+\'?name=\'+$(\'.full_name\').val()+\'&email=\'+$(\'.email\').val()
			+\'&mobile=\'+$(\'.mobile\').val();
			parent.jQuery(".modalCloseImg").click();
			close_popup();
		}
		});	
		*/
		// validate the 3 form fields
		//full_name = $(\'.full_name\').eq(1).val() ? $(\'.full_name\').eq(1).val() : $(\'.full_name\').eq(2).val();
		//email = $(\'.email\').eq(1).val() ? $(\'.email\').eq(1).val() : $(\'.email\').eq(2).val();
		//phone = $(\'.mobile\').eq(1).val() ? $(\'.mobile\').eq(1).val() : $(\'.mobile\').eq(2).val();
		//fair = $(\'.mobile\').eq(1).val() ? $(\'#jobfair_0\').val() : $(\'#jobfair_1\').val();
		key = key+1;
		full_name = $(\'.full_name\').eq(key).val()
		email = $(\'.email\').eq(key).val();
		phone = $(\'.mobile\').eq(key).val();
		fair = $(\'.jobfair\').eq(key).val();
		if(full_name != \'\' && email != \'\' && phone != \'\'){ 
			self.parent.location.href = jQuery(\'.redirect_url\').val()+\'?name=\'+full_name+\'&email=\'+email+\'&fair=\'+fair
			+\'&mobile=\'+phone;
			parent.jQuery(".modalCloseImg").click();
			close_popup();
		 }
	}
	
	$(".change_job").click(function(){
		// self.parent.location.href = $(this).attr(\'rel\');
		window.open($(this).attr(\'rel\'), \'\', \'\');
 	   return false;
	});
		
		

$(document).ready(function(){		
		 $(\'.slider2\').bxSlider({
			slideWidth: 100,
			minSlides: 3,
			maxSlides: 3,
			slideMargin: 10,
			auto:true,
			controls:false,
			autoHover:true,
			speed:500,
			pager:false
		  });
		  
		  $(\'.slider3\').bxSlider({
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
		  // $(\'.bx-viewport\').eq(0).css(\'height\', \'420px\');
		  $(\'.bx-viewport\').eq(2).css(\'height\', \'130px\');
		  // $.fn.cycle.defaults.autoSelector = \'.slideshow\';
		});
</script>
<style type="text/css">
p{margin:0 0 5px}
</style>
'; ?>


</body>
</html>