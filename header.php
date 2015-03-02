<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Library Test
 * @since Library Test 1.0
 */
?><!DOCTYPE html>
<html>
	<head>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" src="http://normalize-css.googlecode.com/svn/trunk/normalize.css" />
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
		<script type="text/javascript" id="ucfhb-script" src="//universityheader.ucf.edu/bar/js/university-header.js"></script>
		<?php wp_head(); ?> 
	</head>
	<body <?php body_class(); ?>>
	<header>
		<div class="container">
			<nav class="navbar" role="navigation"> 
				<div class="container">
				<!-- Brand and toggle get grouped for better mobile display --> 
				  <div class="navbar-header"> 
				    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"> 
				      <span class="sr-only">Toggle navigation</span> 
				      <span class="icon-bar"></span> 
				      <span class="icon-bar"></span> 
				      <span class="icon-bar"></span> 
				    </button> 
				    <a class="navbar-brand" href="<?php bloginfo('url')?>"><?php bloginfo('name')?></a>
				  </div> 
				  <!-- Collect the nav links, forms, and other content for toggling --> 
				  <div class="collapse navbar-collapse navbar-ex1-collapse"> 
				    <?php /* Primary navigation */
						wp_nav_menu( array(
						  'menu' => 'top_menu',
						  'depth' => 2,
						  'container' => false,
						  'menu_class' => 'nav nav-pills navbar-right',
						  //Process nav menu using our custom nav walker
						  'walker' => new wp_bootstrap_navwalker())
						);
					?>
				  </div>
			  </div>
			</nav>
		</div>
	</header>
