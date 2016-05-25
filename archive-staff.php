<?php
/*
Description: Archive staff member page.
*/
?>
<?php
	$args=array(
	'post_type' => 'staff',
  'posts_per_page' => 200,
	'orderby' => 'title',
	'order' => 'ASC');
	$my_query = null;
	$my_query = new WP_Query($args);
 ?>

<?php get_header(); ?>
<div id="main">
	<div id="content" class="container">
		<div class="row">
			<div class="col-sm-8">
				<header><h1>Staff Directory</h1></header>
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
				<div class="col-sm-3">
					<?php get_sidebar('staff'); ?>
				</div><!-- col-sm-3 -->
				<div class="col-sm-9">
					<h2 class="subpage-title">All Staff</h2>
          <div class="btn-group" data-toggle="buttons" style="margin-bottom: 1em">
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
                <table class="table table-striped" style="text-align: left;">
                  <tbody>
                    <tr>
                      <th></th>
                      <th><span class="glyphicon glyphicon-user"></span> Name</th>
                      <th><i class="fa fa-bookmark"></i> Title</th>
                      <th><i class="fa fa-university"></i> Department</th>
<!--                       <th><i class="fa fa-university"></i> Room</th> -->
                      <th><span class="glyphicon glyphicon-phone-alt"></span> Phone</th>
                      <th><span class="glyphicon glyphicon-envelope"></span> Email</th>
                    </tr>
                  <?php if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
                    <tr>
                      <td><a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail('thumbnail', array('class' => 'list-thumbnail')); ?></a></td>
                      <td><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></td>
                      <td>
                        <?php if(get_post_meta($post->ID, 'title', true)): ?>
                          <?php echo get_post_meta($post->ID, 'title', true); ?>
                        <?php endif; ?>
                      </td>
                      <td>
                        <?php if(get_the_term_list( $post->ID, 'department', true)): ?>
                          <?php echo get_the_term_list( $post->ID, 'department', '', ', ', '' ); ?>
                        <?php endif; ?>
                      </td>
<!--                       <td>
                        <?php if(get_post_meta($post->ID, 'room', true)): ?>
                          <?php echo get_post_meta($post->ID, 'room', true); ?>
                        <?php endif; ?>
                      </td>  -->
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
  			    			<figure><a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail('staff-thumbnail', array('class' => 'staff-thumbnail')); ?></a></figure>
    							<div class="caption">
    								<h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
    								<?php if(get_post_meta($post->ID, 'title', true) ||
    									 get_post_meta($post->ID, 'room', true) ||
    									 get_post_meta($post->ID, 'phone', true) ||
    									 get_post_meta($post->ID, 'email', true)
    								): ?>
    								<ul>
  										<?php if(get_post_meta($post->ID, 'title', true)): ?>
  											<li><span class="glyphicon glyphicon-user" data-toggle="tooltip" data-placement="right" title="Position"></span> <?php echo get_post_meta($post->ID, 'title', true); ?></li>
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
  											<li><span class="glyphicon glyphicon-envelope" data-toggle="tooltip" data-placement="right" title="Email"></span><a href="mailto:<?php echo get_post_meta($post->ID, 'email', true); ?>"> <span class="ellipsis"> <?php echo get_post_meta($post->ID, 'email', true); ?></span></a></li>
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
