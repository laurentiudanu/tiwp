<?php
get_header();
if ( have_posts() ) : while ( have_posts() ) : the_post();
if (has_post_thumbnail( $post->ID ) ):
$blgefihbg = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
$bio_image = $blgefihbg[0];
endif;
$oppage_id = get_queried_object_id();
$hero_copy = get_field("hero_copy", $oppage_id);
$job_title = get_field("job_title", $oppage_id);
$linkedin_url = get_field("linkedin_url", $oppage_id);
$ctacopy = get_field("ctacopy", $oppage_id);
$ctabgc = get_field("ctabgc", $oppage_id);
$ccta = get_field('cctac', 'option');
?>
<section class="simple-hero">
  <div class="copy copy-block">
    <?php echo $hero_copy; ?>
  </div>
  <?php if(!empty($bio_image)): ?>
  <div class="image">
    <div class="cover-w-border" style="background-image: url(<?php echo $bio_image; ?>);" loading="lazy"></div>
  </div>
  <?php endif; ?>
</section>
<section class="row animated-block">
  <div class="container copy-block article">
    <?php the_content(); ?>
  </div>
</section>
<?php endwhile; endif; ?>
<?php if(!empty($ctacopy)): ?>
<section class="row animated-block<?php echo " ".$ctabgc; ?>">
  <div class="container copy-block cta-block">
    <?php echo $ctacopy; ?>
  </div>  
</section>
<?php else: ?>
<?php if(!empty($ccta)): ?>
<section class="row animated-block">
  <div class="container copy-block cta-block">
    <?php echo $ccta; ?>
  </div>  
</section>
<?php endif; ?>
<?php endif; ?>
<?php get_footer();?>
