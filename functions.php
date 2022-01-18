<?php
include_once "inc/cpt-cstudy.php";
include_once "inc/cpt-testimonials.php";
include_once "inc/cpt-team.php";
include_once "inc/cpt-news.php";
add_filter('use_block_editor_for_post', '__return_false', 10);
add_theme_support('title-tag');
add_theme_support( 'post-thumbnails', array( 'post', 'page', 'cstudy', 'ldrs', 'nws') );
register_nav_menu( 'general_menu', 'General Menu' );
register_nav_menu( 'secondary_menu', 'Secondary Menu' );
register_nav_menu( 'mobile_menu', 'Mobile Menu' );
register_nav_menu( 'footer_menu', 'Footer Menu' );
if (!is_admin()): wp_deregister_script('jquery'); endif;

function my_assets() {
  wp_enqueue_style( 'custom-theme-style', get_stylesheet_directory_uri() . '/library/source-css/style.css?v=1.0.04');
  wp_enqueue_script( 'custom-jq-js', get_stylesheet_directory_uri() . '/library/source-js/jq.js');
  wp_enqueue_script( 'slickjs', get_stylesheet_directory_uri() . '/library/source-js/slick.min.js');
  wp_enqueue_script( 'custom-script', get_stylesheet_directory_uri() . '/library/source-js/functions.js');
   wp_localize_script( 'custom-script', 'myapiurl', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}
add_action( 'wp_enqueue_scripts', 'my_assets' );
add_action('wp_ajax_acp_query', 'display_pg_content');
add_action('wp_ajax_nopriv_acp_query', 'display_pg_content');
function display_pg_content() {
  $postid = $_POST['postid'];
  $tempwpcq3 = $wp_query;
  $wp_querywpcq3 = null;
  $wp_querywpcq3 = new WP_Query();
  $argswpcq3 = array('post_type' => array('pps'), 'p' => $postid);
  $wp_querywpcq3->query($argswpcq3);
  if ( $wp_querywpcq3->have_posts() ): 
  while ( $wp_querywpcq3->have_posts() ) : $wp_querywpcq3->the_post();
?>
  <div class="copy-block ptblr-24 cf">
    <?php the_content(); ?>
  </div>
<?php
    endwhile;
    endif;
    die();
}


if( function_exists('acf_add_options_page') ) {
  acf_add_options_page();
}
function exclude_pages_from_search($query) {
    if ( $query->is_main_query() && is_search() && !is_admin() ) {
        //$query->set( 'post_type', array('post', 'resource', 'page') );
        //$query->set( 'post_type', array('awrd', 'page', 'tstm', 'team', 'rslt') );
        $query->set( 'post_type', array('post') );
    }
    return $query;
}
add_filter( 'pre_get_posts','exclude_pages_from_search' );
function cexcerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);

  if (count($excerpt) >= $limit) {
      array_pop($excerpt);
      $excerpt = implode(" ", $excerpt) . '...';
  } else {
      $excerpt = implode(" ", $excerpt);
  }

  $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);

  return $excerpt;
}

function custom_pagination($numpages = '', $pagerange = '', $paged='') {

  if (empty($pagerange)) {
    $pagerange = 2;
  }

  global $paged;
  if (empty($paged)) {
    $paged = 1;
  }
  if ($numpages == '') {
    global $wp_query;
    $numpages = $wp_query->max_num_pages;
    if(!$numpages) {
        $numpages = 1;
    }
  }

  $pagination_args = array(
    'base'            => get_pagenum_link(1) . '%_%',
    'format'          => 'page/%#%',
    'total'           => $numpages,
    'current'         => $paged,
    'show_all'        => False,
    'end_size'        => 1,
    'mid_size'        => $pagerange,
    'prev_next'       => True,
    'prev_text'       => __('&lsaquo; Previous Page'),
    'next_text'       => __('Next Page &rsaquo;'),
    'type'            => 'plain',
    'add_args'        => false,
    'add_fragment'    => ''
  );

  $paginate_links = paginate_links($pagination_args);

  if ($paginate_links) {
    echo "<div class='custom-wp-pagination cf'>";
      //echo "<span class='page-numbers page-num'>Page " . $paged . " of " . $numpages . "</span> ";
      echo $paginate_links;
    echo "</div>";
  }

}

