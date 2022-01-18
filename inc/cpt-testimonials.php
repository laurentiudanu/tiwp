<?php
$labels = array(
  'name' => _x('Testimonials', 'tstm'),
  'singular_name' => _x('Testimonials', 'tstm'),
  'add_new' => _x('Add new entry', 'tstm'),
  'add_new_tstm' => __('Add new entry'),
  'edit_tstm' => __('Edit entry'),
  'new_tstm' => __('New entry'),
  'view_tstm' => __('View post'),
  'search_Testimonials' => __('Search in Testimonials'),
  'not_found' =>  __('No entries has been found'),
  'not_found_in_trash' => __('No entry in trash'),
  'parent_tstm_colon' => ''
);
register_post_type('tstm', array(
  'label' => __('Testimonials'),
  'labels' => $labels,
  'singular_label' => __('Testimonials'),
  'public' => true,
  'show_ui' => true,
  'capability_type' => 'post',
  'add_new' => _x('New entry', 'tstm'),
  'add_new_tstm' => __('New entry'),
  'hierarchical' => false,
  'rewrite' => array( 'slug' => 'tstm', 'with_front' => false ),
  'query_var' => true,
  'menu_position' => 10,
  'menu_icon' => 'dashicons-media-text',
  'supports' => array('title', 'editor')
));
