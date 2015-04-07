<?php
/*
Template Name: Single Staff
Description: Single staff member page.
*/
?>


<?php get_header(); ?>
<div id="main">
	<div id="content" class="container">
		<!-- single-staff template. -->
		<div class="row">
			<div class="col-sm-3">
				<?php get_sidebar(); ?>
			</div>
			<div class="col-sm-9">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<header>
						<h1>People >> <?php the_title(); ?></h1>
					</header>
					<article class="staff-info-single clearfix">
						<figure><?php the_post_thumbnail( ); ?></figure>
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
							<li><span class="glyphicon glyphicon-envelope"></span> <?php echo get_post_meta($post->ID, 'email', true); ?></li>
							<?php endif; ?>
						</ul>
					</article>
				<?php endif; ?>
				<p><?php echo get_the_term_list( $post->ID, 'department', 'Department: ', ', ', '' ); ?></p>
				<p><?php the_content(__('(more...)')); ?></p>
				<?php endwhile; else: ?>
				<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
			</div>
		</div>
	</div>
</div>
<div id="delimiter"></div>
<?php get_footer(); ?>