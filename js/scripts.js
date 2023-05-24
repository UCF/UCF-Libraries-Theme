/*!
*Custom functions for the Library Wordpress Theme
*/

// Manually Adjust the UCF Header bar
//===================================


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

//(Depricated) Generate a random string for use in ID override
// function get_random_string() {
//     $text = "";
//     $possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
//     for( var i=0; i < 10; i++ )
//         $text += $possible.charAt(Math.floor(Math.random() * $possible.length));
//     return $text;
// }


function collapse_sidebar(){
  
  //Collapse the sidebar menus when less than 768
  if ($(window).width() < 768){  
	collapseMenus();
	$menus_open = false;
  } else {
	$menus_open = true;
  }

  //Locate the toggle buttons of the sidebar and assign an ID based on the button text
  $('.custom-sidebar').each(function() {
  	$id = $(this).find('.menu-toggle').text().replaceAll(' ', '_');
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


// Subject Librarian newsletter feed
//=======================================
// This function will be removed in a future patch once the subject librarian feeds have bee replaced witht he generic STARS feed below

function librarian_newsletter_feed(librarian) {
  google.load("feeds", "1");

  function initialize() {
    var feed = new google.feeds.Feed("http://stars.library.ucf.edu/subjectlibnews-"+ librarian +"/all.rss");
    feed.setNumEntries(10);
    feed.load(function(result) {
      if (!result.error) {
        var container = document.getElementById(""+ librarian +"_newsletter_feed");
        var ul = document.createElement("ul");
        for (var i = 0; i < result.feed.entries.length; i++) {
          var entry = result.feed.entries[i];
          var li = document.createElement("li");
          var link = document.createElement("a");
          link.setAttribute('href', entry.link);
          link.appendChild(document.createTextNode(entry.title));
          li.appendChild(link);
          ul.appendChild(li);
        }
        container.appendChild(ul);
      } else {
        var container = document.getElementById("feed");
        var h4 = document.createElement("h4");
        h4.appendChild(document.createTextNode('Newsletter feed unavailable at this time.'));
        container.appendChild(h4);          
    }
    });
  }
  google.setOnLoadCallback(initialize);
}


// STARS Publication feed list
//=======================================

function stars_feed_list(feed_url, container_ID, number) {
  google.load("feeds", "1");
  function initialize() {
    var feed = new google.feeds.Feed(feed_url);
    feed.setNumEntries(number);
    feed.load(function(result) {
      if (!result.error) {
        var container = document.getElementById(container_ID);
        var ul = document.createElement("ul");
        for (var i = 0; i < result.feed.entries.length; i++) {
          var entry = result.feed.entries[i];
          var li = document.createElement("li");
          var link = document.createElement("a");
          link.setAttribute('href', entry.link);
          link.appendChild(document.createTextNode(entry.title));
          li.appendChild(link);
          ul.appendChild(li);
        }
        container.appendChild(ul);
      } else {
        var container = document.getElementById(container_ID);
        var h4 = document.createElement("h4");
        h4.appendChild(document.createTextNode('STARS feed unavailable at this time.'));
        container.appendChild(h4);          
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

// Homepage Banner Close Button
// =========================================

function homepage_banner_close() {
  $('#banner_close_btn').click(function() {
    $('#banner_message').addClass('hide');
  });
}


// Computer Availability (function is currently unused.)
// =========================================

function computer_availability(id) {
  var feed_url = "http://libweb.net.ucf.edu/Web/Db.php?q=publicStatusPCs&format=json&l=" + id;
  $.getJSON( feed_url, function( data ) {
    var availability_content = '#computer_availability' + id;
    var computer_total = '#computer_total' + id;
    $(availability_content).empty();
    var all_floor_total = 0;
    var floors = 1;
    if (id == 1) {
      floors = 5;
    }
    for (var i = 1; i <= floors; i++) {
      var machines_in_use = 0;
      var machines_total = 0;
      var machines_available = 0;
      $.each(data, function(key, value){
        if (this.location_room_floor == i) {
          machines_in_use += parseInt(this.machinesInUse);
          machines_total += parseInt(this.machinesTotal);
        }
      });
      machines_available = (machines_total - machines_in_use);
      if (machines_total != 0) {
        var percent_available = Math.round((machines_available / machines_total) * 100);
      } else {
        var percent_available = 0;
      }
      switch (i) {
        case 1:
          var floor_number = '1st'
          break;
        case 2:
          var floor_number = '2nd';
          break;
        case 3:
          var floor_number = '3rd';
          break;
        case 4:
          var floor_number = '4th';
          break;
        case 5:
          var floor_number = '5th';
          break;

        default:
          var floor_number = 'unknown';
          break;
      }
      if (machines_available > 0) {
        if (percent_available > 33) {
          var progress_color = 'progress-bar-success';
        } else {
          var progress_color = 'progress-bar-warning';
        }
      } else {
        var progress_color = 'progress-bar-warning';
      }

      $(availability_content).append(' \
        <div class="row"> \
          <div class="col-sm-3"> \
            <span class="floor-name">'+ floor_number +' Floor <i class="fa fa-desktop"></i>:</span> \
          </div> \
          <div class="col-sm-9"> \
            <div class="progress"> \
              <div class="progress-bar '+ progress_color +'" role="progressbar" aria-valuenow="'+ percent_available +'" aria-valuemin="0" aria-valuemax="100" style="min-width: 4em; width: '+ percent_available +'%;"> \
                '+ machines_available +' / '+ machines_total +' \
              </div> \
            </div> \
          </div> \
        </div>');
      all_floor_total += machines_available;
    }
    $(computer_total).text(all_floor_total);
    setTimeout(computer_availability, 10000, id);
  });
}


// Countdown Timer
//========================================

var timer_interval = 0;

function countdown($display, collision) {
  var offset = get_time_zone_offset();
  var now = new Date();
  now.setHours(now.getHours() + (offset-5));
  var total_seconds = Math.floor((collision.getTime() - now.getTime()) * 0.001);
  if (total_seconds > 0) {
    var seconds = (Math.floor(total_seconds) % 60); //60 seconds in a minute
    var minutes = (Math.floor(total_seconds/60) % 60); //60 minutes in an hour
    var hours = (Math.floor(total_seconds/3600) % 24); //24 hours in a day
    var days = Math.floor((total_seconds/3600/24) % 365); //365 days in a year
    var years = Math.floor((total_seconds/3600/24)/ 365);
    $display.html('');
    if (years > 0) {
      $display.append('<span class="years">' + years + '</span> Years ');
    }
    if (days > 0 || years > 0) {
      $display.append('<span class="days">' + days + '</span> Days ');
    }
//    if (hours > 0 || days > 0 || years > 0) {
      $display.append('<span class="hours">' + hours + '</span> Hours ');
//    }
//    if (minutes > 0 || hours > 0 || days > 0 || years > 0) {
      $display.append('<span class="minutes">' + minutes + '</span> Minutes ');
//    }
//    if (seconds > 0 || minutes > 0 || hours > 0 || days > 0 || years > 0) {
      $display.append('<span class="seconds">' + seconds + '</span> Seconds');
//    }
  } else {
    $display
      .html
        (
          '<span style="color: #a00;"><span class="hours">0</span> Hours <span class="minutes">0</span> Minutes <span class="seconds">0</span> Seconds</span>'            
        );
    if (document.cookie.replace(/(?:(?:^|.*;\s*)modal_used\s*\=\s*([^;]*).*$)|^.*$/, "$1") !== "true") {
      $('#countdown_finished').modal('show');
      document.cookie = "modal_used=true; expires=Fri, 31 Dec 9999 23:59:59 GMT";
    }
    
    clearInterval(timer_interval);
  }
}

function get_time_zone_offset() {
  var current_date = new Date( );
  var gmt_offset = current_date.getTimezoneOffset( ) / 60;
  return gmt_offset;
}

// This function powers the filter checkboxes in the Tech Lending and Anatomy Lending custom post types
/* Example categories object to place on tech or anatomy lending template pages
  categories = [
    { 
      "name" : "library",
      "filter" : "" }
    },
    {
      ...
    },
    ...
  ]
*/
function taxonomy_filter(categories) {
  if (categories) {
    let $lis = $('.taxonomy-item');	 
    let $checked =$('input:checkbox:checked');
    if ($checked.length)
    {						
      categories.forEach(function(cat) { 
        cat.filter = '';
        $($checked).each(function(index, element){   
          if (element.dataset.category == cat.name) {                         
            if (cat.filter == '') {
              cat.filter += '[data-'+cat.name+'~="' + element.value + '"]'; 
            } else {
              cat.filter += ', [data-'+cat.name+'~="' + element.value + '"]';
            }
          }
        }); 
      });                 
      $lis.hide();     
      categories.forEach(function(cat) {        
        if (cat.filter != '') {
          $lis = $lis.filter(cat.filter);
        }
      });
      $lis.show();     
    }
    else
    {
      $lis.show();
    }
  } 
}


//This function checks a checkbox that has the same id as the hash
function pre_check_box() {
  let $filter = $.getUrlVar('filter');
  if(document.location.search.length) {
    if ($filter) {
      let filter_array = $filter.split('+');
      filter_array.forEach(element => $('#'+element).attr('checked', 'checked'));
      taxonomy_filter(categories);
    }
  }
}

// Load all functions when Dom Ready
// =========================================

$(document).ready( function() {
  collapse_sidebar();
  tab_linking();
  login_modal_launch();
  homepage_banner_close();
  enable_tooltips();
  bootstrap_gravity_forms();
  my_account_btn();
  scroll_top_btn();
  grid_list_toggle();
  table_sorter_init();
  widget_area_affix();
});