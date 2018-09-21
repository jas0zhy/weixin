<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/_header', TEMPLATE_INCLUDEPATH)) : (include template('web/_header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('tabs', TEMPLATE_INCLUDEPATH)) : (include template('tabs', TEMPLATE_INCLUDEPATH));?>
<link href="../addons/ewei_shop/static/js/dist/select2/select2.css" rel="stylesheet">
<link href="../addons/ewei_shop/static/js/dist/select2/select2-bootstrap.css" rel="stylesheet">
<script language="javascript" src="../addons/ewei_shop/static/js/dist/select2/select2.min.js"></script>
<script language="javascript" src="../addons/ewei_shop/static/js/dist/select2/select2_locale_zh-CN.js"></script>
<div class="main">
    <form id="dataform" action="" method="post" class="form-horizontal form">
        <div class="panel panel-default">
            <div class="panel-heading">
                数据复制转移转移
            </div>
            <div class="panel-body">
				<div class='alert alert-danger'>
					<b>此工具会将目标公众选择的项目的相关数据清空，请谨慎操作！</b>
				</div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">源公众号</label>
                    <div class="col-sm-9">
						<select id='wechatid' name='wechatid' class='form-control' >
							<option value=''></option>
							<?php  if(is_array($wechats)) { foreach($wechats as $we) { ?>	
							<option value='<?php  echo $we['uniacid'];?>'><?php  echo $we['name'] ?></option>
							<?php  } } ?>
						</select>
                    </div>
                </div>
				  <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">目标公众号</label>
                    <div class="col-sm-9">
						<select id='wechatid1' name='wechatid1' class='form-control' >
							<option value=''></option>
							<?php  if(is_array($wechats)) { foreach($wechats as $we) { ?>	
							<option value='<?php  echo $we['uniacid'];?>'><?php  echo $we['name'] ?></option>
							<?php  } } ?>
						</select>
						<span class='help-block'><b>此公众号的数据会被清空，请慎重选择 ！</b></span>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">删除源公众号数据</label>
                    <div class="col-sm-9">
						<label class="radio-inline">
							<input type='radio' value="0" name="transtype" /> 保留
						</label>
						<label class="checkbox-inline">
							<input type='radio' value="1" name="transtype" /> 删除
						</label>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">
			    <label>
				 <input type='checkbox' class="checkline-all" value="shop"  /> 商城数据
			    </label>	
						
					</label>
                    <div class="col-sm-9">
			 <label class="checkbox-inline">
							<input type='checkbox' value="goods" name="shop[]" /> 商品
						</label>
						 
						<label class="checkbox-inline">
								<input type='checkbox' value="dispatch" name="shop[]" /> 配送方式
							</label>
							<label class="checkbox-inline">
								<input type='checkbox' value="adv" name="shop[]" /> 幻灯片
							</label> 
						         <label class="checkbox-inline">
								<input type='checkbox' value="notice" name="shop[]" /> 公告
							</label>
						 
							<label class="checkbox-inline">
								<input type='checkbox' value="level" name="shop[]" /> 会员等级
							</label>
							<label class="checkbox-inline">
								<input type='checkbox' value="group" name="shop[]" /> 会员分组
							</label>
						         
						</div>
						
                    </div>
				 
	    <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">   <label>
				 <input type='checkbox'  class="checkline-all" value="commission" /> 人人分销
			    </label>	</label>
                    <div class="col-sm-9">
			     
			    <label class="checkbox-inline">
				 <input type='checkbox' value="level" name="commission[]" /> 分销商等级
			    </label>	
			    <label class="checkbox-inline">
				 <input type='checkbox' value="set" name="commission[]" /> 基础设置
			    </label>	
		   </div>
	    </div>	
				
				  <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"> <label>
				 <input type='checkbox'  class="checkline-all" value="poster" /> 超级海报
			    </label></label>
                    <div class="col-sm-9">
			   <label class="checkbox-inline">
				 <input type='checkbox' value="poster" name="poster[]" /> 海报数据
			    </label>	
			 </div>
	    </div>	
				
				
	        <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"><label>
				 <input type='checkbox'  class="checkline-all" value="verify" /> O2O核销
			    </label></label>
                    <div class="col-sm-9">
			   <label class="checkbox-inline">
				 <input type='checkbox' value="store" name="verify[]" /> 门店
			    </label>	
			 </div>
	    </div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">
						<label>
				 <input type='checkbox'  class="checkline-all" value="perm"  /> 分权系统
			    </label></label>
                    <div class="col-sm-9">
			<label class="checkbox-inline">
				 <input type='checkbox' value="role" name="perm[]" /> 角色
		        </label>	
		   </div>
	    </div>		
 
             <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"><label>
				 <input type='checkbox'  class="checkline-all" value="creditshop" /> 积分商城
			    </label></label>
                    <div class="col-sm-9">
			   <label class="checkbox-inline">
				 <input type='checkbox' value="goods" name="creditshop[]" /> 商品
			    </label>	
			   
			    <label class="checkbox-inline">
				 <input type='checkbox' value="adv" name="creditshop[]" /> 幻灯片
			    </label>	
						
                                  <label class="checkbox-inline">
				 <input type='checkbox' value="set" name="creditshop[]" /> 基础设置
			    </label>	
 
			 </div>
	    </div>
		 <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"><label>
				 <input type='checkbox'  class="checkline-all" value="virtual" /> 虚拟物品
			    </label></label>
                               <div class="col-sm-9">
			    <label class="checkbox-inline">
				 <input type='checkbox' value="template" name="virtual[]" /> 模板
			    </label>	
			 </div>
	    </div>
	 
		
		<?php  if(p('article')) { ?>
		
		   <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"><label>
				 <input type='checkbox'  class="checkline-all" value="article"  /> 文章营销
			    </label></label>
                    <div class="col-sm-9">
			    <label class="checkbox-inline">
				 <input type='checkbox' value="article" name="article[]" /> 文章(关键词无法复制)
			    </label>	
			 </div>
	    </div>
		
		<?php  } ?>
		<?php  if(p('coupon')) { ?>
		 <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"><label>
				 <input type='checkbox'  class="checkline-all" value="coupon"  /> 超级券
			    </label></label>
                    <div class="col-sm-9">
			    <label class="checkbox-inline">
				 <input type='checkbox' value="coupon" name="coupon[]" /> 优惠券
			    </label>	
		            <label class="checkbox-inline">
				 <input type='checkbox' value="set" name="coupon[]" /> 基础设置
			    </label>	
			 </div>
	    </div>
		<?php  } ?>
 		
				  <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"><label>
				 <input type='checkbox'  class="checkline-all" value="postera" /> 活动海报
			    </label></label>
                    <div class="col-sm-9">
			   <label class="checkbox-inline">
				 <input type='checkbox' value="poster" name="postera[]" /> 海报海报
			    </label>	
			 
			 </div>
	    </div>	
				
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-sm-9">
						<input id="btn_submit" type="submit" name='submit'  value="确认操作" class="btn btn-primary"  onclick="return formcheck()"/>
						<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
                    </div>
                </div>	
            </div>
        </div>

    </form>
</div>
<script type="text/javascript">

	$(function () {
		$('#wechatid,#wechatid1').select2({
			search: true,
			placeholder: "请选择公众号",
			allowClear: true
		});
		$('.checkline-all').click(function(){
			var checked  =$(this).get(0).checked;
			 
			var name = $(this).val();
			$(":checkbox[name='" + name+ "[]']").each(function(){
				$(this).get(0).checked = checked;
			})
		})
	})

	function formcheck() {

		if ($("#wechatid").val() == '') {
			alert("请选择源公众号!");
			return false;
		}
		if ($("#wechatid1").val() == '') {
			alert("请选择源公众号!");
			return false;
		}
		 if ($("#wechatid").val() == $("#wechatid1").val()) {
			 alert("请选择两个不同的公众号!");
			return false;
		 }
		return confirm('此操作会先清楚目标公众号相关数据，是否确认操作?');
	}
 
</script>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/_footer', TEMPLATE_INCLUDEPATH)) : (include template('web/_footer', TEMPLATE_INCLUDEPATH));?>