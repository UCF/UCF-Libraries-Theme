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
		<script src="https://tblc.libanswers.com/load_chat.php?hash=f2c66578fad19608e948deeac0560c14"></script>
		<?php wp_head(); ?> 
	</head>
	<body <?php body_class('library-body'); ?>>
		<header class="main-header">
			<nav class="navbar navbar-expand-lg navbar-library" role="navigation">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					
					    <a class="navbar-brand" href="<?php bloginfo('url')?>"><?php bloginfo('name')?></a>

						<button class="navbar-toggler"
								type="button"
								data-bs-toggle="collapse"
								data-bs-target="#primary-navigation">
							<i class="fa fa-bars" aria-hidden="true"></i>
							<span class="icon-text">Menu</span>
						</button>
					
					  <!-- Collect the nav links, forms, and other content for toggling --> 
					    <?php /* Primary navigation */
							wp_nav_menu( array(
								'menu'            => 'Header Menu',
								'depth'           => 2,
								'container'       => 'div',
								'container_id'    => 'primary-navigation',
								'container_class' => 'collapse navbar-collapse',
								'menu_class' 	  => 'navbar-nav ms-auto',
							));
						?>
				  </div>
				</nav>
		</header>
		<?php
			$args = array(  
				'post_type' => 'alert',
				'post_status' => 'publish',
				'posts_per_page' => 1, 
				'orderby' => 'date', 
				'order' => 'DSC', 
			);
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post(); 
				$title = title_to_slug(get_the_title());
				//$banner_cookie = $_COOKIE["banner_close"];
					if (!isset($banner_cookie)):
						$status = strip_tags(get_the_term_list( $post->ID, 'alert-status', '', ', ', '' ));
					?>
						<div id="banner_message" class="homepage-banner alert alert-<?php echo($status); ?> alert-dismissible fade" data-id="<?php echo($title); ?>" role="alert">
							<div class="container">
								<div class="row">
									<div class="col-sm-12">
									<button type="button" id="banner_close_btn" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
									<?php the_content(); ?>
									</div>
								</div>	
							</div>
						</div>
   			<?php endif; endwhile;
    		wp_reset_postdata(); 
		?>
