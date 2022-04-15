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
* QuickSearch search
* Add the QuickSearch search bar to any section of the website.
*
*[QuickSearch]
**/
function search_quicksearch( $form ) {

    $form = '
  <form role="form" class="search search-quicksearch" action="https://search.ebscohost.com/login.aspx?" method="GET" onsubmit="ebscoPreProcess(this)" >
      <input name="direct" type="hidden" value="true">
      <input name="site" type="hidden" value="ehost-live">
      <input name="scope" type="hidden" value="site">
      <input name="type" type="hidden" value="0">
      <input name="site" type="hidden" value="eds-live">
      <input name="authtype" type="hidden" value="ip,guest,cookie,shib">
      <input name="custid" type="hidden" value="current">
      <input name="groupid" type="hidden" value="main">
      <input name="profile" type="hidden" value="eds">
      <input name="guidedField_3" type="hidden" value="">
      <label class="sr-only" for="ebscohostsearchtext">Search All</label>
      <div class="input-group">
        <input id="ebscohostsearchtext" autosave="UCFLibrary SiteSearch" class="form-control" class="textbox" name="bQuery" placeholder="Search Databases, Articles, and Catalog" results="5" size="60" type="text" x-webkit-speech="" >
        <span class="input-group-btn">
          <button type="submit" class="btn btn-primary" onclick="__gaTracker(\'send\', \'event\', \'outbound-search\', $(\'#ebscohostsearchtext\').val(), \'QuickSearch\');"><span class="glyphicon glyphicon-search"></span><span class="sr-only">Search</span></button>
        </span>
      </div>
    </form>
';

    return $form;
}
add_shortcode('search-quicksearch', 'search_quicksearch');

/**
* QuickSearch search for inside Webcourses
* Add the QuickSearch search bar to the webcourses include page.
*
*[search-quicksearch-webcourses]
**/
// function search_quicksearch_webcourses( $form ) {

//     $form = '
//   <form role="form" class="search search-quicksearch" action="https://login.ezproxy.net.ucf.edu/login?auth=shibb&url=https://search.ebscohost.com/login.aspx ?" method="GET" onsubmit="ebscoPreProcess(this)">
//       <input name="direct" type="hidden" value="true">
//       <input name="site" type="hidden" value="ehost-live">
//       <input name="scope" type="hidden" value="site">
//       <input name="type" type="hidden" value="0">
//       <input name="site" type="hidden" value="eds-live">
//       <input name="authtype" type="hidden" value="ip,guest,cookie,shib">
//       <input name="custid" type="hidden" value="current">
//       <input name="groupid" type="hidden" value="main">
//       <input name="profile" type="hidden" value="eds">
//       <input name="guidedField_3" type="hidden" value="">
//       <label class="sr-only" for="ebscohostsearchtext">Search All</label>
//       <div class="input-group">
//         <input id="ebscohostsearchwebcoursestext" autosave="UCFLibrary SiteSearch" class="form-control" class="textbox" name="bQuery" placeholder="Search Databases, Articles, and Catalog" results="5" size="60" type="text" x-webkit-speech="" >
//         <span class="input-group-btn">
//           <button type="submit" class="btn btn-primary" onclick="__gaTracker(\'send\', \'event\', \'outbound-search\', $(\'#ebscohostsearchwebcoursestext\').val(), \'QuickSearch-webcourses\');"><span class="glyphicon glyphicon-search"></span><span class="sr-only">Search</span></button>
//         </span>
//       </div>
//     </form>
// ';

//     return $form;
// }
// add_shortcode('search-quicksearch-webcourses', 'search_quicksearch_webcourses');

