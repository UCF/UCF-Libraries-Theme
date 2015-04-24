<?php
/*
Description: Taxonomy archive page.
*/
?>
 <?php
	global $wp_query;
	query_posts(
	   array_merge(
	      $wp_query->query,
	      array(
	      	'orderby' => 'title',
	      	'order' => 'ASC')
   )
);
?>

<?php get_header(); ?>
<div id="main">
	<div id="content" class="container">
	<!-- archive-staff.php -->
		<div class="row">
			<div class="col-sm-8">
				<h1><a href="<?php echo get_post_type_archive_link( 'staff' ); ?>">Staff Directory</a></h1>
			</div>
			<div class="col-sm-4">
				<div style="margin-top: 3em;"><?php get_search_form(); ?></div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3">
				<?php get_sidebar('staff'); ?>
			</div>
			<div class="col-sm-9">
				<h2 class="subpage-title"><?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); echo $term->name; ?></h2>
				<div class="row">
					<?php $i = 0; ?>
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php // if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
						<?php $i++; ?>
						<div class="col-sm-6 col-md-4">
			    			<div class="thumbnail">
			    				<figure><a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail('staff-thumbnail', array('class' => 'staff-thumbnail')); ?></a></figure>
								<div class="caption">
									<h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
									<?php if(get_post_meta($post->ID, 'title', true) ||
										 get_post_meta($post->ID, 'room', true) ||
										 get_post_meta($post->ID, 'phone', true) || 
										 get_post_meta($post->ID, 'email', true)
									): ?>

									<ul>
										<?php if(get_post_meta($post->ID, 'title', true)): ?>
										<li><span class="glyphicon glyphicon-user"></span> <?php echo get_post_meta($post->ID, 'title', true); ?></li>
										<?php endif; ?>

										<?php if(get_post_meta($post->ID, 'room', true)): ?>
										<li><span class="glyphicon glyphicon-map-marker"></span> <?php echo get_post_meta($post->ID, 'room', true); ?></li>
										<?php endif; ?>

										<?php if(get_post_meta($post->ID, 'phone', true)): ?>
										<li><span class="glyphicon glyphicon-earphone"></span> <?php echo get_post_meta($post->ID, 'phone', true); ?></li>
										<?php endif; ?>

										<?php if(get_post_meta($post->ID, 'email', true)): ?>
										<li><a href="mailto:<?php echo get_post_meta($post->ID, 'email', true); ?>"><span class="glyphicon glyphicon-envelope"></span> <?php echo get_post_meta($post->ID, 'email', true); ?></a></li>
										<?php endif; ?>
									</ul>
									<?php endif; ?>
								</div>
							</div>
						</div>
						<?php if ($i % 3 == 0) : //adds a clearfix every 3 items. ?>
								<div class="clearfix visible-md-block visible-lg-block"></div>
						<?php endif; ?>
						<?php if ($i % 2 == 0) : //adds a clearfix every 2 items. ?>
								<div class="clearfix visible-sm-block"></div>
						<?php endif; ?>
				<?php endwhile; else: ?>
				</div>
				<?php wp_reset_query(); // Restore global post data stomped by the_post(). ?> 
				<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
			</div>
		</div>
	</div>
</div>
<div id="delimiter"></div>
<?php get_footer(); ?>