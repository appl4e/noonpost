<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package NoonPost
 */

get_header();
?>

<section class="masonry-layout mt-100 col1-layout">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-8 mt--10 ">
				<!--cards-->
				<div class="card-columns">
					<div class="card">
						<div class="post-card">
							<div class="post-card-content">
								<?php
								while ( have_posts() ) :
									the_post();

									get_template_part( 'template-parts/content', 'page' );

									// If comments are open or we have at least one comment, load up the comment template.
									if ( comments_open() || get_comments_number() ) :
										comments_template();
									endif;

								endwhile; // End of the loop.
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 max-width">
				<?php
					get_sidebar();
				?>
			</div>
		</div>
	</div>
</section>

<?php
get_footer();