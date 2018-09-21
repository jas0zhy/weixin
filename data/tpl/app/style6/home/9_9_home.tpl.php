<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('header', TEMPLATE_INCLUDEPATH)) : (include template('header', TEMPLATE_INCLUDEPATH));?>
<style>
	body{
	font:<?php  echo $_W['styles']['fontsize'];?> <?php  echo $_W['styles']['fontfamily'];?>;
	color:<?php  echo $_W['styles']['fontcolor'];?>;
	padding:0;
	margin:0;
	background-image:url('<?php  if(!empty($_W['styles']['indexbgimg'])) { ?><?php  echo $_W['styles']['indexbgimg'];?><?php  } ?>');
	background-size:cover;
	background-color:<?php  if(empty($_W['styles']['indexbgcolor'])) { ?>#E9E9E9<?php  } else { ?><?php  echo $_W['styles']['indexbgcolor'];?><?php  } ?>;
	<?php  echo $_W['styles']['indexbgextra'];?>
	}
	a{color:<?php  echo $_W['styles']['linkcolor'];?>; text-decoration:none;}
	<?php  echo $_W['styles']['css'];?>
	.box{width:100%; margin-top:10px;}
	.box .box-item{float:left; display:block; text-align:center; text-decoration:none; outline:none; width:47%; height:120px; color:#333; background:#FFF; margin:0 0 2% 2%; padding:2% 10px; overflow:hidden; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px; -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05); -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05); box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);}
	.box .box-item i{display:inline-block;width:80px;height:80px;line-height:80px;font-size:40px;color:#666; background:#EEE; overflow: hidden; border:2px #FFF solid;}
	.box .box-item span{color:<?php  echo $_W['styles']['fontnavcolor'];?>;display:block; width:90%; margin:0 5%; height:20px; line-height:20px; overflow:hidden; font-size:14px;}
</style>
<script>
	require(['jquery'],function($){
		$('i').addClass("img-circle");
	});
</script>
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
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('footer', TEMPLATE_INCLUDEPATH)) : (include template('footer', TEMPLATE_INCLUDEPATH));?>