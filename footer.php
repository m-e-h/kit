<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Kit
 */
?>

	</div><!-- .content -->

	<footer <?php hybrid_attr( 'footer' ); ?>>

		<?php hybrid_get_sidebar( 'subsidiary' ); // sidebar/subsidiary.php ?>
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'kit' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'kit' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'kit' ), 'Kit', '<a href="http://martyhelmick.com" rel="designer">Marty Helmick</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #footer -->
</div><!-- .site -->

<?php wp_footer(); ?>

</body>
</html>
