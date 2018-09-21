<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header-base', TEMPLATE_INCLUDEPATH)) : (include template('common/header-base', TEMPLATE_INCLUDEPATH));?>
<style>
	body{
		background: url('themes/color/user/001.jpg');
		background-repeat:no-repeat; 
		background-size:cover;
	}
	.bg-white{
		  background-color: rgba(255, 255, 255, 0.81);
	}
	.text-muted {
  color: #7B7878;
}
</style>
<script>
	$('#form1').submit(function(){
		if($.trim($(':text[name="username"]').val()) == '') {
			util.message('没有输入用户名.', '', 'error');
			return false;
		}
		if($('#password').val() == '') {
			util.message('没有输入密码.', '', 'error');
			return false;
		}
		if($('#password').val() != $('#repassword').val()) {
			util.message('两次输入的密码不一致.', '', 'error');
			return false;
		}
/* 		<?php  if(is_array($extendfields)) { foreach($extendfields as $item) { ?>
		<?php  if($item['required']) { ?>
			if (!$.trim($('[name="<?php  echo $item['field'];?>"]').val())) {
				util.message('<?php  echo $item['title'];?>为必填项，请返回修改！', '', 'error');
				return false;
			}
		<?php  } ?>
		<?php  } } ?>
		*/		<?php  if($setting['register']['code']) { ?>
		if($.trim($(':text[name="code"]').val()) == '') {
			util.message('没有输入验证码.', '', 'error');
			return false;
		}
		<?php  } ?>
	});

</script>

<div class="bg-white pulldown">
	<div class="content content-boxed overflow-hidden">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4" style="padding-right: 30px;
  padding-left: 30px;">
				<div class="push-10-t push-10 animated fadeIn">

					<div class="text-center">
						<a href="./?refresh" <?php  if(!empty($_W['setting']['copyright']['flogo'])) { ?>style="background:url('<?php  echo tomedia($_W['setting']['copyright']['flogo']);?>') no-repeat;"<?php  } else { ?>style="background: url('resource/color/img/gw-logo.png') no-repeat;height:34px;display:block;
						background-position:center;"<?php  } ?>></a>

						<p class="text-muted push-5-t">人人店分销-微信三级分销商业版管理系统</p>
					</div>

					<form class="form-horizontal push-5-t" action="" method="post" role="form" id="form1">
						<div class="form-group">
							<label>用户名<span style="color:red">*</span></label>

							<input class="form-control" type="text" id="register1-username" name="username" placeholder="请输入用户名">

						</div>
						<div class="form-group">
							<label>密码<span style="color:red">*</span></label>

							<input class="form-control" type="password" id="password" name="password" placeholder="请输入密码">

						</div>
						<div class="form-group">
							<label>确认密码<span style="color:red">*</span></label>

							<input class="form-control" type="password" id="repassword" name="password" placeholder="请再次输入密码">

						</div>
						<?php  if($extendfields) { ?>
						<?php  if(is_array($extendfields)) { foreach($extendfields as $item) { ?>
						<div class="form-group">
							<label><?php  echo $item['title'];?>：<?php  if($item['required']) { ?><span style="color:red">*</span><?php  } ?></label>
							<?php  echo tpl_fans_form($item['field'])?>
						</div>
						<?php  } } ?>
						<?php  } ?>
						<?php  if($setting['register']['code']) { ?>
						<div class="form-group">
							<label style="display:block;">验证码:<span style="color:red;">*</span></label>
							<input name="code" type="text" class="form-control" placeholder="请输入验证码" style="width:65%;display:inline;margin-right:17px">
							<img src="<?php  echo url('utility/code');?>" class="img-rounded" style="cursor:pointer;" onclick="this.src='<?php  echo url('utility/code');?>' + Math.random();" />
						</div>
						<?php  } ?>

						<div class="form-group">
							<div style="text-align: right;">
								<input class="btn btn-sm btn-primary" type="submit" name="submit" value="注 册">
								<a href="<?php  echo url('user/login');?>" class="btn btn-sm btn-primary">登 录</a>
								<input name="token" value="<?php  echo $_W['token'];?>" type="hidden" />
							</div>
						</div>
					</form>

				</div>
			</div>
		</div>
	</div>
</div>

<div class="pulldown push-30-t text-center animated fadeInUp">
	<small class="text-muted"><?php  if(empty($_W['setting']['copyright']['footerleft'])) { ?>Powered by v<?php echo IMS_VERSION;?> &copy; 2014-2015 </a><?php  } else { ?><?php  echo $_W['setting']['copyright']['footerleft'];?><?php  } ?></small>
</div>

<script>
	function formcheck() {
		if($('#remember:checked').length == 1) {
			cookie.set('remember-username', $(':text[name="username"]').val());
		} else {
			cookie.del('remember-username');
		}
		return true;
	}
</script>

<script src="./resource/color/js/animations.js"></script>

</body>
</html>