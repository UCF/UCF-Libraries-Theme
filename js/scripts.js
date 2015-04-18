/*!
*Custom functions for the Library Wordpress Theme
*/


//COLLAPSING SIDEBAR MENU
//=======================

function expandMenus() {
    $('.sidebar-collapse .collapse').addClass('in');
    $('.sidebar-collapse .collapse').attr("aria-expanded","true");
    $('.sidebar-collapse .collapse').css('height','');
    $('.menu-toggle').attr("aria-expanded","true");
    $('.menu-toggle').removeClass('collapsed');
    $('.menu-toggle .glyphicon').removeClass("glyphicon-plus-sign").addClass("glyphicon-minus-sign");
}

function collapseMenus() {
    $('.sidebar-collapse .collapse').removeClass('in');
    $('.sidebar-collapse .collapse').attr("aria-expanded","false");
    $('.menu-toggle').attr("aria-expanded","false");
    $('.menu-toggle').addClass('collapsed');
    $('.menu-toggle .glyphicon').removeClass("glyphicon-minus-sign").addClass("glyphicon-plus-sign");
}

//Generate a random string for use in ID override
function get_random_string() {
    $text = "";
    $possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    for( var i=0; i < 10; i++ )
        $text += $possible.charAt(Math.floor(Math.random() * $possible.length));
    return $text;
}


$(document).ready(function(){
  
  //Collapse the sidebar menus when less than 768
  if ($(window).width() < 768){  
	collapseMenus();
	$menus_open = false;
  } else {
	$menus_open = true;
  }

  //Locate the ID of the sidebar collapse menus and give them a unique id
  $('.sidebar-collapse').each(function() {
  	$id = get_random_string();
  	$(this).find('.collapse').prop('id', $id);
  	$(this).find('.menu-toggle').prop('href', '#'+$id);
  });
  
});

$(window).resize(function(){
  if ($(window).width() >= 768 && !$menus_open){  
    expandMenus();
    $menus_open = true;
  }
  if ($(window).width() < 768 && $menus_open){  
	collapseMenus();
	$menus_open = false;
  }
});

$(document).on("hide.bs.collapse show.bs.collapse", ".collapse", function (event) {
  $(this).prev().find(".glyphicon").toggleClass("glyphicon-plus-sign glyphicon-minus-sign");
  alert('minus and plus sign should be toggling.');
});

