

<aside>	
	<div id="secondary" class="secondary">
		<div id="widget-area" class="widget-area" role="complementary">
			<div class="sidebar-collapse">
				<h4 class="widget-title"><a class="menu-toggle" data-toggle="collapse" href="#Department" aria-expanded="true" aria-controls="Department"><span class="glyphicon glyphicon-minus-sign" style="float:right"></span>Departments</a></h4>
				<div class="collapse in" id="Department">
					<?php taxonomy_term_list('department'); ?>
				</div>
			</div>
			<div class="sidebar-collapse">
				<h4 class="widget-title"><a class="menu-toggle" data-toggle="collapse" href="#Unit" aria-expanded="true" aria-controls="Unit"><span class="glyphicon glyphicon-minus-sign" style="float:right"></span>Units</a></h4>
				<div class="collapse in" id="Unit">
					<?php taxonomy_term_list('unit'); ?>
				</div>
			</div>
			<div class="sidebar-collapse">
				<h4 class="widget-title"><a class="menu-toggle" data-toggle="collapse" href="#Group" aria-expanded="true" aria-controls="Group"><span class="glyphicon glyphicon-minus-sign" style="float:right"></span>Groups</a></h4>
				<div class="collapse in" id="Group">
					<?php taxonomy_term_list('group'); ?>
				</div>
			</div>
		</div><!-- .widget-area -->
	</div>
</aside>
