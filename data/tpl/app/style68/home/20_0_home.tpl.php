<?php defined('IN_IA') or exit('Access Denied');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php  if($title) { ?><?php  echo $title;?><?php  } else { ?><?php  if(!empty($_W['account']['name'])) { ?><?php  echo $_W['account']['name'];?><?php  } ?><?php  } ?></title>
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<meta charset="utf-8">
<link type="text/css" rel="stylesheet" href="./resource/style/bootstrap.css">
<link type="text/css" rel="stylesheet" href="./resource/style/font-awesome.min.css" />
<link rel="stylesheet" href="./themes/style68/css/idangerous.swiper.css">
<link href="./themes/style68/css/iscroll.css" rel="stylesheet" type="text/css" />
<link href="./themes/style68/css/cate18_.css" rel="stylesheet" type="text/css" />
<style>

</style>

<script src="./themes/style68/js/iscroll.js" type="text/javascript"></script>
<script type="text/javascript">
var myScroll;

function loaded() {
myScroll = new iScroll('wrapper', {
snap: true,
momentum: false,
hScrollbar: false,
onScrollEnd: function () {
document.querySelector('#indicator > li.active').className = '';
document.querySelector('#indicator > li:nth-child(' + (this.currPageX+1) + ')').className = 'active';
}
 });
 
 
}

document.addEventListener('DOMContentLoaded', loaded, false);
</script>
 
</head>

<body id="cate18">

<script src="./themes/style68/js/audio.js" type="text/javascript"></script>

<div class="banner">
<div id="wrapper">
<div id="scroller">
<ul id="thelist">

<li><img src="<?php  if(empty($_W['styles']['indexbgimg'])) { ?>./themes/style68/img/bg.jpg<?php  } else { ?><?php  echo $_W['styles']['indexbgimg'];?><?php  } ?>"></li>


</ul>
</div>
</div>
    <div class="clr"></div>
</div>
<div class="device">
<a class="arrow-left" href="#"></a> 
<a class="arrow-right" href="#"></a>
<div class="swiper-container">
  <div class="swiper-wrapper">
    <div class="swiper-slide">
      <div class="content-slide">
      <?php  if(is_array($navs)) { foreach($navs as $i=>$nav) { ?>
      
        <a href="<?php  echo $nav['url'];?>">
          <?php  if(!empty($nav['icon'])) { ?>
          <p class="ico"><img src="<?php  echo $_W['attachurl'];?><?php  echo $nav['icon'];?>" /></p>
          <?php  } else { ?>
          <p class="ico <?php  echo $nav['css']['icon']['icon'];?>" style="<?php  echo $nav['css']['icon']['style'];?>">&nbsp;</p>
          <?php  } ?>
          <p class="title"><?php  echo $nav['name'];?></p>
        </a>
      
      <?php  if($i%8 == 7) { ?>
        </div>
        </div>
        <div class="swiper-slide">
          <div class="content-slide">
      <?php  } ?>
      <?php  } } ?>
      </div>
    </div>
  </div>
  <div class="pagination"></div>
</div>




<script type="text/javascript">
//对分享时的数据处理
function _removeHTMLTag(str) {
  str = str.replace(/<script[^>]*?>[\s\S]*?<\/script>/g,'');
  str = str.replace(/<style[^>]*?>[\s\S]*?<\/style>/g,'');
    str = str.replace(/<\/?[^>]*>/g,'');
    str = str.replace(/\s+/g,'');
    str = str.replace(/&nbsp;/ig,'');
    return str;
}
document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
  <?php
    $_share = array();
    $_share['title'] = (empty($title)) ? $_W['account']['name'] : $title;
    $_share['link'] = 'http://'.$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . '&wxref=mp.weixin.qq.com';
    $_share['img'] = $_W['siteroot'] . 'source/modules/' . $_GPC['name'] . '/icon.jpg';
  ?>
  var _share_img = $('body img:eq(0)').attr("src");
  if(typeof(_share_img) == "undefined") _share_img = "<?php  echo $_share['img'];?>";
  var _share_content = _removeHTMLTag($('body').html()).replace("<?php  echo $_share['title'];?>",'');

  window.shareData = {
    "imgUrl": _share_img,
    "timeLineLink": "<?php  echo $_share['link'];?>",
    "sendFriendLink": "<?php  echo $_share['link'];?>",
    "weiboLink": "<?php  echo $_share['link'];?>",
    "tTitle": "<?php  echo $_share['title'];?>",
    "tContent":  _share_content,
    "fTitle": "<?php  echo $_share['title'];?>",
    "fContent":  _share_content,
    "wContent":  "<?php  echo $_share['title'];?>"
  };

  // 发送给好友
  WeixinJSBridge.on('menu:share:appmessage', function (argv) {
    WeixinJSBridge.invoke('sendAppMessage', {
      "img_url": window.shareData.imgUrl,
      "img_width": "640",
      "img_height": "640",
      "link": window.shareData.sendFriendLink,
      "desc": window.shareData.fContent,
      "title": window.shareData.fTitle
    }, function (res) {
      _report('send_msg', res.err_msg);
    })
  });

  // 分享到朋友圈
  WeixinJSBridge.on('menu:share:timeline', function (argv) {
    WeixinJSBridge.invoke('shareTimeline', {
      "img_url": window.shareData.imgUrl,
      "img_width": "640",
      "img_height": "640",
      "link": window.shareData.timeLineLink,
      "desc": window.shareData.tContent,
      "title": window.shareData.tTitle
    }, function (res) {
      _report('timeline', res.err_msg);
    });
  });

  // 分享到微博
  WeixinJSBridge.on('menu:share:weibo', function (argv) {
    WeixinJSBridge.invoke('shareWeibo', {
      "content": window.shareData.wContent,
      "url": window.shareData.weiboLink
    }, function (res) {
      _report('weibo', res.err_msg);
    });
  });
}, false);
</script>



<script src="./themes/style68/js/jquery-1.10.1.min.js" type="text/javascript"></script>
  <script src="./themes/style68/js/idangerous.swiper-2.1.min.js" type="text/javascript"></script>
  <script>
  var mySwiper = new Swiper('.swiper-container',{
    pagination: '.pagination',
    loop:true,
    grabCursor: true,
    paginationClickable: true
  })
  $('.arrow-left').on('click', function(e){
    e.preventDefault()
    mySwiper.swipePrev()
  })
  $('.arrow-right').on('click', function(e){
    e.preventDefault()
    mySwiper.swipeNext()
  })
  </script>


<script>
var count = document.getElementById("thelist").getElementsByTagName("img").length;  

var count2 = document.getElementsByClassName("menuimg").length;
for(i=0;i<count;i++){
 document.getElementById("thelist").getElementsByTagName("img").item(i).style.cssText = " width:"+document.body.clientWidth+"px";

}
document.getElementById("scroller").style.cssText = " width:"+document.body.clientWidth*count+"px";

 setInterval(function(){
myScroll.scrollToPage('next', 0,400,count);
},3500 );
window.onresize = function(){ 
for(i=0;i<count;i++){
document.getElementById("thelist").getElementsByTagName("img").item(i).style.cssText = " width:"+document.body.clientWidth+"px";

}
 document.getElementById("scroller").style.cssText = " width:"+document.body.clientWidth*count+"px";
} 


</script>
 
 
 </div>
 
<div style="display:none"> </div>
 
</body>
</html>
