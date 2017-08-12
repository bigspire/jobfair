<div class="floatLeft leftNav">
{if $profile_nav eq 'edit'}
          <ul>
            <li><a {if $smarty.get.pagen eq 'edit_personal_details'} class="selected"{/if} href="{$url}{$language_url}edit_personal_details/">{$profile_lang->JText('LBL_PERSONLA_DETAILS')}</a></li>
            <li><a {if $smarty.get.pagen eq 'edit_education_details'} class="selected"{/if} href="{$url}{$language_url}edit_education_details/">{$profile_lang->JText('LBL_EDUCATION_DETAILS')}</a></li>
            <li><a {if $smarty.get.pagen eq 'edit_experience_details'} class="selected"{/if} href="{$url}{$language_url}edit_experience_details/">{$profile_lang->JText('LBL_EXPERIENCE_DETAILS')}</a></li>
            <li><a {if $smarty.get.pagen eq 'edit_expectation_details'} class="selected"{/if}  href="{$url}{$language_url}edit_expectation_details/">{$profile_lang->JText('LBL_EXPECTATIONS')}</a></li>
			<li><a {if $smarty.get.pagen eq 'edit_myself_details'} class="selected"{/if}  href="{$url}{$language_url}edit_myself_details/">{$profile_lang->JText('LBL_ABOUNT_MYSELF')}</a></li>
			<li><a {if $smarty.get.pagen eq 'edit_family_details'} class="selected"{/if}  href="{$url}{$language_url}edit_family_details/">{$profile_lang->JText('LBL_MY_FAMILY_DETAILS')}</a></li>
			<li><a {if $smarty.get.pagen eq 'edit_work_authorization_details'} class="selected"{/if}  href="{$url}{$language_url}edit_work_authorization_details/">{$profile_lang->JText('LBL_WORK_AUTHORIZATION')}</a></li>
            <li><a {if $smarty.get.pagen eq 'edit_resume_details'} class="selected"{/if} href="{$url}{$language_url}edit_resume_details/">{$profile_lang->JText('LBL_RESUME')}</a></li>
			<li><a {if $smarty.get.pagen eq 'edit_affirmative_action'} class="selected"{/if} href="{$url}{$language_url}edit_affirmative_action/">{$profile_lang->JText('LBL_AFFIRMATIVE_ACTION')}</a></li>
						<li><a {if $smarty.get.pagen eq 'update_job_status'} class="selected"{/if} href="{$url}{$language_url}update_job_status/">{$profile_lang->JText('LBL_JOB_STATUS')}</a></li>
</ul>
{elseif $profile_nav eq 'view'}
          <ul>
            <li><a {if $smarty.get.pagen eq 'view_personal_details'} class="selected"{/if} href="{$url}{$language_url}view_personal_details/">{$profile_lang->JText('LBL_PERSONLA_DETAILS')}</a></li>
            <li><a {if $smarty.get.pagen eq 'view_education_details'} class="selected"{/if} href="{$url}{$language_url}view_education_details/">{$profile_lang->JText('LBL_EDUCATION_DETAILS')}</a></li>
            <li><a {if $smarty.get.pagen eq 'view_experience_details'} class="selected"{/if} href="{$url}{$language_url}view_experience_details/">{$profile_lang->JText('LBL_EXPERIENCE_DETAILS')}</a></li>
              <li><a {if $smarty.get.pagen eq 'view_expectation_details'} class="selected"{/if}  href="{$url}{$language_url}view_expectation_details/">{$profile_lang->JText('LBL_EXPECTATIONS')}</a></li>
            <li><a {if $smarty.get.pagen eq 'view_myself_details'} class="selected"{/if}  href="{$url}{$language_url}view_myself_details/">{$profile_lang->JText('LBL_ABOUNT_MYSELF')}</a></li>
				<li><a {if $smarty.get.pagen eq 'view_family_details'} class="selected"{/if}  href="{$url}{$language_url}view_family_details/">{$profile_lang->JText('LBL_MY_FAMILY_DETAILS')}</a></li>
				<li><a {if $smarty.get.pagen eq 'view_work_authorization_details'} class="selected"{/if}  href="{$url}{$language_url}view_work_authorization_details/">{$profile_lang->JText('LBL_WORK_AUTHORIZATION')}</a></li>
            <li><a {if $smarty.get.pagen eq 'view_resume_details'} class="selected"{/if} href="{$url}{$language_url}view_resume_details/">{$profile_lang->JText('LBL_RESUME')}</a></li>
            <li><a {if $smarty.get.pagen eq 'view_affirmative_action'} class="selected"{/if} href="{$url}{$language_url}view_affirmative_action/">{$profile_lang->JText('LBL_AFFIRMATIVE_ACTION')}</a></li>
			<li><a {if $smarty.get.pagen eq 'view_job_status'} class="selected"{/if} href="{$url}{$language_url}view_job_status/">{$profile_lang->JText('LBL_JOB_STATUS')}</a></li>
          </ul>
{/if}		  
</div>