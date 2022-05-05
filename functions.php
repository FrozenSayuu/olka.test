<?php

if (!function_exists('traveltheme_setup')) :
/**
* Sets up theme defaults and registers support for various WordPress features
*
*  It is important to set up these functions before the init hook so that none of these
*  features are lost.
*
*  @since CrazyMindTheme 1.0
*/
function traveltheme_setup()
{
    register_nav_menus( array(
        'primary'   => esc_html__( 'Main navigation', 'traveltheme' ),
        'footer' => esc_html__( 'Footer navigation', 'traveltheme' ),
        'footer-sec' => esc_html__('Footer second navigation', 'traveltheme')
    ) );

    add_theme_support( 'post-formats', [
        'gallery',
        'image',
        'quote',
        'video',
    ] );
    // Add theme support for Automatic Feed Links
    add_theme_support( 'automatic-feed-links' );

    // Add theme support for Featured Images
    add_theme_support( 'post-thumbnails' );

    // Add theme support for Custom Background
    $background_args = [
        'default-color'          => '',
        'default-image'          => '',
        'default-repeat'         => '',
        'default-position-x'     => '',
        'wp-head-callback'       => '',
        'admin-head-callback'    => '',
        'admin-preview-callback' => '',
    ];
    //add_theme_support( 'custom-background', $background_args );

    // Add theme support for Custom Header
    $header_args = [
        'default-image'      => '',
        'width'              => 0,
        'height'             => 0,
        'flex-width'         => true,
        'flex-height'        => true,
        'uploads'            => true,
        'random-default'     => false,
        'header-text'        => true,
        'default-text-color' => 'OOOO',
        'video'              => true,
    ];
    add_theme_support( 'custom-header', $header_args );

    // Add theme support for HTML5 Semantic Markup
    add_theme_support( 'html5', [ 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ] );

    // Add theme support for document Title tag
    add_theme_support( 'title-tag' );

    // Add theme support for Translation

    add_image_size('travel-gallery', '500', '300', true);
}

add_action('after_setup_theme', 'traveltheme_setup');

/**
 * Här laddar vi in alla våra styles och scripts.
 */
function add_theme_scripts()
{
    wp_enqueue_style( 'style', get_stylesheet_uri() );
}

add_action('wp_enqueue_scripts', 'add_theme_scripts');

/**
 * Om footer nav har social links ska de visas som ikoner
 */
function social_link_classes( $classes, $item, $args ) {
	if ( 'footer' === $args->theme_location ) {
		$classes[] = "social-link";
	}

	return $classes;
}

add_filter( 'nav_menu_css_class', 'social_link_classes', 10, 4 );

/**
 * Registrera Custom Taxonomies
 * https://developer.wordpress.org/plugins/taxonomies/
 *
 * Mer information kring funktionen register_taxonomy
 * https://developer.wordpress.org/reference/functions/register_taxonomy/
 */

function wcm_travel() {
	register_post_type( 'wcm_travel', [
		'labels'      => [
			'name'          => __( 'Travel', 'traveltheme' ),
			'singular_name' => __( 'Travel', 'traveltheme' ),
		],
		'public'      => true,
		'has_archive' => true,
		'rewrite'     => ['slug' => 'travel'],
		'menu_icon'   => '',
		'taxonomies' => ['travel_age', 'travel_country', 'travel_sport_league', 'travel_sport_type', 'travel_type'],
		'supports'    => ['title', 'editor', 'thumbnail', 'custom-fields'],
	] );
}

add_action( 'init', 'wcm_travel', 5 );

function travel_matches() {
	register_post_type( 'travel_matches', [
		'labels'      => [
			'name'          => __( 'Matches', 'traveltheme' ),
			'singular_name' => __( 'Match', 'traveltheme' ),
		],
		'public'      => true,
		'has_archive' => true,
		'rewrite'     => ['slug' => 'matches'],
		'menu_icon'   => '',
		'taxonomies' => ['travel_sport_league', 'travel_type'],
		'supports'    => ['title', 'editor', 'thumbnail', 'custom-fields'],
	] );
}

add_action( 'init', 'travel_matches', 5 );

