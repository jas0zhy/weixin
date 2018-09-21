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
	background-color:<?php  if(empty($_W['styles']['indexbgcolor'])) { ?>#DBDBDB<?php  } else { ?><?php  echo $_W['styles']['indexbgcolor'];?><?php  } ?>;
	<?php  echo $_W['styles']['indexbgextra'];?>
	}
	a{color:<?php  echo $_W['styles']['linkcolor'];?>; text-decoration:none;}
	<?php  echo $_W['styles']['css'];?>
	.box{width:96%; overflow:hidden; margin:1.1% 2%; border-radius:0.2em; background-color:#fff; border-bottom:#bcbcbc solid 1px;}
	.box .box2{float:left; display:block; height:9.6em; text-align:center; width:33.33%; border-right:#d1d1d1 solid 1px;border-bottom:#d1d1d1 solid 1px;}
	.box .box-item{display:block; text-align:center; text-decoration:none; height:5.5em; line-height:5.5em; width:5.5em; border-radius:5.5em; margin:12% auto; background-color:#eee; color:#ffffff;}
	.box .box-item i{display:inline-block; width:100%; line-height:77px; font-size:35px; color:#C46336; overflow:hidden;}
	.box .box-item .icon{display:inline-block; width:100%; height:100%; border-radius:100%; }
	.box .box2 span{color:<?php  echo $_W['styles']['fontnavcolor'];?>;display:inline-block; font-size:14px; width:90%; height:20px; line-height:20px; text-align:center; margin:0 5%; overflow:hidden;}
</style>
<div class="box clearfix">
	<?php  if(is_array($navs)) { foreach($navs as $nav) { ?>
	<div class="box2">
		<a href="<?php  echo $nav['url'];?>" class="box-item">
			<?php  if(!empty($nav['icon'])) { ?>
			<i style="background:url(<?php  echo $_W['attachurl'];?><?php  echo $nav['icon'];?>) no-repeat; background-size:cover;" class="icon"></i>
			<?php  } else { ?>
			<i class="fa <?php  echo $nav['css']['icon']['icon'];?> icon" style="<?php  echo $nav['css']['icon']['style'];?>"></i>
			<?php  } ?>
		</a>
		<span style="<?php  echo $nav['css']['name'];?>" title="<?php  echo $nav['name'];?>"><?php  echo $nav['name'];?></span>
	</div>
	<?php  } } ?>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>