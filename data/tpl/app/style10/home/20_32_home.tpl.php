<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('header', TEMPLATE_INCLUDEPATH)) : (include template('header', TEMPLATE_INCLUDEPATH));?>
<style>
	body{
	font:<?php  echo $_W['styles']['fontsize'];?> <?php  echo $_W['styles']['fontfamily'];?>;
	color:<?php  echo $_W['styles']['fontcolor'];?>;
	padding:0;
	margin:0;
	background-image:url('<?php  if(empty($_W['styles']['indexbgimg'])) { ?>./themes/style10/images/bg_index.jpg<?php  } else { ?><?php  echo $_W['styles']['indexbgimg'];?><?php  } ?>');background-size:cover;
	background-color:<?php  if(empty($_W['styles']['indexbgcolor'])) { ?>#fbf5df<?php  } else { ?><?php  echo $_W['styles']['indexbgcolor'];?><?php  } ?>;
	<?php  echo $_W['styles']['indexbgextra'];?>
	}
	a{color:<?php  echo $_W['styles']['linkcolor'];?>; text-decoration:none;}
	<?php  echo $_W['styles']['css'];?>
	.box{width:100%; padding:0 3%; margin-top:80%;}
	.box .box-item{float:left; display:inline-block; width:48%; margin:1%; padding:0 10px; text-align:center; text-decoration:none;outline:none; height:40px; line-height:40px; color:#FFF; background:rgba(163, 143, 92, 0.7);}
	.box .box-item span{color:<?php  echo $_W['styles']['fontnavcolor'];?>; display:block; font-size:14px; width:100%; height:40px; line-height:40px; overflow:hidden;}
</style>
<div class="box clearfix">
	<?php  if(is_array($navs)) { foreach($navs as $nav) { ?>
	<a href="<?php  echo $nav['url'];?>" class="box-item">
		<span style="<?php  echo $nav['css']['name'];?>" title="<?php  echo $nav['name'];?>"><?php  echo $nav['name'];?></span>
	</a>
	<?php  } } ?>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('footer', TEMPLATE_INCLUDEPATH)) : (include template('footer', TEMPLATE_INCLUDEPATH));?>