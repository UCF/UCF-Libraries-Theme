<?php get_header(); ?>
<div id="main">
	<div id="content" class="container">
	<!-- index.php -->
		<h1><?php echo $post->post_name;?></h1>
		<div class="col-sm-3">
			<?php get_sidebar(); ?>
		</div>
		<div class="col-sm-9">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<article>
				<header>
                  <h3><a href="'.get_permalink().'">'.get_the_title().'</a></h3>
                  <span class="news-post-category">'.trim($output, $separator).' - '.get_the_time('F jS, Y').'</span>
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
<div id="delimiter"></div>
<?php get_footer(); ?>