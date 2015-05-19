<?php
/*
Description: Taxonomy archive page.
*/
?>
 <?php
	global $wp_query;
	query_posts(
	   array_merge(
	      $wp_query->query,
	      array(
	      	'orderby' => 'title',
	      	'order' => 'ASC')
   )
);
?>
<?php

function subject_dropdown( $taxonomy ) {
	$terms = get_terms( $taxonomy );
	if ( $terms ) {
		printf( '<form action="" method="get" style="display:inline-block;"><select name="%s"  class="form-control"  onchange="this.form.submit();"><option value="-- Choose a Subject --">-- Choose a Subject --</option>', esc_attr( $taxonomy ) );
		foreach ( $terms as $term ) {
			if ($term->slug == 'all') {
				printf( '<option value="%s">%s</option>', esc_attr( $term->slug ), esc_html( $term->name ) );
			}
		}
		foreach ( $terms as $term ) {
			if ($term->slug != 'all') {
				printf( '<option value="%s">%s</option>', esc_attr( $term->slug ), esc_html( $term->name ) );
			}
		}
		print( '</select></form>' );
	}
}
?>

<?php get_header(); ?>
<div id="main">
	<div id="content" class="container">
	<!-- archive-staff.php -->
		<div class="row">
			<div class="col-sm-8">
				<header><h1>Your Librarian</h1></header>
			</div>
			<div class="col-sm-4">
				<div class="header-search"><?php get_search_form(); ?></div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<p>Use the drop down menu to view the librarian(s) associated with each subject. You can also view the librarians at the <a href="http://librarycmsdev.smca.ucf.edu/about/libraries/rosen-library/">Rosen Library</a>, <a href="http://librarycmsdev.smca.ucf.edu/about/libraries/curriculum-materials-center/">the Curriculum Materials Center (CMC)</a>, and the <a href="http://librarycmsdev.smca.ucf.edu/department/regional-campus-libraries/">Regional Campus Libraries</a>.</p>
				<p style="display:inline-block">Choose Librarians by Subject:</p> <?php subject_dropdown( 'subject' ); ?>
			</div>
		</div>
	</div>
	<div  class="background-color-gray">
		<div id="content" class="container">
			<div class="row">
				<div class="col-sm-12">
					<h2 class="subpage-title"><?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); echo $term->name; ?></h2>
					<?php echo term_description( ) ?>
					<div class="row">
						<?php $i = 0; ?>
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<?php // if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
							<?php $i++; ?>
							<div class="col-sm-6 col-md-3">
				    			<div class="thumbnail">
				    				<figure><a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail('staff-thumbnail', array('class' => 'staff-thumbnail')); ?></a></figure>
									<div class="caption">
										<h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
										<?php if(get_post_meta($post->ID, 'title', true) ||
											 get_post_meta($post->ID, 'room', true) ||
											 get_post_meta($post->ID, 'phone', true) ||
											 get_post_meta($post->ID, 'email', true)
										): ?>

										<ul>
												<?php if(get_post_meta($post->ID, 'title', true)): ?>
													<li><span class="glyphicon glyphicon-user" data-toggle="tooltip" data-placement="right" title="Position"></span> <?php echo get_post_meta($post->ID, 'title', true); ?></li>
												<?php endif; ?>

												<?php if(get_the_term_list( $post->ID, 'department', true)): ?>
													<li><i class="fa fa-university" data-toggle="tooltip" data-placement="right" title="Department"></i><?php echo get_the_term_list( $post->ID, 'department', '', ', ', '' ); ?></li>
												<?php endif; ?>
												<?php if(get_modified_term_list( $post->ID, 'subject', '', ', ', '', array(all) )): ?>
													<li><i class="fa fa-book" data-toggle="tooltip" data-placement="right" title="Subject"></i><?php echo get_modified_term_list( $post->ID, 'subject', '', ', ', '', array(all) ); ?></li>
												<?php endif; ?>
												
												<?php if(get_post_meta($post->ID, 'room', true)): ?>
													<li><span class="glyphicon glyphicon-map-marker" data-toggle="tooltip" data-placement="right" title="Location"></span> <?php echo get_post_meta($post->ID, 'room', true); ?></li>
												<?php endif; ?>

												<?php if(get_post_meta($post->ID, 'phone', true)): ?>
													<li><span class="glyphicon glyphicon-phone-alt" data-toggle="tooltip" data-placement="right" title="Phone"></span> <?php echo get_post_meta($post->ID, 'phone', true); ?></li>
												<?php endif; ?>

												<?php if(get_post_meta($post->ID, 'email', true)): ?>
													<li><span class="glyphicon glyphicon-envelope" data-toggle="tooltip" data-placement="right" title="Email"></span><a href="mailto:<?php echo get_post_meta($post->ID, 'email', true); ?>"><span class="ellipsis"> <?php echo get_post_meta($post->ID, 'email', true); ?></span></a></li>
												<?php endif; ?>
										</ul>
										<?php endif; ?>
									</div>
								</div>
							</div>
							<?php if ($i % 4 == 0) : //adds a clearfix every 4 items. ?>
									<div class="clearfix visible-md-block visible-lg-block"></div>
							<?php endif; ?>
							<?php if ($i % 2 == 0) : //adds a clearfix every 2 items. ?>
									<div class="clearfix visible-sm-block"></div>
							<?php endif; ?>
					<?php endwhile; else: ?>
					</div>
					<?php wp_reset_query(); // Restore global post data stomped by the_post(). ?>
					<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
