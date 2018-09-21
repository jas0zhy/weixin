<?php defined('IN_IA') or exit('Access Denied');?><html lang="zh-CN">
<head>
    <style type="text/css">@charset "UTF-8";
    [ng\:cloak], [ng-cloak], [data-ng-cloak], [x-ng-cloak], .ng-cloak, .x-ng-cloak, .ng-hide:not(.ng-hide-animate) {
        display: none !important;
    }

    ng\:form {
        display: block;
    }</style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta content="telephone=no" name="format-detection">
    <title><?php  echo $title;?></title>
    <link data-turbolinks-track="true" href="<?php echo RES;?>/mobile/<?php  echo $this->cur_tpl?>/assets/diandanbao/weixin.css" media="all" rel="stylesheet">

    <meta content="authenticity_token" name="csrf-param">
    <meta content="cXk+78gqnnSP4bi9RonnR3684TKbGugMO3TZP5AYomw=" name="csrf-token">

    <style type="text/css">@media screen {
        .smnoscreen {
            display: none
        }
    }

    @media print {
        .smnoprint {
            display: none
        }
    }</style>
</head>
<body>
<div ng-view="" style="height: 100%;" class="ng-scope">
    <div class="ddb-nav-header ng-scope" common-header="">
        <div class="nav-left-item" onclick="location.href='<?php  echo $this->createMobileUrl('detail', array('id' => $id), true)?>';"><i class="fa fa-angle-left"></i></div>
        <div class="header-title ng-binding"><?php  echo $title;?></div>
    </div>
    <div id="ddb-branch-introduction" class="main-view ng-binding ng-scope">
        <?php  echo htmlspecialchars_decode($item['content'])?>
    </div>
</div>
</body>
</html>