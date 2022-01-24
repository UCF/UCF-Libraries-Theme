<?php
/*
Template Name: Hero Image Page
Description: This page has a large hero image with text on top.
*/
?>

<style>
  .hero-image {
    background:url('<?php the_post_thumbnail_url( 'full' ); ?>') center center;
    background-color: rgb(31 227 218 / 65%);
    background-blend-mode: luminosity;    
    background-size: cover;
    background-attachment: fixed;
    position: relative;
    padding: 1em;
  }
  .hero-title {
    color: #fff;
    font-family: Montserrat;
    font-weight: 700;
    font-size: 4rem;
    margin: 0 0 10px;
    text-shadow: 0 0 0.05em #000;
    line-height: 1.1;
    display: block;
  }
  .hero-subtitle {
    background-color: #000;
    margin: 0 auto;
    padding: .5em;
    color: #fff;
    font-size: 1.5rem;
    font-weight: 700;
    text-transform: uppercase;
    display: table;
    line-height: 1.42857143;
  }
  @media (min-width: 768px) {
    .hero-image {
      padding: 4em;
    }
    .hero-title {
      font-size: 9.5rem;
    }
    .hero-subtitle{
      font-size: 2rem;
    }
  }

</style>

<?php get_header(); ?>
<div id="main">
  <header class="hero-image">
    <div class="container">
      <?php if(get_post_meta($post->ID, 'homepage-subheading', true)): ?>
        <h1 class="hero-title"><?php the_title(); ?></h1>
        <span class="hero-subtitle"><?php echo get_post_meta($post->ID, 'homepage-subheading', true); ?></span>
      <?php else: ?>
        <span class="hero-title"><?php echo get_the_title( $post->post_parent ); ?></span>
        <h1 class="hero-subtitle"><?php the_title(); ?></h1>
      <?php endif; ?>
    </div>
  </header>
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php the_content(__('(more...)')); ?>
  <?php endwhile; else: ?>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
  <?php endif; ?>
</div>


<?php get_footer(); ?>