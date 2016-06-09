<?php
/*
Description: eligible user taxonomy archive.
*/

?>
 <?php
	global $wp_query;
	query_posts(
    array_merge(
      $wp_query->query,
      array(
        'orderby' => 'title',
        'order' => 'ASC',
        'posts_per_page' => 200
      )
	  )
  );
?>

<?php get_header(); ?>
<div id="main">
	<div id="title_bar" class="container">
	 <!-- taxonomy.php -->
		<div class="row">
			<div class="col-sm-8">
				<header><h1>Technology Lending</h1></header>
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
          <?php get_sidebar('tech'); ?>
        </div>
        <div id="content_area" class="col-sm-9">
					<h2 class="subpage-title"><?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); echo $term->name; ?></h2>
          <div class="tech-description">
            <?php echo term_description( ) ?>
          </div>
          <div class="tech-description">
            <?php dynamic_sidebar( 'technology-lending' ); ?>
          </div>
          <div class="btn-group btn-grid-list" data-toggle="buttons">
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
                <table class="table table-striped table-sorter tech-list">
                  <thead>
                    <tr>
                      <th class="empty-cell"></th>
                      <th><i class="fa fa-exclamation-circle"></i> Item Name</th>
                      <th><i class="fa fa-hourglass"></i> Loan Period</th>
                      <th><i class="fa fa-users"></i> Eligible Users</th>
                      <th><i class="fa fa-university"></i> Library</th>
                      <th><i class="fa fa-usd"></i> Fine Policy</th>
                      <th><i class="fa fa-check-circle"></i> Availability</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <tr>
                      <td><a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail('thumbnail', array('class' => 'list-thumbnail')); ?></a></td>
                      <td><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></td>
                      <td>
                        <?php 
                          if(get_the_term_list( $post->ID, 'loan_period', true)): 
                            echo get_the_term_list( $post->ID, 'loan_period', '', ', ', '' ); 
                          endif;
                        ?>
                      </td>
                      <td>
                        <?php 
                          if(get_the_term_list( $post->ID, 'eligible_user', true)): 
                            echo get_the_term_list( $post->ID, 'eligible_user', '', ', ', '' ); 
                          endif;
                        ?>
                      </td>
                      <td>
                        <?php 
                          if(get_the_term_list( $post->ID, 'library', true)): 
                            echo get_the_term_list( $post->ID, 'library', '', ', ', '' ); 
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
					 <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<?php $i++; ?>
							<div class="col-xs-6 col-md-4 col-lg-3">
				    		<div class="thumbnail">
                  <figure><a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail('staff-thumbnail', array('class' => 'staff-thumbnail')); ?></a></figure>
  								<div class="caption">
  								  <h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <?php if(get_the_term_list( $post->ID, 'loan_period', true) ||
                      get_the_term_list( $post->ID, 'eligible_user', true) ||
                      get_the_term_list( $post->ID, 'library', true) ||
                      get_post_meta($post->ID, 'fine-policy', true) ||
                      get_post_meta($post->ID, 'availability', true)
                    ): ?>
      								<ul>
                      <?php if(get_the_term_list( $post->ID, 'loan_period', true)): ?>
                        <li><i class="fa fa-hourglass" data-toggle="tooltip" data-placement="right" title="Loan Period"></i><?php echo get_the_term_list( $post->ID, 'loan_period', '', ', ', '' ); ?></li>
                      <?php endif; ?>
                      <?php if(get_the_term_list( $post->ID, 'eligible_user', true)): ?>
                        <li><i class="fa fa-users" data-toggle="tooltip" data-placement="right" title="Eligible Users"></i><?php echo get_the_term_list( $post->ID, 'eligible_user', '', ', ', '' ); ?></li>
                      <?php endif; ?>
                      <?php if(get_the_term_list( $post->ID, 'library', true)): ?>
                        <li><i class="fa fa-university" data-toggle="tooltip" data-placement="right" title="Library"></i><?php echo get_the_term_list( $post->ID, 'library', '', ', ', '' ); ?></li>
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
           <p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
					</div><!-- directory row -->
					<?php wp_reset_query(); // Restore global post data stomped by the_post(). ?>
				</div><!-- col-sm-9 -->
			</div><!-- row -->
		</div><!-- container -->
	</div><!-- background-color-gray -->
</div><!-- main -->
<?php get_footer(); ?>