/**
* Articles only search
* Search ebscohost for just articles
*
*[quicksearch-articles]
**/
function search_quicksearch_articles( $form ){
  $form = '
    <form role="form" class="search search-articles" action="https://search.ebscohost.com/login.aspx?" method="GET" onsubmit="ebscoPreProcess(this)">
      <label for="ebscohostsearcharticletext" class="sr-only">Search</label>
      <input name="direct" type="hidden" value="true">
      <input name="site" type="hidden" value="ehost-live">
      <input name="scope" type="hidden" value="site">
      <input name="type" type="hidden" value="0">
      <input name="site" type="hidden" value="eds-live">
      <input name="authtype" type="hidden" value="ip,guest,cookie,shib">
      <input name="custid" type="hidden" value="current">
      <input name="groupid" type="hidden" value="main">
      <input name="profile" type="hidden" value="edsarticle">
      <input name="guidedField_3" type="hidden" value="">
      <input name="doctype" type="hidden" value="160MN">
      <div class="input-group">
        <input id="ebscohostsearcharticletext" autosave="UCFLibrary SiteSearch" class="form-control" name="bQuery" placeholder="Search Articles" results="5" type="text" x-webkit-speech="">
        <span class="input-group-btn">
          <button type="submit" class="btn btn-primary" onclick="__gaTracker(\'send\', \'event\', \'outbound-search\', $(\'#ebscohostsearcharticletext\').val(), \'Article Search\');"><span class="glyphicon glyphicon-search"></span><span class="sr-only">Search</span></button>
        </span>
      </div>
    </form>
  ';
  return $form;
}
add_shortcode('search-quicksearch-articles', 'search_quicksearch_articles');

