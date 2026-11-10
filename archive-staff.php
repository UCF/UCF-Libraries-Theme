<?php
/*
Description: Archive staff member page.
*/
?>
<?php
	$args=array(
	'post_type' => 'staff',
  'posts_per_page' => 1000,
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
				<header><h1 class="display-3 fw-semibold mt-5 mb-3">Staff Directory</h1></header>
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
				<div id="sidebar" class="col-md-3">
					<?php get_sidebar('staff'); ?>
				</div><!-- col-md-3 -->
				<div id="content_area" class="col-md-9">
					<h2 class="display-5 fw-semibold mt-3 mb-3">All Staff</h2>
          <fieldset>
            <legend class="visually-hidden">View Options</legend>
            <div class="btn-group btn-grid-list" data-bs-toggle="buttons" role="radiogroup" aria-label="Grid or List View Toggle">
              <input type="radio" class="btn-check" name="views" id="grid_view_btn" value="grid" checked> 
              <label class="btn btn-primary " for="grid_view_btn"><i class="fa fa-th"></i> Grid</label>
              <input type="radio" class="btn-check" name="views" id="list_view_btn" value="list"> 
              <label class="btn btn-primary " for="list_view_btn"><i class="fa fa-th-list"></i> List</label>
            </div>
          </fieldset>
          <div id="list_view" class="view">
            <div class="card">
              <div class="table-responsive">
                <table class="table table-striped table-sorter">
                  <thead>
                    <tr>
                      <th class="empty-cell"><span class="visually-hidden">Staff Image</span></th>
                      <th style="min-width: 10em;"><i class="fa fa-user" aria-hidden="true"></i> Name</th>
                      <th><i class="fa fa-bookmark"></i> Title</th>
                      <th><i class="fa fa-graduation-cap"></i> Rank</th>
                      <th style="min-width: 10em;"><i class="fa fa-university"></i> Department</th>
                      <th style="min-width: 6.75em;"><i class="fa fa-book"></i> Subject</th>
                      <th style="min-width: 10em;"><i class="fa fa-phone" aria-hidden="true"></i> Phone</th>
                      <th style="min-width: 6em;"><i class="fa fa-envelope"></i> Email</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
                    <tr>
                      <td><?php the_post_thumbnail('thumbnail', array('class' => 'list-thumbnail', 'alt' => '')); ?></td>
                      <td><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></td>
                      <td>
                        <?php if(get_post_meta($post->ID, 'title', true)): ?>
                          <?php echo get_post_meta($post->ID, 'title', true); ?>
                        <?php endif; ?>
                      </td>
                      <td>
                        <?php if(get_post_meta($post->ID, 'rank', true)): ?>
                          <?php echo get_post_meta($post->ID, 'rank', true); ?>
                        <?php endif; ?>
                      </td>
                      <td>
                        <?php if(get_the_term_list( $post->ID, 'department', true)): ?>
                          <?php echo get_the_term_list( $post->ID, 'department', '', ', ', '' ); ?>
                        <?php endif; ?>
                      </td>
                      <td>
                        <?php if(get_modified_term_list( $post->ID, 'subject', '', ', ', '', array('all') )): ?>
                          <?php echo get_modified_term_list( $post->ID, 'subject', '', ', ', '', array('all') ); ?>
                        <?php endif; ?>
                      </td>
                      <td>
                        <?php if(get_post_meta($post->ID, 'phone', true)): ?>
                          <?php echo get_post_meta($post->ID, 'phone', true); ?>
                        <?php endif; ?>
                      </td>
                      <td>
                        <?php if(get_post_meta($post->ID, 'email', true)): ?>
                          <a href="mailto:<?php echo get_post_meta($post->ID, 'email', true); ?>">Email</a>
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
                      <td></td>
                    </tr>
                  <?php endif; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
					<div id="grid_view" class="directory grid view">
  					<?php $i = 0; ?>
  					<?php if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
  						<?php $i++; ?>
  						<div class="grid-item ">
  			    		<div class="card content-card">
                  <a href="<?php echo get_permalink(); ?>">
                    <figure><?php the_post_thumbnail('staff-thumbnail', array('class' => 'staff-thumbnail', 'alt' => '')); ?></figure>
                    <h3  id="staff-name-<?php echo $post->ID; ?>"><?php the_title(); ?></h3>
                  </a>
    							<div class="caption">
    								
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
                        <li><i class="fa fa-bookmark" data-bs-toggle="tooltip" data-placement="right" title="Title"></i><?php echo get_post_meta($post->ID, 'title', true); ?></li>
  										<?php endif; ?>

                      <?php if(get_post_meta($post->ID, 'rank', true)): ?>
                        <li><i class="fa fa-graduation-cap" data-bs-toggle="tooltip" data-placement="right" title="Rank"></i><?php echo get_post_meta($post->ID, 'rank', true); ?></li>
                      <?php endif; ?>

  										<?php if(get_the_term_list( $post->ID, 'department', true)): ?>
  											<li><i class="fa fa-university" data-bs-toggle="tooltip" data-placement="right" title="Department"></i><?php echo get_the_term_list( $post->ID, 'department', '', ', ', '' ); ?></li>
  										<?php endif; ?>

                      <?php if(get_post_meta($post->ID, 'college', true)): ?>
													<li><img alt="College Lead" class="college-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/images/PegasusIcon.png" data-bs-toggle="tooltip" data-placement="right" title="College Lead"><?php echo get_post_meta($post->ID, 'college', true); ?></li>
												<?php endif; ?>

                      <?php if(get_modified_term_list( $post->ID, 'subject', '', ', ', '', array('all') )): ?>
  													<li><i class="fa fa-book" data-bs-toggle="tooltip" data-placement="right" title="Subject"></i><?php echo get_modified_term_list( $post->ID, 'subject', '', ', ', '', array('all') ); ?></li>
  												<?php endif; ?>

  										<?php if(get_post_meta($post->ID, 'room', true)): ?>
  											<li><i class="fa fa-map-marker" aria-hidden="true" data-bs-toggle="tooltip" data-placement="right" title="Location"></i> <?php echo get_post_meta($post->ID, 'room', true); ?></li>
  										<?php endif; ?>

  										<?php if(get_post_meta($post->ID, 'phone', true)): ?>
  											<li><i class="fa fa-phone-square" aria-hidden="true" data-bs-toggle="tooltip" data-placement="right" title="Phone"></i><?php echo get_post_meta($post->ID, 'phone', true); ?></li>
  										<?php endif; ?>

  										<?php if(get_post_meta($post->ID, 'email', true)): ?>
  											<li><i class="fa fa-envelope" data-bs-toggle="tooltip" data-placement="right" title="Email"></i><a href="mailto:<?php echo get_post_meta($post->ID, 'email', true); ?>"> <span class="ellipsis"> <?php echo get_post_meta($post->ID, 'email', true); ?></span></a></li>
  										<?php endif; ?>
    								</ul>
      							<?php endif; ?>
                    </div><!-- caption -->
      					</div><!-- thumbnail -->
    					</div><!-- grid-item -->
            <?php endwhile; else: ?>
            <?php wpbeginner_numeric_posts_nav(); ?>
  					<?php wp_reset_query(); // Restore global post data stomped by the_post(). ?>
  					<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
  				</div><!-- directory row -->
  			</div><!-- col-md-9 -->
  		</div><!-- row -->
  	</div><!-- container -->
  </div><!-- background-color-gray -->
</div><!-- main -->
<?php get_footer(); ?>
