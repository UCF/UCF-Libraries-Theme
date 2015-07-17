/*!
*Custom functions for the Library Wordpress Theme
*/

// Manually Adjust the UCF Header bar
//===================================


$(document).ready(function() {
  $('#ucfhb-inner').addClass('override');
});

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
});


// Javascript to enable link to tab
// =================================
$.extend({
  getUrlVars: function(){
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
      hash = hashes[i].split('=');
      vars.push(hash[0]);
      vars[hash[0]] = hash[1];
    }
    return vars;
  },
  getUrlVar: function(name){
    return $.getUrlVars()[name];
  }
});

// Links to an anchor inside of a tab and scrolls the page to the anchor. Only works on page that does NOT contain the tabs
// Example: <a href="library.ucf.edu/?tab=#Tab-One&anchor=#Anchor-3">Link to Anchor-3 inside Tab-One on a different page.</a>
$(document).ready(function(){
  var hash = window.location.hash;
  var tab = $.getUrlVar('tab');
  var anchor = $.getUrlVar('anchor');
  var prefix = "tab_";
  var id = hash.replace(prefix,"");
  if(document.location.search.length) {
    if (tab && anchor) {
      $('ul.nav a[href="' + tab + '"]').tab('show');
      $('html, body').animate({
          scrollTop: $(anchor).offset().top
      }, 10);    
    } 
  } else if (hash) {
    $('.nav-tabs a[href='+id+']').tab('show');
    $('html, body').animate({scrollTop:$(id).position().top}, 0);
  } 

// Links to an anchor inside of a tab and scrolls the page to the anchor. Only works on page that CONTAINS the tabs.
// Example: <a href="library.ucf.edu/#Anchor" data-tab="Tab-Name">Link to Anchor inside of Tab-Name on same page</a>
  $('a[data-tab]').on('click', function() { 
    var othertab = $(this).attr('data-tab'),
        target = $(this).attr('href');
      $('ul.nav a[href="' + othertab + '"]').tab('show');
      $('html, body').animate({
          scrollTop: $(target).offset().top
      }, 10);    
  });

});



// Change hash for page-reload
$('.nav-tabs a').on('shown', function (e) {
    window.location.hash = e.target.hash.replace("#", "#" + prefix);
});


//Login Modal Launch
//==================
$(document).ready(function () {
  $('.login-button').click(function() {
    $('#login_modal').modal('show');
  });
});

//Enable Tooltips
//===============
$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
});

// Apply bootstrap styles to gravity forms
//========================================
$(document).ready(function () {
  $(".gform_wrapper input:text").addClass("form-control");
  $(".gform_wrapper textarea").addClass("form-control");
  $(".gform_wrapper select").addClass("form-control");
  $(".gform_wrapper input:submit").addClass("btn btn-primary");
  $(".gform_wrapper input:radio").each(function(){
    $(this).next('label').andSelf().wrapAll('<div class="radio"/>');
  });
  // $(".gform_wrapper .clear-multi").addClass("form-inline");
});

// Apply btn class to footer My Account Button
//============================================
$(document).ready(function() {
  $(".my-account a").addClass("btn btn-primary");
});


// Scroll to Top Button
//=====================

$(document).ready(function () {

    $(window).scroll(function () {
        if ($(this).scrollTop() > 500) {
            $('.scroll-top').fadeIn();
        } else {
            $('.scroll-top').fadeOut();
        }
    });

    $('.scroll-top').click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });

});

// Scholarly Communication Discovery Feed
//=======================================
function discovery_feed() {
  google.load("feeds", "1");

  function initialize() {
    var feed = new google.feeds.Feed("https://rss.webofknowledge.com/rss?e=95be9f48d4ee02bc&c=ef02692db23aab900c8d0a068112113a");
    feed.setNumEntries(10);
    feed.load(function(result) {
      if (!result.error) {
        var container = document.getElementById("feed");
//              var ul = document.createElement("ul");
        for (var i = 0; i < result.feed.entries.length; i++) {
          var entry = result.feed.entries[i];
          var h3 = document.createElement("h3");
          var link = document.createElement("a");
          link.setAttribute('href', entry.link);
          link.appendChild(document.createTextNode(entry.title));
          h3.appendChild(link);
          container.appendChild(h3);
          var div = document.createElement("div");
          div.innerHTML = entry.content;
          container.appendChild(div);
        }
      } else {
       var container = document.getElementById("feed");
        var h3 = document.createElement("h3");
    h3.appendChild(document.createTextNode('there was an error'));
       container.appendChild(h3);          
    }
    });
  }
  google.setOnLoadCallback(initialize);
}

// Link to anchor within a tab
//============================


// Ajax test
//=============
// (function($) {
//     var url = 'http://api3.libcal.com/api_hours_today.php?iid=246&lid=0&format=json';
//     $.ajax({
//        type: 'GET',
//         url: url,
//         async: false,
//         contentType: "application/json",
//         dataType: 'jsonp'
//     });
// })(jQuery);

// $.each( locations, function(key, val) {
//     $('#json_test').html('<p> Key: ' + key + '</p><p> Val:' + val + '</p>');
// });
