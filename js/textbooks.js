let instructor = 'instructor=configured_field_t_instructors=Matthew%20Johnson';
let course_number = 'course_number=configured_field_t_course_number=ARC%204620';
let query_parameters = '?' + instructor + '&' + course_number;
const spinner = '<div class="lds-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>';

function display_textbooks(query_parameters) {
  if (!query_parameters){
    query_parameters = '';
  }
  $.ajax({
    url: '/library_test/wp-json/textbooks/rest-ajax'+query_parameters
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
      search_query += '?instructor=configured_field_t_instructors='+ instructor;
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