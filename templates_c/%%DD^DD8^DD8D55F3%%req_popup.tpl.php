<?php /* Smarty version 2.6.26, created on 2017-08-14 19:44:44
         compiled from req_popup.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'nl2br', 'req_popup.tpl', 44, false),)), $this); ?>
testing by niki
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
  </head>
  <body>
	
	<div class="container">
      <!-- Example row of columns -->
	  <div class="row">
        <div class="col-sm-12">
		            <h2><span class="jobfair_title">HIRING For <?php echo $this->_tpl_vars['position']; ?>
!</span></h2>
			
          <!--p><a class="btn  btn-warning" href="#" role="button">View more details &raquo;</a></p-->
       </div>
     </div>
	  
      <div class="row">
        <div style="z-index:-99;position:absolute;opacity:0.9;right:3%;top:2%;">
		<?php if ($this->_tpl_vars['client_logo']): ?>
		  <img src="<?php echo $this->_tpl_vars['url']; ?>
admin/timthumb.php?src=uploads/req_logo/<?php echo $this->_tpl_vars['client_logo']; ?>
&w=200&q=100"> 
        <?php endif; ?>
        </div> 
       
<div class="col-sm-12 jobDetail">
<p><label>Job Title: </label> <?php echo $this->_tpl_vars['position']; ?>
 <br>
<label>Qualification: </label>  <?php echo $this->_tpl_vars['qualification']; ?>
<br>
<label>No. of Vacancy: </label> <?php echo $this->_tpl_vars['no_vacancy']; ?>
<br>
<label>Salary: </label> <?php echo $this->_tpl_vars['salary']; ?>
<br>
<label>Venue: </label> <br><?php echo ((is_array($_tmp=$this->_tpl_vars['venue'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
 <br>
<label>Contact No.: </label> <?php echo $this->_tpl_vars['contact_no']; ?>
<br>
<label>Email Address: </label> <?php echo $this->_tpl_vars['email_address']; ?>
<br>
<label>About <?php echo $this->_tpl_vars['company_name']; ?>
: </label> <br> <?php echo ((is_array($_tmp=$this->_tpl_vars['about_company'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>

</p>

    <p><a class="btn btn-success regBtn"  href='<?php echo $this->_tpl_vars['url']; ?>
registration/' id="theForm" role="button">Register for this job &raquo;</a>
 </div>
	 </div>
	 </div>
<input type="hidden" value="<?php echo $this->_tpl_vars['url']; ?>
registration/" class="redirect_url"/>	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo $this->_tpl_vars['url']; ?>
bootstrap/js/bootstrap.min.js"></script>


	<?php echo '
	<script type="text/javascript">
	$(".regBtn").click(function(){
		self.parent.location.href = jQuery(\'.redirect_url\').val();
		parent.jQuery(".modalCloseImg").click();
	});	
	</script>
	'; ?>

  </body>
</html>