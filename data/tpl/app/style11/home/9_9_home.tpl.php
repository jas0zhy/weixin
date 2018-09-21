<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<style>
	body{
	font:<?php  echo $_W['styles']['fontsize'];?> <?php  echo $_W['styles']['fontfamily'];?>;
	color:<?php  echo $_W['styles']['fontcolor'];?>;
	padding:0;
	margin:0;
	background-image:url('<?php  if(empty($_W['styles']['indexbgimg'])) { ?>./themes/style11/images/bg_index.jpg<?php  } else { ?><?php  echo $_W['styles']['indexbgimg'];?><?php  } ?>');background-size:cover;
	background-color:<?php  if(empty($_W['styles']['indexbgcolor'])) { ?>#fbf5df<?php  } else { ?><?php  echo $_W['styles']['indexbgcolor'];?><?php  } ?>;
	<?php  echo $_W['styles']['indexbgextra'];?>
	}
	a{color:<?php  echo $_W['styles']['linkcolor'];?>; text-decoration:none;}
	<?php  echo $_W['styles']['css'];?>
	.box{width:93%;overflow:hidden;margin-top:80%;padding-left:7%;}
	.box .box-item{float:left; display:inline-block; width:48%; text-align:center; margin:0 1%; text-decoration:none; padding:0 10px; overflow:hidden; outline:none; height:40px; line-height:40px; margin-bottom:5px; color:#FFF; background:rgba(0, 0, 0, 0.4);}
	.box .box-item span{color:<?php  echo $_W['styles']['fontnavcolor'];?>; display:block; font-size:14px; width:100%; overflow:hidden;}
</style>
<div class="box clearfix">
	<?php  if(is_array($navs)) { foreach($navs as $nav) { ?>
	<a href="<?php  echo $nav['url'];?>" class="box-item">
		<span style="<?php  echo $nav['css']['name'];?>" title="<?php  echo $nav['name'];?>"><?php  echo $nav['name'];?></span>
	</a>
	<?php  } } ?>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>