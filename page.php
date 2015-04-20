<?php
/*
Template Name: Default Page
Description: Default Page.
*/
?>


<?php get_header(); ?>
<div id="main">
	<div id="content" class="container">
		<h1><?php the_title(); ?></h1>
		<div class="row">
			<div class="col-sm-3">
				<?php get_sidebar(); ?>
			</div>
			<div class="col-sm-9">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<article>
				<p><?php the_content(__('(more...)')); ?></p>
				</article>
				<hr> <?php endwhile; else: ?>
				<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
			</div>
		</div>
	</div>
</div>
<div id="delimiter"></div>
<?php get_footer(); ?>