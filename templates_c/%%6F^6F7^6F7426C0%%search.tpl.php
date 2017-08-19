<?php /* Smarty version 2.6.26, created on 2017-08-18 19:28:32
         compiled from ../include/search.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'ss', '../include/search.tpl', 10, false),)), $this); ?>
			   <div id="search" class="cf">
                <form id="search_jobs_form" method="post" action="<?php echo $this->_tpl_vars['url']; ?>
search_jobs/">
				 
				  
				  
				  <div class="searchCol1 cf" id="basic-modal">
           	 <strong><?php echo $this->_tpl_vars['menu_lang']->JText('LBL_SEARCH_JOBS'); ?>
</strong>
          	  <span><a href="#" class="basic"><?php echo $this->_tpl_vars['menu_lang']->JText('LINK_SEARCH_TIPS'); ?>
</a></span>
         	   
				<input id="search_keyword" style="" name="search_keyword" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['keywords'])) ? $this->_run_mod_handler('ss', true, $_tmp) : stripslashes($_tmp)); ?>
" placeholder ="Keyword(s)" type="text" <?php if ($this->_tpl_vars['keywords'] == ''): ?> class="placeholder" <?php endif; ?>/>
				
					
                    <p>
                        Eg: Software Developer, Software Engineer</p>
            </div>
			
						
				
                <div class="searchCol2">
                    <input id="search_location" name="search_location" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['location'])) ? $this->_run_mod_handler('ss', true, $_tmp) : stripslashes($_tmp)); ?>
"  placeholder="Location(s)"  type="text" <?php if ($this->_tpl_vars['location'] == ''): ?>  class="placeholder" <?php endif; ?>/>
				
                    <p>
                       Eg: Mumbai, Delhi, Chennai</p>
                </div>
                <div class="searchCol3">
                  
                  <!--div class="hmsrchBtn">
				  <a class="button-link bigBtn" id="search_jobs" href="javascript:void()"><?php echo $this->_tpl_vars['menu_lang']->JText('BTN_SEARCH_JOBS'); ?>
</a></div-->

				  <button class="big yellowBig" id="search_jobs" type="button">
                        <span><?php echo $this->_tpl_vars['menu_lang']->JText('BTN_SEARCH_JOBS'); ?>
</span></button>
						
					<a href="<?php echo $this->_tpl_vars['url']; ?>
<?php echo $this->_tpl_vars['language_url']; ?>
advanced_search/" class="advancedRes"><?php echo $this->_tpl_vars['menu_lang']->JText('LINK_ADV_SEARCH'); ?>
</a>	
                </div>
			
				
				
				<div id="basic-modal-content" style="display:none">
			<h3><?php echo $this->_tpl_vars['menu_lang']->JText('LINK_SEARCH_TIPS'); ?>
</h3>
		
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