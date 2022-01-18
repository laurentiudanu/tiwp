<?php
/*
  Template Name: newsroom
*/
get_header();
$oppage_id = get_queried_object_id();
$hero_copy = get_field("hero_copy", $oppage_id);
$ctacopy = get_field("ctacopy", $oppage_id);
$main_featured_entry = get_field("main_featured_entry", $oppage_id);
$sidebar_copy = get_field("sidebar_copy", $oppage_id);
$featured_news = get_field("featured_news", $oppage_id);
$ccta = get_field('cctac', 'option');
$dfi = get_field('dfi', 'option');
if(!empty($featured_news)):
$wteo = $featured_news;
array_push($wteo, $main_featured_entry);
endif;
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
?>
<section class="simple-hero no-thumb centered">
  <div class="copy copy-block">
    <?php echo $hero_copy; ?>
  </div>
</section>
<?php
if($paged < 2):
if(!empty($main_featured_entry)):
$tempwpcq3 = $wp_query;
$wp_querywpcq3 = null;
$wp_querywpcq3 = new WP_Query();
$argswpcq3 = array('post_type' => array('nws'), 'post__in' => array($main_featured_entry), 'orderby' => 'post__in');
$wp_querywpcq3->query($argswpcq3);
if ($wp_querywpcq3->have_posts()): while ( $wp_querywpcq3->have_posts() ) : $wp_querywpcq3->the_post(); 
if (has_post_thumbnail( $post->ID ) ):
$blgefihbg = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
$bio_image = $blgefihbg[0];
endif;
$ccat = wp_get_post_terms($post->ID, 'nwscat', array("fields" => "all"));
$cp_catname = $ccat[0]->name;
?>
<div class="container">
  <div class="accent-block">
    <div class="ab-content">
      <div class="grid-row col-6-4 ptrbl-16">
        <div class="gr-entry copy-block first-item">
          <p class="gray-text"><strong><?php echo strtoupper($cp_catname); ?></strong></p>
          <h2><?php the_title(); ?></h2>
          <?php the_excerpt(); ?>
          <p class="simple-cta"><a href="<?php the_permalink(); ?>">Read More</a></p>
        </div>
        <div class="gr-entry image-card to-right relative">
          <div class="image-card relative" style="background-image: url(<?php if(!empty($bio_image)): echo $bio_image; else: echo $dfi; endif; ?>);" loading="lazy"></div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php endwhile; unset($cp_catname, $bio_image); endif; unset($ccat, $bio_image); endif; endif; ?>
<section class="row">
  <div class="container">
    <div class="ln-grid">
      <div class="listing">
      <?php
      $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
      $tempwpcq1 = $wp_query;
      $wp_querywpcq1 = null;
      $wp_querywpcq1 = new WP_Query();
      $argswpcq1 = array('post_type' => array('nws'), 'post__not_in' => $wteo, 'posts_per_page' => 6, 'order' => 'DESC', 'orderby' => 'date', 'paged' => $paged);
      $wp_querywpcq1->query($argswpcq1);
      if ($wp_querywpcq1->have_posts()): while ( $wp_querywpcq1->have_posts() ) : $wp_querywpcq1->the_post(); 
      ?>
      <div class="news-grid">
        <div class="ng-col gray-text">
          <p><strong><?php the_time('F d, Y'); ?></strong></p>
        </div>
        <div class="ng-col">
          <p><a href="<?php the_permalink(); ?>"><strong><?php the_title(); ?></strong></a></p>
        </div>
      </div>
      <?php endwhile; custom_pagination($wp_querywpcq1->max_num_pages, "3", $paged); endif; ?>
      </div>
      <div class="sidebar">
        <div class="content">
          <div class="copy-block">
            <?php echo $sidebar_copy; ?>
            <h3 class="pt-48">Follow Us</h3>
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
  </div>
</section>
<?php if(!empty($featured_news)): ?>
<section class="row">
  <div class="container">
    <div class="copy-block centered pb-24">
      <h2>Featured News</h2>
    </div>
    <?php
    $tempwpcq2 = $wp_query;
    $wp_querywpcq2 = null;
    $wp_querywpcq2 = new WP_Query();
    $argswpcq2 = array('post_type' => array('nws'), 'post__in' => $featured_news, 'orderby' => 'post__in');
    $wp_querywpcq2->query($argswpcq2);
    if ($wp_querywpcq2->have_posts()): ?>
    <div class="grid-row col-3 center">
    <?php while ( $wp_querywpcq2->have_posts() ) : $wp_querywpcq2->the_post(); 
    if (has_post_thumbnail( $post->ID ) ):
    $blgefihbg = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
    $bio_image = $blgefihbg[0];
    endif;
    $ccat = wp_get_post_terms($post->ID, 'nwscat', array("fields" => "all"));
    $cp_catname = $ccat[0]->name; 
    ?>
    <div class="gr-entry">
      <div class="csl-thumb" style="background-image: url(<?php if(!empty($bio_image)): echo $bio_image; else: echo $dfi; endif; ?>);" loading="lazy"><a href="<?php the_permalink(); ?>">Read More</a></div>
      <div class="copy-block black-link centered">
        <p class="gray-text"><strong><?php echo strtoupper($cp_catname); ?></strong></p>
        <p><a href="<?php the_permalink(); ?>"><strong><?php the_title(); ?></strong></a></p>
      </div>
    </div>
    <?php endwhile; ?>
    </div>
    <?php endif; ?>
  </div>
</section>
<?php endif; if(!empty($ctacopy)): ?>
<section class="row silver animated-block">
  <div class="container copy-block cta-block">
    <?php echo $ctacopy; ?>
  </div>  
</section>
<?php else: ?>
<?php if(!empty($ccta)): ?>
<section class="row silver animated-block">
  <div class="container copy-block cta-block">
    <?php echo $ccta; ?>
  </div>  
</section>
<?php endif; ?>
<?php endif; ?>
<?php get_footer();?>
