<?php
/**
 * The main template file.
 *
 * @package Kit
 */

get_header(); ?>

<?php hybrid_get_sidebar( 'primary' ); ?>

<main <?php hybrid_attr( 'content' ); ?>>

	<?php if ( !is_front_page() && !is_singular() && !is_404() ) : // If viewing a multi-post page ?>

		<?php kit_loop_meta(); ?>

	<?php endif; // End check for multi-post page. ?>

		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>

			<?php hybrid_get_content_template(); ?>

			<?php if ( is_singular() ) : ?>

				<?php comments_template( '', true ); // Loads comments.php ?>

			<?php endif; // End check for single post. ?>

		<?php endwhile; // End found posts loop. ?>

		<?php kit_loop_nav(); ?>

	<?php else : ?>

		<?php get_template_part( 'content/error' ); ?>

	<?php endif; // End check for posts. ?>

</main><!-- #content -->

<?php hybrid_get_sidebar( 'secondary' ); ?>

<?php get_footer(); ?>
