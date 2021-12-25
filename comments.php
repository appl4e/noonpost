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

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
	<h2 class="comments-title">
		<?php
			$noonpost_comment_count = get_comments_number();
			if ( '1' === $noonpost_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'noonpost' ),
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			} else {
				printf( 
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $noonpost_comment_count, 'comments title', 'noonpost' ) ),
					number_format_i18n( $noonpost_comment_count ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			}
			?>
	</h2><!-- .comments-title -->

	<?php the_comments_navigation(); ?>

	<ol class="comment-list">
		<?php
			wp_list_comments(
				array(
					'style'      => 'ol',
					'short_ping' => true,
				)
			);
			?>
	</ol><!-- .comment-list -->

	<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
	<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'noonpost' ); ?></p>
	<?php
		endif;

	endif; // Check for have_comments().

	comment_form();
	?>

</div><!-- #comments -->

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
	<ul class="widget-comments">
		<?php
			$comments_query = new WP_Comment_Query;
			$comments = $comments_query->query(array('status'=> 'approve'));
			// var_dump($comments);
			if($comments):
				foreach($comments as $comment):
				?>
		<li class="comment-item">
			<img src="assets/img/user/1.jpg" alt="">
			<div class="content">
				<ul class="info list-inline">
					<li><?php echo $comment->comment_author; ?></li>
					<li class="dot"></li>
					<li><?php echo $comment->comment_date; ?></li>
				</ul>
				<p><?php echo $comment->comment_content; ?></p>
				<div><?php echo get_comment_reply_link([], $comment); ?><a href="#" class="link"> <i class="arrow_back"></i> Reply</a></div>
			</div>
		</li>
		<?php endforeach;
			endif;?>
	</ul>
	<!--Leave-comments-->
	<div class="title">
		<h5>Leave a Reply</h5>
	</div>
	<form class="widget-form" action="#" method="POST" id="main_contact_form">
		<p>Your email adress will not be published ,Requied fileds are marked*.</p>
		<div class="alert alert-success contact_msg" style="display: none" role="alert">
			Your message was sent successfully.
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<textarea name="message" id="message" cols="30" rows="5" class="form-control" placeholder="Message*" required="required"></textarea>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<input type="text" name="name" id="name" class="form-control" placeholder="Name*" required="required">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<input type="email" name="email" id="email" class="form-control" placeholder="Email*" required="required">
				</div>
			</div>
			<div class="col-12 mb-20">
				<div class="form-group">
					<input type="text" name="website" id="website" class="form-control" placeholder="website">
				</div>
				<label>
					<input name="name" type="checkbox" value="1" required="required">
					<span>save my name , email and website in this browser for the next time I comment.</span>
				</label>
			</div>
			<div class="col-12">
				<button type="submit" name="submit" class="btn-custom">
					Post Comment
				</button>
			</div>
		</div>
	</form>
</div>