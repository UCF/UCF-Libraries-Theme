<?php
/*
Template Name: Sub-Subpage
Description: Use if a page belongs under a subpage page.
*/
?>
<?php 
$ancestors = get_ancestors(get_the_ID(), 'page');
?>

<?php get_header(); ?>
<div id="main">
	<div id="title_bar" class="container">
		<div class="row">
			<div class="col-sm-8">
				<header><h1><?php echo get_the_title($ancestors[1]).' - '.get_the_title($post->post_parent);?></h1></header>
				<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
			</div>
			<div class="col-sm-4">
				<div class="header-search"><?php get_search_form(); ?></div>
			</div>
		</div>
	</div>
	<div id="content" class="container">
		<div class="row">
			<div id="sidebar" class="col-sm-3">
				<?php get_sidebar(); ?>
			</div>
			<div id="content_area" class="col-sm-9">
				<h2 class="subpage-title"><?php the_title(); ?></h2>
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<p><?php the_content(__('(more...)')); ?></p>
				<?php endwhile; else: ?>
				<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>