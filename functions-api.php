<?php

function oeru_theme_defaults() {
	global $wp_rewrite;

	$wp_rewrite->set_permalink_structure( '/%postname%/' );
	$wp_rewrite->flush_rules();
}
add_action( 'after_switch_theme', 'oeru_theme_defaults' );
add_action( 'wp_install', 'oeru_theme_defaults' );

function oeru_theme_menu_default() {

	if(!get_option("oeru_theme_menu_create")){
	
		require_once("inc/theme_guidance.php");
		$menu_id = oeru_theme_create_menu();
		if($menu_id == false){
			wp_delete_nav_menu("OERu Import Menu");
			$menu_id = oeru_theme_create_menu();
		}
		oeru_theme_menu_hierarchy($menu_id, 0, 0);
		$locations = get_theme_mod('nav_menu_locations');
		$locations['primary'] = $menu_id;
		set_theme_mod('nav_menu_locations', $locations);
		add_option("oeru_theme_menu_create", "true");
		
	}

}
add_action( 'admin_head', 'oeru_theme_menu_default' );

function oeru_theme_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Widget Area', 'oeru_theme' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'oeru_theme' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	unregister_sidebar( 'sidebar-1' );
}
add_action( 'widgets_init', 'oeru_theme_widgets_init' );

function oeru_theme_setup() {

	if(!get_option("oeru_course_colour_profile_setup")){
	
		require_once("inc/install_profile.php");
		add_option("oeru_course_colour_profile_setup", "true");
		
	}

	load_theme_textdomain( 'oeru_theme', get_template_directory() . '/languages' );

	add_theme_support( 'post-thumbnails' );
	
	$chargs = array(
		'width' => 980,
		'height' => 150,
		'uploads' => true,
	);
	
	add_theme_support( 'custom-header', $chargs );
	
	set_post_thumbnail_size( 672, 372, true );

	register_nav_menus( array(
		'primary'   => __( 'Top primary menu', 'oeru_theme' ),
	) );

	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );
	
}
add_action( 'after_setup_theme', 'oeru_theme_setup' );

function oeru_theme_add_category(){
	$catarr = array(
		'cat_name' => "Front Page Featured",
		'category_description' => "Items to feature on the front page",
		'category_nicename' => "front-page",
		'taxonomy' => 'category' 
	);
	wp_insert_term("Front Page", "category", $catarr);
}
add_action( 'after_setup_theme', 'oeru_theme_add_category' );

