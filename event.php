<?php
/*
Template Name: Event Page
Description: Event Page.
*/

remove_filter( 'the_content', 'wpautop' );
?>

<style>

		.hero-image{   
      background:url('<?php the_post_thumbnail_url( 'full' ); ?>') center center;
      /*background-color: rgba(255, 0, 179, 0.65);*/
      /*background-blend-mode: difference;*/
      background-size:cover;
      position: relative;
    }
    .hero-image h1 {
      position: absolute;
      top: 50%;
      left: 50%;
      padding: 0;
      margin: 0;
      transform: translate(-50%, -85%);
      font-size: 10vw;
      color: #fff;
      text-shadow: 2px 2px 4px black;
    }
    .sub-heading {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, 0%);
      font-size: 4.3vw;
      color: #fff;
      text-shadow: 1px 1px 2px black;
    }
    .tag-line {
        position: absolute;
        left: 50%;
        bottom: 10%;
        padding: 0;
        margin: 0;
        transform: translate(-50%, -10%);
        font-size: 2.5vw;
        color: #fff;
        text-shadow: 1px 1px 2px black;
    }

</style>

<?php get_header(); ?>
<div id="hero_image" class="hero-image">
  <h1><?php the_title(); ?></h1>
  <?php if(get_post_meta($post->ID, 'sub-heading', true)): ?>
    <div class="sub-heading"><?php echo get_post_meta($post->ID, 'sub-heading', true); ?></div>
	<?php endif; ?>
	<?php if(get_post_meta($post->ID, 'tag-line', true)): ?>
    <div class="tag-line"><?php echo get_post_meta($post->ID, 'tag-line', true); ?></div>
	<?php endif; ?>
</div>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?php the_content(__('(more...)')); ?>
<?php endwhile; else: ?>
	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

<script>
function fix_header_top() {

    $(window).scroll(function () {
        if ($(this).scrollTop() > $('#hero_image').outerHeight(true) + $('#ucfhb').outerHeight(true)) {
            $('#navbar_events').addClass('navbar-fixed-top');
            $('body').addClass('fixed-header-padding');
        } else {
            $('#navbar_events').removeClass('navbar-fixed-top');
            $('body').removeClass('fixed-header-padding');
        }
    });

};

function add_scroll_spy(){
  $('body').attr('data-spy', 'scroll');
  $('body').attr('data-target', '#navbar_events');
  $('body').attr('data-offset', '51');
}

//Scrolls the page to the element the link is pointed to.
function scroll_to_element(){
	$('.scroll-to-element').click(function(e) {
		var jump = $(this).attr('href');
		var new_position = $(jump).offset();
		$('html, body').stop().animate({ scrollTop: new_position.top - $('#navbar_events').outerHeight(true) }, 500);
		e.preventDefault();
    $(".navbar-toggle").trigger( "click" );
	})

}

$(document).ready( function() {
  fix_header_top();
  add_scroll_spy();
  scroll_to_element();

  $('body').removeClass('library-body');
  $('.main-header').remove();
  $('.main-footer').remove();
});
</script>
<?php get_footer(); ?>
