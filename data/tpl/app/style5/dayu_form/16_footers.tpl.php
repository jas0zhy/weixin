<?php defined('IN_IA') or exit('Access Denied');?><?php  if($footer_off==1) { ?>
	<div class="weui_tabbar">
		<a href="<?php  echo $this->createMobileUrl('dayu_form', array('id' => $reid,'weid' => $weid))?>" class="weui_tabbar_item">
			<div class="weui_tabbar_icon"><i class="iconfont">&#xe60f;</i></div>
			<p class="weui_tabbar_label"><?php  echo $activity['title'];?></p>
		</a>
	</div>
<?php  } ?>
</div>
<?php
	$_share['title'] = !empty($_share['title']) ? $_share['title'] : $_W['account']['name'];
	$_share['imgUrl'] = !empty($_share['imgUrl']) ? $_share['imgUrl'] : '';
	if(isset($_share['content'])){
		$_share['desc'] = $_share['content'];
		unset($_share['content']);
	}
	$_share['desc'] = !empty($_share['desc']) ? $_share['desc'] : '';
	$_share['desc'] = preg_replace('/\s/i', '', str_replace('	', '', cutstr(str_replace('&nbsp;', '', ihtmlspecialchars(strip_tags($_share['desc']))), 60)));
	if(empty($_share['link'])) {
		$_share['link'] = '';
		$query_string = $_SERVER['QUERY_STRING'];
		if(!empty($query_string)) {
			parse_str($query_string, $query_arr);
			$query_arr['u'] = $_W['member']['uid'];
			$query_string = http_build_query($query_arr);
			$_share['link'] = $_W['siteroot'].'app/index.php?'. $query_string;
		}
	}
?>
	<script type="text/javascript">
	
	wx.config(jssdkconfig);
	
	var $_share = <?php  echo json_encode($_share);?>;
	
	if(typeof sharedata == 'undefined'){
		sharedata = $_share;
	} else {
		sharedata['title'] = sharedata['title'] || $_share['title'];
		sharedata['desc'] = sharedata['desc'] || $_share['desc'];
		sharedata['link'] = sharedata['link'] || $_share['link'];
		sharedata['imgUrl'] = sharedata['imgUrl'] || $_share['imgUrl'];
	}

	function tomedia(src) {
		if(typeof src != 'string')
			return '';
		if(src.indexOf('http://') == 0 || src.indexOf('https://') == 0) {
			return src;
		} else if(src.indexOf('../addons') == 0 || src.indexOf('../attachment') == 0) {
			src=src.substr(3);
			return window.sysinfo.siteroot + src;
		} else if(src.indexOf('./resource') == 0) {
			src=src.substr(2);
			return window.sysinfo.siteroot + 'app/' + src;
		} else if(src.indexOf('images/') == 0) {
			return window.sysinfo.attachurl+ src;
		}
	}
	
	if(sharedata.imgUrl == ''){
		var _share_img = $('body img:eq(0)').attr("src");
		if(_share_img == ""){
			sharedata['imgUrl'] = window.sysinfo.attachurl + 'images/global/wechat_share.png';
		} else {
			sharedata['imgUrl'] = tomedia(_share_img);
		}
	}
	
	if(sharedata.desc == ''){
		var _share_content = _removeHTMLTag($('body').html());
		if(typeof _share_content == 'string'){
			sharedata.desc = _share_content.replace($_share['title'], '')
		}
	}
	
	wx.ready(function () {
		wx.onMenuShareAppMessage(sharedata);
		wx.onMenuShareTimeline(sharedata);
		wx.onMenuShareQQ(sharedata);
		wx.onMenuShareWeibo(sharedata);
	});
	<?php  if($controller == 'site' && $action == 'site') { ?>
		$('#category_show').click(function(){
			$('.head .order').toggleClass('hide');
			return false;
		});
		//文章点击和分享加积分
		<?php  if(!empty($_GPC['u'])) { ?>
			var url = "<?php  echo url('site/site/handsel/', array('id' => $detail['id'], 'action' => 'click', 'u' => $_GPC['u']), true);?>";
			$.post(url, function(dat){});
		<?php  } ?>
		sharedata.success = function(){
			var url = "<?php  echo url('site/site/handsel/', array('id' => $detail['id'], 'action' => 'share'));?>";
			$.post(url, function(dat){});
		}
	<?php  } ?>
document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
	<?php  if($share==1) { ?>
	WeixinJSBridge.call('hideOptionMenu');
	<?php  } else { ?>
	WeixinJSBridge.call('showOptionMenu');
	<?php  } ?>
});
	</script>
</body>
</html>
