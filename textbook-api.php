<?php

// Create Shortcode for displaying texbook objects from rest API
add_shortcode('textbook-objects-display', 'textbook_objects_display');

function textbook_objects_display() {
  wp_enqueue_script( 'textbook-rest-ajax-script', get_template_directory_uri().'/js/textbooks.js', 'jquery');
  
  $output = '<div class="background-color-gray">
              <div class="container">
                <div class="textbooks-search-box">
                  <div class="card">
                    <form>
                      <label for="course_number">Course Number</label>
                      <input name="course_number" id="course_number" type="text">
                      <label for="book_title">Book Title</label>
                      <input name="book_title" id="book_title" type="text">
                      <label for="instructor">Instructor</label>
                      <input name="instructor" id="instructor" type="text">
                    </form>
                    <button title="submit query" class="btn btn-primary" id="submit_query">Submit</button> <button title="Clear Search" class="btn btn-default" id="clear_query">Clear</button>
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

//REST endpoint information.
function textbook_rest_ajax_callback($request){
  $query_params = '';
  if ($request->get_param('instructor')) {
    $query_params .= '&'.$request->get_param('instructor');
  }
  if ($request->get_param('course_number')) {
    $query_params .= '&'.$request->get_param('course_number');
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
	$url = 'https://content-out.bepress.com/v2/stars.library.ucf.edu/query?parent_link=http://stars.library.ucf.edu/etextbooks&select_fields=all'.$query_params;
	$args = array(
		'timeout' => 120,
		'redirection' => 0,
		'headers' => array(
			'Authorization' => 'YqaVM5va0QnZQStiMEUGAinKJjlXwg3bOfzVn4YRseI='
		)
	);

	// add_filter( 'http_request_args', 'limit_redirects', 10, 2 );
	$response = wp_remote_get( $url, $args );
	// remove_filter( 'http_request_args', 'limit_redirects' );

	if ( is_wp_error( $request ) ) {
		return null;
	}

	if ( wp_remote_retrieve_response_code( $response ) !== 302 ) {
		$body = wp_remote_retrieve_body( $response );
		$json = json_decode( $body );
		return $json;
	}

	$response_headers = wp_remote_retrieve_headers( $response );
	if ( ! isset( $response_headers['location'] ) ) {
		return null;
	}

	$url = $response_headers['location'];
	$args = array(
		'timeout' => 120
	);

	$response = wp_remote_get( $url, $args );

	if ( is_wp_error( $response ) ) {
		return null;
	}

	$response = wp_remote_retrieve_body( $response );
	$response = json_decode( $response );
//  $response = json_encode( $response ); for Javascript
	return $response;
}

function textbook_object_content($json_o){
  $content = '<div class="grid textbooks">';
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
  foreach ($json_o->results as $item){
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
            </ul>
            <a class="btn btn-primary" href="'.$item->download_link.'" title="Read Full Text URL for '.$item->title.'">Read Full Text</a>
          </div><!-- caption -->
        </div><!-- thumbnail -->
      </div><!-- grid-item -->
      ';
  }
  $content .= '</div>';
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