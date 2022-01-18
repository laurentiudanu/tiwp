<?php
/*
  Template Name: flexible 
*/
get_header();
$oppage_id = get_queried_object_id();
$fc = get_field("flexible_content", $oppage_id);
$ctacopy = get_field("ctacopy", $oppage_id);
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
  <?php } elseif($fce['acf_fc_layout'] == "srcb") { ?>
  <section class="row animated-block silver">
    <?php if(!empty($fce['copy_block'])): ?>
      <div class="container copy-block">
        <?php echo $fce['copy_block']; ?>
      </div>
    <?php endif; ?>
    <?php if(!empty($fce['3c_cb'][0])): ?>
    <div class="container pt-32">
      <div class="grid-row col-3 center<?php if($fce['show_border'] == "yes"): echo " w-border"; endif; ?>">
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
  <div class="container animated-block<?php if($fce['show_border'] == "yes"): echo " pb-40"; endif; ?>">
    <?php if(!empty($fce['copy_block'])): ?>
      <div class="container copy-block">
        <?php echo $fce['copy_block']; ?>
      </div>
    <?php endif; ?>
    <div class="grid-row col-3 center<?php if($fce['show_border'] == "yes"): echo " w-border"; endif; ?>">
      <?php foreach($fce['3c_cb'] as $tcole): ?>
        <div class="gr-entry copy-block">
          <?php echo $tcole['copy']; ?>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
  <?php } elseif($fce['acf_fc_layout'] == "cbwcf") { ?>
  <section class="row animated-block">
    <div class="container">
      <div class="grid-row col-2">
        <div class="gr-entry copy-block">
          <?php echo $fce['copy_block']; ?>
        </div>
        <div class="gr-entry form-wrapper">
          <?php echo $fce['gfform']; ?>
        </div>
      </div>
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
  <?php if(!empty($fce['shero_image']) or !empty($fce['vid'])): ?>
  <section class="simple-hero">
  <?php else: ?>
  <section class="simple-hero no-thumb centered">
  <?php endif; ?>
    <div class="copy copy-block">
      <?php echo $fce['shero_copy']; ?>
    </div>
    <?php if(!empty($fce['shero_image'])): ?>
    <div class="image" style="background-image: url(<?php echo $fce['shero_image']; ?>);" loading="lazy"></div>
    <?php endif; ?>
    <?php if(!empty($fce['vid'])): ?>
    <div class="image wvideo" style="background-image: url(https://img.youtube.com/vi/<?php echo $fce['vid']; ?>/maxresdefault.jpg);" loading="lazy">
      <a href="#" class="show-modal" data-video="<?php echo $fce['vid']; ?>">Watch video in a modal</a>
      <div class="video-info">
        <?php echo $fce['vid_copy']; ?>
      </div>
    </div>
    <?php endif; ?>
  </section>
  <?php } elseif($fce['acf_fc_layout'] == "accblk") { ?>
  <div class="container">
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
  <?php } elseif($fce['acf_fc_layout'] == "tcwcbib") { ?>
  <section class="row animated-block <?php echo $fce['row_bg_color']; ?>">
    <div class="container">
      <div class="grid-row col-2">
        <?php if(!empty($fce['copy_block'])): ?>
          <div class="gr-entry copy-block">
            <?php echo $fce['copy_block']; ?>
          </div>
        <?php endif; ?>
        <?php if(!empty($fce['info_blocks'][0])): ?>
        <div class="gr-entry">
          <div class="grid-row col-2 w-border">
          <?php foreach($fce['info_blocks'] as $tcole): ?>
            <div class="gr-entry copy-block">
              <?php echo $tcole['copy']; ?>
            </div>
          <?php endforeach; ?>
          </div>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </section>
  <?php } elseif($fce['acf_fc_layout'] == "cgwii") { ?>
  <section class="chess-grid animated-block">
    <?php foreach($fce['cgwii'] as $cgwiie): ?>
    <div class="cg-entry" style="background-image: url(<?php echo $cgwiie['bg_image']; ?>);" loading="lazy">
      <div class="info copy-block centered">
        <h4><?php echo $cgwiie['title']; ?></h4> 
        <?php echo $cgwiie['info_copy']; ?>
      </div>
      <?php if(!empty($cgwiie['cta_button']['url'])): ?>
      <p class="simple-cta"><a href="<?php echo $cgwiie['cta_button']['url']; ?>"><?php if(!empty($cgwiie['cta_button']['label'])): echo $cgwiie['cta_button']['label']; else: echo "Learn More"; endif; ?></a></p>
      <?php endif; ?>
    </div>
    <?php endforeach; ?>
  </section>
  <?php } elseif($fce['acf_fc_layout'] == "sfwi") { ?>
  <section class="fw-image animated-block" style="background-image: url(<?php echo $fce['sfwi']; ?>);" loading="lazy"></div>
  <?php } elseif($fce['acf_fc_layout'] == "fcwic") { ?>
  <section class="grid-row col-5 animated-block">
    <?php foreach($fce['fcwic'] as $fcwic): ?>
    <div class="gr-entry relative info-on-hover">
      <div class="image-block"<?php if(!empty($fcwic['bg_img'])): ?> style="background-image: url(<?php echo $fcwic['bg_img']; ?>);" loading="lazy"<?php endif; ?>></div>
      <?php if(!empty($fcwic['copy'])): ?>
      <div class="info-block">
        <?php echo $fcwic['copy']; ?>
      </div>
      <?php endif; ?>
    </div>
    <?php endforeach; ?>
  </section>
  <?php } elseif($fce['acf_fc_layout'] == "lcr") { ?>
  <?php if(!empty($fce['copy_block'])): ?>
  <div class="container">
    <div class="copy-block pb-24">
      <?php echo $fce['copy_block']; ?>
    </div>
  </div>
  <?php endif; if(!empty($fce['logo_columns'][0]['image'])): ?>
  <div class="container multiple-cols hide-on-mobile animated-block">
    <?php $lcecount = 0; foreach($fce['logo_columns'] as $lce): $lcecount++;?>
    <img src="<?php echo $lce['image']; ?>" alt="Image entry #<?php echo $lcecount; ?>" loading="lazy">
    <?php endforeach; ?>
  </div>
  <?php endif; ?>
  <?php } elseif($fce['acf_fc_layout'] == "cchart") { ?>
  <section class="row">
    <div class="container comparision-chart">
      <?php if(!empty($fce['cchart_headings'][0])): ?>
        <table class="main-heading">
          <tr class="heading cells centered">
            <?php foreach($fce['cchart_headings'] as $cchead): ?>
            <td><?php echo $cchead['label']; ?></td>
            <?php endforeach; ?>
          </tr>
        </table>
      <?php endif; ?>
      <?php foreach($fce['cchart_info_table'] as $ccbody): ?>
      <?php if(!empty($ccbody['full_width_heading'])): ?>
      <table>
        <tr class="heading">
        <td colspan="5"><?php echo $ccbody['full_width_heading']; ?></td>
        </tr>
      </table>
      <?php endif; ?>
      <?php if(!empty($ccbody['info_cell'][0]['copy'])): ?>
      <table class="main-info-table<?php if($ccbody['subitem'] == "yes"): echo " subitem-row"; endif; ?>">
        <tr class="cells main-tbody">
          <?php foreach($ccbody['info_cell'] as $ice): ?>
          <td><?php echo $ice['copy']; ?></td>
          <?php endforeach; ?>
        </tr>
      </table>
      <?php endif; ?>
      <?php endforeach; ?>
    </div>
  </section>
<?php } elseif($fce['acf_fc_layout'] == "rwcac") { ?>
<div class="container">
  <div class="accent-block">
    <div class="ab-content animated-counter">
      <div class="grid-row col-3 center">
        <?php foreach($fce['rwcac_counters'] as $rcee): ?>
        <div class="gr-entry copy-block centered no-wrapper">
          <h6><span><?php if(!empty($rcee['tban'])): echo $rcee['tban']; endif; ?><?php if(!empty($rcee['anev'])): ?><span class="no-counter" data-counter="<?php echo $rcee['anev']; ?>" data-svalue="<?php echo $rcee['ansv']; ?>"><?php echo $rcee['ansv']; ?></span><?php endif; if(!empty($rcee['taan'])): echo $rcee['taan']; endif; ?></span></h6>
          <?php echo $rcee['copy']; ?>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>

<?php } endforeach; ?>
<?php if(!empty($ctacopy)): ?>
<section class="row animated-block">
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
