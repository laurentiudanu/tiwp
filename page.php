<?php
get_header();
$oppage_id = get_queried_object_id();
//$hero = get_field("hero", $oppage_id);
?>
<section class="simple-hero">
  <div class="container thin copy-block centered">
    <h1><?php single_post_title(); ?></h1>
  </div>
</section>
<section class="row">
  <div class="container copy-block">
<?php
if ( have_posts() ) : while ( have_posts() ) : the_post();
?>

<?php
the_content();
endwhile; endif; ?>
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
