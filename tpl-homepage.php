<?php
/*
  Template Name: homepage
*/
get_header();
$oppage_id = get_queried_object_id();
$heromain = get_field("hero", $oppage_id);
$fc = get_field("flexible_content", $oppage_id);
$ccta = get_field('cctac', 'option');
?>
<section class="hp-hero<?php if(count($heromain) > 1): echo " hp-hero-carousel"; endif; ?>">
  <?php foreach($heromain as $hero): ?>
  <?php if(!empty($hero['slide_background_image']) && empty($hero['slide_video_background'])): ?>
  <div class="hph-entry image-bg" data-arrowcol="<?php if($hero['copy_color'] == "white"): echo "white-arrows"; else: echo "gray-arrows"; endif; ?>" loading="lazy" style="background-image: url(<?php echo $hero['slide_background_image']; ?>);">
  <?php else: ?>
  <div class="hph-entry image-bg" data-arrowcol="<?php if($hero['copy_color'] == "white"): echo "white-arrows"; else: echo "gray-arrows"; endif; ?>">
  <?php if(!empty($hero['slide_video_background'])): ?>
  <video id="main-video" autoplay="autoplay" muted="muted" preload="true" poster="" loop>
    <source src="<?php echo $hero['slide_video_background'] ?>" type="video/mp4">
  </video>
  <?php endif; ?>
  <?php endif; ?>
    <div class="container">
      <div class="grid-row col-2 center-copy no-m"> 
        <div class="gr-entry<?php if($hero['copy_color'] == "white"): echo " white-text"; endif; ?>">
          <div class="copy-block pb-24">
            <?php echo $hero['copy']; ?>
          </div>
          <p class="single-cta-btn">
            <?php if(!empty($hero['cta']['label']) && !empty($hero['cta']['link'])): ?>
            <a href="<?php echo $hero['cta']['link']; ?>"><span><?php echo $hero['cta']['label']; ?></span></a>
            <?php endif; ?>
            <?php if(!empty($hero['youtube_video_id'])): ?>
            <a href="#" class="show-modal" data-video="<?php echo $hero['youtube_video_id']; ?>" title="Watch a video in a dialog window">Watch Video</a>
            <?php endif; ?>
            <?php if(!empty($hero['vimeo_video_id'])): ?>
            <a href="#" class="show-modal" data-vvideo="<?php echo $hero['vimeo_video_id']; ?>" title="Watch a video in a dialog window">Watch Video</a>
            <?php endif; ?>
          </p>
        </div>
        <div class="gr-entry hide-on-mobile relative">
          <?php if(!empty($hero['video'])):?>
          <div class="video-wrapper"><?php echo $hero['video']; ?></div>
          <?php else: ?>
          <?php if(!empty($hero['bg_image'])):?>
          <div class="hero-image-decorated<?php if($hero['img_deco'] == "no"): echo " no-deco"; endif; ?>">
            <?php if(!empty($hero['hero_image_link'])): ?>
            <a href="<?php echo $hero['hero_image_link']; ?>"><img src="<?php echo $hero['bg_image']; ?>" alt="Homepage hero section image" loading="lazy"></a>
            <?php else: ?>
            <img src="<?php echo $hero['bg_image']; ?>" alt="Homepage hero section image" loading="lazy">
            <?php endif; ?>
          </div>
          <?php endif; ?>
          <?php if(!empty($hero['image_copy'])):?>
          <div class="image-copy"><?php echo $hero['image_copy']; ?></div>
          <?php endif; ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <?php endforeach; ?>
