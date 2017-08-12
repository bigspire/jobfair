testing by niki
{*
 * This is a pop up file for display pop up page.
 * @copyright     Copyright 2016, BigSpire Software (P) Ltd
 * @author        Nikita
 * @created       28-11-2016
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
  </head>
  <body>
	
	<div class="container">
      <!-- Example row of columns -->
	  <div class="row">
        <div class="col-sm-12">
		            <h2><span class="jobfair_title">HIRING For {$position}!</span></h2>
			
          <!--p><a class="btn  btn-warning" href="#" role="button">View more details &raquo;</a></p-->
       </div>
     </div>
	  
      <div class="row">
        <div style="z-index:-99;position:absolute;opacity:0.9;right:3%;top:2%;">
		{if $client_logo}
		  <img src="{$url}admin/timthumb.php?src=uploads/req_logo/{$client_logo}&w=200&q=100"> 
        {/if}
        </div> 
       
<div class="col-sm-12 jobDetail">
<p><label>Job Title: </label> {$position} <br>
<label>Qualification: </label>  {$qualification}<br>
<label>No. of Vacancy: </label> {$no_vacancy}<br>
<label>Salary: </label> {$salary}<br>
<label>Venue: </label> <br>{$venue|nl2br} <br>
<label>Contact No.: </label> {$contact_no}<br>
<label>Email Address: </label> {$email_address}<br>
<label>About {$company_name}: </label> <br> {$about_company|nl2br}
</p>

    <p><a class="btn btn-success regBtn"  href='{$url}registration/' id="theForm" role="button">Register for this job &raquo;</a>
 </div>
	 </div>
	 </div>
<input type="hidden" value="{$url}registration/" class="redirect_url"/>	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{$url}bootstrap/js/bootstrap.min.js"></script>


	{literal}
	<script type="text/javascript">
	$(".regBtn").click(function(){
		self.parent.location.href = jQuery('.redirect_url').val();
		parent.jQuery(".modalCloseImg").click();
	});	
	</script>
	{/literal}
  </body>
</html>