<?php
    require_once('wp_bootstrap_navwalker.php');
    require_once('breadcrumbs.php');
    require_once('shortcodes.php');

//add custom php functions here.

//Output a staff name in Firstname Lastname format.
function friendly_name() {
  $namearray = explode(", ", get_the_title());
  echo $namearray[1]." ".$namearray[0];
}

function debug(){
  return is_ssl();
}
add_shortcode('debug', 'debug');

//Allow shortcodes in widget text area
add_filter('widget_text', 'do_shortcode');


/**
 * Strings passed to this function will be modified under the assumption that
 * they were outputted by wordpress' the_output filter.  It checks for a handful
 * of things like empty, unnecessary, and unclosed tags.
 *
 * @return string
 * @author Jared Lang
 **/
function cleanup($content){
	# Balance auto paragraphs
	$lines = explode("\n", $content);
	foreach($lines as $key=>$line){
		$null = null;
		$found_closed = preg_match_all('/<\/p>/', $line, $null);
		$found_opened = preg_match_all('/<p[^>]*>/', $line, $null);
		
		$diff = $found_closed - $found_opened;
		# Balanced tags
		if ($diff == 0){continue;}
		
		# missing closed
		if ($diff < 0){
			$lines[$key] = $lines[$key] . str_repeat('</p>', abs($diff));
		}
		
		# missing open
		if ($diff > 0){
			$lines[$key] = str_repeat('<p>', abs($diff)) . $lines[$key];
		}
	}
	$content = implode("\n", $lines);
	
	#Remove incomplete tags at start and end
	$content = preg_replace('/^<\/p>[\s]*/i', '', $content);
	$content = preg_replace('/[\s]*<p>$/i', '', $content);
	$content = preg_replace('/^<br \/>/i', '', $content);
	$content = preg_replace('/<br \/>$/i', '', $content);

	#Remove paragraph and linebreak tags wrapped around shortcodes
	$content = preg_replace('/(<p>|<br \/>)\[/i', '[', $content);
	$content = preg_replace('/\](<\/p>|<br \/>)/i', ']', $content);

	#Remove empty paragraphs
	$content = preg_replace('/<p><\/p>/i', '', $content);

	return $content;
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

//Register all Wordpress menus
//============================
function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'side-menu' => __( 'Side Menu' ),
      'footer-menu-find' => __( 'Footer Menu Find'),
      'footer-menu-services' => __( 'Footer Menu Services'),
      'footer-menu-about' => __( 'Footer Menu About'),
      'footer-menu-help' => __( 'Footer Menu Help')
    )
  );
}
add_action( 'init', 'register_my_menus' );


//This section below loads the javascript and css used throughout the entire site
//. ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . 

function wpt_register_js() {
    wp_deregister_script('jquery');
    wp_register_script('jquery', "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js", false, null);
    wp_register_script('jquery.ui', "https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js", false, null);
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
    wp_register_style( 'jquery.ui.css', "https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/themes/smoothness/jquery-ui.css");
    wp_register_style( 'bootstrap.min', get_template_directory_uri() . '/css/bootstrap.min.css' );
    wp_register_style( 'font-awesome.min.css', "https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css");
    wp_register_style( 'style', get_stylesheet_directory_uri() . '/style.css', array(), '1', 'all' );
 //   wp_register_style( 'gravity-bootstrap', get_stylesheet_directory_uri() . '/css/gravity-bootstrap.css' );


    wp_enqueue_style( 'normalize');
    wp_enqueue_style( 'jquery.ui.css');
    wp_enqueue_style( 'bootstrap.min' );
    wp_enqueue_style( 'font-awesome.min.css' );
    wp_enqueue_style( 'style');
 //   wp_enqueue_style( 'gravity-bootstrap');
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

add_filter('pre_get_posts', 'query_post_type');
function query_post_type($query) {
  if(is_category() || is_tag()) {
    $post_type = get_query_var('post_type');
    if($post_type)
        $post_type = $post_type;
    else
        $post_type = array('post','staff'); // replace cpt to your custom post type
    $query->set('post_type',$post_type);
    return $query;
    }
}

/**
* Modfied term list
* Allows you to exclude an array of terms from the list.
*
* Example: <?php echo get_modified_term_list( $post->ID, 'subject', '', ', ', '', array(term) ); ?>
*
**/

function get_modified_term_list( $id = 0, $taxonomy, $before = '', $sep = '', $after = '', $exclude = array() ) {
    $terms = get_the_terms( $id, $taxonomy );

    if ( is_wp_error( $terms ) )
        return $terms;

    if ( empty( $terms ) )
        return false;

    foreach ( $terms as $term ) {

        if(!in_array($term->slug,$exclude)) {
            $link = get_term_link( $term, $taxonomy );
            if ( is_wp_error( $link ) )
                return $link;
            $term_links[] = '<a href="' . $link . '" rel="tag">' . $term->name . '</a>';
        }
    }

    if( !isset( $term_links ) )
        return false;

    return $before . join( $sep, $term_links ) . $after;
}


/**
* Staff Directory Custom Post Type
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
        'taxonomies' => array( 'department', 'unit', 'group', 'subject' ),
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


// Group Taxonomy
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


// Subjects Taxonomy
add_action( 'init', 'subject_init' );

function subject_init() {
  register_taxonomy('subject',array('staff'), array(

    'hierarchical' => true,
    'labels' => array(
    'name' => _x( 'Subject', 'taxonomy general name' ),
    'singular_name' => _x( 'Subject', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Subjects' ),
    'all_items' => __( 'All Subjects' ),
    'parent_item' => __( 'Parent Subject' ),
    'parent_item_colon' => __( 'Parent Subject:' ),
    'edit_item' => __( 'Edit Subject' ),
    'update_item' => __( 'Update Subject' ),
    'add_new_item' => __( 'Add New Subject' ),
    'new_item_name' => __( 'New Subject Name' ),
    'menu_name' => __( 'Subject' ),
  ),
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'subject', 'with_front' => false ),
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
