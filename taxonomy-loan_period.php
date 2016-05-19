<?php
/*
Description: tech type archive page.
*/

//locate_template( 'archive-tech.php', true );

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
				<div class="col-sm-3">
					<?php get_sidebar('tech'); ?>
				</div><!-- col-sm-3 -->
				<div class="col-sm-9">
					<h2 class="subpage-title"><?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); echo $term->name; ?></h2>
					<?php echo term_description( ) ?>
					<div class="directory row">
					 <?php $i = 0; ?>
					 <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<?php $i++; ?>
							<div class="col-xs-6 col-md-4 col-lg-3">
				    		<div class="thumbnail">
  				    			<figure><a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail('staff-thumbnail', array('class' => 'staff-thumbnail')); ?></a></figure>
  									<div class="caption">
  										<h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
                      <?php if(get_the_term_list( $post->ID, 'loan_period', true) ||
                         get_post_meta($post->ID, 'availability', true)
                      ): ?>

    										<ul>
                            <?php if(get_the_term_list( $post->ID, 'loan_period', true)): ?>
                              <li><i class="fa fa-hourglass" data-toggle="tooltip" data-placement="right" title="Loan Period"></i><?php echo get_the_term_list( $post->ID, 'loan_period', '', ', ', '' ); ?></li>
                            <?php endif; ?>

                            <?php if(get_post_meta($post->ID, 'availability', true)): ?>
                              <li><i class="fa fa-question-circle" data-toggle="tooltip" data-placement="right" title="Check Availability"></i> <a href="<?php echo get_post_meta($post->ID, 'availability', true); ?>">Check Availability</li>
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
