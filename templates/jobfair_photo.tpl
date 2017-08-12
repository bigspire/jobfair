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
		{foreach from=$gal_data item=item key=key}	
		{if $photo_data|@count gt '0'}
		<div class="fairGal">
		<h2 class="fairHead">{$item.title}, {$item.jobfair_date|date_format:"%e %b, %Y"}, {$item.location}</h2>
		<ul class="fanBox">
		{foreach from=$photo_data[$key] item=item key2=key2}
		{if $item neq ''}	
		<li><a class="fancybox" rel="myGallery" href="{$url}admin/uploads/photo/{$item}">
		<img src="{$url}admin/timthumb.php?src=admin/uploads/photo/{$item}&w=150&h=150&q=100"/>
		</a>
		</li>	
		{/if}
		{/foreach}
		</ul>	
		</div>
		{/if}
		{/foreach}
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