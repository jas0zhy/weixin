<?php defined('IN_IA') or exit('Access Denied');?>
        <div class="panel panel-success">
            <div class="panel-heading">
                表单内容管理
            </div>
            <div class="panel-body table-responsive">
                <div class="alert-new">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">姓名/手机 显示位置</label>
                    <div class="col-xs-12 col-sm-9">
		 				<label class="radio-inline"><input type="radio" name="paixu" value="0" <?php  if(empty($activity) || $activity['paixu'] == 0) { ?> checked="checked"<?php  } ?> /> 页面顶部</label>
                		<label class="radio-inline"><input type="radio" name="paixu" value="1" <?php  if($activity['paixu'] == 1) { ?> checked="checked"<?php  } ?> /> 页面底部</label>
                    </div>
                </div>
					<table class="table table-hover">
						<thead>
						<tr>
							<th style="width:45%;">自定义项目</th>
							<th style="width:15%;text-align:center;">排序</th>
							<th style="width:8%;text-align:center;">是否必填</th>
							<th style="width:12%;">类型</th>
							<th style="width:10%;">关联默认值</th>
							<th style="width:10%;">操作</th>
						</tr>
						<tr>
							<td><input type="text" class="form-control" name="member" value="<?php  echo $activity['member'];?>" /></td>
							<td><input type="text" class="form-control" value="100" readonly /></td>
							<td style="text-align:center;"><input type="checkbox" title="必填项" checked="checked" disabled="true" /></td>
							<td>
								<select class="form-control" readonly>
									<option>字串(text)</option>
								</select>
							</td>
							<td>
								<select class="form-control" readonly>
									<option>真实姓名</option>
								</select>
							</td>
							<td>
							</td>
						</tr>
						<tr>
							<td><input type="text" class="form-control" name="phone" value="<?php  echo $activity['phone'];?>" /></td>
							<td><input type="text" class="form-control" value="99" readonly /></td>
							<td style="text-align:center;"><input type="checkbox" title="必填项" checked="checked" disabled="true" /></td>
							<td>
								<select class="form-control" readonly>
									<option>数字(number)</option>
								</select>
							</td>
							<td>
								<select class="form-control" readonly>
									<option>手机号码</option>
								</select>
							</td>
							<td>
							</td>
						</tr>
						</thead>
						<tbody id="re-items">
						<?php  if(is_array($ds)) { foreach($ds as $r) { ?>
						<tr>
							<td><input name="title[]" type="text" class="form-control" value="<?php  echo $r['title'];?>"/></td>
							<td><input type="text" name="displayorder[]" class="form-control" value="<?php  echo $r['displayorder'];?>" /></td>
							<td style="text-align:center;"><input name="essential[]" type="checkbox" title="必填项" <?php  if($r['essential']) { ?> checked="checked"<?php  } ?>/></td>
							<td>
								<select name="type[]" class="form-control">
									<?php  if(is_array($types)) { foreach($types as $k => $v) { ?>
									<option value="<?php  echo $k;?>"<?php  if($k == $r['type']) { ?> selected="selected"<?php  } ?>><?php  echo $v;?></option>
									<?php  } } ?>
								</select>
							</td>
							<td>
								<select name="bind[]" class="form-control">
									<option value="">不关联粉丝数据</option>
									<?php  if(is_array($fields)) { foreach($fields as $k => $v) { ?>
									<option value="<?php  echo $k;?>"<?php  if($k == $r['bind']) { ?> selected="selected"<?php  } ?>><?php  echo $v;?></option>
									<?php  } } ?>
								</select>
								<input type="hidden" name="value[]" value="<?php  echo $r['value'];?>"/>
								<input type="hidden" name="desc[]" value="<?php  echo $r['description'];?>"/>
								<input type="hidden" name="image[]" value="<?php  echo $r['image'];?>"/>
								<input type="hidden" name="essentialvalue[]" value="<?php  if($r['essential']) { ?>true<?php  } else { ?>false<?php  } ?>"/>
							</td>
							<td>
								<?php  if(!$hasData) { ?>
								<a href="javascript:;" data-toggle="tooltip" data-placement="bottom" title="设置详细信息" onclick="setValues(this);" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a> &nbsp;
								<a href="javascript:;" onclick="deleteItem(this)" data-toggle="tooltip" data-placement="bottom" title="删除此项目" class="btn btn-default btn-sm"><i class="fa fa-times"></i></a>
								<?php  } ?>
							</td>
						</tr>
						<?php  } } ?>
						</tbody>
						<tr style="background-color:#f1f8e9;">
							<td><input type="text" name="pluraltit" value="<?php  echo $activity['pluraltit'];?>" class="form-control" placeholder="多图上传"/></td>
							<td class="btn-group" data-toggle="buttons">
								<label class="btn btn-default <?php  if($activity['plural'] == 1) { ?>active<?php  } ?>"><input type="radio" name="plural" value="1" <?php  if($activity['plural'] == 1) { ?> checked="checked"<?php  } ?> >启用</label>
								<label class="btn btn-default <?php  if($activity['plural'] == 0) { ?>active<?php  } ?>"><input type="radio" name="plural" value="0" <?php  if(empty($activity) || $activity['plural'] == 0) { ?> checked="checked"<?php  } ?>>关闭</label>
							</td>
							<td colspan="4">多图上传状态</td>
						</tr>
					</table>
				</div>
            </div>
        </div>
				
				<div class="alert alert-block alert-new">
					<?php  if($hasData) { ?>
					<a href="<?php  echo $this->createWebUrl('manage', array('id' => $reid));?>" target="_blank">已经存在表单数据, 不能修改表单项目信息</a>
					<?php  } else { ?>
					<span class="help-block"><a href="javascript:;" class="btn btn-success" onclick="addItem();"><i class="fa fa-plus" title="添加自定义字段"></i> 添加自定义字段</a> 请填写排序，导出CSV文件的标题与内容才能更好的对应</span>
									<div class="alert alert-info">
				<button type="button" class="close" data-dismiss="alert">×</button>
				<h4>提示！</h4> 如果需要关联生日，项目类型设置为日历，只能设置关联一次生日，超出报错。<br>上传图片使用示例图请点击操作栏的 橙色按钮<br>所有自定义项目支持自定义提示文字，请点击操作栏的 橙色按钮
				</div>
					<?php  } ?>
				<div class="alert alert-success">表单成功启动以后(已经有粉丝用户提交表单信息), 将不能再修改自定义字段, 请认真、仔细编辑.</div>

				</div>