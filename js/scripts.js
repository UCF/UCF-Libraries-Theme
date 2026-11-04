/*!
*Custom functions for the Library Wordpress Theme
*/


// COLLAPSING SIDEBAR MENU
// =======================

let menusOpen = true;

function expandMenus() {
    document.querySelectorAll('.sidebar-collapse .collapse').forEach(menu => {
        bootstrap.Collapse.getOrCreateInstance(menu, {
            toggle: false
        }).show();
    });

    document.querySelectorAll('.menu-toggle').forEach(toggle => {
        toggle.setAttribute('aria-expanded', 'true');
        toggle.classList.remove('collapsed');
    });
}

function collapseMenus() {
    document.querySelectorAll('.sidebar-collapse .collapse').forEach(menu => {
        bootstrap.Collapse.getOrCreateInstance(menu, {
            toggle: false
        }).hide();
    });

    document.querySelectorAll('.menu-toggle').forEach(toggle => {
        toggle.setAttribute('aria-expanded', 'false');
        toggle.classList.add('collapsed');
    });
}

function collapse_sidebar() {

    if (window.innerWidth < 768 && menusOpen) {
        collapseMenus();
        menusOpen = false;
    }

    if (window.innerWidth >= 768 && !menusOpen) {
        expandMenus();
        menusOpen = true;
    }

    document.querySelectorAll('.custom-sidebar').forEach(sidebar => {

        const toggle = sidebar.querySelector('.menu-toggle');
        const collapse = sidebar.querySelector('.collapse');

        if (!toggle || !collapse) {
            return;
        }

        const id = toggle.textContent.trim().replace(/\s+/g, '_');

        collapse.id = id;

        toggle.setAttribute('href', '#' + id);
        toggle.setAttribute('data-bs-toggle', 'collapse');
        toggle.setAttribute('data-bs-target', '#' + id);
        toggle.setAttribute('aria-controls', id);
    });
}

// Bootstrap 5 collapse events
document.addEventListener('shown.bs.collapse', event => {

    const icon = event.target
        .previousElementSibling
        ?.querySelector('.collapse-icon');

    if (icon) {
        icon.classList.remove('fa-plus-circle');
        icon.classList.add('fa-minus-circle');
    }
});

document.addEventListener('hidden.bs.collapse', event => {

    const icon = event.target
        .previousElementSibling
        ?.querySelector('.collapse-icon');

    if (icon) {
        icon.classList.remove('fa-minus-circle');
        icon.classList.add('fa-plus-circle');
    }
});

window.addEventListener('resize', collapse_sidebar);

document.addEventListener('DOMContentLoaded', collapse_sidebar);



// Bootstrap Tab Deep Linking
// ==========================

function tab_linking() {

    function showTabForElement(element) {

        const tabPane = element.closest('.tab-pane');

        if (!tabPane) {
            return;
        }

        const tabId = tabPane.id;

        const trigger = document.querySelector(
            `[data-bs-target="#${tabId}"]`
        );

        if (trigger) {
            bootstrap.Tab
                .getOrCreateInstance(trigger)
                .show();
        }
    }

    function activateHashTarget() {

        const hash = window.location.hash;

        if (!hash) {
            return;
        }

        const target = document.querySelector(hash);

        if (!target) {
            return;
        }

        showTabForElement(target);

        setTimeout(() => {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }, 150);
    }

    // Handle page load
    activateHashTarget();

    // Handle clicking links on the same page
    document.addEventListener('click', event => {

        const link = event.target.closest('a[href^="#"]');

        if (!link) {
            return;
        }

        const hash = link.getAttribute('href');

        if (!hash || hash === '#') {
            return;
        }

        const target = document.querySelector(hash);

        if (!target) {
            return;
        }

        showTabForElement(target);

        setTimeout(() => {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }, 150);

    });

    // Handle browser back/forward navigation
    window.addEventListener('hashchange', activateHashTarget);
}


