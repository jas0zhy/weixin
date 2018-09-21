<?php defined('IN_IA') or exit('Access Denied');?>
        <div class="panel panel-primary">
            <div class="panel-heading">基本设置</div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">表单主题</label>
                    <div class="col-xs-12 col-sm-9">
                         <input type="text" class="form-control" placeholder="" name="activity" value="<?php  echo $activity['title'];?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">联系方式</label>
                    <div class="col-xs-12 col-sm-9">
		 				<label class="radio-inline"><input type="radio" name="isinfo" value="1" <?php  if($activity['isinfo'] == 1) { ?> checked="checked"<?php  } ?> onclick="$('#isinfo').show();" /> 启用</label>
                		<label class="radio-inline"><input type="radio" name="isinfo" value="0" <?php  if(empty($activity) || $activity['isinfo'] == 0) { ?> checked="checked"<?php  } ?> onclick="$('#isinfo').hide();" /> 关闭</label>
                    </div>
                </div>
			<div id="isinfo"<?php  if($activity['isinfo'] == 1) { ?> style="display:block"<?php  } else { ?> style="display:none"<?php  } ?>>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">公司名称</label>
                    <div class="col-xs-12 col-sm-9">
                         <input type="text" class="form-control" placeholder="" name="business" value="<?php  echo $activity['business'];?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">联系电话</label>
                    <div class="col-xs-12 col-sm-9">
                         <input type="text" class="form-control" placeholder="" name="tel" value="<?php  echo $activity['tel'];?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">联系地址</label>
                    <div class="col-xs-12 col-sm-9">
                         <input type="text" class="form-control" placeholder="" name="address" value="<?php  echo $activity['address'];?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">地址坐标</label>
                    <div class="col-sm-9 col-xs-12">
                        <?php  echo tpl_form_field_coordinate('baidumap', $activity['map'])?>
                    </div>
                </div>
			</div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">关键字回复<br>头部简介</label>
                    <div class="col-xs-12 col-sm-9">
                         <textarea style="height:80px;" class="form-control" id="description" name="description" cols="70"><?php  echo $activity['description'];?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">协议标题</label>
                    <div class="col-xs-12 col-sm-9">
                    <div class="input-group">
                         <input type="text" class="form-control" placeholder="" name="agreement" value="<?php  echo $activity['agreement'];?>" /><span class="input-group-addon">设置协议标题后，提交表单必须勾选同意才可提交</span>
                    </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">表单详细说明<br>协议</label>
                    <div class="col-xs-12 col-sm-9">
						<?php  echo tpl_ueditor('content', $activity['content']);?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">提交提示信息</label>
                    <div class="col-xs-12 col-sm-9">
                            <textarea type="text" class="form-control"  placeholder="" name="information"><?php  echo $activity['information'];?></textarea>
                            <span class="help-block">表单提交成功以后提示的信息. 例如: 您的表单我们已经收到, 请等待客服确认. </span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-xs-12 col-sm-9">
                    <div class="input-group">
                  		<span class="input-group-addon btn btn-inverse">开始时间</span><?php  echo tpl_form_field_date('starttime', $activity['starttime'], true)?><span class="input-group-addon btn btn-inverse">结束时间</span>
                 		<?php  echo tpl_form_field_date('endtime', $activity['endtime'], true)?>
                    </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">微站首页展示</label>
                    <div class="col-xs-12 col-sm-9">
					<div class="btn-group" data-toggle="buttons">					  
						<label class="btn btn-default <?php  if($activity['inhome'] == 1) { ?>active<?php  } ?>"><input type="radio" name="inhome" value="1" <?php  if($activity['inhome'] == 1) { ?> checked="checked"<?php  } ?> >显示</label>
						<label class="btn btn-default <?php  if($activity['inhome'] == 0) { ?>active<?php  } ?>"><input type="radio" name="inhome" value="0" <?php  if(empty($activity) || $activity['inhome'] == 0) { ?> checked="checked"<?php  } ?>>隐藏</label>
						<span class="btn btn-success" disabled>是否在微站中显示此表单链接</span>
					</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">启用状态</label>
                    <div class="col-xs-12 col-sm-9">
					<div class="btn-group" data-toggle="buttons">					  
						<label class="btn btn-default <?php  if($activity['status'] == 1) { ?>active<?php  } ?>"><input type="radio" name="status" value="1" <?php  if($activity['status'] == 1) { ?> checked="checked"<?php  } ?> >启用</label>
						<label class="btn btn-default <?php  if($activity['status'] == 0) { ?>active<?php  } ?>"><input type="radio" name="status" value="0" <?php  if(empty($activity) || $activity['status'] == 0) { ?> checked="checked"<?php  } ?>>关闭</label>
						<span class="btn btn-success" disabled>关闭状态下前台无法访问</span>
					</div>
                    </div>
                </div>
            </div>
        </div>