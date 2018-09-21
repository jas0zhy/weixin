<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div id="activity-detail">
<style type="text/css">
@charset "utf-8";
html{background:#FFF;color:#000;}
body, div, dl, dt, dd, h1, h2, h3, h4, h5, h6, pre, code, form, fieldset, legend, input, textarea, p, blockquote, th, td{margin:0;padding:0;}
table{border-collapse:collapse;border-spacing:0;}
fieldset, img{border:0;}
address, caption, cite, code, dfn,  th, var{font-style:normal;font-weight:normal;}
ol, ul{list-style:none;}
caption, th{text-align:left;}
h1, h2, h3, h4, h5, h6{font-size:100%;font-weight:normal;}
q:before, q:after{content:'';}
abbr, acronym{border:0;font-variant:normal;}
sup{vertical-align:text-top;}
sub{vertical-align:text-bottom;}
input, textarea, select{font-family:inherit;font-size:inherit;font-weight:inherit;}
input, textarea, select{font-size:100%;}
legend{color:#000;}
body{color:#222;background:#f5f5f5;font-family:Helvetica, STHeiti STXihei, Microsoft JhengHei, Microsoft YaHei, Tohoma, Arial;height:100%;position:relative;}
body > .tips{display:none;left:50%;padding:20px;position:fixed;text-align:center;top:50%;width:200px;z-index:100;}
.page{padding:15px;}
.page .page-error, .page .page-loading{line-height:30px;position:relative;text-align:center;}
#activity-detail .page-bizinfo{border-bottom:1px dotted #CCC;}
#activity-detail .page-bizinfo .header{padding:10px 10px 10px;}
#activity-detail .page-bizinfo .header #activity-name{color:#000;font-size:20px;margin-bottom:5px;font-weight:bold;word-break:normal;word-wrap:break-word;}
#activity-detail .page-bizinfo .header #post-date{color:#8c8c8c;font-size:11px;margin:0;}
#activity-detail .page-content{padding:10px;}
#activity-detail .page-content .media{margin-bottom:18px;}
#activity-detail .page-content .media img{width:100%;}
#activity-detail .page-content .text{color:#3e3e3e;font-size:1.5;line-height:1.5;width: 100%;overflow: hidden;zoom:1;}
#activity-detail .page-content .text p{min-height:1.5em;min-height: 1.5em;word-wrap: break-word;word-break:break-all;}
#activity-list .header{font-size:20px;}
#activity-list .page-list{border:1px solid #ccc;border-radius:5px;margin:18px 0;overflow:hidden;}
#activity-list .page-list .line.btn{border-radius:0;margin:0;text-align:left;}
#activity-list .page-list .line.btn .checkbox{height:25px;line-height:25px;padding-left:35px;position:relative;}
#activity-list .page-list .line.btn .checkbox .icons{background-color:#ccc;left:0;position:absolute;top:0;}
#activity-list .page-list .line.btn.off .icons{background-image:none;}
#activity-list #save.btn{background-image:linear-gradient(#22dd22, #009900);background-image:-moz-linear-gradient(#22dd22, #009900);background-image:-ms-linear-gradient(#22dd22, #009900);background-image:-o-linear-gradient(#22dd22, #009900);background-image:-webkit-gradient(linear, left top, left bottom, from(#22dd22), to(#009900));background-image:-webkit-linear-gradient(#22dd22, #009900);}
.vm{vertical-align:middle;}
.tc{text-align:center;}
.db{display:block;}
.dib{display:inline-block;}
.b{font-weight:700;}
.clr{clear:both;}
.text img{max-width:100%;}
.page-url{padding-top:18px;}
.page-url-link{color:#607FA6;font-size:14px;text-decoration:none;text-shadow:0 1px #ffffff;-webkit-text-shadow:0 1px #ffffff;-moz-text-shadow:0 1px #ffffff;}
#mbutton{padding:15px 10px 15px 10px; overflow:hidden; border-bottom:1px #DDD solid;}
#mbutton > span{float:right; display:inline-block; background:#428BCA; border:1px #DDD solid; color:#FFF; height:30px; line-height:30px; padding:0 10px; margin-left:10px;}
#mcover{position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0, 0, 0, 0.7);display:none;z-index:20000;}
#mcover img{position:fixed;right: 18px;top:5px;width:260px;height:180px;z-index:20001;}
.head{height:40px; line-height:40px; background:#205AA7; padding:0 5px; color:#FFF;}
.head .bn{display:inline-block; height:30px; line-height:30px; padding:0 10px; margin-top:4px; font-size:20px; background:transparent; color:#FFF; text-decoration:none;}
.head .bn.pull-left{border-right:1px solid #000;}
.head .bn.pull-right{position:absolute; right:5px; top:0; border-left:1px solid #000;}
.head .title{font-size:14pt;display:block;padding-left:10px;font-weight:bolder;margin-right:49px;text-align:center;height:40px;line-height:40px;text-overflow:ellipsis;white-space:nowrap;overflow: hidden;}
.head .order{background:#428BCA; position:absolute; z-index:9999; right:0;}
.head .order li > a{display:block; padding:0 10px; min-width:100px; height:35px; line-height:35px; font-size:16px; color:#FFF; text-decoration:none; border-top:1px #EEE solid;}
.head .order li.fa-caret-up{font-size:20px;color:#428BCA;position:absolute;top:-11px;right:16px;}
</style>
<div class="head">
	<a href="javascript:history.go(-1);" class="bn pull-left"><i class="fa fa-reply"></i></a>
	<span class="title">内容页</span>
	<a href="javascript:;" id="category_show" class="bn pull-right"><i class="fa fa-reorder"></i></a>
	<ul class="list-unstyled order hide">
		<li class="fa fa-caret-up"></li>
		<?php  $site_category = modulefunc('site', 'site_category', array (
  'func' => 'site_category',
  'limit' => 10,
  'index' => 'iteration',
  'multiid' => 0,
  'uniacid' => 8,
  'acid' => 0,
)); if(is_array($site_category)) { $i=0; foreach($site_category as $i => $row) { $i++; $row['iteration'] = $i; ?>
		<li>
			<a href="<?php  echo $row['linkurl'];?>">
				<?php  echo $row['name'];?>
			</a>
		</li>
		<?php  } } ?>
	</ul>
</div>
<div class="page-bizinfo">
	<div class="header">
		<h1 id="activity-name"><?php  echo $detail['title'];?></h1>
		<span id="post-date">
			<span><?php  echo date("Y-m-d", $detail['createtime']);?></span>
			<span><?php  echo $detail['author'];?></span>
			<?php  if(!empty($detail['source'])) { ?><a href="<?php  echo $detail['source'];?>">文章来源</a><?php  } ?>
			<?php  if(!empty($subscribeurl)) { ?><a href="<?php  echo $subscribeurl;?>"><?php  echo $_W['account']['name'];?></a><?php  } ?>
		</span>
	</div>
</div>
<div class="page-content">
	<div class="text">
		<?php  echo $detail['content'];?>
	</div>
</div>
</div>
<div id="mbutton">
	<span class="" onclick="$('#mcover').show()"><i class="fa fa-share-alt"></i> 转发</span>
	<span class="" onclick="$('#mcover').show()"><i class="fa fa-group"></i> 分享</span>
</div>
<div id="mcover" onclick="$(this).hide()"><img src="./resource/images/guide.png"></div>
<?php  $_share = array('content' => $detail['description'], 'title' => $detail['title'], 'imgUrl' => $detail['thumb']);?>
<script>
	require(['jquery'], function($){
		$('#category_show').click(function(){
			$('.head .order').toggleClass('hide');
		});
 		//阅读文章后,给分享人加积分
		var url = "<?php  echo url('site/site/handsel/', array('id' => $detail['id'], 'action' => 'click', 'u' => $_GPC['u']));?>";
		$.post(url, function(dat){
			if(dat != 'success') {
				dat = $.parseJSON(dat);
			} else {
			}
		});
 
		//转发成功后事件
		window.onshared = function(){
			var url = "<?php  echo url('site/site/handsel/', array('id' => $detail['id'], 'action' => 'share'));?>";
			$.post(url, function(dat){
				if(dat != 'success') {
					dat = $.parseJSON(dat);
				} else {
				}
			});
		}
	});
</script>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>