<article <?php hybrid_attr( 'post' ); ?>>

	<?php echo ( $video = hybrid_media_grabber( array( 'width' => 1100, 'type' => 'video', 'split_media' => true, 'before' => '<div class="FlexEmbed"><div class="FlexEmbed-ratio FlexEmbed-ratio--16by9"></div>', 'after' => '</div>' ) ) ); ?>

		<?php if ( is_single( get_the_ID() ) ) : // If viewing a single post. ?>

			<header class="entry-header">

				<h1 <?php hybrid_attr( 'entry-title' ); ?>><?php single_post_title(); ?></h1>

			</header><!-- .entry-header -->

			<div <?php hybrid_attr( 'entry-content' ); ?>>
				<?php the_content(); ?>
				<?php wp_link_pages(); ?>
			</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php kit_entry_meta(); ?>
		</footer><!-- .entry-footer -->

		<?php else : // If not viewing a single post. ?>

			<header class="entry-header">

				<?php the_title( '<h2 ' . hybrid_get_attr( 'entry-title' ) . '><a href="' . get_permalink() . '" rel="bookmark" itemprop="url">', '</a></h2>' ); ?>

			</header><!-- .entry-header -->

			<?php if ( has_excerpt() ) : // If the post has an excerpt. ?>

				<div <?php hybrid_attr( 'entry-summary' ); ?>>
					<?php the_excerpt(); ?>
				</div><!-- .entry-summary -->

			<?php elseif ( empty( $video ) ) : // Else, if the post does not have a video. ?>

				<div <?php hybrid_attr( 'entry-content' ); ?>>
					<?php the_content(); ?>
				</div><!-- .entry-content -->

			<?php endif; // End excerpt/video checks. ?>

		<?php endif; // End single post check. ?>

</article><!-- .entry -->