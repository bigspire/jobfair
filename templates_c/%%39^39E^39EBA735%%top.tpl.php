<<<<<<< HEAD
<?php /* Smarty version 2.6.26, created on 2017-08-12 11:21:12
=======
<?php /* Smarty version 2.6.26, created on 2017-08-12 11:33:16
>>>>>>> ba5af767a4de9deff3350e4c0b16f470612a3f08
         compiled from ../include/top.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="cache-control" content="public" />
<title><?php echo $this->_tpl_vars['PAGE_TITLE']; ?>
</title>
<!-- CSS
================================================== -->
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['url']; ?>
css/base.css" />
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['url']; ?>
css/style.css" />
<!--link rel="stylesheet" href="<?php echo $this->_tpl_vars['url']; ?>
css/<?php echo $this->_tpl_vars['language_name']; ?>
.css" /-->
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['url']; ?>
css/default.css" />
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['url']; ?>
css/nivo-slider.css" />
<link href="<?php echo $this->_tpl_vars['url']; ?>
css/agile_carousel.css" rel="stylesheet" media="screen" />
<link href="<?php echo $this->_tpl_vars['url']; ?>
css/skyblue/jquery-ui-1.8.23.custom.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['url']; ?>
css/simplemodal.css" />
<?php if ($_GET['pagen'] == 'emp_packages' || $_GET['pagen'] == 'additional_purchase' || $_GET['pagen'] == 'college_plans'): ?>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.8.20/themes/base/jquery-ui.css" type="text/css" media="all" />
<?php endif; ?>
<!-- Facebook Pixel Code -->
<?php echo '
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version=\'2.0\';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,\'script\',\'https://connect.facebook.net/en_US/fbevents.js\');

fbq(\'init\', \'614245518726206\');
fbq(\'track\', "PageView");</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=614245518726206&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
'; ?>

<!-- JS
================================================== -->
<link rel="shortcut icon" href="<?php echo $this->_tpl_vars['url']; ?>
images/favicon.ico" type="image/x-icon">
<link rel="icon" href="<?php echo $this->_tpl_vars['url']; ?>
images/favicon.ico"  type="image/x-icon" />
</head>
<noscript><p class="no_script">
In order to sign up for a JobsFactory Account or access JobsFactory, you need to have JavaScript enabled in your browser. <a  href="http://jobsfactory.in">Refresh this page after you have enabled JavaScript.</a>
</p></noscript>
<body class="<?php echo $this->_tpl_vars['language_name']; ?>
 <?php echo $this->_tpl_vars['bg_cls']; ?>
">
<input type="hidden" id="home_root" value="<?php echo @webroot; ?>
"/>