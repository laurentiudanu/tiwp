<?php
/*
  Template Name: leadership 
*/
get_header();
$oppage_id = get_queried_object_id();
$hero = get_field("hero", $oppage_id);
$ctacopy = get_field("ctacopy", $oppage_id);
$ctabgc = get_field("ctabgc", $oppage_id);
$ccta = get_field('cctac', 'option');
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
    <div class="copy-block centered pb-32">
      <h2>Leadership Team</h2>
    </div>
    <div class="grid-row col-4 center centered">
      <?php
      $wp_queryVdcat = new WP_Query();
      $argsVdcat = array('post_type' => 'ldrs', 'posts_per_page' => -1, 'order' => 'DESC', 'orderby' => 'date');
      $wp_queryVdcat->query($argsVdcat);
      if ( $wp_queryVdcat->have_posts() ):
      while ($wp_queryVdcat->have_posts()) : $wp_queryVdcat->the_post(); 
      if (has_post_thumbnail( $post->ID ) ):
        $pfimg = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
        $pfimg = $pfimg[0];
      endif;
      $job_title = get_field("job_title", $post->ID);
      $linkedin_url = get_field("linkedin_url", $post->ID);
      ?>
      <div class="gr-entry">
        <?php if(!empty($pfimg)): ?>
        <div class="cover-w-border" style="background-image: url(<?php echo $pfimg; ?>);" loading="lazy">
          <a href="<?php the_permalink(); ?>">Click to read bio</a>
        </div>
        <?php endif; if(!empty($linkedin_url)): ?>
        <a href="<?php echo $linkedin_url; ?>" class="single-li" target="_blank" title="Links open LinkedIn in a new window">View LinkedIn Profile</a>
        <?php endif; ?>
        <div class="copy-block">
          <p><strong><?php the_title(); ?></strong></p>
          <?php if(!empty($job_title)): ?>
          <p><?php echo $job_title; ?> </p>
          <?php endif; ?>
        <p class="simple-cta"><a href="<?php the_permalink(); ?>">View Bio</a></p>
        </div>
      </div>
      <?php endwhile; endif; ?>
    </div>
  </div>
</section>
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
