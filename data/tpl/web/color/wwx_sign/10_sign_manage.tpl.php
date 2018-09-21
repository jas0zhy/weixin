<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>

<div class="main">
<ul class="nav nav-tabs">
<li<?php  if($operation== 'display') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('Sign');?>">签到管理</a></li>
<li<?php  if($operation == 'post') { ?> class="active"<?php  } ?>> <a href="<?php  echo create_url('platform/reply/post',array('m'=>'wwx_sign'));?>">添加签到</a></li>
<li<?php  if($do== 'analyse') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('Analyse');?>">签到统计</a></li>
</ul>

<div class="panel panel-default">
<div class="panel-heading">全部活动</div>
<div style="padding:15px;">
        <table class="table table-hover">
            <thead class="navbar-inner">
                <tr>
                    <th style="width:200px;">活动名称</th>
                    <th>活动开始时间</th>
                    <th>活动结束时间</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <?php  if(is_array($list)) { foreach($list as $row) { ?>
                <tr>
                    <td><?php  echo $row['title'];?></td>
                    <td><?php  echo date("Y-m-d  H:i", $row['starttime'])?></td>
                    <td><?php  echo date("Y-m-d H:i",$row['endtime'])?></td>
                    <td >
<a href="<?php  echo $this->createWebUrl('SignUser', array('sid'=>$row['id']))?>" class="btn" rel="tooltip" title="签到用户"><i class="glyphicon glyphicon-user"></i>签到用户</a>
<a class="btn" rel="tooltip" href="<?php  echo create_url('platform/reply/post', array( 'm' => 'wwx_sign','rid'=>$row['rid']))?>" title="编辑"><i class="glyphicon glyphicon-edit"></i>编辑</a>
<a href="<?php  echo $this->createWebUrl('sign', array( 'id' => $row['id'], 'op' => 'delete'))?>" onclick="return confirm('此操作不可恢复，确认删除？');return false;" title="删除" class="btn btn-small"><i class="glyphicon glyphicon-remove"></i>删除</a>
                    </td>
                </tr>
                <?php  } } ?>
            </tbody>
        </table>
        <?php  echo $pager;?>
    </div>
</div>




</div>
<script>
            $(function(){

            $(".check_all").click(function(){
            var checked = $(this).get(0).checked;
                    $("input[type=checkbox]").attr("checked", checked);
            });
                    $("input[name=deleteall]").click(function(){

            var check = $("input:checked");
                    if (check.length < 1){
            err('请选择要删除的记录!');
                    return false;
            }
            if (confirm("确认要删除选择的记录?")){
            var id = new Array();
                    check.each(function(i){
                    id[i] = $(this).val();
                    });
                    $.post('<?php  echo $this->createWebUrl('deleteAll')?>', {idArr:id}, function(data){
                    if (data.errno == 0)
                    {
                    location.reload();
                    } else {
                    alert(data.error);
                    }


                    }, 'json');
            }

            });
                    });</script>
<script>
            function drop_confirm(msg, url){
            if (confirm(msg)){
            window.location = url;
            }
            }
</script>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>