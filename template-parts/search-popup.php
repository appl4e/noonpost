<?php
/**
 * Template part for displaying search from from header search icon click
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package NoonPost
 */

?>
<!--Search-form-->
<div class="search-popup">
	<div class="container-fluid">
		<div class="search-width  text-center">
			<button type="button" class="close">
				<i class="icon_close"></i>
			</button>
			<form class="search-form" method="get" action="<?php echo home_url( '/' ); ?>">
				<input type="search" value="" placeholder="<?php printf(esc_html__('What are you looking for?', 'noonpost')); ?>" name="s">
				<button type="submit" class="search-btn"><?php printf(esc_html__('search', 'noonpost')); ?></button>
			</form>
		</div>
	</div>
</div>
<!--/-->