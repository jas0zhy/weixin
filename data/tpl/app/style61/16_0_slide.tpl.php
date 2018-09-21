<?php defined('IN_IA') or exit('Access Denied');?><style>
.box_swipe {
  overflow: hidden;
  position: relative;
}
.box_swipe ul {
  overflow: hidden;
  position: relative;
}
.box_swipe ul > li {
  float:left;
  width:100%;
  position: relative;
}
.box_swipe>ol{
	height:20px;
	position: relative;
	z-index:10;
	margin-top:-25px;
	text-align:right;
	padding-right:15px;
	background-color:rgba(0,0,0,0.3);
}
.box_swipe>ol>li{
	display:inline-block;
	margin:5px 0;
	width:8px;
	height:8px;
	background-color:#757575;
	border-radius: 8px;
}
.box_swipe>ol>li.on{
	background-color:#ffffff;
}
</style>
<div id="banner_box" class="box_swipe">
	<ul>
	<?php  $slide = modulefunc('site', 'site_slide_search', array (
  'func' => 'site_slide_search',
  'limit' => '4',
  'item' => 'row',
  'assign' => 'slide',
  'index' => 'iteration',
  'multiid' => 0,
  'uniacid' => 16,
  'acid' => 0,
)); if(is_array($slide)) { $i=0; foreach($slide as $i => $row) { $i++; $row['iteration'] = $i; ?>
	<?php  $urlhttp = strtolower(substr($row['thumb'],0,7));?>
	<?php  $urlhttps = strtolower(substr($row['thumb'],0,8));?>
		<li>
			<a href="<?php  echo $row['url'];?>">
				<img src="<?php  if($urlhttp != 'http://' && $urlhttps != 'https://') { ?><?php  echo $_W['attachurl'];?><?php  } ?><?php  echo $row['thumb'];?>" alt="<?php  echo $row['title'];?>" style="width:100%;" />
			</a>
		</li>
	<?php  } } ?>
	</ul>
	<ol>
	<!-- 此处的slide变量是通过上方标签到的 -->
	<?php  $slideNum = 1;?>
	<?php  if(is_array($slide)) { foreach($slide as $vv) { ?>
		<li<?php  if($slideNum == 1) { ?> class="on"<?php  } ?>></li>
		<?php  $slideNum++;?>
	<?php  } } ?>
	</ol>
</div>
<script>
$(function() {
	new Swipe($('#banner_box')[0], {
		speed:500,
		auto:3000,
		callback: function(){
			var lis = $(this.element).next("ol").children();
			lis.removeClass("on").eq(this.index).addClass("on");
		}
	});
});
</script>