<?php
/*
Description: Single technology page.
*/
?>


<?php get_header(); ?>
<div id="main">
	<div id="content" class="container">
		<!-- single-tech template. -->
		<div class="row">
			<div class="col-sm-8">
				<header><h1>Technology Lending</h1></header>
				<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
			</div>
			<div class="col-sm-4">
				<div class="header-search"><?php get_search_form(); ?></div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3">
				<?php get_sidebar('tech'); ?>
			</div>
			<div class="col-sm-9">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<article class="clearfix">
						<div class="thumbnail single">
							<div class="row">
								<div class="col-sm-4">
									<figure><?php the_post_thumbnail('staff-thumbnail', array('class' => 'staff-thumbnail')); ?></figure>
								</div>
								<div class="col-sm-8">
									<div class="caption">
										<h2><?php friendly_name(); ?></h2>
	    								<?php if(get_the_term_list( $post->ID, 'loan_period', true) ||
	    									 get_the_term_list( $post->ID, 'eligible_user', true) ||
	    									 get_post_meta($post->ID, 'availability', true)
	    								): ?>
											<ul>
	  										<?php if(get_the_term_list( $post->ID, 'loan_period', true)): ?>
	  											<li><i class="fa fa-hourglass" data-toggle="tooltip" data-placement="right" title="Loan Period"></i><?php echo get_the_term_list( $post->ID, 'loan_period', '', ', ', '' ); ?></li>
	  										<?php endif; ?>
	                      <?php if(get_the_term_list( $post->ID, 'eligible_user', true)): ?>
	                        <li><i class="fa fa-users" data-toggle="tooltip" data-placement="right" title="Eligible Users"></i><?php echo get_the_term_list( $post->ID, 'eligible_user', '', ', ', '' ); ?></li>
	                      <?php endif; ?>
	  										<?php if(get_post_meta($post->ID, 'availability', true)): ?>
	  											<li><i class="fa fa-question-circle" data-toggle="tooltip" data-placement="right" title="Check Availability"></i> <a href="<?php echo get_post_meta($post->ID, 'availability', true); ?>">Check Availability</a></li>
	  										<?php endif; ?>
											</ul>
											<?php endif; ?>
											<?php 
												if (get_the_excerpt($post->ID, true)): 
													the_excerpt();
												endif
											?>
									</div>
								</div>
							</div>
						</div>
						<?php if(get_the_term_list( $post->ID, 'unit', true)): ?>
							<p><?php echo get_the_term_list( $post->ID, 'unit', 'Units &amp; Groups: ', ', ', '' ); ?></p>
						<?php endif; ?>
					</article>
					<p><?php the_content(__('(more...)')); ?></p>
				<?php endwhile; else: ?>
				<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
