<?php
/*
Template Name: Home Page
Description: A Template for the Website homepage.
*/
?>

<?php get_header(); ?>
<div id="main">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<p><?php the_content(__('(more...)')); ?></p>
		<hr> <?php endwhile; else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
</div>
<div id="delimiter"></div>
<?php get_footer(); ?>