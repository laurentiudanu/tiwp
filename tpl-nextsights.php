<?php
/*
  Template Name: nextsights
*/
get_header();
$oppage_id = get_queried_object_id();
$hero_copy = get_field("hero_copy", $oppage_id);
$latest_articles = get_field("latest_articles", $oppage_id);
$featured_post = get_field("featured_post", $oppage_id);
$featured_cta_copy = get_field("featured_cta_copy", $oppage_id);
$jump_to_topic = get_field("jump_to_topic", $oppage_id);
$l4e = get_field("l4e", $oppage_id);
$sidebar_cta_copy = get_field("sidebar_cta_copy", $oppage_id);
$sidebar_top_stories = get_field("sidebar_top_stories", $oppage_id);
$ctacopy = get_field("ctacopy", $oppage_id);
$ccta = get_field('cctac', 'option');
$dfi = get_field('dfi', 'option');

?>
<section class="simple-hero no-thumb centered">
  <div class="copy copy-block">
    <?php echo $hero_copy; ?>
  </div>
</section>

<div class="container">
  <div class="accent-block">
    <div class="ab-content">
      <div class="simple-grid">
        <div class="sg-six">
        <div class="copy-block pb-16"><h4><strong>Latest Articles</strong></h4></div>
          <?php
          if(!empty($latest_articles)):
          $tempwpcqa2 = $wp_query;
          $wp_querywpcqa2 = null;
          $wp_querywpcqa2 = new WP_Query();
          $argswpcqa2 = array('post_type' => array('post'), 'post__in' => $latest_articles, 'orderby' => 'post__in');
          $wp_querywpcqa2->query($argswpcqa2);
          if ($wp_querywpcqa2->have_posts()): ?>
          <?php while ( $wp_querywpcqa2->have_posts() ) : $wp_querywpcqa2->the_post(); 
          if (has_post_thumbnail( $post->ID ) ):
          $blgefihbg = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
          $bio_image = $blgefihbg[0];
          endif;
          if(empty($bio_image)):
            $bio_image = $dfi;
          endif;
          $ccat = get_the_category($post->ID);
          $cp_catname = $ccat[0]->name; 
          $vid = get_field("vid", $post->ID);
          ?>
          <div class="la-list">
            <div class="la-thumb<?php if(!empty($vid)): echo " video"; endif; ?>" style="background-image: url(<?php echo $bio_image; ?>);" loading="lazy"><a href="<?php the_permalink(); ?>">Read More</a></div>            <div class="la-copy">
            <p class="gray-text pb-8">NOTABLE FROM <span><?php echo strtoupper($cp_catname); ?></span></p>
            <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
            </div>
          </div>
          <?php unset($cp_catname, $bio_image); endwhile; endif; endif; ?>
        </div>
        <div class="sg-four">
          <div class="copy-block pb-16"><h4><strong>Featured</strong></h4></div>
          <div class="ft-entry pb-24">
            <?php
            $tempwpcqa3 = $wp_query;
            $wp_querywpcqa3 = null;
            $wp_querywpcqa3 = new WP_Query();
            $argswpcqa3 = array('post_type' => array('post'), 'post__in' => array($featured_post), 'orderby' => 'post__in');
            $wp_querywpcqa3->query($argswpcqa3);
            if ($wp_querywpcqa3->have_posts()): ?>
            <?php while ( $wp_querywpcqa3->have_posts() ) : $wp_querywpcqa3->the_post(); 
            if (has_post_thumbnail( $post->ID ) ):
            $blgefihbg = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
            $bio_image = $blgefihbg[0];
            endif;
            if(empty($bio_image)):
              $bio_image = $dfi;
            endif;
            $ccat = get_the_category($post->ID);
            $cp_catname = $ccat[0]->name; 
            $vid = get_field("vid", $post->ID);
            ?>
            <div class="fte-thumb<?php if(!empty($vid)): echo " video"; endif; ?>" style="background-image: url(<?php echo $bio_image; ?>);" loading="lazy"><a href="<?php the_permalink(); ?>">Read More</a></div>            
            <div class="fte-copy">
              <p class="gray-text"><strong><?php echo strtoupper($cp_catname); ?></strong></p>
              <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
            </div> 
            <?php unset($cp_catname, $bio_image); endwhile; endif; ?>
          </div>
          <?php if(!empty($featured_cta_copy)): ?>
          <div class="sidebar">
            <div class="copy-block content">
              <?php echo $featured_cta_copy; ?>
            </div>
          </div>
          <?php endif; ?>
        </div>
      </div>  
    </div>
  </div>
