<?php
/**
 * @package Kit
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<?php wp_head(); ?>
</head>

<body <?php hybrid_attr( 'body' ); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'kit' ); ?></a>

	<header <?php hybrid_attr( 'header' ); ?>>
		<div class="site-branding">
			<?php hybrid_site_title(); ?>
			<?php hybrid_get_menu( 'breadcrumbs' ); ?>
		</div><!-- .site-branding -->

		<?php hybrid_get_menu( 'primary' ); // menu/primary.php ?>
	</header><!-- #header -->

	<div <?php hybrid_attr( 'content' ); ?>>
