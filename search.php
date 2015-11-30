<?php // Get number of results
$results_count = $wp_query->found_posts;
?>
<?php get_header(); ?>
<div id="main">
    <div class="jumbotron">
        <div class="container">
        	<div class="row">
                <div class="col-sm-9">
    		        <h1>Search <span class="keyword">&ldquo;<?php the_search_query(); ?>&rdquo;</span></h1>
    		    </div>
                <div class="col-sm-3">
                    <?php get_search_form(); ?>
                </div>
            </div>
        </div> <!-- .container -->
    </div> <!-- .jumbotron -->
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div id="Search_Results">
                <script>
                  (function() {
                    var cx = '014991031871587396159:7dbjtrfgtse';
                    var gcse = document.createElement('script');
                    gcse.type = 'text/javascript';
                    gcse.async = true;
                    gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
                        '//cse.google.com/cse.js?cx=' + cx;
                    var s = document.getElementsByTagName('script')[0];
                    s.parentNode.insertBefore(gcse, s);
                  })();
                </script>
                <gcse:searchresults-only></gcse:searchresults-only>
                </div>
            </div> <!-- .col-md-12 -->
        </div> <!-- .row -->
    </div><!-- .container -->
</div><!-- .main -->
<?php get_footer(); ?>