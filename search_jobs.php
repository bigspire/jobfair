<?php
/**
 * This is a search results page is used to search job details.
 * @copyright     Copyright 20011-2012, BigSpire Software (P) Ltd
 * @author        Swathikumar M
 * @created       17-feb-2012
 * @link          http://jobsfactory.in
 */
ob_start();
include('classes/class.paging.php');  
$fn->reg_clear_session();
//$fn->frontend_authenticate($url);
	$lang = $fn->set_language($language_name);
	// language file 
	$search_obj = new factory($lang.'_search_jobs');
	$smarty->assign('search_lang', $search_obj);
	
	$menu_obj = new factory($lang.'_menu');
	$smarty->assign('menu_lang', $menu_obj);
	
	$foot_obj = new factory($lang.'_footer');
	$smarty->assign('footer_lang', $foot_obj);
	
	$smarty->assign('webroot',constant('webroot'));
	$smarty->assign('cmessageleft','successLeft');$smarty->assign('cmessageright','successRight');$smarty->assign('cmessagecenter','successCenter');
	//Note: The following script is used for to apply/save the jobs
	
	if(isset($_POST) || (isset($_SESSION['user_jobs_id']) )){
	  if(isset($_SESSION['user_jobs_id']) &&  strstr($_SERVER['HTTP_REFERER'],'login/')){
			$_POST['save_selected'] = $_SESSION['user_save_selected'];
			$_POST['selected_jobs'] = $_SESSION['user_jobs_id'];
			$_POST['apply_selected'] = $_SESSION['user_apply_selected'];
			$_POST['refer_selected'] = $_SESSION['user_refer_selected'];
	  }
		unset($_SESSION['user_refer_selected']);	unset($_SESSION['user_save_selected']);unset($_SESSION['user_jobs_id']);unset($_SESSION['user_apply_selected']);
		//Note: The following script is used for to save the jobs		
		if($_POST['search_job_submit'] == 'save_selected' || $_POST['save_selected'] == 'save_selected') { 
			if(isset($_SESSION['user_id'])){	
			    $i = 0;$j = 0;
				foreach($_POST['selected_jobs'] as $key){
					$job_id = $cfn->decrypt($key,'','');
					if($save_jobs = $mysql_obj->query("call fr_save_job('".$_SESSION['user_id']."' , '".$job_id."','".$fn->print_date()."')")){
					
					   if($save_jobs->num_rows){
							$save_jobs_res = $mysql_obj->fetch_array($save_jobs);
							if(intval($save_jobs_res['insert_id']) > 0)
								$i++;
							elseif(intval($save_jobs_res['already_saved']) > 0)	
								$j++;	
					   }		
					}
				}
				if($i > 0)
					$smarty->assign('jobs_saved_applied',$i.' '.$search_obj->JText_Return('LBL_JOBS_SAVED'));
				elseif($j > 0)	{
					$smarty->assign('jobs_saved_applied',$search_obj->JText_Return('MSG_JOBS_ALREADY_SAVED'));
					$smarty->assign('cmessageleft','pcLeft');$smarty->assign('cmessageright','pcRight');$smarty->assign('cmessagecenter','profileComplete');
				}
				else{
					$smarty->assign('jobs_saved_applied','You cannot save the applied job(s)');
					$smarty->assign('cmessageleft','pcLeft');$smarty->assign('cmessageright','pcRight');$smarty->assign('cmessagecenter','profileComplete');
				}	
				
			}
			else{
				$_SESSION['user_jobs_id'] = $_POST['selected_jobs'];
				$_SESSION['user_save_selected'] = 'save_selected';
				$order_str .= (isset($_GET['field'])) ? "&field=".$_GET['field'] : '';
				$order_str .= (isset($_GET['order'])) ? "&order=".$_GET['order'] : '';
				$order_str .= (isset($_GET['page'])) ? "&page=".$_GET['page'] : '';
				header("Location:{$url}{$language_url}login/?redirect_uri=search_jobs/".$_POST['sorting_query_string'].$order_str);die;
			}
		}
		//Note: The following script is used for to apply the jobs
		elseif($_POST['search_job_submit'] == 'apply_selected' || $_POST['apply_selected'] == 'apply_selected') {
			if(isset($_SESSION['user_id'])){
				//Note: Check jobseeker has rights to apply jobs
				if($verify_qry = $mysql_obj->query("call fr_check_user_verified('".$_SESSION['user_id']."')")){
					$verify_res = $mysql_obj->fetch_assoc($verify_qry);
					if($verify_res['is_verified'] != 'Y'){
						$error_msg = $verify_res['is_verified'] == 'N' ? 'MSG_REJECTED_ACCOUNT' : 'MSG_WAITING_ACCOUNT';
						$smarty->assign('jobs_saved_applied',$search_obj->JText_Return($error_msg));	
						$smarty->assign('cmessageleft','pcLeft');$smarty->assign('cmessageright','pcRight');$smarty->assign('cmessagecenter','profileComplete');
					}else{
					
						$i = 0;
						foreach($_POST['selected_jobs'] as $key){
							$job_id = $cfn->decrypt($key,'','');
							if($apply_jobs = $mysql_obj->query("call fr_apply_jobs('".$_SESSION['user_id']."' , '".$job_id."','".$fn->print_date()."')")){
							if($apply_jobs->num_rows){
									$apply_jobs_res = $mysql_obj->fetch_array($apply_jobs);
									if(intval($apply_jobs_res['insert_id']) > 0)
										$i++;
							   }
							}
						}
						if($i == 0) {	
							$smarty->assign('jobs_saved_applied',$search_obj->JText_Return('MSG_JOBS_ALREADY_APPLIED'));	
							$smarty->assign('cmessageleft','pcLeft');$smarty->assign('cmessageright','pcRight');$smarty->assign('cmessagecenter','profileComplete');
						}
						else if($i > 0) {
							$smarty->assign('jobs_saved_applied',$i.' '.$search_obj->JText_Return('LBL_JOBS_APPLIED'));		
						}
					}
				}				
			}
			else{
				$_SESSION['user_jobs_id'] = $_POST['selected_jobs'];
				$_SESSION['user_apply_selected'] = 'apply_selected';
				$order_str .= (isset($_GET['field'])) ? "&field=".$_GET['field'] : '';
				$order_str .= (isset($_GET['order'])) ? "&order=".$_GET['order'] : '';
				$order_str .= (isset($_GET['page'])) ? "&page=".$_GET['page'] : '';
				header("Location:{$url}{$language_url}login/?redirect_uri=search_jobs/".$_POST['sorting_query_string'].$order_str);die;
			}
			
		}	

		//Note: The following script is used for refer friends
		elseif($_POST['search_job_submit'] == 'refer_selected' || $_POST['refer_selected'] == 'refer_selected') {
			// assign the jobs id in session
			if($_POST['selected_jobs']){
					$_SESSION['user_jobs_id'] = $_POST['selected_jobs'];
			}
			$new_query_string = '?'.str_replace('&type=refer','',str_replace('&type=refer','',(str_replace('search_jobs/&','',(str_replace('redirect_uri=','',$_SERVER["QUERY_STRING"]))))));		    
			if(isset($_SESSION['user_id']) && $_POST['selected_jobs']){
				header('location:'.$url.$language_url.'refer_friends/'.$new_query_string);die;
			}
			elseif(!isset($_SESSION['user_id'])) {
				//echo $new_query_string; die;
				if($_POST['selected_jobs']){
					$_SESSION['user_refer_selected'] = 'refer_selected';
				}
				$order_str .= (isset($_GET['field'])) ? "&field=".$_GET['field'] : '';
				$order_str .= (isset($_GET['order'])) ? "&order=".$_GET['order'] : '';
				$order_str .= (isset($_GET['page'])) ? "&page=".$_GET['page'] : '';
				header("Location:{$url}{$language_url}login/?redirect_uri=search_jobs/".$_POST['sorting_query_string'].$order_str);die;
			}
			
		}
	}	
	
