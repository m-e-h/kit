<?php
/**
 * The template part for displaying results in search pages.
 *
 * @package kit
 */
?>

<article <?php hybrid_attr( 'post' ); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 ' . hybrid_get_attr( 'entry-title' ) . '><a href="' . get_permalink() . '" rel="bookmark" itemprop="url">', '</a></h1>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<?php kit_entry_meta(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
