<?php defined('IN_IA') or exit('Access Denied');?><div ng-controller="navImgCtrl">
<?php  if($_GPC['iseditor']) { ?>
	<!--图片广告-->
	<div class="app-nav-edit">
		<div class="arrow-left"></div>
		<div class="inner">
			<div class="panel panel-default">
				<div class="panel-body form-horizontal">
					<div ng-repeat="item in activeItem.params.items">
						<div class="card nav-item clearfix">
							<div class="col-xs-3 img" ng-if="item.imgurl == ''">
								<span ng-click="changeItem(item)"><i class="fa fa-plus-circle green"></i>&nbsp;添加图片</span>
							</div>
							<div class="col-xs-3 img" ng-if="item.imgurl != ''">
								<h3 ng-click="changeItem(item)">重新上传</h3>
								<img ng-src="{{ item.imgurl }}">
							</div>
							<div class="col-xs-9">
								<div class="form-group">
									<label class="control-label col-xs-3">文字</label>
									<div class="col-xs-9">
										<input name="title" ng-model="item.title" class="form-control" typel="text" placeholder="文字" >
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-xs-3">链接</label>
									<div class="col-xs-9 form-control-static ">
										<div ng-my-linker ng-my-url="item.url" ng-my-title="item.title"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--end图片广告-->
<?php  } else { ?>
	<!--app图片广告-->
	<div class="app-nav">
		<div class="inner">
			<ul class="clearfix">
				<li ng-repeat="item in module.params.items">
					<a href="{{item.url}}">
						<span class="nav-img"><img ng-src="{{item.imgurl}}"></span>
						<span class="title" title="{{item.title}}">{{item.title}}</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<!--end图片广告-->
<?php  } ?>
</div>