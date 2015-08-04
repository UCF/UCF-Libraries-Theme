<?php
/*
Template Name: Portal Page
Description: This page is bare bones and ment to be used by portal pages that are included on other sites.
*/
?>

<?php get_header(); ?>
<style type="text/css">
div#ucfhb {
	display: none;
}
header.main-header {
  display: none;
}
</style>
<div id="main">
	<div id="content" class="container">
	<!-- page-portal.php -->
		<div class="row">
			<div class="col-sm-12">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<article>
				<?php the_content(__('(more...)')); ?>
				</article>
				<?php endwhile; else: ?>
				<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
