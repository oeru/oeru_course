<?php

function oeru_theme_colour_page(){
	add_submenu_page('oeru-theme-admin', 'Colour Scheme', 'Colour Scheme', 'manage_options', 'oeru-theme-colour', 'oeru_theme_colour');
}
add_action('admin_menu', 'oeru_theme_colour_page');

function oeru_theme_colour_menu($colours, $header=null) {
	echo "<h2>Colour Scheme</h2>";
	if ($header) {
		echo "<h3>$header</h3>";
	}
	echo <<<EOL
<form action="" method="POST">
<p>You can select a colour scheme here as a starting point, and then use the customiser to tweak it.</p>
EOL;
	foreach ($colours as $colour => $v) {
		echo <<<EOL
<input type="radio" name="colour" value="$colour">$colour<br>
EOL;
	}
	wp_nonce_field( "oeru_theme_colour", "oeru_theme_colour" );
	echo <<<EOL
		<br>
		<input type="submit" value="Change Colours" class="button button-primary" />
	</form>
	</div>
EOL;
}

$oeru_colours = array(
	'black/yellow' => array(
			'site_allsite_background_colour' => '#ffffff',
			'site_alllink_colour' => '#005a96',
			'site_alllink_hover_colour' =>  '#005a96',
			'site_content_background_colour' => '#fefefe',
			'site_footer_colour' => '#868a8d',
			'site_footer_background_colour' => '#42484D',
			'site_menu_background_colour' => '#1e1e1e',
			'site_menu_background_hover_colour' => '#1e1e1e',
			'site_menu_dropdown_background_colour' => '#efe9e5',
			'site_menu_dropdown_background_hover_colour' => '#aca095',
			'site_top_background_colour' => '#ffffff',
			'site_menu_background_current_colour' => '#76848f',
			'site_menu_text_colour' => '#ffffff',
			'site_menu_text_hover_colour' => '#ffd100',
			'site_menu_dropdown_text_colour' => '#000000',
			'site_menu_dropdown_text_hover_colour' => '#494949',
			'site_header_colour' => '#1e1e1e',
			'site_header_text_colour' => '#ffffff',
			'site_idevice_colour' => '#1e1e1e',
			'site_idevice_background_colour' => '#ffd100',
			'site_button_colour' => '#ffd100',
			'site_button_text_colour' => '#000000',
			'site_pager_colour' => '#000000',
			'site_pager_text_colour' => '#ffffff',
			'site_pagenav_colour' => '#efe9e5',
			'site_pagenav_current_colour' => '#faa61a',
			'site_pagenav_bottom' => '#ffffff',
		),
	'blue' => array(
			'site_allsite_background_colour' => '#efefef',
			'site_alllink_colour' => '#180084',
			'site_content_background_colour' => '#fefefe',
			'site_alllink_hover_colour' =>  '#544a84',
			'site_footer_colour' => '#868A8D',
			'site_footer_background_colour' => '#42484D',
			'site_menu_background_colour' => '#003882',
			'site_menu_background_hover_colour' => '#002566',
			'site_menu_background_current_colour' => '#0b0060',
			'site_menu_dropdown_background_colour' => '#002566',
			'site_menu_dropdown_background_hover_colour' => '#001944',
			'site_top_background_colour' => '#ffffff',
			'site_menu_text_colour' => '#c2cddd',
			'site_menu_text_hover_colour' => '#ffffff',
			'site_menu_dropdown_text_colour' => '#c2cddd',
			'site_menu_dropdown_text_hover_colour' => '#ffffff',
			'site_header_colour' => '#004d92',
			'site_header_text_colour' => '#ffffff',
			'site_idevice_colour' => '#ffffff',
			'site_idevice_background_colour' => '#004d92',
			'site_button_colour' => '#004d92',
			'site_button_text_colour' => '#ffffff',
			'site_pager_colour' => '#ffffff',
			'site_pager_text_colour' => '#004d92',
			'site_pagenav_colour' => '#D0E9FF',
			'site_pagenav_current_colour' => '#98D6F6',
			'site_pagenav_bottom' => '#dddddd',
		),
	'green' => array(
			'site_allsite_background_colour' => '#efefef',
			'site_alllink_colour' => '#6fa92e',
			'site_alllink_hover_colour' =>  '#89a866',
			'site_content_background_colour' => '#fefefe',
			'site_footer_colour' => '#868A8D',
			'site_footer_background_colour' => '#42484D',
			'site_menu_background_colour' => '#649d23',
			'site_menu_background_hover_colour' => '#5a9319',
			'site_menu_dropdown_background_colour' => '#5a9319',
			'site_menu_dropdown_background_hover_colour' => '#0f8200',
			'site_top_background_colour' => '#ffffff',
			'site_menu_background_current_colour' => '#77bc27',
			'site_menu_text_colour' => '#dddddd',
			'site_menu_text_hover_colour' => '#ffffff',
			'site_menu_dropdown_text_colour' => '#dddddd',
			'site_menu_dropdown_text_hover_colour' => '#ffffff',
			'site_header_colour' => '#6fa92e',
			'site_header_text_colour' => '#ffffff',
			'site_idevice_colour' => '#ffffff',
			'site_idevice_background_colour' => '#6fa92e',
			'site_button_colour' => '#649d23',
			'site_button_text_colour' => '#ffffff',
			'site_pager_colour' => '#ffffff',
			'site_pager_text_colour' => '#649d23',
			'site_pagenav_colour' => '#b6f26d',
			'site_pagenav_current_colour' => '#8bd62f',
			'site_pagenav_bottom' => '#dddddd',
		),
	'red' => array(
			'site_allsite_background_colour' => '#efefef',
			'site_alllink_colour' => '#0900b5',
			'site_alllink_hover_colour' =>  '#fcc572',
			'site_content_background_colour' => '#fefefe',
			'site_footer_colour' => '#868a8d',
			'site_footer_background_colour' => '#42484D',
			'site_menu_background_colour' => '#662620',
			'site_menu_background_hover_colour' => '#662620',
			'site_menu_dropdown_background_colour' => '#662620',
			'site_menu_dropdown_background_hover_colour' => '#662620',
			'site_top_background_colour' => '#ffffff',
			'site_menu_background_current_colour' => '#662620',
			'site_menu_text_colour' => '#ffffff',
			'site_menu_text_hover_colour' => '#ffffff',
			'site_menu_dropdown_text_colour' => '#ffffff',
			'site_menu_dropdown_text_hover_colour' => '#ffffff',
			'site_header_colour' => '#662620',
			'site_header_text_colour' => '#ffffff',
			'site_idevice_colour' => '#000000',
			'site_idevice_background_colour' => '#fcc572',
			'site_button_colour' => '#fcc572',
			'site_button_text_colour' => '#ffffff',
			'site_pager_colour' => '#ffffff',
			'site_pager_text_colour' => '#fcc572',
			'site_pagenav_colour' => '#ffffff',
			'site_pagenav_current_colour' => '#fcc572',
			'site_pagenav_bottom' => '#dddddd',
		),
);

function oeru_theme_set_colours( $colour_name ) {
	global $oeru_colours;

	foreach ($oeru_colours[$colour_name] as $k => $v) {
		set_theme_mod($k, $v);
	}
}

function oeru_theme_colour(){
	global $oeru_colours;

	if(isset($_POST['colour'])){
		if(wp_verify_nonce($_POST["oeru_theme_colour"], "oeru_theme_colour")){
			if (isset($oeru_colours[$_POST['colour']])) {
				$c = $_POST['colour'];
				oeru_theme_set_colours( $c );
				oeru_theme_colour_menu($oeru_colours,
							"Colours changed: $c");
			} else {
				oeru_theme_colour_menu($oeru_colours, 'Unrecognized colour');
			}
		}else{
			echo "<p>Sorry, the nonce did not verify, please refresh the page</p>";
		}
	}else{
		oeru_theme_colour_menu($oeru_colours);
	}
}
