<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('weheader', TEMPLATE_INCLUDEPATH)) : (include template('weheader', TEMPLATE_INCLUDEPATH));?>
<style>
body{background-color:#f0f0f0;font-weight:300;}
a{color:#666}
.info{background-color:#fff8e1;font-weight:300;}
.weui_tab a{color:#555}
.weui_navbar{line-height:20px;}
.weui_media_box.weui_media_text .weui_media_info {margin-top: 0px;}
.weui_tabbar{height:50px;}
.weui_tabbar_icon {height: 20px;}
.weui_bar_item_on .weui_tabbar_icon i {color: #09BB07;}
.weui_cell_bd i {color:#666;}

.dayu_cells {overflow: hidden;position: relative;}
.sticky-fixed {width: 100%;position: fixed;bottom: 0;z-index:9998;}
</style>
<?php  if($operation == 'display') { ?>
<style>
.record-start-btn {width:16px;height:16px;margin-right:5px;}
.weui_cells {margin-top:0;}
</style>
<div class="weui_tab_bd">
<?php  if($reid) { ?>
	<div class="weui_cells_title">
		<a class="f14"><img class="img-circle" src="<?php  if(!empty($member['avatar'])) { ?><?php  echo $member['avatar'];?><?php  } else { ?><?php  echo $fans['tag']['avatar'];?><?php  } ?>" alt="" style="width:30px;height:30px;"><span class="inline"> <?php  echo $fans['nickname'];?></span></a>
	</div>
	<?php  if($activity['isinfo']) { ?>
		<div class="weui_cells weui_cells_access info">
			<a class="weui_cell" href="http://api.map.baidu.com/marker?location=<?php  echo $activity['loc_x'];?>,<?php  echo $activity['loc_y'];?>&title=<?php  echo urlencode($activity['business']);?>&content=<?php  echo urlencode($activity[address].' activity'.$store['tel']);?>&output=html">
				<div class="weui_cell_bd weui_cell_primary f14"><span class="icon icon-54 f14"></span> 地址：<?php  echo $activity['address'];?></div>
				<div class="weui_cell_ft"></div>
			</a>
			<a class="weui_cell" href="tel:<?php  echo $activity['tel'];?>">
				<div class="weui_cell_bd weui_cell_primary f14"><span class="icon icon-94 f14"></span> 电话：<?php  echo $activity['tel'];?></div>
				<div class="weui_cell_ft"></div>
			</a>
		</div>
	<?php  } ?>
			<?php  $i=0;?>
	<?php  if(is_array($rows)) { foreach($rows as $item) { ?>
				<?php  $i++;?>
	<div onclick="location.href='<?php  echo $this->createMobileUrl('Mydayu_form', array('op' => 'detail', 'rerid' => $item['rerid'], 'id' => $reid))?>'">
		<div class="weui_cells weui_cells_access">
			<div class="weui_cell">
				<div class="weui_cell_bd weui_cell_primary"><span class="f12 f-green"><?php  echo $i;?>.</span><?php  echo $item['member'];?> <i class="icon icon-63 f14"><?php  echo $item['mobile'];?></i></div>
				<div class="weui_cell_ft"></div>
			</div>
			<div class="weui_cell">
				<div class="weui_cell_bd weui_cell_primary f14 f-gray -wrap ell"><?php  echo $item['filed'];?></div>
			</div>
		</div>
		<div class="dayu_cells">
        <div class="weui_cell">
			<div class="weui_cell_bd weui_cell_primary f11">提交时间：<?php  echo date('Y/m/d H:i', $item['createtime'])?></div>
			<div class="weui_cell_ft">
				<?php  if(!empty($item['rethumb'])) { ?><div class="record-start-btn icon icon-101 f16 f-white left"></div><?php  } ?>
				<?php  if(!empty($item['revoice'])) { ?><div class="record-start-btn icon icon-34 f16 f-white left"></div><?php  } ?>
				<?php  if($item['status'] == 0) { ?><span class="weui_btn weui_btn_mini weui_btn_default right"><?php  echo $state1;?></span>
				<?php  } else if($item['status'] == 1) { ?><span class="weui_btn weui_btn_mini weui_btn_primary right"><?php  echo $state2;?></span>
				<?php  } else if($item['status'] == 2) { ?><span class="weui_btn weui_btn_mini weui_btn_warn right"><?php  echo $state4;?></span>
				<?php  } else if($item['status'] == 3) { ?><span class="weui_btn weui_btn_mini bg-blue right"><?php  echo $state3;?></span>
				<?php  } else if($item['status'] == -1) { ?><span class="weui_btn weui_btn_mini weui_btn_warn right"><?php  echo $state5;?></span>
				<?php  } ?>
			</div>
		</div>
		</div>
    </div>
	<?php  } } ?>
	<?php  if($pager) { ?><div class="p bg-gray" style="height:32px;"><?php  echo $pager;?></div><?php  } ?>		


    </div>
</div><!--weui_tab_bd-->
	<div class="weui_tabbar">
		<a href="<?php  echo $this->createMobileUrl('Mydayu_form',array('weid' => $weid, 'id' => $reid))?>" class="weui_tabbar_item <?php  if($_GPC['status'] == '') { ?>weui_bar_item_on<?php  } ?>">
			<div class="weui_tabbar_icon">
				<i class="iconfont f20">&#xe600;</i>
			</div>
			<p class="weui_tabbar_label">全部</p>
		</a>
		<a href="<?php  echo $this->createMobileUrl('Mydayu_form',array('weid' => $weid, 'id' => $reid, 'status'=>0))?>" class="weui_tabbar_item <?php  if($_GPC['status'] == '0') { ?>weui_bar_item_on<?php  } ?>">
			<div class="weui_tabbar_icon">
				<i class="iconfont f20">&#xe61f;</i>
			</div>
			<p class="weui_tabbar_label"><?php  echo $state1;?></p>
		</a>
		<a href="<?php  echo $this->createMobileUrl('Mydayu_form',array('weid' => $weid, 'id' => $reid, 'status'=>1))?>" class="weui_tabbar_item <?php  if($_GPC['status'] == '1') { ?>weui_bar_item_on<?php  } ?>">
			<div class="weui_tabbar_icon">
				<i class="iconfont f20">&#xe60a;</i>
			</div>
			<p class="weui_tabbar_label"><?php  echo $state2;?></p>
		</a>
		<a href="<?php  echo $this->createMobileUrl('Mydayu_form',array('weid' => $weid, 'id' => $reid, 'status'=>2))?>" class="weui_tabbar_item <?php  if($_GPC['status'] == '2') { ?>weui_bar_item_on<?php  } ?>">
			<div class="weui_tabbar_icon">
				<i class="iconfont f20">&#xe614;</i>
			</div>
			<p class="weui_tabbar_label">已取消</p>
		</a>
		<a href="<?php  echo $this->createMobileUrl('Mydayu_form',array('weid' => $weid, 'id' => $reid, 'status'=>3))?>" class="weui_tabbar_item <?php  if($_GPC['status'] == '3') { ?>weui_bar_item_on<?php  } ?>">
			<div class="weui_tabbar_icon">
				<i class="iconfont f20">&#xe613;</i>
			</div>
			<p class="weui_tabbar_label"><?php  echo $state3;?></p>
		</a>
	</div>
<?php  } else { ?>
<?php  if($fids) { ?>
<style>
.dayu-header {padding: 25px 0;}
.dayu-title {text-align: center;font-size: 25px;color: #3cc51f;font-weight: 400;margin: 0;}
.dayu-sub-title {color: #888;padding:0 10px;font-size: 14px;text-indent:2em;}
.dayu-content-padded {padding: 15px;}
.dayu-second-title {text-align: center;font-size: 24px;color: #3cc51f;font-weight: 400;margin: 0 15%;}
</style>
    <header class='dayu-header'>
      <h1 class="dayu-title">选择主题</h1>
    </header>
<div class="weui_tab" style="margin:0 10%;">
<?php  if(is_array($list)) { foreach($list as $item) { ?>
	<a href="<?php  echo $this->createMobileUrl('mydayu_form', array('weid' => $item['weid'], 'id' => $item['reid']))?>" class="weui_btn weui_btn_primary" style="color:#fff;"><?php  echo $item['title'];?></a>
<?php  } } ?>
</div>
<?php  } else { ?>
	<div class="weui_msg">
		<div class='notice '><p><i class="iconfont f22">&#xe61f;</i> 暂无数据</p></div>
	</div>
<?php  } ?>
<?php  } ?>
<?php  } else if($operation == 'detail') { ?>
<style>
.weui_cell_ft {margin-left:10px;font-size:14px;}
.weui_cell_bd {font-size:16px;}
.weui_cells_title {margin-top: 10px;}
#allmap{width:100%;height:200px;display:block}
#allmap img{height:1rem;}
</style>

	<div class="weui_cells_title">
		<span class="weui_btn f18 weui_btn_mini<?php  if($row['status'] == 0) { ?> weui_btn_default"><?php  echo $activity['state1'];?></span>
		<?php  } else if($row['status'] == 1) { ?> weui_btn_primary"><?php  echo $activity['state2'];?></span>
		<?php  } else if($row['status'] == 2) { ?> weui_btn_warn"><?php  echo $activity['state4'];?></span>
		<?php  } else if($row['status'] == 3) { ?> bg-blue"><?php  echo $activity['state3'];?></span>
		<?php  } else if($row['status'] == -1) { ?> weui_btn_warn"><?php  echo $activity['state5'];?></span>
		<?php  } ?>
		<?php  if($activity['isdel']==1 && $row['status'] != 2) { ?><a href="<?php  echo $this->createMobileUrl('dayu_formDelete', array('id' => $row['rerid'],'openid' => $openid, 'reid' => $activity['reid']))?>" class="right f-red" onclick="return confirm('删除本记录，此操作不可恢复，确认删除？');return false;"><i class="icon icon-58 f20"></i> 删除此记录</a><?php  } ?>
	</div>
		<div class="weui_cells" style="background-color:#fffde7;">
			<div class="weui_cell">
				<div class="weui_cell_bd weui_cell_primary f12">
					<?php  echo $row['createtime'];?>
				</div>
				<div class="weui_cell_ft f12">提交时间</div>
			</div>
			<div class="weui_cell f12">
				<div class="weui_cell_bd weui_cell_primary f12">
					<?php  echo $row['yuyuetime'];?>
				</div>
				<div class="weui_cell_ft f12">受理时间</div>
			</div>
			<?php  if(!empty($row['kfinfo'])) { ?>
			<div class="weui_cell">
				<div class="weui_cell_bd weui_cell_primary f-orange">
					<?php  echo $row['kfinfo'];?>
				</div>
				<div class="weui_cell_ft f12">客服答复</div>
			</div>
			<?php  } ?>
			<?php  if(!empty($row['file'])) { ?>
				<?php  if(is_array($row['file'])) { foreach($row['file'] as $f) { ?>
			<div class="weui_cell">
				<div class="weui_cell_bd weui_cell_primary f-orange">
					<a href="<?php  echo $f;?>">点击保存到手机</a>
				</div>
				<div class="weui_cell_ft f12">相关文件</div>
			</div>
				<?php  } } ?>
			<?php  } ?>
			<?php  if($activity['isrethumb'] && !empty($row['rethumb'])) { ?>
			<div class="weui_cell">
				<div class="weui_cell_bd weui_cell_primary">
					<image class="weui_uploader_file weui_uploader_status" id="rethumb" src="<?php  echo $row['rethumbs'];?>" height="50">
<script>
document.querySelector('#rethumb').onclick = function () {
  wx.previewImage({
    current: '<?php  echo $row['rethumbs'];?>',
    urls: [
      '<?php  echo $row['rethumbs'];?>'
    ]
  });
};
</script>				
				</div>
				<div class="weui_cell_ft f12">图片回复</div>
			</div>
			<?php  } ?>
			<?php  if($activity['isvoice'] && !empty($row['revoice'])) { ?>
			<div class="weui_cell">
				<div class="weui_cell_bd weui_cell_primary" id="voice">
					<audio preload="auto" controls><source src="<?php  echo $row['revoices'];?>" /></audio>					
				</div>
				<div class="weui_cell_ft f12">语音答复</div>
			</div>
			<?php  } ?>
		</div>
	<div class="weui_cells_title"><span class="f14">我的资料</span></div>
		<div class="weui_cells">
			<div class="weui_cell">
				<div class="weui_cell_bd weui_cell_primary -wrap ell">
					<?php  echo $row['member'];?>
				</div>
				<div class="weui_cell_ft">姓名</div>
			</div>
			<div class="weui_cell">
				<div class="weui_cell_bd weui_cell_primary">
					<?php  echo $row['mobile'];?>
				</div>
				<div class="weui_cell_ft">手机</div>
			</div>
		<?php  if($activity['isloc']==1) { ?>
		<div class="weui_cell">
			<div class="weui_cell_bd weui_cell_primary" id="voice">
				<?php  echo $row['address'];?>
			</div>
			<div class="weui_cell_ft"><?php  echo $activity['adds'];?></div>
		</div>
        <div class="weui_cell">
            <div class="weui_cell_bd weui_cell_primary">
                <div class="weui_uploader">
                    <div class="weui_uploader_bd">
						<div id="allmap"></div>
                    </div>
                </div>
            </div>
        </div>
<script type="text/javascript">
var map = new BMap.Map("allmap");
var point = new BMap.Point(<?php  echo $row['loc_y'];?>,<?php  echo $row['loc_x'];?>);
var marker = '';
map.centerAndZoom(point, 15);
map.addControl(new BMap.NavigationControl()); 
map.addControl(new BMap.ScaleControl());
map.addControl(new BMap.OverviewMapControl());
	var myIcon = new BMap.Icon("<?php echo MODULE_URL;?>template/weui/images/center.gif", new BMap.Size(24,24));
	  
  // 添加定位控件
  var geolocationControl = new BMap.GeolocationControl({
  anchor: BMAP_ANCHOR_TOP_RIGHT,
  showAddressBar: false,
  offset: new BMap.Size(5, 5),
  });
  map.addControl(geolocationControl);
	var marker = new BMap.Marker(point,{icon:myIcon});
	map.addOverlay(marker);
</script>
		<?php  } ?>
	</div>
	<div class="weui_cells_title"><span class="f14">提交内容</span></div>
		<div class="weui_cells">
		<?php  if(!empty($row['thumb'])) { ?>
        <div class="weui_cell">
            <div class="weui_cell_bd weui_cell_primary">
                <div class="weui_uploader">
                    <div class="weui_uploader_bd">
                        <div class="weui_uploader_files" id="previewImage">
						    <?php  if(is_array($row['thumb'])) { foreach($row['thumb'] as $pic) { ?>
								<img src="<?php  echo tomedia($pic)?>" class="weui_uploader_file" style="height:80px;width:auto;">
						    <?php  } } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<script>
$(document).ready(function(){
$("#previewImage").on("click","img",function(event){
        var imgArray = [];
        var curImageSrc = $(this).attr('src');
        var oParent = $(this).parent();
        if (curImageSrc && !oParent.attr('href')) {
            $('#previewImage img').each(function(index, el) {
                var itemSrc = $(this).attr('src');
                imgArray.push(itemSrc);
            });
            wx.previewImage({
                current: curImageSrc,
                urls: imgArray
            });
        }
		  });
});
</script>
		<?php  } ?>
		<?php  if($activity['isvoice']==1 && !empty($row['voice'])) { ?>
		<div class="weui_cell">
				<div class="weui_cell_bd weui_cell_primary" id="voice">
					<audio preload="auto" controls><source src="<?php  echo $row['voices'];?>" /></audio>					
				</div>
				<div class="weui_cell_ft"><?php  echo $activity['voice'];?></div>
		</div>
		<?php  } ?>
              	<?php  if(is_array($ds)) { foreach($ds as $fid => $ftitle) { ?>
			<div class="weui_cell">
				<div class="weui_cell_bd weui_cell_primary">
                <?php  if($ftitle['type'] == 'image') { ?>
					<?php  if($row['fields'][$fid]) { ?>
					<image class="weui_uploader_file weui_uploader_status" id="p<?php  echo $fid;?>" src="<?php  echo tomedia($row['fields'][$fid]);?>" height="50">
<script>
document.querySelector('#p<?php  echo $fid;?>').onclick = function () {
  wx.previewImage({
    current: '<?php  echo tomedia($row['fields'][$fid]);?>',
    urls: [
      '<?php  echo tomedia($row['fields'][$fid]);?>'
    ]
  });
};
</script>
					<?php  } else { ?>
					未上传
					<?php  } ?>
				<?php  } else { ?>
					<?php  if(!empty($row['fields'][$fid])) { ?><?php  echo $row['fields'][$fid];?><?php  } else { ?>未填<?php  } ?>
                <?php  } ?>
				</div>
				<div class="weui_cell_ft"><?php  echo $ftitle['fid'];?></div>
			</div>
                <?php  } } ?>
		</div>
<div class="weui_cells weui_cells_access">
	<div class="weui_cell">
		<a class="f-black block" style="width:100%;" href="<?php  echo $this->createMobileUrl('Mydayu_form', array('id' => $reid))?>"><i class="iconfont">&#xe60c;</i> 返回</a>
	</div>
</div>

		<?php  if($activity['isvoice']==1 || $activity['isrevoice']==1) { ?>
		<link rel="stylesheet" href="<?php echo MODULE_URL;?>template/weui/style/audio.css" />
        <script src="<?php echo MODULE_URL;?>template/weui/js/audio.js"></script>
        <script>
            $(function() {
                $('audio').audioPlayer();
            });
        </script>
		<?php  } ?>
<?php  } ?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('footers', TEMPLATE_INCLUDEPATH)) : (include template('footers', TEMPLATE_INCLUDEPATH));?>