try{
		$search_field = $_GET['field'];
	    if($_GET['searchby'] != '' && $_GET['field'] == '') {	
			$_GET['field'] = 'recent_jobs';
		}
		include('include/search_query.php');  
		
		
		//post url for paging
		if($_POST){
		    $smarty->assign('latest_req_show','latest_req_show');
			$post_url = $sorting_query_string;
		}
	
		$job_posted = strtolower(trim($_GET['job_posted']));
		$job_posted_date = '';
		if($job_posted){
			
			
			$date = $fn->print_date() ;
             if($job_posted == 'recently') {
				$job_posted_date = date('Y-m-d',strtotime('-1 week',strtotime($date)));
			}
			elseif($job_posted == 'with in 15 days') {
				$job_posted_date = date('Y-m-d',strtotime('-15 days',strtotime($date))); 
			}
			elseif($job_posted == 'with in 30 days') {
				$job_posted_date = date('Y-m-d',strtotime('-30 days',strtotime($date))); 
			}
			elseif($job_posted != ''){
				$job_posted_date = $job_posted; 
			}
			
			if($_GET['field'] == ''){
				$field = 'j.created_date';
				$_GET['field'] = 'recent_jobs';
			}
			
			
		}
		$premium_jobs = '';
		if($_GET['show'] =='premium_jobs'){
			$premium_jobs = 'Y';	
		}
		//$job_posted = $job_posted == 'recenlty' ? 
		$login_user_id = intval($_SESSION['user_id']) > 0 ? $_SESSION['user_id'] : '0';
		/*
		$keywords = str_replace(', ',',',trim($keywords));
		foreach(explode(',',$keywords) as $txt){
			if(trim($txt) != '') {
				$search_text .= '~+'.str_replace(' ',' +',$txt);
			}	
		}*/
		$search_text = trim($keywords);
		$search_text = $search_text != ''  ? ($_GET['match'] == 'all' ? '+'.$fn->add_plus($search_text) :  $search_text) : '';
		/*
		$location = str_replace(', ',',',trim($location));
		foreach(explode(',',$location) as $txt){
			if(trim($txt) != '') {
				$search_location .= '~+'.str_replace(' ',' +',$txt);
			}	
		}*/
		$search_location = trim($location);
		$search_location = $search_location != ''  ? ($_GET['match'] == 'all' ? '+'.$fn->add_plus($search_location) :  $search_location) : '';
		$search_company = '';
		if(trim($company_name) != ''){
			$multi_company_name = str_replace(', ',',',trim($company_name));
			foreach(explode(',',$multi_company_name) as $txt){
				if(trim($txt) != '') {
					$search_company .= '~'.str_replace(' ',' ',$txt);
				}	
			}
			
		}
		if($similor_jobs == '')
			$sql_count = "call fr_job_search('$field','$order','".$mysql->real_escape_string($search_text)."','".$mysql->real_escape_string($search_company)."','".$mysql->real_escape_string($search_location)."','".$fn->print_date()."',$min_exp,$max_exp,$min_salary,$max_salary,\"$industry\",\"$roles\",\"$sdepartment\",'$job_type',$login_user_id,'','',0,'$job_posted_date','$x_std','$xii_std','$qualification','$degree','$specialization','$premium_jobs','0');"; 
		else{
			/*foreach(explode(',',$skeywords) as $txt){
				if(trim($txt) != '') {
					$search_text .= '~+'.str_replace(' ',' +',$txt);
				}	
			}*/
			$search_text = $skeywords;
			//$search_text = $skeywords != ''  ? ($_GET['match'] == 'all' ? '+'.$fn->add_plus($skeywords) :  $skeywords) : '';
			$similar_job_id = intval($cfn->decrypt($_GET['similar_job'],'',''));
			$sql_count = "call fr_job_search('$field','$order','".$mysql->real_escape_string($search_text)."','','','".$fn->print_date()."',$smin_exp,$smax_exp,$smin_salary,$smax_salary,'','','','$sjob_type',$login_user_id,'','',0,'','','','','','','',$similar_job_id);"; 
		}	
		if(!$search_query = $mysql_obj->query($sql_count)){
			throw new Exception('Problem in executing get search results1');
		}
		if($search_query_res = $mysql_obj->fetch_array($search_query)){
			$count = $search_query_res['count'];
			if($similor_jobs == '' && $_GET['page'] == '' && $search_field == '' && $count > 0){
				//Note: Save searched keywords
				if($keywords != '') {
					$keywords1 = str_replace(', ',',',trim($keywords));
					foreach(explode(',',$keywords1) as $keyword){
						if(!$save_query = $mysql_obj->query("call fr_save_searched_keyword('".$mysql->real_escape_string($keyword)."','".$fn->print_date()."','".$_SERVER["REMOTE_ADDR"]."')")){
							throw new Exception('Problem in executing save searched keyword');
						}
					}
				}
				//Note: Save searched location
				if($location != '') {
					foreach(explode(',',$location) as $loc){
						if(!$save_query = $mysql_obj->query("call fr_save_searched_location('".$mysql->real_escape_string($loc)."','".$fn->print_date()."','".$_SERVER["REMOTE_ADDR"]."')")){
							throw new Exception('Problem in executing save searched location');
						}
					}
				}
				
			}
			
		}
		$smarty->assign('total_records',$count);
		$limit = 20;
		include('paging_call.php');	
		if($similor_jobs == '')
			$sql_data = "call fr_job_search('$field','$order','".$mysql->real_escape_string($search_text)."','".$mysql->real_escape_string($search_company)."','".$mysql->real_escape_string($search_location)."','".$fn->print_date()."',$min_exp,$max_exp,$min_salary,$max_salary,\"$industry\",\"$roles\",\"$sdepartment\",'$job_type',$login_user_id,'".$start."','".$end."',0,'$job_posted_date','$x_std','$xii_std','$qualification','$degree','$specialization','$premium_jobs','0');";				
		else
			$sql_data  = "call fr_job_search('$field','$order','".$mysql->real_escape_string($search_text)."','','','".$fn->print_date()."',$smin_exp,$smax_exp,$smin_salary,$smax_salary,'','','','$sjob_type',$login_user_id,'$start','$end',0,'','','','','','','',$similar_job_id);"; 
		$result_query = $mysql->query($sql_data);
		// fetch all the results
		$i = 0;
		while($res[] = $mysql_obj->fetch_assoc($result_query)){
			$elocation = explode(',',$res[$i]['location']);
			for($l=0; $l<count($elocation); $l++){
				$elocation[$l] = trim($elocation[$l]);
			}
			$locations = implode(', ',$elocation);
			$res[$i]['location'] = $locations;
			$pno[]=$paging->print_no();
			$encrypted_id[] = $cfn->encrypt($res[$i]['id']);
			$res[$i]['new_company_name'] = ucwords(strtolower($res[$i]['company_name']));
			if(trim($res[$i]['applied_date']) != ''){
			    $time[] = $cfn->show_time_with_str($res[$i]['applied_date'],3);
			}else{
				$time[] = '';
			}
		if(trim($res[$i]['saved_date']) != ''){
			    $saved_date[] = $cfn->show_time_with_str($res[$i]['saved_date'],3);
			}else{
				$saved_date[] = '';
			}			
			$smarty->assign('saved_date',$saved_date);
			$smarty->assign('time',$time);
			$smarty->assign('en_id',$encrypted_id);
			$res[$i]['exp_str'] = $cfn->get_min_max_str($res[$i]['min_exp'],$res[$i]['max_exp']);
			$res[$i]['experience'] = $res[$i]['exp_str'];
			$res[$i]['similar_job_keywords'] = $fn->get_similor_jobs($res,$i,$cfn,$encrypted_id[$i]);
			// for company jobs for recruiter only
			if(!empty($res[$i]['job_company'])){
				$res[$i]['new_company_name'] = ucwords(strtolower($res[$i]['job_company']));
				$res[$i]['company_name'] = $res[$i]['job_company'];
			}else{
				$res[$i]['new_company_name'] = ucwords(strtolower($res[$i]['new_company_name']));
				$res[$i]['company_name'] = $res[$i]['company_name'];
			}
			
			$smarty->assign('search_jobs',$res);
		    $smarty->assign('pno',$pno);
			$i++;
		}
		$paging->posturl($post_url);
		$smarty->assign('page_links',$paging->print_link_frontend($language_url));

}
// catch the exception thrown
catch (Exception  $e) {
	echo 'Caught exception: ',  $e->getMessage(), "\n";
}

