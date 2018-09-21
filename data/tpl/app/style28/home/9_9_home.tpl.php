<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<style>
	body{
	font:<?php  echo $_W['styles']['fontsize'];?> <?php  echo $_W['styles']['fontfamily'];?>;
	color:<?php  echo $_W['styles']['fontcolor'];?>;
	padding:0;
	margin:0;
	background-image:url('<?php  if(!empty($_W['styles']['indexbgimg'])) { ?><?php  echo $_W['styles']['indexbgimg'];?><?php  } ?>');
	background-size:cover;
	background-color:<?php  if(empty($_W['styles']['indexbgcolor'])) { ?>#FFFFFF<?php  } else { ?><?php  echo $_W['styles']['indexbgcolor'];?><?php  } ?>;
	<?php  echo $_W['styles']['indexbgextra'];?>
	}
	a{color:<?php  echo $_W['styles']['linkcolor'];?>; text-decoration:none;}
	<?php  echo $_W['styles']['css'];?>
	.box{margin:3.8% 0 0 2.5%; overflow:hidden;}
	.box .box-item{float:left; display:block; text-align:center; text-decoration:none; width:31.1%; margin:0 2% 5% 0; height:90px; position:relative; color:#ffffff; overflow:hidden;}
	.box .box-item i{display:block; width:100%; height:65px; line-height:65px; font-size:35px; color:#FFF; overflow:hidden;}
	.box .box-item img{display:inline-block; height:65px; margin:0 auto;}
	.box .box-item span{color:<?php  echo $_W['styles']['fontnavcolor'];?>;display:block; font-size:14px; width:90%; margin:0 5%; height:25px; line-height:25px; text-align:center; overflow:hidden;}
</style>
<div class="box clearfix">
	<?php  $num = 0;?>
	<?php  if(is_array($navs)) { foreach($navs as $nav) { ?>
	<?php  if($num == 0) $bg = '#92cf68';?>
	<?php  if($num == 1) $bg = '#58b3df';?>
	<?php  if($num == 2) $bg = '#f3c044';?>
	<?php  if($num == 3) $bg = '#f96567';?>
	<?php  if($num == 4) $bg = '#f6774a';?>
	<?php  if($num == 5) $bg = '#c066a6';?>
	<a href="<?php  echo $nav['url'];?>" class="box-item" style="background:<?php  echo $bg;?>;">
		<?php  if(!empty($nav['icon'])) { ?>
		<img src="<?php  echo $_W['attachurl'];?><?php  echo $nav['icon'];?>">
		<?php  } else { ?>
		<i class="fa <?php  echo $nav['css']['icon']['icon'];?>" style="<?php  echo $nav['css']['icon']['style'];?>"></i>
		<?php  } ?>
		<span style="<?php  echo $nav['css']['name'];?>" title="<?php  echo $nav['name'];?>"><?php  echo $nav['name'];?></span>
	</a>
	<?php  $num++; if($num > 5) $num = 0;?>
	<?php  } } ?>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/slide', TEMPLATE_INCLUDEPATH)) : (include template('common/slide', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>