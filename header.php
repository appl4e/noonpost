<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package NoonPost
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'noonpost' ); ?></a>

		<!--loading -->
		<div class="loading">
			<div class="circle"></div>
		</div>
		<!--/-->

		<!-- Navigation-->
		<nav class="navbar navbar-expand-lg fixed-top">
			<div class="container-fluid">
				<!--logo-->
				<div class="logo">
					<?php 
					if(has_custom_logo()):
						?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<?php	the_custom_logo();?>
					</a>
					<?php
					else:
						if ( is_front_page() && is_home() ) :
							?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
						else :
							?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
						endif;
					endif;
					?>
				</div>
				<!--/-->

				<!--navbar-collapse-->
				<div class="collapse navbar-collapse" id="main_nav">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
							'menu_class'		 =>	'navbar-nav ml-auto mr-auto',
							'container'			 => ''
						)
					);
					?>
					<!-- <ul class="navbar-nav ml-auto mr-auto">
							<li class="nav-item">
									<a class="nav-link active" href="index.html"> Home </a>
							</li>

							<li class="nav-item">
									<a class="nav-link" href="about.html"> About </a>
							</li>
							<li class="nav-item">
									<a class="nav-link" href="contact.html"> Contact </a>
							</li>
					</ul> -->
				</div>
				<!--/-->

				<!--navbar-right-->
				<div class="navbar-right ml-auto">
					<div class="theme-switch-wrapper">
						<label class="theme-switch" for="checkbox">
							<input type="checkbox" id="checkbox" />
							<div class="slider round"></div>
						</label>
					</div>
					<div class="social-icones">
						<ul class="list-inline">
							<?php
								$fbLink = cmb2_get_option('noonpost_theme_options', 'noonpost_facebook_link');
								if($fbLink):
							?>
							<li>
								<a href="<?php echo esc_url($fbLink); ?>">
									<i class="fab fa-facebook-f"></i></a>
							</li>
							<?php endif; ?>
							<?php
								$twitterLink = cmb2_get_option('noonpost_theme_options', 'noonpost_twitter_link');
								if($twitterLink):
							?>
							<li>
								<a href="<?php echo esc_url($twitterLink); ?>">
									<i class="fab fa-twitter"></i></a>
							</li>
							<?php endif; ?>
							<?php
								$instaLink = cmb2_get_option('noonpost_theme_options', 'noonpost_insta_link');
								if($instaLink):
							?>
							<li>
								<a href="<?php echo esc_url($instaLink); ?>">
									<i class="fab fa-instagram"></i></a>
							</li>
							<?php endif; ?>
							<?php
								$ytLink = cmb2_get_option('noonpost_theme_options', 'noonpost_youtube_link');
								if($ytLink):
							?>
							<li>
								<a href="<?php echo esc_url($ytLink); ?>">
									<i class="fab fa-youtube"></i></a>
							</li>
							<?php endif; ?>
						</ul>
					</div>

					<div class="search-icon">
						<i class="icon_search"></i>
					</div>

					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav" aria-expanded="false"
						aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
				</div>
			</div>
		</nav>
		<!--/-->