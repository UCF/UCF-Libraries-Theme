<?php

// Create Shortcode for displaying texbook objects from rest API
add_shortcode('textbook-objects-display', 'textbook_objects_display');

function textbook_objects_display($atts) {
  extract(shortcode_atts(array(
    'desc' => '',
  ), $atts));
  wp_enqueue_script( 'textbook-rest-ajax-script', get_template_directory_uri().'/js/textbooks.js', 'jquery');
  //This allows us to add a custom field to the textbook page and put all the select options into that field.
  global $post;
  $option_list ='';
  if (get_post_meta($post->ID, 'course_departments', true)){
    $select_options = explode('; ', get_post_meta($post->ID, 'course_departments', true));
    foreach ($select_options as $select_option){
      $option_list .= '<option>'.$select_option.'</option>';
    }
  }
  $output = '<div class="background-color-gray">
              <div class="container">
                <div class="textbooks-search-box">
                  <div class="card">
                    <h2 id="portal">eTextbook Portal</h2>
                    <p>'.$desc.'</p>
                    <form id="textbook_search_form" action="javascript:void(0);">
                      <div class="row">
                        <div class="form-group col-md-12">
                          <label for="book_title">Book Title</label>
                          <input class="form-control" name="book_title" id="book_title" type="text">
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-4">
                          <label for="course_number">Course Number</label>
                          <input class="form-control" name="course_number" id="course_number" type="text">
                        </div>
                        <div class="form-group col-md-4">
                          <label for="course_department">Course Department</label>
                          <select class="form-control" name="course_department" id="course_department">
                            <option></option>
                            '.$option_list.'
                          </select>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="instructor">Course Instructor</label>
                          <input class="form-control" name="instructor" id="instructor" type="text">
                        </div>
                      </div>                    
                      <div class="clearfix"></div>
                      <button type="submit" title="submit query" class="btn btn-primary" id="submit_query">Submit</button> <button type="reset" title="Clear Search" class="btn btn-default" id="clear_query">Clear</button>
                    </form>
                  </div>
                </div>
                <div id="textbook_content">
                  <div class="lds-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
                </div>
              </div>
             </div>';    

  return $output;  

}

//Create new endpoint to provide data.
add_action( 'rest_api_init', 'textbook_rest_ajax_endpoint' );

function textbook_rest_ajax_endpoint(){
  register_rest_route(
    'textbooks',
    'rest-ajax',
    [
      'method'              => 'GET',
      'permission_callback' => '__return_true',
      'callback'            => 'textbook_rest_ajax_callback',
    ]
  );
}

//REST endpoint information. Sets up all parameters.
function textbook_rest_ajax_callback($request){
  $query_params = '';
  if ($request->get_param('instructor')) {
    $query_params .= '&'.$request->get_param('instructor');
  }
  if ($request->get_param('course_number')) {
    $query_params .= '&'.$request->get_param('course_number');
  }
  if ($request->get_param('course_department')) {
    $query_params .= '&'.$request->get_param('course_department');
  }
  if ($request->get_param('course_title')) {
    $query_params .= '&'.$request->get_param('course_title');
  }
  if ($request->get_param('book_title')) {
    $query_params .= '&'.$request->get_param('book_title');
  }
   $textbooks_json = textbook_items_object($query_params);
   $content =  textbook_object_content($textbooks_json);
   return $content;
  //return rest_ensure_response($query_params);
}

