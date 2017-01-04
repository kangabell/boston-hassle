<!--
COMMENTS
Used on single.php.
-->

<section class="comments">

	<?php if ( have_comments() ) : ?>
		<h2>Comments</h2>

		<?php the_comments_navigation(); ?>

		<ul class="comment-list">
			<?php
				wp_list_comments( array(
					'style'       => 'ul',
					'short_ping'  => true,
					'avatar_size' => 42,
				) );
			?>
		</ul>

		<?php the_comments_navigation(); ?>

	<?php endif; ?>

	<?php
		// if comments are closed and there are comments
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'bhass' ); ?></p>
	<?php endif; ?>

	<?php
		comment_form( array(
			'title_reply_before' => '<h3>',
			'title_reply' => 'Leave a Comment',
			'title_reply_after'  => '</h3>',
		) );
	?>

</section>
