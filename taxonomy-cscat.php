<?php get_header(); ?>
<section class="simple-hero no-thumb article">
  <div class="copy copy-block centered">
    <h1><?php single_cat_title(); ?></h1>
  </div>
</section>
<section class="row">
  <div class="container">
    <div class="grid-row col-3 center">
    <?php 
    if ( have_posts() ) : while ( have_posts() ) : the_post();
    $mexcerpt = get_field("mexcerpt", $post->ID); 
    if (has_post_thumbnail( $post->ID ) ):
      $pfimg = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
      $pfimg = $pfimg[0];
    endif;
    ?>
      <div class="gr-entry">
        <div class="csl-thumb"<?php if(!empty($pfimg)): ?> style="background-image: url(<?php echo $pfimg; ?>);" <?php endif; ?>loading="lazy">
          <a href="<?php the_permalink(); ?>">Read <?php the_title(); ?></a>
        </div>
        <div class="copy-block pb-16">
          <?php echo $mexcerpt; ?>
        </div>
        <p class="simple-cta"><a href="<?php the_permalink(); ?>">Learn More</a></p>
      </div>
    <?php endwhile; base_pagination(); ?>
    <?php endif; ?>
    </div>
  </div>
</section>
<section class="row silver animated-block">
  <div class="container">
    <div class="simple-testimonial-slide to-hide">
    <?php 
    $wp_queryVdcat = new WP_Query();
    $argsVdcat = array('post_type' => array('tstm'), 'order' => 'DESC', 'orderby' => 'date', 'posts_per_page' => 6);
    $wp_queryVdcat->query($argsVdcat);
    if ( $wp_queryVdcat->have_posts() ): while ($wp_queryVdcat->have_posts()) : $wp_queryVdcat->the_post();
    $job_title = get_field("job_title", $post->ID);
    ?>
    <div class="sts-entry">
      <div class="copy-block centered">
        <?php if(strlen(get_the_content()) > 180): echo "<p>".cexcerpt(40)."</p>"; else: the_content(); endif; ?>
    <p><strong>&mdash; <?php the_title(); ?></strong><br><?php echo $job_title; ?></p>
      </div>
    </div>
    <?php endwhile; endif; ?> 
    </div>
  </div>
</section>
<?php $ccta = get_field('cctac', 'option'); if(!empty($ccta)): ?>
<section class="row animated-block">
  <div class="container copy-block cta-block">
    <?php echo $ccta; ?>
  </div>  
</section>
<?php endif; ?>
<?php get_footer();?>
