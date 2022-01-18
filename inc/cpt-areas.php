<?php
$labels = array(
  'name' => _x('Popups', 'pps'),
  'singular_name' => _x('Popups', 'pps'),
  'add_new' => _x('Add new entry', 'pps'),
  'add_new_pps' => __('Add new entry'),
  'edit_pps' => __('Edit entry'),
  'new_pps' => __('New entry'),
  'view_pps' => __('View post'),
  'search_Popups' => __('Search in Popups'),
  'not_found' =>  __('No entries has been found'),
  'not_found_in_trash' => __('No entry in trash'),
  'parent_pps_colon' => ''
);
register_post_type('pps', array(
  'label' => __('Popups'),
  'labels' => $labels,
  'singular_label' => __('Popups'),
  'public' => true,
  'show_ui' => true,
  'capability_type' => 'post',
  'add_new' => _x('New entry', 'pps'),
  'add_new_pps' => __('New entry'),
  'hierarchical' => false,
  'rewrite' => array( 'slug' => 'popup', 'with_front' => false ),
  'query_var' => true,
  'menu_position' => 9,
  'menu_icon' => 'dashicons-images-alt2',
  'supports' => array('title', 'editor')
));
