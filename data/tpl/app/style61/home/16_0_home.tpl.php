<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('header', TEMPLATE_INCLUDEPATH)) : (include template('header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('slide', TEMPLATE_INCLUDEPATH)) : (include template('slide', TEMPLATE_INCLUDEPATH));?>
<style>
body{
font:<?php  echo $_W['styles']['fontsize'];?> <?php  echo $_W['styles']['fontfamily'];?>;
color:<?php  echo $_W['styles']['fontcolor'];?>;
padding:0;
margin:0;
background-image:url('<?php  if(!empty($_W['styles']['indexbgimg'])) { ?><?php  echo $_W['styles']['indexbgimg'];?><?php  } ?>');
background-size:cover;
background-color:<?php  if(empty($_W['styles']['indexbgcolor'])) { ?>#000<?php  } else { ?><?php  echo $_W['styles']['indexbgcolor'];?><?php  } ?>;
<?php  echo $_W['styles']['indexbgextra'];?>
}
a{color:<?php  echo $_W['styles']['linkcolor'];?>; text-decoration:none;}
<?php  echo $_W['styles']['css'];?>
.box{width:100%;overflow:hidden;}
.box .box-item{float:left;text-align:center;display:block;text-decoration:none;outline:none;width:<?php  echo (100/3-0.5).'%';?>;height:80px;position:relative; color:#FFF;background:#337dc2;padding:5px 0; margin:0 0.5% 0.5% 0;}
.box .box-item i{display:inline-block;width:50px;height:50px;line-height:50px;font-size:35px;color:#FFF; overflow: hidden;}
.box .box-item span{color:<?php  echo $_W['styles']['fontnavcolor'];?>;display:block;font-size:14px; position:absolute; bottom:5px; width:100%;}
#footer{color:#FFF;}
</style>
<div class="box">
			<div class="cent-cent">
	          <div class="tu">
			  <?php  if(is_array($navs)) { foreach($navs as $k => $nav) { ?>
	          	<!-- 每个连接必须更改两个地址 -->
				<?php  if($k==0) { ?>
	          	<a href="<?php  echo $nav['url'];?>">
		          	<div class="nei gongsi">
		          		<span><?php  echo $nav['name'];?></span>
		          		<?php  if(!empty($nav['icon'])) { ?>
							<i style="background:url(<?php  echo $_W['attachurl'];?><?php  echo $nav['icon'];?>) no-repeat;background-size:cover;"></i>
							<?php  } else { ?>
							<i class="<?php  echo $nav['css']['icon']['icon'];?> mapsize"></i>
							<?php  } ?>
		          	</div>
	        	  </a>
				  <?php  } else if($k==1) { ?>
		          <a href="<?php  echo $nav['url'];?>">
		          	<div class="nei zixun">
		          		<span><?php  echo $nav['name'];?></span>
			          	<?php  if(!empty($nav['icon'])) { ?>
							<i style="background:url(<?php  echo $_W['attachurl'];?><?php  echo $nav['icon'];?>) no-repeat;background-size:cover;"></i>
							<?php  } else { ?>
							<i class="<?php  echo $nav['css']['icon']['icon'];?> mapsize"></i>
							<?php  } ?>
		          	</div>
		          </a>
				  <?php  } else if($k==2) { ?>
		          <a href="<?php  echo $nav['url'];?>">
		          		<div class="nei dianli">
			          		<span><?php  echo $nav['name'];?></span>
				          	<?php  if(!empty($nav['icon'])) { ?>
							<i style="background:url(<?php  echo $_W['attachurl'];?><?php  echo $nav['icon'];?>) no-repeat;background-size:cover;"></i>
							<?php  } else { ?>
							<i class="<?php  echo $nav['css']['icon']['icon'];?> mapsize"></i>
							<?php  } ?>
			          	</div>
		          </a>
				  <?php  } else if($k==3) { ?>
		          <a href="<?php  echo $nav['url'];?>">
		          		<div class="nei qiye">
			          		<span><?php  echo $nav['name'];?></span>
				          	<?php  if(!empty($nav['icon'])) { ?>
							<i style="background:url(<?php  echo $_W['attachurl'];?><?php  echo $nav['icon'];?>) no-repeat;background-size:cover;"></i>
							<?php  } else { ?>
							<i class="<?php  echo $nav['css']['icon']['icon'];?> mapsize"></i>
							<?php  } ?>
			          	</div>
		          </a>
				  <?php  } else if($k==4) { ?>
		           <a href="<?php  echo $nav['url'];?>">
		           		<div class="nei renli">
			          		<span><?php  echo $nav['name'];?></span>
				          	<?php  if(!empty($nav['icon'])) { ?>
							<i style="background:url(<?php  echo $_W['attachurl'];?><?php  echo $nav['icon'];?>) no-repeat;background-size:cover;"></i>
							<?php  } else { ?>
							<i class="<?php  echo $nav['css']['icon']['icon'];?> mapsize"></i>
							<?php  } ?>
			          	</div>
		           </a>
				   <?php  } else if($k==5) { ?>
		           <a href="<?php  echo $nav['url'];?>">
		          	 	<div class="nei gongzuo">
			          		<span><?php  echo $nav['name'];?></span>
				          	<?php  if(!empty($nav['icon'])) { ?>
							<i style="background:url(<?php  echo $_W['attachurl'];?><?php  echo $nav['icon'];?>) no-repeat;background-size:cover;"></i>
							<?php  } else { ?>
							<i class="<?php  echo $nav['css']['icon']['icon'];?> mapsize"></i>
							<?php  } ?>
			          	</div>
		           </a>
				  <?php  } ?>
					<!-- 每个链接必须更改两个地址 -->
		         
	<?php  } } ?>		
		<img class="ss" src="./themes/style61/images/index_17_bbg.png" border="0" usemap="#Map">	
		<div class="nei home">
			<img src="./themes/style61/images/logo.png">
		</div>
	</div>
				<!-- 热点地图 -->
				<map name="Map">
					<!-- 上面的A链接地址修改下边的A链接地址也要修改 -->

			  <area shape="poly" coords="13,51,62,78,75,67,97,58,98,3,72,5,38,20,13,52,13,52" href="#gongsijieshao">
			  <area shape="poly" coords="100,59,101,3,128,6,155,18,173,35,186,51,138,79,117,63" href="#zixunzhongxin">
			  <area shape="poly" coords="137,121,184,150,196,118,195,84,186,55,140,81,135,119" href="#">
			  <area shape="poly" coords="100,144" href="#"><area shape="poly" coords="99,145" href="#"><area shape="poly" coords="101,197,128,196,149,186,173,168,181,154,137,124,124,137,101,145" href="#qiyewenhua">
			  <area shape="poly" coords="62,125,16,152,39,179,68,195,95,197,96,145,76,137" href="#renliziyuan">
			  <area shape="poly" coords="61,79" href="#"><area shape="poly" coords="62,80,57,98,63,123,14,149,4,124,3,89,13,56" href="#gongzuodongtai">
			  <area shape="poly" coords="96,62" href="#"><area shape="poly" coords="99,62,80,69,71,76,60,95,65,120,72,130,86,137,95,139,105,139,118,137,126,128,130,116,135,101,135,87,129,76,114,65" href="#home">
			  </map>
				<!-- 热点地图 -->
</div>
	</div>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('footer', TEMPLATE_INCLUDEPATH)) : (include template('footer', TEMPLATE_INCLUDEPATH));?>