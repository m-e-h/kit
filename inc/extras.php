<?php
/**
 * Sets up custom filters and actions for the theme.
 *
 * @package Kit
 */

/* Register custom image sizes. */
add_action( 'init', 'kit_image_sizes', 5 );

/* Register menus. */
add_action( 'init', 'kit_menus', 5 );

/* Register sidebars. */
add_action( 'widgets_init', 'kit_sidebars', 5 );

/* Add custom scripts. */
add_action( 'wp_enqueue_scripts', 'kit_scripts' );

/* Add custom styles. */
add_action( 'wp_enqueue_scripts', 'kit_styles', 5 );
/* Adds custom attributes to the subsidiary sidebar. */
add_filter( 'hybrid_attr_sidebar', 'kit_sidebar_subsidiary_class', 10, 2 );


/**
 * Registers custom image sizes.
 */
function kit_image_sizes() {
	set_post_thumbnail_size( 175, 119, true );
	add_image_size( 'kit-huge', 1100, 9999, false );
}


/**
 * Registers nav menu locations.
 */
function kit_menus() {
	register_nav_menu( 'primary',   _x( 'Primary',   'nav menu location', 'kit' ) );
	register_nav_menu( 'secondary', _x( 'Secondary', 'nav menu location', 'kit' ) );
	register_nav_menu( 'social',    _x( 'Social',    'nav menu location', 'kit' ) );
}
/**
 * Registers sidebars.
 */
function kit_sidebars() {
	hybrid_register_sidebar(
		array(
			'id'          => 'primary',
			'name'        => _x( 'Primary', 'sidebar', 'kit' ),
			'description' => __( 'The main sidebar. It is displayed on either the left or right side of the page based on the chosen layout.', 'kit' )
		)
	);
	hybrid_register_sidebar(
		array(
			'id'          => 'subsidiary',
			'name'        => _x( 'Subsidiary', 'sidebar', 'kit' ),
			'description' => __( 'A sidebar located in the footer of the site.', 'kit' )
		)
	);
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




/**
 * Adds a custom class to the 'subsidiary' sidebar.  This is used to determine the number of columns used to 
 * display the sidebar's widgets.  This optimizes for 1, 2, and 3 columns or multiples of those values.
 *
 * Note that we're using the global $sidebars_widgets variable here. This is because core has marked 
 * wp_get_sidebars_widgets() as a private function. Therefore, this leaves us with $sidebars_widgets for 
 * figuring out the widget count.
 * @link http://codex.wordpress.org/Function_Reference/wp_get_sidebars_widgets
 *
 * @since  1.0.0
 * @access public
 * @param  array  $attr
 * @param  string $context
 * @return array
 */
function kit_sidebar_subsidiary_class( $attr, $context ) {
	if ( 'subsidiary' === $context ) {
		global $sidebars_widgets;
		if ( is_array( $sidebars_widgets ) && !empty( $sidebars_widgets[ $context ] ) ) {
			$count = count( $sidebars_widgets[ $context ] );
			if ( 1 === $count )
				$attr['class'] .= ' sidebar-col-1';
			elseif ( !( $count % 3 ) || $count % 2 )
				$attr['class'] .= ' sidebar-col-3';
			elseif ( !( $count % 2 ) )
				$attr['class'] .= ' sidebar-col-2';
		}
	}
	return $attr;
}