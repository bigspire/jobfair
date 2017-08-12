<?php 
define('DS', '/');
class ImageHelper{

    function resize($path, $width, $height, $aspect = true, $htmlAttributes = array(), $return = false,$root_url = '') {
        $types = array(1 => "gif", "jpeg", "png", "swf", "psd", "wbmp"); // used to determine image type
       	
    	$this->cacheDir = 'cache';
        $url = $path;
        
        if (!($size = getimagesize($url))) 
            return false; // image doesn't exist
		if ($aspect) {
			if($size[1] < $height) $height = $size[1];
			if($size[0] < $width) $width = $size[0];
		}
		if ($aspect) { // adjust to aspect.
            if (($size[1]/$height) > ($size[0]/$width))  // $size[0]:width, [1]:height, [2]:type
                $width = ceil(($size[0]/$size[1]) * $height);
            else 
                $height = ceil($width / ($size[0]/$size[1]));
        }
        
        
        $relfile = $this->cacheDir.'/'.$width.'_'.$height.'_'.basename($path); // relative file
        $cachefile = $this->cacheDir.DS.$width.'_'.$height.'_'.basename($path);  // location on server
	  
	
        
        if (file_exists($cachefile)) {
            $csize = getimagesize($cachefile);
            $cached = ($csize[0] == $width && $csize[1] == $height); // image is cached
            if (@filemtime($cachefile) < @filemtime($url)) // check if up to date
                $cached = false;
        } else {
		
            $cached = false;
        }
        
        if (!$cached) {
            $resize = ($size[0] >= $width || $size[1] >= $height) || ($size[0] <= $width || $size[1] <= $height);
		} else {
            $resize = false;
			
        }
        
        if (!$cached) {
            $image = call_user_func('imagecreatefrom'.$types[$size[2]], $url);			
            if (function_exists("imagecreatetruecolor") && ($temp = imagecreatetruecolor ($width, $height))) {
                imagecopyresampled ($temp, $image, 0, 0, 0, 0, $width, $height, $size[0], $size[1]);
              } else {
                $temp = imagecreate ($width, $height);
                imagecopyresized ($temp, $image, 0, 0, 0, 0, $width, $height, $size[0], $size[1]);
            }
			
            call_user_func("image".$types[$size[2]], $temp, $root_url.$cachefile);
            imagedestroy ($image);
            imagedestroy ($temp);
        }  
		       
        
		return $relfile;
       // return $this->output(sprintf($this->Html->tags['image'], $relfile, $this->Html->parseHtmlOptions($htmlAttributes, null, '', ' ')), $return);
	   }
    }
	$image=new ImageHelper();
?>