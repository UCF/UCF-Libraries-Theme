<?php
/*
Description: Archive tech page.
*/
?>
<?php
	$args=array(
	'post_type' => 'tech',
  'posts_per_page' => 200,
	'orderby' => 'title',
	'order' => 'ASC');
	$my_query = null;
	$my_query = new WP_Query($args);
 ?>
<?php $taxonomies = get_taxonomies();?>

<?php get_header(); ?>
<div id="main">
	<div id="title_bar" class="container">
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
          <aside>	
            <div id="secondary" class="secondary taxonomy-filter">
              <div id="widget-area-2" class="widget-area" role="complementary">
                <h3>Filters</h3>
                <p>Select filters below to narrow results:</p>
                <p style="text-align:center;"><button id="clear_all" class="btn btn-default">Clear All Filters</button></p>
                <div class="sidebar-collapse">
                  <h4 class="widget-title"><a class="menu-toggle" data-toggle="collapse" href="#Library" aria-expanded="true" aria-controls="Library"><span class="glyphicon glyphicon-minus-sign" style="float:right"></span><i class="fa fa-university"></i> Library</a></h4>
                  <div class="collapse in" id="Library">
                    <?php taxonomy_filter('library');	?>
                  </div>
                </div>
                <div class="sidebar-collapse">
                  <h4 class="widget-title"><a class="menu-toggle" data-toggle="collapse" href="#TechType" aria-expanded="true" aria-controls="Tech Type"><span class="glyphicon glyphicon-minus-sign" style="float:right"></span><i class="fa fa-info-circle" aria-hidden="true"></i> Tech Type</a></h4>
                  <div class="collapse in" id="Tech_Type">
                      <?php taxonomy_filter('tech_type');	?>
                  </div>
                </div>
                <div class="sidebar-collapse">
                  <h4 class="widget-title"><a class="menu-toggle" data-toggle="collapse" href="#Loan_Period" aria-expanded="true" aria-controls="Loan Period"><span class="glyphicon glyphicon-minus-sign" style="float:right"></span><i class="fa fa-hourglass"></i> Loan Period</a></h4>
                  <div class="collapse in" id="Loan_Period">
                      <?php taxonomy_filter('loan_period');	?>
                  </div>
                </div>
                <div class="sidebar-collapse">
                  <h4 class="widget-title"><a class="menu-toggle" data-toggle="collapse" href="#Eligible_User" aria-expanded="true" aria-controls="Eligible User"><span class="glyphicon glyphicon-minus-sign" style="float:right"></span><i class="fa fa-users"></i> Eligible User</a></h4>
                  <div class="collapse in" id="Eligible_User">
                      <?php taxonomy_filter('eligible_user');	?>
                  </div>
                </div>
              </div><!-- .widget-area -->
            </div>
          </aside>
        </div>
        <div id="content_area" class="col-sm-9">
          <div class="tech-description">
            <?php dynamic_sidebar( 'technology-lending' ); ?>
          </div>
          <div class="btn-group btn-grid-list" data-toggle="buttons" style="margin-bottom: 1em">
            <label class="btn btn-primary view-button active">
              <input type="radio" name="views" autocomplete="off" value="grid" checked><i class="fa fa-th"></i> Grid
            </label>
            <label class="btn btn-primary view-button">
              <input type="radio" name="views"  autocomplete="off" value="list"> <i class="fa fa-th-list"></i> List
            </label>
          </div>
          <div class="lds-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
          <div id="list_view" class="view">
            <div class="card">
              <div class="table-responsive">
                <table class="table table-striped table-sorter tech-list">
                  <thead>
                    <tr>
                      <th class="empty-cell"><span class="sr-only">Item Image</span></th>
                      <th><i class="fa fa-exclamation-circle"></i> Item Name</th>
                      <th><i class="fa fa-hourglass"></i> Loan Period</th>
                      <th><i class="fa fa-users"></i> Eligible Users</th>
                      <th><i class="fa fa-university"></i> Library</th>
                      <th><i class="fa fa-usd"></i> Fine Policy</th>
                      <th><i class="fa fa-check-circle"></i> Availability</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
                    <?php $slug = get_post_field( 'post_name', get_post() ); ?>
                    <?php $data_categories =''; ?>
                    <?php
                      foreach($taxonomies as $taxonomy) {
                        if(get_the_term_list( $post->ID, $taxonomy, true)){
                          $term_list = strip_tags( get_the_term_list( $post->ID, $taxonomy, '', 'tagplace', '' ));
                          $term_list = title_to_slug($term_list);
                          $term_list = str_replace('tagplace', ' ', $term_list);
                          $term_list = str_replace('-amp', '', $term_list);
                          $data_categories = $data_categories.' data-'.$taxonomy.'="'.$term_list.'" ';
                        }
                      }
                    ?>
                    <tr class="taxonomy-item" data-id="<?php echo ($slug) ?>" <?php echo ($data_categories) ?>>
                      <td><a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail('thumbnail', array('class' => 'list-thumbnail')); ?></a></td>
                      <td><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></td>
                      <td>
                        <?php 
                          if(get_the_term_list( $post->ID, 'loan_period', true)): 
                            echo strip_tags( get_the_term_list( $post->ID, 'loan_period', '', ', ', '' )); 
                          endif;
                        ?>
                      </td>
                      <td>
                        <?php 
                          if(get_the_term_list( $post->ID, 'eligible_user', true)): 
                            echo strip_tags( get_the_term_list( $post->ID, 'eligible_user', '', ', ', '' )); 
                          endif;
                        ?>
                      </td>
                      <td>
                        <?php 
                          if(get_the_term_list( $post->ID, 'library', true)): 
                            echo strip_tags( get_the_term_list( $post->ID, 'library', '', ', ', '' )); 
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
					<div id="grid_view" class="directory grid view">
  					<?php $i = 0; ?>
  					<?php if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
  						<?php $i++; ?>
              <?php $slug = get_post_field( 'post_name', get_post() ); ?>
              <?php $data_categories =''; ?>
              <?php
                foreach($taxonomies as $taxonomy) {
                  if(get_the_term_list( $post->ID, $taxonomy, true)){
                    $term_list = strip_tags( get_the_term_list( $post->ID, $taxonomy, '', 'tagplace', '' ));
                    $term_list = title_to_slug($term_list);
                    $term_list = str_replace('tagplace', ' ', $term_list);
                    $term_list = str_replace('-amp', '', $term_list);
                    $data_categories = $data_categories.' data-'.$taxonomy.'="'.$term_list.'" ';
                  }
                }
              ?>
  						<div class="grid-item taxonomy-item" data-id="<?php echo ($slug) ?>" <?php echo ($data_categories) ?>>
  			    		<div class="thumbnail">
  			    			<figure><a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail('staff-thumbnail', array('class' => 'staff-thumbnail')); ?></a></figure>
    							<div class="caption">
    								<h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
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
                      <?php if(get_post_meta($post->ID, 'availability', true)): ?>
  											<li><i class="fa fa-check-circle" data-toggle="tooltip" data-placement="right" title="Check Availability"></i> <a href="<?php echo get_permalink(); ?>#item_availability">Check Availability</a></li>
  										<?php endif; ?>
    								</ul>
      							<?php endif; ?>
      						</div><!-- caption -->
      					</div><!-- thumbnail -->
    					</div><!-- grid-item -->
            <?php endwhile; else: ?>
  					<?php wp_reset_query(); // Restore global post data stomped by the_post(). ?>
  					<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
  				</div><!-- directory row -->
  			</div><!-- col-sm-9 -->
  		</div><!-- row -->
  	</div><!-- container -->
  </div><!-- background-color-gray -->
</div><!-- main -->
<script>
let categories = ['library', 'tech_type', 'loan_period', 'eligible_user'];
$('.taxonomy-filter').on('change', 'input:checkbox', function (){taxonomy_filter(categories);});
$('#clear_all').on('click', function(){
    $('input:checkbox').removeAttr('checked');
    taxonomy_filter();
});
$(document).ready( function(){
  $('.lds-spinner').hide();
  $('#grid_view').addClass('view-active');
  pre_check_box();
});
</script>
<?php get_footer(); ?>
