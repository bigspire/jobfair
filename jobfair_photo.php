<?php
/**
 * @copyright     Copyright 2011-2012, BigSpire Software (P) Ltd
 */

$lang = $fn->set_language($language_name);
// language file 
	
$news_obj = new factory($lang.'_news');
$smarty->assign('news_lang', $news_obj);
	
$menu_obj = new factory($lang.'_menu');
$smarty->assign('menu_lang', $menu_obj);
	
$foot_obj = new factory($lang.'_footer');
$smarty->assign('footer_lang', $foot_obj);

// create page title object to assign page titles	
$title_obj = new page_title($lang. '_title');	
$smarty->assign('PAGE_TITLE', 'Jobsfactory - Job Fair Photo Gallery');


// fetch photos for the jobfair
$query = "CALL fr_gallery_details()";
try{
	if(!$result = $mysql_obj->query($query)){
		throw new Exception('Problem in executing get job fair details');
	}
	while($obj[] = $mysql_obj->fetch_assoc($result)){ 
		$smarty->assign('gal_data', $obj);
	}
}catch(Exception $e){
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

// fetch the photos of the job fair
foreach($obj as $key => $record){
	// if job fair is not empty
	if($record['jobfair_id'] != ''){
		// fetch logos
		$query = "CALL fr_photo_gallery('".$record['jobfair_id']."')";
		try{
			if(!$result = $mysql_obj->query($query)){
				throw new Exception('Problem in executing get job fair photo details');
			}
			$i = 0;
			while($row_data = $mysql_obj->fetch_assoc($result)){ 
				$row[$key][$i] = $row_data['photo'];
				$i++;
			}
		}catch(Exception $e){
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
	}

}
// echo '<pre>'; print_R($row);
$smarty->assign('photo_data', $row);

//page links
$smarty->assign('fn',$fn);
$smarty->assign('fair_selected','selected');
$smarty->assign('string_obj' , $fn);	
$smarty->display('jobfair_photo.tpl');
?>