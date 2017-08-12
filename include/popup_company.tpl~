 <div class="slideshow horizontal" 
    data-cycle-fx="carousel"
    data-cycle-timeout="400"
    data-cycle-carousel-visible="2"
    data-cycle-carousel-horizontal="true">

{foreach from=$data item=item key=key}
{if $item.job_url}
 <img src="{$url}admin/timthumb.php?src=admin/uploads/logo/{$item.logo}&h=40&q=100" rel="{$item.job_url}" class="change_job" style="cursor: pointer" title = "{$item.company_name}"  width = "100" height = "40"/>
 {else}
 <img src="{$url}admin/timthumb.php?src=admin/uploads/logo/{$item.logo}&h=40&q=100" title = "{$item.company_name}"  width = "100" height = "40"/>
 {/if}
{/foreach}			 
</div>
	
{literal}
<style type="text/css">
.slideshow { margin: auto }
.slideshow img {width: 130px; height: 65px; padding: 5px; border-bottom:1px solid #efefef;}
div.responsive img { width: auto; height: auto }
.cycle-pager { position: static; margin-top: 5px }
div.vertical { width: 140px }
div.horizontal { width: 600px }
</style>
{/literal}
  


          
       
