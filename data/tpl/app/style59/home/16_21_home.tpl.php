<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php  if($title) { ?><?php  echo $title;?><?php  } else { ?><?php  if(!empty($_W['account']['name'])) { ?><?php  echo $_W['account']['name'];?><?php  } ?><?php  } ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- Mobile Devices Support @begin -->
    <meta content="application/xhtml+xml;charset=UTF-8" http-equiv="Content-Type">
    <meta content="no-cache,must-revalidate" http-equiv="Cache-Control">
    <meta content="no-cache" http-equiv="pragma">
    <meta content="0" http-equiv="expires">
    <meta content="telephone=no, address=no" name="format-detection">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="apple-mobile-web-app-capable" content="yes" /> <!-- apple devices fullscreen -->
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <link type="text/css" rel="stylesheet" href="./themes/style59/style/index.css" />
    <script type="text/javascript" src="./themes/style59/script/jquery.js"></script>
    <script type="text/javascript" src="./themes/style59/script/jquery-1.2.6.pack.js"></script>
    <script type="text/javascript" src="./themes/style59/script/g.base.js"></script>
    <script type="text/javascript" src="./themes/style59/script/iscroll.js"></script>
    <script type="text/javascript" src="./themes/style59/script/alert.js"></script>
    <script type="text/javascript" src="./themes/style59/script/common.js"></script>
    <script type="text/javascript" src="./themes/default/script/swipe.js"></script>

</head>

<body>
<header>
    <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('slide', TEMPLATE_INCLUDEPATH)) : (include template('slide', TEMPLATE_INCLUDEPATH));?>
<div data-role="content" class="content">
    <div class="container">

        <?php  $num=0;?>
        <?php  if(is_array($navs)) { foreach($navs as $nav) { ?>

        <?php  if($num==0) { ?>
        <div class="container_main_3" >
            <a href="<?php  echo $nav['url'];?>" class="pic0">
                <div class="img1" style="background:url(./resource/attachment/<?php  echo $nav["icon"];?>) top center no-repeat; background-size:contain"></div>
                <div class="text1"><?php  echo $nav['name'];?></div>
            </a>
        </div>
        <?php  } ?>
        <?php  if($num==1) { ?>
        <div class="container_main_4" >
            <a href="<?php  echo $nav['url'];?>" data-role="none">
                <div class="img" style="background:url(./resource/attachment/<?php  echo $nav["icon"];?>) top center no-repeat; background-size:contain"></div>
                <div class="text"><?php  echo $nav['name'];?></div>
            </a>
        </div>
        <?php  } ?>
        <?php  if($num>1 && $num<4) { ?>
            <?php  if($num==2) { ?><div class="container_main_1"><?php  } ?>

                <a href="<?php  echo $nav['url'];?>" data-role="none">
                    <div class="img" style="background:url(./resource/attachment/<?php  echo $nav["icon"];?>) top center no-repeat; background-size:contain"></div>
                    <div class="text"><?php  echo $nav['name'];?></div>
                </a>

            <?php  if($num==3) { ?></div><?php  } ?>
        <?php  } ?>
        <?php  if($num>=4 && $num<6) { ?>
            <?php  if($num==4) { ?><div class="container_main_2"><?php  } ?>

                <a href="<?php  echo $nav['url'];?>" data-role="none">
                   <div class="img" style="background:url(./resource/attachment/<?php  echo $nav["icon"];?>) top center no-repeat; background-size:contain"></div>
                   <div class="text"><?php  echo $nav['name'];?></div>
                </a>

            <?php  if($num==5) { ?></div><?php  } ?>
        <?php  } ?>

        <?php  $num++;?>
        <?php  } } ?>



    </div>
</div>

<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('footer', TEMPLATE_INCLUDEPATH)) : (include template('footer', TEMPLATE_INCLUDEPATH));?>