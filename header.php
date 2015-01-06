<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Library Test
 * @since Library Test 1.0
 */
?><!DOCTYPE html>
<html>
	<head>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
		<link rel="stylesheet" href="http://library.ucf.edu/Web/CSS/Main.css">
		<link rel="stylesheet" href="http://library.ucf.edu/Web/CSS/Header.css">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
	<div id="wrapper">
		<div id="LibTitleBar"><!--header tag-->
			<div id="LibTitleBarContainer">
				<a href="#ContentArea" title="Skip to content" style="display: none;" class="AccessabilityEnabled"><img src="/images/spacer.gif" alt="Skip to content" height="1" width="1" border="0"></a>
				<a href="http://www.ucf.edu/" id="LibTitleBarPegasus"><em>UCF Website</em></a>
				<a href="http://library.ucf.edu" id="LibTitleBarTitle"><strong>University of Central Florida Libraries</strong></a>
				<div id="search-container" class="search-box-wrapper">
					<div class="search-box">
						<?php get_search_form(); ?>
					</div>
				</div>
			</div>
			<div id="LibMenu">
				<ul>
					<li><a href="http://library.ucf.edu/">Home</a></li>
					<li><a href="http://library.ucf.edu/Find/">Find</a>
						<div id="Find">
							<ul>
								<li><a href="http://library.ucf.edu/Databases/">Articles &amp; Databases</a></li>
								<li><a title="Search the UCF Libraries Catalog for books, videos, journal subscriptions and more." href="http://cf.catalog.fcla.edu">Books / Catalog</a></li>
								<li><a title="Discover notable print and online resources for your research." href="http://guides.ucf.edu/">Research Guides</a></li>
								<li><a href="http://library.ucf.edu/Web/Status/Standard/Main/PC.php">Computers Availability</a></li>
								<li><a title="Find course notes and readings selected by your instructor." href="http://reserves.catalog.fcla.edu/cf.jsp">Course Reserves</a></li>
								<li><a href="http://ucf.catalog.fcla.edu/cf.jsp?fa=subset_facet%3ANew%5C+Titles%5C[CF%5C]">New Titles</a></li>
								<li><a title="Browse an alphabetical list or enter a journal title to find UCF Libraries online journals." href="http://library.ucf.edu/Databases/OnlineJournals.asp">Online Journals</a></li>
								<li><a href="http://library.ucf.edu/Databases/Subjects/BooksLibraries.asp">Other Libraries</a></li>
								<li><a href="http://library.ucf.edu/Web/Status/Standard/Main/StudyRoom.php">Study Room Availability</a></li>
								<li><a title="UCF&#65533;s Information Literacy Modules have arrived!" href="http://infolit.ucf.edu/">Information Literacy Modules</a></li>
								<li><a title="Find the right librarian for your subject." href="http://library.ucf.edu/SubjectLibrarians/">Subject Librarians</a></li>
							</ul>
						</div>
					</li>
					<li><a href="http://library.ucf.edu/Services/">Services</a>
						<div id="Services">
							<ul>
								<li><a title="Accessible Technology" href="http://library.ucf.edu/Services/Disability/">Accessible Technology </a></li>
								<li><a title="Chat, email, or telephone help from the UCF Libraries." href="http://library.ucf.edu/Ask/">Ask A Librarian</a></li>
								<li><a title="Loan periods and policies about borrowing items from the UCF Libraries." href="http://library.ucf.edu/Circulation/">Borrowing Books</a></li>
								<li><a title="Loan periods and policies about borrowing items from the UCF Libraries." href="http://library.ucf.edu/Circulation/">Circulation / Media</a></li>
								<li><a href="http://library.ucf.edu/Services/Faculty.asp">Faculty Services</a></li>
								<li><a title="Borrow books and articles that the Libraries does not own." href="http://library.ucf.edu/ILL/">Interlibrary Loan</a></li>
								<li><a title="Tutorials, handouts, and class sessions are available to help your learn to use the Libraries." href="http://library.ucf.edu/Reference/Instruction">Instruction</a></li>
								<li><a title="Login to list books you have checked out and to renew items as needed." href="https://cf.catalog.fcla.edu/cf.jsp?Login=1">My Account / Renew Books</a></li>
								<li><a href="http://library.ucf.edu/Reference/ResearchConsultations/Default.asp">Research Consultations</a></li>
								<li><a href="http://library.ucf.edu/Reference/">Research &amp; Information Services</a></li>
								<li><a title="Information and guidance regarding digital scholarship at UCF" href="http://library.ucf.edu/ScholarlyCommunication/">Scholarly Communication</a></li>
								<li><a title="Find the right librarian for your subject." href="http://library.ucf.edu/SubjectLibrarians/">Subject Librarians</a></li>
							</ul>
						</div>
					</li>
					<li><a href="http://library.ucf.edu/HowDoI/">How do I?</a>
						<div id="HowDoI">
							<ul>
								<li><a href="http://guides.ucf.edu/citations">Cite a Source?</a></li>
								<li><a href="http://guides.ucf.edu/faq2">FAQs</a></li>
								<li><a href="http://library.ucf.edu/Reference/Instruction/find.asp">Find Books or Articles?</a></li>
								<li><a href="http://library.ucf.edu/Circulation/ID/ActivationRequestForm.asp">Get My Card Activated?</a></li>
								<li><a href="http://library.ucf.edu/Databases/OffCampus.asp">Get Off-Campus Access?</a></li>
								<li><a href="http://library.ucf.edu/Reference/libloc.php">Locate a Collection?</a></li>
								<li><a href="http://library.ucf.edu/CollectionMgmt/RecommendationForm.php">Recommend Books?</a></li>
								<li><a href="http://library.ucf.edu/Circulation/Borrowing/chckrnew.asp">Renew My Books?</a></li>
								<li><a href="http://library.ucf.edu/StudyRooms/">Reserve a Study Room?</a></li>
							</ul>
						</div>
					</li>
					<li><a href="http://library.ucf.edu/CollectionMgmt/CollectionsOverview.php">Collections</a>
						<div id="Collections">
							<ul>
								<li><a title="UCF Libraries collections and services throughout the state." href="http://library.ucf.edu/BranchCampuses/Locations/default.asp">Branch &amp; Regional Campuses</a></li>
								<li><a title="Our Digital Collections" href="http://library.ucf.edu/Systems/DigitalCollections/">Digital Collections</a></li>
								<li><a title="Exhibits on Display at the Library" href="http://library.ucf.edu/Exhibits/">Exhibits</a></li>
								<li><a title="Links to a large number of local, state, federal, and international sources. The UCF Libraries is a Government Document repository." href="http://guides.ucf.edu/government">Government Resources</a></li>
								<li><a href="http://library.ucf.edu/GovDocs/PatentsTrademarks/">Patents and Trademarks</a></li>
								<li><a href="http://library.ucf.edu/CollectionMgmt/">Collection Management</a></li>
								<li><a title="Discover the Libraries collection of unique, rare, and historical items." href="http://library.ucf.edu/SpecialCollections/">Special Collections</a></li>
								<li><a href="http://library.ucf.edu/SpecialCollections/Archives/">University Archives</a></li>
							</ul>
						</div>
					</li>
					<li><a href="http://library.ucf.edu/Administration/About/">About</a>
						<div id="About">
							<ul>
								<li><a title="Our mailing address, street address, and key phone numbers." href="http://library.ucf.edu/Administration/ContactUs/">Address &amp; Phone</a></li>
								<li><a title="Text directions and maps to the main and the regional campuses and libraries." href="http://library.ucf.edu/Administration/Maps/">Directions &amp; Maps</a></li>
								<li><a href="http://library.ucf.edu/Administration/Personnel/Employment/">Employment Opportunities</a></li>
								<li><a href="http://library.ucf.edu/Administration/LibraryDevelopment/">Giving to the Libraries</a></li>
								<li><a title="Days and hours open for the main ane regional Libraries and services." href="http://library.ucf.edu/Administration/Hours/">Hours</a></li>
								<li><a title="An interactive set of color-coded floor plans for the main library building." href="http://library.ucf.edu/Administration/Maps/">Interactive Floor Plans</a></li>
								<li><a href="http://library.ucf.edu/News/">News</a></li>
								<li><a href="http://library.ucf.edu/Administration/FactsFigures/Overview.asp">Overview</a></li>
								<li><a href="/Policies/">Policies</a></li>
								<li><a title="Names, email addresses, and phone numbesr for Libraries Employees" href="http://library.ucf.edu/Administration/ContactUs/StaffDirectory.asp">Staff Directory</a></li>
							</ul>
						</div>
					</li>
					<li><a href="http://library.ucf.edu/BranchCampuses/Locations/">Branch Libraries</a>
						<div id="Branch">
							<ul>
								<li class="Full"><a href="/CMC/">CMC</a> (Curriculum 
									<span>Materials Center)<br>
									<em>Provides a unique collection of P-12 curriculum materials in 
									the Education Building on the UCF main campus in Orlando.</em></span></li>
								<li class="Full"><a href="http://library.ucf.edu/Rosen/">Rosen</a> 
									<span>(Universal Orlando Foundation Library at the Rosen College of 
									Hospitality Management)<br>
									<em>Provides a unique collection of materials in support of the 
									Hospitality Management program at the Rosen College campus.</em></span></li>
								<li><a href="http://library.ucf.edu/Regionals/Brevard/default.php">Cocoa</a> 
									/<a href="http://library.ucf.edu/Regionals/Brevard/default.php">Palm Bay</a><br>
									<span>(BCC/UCF Joint-Use Libraries)</span></li>
								<li><a href="http://library.ucf.edu/Regionals/Daytona/default.php">Daytona Beach</a>
									<span>(Daytona State/UCF Joint-Use Library)</span></li>
								<li><a href="Regionals/Ocala/default.php">Ocala</a><br> 
									<span>(CFCC/UCF Joint-Use Library)</span></li>
								<li><a href="http://library.ucf.edu/Regionals/Osceola/default.php">Osceola</a> 
									/ <a href="http://library.ucf.edu/Regionals/Osceola/default.php">West Orlando</a> 
									<span>(Valencia/UCF Joint-Use Libraries)</span></li>
								<li><a href="http://library.ucf.edu/Regionals/SanfordLakeMary/">Sanford / Lake Mary</a><br>
									<span>(SCC/UCF Joint-Use Libraries)</span></li>
								<li><a href="http://library.ucf.edu/Regionals/SouthLake/default.php">South Lake</a><br> 
									<span>(LSCC/UCF Joint-Use Library)</span></li>
								<li><a href="http://library.ucf.edu/">John C. Hitt Library</a></li>
								<li><a href="BranchCampuses/fsec.asp">Florida Solar Energy 
									Center Research Library</a></li>
								<li><a href="http://www.med.ucf.edu/library/">College of 
									Medicine</a><span> (Harriet F. Ginsburg Health Sciences 
									Library)</span></li>
							</ul>
						</div>
					</li>
				</ul>
			</div>
		</div>
