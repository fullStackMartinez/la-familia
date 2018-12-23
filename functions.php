<?php
/**
 * La Familia functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package La_Familia
 */

if ( ! function_exists( 'la_familia_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function la_familia_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on La Familia, use a find and replace
		 * to change 'la-familia' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'la-familia', get_template_directory() . '/languages' );

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
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'la-familia' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'la_familia_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'la_familia_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function la_familia_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'la_familia_content_width', 640 );
}
add_action( 'after_setup_theme', 'la_familia_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function la_familia_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'la-familia' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'la-familia' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'la_familia_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function la_familia_scripts() {
	wp_enqueue_style( 'la-familia-style', get_stylesheet_uri() );
	wp_enqueue_style( 'la-famlia-stylesheet', get_template_directory_uri() . '/css/home-slider.css' );
	wp_enqueue_style( 'la-familia-stylesheet', get_template_directory_uri() . '/css/main.css' );
	wp_enqueue_style( 'la-familia-css', get_template_directory_uri() . '/styles/style_lafamilia.css' );

	wp_enqueue_script( 'la-familia-home-slideshow', get_template_directory_uri() . '/js/home-slideshow.js', array(), '20151215', true );

	wp_enqueue_script( 'la-familia-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'la-familia-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script('jquery-slider', '//code.jquery.com/jquery-2.2.4.min.js');
	wp_enqueue_script('sponsor-slider', get_stylesheet_directory_uri() . '/js/sponsor-slider.js', array('jquery-slider'));




	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );

}
add_action( 'wp_enqueue_scripts', 'la_familia_scripts' );

add_image_size( 'article', 260, 168, true);




/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function add_taxonomies_to_pages() {
	register_taxonomy_for_object_type( 'post_tag', 'page' );
	register_taxonomy_for_object_type( 'category', 'page' );
}
add_action( 'init', 'add_taxonomies_to_pages' );

function my_acf_init() {

	acf_update_setting('google_api_key', 'AIzaSyDEXGioqp6BFCyLI9NH755iNc5zp2MBmI4');
}

add_action('acf/init', 'my_acf_init');

function register_my_menu() {
	register_nav_menu('additional-menu',__( 'Additional Menu' ));
}
add_action( 'init', 'register_my_menu' );

add_action('acf/init', 'my_acf_init');

function register_footer_menu() {
	register_nav_menu('footer-menu-1',__( 'Footer Menu 1' ));
}
add_action( 'init', 'register_footer_menu' );

add_action('acf/init', 'my_acf_init');

function register_footer_menu_2() {
	register_nav_menu('footer-menu-2',__( 'Footer Menu 2' ));
}
add_action( 'init', 'register_footer_menu_2' );

add_action('acf/init', 'my_acf_init');

function register_footer_menu_3() {
	register_nav_menu('footer-menu-3',__( 'Footer Menu 3' ));
}
add_action( 'init', 'register_footer_menu_3' );
add_action('acf/init', 'my_acf_init');

