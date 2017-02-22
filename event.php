<?php
/*
Template Name: Event Page
Description: Event Page.
*/

remove_filter( 'the_content', 'wpautop' );
?>

<style>
/*		header.main-header {
		  display: none;
		}
		footer.main-footer {
			display: none;
		}*/

		html, body, .hero-image{
      width:100%;
      height:75vh;
    }

    body {
      position: relative;
      background-color: #fff;
    }


    .fixed-header-padding{
      padding-top: 50px;
    }

    h2 {
      text-align: center;
      font-size: 4rem;
    }
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
    .schedule-content {
        font-size:  20px;
    }
    .schedule-content h3 {
      clear: left;
      color: #999;
      margin: 16px 0 0;
    }
   
    .schedule-container {
      border-left: 1px solid rgba(0,0,0,.10);
      margin: 0;
      overflow: auto;
    }
    .schedule-container-inner {
      padding: .5em;
      position: relative;
      background-color: #ddd;
      margin: .5em;
      border-radius: 3px;
    }

    .event-title {
      display: block;
      font-size:  1.25em;
    }
    .event-room {
      display: block;  
      font-size:  .9em;
    }
    .event-speaker {
      display: block;
      padding-bottom: 10px;
      font-size:  .9em;
    }
    .navbar-events {
      background-color: rgb(91, 255, 132);
    }

    .navbar-nav>li>a {
      font-size: 1.5em;
      color: #333;
    }
    .navbar-collapse {
      padding: 0;
    }

    .navbar-events .navbar-nav>.active>a, .navbar-events .navbar-nav>.active>a:focus, .navbar-events .navbar-nav>.active>a:hover {
    color: #555;
    background-color: rgb(163, 255, 186);
}

    @media (min-width: 768px) {
      .schedule-content h3 {
        float: left;
        text-align: right;
        width: 8em
        zoom: 1;
        font-size: 1em;
      }

      .schedule-container {
        margin: -1px 0 0 8em;
      }
      .schedule-container-inner {
        margin: .5em .5em .5em 2em;
      }
    }

    .event-time {
      padding: 1em;
      font-weight: 700;
    }
    @media (min-width: 768px) {
      .event-time {
        text-align: right;
        border-right: 1px dashed #222;
      }
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
}

//Scrolls the page to the element the link is pointed to.
function scroll_to_element(){
	$('.scroll-to-element').click(function(e) {
		var jump = $(this).attr('href');
		var new_position = $(jump).offset();
		$('html, body').stop().animate({ scrollTop: new_position.top - $('#navbar_events').outerHeight(true) }, 500);
		e.preventDefault();
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
