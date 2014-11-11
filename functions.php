<?php
/**
 * Kit functions and definitions
 *
 * @package Kit
 */

/* Get the template directory and make sure it has a trailing slash. */
$kit_dir = trailingslashit( get_template_directory() );

/* Load the Hybrid Core framework and theme files. */
require_once( $kit_dir . 'library/hybrid.php'        );
require_once( $kit_dir . 'inc/template-tags.php'     );
require_once( $kit_dir . 'inc/custom-background.php' );
require_once( $kit_dir . 'inc/custom-header.php'     );
require_once( $kit_dir . 'inc/hybrid-mods.php'       );
require_once( $kit_dir . 'inc/theme.php'             );
require_once( $kit_dir . 'inc/customizer.php'        );

/* Launch the Hybrid Core framework. */
new Hybrid();

/* Do theme setup on the 'after_setup_theme' hook. */
add_action( 'after_setup_theme', 'kit_setup', 5 );

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function kit_setup() {


	/* Theme layouts. */
	add_theme_support(
		'theme-layouts',
		array(
			'1c'        => __( '1 Column',                     'hybrid-base' ),
			'2c-l'      => __( '2 Columns: Content / Sidebar', 'hybrid-base' ),
			'2c-r'      => __( '2 Columns: Sidebar / Content', 'hybrid-base' )
		),
		array( 'default' => is_rtl() ? '2c-r' :'2c-l' )
	);

	/* Enable custom template hierarchy. */
	add_theme_support( 'hybrid-core-template-hierarchy' );

	/* The best thumbnail/image script ever. */
	add_theme_support( 'get-the-image' );

	/* Breadcrumbs. Yay! */
	add_theme_support( 'breadcrumb-trail' );

	/* Pagination. */
	add_theme_support( 'loop-pagination' );

	/* Nicer [gallery] shortcode implementation. */
	add_theme_support( 'cleaner-gallery' );

	/* Better captions for themes to style. */
	add_theme_support( 'cleaner-caption' );

	/* Automatically add feed links to <head>. */
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'audio', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'kit_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function kit_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'kit' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'kit_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function kit_scripts() {
	wp_enqueue_style( 'kit-style', get_stylesheet_uri() );

	wp_enqueue_script( 'kit-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'kit-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'kit_scripts' );
