<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<!-- Post Thumbnail
	<?php if ( has_post_thumbnail() && ! post_password_required() && ! is_attachment() ) : ?>
		<div class="entry-thumbnail three columns">
			<?php the_post_thumbnail(); ?>
		</div>
	<?php endif; ?>  -->
	<div class="entry-body">
		<header class="entry-header">		

			<?php if ( is_single() ) : ?>
			<h2 class="entry-title"><?php owndefault_post_icon(); ?>&nbsp;<?php the_title(); ?></h2>
			<?php else : ?>
			<h2 class="entry-title">
				<a href="<?php the_permalink(); ?>" rel="bookmark">
					
					<?php owndefault_post_icon(); ?>&nbsp;<?php the_title(); ?>
				</a>
			</h2>
			<?php endif; // is_single() ?>

			<div class="entry-meta">
				<?php owndefault_entry_meta(); ?>
				<?php if ( comments_open() && ! is_single() ) : ?>
					<span class="comments-link">
						<i class="fa fa-comments"></i>
						<?php comments_popup_link( '0 Comments', '1 Comment', '% Comments' ); ?>
					</span><!-- .comments-link -->
				<?php endif; // comments_open() ?>
				<!-- <?php if ( function_exists( 'ADDTOANY_SHARE_SAVE_KIT' ) ) { ADDTOANY_SHARE_SAVE_KIT(); } ?> -->
				<?php owndefault_social_likes(); ?>
				<?php edit_post_link( __( 'Edit', 'owndefault' ), '<span class="edit-link"><i class="fa fa-pencil-square-o"></i>', '</span>' ); ?>
			</div>

		</header><!-- .entry-header -->

		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
		<?php else : ?>
		<div class="entry-content">
			<?php
				/* translators: %s: Name of current post */
				the_content( sprintf(
					__( '<span class="meta-nav button">Read more &raquo;</span>', 'owndefault' ),
					the_title( '<span class="screen-reader-text">', '</span>', false )
				));
				wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'owndefault' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) );
			?>
		</div><!-- .entry-content -->
		<?php endif; ?>

		<footer class="entry-footer">
			<?php if ( is_single() && get_the_author_meta( 'description' ) && is_multi_author() ) : ?>				
			<?php endif; ?>
		</footer><!-- .entry-meta -->
		</div><!-- .entry-body -->
</article><!-- #post -->