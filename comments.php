<?php 
	if ( comments_open() || get_comments_number() ) { 
		if ( post_password_required() ) { return; } 
?>
<div id="comments" class="comments-area">
	<?php if ( have_comments() ) : ?>
		<h4 class="comments-title">
			<?php comments_number( esc_html__( 'No Comments', 'dutch' ), esc_html__( 'One Comment', 'dutch' ), esc_html__( '% Comments', 'dutch' ) ); ?>
		</h4>
		<ol class="comment-list">
			<?php wp_list_comments( array( 'style' => 'ol', 'short_ping' => true, 'avatar_size' => 40, ) ); ?>
		</ol>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<nav class="comment-navigation" role="navigation">
				<h6><?php previous_comments_link( __( 'Older Comments &#10095;', 'dutch' ) ); ?></h6>
				<h6><?php next_comments_link( __( '&#10094; Newer Comments', 'dutch' ) ); ?></h6>
			</nav>
		<?php endif; ?>
		<?php if ( ! comments_open() && get_comments_number() ) : ?>
			<h5 class="no-comments"><?php _e( 'Comments are closed.', 'dutch' ); ?></h5>
		<?php endif; ?>
	<?php 
		endif; 
		comment_form(); 
	?>
</div>
<?php } ?>