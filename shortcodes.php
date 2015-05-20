<?php 

/**
* Website search
* Add the wordpress search bar to any section of the website.
*
*[search-website]
**/

function search_website( $form ) {
  $form = get_search_form(false);
  return $form;
}
add_shortcode('search-website', 'search_website');


/**
* OneSearch search
* Add the OneSearch search bar to any section of the website.
*
*[OneSearch]
**/
function OneSearchform( $form ) {

    $form = '
  <form role="search" action="http://search.ebscohost.com/login.aspx?" method="GET" onsubmit="ebscoPreProcess(this)" target="_blank" >
      <label class="sr-only" for="s">Search All</label>
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
      <input id="ebscohostsearchtext" autosave="UCFLibrary SiteSearch" class="form-control" class="textbox" name="bQuery" placeholder="Search Catalog and Databases" results="5" size="60" type="text" x-webkit-speech="" >
        <span class="input-group-btn">
          <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
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
          <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
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
        <input id="box" type="text" name="st" value="" placeholder="Search Books" class="form-control">
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
          <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
        </span>
      </div>
    </form>
  ';
  return $form;
}
add_shortcode('search-catalog', 'search_catalog');


/**
*Create a jquery tab box for the homepage - ToDo - make this box generic/more streamlined.
*
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
  return '<div id="tabs">
              <ul>
                <li><a href="#QuickSearch"><span>QuickSearch</span></a></li>
                <li><a href="#Articles"><span>Articles</span></a></li>
                <li><a href="#Books"><span>Books</span></a></li>
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


/** 
* Recent posts shortcode
* Shows the 3 most recent news stories published.
*
*Example: [recent-posts posts="3"]
*
**/
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
         <div class="news-post card">
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
*Icon shortcode
*Create either a glyphicon or  anywhere on the page.
*
*Example:
*[icon name="search" type="fa"]
*
**/
function icon_graphic($atts) {
  extract(shortcode_atts( array(
      'name' => 'search',
      'type' => ''
  ), $atts ));
  if ($type == 'fa') {
    return '<i class="fa fa-'.$name.'"></i>';
  } else {
    return '<span class="glyphicon glyphicon-'.$name.'"></span>';
  }
}
add_shortcode('icon', 'icon_graphic');


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
            <div class="responsive-container youtube">
             <iframe src="http://youtube.com/embed/'.$id.'?list='.$list.'" frameborder="0" allowfullscreen></iframe>
            </div>
          </div>';
}
add_shortcode('youtube', 'youtube_video');


/**
*Bootstrap Tabs Shortcode
*Create bootstrap tabs with this shortcode
*
*[tab-container names="name1, name2, name3"]
*[tab-pane name="name1"]
* Tab content here
*[/tab-pane]
*[tab-pane name="name2"]
* Tab content here
*[/tab-pane]
*[tab-pane name="name3"]
* Tab content here
*[/tab-pane]
*[/tab-container]
**/
function tab_container($atts, $content = null) {
  extract(shortcode_atts( array(
      'names' => 'placehold',
  ), $atts ));
  $content = cleanup(str_replace('<br />', '', $content));
  $ids = explode(", ", $names);
  $i = 0;
  $output = '
    <div class="tab-container" role="tabpanel">

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">';
  foreach($ids as $id) {
    $id_name = $id;
    $id = str_replace(' ', '-', $id);
    $id = str_replace('.', '', $id);
    $id = str_replace('&', '', $id);
    if($i == 0) {
      $output .= '<li class="active" role="presentation"><a data-toggle="tab" href="#'.$id.'" title="'.$id_name.'" aria-controls="'.$id.'" role="tab" >'.$id_name.'</a></li>';
  } else {
      $output .= '<li role="presentation"><a data-toggle="tab" href="#'.$id.'" title="'.$id_name.'" aria-controls="'.$id.'" role="tab" >'.$id_name.'</a></li>';
  }
  ++$i;
  }
  $output .= '
   </ul>

  <!-- Tab panes -->
  <div class="tab-content">'.do_shortcode($content).'</div></div>';
  return $output;
}
add_shortcode('tab-container', 'tab_container');

