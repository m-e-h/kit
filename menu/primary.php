<?php if ( has_nav_menu( 'primary' ) ) : // Check if there's a menu assigned to the 'primary' location. ?>

	<nav <?php hybrid_attr( 'menu', 'primary' ); ?>>
		<button class="menu-toggle" aria-controls="menu" aria-expanded="false"><?php _e( 'Menu 1', 'kit' ); ?></button>
		<?php wp_nav_menu(
			array(
				'theme_location'  => 'primary',
				'container'       => '',
				'menu_id'         => 'menu-primary-items',
				'menu_class'      => 'menu__primary--items nav-menu',
				'fallback_cb'     => ''
			)
		); ?>
	</nav><!-- #site-navigation -->

<?php endif; // End check for menu. ?>




