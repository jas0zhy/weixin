<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title><?php  echo $title;?></title>
	<meta name="format-detection" content="telephone=no, address=no">
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-touch-fullscreen" content="yes"/>
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
	<meta name="keywords" content="<?php  echo $_W['page']['keywords'];?>" />
	<meta name="description" content="<?php  echo $_W['page']['description'];?>" />
	<link rel="shortcut icon" href="<?php  echo $_W['siteroot'];?><?php  echo $_W['config']['upload']['attachdir'];?>/<?php  if(!empty($_W['setting']['copyright']['icon'])) { ?><?php  echo $_W['setting']['copyright']['icon'];?><?php  } else { ?>images/global/wechat.jpg<?php  } ?>" />
	<link href="<?php  echo $_W['siteroot'];?>app/<?php  echo str_replace('./', '', url('utility/style'))?>" rel="stylesheet">
	<link rel="stylesheet" href="http://cdn.amazeui.org/amazeui/2.5.2/css/amazeui.css">
	<link rel="stylesheet" href="<?php echo TEMPLATE_PATH;?>css/flat.css">
	<script src="<?php echo TEMPLATE_PATH;?>js/jquery.min.js"></script>
	<script src="http://cdn.amazeui.org/amazeui/2.5.2/js/amazeui.min.js"></script>
    <script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
	<script type="text/javascript" src="<?php  echo $_W['siteroot'];?>app/resource/js/lib/jquery-1.11.1.min.js"></script>
    <script src="<?php echo TEMPLATE_PATH;?>time/js/mobiscroll_002.js" type="text/javascript"></script>
	<script src="<?php echo TEMPLATE_PATH;?>time/js/mobiscroll_004.js" type="text/javascript"></script>
	<link href="<?php echo TEMPLATE_PATH;?>time/css/mobiscroll_002.css" rel="stylesheet" type="text/css">
	<script src="<?php echo TEMPLATE_PATH;?>time/js/mobiscroll.js" type="text/javascript"></script>
	<script src="<?php echo TEMPLATE_PATH;?>time/js/mobiscroll_003.js" type="text/javascript"></script>
	<script src="<?php echo TEMPLATE_PATH;?>time/js/mobiscroll_005.js" type="text/javascript"></script>
	<link href="<?php echo TEMPLATE_PATH;?>time/css/mobiscroll_003.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="<?php echo TEMPLATE_PATH;?>css/submit.css">
<script type="text/javascript">
	function validate(){
       var myname = /^[\u4E00-\u9FA5]{1,6}$/;
			if($.trim($(':input[name="member"]').val())=='' || !myname.test($.trim($('input[name="member"]').val()))){
				alert('请正确输入姓名.');
				return false;
			}
       var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/;
			if($.trim($(':input[name="mobile"]').val())=='' || !myreg.test($.trim($('input[name="mobile"]').val()))){
				alert('请输入正确的手机号码.');
				return false;
			}
			if($(':checkbox[name="agree"]:checked').length == 0) {
				alert('阅读并同意相关协议方可提交.');
				return false;
			}

		return true;
	}
