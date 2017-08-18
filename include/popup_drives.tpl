<div class="slider3">
{foreach from=$photo_data item=item key=key}
<div class="slide">
<img src="{$url}admin/timthumb.php?src=admin/uploads/req_photo/{$item.photo}&h=130&w=230&q=100" style="cursor: pointer" rel="{$url}jobfair_photo/" title = "Drive Photos" class="change_job"/>
</div>	
{/foreach}		 
</div>   
