			   <div id="search" class="cf">
                <form id="search_jobs_form" method="post" action="{$url}search_jobs/">
				 
				  
				  
				  <div class="searchCol1 cf" id="basic-modal">
           	 <strong>{$menu_lang->JText('LBL_SEARCH_JOBS')}</strong>
          	  <span><a href="#" class="basic">{$menu_lang->JText('LINK_SEARCH_TIPS')}</a></span>
         	   
				<input id="search_keyword" style="" name="search_keyword" value="{$keywords|ss}" placeholder ="Keyword(s)" type="text" {if $keywords eq ''} class="placeholder" {/if}/>
				
					
                    <p>
                        Eg: Software Developer, Software Engineer</p>
            </div>
			
						
				
                <div class="searchCol2">
                    <input id="search_location" name="search_location" value="{$location|ss}"  placeholder="Location(s)"  type="text" {if $location eq ''}  class="placeholder" {/if}/>
				
                    <p>
                       Eg: Mumbai, Delhi, Chennai</p>
                </div>
                <div class="searchCol3">
                  
                  <!--div class="hmsrchBtn">
				  <a class="button-link bigBtn" id="search_jobs" href="javascript:void()">{$menu_lang->JText('BTN_SEARCH_JOBS')}</a></div-->

				  <button class="big yellowBig" id="search_jobs" type="button">
                        <span>{$menu_lang->JText('BTN_SEARCH_JOBS')}</span></button>
						
					<a href="{$url}{$language_url}advanced_search/" class="advancedRes">{$menu_lang->JText('LINK_ADV_SEARCH')}</a>	
                </div>
			
				
				
				<div id="basic-modal-content" style="display:none">
			<h3>{$menu_lang->JText('LINK_SEARCH_TIPS')}</h3>
		
			<p class="header"><span>1</span> General Search Tips</p>
			<p  style="margin-bottom:16px"><code>Use single or multiple words for keywords</code></p>
			<p class="header"><span>2</span> Keywords Search Tips</p>
			<p  style="margin-bottom:16px"><code>Use only 'Job Title' as keyword(s)</code></p>
			<p class="header"><span>3</span> Location Search Tips</p>
			<p><code>City wise Search - eg: Chennai, Mumbai, Lucknow</code></p>
	
			<p><code>State wise Search - eg: Tamil Nadu, Maharastra, Uttar Pradesh</code></p>
		
			<!--p><code>Region wise Search - eg: North India, South India, West India</code></p-->
			<p><code>It is advisable to broad base your location search for finding more jobs of your choice</code></p>
			
			
		</div>
            
                </form>
            </div>
            <!--SEARCH-->		