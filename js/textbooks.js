let instructor = 'instructor=configured_field_t_instructors=Matthew%20Johnson';
let course_number = 'course_number=configured_field_t_course_number=ARC%204620';
let query_parameters = '?' + instructor + '&' + course_number;
const spinner = '<div class="lds-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>';

function display_textbooks(query_parameters) {
  // This part is just for making the code work on the WAMP server
  let current_url = window.location.href;
  let localhost_domain = '';
  if (current_url.includes('localhost')){
    if (current_url.includes('library-test')){
      localhost_domain = '/library-test';
    }
    if (current_url.includes('library_test')){
      localhost_domain = '/library_test';
    }
  }
  // Normal code starts here
  if (!query_parameters){
    query_parameters = '';
  }
  $.ajax({
    url: localhost_domain+'/wp-json/textbooks/rest-ajax'+query_parameters
  }).done(function(data){
    //console.log(data)
    $('#textbook_content').html(data);
  });
}

function submit_textbook_query(){
  $('#submit_query').click(function(){
    $('#textbook_content').html(spinner);
    let search_query = '';
    if ($('#instructor').val()){
      let instructor = $('#instructor').val();
      console.log(instructor);
      instructor = instructor.replace(/\s/g, '%20');
      search_query += 'instructor=configured_field_t_instructors='+ instructor;
    }
    if ($('#course_number').val()){
      let course_number = $('#course_number').val();
      console.log(course_number);
      course_number = course_number.replace(/\s/g, '%20');
      search_query += 'course_number=configured_field_t_course_number='+ course_number;
    }
    if (search_query.length > 0){
      search_query = '?'+search_query
    }
    display_textbooks(search_query);
  });
}
function clear_textbook_query(){
  $('#clear_query').click(function(){
    $('input:text').val('');
    $('#textbook_content').html(spinner);
    display_textbooks();
  });
}

$(document).ready(function(){
  display_textbooks();
  submit_textbook_query();
  clear_textbook_query();
});