function oeru_theme_scripts_and_styles() {
	
	wp_enqueue_style( 'wordpress-oeru-theme-bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array(), '1' );
	wp_enqueue_style( 'wordpress-oeru-theme-font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '1' );
	wp_enqueue_style( 'wordpress-oeru-theme-layout', get_template_directory_uri() . '/css/layout.css', array(), '1' );
	wp_enqueue_style( 'wordpress-oeru-theme-typography', get_template_directory_uri() . '/css/typography.css', array(), '1' );
	wp_enqueue_style( 'wordpress-oeru-theme-colours', get_template_directory_uri() . '/css/colours.css', array(), '1' );
	wp_enqueue_style( 'wordpress-oeru-theme-core-alter', get_template_directory_uri() . '/css/oeru_theme_core_alter.css', array(), '1' );
	wp_enqueue_style( 'wordpress-oeru-theme-jquery-ui', get_template_directory_uri() . '/css/jquery-ui.min.css', array(), '1' );
	wp_enqueue_style( 'wordpress-oeru-theme-open-sans-font', '//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,800,700,600&subset=latin,greek-ext,greek,cyrillic,latin-ext,vietnamese,cyrillic-ext', array(), '1' );
	
	wp_enqueue_script( 'wordpress-oeru_theme-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '20131205', true );
	if ( get_theme_mod( 'swipe' ) === 'on' ) {
		wp_enqueue_script( 'wordpress-oeru_theme-swipe', get_template_directory_uri() . '/js/jquery.touchSwipe.min.js', array('jquery'), '20131205', true );
	}
	wp_enqueue_script( 'wordpress-oeru_theme-scroll', get_template_directory_uri() . '/js/wikieducatorjs/scroll.js', array('jquery'), '20131205', true );
	if(get_theme_mod("menu_depth")!="two"){
		wp_enqueue_script( 'wordpress-oeru_theme-menu-fix', get_template_directory_uri() . '/js/wikieducatorjs/menu-fix.js', array('jquery'), '20131205', true );
	}
	wp_enqueue_script( 'wordpress-oeru_theme-feedback', get_template_directory_uri() . '/js/wikieducatorjs/oeru_feedback.js', array('jquery'), '20131205', true );
	wp_enqueue_script( 'wordpress-oeru_theme-details-fix', get_template_directory_uri() . '/js/wikieducatorjs/oeru_details_fix.js', array('jquery'), '20131205', true );
	wp_enqueue_script( 'jquery-ui-accordion');
	wp_enqueue_script( 'wordpress-oeru_theme-accordion', get_template_directory_uri() . '/js/wikieducatorjs/oeru_accordion.js', array('jquery-ui-accordion'), '20131205', true );
	wp_enqueue_script( 'wordpress-oeru_theme-mcq', get_template_directory_uri() . '/js/wikieducatorjs/oeru_mcq.js', array('jquery'), '20131205', true );
	wp_enqueue_script( 'wordpress-oeru_theme-mtq', get_template_directory_uri() . '/js/wikieducatorjs/oeru_mtq.js', array('jquery'), '20131205', true );
	wp_enqueue_script( 'wordpress-oeru_theme-fitb_shortcode', get_template_directory_uri() . '/js/wikieducatorjs/oeru_fitb.js', array('jquery'), '20131205', true );
	wp_localize_script( 'wordpress-oeru_theme-fitb_shortcode', 'wordpress_oeru_theme_fitb_shortcode', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ), 'answerNonce' => wp_create_nonce( 'oeru_fitb_check' ) ) );

	if (get_theme_mod('log_on_page') == 'on') {
		wp_enqueue_script( 'wordpress-oeru_user', get_template_directory_uri() . '/js/wikieducatorjs/oeru_user.js', array('jquery'), '20160305', true );
		wp_localize_script( 'wordpress-oeru_user', 'oeru_user_object', array(
			'ajaxurl' => admin_url('admin-ajax.php')
		));
	}
}
add_action( 'wp_enqueue_scripts', 'oeru_theme_scripts_and_styles' );

function oeru_admin_theme_scripts_and_styles() {
	wp_enqueue_style( 'wordpress-oeru-theme-admin', get_template_directory_uri() . '/css/oeru_theme_admin.css', array(), '1' );
}

add_action( 'admin_enqueue_scripts', 'oeru_admin_theme_scripts_and_styles' );

// add XMLRPC options
add_filter( 'xmlrpc_blog_options', function( $xmlrpc_options ) {
	if (is_array($xmlrpc_options)) {
		$xmlrpc_options['show_on_front'] = array(
			'desc'	    => __( 'Show on front' ),
			'readonly'  => false,
			'option'    => 'show_on_front'
		);
		$xmlrpc_options['page_on_front'] = array(
			'desc'	    => __( 'Page to show on front page' ),
			'readonly'  => false,
			'option'    => 'page_on_front'
		);
		$xmlrpc_options['oeru_theme_menu_create'] = array(
			'desc'	    => __( 'Create the OERu top menu' ),
			'readonly'  => false,
			'option'    => 'oeru_theme_menu_create'
		);
		$xmlrpc_options['oeru_theme_scan_page_html'] = array(
			'desc'	    => __( 'HTML for the scan page' ),
			'readonly'  => false,
			'option'    => 'oeru_theme_scan_page_html'
		);
		$xmlrpc_options['oeru_theme_scan_page'] = array(
			'desc'	    => __( 'Turn the Scan Page on' ),
			'readonly'  => false,
			'option'    => 'oeru_theme_scan_page'
		);
		$xmlrpc_options['oeru_theme_footer'] = array(
			'desc'	    => __( 'Footer content' ),
			'readonly'  => false,
			'option'    => 'oeru_theme_footer'
		);
	}
	return $xmlrpc_options;
});

// allow IFRAME in network WordPress
// FIXME this really isn't a theme-specific issue,
//       this should probably be a separate plugin for any network install
function oeru_theme_allow_iframe( $allowedposttags ) {
	if ( !current_user_can( 'publish_posts' ) ) {
		return $allowedposttags;
	}

	$allowedposttags['iframe'] = array(
		'align' => true,
		'width' => true,
		'height' => true,
		'frameborder' => true,
		'name' => true,
		'src' => true,
		'id' => true,
		'class' => true,
		'style' => true,
		'scrolling' => true,
		'marginwidth' => true,
		'marginheight' => true,
		'allowfullscreen' => true,
	);
	return $allowedposttags;
}
add_filter( 'wp_kses_allowed_html', 'oeru_theme_allow_iframe' );

/* AJAX login/update API
 * called with 'bdo' set to 'login', 'register', or 'update'
 */
add_action('wp_ajax_oerulogin', 'oeru_login');
add_action('wp_ajax_nopriv_oerulogin', 'oeru_login');
function oeru_login_response($a) {
	echo json_encode($a);
	die();
}

function oeru_login() {
	check_ajax_referer('oeru_user_nonce', 'security');
	
	$blogid = get_current_blog_id();
	$bdo = (isset($_POST['do'])) ? $_POST['do'] : '';
	switch ($bdo) {
		case 'login':
			$uin = array(
				'user_login' => $_POST['username'],
				'user_password' => $_POST['password'],
				'remember' => true
			);
			$ouser = wp_signon($uin, false);
			if (is_wp_error($ouser)) {
				oeru_login_response(array(
					'loggedin' => false,
					'result' => $ouser->get_error_message()
				));
			} else {
				oeru_login_response(array(
					'loggedin' => true,
					'result' => 'Logged in, redirecting...'
				));
			}
			break;
		case 'register':
			$password = trim($_POST['password']);
			$cpw = trim($_POST['confirmpassword']);
			$username = trim($_POST['username']);
			$email = trim($_POST['useremail']);
			$display_name = sanitize_text_field($_POST['name']);
			$meta = array(
				"url_$blogid" => sanitize_text_field($_POST['courseblog'])
			);
			if (strlen($password) == 0 || strlen($cpw) == 0 || strlen($username) == 0 || strlen($email) == 0) {
				oeru_login_response(array(
					'registered' => false,
					'result' => 'Username, password(s), and email are required.'
				));
			}
			if (strlen($password) < 2) {
				oeru_login_response(array(
					'registered' => false,
					'result' => 'Password must be at least 6 characters.'
				));
			}
			if ($password != $cpw) {
				oeru_login_response(array(
					'registered' => false,
					'result' => 'Passwords do not match.'
				));
			}
			$pw = trim($_POST['password']);
			$r = wpmu_validate_user_signup($username, $email);
			$username = $r['user_name'];	// sanitized username
			if (sizeof($r['errors']->errors) > 0) {
				oeru_login_response(array(
					'registered' => false,
					'result' => 'validate: ' . $r['errors']->get_error_message()
				));
			}
			$user_id = wpmu_create_user($username, $password, $email);
			if ($user_id === false) {
				oeru_login_response(array(
					'registered' => false,
					'result' => "Unable to create user: $username"
				));
			}
			$r = add_user_to_blog(get_current_blog_id(), $user_id, 'subscriber');
			if (is_wp_error($r)) {
				oeru_login_response(array(
					'registered' => false,
					'result' => 'addtoblog: ' . $r->get_error_message()
				));
			}
			$credentials = array(
				'user_login' => $username,
				'user_password' => $password,
				'remember' => true
			);
			$user = wp_signon($credentials, false);
			if (is_wp_error($user)) {
				oeru_login_response(array(
					'registered' => false,
					'result' => 'signon: ' . $user->get_error_message()
				));
			}
			wp_set_current_user($user_id);
			wp_set_auth_cookie($user_id);
			wp_update_user(array(
				'ID' => $user_id,
				'display_name' => $display_name
			));
			foreach($meta as $k => $v) {
				update_user_meta($user_id, $k, $v);
			}
			oeru_login_response(array(
				'registered' => true,
				'result' => 'Registered, redirecting...'
			));
			break;
		case 'update':
			$current_user = wp_get_current_user();
			if ($current_user->ID == 0) {
				oeru_login_response(array(
					'updated' => false,
					'result' => 'Not logged in.'
				));
			}
			$user_id = $current_user->ID;
			$email = trim($_POST['useremail']);
			$display_name = sanitize_text_field($_POST['name']);
			$user_id = wp_update_user(array(
				'ID' => $user_id,
				'email' => $email,
				'display_name' => $display_name
			));
			if (is_wp_error($user_id)) {
				oeru_login_response(array(
					'updated' => false,
					'result' => 'Error updating name and email. Please try later.'
				));
			}
			update_user_meta($user_id, "url_$blogid", sanitize_text_field($_POST['courseblog']));
			oeru_login_response(array(
				'updated' => true,
				'result' => 'Updated.'
			));
			break;
		default:
			oeru_login_response(array(
				'error' => 'Ill-formed login request:  ' . htmlspecialchars($bdo)
			));
	}
	die();
}

/*
function register_user_custom_field() {
	register_api_field( 'user',
		'url',
		array (
			'get_callback' => 'get_url_field',
			'update_callback' => null,
			'schema' => null,
		)
	);
}

function get_url_field( $object, $field_name, $request ) {
}

do_action( 'rest_api_init', 'register_user_custom_field' );
 */

function add_user_blog_column( $columns ) {
	$columns['xname'] = 'Name';	// user display_name (not first, last)
    $columns['blog'] = 'Blog';

    unset( $columns['name'] );
    unset( $columns['role'] );
    unset( $columns['posts'] );
    return $columns;
} 
add_filter( 'manage_users_columns', 'add_user_blog_column' );

function add_blog_column_data( $v = '', $column_name, $user_id ) {
	switch ($column_name) {
		case 'xname':
			$user_info = get_userdata( $user_id );
			return $user_info->display_name;
		case 'blog':
			$k = 'url_' . get_current_blog_id();
			return get_user_meta( $user_id, $k, true );
	}
}
add_filter( 'manage_users_custom_column', 'add_blog_column_data', 10, 3 );

if (!current_user_can('edit_posts')) {
	show_admin_bar(false);
}

// Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';

// Add Customizer functionality.
require get_template_directory() . '/inc/customizer.php';

// Add shortcodes.
require get_template_directory() . '/inc/shortcode.php';

// Add image attribution.
require get_template_directory() . '/inc/image_attribution.php';

// Add theme guidance.
require get_template_directory() . '/inc/theme_guidance.php';

//Add basic menu
require_once("inc/Walker_OERU_Menu.php");

//Add reduced menu
require_once("inc/Walker_OERU_Menu_Depth.php");

//Add scan page menu
require_once("inc/scanpage_settings.php");

//Add colour choice options
require_once("inc/colour_scheme.php");

//Add icon set selection
require_once("inc/icon_set.php");

//Add analytics configuration
require_once("inc/analytics.php");

