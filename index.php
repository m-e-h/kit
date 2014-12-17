<?php
/**
 * The main template file.
 *
 * @package kit
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( !is_front_page() && !is_singular() && !is_404() ) : ?>

			<header class="page-header">
			<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="taxonomy-description">', '</div>' );
			?>
			</header><!-- .page-header -->

		<?php endif; // End check for multi-post page. ?>

		<?php
		// Start the Loop.
		if ( have_posts() ) :

			while ( have_posts() ) : the_post();

				hybrid_get_content_template();

				if ( is_singular( 'post' ) ) :

	            	comments_template( '', true );

					// Previous/next post navigation.
					the_post_navigation( array(
						'prev_text' => _x( '<button class="meta-nav">&#xf060; <span class="screen-reader-text">post: </span><span class="post-title">%title</span></button>', 'Previous post link', 'kit' ),
						'next_text' => _x( '<button class="meta-nav"><span class="screen-reader-text">post: </span><span class="post-title">%title</span> &#xf061;</button>', 'Next post link', 'kit' )
					) );

				endif; // End check for single post.

			endwhile;

				if ( is_home() || is_archive() || is_search() ) :

					// Previous/next page navigation.
					the_posts_pagination( array(
						'prev_text'          => __( '&#xf060;', 'kit' ),
						'next_text'          => __( '&#xf061;', 'kit' ),
						'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'kit' ) . ' </span>',
					) ); 

				endif; // End check for type of page being viewed.

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'content/none.php' );

		endif; // End check for posts.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
