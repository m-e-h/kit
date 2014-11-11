<?php
/**
 * The header.
 *
 *
 * @package Kit
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <?php wp_head(); ?>
  </head>

<body <?php hybrid_attr( 'body' ); ?>>

	<?php hybrid_get_menu( 'primary' ); ?>

<div id="page" class="site grid">
	<a href="#content" class="screen-reader-text visuallyhidden"><?php _e( 'Skip to main content', 'kit' ); ?></a>

	<div class="side-header grid__item desk--four-twelfths">

	<header <?php hybrid_attr( 'header' ); ?>>

		<?php if ( display_header_text() ) : ?>

			<div <?php hybrid_attr( 'branding' ); ?>>
				<?php hybrid_site_title(); ?>
				<?php hybrid_site_description(); ?>
			</div><!-- #branding -->

		<?php endif; // End check for header text. ?>



	</header><!-- #header -->

	<?php hybrid_get_menu( 'secondary' ); ?>
	<?php hybrid_get_sidebar( 'primary' ); ?>

	</div><!-- side-header -->

		<?php if ( get_header_image() ) : // If there's a header image. ?>

    	<style type="text/css" id="custom-header-css">


			.custom-header .side-header {
				background: url(<?php header_image(); ?>);
			    background-size: cover;
			    background-attachment: fixed;
			    background-repeat: no-repeat;
			    background-position: center center;
			}
		</style>

    <?php endif; // End check for header image. ?>

	<div class="main-container grid__item desk--eight-twelfths">
