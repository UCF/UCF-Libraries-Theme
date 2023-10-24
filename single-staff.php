<?php
/*
Description: Single staff member page.
*/
?>


<?php get_header(); ?>
<div id="main">
	<div id="title_bar"class="container">
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
	</div>
	<div  class="background-color-gray">
		<div id="content" class="container">
			<div class="row directory-single">
				<div id="sidebar" class="col-sm-3">
					<?php get_sidebar('staff'); ?>
				</div>
				<div id="content_area" class="col-sm-9">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<article class="clearfix">
							<div class="thumbnail">
								<div class="row">
									<div class="col-sm-4">
										<figure><?php the_post_thumbnail('staff-thumbnail', array('class' => 'staff-thumbnail')); ?></figure>
									</div>
									<div class="col-sm-8">
										<div class="caption">
										<h2><?php friendly_name(); ?></h2>
											<?php if(get_post_meta($post->ID, 'title', true) ||
                             get_post_meta($post->ID, 'rank', true) ||
                             get_post_meta($post->ID, 'department', true) ||
                             get_post_meta($post->ID, 'subject', true) ||
                             get_post_meta($post->ID, 'room', true) ||
                             get_post_meta($post->ID, 'phone', true) ||
                             get_post_meta($post->ID, 'email', true)
											): ?>
											<ul>
												<?php if(get_post_meta($post->ID, 'title', true)): ?>
    											<li><i class="fa fa-bookmark" data-toggle="tooltip" data-placement="right" title="Title"></i><?php echo get_post_meta($post->ID, 'title', true); ?></li>
												<?php endif; ?>

												<?php if(get_post_meta($post->ID, 'rank', true)): ?>
    											<li><i class="fa fa-graduation-cap" data-toggle="tooltip" data-placement="right" title="Rank"></i><?php echo get_post_meta($post->ID, 'rank', true); ?></li>
												<?php endif; ?>

												<?php if(get_the_term_list( $post->ID, 'department', true)): ?>
													<li><i class="fa fa-university" data-toggle="tooltip" data-placement="right" title="Department"></i><?php echo get_the_term_list( $post->ID, 'department', '', ', ', '' ); ?></li>
												<?php endif; ?>

												<?php if(get_post_meta($post->ID, 'room', true)): ?>
													<li><span class="glyphicon glyphicon-map-marker" data-toggle="tooltip" data-placement="right" title="Location"></span> <?php echo get_post_meta($post->ID, 'room', true); ?></li>
												<?php endif; ?>

												<?php if(get_post_meta($post->ID, 'phone', true)): ?>
													<li><span class="glyphicon glyphicon-phone-alt" data-toggle="tooltip" data-placement="right" title="Phone"></span> <?php echo get_post_meta($post->ID, 'phone', true); ?></li>
												<?php endif; ?>

												<?php if(get_post_meta($post->ID, 'email', true)): ?>
													<li><i class="fa fa-envelope" data-toggle="tooltip" data-placement="right" title="Email"></i><a href="mailto:<?php echo get_post_meta($post->ID, 'email', true); ?>"> <span class="ellipsis"> <?php echo get_post_meta($post->ID, 'email', true); ?></span></a></li>
												<?php endif; ?>

												<?php if(get_the_term_list( $post->ID, 'unit', true)): ?>
													<p><?php echo get_the_term_list( $post->ID, 'unit', 'Units &amp; Groups: ', ', ', '' ); ?></p>
												<?php endif; ?>
											</ul>
											<?php endif; ?>
											
											<?php if(get_post_meta($post->ID, 'cv_link', true)): ?>
													<a class="btn btn-primary" title="Download CV for <?php friendly_name(); ?>" href="<?php echo get_post_meta($post->ID, 'cv_link', true); ?>">Download CV</a>
											<?php endif; ?>
										</div>
									</div>
								</div>
							</div>
						</article>
						<?php if(get_post_meta($post->ID, 'assistance', true)): ?>
							<div class="card content-area">
								<?php echo get_post_meta($post->ID, 'assistance', true); ?>
							</div>
						<?php endif; ?>
						<?php if($post->post_content != ""): ?>
							<div class="card content-area">
								<?php the_content(__('(more...)')); ?>
							</div>
						<?php endif; ?>
					<?php endwhile; else: ?>
					<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
