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
<h1 class="sr-only"><?php bloginfo('name')?> Homepage</h1>
<div id="main">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  		<?php the_content(__('(more...)')); ?>
		<?php endwhile; else: ?>
		<?php _e('Sorry, no posts matched your criteria.'); ?><?php endif; ?>
</div>
<script type="text/javascript">

jQuery(document).ready(function() {
    <?php // hooks into advanced custom fields to allow new background images to be added in the wordpress editor
      if(get_post_meta($post->ID, 'background_images', true)):
        $background_images = get_post_meta($post->ID, 'background_images', true);
        echo "let images = [$background_images];";
        echo "images = images[Math.floor(Math.random() * images.length)];";
      else:
        $directory = get_template_directory_uri().'/images/';
        echo "let directory = '$directory';";
        echo "let images = '$directory' + 'bg-11-hitt-new-entrance.jpg';";
      endif;
    ?>
    jQuery('.background-image').css({'background-image': 'url('+ images +')'});
   });
</script>
<?php get_footer(); ?>