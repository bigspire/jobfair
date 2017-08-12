 <div class="slider2">
{foreach from=$data item=item key=key}
{if $item.logo neq ''}
<div class="slide">
{if $item.job_url}
<img src="{$url}admin/timthumb.php?src=admin/uploads/logo/{$item.logo}&h=40&q=100" rel="{$item.job_url}" class="change_job" style="cursor: pointer" title = "{$item.company_name}"  width = "100" height = "40"/>
{else}
<img src="{$url}admin/timthumb.php?src=admin/uploads/logo/{$item.logo}&h=40&q=100" title = "{$item.company_name}"  width = "100" height = "40"/>
{/if}
</div>
{/if}
{/foreach}		 
</div>   
