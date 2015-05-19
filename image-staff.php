<?php
/*
Template Name: Staff Image
Description: This template is to be used to include the image of a staff member.
*/
?>
<?php the_post(); ?>
<?php the_post_thumbnail('staff-thumbnail', array('class' => 'staff-thumbnail')); ?>