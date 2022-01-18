<?php
$labels = array(
  'name' => _x('Leadership', 'ldrs'),
  'singular_name' => _x('Leadership', 'ldrs'),
  'add_new' => _x('Add new entry', 'ldrs'),
  'add_new_ldrs' => __('Add new entry'),
  'edit_ldrs' => __('Edit entry'),
  'new_ldrs' => __('New entry'),
  'view_ldrs' => __('View post'),
  'search_ldrs' => __('Search in Leadership'),
  'not_found' =>  __('No entries has been found'),
  'not_found_in_trash' => __('No entry in trash'),
  'parent_ldrs_colon' => ''
);
register_post_type('ldrs', array(
  'label' => __('Leadership'),
  'labels' => $labels,
  'singular_label' => __('Leadership'),
  'public' => true,
  'show_ui' => true,
  'capability_type' => 'post',
  'add_new' => _x('New entry', 'ldrs'),
  'add_new_ldrs' => __('New entry'),
  'hierarchical' => false,
  'rewrite' => array( 'slug' => 'leadership', 'with_front' => false ),
  'query_var' => true,
  'menu_position' => 10,
  'menu_icon' => 'dashicons-nametag',
  'supports' => array('title', 'editor', 'thumbnail')
));
