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
  <form role="form" class="search search-onesearch" action="https://search.ebscohost.com/login.aspx?" method="GET" onsubmit="ebscoPreProcess(this)" target="_blank" >
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
      <label class="sr-only" for="s">Search All</label>
      <div class="input-group">
        <input id="ebscohostsearchtext" autosave="UCFLibrary SiteSearch" class="form-control" class="textbox" name="bQuery" placeholder="Search Databases, Articles, and Catalog" results="5" size="60" type="text" x-webkit-speech="" >
        <span class="input-group-btn">
          <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
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
    <form role="form" class="search search-articles" action="https://search.ebscohost.com/login.aspx?" method="GET" onsubmit="ebscoPreProcess(this)" target="_blank">
      <label for="bQuery" class="sr-only">Search</label>
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
      <div class="input-group">
        <input id="ebscohostsearchtext" autosave="UCFLibrary SiteSearch" class="form-control" name="bQuery" placeholder="Search Articles" results="5" type="text" x-webkit-speech="">
        <span class="input-group-btn">
          <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
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
    <form role="form" class="search search-catalog"  id="advanced" name="searchAdv" action="https://cf.catalog.fcla.edu/cf.jsp?ADV=S" target="_blank">
      <label for="st" class="sr-only">Search catalog</label>
      <div class="input-group">
        <input id="box" type="text" name="t1" value="" placeholder="Search the Catalog" class="form-control" />
        <span class="input-group-btn">
          <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
        </span>
      </div>
      <div class="row" style="margin-top: 1.5em;">
        <div class="col-sm-6">
          <label for="ix" class="sr-only">Choose Type</label>
          <select title="index" id="catsearch" name="k1" class="form-control">
            <option value="kw" selected="">Any Field</option>
            <option value="ti">Title</option>
            <option value="jt">Journal Title</option>
            <option value="au">Author</option>
            <option value="su">Subject Heading</option>
            <option value="nu">ISBN, ISSN, OCLC, etc.</option>
          </select>
        </div>
        <div class="col-sm-6">
          <select id="avli" name="avli" class="form-control">
            <option value="" selected="selected">Any Locations</option>
            <option value="CFORLANDO">John C. Hitt</option>
            <option value="CFC*">CMC</option>
            <option value="CFHSL*">Health Sciences Library</option>
            <option value="CFRO*">Rosen</option>
            <option value="CFSAL*">Altamonte Springs</option>
            <option value="CFBCC*">Cocoa</option>
            <option value="CFDBG*">Daytona Beach</option>
            <option value="CFLEE*">Leesburg</option>
            <option value="CFOCA*">Ocala</option>
            <option value="CFBPC*">Palm Bay</option>
            <option value="CFSLM*">Sanford/Lake Mary</option>
            <option value="CFSOUTHLAKE">South Lake</option>
            <option value="CFMTW*">Valencia West</option>
          </select>
        </div>
        <input name="ADV" type="hidden" value="S">
      </div>
    </form>
  ';
  return $form;
}
add_shortcode('search-catalog', 'search_catalog');


/**
* Video/catalog search
* Search the catalog for videos
*
*[search-videos]
**/
function search_videos( $form ) {
  $form = '
  <form role="form" class="search search-videos" id="advanced_video" name="searchAdv" action="https://cf.catalog.fcla.edu/cf.jsp" target="_blank">
    <label for="t1" class="sr-only">Find DVDs, streaming videos, and VHS</label>
    <input type="hidden" name="k1" value="kw">
    <input name="ADV" type="hidden" value="S">
    <input type="hidden" name="fa" value="Video all formats">
    <div class="input-group">
      <input class="form-control" id="video_box" type="text" name="t1" size="40" placeholder="Search UCF\'s Video Collections" value="">
      <span class="input-group-btn">
        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
      </span>
    </div>
    <div class="input-group" style="margin-top: .5em;">
      <label class="checkbox-inline"><input type="checkbox" name="fa" value="Feature or Motion picture"> Feature films</label>
      <label class="checkbox-inline"><input type="checkbox" name="fa" value="Educational"> Educational films</label>
      <label class="checkbox-inline"><input type="checkbox" name="fa" value="Documentary"> Documentary films</label>
      <label class="checkbox-inline"><input type="checkbox" name="fa" value="Streaming Video"> Streaming videos</label>
    </div>
  </form>';
  return $form;
}
add_shortcode('search-videos', 'search_videos');