function textbook_items_object($query_params) {
	$url = 'https://content-out.bepress.com/v2/stars.library.ucf.edu/query?parent_link=http://stars.library.ucf.edu/etextbooks&select_fields=all&limit=1000&configured_field_t_usage=Active'.$query_params;
	$args = array(
		'timeout' => 120,
		'redirection' => 0, // Turns off auto redirection. This is needed because wp_remote_get will double send the Authorization headers and break the request.
		'headers' => array(
			'Authorization' => 'YqaVM5va0QnZQStiMEUGAinKJjlXwg3bOfzVn4YRseI='
		)
	);

	// add_filter( 'http_request_args', 'limit_redirects', 10, 2 );
	$response = wp_remote_get( $url, $args );
	// remove_filter( 'http_request_args', 'limit_redirects' );

	if ( is_wp_error( $response ) ) {
		return null;
	}
  // This step captures the response to collect the headers
	if ( wp_remote_retrieve_response_code( $response ) !== 302 ) {
		$body = wp_remote_retrieve_body( $response );
		$json = json_decode( $body );
		return $json;
	}
  // This step captures the location from the header
	$response_headers = wp_remote_retrieve_headers( $response );
	if ( ! isset( $response_headers['location'] ) ) {
		return null;
	}
  // This new request arguments does not include the Authorization Header
	$url = $response_headers['location'];
	$args = array(
		'timeout' => 120
	);

	$response = wp_remote_get( $url, $args );

	if ( is_wp_error( $response ) ) {
		return null;
	}

	$response = wp_remote_retrieve_body( $response );
	$response = json_decode( $response, true );
//  $response = json_encode( $response ); for Javascript
  usort($response['results'],function($a,$b) {return strnatcasecmp($a['title'],$b['title']);}); //Sort the array alphabetically by title
  $response = json_encode( $response); // re-encoding to decode with false option so html output doesn't need to change.
  $response = json_decode ( $response, false);
	return $response;
}

// This function takes the json object from textbook_items_object() and processes it into html for display
function textbook_object_content($json_o){
  $content = '';
  if ($json_o == null) {
    $content .= '<p>object returned null</p>';
    
  }
  else {
    // $content .= '<p>object returned not null</p>';
    // echo($json_o);
  }
  function display_array($item_property_array){
    $array_output = '';
    foreach ($item_property_array as $array_item) {
      if ($array_output == ''){
        $array_output = $array_item;
      }
      else {
        $array_output .= ', '.$array_item;
      }
    }
    return $array_output;
  }
  // Iterate through each textbook object to make a new item for the grid.
  foreach ($json_o->results as $item){
    $instructions = '';
    if (isset($item->configured_field_t_instructions)){
      $instructions = ' <a class="btn btn-default" target="_blank" href="'.$item->configured_field_t_instructions[0].'" title="View instructions for accessing '.$item->title.' on ProQuest.">View Instructions</a>';
    }
    if (isset($item->download_link)){
      $download_link = ' <a class="btn btn-primary" target="_blank" href="'.$item->download_link.'" title="Read Full Text URL for '.$item->title.'">Read Full Text</a>';
    }
    $content .= '
      <div class="grid-item">
        <div class="card">
          <figure><img src="'.$item->configured_field_t_book_cover_link[0].'" alt="'.$item->title.' book cover"></figure>
          <div class="textbook-info">
            <span class="textbook-title">'.$item->title.' <span class="textbook-author">by '.display_array($item->author).'</span></span>
            <ul>
              <li><span style="background-color: #ffcc00;"><strong>Course Number</strong>: '.display_array($item->configured_field_t_course_number).'</span></li>
              <li><strong>Course Title</strong>: '.display_array($item->configured_field_t_course_title).'</li>
              <li><strong>Course Instructor</strong>: '.display_array($item->configured_field_t_instructors).'</li>
              <li><strong>License</strong>: '.display_array($item->configured_field_t_license).'</li>
            </ul>
            '.$download_link. '
            '.$instructions.'
          </div><!-- caption -->
        </div><!-- thumbnail -->
      </div><!-- grid-item -->
      ';
  }
  if ($content !== ''){
    $content = '<div class="grid textbooks">'.$content.'</div>';
  } else {
    $content = '<div style="text-align:center;><p ">Your search produced no results. Please try again.</p><p>Already tried? Ask us to check for your eTextbook:</p><p><a class="btn btn-primary" href="https://ucf.qualtrics.com/jfe/form/SV_8dgBttqJvuhLXh4" target="_blank">eTextbook Check/Request Form</a></p></div>';
  }
  return $content;
}


// function textbook_objects_display($content = null) {
//   $json_o = textbook_items_object();
//   return('
//     <script>
//     function display_array(item_property_array){
//       let array_output = "";
//       item_property_array.forEach((array_item) => {
//         if (array_output == ""){
//           array_output = array_item;
//         }
//         else {
//           array_output += ", "+array_item;
//         }
//       });
//       return array_output;
//     }


//       const json_o = JSON.parse('.$json_o.');
//       console.log(json_o);
//       let results = json_o.results;
//       for(key of Object.keys(results)) {
//         console.log(key + " -> " + results[key].title);
//         console.log( display_array(results[key].author) );
//       }
//     </script>
//   ');
// }

?>