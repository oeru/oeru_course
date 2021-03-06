<?php

function oeru_theme_admin_page(){
	add_menu_page('OERu Theme', 'OERU Theme', 'manage_options', 'oeru-theme-admin', 'oeru_theme_options');
	add_submenu_page('oeru-theme-admin', 'Menu Creation', 'Menu Creation', 'manage_options', 'oeru-theme-menu', 'oeru_theme_menu');
	add_submenu_page('oeru-theme-admin', 'Shortcodes', 'Shortcodes', 'manage_options', 'oeru-theme-shortcodes', 'oeru_theme_shortcodes');
}
add_action('admin_menu', 'oeru_theme_admin_page');

function oeru_theme_options(){
	?><h1>OERu Theme</h1>
	<p>You can use the <a href="<?PHP echo site_url("wp-admin"); ?>/customize.php">Site Customiser</a> to alter page colours and add logos</p>
	<h2>Layout Options</h2>
	<div style="text-align:center">
	<h3>Front Page Category One Wide then three</h3>
	<a href="<?PHP echo get_template_directory_uri() . "/layoutimages/one_three.png"; ?>">
		<img src="<?PHP echo get_template_directory_uri() . "/layoutimages/one_three.png"; ?>" style="width:50%; height:50%" />
	</a>
	<p>This brings in the 4 most recent, or 4 in total of the posts in the "Front Page" Category</p>
	<h3>Front Page Category (columns) Only and All Pages (without a parent) in a 2 abreast column</h3>
	<a href="<?PHP echo get_template_directory_uri() . "/layoutimages/two_columns.png"; ?>">
		<img src="<?PHP echo get_template_directory_uri() . "/layoutimages/two_columns.png"; ?>" style="width:50%; height:50%" />
	</a>
	<p>This brings in the "Front Page" Category posts and displays them 2 abreast, or all pages</p>
	<h3>All Pages (without a parent) in a 3 abreast column</h3>
	<a href="<?PHP echo get_template_directory_uri() . "/layoutimages/three_columns.png"; ?>">
		<img src="<?PHP echo get_template_directory_uri() . "/layoutimages/three_columns.png"; ?>" style="width:50%; height:50%" />
	</a>
	<p>This brings all pages and displays them 3 abreast</p>
	<h3>All Pages (without a parent) in a 4 abreast column</h3>
	<a href="<?PHP echo get_template_directory_uri() . "/layoutimages/four_columns.png"; ?>">
		<img src="<?PHP echo get_template_directory_uri() . "/layoutimages/four_columns.png"; ?>" style="width:50%; height:50%" />
	</a>
	<p>This brings all pages and displays them 4 abreast</p>
	<h3>Recent Posts</h3>
	<a href="<?PHP echo get_template_directory_uri() . "/layoutimages/recent_posts.png"; ?>">
		<img src="<?PHP echo get_template_directory_uri() . "/layoutimages/recent_posts.png"; ?>" style="width:50%; height:50%" />
	</a>
	<p>Standard WordPress display of most recent posts</p>
	<h3>Custom HTML</h3>
	<p>You can also use the theme customizer to add custom HTML to the front page</p>
	</div>
	<?PHP
}

