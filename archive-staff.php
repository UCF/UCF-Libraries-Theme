<?php get_header(); ?>
<div id="main">
	<div id="content" class="container">
		<h1><?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); echo $term->name; ?></h1>
		<div class="col-sm-3">
			<?php get_sidebar(); ?>
		</div>
		<div class="col-sm-9">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class"col-sm-4">
				<p><?php the_post_thumbnail( ); ?></p>
				<h2><?php the_title(); ?></h2>
				<p><?php the_meta(); ?></p>
				<p><?php echo get_the_term_list( $post->ID, 'department', 'Department: ', ', ', '' ); ?></p>
			</div>
			<hr> <?php endwhile; else: ?>
			<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
		</div>
	</div>
</div>
<div id="delimiter"></div>
<?php get_footer(); ?>