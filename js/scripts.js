/*!
*Custom functions for the Library Wordpress Theme
*/

// Manually Adjust the UCF Header bar
//===================================


//COLLAPSING SIDEBAR MENU
//=======================

function expandMenus() {
    jQuery('.sidebar-collapse .collapse').addClass('in');
    jQuery('.sidebar-collapse .collapse').attr("aria-expanded","true");
    jQuery('.sidebar-collapse .collapse').css('height','');
    jQuery('.menu-toggle').attr("aria-expanded","true");
    jQuery('.menu-toggle').removeClass('collapsed');
    jQuery('.menu-toggle .glyphicon').removeClass("glyphicon-plus-sign").addClass("glyphicon-minus-sign");
}

function collapseMenus() {
    jQuery('.sidebar-collapse .collapse').removeClass('in');
    jQuery('.sidebar-collapse .collapse').attr("aria-expanded","false");
    jQuery('.menu-toggle').attr("aria-expanded","false");
    jQuery('.menu-toggle').addClass('collapsed');
    jQuery('.menu-toggle .glyphicon').removeClass("glyphicon-minus-sign").addClass("glyphicon-plus-sign");
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
  if (jQuery(window).width() < 768){  
	collapseMenus();
	$menus_open = false;
  } else {
	$menus_open = true;
  }

  //Locate the toggle buttons of the sidebar and assign an ID based on the button text
  jQuery('.custom-sidebar').each(function() {
  	$id = jQuery(this).find('.menu-toggle').text().replaceAll(' ', '_');
  	jQuery(this).find('.collapse').prop('id', $id);
  	jQuery(this).find('.menu-toggle').prop('href', '#'+$id);
  });
  
};

jQuery(window).resize(function(){
  if (jQuery(window).width() >= 768 && !$menus_open){  
    expandMenus();
    $menus_open = true;
  }
  if (jQuery(window).width() < 768 && $menus_open){  
	collapseMenus();
	$menus_open = false;
  }
});

jQuery(document).on("hide.bs.collapse show.bs.collapse", ".collapse", function (event) {
  jQuery(this).prev().find(".glyphicon").toggleClass("glyphicon-plus-sign glyphicon-minus-sign");
});


// Javascript to enable link to tab
// =================================
jQuery.extend({
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
    return jQuery.getUrlVars()[name];
  }
});

// Links to an anchor inside of a tab and scrolls the page to the anchor. Only works on page that does NOT contain the tabs
// Example: <a href="library.ucf.edu/?tab=#Tab-One&anchor=#Anchor-3">Link to Anchor-3 inside Tab-One on a different page.</a>
function tab_linking(){
  var hash = window.location.hash;
  var tab = jQuery.getUrlVar('tab');
  var anchor = jQuery.getUrlVar('anchor');
  var prefix = "tab_";
  var id = hash.replace(prefix,"");
  if(document.location.search.length) {
    if (tab && anchor) {
      jQuery('ul.nav a[href="' + tab + '"]').tab('show');
      jQuery('html, body').animate({
          scrollTop: jQuery(anchor).offset().top
      }, 10);    
    } 
  } else if (hash) {
    jQuery('.nav-tabs a[href='+id+']').tab('show');
    jQuery('html, body').animate({scrollTop:jQuery(id).position().top}, 0);
  } 

// Links to an anchor inside of a tab and scrolls the page to the anchor. Only works on page that CONTAINS the tabs.
// Example: <a href="library.ucf.edu/#Anchor" data-tab="Tab-Name">Link to Anchor inside of Tab-Name on same page</a>
  jQuery('a[data-tab]').on('click', function() { 
    var othertab = jQuery(this).attr('data-tab'),
        target = jQuery(this).attr('href');
      jQuery('ul.nav a[href="' + othertab + '"]').tab('show');
      jQuery('html, body').animate({
          scrollTop: jQuery(target).offset().top
      }, 10);    
  });

};



// Change hash for page-reload
jQuery('.nav-tabs a').on('shown', function (e) {
    window.location.hash = e.target.hash.replace("#", "#" + prefix);
});


//Login Modal Launch
//==================
function login_modal_launch () {
  jQuery('.login-button').click(function() {
    jQuery('#login_modal').modal('show');
  });
};

//Enable Tooltips
//===============
function enable_tooltips() {
    jQuery('[data-toggle="tooltip"]').tooltip();
};

