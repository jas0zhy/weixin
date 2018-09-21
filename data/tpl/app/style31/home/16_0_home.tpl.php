<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<style>
	body{
	font:<?php  echo $_W['styles']['fontsize'];?> <?php  echo $_W['styles']['fontfamily'];?>;
	color:<?php  echo $_W['styles']['fontcolor'];?>;
	padding:0;
	margin:0;
	background-image:url('<?php  if(empty($_W['styles']['indexbgimg'])) { ?>./themes/style31/images/bg_index.jpg<?php  } else { ?><?php  echo $_W['styles']['indexbgimg'];?><?php  } ?>');background-size:cover;
	background-size:cover;
	background-color:<?php  if(empty($_W['styles']['indexbgcolor'])) { ?>#f5f5f5<?php  } else { ?><?php  echo $_W['styles']['indexbgcolor'];?><?php  } ?>;
	<?php  echo $_W['styles']['indexbgextra'];?>
	}
	a{color:<?php  echo $_W['styles']['linkcolor'];?>; text-decoration:none;}
	<?php  echo $_W['styles']['css'];?>
	.box{padding:8% 0 0 4.8%;}
	.box .box-item{display:block; text-decoration:none; height:8.3em; text-align:center; float:left; width:30.3%; margin:0 1.8% 2.3% 0; color:#333; background-color:#FFF; border:#e0e0e0 solid 1px; border-radius:5px; box-shadow:1px 1px 1px rgba(0,0,0,0.06);}
	.box .box-item i{display:inline-block;width:100%; height:80px; line-height:80px; font-size:40px; color:#a58647; background:#fff6db; margin-bottom:3%; overflow:hidden;}
	.box .box-item span{color:<?php  echo $_W['styles']['fontnavcolor'];?>;display:block; font-size:14px; width:90%; height:1.3em; margin:0 5%; text-align:center; overflow:hidden;}
	.box .box-item .icon{border-top-left-radius:5px; border-top-right-radius:5px;}
</style>
<div class="box clearfix">
	<?php  $site_navs = modulefunc('site', 'site_navs', array (
  'func' => 'site_navs',
  'item' => 'row',
  'limit' => 10,
  'index' => 'iteration',
  'multiid' => 0,
  'uniacid' => 16,
  'acid' => 0,
)); if(is_array($site_navs)) { $i=0; foreach($site_navs as $i => $row) { $i++; $row['iteration'] = $i; ?>
	<?php  echo $row['html'];?>
	<?php  } } ?>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>