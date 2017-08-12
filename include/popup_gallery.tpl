<div class="slider3">
{foreach from=$photo_data item=item key=key}
{if $item.id neq ''}
<div class="slide">
<img src="{$url}admin/timthumb.php?src=admin/uploads/photo/{$item.photo}&h=130&w=230&q=100" style="cursor: pointer" rel="{$url}jobfair_photo/" title = "Jobfair Photos" class="change_job"/>
</div>	
{/if}
{/foreach}		 
</div>   
