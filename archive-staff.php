<?php get_header(); ?>
<div id="main">
	<div id="content" class="container">
		<h1><?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); echo $term->name; ?></h1>
		<div class="col-sm-3">
			<?php get_sidebar(); ?>
		</div>
		<div class="col-sm-9">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="col-sm-6 col-md-4">
    			<div class="thumbnail">
					<?php the_post_thumbnail( ); ?>
					<div class="caption">
						<h3><?php the_title(); ?></h3>
						<?php the_meta(); ?>
						<p><?php echo get_the_term_list( $post->ID, 'department', 'Department: ', ', ', '' ); ?></p>
					</div>
				</div>
			</div>
			<?php endwhile; else: ?>
			<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
		</div>
	</div>
</div>
<div id="delimiter"></div>
<?php get_footer(); ?>