// Apply bootstrap styles to gravity forms
//========================================
function bootstrap_gravity_forms() {
  jQuery(".gform_wrapper input:text").addClass("form-control");
  jQuery(".gform_wrapper textarea").addClass("form-control");
  jQuery(".gform_wrapper select").addClass("form-control");
  jQuery(".gform_wrapper input:submit").addClass("btn btn-primary");
  jQuery(".gform_wrapper input:radio").each(function(){
    jQuery(this).next('label').andSelf().wrapAll('<div class="radio"/>');
  });
  // jQuery(".gform_wrapper .clear-multi").addClass("form-inline");
};

// Apply btn class to footer My Account Button
//============================================
function my_account_btn() {
  jQuery(".my-account a").addClass("btn btn-primary");
};


// Scroll to Top Button
//=====================

function scroll_top_btn() {

    jQuery(window).scroll(function () {
        if (jQuery(this).scrollTop() > 500) {
            jQuery('.scroll-top').fadeIn();
        } else {
            jQuery('.scroll-top').fadeOut();
        }
    });

    jQuery('.scroll-top').click(function () {
        jQuery("html, body").animate({
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
  jQuery('.view-button').click(function() {
    var test = jQuery(this).children("input[name$='views']").val();
    jQuery('.view').removeClass('view-active');
    jQuery('#' + test + '_view').addClass('view-active');
  });
};


// Table Sorter intialize
// =========================================

function table_sorter_init() { 
  jQuery(".table-sorter").tablesorter(); 
}; 


// Widget Area Affix
// =========================================

function widget_area_affix() {
  if ( jQuery('#sidebar').length > 0 ) {
    if ( jQuery('#sidebar').outerHeight(true) < jQuery('#content_area').outerHeight(true) ) {
      jQuery('#widget-area').affix({
        offset: {
          top: function () {
            return (this.top = ( jQuery('#ucfhb').outerHeight(true) + jQuery('.main-header').outerHeight(true) + jQuery('#title_bar').outerHeight(true) + 30 ) )
          },
          bottom: function () {
            return (this.bottom = ( jQuery('footer').outerHeight(true) + 60 ) )
          }
        }
      });
    };
  }
};

// Cookies
// =========================================

function setCookie(key, value, expiry) {
  var expires = new Date();
  expires.setTime(expires.getTime() + (expiry * 24 * 60 * 60 * 1000));
  document.cookie = key + '=' + value + ';expires=' + expires.toUTCString();
}

function getCookie(key) {
  var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
  return keyValue ? keyValue[2] : null;
}

function eraseCookie(key) {
  var keyValue = getCookie(key);
  setCookie(key, keyValue, '-1');
}

// Homepage Banner Close Button
// =========================================

function homepage_banner_close() {
  
    if (jQuery('#banner_message')){
      $banner_id = jQuery('#banner_message').attr('data-id');
      
      if (getCookie('banner_close') !== $banner_id) {
        jQuery('#banner_message').addClass('show');
      } 
      jQuery('#banner_close_btn').click(function() {
        document.cookie = 'banner_close='+$banner_id+'; secure';
        jQuery('#banner_message').removeClass('show');
      });

    }

 
}


// Computer Availability (function is currently unused.)
// =========================================

function computer_availability(id) {
  var feed_url = "http://libweb.net.ucf.edu/Web/Db.php?q=publicStatusPCs&format=json&l=" + id;
  jQuery.getJSON( feed_url, function( data ) {
    var availability_content = '#computer_availability' + id;
    var computer_total = '#computer_total' + id;
    jQuery(availability_content).empty();
    var all_floor_total = 0;
    var floors = 1;
    if (id == 1) {
      floors = 5;
    }
    for (var i = 1; i <= floors; i++) {
      var machines_in_use = 0;
      var machines_total = 0;
      var machines_available = 0;
      jQuery.each(data, function(key, value){
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

      jQuery(availability_content).append(' \
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
    jQuery(computer_total).text(all_floor_total);
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
      jQuery('#countdown_finished').modal('show');
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
    let $lis = jQuery('.taxonomy-item');	 
    let $checked =jQuery('input:checkbox:checked');
    if ($checked.length)
    {						
      categories.forEach(function(cat) { 
        cat.filter = '';
        jQuery($checked).each(function(index, element){   
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
  let $filter = jQuery.getUrlVar('filter');
  if(document.location.search.length) {
    if ($filter) {
      let filter_array = $filter.split('+');
      filter_array.forEach(element => jQuery('#'+element).prop('checked', 'checked'));
      taxonomy_filter(categories);
    }
  }
}

// Load all functions when Dom Ready
// =========================================

jQuery(document).ready( function() {
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