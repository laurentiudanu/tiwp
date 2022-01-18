<?php
$labels = array(
  'name' => _x('News', 'nws'),
  'singular_name' => _x('News', 'nws'),
  'add_new' => _x('Add new entry', 'nws'),
  'add_new_nws' => __('Add new entry'),
  'edit_nws' => __('Edit entry'),
  'new_nws' => __('New entry'),
  'view_nws' => __('View post'),
  'search_News' => __('Search in News'),
  'not_found' =>  __('No entries has been found'),
  'not_found_in_trash' => __('No entry in trash'),
  'parent_nws_colon' => ''
);
register_post_type('nws', array(
  'label' => __('News'),
  'labels' => $labels,
  'singular_label' => __('News'),
  'public' => true,
  'show_ui' => true,
  'capability_type' => 'post',
  'add_new' => _x('New entry', 'nws'),
  'add_new_nws' => __('New entry'),
  'hierarchical' => false,
  'rewrite' => array( 'slug' => 'news', 'with_front' => false ),
  'query_var' => true,
  'menu_position' => 12,
  'menu_icon' => 'dashicons-media-text',
  'supports' => array('title', 'editor', 'thumbnail', 'excerpt')
));
add_action( 'init', 'create_nws_taxonomies', 0 );

function create_nws_taxonomies() {
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
    'rewrite'           => array( 'slug' => 'media-category' ),
  );
  register_taxonomy( 'nwscat', array( 'nws' ), $args );

}