function oeru_theme_shortcodes(){
	?><h1>OERu Theme Shortcodes</h1>
	<h2>[oeru_remove_next]</h2>
	<p>Use this short code to remove the next button from a page</p>
	<h2>[oeru_remove_prev]</h2>
	<p>Use this short code to remove the previous button from a page</p>
	<h2>[oeru_remove_third]</h2>
	<p>Use this short code to remove the third level navigation from a page</p>
	<h2>[oeru_button]</h2>
	<p>Use this short code to place a button on a page</p>
	<p>Example [oeru_button target="_blank" title="search the web with google" href="http://www.google.com" label="google"] - will display a button labelled google which will open google in a new window</p>
	<h2>[oeru_feedback_button]</h2>
	<p>Use this short code to place a button on a page which when clicked on reveals feedback.</p>
	<p>Example [oeru_feedback_button label="Explain this" feedback="it is easy"] - will display a button labelled Explain this which when clicked on will reveal the feedback.</p>
	<h2>[oeru_faq]</h2>
	<p>Use this short code to place a clickable, expandable option on a page</p>
	<p>Example [oeru_faq question="What is this?" feedback="It is a FAQ"] - will display a the text in question which when clicked on will reveal the feedback.</p>
	<h2>[oeru_hint]</h2>
	<p>Use this short code to place a clickable, expandable option on a page (as above but with an information symbol)</p>
	<p>Example [oeru_hint hint="What is this?" reveal="It is a FAQ"] - will display a the text in hint which when clicked on will reveal the text in reveal.</p>
	<h2>[oeru_accordion]</h2>
	<p>Use this short code to place a clickable, expandable option on a page (as above but with an information symbol).</p>
	<p>Example [oeru_accordion title="What is Science?" body="Lots of things"] - will display an accordion.</p>
	<h2>[oeru_accordion_multi]</h2>
	<p>Use this short code to place multiple, clickable, expandable option on a page (as above but multiple labels)</p>
	<p>If you want one level to be open add <em>active="number of that level"</em> to have a level open when the page loads. In the example below, science is 1, and art is 2</p>
	<p>Example [oeru_accordion_multi science="What is Science?" science_data="Lots of things" art="What is Art?" art_data="Not science"] - will display an accordion. The clickable label can be called whatever you want, but the content for that click must be the same name but with _data amended.</p>
	<h2>[oeru_basic_footer]</h2>
	<p>Use this short code to place an additional widget.</p>
	<p>Example [oeru_basic_footer title="Our University" content="Our address"] - will add a widget with title as the title and content as the content.</p>
	<h2>[oeru_advanced_footer]</h2>
	<p>Use this short code to place additional content in the footer.</p>
	<p>Example <tt>[oeru_advanced_footer content="Our address"]</tt> - will add the content to the footer</p>
	<p><em>or</em></p>
	<p><tt>[oeru_advanced_footer]<br>
	Our address<br>
	[/oeru_advanced_footer]</tt></p>
	<h2>[oeru_extended_footer]</h2>
	<p>Use this short code to place a series of widgets in the footer.</p>
	<p>Example <tt>[oeru_extended_footer widget_1_title="hello" widget_1_content="text stuff" widget_2_title="hello" widget_2_content="text stuff" widget_4_title="hello" widget_4_content="text stuff" widget_3_title="hello" widget_3_content="text stuff"]</tt> - will add the content to the footer.</p>
	<p>Each title is a widget title, each content is the body of the widget.</p>
	<h2>[oeru_table]</h2>
	<p>Use this to add a table</p>
	<p>Example [oeru_table headings="this|that|there" level_1="maybe" level_2="perhaps" level_3="almost"]</p>
	<p>The headings value is the top row of the table, with each | separating a column heading</p>
	<p>Then each value in order from the first is a cell in the table</p>
	<h2>[oeru_analytics]</h2>
	<p>Allows specifying one or more web analytics tracking engines.</p>
	<p>Example <tt>[oeru_analytics type="piwik" url="//stats.oeru.org" id="999999"]</tt></p>
	<p>Attributes:</p>
	<dl>
	  <dt>type</dt><dd>one of <tt>piwik</tt>, <tt>google</tt></dd>
	  <dt>url</dt><dd>if type is piwik, this specifies the base URL of the piwik tracking engine, e.g. <tt>//stats.oeru.org</tt></dd>
	  <dt>id</dt><dd>the tracking id for this property</dd>
	</dl>
	<h2>[oeru_idevice]</h2>
	<p>Use this to add a pedagogical template</p>
	<p>Example [oeru_idevice type="Question" body="What is the best way to do this" id="anchor"]</p>
	<p><em>or</em></p>
	<p>[oeru_idevice type="Question" title="What do you think?" id="anchor"]<br>
	What is the best way to do this?</br>
	[/oeru_idevice]</p>
	<p><em>Because of a limitation in WordPress, the two types must not be mixed on a page.</em></p>
	<p>The type value sets the title on the page and the associated image. Body sets what appears below this.</p>
	<p>If you use title="This is my title" it overrides the displayed title for this iDevice.</p>
	<p>The <em>optional</em> <tt>id</tt> attribute allows setting an HTML id on the iDevice,
allowing it to be targetted as a named anchor.</p>
	<p>The types are as follows:</p>
	<div style="-webkit-column-width: 20em; -moz-column-width: 20em; column-width: 20em;">
	<ul style="margin-top: 0;">
		<li>Activity</li>
		<li>Activities</li>
		<li>Aim</li>
		<li>Aims</li>
		<li>Portfolio</li>
		<li>Extension exercise</li>
		<li>Assignment</li>
		<li>Question</li>
		<li>Questions</li>
		<li>Did you know</li>
		<li>Did you know?</li>
		<li>Did you notice</li>
		<li>Did you notice?</li>
		<li>Definition</li>
		<li>Definitions</li>
		<li>Discussion</li>
		<li>Tell us a story</li>
		<li>Case study</li>
		<li>Example</li>
		<li>Objective</li>
		<li>Objectives</li>
		<li>Outcomes</li>
		<li>Key point</li>
		<li>Key points</li>
		<li>Media required</li>
		<li>Media</li>
		<li>Reading</li>
		<li>Competency</li>
		<li>Competencies</li>
		<li>Summary</li>
		<li>Self assessment</li>
		<li>Assessment</li>
		<li>Reflection</li>
		<li>Preknowledge</li>
		<li>Web resources</li>
	</ul>
	</div>
	<h2>[oeru_fitb]</h2>
	<p>Use this to create a fill in the blank area</p>
	<p>Example [oeru_fitb answer="lima"] to create an area which will the learner will need to enter lima to have it accepted as an answer.</p>
	<h2>[oeru_true_false]</h2>
	<p>Use this to create a true or false question</p>
	<p>Example [oeru_true_false question="which way is up?" option_1_answer="up" option_1="true" option_1_text="Well done!" option_1_feedback="yes that is up" option_2_answer="down" option_2="false" option_2_text="Wrong!" option_2_feedback="No, up was the correct answer"] </p>
	<p>This will create two options, "up" and "down". Use option_1 to say whether it is true or false - option_2 for question 2. Option_1_text is the text after the tick or cross, and the feedback is what appears after that</p>
	<h2>[oeru_mcq]</h2>
	<p>Use this to create a multiple choice question. Only one answer can be correct.</p>
	<p>Example [oeru_mcq question="which is biggest?" option_1="The Sun" option_1_feedback_response="correct" option_1_feedback="Well done!" option_2="The Moon" option_2_feedback_response="incorrect" option_2_feedback="Wrong" option_3="The Earth" option_3_feedback_response="incorrect" option_3_feedback="Wrong"]   </p>
	<p>This will create three clickable options, with these being set by option_ and then a number. Each option has a _feedback_response to say it correct or incorrect, and then a _feedback for the text which is displayed on screen</p>
	<h2>[oeru_mtq]</h2>
	<p>Creates a quiz in which a series of answers need to be marked as correct to achieve success</p>
	<p>Example [oeru_mtq question="Which is what?" success=""ell done amazing work let's move on" failure="oh dear, why did you do that" question_1="is this true" question_1_status="correct" question_2="is this not true" question_2_status="incorrect" question_2="is this not true" question_2_status="incorrect" question_3="correct" question_3_status="correct" question_4="incorrect" question_4_status="incorrect" label="check your answers"] </p>
	<p>So question sets the question text. Success sets the positive feedback, failure the next feedback. Question_ and then a number creates a possible, with _status setting that question as correct or incorrect. Label is the text on the button.</p>
	<h2>[oeru_column]</h2>
	<p>Creates columns</p>
	<p>Example [oeru_column per_row="2" column1="hello" column2="goodbye" column3="amazing"]</p>
	<p>"Per row" is how many columns in a line across the page. The other variables are the content for each column.</p>
	<h2>[oeru_quotation]</h2>
	<p>Displays a quotation</p>
	<p>Example [oeru_quotation quote="What is google?" name="John Doe" link="http://www.google.com" number="1"]</p>
	<p>This will display the quote "What is google?", attributed to John Doe, with a clickable link to google, and a footnote of 1.</p>
	<?PHP
}

function oeru_theme_create_menu(){

	$menu_exists = wp_get_nav_menu_object("OERu Import Menu");

	if( ! $menu_exists ){

		$menu_id = wp_create_nav_menu("OERu Import Menu");	
		return $menu_id;
	
	}else{
		
		return false;
	
	}
	
}

function oeru_theme_menu_hierarchy($menu_id, $post_parent, $menu_parent){

	$the_query = new WP_Query( 'posts_per_page=9999&post_type=page&post_parent=' . $post_parent . "&orderby=ID&order=ASC" );
	
	if ( $the_query->have_posts() ) {
				
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
			$id = get_the_id();			
			$title = get_the_title();
			
			$last_page = wp_update_nav_menu_item($menu_id, 0, 
				array(
					'menu-item-title' => __($title),
					'menu-item-classes' => $title,
					'menu-item-object' => 'page',
					'menu-item-object-id' => $id,
					'menu-item-type' => 'post_type',
					'menu-item-status' => 'publish',
					'menu-item-parent-id' => $menu_parent,					
				)
			);
			
			oeru_theme_menu_hierarchy($menu_id, $id, $last_page);
			
		}
		
	}

}

