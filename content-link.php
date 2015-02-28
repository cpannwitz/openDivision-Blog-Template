<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-body">
		<header class="entry-header">		

			<h2 class="entry-title">
				<a href="http://<?php the_field("link_post_link"); ?>" target="_blank" rel="bookmark">	
					<?php owndefault_post_icon(); ?>&nbsp;<?php the_field("link_post_link"); ?>
				</a>
			</h2>
		</header><!-- .entry-header -->

		<div class="entry-meta">
			<?php owndefault_entry_meta(); ?>
			<?php if ( comments_open() && ! is_single() ) : ?>
				<span class="comments-link">
					<i class="fa fa-comments"></i>
					<?php comments_popup_link( '0 Comments', '1 Comment', '% Comments' ); ?>
				</span><!-- .comments-link -->
			<?php endif; // comments_open() ?>
			<?php owndefault_social_likes(); ?>
			<?php edit_post_link( __( 'Edit', 'owndefault' ), '<span class="edit-link"><i class="fa fa-pencil-square-o"></i>', '</span>' ); ?>
		</div>

		<div class="entry-content">
			<?php
				/* translators: %s: Name of current post */
				the_content( sprintf(
					__( 'Read more <span class="meta-nav">&raquo;</span>', 'owndefault' ),
					the_title( '<span class="screen-reader-text">', '</span>', false )
				));
				wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'owndefault' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) );
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php if ( is_single() && get_the_author_meta( 'description' ) && is_multi_author() ) : ?>
			<?php endif; ?>
		</footer><!-- .entry-meta -->
		</div><!-- .entry-body -->
</article><!-- #post -->