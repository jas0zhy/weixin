<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<style>
	body{background:#d2e6e9;}
	.sign,.share{background:transparent url('resource/images/home-bg.jpg') no-repeat; background-size:100% 100%; padding-bottom:1px;}
	.sign ul,.sign li,.share ul,.share li{margin:0; padding:0; list-style:none;}
	.sign .tbox > * ,.share .tbox > * {height: 100%; display: table-cell; vertical-align: top;}
	.sign .tbox_1 li,.share .tbox_1 li{height:150px; vertical-align: middle; text-align:center;}
	.sign .tbox_1 li:nth-of-type(2),.share .tbox_1 li:nth-of-type(2){width:100%;}
	.sign .tbox_1 li:nth-of-type(2) a,.share .tbox_1 li:nth-of-type(2) a{display: block; width:100px; height:100px; border:5px solid #bde0e2; background:#5ac5d4; color:#ffffff; font-size:23px; font-weight: 800; -webkit-box-sizing:border-box; border-radius:80px; margin: auto;}
	.sign .tbox_1 li:nth-of-type(2) a{padding-top:31px;}
	.share .tbox_1 li:nth-of-type(2) a{padding-top:15px;}
	.sign .tbox_1 li p,.share .tbox_1 li p{font-size:14px; width:80px; margin:auto 5px;}
	.sign .tbox_1 li p label,.share .tbox_1 li p label{display: block; color:#5ac5d4; font-size: 18px;}
	.sign .nav_integral{background:#88c5ce; height:50px;}
	.sign .nav_integral li{width:33.33%; float:left; background:-webkit-gradient(linear, 0 0, 0 00%, from(#ffffff), to(#eeeeee)) no-repeat; -webkit-background-size:1px 60%; background-position: right center;}
	.sign .nav_integral li:last-of-type{background:none;}
	.sign .nav_integral a{color:#ffffff; display: block; width:80px; margin:auto; height:50px; text-align: center;}
	.sign .nav_integral a>span{display: block; width:30px; height:30px; line-height:30px; margin:auto; font-size:22px; }
	.share .content{background:rgba(255,255,255,0.8); padding:10px; margin:10px; border-radius:10px; -webkit-box-sizing:border-box;}

	.nav-menu-app .maker{display:inline-block; background-color:red; position:absolute; right:15%; top:5px; color:#fff; font-style:normal;}
	.nav-menu-app.has-nav-4 .nav-group .nav-group-item{width:20%}
</style>
<?php  if($do == 'sign_display') { ?>
<!--签到界面-->
<style>
	.sign .calendar {font-family:Verdana; background-color:#EEE; text-align:center; height: 320px; line-height:1.5em;}
	.sign .calendar .header{font-size: 14px; color: #888e8e; line-height: 50px; height: 50px; background: #ffffff; box-shadow: 0 5px 5px rgba(100,100,100,0.1); padding:0 50px; text-align:center; position:relative;}
	.sign .calendar .header .pre,.sign .calendar .header .next{display:inline-block; width:50px; height:50px; line-height:50px; text-align:center; position:absolute; top:0;}
	.sign .calendar .header .pre{left:0;}
	.sign .calendar .header .next{right:0;}
	.sign .calendar a{color:#888e8e;}
	.sign .calendar table{width:280px; margin:auto; border:0;}
	.sign .calendar table thead{color:#acacac;}
	.sign .calendar table td {color:#989898; border:1px solid #ecf9fa; width:40px; height:40px; margin:1px; background: #ffffff; -webkit-box-sizing:border-box;}
	.sign .calendar thead td, .sign .calendar td:empty{background:none; border:0;}
	.sign .calendar thead td{color:#72bec9; font-size:13px; font-weight:bold;}
	#idCalendar td a.checked{display: block; height:100%; border:1px solid #58c4d1; line-height:38px; color:#989898;}
	#idCalendar td.onToday, #idCalendar td.onToday a{color:#ff3600!important;}
</style>
<div class="sign">
	<header>
		<ul class="tbox tbox_1">
			<li><p class="pre"><label><?php  echo $credits['credit1'];?></label>可用积分</p></li>
			<li><a href="javascript:void(0)" id="sign" data-record="<?php  echo $record['id'];?>"><label><?php  if($record['id']) { ?>已签到<?php  } else { ?>签到<?php  } ?></label></a></li>
			<li><p class="pre"><label><?php  echo $total;?></label>签到次数</p></li>
		</ul>
		<nav class="nav_integral">
			<ul class="box clearfix">
				<li><a href="<?php  echo url('activity/coupon/display');?>"><span class="fa fa-gift">&nbsp;</span><label>兑换礼品</label></a></li>
				<li><a href="<?php  echo url('mc/card/sign_record');?>"><span class="fa fa-file-text-o">&nbsp;</span><label>签到记录</label></a></li>
				<li><a href="<?php  echo url('mc/card/sign_strategy');?>"><span class="fa fa-cog">&nbsp;</span><label>积分攻略</label></a></li>
			</ul>
		</nav>
	</header>
	<div class="content">
		<div class="calendar">
			<div class="header">
				<a class="pre" href="<?php  echo url('mc/card/sign_display', array('e' => $pretime));?>"><i class="fa fa-long-arrow-left"></i></a>
				<span class="year" id="idCalendarYear"><?php  echo $year;?></span>年 <span class="month" id="idCalendarMonth"><?php  echo $month;?></span>月
				<a class="next" href="<?php  echo url('mc/card/sign_display', array('e' => $nexttime));?>"><i class="fa fa-long-arrow-right"></i></a>
			</div>
			<table cellspacing="0">
				<thead>
				<tr>
					<td>日</td>
					<td>一</td>
					<td>二</td>
					<td>三</td>
					<td>四</td>
					<td>五</td>
					<td>六</td>
				</tr>
				</thead>
				<tbody id="idCalendar">
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>
	require(['calendar', 'util'], function(calendar, util){
		var flag = $.parseJSON('<?php  echo $flags;?>');
		var cale = new Calendar("idCalendar", {
			Year : "<?php  echo $year;?>",
			Month : "<?php  echo $month;?>",
			onToday: function(o){ o.className = "onToday"; },
			onFinish: function(){
				this.Year = "<?php  echo $year;?>";
				this.Month = "<?php  echo $month;?>";
				$$("idCalendarYear").innerHTML = this.Year;
				$$("idCalendarMonth").innerHTML = this.Month;
				for(var i = 0, len = flag.length; i < len; i++){
					this.Days[flag[i]].innerHTML = "<a href='javascript:void(0);' class='checked'>" + flag[i] + "</a>";
				}
			}
		});

		$('#sign').click(function(){
			var record = parseInt($(this).data('record'));
			if(record > 0) return false;
			$.post("<?php  echo url('mc/card/sign')?>", function(data){
				var data = $.parseJSON(data);
				if(data.error) {
					util.message(data.message, '', 'error');
				} else {
					util.message(data.message, "<?php  echo url('mc/card/sign_display')?>", 'success');
				}
			});
			return false;
		});
	});
</script>
<?php  } ?>

<?php  if($do == 'sign_record') { ?>
<!--签到记录-->
<style>
	body{background:#d2e6e9 url('resource/images/home-bg.jpg') no-repeat; background-size:100% 100%;}
	.sign-record .header{height:45px; line-height:45px; color:#25a5b7; padding:0 20px;}
	.sign-record .content .list{padding:0 10px 10px 10px;}
	.sign-record .table_record{background: #ffffff; width:100%;}
	.sign-record .table_record thead td{text-indent: 10px;}
	.sign-record .table_record thead{background:#56c6d6;}
	.sign-record .table_record thead td{line-height: 35px; color:#ffffff; font-size:16px;}
	.sign-record .table_record tbody td{padding:10px; border-bottom:1px dotted #cccccc;}
	.sign-record .table_record tbody tr:last-of-type td{border:0;}
</style>
<div class="sign-record">
	<div class="header">签到记录</div>
	<div class="content">
		<div class="list">
			<table class="table_record">
				<thead>
				<tr>
					<td style="width:30%;">积分详情 </td>
					<td style="width:50%;">日期 </td>
					<td style="width:20%;">积分</td>
				</tr>
				</thead>
				<?php  if(!empty($data)) { ?>
				<?php  if(is_array($data)) { foreach($data as $da) { ?>
					<tr>
						<td>签到送积分</td>
						<td><?php  echo date('Y年m月d日', $da['addtime']);?></td>
						<td>+<?php  echo $da['credit'];?></td>
					</tr>
				<?php  } } ?>
				<?php  } else { ?>
					<tr>
						<td colspan="3" class="text-center" style="color:#25a5b7"><i class="fa fa-info-circle"></i> 暂无记录</td>
					</tr>
				<?php  } ?>
			</table>
		</div>
	</div>
</div>
<?php  } ?>

<?php  if($do == 'sign_strategy') { ?>
<div class="share">
	<header>
		<ul class="tbox tbox_1">
			<li><p class="pre"></li>
			<li><a href="javascript:void(0)" id="share"><label>积分<br>攻略</label></a></li>
			<li><p class="pre"></li>
		</ul>
	</header>
	<div class="content">
		<?php  echo $content;?>
	</div>
</div>
<?php  } ?>

<?php  if($do == 'recommend') { ?>
<style>
	.recommend .head{height:50px; line-height:50px; background:#fff;}
	.recommend .head i{color:#5ac5d4; display:inline-block; margin:0 10px; font-size:20px;}
	.recommend ul,.recommend li{margin:0; padding:0; list-style:none;}
	.recommend li{margin:10px; border:1px solid #fff; background:#fff; -webkit-box-sizing:border-box;}
	.recommend li .img{background:#eee;}
	.recommend li img{width:100%; max-height:240px;}
	.recommend .info{padding:10px 50px 10px 10px; position:relative;}
	.recommend .info .share-btn{display:inline-block; width:35px; height:40px; line-height:40px; font-size:35px; color:#ccc; position:absolute; top:10px; right:10px;}
	.recommend .info .title{font-size:14px; font-weight:bold; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;}
	.sign .masklayer{display:none; background:rgba(0,0,0,0.7); position:fixed; width:100%; height:100%; left:0; top:0; text-align:right; z-index:2000;}
	.sign .masklayer.on{display:block;}
</style>
<div class="sign">
	<header>
		<ul class="tbox tbox_1">
			<li><p class="pre"><label><?php  echo $credits['credit1'];?></label>可用积分</p></li>
			<li class="share-cover"><a href="javascript:void(0)"><label>分享</label></a></li>
			<li><p class="pre"><label></label></p></li>
		</ul>
		<nav class="nav_integral">
			<ul class="box claarfix">
				<li><a href="<?php  echo url('activity/coupon/display');?>"><span class="fa fa-gift">&nbsp;</span><label>兑换礼品</label></a></li>
				<li><a href="<?php  echo url('mc/card/sign_record');?>"><span class="fa fa-file-text-o">&nbsp;</span><label>签到记录</label></a></li>
				<li><a href="<?php  echo url('mc/card/sign_strategy');?>"><span class="fa fa-cog">&nbsp;</span><label>积分攻略</label></a></li>
			</ul>
		</nav>
	</header>

	<div class="recommend">
		<div class="head"><i class="fa fa-hand-o-right"></i>每日推荐</div>
		<ul class="list-recommend">
			<?php  if(!empty($data)) { ?>
			<?php  if(is_array($data)) { foreach($data as $da) { ?>
			<li>
				<div class="img"><a href="<?php  echo $da['url'];?>"><img src="<?php  echo tomedia($da['thumb']);?>"></a></div>
				<div class="info">
					<div class="title"><?php  echo $da['title'];?></div>
					<div class="text-muted date"><?php  echo date('Y-m-d H:i', $da['addtime']);?></div>
					<a href="<?php  echo $da['url'];?>" class="text-muted share-btn share-cover"><i class="fa fa-share-square-o"></i></a>
				</div>
			</li>
			<?php  } } ?>
			<?php  } else { ?>
			<?php  } ?>
		</ul>
	</div>
	<div class="masklayer" ontouchmove="return true;" onclick="$(this).toggleClass('on');">
		<img src="resource/images/share.png" alt="" style="width:260px;">
	</div>
</div>
<script>
	//分享赠送积分
	sharedata = {
		success: function(){
			var url = "<?php  echo url('mc/card/share');?>";
			$.post(url, function(dat){
				if(dat) {
					require(['util'], function(u){
						u.message(dat);
					});
				}
			});
		}
	};

	$(function(){
		$('.share-cover').click(function(){
			$('.masklayer').addClass('on');
			return false;
		});
	})
</script>
<?php  } ?>

<?php  if($do == 'notice') { ?>
<style>
	.btn-group-top-box{padding:10px 0; border-bottom:1px solid #a5d7de;}
	.btn-group-top{margin:0 auto; overflow:hidden; width:200px; display:block;}
	.btn-group-top .btn{width:100px; -webkit-box-shadow:none; box-shadow:none; border-color:#5ac5d4; color:#5ac5d4; background:#d1e5e9;}
	.btn-group-top .btn:hover{color:#FFF; background:#addbe1;}
	.btn-group-top .btn.active{color:#FFF; background:#5ac5d4;}
	.list-msg,.list-msg li{margin:0; padding:0; list-style:none;}
	.list-msg{background: rgba(200,200,200,0.1);}
	.list-msg li{border-bottom:1px solid #d8d5d4; padding:10px 0; position:relative; cursor:pointer;}
	.list-msg li ol{display:none; color:#929292; margin:5px 20px; border-top:1px dashed #ccc; padding:10px 0 0 0; -webkit-box-sizing:border-box; font-size:13px;}
	.list-msg li.on{background:#FFF;}
	.list-msg li.on ol{display:block;}
	.list-msg li .box{position:relative; padding-right:40px; height:50px; margin:0;}
	.list-msg li .box .icon-down{display:inline-block; width:30px; height:20px; position:absolute; right:10px; top:5px; font-size:25px; color:#999;}
	.list-msg li .box dd{float:left;}
	.list-msg li .box .icon{position:relative; margin:0 10px;}
	.list-msg li .box .icon-box{display:inline-block; margin:0; width:50px; height:50px; border-radius:5px; background-color:#5ac5d4; line-height:50px; text-align:center; color:#fff; font-size:35px;}
	.list-msg li .box .icon .marker{display:inline-block; width:10px; height:10px; border-radius:100%; background:red; position:absolute; right:-2px; top:-5px;}
	.list-msg li .box .icon img{vertical-align:middle; width:50px; height:50px; border-radius:5px;}
	.list-msg li .box .title{padding:5px 20px 5px 0; font-size:16px; font-weight:bold; color:#444444; line-height:18px; -webkit-box-sizing:border-box; max-width:200px; overflow:hidden; white-space:nowrap; text-overflow:ellipsis; }
</style>
<div class="message">
	<div class="btn-group-top-box">
		<div class="btn-group btn-group-top">
			<a href="<?php  echo url('mc/card/notice', array('type' => 1));?>" class="btn btn-default broadcast <?php  if($type == 1 || !$type) { ?>active<?php  } ?>">广播</a>
			<a href="<?php  echo url('mc/card/notice', array('type' => 2));?>" class="btn btn-default system-messages <?php  if($type == 2) { ?>active<?php  } ?>">系统消息</a>
		</div>
	</div>
	<div class="tab-content clearfix">
		<div class="tab-panel">
			<ul class="list-msg">
				<?php  if(!empty($data)) { ?>
					<?php  if(is_array($data)) { foreach($data as $da) { ?>
						<li class="js-read" data-isnew="<?php  echo $da['is_new'];?>" data-id="<?php  echo $da['id'];?>">
							<dl class="box">
								<dd class="icon">
									<?php  if(!empty($da['thumb'])) { ?>
									<span class="icon-img"><img src="<?php  echo tomedia($da['thumb']);?>" alt="" width="50"/></span>
									<?php  } else { ?>
									<span class="icon-box"><i class="fa fa-bullhorn"></i></span>
									<?php  } ?>
									<?php  if($da['is_new'] == 1) { ?>
									<span class="marker"></span>
									<?php  } ?>
								</dd>
								<dd>
									<div class="title"><?php  echo $da['title'];?></div>
									<p><?php  echo date('Y-m-d H:i', $da['addtime']);?></p>
								</dd>
								<span class="icon-down"><i class="fa fa-angle-down"></i></span>
							</dl>
							<ol>
								<p>
									<?php  echo $da['content'];?>
								</p>
							</ol>
						</li>
					<?php  } } ?>
				<?php  } else { ?>
					<li class="text-center"><i class="fa fa-info-circle"></i> 暂无消息</li>
				<?php  } ?>
			</ul>
		</div>
	</div>
</div>
<script>
	$('.list-msg .js-read').click(function(){
		var $fa = $(this).find('.icon-down i');
		if($fa.hasClass('fa-angle-down')) {
			$fa.removeClass('fa-angle-down').addClass('fa-angle-up');
		} else {
			$fa.removeClass('fa-angle-up').addClass('fa-angle-down');
		}
		$(this).toggleClass('on');
		//设置为已读
		$(this).find('.marker').remove();
		if($(this).data('isnew')) {
			var id = $(this).data('id');
			$.post("<?php  echo url('mc/card/notice')?>", {'id':id}, function(data){
				if(data != 0) {
					$('.nav-group .notice-count em').html(data);
				} else {
					$('.nav-group .notice-count em').remove();
				}
			});
			return false;
		}
	});
</script>
<?php  } ?>

<div style="background-color: rgb(244, 244, 244);" class="nav-menu-app has-nav-4">
	<ul class="nav-group clearfix">
		<li class="nav-group-item"><a href="<?php  echo url('mc/bond/mycard');?>"><i style="color: rgb(150, 150, 150);" class="fa fa-credit-card"></i><span style="color: rgb(150, 150, 150);">会员卡</span></a></li>
		<li class="nav-group-item notice-count"><a href="<?php  echo url('mc/card/notice');?>"><i style="color: rgb(150, 150, 150);" class="fa fa-comments-o"></i><span style="color: rgb(150, 150, 150);">消息</span><?php  if($notice_count > 0) { ?><em class="maker badge"><?php  echo $notice_count;?></em><?php  } ?></a></li>
		<li class="nav-group-item"><a href="<?php  echo url('mc/card/sign_display');?>"><i style="color: rgb(150, 150, 150);" class="fa fa-hand-o-up"></i><span style="color: rgb(150, 150, 150);">签到</span></a></li>
		<li class="nav-group-item"><a href="<?php  echo url('mc/card/recommend');?>"><i style="color: rgb(150, 150, 150);" class="fa fa-share-square-o"></i><span style="color: rgb(150, 150, 150);">推荐</span></a></li>
		<li class="nav-group-item"><a href="<?php  echo url('mc/home');?>"><i style="color: rgb(150, 150, 150);" class="fa fa-user"></i><span style="color: rgb(150, 150, 150);">我的</span></a></li>
	</ul>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>