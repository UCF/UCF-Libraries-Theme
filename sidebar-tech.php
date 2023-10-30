<aside>	
	<div id="secondary" class="secondary taxonomy-filter">
		<div id="widget-area-2" class="widget-area" role="complementary">
		<p class="h3"><a href="<?php echo get_post_type_archive_link( 'tech' ); ?>">View All Technology</a></p>
		<div class="sidebar-collapse">
			<div class="widget-title"><a class="menu-toggle" data-toggle="collapse" href="#Library" aria-expanded="true" aria-controls="Library"><span class="glyphicon glyphicon-minus-sign" style="float:right"></span><i class="fa fa-university"></i> Library</a></div>
				<div class="collapse in" id="Library">
					<?php taxonomy_term_list('library');	?>
				</div>
			</div>
		</div><!-- .widget-area -->
	</div>
</aside>
