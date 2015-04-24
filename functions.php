<?php
    require_once('wp_bootstrap_navwalker.php');
    
//add custom php functions here.

//Output a staff name in Firstname Lastname format.
function friendly_name() { 
  $namearray = explode(", ", get_the_title());
  echo $namearray[1]." ".$namearray[0];
}

function taxonomy_term_list( $taxonomy ) {
  $term_args = array(
    'hide_empty' => false,
    'orderby' => 'name',
    'order' => 'ASC'
  );
  $tax_terms = get_terms($taxonomy,$term_args);
  $term_list = '<ul>';
  foreach ($tax_terms as $tax_term) {
    $term_list .= '<li><a href="' . esc_attr(get_term_link($tax_term, $taxonomy)) . '" title="' . sprintf( __( "View all posts in %s" ), $tax_term->name ) . '">' . $tax_term->name.'</a></li>';
  }
  $term_list .= '</ul>';
  echo $term_list;
}

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
    wp_register_script('jquery.scripts', get_template_directory_uri(). '/js/scripts.js', 'jquery');

    wp_enqueue_script('jquery');
    wp_enqueue_script('jquery.ui');
    wp_enqueue_script('jquery.bootstrap.min');
    wp_enqueue_script('jquery.scripts');
}
add_action( 'init', 'wpt_register_js' );

function wpt_register_css() {
    wp_register_style( 'normalize', get_stylesheet_directory_uri() . '/css/normalize.css', array(), '1', 'all' );
    wp_register_style( 'jquery.ui.css', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/themes/smoothness/jquery-ui.css");
    wp_register_style( 'bootstrap.min', get_template_directory_uri() . '/css/bootstrap.min.css' );
    wp_register_style( 'font-awesome.min.css', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css");
    wp_register_style( 'style', get_stylesheet_directory_uri() . '/style.css', array(), '1', 'all' );

    wp_enqueue_style( 'normalize');
    wp_enqueue_style( 'jquery.ui.css');
    wp_enqueue_style( 'bootstrap.min' );
    wp_enqueue_style( 'font-awesome.min.css' );    
    wp_enqueue_style( 'style');
}
add_action( 'wp_enqueue_scripts', 'wpt_register_css' );

// Add sidebar
//==============================
function theme_slug_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Main Sidebar', 'theme-slug' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'theme-slug' ),
        'before_widget' => '<div class="sidebar-collapse">',
        'after_widget'  => '</div></div>',
        'before_title'  => '<h4 class="widget-title"><a class="menu-toggle" data-toggle="collapse" aria-expanded="true" aria-controls="collapseExample"><span class="glyphicon glyphicon-minus-sign" style="float:right"></span>',
        'after_title'   => '</a></h4><div class="collapse in">',
    ) );
}
add_action( 'widgets_init', 'theme_slug_widgets_init' );


//Onesearch form shortcode
function OneSearchform( $form ) {

    $form = '
  <form role="search" action="http://search.ebscohost.com/login.aspx?" method="GET" onsubmit="ebscoPreProcess(this)" target="_blank" >
      <label class="screen-reader-text" for="s">Search All</label>
        <div class="input-group">
        <input name="direct" type="hidden" value="true">
        <input name="site" type="hidden" value="ehost-live">
        <input name="scope" type="hidden" value="site">
        <input name="type" type="hidden" value="1">
        <input name="site" type="hidden" value="eds-live">
        <input name="authtype" type="hidden" value="ip,guest,cookie,shib">
        <input name="custid" type="hidden" value="current">
        <input name="groupid" type="hidden" value="main">
        <input name="profile" type="hidden" value="eds">
        <input name="guidedField_3" type="hidden" value="">
      <input id="ebscohostsearchtext" autosave="UCFLibrary SiteSearch" class="form-control" class="textbox" name="bQuery" placeholder="Search All" results="5" size="60" type="text" x-webkit-speech="" >
        <span class="input-group-btn">
          <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
        </span>
      </div>
    </form>
';

    return $form;
}
add_shortcode('OneSearch', 'OneSearchform');

/**
* Articles only search
* Search ebscohost for just articles
*
*[onesearch-articles]
**/
function onesearch_articles( $form ){
  $form = '
    <form role="form" action="http://search.ebscohost.com/login.aspx?" method="GET" onsubmit="ebscoPreProcess(this)" target="_blank">
      <label for="s" class="sr-only">Search</label>
      <div class="input-group">
        <input name="direct" type="hidden" value="true">
        <input name="site" type="hidden" value="ehost-live">
        <input name="scope" type="hidden" value="site">
        <input name="type" type="hidden" value="1">
        <input name="site" type="hidden" value="eds-live">
        <input name="authtype" type="hidden" value="ip,guest,cookie,shib">
        <input name="custid" type="hidden" value="current">
        <input name="groupid" type="hidden" value="main">
        <input name="profile" type="hidden" value="edsarticle">
        <input name="guidedField_3" type="hidden" value="">
        <input name="doctype" type="hidden" value="160MN">
        <input id="ebscohostsearchtext" autosave="UCFLibrary SiteSearch" class="form-control" name="bQuery" placeholder="Search Articles" results="5" type="text" x-webkit-speech="">
        <span class="input-group-btn">
          <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
        </span>
      </div>
    </form>
  ';
  return $form;
}
add_shortcode('onesearch-articles', 'onesearch_articles');

