<?php get_header(); ?>
<script>
//   window.fbAsyncInit = function() {
//     FB.init({
//       appId      : '879004742184863',
//       xfbml      : true,
//       version    : 'v2.4'
//     });
//   };

//   (function(d, s, id){
//      var js, fjs = d.getElementsByTagName(s)[0];
//      if (d.getElementById(id)) {return;}
//      js = d.createElement(s); js.id = id;
//      js.src = "//connect.facebook.net/en_US/sdk.js";
//      fjs.parentNode.insertBefore(js, fjs);
//    }(document, 'script', 'facebook-jssdk'));

//   FB.ui({
//   method: 'share_open_graph',
//   action_type: 'og.likes',
//   action_properties: JSON.stringify({
//     object:'https://developers.facebook.com/docs/',
//   })
// }, function(response){
//   // Debug response (optional)
//   console.log(response);
// });
function fbShare(url, title, descr, image, winWidth, winHeight) {
        var winTop = (screen.height / 2) - (winHeight / 2);
        var winLeft = (screen.width / 2) - (winWidth / 2);
        window.open('http://www.facebook.com/sharer.php?s=100&p[title]=' + title + '&p[summary]=' + descr + '&p[url]=' + url + '&p[images][0]=' + image, 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width=' + winWidth + ',height=' + winHeight);
    }

</script>
<div id="main">
	<div id="content" class="container">
	<!-- home.php -->
		<div class="row">
			<div class="col-sm-8">
				<header><h1>News &amp; Blog</h1></header>
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
					<div class="grid">
					<div class="grid-sizer"></div>
					<div class="gutter-sizer"></div>
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<div class="grid-item">
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
					</div>
					<?php endwhile; else: ?>
					</div>
					<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/3.3.2/masonry.pkgd.min.js"></script>
<script>
$('.grid').masonry({
  // options
  columnWidth: '.grid-sizer',
  gutter: '.gutter-sizer',
  itemSelector: '.grid-item',
  percentPosition: true
});
</script>
<?php get_footer(); ?>