function base_pagination() {
  global $wp_query;

  $big = 999999999; // This needs to be an unlikely integer

  // For more options and info view the docs for paginate_links()
  // http://codex.wordpress.org/Function_Reference/paginate_links
  $paginate_links = paginate_links( array(
      'base' => str_replace( $big, '%#%', get_pagenum_link($big) ),
      'current' => max( 1, get_query_var('paged') ),
      'total' => $wp_query->max_num_pages,
      'mid_size' => 5
  ) );

  // Display the pagination if more than one page is found
  if ( $paginate_links ) {
      echo '<div class="custom-wp-pagination cf">';
      echo $paginate_links;
      echo '</div><!--// end .pagination -->';
  }
}


function ctas($atts, $content = null) {
  extract(shortcode_atts(array("heading" => "default heading"), $atts));
  $csr_html = "";
  $csr_html .= '<div class="pb-16 multiple-cta">';
  $csr_html .= do_shortcode($content);
  $csr_html .= '</div>';
  return $csr_html;
}
add_shortcode("ctas", "ctas");

function cta_btn($atts, $content = null) {
  extract(shortcode_atts(array("url" => "", "label" => "", "align" => "", "target" => "", "icon" => "", "style" => "", "videoid" => "", "vvideoid" => ""), $atts));
  $cta_btn_html = "";
  if(!empty($videoid)):
    $cta_btn_html .= '<p class="single-cta-btn">';
    $cta_btn_html .= '<a href="#" class="show-modal" data-video="'.$videoid.'" title="Watch a video in a modal window">'.$label.'</a>';
  elseif(!empty($vvideoid)):
    $cta_btn_html .= '<p class="single-cta-btn">';
    $cta_btn_html .= '<a href="#" class="show-modal" data-vvideo="'.$vvideoid.'" title="Watch a video in a modal window">'.$label.'</a>';
  else:
    if($align == "center"):
      if($icon == "no"):
        $cta_btn_html .= '<p class="single-cta-btn centered no-icon">';
      else:
        $cta_btn_html .= '<p class="single-cta-btn centered">';
      endif;
    else:
      if($icon == "no"):
        $cta_btn_html .= '<p class="single-cta-btn no-icon">';
      else:
        $cta_btn_html .= '<p class="single-cta-btn">';
      endif;
    endif;
    if($target == "_blank"):
      if($style == "nobg"):
        $cta_btn_html .= '<a href="'.$url.'" target="_blank" class="nobg"><span>'.$label.'</span></a>';  
      else:
        $cta_btn_html .= '<a href="'.$url.'" target="_blank"><span>'.$label.'</span></a>';  
      endif;
    else:
      if($style == "nobg"):
        $cta_btn_html .= '<a href="'.$url.'" class="nobg"><span>'.$label.'</span></a>';
      else:
        $cta_btn_html .= '<a href="'.$url.'"><span>'.$label.'</span></a>';
      endif;
    endif;
  endif;
  $cta_btn_html .= '</p>';
  return $cta_btn_html;
}
add_shortcode("cta_btn", "cta_btn");

function simple_cta($atts, $content = null) {
  extract(shortcode_atts(array("url" => "", "label" => "", "align" => "", "target" => ""), $atts));
  $simple_cta_html = "";
  if($align == "center"):
    $simple_cta_html .= '<p class="simple-cta centered">';
  else:
    $simple_cta_html .= '<p class="simple-cta">';
  endif;
  if($target == "_blank"):
    $simple_cta_html .= '<a href="'.$url.'" target="_blank">'.$label.'</a>';  
  else:
    $simple_cta_html .= '<a href="'.$url.'">'.$label.'</a>';
  endif;
  $simple_cta_html .= '</p>';
  return $simple_cta_html;
}
add_shortcode("simple_cta", "simple_cta");


function accordion($atts, $content = null) {
  extract(shortcode_atts(array("title" => ""), $atts));
  $accordion_html = "";
  $accordion_html .= '<div class="accordion">';
  $accordion_html .= '<p class="title">'.$title.'</p><div class="copy-block pt-16">';
  $accordion_html .= $content;
  $accordion_html .= '</div></div>';
  return $accordion_html;
}
add_shortcode("accordion", "accordion");
