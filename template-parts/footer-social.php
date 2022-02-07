<?php
/**
 * Template part for displaying footer social icons below newsletter
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package NoonPost
 */

?>

<!-- Social Icons Widget -->
<div class="social-icones">
  <ul class="list-inline">
    <?php
      $fbLink = cmb2_get_option('noonpost_theme_options', 'noonpost_facebook_link');
      if($fbLink):
    ?>
    <li>
      <a href="<?php echo esc_url($fbLink); ?>">
        <i class="fab fa-facebook-f"></i>Facebook</a>
    </li>
    <?php endif; ?>
    <?php
								$twitterLink = cmb2_get_option('noonpost_theme_options', 'noonpost_twitter_link');
								if($twitterLink):
							?>
    <li>
      <a href="<?php echo esc_url($twitterLink); ?>">
        <i class="fab fa-twitter"></i>Twitter</a>
    </li>
    <?php endif; ?>
    <?php
								$instaLink = cmb2_get_option('noonpost_theme_options', 'noonpost_insta_link');
								if($instaLink):
							?>
    <li>
      <a href="<?php echo esc_url($instaLink); ?>">
        <i class="fab fa-instagram"></i>Instagram</a>
    </li>
    <?php endif; ?>
    <?php
								$ytLink = cmb2_get_option('noonpost_theme_options', 'noonpost_youtube_link');
								if($ytLink):
							?>
    <li>
      <a href="<?php echo esc_url($ytLink); ?>">
        <i class="fab fa-youtube"></i>Youtube</a>
    </li>
    <?php endif; ?>
  </ul>
</div>