function oeru_theme_menu(){

	if(isset($_POST['menu_create'])){
	
		if(wp_verify_nonce($_POST["oeru_theme_menu_create"], "oeru_theme_menu_create")){

			if($_POST['delete_menu']=="on"){
			
				$menu_id = oeru_theme_create_menu();
				if($menu_id == false){
					wp_delete_nav_menu("OERu Import Menu");
					$menu_id = oeru_theme_create_menu();
				}
				oeru_theme_menu_hierarchy($menu_id, 0, 0);
				$locations = get_theme_mod('nav_menu_locations');
				$locations['primary'] = $menu_id;
				set_theme_mod('nav_menu_locations', $locations);
				?><h2>Menu Creation</h2>
				<p>Menu Created</p>
				<p>Menu can be changed on the <a href='nav-menus.php'>Menu Admin</a> page</p><?PHP
			
			}else{
		
				?><h2>Menu Creation</h2><?PHP
			
				$menu_id = oeru_theme_create_menu();
				
				if($menu_id!=false){
					?><p>Menu being created....</p><?PHP
					oeru_theme_menu_hierarchy($menu_id, 0, 0);	
					?><p>Menu Created</p>
					<h2>Make this the primary menu</h2>
					<p>Although this menu has been created it isn't yet the main menu for the site.</p>
					<form action="" method="POST">
						<?PHP
							 wp_nonce_field( "oeru_theme_menu_primary", "oeru_theme_menu_primary" );
						?>
						<input type="hidden" name="menu_primary" value="go" />
						<input type="hidden" name="menu_id" value="<?PHP echo $menu_id; ?>" />
						<input type="submit" value="Set as Main Menu" />
					</form>
					<p>Menu can be changed on the <a href='nav-menus.php'>Menu Admin</a> page</p>
					<?PHP
				}else{
					?><p>Error - Menu already exists. Please delete "OERu Import Menu" on the <a href='nav-menus.php'>Menu Admin</a> page</p><?PHP
				}
				
			}
		
		}else{
		
			?><p>Sorry, the nonce did not verify, please refresh the page</p><?PHP

		}
	
	}else if(isset($_POST['menu_primary'])){
	
		if(wp_verify_nonce($_POST["oeru_theme_menu_primary"], "oeru_theme_menu_primary")){
		
			$locations = get_theme_mod('nav_menu_locations');
			$locations['primary'] = $_POST['menu_id'];
			set_theme_mod('nav_menu_locations', $locations);
		
			?>
			<h2>Menu Creation</h2>
			<p>Menu now set as primary</p>
			<p>Menu can be changed on the <a href='nav-menus.php'>Menu Admin</a> page</p>
			<?PHP
		
		}else{
		
			?><p>Sorry, the nonce did not verify, please refresh the page</p><?PHP

		}
	
	
	}else{
		?><h2>Menu Creation</h2>
		<p>If you have ran the script to create the menu, then use this page to create the site menu</p>
		<p>The menu at present will look as such. </p>
		<p>You can delete pages or alter their parents (where it sits in the menu by editing a page) by clicking on the post name to edit it</p>
		<p>If you edit a page, this display won't refresh until you do so, but the menu created will reflect your changes.</p>
		<div class="half-width"><?PHP oeru_theme_get_pages_no_parent(0); ?></div>
		<div class="half-width">
			<form action="" method="POST">
				<?PHP
					 wp_nonce_field( "oeru_theme_menu_create", "oeru_theme_menu_create" );
				?>
				<p>
					<input type="checkbox" name="delete_menu" checked> Create menu and set as site menu (will delete existing OER menu)
				</p>
				<input type="hidden" name="menu_create" value="go" />
				<input type="submit" value="Create Menu" />
			</form>
		</div><?PHP
	}
}

