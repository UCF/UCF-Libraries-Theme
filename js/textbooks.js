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
  }).fail(function(data){
    console.log(data);
    $('#textbook_content').html('<p>The requested textbooks could not be loaded.</p>');
  });
}

function submit_textbook_query(){
  $('#submit_query').click(function(){
    $('#textbook_content').html(spinner);
    let search_query = '';
    let amp = '';
    if ($('#instructor').val()){
      let instructor = $('#instructor').val();
      // console.log(instructor);
      instructor = instructor.replace(/\s/g, '%20');
      search_query += amp+'instructor=configured_field_t_instructors='+ instructor;
      amp = '&';
    }
    if ($('#course_number').val()){
      let course_number = $('#course_number').val();
      if (course_number[3] !== ' ' && isNaN(course_number.slice(0, 3)) ){   //Check if there is a space between the letters and numbers
        course_number = course_number.slice(0, 3) + ' ' + course_number.slice(3);
      }
      // console.log(course_number);
      course_number = course_number.replace(/\s/g, '%20');
      search_query += amp+'course_number=configured_field_t_course_number='+ course_number;
      amp = '&';
    }
    if ($('#book_title').val()){
      let book_title = $('#book_title').val();
      // console.log(book_title);
      book_title = book_title.replace(/\s/g, '%20');
      search_query += amp+'book_title=title='+ book_title;
      amp = '&';
    }
    if (search_query.length > 0){
      search_query = '?'+ search_query;
      //  console.log(search_query);
    }
    // console.log(search_query);
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