<?php
$labels = array(
  'name' => _x('Awards', 'awrd'),
  'singular_name' => _x('Awards', 'awrd'),
  'add_new' => _x('Add new entry', 'awrd'),
  'add_new_awrd' => __('Add new entry'),
  'edit_awrd' => __('Edit entry'),
  'new_awrd' => __('New entry'),
  'view_awrd' => __('View post'),
  'search_Awards' => __('Search in Awards'),
  'not_found' =>  __('No entries has been found'),
  'not_found_in_trash' => __('No entry in trash'),
  'parent_awrd_colon' => ''
);
register_post_type('awrd', array(
  'label' => __('Awards'),
  'labels' => $labels,
  'singular_label' => __('Awards'),
  'public' => true,
  'show_ui' => true,
  'capability_type' => 'post',
  'add_new' => _x('New entry', 'awrd'),
  'add_new_awrd' => __('New entry'),
  'hierarchical' => false,
  'rewrite' => array( 'slug' => 'award', 'with_front' => false ),
  'query_var' => true,
  'menu_position' => 9,
  'menu_icon' => 'dashicons-awards',
  'supports' => array('title', 'editor', 'thumbnail')
));
