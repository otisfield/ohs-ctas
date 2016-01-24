<?php
/*
Plugin Name: OHS CTAs Plugin
Description: CTAs Plugin
Author: Derek Dorr
Version: 1.0.0
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

register_activation_hook( __FILE__, 'ohsctas_activate' );

function ohsctas_activate() {
	flush_rewrite_rules();
}

add_action('init', 'ctas_type');

function ctas_type() {

	$labels = array(
		'name' => _x('CTAs', 'post type general name'),
		'singular_name' => _x('CTA', 'post type singular name'),
		'add_new' => _x('Add New', 'ctas'),
		'add_new_item' => __('Add New CTA'),
		'edit_item' => __('Edit CTA'),
		'new_item' => __('New CTA'),
		'view_item' => __('View CTA'),
		'search_items' => __('Search CTAs'),
		'not_found' =>  __('No ctas found'),
		'not_found_in_trash' => __('No ctas found in Trash'), 
		'parent_item_colon' => '',
		'menu_name' => _x('CTAs', 'menu name')
	);
	
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 3,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'supports' => array('title','editor'),
		'has_archive' => false,
		'query_var' => true,
		'show_in_rest' => true,
		'rest_base' => 'ctas',
		'rest_controller_class' => 'WP_REST_Posts_Controller'
	);
	
	register_post_type('ctas',$args);
	
}
 
?>
