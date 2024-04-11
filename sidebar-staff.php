

<aside>	
	<div id="secondary" class="secondary">
		<div id="widget-area" class="widget-area" role="complementary">
			<a class="widget-link" href="<?php echo get_post_type_archive_link( 'staff' ); ?>">All Staff</a>
			<div class="sidebar-collapse">
				<div class="widget-title"><a class="menu-toggle" data-toggle="collapse" href="#Staff_Department" aria-expanded="true" aria-controls="Staff_Department" role="button"><span class="glyphicon glyphicon-minus-sign" style="float:right"></span>Divisions &amp; Departments</a></div>
				<div role="navigation" aria-label="Divisions & Departments" class="collapse in" id="Staff_Department">
					<?php taxonomy_term_list('department'); ?>
				</div>
			</div>
			<div class="sidebar-collapse">
				<div class="widget-title"><a class="menu-toggle" data-toggle="collapse" href="#Staff_Unit" aria-expanded="true" aria-controls="Staff_Unit" role="button"><span class="glyphicon glyphicon-minus-sign" style="float:right"></span>Units &amp; Groups</a></div>
				<div role="navigation" aria-label="Units & Groups" class="collapse in" id="Staff_Unit">
					<?php taxonomy_term_list('unit'); ?>
				</div>
			</div>
		</div><!-- .widget-area -->
	</div>
</aside>
