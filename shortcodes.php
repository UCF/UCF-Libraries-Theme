<?php

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
    <button id="search-button" type="submit"><span class="glyphicon glyphicon-search">&nbsp;</span><span class="btn_text">Search</span></button>
    </div>
    </form>';

    return $form;
}

add_shortcode('OneSearch', 'OneSearchform');

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


/**
*Glyphicons
*Create a glyphicon anywhere on the page. 
*
*Example:
*[icon ]
*
*
*
*
*
**/
/*
function GlyphIcon ($atts) {
  $a = shortcode_atts( array(

  ), $atts );
  return '<span class="glyphicon glyphicon-map-marker"><!-- Map Marker --></span>';
}
add_shortcode('icon', 'GlyphIcon');
*/

?>