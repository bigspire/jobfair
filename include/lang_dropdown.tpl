
{assign var = "lsel" value=$language_name}
{if $lsel eq 'ta'}
{assign var = "ta_sel" value="selected"}
{elseif $lsel eq 'gu'}
{assign var = "gu_sel" value="selected"}
{elseif $lsel eq 'te'}
{assign var = "te_sel" value="selected"}
{elseif $lsel eq 'ma'}
{assign var = "ma_sel" value="selected"}
{elseif $lsel eq 'hi'}
{assign var = "hi_sel" value="selected"}
{elseif $lsel eq 'ka'}
{assign var = "ka_sel" value="selected"}
{else}
{assign var = "en_sel" value="selected"}
{/if}	
		
<div class="langDropDown searchOrder" style="margin-right:70px;">	

<select name="Language"  class="default-usage-select" onchange="change_language()">
<option value="en" {$en_sel}>English</option>
<option value="ta" {$ta_sel}>{$reg_lang->JText('LBL_TAMIL')}</option>
<option value="te" {$te_sel}>{$reg_lang->JText('LBL_TELUGU')}</option>
<option value="ka" {$ka_sel}>{$reg_lang->JText('LBL_KANNADA')}</option>
<option value="hi" {$hi_sel}>{$reg_lang->JText('LBL_HINDI')}</option>
<option value="ma" {$ma_sel}>{$reg_lang->JText('LBL_MARATHI')}</option>
<option value="gu" {$gu_sel}>{$reg_lang->JText('LBL_GUJARAT')}</option>
</select> 

</div>
