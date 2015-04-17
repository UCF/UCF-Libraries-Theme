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

$(document).ready(function(){
  if ($(window).width() <= 768){  
	collapseMenus();
	$menus_open = false;
  } else {
	$menus_open = true;
  }
});

$(window).resize(function(){
  if ($(window).width() >= 768 && !$menus_open){  
    expandMenus();
    $menus_open = true;
  }
  if ($(window).width() <= 768 && $menus_open){  
	collapseMenus();
	$menus_open = false;
  }
});

$('.collapse').on('show.bs.collapse', function(){
$(this).parent().find(".glyphicon-plus-sign").removeClass("glyphicon-plus-sign").addClass("glyphicon-minus-sign");
}).on('hide.bs.collapse', function(){
$(this).parent().find(".glyphicon-minus-sign").removeClass("glyphicon-minus-sign").addClass("glyphicon-plus-sign");
});
