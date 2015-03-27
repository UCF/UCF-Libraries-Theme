<?php
/*
Template Name: Department Sub Page
Description: Use for all department sub pages.
*/
?>


<?php get_header(); ?>
<div id="main">
	<div id="content" class="container">
		<?php $permalink = get_permalink($post->post_parent); ?>
		<h1><a href="<?php echo $permalink; ?>"><?php echo get_the_title($post->post_parent);?></a></h1>
		<div class="row">
			<div class="col-sm-3">
				<?php get_sidebar(); ?>
			</div>
			<div class="col-sm-9">
				<h2 class="subpage-title"><?php the_title(); ?></h2>
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<p><?php the_content(__('(more...)')); ?></p>
				<hr> <?php endwhile; else: ?>
				<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
			</div>
		</div>
	</div>
</div>
<div id="delimiter"></div>
<?php get_footer(); ?>