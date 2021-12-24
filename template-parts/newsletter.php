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
							<div class="newslettre-info">
									<h5><?php esc_html_e('Subscribe to our Newslatter', 'noonpost');?></h5>
									<p><?php esc_html_e('Sign up for free and be the first to get notified about new posts.');?></p>
							</div>
							<form action="#" class="newslettre-form">
									<div class="form-flex">
											<div class="form-group">
													<input type="email" class="form-control" placeholder="<?php esc_html_e('Your email adress');?>" required="required">
											</div>
											<button class="submit-btn" type="submit"><?php esc_html_e('Subscribe');?></button>
									</div>
							</form>
              <!-- Social Icons Widget -->
              <?php dynamic_sidebar('footer-social');?>
					</div>
			</div>
	</section>