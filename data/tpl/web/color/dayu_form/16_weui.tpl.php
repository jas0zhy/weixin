<?php defined('IN_IA') or exit('Access Denied');?>
  <div class="col-xs-6 col-sm-6 col-md-3 template_picker">
    <div class="thumbnail" style="text-align:center;width:140px;">
        <span style="display:block;white-space: nowrap;text-overflow:ellipsis; overflow:hidden">感谢云太</span>
      <div class="radio">
        <label>
          <input type="radio" name="skins" value="weui_yuntai" <?php  if($activity['skins'] == 'weui_yuntai') { ?> checked="checked"<?php  } ?>>
          选择
        </label>
      </div>
    </div>
  </div>
  <div class="col-xs-6 col-sm-6 col-md-3 template_picker">
    <div class="thumbnail" style="text-align:center;width:140px;" title="上传后压缩，拍照上传比较占带宽，不推荐">
        <span style="display:block;white-space: nowrap;text-overflow:ellipsis; overflow:hidden">WEUI上传后压缩</span>
      <div class="radio">
        <label>
          <input type="radio" name="skins" value="weuiup" <?php  if($activity['skins'] == 'weuiup') { ?> checked="checked"<?php  } ?>>
          选择
        </label>
      </div>
    </div>
  </div>
  <div class="col-xs-6 col-sm-6 col-md-3 template_picker">
    <div class="thumbnail" style="text-align:center;width:140px;" title="">
        <span style="display:block;white-space: nowrap;text-overflow:ellipsis; overflow:hidden">仿宝洁</span>
      <div class="radio">
        <label>
          <input type="radio" name="skins" value="weui_pg" <?php  if($activity['skins'] == 'weui_pg') { ?> checked="checked"<?php  } ?>>
          选择
        </label>
      </div>
    </div>
  </div>
  <div class="col-xs-6 col-sm-6 col-md-3 template_picker">
    <div class="thumbnail" style="text-align:center;width:140px;">
        <span style="display:block;white-space: nowrap;text-overflow:ellipsis; overflow:hidden">花花</span>
      <div class="radio">
        <label>
          <input type="radio" name="skins" value="weui_huahua" <?php  if($activity['skins'] == 'weui_huahua') { ?> checked="checked"<?php  } ?>>
          选择
        </label>
      </div>
    </div>
  </div>