<div class="slider3">
{foreach from=$photo_data item=item key=key}
<div class="slide">
<img src="{$url}admin/timthumb.php?src=admin/uploads/req_photo/{$item.photo}&h=130&w=230&q=100" style="cursor: pointer"  title = "Drive Photos" class=""/>
</div>	
{/foreach}		 
</div>   
