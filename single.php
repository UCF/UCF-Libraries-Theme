<?php get_header(); ?>
<div id="main">
	<div id="title_bar" class="container">
	<!-- single.php -->
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
					<article class="card shadow-sm">
					<?php if (has_post_thumbnail()): ?>
						<div class="post-header-img"><?php the_post_thumbnail('full'); ?></div>
					<?php else: ?>
						<div class="post-header-img"><img class="size-full"  alt="" aria-hidden="true" src="<?php echo(get_template_directory_uri()) ?>/images/generic-default-banner.jpg"></div>
					<?php endif; ?>
						<div class="news-post-content">
							<div class="news-post-title">
								<header>
									<h1 class="display-3 fw-semibold"><?php echo get_the_title(); ?></h1>
									<div class="news-post-meta" aria-label="Post metadata">
									<span class="news-post-category"><?php echo trim($output, $separator); ?></span>
									<time class="news-post-date">Posted: <i class="fa fa-calendar"></i> <?php echo get_the_time('F jS, Y'); ?></time>
									</div>
								</header>
							</div>
							<?php the_content(__('(more...)')); ?>
						</div>
					</article>
					<?php endwhile; else: ?>
					<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
				</div>
			</div>
		</div>				
	</div>
</div>
<?php get_footer(); ?>