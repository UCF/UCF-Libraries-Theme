

<aside>	
	<div id="secondary" class="secondary">
		<div id="widget-area" class="widget-area" role="complementary">
			<h4><a href="<?php echo get_post_type_archive_link( 'anatomy' ); ?>">All Anatomy</a></h4>
			<div class="sidebar-collapse">
				<h4 class="widget-title"><a class="menu-toggle" data-toggle="collapse" href="#Library" aria-expanded="true" aria-controls="Library"><span class="glyphicon glyphicon-minus-sign" style="float:right"></span><i class="fa fa-university"></i> Library</a></h4>
				<div class="collapse in" id="Library">
					<?php taxonomy_term_list('a_library'); ?>
				</div>
			</div>
			<div class="sidebar-collapse">
				<h4 class="widget-title"><a class="menu-toggle" data-toggle="collapse" href="#Anatomy_Type" aria-expanded="true" aria-controls="Anatomy Type"><span class="glyphicon glyphicon-minus-sign" style="float:right"></span><i class="fa fa-info-circle" aria-hidden="true"></i> Anatomy Type</a></h4>
				<div class="collapse in" id="Anatomy_Type">
					<?php taxonomy_term_list('anatomy_type'); ?>
				</div>
			</div>
		</div><!-- .widget-area -->
	</div>
</aside>