<?php

/*Note: The following function is used to get industry details*/
  $industry_qry = "call get_industry_details('',0,0);";
  if(!$industry_qrry = $mysql_obj->query($industry_qry)){
	throw new Exception('Problem in executing get industry');
  }
  while($industry_qry_res = $mysql_obj->fetch_array($industry_qrry)){
	$adv_industry[] = $industry_qry_res;
  }
  $smarty->assign('industry',$adv_industry);
/*Note: The following function is used to get department details*/
  $department_qry = "call fr_jobs_department('','".$fn->print_date()."');";
  if(!$department_qrry = $mysql_obj->query($department_qry)){
	throw new Exception('Problem in executing get departments');
  }
  while($department_qry_res = $mysql_obj->fetch_array($department_qrry)){
	$adv_department1[] = $department_qry_res;
  }
  $smarty->assign('adv_department',$adv_department1);
	if(!$list_course_query = $mysql_obj->query("call fr_get_program_details('')")){
		throw new Exception('Problem in executing list (program)course details');
	}
	$i = 0;
	while($course = $mysql_obj->fetch_array($list_course_query)){
		$course_details[$i] =  $course;
		$course_details[$i]['en_id'] = $course['id'];//$cfn->encrypt($course['id']);
		$smarty->assign('list_course',$course_details);
		unset($course);
		$i++;
	}
  // $smarty->assign('department',$adv_department);
 ?> 