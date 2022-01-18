<?php
/*
  Template Name: contact us 
*/
get_header();
$oppage_id = get_queried_object_id();
$hero = get_field("hero", $oppage_id);
$stc = get_field("stc", $oppage_id);
$main_copy = get_field("main_copy", $oppage_id);
$cu_copy = get_field("cu_copy", $oppage_id);
$loc_copy = get_field("loc_copy", $oppage_id);
$em_copy = get_field("em_copy", $oppage_id);
$wrt_copy = get_field("wrt_copy", $oppage_id);
$hrs_copy = get_field("hrs_copy", $oppage_id);
?>
<section class="simple-hero">
  <div class="copy copy-block">
    <?php echo $hero['hero_copy']; ?>
  </div>
  <?php if(!empty($hero['hero_image'])): ?>
  <div class="image" style="background-image: url(<?php echo $hero['hero_image']; ?>);" loading="lazy"></div>
  <?php endif; ?>
</section>
<section class="row animated-block">
  <div class="container">
    <div class="grid-row col-2 uneven-spacing">
      <div class="gr-entry">
        <div class="copy-block">
          <?php echo $main_copy['copy_block']; ?>
          <div class="grid-row col-2 contact-info pt-40">
            <?php if(!empty($cu_copy)): ?>
            <div class="gr-entry w-icon call copy-block">
              <?php echo $cu_copy; ?>
            </div>
            <?php endif; if(!empty($em_copy)): ?>
            <div class="gr-entry w-icon email copy-block">
               <?php echo $em_copy; ?>
            </div>
            <?php endif; if(!empty($loc_copy)): ?>
            <div class="gr-entry w-icon visit copy-block">
               <?php echo $loc_copy; ?>
            </div>
            <?php endif; if(!empty($wrt_copy)): ?>
            <div class="gr-entry w-icon write copy-block">
               <?php echo $wrt_copy; ?>
            </div>
            <?php endif; if(!empty($hrs_copy)): ?>
            <div class="gr-entry w-icon write copy-block">
               <?php echo $hrs_copy; ?>
            </div>
            <?php endif; ?>
            <div class="gr-entry">
              <h4>Connect With Us</h4>
              <p class="social-links blue">
                <?php $sl = get_field('social_links', 'option'); ?>
                <?php if(!empty($sl['fb'])): ?><a href="<?php echo $sl['fb']; ?>" class="fb" target="_blank">Facebook</a><?php endif; ?>
                <?php if(!empty($sl['tw'])): ?><a href="<?php echo $sl['tw']; ?>" class="tw" target="_blank">Twitter</a><?php endif; ?>
                <?php if(!empty($sl['li'])): ?><a href="<?php echo $sl['li']; ?>" class="li" target="_blank">LinkedIn</a><?php endif; ?>
                <?php if(!empty($sl['yt'])): ?><a href="<?php echo $sl['yt']; ?>" class="yt" target="_blank">YouTube</a><?php endif; ?>
                <?php if(!empty($sl['ig'])): ?><a href="<?php echo $sl['ig']; ?>" class="ig" target="_blank">Instagram</a><?php endif; ?>
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="gr-entry form-wrapper">
        <!--[if lte IE 8]>
        <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
        <![endif]-->
        <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
        <script>
          hbspt.forms.create({
          region: "na1",
          portalId: "8952232",
          formId: "f4498e26-fe22-46d4-aa99-78cc19af47fc"
        });
        </script>
      </div> 
    </div>
  </div>
</section>
<!--
<section class="fw-video-player animated-block">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3281.753290782762!2d-77.0569694847688!3d34.660932980444734!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89a8fa932c129bcd%3A0x15be97db51155b40!2sTransportation%20Impact!5e0!3m2!1sen!2sro!4v1624780251479!5m2!1sen!2sro" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
</section>
-->
<section class="row silver animated-block">
  <div class="container">
    <div class="simple-testimonial-slide to-hide">
    <?php 
    $pcount = 0;
    $wp_queryVdcat = new WP_Query();
    $argsVdcat = array('post_type' => array('tstm'), 'order' => 'DESC', 'orderby' => 'date', 'posts_per_page' => 6);
    $wp_queryVdcat->query($argsVdcat);
    if ( $wp_queryVdcat->have_posts() ): while ($wp_queryVdcat->have_posts()) : $wp_queryVdcat->the_post();
    $job_title = get_field("job_title", $post->ID);
    ?>
    <div class="sts-entry">
      <div class="copy-block centered">
        <?php the_content(); ?>
    <p><strong>&mdash; <?php the_title(); ?></strong><br><?php echo $job_title; ?></p>
      </div>
    </div>
    <?php  endwhile; endif; ?> 

    </div>
  </div>
</section>
<?php get_footer();?>
