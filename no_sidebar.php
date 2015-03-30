<?php
/*
Template Name: No sidebar
Description: This page template does not have a sidebar.
*/
?>


<?php get_header(); ?>
<div id="main">
	<div id="content" class="container">
		<h1><?php the_title(); ?></h1>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<p><?php the_content(__('(more...)')); ?></p>
			<hr> <?php endwhile; else: ?>
			<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
	</div>
</div>
<div id="delimiter"></div>
<?php get_footer(); ?>