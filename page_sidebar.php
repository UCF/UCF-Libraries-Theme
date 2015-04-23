<?php
/*
Template Name: Page & Sidebar
Description: Use if a page requires a sidebar.
*/
?>


<?php get_header(); ?>
<div id="main">
	<div id="content" class="container">
	<!-- page_sidebar.php -->
		<header><h1><?php the_title(); ?></h1></header>
		<div class="row">
			<div class="col-sm-3">
				<?php get_sidebar(); ?>
			</div>
			<div class="col-sm-9">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<article>
				<?php the_content(__('(more...)')); ?>
				</article>
				<hr> <?php endwhile; else: ?>
				<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
			</div>
		</div>
	</div>
</div>
<div id="delimiter"></div>
<?php get_footer(); ?>