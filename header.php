<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package kit
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>

<?php wp_head(); ?>
</head>

<body <?php hybrid_attr( 'body' ); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'kit' ); ?></a>

		<?php hybrid_get_menu( 'primary' ); // Loads the menu/primary.php template. ?>

	<header <?php hybrid_attr( 'header' ); ?>>
	        	<div <?php hybrid_attr( 'branding' ); ?>>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</div><!-- #branding -->

		<?php hybrid_get_menu( 'secondary' ); // Loads the menu/secondary.php template. ?>

	</header><!-- #header -->

  <?php hybrid_get_menu( 'breadcrumbs' ); // Loads the menu/breadcrumbs.php template. ?>

	<div <?php hybrid_attr( 'content' ); ?>>
