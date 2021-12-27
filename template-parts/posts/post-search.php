<?php
/**
 * Template part for displaying a searched content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package NoonPost
 */

?>

<?php the_title('<h5><a href="'.esc_url(get_permalink()).'">', '</a></h5>'); ?>
<!-- <h5><a href="post-default.html"></a> </h5> -->
<p class="mb-2">
  <?php
    echo substr(get_the_excerpt(), 0, 100);
  ?>
</p>
<div>
  <?php $categories = get_the_category();
    $the_category = count($categories)>0 ? $categories[0]-> name: '';
    $the_category_link = count($categories)>0 ? get_category_link($categories[0]->term_id) : '';
    if(count($categories)>0):
      foreach($categories as $category):
        ?>
  <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>" class="categorie"><?php echo $category->name; ?></a>
  <?php
    endforeach;
    endif;
  ?>

</div>
<div class="post-card-info">
  <ul class="list-inline">
    <li>
      <?php
        $author_id = get_the_author_meta('ID');
        $avatar = get_avatar($author_id);
      ?>
      <a href="<?php echo esc_url(get_author_posts_url($author_id)); ?>">
        <?php
          if( $avatar !== false):
            echo $avatar; 
          endif;
        ?>
      </a>
    </li>
    <li>
      <a href="<?php echo esc_url(get_author_posts_url($author_id)); ?>"><?php noonpost_posted_by() ?></a>
    </li>
    <li class="dot"></li>
    <li><?php noonpost_posted_on() ?></li>
  </ul>
</div>