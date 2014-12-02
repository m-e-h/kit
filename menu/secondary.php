<?php if ( has_nav_menu( 'secondary' ) ) : // Check if there's a menu assigned to the 'secondary' location. ?>

	<nav <?php hybrid_attr( 'menu', 'secondary' ); ?>>
      <button class="menu-toggle"><?php _e( 'Menu 2', 'kit' ); ?></button>

		<?php wp_nav_menu(
			array(
				'theme_location'  => 'secondary',
				'container'       => '',
				'menu_id'         => 'menu-secondary-items',
				'menu_class'      => 'menu__secondary--items nav-menu',
				'fallback_cb'     => ''
			)
		); ?>

	</nav><!-- #menu-secondary -->

<?php endif; // End check for menu. ?>