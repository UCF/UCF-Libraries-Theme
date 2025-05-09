<?php get_header(); ?>
<!-- <script>

function fbShare(url, title, descr, image, winWidth, winHeight) {
  var winTop = (screen.height / 2) - (winHeight / 2);
  var winLeft = (screen.width / 2) - (winWidth / 2);
  window.open('http://www.facebook.com/sharer.php?s=100&p[title]=' + title + '&p[summary]=' + descr + '&p[url]=' + url + '&p[images][0]=' + image, 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width=' + winWidth + ',height=' + winHeight);
}

</script> -->
<div id="main">
	<div id="title_bar" class="container">
	<!-- home.php -->
		<header><h1>News</h1></header>
		<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
	</div>
	<div  class="background-color-gray">
		<div id="content" class="container">

				<div id="content_area">
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
							<div class="post-header-img"><a title="<?php echo get_the_title(); ?>" href="<?php echo get_permalink(); ?>"><img alt="Decorative pegasus banner" src="<?php echo(get_template_directory_uri()) ?>/images/generic-default-banner.jpg"></a></div>
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
					 			<?php if ( comments_open() || get_comments_number() ) {
									comments_template( $file, $separate_comments ); 
								}?>
              </div>
				    </div>
				  </article>
					<?php endwhile; else: ?>
					</div>
					<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
					<?php wpbeginner_numeric_posts_nav(); ?>
				</div>
				<?php get_sidebar(); ?>
		</div>

	</div>
</div>
<?php get_footer(); ?>