<?php
$labels = array(
  'name' => _x('Results', 'rslt'),
  'singular_name' => _x('Results', 'rslt'),
  'add_new' => _x('Add new entry', 'rslt'),
  'add_new_rslt' => __('Add new entry'),
  'edit_rslt' => __('Edit entry'),
  'new_rslt' => __('New entry'),
  'view_rslt' => __('View post'),
  'search_Results' => __('Search in Results'),
  'not_found' =>  __('No entries has been found'),
  'not_found_in_trash' => __('No entry in trash'),
  'parent_rslt_colon' => ''
);
register_post_type('rslt', array(
  'label' => __('Results'),
  'labels' => $labels,
  'singular_label' => __('Results'),
  'public' => true,
  'show_ui' => true,
  'capability_type' => 'post',
  'add_new' => _x('New entry', 'rslt'),
  'add_new_rslt' => __('New entry'),
  'hierarchical' => false,
  'rewrite' => array( 'slug' => 'result', 'with_front' => false ),
  'query_var' => true,
  'menu_position' => 8,
  'menu_icon' => 'dashicons-media-text',
  'supports' => array('title', 'editor')
));
//register_taxonomy("resultcat", array("rslt"), array("hierarchical" => true, "label" => "Results Categories", "singular_label" => "Result Category", "rewrite" => array( 'slug' => 'results-category' )));
add_action( 'init', 'create_rslt_taxonomies', 0 );
function create_rslt_taxonomies() {
  $labels = array(
    'name'              => _x( 'Categories', 'taxonomy general name', 'textdomain' ),
    'singular_name'     => _x( 'Category', 'taxonomy singular name', 'textdomain' ),
    'search_items'      => __( 'Search Categories', 'textdomain' ),
    'all_items'         => __( 'All Categories', 'textdomain' ),
    'parent_item'       => __( 'Parent Category', 'textdomain' ),
    'parent_item_colon' => __( 'Parent Category:', 'textdomain' ),
    'edit_item'         => __( 'Edit Category', 'textdomain' ),
    'update_item'       => __( 'Update Category', 'textdomain' ),
    'add_new_item'      => __( 'Add New Category', 'textdomain' ),
    'new_item_name'     => __( 'New Category Name', 'textdomain' ),
    'menu_name'         => __( 'Category', 'textdomain' ),
  );
  $args = array(
    'hierarchical'      => true,
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array( 'slug' => 'results-category' ),
  );
  register_taxonomy( 'resultcat', array( 'rslt' ), $args );

  $labels = array(
    'name'                       => _x( 'Tags', 'taxonomy general name', 'textdomain' ),
    'singular_name'              => _x( 'Tag', 'taxonomy singular name', 'textdomain' ),
    'search_items'               => __( 'Search Tags', 'textdomain' ),
    'popular_items'              => __( 'Popular Tags', 'textdomain' ),
    'all_items'                  => __( 'All Tags', 'textdomain' ),
    'parent_item'                => null,
    'parent_item_colon'          => null,
    'edit_item'                  => __( 'Edit Tag', 'textdomain' ),
    'update_item'                => __( 'Update Tag', 'textdomain' ),
    'add_new_item'               => __( 'Add New Tag', 'textdomain' ),
    'new_item_name'              => __( 'New Tag Name', 'textdomain' ),
    'separate_items_with_commas' => __( 'Separate tags with commas', 'textdomain' ),
    'add_or_remove_items'        => __( 'Add or remove tags', 'textdomain' ),
    'choose_from_most_used'      => __( 'Choose from the most used tags', 'textdomain' ),
    'not_found'                  => __( 'No tags found.', 'textdomain' ),
    'menu_name'                  => __( 'Tags', 'textdomain' ),
  );
  $args = array(
    'hierarchical'          => true,
    'labels'                => $labels,
    'show_ui'               => true,
    'show_admin_column'     => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var'             => true,
    'rewrite'               => array( 'slug' => 'results-attorney' ),
  );
  register_taxonomy( 'resulttag', 'rslt', $args );
}
