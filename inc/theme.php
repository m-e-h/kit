<?php

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
 * Registers custom image sizes for the theme. 
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function kit_register_image_sizes() {

	/* Sets the 'post-thumbnail' size. */
	//set_post_thumbnail_size( 150, 150, true );
}

/**
 * Registers nav menu locations.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function kit_register_menus() {
	register_nav_menu( 'primary',    _x( 'Primary',    'nav menu location', 'kit' ) );
	register_nav_menu( 'secondary',  _x( 'Secondary',  'nav menu location', 'kit' ) );
	register_nav_menu( 'subsidiary', _x( 'Subsidiary', 'nav menu location', 'kit' ) );
}

/**
 * Registers sidebars.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function kit_register_sidebars() {

	hybrid_register_sidebar(
		array(
			'id'          => 'primary',
			'name'        => _x( 'Primary', 'sidebar', 'kit' ),
			'description' => __( 'Sidebar Left.', 'kit' )
		)
	);

	hybrid_register_sidebar(
		array(
			'id'          => 'secondary',
			'name'        => _x( 'Secondary', 'sidebar', 'kit' ),
			'description' => __( 'Sidebar Right.', 'kit' )
		)
	);

	hybrid_register_sidebar(
		array(
			'id'          => 'footer',
			'name'        => _x( 'Footer', 'sidebar', 'kit' ),
			'description' => __( 'Sidebar Right.', 'kit' )
		)
	);
}

/**
 * Load scripts for the front end.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function kit_enqueue_scripts() {
}

/**
 * Load stylesheets for the front end.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function kit_enqueue_styles() {

	/* Gets ".min" suffix. */
	$suffix = hybrid_get_min_suffix();

	/* Load parent theme stylesheet if child theme is active. */
	if ( is_child_theme() ) {
		wp_enqueue_style( 'parent', trailingslashit( get_template_directory_uri() ) . "style{$suffix}.css" );
	}

	/* Load active theme stylesheet. */
	wp_enqueue_style( 'style', get_stylesheet_uri() );
}
