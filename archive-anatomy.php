<?php
/*
Description: Archive anatomy page.
*/
?>
<?php
	$args=array(
	'post_type' => 'anatomy',
  'posts_per_page' => 200,
	'orderby' => 'title',
	'order' => 'ASC');
	$my_query = null;
	$my_query = new WP_Query($args);
 ?>

<?php get_header(); ?>
<div id="main">
	<div id="title_bar" class="container">
		<div class="row">
			<div class="col-sm-8">
				<header><h1>Anatomy Lending</h1></header>
				<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
			</div><!-- col-sm-8 -->
			<div class="col-sm-4">
				<div class="header-search"><?php get_search_form(); ?></div>
			</div><!-- col-sm-4 -->
		</div><!-- row -->
	</div><!-- container -->
	<div  class="background-color-gray">
		<div id="content" class="container">
			<div class="row">
        <div id="sidebar" class="col-sm-3">
          <?php get_sidebar('anatomy'); ?>
        </div>
        <div id="content_area" class="col-sm-9">
					<h2 class="subpage-title">All Anatomy</h2>
          <div class="anatomy-description">
            <?php dynamic_sidebar( 'anatomy-lending' ); ?>
          </div>
          <div class="btn-group btn-grid-list" data-toggle="buttons" style="margin-bottom: 1em">
            <label class="btn btn-primary view-button active">
              <input type="radio" name="views" autocomplete="off" value="grid" checked><i class="fa fa-th"></i> Grid
            </label>
            <label class="btn btn-primary view-button">
              <input type="radio" name="views"  autocomplete="off" value="list"> <i class="fa fa-th-list"></i> List
            </label>
          </div>
          <div id="list_view" class="view">
            <div class="card">
              <div class="table-responsive">
                <table class="table table-striped table-sorter anatomy-list">
                  <thead>
                    <tr>
                      <th class="empty-cell"><span class="sr-only">Item Image</span></th>
                      <th><i class="fa fa-exclamation-circle"></i> Item Name</th>
                      <th><i class="fa fa-university"></i> Library</th>
                      <th><i class="fa fa-usd"></i> Fine Policy</th>
                      <th><i class="fa fa-check-circle"></i> Availability</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
                    <tr>
                      <td><a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail('thumbnail', array('class' => 'list-thumbnail')); ?></a></td>
                      <td><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></td>
                      <td>
                        <?php 
                          if(get_the_term_list( $post->ID, 'a_library', true)): 
                            echo get_the_term_list( $post->ID, 'a_library', '', ', ', '' ); 
                          endif;
                        ?>
                      </td>
                      <td>
                        <?php if(get_post_meta($post->ID, 'fine-policy', true)): ?>
                          <a href="<?php echo get_post_meta($post->ID, 'fine-policy', true); ?>">Fine Policy</a></li>
                        <?php endif; ?>
                      </td>
                      <td>
                        <?php if(get_post_meta($post->ID, 'availability', true)): ?>
                          <a href="<?php echo get_permalink(); ?>#item_availability">Check Availability</a></li>
                        <?php endif; ?>
                      </td>
                    </tr>
                  <?php endwhile; else: ?>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>                      
                      <td></td>                      
                    </tr>
                  <?php endif; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
					<div id="grid_view" class="directory row view view-active">
  					<?php $i = 0; ?>
  					<?php if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
  						<?php $i++; ?>
  						<div class="col-xs-6 col-md-4 col-lg-3">
  			    		<div class="thumbnail">
  			    			<figure><a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail('anatomy-thumbnail', array('class' => 'anatomy-thumbnail')); ?></a></figure>
    							<div class="caption">
    								<h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
    								<?php if(get_the_term_list( $post->ID, 'anatomy_type', true) ||
                      get_the_term_list( $post->ID, 'a_library', true) ||
                      get_post_meta($post->ID, 'fine-policy', true) ||
                      get_post_meta($post->ID, 'availability', true)
                    ): ?>
    								<ul>
  										<?php if(get_the_term_list( $post->ID, 'anatomy_type', true)): ?>
  											<li><i class="fa fa-info-circle" data-toggle="tooltip" data-placement="right" title="Anatomy Type"></i><?php echo get_the_term_list( $post->ID, 'anatomy_type', '', ', ', '' ); ?></li>
  										<?php endif; ?>
                      <?php if(get_the_term_list( $post->ID, 'a_library', true)): ?>
                        <li><i class="fa fa-university" data-toggle="tooltip" data-placement="right" title="Library"></i><?php echo get_the_term_list( $post->ID, 'a_library', '', ', ', '' ); ?></li>
                      <?php endif; ?>
                      <?php if(get_post_meta($post->ID, 'fine-policy', true)): ?>
                        <li><i class="fa fa-usd" data-toggle="tooltip" data-placement="right" title="Fine Policy"></i> <a href="<?php echo get_post_meta($post->ID, 'fine-policy', true); ?>">Fine Policy</a></li>
                      <?php endif; ?>
                      <?php if(get_post_meta($post->ID, 'availability', true)): ?>
  											<li><i class="fa fa-check-circle" data-toggle="tooltip" data-placement="right" title="Check Availability"></i> <a href="<?php echo get_permalink(); ?>#item_availability">Check Availability</a></li>
  										<?php endif; ?>
    								</ul>
      							<?php endif; ?>
      						</div><!-- caption -->
      					</div><!-- thumbnail -->
    					</div><!-- col-xs-6 col-md-4 col-lg-3 -->
              <?php if ($i % 4 == 0) : //adds a clearfix every 3 items. ?>
                  <div class="clearfix visible-lg-block"></div>
              <?php endif; ?>
              <?php if ($i % 3 == 0) : //adds a clearfix every 2 items. ?>
                  <div class="clearfix visible-md-block"></div>
              <?php endif; ?>
              <?php if ($i % 2 == 0) : //adds a clearfix every 3 items. ?>
                  <div class="clearfix visible-sm-block visible-xs-block"></div>
              <?php endif; ?> 
            <?php endwhile; else: ?>
  					<?php wp_reset_query(); // Restore global post data stomped by the_post(). ?>
  					<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
  				</div><!-- directory row -->
  			</div><!-- col-sm-9 -->
  		</div><!-- row -->
  	</div><!-- container -->
  </div><!-- background-color-gray -->
</div><!-- main -->

<?php get_footer(); ?>