function tab_pane($atts, $content = null) {
  extract(shortcode_atts( array(
      'name' => 'placeholder',
      'active' => '',
  ), $atts ));
  $name = str_replace(' ', '-', $name);
  $name = str_replace('.', '', $name);
  return '<div role="tabpanel" class="tab-pane '.$active.'" id="'.$name.'">'.do_shortcode($content).'</div>';
}
add_shortcode('tab-pane', 'tab_pane');


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
             <iframe src="//api3.libcal.com/embed_mini_calendar.php?mode=month&iid=246&cal_id=1351&l=5&h=500" frameborder="0" allowfullscreen></iframe>
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
* Hours Weekly Calendar Shortcode
* Displays the weekly hours for a given library ID. Defaults to 0 to show all Libraries. 
*
*Example: 
*[hours-calendar id="0"]
**/
function hours_week_calendar( $atts ) {
  extract(shortcode_atts( array(
    'id' => '0',
  ), $atts ));
  return '
  <script src="http://api3.libcal.com/js/hours_grid.js?002"></script>

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
* Create a dl list for the current daily hours. Only shows hours for Hitt Rosen and CMC
*
*Example:
*[hours-today-homepage]
*
**/
function hours_today_homepage( $atts ) {
  $string = file_get_contents('http://api3.libcal.com/api_hours_today.php?iid=246&lid=0&format=json');
  $json_o = json_decode($string);
  $hours_list = '<dl class="dl-horizontal homepage">';
  foreach ($json_o->locations as $location) if ($location->lid == '1206' || $location->lid == '1209' || $location->lid == '1211') {
      $hours_list .= '<dt>'.$location->name.'</dt><dd>'.$location->rendered.'</dd>';
  }
  $hours_list .= '</dl>';
  return $hours_list;
}
add_shortcode('hours-today-homepage', 'hours_today_homepage');


/**
* Single Department Today's Hours
* Display the hours for a single department
*
*Example:
*[hours-today-single id="1206"]
*
**/
function hours_today_single( $atts ) {
  extract(shortcode_atts( array(
    'id' => '1206',
  ), $atts ));
  $string = file_get_contents('http://api3.libcal.com/api_hours_today.php?iid=246&lid=0&format=json');
  $json_o = json_decode($string);
  $hours = '';
  foreach ($json_o->locations as $location) if ($location->lid == $id) {
    $hours .= '<span class="department-hours"><!-- '.$location->name.'-->'.$location->rendered.'</span>';
  }

  return $hours;
}
add_shortcode('hours-today-single', 'hours_today_single');


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
* Ask a Librarian chat widget
* Insert the Ask a Librarian chat widget anywhere on the site.
*
* Example:
* [ask-chat]
*
**/
function ask_chat() {
  $output = '
<div class="libraryh3lp" style="display: none;" jid="mainlibrary@chat.libraryh3lp.com">
  <iframe src="https://libraryh3lp.com/chat/mainlibrary@chat.libraryh3lp.com?skin=24425&amp;identity=Librarian&sounds=true" frameborder="0" style="width: 99%; height: 300px; border: 1px solid #ccc; border-radius: 4px;"></iframe>
  <p style="text-align: center">Your chat will be disconnected 
  if you leave this page during a conversation.<br>
</div>
<div class="libraryh3lp" style="display: none;">
  <p style="text-align: center" class="Red">Instant Message Chat is closed.<br>
  Send a <a href="http://www.askalibrarian.org/ucf" class="Red"><strong>Standard Chat</strong></a> to us instead.</p>
  <iframe src="https://libraryh3lp.com/chat/mainlibrary@chat.libraryh3lp.com?skin=24425&amp;identity=Librarian&sounds=true" frameborder="0" style="width: 99%; height: 200px; border: 1px solid #ccc; border-radius: 4px;"></iframe>
<!--p class="ImportantNote" style="text-align: center;">Chat is offline.</p-->
</div>

<!-- Place this script as near to the end of your BODY as possible. -->
<script type="text/javascript">
  (function() {
    var x = document.createElement("script"); x.type = "text/javascript"; x.async = true;
    x.src = (document.location.protocol === "https:" ? "https://" : "http://") + "libraryh3lp.com/js/libraryh3lp.js?multi"
    var y = document.getElementsByTagName("script")[0]; y.parentNode.insertBefore(x, y);
  })();
</script>';
return $output;
}
add_shortcode('ask-chat','ask_chat');


/**
* Alert Message
* Insert an alert message box onto a page that looks for 1 of 4 custom meta fields.
*
* Example:
* [alert-message]
*
**/
function alert_message() {
  $output = '';
  global $post;
  if(get_post_meta($post->ID, 'success', true) || get_post_meta($post->ID, 'info', true) || get_post_meta($post->ID, 'warning', true) || get_post_meta($post->ID, 'danger', true)): 
    if(get_post_meta($post->ID, 'success', true)):
      $success = get_post_meta($post->ID, 'success', true);
      $output .= '
        <div class="row">
          <div class="col-sm-12">
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              '.$success.'
           </div>
          </div>
        </div>';
    endif;
    if(get_post_meta($post->ID, 'info', true)):
      $info = get_post_meta($post->ID, 'info', true);
      $output .= '
        <div class="row">
          <div class="col-sm-12">
            <div class="alert alert-info alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              '.$info.'
           </div>
          </div>
       </div>';
    endif;
    if(get_post_meta($post->ID, 'warning', true)):
      $warning = get_post_meta($post->ID, 'warning', true);
      $output .= '
        <div class="row">
          <div class="col-sm-12">
            <div class="alert alert-warning alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              '.$warning.'
           </div>
          </div>
        </div>';
    endif;
    if(get_post_meta($post->ID, 'danger', true)):
      $danger = get_post_meta($post->ID, 'danger', true);
      $output .= '
        <div class="row">
          <div class="col-sm-12">
            <div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              '.$danger.'
           </div>
          </div>
       </div>';
    endif;
  endif;
  return $output;
}
add_shortcode('alert-message','alert_message');


?>