<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<style type="text/css">
	.control-label{text-align:right;}
	.table ul li {float:left;display:block;padding:0;width:100%;line-height:38px;}
	.table ul li span{float:left;display:block;width:260px;text-align:right;padding:0px 20px;line-height:38px;margin:0 10px 0 0;font-Weight:500;color:#FF6600;background-color:#fcfcfc;}
</style>
<script language="javascript">
function  a(){
        $("#ddd").jqprint();
    }
</script>
<ul class="nav nav-tabs">
	<li><a href="<?php  echo $this->createWebUrl('display')?>">表单列表</a></li>
	<li><a href="<?php  echo $this->createWebUrl('post')?>">新建表单</a></li>
	<li><a href="<?php  echo $this->createWebUrl('manage', array('id' => $row['reid']))?>">表单记录</a></li>
	<li class="active"><a href="#">表单详情</a></li>
	<li><a onclick="a()"><i class="fa fa-print"></i> 打印</a></li>
</ul>
<div class="main">
        <div class="panel panel-default">
			<div class="panel-body table-responsive" id="ddd">
			<div class="panel panel-default table">
						<div class="panel-heading">
							<h4 class="panel-title">表单内容</h4>
						</div>
						<ul class="list-group collapse in">
							<li class="list-group-item"><span>姓名：</span><?php  echo $row['member'];?></li>
							<li class="list-group-item"><span>手机：</span><?php  echo $row['mobile'];?></li>
					<?php  if($activity['isget']) { ?>
                        <?php  if($activity['var1']) { ?>
						<li class="list-group-item"><span><?php  echo $activity['var1t'];?>：</span><?php  echo $row['var1'];?></li>
						<?php  } ?>
                        <?php  if($activity['var2']) { ?>
                        <li class="list-group-item"><span><?php  echo $activity['var2t'];?>：</span><?php  echo $row['var2'];?></li>
						<?php  } ?>
                        <?php  if($activity['var3']) { ?>
                        <li class="list-group-item"><span><?php  echo $activity['var3t'];?>：</span><?php  echo $row['var3'];?></li>
						<?php  } ?>
					<?php  } ?>
					<?php  if(!empty($row['thumb'])) { ?>
							<li class="list-group-item"><span><?php  echo $activity['pluraltit'];?>：</span>
						    <?php  if(is_array($row['thumb'])) { foreach($row['thumb'] as $pic) { ?>
							<a target="_blank" href="<?php  echo tomedia($pic)?>"><img src="<?php  echo tomedia($pic)?>" height="100"></a>
						    <?php  } } ?>
							</li>
					<?php  } ?>
					<?php  if($activity['isvoice']==1) { ?>
							<li class="list-group-item"><span><?php  echo $activity['voice'];?>：</span>
								<?php  if(!empty($row['voice'])) { ?>
								<audio controls="controls"><source src="<?php  echo $row['voices'];?>" type="audio/mpeg"></audio>
								<?php  } ?>
							</li>
					<?php  } ?>
							<li class="list-group-item"><span>提交时间：</span><?php  echo date('Y-m-d H:i:s', $row['createtime']);?></li>
              	<?php  if(is_array($ds)) { foreach($ds as $fid => $ftitle) { ?>
                        <li class="list-group-item"><span><?php  echo $ftitle['fid'];?>：</span>
                            <?php  if($ftitle['type'] == 'image') { ?>
                            <?php  if($row['fields'][$fid]) { ?><a target="_blank" href="<?php  echo tomedia($row['fields'][$fid]);?>"><img src="<?php  echo tomedia($row['fields'][$fid]);?>" height="100"></a><?php  } else { ?>用户未上传<?php  } ?>
                            <?php  } else { ?>
                            <?php  echo $row['fields'][$fid];?>
                            <?php  } ?>&nbsp;
						</li>
                <?php  } } ?>
                        <li class="list-group-item"><span>表单状态：</span><dd class="btn btn-default btn-danger"><?php  if($row['status'] == '0') { ?><?php  echo $activity['state1'];?><?php  } else if($row['status'] == '1') { ?><?php  echo $activity['state2'];?><?php  } else if($row['status'] == '2') { ?><?php  echo $activity['state4'];?><?php  } else if($row['status']=='3') { ?><?php  echo $activity['state3'];?><?php  } else if($row['status']=='-1') { ?><?php  echo $activity['state5'];?><?php  } ?></dd></li>
						</ul>
					</div>
            </div>
        </div>
		
	   <div class="panel panel-info">
	<div class="panel-heading">更新表单状态
		</div>
		<div class="panel-body">
							
		<form enctype="multipart/form-data"  method="post" name="upbookfrom" id="upbookfrom">
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
			<div class="col-xs-12 col-sm-9">
				<input type="button" id="uploadbookimg" onClick="$('#upload').click()" class="btn btn-success" value="点击上传文件" />
				<input type="file" name="upfile" size="30" id="upload" onChange="upfiles()" style="width:0;height:0;"/>
			</div>
		</div>
		</form>
		<form method="post" id="form" class="form-horizontal form" action="">
                <div class="form-group">
					<table class="table table-hover">
						<tbody id="listfile">
						<?php  if(is_array($row['file'])) { foreach($row['file'] as $f) { ?>
						<tr><td class="col-xs-12 col-sm-3 col-md-2 control-label"></td>
							<td class="col-xs-12 col-sm-9"><input name="file[]" type="text" class="form-control" value="<?php  echo $f;?>"/></td>
							<td>
								<a href="javascript:;" onclick="deleteItem(this)" data-toggle="tooltip" data-placement="bottom" title="删除此文件" class="btn btn-default btn-sm"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						<?php  } } ?>
						</tbody>
					</table>
                    </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">表单状态：</label>
                    <div class="col-xs-12 col-sm-9">
        <select id="status" name="status" class="form-control">
             <option value="0" <?php  if($row['status'] == 0) { ?>selected="selected"<?php  } ?>><?php  echo $activity['state1'];?></option>
             <option value="1"  <?php  if($row['status'] == 1) { ?>selected="selected"<?php  } ?>><?php  echo $activity['state2'];?></option>
             <option value="2" <?php  if($row['status'] == 2) { ?>selected="selected"<?php  } ?>><?php  echo $activity['state4'];?></option>
             <option value="3" <?php  if($row['status'] == 3) { ?>selected="selected"<?php  } ?>><?php  echo $activity['state3'];?></option>
        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">受理时间：</label>
                    <div class="col-xs-12 col-sm-9">
							<?php  echo tpl_form_field_date('yuyuetime', $row['yuyuetime'], true)?>
                    </div>
                </div>
					<?php  if($activity['isrethumb']==1) { ?>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">回复图片：</label>
                    <div class="col-xs-12 col-sm-9">
                         <?php  echo tpl_form_field_image('rethumb',$row['rethumb']);?>
                    </div>
                </div>
					<?php  } ?>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">快捷回复：</label>
                    <div class="col-xs-12 col-sm-9">
					<?php  if(is_array($custom)) { foreach($custom as $v) { ?>
						<input type="button" class="btn btn-small" value="<?php  echo $v['raply'];?>" onclick="document.getElementById('kfinfo').value+='<?php  echo $v['raply'];?>'" />
					<?php  } } ?>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">客服备注：</label>
                    <div class="col-xs-12 col-sm-9">
                         <textarea style="height:80px;" class="form-control" id="kfinfo" name="kfinfo" cols="70"><?php  echo $row['kfinfo'];?></textarea>
                    </div>
                </div>
					<?php  if($activity['isrevoice']==1 && !empty($row['revoice'])) { ?>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">语音答复：</label>
                    <div class="col-xs-12 col-sm-9">
					<div class="btn-group">
						<audio controls="controls"><source src="<?php  echo $row['revoices'];?>" type="audio/mpeg"></audio>
					</div>
                    </div>
                </div>
					<?php  } ?>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-xs-12 col-sm-9">
					<input type="hidden" name="id" value="<?php  echo $row['rerid'];?>" />
					<input type="submit" name="submit" value="提交" class="btn btn-primary col-lg-1" />
					<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
                    </div>
				</div>
       </form>
	</div>
</div>

        <div class="panel panel-default" style="margin-top:20px;">
            <div class="panel-heading">
                表单信息
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">表单标题</label>
                    <div class="col-xs-12 col-sm-9">
                    	<p class="form-control-static"><?php  echo $activity['title'];?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">表单说明</label>
                    <div class="col-xs-12 col-sm-9">
						<p class="form-control-static"><?php  echo $activity['description'];?></p>
                    </div>
                </div>
                     <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">提交提示信息</label>
                    <div class="col-xs-12 col-sm-9">
						<p class="form-control-static"><?php  echo $activity['information'];?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">图片介绍</label>
                    <div class="col-xs-12 col-sm-9">
						<p class="form-control-static"><img src="<?php  echo tomedia($activity['thumb']);?>" style="height:150px;" /></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">创建时间</label>
                    <div class="col-xs-12 col-sm-9">
						<p class="form-control-static"><?php  echo date('Y-m-d H:i:s', $activity['createtime']);?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">开始时间~结束时间</label>
                    <div class="col-xs-12 col-sm-9">
						<p class="form-control-static"><?php  echo date('Y-m-d H:i:s', $activity['starttime']);?> ~ <?php  echo date('Y-m-d H:i:s', $activity['endtime']);?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">状态</label>
                    <div class="col-xs-12 col-sm-9">
                    	<label>
							<p class="form-control-static">
							<?php  if($activity['status'] == '1') { ?>
								<i class="fa fa-check"> &nbsp; 当前表单生效中</i>
							<?php  } else { ?>
								<i class="fa fa-check-empty"> &nbsp; 当前表单已失效</i>
							<?php  } ?>
							</p>
						</label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">微站首页展示</label>
                    <div class="col-xs-12 col-sm-9">
                  		<label>
							<p class="form-control-static">
							<?php  if($activity['inhome'] == '1') { ?>
								<i class="fa fa-check"> &nbsp; 当前表单将展示在微站首页上</i>
							<?php  } else { ?>
								<i class="fa fa-check-empty"> &nbsp; 当前表单不显示在微站首页</i>
							<?php  } ?>
							</p>
						</label>
                    </div>
                   </div>
            </div>
        </div>
	</div>
<!--<input type="submit" class="btn btn-primary span3" name="submit" onclick="history.go(-1)" value="返回" />-->

<script language="javascript">
	require(['util'],function(util){
		util.editor($('.richtext-clone')[0]);
	})
	$(function(){
		require(['jquery','jquery.ui'],function($,j){
			$('#listfile').sortable({handle: '.fa-move'});
		})
		});
				
	function upfiles(){
		var data = new FormData($('#upbookfrom')[0]);
		$.ajax({
			url: '<?php  echo $this->createWebUrl('upfile')?>',
			type: 'POST',
			data: data,
			dataType: 'html',
			cache: false,
			processData: false,
			contentType: false,
			error: function(msg){ //失败 
				alert('上传失败，请联系管理员.')
			}, 
			success: function(msgurl){ //成功 
				alert('上传成功');								
				for(var i=0; i<1; i++){
					html = '<tr><td class="col-xs-12 col-sm-3 col-md-2 control-label"></td>' +
						'<td class="col-xs-12 col-sm-9"><input type="text" value="'+msgurl+'" name="file[]" class="form-control"></td>' +
						'<td><a href="javascript:;" onclick="deleteItem(this)" data-toggle="tooltip" data-placement="bottom" title="删除此文件" class="btn btn-default btn-sm"><i class="fa fa-times"></i></a></td>' +
						'</tr>';
					$('#listfile').append(html);
				}
			}
		},"json")
	}
					
	function deleteItem(o) {
		$(o).parent().parent().remove();
	}
					
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>