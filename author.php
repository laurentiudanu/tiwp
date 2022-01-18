<?php
get_header();
$curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
$dfi = get_field('dfi', 'option');
?>
<section class="simple-hero no-thumb">
  <div class="copy copy-block centered">
    <h1><?php echo $curauth->display_name; ?></h1>
    <p><?php echo get_the_author_meta('description', $curauth->ID); ?></p>
  </div>
</section>
<section class="row">
  <div class="container">
    <div class="grid-row col-3 center">
    <?php
    if (have_posts()): while (have_posts()) : the_post(); 
    if (has_post_thumbnail( $post->ID ) ):
    $blgefihbg = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
    $bio_image = $blgefihbg[0];
    endif;
    $ccat = get_the_category($post->ID);
    $cp_catname = $ccat[0]->name;
    ?>
      <div class="gr-entry">
        <div class="csl-thumb" style="background-image: url(<?php if(!empty($bio_image)): echo $bio_image; else: echo $dfi; endif; ?>);" loading="lazy"><a href="<?php the_permalink(); ?>">Read More</a></div>
        <div class="copy-block black-link centered">
          <p class="gray-text"><strong><?php echo strtoupper($cp_catname); ?></strong></p>
          <p><a href="<?php the_permalink(); ?>"><strong><?php the_title(); ?></strong></a></p>
        </div>
      </div>
      <?php unset($bio_image, $ccat, $cp_catname); ?>
    <?php
    endwhile;
    base_pagination();
    endif; ?>
    </div>
  </div>
</section>
<?php $cctac = get_field('cctac', 'option'); if(!empty($cctac)): ?>
<section class="row silver">
  <div class="container copy-block centered">
    <?php echo $cctac; ?>
  </div>
</section>
<?php endif; ?>
<?php get_footer();?>
