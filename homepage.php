<?php
/*
Template Name: Home Page
Description: A Template for the Website homepage.
*/

add_filter( 'wp_title', 'baw_hack_wp_title_for_home' );
function baw_hack_wp_title_for_home( $title )
{
  if( empty( $title ) && ( is_home() || is_front_page() ) ) {
    return __( 'Home', 'theme_domain' );
  }
  return $title;
}
?>

<?php
/*
Generate a random backround from the list below.
*/
  $directory = get_template_directory_uri().'/images/';
?>


<?php get_header(); ?>
<h1 class="sr-only">UCF Libraries Website Homepage</h1>
<div id="main">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <?php if(get_post_meta($post->ID, 'success', true) || get_post_meta($post->ID, 'info', true) || get_post_meta($post->ID, 'warning', true) || get_post_meta($post->ID, 'danger', true)): ?>
        <?php if(get_post_meta($post->ID, 'success', true)): ?>
          <div id="banner_message" class="homepage-banner banner-success">
            <div class="container">
              <p>
                <button type="button" id="banner_close_btn" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>
                <?php echo(get_post_meta($post->ID, 'success', true)); ?>
              </p>
            </div>
          </div>
        <?php endif; ?>
        <?php if(get_post_meta($post->ID, 'info', true)): ?>
          <div id="banner_message" class="homepage-banner banner-info">
            <div class="container">
              <p>
                <button type="button" id="banner_close_btn" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>
                <?php echo(get_post_meta($post->ID, 'info', true)); ?>
              </p>
            </div>
          </div>
        <?php endif; ?>
        <?php if(get_post_meta($post->ID, 'warning', true)): ?>
          <div id="banner_message" class="homepage-banner banner-warning">
            <div class="container">
              <p>
                <button type="button" id="banner_close_btn" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>
                <?php echo(get_post_meta($post->ID, 'warning', true)); ?>
              </p>
            </div>
          </div>
        <?php endif; ?>
        <?php if(get_post_meta($post->ID, 'danger', true)): ?>
          <div id="banner_message" class="homepage-banner banner-danger">
            <div class="container">
              <p>
                <button type="button" id="banner_close_btn" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>
                <?php echo(get_post_meta($post->ID, 'danger', true)); ?>
              </p>
            </div>
          </div>
        <?php endif; ?>
      <?php endif; ?>
  		<?php the_content(__('(more...)')); ?>
		<?php endwhile; else: ?>
		<?php _e('Sorry, no posts matched your criteria.'); ?><?php endif; ?>
</div>
<script type="text/javascript">

$(document).ready(function() {
	<?php
	 $directory = get_template_directory_uri().'/images/';
 	 echo "var directory = '$directory';";
	 ?>
    var images = ['bg-01-main.jpg', 'bg-02-rosen.jpg', 'bg-03-glass.jpg', 'bg-05-lake-sumter.jpg', 'bg-06-palm-bay.jpg'];
    $('.background-image').css({'background-image': 'url('+ directory + images[Math.floor(Math.random() * images.length)] + ')'});
   });
</script>
<?php get_footer(); ?>