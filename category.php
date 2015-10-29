<?php get_header(); ?>
<div id="main">
	<div id="content" class="container">
	<!-- category.php -->
		<div class="row">
			<div class="col-sm-8">
				<header><h1><a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ) ?>">News &amp; Blog</a></h1></header>
				<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
			</div>
			<div class="col-sm-4">
				<div class="header-search"><?php get_search_form(); ?></div>
			</div>
		</div>
	</div>
	<div  class="background-color-gray">
		<div id="content" class="container">
			<div class="row">
				<div class="col-sm-3">
					<?php get_sidebar(); ?>
				</div>
				<div class="col-sm-9">
					<h2 class="subpage-title"><?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'category' ) ); echo $term->name; ?></h2>
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<?php	
							$categories = get_the_category();
					        $separator = ', ';
					        $output = '';
					        if($categories){
					          foreach($categories as $category) {
					            $output .= '<a href="'.get_category_link( $category->term_id ).'" title="'.esc_attr( sprintf( __( "View all posts in %s" ), $category->name)).'">'.$category->cat_name.'</a>'.$separator;
					          }
					        }
				        ?>
						<article>
							<div class="card">
								<?php if (has_post_thumbnail()): ?>
									<div class="post-header-img"><a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail('full'); ?></a></div>
								<?php endif; ?>
									<div class="news-post-content">
										<div class="share-btn-group">
			 								<a class="share-btn facebook-btn" href="javascript:share_button('http://www.facebook.com/sharer.php?u=<?php echo get_permalink(); ?>', 520, 350)">
												<span class="fa-stack fa-lg">
													<i class="fa fa-circle fa-stack-2x"></i>
													<i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
												</span>
											</a>
											<a class="share-btn twitter-btn" href="javascript:share_button('http://twitter.com/share?url=<?php echo get_permalink(); ?>&text=<?php echo get_the_title(); ?>', 500, 500)">
												<span class="fa-stack fa-lg">
													<i class="fa fa-circle fa-stack-2x"></i>
													<i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
												</span>
											</a>
											<a class="share-btn gplus-btn" href="javascript:share_button('https://plus.google.com/share?url=<?php echo get_permalink(); ?>', 500, 500)">
												<span class="fa-stack fa-lg">
													<i class="fa fa-circle fa-stack-2x"></i>
													<i class="fa fa-google-plus fa-stack-1x fa-inverse"></i>
												</span>
											</a>
											<a class="share-btn email-btn" href="mailto:?subject=<?php echo get_the_title(); ?>&body=<?php echo get_the_title(); ?> <?php echo get_permalink(); ?>">
												<span class="fa-stack fa-lg">
													<i class="fa fa-circle fa-stack-2x"></i>
													<i class="fa fa-envelope fa-stack-1x fa-inverse"></i>
												</span>
											</a>		
										</div>
										<div class="news-post-title">
											<header>
							                  <h3><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
							                  <span class="news-post-category"><?php echo trim($output, $separator); ?></span>
		                					  <span class="news-post-date">Posted: <i class="fa fa-calendar"></i> <?php echo get_the_time('F jS, Y'); ?></span>
				                  			</header>
										</div>
										<p><?php the_content(__('(more...)')); ?></p>
										<p><?php comments_template( $file, $separate_comments ); ?></p>
									</div>
							</div>
						</article>
					<?php endwhile; else: ?>
					<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>