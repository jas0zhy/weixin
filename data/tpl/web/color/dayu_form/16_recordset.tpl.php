<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<style type="text/css">
.btn-group .active{background-color:#428bca;color:#fff;}
</style>
<div class="alert alert-info info">
	<i class="fa fa-info-circle"></i>
	当前表单: <?php  echo $activity['title'];?>
</div>
<ul class="nav nav-tabs">
	<li><a href="<?php  echo $this->createWebUrl('display')?>">返回表单列表</a></li>
	<li><a href="<?php  echo $this->createWebUrl('post', array('id' => $reid))?>">编辑<?php  echo $activity['title'];?></a></li>
	<li class="active"><a href="#">记录显示设置</a></li>
	<li><a href="<?php  echo $this->createWebUrl('manage', array('id' => $reid))?>">提交记录</a></li>
	<li><a href="<?php  echo $this->createWebUrl('staff', array('op' => 'list','reid' => $reid))?>">管理客服</a></li>
</ul>
	<form class="form-horizontal form" action="" method="post" enctype="multipart/form-data" onsubmit="return validate(this);">
        <div class="panel panel-success">
            <div class="panel-heading">前台显示用户提交的记录，为已完成状态</div>
            <div class="panel-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">是否开启</label>
					<div class="col-sm-9 col-xs-12">
					<div class="btn-group" data-toggle="buttons">					  
						<label class="btn btn-default <?php  if($activity['field'] == 1) { ?>active<?php  } ?>"><input type="radio" name="field" value="1" <?php  if($activity['field'] == 1) { ?> checked="checked"<?php  } ?> >启用</label>
						<label class="btn btn-default <?php  if($activity['field'] == 0) { ?>active<?php  } ?>"><input type="radio" name="field" value="0" <?php  if(empty($activity) || $activity['field'] == 0) { ?> checked="checked"<?php  } ?>>关闭</label>
                    </div>
					</div>
				</div>
				<?php  if($reid) { ?>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">显示风格</label>
					<div class="col-sm-9 col-xs-12">
					<div class="btn-group" data-toggle="buttons">					  
						<label class="btn btn-default <?php  if($activity['avatar'] == 1) { ?>active<?php  } ?>"><input type="radio" name="avatar" value="1" <?php  if($activity['avatar'] == 1) { ?> checked="checked"<?php  } ?> >weui头像/昵称</label>
						<label class="btn btn-default <?php  if($activity['avatar'] == 0) { ?>active<?php  } ?>"><input type="radio" name="avatar" value="0" <?php  if(empty($activity) || $activity['avatar'] == 0) { ?> checked="checked"<?php  } ?>>极简</label>
						<div class="input-group">
							<?php  echo tpl_form_field_color('bcolor', $activity['bcolor']);?>
						</div>
                    </div>
					</div>
				</div>
					<div id="fields">
						<div id="fields-tpl">
						    <?php  if(is_array($record)) { foreach($record as $f) { ?>
							<?php  $fi=$this->get_fields($f,$reid); ?>
                <div class="form-group fields-item">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">显示的字段</label>
                   <div class="col-sm-9 col-xs-4 col-md-3">
							<input type="hidden" name="fields[]" class="form-control" value="<?php  echo $f;?>" readonly/>
							<input type="text" class="form-control" value="<?php  echo $fi['title'];?>" readonly/>
                    </div>
					<div class="col-sm-9 col-xs-4 col-md-3" style="padding-top:6px">
						<a href="javascript:;" onclick="delhouritem(this);"><i class="fa fa-times-circle" title="删除字段"> </i></a>
					</div>	
                </div>
						    <?php  } } ?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
						<div class="col-sm-9 col-xs-9 col-md-9">
							<a href="javascript:;" id="fields-add" class="btn btn-success"><i class="fa fa-plus-circle"></i> 添加显示的字段</a>
							<div class="help-block">建议 文本（textarea）字段放最后</div>
						</div>
					</div>
				<?php  } ?>
            </div>
        </div>
        <div class="form-group col-sm-12">
			<input type="submit" name="submit" value="提交" class="btn btn-primary col-lg-1" />
			<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
		</div>
   </form>
	<script type="text/javascript">
		function delhouritem(obj) {
			if($(':text[name="fields[]"]').length == 1) return false;
			$(obj).parent().parent().remove();
			return false;
		}
		$(function(){
			$('#fields-add').click(function(){
				var fields_length = $('#fields .fields-item').length;
				if(fields_length < 3) {
			var html = '<div class="form-group">'+
						'<label class="col-xs-12 col-sm-3 col-md-2 control-label">字段</label>'+
						'<div class="col-xs-12 col-sm-9">'+
						'<select name="fields[]" class="form-control">'+
						'<option value="0">请选择要显示的字段内容</option>'+
						'<?php  if(is_array($ds)) { foreach($ds as $fields) { ?>'+
						'<option value="<?php  echo $fields['refid'];?>"><?php  echo $fields['title'];?></option>'+
						'<?php  } } ?>'+
						'</select>'+
						'</div>'+
						'</div>';
								
					$('#fields').append(html);
				}		
			});
		});
	</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>