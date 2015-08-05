<?php
/*
Description: 404 page not found.
*/
?>
<?php get_header(); ?>
<div id="main">
  <div class="jumbotron">
    <div class="container">
      <div class="row">
        <div class="col-sm-9">
          <header>
            <h1>404 Page not found</h1>
          </header>
    		</div>
        <div class="col-sm-3">
          <?php get_search_form(); ?>
        </div>
      </div>
    </div> <!-- .container -->
  </div> <!-- .jumbotron -->
  <div class="container">
    <div class="row">
      <div class="col-sm-8">
        <p>We're sorry. Our website was recently updated, and the page you were looking for could not be found.</p>
        <p>Need help finding something on our new site?  Try starting at the new <a href="<?php bloginfo('url')?>">UCF Libraries homepage</a>. Or simply <a href="<?php bloginfo('url')?>/ask/">Ask Us!</a></p>
        <div style="width:174px; margin:0 auto;">
          <img src="<?php echo get_template_directory_uri() ?>/images/citronaut.png" alt="The Citronaut">
        </div>
      </div> <!-- .col-md-9 -->
      <div class="col-sm-4">
        <?php echo do_shortcode("[ask-chat]"); ?>
      </div>
    </div> <!-- .row -->
  </div><!-- .container -->
</div><!-- .main -->
<?php get_footer(); ?>