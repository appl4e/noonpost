<?php
/**
 * Template part for displaying pagination for posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package NoonPost
 */

?>
<!--pagination-->
<?php 
					global $wp_query;
					$big = 999999;

					$pages = paginate_links( array(
						'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
						'format' => '?paged=%#%',
						'current' => max( 1, get_query_var('paged') ),
						'total' => $wp_query->max_num_pages,
						'prev_text' => '<i class="arrow_carrot-2left"></i>',
						'next_text' => '<i class="arrow_carrot-2right"></i>',
						'type'  => 'array',
					) );
					if(is_array($pages)):
						$paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
					?>
<div class="pagination mt-30">
  <ul class="list-inline">
    <?php foreach ($pages as $page): ?>
    <li>
      <?php echo $page; ?>
    </li>
    <?php endforeach; ?>
  </ul>
</div>
<?php endif; ?>