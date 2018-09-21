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
	background-color:<?php  if(empty($_W['styles']['indexbgcolor'])) { ?>#f5f5f5<?php  } else { ?><?php  echo $_W['styles']['indexbgcolor'];?><?php  } ?>;
	<?php  echo $_W['styles']['indexbgextra'];?>
	}
	a{color:<?php  echo $_W['styles']['linkcolor'];?>; text-decoration:none;}
	<?php  echo $_W['styles']['css'];?>
	.box{width:100%;overflow:hidden;margin-top:10px;}
	.box .box-item{float:left; text-align:center; display:block; text-decoration:none; outline:none; color:#000; width:<?php  echo (100/3).'%';?>; height:90px; margin-bottom:8px; position:relative;  padding:0 10px;}
	.box .box-item i{display:block; width:60px; height:60px; line-height:60px; margin:0 auto; font-size:35px; color:#f55d8b; overflow: hidden; text-align:center;}
	.box .box-item span{color:<?php  echo $_W['styles']['fontnavcolor'];?>; display:block; font-size:14px; width:90%; height:20px; line-height:20px; margin:0 5%; overflow:hidden;}
</style>
<div class="box clearfix">
	<?php  $site_navs = modulefunc('site', 'site_navs', array (
  'func' => 'site_navs',
  'item' => 'row',
  'limit' => 10,
  'index' => 'iteration',
  'multiid' => 9,
  'uniacid' => 9,
  'acid' => 0,
)); if(is_array($site_navs)) { $i=0; foreach($site_navs as $i => $row) { $i++; $row['iteration'] = $i; ?>
	<?php  echo $row['html'];?>
	<?php  } } ?>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>