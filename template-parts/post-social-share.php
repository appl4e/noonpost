<?php
/**
 * Template part for displaying social sharing link on single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package NoonPost
 */

?>
<div class="social-media">
  <?php 
    $url = get_the_permalink();
    $title = get_the_title();
    $image = get_the_post_thumbnail_url();
    $hashtags = '';
    $postTags = get_the_tags();
    if($postTags){
      foreach($postTags as $tag){
        $hashtags .= $tag->name. ',';
      }
    }
  ?>
  <ul class="list-inline">
    <li>
      <a href='<?php echo "https://www.facebook.com/sharer.php?u=$url" ?>' class="color-facebook">
        <i class="fab fa-facebook"></i>
      </a>
    </li>
    <li>
      <a href='<?php echo "https://reddit.com/submit?url=$url&title=$title" ?>' class="color-instagram">
        <i class="fab fa-reddit"></i>
      </a>
    </li>
    <li>
      <a href='<?php echo "https://twitter.com/share?url=$url&text=$title&hashtags=$hashtags" ?>' class="color-twitter">
        <i class="fab fa-twitter"></i>
      </a>
    </li>
    <li>
      <a href='<?php echo "https://www.linkedin.com/shareArticle?url=$url]&title=$title" ?>' class="color-facebook">
        <i class="fab fa-linkedin"></i>
      </a>
    </li>
    <li>
      <a href='<?php echo "https://pinterest.com/pin/create/bookmarklet/?media=$image&url=$url&description=$title" ?>' class="color-pinterest">
        <i class="fab fa-pinterest"></i>
      </a>
    </li>
  </ul>
</div>