</div>
<section class="row">
  <div class="container">
    <div class="ln-grid">
      <div class="listing">
        <?php if(!empty($jump_to_topic[0])): ?>
        <div class="copy-block pb-16"><h4><strong>Jump to Topic</strong></h4></div>
        <p class="simple-grid only-links">
          <?php foreach($jump_to_topic as $jte): ?>
          <a href="<?php echo $jte['url']; ?>"><?php echo $jte['label']; ?></a>
          <?php endforeach; ?>
        </p>
        <?php endif; ?>
        <?php if(!empty($l4e[0])): foreach($l4e as $fce): ?>
        <div class="copy-block title-w-separator"><h2><?php echo get_the_category_by_ID($fce['wctd']); ?> <a href="<?php echo get_category_link($fce['wctd']); ?>">View All</a></h2></div>
        <?php
        $tempwpcqa1 = $wp_query;
        $wp_querywpcqa1 = null;
        $wp_querywpcqa1 = new WP_Query();
        $argswpcqa1 = array('post_type' => array('post'), 'category__in' => array($fce['wctd']), 'posts_per_page' => 4, 'orderby' => 'date');
        $wp_querywpcqa1->query($argswpcqa1);
        if ($wp_querywpcqa1->have_posts()): ?>
        <div class="grid-row col-2 pt-16 pb-40">
          <?php while ( $wp_querywpcqa1->have_posts() ) : $wp_querywpcqa1->the_post(); 
          if (has_post_thumbnail( $post->ID ) ):
          $blgefihbg = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
          $bio_image = $blgefihbg[0];
          endif;
          if(empty($bio_image)):
            $bio_image = $dfi;
          endif;
          $ccat = get_the_category($post->ID);
          $cp_catname = $ccat[0]->name; 
          $vid = get_field("vid", $post->ID);
          ?>
          <div class="gr-entry pl">
          <div class="pl-thumb<?php if(!empty($vid)): echo " video"; endif; ?>" style="background-image: url(<?php echo $bio_image; ?>);" loading="lazy"><a href="<?php the_permalink(); ?>">Read More</a></div>
            <div class="pl-copy">
              <p class="gray-text"><?php echo strtoupper(get_the_category_by_ID($fce['wctd'])); ?></p>
              <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
            </div>
          </div>
          <?php unset($bio_image); endwhile; ?>
        </div>
        <?php endif; endforeach; endif; ?>
      </div>
        <div class="sidebar">
        <?php if(!empty($sidebar_top_stories)): ?>
        <?php
        $wp_querywpcq2b = new WP_Query();
        $argswpcq2b = array('post_type' => array('post'), 'post__in' => $sidebar_top_stories, 'orderby' => 'post__in');
        $wp_querywpcq2b->query($argswpcq2b);
        if ($wp_querywpcq2b->have_posts()): ?>
        <div class="sidebar-listing">
          <div class="copy-block title-w-separator"><h3>Top Stories</h3></div>
          <ol>
            <?php while ( $wp_querywpcq2b->have_posts() ) : $wp_querywpcq2b->the_post(); ?>
            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
            <?php endwhile; ?>
          </ol>
        </div>
        <?php endif; ?>
        <?php endif; ?>
        <?php
        $tempwpcq2 = $wp_query;
        $wp_querywpcq2 = null;
        $wp_querywpcq2 = new WP_Query();
        $argswpcq2 = array('post_type' => array('post'), 'category__in' => array(14), 'posts_per_page' => 6, 'orderby' => 'date');
        $wp_querywpcq2->query($argswpcq2);
        if ($wp_querywpcq2->have_posts()): ?>
        <div class="sidebar-listing">
          <div class="copy-block title-w-separator"><h3>Let’s Talk Ship Episodes</h3></div>
          <ol>
            <?php while ( $wp_querywpcq2->have_posts() ) : $wp_querywpcq2->the_post(); ?>
            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
            <?php endwhile; ?>
          </ol>
        </div>
        <?php endif; unset($tempwpcq2, $wp_querywpcq2, $argswpcq2);  ?>
        <?php
        $tempwpcq2 = $wp_query;
        $wp_querywpcq2 = null;
        $wp_querywpcq2 = new WP_Query();
        $argswpcq2 = array('post_type' => array('nws'), 'posts_per_page' => 6, 'orderby' => 'date');
        $wp_querywpcq2->query($argswpcq2);
        if ($wp_querywpcq2->have_posts()): ?>
        <div class="sidebar-listing">
          <div class="copy-block title-w-separator"><h3>Latest News</h3></div>
          <ol>
            <?php while ( $wp_querywpcq2->have_posts() ) : $wp_querywpcq2->the_post(); ?>
            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
            <?php endwhile; ?>
          </ol>
        </div>
        <?php endif; ?>
        <?php if(!empty($sidebar_cta_copy)): ?>
        <div class="content">
          <div class="copy-block pb-16">
            <?php echo $sidebar_cta_copy; ?>            
          </div>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

<?php if(!empty($ctacopy)): ?>
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