/**
* Book/catalog search
* Search the catalog
*
*[search-catalog]
**/
function search_catalog( $form ){
  $form = '
    <form role="form" class="search search-catalog"  id="advanced" name="searchAdv" action="https://cf.catalog.fcla.edu/cf.jsp?ADV=S">
      <label for="catalog_search" class="sr-only">Search catalog</label>
      <div class="input-group">
        <input id="catalog_search" type="text" name="t1" value="" placeholder="Search the Catalog" class="form-control" />
        <span class="input-group-btn">
          <button type="submit" class="btn btn-primary" onclick="__gaTracker(\'send\', \'event\', \'outbound-search\', $(\'#catalog_search\').val(), \'Catalog Search\');"><span class="glyphicon glyphicon-search"></span><span class="sr-only">Search</span></button>
        </span>
      </div>
      <div class="row" style="margin-top: 1.5em;">
        <div class="col-sm-6">
          <label for="catsearch" class="sr-only">Choose Type</label>
          <select title="index" id="catsearch" name="k1" class="form-control">
            <option value="kw" selected="">Any Field</option>
            <option value="ti">Title</option>
            <option value="jt">Journal Title</option>
            <option value="au">Author</option>
            <option value="su">Subject Heading</option>
            <option value="nu">ISBN, ISSN, OCLC, etc.</option>
            <option value="cn">Call Number</option>
          </select>
        </div>
        <div class="col-sm-6">
          <label for="avli" class="sr-only">Choose Location</label>
          <select id="avli" name="avli" class="form-control">
            <option value="" selected="selected">Any Locations</option>
            <option value="CFORLANDO">John&nbsp;C.&nbsp;Hitt</option>
            <option value="CFORLANDOREF">John&nbsp;C.&nbsp;Hitt-&nbsp;Reference&nbsp;</option>
            <option value="CFSPECIALCOLL">John&nbsp;C.&nbsp;Hitt-&nbsp;Special&nbsp;Collections&nbsp;</option>
            <option value="CFUSDOCUMENTS">John&nbsp;C.&nbsp;Hitt-&nbsp;U.S.&nbsp;Documents&nbsp;</option>
            <option value="CFMGCBROW">John&nbsp;C.&nbsp;Hitt-&nbsp;Knight&nbsp;Reads</option>
            <option value="CFC*">CMC&nbsp;-&nbsp;Education&nbsp;Building&nbsp;</option>
            <option value="CFWT*">Downtown&nbsp;Campus&nbsp;Library&nbsp;</option>
            <option value="CFHSL*">Health&nbsp;Sciences&nbsp;Library</option>
            <option value="CFRO*">Rosen&nbsp;Campus&nbsp;</option>
            <option value="CFROSBROW">Rosen&nbsp;Campus&nbsp;-&nbsp;Knight&nbsp;Reads</option>
            <option value="CFSAL*">UCF&nbsp;at&nbsp;Altamonte&nbsp;Springs</option>
            <option value="CFBCC*">UCF&nbsp;at&nbsp;Cocoa</option>
            <option value="CFDBG*">UCF&nbsp;at&nbsp;Daytona&nbsp;Beach</option>
            <option value="CFLEE*">UCF&nbsp;at&nbsp;Leesburg</option>
            <option value="CFOCA*">UCF&nbsp;at&nbsp;Ocala</option>
            <option value="CFOSC*">UCF&nbsp;at&nbsp;Osceola</option>
            <option value="CFBMC*">UCF&nbsp;at&nbsp;Melbourne</option>
            <option value="CFBPC*">UCF&nbsp;at&nbsp;Palm&nbsp;Bay</option>
            <option value="CFSLGRES OR CFSLGGC OR CFSLGMED OR CFSLGREF">UCF&nbsp;at&nbsp;South&nbsp;Lake&nbsp;</option>
            <option value="CFSLM*">UCF&nbsp;at&nbsp;Sanford/Lake&nbsp;Mary</option>
            <option value="CFBTC*">UCF&nbsp;at&nbsp;Titusville&nbsp;</option>
            <option value="CFMTW*">UCF&nbsp;at&nbsp;West&nbsp;Orlando</option>
            <option value="CFSEC*">Florida&nbsp;Solar&nbsp;Energy&nbsp;Center</option>
            <option value="CFELE*">Online</option>
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
* Textbook search
* Search Reserves for Textbooks
*
*[search-textbooks]
**/
function search_textbooks( $form ){
  $form = '
    <form role="form" class="search search-textbooks"  id="textbook_search_form" name="textbook_search_form" action="https://reserves.catalog.fcla.edu/cf.jsp?">
      <label for="textbook_search" class="sr-only">Search Textbooks</label>
      <div class="input-group">
        <input id="textbook_search" type="text" name="Ntt" value="" placeholder="Search for textbooks" class="form-control" />
        <span class="input-group-btn">
          <button type="submit" class="btn btn-primary" onclick="__gaTracker(\'send\', \'event\', \'outbound-search\', $(\'#textbook_search\').val(), \'Textbook Search\');"><span class="glyphicon glyphicon-search"></span><span class="sr-only">Search</span></button>
        </span>
      </div>
      <input name="CRopt" type="hidden" value="TAP">
      <input name="Ntk" type="hidden" value="Title">

    </form>
  ';
  return $form;
}
add_shortcode('search-textbooks', 'search_textbooks');

/**
* Video/catalog search
* Search the catalog for videos
*
*[search-videos]
**/
function search_videos( $form ) {
  $form = '
  <form role="form" class="search search-videos" id="advanced_video" name="searchAdv" action="https://cf.catalog.fcla.edu/cf.jsp">
    <label for="video_search" class="sr-only">Find DVDs, streaming videos, and VHS</label>
    <input type="hidden" name="k1" value="kw">
    <input name="ADV" type="hidden" value="S">
    <input type="hidden" name="fa" value="Video all formats">
    <div class="input-group">
      <input class="form-control" id="video_search" type="text" name="t1" size="40" placeholder="Search UCF\'s Video Collections" value="">
      <span class="input-group-btn">
        <button type="submit" class="btn btn-primary" onclick="__gaTracker(\'send\', \'event\', \'outbound-search\', $(\'#video_search\').val(), \'Video Search\');"><span class="glyphicon glyphicon-search"></span><span class="sr-only">Search</span></button>
      </span>
    </div>
    <div class="input-group" style="margin-top: .5em;">
      <label class="checkbox-inline"><input type="checkbox" name="fa" value="Feature or Motion picture"> Feature films</label>
      <label class="checkbox-inline"><input type="checkbox" name="fa" value="Educational"> Educational</label>
      <label class="checkbox-inline"><input type="checkbox" name="fa" value="Documentary"> Documentary</label>
      <label class="checkbox-inline"><input type="checkbox" name="fa" value="Streaming Video"> Streaming</label>
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
      <form role="form" class="search search-scua" id="advanced" name="searchAdv" action="https://cf.catalog.fcla.edu/cf.jsp?ADV=S">

        <input name="ADV" type="hidden" value="S">
        <input type="hidden" id="avli" name="avli" value="CFSPECIALCOLL">
        <label for="scua_search" class="sr-only">Search</label>
        <div class="input-group">
          <input id="scua_search" name="t1" class="form-control" type="search" placeholder="Special Collections Search" />
          <span class="input-group-btn">
          <button type="submit" class="btn btn-primary" onclick="__gaTracker(\'send\', \'event\', \'outbound-search\', $(\'#scua_search\').val(), \'SCUA Search\');"><span class="glyphicon glyphicon-search"></span><span class="sr-only">Search</span></button>
          </span>
        </div>
      </form>
    ';
    return $form;
}
add_shortcode('search-scua', 'search_scua');

/**
* STARS Search bar shortcode
* Searches STARS repository
*
* Example [search-stars]
**/
function search_stars($form) {
    $form = '
      <form method="get" action="https://stars.library.ucf.edu/do/search/" id="sidebar-search">
        <fieldset>      
          <label for="search" class="sr-only">Search </label>          
          <div class="input-group">
            <input class="form-control" type="text" name="q" class="search" id="search" placeholder="Search Collection">
            <input name="fq" type="hidden" value="virtual_ancestor_link:&quot;https://stars.library.ucf.edu/&quot;">
            <span class="input-group-btn">  
              <button type="submit" class="btn btn-default" name="query" value="Search"><span class="glyphicon glyphicon-search"></span><span class="sr-only">Search</span></button>
            </span>        
          </div>     
        </fieldset>
      </form>
    ';
    return $form;
}
add_shortcode('search-stars', 'search_stars');


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
* [/homepage-tab-container]
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
*Example: [recent-posts posts="3" category_id="6"] (Requires looking up the category ID in wordpress admin)
*
**/
function recent_posts_function($atts){
   extract(shortcode_atts(array(
      'posts' => 3,
      'category_id' => -0,
      'size' => 'medium',
   ), $atts));

   $return_string = '<div class="news"><article>';
   if ($size == 'small') {
    $return_string .= '<div class="list-group">';
   }
   query_posts(array('orderby' => 'date', 'order' => 'DESC' , 'showposts' => $posts, 'cat' => $category_id));
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
        // if ($size != 'small') {
          if (has_post_thumbnail()) {       // Check if post has a featured image.
            $thumbnail = get_the_post_thumbnail( $post_id,'homepage-thumbnail', array('class' => 'homepage-thumbnail'));
          } else {                          // Use the default thumbnail instead.
            $thumbnail = '<img class="homepage-thumbnail" src="'.get_template_directory_uri().'/images/generic-default-thumb.jpg">';
          }
          if (get_post_meta(get_the_ID() , 'thumbnail', true)){                         // Check if post has custom field named thumbnail.
            $thumbnail_id = get_post_meta(get_the_ID() , 'thumbnail', true);            // Gets the contents of the custom field, which is the post ID of the thumbnail image.
            if (wp_get_attachment_image( $thumbnail_id, 'homepage-thumbnail' )) {       // Checks if post meta image id is valid.
              $thumbnail = wp_get_attachment_image( $thumbnail_id, 'homepage-thumbnail' );  
            }
          }
        // }
        // if ($thumbnail_image){           
        //   $thumbnail = $thumbnail_image;
        //   // if (filter_var($url, FILTER_VALIDATE_URL) !== false) {      // Check if string is a valid URL
        //   //   $url = set_url_scheme( $url, $scheme );                   // Change the scheme of the URL to match the site (either http or https)
        //   //   $array = get_headers($url);
        //   //   $string = $array[0];
        //   //   if(strpos($string,"200")) {
        //   //       $thumbnail = '<img class="homepage-thumbnail" src="'.$url.'">';
        //   //   }
        //   // }
        // } 
        if ($size == 'small'){
          $return_string .='
          <a href="'.get_permalink().'" class="list-group-item">
            <div class="news-post-image-small">'.$thumbnail.'</div>
            <p class="news-post-title-small">'.get_the_title().'</p>
            <span class="news-post-date-small">Posted: <i class="fa fa-calendar"></i> '.get_the_time('F jS, Y').'</span>
          </a>';
        } else {
          $return_string .=
          '<div class="news-post card">
              <div class="news-post-image"><a href="'.get_permalink().'">'.$thumbnail.'</a></div><!-- '.$url.' -->
              <div class="news-post-text">
                <div class="news-post-title">
                  <header>
                    <h3><a href="'.get_permalink().'">'.get_the_title().'</a></h3>
                    <span class="news-post-category">'.trim($output, $separator).'</span>
                    <span class="news-post-date">Posted: <i class="fa fa-calendar"></i> '.get_the_time('F jS, Y').'</span>
                  </header>
                </div>
                <p>'.get_the_excerpt().'</p>
              </div>
            </div>';
        }
      endwhile;
   endif;
   if ($size == 'small') {
    $return_string .= '</div>';
   }
   $return_string .= '</article></div>';

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
*[youtube id="cJHCKkCesuE" width="500" title=""]
**/
function youtube_video($atts) {
  extract(shortcode_atts( array(
      'id' => '62NEzgmqwx0',
      'width' => '100%',
      'list' => '',
      'title' => 'Youtube Video',
  ), $atts ));
  return '<div class="responsive-wrapper" style="max-width:'.$width.';">
            <div class="responsive-container youtube">
             <iframe title="'.$title.'"" src="https://youtube.com/embed/'.$id.'?list='.$list.'" frameborder="0" allowfullscreen></iframe>
            </div>
          </div>';
}
add_shortcode('youtube', 'youtube_video');


/**
* Vimeo shortcode
* Create embedded vimeo links that are responsive.
*
* Example:
* [vimeo id="" width ="50%" title=""]
**/
function vimeo_video($atts) {
  extract(shortcode_atts( array(
      'id' => '171786784',
      'width' => '100%',
      'title' => 'Vimeo Video',
  ), $atts ));
  return '
    <div class="responsive-wrapper" style="max-width: '.$width.';">
      <div class="responsive-container vimeo">
        <iframe title="'.$title.'"" src="https://player.vimeo.com/video/'.$id.'" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
      </div>
    </div>';
}
add_shortcode('vimeo', 'vimeo_video');

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
* Create a dl list for the current daily hours. Specify the ids of the libraries in the shortcode.
*
*Example:
*[hours-today-homepage ids="1206, 1209, 10190, 1211"]
*
**/
function hours_today_homepage( $atts ) {
  extract(shortcode_atts( array(
    'ids' => '1206, 1209, 1211',
  ), $atts ));
  $ids = explode(', ', $ids);
  $string = wp_remote_get('https://api3.libcal.com/api_hours_today.php?iid=246&lid=0&format=json', array( 'timeout' => 15 ));
  if (is_array( $string)) {
    $json_o = json_decode($string['body']);
    if ($json_o != null) {
      $hours_list = '<dl class="dl-horizontal homepage">';
      foreach ($json_o->locations as $location) if (in_array($location->lid, $ids)) {    
        $hours_list .= '<dt><a href="'.$location->url.'">'.$location->name.'</a></dt><dd>'.$location->rendered.'</dd>';
      }
      $hours_list .= '</dl>';
    } else {
      $hours_list = '<p style="text-align: center">Unable to load hours.</p>';
    }
  } else {
    $hours_list = '<p style="text-align: center">Unable to load hours.</p>';
  }
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
  $string = wp_remote_get('https://api3.libcal.com/api_hours_today.php?iid=246&lid=0&format=json', array( 'timeout' => 15 ));
  if (is_array( $string)) {
    $json_o = json_decode($string['body']);
    if ($json_o != null) {
      $hours = '';
      foreach ($json_o->locations as $location) if ($location->lid == $id) {
        $hours .= '<span class="department-hours"><!-- '.$location->name.'-->'.$location->rendered.'</span>';
      }
    } else {
      $hours = '<p>Unable to load hours.</p>';
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

  $string = wp_remote_get('https://events.ucf.edu/calendar/2084/ucf-libraries-events/upcoming/feed.json', array( 'timeout' => 15 ));
  if (is_array( $string)) {
    $json_o = json_decode($string['body']);
    if ($json_o != null) {
      $events_list = '';
      $i = 0;
      date_default_timezone_set('America/New_York');
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
      $events_list = '<p style="margin: 1em;"><strong>No events available.</strong></p>';
    }
  } else {
    $events_list = '<p style="margin: 1em;"><strong>No events available.</strong></p>';
  }

  return $events_list;
}

add_shortcode('library-events', 'library_events');


/**
* Computer Availability
* Lists the number of available computers per floor
*
* Example:
* [computer-availability id="1"]
*
**/
function computer_availability($atts) {
   extract(shortcode_atts(array(
      'id' => '1',
   ), $atts));
  $string = wp_remote_get('http://libweb.net.ucf.edu/Web/Db.php?q=publicStatusPCs&format=json&l='.$id, array(
    'user-agent' => 'DummyAgentForDetectMobileBrowser.php',
    ));
  if (is_array( $string)) {
    $json_o = json_decode($string['body']);
    if ($json_o != null) {
      $computers_list = '<div class="computer-availability">';
      if ($id == '1') {
        $i = 1;
        $floors = 5;
      } elseif ($id == '5' || $id == '13') {
        $i = 1;
        $floors = 1;
      } else{
      }
      while ( $i <= $floors ) {
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
        if ($machines_available > 0) {
          if ($percent_available > 33) {
            $progress_color = 'progress-bar-success';
          } else {
            $progress_color = 'progress-bar-warning';
          }
          
        } else {
          $progress_color = 'progress-bar-danger';
        }
        $computers_list .= '
          <div class="row">
            <div class="col-sm-3"><span class="floor-name">'.$floor_number.' Floor <i class="fa fa-desktop"></i>:</span></div>
            <div class="col-sm-9">
              <div class="progress">
                <div class="progress-bar '.$progress_color.'" role="progressbar" aria-valuenow="'.$percent_available.'" aria-valuemin="0" aria-valuemax="100" style="min-width: 4em; width: '.$percent_available.'%;">
                  '.$machines_available.' / '.$machines_total.'
                </div>
              </div>
            </div>
          </div>';
        $i++;
      }
      $computers_list .= '</div>';
    } else {
      $computers_list = '<p>Unable to determine computer availability.</p>';
    }
  } else {
    $computers_list = '<p>Unable to determine computer availability.</p>';
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
* Insert an alert message box onto a page.
*
* Example:
* [alert-message type="info"]
* Alert message goes here in the editor.
* [/alert-message]
*
**/
function alert_message($atts, $content = null) {
  extract(shortcode_atts(array(
    'type' => 'info',
  ), $atts));
  $output = '';
  $output = '
    <div class="row">
      <div class="col-sm-12">
        <div class="alert alert-'.$type.' alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          '.do_shortcode($content).'
        </div>
      </div>
    </div>';
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
* Discovery RSS Feed
* Inserts Discovery Feed for ScholCom
*
*[discovery-feed]
*
**/
function discovery_feed() {
  $output = '<div id="feed"></div>
  <script type="text/javascript" src="https://rss2json.com/gfapi.js"></script>
  <script> discovery_feed() </script>';
  return $output;
}
add_shortcode('discovery-feed', 'discovery_feed');


/**
* Subject Librarian Newsletter RSS Feed
* Inserts newsletter Feed for Subject Librarians
*
*[newsletter-feed]
*
**/
function newsletter_feed($atts) {
  extract(shortcode_atts(array(
      'librarian' => 'moran',
  ), $atts));
  $output = '<div id="'.$librarian.'_newsletter_feed"></div>
  <script type="text/javascript" src="https://rss2json.com/gfapi.js"></script>
  <script> librarian_newsletter_feed("'.$librarian.'") </script>';
  return $output;
}
add_shortcode('newsletter-feed', 'newsletter_feed');


/**
* STARS Most Recent RSS Feed
* Inserts Feed for Most Recent Publications
*
*[stars-feed-list feed_url="ttps://stars.library.ucf.edu/topdownloads.html" container_id="top_download_feed"]
*
**/
function stars_feed_list($atts) {
  extract(shortcode_atts(array(
      'feed_url' => 'https://stars.library.ucf.edu/topdownloads.html',
      'container_id' => 'feed_container',
      'number' => '10',
  ), $atts));
  $output = '<div id="'.$container_id.'"></div>
  <script type="text/javascript" src="https://rss2json.com/gfapi.js"></script>
  <script> stars_feed_list("'.$feed_url.'","'.$container_id.'","'.$number.'") </script>';
  return $output;
}
add_shortcode('stars-feed-list', 'stars_feed_list');


/**
* ILL Lending Login
* Allows ILL patrons to login to the lending site
*
*[lending-login]
*
**/
function lending_login() {
  $output = '<form  class="form-horizontal" action="https://illiad.library.ucf.edu/lending/illiadlending.dll" method="post" name="ILLiadLogin" id="ILLiadLogin">
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
          <input type="submit" class="btn btn-primary" name="SubmitButton" value="Logon to ILLiad"> or <a href="https://library.ucf.edu/services/lending/new-lending-account/" >First Time User Registration</a>
      </div>
    </div>
    </fieldset>
  </form>';
return $output;
}
add_shortcode('lending-login', 'lending_login');


/**
* Job App Hiring Status
* Gives the status of all departments on whether or not they are hiring.
*
* [hiring-status]
* Requires <div class="collapse" id="Department-Name">...</div> on the page for each department in the system, or else the link will do nothing.
**/

function hiring_status($atts) {
  $departments = get_field('hiring_departments');
  $output = '';
  if ($departments) {
    $output = '<dl class="dl-horizontal hiring-list">';
    foreach ($departments as $department) {
      if (get_field($department['value'].'_ops_url')){
        $hiring_url_ops = get_field($department['value'].'_ops_url');
      } else {
        $hiring_url_ops = '';
      }
      if (get_field($department['value'].'_fws_url')){
        $hiring_url_fws = get_field($department['value'].'_fws_url');
      } else {
        $hiring_url_fws = '';
      }
      $output .= '<dt>'.$department['label'].':</dt><dd><i class="fa fa-check-circle"></i> is actively seeking applications. <button class="btn btn-default" type="button" data-toggle="modal" data-target="#'.$department['value'].'">View Job Details</button>';
      if ($hiring_url_ops !='') {
        $output .= ' <a class="btn btn-primary" href="'.$hiring_url_ops.'" target="_blank">Apply (OPS)</a>';
      } 
      if ($hiring_url_fws !='') {
        $output .= ' <a class="btn btn-primary" href="'.$hiring_url_fws.'" target="_blank">Apply (FWS)</a>';
      }
      $output .='</dd>';
    }
    $output .= '</dl>';
  } else {
    $output = '<p>No departments are actively hiring now. Thank you for your interest in the Libraries.</p>';
  }
  return $output;
}
add_shortcode('hiring-status', 'hiring_status');


function databases() {
  return '
  <script>
    springshare_widget_config_1441806520859 = { path: \'subjects\' };
  </script>
  <div id="s-lg-widget-1441806520859"></div>
  <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?\'http\':\'https\';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://lgapi.libapps.com/widgets.php?site_id=626&widget_type=4&load_type=2&widget_embed_type=1&output_format=1&list_format=1&drop_text=Select+a+Subject...&sort_type=0&widget_title=Subject+List&widget_height=250&widget_width=100%25&widget_link_color=2954d1&guide_published=1&show_guides=3&window_target=2&config_id=1441806520859";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","s-lg-widget-script-1441806520859");</script>
  ';
}
add_shortcode('databases','databases');


/**
* Image slider
* Places a bootstrap image slider onto the page
*
* [image-slider id="id" number="3"]
* <div class="item active">
*   <img src="" alt="" />
*   <div class="carousel-caption">Caption #1</div>
* </div>
* <div class="item">
*   <img src="" alt="" />
*   <div class="carousel-caption">Caption #2</div>
* </div>
* <div class="item">
*   <img src="" alt="" />
*   <div class="carousel-caption">Caption #3</div>
* </div>
* [/image-slider]
**/

function image_slider($atts, $content = null) {
    extract(shortcode_atts( array(
      'id' => 'image_slider',
      'number' => 3,
  ), $atts ));
  $content = str_replace('<p>', '', $content);
  $content = str_replace('</p>', '', $content);
  $content = str_replace('<br>', '', $content);
  $content = str_replace('<br />', '', $content);
  $output =' 
    <div id="'.$id.'" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#'.$id.'" data-slide-to="0" class="active"></li>';
  for ($i=1; $i < $number; $i++) { 
    $output .= '<li data-target="#'.$id.'" data-slide-to="'.$i.'"></li>';
  }
  $output .='     
      </ol>
      <!-- Wrapper for slides -->
      <div class="carousel-inner">
      '.shortcode_unautop( $content ).'
      </div>
      <!-- Controls -->
      <a class="left carousel-control" href="#'.$id.'" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#'.$id.'" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
   ';
   return $output;
}
add_shortcode('image-slider', 'image_slider');


/**
* STARS Readership map
* Embeds a map from stars.library.ucf.edu that shows recent readership
*
* [stars-map]
*
**/

function stars_map() {
  $url = site_url();
  $output = '
    <div id="rdr-embed" data-width="100%" data-height="445" style="width=100%; max-width:666px; border=0; margin:0 auto;"></div>
    <script> 
       window.rdrAsync = function() { 
         RDR.init({ 
           mapContext: "7014507", 
           datastreamHost: "datastream.bepress.com", 
           datastreamPort: "443", 
           datastreamStaticRoot: "//assets.bepress.com/current/", 
           colorCode: "custom", 
           customColor: "", 
           customSaturation: "0", 
           customLightness: "0", 
           institution_title: "University of Central Florida", 
           site_title: "STARS",  
           site_link: "http://stars.library.ucf.edu", 
           instCountryCode: "us", 
           instCity: "Orlando", 
           instRegion: "Florida", 
           instCountry: "United States", 
           origin: "'.$url.'", 
           refreshRate: 3600000, 
           homepageMap: 1, 
           publicationMap: 0,  
           embedMap: 1, 
           zoom: 1, 
           minZoom: 1, 
           stats_host: "https://www.bepress.com", 
         }); 
       }; 
     </script> 
     <script src="https://assets.bepress.com/current/shared/embed/rdr.js" async="true"></script>
  ';
  return $output;
}
add_shortcode('stars-map', 'stars_map');


/**
* Countdown Timer
* Adds a countdown timer onto a page.
*
* [countdown-timer year="2018" month="12" day="6" hour="15" minute="28"] (hours entered in 24 hour format)
*
**/

function countdown_timer($atts, $content = null) {
  extract(shortcode_atts( array(
      'year' => '2035',
      'month' => '9',
      'day' => '7',
      'hour' => '5',
      'minute' => '30',
      'font_size' => '1em',
      'title' => 'Countdown Complete!',
  ), $atts ));
  $output = '
    <div id="countdown_timer" class="countdown-timer" style="font-size: '.$font_size.';"></div>
    <div class="modal fade" id="countdown_finished" tabindex="-1" role="dialog" aria-labelledby="countdown_finished_label">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="countdown_finished_label">'.$title.'</h4>
          </div>
          <div class="modal-body">
            '.do_shortcode($content).'
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <script>
      $(document).ready(function () {
        var date = new Date('.$year.', '.($month-1).', '.$day.', '.$hour.', '.$minute.');
        var $display = $("#countdown_timer");
        countdown($display, date);
        timer_interval = setInterval(function () { countdown($display, date); }, 1000);
      });
    </script>
  ';
  return $output;
}
add_shortcode('countdown-timer', 'countdown_timer');


/**
* Modal Window
* Adds a modal window onto a page.
*
* [modal-window id="modal_name" title="Modal Title"]
*   Body content for modal
* [/modal-window]
*
**/
function modal_window($atts, $content = null) {
  extract(shortcode_atts( array(
      'id' => '',
      'title' => '',
  ), $atts ));
  $output = '
    <!-- Modal -->
    <div class="modal fade" id="'.$id.'" tabindex="-1" role="dialog" aria-labelledby="'.$id.'Label">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="'.$id.'Label">'.$title.'</h4>
          </div>
          <div class="modal-body">
            '.do_shortcode($content).'
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  ';
  return $output;
}
add_shortcode('modal-window', 'modal_window');


/**
* Referral page notification
* Detects if the referral url matches the url set and shows a different modal if the match was successful or not
* Modals must be made in wordpress, modal ids must be either modal_match or modal_no_match.
*
* [referral-message url="url you wish to match against"]
*
**/
function referral_message($atts, $content = null) {
  extract(shortcode_atts( array(
      'url' => '',
  ), $atts )); 
  $referral_url = '';
  $referral_url = $_SERVER['HTTP_REFERER'];
  if ($url == $referral_url) {
    return '<!-- URL match! -->
      <!-- Referral URL = '.$referral_url.'-->
      <script>
        $(document).ready(function() {
          $(\'#modal_match\').modal(\'show\');
        });
      </script>
    ';
  } else {
    return '<!-- No URL match! -->
      <!-- Referral URL = '.$referral_url.'-->
      <script>
        $(document).ready(function() {
          $(\'#modal_no_match\').modal(\'show\');
        });
      </script>
    ';
  }
}
add_shortcode('referral-message', 'referral_message');

?>
