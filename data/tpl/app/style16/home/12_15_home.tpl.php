<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/slide', TEMPLATE_INCLUDEPATH)) : (include template('common/slide', TEMPLATE_INCLUDEPATH));?>
<style>
	body{
	font:<?php  echo $_W['styles']['fontsize'];?> <?php  echo $_W['styles']['fontfamily'];?>;
	color:<?php  echo $_W['styles']['fontcolor'];?>;
	padding:0;
	margin:0;
	background-image:url('<?php  if(!empty($_W['styles']['indexbgimg'])) { ?><?php  echo $_W['styles']['indexbgimg'];?><?php  } ?>');
	background-size:cover;
	background-color:<?php  if(empty($_W['styles']['indexbgcolor'])) { ?>#22292C<?php  } else { ?><?php  echo $_W['styles']['indexbgcolor'];?><?php  } ?>;
	<?php  echo $_W['styles']['indexbgextra'];?>
	}
	a{color:<?php  echo $_W['styles']['linkcolor'];?>; text-decoration:none;}
	<?php  echo $_W['styles']['css'];?>
	.box{width:98.5%; margin:1.5% 0 1.5% 1.5%; overflow:hidden;}
	.box .box-item{float:left;text-align:center;display:block;text-decoration:none;outline:none;width:<?php  echo (100/3-1.5).'%';?>;height:85px;color:#FFF;background:#66c574;padding:5px 0px; overflow:hidden; margin:0 1.5% 1.5% 0;}
	.box .box-item i{display:inline-block;width:50px;height:50px;line-height:50px;font-size:35px;color:#FFF; overflow: hidden;}
	.box .box-item span{color:<?php  echo $_W['styles']['fontnavcolor'];?>; display:block; font-size:14px; width:100%; padding: 0 5px; height:25px; line-height:25px; overflow:hidden; background:#666; border-bottom-left-radius:6px;border-bottom-right-radius:6px; -moz-border-radius-bottomleft:6px; -moz-border-radius-bottomright:6px; -webkit-border-bottom-left-radius:6px; -webkit-border-bottom-right-radius:6px;}
	.footer{color:#FFF;}
</style>
<div class="box clearfix">
	<?php  $num = 1;?>
	<?php  if(is_array($navs)) { foreach($navs as $nav) { ?>
	<?php  if($num == 1) $bg = '#66c574';?>
	<?php  if($num == 2) $bg = '#88c8b7';?>
	<?php  if($num == 3) $bg = '#facc6c';?>
	<?php  if($num == 4) $bg = '#75bcd0';?>
	<?php  if($num == 5) $bg = '#dc7a93';?>
	<?php  if($num == 6) $bg = '#75bcd0';?>
	<a href="<?php  echo $nav['url'];?>" class="box-item img-rounded" style="background:<?php  echo $bg;?>;">
		<?php  if(!empty($nav['icon'])) { ?>
		<i style="background:url(<?php  echo $_W['attachurl'];?><?php  echo $nav['icon'];?>) no-repeat;background-size:cover;" class=""></i>
		<?php  } else { ?>
		<i class="fa <?php  echo $nav['css']['icon']['icon'];?>" style="<?php  echo $nav['css']['icon']['style'];?>"></i>
		<?php  } ?>
		<span style="<?php  echo $nav['css']['name'];?>"><?php  echo $nav['name'];?></span>
	</a>
	<?php  $num++;?>
	<?php  if($num > 6) $num = 1;?>
	<?php  } } ?>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>