<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>

<style>
	body{
	font:<?php  echo $_W['styles']['fontsize'];?> <?php  echo $_W['styles']['fontfamily'];?>;
	color:<?php  echo $_W['styles']['fontcolor'];?>;
	padding:0;
	margin:0;
	background-size:cover;
	background-color:<?php  if(empty($_W['styles']['indexbgcolor'])) { ?>#ECECEC<?php  } else { ?><?php  echo $_W['styles']['indexbgcolor'];?><?php  } ?>;
	<?php  echo $_W['styles']['indexbgextra'];?>
	}
	a{color:<?php  echo $_W['styles']['linkcolor'];?>; text-decoration:none;}
	<?php  echo $_W['styles']['css'];?>
	.box{width:100%; min-height:476px; background:url('<?php  if(empty($_W['styles']['indexbgimg'])) { ?>./themes/style44/images/bg_index.jpg<?php  } else { ?><?php  echo $_W['styles']['indexbgimg'];?><?php  } ?>'); background-size:cover; position:relative;}
	.box .box3{position:absolute; bottom:0px; width:100%;}
	.box .box2{float:left; display:block; width:33.3%; height:100px; background: rgba(0,0,0,0.7); }
	.box .box-item{display:block; text-decoration:none; outline:none; width:90px; height:90px; margin:5px auto; color:#FFF; border-radius:50%; background:rgba(231,211,202,0.5);/*background:transparent url('./themes/style44/images/bg-01.jpg') no-repeat;*/ background-size:cover; padding:10px; overflow:hidden;}
	.box .box-item i{display:block; height:60%; line-height:100%; font-size:35px; color:#FFF; overflow:hidden; text-align:center; padding-top:5px;}
	.box .box-item span{color:<?php  echo $_W['styles']['fontnavcolor'];?>;display:block; height:20px; line-height:20px; font-size:14px; width:98%; text-align:center; overflow:hidden;}

	.list li{padding: 5px 5px 0 5px; list-style:none;}
	.list li a{display:block; height:71px; padding:5px;background:#FFF; border:1px #DDD solid; border-radius:3px;color:#333; overflow:hidden; text-decoration:none !important; position:relative;}
	.list li a .thumb{width:80px; height:60px;}
	.list li a .title{font-size:14px; padding-left:90px;}
	.list li a .createtime{font-size:12px; color:#999; position:absolute; bottom:5px;padding-left:90px;}
</style>
<div class="box clearfix">
	<div class="box3">
	<?php  $site_navs = modulefunc('site', 'site_navs', array (
  'func' => 'site_navs',
  'item' => 'row',
  'limit' => 10,
  'index' => 'iteration',
  'multiid' => 9,
  'uniacid' => 9,
  'acid' => 0,
)); if(is_array($site_navs)) { $i=0; foreach($site_navs as $i => $row) { $i++; $row['iteration'] = $i; ?>
	<div class="box2">
		<?php  echo $row['html'];?>
	</div>
	<?php  if($row['iteration'] > 5) break;?>
	<?php  } } ?>
	</div>
</div>

<!--内容栏-->
<div class="list clearfix">
	<?php  $result = modulefunc('site', 'site_article', array (
  'func' => 'site_article',
  'cid' => $cid,
  'assign' => 'result',
  'return' => 'true',
  'limit' => 10,
  'index' => 'iteration',
  'multiid' => 9,
  'uniacid' => 9,
  'acid' => 0,
)); ?>
	<?php  if(is_array($result['list'])) { foreach($result['list'] as $row) { ?>
	<li>
		<a href="<?php  echo $row['linkurl'];?>">
			<?php  if($row['thumb']) { ?><img src="<?php  echo $row['thumb'];?>" class="pull-left thumb" onerror="this.parentNode.removeChild(this)" /><?php  } ?>
			<div class="title"><?php  echo $row['title'];?></div>
			<div class="createtime"><?php  echo date('Y-m-d H:i:s', $row['createtime'])?></div>
		</a>
	</li>
	<?php  } } ?>
</div>

<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>