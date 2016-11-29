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
					<div class="directory row">
						<?php $i = 0; ?>
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<?php $i++; ?>
							<div class="card">
								<div class="media">
								  <div class="media-left">
								    <a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
								  </div>
								  <div class="media-body">
								    <h4 class="media-heading"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h4>
								    <?php if(get_post_meta($post->ID, 'sc-bio', true)): ?>
		                  <?php echo get_post_meta($post->ID, 'sc-bio', true); ?>
		                <?php endif; ?>
								  </div>
								</div>
							</div>				
            <?php endwhile; else: ?>
              <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
            <?php endif; ?>
					</div><!-- directory row -->
					<?php wp_reset_query(); // Restore global post data stomped by the_post(). ?>
				</div><!-- col-sm-9 -->
			</div><!-- row -->
		</div><!-- container -->
	</div><!-- background-color-gray -->
</div><!-- main -->
<?php get_footer(); ?>
