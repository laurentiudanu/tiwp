<?php
get_header();
if ( have_posts() ) : while ( have_posts() ) : the_post();
if (has_post_thumbnail( $post->ID ) ):
$blgefihbg = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
$bio_image = $blgefihbg[0];
endif;
$curPID = $post->ID;
$sidebar_copy = get_field("sidebar_copy", $post->ID);
$dfi = get_field("dfi", $post->ID);
$ccat = wp_get_post_terms($post->ID, 'nwscat', array("fields" => "all"));
$cp_catname = $ccat[0]->name;
$ctacopy = get_field("ctacopy", $post->ID);
$vid = get_field("vid", $post->ID);
$ccta = get_field('cctac', 'option');
endwhile; endif;
?>
<section class="simple-hero no-thumb">
  <div class="copy copy-block centered">
    <p class="gray-text pb-16"><strong><?php echo strtoupper($cp_catname); ?></strong></p>
    <h1><?php single_post_title(); ?></h1>    
  </div>
</section>
<?php if($dfi != "no"): if(!empty($bio_image)):?>
<div class="post-thumb animated-block" style="background-image: url(<?php echo $bio_image; ?>);" loading="lazy"></div>
<?php endif; endif; ?>
<section class="row">
  <div class="container relative">
    <?php if(!empty($sidebar_copy)): ?>
    <div class="sidebar-info copy-block hide-on-mobile animated-block">
      <div class="si-sticky">
        <?php echo $sidebar_copy; ?>
      </div>
    </div>
    <?php endif; ?>
    <div class="container copy-block article animated-block">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <?php if(!empty($vid)): ?>
      <div class="fw-video-player pb-24">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $vid; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div> 
      <?php endif; ?>
      <div class="cf pb-32"><?php the_content(); ?></div>
      <h4>Share on Social</h4>
      <p class="social-links blue pt-8">
        <a href="https://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" class="fb" target="_blank">Facebook</a>
        <a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" class="tw" target="_blank">Twitter</a>
        <a href="https://www.linkedin.com/shareArticle?url=<?php the_permalink(); ?>&title=<?php the_title(); ?>" class="li" target="_blank">LinkedIn</a>
      </p>
      <?php endwhile; endif; ?>
    </div>
  </div>
</section>
<?php
$tempwpcq3 = $wp_query;
$wp_querywpcq3 = null;
$wp_querywpcq3 = new WP_Query();
$argswpcq3 = array('post_type' => array('nws'), 'posts_per_page' => 3, 'post__not_in' => array($curPID), 'orderby' => 'date');
$wp_querywpcq3->query($argswpcq3);
if ($wp_querywpcq3->have_posts() && $wp_querywpcq3->found_posts > 3):
?>
<section class="row silver animated-block">
  <div class="container copy-block centered pb-24">
    <h2>Latest News</h2>
  </div>
  <div class="container">
    <div class="grid-row col-3 center">
      <?php 
      while ( $wp_querywpcq3->have_posts() ) : $wp_querywpcq3->the_post(); 
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
  </div> 
</section>
<?php endif; ?>
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
<?php get_footer(); ?>
