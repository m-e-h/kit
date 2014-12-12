<?php
/**
 * @package kit
 */
?>

<article <?php hybrid_attr( 'post' ); ?>>

		<?php get_the_image(); ?>

	<?php if ( is_singular( get_post_type() ) ) : ?>

		<header class="entry-header">

			<h1 <?php hybrid_attr( 'entry-title' ); ?>><?php single_post_title(); ?></h1>

		</header><!-- .entry-header -->

		<div <?php hybrid_attr( 'entry-content' ); ?>>
			<?php the_content(); ?>
			<?php wp_link_pages(); ?>
		</div><!-- .entry-content -->

	<?php else : // If not viewing a single post. ?>

		<header class="entry-header">

			<?php the_title( '<h2 ' . hybrid_get_attr( 'entry-title' ) . '><a href="' . get_permalink() . '" rel="bookmark" itemprop="url">', '</a></h2>' ); ?>

		</header><!-- .entry-header -->

		<div <?php hybrid_attr( 'entry-summary' ); ?>>
			<?php
				the_content( sprintf(
					esc_html__( 'Continue reading %s', 'kit' ),
					the_title( '<span class="screen-reader-text">', '</span>', false )
				) );
			?>
		</div><!-- .entry-summary -->

	<?php endif; // End single post check. ?>

		<footer class="entry-footer">
			<?php kit_entry_footer(); ?>
		</footer><!-- .entry-footer -->

</article><!-- .entry -->