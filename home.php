<?php get_header(); ?>

<div id="main">
	<div id="title_bar" class="container">
	<!-- home.php -->
		<header><h1>News</h1></header>
		<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
	</div>
	<div  class="background-color-gray">
		<div id="content" class="container">
				<div id="content_area">					
					<section class="news-filters">
						<button class="filter-toggle" aria-expanded="false">All Topics</button>
						<div class="filter-buttons">
							<?php
							$categories = get_categories([
								'taxonomy'   => 'category',
								'hide_empty' => true,
								'orderby'    => 'name',
								'hierarchical' => true,
								// 'parent'     => 0
							]);

							foreach ($categories as $category) :
							?>
								<a href="<?php echo esc_url(
									get_category_link($category->term_id)
								); ?>" class="filter-btn">
								<?php echo esc_html($category->name); ?>
								</a>
							<?php endforeach; ?>
						</div>
					</section>
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
					<article>
						<div class="card">
						<?php if (has_post_thumbnail()): ?>
							<div class="post-header-img"><a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail('full'); ?></a></div>
						<?php else: ?>
							<div class="post-header-img"><a title="<?php echo get_the_title(); ?>" href="<?php echo get_permalink(); ?>"><img class="size-full" alt="Decorative pegasus banner" src="<?php echo(get_template_directory_uri()) ?>/images/generic-default-banner.jpg"></a></div>
						<?php endif; ?>
						<div class="news-post-content">

								<div class="news-post-title">
									<header>
					          <h2><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h2>
					          <span class="news-post-category"><?php echo trim($output, $separator); ?></span>
                		<span class="news-post-date">Posted: <i class="fa fa-calendar"></i> <?php echo get_the_time('F jS, Y'); ?></span>
                	</header>
								</div>
								<?php the_content(__('(more...)')); ?>
					 			<?php //if ( comments_open() || get_comments_number() ) {
									//comments_template( $file, $separate_comments ); 
								//}?>
              </div>
				    </div>
				  </article>
					<?php endwhile; else: ?>
					</div>
					<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
					<?php wpbeginner_numeric_posts_nav(); ?>
				</div>
		</div>

	</div>
</div>
<script>
  const filterToggle = document.querySelector('.filter-toggle');
  const filterButtons = document.querySelector('.filter-buttons');

  filterToggle.addEventListener('click', () => {
	const expanded = filterToggle.getAttribute('aria-expanded') === 'true';
	filterToggle.setAttribute('aria-expanded', !expanded);
	filterButtons.classList.toggle('show');
  });
  </script>
<?php get_footer(); ?>