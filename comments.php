<?php if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'owndefault' ),
					number_format_i18n( get_comments_number() ), get_the_title() );
			?>
		</h2>

		<?php owndefault_comment_nav(); ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'       => 'div',
					'short_ping'  => true,
					//'callback' => 'owndefault_comment',
				) );
			?>
		</ol><!-- .comment-list -->

		<?php owndefault_comment_nav(); ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'owndefault' ); ?></p>
	<?php endif; ?>

	<?php comment_form(array(
		'comment_notes_before' => '',
		'comment_notes_after' => '',
		'fields' => apply_filters( 'comment_form_default_fields', array(
			  'author' =>
			    '<p class="comment-form-author"><label class="noblock" for="author">' . '<i class="fa fa-user fa-lg fa-fw"></i> ' . '</label> ' .
			    ( $req ? '' : '' ) .
			    '<input id="author" name="author" type="text" placeholder="Name (required)" value="' . esc_attr( $commenter['comment_author'] ) .
			    '" size="30"' . $aria_req . ' /></p>',
			  'email' =>
			    '<p class="comment-form-email"><label class="noblock" for="email">' . '<i class="fa fa-envelope-o fa-lg fa-fw"></i>' . '</label> ' .
			    ( $req ? '' : '' ) .
			    '<input id="email" name="email" type="text" placeholder="E-Mail (required)" value="' . esc_attr(  $commenter['comment_author_email'] ) .
			    '" size="30"' . $aria_req . ' /></p>',
			)),

	)); ?>

</div><!-- .comments-area -->
