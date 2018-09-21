<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('header', TEMPLATE_INCLUDEPATH)) : (include template('header', TEMPLATE_INCLUDEPATH));?>
    

    <div class="html">
      <div class="stage" id="stage">
        <section id="sec-index">
          <div class="body">
          <div class="mod-slider slider-ver" id="index">
          	<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('slide', TEMPLATE_INCLUDEPATH)) : (include template('slide', TEMPLATE_INCLUDEPATH));?>
          </div>
		  </div>
        </section>

        
    <section class="mod-navLine navLine14">
      <div class="navLine-menu" id="navLine-menu">
        <ul class="p1">
          <li class="s1"><a>导航</a>
            <ul class="p2">
               <?php  if(is_array($navs)) { foreach($navs as $i => $nav) { ?>   
                <li class="s2">
                    <a href="<?php  echo $nav['url'];?>"><span><?php  echo $nav['name'];?></span></a>
                </li>
                  <?php  } } ?>
            </ul>
          </li>
        </ul>
      </div>
    </section>



        


      </div><!--.stage end-->
    </div><!--.html end-->
<script type="text/javascript">
      $(document).ready(function(){

                indexSwipe("index", ["幻灯片1", "幻灯片2.........", "幻灯片3.........", "幻灯片4........."]);      
 				 navLineSwipe=divSwipe("navLine-menu");

      });
    </script>

