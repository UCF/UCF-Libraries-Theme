

<aside>	
	<div id="secondary" class="secondary taxonomy-filter">
		<div id="widget-area" class="widget-area" role="complementary">
		<h3><a href="<?php echo get_post_type_archive_link( 'anatomy' ); ?>">View All Anatomy</a></h3>
			<div class="sidebar-collapse">
				<h4 class="widget-title"><a class="menu-toggle" data-toggle="collapse" href="#Library" aria-expanded="true" aria-controls="Library"><span class="glyphicon glyphicon-minus-sign" style="float:right"></span><i class="fa fa-university"></i> Library</a></h4>
				<div class="collapse in" id="Library">
					<?php taxonomy_term_list('a_library'); ?>
				</div>
			</div>
		</div><!-- .widget-area -->
	</div>
</aside>
