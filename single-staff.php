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
		<h1>Staff</h1>
		<div class="row">
			<div class="col-sm-3">
				<?php get_sidebar(); ?>
			</div>
			<div class="col-sm-9">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<article class="clearfix">
						<div class="thumbnail">
							<div class="row">
								<div class="col-sm-4">
									<figure><?php the_post_thumbnail('staff-thumbnail', array('class' => 'staff-thumbnail')); ?></figure>
								</div>
								<div class="col-sm-8">
									<div class="caption">
									<h2><?php friendly_name(); ?>
									</h2>
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
						</div>
						<?php if(get_the_term_list( $post->ID, 'department', true)): ?>
							<p><?php echo get_the_term_list( $post->ID, 'department', 'Department: ', ', ', '' ); ?></p>
						<?php endif; ?>
						<?php if(get_the_term_list( $post->ID, 'unit', true)): ?>
							<p><?php echo get_the_term_list( $post->ID, 'unit', 'Unit: ', ', ', '' ); ?></p>
						<?php endif; ?>
						<?php if(get_the_term_list( $post->ID, 'group', true)): ?>
							<p><?php echo get_the_term_list( $post->ID, 'group', 'Group: ', ', ', '' ); ?></p>
						<?php endif; ?>
					</article>
					<p><?php the_content(__('(more...)')); ?></p>
				<?php endwhile; else: ?>
				<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
			</div>
		</div>
	</div>
</div>
<div id="delimiter"></div>
<?php get_footer(); ?>