// create page title object to assign page titles	
	$title_obj = new page_title($lang. '_title');	
	$smarty->assign('PAGE_TITLE', $title_obj->JText_('PAGE_TITLE_SEARCH_JOBS'));
$smarty->assign('string_obj' , $cfn);	
$smarty->assign('retain_location',$location);
$smarty->assign('retain_keywords',$keywords);
$smarty->assign('retain_industry',$industry);
$smarty->assign('retain_education',$education);
$smarty->assign('share_this','share_this');

$smarty->assign('retain_department',$department);
include('include/adv_search_form.php');
if(isset($_SESSION['user_jobs'])){
	if($_SESSION['user_jobs'] == 'saved'){
		$smarty->assign('jobs_saved_applied',$search_obj->JText_Return('LBL_JOBS_SAVED'));
	}elseif($_SESSION['user_jobs'] == 'applied'){
			$smarty->assign('jobs_saved_applied',$search_obj->JText_Return('LBL_JOBS_APPLIED'));
	}elseif($_SESSION['user_jobs'] == 'already_saved'){
		$smarty->assign('jobs_saved_applied',$search_obj->JText_Return('LBL_JOBS_ALREADY_SAVED'));
		$smarty->assign('cmessageleft','pcLeft');$smarty->assign('cmessageright','pcRight');$smarty->assign('cmessagecenter','profileComplete');
	}elseif($_SESSION['user_jobs'] == 'already_applied'){
			$smarty->assign('jobs_saved_applied',' '.$search_obj->JText_Return('LBL_JOBS_ALREADY_APPLIED'));
			$smarty->assign('cmessageleft','pcLeft');$smarty->assign('cmessageright','pcRight');$smarty->assign('cmessagecenter','profileComplete');
	}
	
	unset($_SESSION['user_jobs']);
}	
$smarty->assign('search_jobs_selected','selected');
$smarty->assign('fn',$fn);$smarty->assign('cfn',$cfn);
$smarty->assign('menu_count',$fn->get_menu_count());
$smarty->display('search_jobs.tpl');
?>