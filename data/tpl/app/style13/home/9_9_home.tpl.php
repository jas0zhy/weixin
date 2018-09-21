<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<style>
	body{
	font:<?php  echo $_W['styles']['fontsize'];?> <?php  echo $_W['styles']['fontfamily'];?>;
	color:<?php  echo $_W['styles']['fontcolor'];?>;
	padding:0;
	margin:0;
	background-image:url('<?php  if(empty($_W['styles']['indexbgimg'])) { ?>./themes/style13/images/bg_index.jpg<?php  } else { ?><?php  echo $_W['styles']['indexbgimg'];?><?php  } ?>');background-size:cover;
	background-color:<?php  if(empty($_W['styles']['indexbgcolor'])) { ?>#F9F9F9<?php  } else { ?><?php  echo $_W['styles']['indexbgcolor'];?><?php  } ?>;
	<?php  echo $_W['styles']['indexbgextra'];?>
	}
	a{color:<?php  echo $_W['styles']['linkcolor'];?>; text-decoration:none;}
	<?php  echo $_W['styles']['css'];?>

	.box,.box ul{padding:0px; margin:0px; list-style:none;}
	.box{overflow:hidden; height:180px; width:90%; margin:75% 5% 5% 5%; position:relative; background:rgba(0, 0, 0, 0.4); border:1px rgba(0, 0, 0, 0.1) solid;}
	.box ul{width:1400px; height:100%; position:absolute; top:0px; left:0px;}
	.box .slide-nav{height:180px; float:left; overflow:hidden; position:relative;}
	.box .box-item{float:left;position:relative;text-align:center;display:block;text-decoration:none;outline:none;width:<?php  echo (100/3).'%';?>; height:90px; color:#FFF;padding:5px 0;}
	.box .box-item i{display:inline-block;width:50px;height:50px;line-height:50px;font-size:35px; margin-bottom:5px; overflow: hidden; background:rgba(255, 255, 255, 0.2);}
	.box .box-item span{color:<?php  echo $_W['styles']['fontnavcolor'];?>;display:block; font-size:14px; width:90%; margin:0 5%; height:20px; line-height:20px; overflow:hidden;}
	.box_swipe > ol{background-color:transparent; padding-right:0; text-align:center; margin-top:0; position:absolute; top:0; right:10px;}
	.footer{color:#ffffff;}
</style>
<script>
	require(['jquery'],function($){
		$('i').addClass("img-circle");
	});
</script>
<div class="box" id="box">
	<ul>
		<?php  $num = 0;?>
		<?php  $site_navs = modulefunc('site', 'site_navs', array (
  'func' => 'site_navs',
  'item' => 'row',
  'limit' => 10,
  'index' => 'iteration',
  'multiid' => 9,
  'uniacid' => 9,
  'acid' => 0,
)); if(is_array($site_navs)) { $i=0; foreach($site_navs as $i => $row) { $i++; $row['iteration'] = $i; ?>
		<?php  if($num%6 == 0 && $num != 0) { ?></li><?php  } ?>
		<?php  if($num%6 == 0 || $num == 0) { ?><li class="slide-nav"><?php  } ?>
		<?php  echo $row['html'];?>
		<?php  $num++;?>
		<?php  } } ?>
	</ul>
</div>
<script>
	require(['jquery'],function(){
		$(function(){
			$(window).resize(function  () {
				var windowW=$(window).width()*0.9;
				var list=$(".slide-nav");
				var box=$(".box ul");
				if(windowW<128){
					list.css("width",128);
					box.css("width",list.length*128);
				}else{
					list.css("width",windowW);
					box.css("width",list.length*windowW);
				}
			});
			$(window).resize();
			var num=0;
			var box = $(".box ul");
			function moves () {
				num++;
				if($(".slide-nav").length==1){
					box.css("left",0);
				}else if(num==$(".slide-nav").length){
					box.animate({left:-num*$(".slide-nav").width()},500,function(){
						box.css("left",0);
					});
					num=0;
				}else {
					box.animate({left:-num*$(".slide-nav").width()},500);
				}
			}
			var t= setInterval(moves,2000);
		});
	});
</script>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>