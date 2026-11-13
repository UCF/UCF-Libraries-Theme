<?php // $search_terms = htmlspecialchars( $_GET["s"] ); ?>
<?php// if ( $search_terms !== '' ) { echo ' value="' . $search_terms . '"'; } ?>
<script>
  // (function() {
  //   var cx = '014991031871587396159:7dbjtrfgtse';
  //   var gcse = document.createElement('script');
  //   gcse.type = 'text/javascript';
  //   gcse.async = true;
  //   gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
  //       '//cse.google.com/cse.js?cx=' + cx;
  //   var s = document.getElementsByTagName('script')[0];
  //   s.parentNode.insertBefore(gcse, s);
  // })();
</script>

 <form role="form" class="search search-site" action="<?php bloginfo('siteurl'); ?>/" id="searchform" method="get">
    <label for="site_search" class="visually-hidden">Search Website</label>
    <div class="input-group">
        <input type="text" class="form-control" id="site_search" name="s" placeholder="Search Libraries Website" aria-label="Search Libraries Website">
        <button class="btn btn-primary" type="submit" onclick="__gaTracker('send', 'event', 'internal-search', $('#site_search').val(), 'Site Search');"><i class="fa fa-search" aria-hidden="true"></i><strong> Search</strong></button>
    </div>
</form>
