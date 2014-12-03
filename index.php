<?php
/**
 * The main template file.
 *
 * @package kit
 */

get_header(); ?>

<div id="primary" class="content-area grid-item-1 grid-item-md-3-4">
	<main id="main" class="site-main" role="main">

	<?php if ( !is_front_page() && !is_singular() && !is_404() ) : ?>

		<header class="page-header">
		<?php
			the_archive_title( '<h1 class="page-title">', '</h1>' );
			the_archive_description( '<div class="taxonomy-description">', '</div>' );
		?>
		</header><!-- .page-header -->

	<?php endif; // End check for multi-post page. ?>

		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php hybrid_get_content_template(); // content/*.php ?>

				<?php if ( is_singular() ) : ?>

	            			<?php comments_template( '', true ); // comments.php ?>

	        			<?php endif; // End check for single post. ?>

			<?php endwhile; ?>

			<?php kit_loop_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content/error.php' ); ?>

		<?php endif; // End check for posts. ?>

	</main><!-- #main -->

</div><!-- #primary -->

<div id="secondary" class="widget-area sidebar__primary grid-item-1 grid-item-md-1-4">
<?php hybrid_get_sidebar( 'primary' );  ?>
</div><!-- #secondary -->

<?php get_footer(); ?>