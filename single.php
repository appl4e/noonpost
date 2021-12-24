<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package NoonPost
 */

get_header();
?>
<!--post-default-->
<section class="section pt-55 ">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-8 mb-20">

				<?php
				while (have_posts()):
					the_post();
					get_template_part('template-parts/single-post');
					// the_post_navigation(
					// 	array(
					// 			'prev_text' => '<span class="nav-subtitle">' . esc_html__('Previous:', 'noonpost') . '</span> <span class="nav-title">%title</span>',
					// 			'next_text' => '<span class="nav-subtitle">' . esc_html__('Next:', 'noonpost') . '</span> <span class="nav-title">%title</span>',
					// 	)
					// );
				?>

				<!--next & previous-posts-->

				<div class="row">
					<?php
						$prevPost= get_adjacent_post(true, '', true);
						if(is_a($prevPost, 'WP_Post')):
					?>
					<div class="col-md-6">
						<div class="widget">
							<div class="widget-next-post">
								<div class="small-post">
									<div class="image">
										<a href="<?php echo get_permalink($prevPost->ID); ?>">
											<!-- <img src="assets/img/latest/1.jpg" alt="..."> -->
											<?php echo get_the_post_thumbnail($prevPost->ID); ?>
										</a>
									</div>
									<div class="content">
										<div>
											<a class="link" href="<?php echo get_permalink($prevPost->ID); ?>"><i class="arrow_left"></i>Preview post</a>
										</div>
										<a href="<?php echo get_permalink($prevPost->ID); ?>"><?php echo get_the_title($prevPost->ID); ?></a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php
						endif;
						$nextPost= get_adjacent_post(true, '', false);
						if(is_a($nextPost, 'WP_Post')):	
					?>
					<div class="col-md-6">
						<div class="widget">
							<div class="widget-previous-post">
								<div class="small-post">
									<div class="image">
										<a href="<?php echo get_permalink($nextPost->ID); ?>">
											<?php echo get_the_post_thumbnail($nextPost->ID); ?>
										</a>
									</div>
									<div class="content">
										<div>
											<a class="link" href="<?php echo get_permalink($nextPost->ID); ?>">
												<span> Next post</span>
												<span class="arrow_right"></span>
											</a>
										</div>
										<a href="<?php echo get_permalink($nextPost->ID); ?>"><?php echo get_the_title($nextPost->ID); ?></a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php
						endif; ?>
				</div>
				<!--/-->

				<?php
				// If comments are open or we have at least one comment, load up the comment template.
					if (comments_open() || get_comments_number()):
						comments_template();
					endif;
				endwhile;
				?>
				<!--widget-comments-->
				<div class="widget mb-50">
					<div class="title">
						<h5>3 Comments</h5>
					</div>
					<ul class="widget-comments">
						<li class="comment-item">
							<img src="assets/img/user/1.jpg" alt="">
							<div class="content">
								<ul class="info list-inline">
									<li>Mohammed Ali</li>
									<li class="dot"></li>
									<li> January 15, 2021</li>
								</ul>
								<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellendus at doloremque adipisci eum placeat
									quod non fugiat aliquid sit similique!
								</p>
								<div><a href="#" class="link"> <i class="arrow_back"></i> Reply</a></div>
							</div>
						</li>
						<li class="comment-item">
							<img src="assets/img/author/1.jpg" alt="">
							<div class="content">
								<ul class="info list-inline">
									<li>Simon Albert</li>
									<li class="dot"></li>
									<li> January 15, 2021</li>
								</ul>

								<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellendus at doloremque adipisci eum placeat quod non
									fugiat aliquid sit similique!
								</p>
								<div>
									<a href="#" class="link">
										<i class="arrow_back"></i> Reply</a>
								</div>
							</div>
						</li>
						<li class="comment-item">
							<img src="assets/img/user/2.jpg" alt="">
							<div class="content">

								<ul class="info list-inline">
									<li>Adam bobly</li>
									<li class="dot"></li>
									<li> January 15, 2021</li>
								</ul>

								<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellendus at doloremque adipisci eum placeat
									quod non fugiat aliquid sit similique!
								</p>

								<div>
									<a href="#" class="link">
										<i class="arrow_back"></i> Reply</a>
								</div>
							</div>
						</li>
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
			</div>
			<div class="col-lg-4 max-width">
				<?php get_template_part('template-parts/single-post-sidebar')?>
			</div>
		</div>
	</div>
</section>
<!--/-->

<?php
get_footer();