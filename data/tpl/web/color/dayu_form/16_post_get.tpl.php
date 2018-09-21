<?php defined('IN_IA') or exit('Access Denied');?>
		
        <div class="panel panel-default">
            <div class="panel-heading">自定义传参</div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">外部参数传入</label>
                    <div class="col-xs-12 col-sm-9">
					<div class="btn-group" data-toggle="buttons">					  
						<label class="btn btn-default <?php  if($activity['isget'] == 1) { ?>active<?php  } ?>"><input type="radio" name="isget" value="1" <?php  if($activity['isget'] == 1) { ?> checked="checked"<?php  } ?> >开启</label>
						<label class="btn btn-default <?php  if($activity['isget'] == 0) { ?>active<?php  } ?>"><input type="radio" name="isget" value="0" <?php  if(empty($activity) || $activity['isget'] == 0) { ?> checked="checked"<?php  } ?>>关闭</label>
					</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">外部参数1</label>
                    <div class="col-xs-12 col-sm-9">
                    <div class="input-group">
                    <span class="input-group-addon">标题</span><input type="text" name="var1t" class="form-control" value="<?php  echo $activity['var1t'];?>" />
                    <span class="input-group-addon">变量</span><input type="text" name="var1" class="form-control" value="<?php  echo $activity['var1'];?>" />
                    </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">外部参数2</label>
                    <div class="col-xs-12 col-sm-9">
                    <div class="input-group">
                    <span class="input-group-addon">标题</span><input type="text" name="var2t" class="form-control" value="<?php  echo $activity['var2t'];?>" />
                    <span class="input-group-addon">变量</span><input type="text" name="var2" class="form-control" value="<?php  echo $activity['var2'];?>" />
                    </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">外部参数3</label>
                    <div class="col-xs-12 col-sm-9">
                    <div class="input-group">
                    <span class="input-group-addon">标题</span><input type="text" name="var3t" class="form-control" value="<?php  echo $activity['var3t'];?>" />
                    <span class="input-group-addon">变量</span><input type="text" name="var3" class="form-control" value="<?php  echo $activity['var3'];?>" />
                    </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">链接地址</label>
                    <div class="col-xs-12 col-sm-9">
                    <input type="text" class="form-control" value="<?php  echo $links;?>" />
                    </div>
                </div>
			</div>
        </div>