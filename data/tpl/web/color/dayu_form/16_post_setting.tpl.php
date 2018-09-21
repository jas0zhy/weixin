<?php defined('IN_IA') or exit('Access Denied');?>        <div class="panel panel-default">
            <div class="panel-heading">短信验证 <span style="color:red;">短信验证手机号码的真实性</span></div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">请选择短信模板</label>
                    <div class="col-xs-12 col-sm-9">
					<?php  if(pdo_tableexists('dayu_sms')) { ?>
						<select name="smsid" class='form-control'>
							<option value="0">不使用短信</option>
							<?php  if(is_array($sms)) { foreach($sms as $s) { ?>
							<option value="<?php  echo $s['id'];?>" <?php  if($s['id'] == $activity['smsid']) { ?>selected="selected"<?php  } ?>><?php  echo $s['title'];?></option>
							<?php  } } ?>
						</select>
					<?php  } else { ?>
						<span class="btn btn-default" disabled>需要【dayu短信】支持</span>
					<?php  } ?>
                    </div>
                </div>
			</div>
        </div>
        <div class="panel panel-warning">
            <div class="panel-heading">参数设置 <span style="color:red;">蓝色按钮为激活状态</span></div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">是否需要关注</label>
                    <div class="col-xs-12 col-sm-9">
					<div class="btn-group" data-toggle="buttons">					  
						<label class="btn btn-default <?php  if($activity['follow'] == 1) { ?>active<?php  } ?>"><input type="radio" name="follow" value="1" <?php  if($activity['follow'] == 1) { ?> checked="checked"<?php  } ?> >启用</label>
						<label class="btn btn-default <?php  if($activity['follow'] == 0) { ?>active<?php  } ?>"><input type="radio" name="follow" value="0" <?php  if(empty($activity) || $activity['follow'] == 0) { ?> checked="checked"<?php  } ?>>关闭</label>
						<span class="btn btn-success" disabled>启用状态，用户在未关注公众号情况下自动跳转至二维码关注引导页</span>
					</div>
                    </div>
                </div>
				<!--
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">显示提交记录</label>
                    <div class="col-xs-12 col-sm-9">
					<div class="btn-group" data-toggle="buttons">					  
						<label class="btn btn-default <?php  if($activity['isrecord'] == 1) { ?>active<?php  } ?>"><input type="radio" name="isrecord" value="1" <?php  if($activity['isrecord'] == 1) { ?> checked="checked"<?php  } ?> >显示</label>
						<label class="btn btn-default <?php  if($activity['isrecord'] == 0) { ?>active<?php  } ?>"><input type="radio" name="isrecord" value="0" <?php  if(empty($activity) || $activity['isrecord'] == 0) { ?> checked="checked"<?php  } ?>>隐藏</label>
						<span class="btn btn-success" disabled>仅在 WEUI 系列模板中有效，开启后提交页显示用户提交记录</span>
                    </div>
					</div>
                </div>
				-->
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">同步至会员中心数据</label>
					<div class="col-sm-9 col-xs-12">
					<div class="btn-group" data-toggle="buttons">					  
						<label class="btn btn-default <?php  if($activity['isreplace'] == 1) { ?>active<?php  } ?>"><input type="radio" name="isreplace" value="1" <?php  if($activity['isreplace'] == 1) { ?> checked="checked"<?php  } ?> >启用</label>
						<label class="btn btn-default <?php  if($activity['isreplace'] == 0) { ?>active<?php  } ?>"><input type="radio" name="isreplace" value="0" <?php  if(empty($activity) || $activity['isreplace'] == 0) { ?> checked="checked"<?php  } ?>>关闭</label>
						<span class="btn btn-success" disabled>启用状态，用户填写的姓名、手机将同步至会员中心的真实姓名、手机</span>
                    </div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">领取会员卡</label>
					<div class="col-sm-9 col-xs-12">
					<div class="btn-group" data-toggle="buttons">					  
						<label class="btn btn-default <?php  if($activity['ismember'] == 1) { ?>active<?php  } ?>"><input type="radio" name="ismember" value="1" <?php  if($activity['ismember'] == 1) { ?> checked="checked"<?php  } ?> >启用</label>
						<label class="btn btn-default <?php  if($activity['ismember'] == 0) { ?>active<?php  } ?>"><input type="radio" name="ismember" value="0" <?php  if(empty($activity) || $activity['ismember'] == 0) { ?> checked="checked"<?php  } ?>>关闭</label>
						<span class="btn btn-success" disabled>启用状态，未领取会员卡的粉丝跳转至领取会员卡页面</span>
                    </div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">用户删除记录权限</label>
					<div class="col-sm-9 col-xs-12">
					<div class="btn-group" data-toggle="buttons">					  
						<label class="btn btn-default <?php  if($activity['isdel'] == 1) { ?>active<?php  } ?>"><input type="radio" name="isdel" value="1" <?php  if($activity['isdel'] == 1) { ?> checked="checked"<?php  } ?> >启用</label>
						<label class="btn btn-default <?php  if($activity['isdel'] == 0) { ?>active<?php  } ?>"><input type="radio" name="isdel" value="0" <?php  if(empty($activity) || $activity['isdel'] == 0) { ?> checked="checked"<?php  } ?>>关闭</label>
						<span class="btn btn-success" disabled>启用状态，用户可自行删除待受理情况下的记录</span>
                    </div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">限制会员分组</label>
					<div class="col-sm-6">
                    <div class="input-group">
						<select name="mbgroup" class='form-control'>
							<option value=""></option>
							<?php  if(is_array($groups)) { foreach($groups as $row) { ?>
							<option value="<?php  echo $row['groupid'];?>" <?php  if($row['groupid'] == $activity['mbgroup']) { ?>selected="selected"<?php  } ?>><?php  echo $row['title'];?></option>
							<?php  } } ?>
						</select>
						<span class="input-group-addon">留空即所有用户均可提交</span>
					</div>
					</div>
				</div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">跳转链接</label>
                    <div class="col-xs-12 col-sm-9">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="" name="outlink" value="<?php  echo $activity['outlink'];?>" /><span class="input-group-addon">留空：表单提交后跳转至提交记录列表</span>
                    </div>
                    </div>
                </div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">扣除积分 credit1</label>
					<div class="col-sm-9 col-xs-12">
						<div class="input-group"><span class="input-group-addon"><i class="fa fa-money"></i></span><input type="text" class="form-control" name="credit" value="<?php  echo $activity['credit'];?>"></div>
					</div>
				</div>
			<div class="form-group">
				<label class="col-xs-12 col-sm-3 col-md-2 control-label">每人可提交次数</label>
				<div class="col-xs-12 col-sm-9">
				<div class="input-group">
					<span class="input-group-addon">0 不限制次数</span><input type="text" class="form-control" name="pretotal" value="<?php  echo $activity['pretotal'];?>" />
				</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-xs-12 col-sm-3 col-md-2 control-label">每人每天可提交次数</label>
				<div class="col-xs-12 col-sm-9">
				<div class="input-group">
					<span class="input-group-addon">0 不限制次数</span><input type="text" class="form-control" name="daynum" value="<?php  echo $activity['daynum'];?>" />
				</div>
				</div>
			</div>
        </div>
        </div>
		
        <div class="panel panel-warning">
            <div class="panel-heading">功能扩展 <span style="color:red;">以下扩展需要jssdk支持</span></div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">是否使用录音功能</label>
                    <div class="col-xs-12 col-sm-9">
					<div class="btn-group" data-toggle="buttons">					  
						<label class="btn btn-default <?php  if($activity['isvoice'] == 1) { ?>active<?php  } ?>"><input type="radio" name="isvoice" value="1" <?php  if($activity['isvoice'] == 1) { ?> checked="checked"<?php  } ?> >启用</label>
						<label class="btn btn-default <?php  if($activity['isvoice'] == 0) { ?>active<?php  } ?>"><input type="radio" name="isvoice" value="0" <?php  if(empty($activity) || $activity['isvoice'] == 0) { ?> checked="checked"<?php  } ?>>关闭</label>
						<span class="btn btn-success" disabled>仅限weui前端系列模板有效</span>
					</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">是否必须上传录音</label>
                    <div class="col-xs-12 col-sm-9">
					<div class="btn-group" data-toggle="buttons">					  
						<label class="btn btn-default <?php  if($activity['ivoice'] == 1) { ?>active<?php  } ?>"><input type="radio" name="ivoice" value="1" <?php  if($activity['ivoice'] == 1) { ?> checked="checked"<?php  } ?> >启用</label>
						<label class="btn btn-default <?php  if($activity['ivoice'] == 0) { ?>active<?php  } ?>"><input type="radio" name="ivoice" value="0" <?php  if(empty($activity) || $activity['ivoice'] == 0) { ?> checked="checked"<?php  } ?>>关闭</label>
						<span class="btn btn-success" disabled>仅限weui前端系列模板有效</span>
					</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-xs-12 col-sm-9">
					<div class="input-group">
						<span class="input-group-addon" disabled>录音标题</span>
						<input type="text" name="voice" class="form-control" value="<?php  echo $activity['voice'];?>" />
						<span class="input-group-addon" disabled>录音描述</span>
						<input type="text" name="voicedec" class="form-control" value="<?php  echo $activity['voicedec'];?>" />
					</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">客服回复使用录音</label>
                    <div class="col-xs-12 col-sm-9">
					<div class="btn-group" data-toggle="buttons">					  
						<label class="btn btn-default <?php  if($activity['isrevoice'] == 1) { ?>active<?php  } ?>"><input type="radio" name="isrevoice" value="1" <?php  if($activity['isrevoice'] == 1) { ?> checked="checked"<?php  } ?> >启用</label>
						<label class="btn btn-default <?php  if($activity['isrevoice'] == 0) { ?>active<?php  } ?>"><input type="radio" name="isrevoice" value="0" <?php  if(empty($activity) || $activity['isrevoice'] == 0) { ?> checked="checked"<?php  } ?>>关闭</label>
						<span class="btn btn-success" disabled>微信端受理时是否支持录音答复，WEB后台不支持</span>
					</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">客服受理支持图片</label>
                    <div class="col-xs-12 col-sm-9">
					<div class="btn-group" data-toggle="buttons">					  
						<label class="btn btn-default <?php  if($activity['isrethumb'] == 1) { ?>active<?php  } ?>"><input type="radio" name="isrethumb" value="1" <?php  if($activity['isrethumb'] == 1) { ?> checked="checked"<?php  } ?> >启用</label>
						<label class="btn btn-default <?php  if($activity['isrethumb'] == 0) { ?>active<?php  } ?>"><input type="radio" name="isrethumb" value="0" <?php  if(empty($activity) || $activity['isrethumb'] == 0) { ?> checked="checked"<?php  } ?>>关闭</label>
						<span class="btn btn-success" disabled>受理时，是否支持上传图片回复给会员</span>
					</div>
                    </div>
                </div>
				<!--
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">获取用户地理位置</label>
                    <div class="col-xs-12 col-sm-9">
					<div class="btn-group" data-toggle="buttons">					  
						<label class="btn btn-default <?php  if($activity['isloc'] == 1) { ?>active<?php  } ?>"><input type="radio" name="isloc" value="1" <?php  if($activity['isloc'] == 1) { ?> checked="checked"<?php  } ?> >启用</label>
						<label class="btn btn-default <?php  if($activity['isloc'] == 0) { ?>active<?php  } ?>"><input type="radio" name="isloc" value="0" <?php  if(empty($activity) || $activity['isloc'] == 0) { ?> checked="checked"<?php  } ?>>关闭</label>
						<span class="btn btn-success" disabled>仅限weui前端系列模板有效</span>
					</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-xs-12 col-sm-9">
					<div class="input-group">
						<input type="text" name="adds" class="form-control" value="<?php  echo $activity['adds'];?>" />
						<span class="input-group-addon btn btn-success" style="color:#fff;" disabled>地址名称：联系地址，出生地址</span>
					</div>
                    </div>
                </div>
				-->
			</div>
        </div>
		
		