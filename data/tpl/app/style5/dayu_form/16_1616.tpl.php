<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('header', TEMPLATE_INCLUDEPATH)) : (include template('header', TEMPLATE_INCLUDEPATH));?>
	<script type="text/javascript" src="<?php  echo $_W['siteroot'];?>app/resource/js/lib/jquery-1.11.1.min.js"></script>
    <script src="<?php echo TEMPLATE_PATH;?>time/js/mobiscroll_002.js" type="text/javascript"></script>
	<script src="<?php echo TEMPLATE_PATH;?>time/js/mobiscroll_004.js" type="text/javascript"></script>
	<link href="<?php echo TEMPLATE_PATH;?>time/css/mobiscroll_002.css" rel="stylesheet" type="text/css">
	<script src="<?php echo TEMPLATE_PATH;?>time/js/mobiscroll.js" type="text/javascript"></script>
	<script src="<?php echo TEMPLATE_PATH;?>time/js/mobiscroll_003.js" type="text/javascript"></script>
	<script src="<?php echo TEMPLATE_PATH;?>time/js/mobiscroll_005.js" type="text/javascript"></script>
	<link href="<?php echo TEMPLATE_PATH;?>time/css/mobiscroll_003.css" rel="stylesheet" type="text/css">
<link type="text/css" rel="stylesheet" href="../addons/dayu_form/template/mobile/common.mobile.css" />
<style>
	body{background:#ECECEC;}
	.text-error { color:red}
	.dayu_form-thumb{width:100%;}
	.mobile-content img {width: 100%;}	

html, body, form{margin:0;padding:0;height:100%;}
body{background:#f7f7f7;}
.dw {position: absolute;top: 0;height:320px;left: 0;}
.basic-accordian{width:100%;padding:0px;-webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px;}
.dropdown-select{border:0; font-size:14px;height:32px;line-height:28px; padding:0 8px 0 0;width:90%;}
select.dropdown-select{height:38px;width:100%;border:1px solid #c4c4c4;margin-bottom:5px;padding:0 5px;}
.datetime, .form-control{padding:0;margin:0;}
.userinfotop span.none{color:#fff;background:#e86691;text-align:center;margin-left:16px;position:absolute; top:150px;font-size:16px;height:20px;padding:5px 22px;border:0;-webkit-border-radius:0 0 5px 5px;border-radius:0 0 5px 5px;}
.mobile-content { border-bottom: 0px solid #fff; margin:0 auto; overflow: hidden;width: 96%;}
.mobile-content1 {margin: 0px auto 10px; overflow: hidden; padding-bottom:4px;width: 96%;}
.mobile-content1 div {}
.tdd{ border:1px solid #c4c4c4; background:#fff;line-height:38px; margin:5px auto 5px; padding:0px 0 2px 12px;-webkit-border-radius: 2px;-moz-border-radius: 2px;-o-border-radius: 2px;}
.ui-select { text-align: center;}  
.ui-select select { position: absolute; left: 0px; top: 0px; width: 100%; height: 3em; opacity: 0;}  
.btn-success1 { background-color: #AC9359; background-image: linear-gradient(to bottom, #AC9359, #AC9359); background-repeat: repeat-x; border-color: #AC9359; color: #ffffff;text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25); padding:10px 0; border-radius: 6px;}
.mobile-content2 { overflow: hidden; padding:10px 10px;}
textarea{ background-color: #ffffff; border: 1px solid #c4c4c4;-webkit-border-radius: 2px;-moz-border-radius: 2px;-o-border-radius: 2px;padding:8px 8px;width:100%;}
.info, .blue {background:#e6f8ff;}
.info input {background:#e6f8ff;width:90%;}
input.datetimepickers{float:left;width:50%;border:0;background-color:#fff;padding:0;margin:0;height:32px;;}
.submit {background-color:#499a68;padding:8px;height:45px;font-size:18px;text-decoration:none;border:0px solid #0B8E00;color: #ffffff;display:block;text-align:center;text-shadow:0 1px rgba(0, 0, 0, 0.2);-webkit-border-radius: 0px;-moz-border-radius: 0px;-o-border-radius: 0px;}
.member{width:100px;}
i{line-height:30px;text-indent:0px;margin-right:5px;}
label{margin-left:10px;font-weight:normal}
.time, .time input{color:#499a68;background:#eee;}
.tdd .fa-clock-o{float:left;line-height:30px;width:20px;margin-right:0px;}
.desc{color:#666;}
footer {float:left;margin:0;bottom: 0;height: 45px;position: fixed;z-index: 10;width:100%;}

.mobile-hds{height:42px;line-height:42px;font-size:16px;padding:0 10px;color: #fff;border-bottom:1px solid #C6C6C6;background-color:#0e90d2;}
.mobile-hds a{float:right; border:1px solid #499a68;background-color:#64bf87;color:#fff;font-size:12px;line-height:22px;-webkit-border-radius: 5px;-moz-border-radius: 5px;-o-border-radius: 5px;padding:2px 5px;margin:8px 5px 0 0;}
</style>

<div class="dayu_form">
	<div class="mobile-div img-rounded">
		<div class="mobile-hds"><?php  echo $activity['title'];?>
			<a href="<?php  echo $this->createMobileUrl('mydayu_form', array('name' => 'dayu_form', 'weid' => $_W['uniacid'], 'id' => $reid))?>"><span><?php  if(empty($activity['mname'])) { ?>我的表单<?php  } else { ?><?php  echo $activity['mname'];?><?php  } ?></span></a></div>
		<div class="mobile-content" style="padding:5px 5px;">
		<?php  echo htmlspecialchars_decode($activity['content'])?>
		</div>
	</div>
	
	<div class="basic-accordian">
	<form action="" method="post" enctype="multipart/form-data" onsubmit="return validate();" id="sky-form" class="sky-form">
		<div id="test0-header" class="accordion_headings header_highlight" style="margin-bottom:45px;">		
		<div class="mobile-content1">
				<div class="tdd info"><i class="fa fa-user"></i>
				<input type="text" name="member" value="<?php  echo $userinfo['realname'];?>" placeholder="请输入您的真实姓名" class="dropdown-select"/>
				</div>
			<div class="tdd info"><i class="fa fa-tablet"></i>
			<input type="text" name="mobile" value="<?php  echo $userinfo['mobile'];?>" class="dropdown-select" placeholder="请输入您的手机号码"/>
			</div>
				<?php  if(is_array($ds)) { foreach($ds as $row) { ?>

				<?php  if($row['type'] == 'text') { ?>
				<div class="tdd"><input type="text" name="field_<?php  echo $row['refid'];?>_<?php  echo $row['bind'];?>" value="<?php  echo $row['default'];?>" class="dropdown-select" placeholder="<?php  echo $row['title'];?>"/></div>
				<?php  } ?>
				<?php  if($row['type'] == 'number') { ?>
				<div class="tdd"><input type="text" name="field_<?php  echo $row['refid'];?>_<?php  echo $row['bind'];?>" value="<?php  echo $row['default'];?>" class="dropdown-select" placeholder="<?php  echo $row['title'];?>"/></div>
				<?php  } ?>
						<?php  if($row['type'] == 'textarea') { ?>
						<div class="texta"><textarea name="field_<?php  echo $row['refid'];?>_<?php  echo $row['bind'];?>" rows="3" placeholder="<?php  echo $row['title'];?>"/><?php  echo $row['default'];?></textarea></div>
						<?php  } ?>
						<?php  if($row['type'] == 'radio') { ?>
						<div><select name="field_<?php  echo $row['refid'];?>_<?php  echo $row['bind'];?>" class="dropdown-select"/>
							<option value="<?php  echo $row['title'];?>" /><?php  echo $row['title'];?></option>
						<?php  if(is_array($row['options'])) { foreach($row['options'] as $v) { ?>
							<option value="<?php  echo $v;?>" <?php  if($v == $row['default']) { ?> selected="selected"<?php  } ?>><?php  echo $v;?></option>
						<?php  } } ?>
						</select></div>
						<?php  } ?>
						<?php  if($row['type'] == 'checkbox') { ?>
						<div class="tdd"><?php  echo $row['title'];?>：
						<?php  if(is_array($row['options'])) { foreach($row['options'] as $v) { ?>
						<label class="checkbox-inline btn btn-small">
							<input type="checkbox" name="field_<?php  echo $row['refid'];?>_<?php  echo $row['bind'];?>[]" value="<?php  echo $v;?>" <?php  if($v == $row['default']) { ?> checked="checked"<?php  } ?>/><?php  echo $v;?>
						</label>
						<?php  } } ?>
						</div>
						<?php  } ?>
						<?php  if($row['type'] == 'select') { ?>
						<div style="margin:5px 0;"><select name="field_<?php  echo $row['refid'];?>_<?php  echo $row['bind'];?>" class="dropdown-select"/>
							<option value="<?php  echo $row['title'];?>" /><?php  echo $row['title'];?></option>
						<?php  if(is_array($row['options'])) { foreach($row['options'] as $v) { ?>
							<option value="<?php  echo $v;?>" <?php  if($v == $row['default']) { ?> selected="selected"<?php  } ?> /><?php  echo $v;?></option>
						<?php  } } ?>
						</select></div>
						<?php  } ?>
						<?php  if($row['type'] == 'calendar') { ?>
						<div><?php  echo tpl_form_field_date('field_' . $row['refid'] . '_' . $row['bind']);?></div>
						<?php  } ?>
						<?php  if($row['type'] == 'email') { ?>
						<div class="tdd"><input type="text" name="field_<?php  echo $row['refid'];?>_<?php  echo $row['bind'];?>" value="<?php  if($row['default']) { ?><?php  echo $row['default'];?><?php  } else { ?>@<?php  } ?>" class="dropdown-select" placeholder="<?php  echo $row['title'];?>"/></div>
						<?php  } ?>

						<?php  if($row['type'] == 'image') { ?>
						<div class="file"><?php  echo $row['title'];?>
							<?php  echo tpl_form_field_image('field_' . $row['refid'] . '_' . $row['bind'], '');?>
						</div>
						<?php  } ?>

						<?php  if($row['type'] == 'range') { ?>
						<div class="tdd"><i class="fa fa-clock-o" style="font-size:18px;margin-top:5px"></i>
						<input type="text" class="dropdown-select" value="<?php  echo $yuyuetime;?>" placeholder="<?php  echo $fields['title'];?> <?php  echo $yuyuetime;?>" name="field_<?php  echo $fields['refid'];?>_<?php  echo $fields['bind'];?>" id="appDateTime<?php  echo $fields['refid'];?>" readonly <?php  if($fields['essential']) { ?>required<?php  } ?>>
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
						<?php  if($row['type'] == 'reside') { ?>
						<?php  echo tpl_fans_form('reside',array('province' => $profile['resideprovince'],'city' => $profile['residecity'],'district' => $profile['residedist']));?>
						<?php  } ?>

						<?php  if(!empty($row['description'])) { ?>
						<div class="desc"><?php  echo urldecode($row['description']);?></div>
						<?php  } ?>
				<?php  } } ?>
	</div>
</div>
<footer>
		<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
		<input type="submit" class="btn btn-large btn-success submit" value="提 交" name="submit" style="width:100%;">
</footer>
</form>
</div>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('script', TEMPLATE_INCLUDEPATH)) : (include template('script', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('footer', TEMPLATE_INCLUDEPATH)) : (include template('footer', TEMPLATE_INCLUDEPATH));?>