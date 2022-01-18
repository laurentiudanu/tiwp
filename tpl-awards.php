<?php
/*
  Template Name: awards
*/
get_header();
$oppage_id = get_queried_object_id();
$hero = get_field("hero", $oppage_id);
$awards = get_field("awards", $oppage_id);
$ccta = get_field('cctac', 'option');
?>
<section class="simple-hero<?php if(empty($hero['hero_image'])): echo " no-thumb centered"; endif; ?>">
  <div class="copy copy-block">
    <?php echo $hero['hero_copy']; ?>
  </div>
  <?php if(!empty($hero['hero_image'])): ?>
  <div class="image" style="background-image: url(<?php echo $hero['hero_image']; ?>);" loading="lazy"></div>
  <?php endif; ?>
</section>
<?php if(!empty($awards[0])): ?>
<section class="row animated-block">
  <div class="container">
    <div class="grid-row col-4-silver">
      <?php foreach($awards as $award): ?>
      <div class="gr-entry relative">
        <img src="<?php echo $award['award_logo']['url']; ?>" alt="<?php echo $award['award_logo']['alt']; ?>" loading="lazy">
        <?php if(!empty($award['award_info'][0])): ?>
        <a href="#" class="award-info-trigger" title="View information in a modal"><span>Click to See Years</span></a>
        <div class="modal-info" aria-hidden="true">
          <img src="<?php echo $award['award_logo']['url']; ?>" alt="<?php echo $award['award_logo']['alt']; ?>" loading="lazy">
          <div class="grid-row col-4-silver center">
            <?php foreach($award['award_info'] as $awinfo): ?>
            <div class="gr-entry copy-block centered">
              <?php echo $awinfo['copy']; ?>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
        <?php endif; ?>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>
<?php if(!empty($ccta)): ?>
<section class="row silver animated-block">
  <div class="container copy-block cta-block">
    <?php echo $ccta; ?>
  </div>  
</section>
<?php endif; ?>
<?php get_footer();?>
