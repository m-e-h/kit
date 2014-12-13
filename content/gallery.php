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
			<?php the_excerpt(); ?>
			<?php $count = hybrid_get_gallery_item_count(); ?>
			<p class="gallery-count"><?php printf( _n( 'This gallery contains %s item.', 'This gallery contains %s items.', $count, 'kit' ), $count ); ?></p>
		</div><!-- .entry-summary -->

	<?php endif; // End single post check. ?>

		<footer class="entry-footer">
		<?php hybrid_post_terms( array( 'taxonomy' => 'category', 'sep' => ' ' ) ); ?>
		<?php hybrid_post_terms( array( 'taxonomy' => 'post_tag', 'sep' => ' ' ) ); ?>
		</footer><!-- .entry-footer -->

</article><!-- .entry -->