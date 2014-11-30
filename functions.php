<?php
/**
 * kit functions and definitions
 *
 * @package kit
 */

/**
 * Get the template directory and make sure it has a trailing slash.
 */
$kit_dir = trailingslashit( get_template_directory() );

/**
 * Load the Hybrid Core framework.
 */
require_once( $kit_dir . 'library/hybrid.php' 		);
require_once( $kit_dir . 'inc/hybrid-mods.php'         	);

/**
 * Launch the Hybrid Core framework.
 */
new Hybrid();

/* Do theme setup on the 'after_setup_theme' hook. */
add_action( 'after_setup_theme', 'kit_setup', 5 );

/* Register custom image sizes. */
add_action( 'init', 'kit_register_image_sizes', 5 );

/* Register custom menus. */
add_action( 'init', 'kit_register_menus', 5 );

/* Register sidebars. */
add_action( 'widgets_init', 'kit_register_sidebars', 5 );

/* Add custom scripts. */
add_action( 'wp_enqueue_scripts', 'kit_enqueue_scripts', 5 );

/* Add custom styles. */
add_action( 'wp_enqueue_scripts', 'kit_enqueue_styles', 5 );


/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
if ( ! function_exists( 'kit_setup' ) ) :
function kit_setup() {

	/**
	 * Theme layouts.
	 */
	add_theme_support(
		'theme-layouts',
		array(
			'1c'        => __( '1 Column',                     'kit' ),
			'2c-l'      => __( '2 Columns: Content / Sidebar', 'kit' ),
			'2c-r'      => __( '2 Columns: Sidebar / Content', 'kit' )
		),
		array( 'default' => is_rtl() ? '2c-r' :'2c-l' )
	);

	/**
	 * Enable custom template hierarchy.
	 */
	add_theme_support( 'hybrid-core-template-hierarchy' );

	/**
	 * The best thumbnail/image script ever.
	 */
	add_theme_support( 'get-the-image' );

	/**
	 * Breadcrumbs. Yay!
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

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'kit_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // kit_setup

/**
 * Registers custom image sizes for the theme. 
 */
function kit_register_image_sizes() {
	//set_post_thumbnail_size( 150, 150, true );
}

/**
 * Registers nav menu locations.
 */
function kit_register_menus() {
	register_nav_menu( 'primary',    _x( 'Primary',    'nav menu location', 'kit' ) );
	register_nav_menu( 'secondary',  _x( 'Secondary',  'nav menu location', 'kit' ) );
	register_nav_menu( 'subsidiary', _x( 'Subsidiary', 'nav menu location', 'kit' ) );
}

/**
 * Registers sidebars.
 */
function kit_register_sidebars() {

	hybrid_register_sidebar(
		array(
			'id'          => 'primary',
			'name'        => _x( 'Primary', 'sidebar', 'kit' ),
			'description' => __( 'Primary Sidebar.', 'kit' )
		)
	);

	hybrid_register_sidebar(
		array(
			'id'          => 'subsidiary',
			'name'        => _x( 'Subsidiary', 'sidebar', 'kit' ),
			'description' => __( 'Footer Widgets.', 'kit' )
		)
	);
}

/**
 * Enqueue scripts and styles.
 */
function kit_enqueue_scripts() {

	wp_enqueue_script( 'kit-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'kit-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

/**
 * Load stylesheets for the front end.
 */
function kit_enqueue_styles() {

	/* Gets ".min" suffix. */
	$suffix = hybrid_get_min_suffix();

	/* Load gallery style if 'cleaner-gallery' is active. */
	if ( current_theme_supports( 'cleaner-gallery' ) ) {
		wp_enqueue_style( 'gallery', trailingslashit( HYBRID_CSS ) . "gallery{$suffix}.css" );
	}

	/* Load parent theme stylesheet if child theme is active. */
	if ( is_child_theme() ) {
		wp_enqueue_style( 'parent', trailingslashit( get_template_directory_uri() ) . "style{$suffix}.css" );
	}

	/* Load active theme stylesheet. */
	wp_enqueue_style( 'style', get_stylesheet_uri() );
}

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * template tags Hybrid Core .
 */
require get_template_directory() . '/inc/hc-template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
