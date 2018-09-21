<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?><style>    .table td span{display:inline-block;}    .table td input{margin-bottom:0;}	h4{padding:3px 0;margin:0;}
</style>
<script type="text/javascript">
    $(function() {
        $(".main").delegate("span.switch", "click", function() {            var sw;            var a = $(this).find("i");            var reid = $(this).attr("value");            if (a.attr("class") == 'fa fa-play') {                a.attr("class", "fa fa-stop");                a.parent().attr("title", "关闭");                sw = '1';            } else {
                a.attr("class", "fa fa-play");                a.parent().attr("title", "开启");                sw = '0';            }            $.post(location.href, {'reid': reid, 'switch': sw}, function(dat) {            });        });    });
</script>
<ul class="nav nav-tabs">
    <li class="active"><a href="<?php  echo $this->createWebUrl('display')?>">表单列表</a></li>
    <li><a href="<?php  echo $this->createWebUrl('post')?>">新建表单</a></li>
</ul>
<div class="main">    <div class="panel panel-info">	<div class="panel-heading">筛选</div>	<div class="panel-body">		<form action="./index.php" method="get" class="form-horizontal" role="form">			<input type="hidden" name="c" value="site" />			<input type="hidden" name="a" value="entry" />        	<input type="hidden" name="m" value="dayu_form" />        	<input type="hidden" name="do" value="display" />			<div class="form-group">				<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">状态</label>				<div class="col-xs-12 col-sm-8 col-lg-9">					<select name="status" class='form-control'>                      	<option value="1" <?php  if($_GPC['status'] == '1') { ?> selected<?php  } ?>>启用</option>                     	<option value="0" <?php  if($_GPC['status'] == '0') { ?> selected<?php  } ?>>禁用</option>                     </select>				</div>			</div>
            <div class="form-group">				<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">关键字</label>				<div class="col-xs-12 col-sm-8 col-lg-9">					<input class="form-control" name="keyword" id="" type="text" value="<?php  echo $_GPC['keyword'];?>">				</div>                <div class=" col-xs-12 col-sm-2 col-lg-2">                	<button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>                </div>			</div>		</form>	</div></div><form action="" method="post"><div class="clearfix template">	<div class="panel panel-default">		<div class="panel-body table-responsive">            <table class="table table-hover">                <thead class="navbar-inner">                    <tr>                        <th class="text-center" style="width:70px;">复制</th>                        <th>表单名称</th>                        <th class="text-center">链接(点击复制)</th>                        <th class="text-center" style="width:55px;">关注</th>                        <th class="text-center" style="width:55px;">封面</th>                        <th class="text-center" style="width:55px;">录音</th>                        <th class="text-center" style="width:80px;">语音答复</th>                        <th style="width:350px; text-align:right;">操作</th>                    </tr>                </thead>                <tbody>                <?php  if(is_array($ds)) { foreach($ds as $row) { ?>                    <tr>                        <td><a href="<?php  echo $this->createWebUrl('display', array('op' => 'copy', 'id' => $row['reid']))?>" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="bottom" title="复制此表单的所有设置到新表单"><i class="fa fa-copy"></i> 复制</a></td>                        <td><a href="<?php  echo $this->createWebUrl('manage', array('id' => $row['reid']))?>"><h4><?php  echo $row['title'];?></h4></a><small style="font-weight:normal;display:block;"><?php  if($row['isstart']) { ?><?php  echo date('Y.m.d', $row['starttime'])?>-<?php  echo date('Y.m.d', $row['endtime'])?><?php  } else { ?>未开始<?php  } ?></small></td>                        <td class="manage-menu text-center" style="position:relative;">							<span><a class="js-clip" href="javascript:;" data-url="<?php  echo $row['link'];?>">提交页面</a></span>							<?php  if($row['field']) { ?><span><a class="js-clip" href="javascript:;" data-url="<?php  echo $row['record'];?>">记录显示</a></span><?php  } ?>							<span><a class="js-clip" href="javascript:;" data-url="<?php  echo $row['mylink'];?>">用户记录</a></span>						</td>						<td class="text-center"><?php  echo $row['follow'];?></td>						<td class="text-center"><?php  echo $row['isthumb'];?></td>						<td class="text-center"><?php  echo $row['isvoice'];?></td>						<td class="text-center"><?php  echo $row['isrevoice'];?></td>                        <td style="text-align:right;">                            <a href="<?php  echo $this->createWebUrl('RecordSet', array('reid' => $row['reid']))?>" class="btn btn-sm <?php  if($row['field']) { ?>btn-primary<?php  } else { ?>btn-default<?php  } ?>" data-toggle="tooltip" data-placement="bottom" title="前台显示用户提交的记录 已完成状态"><i class="fa fa-list"></i> 显示</a>                            <a href="<?php  echo $this->createWebUrl('staff', array('op' => 'list','reid' => $row['reid']))?>" class="btn btn-sm <?php  if(!empty($row['kfid'])) { ?>btn-primary<?php  } else { ?>btn-default<?php  } ?>" data-toggle="tooltip" data-placement="bottom" title="通知功能 微信端管理员设置"><i class="fa fa-group"></i> 客服</a>                            <a href="<?php  echo $this->createWebUrl('manage', array('id' => $row['reid']))?>" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="bottom" title="表单记录"><i class="fa fa-search"></i> 记录</a>                            <a href="<?php  echo $this->createWebUrl('post', array('id' => $row['reid']))?>" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="bottom" title="编辑"><i class="fa fa-edit"></i> 修改</a>                            <span class="btn btn-default btn-sm switch" data-toggle="tooltip" data-placement="bottom" value="<?php  echo $row['reid'];?>" <?php  if($row['switch'] == 0) { ?>title="开启"><i class="fa fa-play"></i><?php  } else { ?>title="关闭"><i class="fa fa-stop"></i><?php  } ?></span>                            <a href="<?php  echo $this->createWebUrl('delete', array('id' => $row['reid']))?>" onclick="return confirm('删除表单将删除所有关联的表单记录，确认吗？'); return false;" class="btn  btn-default btn-sm" data-toggle="tooltip" data-placement="bottom" title="删除"><i class="fa fa-remove"></i></a>                        </td>                    </tr>
                <?php  } } ?>                </tbody>            </table>		</div>    </div></div></form></div><script>	require(['bootstrap'],function($){		$('.btn').hover(function(){			$(this).tooltip('show');		},function(){			$(this).tooltip('hide');		});	});</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>