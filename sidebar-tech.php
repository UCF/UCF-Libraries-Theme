

<aside>	
	<div id="secondary" class="secondary taxonomy-filter">
		<div id="widget-area" class="widget-area" role="complementary">
			<h4><a href="<?php echo get_post_type_archive_link( 'tech' ); ?>">All Technology</a></h4>
			<div class="sidebar-collapse">
				<h4 class="widget-title"><a class="menu-toggle" data-toggle="collapse" href="#Library" aria-expanded="true" aria-controls="Library"><span class="glyphicon glyphicon-minus-sign" style="float:right"></span><i class="fa fa-university"></i> Library</a></h4>
				<div class="collapse in" id="Library">
					<ul>
					<?php
						$library_terms = get_terms(['taxonomy' => 'library', 'hide_empty' => false,]);
						foreach($library_terms as $library_term) {
							echo ('<li><label><input type="checkbox" value="'.str_replace('-amp', '', title_to_slug($library_term -> name)).'" /> '.$library_term -> name.'</label></li>');
						}
					?>
					</ul>
				</div>
			</div>
			<div class="sidebar-collapse">
				<h4 class="widget-title"><a class="menu-toggle" data-toggle="collapse" href="#TechType" aria-expanded="true" aria-controls="Tech Type"><span class="glyphicon glyphicon-minus-sign" style="float:right"></span><i class="fa fa-info-circle" aria-hidden="true"></i> Tech Type</a></h4>
				<div class="collapse in" id="Tech_Type">
					<ul>
						<?php
							$library_terms = get_terms(['taxonomy' => 'tech_type', 'hide_empty' => false,]);
							foreach($library_terms as $library_term) {
								echo ('<li><label><input type="checkbox" value="'.str_replace('-amp', '', title_to_slug($library_term -> name)).'" /> '.$library_term -> name.'</label></li>');
							}
						?>
					</ul>
				</div>
			</div>
			<div class="sidebar-collapse">
				<h4 class="widget-title"><a class="menu-toggle" data-toggle="collapse" href="#Loan_Period" aria-expanded="true" aria-controls="Loan Period"><span class="glyphicon glyphicon-minus-sign" style="float:right"></span><i class="fa fa-hourglass"></i> Loan Period</a></h4>
				<div class="collapse in" id="Loan_Period">
					<ul>
						<?php
							$library_terms = get_terms(['taxonomy' => 'loan_period', 'hide_empty' => false,]);
							foreach($library_terms as $library_term) {
								echo ('<li><label><input type="checkbox" value="'.str_replace('-amp', '', title_to_slug($library_term -> name)).'" /> '.$library_term -> name.'</label></li>');
							}
						?>
					</ul>
				</div>
			</div>
			<div class="sidebar-collapse">
				<h4 class="widget-title"><a class="menu-toggle" data-toggle="collapse" href="#Eligible_User" aria-expanded="true" aria-controls="Eligible User"><span class="glyphicon glyphicon-minus-sign" style="float:right"></span><i class="fa fa-users"></i> Eligible User</a></h4>
				<div class="collapse in" id="Eligible_User">
					<ul>
						<?php
							$library_terms = get_terms(['taxonomy' => 'eligible_user', 'hide_empty' => false,]);
							foreach($library_terms as $library_term) {
								echo ('<li><label><input type="checkbox" value="'.str_replace('-amp', '', title_to_slug($library_term -> name)).'" /> '.$library_term -> name.'</label></li>');
							}
						?>
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