function travel_cup() {
	register_post_type( 'travel_cup', [
		'labels'      => [
			'name'          => __( 'Cupps', 'traveltheme' ),
			'singular_name' => __( 'Cup', 'traveltheme' ),
		],
		'public'      => true,
		'has_archive' => true,
		'rewrite'     => ['slug' => 'cupps'],
		'menu_icon'   => '',
		'taxonomies' => ['travel_age', 'travel_country', 'travel_sport_type', 'travel_type'],
		'supports'    => ['title', 'editor', 'thumbnail', 'custom-fields'],
	] );
}

add_action( 'init', 'travel_cup', 5 );

function travel_camp() {
	register_post_type( 'travel_camp', [
		'labels'      => [
			'name'          => __( 'Camp', 'traveltheme' ),
			'singular_name' => __( 'Camp', 'traveltheme' ),
		],
		'public'      => true,
		'has_archive' => true,
		'rewrite'     => ['slug' => 'camp'],
		'menu_icon'   => '',
		'taxonomies' => ['travel_age', 'travel_country', 'travel_sport_type', 'travel_type'],
		'supports'    => ['title', 'editor', 'thumbnail', 'custom-fields'],
	] );
}

add_action( 'init', 'travel_camp', 5 );

function travel_soccer() {
	register_post_type( 'travel_soccer', [
		'labels'      => [
			'name'          => __( 'Soccer', 'traveltheme' ),
			'singular_name' => __( 'Soccer', 'traveltheme' ),
		],
		'public'      => true,
		'has_archive' => true,
		'rewrite'     => ['slug' => 'soccer'],
		'menu_icon'   => '',
		'taxonomies' => ['travel_country', 'travel_sport_league', 'travel_sport_type'],
		'supports'    => ['title', 'editor', 'thumbnail', 'custom-fields'],
	] );
}

add_action( 'init', 'travel_soccer', 5 );

function travel_age()
{
	$labels = [
		'name'              => _x( 'Travel_age', 'taxonomy general name' ),
		'singular_name'     => _x( 'travel_age', 'taxonomy singular name' ),
	];
	$args   = [
        'hirerarchial' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_key' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'travel_age')
    ];
	register_taxonomy( 'travel_age' , ['wcm_travel', 'travel_camp', 'travel_cup', 'page'], $args );
}

add_action( 'init', 'travel_age' );

function travel_country()
{
	$labels = [
		'name'              => _x( 'Travel_country', 'taxonomy general name' ),
		'singular_name'     => _x( 'travel_country', 'taxonomy singular name' ),
	];
	$args   = [
        'hirerarchial' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_key' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'travel_country')
    ];
	register_taxonomy( 'travel_country' , ['wcm_travel', 'travel_camp', 'travel_cup', 'travel_soccer', 'page'], $args );
}

add_action( 'init', 'travel_country' );

function travel_sport_league()
{
	$labels = [
		'name'              => _x( 'Travel_sport_league', 'taxonomy general name' ),
		'singular_name'     => _x( 'travel_sport_league', 'taxonomy singular name' ),
	];
	$args   = [
        'hirerarchial' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_key' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'travel_sport_league')
    ];
	register_taxonomy( 'travel_sport_league' , ['wcm_travel', 'travel_soccer', 'travel_matches', 'page'], $args );
}

add_action( 'init', 'travel_sport_league' );

function travel_sport_type()
{
	$labels = [
		'name'              => _x( 'Travel_sport_type', 'taxonomy general name' ),
		'singular_name'     => _x( 'travel_sport_type', 'taxonomy singular name' ),
	];
	$args   = [
        'hirerarchial' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_key' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'travel_sport_type')
    ];
	register_taxonomy( 'travel_sport_type' , ['wcm_travel', 'travel_camp', 'travel_cup', 'travel_soccer', 'page'], $args );
}

add_action( 'init', 'travel_sport_type' );

function travel_type()
{
	$labels = [
		'name'              => _x( 'Travel_type', 'taxonomy general name' ),
		'singular_name'     => _x( 'travel_type', 'taxonomy singular name' ),
	];
	$args   = [
        'hirerarchial' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_key' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'travel_type')
    ];
	register_taxonomy( 'travel_type' , ['wcm_travel', 'travel_camp', 'travel_cup', 'travel_matches', 'page'], $args );
}

add_action( 'init', 'travel_type' );

endif;