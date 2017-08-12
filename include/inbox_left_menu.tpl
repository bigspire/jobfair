<div class="floatLeft leftNav">
          <ul>
            <li><a {$ja_selected} href="{$url}{$language_url}job_alerts/">{$inbox_lang->JText('LBL_JOB_ALERTS')}{if $count_ja > 0}<span class="numberMiddle">{$count_ja}</span>{/if}</a></li>            
			<li><a {$j_selected} href="{$url}{$language_url}posting_alerts/">{$inbox_lang->JText('LBL_JOB_POSTING_ALERTS')}{if $TOTAL_UNREAD > 0}<span class="numberMiddle">{$TOTAL_UNREAD}</span>{/if}</a></li> 
			<li><a {$en_selected} href="{$url}{$language_url}inbox/?action=emp_news">{$inbox_lang->JText('LBL_EMP_NEWS')}{if $TOTAL_UNREAD_EN > 0}<span class="numberMiddle">{$TOTAL_UNREAD_EN}</span>{/if}</a></li>
            <li><a {$nf_selected} href="{$url}{$language_url}inbox/?action=knowledge_centre">{$inbox_lang->JText('LBL_NEW_FEATURES')}{if $TOTAL_UNREAD_KC > 0}<span class="numberMiddle">{$TOTAL_UNREAD_KC}</span>{/if}</a></li>
          </ul>		  
</div>