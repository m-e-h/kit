<article <?php hybrid_attr( 'post' ); ?>>

	<?php if ( is_singular( get_post_type() ) ) : // If viewing a single post. ?>

		<header class="entry-header">

			<h1 <?php hybrid_attr( 'entry-title' ); ?>><?php single_post_title(); ?></h1>

		</header><!-- .entry-header -->

		<div <?php hybrid_attr( 'entry-content' ); ?>>

		<?php get_the_image( array( 'size' => 'full', 'link_to_post' => false, 'image_class' => 'post-img' ) ); ?>

			<?php the_content(); ?>
			<?php wp_link_pages(); ?>
		</div><!-- .entry-content -->

	<?php else : // If not viewing a single post. ?>

		<header class="entry-header">

			<?php the_title( '<h2 ' . hybrid_get_attr( 'entry-title' ) . '><a href="' . get_permalink() . '" rel="bookmark" itemprop="url">', '</a></h2>' ); ?>

		</header><!-- .entry-header -->

		<div <?php hybrid_attr( 'entry-summary' ); ?>>

		<?php get_the_image( array( 'image_class' => 'post-img' ) ); ?>

			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->

	<?php endif; // End single post check. ?>

		<footer class="entry-footer">
			<?php kit_entry_meta(); ?>
		</footer><!-- .entry-footer -->

</article><!-- .entry -->