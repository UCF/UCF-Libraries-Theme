<?php
/*
Description: 404 page not found.
*/
?>
<?php get_header(); ?>
<div class="jumbotron">
    <div class="container">
    	<div class="row">
            <div class="col-sm-9">
                <header>
                    <h1>404 Page not found</h1>
                </header>
		    </div>
            <div class="col-sm-3">
                <?php get_search_form(); ?>
            </div>
        </div>
    </div> <!-- .container -->
</div> <!-- .jumbotron -->
<div class="container" id="main">
    <div class="row">

        <div class="col-md-12">
            <p>We're sorry. The page you were looking for could not be found or does not exist.</p>
            <p>Need to add more to this page.</p>
        </div> <!-- .col-md-12 -->
    </div> <!-- .row -->
</div><!-- .container -->
<?php get_footer(); ?>