/**
* Special Colletions Search bar shortcode
* Searches the UCF Library catalog for items found in Special Collections or University Archives
*
* Example: [search-scua]
**/
function search_scua($form) {
    $form = '
      <form role="form" class="search search-scua" id="advanced" name="searchAdv" action="http://cf.catalog.fcla.edu/cf.jsp?ADV=S" target="_blank">

        <input name="ADV" type="hidden" value="S">
        <input type="hidden" id="avli" name="avli" value="CFSPECIALCOLL">
        <label for="s" class="sr-only">Search</label>
        <div class="input-group">
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


/**
* JQuery Homepage tabs
* Create a jquery tab box for the homepage.
*
* Example:
* [homepage-tab-container name="One, Two, Three, Four"]
*   [homepage-tab-pane name=""]
*    Content
*   [/homepage-tab-pane]
*   [homepage-tab-pane name="One"]
*    Content
*   [/homepage-tab-pane]
*   [homepage-tab-pane name="Two"]
*    Content
*   [/homepage-tab-pane]
*   [homepage-tab-pane name="Three"]
*    Content
*   [/homepage-tab-pane]
*   [homepage-tab-pane name="Four"]
*    Content
*   [/homepage-tab-pane]
**/

// Homepage Searchbox Shortcode
function hompage_tab_container( $atts, $content = null ) {
  extract(shortcode_atts( array(
      'names' => 'placehold',
  ), $atts ));
  $content = cleanup(str_replace('<br />', '', $content));
  $ids = explode(", ", $names);
  $output = '<div id="tabs">
              <ul>';
  foreach($ids as $id) {
    $id_name = $id;
    $id = str_replace(' ', '-', $id);
    $id = str_replace('.', '', $id);
    $id = str_replace('&amp;', '', $id);
    $id = str_replace('&', '', $id);
    $id = str_replace('/', '', $id);
    $output .= '<li><a href="#'.$id.'"><span>'.$id_name.'</span></a></li>';
  }
  $output .= '</ul>' . do_shortcode($content) . '
          </div>
          <script>
          $( "#tabs" ).tabs();
          </script>';
  return $output;
}
add_shortcode('homepage-tab-container', 'hompage_tab_container');

function homepage_tab_pane($atts, $content = null) {
  extract(shortcode_atts( array(
      'name' => 'placeholder',
      'active' => '',
  ), $atts ));
  $name = str_replace(' ', '-', $name);
  $name = str_replace('.', '', $name);
  $name = str_replace('&amp;', '', $name);
  $name = str_replace('&', '', $name);
  $name = str_replace('/', '', $name);
  return '<div id="'.$name.'">'.do_shortcode($content).'</div>';
}
add_shortcode('homepage-tab-pane', 'homepage_tab_pane');


/**
*Bootstrap Tabs Shortcode
*Create bootstrap tabs with this shortcode
*
*[tab-container names="name1, name2, name3" numbers="(0), (1), (2)" icons="search, book, question-sign"]
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
      'numbers' => '',
      'icons' => '',
  ), $atts ));
  $content = cleanup(str_replace('<br />', '', $content));
  $ids = explode(", ", $names);
  if ($numbers != '') {
    $numbers = explode(", ", $numbers);
  }
  if ($icons != '') {
    $icons = explode(", ", $icons);
  }
  $i = 0;
  $output = '
    <div class="tab-container" role="tabpanel">

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">';
  foreach($ids as $id) {
    $icon = '';
    $id_name = $id;
    $id = str_replace(' ', '-', $id);
    $id = str_replace('.', '', $id);
    $id = str_replace('&amp;', '', $id);
    $id = str_replace('&', '', $id);
    $id = str_replace('/', '', $id);
    $id = str_replace('(', '', $id);
    $id = str_replace(')', '', $id);
    if ($icons[$i] != '') {
      $icon = '<span class="glyphicon glyphicon-'.$icons[$i].'"></span>';
    }
    if($i == 0) {
      $output .= '<li class="active" role="presentation"><a data-toggle="tab" href="#'.$id.'" title="'.$id_name.'" aria-controls="'.$id.'" role="tab" >'.$icon.' '.$id_name.' '.$numbers[$i].'</a></li>';
    } else {
        $output .= '<li role="presentation"><a data-toggle="tab" href="#'.$id.'" title="'.$id_name.'" aria-controls="'.$id.'" role="tab" >'.$icon.' '.$id_name.' '.$numbers[$i].'</a></li>';
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
  $name = str_replace('&amp;', '', $name);
  $name = str_replace('&', '', $name);
  $name = str_replace('/', '', $name);
  $name = str_replace('(', '', $name);
  $name = str_replace(')', '', $name);
  return '<div role="tabpanel" class="tab-pane '.$active.'" id="'.$name.'">'.do_shortcode($content).'</div>';
}
add_shortcode('tab-pane', 'tab_pane');


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
                  <span class="news-post-category">'.trim($output, $separator).' - <i class="fa fa-calendar"></i> '.get_the_time('F jS, Y').'</span>
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
* Temporary Library Map
* A temporary availability map for the library site until a new one is made
*
* Example:
* [map]
**/
function interactive_map($atts) {
  extract(shortcode_atts( array(
      'width' => '100%',
  ), $atts ));
  return '<div class="google-maps">
             <iframe src="http://libweb.net.ucf.edu/Web/Status/Standard/Main/IncludeMap.php" frameborder="0"></iframe>
          </div>';
}
add_shortcode('interactive-map', 'interactive_map');


/**
* General Map
* Use to make a google map of a predifined library location or to any custom point
*
* Example:
* [general-map location="Hitt"]
* OR
* [general-map location="google-map-coordinates-here"]
**/
function general_map($atts) {
    extract(shortcode_atts( array(
      'location' => 'Hitt',
  ), $atts ));
  switch ($location) {
    case '':
      $src = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2954.2590431194503!2d-83.7465872!3d42.230278500000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x883caff162eda409%3A0xb0c1f9213c894648!2sUnknown%2C+Pittsfield+Charter+Township%2C+MI+48108!5e0!3m2!1sen!2sus!4v1436289719938';
      break;
    case 'Hitt':
      $src = 'https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d875.7455309790337!2d-81.20141982209049!3d28.60031308469445!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sus!4v1436290834017';
      break;
    case 'Rosen':
      $src = 'https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d877.1712348227965!2d-81.44179284571355!3d28.428762107708213!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sus!4v1436290994918';
      break;
    case 'CMC':
      $src = 'https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d875.7471532641134!2d-81.20424548715444!3d28.60011841531814!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sus!4v1436291070792';
      break;
    case 'Altamonte':
      $src = 'https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d875.3605067111315!2d-81.41574975829931!3d28.64648059583555!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sus!4v1436291171096';
      break;
    case 'Cocoa':
      $src = 'https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d877.543018943443!2d-80.75894411468059!3d28.383870220119142!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sus!4v1436291275931';
      break;
    case 'Daytona':
      $src = 'https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d870.6827500139531!2d-81.04838862757899!3d29.202045601161537!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sus!4v1436291762901';
      break;
    case 'COM':
      $src = 'https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1755.3586622029607!2d-81.28007195568081!3d28.367394594240633!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sus!4v1436453703193';
      break;
    case 'Leesburg':
      $src = 'https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d873.8414959020026!2d-81.79709471534468!3d28.82796203482712!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sus!4v1436293795981';
      break;
    case 'Ocala':
      $src = 'https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d435.4925656406324!2d-82.17891057312566!3d29.166424826039044!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sus!4v1436294701966';
      break;
    case 'Palm Bay':
      $src = 'https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d2094.7949334536293!2d-80.62999584485338!3d27.99355678209441!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sus!4v1436453802729';
      break;
    case 'Sanford':
      $src = 'https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d874.5443588197293!2d-81.30288227540986!3d28.744118869883454!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sus!4v1436296187647';
      break;
    case 'South Lake':
      $src = 'https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d876.1545525330274!2d-81.70839270489343!3d28.551193246093373!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sus!4v1436296296709';
      break;
    case 'Valencia Osceola':
      $src = 'https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d878.1771815393496!2d-81.38134562572704!3d28.30714626573258!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sus!4v1436296377437';
      break;
    case 'Valencia West':
      $src = 'https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1752.7924647070772!2d-81.46436832764923!3d28.522133249858822!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sus!4v1436296479048';
      break;
    default:
      $src = $location;
      break;
  }
  $output = '<div class="google-maps"> <iframe src="'.$src.'" width="600" height="450" frameborder="0" style="border:0"></iframe> </div>';
  return $output;
}
add_shortcode('general-map', 'general_map');

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
    'weeks' => '16',
  ), $atts ));
  return '
  <script src="https://api3.libcal.com/js/hours_grid.js?002"></script>

  <div id="s-lc-whw'.$id.'"></div>
  <script>
  $(function(){
  var week'.$id.' = new $.LibCalWeeklyGrid( $("#s-lc-whw'.$id.'"), { iid: 246, lid: '.$id.',  weeks: '.$weeks.' });
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
  if ($json_o != null) {
    $hours_list = '<dl class="dl-horizontal homepage">';
    foreach ($json_o->locations as $location) if ($location->lid == '1206' || $location->lid == '1209' || $location->lid == '1211') {
        $hours_list .= '<dt>'.$location->name.'</dt><dd>'.$location->rendered.'</dd>';
    }
    $hours_list .= '</dl>';
  } else {
    $hours_list = '<p style="text-align: center">Unable to load hours.</p>';
  }
  return $hours_list;
}
add_shortcode('hours-today-homepage', 'hours_today_homepage');



function ajax_test () {


}
add_shortcode('ajax-test', 'ajax_test');

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
  if ($json_o != null) {
    foreach ($json_o->locations as $location) if ($location->lid == $id) {
      $hours .= '<span class="department-hours"><!-- '.$location->name.'-->'.$location->rendered.'</span>';
    }
  } else {
    $hours = '<p>Unable to load hours.</p>';
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
  if ($json_o != null) {
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
  } else {
    $events_list = '<p>Unable to load events.</p>';
  }

  return $events_list;
}

add_shortcode('library-events', 'library_events');


/**
* Computer Availability
* Lists the number of available computers per floor
*
* Example:
* [computer-availability]
*
**/
function computer_availability() {
  $string = wp_remote_get('http://library.ucf.edu/Web/Db.php?q=publicStatusPCs&format=json&l=1', array(
    'user-agent' => 'DummyAgentForDetectMobileBrowser.php',
    ));
  $json_o = json_decode($string['body']);
  if ($json_o != null) {
    $computers_list = '<div class="computer-availability">';
    $i = 1;
    while ( $i < 6 ) {
      $machines_in_use = 0;
      $machines_total = 0;
      $machines_available = 0;
      foreach ($json_o as $location) if ($location->location_room_floor == $i) {
        $machines_in_use += $location->machinesInUse;
        $machines_total += $location->machinesTotal;
      }
      $machines_available = ($machines_total-$machines_in_use);
      if ($machines_total != 0) {
        $percent_available = round(($machines_available/$machines_total)*100);
      } else {
        $percent_available = 0;
      }
      switch ($i) {
        case 1:
          $floor_number = '1st';
          break;
        case 2:
          $floor_number = '2nd';
          break;
        case 3:
          $floor_number = '3rd';
          break;
        case 4:
          $floor_number = '4th';
          break;
        case 5:
          $floor_number = '5th';
          break;
        default:
          $floor_number = 'unknown';
          break;
      }
      if ($percent_available > 65) {
        $progress_color = 'progress-bar-success';
      } elseif ($percent_available < 33) {
        $progress_color = 'progress-bar-danger';
      } else {
        $progress_color = 'progress-bar-warning';
      }
      $computers_list .= '
        <div class="row">
          <div class="col-sm-3"><span class="floor-name">'.$floor_number.' Floor <i class="fa fa-desktop"></i>:</span></div>
          <div class="col-sm-9">
            <div class="progress">
              <div class="progress-bar '.$progress_color.'" role="progressbar" aria-valuenow="'.$percent_available.'" aria-valuemin="0" aria-valuemax="100" style="min-width: 2.5em; width: '.$percent_available.'%;">
                '.$machines_available.' / '.$machines_total.'
              </div>
            </div>
          </div>
        </div>';
      $i++;
    }
    $computers_list .= '</div>';
  } else {
    $computers_list = '<p>Unable to determin computer availability.</p>';
  }
  return $computers_list;
  //return '<pre>'.$string['body'].'</pre>';
}
add_shortcode('computer-availability', 'computer_availability');


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


/**
* Guides List
* Insert a list of guides links for a given librarian
*
* Example:
* [guide-list id="12345"]
*
**/
function guide_list($atts) {
  extract(shortcode_atts(array(
      'id' => '',
  ), $atts));
    if ($id != '') {
      $output = "<script>
      springshare_widget_config_1434485025109 = { path: 'guides' };
      </script>
      <div id=\"s-lg-widget-1434485025109\"></div>
      <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+\"://lgapi.libapps.com/widgets.php?site_id=626&widget_type=1&search_terms=&search_match=2&sort_by=name&list_format=1&drop_text=Select+a+Guide...&output_format=1&load_type=2&enable_description=0&enable_group_search_limit=0&enable_subject_search_limit=0&account_ids%5B0%5D=".$id."&widget_title=Guide+List&widget_height=250&widget_width=100%25&widget_link_color=2954d1&widget_embed_type=1&num_results=0&enable_more_results=1&window_target=2&config_id=1434485025109\";fjs.parentNode.insertBefore(js,fjs);}}(document,\"script\",\"s-lg-widget-script-1434485025109\");</script>";
    } else {
      $output = '<!-- No Owner Specified-->';
    }
    return $output;
}
add_shortcode('guide-list', 'guide_list');

/**
* Discovery Rss Feed
* Inserts Discovery Feed for ScholCom
*
*[discovery-feed]
*
**/
function discovery_feed() {
  $output = '<div id="feed"></div>
  <script type="text/javascript" src="https://www.google.com/jsapi"></script>
  <script> discovery_feed() </script>';
  return $output;
}
add_shortcode('discovery-feed', 'discovery_feed');


/**
* ILL Lending Login
* Allows ILL patrons to login to the lending site
*
*[lending-login]
*
**/
function lending_login() {
  $output = '<form  class="form-horizontal" action="https://illiad.net.ucf.edu/lending/illiadlending.dll" method="post" name="ILLiadLogin" id="ILLiadLogin">
  <fieldset>
    <legend>Lending Login</legend>
    <input type="hidden" name="IlliadForm" value="LendingLogon">
    <input type="hidden" name="WebSessionLogoutPage" value="LendingLogon.html">
    <div class="form-group">
      <label class="col-sm-2 control-label" for="Username">Library Login:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" size="15" name="Username" id="Username" placeholder="Username" >
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label" for="Password">Password:</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" size="15" name="Password" id="Password" placeholder="Password">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
          <input type="submit" class="btn btn-primary" name="SubmitButton" value="Logon to ILLiad"> or <a href="https://illiad.net.ucf.edu/lending/LendingFirstTime.html" >First Time User Registration</a>
      </div>
    </div>
    </fieldset>
  </form>';
return $output;
}
add_shortcode('lending-login', 'lending_login');
?>
