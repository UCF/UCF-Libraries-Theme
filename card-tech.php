<?php
/*
Template Name: Tech Card
Description: This template is only for including a tech lending card onto a page. Using it for a full page template will break the page.
*/
?>
<?php the_post(); ?>
	<div class="thumbnail">
		<figure><a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail('staff-thumbnail', array('class' => 'staff-thumbnail')); ?></a></figure>
		<div class="caption">
			<h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
			<?php if(get_the_term_list( $post->ID, 'tech_type', true) ||
        get_the_term_list( $post->ID, 'loan_period', true) ||
        get_the_term_list( $post->ID, 'eligible_user', true) ||
        get_the_term_list( $post->ID, 'library', true) ||
        get_post_meta($post->ID, 'fine-policy', true) ||
        get_post_meta($post->ID, 'availability', true)
      ): ?>
			<ul>
				<?php if(get_the_term_list( $post->ID, 'tech_type', true)): ?>
					<li><i class="fa fa-info-circle" data-toggle="tooltip" data-placement="right" title="Tech Type"></i><?php echo get_the_term_list( $post->ID, 'tech_type', '', ', ', '' ); ?></li>
				<?php endif; ?>
        <?php if(get_the_term_list( $post->ID, 'loan_period', true)): ?>
          <li><i class="fa fa-hourglass" data-toggle="tooltip" data-placement="right" title="Loan Period"></i><?php echo get_the_term_list( $post->ID, 'loan_period', '', ', ', '' ); ?></li>
        <?php endif; ?>
        <?php if(get_the_term_list( $post->ID, 'eligible_user', true)): ?>
          <li><i class="fa fa-users" data-toggle="tooltip" data-placement="right" title="Eligible Users"></i><?php echo get_the_term_list( $post->ID, 'eligible_user', '', ', ', '' ); ?></li>
        <?php endif; ?>
        <?php if(get_the_term_list( $post->ID, 'library', true)): ?>
          <li><i class="fa fa-university" data-toggle="tooltip" data-placement="right" title="Library"></i><?php echo get_the_term_list( $post->ID, 'library', '', ', ', '' ); ?></li>
        <?php endif; ?>
        <?php if(get_post_meta($post->ID, 'fine-policy', true)): ?>
          <li><i class="fa fa-usd" data-toggle="tooltip" data-placement="right" title="Fine Policy"></i> <a href="<?php echo get_post_meta($post->ID, 'fine-policy', true); ?>">Fine Policy</a></li>
        <?php endif; ?>
        <?php if(get_post_meta($post->ID, 'availability', true)): ?>
					<li><i class="fa fa-check-circle" data-toggle="tooltip" data-placement="right" title="Check Availability"></i> <a href="<?php echo get_permalink(); ?>#item_availability">Check Availability</a></li>
				<?php endif; ?>
			</ul>
			<?php endif; ?>
		</div><!-- caption -->
	</div><!-- thumbnail -->
