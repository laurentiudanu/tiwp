<?php
/*
  Template Name: case study listing 
*/
get_header();
$oppage_id = get_queried_object_id();
$fc = get_field("flexible_content", $oppage_id);
$ccta = get_field('cctac', 'option');
?>
<?php foreach($fc as $fce): 
//echo $fce['acf_fc_layout']; 
?>
  <?php if($fce['acf_fc_layout'] == "simple_copy_block"){ ?>
  <section class="row animated-block <?php echo $fce['row_bg_color']; ?>">
    <div class="copy-block container<?php if($fce['cwidth'] == "article"): echo " thin"; endif; ?>">
      <?php echo $fce['copy_block']; ?> 
    </div>
  </section>
  <?php } elseif($fce['acf_fc_layout'] == "cbwiv") { ?>
  <section class="row animated-block <?php echo $fce['row_bgc']; ?>">
    <div class="container">
      <div class="grid-row col-6-4">
        <?php if($fce['image_alignment'] == "left"): ?>
        <div class="gr-entry image-card relative">
          <div class="image-card relative" style="background-image: url(<?php echo $fce['image']; ?>);" loading="lazy"></div>
          <?php if(!empty($fce['over_image_img'])): ?>
          <div class="ic-over-info only-image">
            <div class="ioi-inner">
              <img src="<?php echo $fce['over_image_img']['url']; ?>" alt="<?php echo $fce['over_image_img']['alt']; ?>">
            </div>
          </div>
          <?php endif; ?>
          <?php if(!empty($fce['over_image_info'])): ?>
          <div class="ic-over-info">
             <div class="ioi-inner">
              <?php echo $fce['over_image_info']; ?>
             </div>
          </div>
          <?php endif; ?>
        </div>
        <div class="gr-entry copy-block"><?php echo $fce['copy']; ?></div>
        <?php elseif($fce['image_alignment'] == "right"): ?>
        <div class="gr-entry copy-block first-item"><?php echo $fce['copy']; ?></div>
        <div class="gr-entry image-card to-right relative">
          <div class="image-card relative" style="background-image: url(<?php echo $fce['image']; ?>);" loading="lazy"></div>
          <?php if(!empty($fce['over_image_img'])): ?>
          <div class="ic-over-info only-image">
            <div class="ioi-inner">
              <img src="<?php echo $fce['over_image_img']['url']; ?>" alt="<?php echo $fce['over_image_img']['alt']; ?>">
            </div>
          </div>
          <?php endif; ?>
          <?php if(!empty($fce['over_image_info'])): ?>
          <div class="ic-over-info">
             <div class="ioi-inner">
              <?php echo $fce['over_image_info']; ?>
             </div>
          </div>
          <?php endif; ?>
       </div>
        <?php endif; ?>
      </div>
    </div>
  </section>
  <?php } elseif($fce['acf_fc_layout'] == "tstm") { ?>
  <section class="row animated-block <?php echo $fce['row_bgc']; ?>">
    <div class="container">
      <div class="simple-testimonial-slide to-hide">
      <?php 
      $pcount = 0;
      $wp_queryVdcat = new WP_Query();
      if(count($fce['specific_entries']) > 0):
        $argsVdcat = array('post_type' => array('tstm'), 'post__in' => $fce['specific_entries'], 'post_status' => array('publish'), 'order' => 'DESC', 'orderby' => 'post__in', 'posts_per_page' => -1);
      else:
        $argsVdcat = array('post_type' => array('tstm'), 'order' => 'DESC', 'orderby' => 'date', 'posts_per_page' => 6);
      endif;
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
  <?php } elseif($fce['acf_fc_layout'] == "shero") { ?>
  <section class="simple-hero<?php if(empty($fce['shero_image'])): echo " no-thumb centered"; endif; ?>">
    <div class="copy copy-block">
      <?php echo $fce['shero_copy']; ?>
    </div>
    <?php if(!empty($fce['shero_image'])): ?>
    <div class="image" style="background-image: url(<?php echo $fce['shero_image']; ?>);" loading="lazy"></div>
    <?php endif; ?>
  </section>
  <?php } elseif($fce['acf_fc_layout'] == "accblk") { ?>
  <div class="container animated-block">
    <div class="accent-block">
      <div class="ab-content">
        <?php if(!empty($fce['3c_cb'][0])): ?>
        <div class="grid-row col-3 no-m center">
        <?php foreach($fce['3c_cb'] as $tcole): ?>
          <div class="gr-entry copy-block">
            <?php echo $tcole['copy']; ?>
          </div>
        <?php endforeach; ?>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <?php } elseif($fce['acf_fc_layout'] == "cstcat") { if(!empty($fce['scscat'])): ?>
  <section class="row animated-block">
    <div class="container copy-block centered">
      <h2><?php echo $fce['scscat']->name; ?> Case Studies</h2>
    </div>
    <?php
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $wp_queryVdcat = new WP_Query();
    $argsVdcat = array('post_type' => 'cstudy', 'tax_query' => array(array('taxonomy' => 'cscat', 'field' => 'slug', 'terms' => $fce['scscat']->slug)), 'posts_per_page' => 12, 'order' => 'DESC', 'orderby' => 'date', 'paged' => $paged);
    $wp_queryVdcat->query($argsVdcat);
    if ( $wp_queryVdcat->have_posts() ):
    ?>
    <div class="container pt-24">
      <div class="grid-row col-3 center">
      <?php 
      while ($wp_queryVdcat->have_posts()) : $wp_queryVdcat->the_post(); 
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
      <?php endwhile; custom_pagination($wp_queryVdcat->max_num_pages, "3");?>
      </div>
    </div>
    <?php endif; ?>
  </section>
  <?php endif; ?>
  <?php } elseif($fce['acf_fc_layout'] == "acsl") { ?> 
  <?php
  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
  $wp_queryVdcat = new WP_Query();
  $argsVdcat = array('post_type' => 'cstudy', 'posts_per_page' => 12, 'order' => 'DESC', 'orderby' => 'date', 'paged' => $paged);
  $wp_queryVdcat->query($argsVdcat);
  if ( $wp_queryVdcat->have_posts() ):
  ?>
  <section class="row">
    <div class="container">
      <div class="grid-row col-3 center">
      <?php 
      while ($wp_queryVdcat->have_posts()) : $wp_queryVdcat->the_post(); 
      $mexcerpt = get_field("mexcerpt", $post->ID); 
      if (has_post_thumbnail( $post->ID ) ):
        $pfimg = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
        $pfimg = $pfimg[0];
      endif;
      $term_list = wp_get_post_terms($post->ID, 'cscat', array("fields" => "all"));
      $term_name = $term_list[0]->name;
      ?>
        <div class="gr-entry">
          <div class="csl-thumb"<?php if(!empty($pfimg)): ?> style="background-image: url(<?php echo $pfimg; ?>);" <?php endif; ?>loading="lazy">
            <a href="<?php the_permalink(); ?>">Read <?php the_title(); ?></a>
          </div>
          <div class="copy-block pb-16">
            <p class="gray-text"><strong><?php echo strtoupper($term_name); ?></strong></p>
            <?php echo $mexcerpt; ?>
          </div>
          <p class="simple-cta"><a href="<?php the_permalink(); ?>">Learn More</a></p>
        </div>
        <?php endwhile; custom_pagination($wp_queryVdcat->max_num_pages, "3"); ?>

      </div>
    </div>
  </section>
  <?php endif; } ?>
<?php endforeach; ?>
<?php if(!empty($ccta)): ?>
<section class="row animated-block">
  <div class="container copy-block cta-block">
    <?php echo $ccta; ?>
  </div>  
</section>
<?php endif; ?>
<?php get_footer();?>
