<aside>
	<div id="LibSideBar" class="lib-sidebar">
		<h3><?php _e('Categories'); ?></h3>
		<ul>
			<?php wp_list_cats('sort_column=name&optioncount=1&hierarchical=0'); ?>
		</ul>
		<h3><?php _e('Archives'); ?></h3>
		<ul>
			<?php wp_get_archives('type=monthly'); ?>
		</ul>
	</div>
</aside>