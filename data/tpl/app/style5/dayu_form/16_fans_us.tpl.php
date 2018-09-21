<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('weheader', TEMPLATE_INCLUDEPATH)) : (include template('weheader', TEMPLATE_INCLUDEPATH));?>
<div class="weui_btn_primary weui-header "> 
	<div class="weui-header-left"><a class="iconfont f-white f18" href="javascript:history.back();">&#xe60c;</a></div>
		<h1 class="weui-header-title">关注<?php  echo $_W['uniaccount']['name'];?></h1>
	<div class="weui-header-right"><a class="icon icon-10 f-white"></a></div> 
</div>
	<div class="ui-wx">
		<div class="ui-banner"></div>
		<div class="ui-inner tcenter">
			<div class="ui-page">
				<div class="ui-page-meta-list">
				</div>                    
				<div class="ui-page-meta-img">
					<img src="<?php  echo $qrcodesrc;?>">
				</div>                                        
				<div class="ui-page-content">
					<p>（长按二维码，选择“<font color="red">识别二维码</font>”关注）</p>
					<p><?php  echo $message;?></p>
				</div>
			</div>   
		</div>
	</div>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('footers', TEMPLATE_INCLUDEPATH)) : (include template('footers', TEMPLATE_INCLUDEPATH));?>