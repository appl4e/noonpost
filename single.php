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
						$prevPost= get_previous_post();
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
						$nextPost= get_next_post();
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