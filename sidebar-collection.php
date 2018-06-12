

<aside>	
	<div id="secondary" class="secondary">
		<div id="widget-area" class="widget-area" role="complementary">
			<h4><a href="<?php echo get_post_type_archive_link( 'collection' ); ?>">All Collections</a></h4>
			<div class="sidebar-collapse">
				<h4 class="widget-title"><a class="menu-toggle" data-toggle="collapse" href="#Collection_Owner" aria-expanded="true" aria-controls="Collection Owner"><span class="glyphicon glyphicon-minus-sign" style="float:right"></span><i class="fa fa-university"></i> Collection Owner</a></h4>
				<div class="collapse in" id="Collection_Owner">
					<?php taxonomy_term_list('collection_owner'); ?>
				</div>
			</div>
			<div class="sidebar-collapse">
				<h4 class="widget-title"><a class="menu-toggle" data-toggle="collapse" href="#Collection_Keyword" aria-expanded="true" aria-controls="Keyword"><span class="glyphicon glyphicon-minus-sign" style="float:right"></span><i class="fa fa-info-circle" aria-hidden="true"></i> Keyword</a></h4>
				<div class="collapse in" id="Collection_Keyword">
					<?php taxonomy_term_list('collection_keyword'); ?>
				</div>
			</div>
			<div class="sidebar-collapse">
				<h4 class="widget-title"><a class="menu-toggle" data-toggle="collapse" href="#Collection_Location" aria-expanded="true" aria-controls="Location"><span class="glyphicon glyphicon-minus-sign" style="float:right"></span><i class="fa fa-hourglass"></i> Collection Location</a></h4>
				<div class="collapse in" id="Collection_Location">
					<?php taxonomy_term_list('collection_location'); ?>
				</div>
			</div>
		</div><!-- .widget-area -->
	</div>
</aside>