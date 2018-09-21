<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('headers', TEMPLATE_INCLUDEPATH)) : (include template('headers', TEMPLATE_INCLUDEPATH));?>
	<script type="text/javascript" src="<?php  echo $_W['siteroot'];?>app/resource/js/lib/jquery-1.11.1.min.js"></script>
    <script src="<?php echo TEMPLATE_PATH;?>time/js/mobiscroll_002.js" type="text/javascript"></script>
	<script src="<?php echo TEMPLATE_PATH;?>time/js/mobiscroll_004.js" type="text/javascript"></script>
	<link href="<?php echo TEMPLATE_PATH;?>time/css/mobiscroll_002.css" rel="stylesheet" type="text/css">
	<script src="<?php echo TEMPLATE_PATH;?>time/js/mobiscroll.js" type="text/javascript"></script>
	<script src="<?php echo TEMPLATE_PATH;?>time/js/mobiscroll_003.js" type="text/javascript"></script>
	<script src="<?php echo TEMPLATE_PATH;?>time/js/mobiscroll_005.js" type="text/javascript"></script>
	<link href="<?php echo TEMPLATE_PATH;?>time/css/mobiscroll_003.css" rel="stylesheet" type="text/css">
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

		return true;
	}
</script>
<style>
.am-g{background-color:#f2f2f2;font-weight:300;}
.am-g .am-form-group{padding:0.5rem 0 0.5rem 0;margin:0;background-color:#fff;width:100%;}
.am-g .am-form-group label.am-u-sm-3 {line-height:3rem;}

.am-u-sm-3{padding:0;width:25%;height:3.8rem;font-size:1.2rem;font-weight:300;background-color:#efeff4;text-align:right;padding: 0.5rem;line-height:1.8rem;margin:0;}
.am-u-sm-9{border-bottom: 0px solid #ccc;width:75%;}

.am-form-group .am-u-sm-12{margin:0;}

.description{font-size:1.2rem;line-height:1.6rem;padding:0.5rem 0.5rem 0;}
.am-thumbnails{margin-left:-2rem;}
.am-thumbnails > li {float:left;display: block;padding:0;margin:0;line-height:2rem;height:3.8rem;min-width:50%;list-style:none}
.am-thumbnails > li .am-checkbox-inline, .am-thumbnails > li .am-radio-inline{background-color:transparent;padding: 0 0 0 2rem;height:1rem;line-height:1.8rem;min-width:50%;}

.am-list > li .am-radio-inline{background-color:transparent;padding: 0 0 0 2rem;height:3rem;line-height:2rem;min-width:100%;}

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
.am-form .am-u-sm-9 input[type="number"]{padding: 0 3rem;color:#f46a04}
.am-form .am-u-sm-9 .num{color:#f46a04}
.am-form-group .iconfont{font-size:1.5rem;padding-left:0.5rem;line-height:1.8rem;}
.am-container, .am-g{margin:0;}
.am-panel { margin-bottom: 0;border-bottom: 1px solid #ddd;}
.am-panel-bd {padding: 0rem 1.25rem;}

.am-form-label{color:#333;}
.upload{width:100%;height:8rem;}
</style>
	<header data-am-widget="header" id="header" class="am-header am-topbar-inverse am-header-fixed">
		<div class="am-header-left am-header-nav">
		<img src="<?php  if(!empty($fans['tag']['avatar'])) { ?><?php  echo $fans['tag']['avatar'];?><?php  } else { ?>resource/images/noavatar_middle.gif<?php  } ?>" class="am-circle"> <font><?php  echo $fans['nickname'];?></font>
		</div>
		<div class="am-header-right am-header-nav">
		<a class="head-nav-list line" href="<?php  echo $this->createMobileUrl('mydayu_form', array('weid' => $_W['uniacid'], 'id' => $reid))?>"><?php  if(empty($activity['mname'])) { ?>我的表单<?php  } else { ?><?php  echo $activity['mname'];?><?php  } ?></a>
		</div>
	</header>
	<div class="am-panel">
		<div class="am-panel-hd"><span class="am-text-success am-text-lg"><?php  echo $activity['title'];?></span></div>
		<div class="am-panel-bd am-text-danger">
			<?php  echo htmlspecialchars_decode($activity['content'])?>
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
		<label class="am-u-sm-12 am-form-label">姓名 <span class="am-text-danger">*</span></label>
		<div class="am-u-sm-12 am-form-icon">
				<i class="am-icon iconfont">&#xe61d;</i>
			<input type="text" class="am-form-field" name="member" id="member" value="<?php  echo $userinfo['realname'];?>" placeholder="请输入您的姓名" required>
		</div>
	</div>
	<div class="am-form-group">		
		<label class="am-u-sm-12 am-form-label">手机 <span class="am-text-danger">*</span></label>		
		<div class="am-u-sm-12 am-form-icon">
				<i class="am-icon iconfont">&#xe601;</i>
			<input type="tel" class="am-form-field" name="mobile" id="mobile" value="<?php  echo $userinfo['mobile'];?>" placeholder="请输入手机号码<?php  echo $_SESSION['token'][$_GPC['token']];?>" required>
		</div>
	</div>
				<?php  if(is_array($ds)) { foreach($ds as $fields) { ?>
	<div class="am-form-group">
		<label class="am-u-sm-12 am-form-label"><?php  echo $fields['title'];?><?php  if($fields['essential']) { ?> <span class="am-text-danger">*</span><?php  } ?></label>	
				
				<?php  if($fields['type'] == 'text') { ?>
		<div class="am-u-sm-12 am-form-icon">
				<i class="am-icon iconfont">&#xe623;</i>
			<input type="text" class="am-form-field" name="field_<?php  echo $fields['refid'];?>_<?php  echo $fields['bind'];?>" value="<?php  echo $fields['default'];?>" placeholder="请输入<?php  echo $fields['title'];?>" <?php  if($fields['essential']) { ?>required<?php  } ?>>
		</div>
				<?php  } ?>
						<?php  if($fields['type'] == 'email') { ?>
		<div class="am-u-sm-12 am-form-icon">
				<i class="am-icon iconfont">&#xe61b;</i>
			<input type="text" class="am-form-field" name="field_<?php  echo $fields['refid'];?>_<?php  echo $fields['bind'];?>" value="<?php  echo $fields['default'];?>" placeholder="请输入<?php  echo $fields['title'];?>" <?php  if($fields['essential']) { ?>required<?php  } ?>>
		</div>
						<?php  } ?>
				<?php  if($fields['type'] == 'number') { ?>
		<div class="am-u-sm-12 am-form-icon">
				<i class="am-icon iconfont">&#xe624;</i>
			<input type="number" class="am-form-field" name="field_<?php  echo $fields['refid'];?>_<?php  echo $fields['bind'];?>" value="<?php  echo $fields['default'];?>" placeholder="请输入<?php  echo $fields['title'];?>" <?php  if($fields['essential']) { ?>required<?php  } ?>>
		</div>
				<?php  } ?>
						<?php  if($fields['type'] == 'textarea') { ?>
		<div class="am-u-sm-12">
			<textarea name="field_<?php  echo $fields['refid'];?>_<?php  echo $fields['bind'];?>" rows="5" placeholder="请填写<?php  echo $fields['title'];?>" <?php  if($fields['essential']) { ?>required<?php  } ?>><?php  echo $fields['default'];?></textarea>
		</div>
						<?php  } ?>
				
						<?php  if($fields['type'] == 'radio') { ?>
				<div class="am-u-sm-12 checkbox">
				<ul class="am-list" style="border-left: 1px solid #ddd;border-right: 1px solid #ddd;">
					<?php  if(is_array($fields['options'])) { foreach($fields['options'] as $v) { ?>
					<li style="padding-left:0.5rem"><label class="am-radio-inline am-text-success" style="margin-top:1rem;"><input type="radio" name="field_<?php  echo $fields['refid'];?>_<?php  echo $fields['bind'];?>" value="<?php  echo $v;?>" data-am-ucheck <?php  if($v == $fields['default']) { ?>checked<?php  } ?>> <?php  echo $v;?></label></li>
					<?php  } } ?>
				</ul>
				</div>
						<?php  } ?>

						<?php  if($fields['type'] == 'image') { ?>
				<div class="am-u-sm-12 am-form-file">
                    <input id="field_<?php  echo $fields['refid'];?>" class="am-input-sm am-fr upload" type="file" name="field_<?php  echo $fields['refid'];?>_<?php  echo $fields['bind'];?>" accept="image/*" capture="camera" <?php  if($fields['essential']) { ?>required<?php  } ?> />
                    <div class="am-text-center" style="height:10rem;overflow: hidden;margin-top:-2rem;" id="showfield_<?php  echo $fields['refid'];?>"><span class="am-icon iconfont" style="font-size:8rem;line-height:12rem;">&#xe602;</span></div>
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
		<div class="am-u-sm-12">
				<ul class="am-thumbnails">
					<?php  if(is_array($fields['options'])) { foreach($fields['options'] as $v) { ?>
					<li><label class="am-checkbox-inline"><input type="checkbox" name="field_<?php  echo $fields['refid'];?>_<?php  echo $fields['bind'];?>[]" value="<?php  echo $v;?>" data-am-ucheck <?php  if($v == $fields['default']) { ?>checked<?php  } ?>> <?php  echo $v;?></label></li>
					<?php  } } ?>
				</ul>
				</div>
						<?php  } ?>
						
						<?php  if($fields['type'] == 'select') { ?>
		<div class="am-u-sm-12">
			<select name="field_<?php  echo $fields['refid'];?>_<?php  echo $fields['bind'];?>" <?php  if($fields['essential']) { ?>required<?php  } ?>>
				<?php  if(is_array($fields['options'])) { foreach($fields['options'] as $v) { ?>
					<option value="<?php  echo $v;?>" <?php  if($v == $fields['default']) { ?> selected="selected"<?php  } ?>><?php  echo $v;?></option>
				<?php  } } ?>
			</select>
		</div>
						<?php  } ?>
						
						
						<?php  if($fields['type'] == 'calendar') { ?>
		<div class="am-u-sm-12 am-form-icon">
				<i class="am-icon iconfont">&#xe622;</i>
			<input type="text" class="am-form-field" value="<?php  echo $yuyuetime;?>" placeholder="<?php  echo $fields['title'];?> <?php  echo $yuyuetime;?>" name="field_<?php  echo $fields['refid'];?>_<?php  echo $fields['bind'];?>" id="appDateTime<?php  echo $fields['refid'];?>" readonly <?php  if($fields['essential']) { ?>required<?php  } ?>>
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
		<div class="am-u-sm-12 am-form-icon">
				<i class="am-icon iconfont">&#xe60a;</i>
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
		<div class="am-u-sm-12 description am-text-right am-link-muted" style="padding:0 1rem;color:#c9a68c"><?php  echo urldecode($fields['description']);?></div>
		<?php  } ?>
	</div>
				<?php  } } ?>
	<div class="am-form-group" style="padding:1rem 0 2rem;">
		<div class="am-u-sm-12">
			<input type="submit" class="am-btn am-btn-success am-btn-lg am-btn-block am-radius" value="立 即 提 交" name="submit">
		</div>
	</div>
	<?php  } ?>
	</form>
</div>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('footers', TEMPLATE_INCLUDEPATH)) : (include template('footers', TEMPLATE_INCLUDEPATH));?>