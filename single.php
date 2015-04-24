<?php get_header(); ?>
<div id="main">
	<div id="content" class="container">
	<!-- single.php -->
		<h1><a href="<?php echo get_post_type_archive_link(); ?>">News &amp; Blog</a></h1>
		<div class="row">
			<div class="col-sm-3">
				<?php get_sidebar(); ?>
			</div>
			<div class="col-sm-9">
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
					<header>
	                  <h3><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
	                  <span class="news-post-category"><?php echo trim($output, $separator).' - '.get_the_time('F jS, Y'); ?></span>
					</header>
					<p><?php the_post_thumbnail( ); ?></p>
					<p><?php the_content(__('(more...)')); ?></p>
					<p><?php comments_template( $file, $separate_comments ); ?></p>
				</article>
				<hr> <?php endwhile; else: ?>
				<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
			</div>
		</div>
	</div>
</div>
<div id="delimiter"></div>
<?php get_footer(); ?>