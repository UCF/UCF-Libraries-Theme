<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage UCF Library 
 * @since UCF Library Theme
 */
?><!DOCTYPE html>
<html lang="en">
	<head>
		<title><?php wp_title( '', true, 'right' ); ?></title>
		<meta name="viewport" content="width=device-width">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="theme-color" content="#ffcc00">
		<link rel="icon" sizes="192x192" href="<?php echo get_stylesheet_directory_uri(); ?>/images/PegasusIcon.png">
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
		<script type="text/javascript" id="ucfhb-script" src="//universityheader.ucf.edu/bar/js/university-header.js?use-1200-breakpoint=1"></script>
		<?php wp_head(); ?> 
	</head>
	<body <?php body_class('library-body'); ?>>
		<header class="main-header">
			<nav class="navbar navbar-library navbar-expand-lg" role="navigation">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<a class="navbar-brand" href="<?php bloginfo('url')?>"><?php bloginfo('name')?></a>
						<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
					</div> 
					  <!-- Collect the nav links, forms, and other content for toggling --> 
					    <?php /* Primary navigation */
							wp_nav_menu( array(
							  'menu' 				=> 'Header Menu',
							  'depth'				=> 2,
							  'container'			=> 'div',
							  'container_class'		=> 'collapse navbar-collapse',
							  'menu_class' 			=> 'nav navbar-nav ms-auto mb-2 mb-lg-0',
							  'fallback_cb'      	=> 'wp_bootstrap_navwalker::fallback',
							  //Process nav menu using our custom nav walker
							  'walker' => new bootstrap_5_wp_nav_menu_walker())
							);
						?>
				  </div>
				</nav>
		</header>
