let instructor = 'instructor=configured_field_t_instructors=Matthew%20Johnson';
let course_number = 'course_number=configured_field_t_course_number=ARC%204620';
let query_parameters = '?' + instructor + '&' + course_number;


function display_textbooks(query_parameters) {
  if (!query_parameters){
    query_parameters = '';
  }
  $.ajax({
    url: '/library-test/wp-json/textbooks/rest-ajax'+query_parameters
  }).done(function(data){
    console.log(data)
    $('#textbook_content').html(data);
  });
}

$(document).ready(function(){
  display_textbooks('?'+course_number);
});