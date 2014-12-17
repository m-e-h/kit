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
<div id="page" class="site wsk-layout wsk-js-layout wsk-layout--fixed-drawer wsk-layout--overlay-drawer wsk-layout--fixed-header">

	<div class="wsk-layout__header is-casting-shadow">
		<span class="wsk-layout-title">
			<?php 
			if ( is_front_page() && is_home() ) :
				hybrid_site_description();
			endif;
				hybrid_get_menu( 'breadcrumbs' );
			?>
		</span>
		<div class="wsk-layout-spacer"></div>
		<div class="input-container right large">
			<?php get_search_form() ?>
		</div>
	</div><!-- .wsk-layout__header -->
	<div class="wsk-layout__drawer">
		<header class="wsk-layout-title">
				<?php hybrid_site_title(); ?>
		</header><!-- #header -->
		<div class="wsk-navigation">
		<?php hybrid_get_menu( 'primary' ); ?>
		<?php hybrid_get_menu( 'social' ); ?>
		<?php hybrid_get_sidebar( 'primary' ); ?>
		</div>
	</div>

	<div class="wsk-layout__content">
