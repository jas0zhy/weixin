<?php defined('IN_IA') or exit('Access Denied');?> 	<script type="text/javascript">
		require(['bootstrap']);
		$('.js-clip').each(function(){
			util.clip(this, $(this).attr('data-url'));
		});
	</script>

 </main>
   <!-- Footer -->
            <footer id="page-footer" class="content-mini content-mini-full font-s12 bg-gray-lighter clearfix">
                <div class="pull-right xright">
                    <?php  if(empty($_W['setting']['copyright']['footerleft'])) { ?>Powered by v<?php echo IMS_VERSION;?> &copy; 2014-2015 <?php  } else { ?><?php  echo $_W['setting']['copyright']['footerleft'];?><?php  } ?>
                </div>
                <div class="pull-left xleft">
                    <?php  if(empty($_W['setting']['copyright']['footerright'])) { ?><?php  } else { ?><?php  echo $_W['setting']['copyright']['footerright'];?><?php  } ?><?php  if(!empty($_W['setting']['copyright']['statcode'])) { ?>&nbsp; &nbsp; <?php  echo $_W['setting']['copyright']['statcode'];?><?php  } ?>
                </div>
            </footer>
            <!-- END Footer -->
        </div>

<script>       
        jQuery('[data-toggle="nav-submenu"]').on('click', function(e){
            var $link = jQuery(this);
            var $parentLi = $link.parent('li');
            if ($parentLi.hasClass('open')) {
                $parentLi.removeClass('open');
            } else { 
                $link
                    .closest('ul')
                    .find('> li')
                    .removeClass('open');
                $parentLi
                    .addClass('open');
            }

            if ($lHtml.hasClass('no-focus')) {
                $link.blur();
            }

            return false;
        });


</script>  

<script src="./resource/color/js/st.js"></script>
<script src="./resource/color/js/commonp.js"></script>
    </body>
</html>