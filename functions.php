<?php
/**
 * Kit functions and definitions
 *
 * @package Kit
 */

/* Get the template directory. */
$kit_dir = trailingslashit( get_template_directory() );

/* Load Hybrid Core framework and theme files. */
require_once( $kit_dir . 'library/hybrid.php' 		);
require_once( $kit_dir . 'inc/hybrid-mods.php'  	);
require_once( $kit_dir . 'inc/template-tags.php'  	);
require_once( $kit_dir . 'inc/hc-template-tags.php'	);
require_once( $kit_dir . 'inc/theme.php'  			);
require_once( $kit_dir . 'inc/customizer.php'  		);
//require_once( $kit_dir . 'inc/custom-header.php'  );

/* Launch the Hybrid Core framework. */
new Hybrid();

/* Set up the theme early. */
add_action( 'after_setup_theme', 'kit_setup', 5 );

if ( ! function_exists( 'kit_setup' ) ) :
/**
 * Set up some WordPress and framework functionality.
 */
function kit_setup() {

	/**
	 * Custom template hierarchy.
	 */
	add_theme_support( 'hybrid-core-template-hierarchy' );

	/**
	 * The best thumbnail/image script ever.
	 */
	add_theme_support( 'get-the-image' );

	/**
	 * Breadcrumbs.
	 */
	add_theme_support( 'breadcrumb-trail' );

	/**
	 * Pagination.
	 */
	add_theme_support( 'loop-pagination' );

	/**
	 * Nicer [gallery] shortcode implementation.
	 */
	add_theme_support( 'cleaner-gallery' );

	/**
	 * Better captions for themes to style.
	 */
	add_theme_support( 'cleaner-caption' );

	/**
	 * Default posts and comments RSS feed links in head.
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Support for Post Thumbnails on posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * WordPress manages the document title.
	 * This theme does not use a hard-coded <title> tag.
	 */
	add_theme_support( 'title-tag' );

	/**
	 * Theme layouts.
	 */
	add_theme_support( 'theme-layouts', array(
			'1c'  	=> __( '1 Column', 'kit' ),
			'2c-l' 	=> __( '2 Columns: Content / Sidebar', 'kit' ),
			'2c-r' 	=> __( '2 Columns: Sidebar / Content', 'kit' )
		),
		array( 'default' => is_rtl() ? '2c-r' :'2c-l' )
	);

	/**
	 * Post Formats.
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video'
	) );
}
endif; // kit_setup

/**
 * Content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 660; /* pixels */
}

/**
 * Sets up custom filters and actions for the theme.
 *
 * @package Kit
 */

/* Register custom image sizes. */
add_action( 'init', 'kit_image_sizes', 5 );

/* Add custom scripts. */
add_action( 'wp_enqueue_scripts', 'kit_scripts' );

/* Add custom styles. */
add_action( 'wp_enqueue_scripts', 'kit_styles', 5 );


/**
 * Registers custom image sizes.
 */
function kit_image_sizes() {
	set_post_thumbnail_size( 175, 119, true );
	add_image_size( 'kit-huge', 1100, 9999, false );
}

/**
 * Front end scripts.
 */
function kit_scripts() {

	$suffix = hybrid_get_min_suffix();

	wp_enqueue_script( 'kit-main', trailingslashit( get_template_directory_uri() ) . "js/main.js", array(), null, true );
	wp_enqueue_script( 'kit-navigation', trailingslashit( get_template_directory_uri() ) . "js/navigation.js", array( 'jquery' ), null, true );
	wp_enqueue_script( 'kit-skip-link-focus-fix', trailingslashit( get_template_directory_uri() ) . "js/skip-link-focus-fix.js", array(), '20130115', true );
}

/**
 * Front end styles.
 */
function kit_styles() {

	$suffix = hybrid_get_min_suffix();

	wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css' );

	if ( is_child_theme() )
		wp_enqueue_style( 'parent', trailingslashit( get_template_directory_uri() ) . "style.css" );

	wp_enqueue_style( 'style', get_stylesheet_uri() );
}