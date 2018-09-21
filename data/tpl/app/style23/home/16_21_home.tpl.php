<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<style>
	body{padding:0;margin:0; min-height:480px; background-image:url('<?php  if(empty($_W['styles']['indexbgimg'])) { ?>./themes/style23/images/bg_index.jpg<?php  } else { ?><?php  echo $_W['styles']['indexbgimg'];?><?php  } ?>');background-size:cover;}
	a{color:<?php  echo $_W['styles']['linkcolor'];?>; text-decoration:none;}
	<?php  echo $_W['styles']['css'];?>
	.box{width:65%; margin:45.4% 0 0 34%; overflow:hidden;}
	.box .box-item{float:left; width:43.8%; margin:0 1.8% 1.8% 0; display:block;text-decoration:none;outline:none;height:6em; text-align:center; color:#fff; border-radius:5px;overflow:hidden; padding:5px 10px;}
	.box .box-item i{display:inline-block; width:50px; height:50px; line-height:50px; font-size:35px; color:#FFF; overflow:hidden; }
	.box .box-item span{color:<?php  echo $_W['styles']['fontnavcolor'];?>;display:block;font-size:14px; width:100%; text-align:center; white-space:nowrap; overflow:hidden;}
	.box .box-item.pic{display:block; width:89.4%;}
</style>
<div class="box clearfix">
	<?php  $num = 0;?>
	<?php  if(is_array($navs)) { foreach($navs as $nav) { ?>
	<?php  if($num == 0) $bg = 'rgba(254,170,36,0.8)';?>
	<?php  if($num == 1) $bg = 'rgba(88,181,225,0.8)';?>
	<?php  if($num == 2) $bg = 'rgba(210,99,159,0.8)';?>
	<?php  if($num == 3) $bg = 'rgba(128,188,80,0.8)';?>
	<?php  if($num == 4) $bg = 'rgba(137,135,217,0.8)';?>
	<a href="<?php  echo $nav['url'];?>" class="box-item <?php  if($num == 2) { ?>pic<?php  } else { ?>icon<?php  } ?>" style="background:<?php  echo $bg;?>;">
		<?php  if(!empty($nav['icon'])) { ?>
		<i style="background:url(<?php  echo $_W['attachurl'];?><?php  echo $nav['icon'];?>) no-repeat;background-size:cover;<?php  echo $nav['css']['icon']['style'];?>"></i>
		<?php  } else { ?>
		<i class="fa <?php  echo $nav['css']['icon']['icon'];?>" style="<?php  echo $nav['css']['icon']['style'];?>"></i>
		<?php  } ?>
		<span style="<?php  echo $nav['css']['name'];?>" title="<?php  echo $nav['name'];?>"><?php  echo $nav['name'];?></span>
	</a>
	<?php  $num++; if($num > 4) $num = 0;?>
	<?php  } } ?>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>