		<footer class="main-footer">
			<div class="container">
        <nav>
  				<div class="row">
  					<?php /* Footer Navigation - Find */
  						wp_nav_menu( array(
  						  'theme_location'		=> 'footer-menu-find',
  						  'menu' 				=> 'Footer Menu Find',
  						  'depth'				=> 2,
  						  'container'			=> 'div',
  						  'container_class'		=> 'col-sm-3',
  						  'menu_class' 			=> 'Find',)
  						  // 'fallback_cb'      	=> 'wp_bootstrap_navwalker::fallback',
  						  //Process nav menu using our custom nav walker
  						  // 'walker' => new wp_bootstrap_navwalker())
  						);
  					?>
  					<?php /* Footer Navigation - Find */
  						wp_nav_menu( array(
  						  'theme_location'		=> 'footer-menu-services',
  						  'menu' 				=> 'Footer Menu Services',
  						  'depth'				=> 2,
  						  'container'			=> 'div',
  						  'container_class'		=> 'col-sm-3',
  						  'menu_class' 			=> 'Services',)
  						  // 'fallback_cb'      	=> 'wp_bootstrap_navwalker::fallback',
  						  //Process nav menu using our custom nav walker
  						  // 'walker' => new wp_bootstrap_navwalker())
  						);
  					?>
  					<?php /* Footer Navigation - About */
  						wp_nav_menu( array(
  						  'theme_location'		=> 'footer-menu-about',
  						  'menu' 				=> 'Footer Menu About',
  						  'depth'				=> 2,
  						  'container'			=> 'div',
  						  'container_class'		=> 'col-sm-3',
  						  'menu_class' 			=> 'About',)
  						  // 'fallback_cb'      	=> 'wp_bootstrap_navwalker::fallback',
  						  //Process nav menu using our custom nav walker
  						  // 'walker' => new wp_bootstrap_navwalker())
  						);
  					?>
  					<?php /* Footer Navigation - Help */
  						wp_nav_menu( array(
  						  'theme_location'		=> 'footer-menu-help',
  						  'menu' 				=> 'Footer Menu Help',
  						  'depth'				=> 2,
  						  'container'			=> 'div',
  						  'container_class'		=> 'col-sm-3',
  						  'menu_class' 			=> 'Help',)
  						  // 'fallback_cb'      	=> 'wp_bootstrap_navwalker::fallback',
  						  //Process nav menu using our custom nav walker
  						  // 'walker' => new wp_bootstrap_navwalker())
  						);
  					?>
  				</div>
        </nav>
			</div>
			<div class="social-btn-group">
        <a class="facebook-btn" href="https://www.facebook.com/ucflibrary/" target="_blank"><i class="fa fa-facebook-square"></i><span class="sr-only">Follow on Facebook</span></a>
        <!-- <a class="twitter-btn" href="https://twitter.com/UCFLibrary"  target="_blank"><i class="fa fa-twitter-square"></i><span class="sr-only">Follow on Twitter</span></a> -->
        <a class="instagram-btn"  href="https://www.instagram.com/ucflibraries/" target="_blank"><i class="fa fa-instagram"></i><span class="sr-only">Follow us on Instagram</span></a>
        <!-- <a class="tumblr-btn" href="http://ucflibrary.tumblr.com/" target="_blank"><i class="fa fa-tumblr-square"></i><span class="sr-only">Follow us on Tumblr</span></a> -->
        <a class="vimeo-btn"  href="https://vimeo.com/ucflibraries" target="_blank"><i class="fa fa-vimeo-square"></i><span class="sr-only">Follow us on Vimeo</span></a>
			</div>
			<div class="brand">
				<img src="<?php echo get_template_directory_uri() ?>/images/UILexternal_W_Libraries.png" alt="UCF Libraries"><br>
			</div>
			<p style="margin-top: 2em; text-align: center; color:#ccc;">Copyright ©<?php echo date("Y"); ?> UCF Libraries</p>
		</footer>
		<?php wp_footer(); ?>
		<a class="scroll-top" href="#"><span class="glyphicon glyphicon-circle-arrow-up"></span><span class="text">Back to Top</span></a>
		<div id="libchat_f2c66578fad19608e948deeac0560c14" style="border-color: #ffffff!important;
font-weight: bold;
font-family: 'Montserrat';"></div>
		<script>
			$('.Find').find('a').first().prepend('<span class="glyphicon glyphicon-search"></span> ');
			$('.Services').find('a').first().prepend('<span class="glyphicon glyphicon-education"></span> ');
			$('.About').find('a').first().prepend('<span class="glyphicon glyphicon-info-sign"></span> ');
			$('.Help').find('a').first().prepend('<span class="glyphicon glyphicon-question-sign"></span> ');
		</script>
	</body>
</html>


