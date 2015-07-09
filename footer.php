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
			<div class="brand">
				<img src="<?php echo get_template_directory_uri() ?>/images/brand-pegasus.png" alt="Pegasus" class="pegasus">
				<img src="<?php echo get_template_directory_uri() ?>/images/brand-words.png" alt="Discover Connect Create" class="brand-words">
			</div>
		</footer>
		<?php wp_footer(); ?>
		<a class="scroll-top" href="#"><span class="glyphicon glyphicon-circle-arrow-up"></span><span class="text">Back to Top</span></a>
	</body>
</html>


