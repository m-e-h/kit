<?php
/**
 * @package Kit
 */
?>

<article <?php hybrid_attr( 'post' ); ?>>

	<?php if ( is_singular( get_post_type() ) ) : // If single post. ?>

		<header class="entry-header">

			<h1 <?php hybrid_attr( 'entry-title' ); ?>>
				<?php single_post_title(); ?>
			</h1>

		</header><!-- .entry-header -->

		<div <?php hybrid_attr( 'entry-content' ); ?>>
			<?php the_content(); ?>
			<?php wp_link_pages(); ?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php kit_entry_footer(); ?>
			<div class="entry-meta">
				<?php kit_posted_on(); ?>
			</div><!-- .entry-meta -->
		</footer><!-- .entry-footer -->

	<?php else : // If not viewing a single post. ?>

		<?php get_the_image(); ?>

		<header class="entry-header">

			<?php the_title( '<h2 ' . hybrid_get_attr( 'entry-title' ) . '><a href="' . get_permalink() . '" rel="bookmark" itemprop="url">', '</a></h2>' ); ?>

		</header><!-- .entry-header -->

		<div <?php hybrid_attr( 'entry-summary' ); ?>>
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->

		<footer class="entry-footer">
			<div class="entry-meta">
				<?php kit_posted_on(); ?>
			</div><!-- .entry-meta -->
		</footer><!-- .entry-footer -->

	<?php endif; // End single post check. ?>

</article><!-- .entry -->