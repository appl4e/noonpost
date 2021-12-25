<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package NoonPost
 */

?>

<!--Post-1-->
<div class="card">
  <div class="post-card">
    <div class="post-card-image">
      <a href="post-default.html">
        <?php the_post_thumbnail(); ?>
      </a>
    </div>
    <div class="post-card-content">
      <?php $categories = get_the_category();
        $the_category = count($categories)>0 ? $categories[0]-> name: '';
        $the_category_link = count($categories)>0 ? get_category_link($categories[0]->term_id) : '';
        if(count($categories)>0):
      ?>
      <a href="<?php echo esc_url($the_category_link); ?>" class="categorie"><?php echo $the_category; ?></a>
      <?php
        endif;
      ?>
      <?php the_title('<h5><a href="'.esc_url(get_permalink()).'">', '</a></h5>'); ?>
      <!-- <h5><a href="post-default.html"></a> </h5> -->
      <p>
        <?php
            the_content(
              sprintf(
                wp_kses(
                  /* translators: %s: Name of current post. Only visible to screen readers */
                  __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'noonpost' ),
                  array(
                    'span' => array(
                      'class' => array(),
                    ),
                  )
                ),
                wp_kses_post( get_the_title() )
              )
            );
          ?>
      </p>
      <div class="post-card-info">
        <ul class="list-inline">
          <li>
            <?php
                    $author_id = get_the_author_meta('id');
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
    </div>
  </div>
  <!--/-->
</div>