/**
* Book/catalog search
* Search the catalog
*
*[search-catalog]
**/
function search_catalog( $form ){
  $form = '
    <form role="form" id="searchbox" name="searchBox" action="http://cf.catalog.fcla.edu" class="form-inline">
      <label for="s" class="sr-only">Search catalog</label>
      <div class="input-group">
        <input id="box" type="text" name="st" value="" class="form-control">
      </div>
      <div class="input-group">
        <select title="index" id="catsearchix" name="ix" class="form-control">
          <option value="kw" selected="">Anywhere</option>
          <option value="ti">Title</option>
          <option value="jt">Journal Title</option>
          <option value="au">Author</option>
          <option value="su">Subject Heading</option>
          <option value="nu">ISBN, ISSN, OCLC, etc.</option>
        </select>
        <span class="input-group-btn">
          <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
        </span>           
      </div>
    </form>
  ';
  return $form;
}
add_shortcode('search-catalog', 'search_catalog');


/**
*Create a jquery tab box for the homepage - ToDo - make this box generic/more streamlined.
*Example:
*[HomepageSearch]
*  [QuickSearch]
*   Content
*  [/QuickSearch]
*  [Articles]
*   Content
*  [/Articles]
*  [Books]
*   Content
*  [/Books]
*  [Videos]
*   Content
*  [/Videos]
*  [Website]
*   Content
*  [/Website]
**/

