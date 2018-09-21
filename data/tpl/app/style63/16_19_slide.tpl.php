<?php defined('IN_IA') or exit('Access Denied');?><ul class="slider-list">

	<?php  $slide = modulefunc('site', 'site_slide_search', array (
  'func' => 'site_slide_search',
  'limit' => '4',
  'item' => 'row',
  'assign' => 'slide',
  'index' => 'iteration',
  'multiid' => 19,
  'uniacid' => 16,
  'acid' => 0,
)); if(is_array($slide)) { $i=0; foreach($slide as $i => $row) { $i++; $row['iteration'] = $i; ?>
            <li>
                <img src="<?php  echo $row['thumb'];?>" />
            </li>
	<?php  } } ?>
</ul>    