<?php defined('IN_IA') or exit('Access Denied');?></div>
<?php  $bottommenu = $_W['quickmenu']['menus'];?>
<div style="clear:both;background:url(./themes/style61/images/1385546616.jpg) center top no-repeat;width:100%;height:40px;position:fixed;bottom:0;left:0;">
	<?php  if(is_array($bottommenu)) { foreach($bottommenu as $k => $v) { ?>
		<a class="bottomlink" href="<?php  echo $v['url'];?>"><?php  if(!empty($v['icon'])) { ?>
							<i style="background:url(<?php  echo $_W['attachurl'];?><?php  echo $v['icon'];?>) no-repeat;background-size:cover;"></i>
							<?php  } else { ?>
							<i class="<?php  echo $v['css']['icon']['icon'];?> mapsize"></i>
							<?php  } ?><?php  echo $v['name'];?></a>
	<?php  } } ?>
</div>
<script type="text/javascript" src="./themes/style61/js/default.js"></script>
</body>
</html>
