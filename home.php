<?php get_header(); ?>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '879004742184863',
      xfbml      : true,
      version    : 'v2.4'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

  FB.ui({
  method: 'share_open_graph',
  action_type: 'og.likes',
  action_properties: JSON.stringify({
    object:'https://developers.facebook.com/docs/',
  })
}, function(response){
  // Debug response (optional)
  console.log(response);
});
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
								<div class="social-icons">
								<a href="#" onclick="FB.ui({
									  method: 'feed',
									  link: '<?php echo get_permalink(); ?>',
									  caption: 'An example caption',
									}, function(response){});">  >
									<span class="fa-stack fa-lg">
										<i class="fa fa-circle fa-stack-2x"></i>
										<i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
									</span>
								</a>
								<span class="fa-stack fa-lg">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
								</span>
								<span class="fa-stack fa-lg">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-google-plus fa-stack-1x fa-inverse"></i>
								</span>
								</div>
								<div class="news-post-title">
									<header>
					                  <h3><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
					                  <span class="news-post-category"><?php echo trim($output, $separator).' - '.get_the_time('F jS, Y'); ?></span>
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