<?php get_header(); ?>
<div id="main">
	<div id="title_bar" class="container">
	<!-- category.php -->
	  	<div class="row">
			<div class="col-sm-12">
				<header class="mt-5 mb-4">
					<a class="news-back-link fs-2 fw-semibold" href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>"><i class="fa fa-arrow-left"></i> News</a>
				</header>
				<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
			</div>
		</div>
	</div>
	<div  class="background-color-gray">
		<div id="content" class="container">
			<div class="row">
				<div class="col-sm-12">
					<h1 class="display-4 fw-semibold mb-4"><?php single_cat_title(); ?></h1>
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<?php	
							$categories = get_the_category();
					        $separator = ', ';
					        $output = '';
					        if($categories){
					          foreach($categories as $category) {
					            $output .= '<a href="'.get_category_link( $category->term_id ).'" title="'.esc_attr( sprintf( __( "View all posts in %s" ), $category->name)).'">'.$category->cat_name.'</a>'.$separator;
					          }
					        }
				        ?>
						<article class="news-article">
							<div class="card">
								<?php if (has_post_thumbnail()): ?>
									<div class="post-header-img"><a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail('full'); ?></a></div>
								<?php else: ?>
									<div class="post-header-img"><a title="<?php echo get_the_title(); ?>" href="<?php echo get_permalink(); ?>"><img class="size-full" alt="Decorative pegasus banner" src="<?php echo(get_template_directory_uri()) ?>/images/generic-default-banner.jpg"></a></div>
								<?php endif; ?>
									<div class="news-post-content">
										<div class="news-post-title">
											<header>
							                  <h2 class="display-5 fw-semibold"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h2>
							                  <span class="news-post-category"><?php echo trim($output, $separator); ?></span>
		                					  <span class="news-post-date">Posted: <i class="fa fa-calendar"></i> <?php echo get_the_time('F jS, Y'); ?></span>
				                  			</header>
										</div>
										<?php the_excerpt(); ?>
									</div>
							</div>
						</article>
					<?php endwhile; else: ?>
					<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
					<?php wpbeginner_numeric_posts_nav(); ?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>