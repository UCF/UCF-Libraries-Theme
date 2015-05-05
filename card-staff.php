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
												<li><span class="glyphicon glyphicon-user" data-toggle="tooltip" data-placement="left" title="Position"></span> <?php echo get_post_meta($post->ID, 'title', true); ?></li>
											<?php endif; ?>

											<?php if(get_the_term_list( $post->ID, 'department', true)): ?>
												<li><i class="fa fa-university" data-toggle="tooltip" data-placement="left" title="Department"></i><?php echo get_the_term_list( $post->ID, 'department', '', ', ', '' ); ?></li>
											<?php endif; ?>

											<?php if(get_post_meta($post->ID, 'room', true)): ?>
												<li><span class="glyphicon glyphicon-map-marker" data-toggle="tooltip" data-placement="left" title="Location"></span> <?php echo get_post_meta($post->ID, 'room', true); ?></li>
											<?php endif; ?>

											<?php if(get_post_meta($post->ID, 'phone', true)): ?>
												<li><span class="glyphicon glyphicon-phone-alt" data-toggle="tooltip" data-placement="left" title="Phone"></span> <?php echo get_post_meta($post->ID, 'phone', true); ?></li>
											<?php endif; ?>

											<?php if(get_post_meta($post->ID, 'email', true)): ?>
												<li><span class="glyphicon glyphicon-envelope" data-toggle="tooltip" data-placement="left" title="Email"></span><a href="mailto:<?php echo get_post_meta($post->ID, 'email', true); ?>"> <?php echo get_post_meta($post->ID, 'email', true); ?></a></li>
											<?php endif; ?>
		</ul>
		<?php endif; ?>
	</div>
</div>
<script>
	$(function () {
	  $('[data-toggle="tooltip"]').tooltip()
	})
</script>