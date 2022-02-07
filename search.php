<?php
  /**
   * The template for displaying search results pages
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
   *
   * @package NoonPost
 */get_header();?>
<section class="masonry-layout mt-100 col1-layout">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-8 mt--10 ">
				<!--cards-->
				<div class="card-columns">
					<!--Post-1-->
					<?php if (have_posts()): ?>
					<div class="categorie-title">
						<h3 class="mt-n60">
							<?php
              printf(esc_html__('Search Results for: %s', 'noonpost'), '<span>' . get_search_query() . '</span>');?>
						</h3>
					</div>

					<?php
          while (have_posts()): the_post();?>
						<div class="card">
							<div class="post-card">
								<div class="post-card-content">
									<?php
                      /**
                       * Run the loop for the search to output the results.
                       * If you want to overload this in a child theme then include a file
                       * called content-search.php and that will be used instead.
                     */get_template_part('template-parts/posts/post', 'search');?>
								</div>
							</div>
						</div>
						<?php
            endwhile;?>



					<?php
          else:get_template_part('template-parts/posts/post', 'none');endif;?>
				</div>

				<!--pagination-->
				<?php get_template_part('template-parts/pagination');?>
			</div>
			<div class="col-lg-4 max-width">
				<?php
        get_sidebar();?>
			</div>
		</div>
	</div>
</section>
<?php
get_footer();