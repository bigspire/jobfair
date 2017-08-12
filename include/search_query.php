<?php 
		
		$similor_jobs = '';
		/*Note: get similar jobs keywords*/
		//--Start
		if($_GET['type'] == 'similar_jobs'){
			$similor_jobs = 's';
			$skeywords = $cfn->qstring_after_replace($_GET['skeywords']);
			$skeywords = trim(strtolower($skeywords)) == 'type text here'?'':trim($skeywords);
			$skeywords = str_replace('sharp','#',$skeywords);
			$sjob_type =  (strtolower($_GET['sjob_type']) == 'full time') ? 'F' : (strtolower($_GET['sjob_type']) == 'part time' ? 'P' : (strtolower($_GET['sjob_type']) == 'contract' ? 'C' : ''));
			$smin_exp = (strstr(strtolower($_GET['smin_exp']),'months') != '') ? ('0.'.str_replace('months','',strtolower($_GET['smin_exp']))) :(strstr(strtolower($_GET['smin_exp']),'year') ? str_replace('year','',strtolower($_GET['smin_exp'])) :'');
			$smax_exp = (strstr(strtolower($_GET['smax_exp']),'months') != '') ? ('0.'.str_replace('months','',strtolower($_GET['smax_exp']))) :(strstr(strtolower($_GET['smax_exp']),'year') ? str_replace('year','',strtolower($_GET['smax_exp'])) :'');
			$smin_salary = $_GET['smin_salary'] > 0 ? $_GET['smin_salary'] : 0;
			$smax_salary = $_GET['smax_salary'] > 0 ? $_GET['smax_salary'] : 0;
			$smin_exp = floatval($smin_exp);$smax_exp = floatval($smax_exp);
			$smin_salary = floatval($smin_salary);$smax_salary = floatval($smax_salary);
			$similar_jobs_str = '&type=similar_jobs';
			$similar_jobs_str .= '&skeywords='.$_GET['skeywords'];
			$similar_jobs_str .= '&sjob_type='.$_GET['sjob_type'];
			$similar_jobs_str .= '&smin_exp='.$_GET['smin_exp'];
			$similar_jobs_str .= '&smax_exp='.$_GET['smax_exp'];
			$similar_jobs_str .= '&smin_salary='.$_GET['smin_salary'];
			$similar_jobs_str .= '&smax_salary='.$_GET['smax_salary'];
			$similar_jobs_str .= '&similar_job='.$_GET['similar_job'];
			
		}
		//--End
		$get_array = array('keywords','location','company');
		for($i = 0;$i< count($get_array);$i++){
			if($_GET[$get_array[$i]] != ''){
				$_GET[$get_array[$i]] = $cfn->qstring_after_replace($_GET[$get_array[$i]]);
			}	
		}
		$keywords = (isset($_POST['keywords']))?$_POST['keywords']:(isset($_GET['keywords'])?$_GET['keywords']:$_GET['keywords']);
		$keywords = trim(strtolower($keywords)) == 'type text here'?'':trim($keywords);
		$keywords = str_replace('sharp','#',$keywords);
	    $smarty->assign('keywords',$keywords);
		$location = (isset($_POST['location']))?$_POST['location']:(isset($_GET['location'])?$_GET['location']:$_GET['location']);
		$location = trim(strtolower($location)) == 'type text here'?'':trim($location);
    	$min_exp = (strstr(strtolower($_GET['min_exp']),'months') != '') ? ('0.'.str_replace('months','',strtolower($_GET['min_exp']))) :(strstr(strtolower($_GET['min_exp']),'year') ? str_replace('year','',strtolower($_GET['min_exp'])) :'');
	 	$max_exp = (strstr(strtolower($_GET['max_exp']),'months') != '') ? ('0.'.str_replace('months','',strtolower($_GET['max_exp']))) :(strstr(strtolower($_GET['max_exp']),'year') ? str_replace('year','',strtolower($_GET['max_exp'])) :'');
		$min_salary = $_GET['min_salary'] > 0 ? $_GET['min_salary'] : 0;
		$max_salary = $_GET['max_salary'] > 0 ? $_GET['max_salary'] : 0;
		
		
		$status = (isset($_POST['status']))?$_POST['status']:$_GET['status'];
		$industry = '';
		foreach(explode(',',$_GET['industries']) as $value){
		   if($value) $industry = $industry.",'$value'"; 
		}
		$industry = substr($industry,1,strlen($industry));
	
		/*$company_name = '';
		foreach(explode(',',$_GET['company']) as $value){
		   if($value) $company_name = $company_name.",$value"; 
		}*/
		$company_name = $_GET['company'];
		$department = '';$sdepartment = '';
		foreach(explode(',',$_GET['department']) as $value){
		   if($value) {
			$department = $department.",'$value'"; 
			$sdepartment = $sdepartment.",'$value'"; 
		   }	
		   
		}
	
		
		$job_type =  (strtolower($_GET['job_type']) == 'full time') ? 'F' : (strtolower($_GET['job_type']) == 'part time' ? 'P' : (strtolower($_GET['job_type']) == 'contract' ? 'C' : 'I'));
		
		$department = substr($department,1,strlen($department));
		$sdepartment = substr($sdepartment,1,strlen($sdepartment));
		$smarty->assign('search_education',$education = $_GET['education']);
		
		//Note: The Following script is used to search jobs by keywords	
		/* Start */
		/*if(strstr($_GET['keywords'],':') != ''){
		   $keywords = '' ;$company_name = '';
			$key_values = array('job','edu','exp','sal','comp');
			foreach(explode(';',$_GET['keywords']) as $string){
			
				 $split_key = explode(':',$string);
				 if(in_array(strtolower(trim($split_key[0])),$key_values)){
				      switch(strtolower(trim($split_key[0]))){
						case 'comp':
						     $company_name = $company_name.(trim($company_name)!=''?', ':'').$split_key[1]; // get job keywords or company_name.
							 $_GET['company']  = $company_name;
						      break;
						case 'job':
						     $keywords = $keywords.(trim($keywords)!=''?', ':'').$split_key[1]; // get job keywords or company_name.
						      break;
						case 'edu':
 					          $education = trim($split_key[1]); // get education values
							  $smarty->assign('search_education',$education);
						      break;
					    case 'exp':			
							 $split_exp = explode('-',$split_key[1]);
							 if(count($split_exp) == 2 && intval($split_exp[0]) >= 0 && intval($split_exp[1]) >= 0 ){
								$min_exp = $split_exp[0];
								$max_exp = $split_exp[1];
							}else{
								$min_exp = $split_exp[0];
							}
							$_GET['min_exp'] = (intval($min_exp) > 0) ? $min_exp.' Year'.(intval($min_exp) > 1 ? 's':'') : $_GET['min_exp'];
							$_GET['max_exp'] = (intval($max_exp) > 0) ? $max_exp.' Year'.(intval($max_exp) > 1 ? 's':'') : $_GET['min_exp'];
							// get min and max experience datails
							break;	
						case 'sal':			
							 $split_exp = explode('-',$split_key[1]);
						
							 if(count($split_exp) == 2){
								$min_salary = intval($split_exp[0]);
								$max_salary = intval($split_exp[1]);
								if(strtolower(substr(trim($split_exp[1]),strlen(trim($split_exp[1]))-1,strlen(trim($split_exp[1])))) == 'k')
								   $max_salary = $max_salary * 1000;
								elseif(strtolower(substr(trim($split_exp[1]),strlen(trim($split_exp[1]))-1,strlen(trim($split_exp[1])))) == 'l')
								   $max_salary = $max_salary * 100000;
								$_GET['max_salary']= $max_salary;     
							}  	
							else{
								$min_salary = intval($split_exp[0]);
							}
							if(strtolower(substr(trim($split_exp[0]),strlen(trim($split_exp[0]))-1,strlen(trim($split_exp[0])))) == 'k')
							   $min_salary = $min_salary * 1000;
							elseif(strtolower(substr(trim($split_exp[0]),strlen(trim($split_exp[0]))-1,strlen(trim($split_exp[0])))) == 'l')
							   $min_salary = $min_salary * 100000;
							$_GET['min_salary'] = $min_salary;
							// get min and max salary datails
							break;
					
												
					}
				  }
				  else{
				       if(trim($string))
					   $keywords = $keywords.(trim($keywords)!=''?', ':'').$string; // get job keywords or company_name.die;
				  }
			}
		}*/
		/* End */
		
			$xii_std = $_GET['xii_std'] == '1' ? '1' : '0';
		$x_std = $_GET['x_std'] == '1' ? '1' : '0';
			$qualification = '';
		$inc = 0;
		
		foreach(explode(',',$_GET['program']) as $value){
			if($value ) {
				$values = explode('+',$value);
				if(($values[1]!='X' && $values[1] !='XII')) {
					$qualification = $qualification.',"'.$values[1].'"'; 
					$qualification_key[$inc]['program_id'] = $value;
					$qualification_key[$inc]['program'] = $values[1];
					$qualification_key[$inc]['id'] = $values[0];
					$inc++;
				}	
			
		   }	
		}
		
		 $qualification = substr($qualification,1,strlen($qualification));
	     $smarty->assign('qualification_key',$qualification_key);
		$degree = '';
		$i = 0;
		foreach(explode(',',$_GET['course']) as $value){
		   if($value) {
				$values = explode('+',$value);
				$degree = $degree.',"'.$values[2].'"'; 
				$degree_id[$i][0] = $values[0];
				$degree_id[$i][1] = $values[1]; 
				$course_key[$i]['course_id'] = $value;
				$course_key[$i]['course'] = $values[2];
				$course_key[$i]['program_id'] = $values[1];
				$course_key[$i]['id'] = $values[0];
				
				$i++;
			}		   
		}
	
		
		$degree = substr($degree,1,strlen($degree));
	   $smarty->assign('course_key',$course_key);
		$specialization = '';$i = 0;
		foreach(explode(',',$_GET['specialization']) as $value){
		   if($value) {
				$values = explode('+',$value);
				$specialization = $specialization.',"'.$values[3].'"';
				$specialization_id[$i][0] = $values[0];
				$specialization_id[$i][1] = $values[1]; 				
				$specialization_id[$i][2] = $values[2];
				$specialization_key[$i]['specialization_id'] = $value;
				$specialization_key[$i]['specialization'] = $values[3];
				$specialization_key[$i]['program_id'] = $values[2];
				$specialization_key[$i]['course_id'] = $values[1];
				$i++;
		   }
		}
		$specialization = substr($specialization,1,strlen($specialization));
		 $smarty->assign('specialization_key',$specialization_key);
		$smarty->assign('course_sel',explode(',',str_replace('"','',$degree)));
		$smarty->assign('course_sel_id',$degree_id);
		$smarty->assign('specialization_sel',explode(',',str_replace('"','',$specialization)));
		$smarty->assign('specialization_id',$specialization_id);
		
		$min_exp = floatval($min_exp);$max_exp = floatval($max_exp);
		$min_salary = floatval($min_salary);$max_salary = floatval($max_salary);
		$searchby_label = ($_GET['searchby'] == 'locations' ? 'Location' : ($_GET['searchby'] == 'industry' ? 'Industries' : ($_GET['searchby'] == 'companies' ? 'Companies' : '')));		
		if(trim($_GET['searchby']) != '') {
			switch(trim($_GET['searchby'])) {
				case 'locations':
					$searchby = trim($_GET['searchby']);
					$searchby_label = $search_obj->JText_Return('LBL_LOCATION');
					$searchby_label_link = 'more_location/';
					break;				
				case 'industry':
					$searchby = trim($_GET['searchby']);
					$searchby_label = $search_obj->JText_Return('LBL_INDUSTRIES');
					$searchby_label_link = 'more_industry/';
					break;
				case 'companies':
					$searchby = trim($_GET['searchby']);
					$searchby_label = $search_obj->JText_Return('LBL_COMPANIES');
					$searchby_label_link = 'more_company/';
					break;	
			}
		}
		else {
			$searchby = 'search';
			$searchby_label = $search_obj->JText_Return('LBL_SEARCH_JOBS');
			$searchby_label_res = $search_obj->JText_Return('LBL_SEARCH_JOBS');
			$searchby_label_link = 'search_jobs/';
		}
		$searchby = ($_GET['searchby'] == 'locations' || $_GET['searchby'] == 'industry' || $_GET['searchby'] == 'companies') ? $_GET['searchby'] : '';		
		
		$sorting_query_string = ($keywords!='' ? '&keywords='.$cfn->qstring_before_replace($keywords):'').($location!='' ? '&location='.$cfn->qstring_before_replace($location):'').($education!='' ? '&education='.$education:'').($_GET['min_exp']!=''? '&min_exp='.$_GET['min_exp']:'').($_GET['max_exp']!=''? '&max_exp='.$_GET['max_exp']:'').($_GET['min_salary']!=''? '&min_salary='.$_GET['min_salary']:'').($_GET['max_salary']!=''? '&max_salary='.$_GET['max_salary']:'');
		$sorting_query_string = $sorting_query_string.($_GET['company']!=''? '&company='.$cfn->qstring_before_replace($_GET['company']):'').($_GET['job_type']!=''? '&job_type='.$_GET['job_type']:'').($_GET['job_posted']!=''? '&job_posted='.$_GET['job_posted']:'').($_GET['department']!=''? '&department='.$_GET['department']:'').($_GET['industries']!=''? '&industries='.$_GET['industries']:'').($searchby != '' ? '&searchby='.$searchby  : '');
		$sorting_query_string .= (isset($_GET['x_std'])) ? "&x_std=".$_GET['x_std'] : '';
		$sorting_query_string .= (isset($_GET['xii_std'])) ? "&xii_std=".$_GET['xii_std'] : '';
		$sorting_query_string .= (isset($_GET['program'])) ? "&program=".$_GET['program'] : '';
		$sorting_query_string .= (isset($_GET['course'])) ? "&course=".$_GET['course'] : '';
		$sorting_query_string .= (isset($_GET['show'])) ? "&show=".$_GET['show'] : '';
		$sorting_query_string .= (isset($_GET['specialization'])) ? "&specialization=".$_GET['specialization'] : '';
		$sorting_query_string .= ($_GET['search_from'] == 'advance' && $sorting_query_string != '')? '&search_from='.$_GET['search_from'] : '';
		$sorting_query_string .= $similar_jobs_str;
		
		$smarty->assign('searchby',$searchby);
		$smarty->assign('searchby_label',$searchby_label);
		$smarty->assign('searchby_label_link',$searchby_label_link);
		$smarty->assign('sorting_query_string',$sorting_query_string);
		$order_str .= (isset($_GET['field'])) ? "&field=".$_GET['field'] : '';
		$order_str .= (isset($_GET['order'])) ? "&order=".$_GET['order'] : '';
		$smarty->assign('order_str',$order_str);
		
		$smarty->assign('searchby_label_res',$searchby_label_res);
		
		$smarty->assign('location',$location);
		
		$smarty->assign('search_keywords',$keywords);//explode(',',$keywords)
		
		$smarty->assign('search_keywords_tab',explode(',',$keywords));//
		
		$smarty->assign('company_name',$company_name);//explode(',',$company_name)
		$smarty->assign('company_name_tab',explode(',',$company_name));//
		
		
		$smarty->assign('search_industries',explode(',', str_replace("'",'',$industry)));
		
		$smarty->assign('search_department',explode(',',str_replace("'",'',$department)));
		

		/*$search_fields[] = $keywords !=''? $keywords : '';$search_fields_color[] = 'keyBg';
		$search_fields[] = $location !=''? $location : '';$search_fields_color[] = 'locBg';
		$search_fields[] = $education !=''? $education : '';$search_fields_color[] = 'eduBg';
		$search_fields[] = $_GET['min_exp'] !=''? $_GET['min_exp'] : '';$search_fields_color[] = 'expBg minBg';
		$search_fields[] = $_GET['max_exp'] !=''? $_GET['max_exp']:'';$search_fields_color[] = 'expBg maxBg';
		$search_fields[] = $_GET['min_salary'] !=''? $_GET['min_salary'] : '';$search_fields_color[] = 'salBg minsalBg';
		$search_fields[] = $_GET['max_salary'] !=''? $_GET['max_salary'] : '';	$search_fields_color[] = 'salBg maxsalBg';
		$search_fields[] = $_GET['industries'] !=''? $_GET['industries'] : '';$search_fields_color[] = 'comBg indBg';
		
		$search_fields[] = $_GET['company'] !=''? $_GET['company'] : '';$search_fields_color[] = 'comBg comBg1';
		$search_fields[] = $_GET['department'] !=''? $_GET['department'] :'';$search_fields_color[] = 'comBg deptBg';
		$search_fields[] = $_GET['job_type'] !=''? $_GET['job_type'] : '';$search_fields_color[] = 'salBg';
		$search_fields[] = $_GET['job_posted'] !=''? $_GET['job_posted'] : '';$search_fields_color[] = 'comBg jobBg';
	
		
	
		//$smarty->assign('search_fields',explode(',',substr($search_fields,0,strlen($search_fields)-1)));
		$smarty->assign('search_fields',$search_fields);
		$smarty->assign('search_fields_color',$search_fields_color);*/
		
		
		$smarty->assign('search_location',$location);//explode(',',$location)
		$smarty->assign('search_location_tab',explode(',',$location));
		
		$smarty->assign('esearch_education',explode(',',$education));
		$default_img = 'order_normal';									 
	    $sort_fields = array('1' => 'date','title','company_name','industry','city','experience','relevance','salary','recent_jobs','job_posted','premium_jobs');
		$org_fields = array('1' => 'j.created_date', 'j.job_title', 'c.company_name','i.industry_name','c.city','min_exp','relevance','salary','j.created_date','j.created_date','is_hot');
		// set the condition to check ascending or descending order		
		$order = ($_GET['order'] == 'desc') ? 'asc' :  'desc';		
		if($_GET['field'] == 'premium_jobs'){
			$_GET['order'] = 'desc'; $order = 'asc';
		}
		
		// if no fields are set, set default sort image
		if(empty($_GET['field'])){
			$order = 'desc';
			$field = 'relevance';
		}	
		$smarty->assign('order', $order);
		// set the original field for the sql query
		if($search_key = array_search($_GET['field'], $sort_fields)){
			$field =  $org_fields[$search_key];
		}		
?>