

<aside>	
	<div id="secondary" class="secondary taxonomy-filter">
		<div id="widget-area" class="widget-area" role="complementary">
			<h3>Filters</h3>
			<p>Click on a box below to filter items that contain that category.</p>
			<div class="sidebar-collapse">
				<h4 class="widget-title"><a class="menu-toggle" data-toggle="collapse" href="#Library" aria-expanded="true" aria-controls="Library"><span class="glyphicon glyphicon-minus-sign" style="float:right"></span><i class="fa fa-university"></i> Library</a></h4>
				<div class="collapse in" id="Library">
					<?php taxonomy_filter('a_library'); ?>
				</div>
			</div>
			<div class="sidebar-collapse">
				<h4 class="widget-title"><a class="menu-toggle" data-toggle="collapse" href="#Anatomy_Type" aria-expanded="true" aria-controls="Anatomy Type"><span class="glyphicon glyphicon-minus-sign" style="float:right"></span><i class="fa fa-info-circle" aria-hidden="true"></i> Anatomy Type</a></h4>
				<div class="collapse in" id="Anatomy_Type">
					<?php taxonomy_filter('anatomy_type'); ?>
				</div>
			</div>
		</div><!-- .widget-area -->
	</div>
</aside>
<script>
$('.taxonomy-filter').on('change', 'input[type=checkbox]', function() {
  var $lis = $('.taxonomy');	
	var $checked =$('input[type=checkbox]:checked');
  if ($checked.length)
  {							
		var selector = '';
		$($checked).each(function(index, element){                            
				selector += "[data-category~='" + element.value + "']";                            
		});                        
    $lis.hide();                        
    $lis.filter(selector).show();			   
  }
  else
  {
    $lis.show();
  }
});

</script>