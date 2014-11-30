<?php
/**
 * The sidebar containing the subsidiary widget area.
 *
 * @package kit
 */

if ( ! is_active_sidebar( 'subsidiary' ) ) {
	return;
}
?>

<aside <?php hybrid_attr( 'sidebar', 'subsidiary' ); ?>>
	<?php dynamic_sidebar( 'subsidiary' ); ?>
</aside><!-- #sidebar-subsidiary -->