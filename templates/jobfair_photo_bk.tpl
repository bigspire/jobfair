{include file='../include/top.tpl'}

<!-- Add required fancyBox files -->
<link rel="stylesheet" href="{$url}fancybox/source/jquery.fancybox.css" type="text/css" media="screen" />

    <!-- Primary Page Layout
================================================== -->
<div id="headerContainer"  class="headerProfile" >
<div class="container">
    	{include file='../include/header.tpl'}  
		
      <div class="innerPage">
	   <div class="pageHeader">
			<h1 class="pageTitle floatL">Jobfair - Photo Gallery</h1>
			<h2 style="float:right"><span class="active"><a href="{$url}{$language_url}">{$menu_lang->JText('LINK_HOME')}</a></span> 
			<img src="{$url}images/bullet_green3.png"> <span class="stepDetails">Jobsfactory's Jobfair Photos</span></h2>
			</div>
			 
			<div class="cf" id="profile">
				
					<div class="floatL mt25">
					
		<div class="fairGal">
		<h2 class="fairHead">Gateway to Careers, 08th Jan, 2017, Vellore</h2>
<ul class="fanBox" style="">
	<li><a class="fancybox" rel="myGallery" href="{$url}images/jan2017/company_list_2.jpg"><img width="150" height="100" src="{$url}images/jan2017/company_list.jpg" /></a></li>
	<li><a class="fancybox" rel="myGallery" href="{$url}images/jan2017/employer_2.jpg"><img width="150" height="100" src="{$url}images/jan2017/employer.jpg" /></a></li>
	<li><a class="fancybox" rel="myGallery" href="{$url}images/jan2017/employer2_2.jpg"><img width="150" height="100" src="{$url}images/jan2017/employer2.jpg" /></a></li>
	<li><a class="fancybox" rel="myGallery" href="{$url}images/jan2017/jobseeker_2.jpg"><img width="150" height="100" src="{$url}images/jan2017/jobseeker.jpg" /></a></li>		
	<li><a class="fancybox" rel="myGallery" href="{$url}images/jan2017/jobseeker2_2.jpg"><img width="150" height="100" src="{$url}images/jan2017/jobseeker2.jpg" /></a></li>
	<li><a class="fancybox" rel="myGallery" href="{$url}images/jan2017/jobseeker3_3.jpg"><img width="150" height="100" src="{$url}images/jan2017/jobseeker3.jpg" /></a></li>
	<li><a class="fancybox" rel="myGallery" href="{$url}images/jan2017/venue_2.jpg"><img width="150" height="100" src="{$url}images/jan2017/venue.jpg" /></a></li>
</ul></div>


<div class="fairGal">
	
	<h2 class="fairHead">Gateway to Careers, 08th Jan, 2017, Vellore</h2>
<ul class="fanBox" style="">
	<li><a class="fancybox" rel="myGallery" href="{$url}images/jan2017/company_list_2.jpg"><img width="150" height="100" src="{$url}images/jan2017/company_list.jpg" /></a></li>
	<li><a class="fancybox" rel="myGallery" href="{$url}images/jan2017/employer_2.jpg"><img width="150" height="100" src="{$url}images/jan2017/employer.jpg" /></a></li>
	<li><a class="fancybox" rel="myGallery" href="{$url}images/jan2017/employer2_2.jpg"><img width="150" height="100" src="{$url}images/jan2017/employer2.jpg" /></a></li>
	<li><a class="fancybox" rel="myGallery" href="{$url}images/jan2017/jobseeker_2.jpg"><img width="150" height="100" src="{$url}images/jan2017/jobseeker.jpg" /></a></li>		
	<li><a class="fancybox" rel="myGallery" href="{$url}images/jan2017/jobseeker2_2.jpg"><img width="150" height="100" src="{$url}images/jan2017/jobseeker2.jpg" /></a></li>
	<li><a class="fancybox" rel="myGallery" href="{$url}images/jan2017/jobseeker3_3.jpg"><img width="150" height="100" src="{$url}images/jan2017/jobseeker3.jpg" /></a></li>
	<li><a class="fancybox" rel="myGallery" href="{$url}images/jan2017/venue_2.jpg"><img width="150" height="100" src="{$url}images/jan2017/venue.jpg" /></a></li>
</ul>
	</div>
		</div>

   </div>    
     </div>
  </div><!--CONTAINER-->
</div><!--HEADER CONTAINER-->


{include file='../include/footer.tpl'}	
<script type="text/javascript" src="{$url}fancybox/source/jquery.fancybox.pack.js"></script>
<!-- Optional, Add mousewheel effect -->
<script type="text/javascript" src="{$url}fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>	
{literal}
<script type="text/javascript">
$(document).ready(function(){		
	$(".fancybox").fancybox();	
});
</script>
{/literal}