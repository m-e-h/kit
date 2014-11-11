<?php if ( ! has_nav_menu( 'primary' ) ) {
  return;
}
?>

	<nav <?php hybrid_attr( 'menu', 'primary' ); ?>>

		<?php wp_nav_menu(
			array(
				'theme_location'  => 'primary',
				'container'       => '',
				'menu_id'         => 'menu-primary-items',
				'menu_class'      => 'menu__items--primary',
				'fallback_cb'     => '',
				'items_wrap'      => '<div class="wrap"><ul id="%s" class="%s">%s</ul>' . get_search_form( false ) . '</div>'
			)
		); ?>
	</nav><!-- #menu-primary -->