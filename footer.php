<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package kit
 */
?>

	</div><!-- #content -->

	<footer <?php hybrid_attr( 'footer' ); ?>>
		<div class="site-info">
			<?php printf(
				__( 'Copyright &#169; %1$s %2$s. Powered by %3$s and %4$s.', 'saga' ), 
				date_i18n( 'Y' ), hybrid_get_site_link(), hybrid_get_wp_link(), hybrid_get_theme_link()
			); ?>
		</div><!-- .site-info -->
	</footer><!-- #footer -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
