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
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'theme_slug_widgets_init' );


//Onesearch form shortcode
function OneSearchform( $form ) {

    $form = '<form role="search" action="http://search.ebscohost.com/login.aspx?" method="GET" onsubmit="ebscoPreProcess(this)" target="_blank" >
    <div><label class="screen-reader-text" for="s">' . __('Search for:') . '</label>
      <input name="direct" type="hidden" value="true">
      <input name="site" type="hidden" value="ehost-live">
      <input name="scope" type="hidden" value="site">
      <input name="type" type="hidden" value="1">
      <input name="site" type="hidden" value="eds-live">
      <input name="authtype" type="hidden" value="ip,guest,cookie,shib">
      <input name="custid" type="hidden" value="current">
      <input name="groupid" type="hidden" value="main">
      <input name="profile" type="hidden" value="eds">
      <input name="guidedField_3" type="hidden" value=""><fieldset>
    <input id="ebscohostsearchtext" autosave="UCFLibrary SiteSearch" class="textbox Blank" name="bQuery" placeholder="Search All" results="5" size="60" type="text" x-webkit-speech="" >
    <input class="button" type="submit" value="Search">
    </div>
    </form>';

    return $form;
}

add_shortcode('OneSearch', 'OneSearchform');

// Homepage Searchbox Shortcode
function HomepageSearchBox( $atts, $content = null ) {
  return '<div id="tabs">
              <ul>
                <li><a href="#QuickSearch"><span>QuickSearch</span></a></li>
                <li><a href="#Articles"><span>Articles+</span></a></li>
                <li><a href="#Books"><span>Books+</span></a></li>
                <li><a href="#Videos"><span>Videos+</span></a></li>
                <li><a href="#Website"><span>Website</span></a></li>
              </ul>' . do_shortcode($content) . '
          </div>
          <script>
          $( "#tabs" ).tabs();
          </script>';
}
add_shortcode('HomepageSearch', 'HomepageSearchBox');


// QuickSearch Tab 
function QuickSearchTab( $atts, $content = null ) {
  return '<div id="QuickSearch">'.do_shortcode($content).'</div>';
}
add_shortcode('QuickSearch', 'QuickSearchTab');

// Articles Tab 
function ArticlesTab( $atts, $content = null ) {
  return '<div id="Articles">'.do_shortcode($content).'</div>';
}
add_shortcode('Articles', 'ArticlesTab');

// Books Tab 
function BooksTab( $atts, $content = null ) {
  return '<div id="Books">'.do_shortcode($content).'</div>';
}
add_shortcode('Books', 'BooksTab');

// Videos Tab 
function VideosTab( $atts, $content = null ) {
  return '<div id="Videos">'.do_shortcode($content).'</div>';
}
add_shortcode('Videos', 'VideosTab');

// Website Tab 
function WebsiteTab( $atts, $content = null ) {
  return '<div id="Website">'.do_shortcode($content).'</div>';
}
add_shortcode('Website', 'WebsiteTab');

?>