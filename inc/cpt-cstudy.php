<?php
$labels = array(
  'name' => _x('Case Studies', 'cstudy'),
  'singular_name' => _x('Case Studies', 'cstudy'),
  'add_new' => _x('Add new entry', 'cstudy'),
  'add_new_cstudy' => __('Add new entry'),
  'edit_cstudy' => __('Edit entry'),
  'new_cstudy' => __('New entry'),
  'view_cstudy' => __('View post'),
  'search_Case Studies' => __('Search in FAQ'),
  'not_found' =>  __('No entries has been found'),
  'not_found_in_trash' => __('No entry in trash'),
  'parent_cstudy_colon' => ''
);
register_post_type('cstudy', array(
  'label' => __('Case Studies'),
  'labels' => $labels,
  'singular_label' => __('Case Studies'),
  'public' => true,
  'show_ui' => true,
  'capability_type' => 'post',
  'add_new' => _x('New entry', 'cstudy'),
  'add_new_cstudy' => __('New entry'),
  'hierarchical' => false,
  'rewrite' => array( 'slug' => 'case-study', 'with_front' => false ),
  'query_var' => true,
  'menu_position' => 9,
  'menu_icon' => 'dashicons-analytics',
  'supports' => array('title', 'editor', 'thumbnail')
));
register_taxonomy("cscat", array("cstudy"), array("hierarchical" => true, "label" => "Categories", "singular_label" => "Category", "rewrite" => array( 'slug' => 'case-study-categories' )));
