<?php defined('IN_IA') or exit('Access Denied');?><style>
.red{color: red;}
</style>
<input type="hidden" name="sin_id" value="<?php  echo $reply['id'];?>" />
<div class="panel panel-default">
			<div class="panel-heading">
				直接连接 <span class="text-muted">直接进入的URL</span>
			</div>
			<div class="panel-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">直接URL</label>
					<div class="col-sm-9 col-xs-12 ">
						<input type="text" class="form-control" readonly="readonly" value="<?php  echo $entryurl;?>" />
				<span class="help-block">
					<strong>直接指向到入口的URL。您可以在自定义菜单（有oAuth权限）或是其它位置直接使用(添加后显示)。</strong>
				</span>
					</div>
				</div>
			</div>
</div>
		
<div class="panel panel-default">
	<div class="panel-heading">
		基本设置
	</div>
	<div class="panel-body">

		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 活动名称：</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" id="title" class="form-control span7"
					   placeholder="" name="title" value="<?php  echo $reply['title'];?>">
			</div>
		</div>


		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>活动开始时间：</label>
			<div class="col-sm-9 col-xs-12">
				<?php  echo tpl_form_field_date('starttime',$reply['starttime'],false)?>
			</div>
		</div>

		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>活动结束时间：</label>
			<div class="col-sm-9 col-xs-12">
				<?php  echo tpl_form_field_date('endtime',$reply['endtime'],false)?>
			</div>
		</div>


		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>每日签到积分：</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" id="sign_credit" class="form-control span7" placeholder="" name="sign_credit" value="<?php  echo $reply['sign_credit'];?>">
			</div>
		</div>


		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>同步会员积分：</label>
			<div class="col-sm-9 col-xs-12">
				<input type="radio" value="1" name="sync_credit" <?php  if($reply['sync_credit']==1) { ?> checked="checked"<?php  } ?>/>开启&nbsp;&nbsp;<input type="radio" value="0"  name="sync_credit" <?php  if($reply['sync_credit']==0) { ?> checked="checked"<?php  } ?>/> 关闭
			</div>
		</div>



		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>成功提示语：</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" id="sin_suc_msg" class="form-control span7" placeholder="" name="sin_suc_msg" value="<?php  echo $reply['sin_suc_msg'];?>">
			</div>
		</div>


		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>失败提示语：</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" id="sin_suc_fail" class="form-control span7" placeholder="" name="sin_suc_fail" value="<?php  echo $reply['sin_suc_fail'];?>">
			</div>
		</div>


		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>头像链接地址：</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" id="sin_suc_member" class="form-control span7" placeholder="" name="sin_suc_member" value="<?php  echo $reply['sin_suc_member'];?>">
				<span class="help-block">
					<strong>点击头像的链接地址，建议设置会员主页地址。</strong>
				</span>
			</div>
		</div>


		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>版权：</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" id="copyright" class="form-control span7"
					   placeholder="" name="copyright" value="<?php  echo $reply['copyright'];?>"
			</div>
		</div>


		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>积分规则说明：</label>
			<div class="col-sm-9 col-xs-12">
				<textarea name="rule" class="form-control span7 richtext" id="rule" cols="70" ><?php  echo $reply['rule'];?></textarea>
			</div>
		</div>



	</div>

	</div>


	<div class="panel panel-default">
		<div class="panel-heading">
			连续签到积分
		</div>
		<div class="panel-body">

			<div class="form-group">
				<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
				<div class="col-sm-9 col-xs-12">

					<table>

						<thead>
						<tr>
							<th>天数</th>
							<th>奖励积分</th>
							<th>操作</th>
						</tr>
						</thead>

						<tbody id="sin_serial-items">



						<?php  if(is_array($sin_serials)) { foreach($sin_serials as $sin_serial) { ?>
						<tr class='sin_serial_item'>
							<td><input name="serial_day[]" type="text"
									   class="form-control span3" value="<?php  echo $sin_serial['day'];?>"
									/></td>
							<td><input name="serial_credit[]" type="text"
									   class="form-control span3" value="<?php  echo $sin_serial['credit'];?>"
									/></td>


							<td>
								<input  name="serial_ids[]" type="hidden" value="<?php  echo $sin_serial['id'];?>" />
								<a href='javascript:;' onclick='removeSerials(this)'><i
										class='icon icon-remove fa fa-times'></i> 删除</a></td>
						</tr>
						<?php  } } ?>
						</tbody>
					</table>


				</div>
			</div>


			<div class="form-group">
				<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
				<div class="col-sm-9 col-xs-12">
					<a href="javascript:;" onclick="addSItem();"><i class="icon-plus-sign" title="添加说明"></i>添加连续签到</a>
				</div>
			</div>


			</div>

		</div>

