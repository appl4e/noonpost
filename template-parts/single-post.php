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
    <?php $categories = get_the_category();
      $the_category = count($categories)>0 ? $categories[0]-> name: '';
      $the_category_link = count($categories)>0 ? get_category_link($categories[0]->term_id) : '';
      if(count($categories)>0):
    ?>
    <a href="<?php echo esc_url($the_category_link); ?>" class="categorie"><?php esc_html_e($the_category); ?></a>
    <?php
      endif;
    ?>
    <h4><?php the_title(); ?> </h4>
    <?php
            $author_id = get_the_author_meta('ID');
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
    <!-- social share links template -->
    <?php get_template_part('template-parts/post-social-share'); ?>
  </div>
</div>
<!--/-->