<?php 
class factory{

	public $lang_file;

	public function __construct($lang){ 
		$this->lang_file = $lang;
	}
	
	/* function to load the language file */
	public function load($name){
		$path = factory::getPath($name);
		$content = factory::getFile($path);
		return $content;
	}
	
	/* getting matching value */
	public function JText($text){
	
		$result = $this->load($this->lang_file);
		foreach($result as $key => $value){
			if($key == $text){
			   echo $value;  
			}
		}
	}

	
	/* getting matching value */
	public function JText_Return($text){
		$result = $this->load($this->lang_file);
		foreach($result as $key => $value){
			if($key == $text){
			   return $value;
			}
		}
	}
	
	/* function to set the language file */
	public function setLang($file){
		 $lang_file = $file;		 
	}
	
	/* get the path of the file */
	public function getPath($name){
		$dir = dirname(__FILE__);
		$lang_split = explode('_', $name);
		$dir =  'languages/'. $lang_split[0].'/'.$name.'.ini';		
		return $dir;
	}
	
	/* if file exists in that path, get value of language code */
	public function getFile($path){
		if (file_exists($path)){
			$file = parse_ini_file($path);
			return $file;
		}else{
			echo 'Invalid file';
		}
	}
}
?>