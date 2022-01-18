<?php
/*
  Template Name: technology 
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
  <div class="container animated-block">
    <?php if(!empty($fce['copy_block'])): ?>
      <div class="container copy-block">
        <?php echo $fce['copy_block']; ?>
      </div>
    <?php endif; ?>
    <div class="grid-row col-3 center<?php if($fce['bxd_cols'] == "yes"): echo " silver-boxes"; endif; ?>">
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
  <?php } elseif($fce['acf_fc_layout'] == "shero") { ?>
  <?php if(!empty($fce['shero_image']) or !empty($fce['vid'])): ?>
  <section class="simple-hero extra">
  <?php else: ?>
  <section class="simple-hero no-thumb centered extra">
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
  <?php } elseif($fce['acf_fc_layout'] == "dsbi") { ?>
  <div class="container animated-block">
    <div class="accent-block extra">
      <div class="ab-content">
        <?php $ec = 0; foreach($fce['dsbi'] as $dsbie): $ec++; ?>
        <div class="app-info-tabs<?php if($ec == "1"): echo " active"; endif; ?> cf relative" id="de-<?php echo $ec; ?>">
          <?php if(!empty($dsbie['fimage'])): ?><img class="mobile-view" src="<?php echo $dsbie['fimage']; ?>" loading="lazy"><?php endif; ?>
          <div class="ait-nav">
            <?php $tc = 0; foreach($dsbie['tc'] as $tce): $tc++; ?>
<a href="#aitc-entry-tab-<?php echo $tc."-".$ec; ?>"<?php if($tc == "1"): ?> class="current-tab"<?php endif; ?>><strong><?php echo $tce['title']; ?></strong><?php if(!empty($tce['subtitle'])): ?> <span><?php echo $tce['subtitle']; ?></span><?php endif; ?></a>
            <?php endforeach; unset($tce); ?> 
          </div>
          <div class="ait-content">
            <?php $tc = 0; foreach($dsbie['tc'] as $tce): $tc++; ?>
            <div id="aitc-entry-tab-<?php echo $tc."-".$ec; ?>" class="aitc-entry<?php if($tc == "1"): echo " current-tab"; endif; ?>">
              <img src="<?php echo $tce['image']; ?>" loading="lazy" alt="<?php echo $tce['title']; ?> dashboard image">
              <?php $bc = 0; foreach($tce['ocii'] as $bbi): $bc++;?>
              <p class="tab-info-trigger" data-target="bubble-<?php echo $bc."-".$ec."-".$tc; ?>" style="top: <?php echo $bbi['top']; ?>px; left: <?php echo $bbi['left']; ?>px;"><span><?php echo $bc; ?></span></p>
              <div class="tab-info-bubble" id="bubble-<?php echo $bc."-".$ec."-".$tc; ?>"><p><strong><?php echo $bbi['title']; ?></strong><?php echo $bbi['subtitle']; ?></p></div>
              <?php endforeach; unset($bbi); ?>
            </div>
            <?php endforeach; unset($tce); ?>
          </div>
        </div>
        <?php endforeach; unset($dsbie); ?>
      </div>
    </div>
    <?php if(count($fce['dsbi']) > 1): ?>
    <div class="grid-row col-3 lm pt-48 pb-56">
      <?php $ec = 0; foreach($fce['dsbi'] as $dsbie): $ec++; ?>
      <div class="gr-entry sdi-wrapper<?php if($ec == 1): echo " hidden"; endif; ?>">
        <div class="cover-w-link"<?php if(!empty($dsbie['fimage'])):?> style="background-image: url(<?php echo $dsbie['fimage']; ?>);"<?php endif; ?>>
          <a href="#de-<?php echo $ec; ?>" class="show-dashboard-info"><span>View this Dashboard</span></a>
        </div>
        <div class="copy-block centered pt-24">
          <h4><?php echo $dsbie['title']; ?></h4>
          <?php echo $dsbie['subtitle']; ?>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>
  </div>
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
  <?php } ?>
<?php endforeach; ?>

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
