<?php
/*
Template Name: No sidebar
Description: This page template does not have a sidebar.
*/
?>

<?php get_header(); ?>
<div id="main">
	<div id="title_bar" class="container">
	<!-- no_sidebar -->
		<div class="row">
			<div class="col-sm-8">
				<header><h1><?php the_title(); ?></h1></header>
				<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
			</div>
			<div class="col-sm-4">
				<div class="header-search"><?php get_search_form(); ?></div>
			</div>
		</div>
	</div>
	<div id="content" class="container">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<article>
		<?php the_content(__('(more...)')); ?>
		</article>
		<?php endwhile; else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
	</div>
</div>
<?php get_footer(); ?>