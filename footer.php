<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package NoonPost
 */

?>

<?php get_template_part('template-parts/newsletter');?>
<!--footer-->
<footer class="footer">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<div class="copyright">
					<p>
						<?php echo	cmb2_get_option('noonpost_theme_options','noonpost_copyright_text'); ?>
					</p>
				</div>
				<div class="back">
					<a href="#" class="back-top">
						<i class="arrow_up"></i>
					</a>
				</div>
			</div>
		</div>
	</div>
</footer>

<?php get_template_part('template-parts/search-popup');?>

</div><!-- #page -->

<?php wp_footer();?>

</body>

</html>