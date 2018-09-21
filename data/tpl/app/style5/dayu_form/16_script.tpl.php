<?php defined('IN_IA') or exit('Access Denied');?>

<script>
	require(['util'], function(u){
		$('#sky-form').submit(function(){
			var reg = /^\d{11}$/;
			var re = new RegExp(reg);
			if($.trim($(':input[name="member"]').val())==''){
				u.message('姓名不能为空.');
				return false;
			}
			if($.trim($('input[name="mobile"]').val()) == '' || !re.test($.trim($('input[name="mobile"]').val()))) {
				u.message('手机号格式有误');
				return false;
			}
		<?php  if(is_array($ds)) { foreach($ds as $row) { ?>
		<?php  if($row['essential']) { ?>
		<?php  if(in_array($row['type'], array('number', 'text', 'calendar', 'email'))) { ?>
		if($.trim($(':text[name="field_<?php  echo $row['refid'];?>_<?php  echo $row['bind'];?>"]').val()) == '') {
			u.message('<?php  echo $row['title'];?> 必须填写.');
			return false;
		}
		<?php  } ?>
			
		<?php  if(in_array($row['type'], array('image'))) { ?>
		if($.trim($(':input[name="field_<?php  echo $row['refid'];?>_<?php  echo $row['bind'];?>"]').val()) == '') {
			u.message('<?php  echo $row['title'];?> 必须上传.');
			return false;
		}
		<?php  } ?>
		<?php  if(in_array($row['type'], array('textarea'))) { ?>
		if($.trim($('textarea[name="field_<?php  echo $row['refid'];?>_<?php  echo $row['bind'];?>"]').val()) == '') {
			u.message('<?php  echo $row['title'];?> 必须填写.');
			return false;
		}
		<?php  } ?>
		<?php  if(in_array($row['type'], array('checkbox'))) { ?>
		if($(':checkbox[name="field_<?php  echo $row['refid'];?>_<?php  echo $row['bind'];?>[]"]:checked').length == 0) {
			u.message('<?php  echo $row['title'];?> 必须选择.');
			return false;
		}
		<?php  } ?>
		<?php  if(in_array($row['type'], array('number'))) { ?>
		var num = parseFloat($.trim($(':text[name="field_<?php  echo $row['refid'];?>_<?php  echo $row['bind'];?>"]').val()));
		if(isNaN(num)) {
			u.message('<?php  echo $row['title'];?> 必须输入数字.');
			return false;
		}
		<?php  } ?>
		<?php  if(in_array($row['type'], array('email'))) { ?>
		var mail = $.trim($(':text[name="field_<?php  echo $row['refid'];?>_<?php  echo $row['bind'];?>"]').val());
		if(!(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/i).test(mail)) {
			u.message('<?php  echo $row['title'];?> 必须输入邮箱地址.');
			return false;
		}
		<?php  } ?>
		<?php  } ?>
		<?php  } } ?>
		return true;
		});
	});
</script>