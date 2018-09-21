<?php defined('IN_IA') or exit('Access Denied');?>
		
        <div class="panel panel-info">
            <div class="panel-heading">自定义名称</div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">提交页自定义标题</label>
                    <div class="col-xs-12 col-sm-9">
                         <input type="text" class="form-control" placeholder="" name="titles" value="<?php  echo $activity['titles'];?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">表单封面</label>
                    <div class="col-xs-12 col-sm-9">
                         <?php  echo tpl_form_field_image('thumb',$activity['thumb']);?>
	      				<span class="help-block">用一张图片来更好的表现你的表单主题</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">提交页头部</label>
                    <div class="col-xs-12 col-sm-9">
					<div class="btn-group" data-toggle="buttons">
						<label class="btn btn-default <?php  if($activity['isthumb'] == 1) { ?>active<?php  } ?>"><input type="radio" name="isthumb" value="1" <?php  if($activity['isthumb'] == 1) { ?> checked="checked"<?php  } ?> >显示封面</label>
						<label class="btn btn-default <?php  if($activity['isthumb'] == 2) { ?>active<?php  } ?>"><input type="radio" name="isthumb" value="2" <?php  if(empty($activity) || $activity['isthumb'] == 2) { ?> checked="checked"<?php  } ?>>显示文字</label>
						<label class="btn btn-default <?php  if($activity['isthumb'] == 0) { ?>active<?php  } ?>"><input type="radio" name="isthumb" value="0" <?php  if(empty($activity) || $activity['isthumb'] == 0) { ?> checked="checked"<?php  } ?>>关闭</label>
						<span class="btn btn-success" disabled>仅在 WEUI 系列模板中有效，开启后封面图作为头部背景。</span>
					</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">列表名称</label>
                    <div class="col-xs-12 col-sm-9">
                    <div class="input-group">
                    <input type="text" name="mname" class="form-control" value="<?php  echo $activity['mname'];?>" /><span class="input-group-addon">例：我的表单 或是 我的预约、我的报名等</span>
                    </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">状态名称设置</label>
                    <div class="col-xs-12 col-sm-9">
                    <div class="input-group">
                    <span class="input-group-addon">待受理/待跟进</span><input type="text" name="state1" class="form-control" value="<?php  echo $activity['state1'];?>" />
                    <span class="input-group-addon">已受理/跟进中</span><input type="text" name="state2" class="form-control" value="<?php  echo $activity['state2'];?>" />
                    </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-xs-12 col-sm-9">
                    <div class="input-group">
                    <span class="input-group-addon">已完成</span><input type="text" name="state3" class="form-control" value="<?php  echo $activity['state3'];?>" />
                    <span class="input-group-addon">拒绝受理</span><input type="text" name="state4" class="form-control" value="<?php  echo $activity['state4'];?>" />
                    <span class="input-group-addon">已取消</span><input type="text" name="state5" class="form-control" value="<?php  echo $activity['state5'];?>" />
                    </div>
                    </div>
                </div>
			</div>
        </div>
        <div class="panel panel-info">
            <div class="panel-heading">前台模板设置</div>
            <div class="panel-body">
				<div class="alert alert-info" style="width:100%;">
				<button type="button" class="close" data-dismiss="alert">×</button>
				<h4>提示！</h4> 请使用weui模板，由于为兼容部分定制模板和之前的老模板，导致代码冗余，将来逐步优化去掉老模板支持，weui确定作为最终前端，不再更换了。
				</div>
        <div class="form-group">
          <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">WEUI模板</label>
          <div class="col-sm-8 col-xs-12">
            <div class="row row-fix">
  <div class="col-xs-6 col-sm-6 col-md-3 template_picker">
    <div class="thumbnail" style="text-align:center;width:140px;">
        <span style="display:block;white-space: nowrap;text-overflow:ellipsis; overflow:hidden">WEUI</span>
      <div class="radio">
        <label>
          <input type="radio" name="skins" value="weui" <?php  if($activity['skins'] == 'weui' || empty($activity['skins'])) { ?> checked="checked"<?php  } ?>>
          选择
        </label>
      </div>
    </div>
  </div>
  <div class="col-xs-6 col-sm-6 col-md-3 template_picker">
    <div class="thumbnail" style="text-align:center;width:140px;" title="单选、多选、下拉，无弹出式">
        <span style="display:block;white-space: nowrap;text-overflow:ellipsis; overflow:hidden">WEUI2</span>
      <div class="radio">
        <label>
          <input type="radio" name="skins" value="weui2" <?php  if($activity['skins'] == 'weui2') { ?> checked="checked"<?php  } ?>>
          选择
        </label>
      </div>
    </div>
  </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">WEUI定制模板</label>
          <div class="col-sm-8 col-xs-12">
            <div class="row row-fix">
	<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('weui', TEMPLATE_INCLUDEPATH)) : (include template('weui', TEMPLATE_INCLUDEPATH));?>
  <?php  if($_W['isfounder']) { ?>
  <div class="col-xs-6 col-sm-6 col-md-3 template_picker">
    <div class="thumbnail" style="text-align:center;width:140px;" title="联系作者QQ：18898859">
      <span style="display:block;white-space: nowrap;text-overflow:ellipsis; overflow:hidden">
        仅超级管理员可见
      </span>
      <label>
        定制模板150元/起
      </label>
    </div>
  </div>
  <?php  } ?>
            </div>
          </div>
        </div>
		
  <?php  if($_W['isfounder']) { ?>
        <div class="form-group" style="">
          <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">Amaze(无认证+上传图片)</label>
          <div class="col-xs-1 col-md-1">
            <div class="row row-fix">
  <div class="col-xs-3 col-sm-3 col-md-3 template_picker">
    <div class="thumbnail" style="text-align:center;width:140px;">
        <span style="display:block;white-space: nowrap;text-overflow:ellipsis; overflow:hidden">UI2.0</span>
      <div class="radio">
        <label>
          <input type="radio" name="skins" value="flat" <?php  if($activity['skins'] == 'flat') { ?> checked="checked"<?php  } ?>>
          选择
        </label>
      </div>
    </div>
  </div> 
            </div>
          </div>
		  
			<div class="col-xs-8 col-md-8">
				<div class="form-group">
					<label class="col-xs-1 col-sm-1 col-md-1 control-label"></label>
					<div class="col-sm-11 col-xs-12 input-group">
						<span class="input-group-addon">开始时间</span>
						<input type="text" name="kaishi" class="form-control" value="<?php  echo $activity['kaishi'];?>" />
						<span class="input-group-addon">小时后开始 / </span>
						<input type="text" name="jieshu" class="form-control" value="<?php  echo $activity['jieshu'];?>" />
						<span class="input-group-addon">点结束 / 最大</span>
						<input type="text" name="tianshu" class="form-control" value="<?php  echo $activity['tianshu'];?>" />
						<span class="input-group-addon">天</span>
					</div>
				</div>
			</div>
			
        </div>
        <div class="form-group">
          <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label"></label>
          <div class="col-sm-8 col-xs-12">
            <div class="row row-fix">
			<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('amaze', TEMPLATE_INCLUDEPATH)) : (include template('amaze', TEMPLATE_INCLUDEPATH));?>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">1.0模板(近期将删除)</label>
          <div class="col-sm-8 col-xs-12">
            <div class="row row-fix">
              <?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('skins', TEMPLATE_INCLUDEPATH)) : (include template('skins', TEMPLATE_INCLUDEPATH));?>
            </div>
          </div>
        </div>
  <?php  } ?>
		
            </div>
        </div>