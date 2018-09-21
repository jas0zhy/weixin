<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('header', TEMPLATE_INCLUDEPATH)) : (include template('header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('slide', TEMPLATE_INCLUDEPATH)) : (include template('slide', TEMPLATE_INCLUDEPATH));?>
<style>

body{
font:<?php  echo $_W['styles']['fontsize'];?> <?php  echo $_W['styles']['fontfamily'];?>;
color:<?php  echo $_W['styles']['fontcolor'];?>;
padding:0;
margin:0;
background-image:url('<?php  if(empty($_W['styles']['indexbgimg'])) { ?>./themes/style87/images/bg2.png<?php  } else { ?><?php  echo $_W['styles']['indexbgimg'];?><?php  } ?>');
background-size:cover;
background-color:<?php  if(empty($_W['styles']['indexbgcolor'])) { ?>#000000<?php  } else { ?><?php  echo $_W['styles']['indexbgcolor'];?><?php  } ?>;
<?php  echo $_W['styles']['indexbgextra'];?>
}
a{color:<?php  echo $_W['styles']['linkcolor'];?>; text-decoration:none;}
<?php  echo $_W['styles']['css'];?>

.box{
	width:100%;
	overflow:hidden;
	margin-top:15px;
	
}
.box .box-item{
	float:left;
	display:inline-block;
	width:42%;
	text-align:center;
	text-decoration:none;
	outline:none;
	height:51px;
	line-height:50px;
	margin-bottom:5px;
	color:#FFF;
	background-position: 0 center;
	background-image: url(./themes/style87/images/bg.png);
	border-radius:8px;
	border: 1px solid #333;
	margin-top: 0;
	margin-left: 10px;
	padding-left: 10px;
}
.box .box-item i {float: left;height: 35px;width: 35px;margin: 8px 10px 8px 10px;
	overflow: hidden;
	display:inline-block;
}
.box .box-item span{color:<?php  echo $_W['styles']['fontnavcolor'];?>; display:inline-block; font-size:14px;}
</style>
<div class="box">
  <?php  if(is_array($navs)) { foreach($navs as $nav) { ?>
  <a href="<?php  echo $nav['url'];?>" class="box-item">
	  <?php  if(!empty($nav['icon'])) { ?>
	  <i style="background:url(<?php  echo $_W['attachurl'];?><?php  echo $nav['icon'];?>) no-repeat;background-size:cover;"></i>
	  <?php  } else { ?>
	  <i class="<?php  echo $nav['css']['icon']['icon'];?>" style="<?php  echo $nav['css']['icon']['style'];?>"></i>
	  <?php  } ?>
	  <span style="<?php  echo $nav['css']['name'];?>"><?php  echo $nav['name'];?></span>
  </a>
  <?php  } } ?>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('footer', TEMPLATE_INCLUDEPATH)) : (include template('footer', TEMPLATE_INCLUDEPATH));?>

