<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('weheader', TEMPLATE_INCLUDEPATH)) : (include template('weheader', TEMPLATE_INCLUDEPATH));?>
<?php  if($reside) { ?>
<script src="<?php echo MODULE_URL;?>template/weui/js/city-picker.min.js"></script>
<?php  } ?>
<style>
body{background-color:#fbf9ff;}
.weui-header .weui-header-left,.weui-header .weui-header-right{top: 5px;}
.dayu-header {padding: 25px 0 0;}

.weui_textarea_counter span {font-size:12px;}
.weui_label span{color: #E64340;}
.weui-popup-container{z-index:9999;}
.weui_cell_select .weui_cell_td {padding-left: 1em;}
.weui_cell_select .weui_cell_hd .weui_select {line-height:45px;padding:0 25px 0 5px;color: #555;}

.weui_msg .weui_extra_area {margin-bottom: 5px;}
.weui_extra_area {z-index:0;}
.record .weui_cells:first-child {margin-top:30px;}
.record .weui_cells {margin:0;}
.record img{width:1.2rem;height:1.2rem;}

.weui_uploader_files {width:60%;float:left; list-style: none;height:100px; background: no-repeat center center; background-size: 100px auto; margin-bottom: 2px;text-align:center;}
.dayu_uploader_input {float: left; position: relative; margin: 0px; margin-bottom: 0px; width: 40%; height: 100px;; border: 0px solid #D9D9D9;}
.dayu_uploader_input span{line-height:15px;margin-top:5px;color:#666;}
.dayu_uploader_input span:last-child{margin-top:0px;position: absolute;bottom:0;display:block;}

.weui_uploader_file {text-align:center;
  float: left;
  margin-right: 9px;
  margin-bottom: 9px;
  width: auto;
  height: 100px;
  background: no-repeat center center;
  background-size: 100px auto;
  padding:100px auto;}
.m-img {background-position: top center;padding-bottom: 0;}
.m-img img{width:100%;height:auto;}
.m-masker {background-color: rgba(0, 0, 0, 0);}
</style>
    <div class="weui_tab_bd">
	<div id="popup" class="weui-popup-container">
		<div class="weui-popup-modal">
			<h2 class="title tcenter f-green f20" style="margin-top:20px;"><?php  echo $activity['title'];?></h2>
			<section>
				<?php  if(!empty($activity['agreement'])) { ?><h4 class="ui-page-title f16 tcenter"><?php  echo $activity['agreement'];?></h4><?php  } ?>
				<div class="weui-popup-bd"><?php  echo htmlspecialchars_decode($activity['content'])?></div>
			</section>
			<p class="p"><a href="javascript:;" class="weui_btn bg-blue close-popup">关闭</a></p>
		</div>
	</div>
<?php  if($activity['isthumb']!=0) { ?>
	<?php  if($activity['isthumb']==1) { ?>
	<div class="m-box">
		<div class="m-img"><img src="<?php  echo $activity['thumb'];?>"></div>
		<div class="m-masker"> 
			<div class="weui_media_box weui_media_text" style="position: absolute;bottom:0px;width:90%;">
		<?php  if($activity['description']) { ?>
			<a href="javascript:;" data-target="#popup" class="right weui_btn weui_btn_mini weui_btn_primary f-white open-popup f12"><i class="iconfont f11">&#xe61f;</i> 详情</a>
		<?php  } ?>
			</div>
		</div> 
	</div>
	<?php  } else { ?>	
	<header class="dayu-header">
		<a href="javascript:;" data-target="#popup" class="open-popup">
			<div class="weui_media_box weui_media_text">
				<h1 class="weui_media_title tcenter f-green f20"><?php  echo $activity['title'];?></h1>
		<?php  if($activity['description']) { ?>
				<p class="weui_media_desc indent"><?php  echo $activity['description'];?></p>
				<p class="weui_media_info f-black tright"><i class="iconfont f11">&#xe61f;</i> 详情 >></p>
		<?php  } ?>
			</div>
		</a>
	</header>
	<?php  } ?>
<?php  } ?>
	<?php  if($activity['isinfo']) { ?>
		<div class="weui_cells weui_cells_access">
			<a class="weui_cell" href="http://api.map.baidu.com/marker?location=<?php  echo $activity['loc_x'];?>,<?php  echo $activity['loc_y'];?>&title=<?php  echo urlencode($activity['business']);?>&content=<?php  echo urlencode($activity[address].' activity'.$store['tel']);?>&output=html">
				<div class="weui_cell_bd weui_cell_primary"><span class="icon icon-54"></span> 地址：<?php  echo $activity['address'];?></div>
				<div class="weui_cell_ft"></div>
			</a>
			<a class="weui_cell" href="tel:<?php  echo $activity['tel'];?>">
				<div class="weui_cell_bd weui_cell_primary"><span class="icon icon-94"></span> 电话：<?php  echo $activity['tel'];?></div>
				<div class="weui_cell_ft"></div>
			</a>
		</div>
	<?php  } ?>

<!--	<form method="post" action="<?php  echo $this->createMobileUrl('index')?>"  enctype="multipart/form-data" >	-->
<form action="<?php  echo $this->createMobileUrl('dayu_form', array('weid' => $_W['uniacid'], 'id' => $reid))?>" class="" enctype="multipart/form-data" method="POST" id="form">
<input type="hidden" name="repeat" value="<?php  echo md5(sha1(time())); ?>">

<?php  if($activity['paixu']==0) { ?>
<div class="weui_cells weui_cells_form" style="margin:0;">
    <div class="weui_cell">
        <div class="weui_cell_hd"><label class="weui_label"><?php  echo $activity['member'];?><span>*</span></label></div>
        <div class="weui_cell_bd weui_cell_primary">
            <input class="weui_input" id="member" name="member" type="text" value="<?php  echo $member['realname'];?>" placeholder="请输入姓名">
        </div>
    </div>
    <div class="weui_cell">
		<div class="weui_cell_hd"><label class="weui_label"><?php  echo $activity['phone'];?><span>*</span></label></div>
        <div class="weui_cell_bd weui_cell_primary ">
            <input class="weui_input" id="mobile" name="mobile" type="tel" pattern="[0-9]*" value="<?php  echo $member['mobile'];?>" placeholder="请输入手机号">
        </div>
    </div>
	<?php  if($activity['smsid']!=0) { ?>
    <div class="weui_cell">
		<input type="hidden" id="htel">
		<input type="hidden" id="hsms">
        <div class="weui_cell_hd"><label class="weui_label">验证码<span>*</span></label></div>
        <div class="weui_cell_bd weui_cell_primary">
            <input class="weui_input" id="sms" name="sms" type="tel" placeholder="请输入验证码">
        </div>
		<div class="weui_cell_ft" style="margin:0;">
        <input type="button" id="sendsms" class="weui_btn weui_btn_mini weui_btn_primary" value="获取验证码">
		</div>
    </div>
	<?php  } ?>
</div>
<?php  } ?>
	
<div class="weui_cells weui_cells_form">
				<?php  if(is_array($ds)) { foreach($ds as $fields) { ?>
				
		<?php  if($fields['type'] == 'text') { ?>
	<div class="weui_cell">
		<div class="weui_cell_hd"><label class="weui_label"><?php  echo $fields['title'];?><?php  if($fields['essential']) { ?><span>*</span><?php  } ?></label></div>
		<div class="weui_cell_bd weui_cell_primary">
		<?php  if($fields['bind'] == 'birth') { ?>
			<input class="weui_input" name="field_<?php  echo $fields['refid'];?>_<?php  echo $fields['bind'];?>" type="text" value="<?php  echo $profile['birthyear'];?>-<?php  echo $profile['birthmonth'];?>-<?php  echo $profile['birthday'];?>" placeholder="<?php  echo $fields['tixing'];?>" <?php  if($fields['essential']) { ?>required<?php  } ?>>
		<?php  } else { ?>
			<input class="weui_input" name="field_<?php  echo $fields['refid'];?>_<?php  echo $fields['bind'];?>" type="text" value="<?php  echo $fields['default'];?>" placeholder="<?php  echo $fields['tixing'];?>" <?php  if($fields['essential']) { ?>required<?php  } ?>>
		<?php  } ?>
		</div>
	</div>
		<?php  } ?>
		
		<?php  if($fields['type'] == 'email') { ?>
	<div class="weui_cell">
		<div class="weui_cell_hd"><label class="weui_label"><?php  echo $fields['title'];?><?php  if($fields['essential']) { ?><span>*</span><?php  } ?></label></div>
		<div class="weui_cell_bd weui_cell_primary">
			<input class="weui_input" type="text" name="field_<?php  echo $fields['refid'];?>_<?php  echo $fields['bind'];?>" value="<?php  echo $fields['default'];?>" placeholder="<?php  echo $fields['tixing'];?>" <?php  if($fields['essential']) { ?>required<?php  } ?>>
		</div>
	</div>
		<?php  } ?>
				
		<?php  if($fields['type'] == 'number') { ?>
	<div class="weui_cell">
		<div class="weui_cell_hd"><label class="weui_label"><?php  echo $fields['title'];?><?php  if($fields['essential']) { ?><span>*</span><?php  } ?></label></div>
		<div class="weui_cell_bd weui_cell_primary">
			<input class="weui_input" type="number" name="field_<?php  echo $fields['refid'];?>_<?php  echo $fields['bind'];?>" value="<?php  echo $fields['default'];?>" pattern="[0-9]*" placeholder="<?php  echo $fields['tixing'];?>">
		</div>
	</div>
		<?php  } ?>
				
		<?php  if($fields['type'] == 'textarea') { ?>
        <div class="weui_cell">
            <div class="weui_cell_bd weui_cell_primary">
			<textarea class="weui_textarea" name="field_<?php  echo $fields['refid'];?>_<?php  echo $fields['bind'];?>" rows="3" placeholder="<?php  echo $fields['tixing'];?>"><?php  echo $fields['default'];?></textarea>
                <div class="weui_textarea_counter"><span id='textarea_num'>限200字</span></div>
            </div>
        </div>
          <script>
$(function(){
	$(".weui_textarea").on("input paste" , function(){
				var num_left=$(this).val().length;
				if((200-num_left)<0){
					$("#textarea_num").text("超出"+(num_left-200)+"字");
					$("#textarea_num").css("color","#E44443");
				}else{
					$("#textarea_num").text((num_left)+"字");
					$("#textarea_num").css("color","#999999");
				}
			});

})
</script> 
		<?php  } ?>
				
		<?php  if($fields['type'] == 'radio') { ?>
		<div class="weui_cell">
			<div class="weui_cell_hd"><label for="name" class="weui_label"><?php  echo $fields['title'];?><?php  if($fields['essential']) { ?><span>*</span><?php  } ?></label></div>
				<div class="weui_cell_bd weui_cell_primary">
					<input type="text" class="weui_input" id="<?php  echo $fields['refid'];?>" name="field_<?php  echo $fields['refid'];?>_<?php  echo $fields['bind'];?>" placeholder="<?php  echo $fields['tixing'];?>" value="">
				</div>
				<div class="weui_cell_ft"></div>
		</div>
    <script>
      $("#<?php  echo $fields['refid'];?>").select({
        title: "<?php  echo $fields['title'];?>",
        items: [
		<?php  if(is_array($fields['options'])) { foreach($fields['options'] as $v) { ?>
		"<?php  echo $v;?>",
		<?php  } } ?>
        ],
        onChange: function(d) {
		console.log(this, d);
        }
      });
    </script>
		<?php  } ?>
				
		<?php  if($fields['type'] == 'checkbox') { ?>		
		<div class="weui_cell">
			<div class="weui_cell_hd"><label for="name" class="weui_label"><?php  echo $fields['title'];?><?php  if($fields['essential']) { ?><span>*</span><?php  } ?></label></div>
				<div class="weui_cell_bd weui_cell_primary">
					<input type="text" class="weui_input" id="<?php  echo $fields['refid'];?>" name="field_<?php  echo $fields['refid'];?>_<?php  echo $fields['bind'];?>" placeholder="<?php  echo $fields['tixing'];?>" value="">
				</div>
		</div>
    <script>
      $("#<?php  echo $fields['refid'];?>").select({
        title: "<?php  echo $fields['title'];?>",
        multi: true,
        items: [
		<?php  if(is_array($fields['options'])) { foreach($fields['options'] as $v) { ?>
			{
				title: "<?php  echo $v;?>",
				value: "<?php  echo $v;?>"
			},
		<?php  } } ?>
        ],
        onChange: function(d) {
		console.log(this, d);
        }
      });
    </script>
		<?php  } ?>
						
		<?php  if($fields['type'] == 'select') { ?>
		
      <div class="weui_cell">
        <div class="weui_cell_hd"><label for="date" class="weui_label"><?php  echo $fields['title'];?><?php  if($fields['essential']) { ?><span>*</span><?php  } ?></label></div>
        <div class="weui_cell_bd weui_cell_primary">
          <input type="text" class="weui_input" id="<?php  echo $fields['refid'];?>" name="field_<?php  echo $fields['refid'];?>_<?php  echo $fields['bind'];?>" placeholder="<?php  echo $fields['tixing'];?>" value="">
        </div>
      </div>
		    <script>
		<?php  $c=end(array_keys($fields['options']));?>
      $("#<?php  echo $fields['refid'];?>").picker({
        title: "请选择<?php  echo $fields['title'];?>",
        cols: [
          {
            textAlign: 'center',
            values: [
		<?php  if(is_array($fields['options'])) { foreach($fields['options'] as $like => $v) { ?>
		'<?php  echo $v;?>'<?php  if($like!=$c) { ?>,<?php  } ?>
		<?php  } } ?>
			]
          }
        ]
      });
    </script>
		<?php  } ?>

		<?php  if($fields['type'] == 'image') { ?>
</div>

    <div class="weui_cells weui_cells_form">
        <div class="weui_cell">
            <div class="weui_cell_bd weui_cell_primary">
                <div class="weui_uploader">
                    <div class="weui_uploader_bd row">
                        <div class="weui_uploader_files col-60">   
                            <input type="hidden" name="field_<?php  echo $fields['refid'];?>_<?php  echo $fields['bind'];?>" accept="image/*" capture="camera" value="" />                        
                            <image class="middle" id="show<?php  echo $fields['refid'];?>" src="<?php  echo tomedia($fields['image'])?>" style="height:100px;width:auto;" />
                        </div>
                        <div class="dayu_uploader_input col-40" id="<?php  echo $fields['refid'];?>">
							<?php  echo $fields['title'];?><?php  if($fields['essential']) { ?> <span class="f-red f18">*</span><?php  } ?>
							<span class="f12 left"><?php  echo urldecode($fields['description'])?></span>
							<span class="weui_btn weui_btn_mini weui_btn_default left">上传图片</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
          var btn = document.getElementById('<?php  echo $fields['refid'];?>');
          //定义images用来保存选择的本地图片ID，和上传后的服务器图片ID
          var images = {
              localId: [],
              serverId: []
          };


//	document.querySelector('#show<?php  echo $fields['refid'];?>').onclick = function () {
//		wx.previewImage({
//			urls: ['<?php  echo tomedia($fields['image'])?>',images.serverId]
//		});
//	};
          btn.onclick = function(){
              wx.chooseImage({
					count: 1,
					sourceType: ['album', 'camera'],
                   success:function(res){

                        images.localId = res.localIds;
                        var i = 0, length = images.localId.length;

                        document.getElementById('show<?php  echo $fields['refid'];?>').src = images.localId;
					var wxUpload = function() {
                        wx.uploadImage({
                            localId: images.localId[i], // 需要上传的图片的本地ID，由chooseImage接口获得
                            isShowProgressTips: 1, // 默认为1，显示进度提示
                            success: function (res) {
                                i++;
                                //将上传成功后的serverId保存到serverid
                                images.serverId.push(res.serverId);
                                //(serverId 即 media_id,公众号此后可根据该media_id来获取多媒体)将上传的图片通过AJAX远程提交给php下载到本地服务器
								var url = "<?php  echo $this->createMobileUrl('uploads',array('type'=>'image'));?>&serverId=" + res.serverId + "&localId=" + i;
								$.post(url, function(dat){
								var dat = eval("("+dat+")");
									$.toast(dat.message, "success");
									$('input[name="field_<?php  echo $fields['refid'];?>_<?php  echo $fields['bind'];?>"]').val(dat.path);
								});
                                if(i < length){
                                    wxUpload();
                                }
                            },
							fail: function (res) {
								alert(JSON.stringify(res));
							}
                        });
						
					};
					wxUpload();

                   }
              });
  
          }
</script>
<div class="weui_cells weui_cells_form">
		<?php  } ?>
		
		<?php  if($fields['type'] == 'calendar') { ?>
		<div class="weui_cell">
			<div class="weui_cell_hd"><label for="" class="weui_label"><?php  echo $fields['title'];?><?php  if($fields['essential']) { ?><span>*</span><?php  } ?></label></div>
				<div class="weui_cell_bd weui_cell_primary">
				<?php  if($fields['bind'] == 'birth') { ?>
					<input class="weui_input" name="field_<?php  echo $fields['refid'];?>_<?php  echo $fields['bind'];?>" type="text" value="<?php  echo $profile['birthyear'];?>-<?php  echo $profile['birthmonth'];?>-<?php  echo $profile['birthday'];?>" placeholder="<?php  echo $fields['tixing'];?>" id="<?php  echo $fields['refid'];?>">
<script>
      $("#<?php  echo $fields['refid'];?>").calendar({
        value: ['<?php  echo $profile['birthyear'];?>-<?php  echo $profile['birthmonth'];?>-<?php  echo $profile['birthday'];?>']
      });
</script>
				<?php  } else { ?>
					<input class="weui_input" name="field_<?php  echo $fields['refid'];?>_<?php  echo $fields['bind'];?>" type="text" value="" placeholder="<?php  echo $fields['tixing'];?>" id="<?php  echo $fields['refid'];?>">
<script>
      $("#<?php  echo $fields['refid'];?>").calendar({
        value: ['<?php  echo $time;?>']
      });
</script>
				<?php  } ?>
				</div>
		</div>
		<?php  } ?>
		
		<?php  if($fields['type'] == 'range') { ?>
		<div class="weui_cell">
			<div class="weui_cell_hd"><label for="" class="weui_label"><?php  echo $fields['title'];?><?php  if($fields['essential']) { ?><span>*</span><?php  } ?></label></div>
				<div class="weui_cell_bd weui_cell_primary">
					<input class="weui_input" type="text" name="field_<?php  echo $fields['refid'];?>_<?php  echo $fields['bind'];?>" value="" placeholder="<?php  echo $fields['tixing'];?>" id="<?php  echo $fields['refid'];?>" />
				</div>              
		</div>
    <script>
      $("#<?php  echo $fields['refid'];?>").datetimePicker();
    </script>
		<?php  } ?>
		
		<?php  if($fields['type'] == 'reside') { ?>
		<div class="weui_cell">
			<div class="weui_cell_hd"><label for="" class="weui_label"><?php  echo $fields['title'];?><?php  if($fields['essential']) { ?><span>*</span><?php  } ?></label></div>
				<div class="weui_cell_bd weui_cell_primary">
					<input class="weui_input" type="text" name="field_<?php  echo $fields['refid'];?>_<?php  echo $fields['bind'];?>" value="" placeholder="<?php  echo $fields['tixing'];?>" id="<?php  echo $fields['refid'];?>"/>
				</div>
		</div>
    <script>
	$("#<?php  echo $fields['refid'];?>").cityPicker({
		title: "<?php  echo $fields['title'];?>"
	});
    </script>
		<?php  } ?>
		
				<?php  } } ?>
</div>
<?php  if($activity['isvoice']==1) { ?>
<div class="weui_cells weui_cells_form voice">
	<div class="weui_cells_title tright"><span class="left"><?php  echo $activity['voice'];?><?php  if($activity['ivoice']==1) { ?><span class="f-red">*</span><?php  } ?></span><span class="f12"><?php  echo $activity['voicedec'];?></span></div>	
	<div class="weui_cell">
		<div class="weui_cell_hd">
			<div class="record-start-btn iconfont f35 f-white left" id="record-start">&#xe62a;</div>
			<div class="record-stop-btn iconfont f35 f-white left" id="record-stop">&#xe62a;</div>
			<div class="record-time f-orange f12 right"></div>
			<div class="record-prompt f-orange f12 middle right"><span class="block f-blue">蓝色开始录音</span><span class="block f-red">红色停止录音</span></div>
			<input type="hidden" name="voice" id="showvoice" value="" />
		</div>
		<div class="weui_cell_bd weui_cell_primary">
			<div class="send-control right">
				<div class="send-record-btn" id="send-record-btn">上传录音</div>
				<div class="send-success weui_btn_disabled" id="send-success" style="display:none;">上传成功</div>
			</div>
		</div>
	</div>	
</div>
<script>
    var upload_url='<?php  echo $_W['siteroot'].'app/'.$this->createMobileUrl('uploadvoice',array());?>';
    var getprefop_url='<?php  echo $_W['siteroot'].'app/'.$this->createMobileUrl('getprefop',array());?>';
          var btn = document.getElementById('send-record-btn');
		  
  //        btn.onclick = function(){
		var localId = null;
		var serverId = null;
        var timer = null;
        var timerTime = 0;
		
		$(".record-start-btn").click(function () {
            $(".record-start-btn").hide();
            $(".record-stop-btn").show();
            $(".record-prompt").hide();
            timerTime = 0;
            $(".record-time").text("");
            timer = setInterval(function () {
                timerTime++;
                $(".record-time").text("时长:" + timerTime + "秒");
				if (timerTime >58) {
					wx.stopRecord({
						success: function (res) {
							localId = res.localId;
							recordComplete();
						},
						fail: function (res) {
							alert(JSON.stringify(res));
						}
					});
				}
            }, 1000);
//			wx.startRecord();
			wx.startRecord({
				cancel: function () {
					alert('您拒绝了授权录音');
				}
			});
            wx.onVoiceRecordEnd({
                // 录音时间超过一分钟没有停止的时候会执行 complete 回调
                complete: function (res) {
                    localId = res.localId;
                    recordComplete();
					alert('录音时间已超过一分钟');
                }
            });
        });
        $(".record-stop-btn").mouseup(function () {
            wx.stopRecord({
                success: function (res) {
                    localId = res.localId;
                    recordComplete();
//						document.getElementById('showvoice').value = localId;
					$('#send-record-btn').css('display','');
					$('#send-success').css('display','none');
                },
				fail: function (res) {
					alert(JSON.stringify(res));
				}
            });
        });
        function recordComplete() {
            wx.playVoice({
                localId: localId // 需要播放的音频的本地ID，由stopRecord接口获得
            });
            clearInterval(timer);
            $(".record-stop-btn").hide();
            $(".record-start-btn").show();
            $(".send-control").show();
        }

		$(".send-record-btn").click(function () {
            if (localId == null)
                return;
            wx.uploadVoice({
                localId: localId, // 需要上传的音频的本地ID，由stopRecord接口获得
                serverId: serverId,
                isShowProgressTips: 1, // 默认为1，显示进度提示
                success: function (res) {
				
                $.ajax({
                  type: 'POST',
                  url: upload_url,
                  data:{serverId:res.serverId},
                  timeout: 15000,
                  success: function(res){
                    if (/^qiniu-persistentId.*$/.test(res)) {
                        var tmp=res.split(':');
                        setInterval(function () {
                            $.ajax({
                                type: 'POST',
                                url: getprefop_url,
                                data:{persistentId:tmp[1]},
                                success: function(res) {
                                    if (res == 1) location.href =tmp[2];
                                },
                                fail: function(err) {
                                    alert(JSON.stringify(err));
                                }
                            });
                        },1000);
                    }else{
                    }
                  },
                  fail: function(err) {
                      alert(JSON.stringify(err));
                  }
                });
//				alert('上传语音成功，serverId 为' + res.serverId);
					serverId = res.serverId; // 返回音频的服务器端ID
					document.getElementById('showvoice').value = "dayu_form_<?php  echo $_W['uniacid'];?>_"+serverId+".mp3";
					$('#send-record-btn').css('display','none');
					$('#send-success').css('display','');
                },
				fail:function() {
					alert(JSON.stringify(res));
				}
            });
		});
</script>
<?php  } ?>
<?php  if($activity['paixu']==1) { ?>
<div class="weui_cells weui_cells_form">
    <div class="weui_cell">
        <div class="weui_cell_hd"><label class="weui_label"><?php  echo $activity['member'];?><span>*</span></label></div>
        <div class="weui_cell_bd weui_cell_primary">
            <input class="weui_input" id="member" name="member" type="text" value="<?php  echo $member['realname'];?>" placeholder="请输入姓名">
        </div>
    </div>
    <div class="weui_cell">
		<div class="weui_cell_hd"><label class="weui_label"><?php  echo $activity['phone'];?><span>*</span></label></div>
        <div class="weui_cell_bd weui_cell_primary ">
            <input class="weui_input" id="mobile" name="mobile" type="tel" pattern="[0-9]*" value="<?php  echo $member['mobile'];?>" placeholder="请输入手机号">
        </div>
    </div>
	<?php  if($activity['smsid']!=0) { ?>
    <div class="weui_cell">
		<input type="hidden" id="htel">
		<input type="hidden" id="hsms">
        <div class="weui_cell_hd"><label class="weui_label">验证码<span>*</span></label></div>
        <div class="weui_cell_bd weui_cell_primary">
            <input class="weui_input" id="sms" name="sms" type="tel" placeholder="请输入验证码">
        </div>
		<div class="weui_cell_ft" style="margin:0;">
        <input type="button" id="sendsms" class="weui_btn weui_btn_mini weui_btn_primary" value="获取验证码">
		</div>
    </div>
	<?php  } ?>
</div>
<?php  } ?>
	
    <div class="weui_btn_area row">
	<?php  if(!empty($activity['agreement'])) { ?>
		<div class="weui_cells_checkbox">
			<label class="weui_cell weui_check_label" for="agreement">
				<div class="weui_cell_hd">
					<input type="checkbox" name="agreement" class="weui_check" id="agreement">
					<i class="weui_icon_checked"></i>
				</div>
				<div class="weui_cell_bd weui_cell_primary f14">
					<p>我已阅读并同意<a href="javascript:;" class="open-popup" data-target="#popup">《<?php  echo $activity['agreement'];?>》</a></p>
				</div>
			</label>
		</div>
	<?php  } ?>
		<?php  if(!empty($activity['var1'])) { ?><input type="hidden" name="<?php  echo $activity['var1'];?>" value="<?php  echo $_GPC[$activity['var1']];?>"><?php  } ?>
		<?php  if(!empty($activity['var2'])) { ?><input type="hidden" name="<?php  echo $activity['var2'];?>" value="<?php  echo $_GPC[$activity['var2']];?>"><?php  } ?>
		<?php  if(!empty($activity['var3'])) { ?><input type="hidden" name="<?php  echo $activity['var3'];?>" value="<?php  echo $_GPC[$activity['var3']];?>"><?php  } ?>
		<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
        <button class="weui_btn weui_btn_primary" name="submit" type="submit" id="showTool">立 即 提 交</button>
    </div>
</form>
</div>
	<div class="weui_msg">
		<div class="weui_extra_area">
			<a href="<?php  echo $this->createMobileUrl('mydayu_form', array('weid' => $_W['uniacid'], 'id' => $reid))?>"><i class="iconfont">&#xe622;</i> <?php  if(empty($activity['mname'])) { ?>我的表单<?php  } else { ?><?php  echo $activity['mname'];?><?php  } ?></a>
		</div>
	</div>
<?php  if($activity['smsid']!=0) { ?>
<script type="text/javascript">
		var wait=60;  
		function time(o) {
			if (wait == 0) {
				o.removeAttribute("disabled");
				o.value="获取验证码";
				wait = 60;
			} else {
				o.setAttribute("disabled", true);
				o.value="重新发送(" + wait + ")";
				wait--;  
				setTimeout(function() {
					time(o)
				},
            1000)
			}
		}
	$("#sendsms").bind("click",function(){
		var checktel = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/;
			if($.trim($(':input[name="mobile"]').val())=='' || !checktel.test($.trim($('input[name="mobile"]').val()))){
				$('#mobile').attr("readonly",false);
				$.toast("请输入正确的手机号码", "cancel");
				return false;
			}else{
				$('#mobile').attr('readonly',true);
				var submitData = {};
				$.post("<?php  echo murl('entry', array('do' => 'SendSms', 'id' => $activity['smsid'], 'm' => 'dayu_sms'), true, true)?>"+"&mobile="+$("#mobile").val(), submitData,function(data){
					if(data.message.state == 1) {
						$("#htel").val(data.message.mobile);
						$("#hsms").val(data.message.yzm);
						$.toast(data.message.msg, "success");
					}else{
						$.toast(data.message.msg, "cancel");
					}
				},"json");
				time(this);
			}
	});
</script>
<?php  } ?>
<script type="text/javascript">
	$('#form').submit(function(){
       var member = /^[\u4E00-\u9FA5]{1,6}$/;
			if($.trim($(':input[name="member"]').val())=='' || !member.test($.trim($('input[name="member"]').val()))){
				$.toast("请正确输入姓名", "cancel");
				return false;
			}
       var mobile = /^(((13[0-9]{1})|(14[7-9]{1})|(15[0-9]{1})|(17[0-9]{1})|(18[0-9]{1}))+\d{8})$/;
			if($.trim($(':input[name="mobile"]').val())=='' || !mobile.test($.trim($('input[name="mobile"]').val()))){
				$.toast("请输入正确的手机号码", "cancel");
				return false;
			}
		<?php  if($activity['smsid']!=0) { ?>
		var htel=$("#htel").val();
		var hsms=$("#hsms").val();
		var tel=$("#mobile").val();
		var sms=$("#sms").val();
		if(htel==tel){
			if(hsms==sms){
			}else{
				$.toast("请输入正确验证码", "cancel");
				return false;
			}
		}else{
			$.toast("请获取验证码", "cancel");
			return false;
		}
		<?php  } ?>
		<?php  if(!empty($activity['agreement'])) { ?>
		if (document.getElementById("agreement").checked == false){
			$.toast("请仔细阅读并同意<?php  echo $activity['agreement'];?>", "cancel");
			document.getElementById("agreement").focus();
			return false;
		}
		<?php  } ?>
		<?php  if($acredit > $mcredit) { ?>
			$.toast("<?php  echo $creditnames[$behavior['activity']]['title'];?>不足<?php  echo $activity['credit'];?>,不能提交", "cancel");
			return false;
		<?php  } ?>
		<?php  if(is_array($ds)) { foreach($ds as $fields) { ?>
		<?php  if($fields['essential']) { ?>
		<?php  if(in_array($fields['type'], array('text', 'calendar', 'email', 'radio', 'checkbox', 'select'))) { ?>
		if($.trim($(':text[name="field_<?php  echo $fields['refid'];?>_<?php  echo $fields['bind'];?>"]').val()) == '') {
			$.toast("<?php  echo $fields['title'];?> 不能为空", "cancel");
			return false;
		}
		<?php  } ?>
		<?php  if(in_array($fields['type'], array('radio'))) { ?>
		if($.trim($(':input[name="field_<?php  echo $fields['refid'];?>_<?php  echo $fields['bind'];?>"]').val()) == '') {
			$.toast("<?php  echo $fields['title'];?> 不能为空", "cancel");
			return false;
		}
		<?php  } ?>
		<?php  if(in_array($fields['type'], array('image'))) { ?>
		if($.trim($(':input[name="field_<?php  echo $fields['refid'];?>_<?php  echo $fields['bind'];?>"]').val()) == '') {
			$.toast("<?php  echo $fields['title'];?> 必须上传", "cancel");
			return false;
		}
		<?php  } ?>
		<?php  if(in_array($fields['type'], array('textarea'))) { ?>
		if($.trim($('textarea[name="field_<?php  echo $fields['refid'];?>_<?php  echo $fields['bind'];?>"]').val()) == '') {
			$.toast("<?php  echo $fields['title'];?> 必须填写", "cancel");
			return false;
		}
		<?php  } ?>
		<?php  if(in_array($fields['type'], array('number'))) { ?>
		var num = parseFloat($.trim($(':input[name="field_<?php  echo $fields['refid'];?>_<?php  echo $fields['bind'];?>"]').val()));
		if(isNaN(num)) {
			$.toast('<?php  echo $fields['title'];?> 必须输入数字.');
			return false;
		}
		<?php  } ?>
		<?php  if(in_array($fields['type'], array('email'))) { ?>
		var mail = $.trim($(':text[name="field_<?php  echo $fields['refid'];?>_<?php  echo $fields['bind'];?>"]').val());
		if(!(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/i).test(mail)) {
			$.toast("<?php  echo $fields['title'];?> 请正确邮箱地址", "cancel");
			return false;
		}
		<?php  } ?>
		<?php  } ?>
		<?php  } } ?>
		<?php  if($activity['isvoice']==1 && $activity['ivoice']==1) { ?>
			if($.trim($(':hidden[name="voice"]').val()) == '') {
				$.toast("请上传<?php  echo $activity['voice'];?>", "cancel");
				return false;
			}
		<?php  } ?>
		return true;
	});

</script>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('footers', TEMPLATE_INCLUDEPATH)) : (include template('footers', TEMPLATE_INCLUDEPATH));?>