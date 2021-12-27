<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package NoonPost
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<!--widget-comments-->
<div class="widget mb-50">
	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		$noonpost_comment_count = get_comments_number();
	?>
	<div class="title">
		<h5><?php echo $noonpost_comment_count . ($noonpost_comment_count === '1' ? ' comment' : ' comments');?></h5>
	</div>
	<?php endif;?>

	<?php
		wp_list_comments(
			array(
				'style'      => '',
				'short_ping' => true,
				'callback' => 'better_comments'
			)
		);
	?>
	<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
	<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'noonpost' ); ?></p>
	<?php
		endif;
	?>
	<!--Leave-comments-->

	<?php comment_form(array(
		'fields' => array(
			'author' => '<input type="text" name="name" id="name" class="form-control mb-3" placeholder="Name*" required="required">',
			'email' => '<input type="email" name="email" id="email" class="form-control mb-3" placeholder="Email*" required="required">',
			'url' => '<input type="text" name="website" id="website" class="form-control mb-3" placeholder="website">'

		),
		'comment_field' => '<textarea name="message" id="message" cols="30" rows="5" class="form-control mb-3" placeholder="Message*" required="required"></textarea>',
		'class_form' => 'widget-form',
		'submit_button' => '<button name="%1$s" type="submit" id="%2$s" class="btn-custom %3$s">%4$s</button>',
		'title_reply' => '<div class="title"><h5>Leave a Reply</h5></div>'

	)); ?>
</div>