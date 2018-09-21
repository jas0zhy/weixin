<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<style>
	/*门店列表页*/
	.shop-front{color:#606366; background:transparent url('resource/images/home-bg.jpg') no-repeat; background-size:100% 100%;}
	.shop-front .list-item{border-top:3px solid #5ac5d4; padding-bottom:10px; background:-webkit-gradient(linear,0 0, 0 10%,from(rgba(226,234,234,0.8)), to(rgba(226,234,234,0.8))) center bottom; -webkit-background-size: 100% 10px; background-repeat:no-repeat;}
	.shop-front .header a{font-size:20px; border-bottom:1px solid #56c6d6; color:#56c6d6;}
	.shop-front .list-item li{list-style:none; height:48px; line-height:48px;}
	.shop-front .list-item li a{display:inline-block; width:100%; height:100%; position:relative; padding:0 40px; text-decoration:none;}
	.shop-front li .icon{position:absolute; left:15px; font-size:20px; top:0; color:#56c6d6; display:inline-block; height:100%; line-height:47px;}
	.shop-front li .icon-right{position:absolute; right:15px; font-size:20px; top:0; display:inline-block; height:100%; line-height:47px;}
	.shop-front .list-item div li{border-bottom:1px solid #dddddd;}
	.shop-front .list-item div li a{color:#606366;}
	.shop-front .list-item .name a{padding-left:15px; font-weight:700; font-size:16px;}
	/*门店详情页*/
	.shop-front-detail .carousel-control.right,.shop-front-detail .carousel-control.left{background-image:none;}
	.shop-front-detail .carousel img{width:100%;}
	.shop-front-detail .detail-body{background:transparent url('resource/images/home-bg.jpg') no-repeat; background-size:100% 100%;}
	.shop-front-detail .nav-level{margin-bottom:12px;}
	.shop-front-detail .nav-level ul{width:100%; padding:10px 0;}
	.shop-front-detail .nav-level ul li{width:33%; display:inline-block; box-sizing:border-box; float:left; text-align:center;}
	.shop-front-detail .nav-level ul li+li{border-left:1px solid #ddd;}
	.shop-front-detail .nav-level ul li a .title-num{font-size: 16px !important; line-height:20px; color:#333 !important; margin:0;}
	.shop-front-detail .nav-level ul li a .title-info{font-size: 12px !important; line-height:20px; color:#333 !important; margin:0;}
	.mnav-box ul,.mnav-box ul li{padding:0; margin:0; font-family:Helvetica, Arial, sans-serif;}
	.mnav-box{color:#606366; border-top:1px solid #e5e5e5;}
	.mnav-box ul{border-top:10px solid #e4e9e8; list-style:none; background:transparent -webkit-gradient(linear,0 0, 0 10%,from(rgba(90,197,212,1)), to(rgba(90,197,212,1))) center top; -webkit-background-size:100% 2px; padding-top:2px; background-repeat:no-repeat;}
	.mnav-box ul:first-child{background:none; border-top:0; padding-top:0;}
	.mnav-box ul li{ border-bottom:1px solid #dddddd; position:relative; padding: 10px 15px;}
	.mnav-box ul #content{background:#fff; display:none;}
	.mnav-box ul #content h6{color:#56c6d6;}
	.mnav-box ul li .mnav-box-list{color:#606366; font-size:15px; text-decoration:none; -webkit-box-sizing:border-box; overflow:hidden;}
	.mnav-box ul li .mnav-box-list>span:first-child i{width:25px; margin-right:10px; color:#8dd1db; text-align:center; font-size:20px; }
	.mnav-box ul li .mnav-box-list .mnav-title{display:inline-block;}
	.mnav-box ul li .mnav-box-list > .pull-right{display:inline-block; font-size:22px; line-height:0; color:#888; position:absolute; right:15px; top:12px;}
	.mnav-box ul li .mnav-box-list .right{float:right;}
	.mnav-box ul li .mnav-box-list .right a{float:right;}
	.bg_fff{background:#FFF;}
</style>
<?php  if($do == 'display') { ?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('mc/header', TEMPLATE_INCLUDEPATH)) : (include template('mc/header', TEMPLATE_INCLUDEPATH));?>
<div class="shop-front">
	<div class="list">
		<?php  if(!empty($stores)) { ?>
			<?php  if(is_array($stores)) { foreach($stores as $store) { ?>
				<div class="list-item">
					<div>
						<li class="name"><a href="<?php  echo url('mc/store/detail', array('id' => $store['id']));?>"><?php  echo $store['business_name'];?><span class="icon-right"><i class="fa fa-angle-right"></i></span></a></li>
						<li class="add"><a href="javascript:;"><span class="icon"><i class="fa fa-location-arrow"></i></span>地址:<?php  echo $store['address'];?></a></li>
						<li class="tel"><a href="tel:<?php  echo $store['telephone'];?>"><span class="icon"><i class="fa fa-phone"></i></span>电话:<?php  echo $store['telephone'];?></a></li>
					</div>
				</div>
			<?php  } } ?>
		<?php  } else { ?>

		<?php  } ?>
	</div>
</div>
<?php  } else if($do == 'detail') { ?>
<div class="shop-front-detail">
	<?php  if(!empty($store['photo_list'])) { ?>
		<div id="banner" class="carousel slide clearfix" data-ride="carousel">
			<ol class="carousel-indicators pull-right">
				<?php  if(is_array($store['photo_list'])) { foreach($store['photo_list'] as $key => $photo) { ?>
					<li data-target="#banner" data-slide-to="<?php  echo $key;?>" <?php  if(!$key) { ?>class="active"<?php  } ?>></li>
				<?php  } } ?>
			</ol>
			<div class="carousel-inner" role="listbox">
				<?php  if(is_array($store['photo_list'])) { foreach($store['photo_list'] as $key => $photo) { ?>
					<div class="item <?php  if(!$key) { ?>active<?php  } ?>">
						<img src="<?php  echo tomedia($photo);?>" alt="">
					</div>
				<?php  } } ?>
			</div>
			<a class="left carousel-control" href="#banner" role="button" data-slide="prev">
				<span class="sr-only">上一张</span>
			</a>
			<a class="right carousel-control" href="#banner" role="button" data-slide="next">
				<span class="sr-only">下一张</span>
			</a>
		</div>
	<?php  } ?>
	<div class="detail-body">
		<div class="nav-level">
			<ul class="clearfix">
				<li>
					<a class="link clearfix" href="javascript:;">
						<p class="title-num"><?php  echo $store['category']['cate'];?>/<?php  echo $store['category']['sub'];?></p>
						<p class="title-info">类目</p>
					</a>
				</li>
				<li>
					<a class="link clearfix" href="javascript:;">
						<p class="title-num"><?php  echo $store['opentime'];?></p>
						<p class="title-info">营业时间</p>
					</a>
				</li>
				<li>
					<a class="link clearfix" href="javascript:;">
						<p class="title-num"><?php  echo $store['avg_price'];?>元</p>
						<p class="title-info">人均价格</p>
					</a>
				</li>
			</ul>
		</div>

		<div class="mnav-box clearfix">
			<ul>
				<li>
					<a class="mnav-box-list" href="javascript:;">
						<span class="mnav-title"><i class="fa fa-eye"></i>商家名</span>
						<span class="right"><?php  echo $store['business_name'];?></span>
					</a>
				</li>
				<?php  if(!empty($store['branch_name'])) { ?>
					<li>
						<a class="mnav-box-list" href="javascript:;">
							<span class="mnav-title"><i class="fa fa-eye"></i>分店名</span>
							<span class="right"><?php  echo $store['branch_name'];?></span>
						</a>
					</li>
				<?php  } ?>
				<li>
					<a class="mnav-box-list" href="tel:<?php  echo $store['telephone'];?>">
						<span class="mnav-title"><i class="fa fa-eye"></i>电话</span>
						<span class="right"><?php  echo $store['telephone'];?></span>
					</a>
				</li>
				<li>
					<a class="mnav-box-list" href="javascript:;">
						<span class="mnav-title"><i class="fa fa-eye"></i>地址</span>
						<span class="right"><?php  echo $store['province'];?><?php  echo $store['city'];?><?php  echo $store['district'];?></span>
					</a>
				</li>
				<li>
					<a class="mnav-box-list"  href="
						<?php  if(!empty($store['latitude']) && !empty($store['longitude'])) { ?>
							http://api.map.baidu.com/marker?location=<?php  echo $store['latitude'];?>,<?php  echo $store['longitude'];?>&title=<?php  echo urlencode('所在位置');?>&content=<?php  echo urlencode($store['address']);?>&output=html
						<?php  } else { ?>
							javascript:;
						<?php  } ?>
					">
						<span class="mnav-title"><i class="fa fa-eye"></i>详细位置</span>
						<span class="right"><?php  echo $store['address'];?> <i class="fa fa-angle-right"></i></span>
					</a>
				</li>
			</ul>
			<ul>
				<li>
					<a class="mnav-box-list">
						<span class="mnav-title"><i class="fa fa-eye"></i></span>
						特色服务
						<span class="pull-right"><i class="fa fa-angle-down"></i></span>
					</a>
				</li>
				<li class="bg_fff"><?php  echo $store['special'];?></li>
			</ul>
			<?php  if(!empty($store['recommend'])) { ?>
			<ul>
				<li>
					<a class="mnav-box-list">
						<span class="mnav-title"><i class="fa fa-eye"></i></span>
						推荐
						<span class="pull-right"><i class="fa fa-angle-down"></i></span>
					</a>
				</li>
				<li class="bg_fff"><?php  echo $store['recommend'];?></li>
			</ul>
			<?php  } ?>
			<?php  if(!empty($store['introduction'])) { ?>
			<ul>
				<li>
					<a class="mnav-box-list">
						<span class="mnav-title"><i class="fa fa-eye"></i></span>
						简介
						<span class="pull-right"><i class="fa fa-angle-down"></i></span>
					</a>
				</li>
				<li class="bg_fff"><?php  echo $store['introduction'];?></li>
			</ul>
			<?php  } ?>
		</div>
	</div>
</div>
<?php  } ?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('mc/footer', TEMPLATE_INCLUDEPATH)) : (include template('mc/footer', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>