

<?php 
function taxonomy_filter ($taxonomy_name) {
	$taxonomy_terms = get_terms(['taxonomy' => $taxonomy_name, 'hide_empty' => false,]);
	foreach($taxonomy_terms as $taxonomy_term) {
		$slug = str_replace('-amp', '', title_to_slug($taxonomy_term -> name));
		echo ('<li><label class="filter-checkbox" ><input type="checkbox" id="'.$slug.'" value="'.$slug.'" /> <span>'.$taxonomy_term -> name.'</span></label></li>');
	}
}
?>

<aside>	
	<div id="secondary" class="secondary taxonomy-filter">
		<div id="widget-area-2" class="widget-area" role="complementary">
			<h3>Filters</h3>
			<p>Click on a box below to filter items that contain that category.</p>
			<div class="sidebar-collapse">
				<h4 class="widget-title"><a class="menu-toggle" data-toggle="collapse" href="#Library" aria-expanded="true" aria-controls="Library"><span class="glyphicon glyphicon-minus-sign" style="float:right"></span><i class="fa fa-university"></i> Library</a></h4>
				<div class="collapse in" id="Library">
					<ul>
					<?php taxonomy_filter('library');	?>
					</ul>
				</div>
			</div>
			<div class="sidebar-collapse">
				<h4 class="widget-title"><a class="menu-toggle" data-toggle="collapse" href="#TechType" aria-expanded="true" aria-controls="Tech Type"><span class="glyphicon glyphicon-minus-sign" style="float:right"></span><i class="fa fa-info-circle" aria-hidden="true"></i> Tech Type</a></h4>
				<div class="collapse in" id="Tech_Type">
					<ul>
						<?php taxonomy_filter('tech_type');	?>
					</ul>
				</div>
			</div>
			<div class="sidebar-collapse">
				<h4 class="widget-title"><a class="menu-toggle" data-toggle="collapse" href="#Loan_Period" aria-expanded="true" aria-controls="Loan Period"><span class="glyphicon glyphicon-minus-sign" style="float:right"></span><i class="fa fa-hourglass"></i> Loan Period</a></h4>
				<div class="collapse in" id="Loan_Period">
					<ul>
						<?php taxonomy_filter('loan_period');	?>
					</ul>
				</div>
			</div>
			<div class="sidebar-collapse">
				<h4 class="widget-title"><a class="menu-toggle" data-toggle="collapse" href="#Eligible_User" aria-expanded="true" aria-controls="Eligible User"><span class="glyphicon glyphicon-minus-sign" style="float:right"></span><i class="fa fa-users"></i> Eligible User</a></h4>
				<div class="collapse in" id="Eligible_User">
					<ul>
						<?php taxonomy_filter('eligible_user');	?>
					</ul>
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