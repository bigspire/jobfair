<?php
require_once('class.languages.php');
class page_title extends factory{
	
	public function __construct($page) {
        parent::__construct($page);
	}	
		
	public function JText_($txt){
		return parent::JText_Return($txt);
	}

}
?>