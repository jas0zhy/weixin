<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('weheader', TEMPLATE_INCLUDEPATH)) : (include template('weheader', TEMPLATE_INCLUDEPATH));?>
<?php  if($reside) { ?>
<script src="<?php echo MODULE_URL;?>template/weui/js/city-picker.min.js"></script>
<?php  } ?>
    <script>
	$(function(){
     var element = $("div[class='new-comment-content']");
     var temp =  element.text().replace(/\n/g,'<br/>');
     element.html(temp);
});
    </script>
<style>
body{background-color:#fbf9ff;background-image: url(<?php echo MODULE_URL;?>template/weui/images/pg/pgbg.jpg);background-position: top center;background-repeat: no-repeat;background-attachment: fixed;background-size: 100% auto;}
.weui-header .weui-header-left,.weui-header .weui-header-right{top: 5px;}
.dayu-header {padding: 25px 0 0;}

.weui_textarea_counter span {font-size:12px;}
.weui_label span{color: #E64340;}
.weui-popup-container{z-index:9999;}
.weui_cell_select .weui_cell_td {padding-left: 1em;}
.weui_cell_select .weui_cell_hd .weui_select {line-height:45px;padding:0 25px 0 5px;color: #555;}

.weui_extra_area {z-index:0;}
.record .weui_cells:first-child {margin-top:30px;}
.record .weui_cells {margin:0;}
.record img{width:1.2rem;height:1.2rem;}

.a_btn{box-sizing: border-box; margin: 0px 5px 0px 0px; padding: 0px; width:68px;vertical-align: middle; line-height: 28px; text-align: center; color:#fff; display: inline-block; background-image: url(<?php echo MODULE_URL;?>template/weui/images/pg/top_btn_bg.png); background-attachment: initial; background-size: 68px auto; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: no-repeat;}
.up_border{box-sizing: border-box; margin: 0 auto; padding: 0px; border: 3px solid rgb(255, 255, 255);width: 100%;height:85px; border-radius: 8px; position: relative; z-index: 1;}
.a_border{box-sizing: border-box; margin: 0px; padding: 0px; border-width: 0px 3px 3px 0px; border-right-style: solid; border-bottom-style: solid; border-right-color: rgba(255, 255, 255, 0.498039); border-bottom-color: rgba(255, 255, 255, 0.498039); vertical-align: baseline; -webkit-tap-highlight-color: transparent; outline: none; width: 80%; height: 80px; border-radius: 0.15625rem; position: absolute; right: 10px; top: 15px;}
.weui_input, .weui_select{text-align:left;color:#0d85c6;padding:2px 5px;}
.weui_label{color:#000;}
.weui_cell{width:75%;margin:0 auto;padding: 5px 15px;}
.weui_cell:before {height: 0px;border-top: 0px solid #D9D9D9;}
.weui_input {background-color:#fff;border: 1px solid #0d85c6;}

.upt{padding:0;height:2px;line-height:1px;margin:0;}

.weui-popup-modal {background-color: transparent;}
</style>
    <div class="weui_tab_bd">

<div class="weui_cells_title">
<div class="right">
    <a class="a_btn f12 open-popup" href="javascript:;" data-target="#popup">活动详情</a>
	<a href="<?php  echo $this->createMobileUrl('mydayu_form', array('weid' => $_W['uniacid'], 'id' => $reid))?>" class="a_btn f12">我的记录</a>
</div>
</div>
<div class="weui_cells_title"><img src="<?php  echo $activity['thumb'];?>" class="img-resp center"></div>

	<div id="popup" class="weui-popup-container" style="background-color: rgba(0, 0, 0, 0.6);">
		<div class="weui-popup-modal">
		
		<div style="width:100%;margin:80px auto 0;position: relative;">
		<div style="position:absolute;top:-4rem;"><img src="<?php echo MODULE_URL;?>template/weui/images/pg/xq_top.png" class="img-resp"></div>
		<div style="position:absolute;top:-4rem;right:10px;"><a href="javascript:;" class="close-popup"><img src="<?php echo MODULE_URL;?>template/weui/images/pg/close.png" class="img-resp" style="width:45px;height:45px;"></a></div>
			<section style="width:85%;background-color:#fff;margin:0 auto;padding:2.5rem 0 0 0;">
				<?php  if(!empty($activity['agreement'])) { ?><h4 class="ui-page-title f16 tcenter"><?php  echo $activity['agreement'];?></h4><?php  } ?>
				<div class="weui-popup-bd f14"><?php  echo htmlspecialchars_decode($activity['content'])?></div>
			</section>
			<p class="p"><a href="javascript:;" class="weui_btn bg-blue close-popup">关闭</a></p>
		</div>
		</div>
	</div>
<form action="<?php  echo $this->createMobileUrl('dayu_form', array('weid' => $_W['uniacid'], 'id' => $reid))?>" class="" enctype="multipart/form-data" method="POST" id="form">
<input type="hidden" name="repeat" value="<?php  echo md5(sha1(time())); ?>">

<?php  if($activity['paixu']==0) { ?>
<div class="weui_cells_form">
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
	
<div class="weui_cells_form">
				<?php  if(is_array($ds)) { foreach($ds as $fields) { ?>
				
		<?php  if($fields['type'] == 'text') { ?>
	<div class="weui_cell">
		<div class="weui_cell_hd"><label class="weui_label"><?php  echo $fields['title'];?><?php  if($fields['essential']) { ?><span>*</span><?php  } ?></label></div>
		<div class="weui_cell_bd weui_cell_primary">
		<?php  if($fields['bind'] == 'birth') { ?>
			<input class="weui_input" name="field_<?php  echo $fields['refid'];?>_<?php  echo $fields['bind'];?>" type="text" value="<?php  echo $profile['birthyear'];?>-<?php  echo $profile['birthmonth'];?>-<?php  echo $profile['birthday'];?>" placeholder="<?php  echo $fields['tixing'];?>" <?php  if($fields['essential']) { ?>required<?php  } ?>>
		<?php  } else { ?>
			<input class="weui_input" name="field_<?php  echo $fields['refid'];?>_<?php  echo $fields['bind'];?>" type="text" value="<?php  echo $fields['default'];?><?php  echo $profile[$fields['bind']];?>" placeholder="<?php  echo $fields['tixing'];?>" <?php  if($fields['essential']) { ?>required<?php  } ?>>
		<?php  } ?>
		</div>
		<div class="weui_cell_ft"></div>
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
        <div class="weui_cell_hd"><label for="date" class="weui_label"><?php  echo $fields['title'];?><?php  if($fields['essential']) { ?><span>*</span><?php  } ?>：</label></div>
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

    <div class="weui_cells_form">
        <div class="weui_cell">
            <div class="weui_cell_bd weui_cell_primary">
                <div class="weui_uploader">
                    <div class="weui_uploader_bd up_border" id="<?php  echo $fields['refid'];?>" style="">
                        <ul class="weui_uploader_files">   
                            <input type="hidden" name="field_<?php  echo $fields['refid'];?>_<?php  echo $fields['bind'];?>" accept="image/*" capture="camera" value="" />                        
                            <image class="img-resp weui_uploader_status" id="show<?php  echo $fields['refid'];?>" src="<?php  echo tomedia($fields['image'])?>" />
                        </ul>
                    </div>
					<div class="a_border"></div>
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
					<input class="weui_input" type="text" name="field_<?php  echo $fields['refid'];?>_<?php  echo $fields['bind'];?>" value="<?php  echo $profile['resideprovince'];?> <?php  echo $profile['residecity'];?> <?php  echo $profile['residedist'];?>." placeholder="<?php  echo $fields['tixing'];?>" id="<?php  echo $fields['refid'];?>"/>
				</div>
		</div>
    <script>
	$("#<?php  echo $fields['refid'];?>").cityPicker({
		title: "<?php  echo $fields['title'];?>",
        value: ['<?php  echo $profile['resideprovince'];?> <?php  echo $profile['residecity'];?> <?php  echo $profile['residedist'];?>']
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
		
    <div style="box-sizing: border-box; margin: 0px auto; padding: 5px; border: 0px; vertical-align: baseline; -webkit-tap-highlight-color: transparent; outline: none; width: 60%; line-height: 1.25rem; display: block; text-align: center; border-radius: 25px;background-image: -webkit-linear-gradient(left, rgb(245, 224, 156), rgb(226, 181, 74), rgb(245, 224, 156)); background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;">
		<?php  if(!empty($activity['var1'])) { ?><input type="hidden" name="<?php  echo $activity['var1'];?>" value="<?php  echo $_GPC[$activity['var1']];?>"><?php  } ?>
		<?php  if(!empty($activity['var2'])) { ?><input type="hidden" name="<?php  echo $activity['var2'];?>" value="<?php  echo $_GPC[$activity['var2']];?>"><?php  } ?>
		<?php  if(!empty($activity['var3'])) { ?><input type="hidden" name="<?php  echo $activity['var3'];?>" value="<?php  echo $_GPC[$activity['var3']];?>"><?php  } ?>
		<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
	<button style="color:#8a5000;box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-size: 20px; vertical-align: baseline; width: 100%; height: 36px; line-height: 1rem; display: block; border-radius: 18px; background-image: -webkit-linear-gradient(left, rgb(226, 181, 74), rgb(245, 224, 156), rgb(226, 181, 74)); background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;">火速上传小票</button>
	</div>
    </div>
</form>
    <div class="weui_cells_form">
        <div class="weui_cell">
            <div class="weui_cell_bd weui_cell_primary">
                <div class="weui_uploader">
                    <div class="weui_uploader_bd up_border" style="height:150px;background-image: url(<?php echo MODULE_URL;?>template/weui/images/pg/mingdan_title.png);background-position: 5px 0;background-repeat: no-repeat;background-size: 38px auto;">
						<div id="colee" style="overflow:hidden;height:150px;width:auto;margin-left:50px;">
                        <div id="colee1">
                        <div class="new-comment-content">						
						<p style="upt"></p>
						<?php  echo $activity['description'];?>
						<p style="upt"></p>
                        </div>
                        </div>
						<div id="colee2"></div>
                    </div>
                </div>
					<div class="a_border" style="height:145px;"></div>
            </div>
        </div>
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
<script>
var speed=30;
var colee2=document.getElementById("colee2");
var colee1=document.getElementById("colee1");
var colee=document.getElementById("colee");
colee2.innerHTML=colee1.innerHTML; //克隆colee1为colee2
function Marquee1(){
//当滚动至colee1与colee2交界时
if(colee2.offsetTop-colee.scrollTop<=0){
 colee.scrollTop-=colee1.offsetHeight; //colee跳到最顶端
 }else{
 colee.scrollTop++
}
}
var MyMar1=setInterval(Marquee1,speed)//设置定时器
//鼠标移上时清除定时器达到滚动停止的目的
colee.onmouseover=function() {clearInterval(MyMar1)}
//鼠标移开时重设定时器
colee.onmouseout=function(){MyMar1=setInterval(Marquee1,speed)}
</script>
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