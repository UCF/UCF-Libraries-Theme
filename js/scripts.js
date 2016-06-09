/*!
*Custom functions for the Library Wordpress Theme
*/

// Manually Adjust the UCF Header bar
//===================================


function header_override() {
  $('#ucfhb-inner').addClass('override');
}

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


function collapse_sidebar(){
  
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
  
};

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
function tab_linking(){
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

};



// Change hash for page-reload
$('.nav-tabs a').on('shown', function (e) {
    window.location.hash = e.target.hash.replace("#", "#" + prefix);
});


//Login Modal Launch
//==================
function login_modal_launch () {
  $('.login-button').click(function() {
    $('#login_modal').modal('show');
  });
};

//Enable Tooltips
//===============
function enable_tooltips() {
    $('[data-toggle="tooltip"]').tooltip();
};

// Apply bootstrap styles to gravity forms
//========================================
function bootstrap_gravity_forms() {
  $(".gform_wrapper input:text").addClass("form-control");
  $(".gform_wrapper textarea").addClass("form-control");
  $(".gform_wrapper select").addClass("form-control");
  $(".gform_wrapper input:submit").addClass("btn btn-primary");
  $(".gform_wrapper input:radio").each(function(){
    $(this).next('label').andSelf().wrapAll('<div class="radio"/>');
  });
  // $(".gform_wrapper .clear-multi").addClass("form-inline");
};

// Apply btn class to footer My Account Button
//============================================
function my_account_btn() {
  $(".my-account a").addClass("btn btn-primary");
};


// Scroll to Top Button
//=====================

function scroll_top_btn() {

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

};

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

// Share Button
//=========================================

function share_button(url, winWidth, winHeight) {
  var winTop = (screen.height / 2) - (winHeight / 2);
  var winLeft = (screen.width / 2) - (winWidth / 2);
  window.open(url, 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width=' + winWidth + ',height=' + winHeight);
}


// Grid / List View Toggle
//=========================================

function grid_list_toggle() {
  $('.view-button').click(function() {
    var test = $(this).children("input[name$='views']").val();
    $('.view').removeClass('view-active');
    $('#' + test + '_view').addClass('view-active');
  });
};


// Table Sorter intialize
// =========================================

function table_sorter_init() { 
  $(".table-sorter").tablesorter(); 
}; 


// Widget Area Affix
// =========================================

function widget_area_affix() {
  if ( $('#sidebar').outerHeight(true) < $('#content_area').outerHeight(true) ) {
    $('#widget-area').affix({
      offset: {
        top: function () {
          return (this.top = ( $('#ucfhb').outerHeight(true) + $('.main-header').outerHeight(true) + $('#title_bar').outerHeight(true) + 30 ) )
        },
        bottom: function () {
          return (this.bottom = ( $('footer').outerHeight(true) + 60 ) )
        }
      }
    });
  };
};


// Load all functions when Dom Ready
// =========================================

$(document).ready( function() {
  header_override();
  collapse_sidebar();
  tab_linking();
  login_modal_launch();
  enable_tooltips();
  bootstrap_gravity_forms();
  my_account_btn();
  scroll_top_btn();
  grid_list_toggle();
  table_sorter_init();
  widget_area_affix();
});