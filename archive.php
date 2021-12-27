<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package NoonPost
 */

get_header();
?>

<!--Categorie-->
<section class="categorie-section">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-8">
				<div class="categorie-title">
					<small>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e('Home'); ?></a>
						<span class="arrow_carrot-right"></span> <?php single_cat_title(); ?>
					</small>
					<?php the_archive_title( '<h3>', '</h3>' ); ?>
				</div>
			</div>
		</div>
	</div>
</section>
<!--/-->

<!--mansory-layout-->
<section class="masonry-layout col2-layout mt-30">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-8 mt--10 ">
				<!--cards-->
				<div class="card-columns">
					<?php
						if(have_posts()):
							while(have_posts()):
								the_post();
								/*
								* Include the Post-Type-specific template for the content.
								* If you want to override this in a child theme, then include a file
								* called content-___.php (where ___ is the Post Type name) and that will be used instead.
								*/
								get_template_part( 'template-parts/posts/post', get_post_type() );
							endwhile;
						else:	?>
					<div class="card">
						<div class="post-card">
							<div class="post-card-content">
								<?php
									get_template_part('template-parts/posts/post', 'none');
									?>
							</div>
						</div>
					</div>
					<?php 
						endif;
					?>
				</div>
				<!--pagination-->
				<?php get_template_part('template-parts/pagination'); ?>
				<!--/-->
			</div>
			<div class="col-lg-4 max-width">
				<?php
					get_sidebar();
				?>
			</div>
		</div>
	</div>
</section>
<!--/-->
<?php
get_footer();