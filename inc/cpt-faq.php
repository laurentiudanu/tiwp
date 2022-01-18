<?php
$labels = array(
  'name' => _x('FAQ', 'faq'),
  'singular_name' => _x('FAQ', 'faq'),
  'add_new' => _x('Add new entry', 'faq'),
  'add_new_faq' => __('Add new entry'),
  'edit_faq' => __('Edit entry'),
  'new_faq' => __('New entry'),
  'view_faq' => __('View post'),
  'search_FAQ' => __('Search in FAQ'),
  'not_found' =>  __('No entries has been found'),
  'not_found_in_trash' => __('No entry in trash'),
  'parent_faq_colon' => ''
);
register_post_type('faq', array(
	'label' => __('FAQ'),
	'labels' => $labels,
	'singular_label' => __('FAQ'),
	'public' => true,
	'show_ui' => true,
	'capability_type' => 'post',
	'add_new' => _x('New entry', 'faq'),
	'add_new_faq' => __('New entry'),
	'hierarchical' => false,
	'rewrite' => array( 'slug' => 'faq', 'with_front' => false ),
	'query_var' => true,
  'menu_position' => 8,
  'menu_icon' => 'dashicons-nametag',
	'supports' => array('title', 'editor')
));
