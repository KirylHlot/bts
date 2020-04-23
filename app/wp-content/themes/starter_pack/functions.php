<?php
/**
 * starter_pack functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package starter_pack
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'starter_pack_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function starter_pack_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on starter_pack, use a find and replace
		 * to change 'starter_pack' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'starter_pack', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', 'starter_pack' ),
				'menu-2' => esc_html__( 'Secondary', 'starter_pack' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'starter_pack_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'starter_pack_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function starter_pack_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'starter_pack_content_width', 640 );
}
add_action( 'after_setup_theme', 'starter_pack_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function starter_pack_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'starter_pack' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'starter_pack' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'starter_pack_widgets_init' );


if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' => 'Данные сайта',
		'menu_title' => 'Общие поля сайта',
		'menu_slug' => 'site-settings',
		'capability' => 'edit_posts',
		'redirect' => false
	));

}



function starter_pack_scripts() {

	if(!is_admin()){
		wp_deregister_script('jquery');
	};

	wp_enqueue_style( 'starter_pack-style', get_stylesheet_uri() );
	//custom styles
	wp_enqueue_style( 'custom_style', get_template_directory_uri()  . '/assets/css/styles.min.css', false, '1.1.1' );
	wp_enqueue_script( 'custom_js', get_template_directory_uri() . '/assets/js/scripts.min.js', array(), '1.1.1', true );

}
add_action( 'wp_enqueue_scripts', 'starter_pack_scripts' );



/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


remove_action( 'wp_head', 'feed_links_extra', 3 ); // Display the links to the extra feeds such as category feeds
remove_action( 'wp_head', 'feed_links', 2 ); // Display the links to the general feeds: Post and Comment Feed
remove_action( 'wp_head', 'rsd_link' ); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action( 'wp_head', 'wlwmanifest_link' ); // Display the link to the Windows Live Writer manifest file.
remove_action( 'wp_head', 'index_rel_link' ); // index link
remove_action( 'wp_head', 'parent_post_rel_link', 10); // prev link
remove_action( 'wp_head', 'start_post_rel_link', 10); // start link
remove_action( 'wp_head', 'adjacent_posts_rel_link', 10); // Display relational links for the posts adjacent to the current post.
remove_action( 'wp_head', 'wp_generator' ); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

function my_deregister_styles() {
  wp_deregister_style( 'wp-pagenavi' );
}
add_action( 'wp_print_styles', 'my_deregister_styles', 100 );

add_action( 'template_redirect', function () {
//Disable gutenberg style in Front
  function wps_deregister_styles() {
    wp_dequeue_style( 'wp-block-library' );
  }
  add_action( 'wp_print_styles', 'wps_deregister_styles', 100 );
  remove_action('template_redirect', 'rest_output_link_header', 11);
  remove_action('wp_head', 'rest_output_link_wp_head', 10);
  remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
  add_filter( 'show_recent_comments_widget_style', function() { return false; });
  if ( ! class_exists( 'WPSEO_Frontend' ) ) {
    return;
  }
  $instance = WPSEO_Frontend::get_instance();
// make sure, future version of the plugin does not break our site.
  if ( ! method_exists( $instance, 'debug_mark') ) {
    return ;
  }
  // ok, let us remove the love letter.
  remove_action( 'wpseo_head', array( $instance, 'debug_mark' ), 2 );
}, 9999 );
//EMBED LINK
add_action( 'init', function() { // Remove the REST API endpoint.
  remove_action('rest_api_init', 'wp_oembed_register_route'); // Turn off oEmbed auto discovery. // Don't filter oEmbed results.
  remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10); // Remove oEmbed discovery links.
  remove_action('wp_head', 'wp_oembed_add_discovery_links'); // Remove oEmbed-specific JavaScript from the front-end and back-end.
  remove_action('wp_head', 'wp_oembed_add_host_js');
}, PHP_INT_MAX - 1 );

function disable_yoast_schema_data($data){
  $data = array();
  return $data;
}
add_filter('wpseo_json_ld_output', 'disable_yoast_schema_data', 10, 1);

// Каноническая ссылка для страницы каталога
function yoast_seo_canonical_change_woocom_shop( $canonical ) {
  return false;
}
add_filter( 'wpseo_canonical', 'yoast_seo_canonical_change_woocom_shop', 10, 1 );

include_once ('template-parts/menus_template.php');
include_once ('template-parts/icons_pack.php');
include_once ('template-parts/common_section.php');
include_once ('template-parts/common_section_items.php');
include_once ('template-parts/sidebar_template.php');