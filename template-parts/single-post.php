<?php
/**
 * Template part for displaying single post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package NoonPost
 */
?>

<!--Post-single-->
<div class="post-single">
  <div class="post-single-image">
    <?php noonpost_post_thumbnail(); ?>
  </div>
  <div class="post-single-content">
    <?php $categories = get_the_category(); ?>
    <a href="<?php echo esc_url(get_category_link($categories[0]->term_id)); ?>" class="categorie"><?php echo $categories[0]->name; ?></a>
    <h4><?php the_title(); ?> </h4>
    <?php
            $author_id = get_the_author_meta('id');
            $avatar = get_avatar($author_id);
        ?>
    <div class="post-single-info">
      <ul class="list-inline">
        <li><a href="<?php echo esc_url(get_author_posts_url($author_id)); ?>">
            <?php
              if( $avatar !== false):
              echo $avatar; 
              endif;
            ?>
          </a>
        </li>
        <li><a href="<?php echo esc_url(get_author_posts_url($author_id)); ?>"><?php noonpost_posted_by() ?></a> </li>
        <li class="dot"></li>
        <li><?php noonpost_posted_on() ?></li>
        <li class="dot"></li>
        <li><?php echo get_comments_number(); ?> comments</li>
      </ul>
    </div>
  </div>

  <div class="post-single-body">
    <?php the_content(); ?>
  </div>

  <div class="post-single-footer">
    <div class="tags">
      <ul class="list-inline">
        <?php $postTags = get_the_tags();
        if($postTags):
          foreach($postTags as $tag):
          ?>
        <li>
          <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>"><?php echo $tag->name; ?></a>
        </li>
        <?php
          endforeach; 
        endif; ?>
      </ul>
    </div>
    <div class="social-media">
      <ul class="list-inline">
        <li>
          <a href="#" class="color-facebook">
            <i class="fab fa-facebook"></i>
          </a>
        </li>
        <li>
          <a href="#" class="color-instagram">
            <i class="fab fa-instagram"></i>
          </a>
        </li>
        <li>
          <a href="#" class="color-twitter">
            <i class="fab fa-twitter"></i>
          </a>
        </li>
        <li>
          <a href="#" class="color-youtube">
            <i class="fab fa-youtube"></i>
          </a>
        </li>
        <li>
          <a href="#" class="color-pinterest">
            <i class="fab fa-pinterest"></i>
          </a>
        </li>
      </ul>
    </div>
  </div>
</div>
<!--/-->