function oeru_theme_get_pages_no_parent($post_parent){
	
	$the_query = new WP_Query( 'posts_per_page=9999&post_type=page&post_parent=' . $post_parent . "&orderby=ID&order=ASC" );
				
	if ( $the_query->have_posts() ) {
				
		echo "<ul>";
		
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
			$id = get_the_id();
			$title = get_the_title();
			echo "<li><a target='_blank' href='post.php?post=" . $id . "&action=edit'>" . $title . "</a>";
			oeru_theme_get_pages_no_parent($id);
			echo "</li>";
		}
		
		echo "</ul>";
		
	}
	
}

function oeru_theme_menu_create( $args ) {
	// require the user to be logged in
	global $wp_xmlrpc_server;
	$wp_xmlrpc_server->escape( $args );
	$blog_id = $args[0];
	$user = $args[1];
	$pass = $args[2];
	if ( ! $user = $wp_xmlrpc_server->login( $user, $pass ) ) {
		return $wp_xmlrpc_server->error;
	}

	// create the menu and install it
	$menu_id = oeru_theme_create_menu();
	if ( $menu_id == false ) {
		wp_delete_nav_menu( "OERu Import Menu" );
		$menu_id = oeru_theme_create_menu();
	}
	oeru_theme_menu_hierarchy($menu_id, 0, 0);
	$locations = get_theme_mod( 'nav_menu_locations' );
	$locations['primary'] = $menu_id;
	set_theme_mod( 'nav_menu_locations', $locations );
	return 0;
}

function oeru_theme_xmlrpc_methods( $methods ) {
	$methods['oeru_theme.menu_create'] = 'oeru_theme_menu_create';
	return $methods;
}

add_filter( 'xmlrpc_methods', 'oeru_theme_xmlrpc_methods' );

