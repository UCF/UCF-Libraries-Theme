<?php
/*
Template Name: Blank Template
Description: This page contains now elements of wordpress. It is used purely for content to be served up to another location.
*/
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?php the_content(__('(more...)')); ?>
<?php endwhile; else: ?>
<?php _e('Sorry, no posts matched your criteria.'); ?><?php endif; ?>