</script>
	<script type="text/javascript">
	if(navigator.appName == 'Microsoft Internet Explorer'){
		if(navigator.userAgent.indexOf("MSIE 5.0")>0 || navigator.userAgent.indexOf("MSIE 6.0")>0 || navigator.userAgent.indexOf("MSIE 7.0")>0) {
			alert('您使用的 IE 浏览器版本过低, 推荐使用 Chrome 浏览器或 IE8 及以上版本浏览器.');
		}
	}
	<?php  define('HEADER', true);?>
	window.sysinfo = {
<?php  if(!empty($_W['uniacid'])) { ?>
		'uniacid': '<?php  echo $_W['uniacid'];?>',
<?php  } ?>
<?php  if(!empty($_W['acid'])) { ?>
		'acid': '<?php  echo $_W['acid'];?>',
<?php  } ?>
<?php  if(!empty($_W['openid'])) { ?>
		'openid': '<?php  echo $_W['openid'];?>',
<?php  } ?>
<?php  if(!empty($_W['uid'])) { ?>
		'uid': '<?php  echo $_W['uid'];?>',
<?php  } ?>
		'siteroot': '<?php  echo $_W['siteroot'];?>',
		'siteurl': '<?php  echo $_W['siteurl'];?>',
		'attachurl': '<?php  echo $_W['attachurl'];?>',
		'attachurl_local': '<?php  echo $_W['attachurl_local'];?>',
<?php  if(defined('MODULE_URL')) { ?>
		'MODULE_URL': '<?php echo MODULE_URL;?>',
<?php  } ?>
		'cookie' : {'pre': '<?php  echo $_W['config']['cookie']['pre'];?>'}
	};
	
	// jssdk config 对象
	jssdkconfig = <?php  echo json_encode($_W['account']['jssdkconfig']);?> || {};
	
	// 是否启用调试
	jssdkconfig.debug = false;
	
	jssdkconfig.jsApiList = [
		'checkJsApi',
		'onMenuShareTimeline',
		'onMenuShareAppMessage',
		'onMenuShareQQ',
		'onMenuShareWeibo',
		'hideMenuItems',
		'showMenuItems',
		'hideAllNonBaseMenuItem',
		'showAllNonBaseMenuItem',
		'translateVoice',
		'startRecord',
		'stopRecord',
		'onRecordEnd',
		'playVoice',
		'pauseVoice',
		'stopVoice',
		'uploadVoice',
		'downloadVoice',
		'chooseImage',
		'previewImage',
		'uploadImage',
		'downloadImage',
		'getNetworkType',
		'openLocation',
		'getLocation',
		'hideOptionMenu',
		'showOptionMenu',
		'closeWindow',
		'scanQRCode',
		'chooseWXPay',
		'openProductSpecificView',
		'addCard',
		'chooseCard',
		'openCard'
	];
	
	</script>
	
	<script>
	function _removeHTMLTag(str) {
		if(typeof str == 'string'){
			str = str.replace(/<script[^>]*?>[\s\S]*?<\/script>/g,'');
			str = str.replace(/<style[^>]*?>[\s\S]*?<\/style>/g,'');
			str = str.replace(/<\/?[^>]*>/g,'');
			str = str.replace(/\s+/g,'');
			str = str.replace(/&nbsp;/ig,'');
		}
		return str;
	}
	</script>
