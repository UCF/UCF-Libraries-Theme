<?php
    require_once('wp_bootstrap_navwalker.php');
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

function wpt_register_js() {
    wp_register_script('jquery.bootstrap.min', get_template_directory_uri() . '/js/bootstrap.min.js', 'jquery');
    wp_enqueue_script('jquery.bootstrap.min');
}
add_action( 'init', 'wpt_register_js' );

function wpt_register_css() {
    wp_register_style( 'normalize', get_stylesheet_directory_uri() . '/css/normalize.css', array(), '1', 'all' );
    wp_register_style( 'bootstrap.min', get_template_directory_uri() . '/css/bootstrap.min.css' );
    wp_register_style( 'style', get_stylesheet_directory_uri() . '/style.css', array(), '1', 'all' );

    wp_enqueue_style( 'normalize');
    wp_enqueue_style( 'bootstrap.min' );
    wp_enqueue_style( 'style');
}
add_action( 'wp_enqueue_scripts', 'wpt_register_css' );


// function custom_scripts_method() {
//     wp_register_style( 'normalize', get_stylesheet_directory_uri() . '/css/normalize.css', array(), '1', 'all' );
//     wp_register_style( 'bootstrap.min', get_stylesheet_directory_uri() . '/css/bootstrap.min.css', array(), '1', 'all'  );
//     wp_register_style( 'style', get_stylesheet_directory_uri() . '/css/style.css', array(), '1', 'all' );

//     wp_register_script('jquery.bootstrap.min', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '', TRUE);
// }

// add_action( 'wp_enqueue_scripts', 'custom_scripts_method' );


?>