<?php $search_terms = htmlspecialchars( $_GET["s"] ); ?>

<form role="form" class="search search-site" action="<?php bloginfo('siteurl'); ?>/" id="searchform" method="get">
    <label for="s" class="sr-only">Search</label>
    <div class="input-group">
        <input type="text" class="form-control" id="site_search" name="s" placeholder="Search Libraries Website"<?php if ( $search_terms !== '' ) { echo ' value="' . $search_terms . '"'; } ?> />
        <span class="input-group-btn">
            <button type="submit" class="btn btn-primary" onclick="__gaTracker(\'send\', \'event\', \'internal-search\', $(\'#site_search\').val(), \'Site Search\');"><span class="glyphicon glyphicon-search"></span></button>
        </span>
    </div> <!-- .input-group -->
</form>
