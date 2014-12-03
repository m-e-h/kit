<?php
/**
 * Kit One functions and definitions
 *
 * @package Kit One
 */

/* Get the template directory. */
$kit_dir = trailingslashit( get_template_directory() );

/* Load Hybrid Core framework and theme files. */
require_once( $kit_dir . 'library/hybrid.php' 		);
require_once( $kit_dir . 'inc/hybrid-mods.php'  	);
require_once( $kit_dir . 'inc/template-tags.php'  	);
require_once( $kit_dir . 'inc/hc-template-tags.php'	);
require_once( $kit_dir . 'inc/extras.php'  			);
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
	 * WordPress manages the document title.
	 * This theme does not use a hard-coded <title> tag.
	 */
	add_theme_support( 'title-tag' );

	/**
	 * Theme layouts.
	 */
	add_theme_support( 'theme-layouts', array(
			'1c'        => __( '1 Column',                     'kit' ),
			'2c-l'      => __( '2 Columns: Content / Sidebar', 'kit' ),
			'2c-r'      => __( '2 Columns: Sidebar / Content', 'kit' )
		),
		array( 'default' => is_rtl() ? '2c-r' :'2c-l' )
	);

	/**
	 * Post Formats.
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	/**
	 * Support for Post Thumbnails on posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );
}
endif; // kit_setup

/**
 * Content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 1100; /* pixels */
}
