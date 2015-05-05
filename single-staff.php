<?php
/*
Description: Single staff member page.
*/
?>


<?php get_header(); ?>
<div id="main">
	<div id="content" class="container">
		<!-- single-staff template. -->
		<div class="row">
			<div class="col-sm-8">
				<header><h1>Staff Directory</h1></header>
				<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
			</div>
			<div class="col-sm-4">
				<div class="header-search"><?php get_search_form(); ?></div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3">
				<?php get_sidebar('staff'); ?>
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
												<li><span class="glyphicon glyphicon-user" data-toggle="tooltip" data-placement="left" title="Position"></span> <?php echo get_post_meta($post->ID, 'title', true); ?></li>
											<?php endif; ?>

											<?php if(get_the_term_list( $post->ID, 'department', true)): ?>
												<li><i class="fa fa-university" data-toggle="tooltip" data-placement="left" title="Department"></i><?php echo get_the_term_list( $post->ID, 'department', '', ', ', '' ); ?></li>
											<?php endif; ?>

											<?php if(get_post_meta($post->ID, 'room', true)): ?>
												<li><span class="glyphicon glyphicon-map-marker" data-toggle="tooltip" data-placement="left" title="Location"></span> <?php echo get_post_meta($post->ID, 'room', true); ?></li>
											<?php endif; ?>

											<?php if(get_post_meta($post->ID, 'phone', true)): ?>
												<li><span class="glyphicon glyphicon-phone-alt" data-toggle="tooltip" data-placement="left" title="Phone"></span> <?php echo get_post_meta($post->ID, 'phone', true); ?></li>
											<?php endif; ?>

											<?php if(get_post_meta($post->ID, 'email', true)): ?>
												<li><span class="glyphicon glyphicon-envelope" data-toggle="tooltip" data-placement="left" title="Email"></span><a href="mailto:<?php echo get_post_meta($post->ID, 'email', true); ?>"> <span class="ellipsis"> <?php echo get_post_meta($post->ID, 'email', true); ?></span></a></li>
											<?php endif; ?>
										</ul>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
<!-- 						<?php // if(get_the_term_list( $post->ID, 'department', true)): ?>
							<p><?php // echo get_the_term_list( $post->ID, 'department', 'Department: ', ', ', '' ); ?></p>
						<?php // endif; ?> -->
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
<script>
	$(function () {
	  $('[data-toggle="tooltip"]').tooltip()
	})
</script>
<div id="delimiter"></div>
<?php get_footer(); ?>
