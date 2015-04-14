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
  $directory = get_template_directory_uri();
  $bg = array('bg-01-main.jpg', 'bg-02-rosen.jpg'); // array of filenames

  $i = rand(0, count($bg)-1); // generate random number size of the array
  $selectedBg = "$bg[$i]"; // set variable equal to which random filename was chosen
?>


<style type="text/css">
<!--
.background-image::after {
	background: url(<?php echo $directory.'/images/'.$selectedBg; ?>) no-repeat;
}
-->
</style>
s
<?php get_header(); ?>
<div id="main">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<?php the_content(__('(more...)')); ?>
		<?php endwhile; else: ?>
		<?php _e('Sorry, no posts matched your criteria.'); ?><?php endif; ?>
</div>
<div id="delimiter"></div>
<?php get_footer(); ?>