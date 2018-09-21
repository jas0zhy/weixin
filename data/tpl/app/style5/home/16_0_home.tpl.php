<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<style>
	body{
	font:<?php  echo $_W['styles']['fontsize'];?> <?php  echo $_W['styles']['fontfamily'];?>;
	color:<?php  echo $_W['styles']['fontcolor'];?>;
	padding:0;
	margin:0;
	background-image:url('<?php  if(empty($_W['styles']['indexbgimg'])) { ?>./themes/style5/images/bg_index.jpg<?php  } else { ?><?php  echo $_W['styles']['indexbgimg'];?><?php  } ?>');background-size:cover;}
	background-color:<?php  if(empty($_W['styles']['indexbgcolor'])) { ?>#fbf5df<?php  } else { ?><?php  echo $_W['styles']['indexbgcolor'];?><?php  } ?>;
	<?php  echo $_W['styles']['indexbgextra'];?>
	}
	a{color:<?php  echo $_W['styles']['linkcolor'];?>; text-decoration:none;}
	<?php  echo $_W['styles']['css'];?>
	.box{width:100%; margin:10px auto; padding:0 3%;}
	.box .box-item{float:left; display:inline-block; width:48%; margin:1%; text-align:center; text-decoration:none; outline:none; height:40px; padding:0 10px; overflow:hidden; line-height:40px; color:#FFF; background:rgba(75, 38, 11, 0.9);}
	.box .box-item span{color:<?php  echo $_W['styles']['fontnavcolor'];?>; display:block; width:100%; height:40px; line-height:40px; font-size:14px; overflow:hidden;}
</style>
<div class="box clearfix">
	<?php  if(is_array($navs)) { foreach($navs as $nav) { ?>
	<a href="<?php  echo $nav['url'];?>" class="box-item" title="<?php  echo $nav['name'];?>">
		<span style="<?php  echo $nav['css']['name'];?>"><?php  echo $nav['name'];?></span>
	</a>
	<?php  } } ?>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>