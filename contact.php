<?php
/**
 * Template Name: Contact Page
 *
 * This is the template that can be use for contact page. * 
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package NoonPost
 */

get_header();
?>

<!--contact us-->
<section class="section pt-50">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="section-title">
          <h5><?php the_title(); ?></h5>
        </div>
      </div>
    </div>

    <div class="row mb-20">
      <div class="col-lg-8 mt-30">
        <div class="contact">
          <?php $gmap = get_post_meta(get_the_id(),'noonpost_gmap_embed_link', true );
            if($gmap):
            ?>
          <div class="google-map">
            <?php
              echo $gmap;
            ?>
          </div>
          <?php endif; ?>
          <?php 
              $contact_form_shortcode = get_post_meta(get_the_id(),'noonpost_contact_form_shortcode', true);
              if($contact_form_shortcode):
              ?>
          <div class="widget-form contact_form ">
            <h6>Feel free to contact any time.</h6>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates, repudiandae.</p>
            <?php 
            echo do_shortcode($contact_form_shortcode); ?>
          </div>
          <?php endif; ?>
        </div>
      </div>
      <div class="col-lg-4 max-width">
        <?php dynamic_sidebar( 'sidebar-3' ) ?>
      </div>
    </div>
  </div>
</section>

<?php
  get_footer();
?>