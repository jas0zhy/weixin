<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
<head>
	<title><?php  if($title) { ?><?php  echo $title;?><?php  } else { ?><?php  if(!empty($_W['account']['name'])) { ?><?php  echo $_W['account']['name'];?><?php  } ?><?php  } ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- Mobile Devices Support @begin -->
	<meta content="application/xhtml+xml;charset=UTF-8" http-equiv="Content-Type">
	<meta content="no-cache,must-revalidate" http-equiv="Cache-Control">
	<meta content="no-cache" http-equiv="pragma">
	<meta content="0" http-equiv="expires">
	<meta content="telephone=no, address=no" name="format-detection">
	<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
	<meta name="apple-mobile-web-app-capable" content="yes" /> <!-- apple devices fullscreen -->
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
	<!-- Mobile Devices Support @end -->
	<meta name="keywords" content="微擎" />
	<meta name="description" content="微擎" />
	<link type="text/css" rel="stylesheet" href="/web/resource3/style/bootstrap.css">
	<link type="text/css" rel="stylesheet" href="/web/resource3/style/font-awesome.min.css" />
	<link type="text/css" rel="stylesheet" href="./themes/default/style/common.mobile.css">
	<link type="text/css" rel="stylesheet" href="./themes/style61/css/public.css">
	<script type="text/javascript" src="/web/resource3/script/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="/web/resource3/script/bootstrap.js"></script>
	<script type="text/javascript" src="/web/resource3/script/cascade.js"></script>
	<script type="text/javascript" src="./themes/default/script/jquery.touchwipe.js"></script>
	<script type="text/javascript" src="./themes/default/script/swipe.js"></script>
	<!--[if IE 7]>
	<link rel="stylesheet" href="./resource/style/font-awesome-ie7.min.css">
	<![endif]-->
	<style>
	<?php  if($name == 'home') { ?>
	body {background-image:url(<?php  echo $_W['styles']['homebgimg'];?>); background-color:<?php  echo $_W['styles']['homebgcolor'];?>; <?php  echo $_W['styles']['homebgextra'];?>; }
	<?php  } ?>
	</style>
</head>
<body>
<?php  if(empty($main_off)) { ?><div class="main"><?php  } ?>