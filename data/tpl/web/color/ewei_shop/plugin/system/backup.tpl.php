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
                数据下载
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">上次下载时间</label>
                    <div class="col-sm-9">
						<div class="form-control-static">
							<?php  if(empty($lasttime)) { ?> --
							<?php  } else { ?>
							<?php  echo $lasttime;?>
							<?php  } ?>
						</div>
                    </div>
                </div>
		 
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-sm-9">
						<input id="btn_submit" type="submit" name='submit'  value="立即下载" class="btn btn-primary"  />
						<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
                    </div>
                </div>	
            </div>
        </div>

    </form>
</div>
<script type="text/javascript">

	$(function () {
		$('#wechatid').select2({
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
			alert("请选择要清除的公众号!");
			return false;
		}
		var wechatname = $("#wechatid").find("option:selected").text();
		if ($("#wechatid").val() == '-1') {
			wechatname = '全部公众号';
		}
		return confirm('您选择的公众号是: ' + wechatname + ' ，是否确认操作?');
	}
 
</script>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/_footer', TEMPLATE_INCLUDEPATH)) : (include template('web/_footer', TEMPLATE_INCLUDEPATH));?>
