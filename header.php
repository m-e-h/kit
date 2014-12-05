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

	<?php hybrid_get_menu( 'primary' ); // menu/primary.php ?>

	<header <?php hybrid_attr( 'header' ); ?>>
		<?php hybrid_get_menu( 'secondary' ); // menu/secondary.php ?>
		<div class="site-branding">
			<?php hybrid_site_title(); ?>
			<?php hybrid_site_description(); ?>
		</div><!-- .site-branding -->
	</header><!-- #header -->

	<?php hybrid_get_menu( 'breadcrumbs' ); // menu/breadcrumbs.php ?>

	<div <?php hybrid_attr( 'content' ); ?>>
