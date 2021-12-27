<?php
/**
 * Template part for displaying newsletter from above footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package NoonPost
 */

?>

<!--newslettre-->
<section class="newslettre">
	<div class="container-fluid">
		<div class="newslettre-width text-center">
			<?php $shortcode = cmb2_get_option('noonpost_theme_options', 'noonpost_newsletter');
				if($shortcode):
			?>
			<div class="newslettre-info">
				<h5><?php esc_html_e('Subscribe to our Newslatter', 'noonpost');?></h5>
				<p><?php esc_html_e('Sign up for free and be the first to get notified about new posts.');?></p>
			</div>

			<div class="newslettre-form">
				<?php echo do_shortcode( $shortcode  ) ; ?>
			</div>
			<?php endif ?>

			<?php get_template_part('template-parts/footer-social');?>
		</div>
	</div>
</section>