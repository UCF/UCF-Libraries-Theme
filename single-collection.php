<?php
/*
Description: Single Collection page.
*/
?>


<?php get_header(); ?>
<div id="main">
	<div id="title_bar"class="container">
		<!-- single-collection template. -->
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
				<div id="sidebar" class="col-sm-3">
					<?php get_sidebar('collection'); ?>
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
											<h2><?php friendly_name(); ?></h2>
		    								<?php if(get_the_term_list( $post->ID, 'collection_owner', true) ||
                      		get_the_term_list( $post->ID, 'collection_keyword', true) ||
		    									get_the_term_list( $post->ID, 'collection_location', true) ||
		    									get_post_meta($post->ID, 'fine-policy', true) ||
		    									get_post_meta($post->ID, 'availability', true)
		    								): ?>
												<ul>
													<?php if(get_the_term_list( $post->ID, 'collection_owner', true)): ?>
	                        <li><i class="fa fa-users" data-toggle="tooltip" data-placement="right" title="Collection Owner"></i><?php echo get_the_term_list( $post->ID, 'collection_owner', '', ', ', '' ); ?></li>
	                     		<?php endif; ?>
		  										<?php if(get_the_term_list( $post->ID, 'collection_keyword', true)): ?>
		  											<li><i class="fa fa-info" data-toggle="tooltip" data-placement="right" title="Keyword"></i><?php echo get_the_term_list( $post->ID, 'collection_keyword', '', ', ', '' ); ?></li>
		  										<?php endif; ?>
		                      <?php if(get_the_term_list( $post->ID, 'collection_location', true)): ?>
		                        <li><i class="fa fa-globe" data-toggle="tooltip" data-placement="right" title="Location"></i><?php echo get_the_term_list( $post->ID, 'collection_location', '', ', ', '' ); ?></li>
		                      <?php endif; ?>
		                      <?php if(get_post_meta($post->ID, 'fine-policy', true)): ?>
		                        <li><i class="fa fa-usd" data-toggle="tooltip" data-placement="right" title="Fine Policy"></i> <a href="<?php echo get_post_meta($post->ID, 'fine-policy', true); ?>">Fine Policy</a></li>
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
								<div class="card" style="padding:1em;">
									<?php the_content(__('(more...)')); ?>
								</div>
							<?php endif; ?>
							<div class="card" style="padding:1em;">
								<h3 id="item_availability">Item Availability</h3>
								<?php if(get_post_meta($post->ID, 'catalog_record', true)): ?>
									<p>There are <strong><span class="total-items-available"></span> <?php friendly_name(); ?>s available</strong> for checkout.</p>
									<div class="table-responsive">
										<?php
											$url = get_post_meta($post->ID, 'catalog_record', true);
											$content = file_get_contents($url);
											if ($content != false) {
												$first_step = explode( '<div id="divItemDetails">' , $content );
												$second_step = explode("</div>" , $first_step[1] );
												echo $second_step[0];
											} else {
												?><p>Item catalog record is unavailable.</p> <?php
											}
										?>
									</div>
								<?php else: ?>	
									<p> This item is not tracked in our catalog record system. </p>
								<?php endif; ?>
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
	// function availability_status() {
	// 	var available_items = 0,
	// 			total_items = 0,
	// 			percent_available = 0;
	// 	$('.table').find('tr').each(function (i, el) {
	//     var $tds = $(this).find('td'),
	//         due_date = $tds.eq(3).text(),
	//         item_status = $tds.eq(2).text();
	//     if (item_status != 'Damaged' && item_status != 'Lost - Patron Billed' && item_status != 'In House Repair' && item_status != 'Lost - Missing' && item_status != 'Lost - Paid' && item_status != 'Withdrawn') {
	// 	    if (due_date == 'Not Checked Out') {
	// 	    	available_items++;
	// 	    }
	// 	  }
	// 	  total_items++;
 //    });
 //    total_items = total_items - 3;
 //    percent_available = Math.round((available_items / total_items) * 100);
    
 //    if (available_items > 0) {
 //      $('#item_availability_bar').addClass('progress-bar-success');
 //    } else {
 //      $('#item_availability_bar').addClass('progress-bar-warning');
 //    }

 //    $('#item_availability_bar').css('width', percent_available+'%').attr('aria-valuenow', percent_available);   
 //    $('.total-items-available').text(available_items);
 //    $('.total-items').text(total_items);

	// }

// Hides the empty columns that are pulled in from the catalog
	function hide_empty() {
		var row = 0;
		$('.table').find('tr').each(function (i, el) {
	  	var $tds = $(this).find('td');
	  	$tds.eq(1).addClass('hide');
	  	$tds.eq(4).addClass('hide');

	  	if (row < 2) {
	  		$(this).addClass('hide');
	  	}
	  	if (row == 2) {		
	  		// Convert this row from tds to ths
	  		$(this).find('td').each(function (){
	  			$(this).replaceWith('<th>' + $(this).text() + '</th>'); 
	  		});
	  		// Hide newly created ths
	  		var	$ths = $(this).find('th');
	  		$ths.eq(1).addClass('hide');
	  		$ths.eq(4).addClass('hide');
	  	}

	  	row++;
	  });
	}

	$(document).ready(function(){
		$('.table-responsive > table').addClass('table table-striped');

		availability_status();
		hide_empty();
	});
</script>
<?php get_footer(); ?>
