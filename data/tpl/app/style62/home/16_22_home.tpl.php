<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('header', TEMPLATE_INCLUDEPATH)) : (include template('header', TEMPLATE_INCLUDEPATH));?>

<div class="websiteWrapper landingWrapper"> 
  
  <ul class="mainMenuWrapper">    
      <?php  if(is_array($navs)) { foreach($navs as $i => $nav) { ?>
      <li><a href="<?php  echo $nav['url'];?>">
            <?php  if(!empty($nav['icon'])) { ?>
		<i style="background:url(<?php  echo $_W['attachurl'];?><?php  echo $nav['icon'];?>) no-repeat;background-size:cover;"></i>
		<?php  } else { ?>
		<i class="<?php  echo $nav['css']['icon']['icon'];?>" style="<?php  echo $nav['css']['icon']['style'];?>"></i>
		<?php  } ?>
            <?php  echo $nav['name'];?></a></li>
      <?php  } } ?>
  </ul>
  <div class="headerOuterWrapper">
    <div class="headerWrapper"> <a href="" class="mainMenuButton">
    <span>Menu</span></a></div>
  </div>
  <div class="pageWrapper landingPageWrapper"> 
    <span class="landingLogoWrapper"><img src="<?php  if(empty($_W['styles']['indexlogo'])) { ?>./themes/default/images/ico.png<?php  } else { ?><?php  echo $_W['styles']['indexlogo'];?><?php  } ?>" class="landingLogo" /></span> 
  </div>
  <div class="footerWrapper landingFooterWrapper"> 
    <a href=" " class="footerLogo"><img src="<?php  echo $_W['styles']['indexlogo'];?>" /></a> 
    <div class="footerSocialIconsWrapper"> 
    	<?php  if(empty($footer_off)) { ?><div id="footer">&copy;<?php  if(empty($_W['account']['name'])) { ?>微擎<?php  } else { ?>Copyright 2014. <?php  echo $_W['account']['name'];?><?php  } ?></div><?php  } ?>
    </div>
  </div>
</div>
</body>
</html>
