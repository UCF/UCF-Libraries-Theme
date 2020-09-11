<?php
/*
Description: Taxonomy Subject archive page.
*/
?>
 <?php
	global $wp_query;
	query_posts(
    array_merge(
      $wp_query->query,
      array(
        'orderby' => 'title',
        'order' => 'ASC',
        'posts_per_page' => 200
      )
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
	 <!--taxonomy-subject -->
    <div class="row">
      <div class="col-sm-8">
		    <header><h1>Your Librarian</h1></header>
		  </div><!-- col-sm-8 -->
		  <div class="col-sm-4">
		    <div class="header-search"><?php get_search_form(); ?></div>
		  </div><!-- col-sm-4 -->
		</div><!-- row -->
		<div class="row">
			<div class="col-sm-12">
				<p>Use the drop down menu to view the librarian(s) associated with each subject. You can also view the librarians at the <a href="<?php bloginfo('url'); ?>/subject/hospitality-management/">Rosen Library</a>, <a href="<?php bloginfo('url'); ?>/subject/curriculum-materials/">the Curriculum Materials Center (CMC)</a>, and the <a href="<?php bloginfo('url'); ?>/about/libraries/">UCF Connect Libraries</a>.</p>
				<p style="display:inline-block"><strong>Choose Librarians by Subject:</strong></p> <?php subject_dropdown( 'subject' ); ?>
			</div><!-- col-sm-12 -->
		</div><!-- row -->
	</div><!-- container -->
	<div  class="background-color-gray">
		<div id="content" class="container">
			<div class="row">
				<div class="col-sm-12">
					<h2 class="subpage-title"><?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); echo $term->name; ?></h2>
					<?php echo term_description( ) ?>
					<div class="row">
						<?php $i = 0; ?>
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<?php $subjects = explode(", ", get_post_meta($post->ID, 'primary-subject', true)); ?>
							<?php foreach ($subjects as $subject) {
								$subject = preg_replace('/&/', '&amp;', $subject);
								if ($subject == $term->name) : ?>
								<?php $i++; ?>
									<div class="col-sm-6 col-md-3">
										<h4 class="primary">Primary Librarian</h4>
						    		<div class="thumbnail">
						    				<figure><a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail('staff-thumbnail', array('class' => 'staff-thumbnail')); ?></a></figure>
  											<div class="caption">
  												<h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
  												<?php if(get_post_meta($post->ID, 'title', true) ||
  													 get_post_meta($post->ID, 'rank', true) ||
                             get_post_meta($post->ID, 'department', true) ||
                             get_post_meta($post->ID, 'subject', true) ||
                             get_post_meta($post->ID, 'room', true) ||
  													 get_post_meta($post->ID, 'phone', true) ||
  													 get_post_meta($post->ID, 'email', true)
  												): ?>

  												<ul>
  														<?php if(get_post_meta($post->ID, 'title', true)): ?>
  															<li><i class="fa fa-bookmark" data-toggle="tooltip" data-placement="right" title="Title"></i> <?php echo get_post_meta($post->ID, 'title', true); ?></li>
  														<?php endif; ?>

                              <?php if(get_post_meta($post->ID, 'rank', true)): ?>
                                <li><i class="fa fa-graduation-cap" data-toggle="tooltip" data-placement="right" title="Rank"></i> <?php echo get_post_meta($post->ID, 'rank', true); ?></li>
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
  											</div><!-- caption -->
										</div><!-- thumbnail -->
									</div><!-- col-sm-6 col-md-3 -->
								<?php endif; ?>
							<?php	} ?>
						<?php endwhile;?>
						<?php endif; ?>					
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<?php $subjects = explode(", ", get_post_meta($post->ID, 'primary-subject', true)); ?>
							<?php $match = 0; ?>
							<?php foreach ($subjects as $subject) {
								$subject = preg_replace('/&/', '&amp;', $subject);
								if ($subject == $term->name) {
									$match++;
								}
							}?>
							<?php if($match == 0) : ?>
							<?php $i++; ?>
							<div class="col-sm-6 col-md-3">
								<h4>&nbsp;</h4>									
				    		<div class="thumbnail">
				    				<figure><a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail('staff-thumbnail', array('class' => 'staff-thumbnail')); ?></a></figure>
  									<div class="caption">
  										<h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
  										<?php if(get_post_meta($post->ID, 'title', true) ||
                             get_post_meta($post->ID, 'rank', true) ||
                             get_post_meta($post->ID, 'department', true) ||
                             get_post_meta($post->ID, 'subject', true) ||
                             get_post_meta($post->ID, 'room', true) ||
                             get_post_meta($post->ID, 'phone', true) ||
                             get_post_meta($post->ID, 'email', true)
  										): ?>

  										<ul>
  												<?php if(get_post_meta($post->ID, 'title', true)): ?>
  													<li><i class="fa fa-bookmark" data-toggle="tooltip" data-placement="right" title="Title"></i> <?php echo get_post_meta($post->ID, 'title', true); ?></li>
  												<?php endif; ?>

                          <?php if(get_post_meta($post->ID, 'rank', true)): ?>
                            <li><i class="fa fa-graduation-cap" data-toggle="tooltip" data-placement="right" title="Rank"></i> <?php echo get_post_meta($post->ID, 'rank', true); ?></li>
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
  													<li><i class="fa fa-envelope" data-toggle="tooltip" data-placement="right" title="Email"></i><a href="mailto:<?php echo get_post_meta($post->ID, 'email', true); ?>"><span class="ellipsis"> <?php echo get_post_meta($post->ID, 'email', true); ?></span></a></li>
  												<?php endif; ?>
  										</ul>
  										<?php endif; ?>
  									</div><!-- caption -->
								</div><!-- thumbnail -->
							</div><!-- col-sm-6 col-md-3 -->
							<?php if ($i % 4 == 0) : //adds a clearfix every 4 items. ?>
									<div class="clearfix visible-md-block visible-lg-block"></div>
							<?php endif; ?>
							<?php if ($i % 2 == 0) : //adds a clearfix every 2 items. ?>
									<div class="clearfix visible-sm-block"></div>
							<?php endif; ?>
							<?php endif; ?>
            <?php endwhile; else: ?>
              <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
            <?php endif; ?>
					</div><!-- row -->
					<?php wp_reset_query(); // Restore global post data stomped by the_post(). ?>
				</div><!-- col-sm-12 -->
			</div><!-- row -->
		</div><!-- container -->
	</div><!-- background-color-gray -->
</div><!-- main -->

<?php get_footer(); ?>