// Change hash for page-reload
jQuery('.nav-tabs a').on('shown', function (e) {
    window.location.hash = e.target.hash.replace("#", "#" + prefix);
});


//Login Modal Launch
//==================
function login_modal_launch() {

    const modalElement =
        document.getElementById('login_modal');

    if (modalElement) {

        bootstrap.Modal
            .getOrCreateInstance(modalElement)
            .show();

    }
}

//Enable Tooltips
//===============
function enable_tooltips() {
    document.querySelectorAll('[data-bs-toggle="tooltip"]')
        .forEach(el => {
            new bootstrap.Tooltip(el);
        });
}

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

    const scrollTopButton = document.querySelector('.scroll-top');

    if (!scrollTopButton) {
        return;
    }

    window.addEventListener('scroll', () => {
        scrollTopButton.classList.toggle(
            'visible',
            window.scrollY > 500
        );
    });

    scrollTopButton.addEventListener('click', event => {

        event.preventDefault();

        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
}

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

// function stars_feed_list(feed_url, container_ID, number) {
//   google.load("feeds", "1");
//   function initialize() {
//     var feed = new google.feeds.Feed(feed_url);
//     feed.setNumEntries(number);
//     feed.load(function(result) {
//       if (!result.error) {
//         var container = document.getElementById(container_ID);
//         var ul = document.createElement("ul");
//         for (var i = 0; i < result.feed.entries.length; i++) {
//           var entry = result.feed.entries[i];
//           var li = document.createElement("li");
//           var link = document.createElement("a");
//           link.setAttribute('href', entry.link);
//           link.appendChild(document.createTextNode(entry.title));
//           li.appendChild(link);
//           ul.appendChild(li);
//         }
//         container.appendChild(ul);
//       } else {
//         var container = document.getElementById(container_ID);
//         var h4 = document.createElement("h4");
//         h4.appendChild(document.createTextNode('STARS feed unavailable at this time.'));
//         container.appendChild(h4);          
//     }
//     });
//   }
//   google.setOnLoadCallback(initialize);
// }

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

    document.querySelectorAll('.view-button').forEach(button => {

        button.addEventListener('click', () => {

            const input = button.querySelector(
                'input[name$="views"]'
            );

            if (!input) {
                return;
            }

            const view = input.value;

            document
                .querySelectorAll('.view')
                .forEach(el =>
                    el.classList.remove('view-active')
                );

            const target = document.getElementById(
                view + '_view'
            );

            if (target) {
                target.classList.add('view-active');
            }

        });

    });

}


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

// function computer_availability(id) {
//   var feed_url = "http://libweb.net.ucf.edu/Web/Db.php?q=publicStatusPCs&format=json&l=" + id;
//   jQuery.getJSON( feed_url, function( data ) {
//     var availability_content = '#computer_availability' + id;
//     var computer_total = '#computer_total' + id;
//     jQuery(availability_content).empty();
//     var all_floor_total = 0;
//     var floors = 1;
//     if (id == 1) {
//       floors = 5;
//     }
//     for (var i = 1; i <= floors; i++) {
//       var machines_in_use = 0;
//       var machines_total = 0;
//       var machines_available = 0;
//       jQuery.each(data, function(key, value){
//         if (this.location_room_floor == i) {
//           machines_in_use += parseInt(this.machinesInUse);
//           machines_total += parseInt(this.machinesTotal);
//         }
//       });
//       machines_available = (machines_total - machines_in_use);
//       if (machines_total != 0) {
//         var percent_available = Math.round((machines_available / machines_total) * 100);
//       } else {
//         var percent_available = 0;
//       }
//       switch (i) {
//         case 1:
//           var floor_number = '1st'
//           break;
//         case 2:
//           var floor_number = '2nd';
//           break;
//         case 3:
//           var floor_number = '3rd';
//           break;
//         case 4:
//           var floor_number = '4th';
//           break;
//         case 5:
//           var floor_number = '5th';
//           break;

