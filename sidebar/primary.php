<?php
/**
 * The sidebar containing the primary widget area.
 *
 * @package kit
 */

if ( ! is_active_sidebar( 'primary' ) ) {
	return;
}
?>

<aside <?php hybrid_attr( 'sidebar', 'primary' ); ?>>
	<?php dynamic_sidebar( 'primary' ); ?>
</aside><!-- #sidebar-primary -->