<script language="javascript" type="text/javascript">  
$(document).ready(function(){
	var str = $('div#count').html();  
	var nstr = str.replace(/\n\r/gi,"<br/>");
	nstr = str.replace(/\r/gi,"<br/>"); 
	nstr = str.replace(/\n/gi,"<br/>"); 
	$('div#count').html(nstr); 
});
</script>
</head>
<body>
<style>
.am-g{background-color:#f2f2f2;font-weight:300;}
.am-g .am-form-group{padding:0.5rem 0 0.5rem 0;margin:0 0 1px;background-color:#fff;width:100%;}
.am-g .am-form-group:last-child{background-color:transparent;}
.am-g .am-form-group label.am-u-sm-3 {line-height:3rem;}

.am-u-sm-3{padding:0;width:40%;height:3.8rem;font-size:1.5rem;font-weight:500;text-align:right;padding: 0.5rem;line-height:1.8rem;margin:0;}
.am-u-sm-9{border-bottom: 0px solid #ccc;width:60%;}

.am-form-group .am-u-sm-12{margin:0;}

.description{font-size:1.2rem;line-height:1.6rem;padding:0.5rem 0.5rem 0;}
.am-thumbnails{margin-left:-2rem;}
.am-thumbnails > li {float:left;display: block;padding:0;margin:0;line-height:2rem;height:3.8rem;min-width:50%;list-style:none}
.am-thumbnails > li .am-checkbox-inline, .am-thumbnails > li .am-radio-inline{background-color:transparent;padding: 0 0 0 2rem;height:1rem;line-height:2rem;min-width:50%;}

.am-u-sm-6{padding:0;}
.am-u-sm-6:first-child{padding-right:0.5rem;}

.am-popup {bottom: 0;top:auto;height: 80%;}
.am-form-icon [class*='am-icon-'] {left: 2rem;}

.checkbox{padding-top:0.5rem;}
.dw {
    position: absolute;
    top: 0;height:32rem;
    left: 0;
}
.am-u-sm-12 .am-u-sm-10 p{padding:0 0 0.2rem 0;line-height:120%;margin:0;}
.am-form .am-u-sm-9 .num{color:#f46a04}

.am-form select::-webkit-input-placeholder,
.am-form textarea::-webkit-input-placeholder,
.am-form input[type="text"]::-webkit-input-placeholder,
.am-form input[type="password"]::-webkit-input-placeholder,
.am-form input[type="datetime"]::-webkit-input-placeholder,
.am-form input[type="datetime-local"]::-webkit-input-placeholder,
.am-form input[type="date"]::-webkit-input-placeholder,
.am-form input[type="month"]::-webkit-input-placeholder,
.am-form input[type="time"]::-webkit-input-placeholder,
.am-form input[type="week"]::-webkit-input-placeholder,
.am-form input[type="number"]::-webkit-input-placeholder,
.am-form input[type="email"]::-webkit-input-placeholder,
.am-form input[type="url"]::-webkit-input-placeholder,
.am-form input[type="search"]::-webkit-input-placeholder,
.am-form input[type="tel"]::-webkit-input-placeholder,
.am-form input[type="color"]::-webkit-input-placeholder,
.am-form input[type="submit"]::-webkit-input-placeholder,
.am-form-field::-webkit-input-placeholder {
  color: #999;font-size:1.2rem;
}
.am-form input[type="text"],
.am-form input[type="password"],
.am-form input[type="datetime"],
.am-form input[type="datetime-local"],
.am-form input[type="date"],
.am-form input[type="month"],
.am-form input[type="time"],
.am-form input[type="week"],
.am-form input[type="number"],
.am-form input[type="email"],
.am-form input[type="url"],
.am-form input[type="search"],
.am-form input[type="tel"],
.am-form input[type="color"],
.am-form-field {
  font-size: 1.4rem;
  color: #333;
}
.head-nav{height:4rem; background:rgba(0,0,0,0.3);}
.head-nav .line{line-height:3rem;}
.am-form input[type="number"]{padding-left:0.8rem;}
#count{font-weight:300;}
</style>
	<div class="am-intro">
		<ul class="am-slides">
			<li><img src="<?php  echo $activity['thumb'];?>" style="width:100%;"></li>
		<div class="head-nav">
			<a class="head-nav-list line" href="<?php  echo $this->createMobileUrl('mydayu_form', array('weid' => $_W['uniacid'], 'id' => $reid))?>"><?php  if(empty($activity['mname'])) { ?>我的表单<?php  } else { ?><?php  echo $activity['mname'];?><?php  } ?></a>
			<a class="head-nav-list line" href="#xieyi" data-am-offcanvas>相关协议</a>
			<a class="head-nav-list line" href="javascript:;" data-am-modal="{target: '#explain'}">开户说明</a>
		</div>		
		</ul>
		<div class="am-popup" id="explain">
		<div class="am-popup-inner">
			<div class="am-popup-hd">
			<h4 class="am-popup-title"><?php  echo $activity['title'];?></h4>
			<span data-am-modal-close class="am-close">&times;</span>
			</div>
			<div class="am-popup-bd">
			<?php  echo htmlspecialchars_decode($activity['content'])?>
			</div>
		</div>
		</div>
		<div id="xieyi" class="am-offcanvas">
  <div class="am-offcanvas-bar">
    <div class="am-offcanvas-content am-text-xs" id="count">
			<?php  echo $activity['description'];?>
    </div>
  </div>
</div>
	</div>
	
<div class="am-container">
<div class="am-g">
	<form action="" class="am-form am-form-inline am-form-horizontal" enctype="multipart/form-data" method="POST" id="form1" onsubmit="return validate();" data-am-validator>
    <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
	<?php  if($activity['endtime'] < TIMESTAMP) { ?>
	<div class="am-form-group" style="margin:1rem 0 1rem;">
		<div class="am-u-sm-12">
			<input type="submit" class="am-btn am-btn-warning am-btn-lg am-btn-block" value="活动已结束" name="submit" disabled>
		</div>
	</div>
	<?php  } else { ?>
	<div class="am-form-group">
		<div class="am-u-sm-12 am-text-center"><strong>请认真填写资料</strong></div>
	</div>
	<div class="am-form-group">
				<label class="am-u-sm-3">姓名</label>	
		<div class="am-u-sm-9">
			<input type="text" class="am-form-field" name="member" id="member" value="<?php  echo $userinfo['realname'];?>" placeholder="请输入您的姓名" required>
		</div>
	</div>
	<div class="am-form-group">
				<label class="am-u-sm-3">手机号码</label>	
		<div class="am-u-sm-9">
			<input type="number" class="am-form-field" name="mobile" id="mobile" value="<?php  echo $userinfo['mobile'];?>" placeholder="请输入手机号码" required>
		</div>
	</div>
				<?php  if(is_array($ds)) { foreach($ds as $fields) { ?>
	<div class="am-form-group">
				
				<?php  if($fields['type'] == 'text') { ?>
				<label class="am-u-sm-3"><?php  echo $fields['title'];?></label>
				<div class="am-u-sm-9">
			<input type="text" class="am-form-field" name="field_<?php  echo $fields['refid'];?>_<?php  echo $fields['bind'];?>" value="<?php  echo $fields['default'];?>" placeholder="请输入<?php  echo $fields['title'];?>" <?php  if($fields['essential']) { ?>required<?php  } ?>>
		</div>
				<?php  } ?>
						<?php  if($fields['type'] == 'email') { ?>
				<label class="am-u-sm-3"><?php  echo $fields['title'];?></label>
				<div class="am-u-sm-9">
			<input type="text" class="am-form-field" name="field_<?php  echo $fields['refid'];?>_<?php  echo $fields['bind'];?>" value="<?php  echo $fields['default'];?>" placeholder="请输入<?php  echo $fields['title'];?>" <?php  if($fields['essential']) { ?>required<?php  } ?>>
		</div>
						<?php  } ?>
				<?php  if($fields['type'] == 'number') { ?>
				<label class="am-u-sm-3"><?php  echo $fields['title'];?></label>
				<div class="am-u-sm-9">
			<input type="number" class="am-form-field" name="field_<?php  echo $fields['refid'];?>_<?php  echo $fields['bind'];?>" value="<?php  echo $fields['default'];?>" placeholder="请输入<?php  echo $fields['title'];?>" <?php  if($fields['essential']) { ?>required<?php  } ?>>
		</div>
				<?php  } ?>
						<?php  if($fields['type'] == 'textarea') { ?>
				<label class="am-u-sm-3"><?php  echo $fields['title'];?></label>
				<div class="am-u-sm-9">
			<textarea name="field_<?php  echo $fields['refid'];?>_<?php  echo $fields['bind'];?>" rows="5" placeholder="请填写<?php  echo $fields['title'];?>" <?php  if($fields['essential']) { ?>required<?php  } ?>><?php  echo $fields['default'];?></textarea>
		</div>
						<?php  } ?>
				
						<?php  if($fields['type'] == 'radio') { ?>
				<label class="am-u-sm-3"><?php  echo $fields['title'];?></label>	
				<div class="am-u-sm-9 checkbox">
				<ul class="am-thumbnails">
					<?php  if(is_array($fields['options'])) { foreach($fields['options'] as $v) { ?>
					<li><label class="am-radio-inline"><input type="radio" name="field_<?php  echo $fields['refid'];?>_<?php  echo $fields['bind'];?>" value="<?php  echo $v;?>" data-am-ucheck <?php  if($v == $fields['default']) { ?>checked<?php  } ?>> <?php  echo $v;?></label></li>
					<?php  } } ?>
				</ul>
				</div>
						<?php  } ?>

						<?php  if($fields['type'] == 'image') { ?>
				<label class="am-u-sm-3"><?php  echo $fields['title'];?></label>
				<div class="am-u-sm-9 am-form-file">
                    <input id="field_<?php  echo $fields['refid'];?>" class="am-input-sm am-fr upload" type="file" name="field_<?php  echo $fields['refid'];?>_<?php  echo $fields['bind'];?>" accept="image/*" capture="camera" <?php  if($fields['essential']) { ?>required<?php  } ?> />
                    <div class="am-text-center" style="height:5rem;overflow: hidden;margin-top:-1rem;" id="showfield_<?php  echo $fields['refid'];?>"><span class="am-icon iconfont" style="font-size:4rem;margin-left:-10rem;">&#xe602;</span></div>
				</div>
			
    <script type="text/javascript">
    $(function(){
        $('#field_<?php  echo $fields['refid'];?>').change(function(){
            var file = this.files[0]; //选择上传的文件
            var r = new FileReader();
            r.readAsDataURL(file); //Base64
            $(r).load(function(){
                $("#showfield_<?php  echo $fields['refid'];?>").html();
                $('#showfield_<?php  echo $fields['refid'];?>').html('<img class="am-radius" height="100%" src="'+ this.result +'" alt="" />');
            });
        });
    });
    </script>
						<?php  } ?>						
				
						<?php  if($fields['type'] == 'checkbox') { ?>
		<label class="am-u-sm-3"><?php  echo $fields['title'];?></label>
		<div class="am-u-sm-9">
				<ul class="am-thumbnails">
					<?php  if(is_array($fields['options'])) { foreach($fields['options'] as $v) { ?>
					<li><label class="am-checkbox-inline"><input type="checkbox" name="field_<?php  echo $fields['refid'];?>_<?php  echo $fields['bind'];?>[]" value="<?php  echo $v;?>" data-am-ucheck <?php  if($v == $fields['default']) { ?>checked<?php  } ?>> <?php  echo $v;?></label></li>
					<?php  } } ?>
				</ul>
				</div>
						<?php  } ?>
						
						<?php  if($fields['type'] == 'select') { ?>
		<label class="am-u-sm-3"><?php  echo $fields['title'];?></label>
		<div class="am-u-sm-9">
			<select name="field_<?php  echo $fields['refid'];?>_<?php  echo $fields['bind'];?>" <?php  if($fields['essential']) { ?>required<?php  } ?>>
				<?php  if(is_array($fields['options'])) { foreach($fields['options'] as $v) { ?>
					<option value="<?php  echo $v;?>" <?php  if($v == $fields['default']) { ?> selected="selected"<?php  } ?>><?php  echo $v;?></option>
				<?php  } } ?>
			</select>
		</div>
						<?php  } ?>
						
						
						<?php  if($fields['type'] == 'calendar') { ?>
				<label class="am-u-sm-3"><?php  echo $fields['title'];?></label>
				<div class="am-u-sm-9">
			<input type="text" class="am-form-field" value="" placeholder="<?php  echo $fields['title'];?> <?php  echo $yuyuetime;?>" name="field_<?php  echo $fields['refid'];?>_<?php  echo $fields['bind'];?>" id="appDateTime<?php  echo $fields['refid'];?>" readonly <?php  if($fields['essential']) { ?>required<?php  } ?>>
		</div>
	<script type="text/javascript">
        $(function () {
			var currYear = (new Date()).getFullYear();	
			var opt={};
			opt.date = {preset : 'date'};
			opt.datetime = {preset : 'datetime'};
			opt.time = {preset : 'time'};
	var nowData=new Date();
			opt.default = {
				theme: 'wp', //皮肤样式
		        display: 'bottom', //显示方式 
		        mode: 'scroller', //日期选择模式
				dateFormat: 'yyyy-mm-dd',
				lang: 'zh',
				showNow: true,
				nowText: "今天",
        cancelText: '取消',
        setText: '确定',
		    //    startYear: currYear - 0, //开始年份
		    //    endYear: currYear + 0 //结束年份
		minDate: new Date(nowData.getFullYear(),nowData.getMonth(),nowData.getDate(),nowData.getHours()+<?php  echo $activity['kaishi'];?>,00), 
		maxDate: new Date(nowData.getFullYear(),nowData.getMonth(),nowData.getDate()+<?php  echo $activity['tianshu'];?>,<?php  echo $activity['jieshu'];?>,00), 
			};

		  	var optDateTime = $.extend(opt['datetime'], opt['default']);
		    $("#appDateTime<?php  echo $fields['refid'];?>").mobiscroll(optDateTime).datetime(optDateTime);
        });
    </script>
						<?php  } ?>

						<?php  if($fields['type'] == 'range') { ?>
				<label class="am-u-sm-3"><?php  echo $fields['title'];?></label>
				<div class="am-u-sm-9">
			<select name="field_<?php  echo $fields['refid'];?>_<?php  echo $fields['bind'];?>" class="am-form-field" <?php  if($fields['essential']) { ?>required<?php  } ?>>
							<option value="0:00-1:00" >0:00-1:00</option>
							<option value="1:00-2:00">1:00-2:00</option>
							<option value="2:00-3:00">2:00-3:00</option>
							<option value="3:00-4:00">3:00-4:00</option>
							<option value="4:00-5:00">4:00-5:00</option>
							<option value="5:00-6:00">5:00-6:00</option>
							<option value="6:00-7:00">6:00-7:00</option>
							<option value="7:00-8:00">7:00-8:00</option>
							<option value="8:00-9:00">8:00-9:00</option>
							<option value="9:00-10:00">9:00-10:00</option>
							<option value="10:00-11:00">10:00-11:00</option>
							<option value="11:00-12:00">11:00-12:00</option>
							<option value="12:00-13:00">12:00-13:00</option>
							<option value="13:00-14:00">13:00-14:00</option>
							<option value="14:00-15:00">14:00-15:00</option>
							<option value="15:00-16:00">15:00-16:00</option>
							<option value="16:00-17:00">16:00-17:00</option>
							<option value="17:00-18:00">17:00-18:00</option>
							<option value="18:00-19:00">18:00-19:00</option>
							<option value="19:00-20:00">19:00-20:00</option>
							<option value="20:00-21:00">20:00-21:00</option>
							<option value="21:00-22:00">21:00-22:00</option>
							<option value="22:00-23:00">22:00-23:00</option>
							<option value="23:00-24:00">23:00-24:00</option>
			</select>
		</div>
						<?php  } ?>
						
						<?php  if($fields['type'] == 'reside') { ?>
		<script src="<?php echo TEMPLATE_PATH;?>js/amazeui.chosen.js" type="text/javascript" charset="utf-8"></script>
		<script src="<?php echo TEMPLATE_PATH;?>js/jquery.citiesChange.js"></script>
		<div class="am-u-sm-12">
				<div class="am-u-sm-6">
					<select name="reside[province]" id="province" <?php  if($fields['essential']) { ?>required<?php  } ?>>
						<option><?php  echo $resideprovince;?></option>
					</select>
				</div>
				
				<div class="am-u-sm-6">
					<select name="reside[city]" id="city" <?php  if($fields['essential']) { ?>required<?php  } ?>>
						<option><?php  echo $residecity;?></option>
					</select>
				</div>
		<script type="text/javascript">
			$(function() {
				$.initProv("#province", "#city");
			})
		</script>
				</div>
						<?php  } ?>
				
		<?php  if(!empty($fields['description'])) { ?>
		<div class="am-u-sm-12 description am-link-muted" style="padding:0 1rem;color:#c9a68c">
			<div class="am-u-sm-3" style="height:1.5rem"></div>
			<div class="am-u-sm-9"><?php  echo urldecode($fields['description']);?></div>
		</div>
		<?php  } ?>
	</div>
				<?php  } } ?>
	<div class="am-form-group">
				<div class="am-u-sm-12 checkbox">
				<ul class="am-thumbnails">
					<li style="text-align:center;width:100%;padding:0;"><label class="am-checkbox-inline" style="padding:0;line-height:1.8rem;"><input type="checkbox" name="agree" style="margiin-top:5rem;" value="0" data-am-ucheck> <span style="font-weight:700;padding-left:0.5rem;">我已阅读<a href="#xieyi" data-am-offcanvas>相关协议</a></span></label></li>
				</ul>
				</div>
	</div>
	<div class="am-form-group" style="margin:1rem 0 1rem;">
		<div class="am-u-sm-12">
			<input type="submit" class="am-btn am-btn-danger am-btn-lg am-btn-block" value="立 即 提 交" name="submit">
		</div>
	</div>
	<?php  } ?>
	</form>
	
</div>
</div>
<script>
$(function() {
  $('#doc-vld-msg').validator({
    onValid: function(validity) {
      $(validity.field).closest('.am-form-group').find('.am-alert').hide();
    },

    onInValid: function(validity) {
      var $field = $(validity.field);
      var $group = $field.closest('.am-form-group');
      var $alert = $group.find('.am-alert');
      // 使用自定义的提示信息 或 插件内置的提示信息
      var msg = $field.data('validationMessage') || this.getValidationMessage(validity);

      if (!$alert.length) {
        $alert = $('<div class="am-alert am-alert-danger"></div>').hide().
          appendTo($group);
      }

      $alert.html(msg).show();
    }
  });
});
</script>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('footers', TEMPLATE_INCLUDEPATH)) : (include template('footers', TEMPLATE_INCLUDEPATH));?>