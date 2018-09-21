<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('header', TEMPLATE_INCLUDEPATH)) : (include template('header', TEMPLATE_INCLUDEPATH));?>
<style>
body{font:<?php  echo $_W['styles']['fontsize'];?> <?php  echo $_W['styles']['fontfamily'];?>; color:<?php  echo $_W['styles']['fontcolor'];?>;padding:0;margin:0;background-image:url('<?php  if(empty($_W['styles']['indexbgimg'])) { ?>./themes/style91/images/bg2.jpg<?php  } else { ?><?php  echo $_W['styles']['indexbgimg'];?><?php  } ?>');background-size:cover;<?php  if(!empty($_W['styles']['indexbgcolor'])) { ?> background-color:<?php  echo $_W['styles']['indexbgcolor'];?>;<?php  } ?><?php  echo $_W['styles']['indexbgextra'];?>}
a,a:hover{color:<?php  if(empty($_W['styles']['linkcolor'])) { ?>#FFF<?php  } else { ?><?php  echo $_W['styles']['linkcolor'];?><?php  } ?>; text-decoration:none;}
<?php  echo $_W['styles']['css'];?>
.clear{clear:both;line-height:0;height:0;font-size:0;overflow:hidden;}
img{border:0;}
.box {
	margin-top: 30px;
	margin-left: 15px;
	display: block-inline;	
	overflow: hidden;
}
.c1 {
	font-size: 24px;
	padding: 5px;
	background-color: #900;
	opacity: 0.5;
	display: block;
	width: 190px;
	text-align: center;color: #FFF;
}
.c2 {
	font-size: 16px;
	padding: 5px;
	display: block-inline;color: #FFF;
}
.c3 {
	background-color: #FFF;
	height: 120px;
	width: 120px;
	margin-top: 15px;
	border-radius:0 60px 60px 60px;
	-moz-border-radius:0 60px 60px 60px; /* Old Firefox */
	text-align: center;
	display: block;
	overflow: hidden;
}
.c3 img {
	display: block;
	height: 62px;
	width: 62px;
	margin: 15px auto 5px auto;
}
.c3 span {
	color: #816e02;
	font-size: 14px;
	display: block;
}
.c4 {
	background-color: #FFF;
	height: 82px;
	width: 82px;
	margin-top: 40px;
	border-radius:41px 41px 0px 41px;
	-moz-border-radius:41px 41px 0px 41px; /* Old Firefox */
	text-align: center;
	overflow: hidden;
	margin-left: 110px;
	float: left;
	margin-right: 3px;
	display: block-inline;
}
.c4 img {	display: block;
	height: 35px;
	width: 35px;
	margin: 10px auto 5px auto;}
.c4 span {
	color: #816e02;
	font-size: 14px;
	display: block;
}
.c5 {
	background-color: #FFF;
	height: 82px;
	width: 82px;
	margin-top: 40px;
	border-radius:41px 41px 41px 0px;
	-moz-border-radius:41px 41px 41px 0px; /* Old Firefox */
	text-align: center;
	display: block;
	overflow: hidden;
	float: left;
}
.c5 img {	display: block;
	height: 35px;
	width: 35px;
	margin: 10px auto 5px auto;}
.c5 span {
	color: #816e02;
	font-size: 14px;
	display: block;
}
.c6 {
	background-color: #FFF;
	height: 82px;
	width: 82px;
	margin-top: 3px;
	border-radius:41px 0px 41px 41px;
	-moz-border-radius:41px 0px 41px 41px; /* Old Firefox */
	text-align: center;
	overflow: hidden;
	margin-left: 110px;
	float: left;
	margin-right: 3px;
	clear: left;
	display: block-inline;	
}
.c6 img {	display: block;
	height: 35px;
	width: 35px;
	margin: 10px auto 5px auto;}
.c6 span {
	color: #816e02;
	font-size: 14px;
	display: block;
}
.c7 {
	background-color: #FFF;
	height: 82px;
	width: 82px;
	margin-top: 3px;
	border-radius:0px 41px 41px 41px;
	-moz-border-radius:0px 41px 41px 41px; /* Old Firefox */
	text-align: center;
	display: block;
	overflow: hidden;
	float: left;
}
.c7 img {	display: block;
	height: 35px;
	width: 35px;
	margin: 10px auto 5px auto;}
.c7 span {
	color: #816e02;
	font-size: 14px;
	display: block;
}
</style>

<div class="box">
  <div class="c1">微擎</div>
  <div class="c2">QQ: 571188953</div>
  <a href="<?php  echo $navs[0]['url'];?>" class="c3"><img src="./themes/style91/images/tp_01.png" /><span><?php  echo $navs[0]['name'];?></span></a>
  <a href="<?php  echo $navs[1]['url'];?>" class="c4"><img src="./themes/style91/images/tp_04.png" /><span><?php  echo $navs[1]['name'];?></span></a>
  <a href="<?php  echo $navs[2]['url'];?>" class="c5"><img src="./themes/style91/images/tp_06.png" /><span><?php  echo $navs[2]['name'];?></span></a>
  <a href="<?php  echo $navs[3]['url'];?>" class="c6"><img src="./themes/style91/images/tp_07.png" /><span><?php  echo $navs[3]['name'];?></span></a>
  <a href="<?php  echo $navs[4]['url'];?>" class="c7"><img src="./themes/style91/images/tp_08.png" /><span><?php  echo $navs[4]['name'];?></span></a>
</div>
<div class="clear"></div>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('footer', TEMPLATE_INCLUDEPATH)) : (include template('footer', TEMPLATE_INCLUDEPATH));?>