<footer>
	<div class="container">
		<div class="row">
			<?php /* Footer Navigation - Find */
				wp_nav_menu( array(
				  'theme_location'		=> 'footer-menu-find',
				  'menu' 				=> 'Footer Menu Find',
				  'depth'				=> 2,
				  'container'			=> 'div',
				  'container_class'		=> 'col-sm-3',
				  'menu_class' 			=> 'Find',
				  'fallback_cb'      	=> 'wp_bootstrap_navwalker::fallback',
				  //Process nav menu using our custom nav walker
				  'walker' => new wp_bootstrap_navwalker())
				);
			?>
			<?php /* Footer Navigation - Find */
				wp_nav_menu( array(
				  'theme_location'		=> 'footer-menu-services',
				  'menu' 				=> 'Footer Menu Services',
				  'depth'				=> 2,
				  'container'			=> 'div',
				  'container_class'		=> 'col-sm-3',
				  'menu_class' 			=> 'Services',
				  'fallback_cb'      	=> 'wp_bootstrap_navwalker::fallback',
				  //Process nav menu using our custom nav walker
				  'walker' => new wp_bootstrap_navwalker())
				);
			?>
			<?php /* Footer Navigation - About */
				wp_nav_menu( array(
				  'theme_location'		=> 'footer-menu-about',
				  'menu' 				=> 'Footer Menu About',
				  'depth'				=> 2,
				  'container'			=> 'div',
				  'container_class'		=> 'col-sm-3',
				  'menu_class' 			=> 'About',
				  'fallback_cb'      	=> 'wp_bootstrap_navwalker::fallback',
				  //Process nav menu using our custom nav walker
				  'walker' => new wp_bootstrap_navwalker())
				);
			?>
			<?php /* Footer Navigation - Help */
				wp_nav_menu( array(
				  'theme_location'		=> 'footer-menu-help',
				  'menu' 				=> 'Footer Menu Help',
				  'depth'				=> 2,
				  'container'			=> 'div',
				  'container_class'		=> 'col-sm-3',
				  'menu_class' 			=> 'Help',
				  'fallback_cb'      	=> 'wp_bootstrap_navwalker::fallback',
				  //Process nav menu using our custom nav walker
				  'walker' => new wp_bootstrap_navwalker())
				);
			?>
		</div>
<!-- 		<div class="col-sm-3 Find">
			<ul>
				<li class="footer-title"><a href="http://librarycmsdev.smca.ucf.edu/find/"><span class="glyphicon glyphicon-search"></span>&nbsp;Find</a></li>
				<li><a href="http://librarycmsdev.smca.ucf.edu/find/books/">Books</a></li>
				<li><a href="http://librarycmsdev.smca.ucf.edu/find/articles/">Articles</a></li>
				<li><a href="http://librarycmsdev.smca.ucf.edu/find/videos-media/">Videos/Media</a></li>
				<li><a href="http://librarycmsdev.smca.ucf.edu/find/course-materials/">Course Materials</a></li>
				<li><a href="http://guides.ucf.edu/">Research Guides</a></li>
				<li><a href="http://librarycmsdev.smca.ucf.edu/find/collections/">Collections</a></li>
				<li><a href="http://stars.library.ucf.edu/">STARS Digital Repository</a></li>
				<li><a href="http://librarycmsdev.smca.ucf.edu/find/computers-technology/">Computers &amp; Technology</a></li>
				<li><a href="http://librarycmsdev.smca.ucf.edu/find/print-copy-scan/">Print, Copy, Scan</a></li>
				<li><a href="http://librarycmsdev.smca.ucf.edu/find/study-rooms/">Study Rooms</a></li>
			</ul>
		</div>
		<div class="col-sm-3 Services">
			<ul>
				<li class="footer-title"><a href="http://librarycmsdev.smca.ucf.edu/help/"><span class="glyphicon glyphicon-education"></span>&nbsp;Help &amp; Services</a></li>
				<li><a href="http://librarycmsdev.smca.ucf.edu/help/ask-us/">Ask Us </a></li>
				<li><a href="http://guides.ucf.edu/">Research Guides</a></li>
				<li><a href="http://librarycmsdev.smca.ucf.edu/help/your-librarian/">Your Librarian (campus &amp; subject)</a></li>
				<li><a href="http://librarycmsdev.smca.ucf.edu/help/schedule-an-appointment/">Schedule an appointment</a></li>
				<li><a href="http://librarycmsdev.smca.ucf.edu/help/borrowing-from-other-libraries/">Borrowing from other libraries</a></li>
				<li><a href="http://librarycmsdev.smca.ucf.edu/help/lending/">Lending to other libraries</a></li>
				<li><a href="http://librarycmsdev.smca.ucf.edu/help/instruction/">Instruction</a></li>
				<li><a href="http://librarycmsdev.smca.ucf.edu/help/accessibility-services/">Accessibility Services</a></li>
				<li><a href="http://librarycmsdev.smca.ucf.edu/help/build-our-collection/">Build Our Collection</a></li>
				<li><a href="http://librarycmsdev.smca.ucf.edu/about/departments/scholarly-communications/citation-management-tools/">Citation Management</a></li>
				<li><a href="http://librarycmsdev.smca.ucf.edu/help/services-for-faculty/">Services for Faculty</a></li>
				<li><a href="http://librarycmsdev.smca.ucf.edu/help/services-for-grad-students/">Services for Grad Students</a></li>
			</ul>
		</div>
		<div class="col-sm-3 About">
			<ul>
				<li class="footer-title"><a href="http://librarycmsdev.smca.ucf.edu/about/"><span class="glyphicon glyphicon-info-sign"></span>&nbsp;About</a></li>
				<li><a href="http://librarycmsdev.smca.ucf.edu/about/hours/">Hours</a></li>
				<li><a href="http://librarycmsdev.smca.ucf.edu/about/libraries/">Libraries</a></li>
				<li><a href="http://librarycmsdev.smca.ucf.edu/about/news-events/">News &amp; Events</a></li>
				<li><a href="http://librarycmsdev.smca.ucf.edu/staff/">Staff Directory</a></li>
				<li><a href="http://librarycmsdev.smca.ucf.edu/about/jobs/">Jobs </a></li>
				<li><a href="http://librarycmsdev.smca.ucf.edu/about/departments/">Departments </a></li>
				<li><a href="http://librarycmsdev.smca.ucf.edu/about/policies/">Policies</a></li>
				<li><a href="http://librarycmsdev.smca.ucf.edu/about/giving-to-the-libraries/">Giving to the Libraries</a></li>
				<li><a href="http://librarycmsdev.smca.ucf.edu/about/site-map/">Site Map</a></li>
			</ul>
		</div>
		<div class="col-sm-3 Help">
			<ul>
				<li class="footer-title"><a href="http://librarycmsdev.smca.ucf.edu/my-account/"><span class="glyphicon glyphicon glyphicon-user"></span>&nbsp;My Account</a></li>
				<li><a href="http://librarycmsdev.smca.ucf.edu/my-account/">Catalog</a></li>
				<li><a href="http://librarycmsdev.smca.ucf.edu/my-account/">ILL</a></li>
				<li><a href="http://librarycmsdev.smca.ucf.edu/my-account/">Articles</a></li>
				<li><a href="http://librarycmsdev.smca.ucf.edu/my-account/">Fines</a></li>
			</ul>
		</div> -->
	</div>
</footer>
<?php wp_footer(); ?>
	</body>
</html>