// Homepage Searchbox Shortcode
function HomepageSearchBox( $atts, $content = null ) {
 // $content = cleanup(str_replace('<br />', '', $content));
   // extract(shortcode_atts(array(
   //    'number' => 2,
   // ), $atts));
   // $tabs = '';

  return '<div id="tabs">
              <ul>
                <li><a href="#QuickSearch"><span>QuickSearch</span></a></li>
                <li><a href="#Articles"><span>Articles</span></a></li>
                <li><a href="#Books"><span>Books</span></a></li>
                <li><a href="#Videos"><span>Media</span></a></li>
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

/**
* Special Colletions Search bar shortcode
* Searches the UCF Library catalog for items found in Special Collections or University Archives
*
* Example: [search-scua]
**/
function search_scua($form) {
    $form = '
      <form role="form" id="advanced" name="searchAdv" action="http://cf.catalog.fcla.edu/cf.jsp?ADV=S">
        <label for="s" class="sr-only">Search</label>
        <div class="input-group">
          <input name="ADV" type="hidden" value="S">
          <input type="hidden" id="avli" name="avli" value="CFSPECIALCOLL">
          <input id="box" name="t1" class="form-control" type="search" placeholder="Special Collections Search" />
          <span class="input-group-btn">
                  <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
              </span>
        </div>
      </form>
    ';
    return $form;
}
add_shortcode('search-scua', 'search_scua');

//Site map shortcode
function wp_sitemap_page(){
    return "<ul>".wp_list_pages('title_li=&echo=0')."</ul>";
}
add_shortcode('sitemap', 'wp_sitemap_page');

//Recent posts shortcode

function recent_posts_function($atts){
   extract(shortcode_atts(array(
      'posts' => 3,
   ), $atts));

   $return_string = '<div class="news">';
   query_posts(array('orderby' => 'date', 'order' => 'DESC' , 'showposts' => $posts));
   if (have_posts()) :
      while (have_posts()) : the_post();
        $categories = get_the_category();
        $separator = ', ';
        $output = '';
        if($categories){
          foreach($categories as $category) {
            $output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
          }
        }
         $return_string .= 
         '<article>
         <div class="news-post">
            <div class="news-post-image"><a href="'.get_permalink().'">'.get_the_post_thumbnail( $post_id,'homepage-thumbnail', array('class' => 'homepage-thumbnail')).'</a></div>
            <div class="news-post-text">
              <div class="news-post-title">
                <header>
                  <h3><a href="'.get_permalink().'">'.get_the_title().'</a></h3>
                  <span class="news-post-category">'.trim($output, $separator).' - '.get_the_time('F jS, Y').'</span>
                </header>
              </div>
              <p>'.get_the_excerpt().'</p>
            </div>
          </div>
          </article>';
      endwhile;
   endif;
   $return_string .= '</div>';

   wp_reset_query();
   return $return_string;
}
add_shortcode('recent-posts', 'recent_posts_function');


/**
*Glyphicons
*Create a glyphicon anywhere on the page. 
*
*Example:
*[icon name="search"]
*
**/
function GlyphIcon($atts) {
  extract(shortcode_atts( array(
      'name' => search,
  ), $atts ));
  return '<span class="glyphicon glyphicon-'.$name.'"></span>';
}
add_shortcode('icon', 'GlyphIcon');

/**
*Youtube shortcode
*Create embeded youtube links that are responsive.
*
*Example:
*[youtube id="cJHCKkCesuE" width="500"]
**/
function youtube_video($atts) {
  extract(shortcode_atts( array(
      'id' => '62NEzgmqwx0',
      'width' => '100%',
      'list' => ''
  ), $atts ));
  return '<div class="responsive-wrapper" style="max-width:'.$width.';">
            <div class="responsive-container">
             <iframe src="http://youtube.com/embed/'.$id.'?list='.$list.'" frameborder="0" allowfullscreen></iframe>
            </div>
          </div>';
}
add_shortcode('youtube', 'youtube_video');

/**
*Libcal instruction calendar shortcode
*responsive mini calendar.
*
*Example:
*[instruction-calendar width="500px"]
**/
function instruction_calendar($atts) {
  extract(shortcode_atts( array(
      'width' => '100%',
  ), $atts ));
  return '
        <div class="hidden-sm hidden-md hidden-lg">
          <div class="responsive-wrapper" style="max-width:'.$width.'; height: 300px;">
            <div class="responsive-container">
             <iframe src="http://api3.libcal.com/embed_mini_calendar.php?mode=month&iid=246&cal_id=1351&l=5&h=500" frameborder="0" allowfullscreen></iframe>
            </div>
          </div>
        </div>
        <div class="visible-sm visible-md visible-lg">
          <div class="responsive-wrapper" style="max-width:'.$width.';">
            <div class="responsive-container">
             <iframe src="//api3.libcal.com/embed_calendar.php?mode=month&iid=246&cal_id=1351&w=800&h=600"frameborder="0" scrolling="auto"></iframe>
            </div>
          </div>
        </div>
  ';
}
add_shortcode('instruction-calendar', 'instruction_calendar');
/**
*
* Hours Weekly Calendar Shortcode
*
**/
function hours_week_calendar($atts) {
  extract(shortcode_atts( array(
    'id' => '0',
  ), $atts ));
  return '
  <script src="//api3.libcal.com/js/hours_grid.js?002"></script> 

  <div id="s-lc-whw'.$id.'"></div> 
  <script>
  $(function(){ 
  var week'.$id.' = new $.LibCalWeeklyGrid( $("#s-lc-whw'.$id.'"), { iid: 246, lid: '.$id.',  weeks: 52 }); 
  });
  </script>';
}
add_shortcode('hours-calendar', 'hours_week_calendar');

/**
* Homepage Today's Hours Shortcode
* Create a dl list for the current daily hours.
*
*Example:
*[hours-today]
*
**/

function hours_today( $string ) {

  $string = file_get_contents('http://api3.libcal.com/api_hours_today.php?iid=246&lid=0&format=json');
  $json_o = json_decode($string);
  $hours_list = '<dl class="dl-horizontal homepage">';
  foreach ($json_o->locations as $location) {
    $hours_list .= '<dt>'.$location->name.'</dt><dd>'.$location->rendered.'</dd>';
  }
  $hours_list .= '</dl>';
  return $hours_list;
}
add_shortcode('hours-today', 'hours_today');

/**
* Homepage Events Shortcode
* Create a list for the upcoming library events.
*
*Example:
*[library-events]
*
**/
function library_events($atts) {
   extract(shortcode_atts(array(
      'number' => '4',
   ), $atts));
  $string = file_get_contents('http://events.ucf.edu/calendar/2084/ucf-libraries-events/upcoming/feed.json');
  $json_o = json_decode($string);
  $events_list = '';
  $i = 0;
  foreach ($json_o as $event) {
    $date = strtotime($event->starts);
    $day = date('d',$date);
    $month = date('M',$date);
    $year = date('Y',$date);
    $start_time = date('g:ia',$date);
    $end_time = date('g:ia',strtotime($event->ends));
    $events_list .= '
      <article>
        <span class="eventDate"><ul><li class="eventMonth">'.$month.'</li><li class="eventDay">'.$day.'</li><li class="eventYear">'.$year.'</li><li class="eventDate">'.$event->starts.'</li></ul></span>
        <ul class="eventInfo">
          <li class="eventTitle"><a href="'.$event->url.'" title="'.$event->title.'" target="_blank">'.$event->title.'</a></li>
          <li class="eventTime"><span class="glyphicon glyphicon-time"></span> '.$start_time.' - '.$end_time.'</li>         
          <li class="eventLocation"><span class="glyphicon glyphicon-map-marker"></span> <a href="'.$event->location_url.'">'.$event->location.'</a></li>
        </ul>
      </article>';
    if(++$i == $number) break;
  }
  return $events_list;
}

add_shortcode('library-events', 'library_events');

/**
*Staff Directory Custom Post Type
**/
add_action( 'init', 'register_cpt_staff' );

function register_cpt_staff() {

    $labels = array(
        'name' => _x( 'Staff', 'staff' ),
        'singular_name' => _x( 'Staff', 'staff' ),
        'add_new' => _x( 'Add New', 'staff' ),
        'add_new_item' => _x( 'Add New Staff Member', 'staff' ),
        'edit_item' => _x( 'Edit Staff Member', 'staff' ),
        'new_item' => _x( 'New Staff Member', 'staff' ),
        'view_item' => _x( 'View Staff Member', 'staff' ),
        'search_items' => _x( 'Search Staff', 'staff' ),
        'not_found' => _x( 'No staff found', 'staff' ),
        'not_found_in_trash' => _x( 'No staff found in Trash', 'staff' ),
        'parent_item_colon' => _x( 'Parent Staff:', 'staff' ),
        'menu_name' => _x( 'Staff', 'staff' ),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'description' => 'Staff names and descriptions',
        'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', 'revisions' ),
        'taxonomies' => array( 'department', 'unit', 'group' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 20,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => array( 'with_front' => false ),
        'capability_type' => 'post'
    );

    register_post_type( 'staff', $args );
}
// Department Taxonomy
add_action( 'init', 'department_init' );

function department_init() {
  register_taxonomy('department',array('staff'), array(

    'hierarchical' => true,
    'labels' => array(
    'name' => _x( 'Department', 'taxonomy general name' ),
    'singular_name' => _x( 'Department', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Departments' ),
    'all_items' => __( 'All Departments' ),
    'parent_item' => __( 'Parent Department' ),
    'parent_item_colon' => __( 'Parent Department:' ),
    'edit_item' => __( 'Edit Department' ),
    'update_item' => __( 'Update Department' ),
    'add_new_item' => __( 'Add New Department' ),
    'new_item_name' => __( 'New Department Name' ),
    'menu_name' => __( 'Department' ),
  ),
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'department', 'with_front' => false ),
  ));
}


// Unit Taxonomy
add_action( 'init', 'unit_init' );

function unit_init() {
  register_taxonomy('unit',array('staff'), array(

    'hierarchical' => true,
    'labels' => array(
    'name' => _x( 'Unit', 'taxonomy general name' ),
    'singular_name' => _x( 'Unit', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Units' ),
    'all_items' => __( 'All Units' ),
    'parent_item' => __( 'Parent Unit' ),
    'parent_item_colon' => __( 'Parent Unit:' ),
    'edit_item' => __( 'Edit Unit' ),
    'update_item' => __( 'Update Unit' ),
    'add_new_item' => __( 'Add New Unit' ),
    'new_item_name' => __( 'New Unit Name' ),
    'menu_name' => __( 'Unit' ),
  ),
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'unit', 'with_front' => false ),
  ));
}

add_action( 'init', 'group_init' );

function group_init() {
  register_taxonomy('group',array('staff'), array(

    'hierarchical' => true,
    'labels' => array(
    'name' => _x( 'Group', 'taxonomy general name' ),
    'singular_name' => _x( 'Group', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Groups' ),
    'all_items' => __( 'All Groups' ),
    'parent_item' => __( 'Parent Group' ),
    'parent_item_colon' => __( 'Parent Group:' ),
    'edit_item' => __( 'Edit Group' ),
    'update_item' => __( 'Update Group' ),
    'add_new_item' => __( 'Add New Group' ),
    'new_item_name' => __( 'New Group Name' ),
    'menu_name' => __( 'Group' ),
  ),
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'group', 'with_front' => false ),
  ));
}


//Adding in Featured image feature
if ( function_exists( 'add_theme_support' ) ) { 
  add_theme_support( 'post-thumbnails' );
  set_post_thumbnail_size( 150, 150, true ); // default Post Thumbnail dimensions (cropped)

  // additional image sizes
  // delete the next line if you do not need additional image sizes 
  add_image_size( 'staff-thumbnail', 300, 9999 ); //300 pixels wide (and unlimited height)
  add_image_size( 'homepage-thumbnail', 100, 100, true );

}
?>