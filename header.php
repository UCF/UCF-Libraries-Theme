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
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<script type="text/javascript" id="ucfhb-script" src="//universityheader.ucf.edu/bar/js/university-header.js"></script>
		<?php wp_head(); ?> 
	</head>
	<body <?php body_class(); ?>>
	<header class="main-header">
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
						  'menu' 				=> 'Header Menu',
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
<!-- Modal -->
<div class="modal fade login-modal" id="login_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Login Preference</h4>
      </div>
      <div class="modal-body">
       <a class="btn btn-primary" style="display:block; margin: 1em 0;" href="<?php bloginfo('url'); ?>/my-account/" title="Login with your NID">Login with NID</a><a style="display:block; margin: 1em 0;" href="#" title="Alternate Login Method">Don't Have a NID?</a> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- https://login.ezproxy.net.ucf.edu/login?auth=shibb -->
