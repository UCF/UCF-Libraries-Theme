<?php
/*
Template Name: Single Staff
Description: Single staff member page.
*/
?>


<?php get_header(); ?>
<div id="main">
	<div id="content" class="container">
		
		<div class="row">
			<div class="col-sm-3">
				<?php get_sidebar(); ?>
			</div>
			<div class="col-sm-9">
				<h1><?php the_title(); ?></h1>
				<p><?php the_post_thumbnail( ); ?></p>
				<p><?php echo get_the_term_list( $post->ID, 'department', 'Department: ', ', ', '' ); ?></p>
				<p><?php the_content(__('(more...)')); ?></p>
			</div>
		</div>
	</div>
</div>
<div id="delimiter"></div>
<?php get_footer(); ?>