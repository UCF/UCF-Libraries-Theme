

<aside>	
	<div id="secondary" class="secondary">
		<div id="widget-area" class="widget-area" role="complementary">
			<h4><a href="<?php echo get_post_type_archive_link( 'tech' ); ?>">All Technology</a></h4>
			<div class="sidebar-collapse">
				<h4 class="widget-title"><a class="menu-toggle" data-toggle="collapse" href="#TechType" aria-expanded="true" aria-controls="Department"><span class="glyphicon glyphicon-minus-sign" style="float:right"></span><i class="fa fa-info-circle" aria-hidden="true"></i> Tech Type</a></h4>
				<div class="collapse in" id="Tech_Type">
					<?php taxonomy_term_list('tech_type'); ?>
				</div>
			</div>
			<div class="sidebar-collapse">
				<h4 class="widget-title"><a class="menu-toggle" data-toggle="collapse" href="#Loan_Period" aria-expanded="true" aria-controls="Unit"><span class="glyphicon glyphicon-minus-sign" style="float:right"></span><i class="fa fa-hourglass"></i> Loan Period</a></h4>
				<div class="collapse in" id="Loan_Period">
					<?php taxonomy_term_list('loan_period'); ?>
				</div>
			</div>
			<div class="sidebar-collapse">
				<h4 class="widget-title"><a class="menu-toggle" data-toggle="collapse" href="#Eligible_User" aria-expanded="true" aria-controls="Unit"><span class="glyphicon glyphicon-minus-sign" style="float:right"></span><i class="fa fa-users"></i> Eligible User</a></h4>
				<div class="collapse in" id="Eligible_User">
					<?php taxonomy_term_list('eligible_user'); ?>
				</div>
			</div>
			<div class="sidebar-collapse">
				<h4 class="widget-title"><a class="menu-toggle" data-toggle="collapse" href="#Library" aria-expanded="true" aria-controls="Unit"><span class="glyphicon glyphicon-minus-sign" style="float:right"></span><i class="fa fa-university"></i> Library</a></h4>
				<div class="collapse in" id="Library">
					<?php taxonomy_term_list('library'); ?>
				</div>
			</div>		</div><!-- .widget-area -->
	</div>
</aside>