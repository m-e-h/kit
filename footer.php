<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Kit One
 */
?>

	</div><!-- #content -->
	<?php hybrid_get_sidebar( 'subsidiary' ); // sidebar/subsidiary.php ?>
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'kit-one' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'kit-one' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'kit-one' ), 'Kit One', '<a href="http://martyhelmick.com" rel="designer">Marty Helmick</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