<div class="panel panel-default">
	<div class="panel-heading">
		快捷链接
	</div>
	<div class="panel-body">

		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 活动名称：</label>
			<div class="col-sm-9 col-xs-12">
				<table>

					<thead>
					<tr>
						<th>链接名称</th>
						<th>链接地址(http://)</th>
						<th>排序</th>
						<th>操作</th>
					</tr>
					</thead>

					<tbody id="link-items">


					<?php  if(is_array($links)) { foreach($links as $link) { ?>
					<tr class='link_item'>
						<td><input name="link_name[]" type="text"
								   class="form-control span3" value="<?php  echo $link['link_name'];?>"
								/></td>
						<td><input name="link_url[]" type="text"
								   class="form-control span3" value="<?php  echo $link['link_url'];?>"
								/></td>

						<td><input name="link_sort[]" type="text"
								   class="form-control span1" value="<?php  echo $link['sort'];?>"
								/></td>

						<td>
							<input  name="link_ids[]" type="hidden" value="<?php  echo $link['id'];?>" />
							<a href='javascript:;' onclick='removeLinkItem(this)'><i
									class='icon icon-remove fa fa-times'></i> 删除</a></td>
					</tr>
					<?php  } } ?>




					</tbody>

				</table>



			</div>
		</div>

		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
			<div class="col-sm-9 col-xs-12">
				<a href="javascript:;" onclick="addLItem();"><i class="icon-plus-sign" title="添加快捷菜单"></i>添加快捷菜单</a>
			</div>
		</div>

	</div>
	</div>


<div class="panel panel-default">
	<div class="panel-heading">
		图文设置
	</div>
	<div class="panel-body">

		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>图文标题：</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" id="new_title" class="form-control span7" placeholder="" name="new_title" value="<?php  echo $reply['new_title'];?>">
			</div>
		</div>


		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>分享 图标：</label>
			<div class="col-sm-9 col-xs-12">
				<?php  echo tpl_form_field_image('new_icon',$reply['new_icon']);?>
			</div>
		</div>

		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>图文描述：</label>
			<div class="col-sm-9 col-xs-12">
			<textarea style="height: 60px;" name="new_content"
					  class="form-control span7" cols="60"><?php  echo $reply['new_content'];?></textarea>
			</div>
		</div>


		</div>
	</div>


<script>


	require(['jquery', 'util'], function($, u){
		$(function(){
			u.editor($('#rule')[0]);

		});
	});

</script>


<script>
	function addSItem() {
		var html = "<tr class='sin_serial_item'>";
		html += "<td><input name='serial_day[]' type='text' class='form-control span3' value=''  /></td>";
		html += "<td><input name='serial_credit[]' type='text' class='form-control span3' value='' /></td>";
		

		
		html += "<td> <input  name='serial_ids[]' type='hidden' value='' /><a href='javascript:;' onclick='removeSerials(this)'><i class='icon icon-remove fa fa-times'></i> 删除</a>";
		html += "</td>";
		html += "</tr>";
		$("#sin_serial-items").append(html);

	}
	function removeSerials(obj) {
		$(obj).parent().parent().remove();
	}




	function addLItem() {

		var index=$("#link-items tr").length+1;

		var html = "<tr class='link_item'>";
		html += "<td><input name='link_name[]' type='text' class='form-control span3' value=''  /></td>";
		html += "<td><input name='link_url[]' type='text' class='form-control span3' value='' /></td>";

		html+="<td><input name='link_sort[]' type='text' class='form-control span1' value='"+index+"' /></td> ";

		html += "<td> <input  name='link_ids[]' type='hidden' value='' /><a href='javascript:;' onclick='removeLinkItem(this)'><i class='icon icon-remove fa fa-times'></i> 删除</a>";
		html += "</td>";
		html += "</tr>";
		$("#link-items").append(html);

	}
	function removeLinkItem(obj) {
		$(obj).parent().parent().remove();
	}






</script>