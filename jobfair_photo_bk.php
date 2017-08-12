<?php
/**
 * @copyright     Copyright 2011-2012, BigSpire Software (P) Ltd
 */
ob_start();
session_start();
include('classes/class.paging.php');  

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
$i = 0;
$result = $mysql_obj->query("call fr_list_latest_news('".$start."','".$end."','".$lang_res['id']."')");
while($news_details[] = $mysql_obj->fetch_array($result)){
	$pno[]=$paging->print_no();
	$smarty->assign('pno',$pno);
	$smarty->assign('news_details',$news_details);	
	$encrypted_id[] = $cfn->encrypt($news_details[$i]['id']);	
	$smarty->assign('en_id',$encrypted_id);	
	//echo $image_path = 'uploads/news/images/'.$news_details[$i]['image'].'</br>';
	$image_path = admin_path.'/news/'.$news_details[$i]['image'];  
	if(($news_details[$i]['image'] != '') && (file_exists($image_path))){
	// image resize			
		$image_name[] = $image->resize($image_path, 250, 100, true);	
	}else{
	//default logo
		$image_name[] = '';				
	}
	$smarty->assign('image_name',$image_name);	
	$i++;
}

//page links
$smarty->assign('fn',$fn);
$smarty->assign('fair_selected','selected');
$smarty->assign('string_obj' , $fn);	
$smarty->display('jobfair_photo.tpl');
?>