<?php

/**
 * chomdu functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package chomdu
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

if (!function_exists('chomdu_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function chomdu_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on chomdu, use a find and replace
		 * to change 'chomdu' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('chomdu', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__('Primary', 'chomdu'),
			)
		);
	}
endif;
add_action('after_setup_theme', 'chomdu_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function chomdu_content_width()
{
	$GLOBALS['content_width'] = apply_filters('chomdu_content_width', 640);
}
add_action('after_setup_theme', 'chomdu_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function chomdu_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'chomdu'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'chomdu'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'chomdu_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function chomdu_scripts()
{
	wp_enqueue_style('chomdu-style', get_stylesheet_uri(), array(), _S_VERSION);

	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), null, true);


	wp_enqueue_script('main', get_template_directory_uri() . '/asset/js/main.js', array(), '1.0.0', true);
	wp_enqueue_script('scroll-out', get_template_directory_uri() . '/asset/js/scroll-out.js', array(), '1.0.0', true);

	wp_enqueue_script('rsclean-request-script', get_stylesheet_directory_uri() . '/asset/js/main.js', array('jquery'));
	wp_localize_script('rsclean-request-script', 'theme_ajax', array(
		'url'        => admin_url('admin-ajax.php'),
		'site_url'     => get_bloginfo('url'),
		'theme_url' => get_bloginfo('template_directory')
	));
}
add_action('wp_enqueue_scripts', 'chomdu_scripts');


add_action('wp_ajax_nopriv_user_login', 'rs_user_login_callback');
add_action('wp_ajax_user_login', 'rs_user_login_callback');
/*
 *	@desc	Process theme login
 */
function rs_user_login_callback()
{
	global $wpdb;

	$json = array();

	$error = '';
	$success = '';
	$nonce = $_POST['nonce'];

	if (!wp_verify_nonce($nonce, 'rs_user_login_action'))
		die('<p class="error">Security checked!, Cheatn huh?</p>');

	//We shall SQL escape all inputs to avoid sql injection.
	$username = $wpdb->escape($_POST['log']);
	$password = $wpdb->escape($_POST['pwd']);
	$remember = $wpdb->escape($_POST['remember']);
	$redirection_url = $wpdb->escape($_POST['redirection_url']);

	if (empty($username)) {
		$json[] = 'Username field is required.';
	} else if (empty($password)) {
		$json[] = 'Password field is required.';
	} else {

		$user_data = array();
		$user_data['user_login'] = $username;
		$user_data['user_password'] = $password;
		$user_data['remember'] = $remember;
		$user = wp_signon($user_data, false);

		if (is_wp_error($user)) {
			$json[] = $user->get_error_message();
		} else {
			wp_set_current_user($user->ID, $username);
			do_action('set_current_user');

			$json['success'] = 1;
			$json['redirection_url'] = $redirection_url;
			echo $json['redirection_url'];
		}
	}


	echo json_encode($json);

	// return proper result
	die();
}


add_action('wp_ajax_nopriv_user_registration', 'rs_user_registration_callback');
add_action('wp_ajax_user_registration', 'rs_user_registration_callback');

/*
 *	@desc	Register user
 */
function rs_user_registration_callback()
{
	global $wpdb;

	$error = '';
	$success = '';
	$nonce = $_POST['nonce'];
	$check = $_POST['role'];
	print_r($_POST);
	if ($check == 'recruteur') {
		$check = 'recruteur';
	} else if ($check == 'subscriber'){
		$check = 'subscriber';
	}

	if (!wp_verify_nonce($nonce, 'rs_user_registration_action'))
		die('<p class="error">Security checked!, Cheatn huh?</p>');

	$log = $_POST['log'];
	$pwd = $_POST['pwd'];
	$email = $_POST['email'];

	if (empty($log)) {
		$error = 'Username field is required.';
	} else if (empty($pwd)) {
		$error = 'Password field is required.';
	}else if (empty($email)) {
		$error = 'Email field is required.';
	}else {
		$user_params = array(
			'user_login' 	=> apply_filters('pre_user_user_login', $log),
			'user_pass' 	=> apply_filters('pre_user_user_pass', $pwd),
			'user_email'    => apply_filters('pre_user_user_email', $email),
			'role' 			=> $check,
		);
		$user_id = wp_insert_user($user_params);

		if (is_wp_error($user_id)) {
			$error = $user_id->get_error_message();
		} else {
			do_action('user_register', $user_id);

			$success = 1;
		}
	}

	if (!empty($error))
		echo '<p class="error">' . $error . '</p>';

	if (!empty($success))
		echo $success;

	// return proper result
	die();
}
add_role('recruteur', 'recruteur', array(
	'read'            => false
));
