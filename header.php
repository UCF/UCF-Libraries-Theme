<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Library Test
 * @since Library Test 1.0.0
 */
?><!DOCTYPE html>
<html>
	<head>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<meta name="viewport" content="width=device-width">
		<script type="text/javascript" id="ucfhb-script" src="//universityheader.ucf.edu/bar/js/university-header.js"></script>
		<?php wp_head(); ?> 
	</head>
	<body <?php body_class(); ?>>
	<header>
		<nav class="navbar navbar-library navbar-static-top" role="navigation">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button class="navbar-toggle" data-target=".navbar-collapse" data-toggle="collapse" type="button">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-text">Menu</span>
					</button>

				    <a class="navbar-brand" href="<?php bloginfo('url')?>"><?php bloginfo('name')?></a>
				</div> 
				  <!-- Collect the nav links, forms, and other content for toggling --> 
				    <?php /* Primary navigation */
						wp_nav_menu( array(
						  'menu' 				=> 'top_menu',
						  'depth'				=> 2,
						  'container'			=> 'div',
						  'container_class'		=> 'collapse navbar-collapse',
						  'menu_class' 			=> 'nav navbar-nav navbar-right',
						  'fallback_cb'      	=> 'wp_bootstrap_navwalker::fallback',
						  //Process nav menu using our custom nav walker
						  'walker' => new wp_bootstrap_navwalker())
						);
					?>
			  </div>
			</nav>
	</header>
