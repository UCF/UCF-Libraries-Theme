<?php
/*
Template Name: Blank Template
Description: This page contains now elements of wordpress. It is used purely for content to be served up to another location.
*/
?>
<!DOCTYPE HTML>
<html>

<head>
<meta content="en-us" http-equiv="Content-Language">
<meta content="text/html; charset=windows-1252" http-equiv="Content-Type">
<title><?php the_title(); ?></title>
<meta content="width=device-width" name="viewport">
<meta content="IE=edge" http-equiv="X-UA-Compatible">
</head>
<body>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?php the_content(__('(more...)')); ?>
<?php endwhile; else: ?>
<?php _e('Sorry, no posts matched your criteria.'); ?><?php endif; ?>
</body>
</html>