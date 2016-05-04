		<footer>
			<div class="container">
				<div class="row">
					<?php /* Footer Navigation - Find */
						wp_nav_menu( array(
						  'theme_location'		=> 'footer-menu-find',
						  'menu' 				=> 'Footer Menu Find',
						  'depth'				=> 2,
						  'container'			=> 'div',
						  'container_class'		=> 'col-sm-3',
						  'menu_class' 			=> 'Find',
						  'fallback_cb'      	=> 'wp_bootstrap_navwalker::fallback',
						  //Process nav menu using our custom nav walker
						  'walker' => new wp_bootstrap_navwalker())
						);
					?>
					<?php /* Footer Navigation - Find */
						wp_nav_menu( array(
						  'theme_location'		=> 'footer-menu-services',
						  'menu' 				=> 'Footer Menu Services',
						  'depth'				=> 2,
						  'container'			=> 'div',
						  'container_class'		=> 'col-sm-3',
						  'menu_class' 			=> 'Services',
						  'fallback_cb'      	=> 'wp_bootstrap_navwalker::fallback',
						  //Process nav menu using our custom nav walker
						  'walker' => new wp_bootstrap_navwalker())
						);
					?>
					<?php /* Footer Navigation - About */
						wp_nav_menu( array(
						  'theme_location'		=> 'footer-menu-about',
						  'menu' 				=> 'Footer Menu About',
						  'depth'				=> 2,
						  'container'			=> 'div',
						  'container_class'		=> 'col-sm-3',
						  'menu_class' 			=> 'About',
						  'fallback_cb'      	=> 'wp_bootstrap_navwalker::fallback',
						  //Process nav menu using our custom nav walker
						  'walker' => new wp_bootstrap_navwalker())
						);
					?>
					<?php /* Footer Navigation - Help */
						wp_nav_menu( array(
						  'theme_location'		=> 'footer-menu-help',
						  'menu' 				=> 'Footer Menu Help',
						  'depth'				=> 2,
						  'container'			=> 'div',
						  'container_class'		=> 'col-sm-3',
						  'menu_class' 			=> 'Help',
						  'fallback_cb'      	=> 'wp_bootstrap_navwalker::fallback',
						  //Process nav menu using our custom nav walker
						  'walker' => new wp_bootstrap_navwalker())
						);
					?>
				</div>
			</div>
			<div class="social-btn-group">
        <a class="facebook-btn" title="Follow us on Facebook" href="https://www.facebook.com/ucflibrary/" target="_blank"><i class="fa fa-facebook-square"></i><span class="sr-only">Follow on Facebook</span></a>
        <a class="twitter-btn" title="Follow us on Twitter" href="https://twitter.com/UCFLibrary"  target="_blank"><i class="fa fa-twitter-square"></i><span class="sr-only">Follow on Twitter</span></a>
        <a class="instagram-btn" title="Follow us on Instagram" href="https://www.instagram.com/ucflibrary/" target="_blank"><i class="fa fa-instagram"></i><span class="sr-only">Follow us on Instagram</span></a>
        <a class="youtube-btn" title="Follow us on YouTube" href="https://www.youtube.com/user/UCFLibraries" target="_blank"><i class="fa fa-youtube-square"></i><span class="sr-only">Follow us on YouTube</span></a>
        <a class="gplus-btn" title="Follow us on Google+" href="https://plus.google.com/+UCFLibraries" target="_blank"><i class="fa fa-google-plus-square"></i><span class="sr-only">Follow us on Google+</span></a>
			</div>
			<div class="brand">
				<img src="<?php echo get_template_directory_uri() ?>/images/libraries-word-mark.png" alt="UCF Libraries"><br>
			</div>
			<p style="margin-top: 2em; text-align: center; color:#ccc;">Copyright ©<?php echo date("Y"); ?> UCF Libraries</p>
		</footer>
		<?php wp_footer(); ?>
		<a class="scroll-top" href="#"><span class="glyphicon glyphicon-circle-arrow-up"></span><span class="text">Back to Top</span></a>
	</body>
</html>


