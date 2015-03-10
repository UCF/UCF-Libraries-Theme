<?php
/*
Template Name: Default Page
Description: Default Page.
*/
?>


<?php get_header(); ?>
<div id="main">
	<div id="content" class="container">
		<?php get_sidebar(); ?>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<h1><?php the_title(); ?></h1>
		<p><?php the_content(__('(more...)')); ?></p>
		<hr> <?php endwhile; else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
	</div>
</div>
<div id="delimiter"></div>
<?php get_footer(); ?>