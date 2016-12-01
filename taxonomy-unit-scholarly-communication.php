<?php
/*
Description: Scholarly Commnunication archive page.
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
	<div id="content" class="container">
    <!-- taxonomy-unit-subject-librarians.php -->
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
					<h2 class="subpage-title"><?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); echo $term->name; ?></h2>
					<?php echo term_description( ) ?>
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
                <table class="table table-striped table-sorter">
                  <thead>
                    <tr>
                      <th class="empty-cell"></th>
                      <th><span class="glyphicon glyphicon-user"></span> Name</th>
                      <th><i class="fa fa-bookmark"></i> Title</th>
                      <th><i class="fa fa-university"></i> Department</th>
                      <th style="min-width: 10em;"><span class="glyphicon glyphicon-phone-alt"></span> Phone</th>
                      <th style="min-width: 6em;"><span class="glyphicon glyphicon-envelope"></span> Email</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
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
          <div id="grid_view" class="view view-active">
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<div class="card">
								<div class="media">
								  <div class="media-left">
								    <a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
								  </div>
								  <div class="media-body">
								    <h4 class="media-heading"><a href="<?php echo get_permalink(); ?>"><?php friendly_name(); ?></a></h4>
								    <?php if(get_post_meta($post->ID, 'sc-bio', true)): ?>
		                  <?php echo get_post_meta($post->ID, 'sc-bio', true); ?>
		                <?php endif; ?>
								  </div>
								</div>
							</div>				
	          <?php endwhile; else: ?>
	            <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	          <?php endif; ?>
          </div>
					<?php wp_reset_query(); // Restore global post data stomped by the_post(). ?>
				</div><!-- col-sm-9 -->
			</div><!-- row -->
		</div><!-- container -->
	</div><!-- background-color-gray -->
</div><!-- main -->
<?php get_footer(); ?>
