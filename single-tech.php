<?php
/*
Description: Single technology page.
*/

$has_s = 0;
$name = get_the_title();
if ( substr($name, -1) == 's') {
	$has_s = 1;
}

?>


<?php get_header(); ?>
<div id="main">
	<div id="title_bar"class="container">
		<!-- single-tech template. -->
		<div class="row">
			<div class="col-sm-8">
				<header><p class="h1">Technology Lending</p></header>
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
					<?php get_sidebar('tech'); ?>
				</div>
				<div id="content_area" class="col-sm-9">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<article>
							<div class="thumbnail">
								<div class="row">
									<div class="col-sm-4">
										<figure><?php the_post_thumbnail('staff-thumbnail', array('class' => 'staff-thumbnail')); ?></figure>
									</div>
									<div class="col-sm-8">
										<div class="caption">
											<h1><?php the_title(); ?></h1>
		    								<?php if(get_the_term_list( $post->ID, 'tech_type', true) ||
                      		get_the_term_list( $post->ID, 'loan_period', true) ||
		    									get_the_term_list( $post->ID, 'eligible_user', true) ||
		    									get_the_term_list( $post->ID, 'library', true) ||
		    									get_post_meta($post->ID, 'fine-policy', true) ||
		    									get_post_meta($post->ID, 'availability', true)
		    								): ?>
												<ul>
													<?php if(get_the_term_list( $post->ID, 'tech_type', true)): ?>
	                        <li><i class="fa fa-info-circle" data-toggle="tooltip" data-placement="right" title="Tech Type"></i><?php echo strip_tags(get_the_term_list( $post->ID, 'tech_type', '', ', ', '' )); ?></li>
	                     		<?php endif; ?>
		  										<?php if(get_the_term_list( $post->ID, 'loan_period', true)): ?>
		  											<li><i class="fa fa-hourglass" data-toggle="tooltip" data-placement="right" title="Loan Period"></i><?php echo strip_tags(get_the_term_list( $post->ID, 'loan_period', '', ', ', '' )); ?></li>
		  										<?php endif; ?>
		                      <?php if(get_the_term_list( $post->ID, 'eligible_user', true)): ?>
		                        <li><i class="fa fa-users" data-toggle="tooltip" data-placement="right" title="Eligible Users"></i><?php echo strip_tags(get_the_term_list( $post->ID, 'eligible_user', '', ', ', '' )); ?></li>
		                      <?php endif; ?>
		                      <?php if(get_the_term_list( $post->ID, 'library', true)): ?>
		                        <li><i class="fa fa-university" data-toggle="tooltip" data-placement="right" title="Library"></i><?php echo strip_tags(get_the_term_list( $post->ID, 'library', '', ', ', '' )); ?></li>
		                      <?php endif; ?>
		                      <?php if(get_post_meta($post->ID, 'fine-policy', true)): ?>
		                        <li><i class="fa fa-usd" data-toggle="tooltip" data-placement="right" title="Fine Policy"></i> <a href="<?php echo get_post_meta($post->ID, 'fine-policy', true); ?>">Fine Policy</a></li>
		                      <?php endif; ?>
                      		<?php  if(get_post_meta($post->ID, 'availability', true)): ?>
		  											<li><i class="fa fa-check-circle" data-toggle="tooltip" data-placement="right" title="Availability"></i> 
		  												<div class="progress">
									              <div id="item_availability_bar" class="progress-bar " role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="min-width: 4em;">
									                <span class="total-items-available"></span> / <span class="total-items"></span>
									              </div>
									            </div>
		  											</li>
		  										<?php endif; ?>
												</ul>
												<?php endif; ?>
												<?php 
													if (get_the_excerpt($post->ID, true)): 
														the_excerpt();
													endif;
												?>
										</div>
									</div>
								</div>
							</div>
							<div class="clearfix"></div>
							<?php if($post->post_content != "") : ?>
								<div class="card"> 
									<section class="tech-content">
										<?php the_content(__('(more...)')); ?>
									</section>
								</div>
							<?php endif; ?>
							 <div class="card" style="padding:1em;">
								<h2 id="item_availability">Item Availability</h2>
								<?php  if(get_post_meta($post->ID, 'availability', true)): ?>
									<p id="item_availability_message">There <span class="single-plural"></span> <strong><span class="total-items-available"></span> <?php the_title(); ?><span class="s-ending"></span> available</strong> for checkout. <a href="https://ucf-flvc.primo.exlibrisgroup.com/permalink/01FALSC_UCF/6a1ouu/alma<?php echo get_post_meta($post->ID, 'availability', true); ?>" target="_blank">View items in Primo</a></p>
									<?php 
										$json_o = primo_availability_api_call(get_post_meta($post->ID, 'availability', true), 500);	
										$availability = primo_availability_calc($json_o);
										$availability_list = primo_availability_list($json_o);
										echo($availability_list);
									?>
								<?php  else: ?>	
									<p> This item is not tracked in our availability system. </p>
								<?php  endif; ?>
							</div> 
						</article>
					<?php endwhile; else: ?>
					<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
// Adds all objects with status "Not Checked Out" and prints them into objects with class .total-items-available
	function availability_status() {
		let available_items = <?php	echo($availability[0]); ?>,
				total_items = <?php	echo($availability[1]); ?>,
				percent_available = 0,
				has_s = <?php echo($has_s); ?>;

		if (total_items != -1) {
			if (total_items < 0){ total_items = 0;}
			percent_available = Math.round((available_items / total_items) * 100);
			
			if (available_items > 0) {
				$('#item_availability_bar').addClass('progress-bar-success');
			} else {
				$('#item_availability_bar').addClass('progress-bar-warning');
			}

			$('#item_availability_bar').css('width', percent_available+'%').attr('aria-valuenow', percent_available);   
			$('.total-items-available').text(available_items);
			$('.total-items').text(total_items);
			if (available_items == 1) {
				$('.single-plural').text('is');
			} else {
				$('.single-plural').text('are');
			}
			if (available_items != 1 && has_s == 0 ){
				$('.s-ending').text('s');
			}
		} else {
			$('#item_availability_bar').addClass('progress-bar-danger');
			$('#item_availability_bar').css('width', '100%').attr('aria-valuenow', 100);   
			$('#item_availability_bar').text("There was an error locating this item's availabilty status.");
			$('#item_availability_message').text("There was an error locating this item's availabilty status.");
		}
	}

	$(document).ready(function(){
		availability_status();
	});
</script>
<?php get_footer(); ?>
