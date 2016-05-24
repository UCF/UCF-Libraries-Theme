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
	</div>
	<div  class="background-color-gray">
		<div id="content" class="container">
			<div class="row">
				<div class="col-sm-3">
					<?php get_sidebar('tech'); ?>
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
		  											<li><i class="fa fa-check-circle" data-toggle="tooltip" data-placement="right" title="Check Availability"></i> There are currently <span class="total-items-available"></span> available.</li>
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
						<?php the_content(__('(more...)')); ?>
						<div class="card" style="padding:1em;">
							<h3 id="item_availability">Item Availability</h3>
							<?php if(get_post_meta($post->ID, 'availability', true)): ?>
								<p>There are <span class="total-items-available"></span> <?php friendly_name(); ?>s available for checkout.</p>
								<div class="table-responsive">
									<?php
										$url = get_post_meta($post->ID, 'availability', true);
										$content = file_get_contents($url);
										if ($content != false) {
											$first_step = explode( '<div id="divItemDetails">' , $content );
											$second_step = explode("</div>" , $first_step[1] );
											echo $second_step[0];
										} else {
											?><p>Item availability is unavailable.</p> <?php
										}
									?>
								</div>
							<?php else: ?>	
								<p> This item is not tracked in our availability system. </p>
							<?php endif; ?>
						</div>
					<?php endwhile; else: ?>
					<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	function availability_check() {
		var available_items = 0;
		$('.table').find('tr').each(function (i, el) {
        var $tds = $(this).find('td'),
            due_date = $tds.eq(3).text();
        if (due_date == 'Not Checked Out'){
        	available_items++;
        }
        // do something with productId, product, Quantity
    });
    $('.total-items-available').text(available_items);
	}

	$(document).ready(function(){
		$('.table-responsive > table').addClass('table table-striped');

		availability_check();
	});
</script>
<?php get_footer(); ?>