</section>
<?php foreach($fc as $fce): 
//echo $fce['acf_fc_layout']; 
?>
  <?php if($fce['acf_fc_layout'] == "simple_copy_block"){ ?>
  <section class="row animated-block">
    <div class="copy-block container">
      <?php echo $fce['copy_block']; ?> 
    </div>
  </section>
  <?php } elseif($fce['acf_fc_layout'] == "srcb") { ?>
  <section class="row silver animated-block">
    <?php if(!empty($fce['copy_block'])): ?>
      <div class="container copy-block">
        <?php echo $fce['copy_block']; ?>
      </div>
    <?php endif; ?>
    <?php if(!empty($fce['3c_cb'][0])): ?>
    <div class="container pt-32">
      <div class="grid-row col-3 center">
      <?php foreach($fce['3c_cb'] as $tcole): ?>
        <div class="gr-entry copy-block">
          <?php echo $tcole['copy']; ?>
        </div>
      <?php endforeach; ?>
      </div>
    </div>
    <?php endif; ?>
  </section>
  <?php } elseif($fce['acf_fc_layout'] == "3c_cb") { ?>
  <div class="container animated-block">
    <?php if(!empty($fce['copy_block'])): ?>
      <div class="container copy-block">
        <?php echo $fce['copy_block']; ?>
      </div>
    <?php endif; ?>
    <div class="grid-row col-3 center">
      <?php foreach($fce['3c_cb'] as $tcole): ?>
        <div class="gr-entry copy-block">
          <?php echo $tcole['copy']; ?>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
  <?php } elseif($fce['acf_fc_layout'] == "cbwiv") { ?>
  <section class="row animated-block <?php echo $fce['row_bgc']; ?>">
    <div class="container">
      <div class="grid-row col-6-4">
        <?php if($fce['image_alignment'] == "left"): ?>
        <div class="gr-entry image-card relative">
          <div class="image-card relative" style="background-image: url(<?php echo $fce['image']; ?>);" loading="lazy"></div>
        </div>
        <div class="gr-entry copy-block"><?php echo $fce['copy']; ?></div>
        <?php elseif($fce['image_alignment'] == "right"): ?>
        <div class="gr-entry copy-block first-item"><?php echo $fce['copy']; ?></div>
        <div class="gr-entry image-card to-right relative">
          <div class="image-card relative" style="background-image: url(<?php echo $fce['image']; ?>);" loading="lazy"></div>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </section>
  <?php } elseif($fce['acf_fc_layout'] == "lcr") { ?>
  <?php if(!empty($fce['logo_columns'][0]['image'])): ?>
  <div class="container multiple-cols hide-on-mobile animated-block">
    <?php $lcecount = 0; foreach($fce['logo_columns'] as $lce): $lcecount++;?>
    <img src="<?php echo $lce['image']; ?>" alt="Image entry #<?php echo $lcecount; ?>" loading="lazy">
    <?php endforeach; ?>
  </div>
  <?php endif; ?>
  <?php } elseif($fce['acf_fc_layout'] == "cscb") { ?>
  <section class="row animated-block">
    <?php if(!empty($fce['copy_block'])): ?>
    <div class="container copy-block pb-32">
      <?php echo $fce['copy_block']; ?>
    </div>
    <?php endif; ?>
    <div class="container">
      <div class="grid-row col-3 no-m cs-listing">
        <?php 
        $pcount = 0;
        $wp_queryVdcat = new WP_Query();
        $argsVdcat = array('post_type' => array('cstudy'), 'order' => 'DESC', 'orderby' => 'date', 'posts_per_page' => 3);
        $wp_queryVdcat->query($argsVdcat);
        if ( $wp_queryVdcat->have_posts() ): while ($wp_queryVdcat->have_posts()) : $wp_queryVdcat->the_post();
        if (has_post_thumbnail( $post->ID ) ):
          $pfimg = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
          $pfimg = $pfimg[0];
        endif;
        $mexcerpt = get_field("mexcerpt", $post->ID);
        ?>
        <div class="gr-entry relative">
          <div class="csl-thumb"<?php if(!empty($pfimg)): ?> style="background-image: url(<?php echo $pfimg; ?>);" <?php endif; ?>loading="lazy"></div>
          <div class="copy-block">
            <?php echo $mexcerpt; ?>
          </div>
          <p class="simple-cta"><a href="<?php the_permalink(); ?>">Learn More</a></p>
        </div>
        <?php unset($pfimg); endwhile; endif; ?> 
      </div>
    </div>
  </section>
  <?php } elseif($fce['acf_fc_layout'] == "rwcac") { ?>
  <section class="row<?php if($fce['rwcac_bg_color'] == "silver"): echo " silver"; endif; ?> animated-block">
    <?php if(!empty($fce['copy_block'])): ?>
      <div class="container copy-block">
        <?php echo $fce['copy_block']; ?>
      </div>
    <?php endif; ?>
    <div class="container pt-32 animated-counter">
      <div class="grid-row col-3 center">
        <?php foreach($fce['rwcac_counters'] as $rcee): ?>
        <div class="gr-entry copy-block centered no-wrapper">
          <h6><span><?php if(!empty($rcee['tban'])): echo $rcee['tban']; endif; ?><?php if(!empty($rcee['anev'])): ?><span class="no-counter" data-counter="<?php echo $rcee['anev']; ?>" data-svalue="<?php echo $rcee['ansv']; ?>"><?php echo $rcee['ansv']; ?></span><?php endif; if(!empty($rcee['taan'])): echo $rcee['taan']; endif; ?></span></h6>
          <?php echo $rcee['copy']; ?>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
<?php } endforeach; ?>
<?php if(!empty($ccta)): ?>
<section class="row silver animated-block">
  <div class="container copy-block cta-block">
    <?php echo $ccta; ?>
  </div>  
</section>
<?php endif; ?>
<?php get_footer();?>
