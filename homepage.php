<?php
/*
Template Name: Home Page
Description: A Template for the Website homepage.
*/
?>

<?php
/*
Generate a random backround from the list below.
*/
  $directory = get_template_directory_uri().'/images/';
?>


<?php get_header(); ?>
<div id="main">
<div style="width:200px; margin: 0 auto;"></div>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<?php the_content(__('(more...)')); ?>
		<?php endwhile; else: ?>
		<?php _e('Sorry, no posts matched your criteria.'); ?><?php endif; ?>
</div>
<div id="delimiter"></div>
<script type="text/javascript">

$(document).ready(function() {
	<?php
	 $directory = get_template_directory_uri().'/images/';
 	 echo "var directory = '$directory';";
	 ?>
    var images = ['bg-01-main.jpg', 'bg-02-rosen.jpg'];
    $('.background-image').css({'background-image': 'url('+ directory + images[Math.floor(Math.random() * images.length)] + ')'});
   });
</script>
<?php get_footer(); ?>