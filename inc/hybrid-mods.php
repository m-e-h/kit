<?php


add_filter( 'hybrid_attr_menu', 'doc_attr_menu', 10, 2 );

function doc_attr_menu( $attr, $context ) {

	$attr['class'] .= "  menu__{$context}";

	return $attr;
}

add_filter( 'hybrid_attr_sidebar', 'doc_attr_sidebar', 10, 2 );

function doc_attr_sidebar( $attr, $context ) {

 	$attr['class'] .= "  sidebar__{$context}";

 	return $attr;
}

add_filter( 'hybrid_attr_content', 'doc_attr_content' );

function doc_attr_content( $attr ) {

	$attr['class'] .= "  site-content";

	return $attr;
}

add_filter( 'hybrid_attr_header', 'doc_attr_header' );

function doc_attr_header( $attr ) {

	$attr['class'] = "site-header";

	return $attr;
}

add_filter( 'hybrid_attr_footer', 'doc_attr_footer' );

function doc_attr_footer( $attr ) {

	$attr['class'] = "site-footer";

	return $attr;
}

add_filter( 'hybrid_attr_branding', 'doc_attr_branding' );

function doc_attr_branding( $attr ) {

	$attr['class'] = "site-branding";

	return $attr;
}

add_filter( 'hybrid_attr_site_title', 'doc_attr_site_title' );

function doc_attr_site_title( $attr ) {

	$attr['class'] = "site-title";

	return $attr;
}

add_filter( 'hybrid_attr_site_description', 'doc_attr_site_description' );

function doc_attr_site_description( $attr ) {

	$attr['class'] = "site-description";

	return $attr;
}





add_filter( 'comment_form_defaults', 'remove_comment_form_allowed_tags' );
function remove_comment_form_allowed_tags( $defaults ) {

	$defaults['comment_notes_after'] = '';
	return $defaults;

}



add_action( 'init', 'kit_clean_head' );
function kit_clean_head() {
remove_action( 'wp_head', 'wp_generator', 		1 );
remove_action( 'wp_head', 'hybrid_doctitle',      	0 );
remove_action( 'wp_head', 'hybrid_link_pingback', 	3 );
remove_action( 'wp_head', 'wlwmanifest_link'		  );
remove_action('wp_head', 'rsd_link'			  );
}
