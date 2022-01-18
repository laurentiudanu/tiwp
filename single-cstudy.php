<?php
get_header();
$oppage_id = get_queried_object_id();
$hero = get_field("hero", $oppage_id);
$accblk = get_field("3c_cb", $oppage_id);
$sidebar_copy = get_field("sidebar_copy", $oppage_id);
$ctacopy = get_field("ctacopy", $oppage_id);
$ccta = get_field('cctac', 'option');
?>
<section class="simple-hero<?php if(empty($hero['image'])): echo " no-thumb centered"; endif; ?> article">
  <div class="copy copy-block">
    <?php echo $hero['copy']; ?>
  </div>
  <?php if(!empty($hero['image'])): ?>
  <div class="image" style="background-image: url(<?php echo $hero['image']; ?>);" loading="lazy"></div>
  <?php endif; ?>
</section>
<?php if(!empty($accblk[0]['copy'])): ?>
<div class="container animated-block">
  <div class="accent-block">
    <div class="ab-content">
      <?php if(!empty($accblk[0])): ?>
      <div class="grid-row col-3 no-m center">
      <?php foreach($accblk as $tcole): ?>
        <div class="gr-entry copy-block">
          <?php echo $tcole['copy']; ?>
        </div>
      <?php endforeach; ?>
      </div>
      <?php endif; ?>
    </div>
  </div>
</div>
<?php endif; ?>
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
      <?php 
      if ( have_posts() ) : while ( have_posts() ) : the_post();
      $curPID = $post->ID;
      $term_list = wp_get_post_terms($post->ID, 'cscat', array("fields" => "all"));
      $term_name = $term_list[0]->name;
      $term_slug = $term_list[0]->slug;
      $term_id = $term_list[0]->term_id;
      ?>
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
$wp_queryVdcat = new WP_Query();
$argsVdcat = array('post_type' => 'cstudy', 'tax_query' => array(array('taxonomy' => 'cscat', 'field' => 'slug', 'terms' => $term_slug)), 'posts_per_page' => 3, 'post__not_in' => array($curPID), 'order' => 'DESC', 'orderby' => 'date');
$wp_queryVdcat->query($argsVdcat);
if ( $wp_queryVdcat->have_posts() ):
$vdpcount = $wp_queryVdcat->post_count;
if($vdpcount >= 1): 
?>
<section class="row silver animated-block">
  <div class="container copy-block centered">
    <h2>Recent <?php echo $term_name; ?> Case Studies</h2>
  </div>
  <div class="container pt-24">
    <div class="grid-row col-3">
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
      <?php endwhile; ?>
    </div>
    <div class="centered pt-32">
      <p class="simple-cta"><a href="<?php echo get_term_link($term_id); ?>">View All <?php echo $term_name; ?> Case Studies</a></p>
    </div>
  </div>
</section>
<?php endif; endif; ?>
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