//         default:
//           var floor_number = 'unknown';
//           break;
//       }
//       if (machines_available > 0) {
//         if (percent_available > 33) {
//           var progress_color = 'progress-bar-success';
//         } else {
//           var progress_color = 'progress-bar-warning';
//         }
//       } else {
//         var progress_color = 'progress-bar-warning';
//       }

//       jQuery(availability_content).append(' \
//         <div class="row"> \
//           <div class="col-sm-3"> \
//             <span class="floor-name">'+ floor_number +' Floor <i class="fa fa-desktop"></i>:</span> \
//           </div> \
//           <div class="col-sm-9"> \
//             <div class="progress"> \
//               <div class="progress-bar '+ progress_color +'" role="progressbar" aria-valuenow="'+ percent_available +'" aria-valuemin="0" aria-valuemax="100" style="min-width: 4em; width: '+ percent_available +'%;"> \
//                 '+ machines_available +' / '+ machines_total +' \
//               </div> \
//             </div> \
//           </div> \
//         </div>');
//       all_floor_total += machines_available;
//     }
//     jQuery(computer_total).text(all_floor_total);
//     setTimeout(computer_availability, 10000, id);
//   });
// }


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

// Replace spaces with - and remove special characters from a string
function sanitizeString(str) {
  return str
    .replace(/\s+/g, '-')         // Replace spaces with -
    .replace(/[^a-zA-Z0-9\-]/g, '') // Remove special characters except -
    .toLowerCase();               // Optional: make lowercase
}

// Example usage:
// let clean = sanitizeString("Hello World! @2025");
// Result: "hello-world-2025"

function subject_filter() {
document.getElementById("subject_slug").value = sanitizeString(document.getElementById("choose_subject").value);
document.forms["subject_filter"].submit();
}

// Table Sorter
// =========================================  
function initializeTableSorters() {

    document.querySelectorAll('.table-sorter').forEach(table => {

        const headers = table.querySelectorAll('th');

        headers.forEach((header, columnIndex) => {

            // Match old jQuery Tablesorter classes
            header.classList.add('header');

            header.addEventListener('click', () => {

                const tbody = table.tBodies[0];

                if (!tbody) {
                    return;
                }

                // Remove existing sort classes from all headers
                headers.forEach(th => {
                    th.classList.remove(
                        'headerSortUp',
                        'headerSortDown'
                    );
                });

                const rows = Array.from(tbody.rows);

                const currentColumn =
                    table.dataset.sortColumn;

                const currentDirection =
                    table.dataset.sortDirection;

                const ascending =
                    currentColumn != columnIndex ||
                    currentDirection !== 'asc';

                rows.sort((a, b) => {

                    const aText =
                        a.cells[columnIndex]?.textContent.trim() ?? '';

                    const bText =
                        b.cells[columnIndex]?.textContent.trim() ?? '';

                    return ascending
                        ? aText.localeCompare(
                            bText,
                            undefined,
                            { numeric: true }
                        )
                        : bText.localeCompare(
                            aText,
                            undefined,
                            { numeric: true }
                        );

                });

                rows.forEach(row => tbody.appendChild(row));

                table.dataset.sortColumn =
                    columnIndex;

                table.dataset.sortDirection =
                    ascending ? 'asc' : 'desc';

                // Apply old Tablesorter classes
                if (ascending) {
                    header.classList.add('headerSortUp');
                } else {
                    header.classList.add('headerSortDown');
                }

            });

        });

    });

}

// Load all functions when Dom Ready
// =========================================

document.addEventListener('DOMContentLoaded', () => {
  collapse_sidebar();
  tab_linking();
  login_modal_launch();
  homepage_banner_close();
  enable_tooltips();
  bootstrap_gravity_forms();
  my_account_btn();
  scroll_top_btn();
  grid_list_toggle();
  initializeTableSorters();
});