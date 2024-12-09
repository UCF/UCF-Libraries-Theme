<?php
/*
Template Name: Open Layout
Description: A Template that includes the UCF header and Library Heading menu and footers but no standard title, breadcrumb, and search area.
*/

get_header(); ?>
<div id="main">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  		<?php the_content(__('(more...)')); ?>
		<?php endwhile; else: ?>
		<?php _e('Sorry, no posts matched your criteria.'); ?><?php endif; ?>
</div>
<?php get_footer(); ?>