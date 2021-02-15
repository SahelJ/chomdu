<?php
/**
 * chomdu functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package chomdu
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'chomdu_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function chomdu_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on chomdu, use a find and replace
		 * to change 'chomdu' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'chomdu', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'chomdu' ),
			)
		);

	}
endif;
add_action( 'after_setup_theme', 'chomdu_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function chomdu_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'chomdu_content_width', 640 );
}
add_action( 'after_setup_theme', 'chomdu_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function chomdu_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'chomdu' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'chomdu' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'chomdu_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function chomdu_scripts() {
	wp_enqueue_style( 'chomdu-style', get_stylesheet_uri(), array(), _S_VERSION );

	wp_deregister_script('jquery');

    wp_enqueue_script( 'mainjs', get_template_directory_uri() . '/asset/js/main.js', array() ,'1.0.0', true );
	wp_enqueue_script( 'mainjs', get_template_directory_uri() . '/asset/js/scroll-out.js', array() ,'1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'chomdu_scripts' );