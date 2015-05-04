<?php
/*
Template Name: Staff Card
Description: This template is only for including a staff member card onto a page. Using it for a full page template will break the page.
*/
?>
<?php the_post(); ?>
<div class="thumbnail">
	<figure><a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail('staff-thumbnail', array('class' => 'staff-thumbnail')); ?></a></figure>
	<div class="caption">
		<h3><a href="<?php echo get_permalink(); ?>"><?php friendly_name(); ?></a></h3>
		<?php if(get_post_meta($post->ID, 'title', true) ||
			get_post_meta($post->ID, 'room', true) ||
			 get_post_meta($post->ID, 'phone', true) ||
			 get_post_meta($post->ID, 'email', true)
		): ?>

		<ul>
			<?php if(get_post_meta($post->ID, 'title', true)): ?>
			<li><span class="glyphicon glyphicon-user"></span> <?php echo get_post_meta($post->ID, 'title', true); ?></li>
			<?php endif; ?>

			<?php if(get_post_meta($post->ID, 'room', true)): ?>
			<li><span class="glyphicon glyphicon-map-marker"></span> <?php echo get_post_meta($post->ID, 'room', true); ?></li>
			<?php endif; ?>

			<?php if(get_post_meta($post->ID, 'phone', true)): ?>
			<li><span class="glyphicon glyphicon-phone-alt"></span> <?php echo get_post_meta($post->ID, 'phone', true); ?></li>
			<?php endif; ?>

			<?php if(get_post_meta($post->ID, 'email', true)): ?>
			<li><a href="mailto:<?php echo get_post_meta($post->ID, 'email', true); ?>"><span class="glyphicon glyphicon-envelope"></span> <?php echo get_post_meta($post->ID, 'email', true); ?></a></li>
			<?php endif; ?>
		</ul>
		<?php endif; ?>
	</div>
</div>
