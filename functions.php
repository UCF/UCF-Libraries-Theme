<?php
    require_once('wp_bootstrap_navwalker.php');
    //require_once('shortcodes.php');             # Per theme shortcodes

//add custom php functions here.

function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'side-menu' => __( 'Side Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );


//This section below loads the javascript and css used throughout the entire site


function wpt_register_js() {
    wp_deregister_script('jquery');
    wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js", false, null);
    wp_register_script('jquery.ui', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js", false, null);
    wp_register_script('jquery.bootstrap.min', get_template_directory_uri() . '/js/bootstrap.min.js', 'jquery');

    wp_enqueue_script('jquery');
    wp_enqueue_script('jquery.ui');
    wp_enqueue_script('jquery.bootstrap.min');
}
add_action( 'init', 'wpt_register_js' );

function wpt_register_css() {
    wp_register_style( 'normalize', get_stylesheet_directory_uri() . '/css/normalize.css', array(), '1', 'all' );
    wp_register_style( 'jquery.ui.css', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/themes/smoothness/jquery-ui.css");
    wp_register_style( 'bootstrap.min', get_template_directory_uri() . '/css/bootstrap.min.css' );
    wp_register_style( 'style', get_stylesheet_directory_uri() . '/style.css', array(), '1', 'all' );

    wp_enqueue_style( 'normalize');
    wp_enqueue_style( 'jquery.ui.css');
    wp_enqueue_style( 'bootstrap.min' );
    wp_enqueue_style( 'style');
}
add_action( 'wp_enqueue_scripts', 'wpt_register_css' );

//Add sidebar
function theme_slug_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Main Sidebar', 'theme-slug' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'theme-slug' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'theme_slug_widgets_init' );

?>