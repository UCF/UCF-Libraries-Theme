<?php
/*
Template Name: No sidebar
Description: This page template does not have a sidebar.
*/
?>

<?php get_header(); ?>
<div id="main">
	<div id="content" class="container">
	<!-- no_sidebar -->
	
		<header><h1><?php the_title(); ?></h1></header>
		<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>

		<div class="row">
			<div class="col-sm-12">
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