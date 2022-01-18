<?php
/**
 * Plugin Name:       Enercom Inc. Career Opportunity Plugin
 * Plugin URI:        https://github.com/Enercominc/Career-Opportunities-Plugin
 * Repo URI:          git@github.com:Enercominc/Career-Opportunities-Plugin.git
 * Description:       Handle the additional code needed to list career opportunities
 * Version:           2022.1.8
 * Requires at least: 5.7
 * Requires PHP:      7.2
 * Author:            Bradford Knowlton
 * Author URI:        https://bradknowlton.com/
 * License:           BSD 3-clause
 * License URI:       https://opensource.org/licenses/BSD-3-Clause
 * Text Domain:       enercominc
 * Domain Path:       /languages
 */
 
 // Register Custom Career
function career_post_type() {

	$labels = array(
		'name'                  => _x( 'Careers', 'Career General Name', 'enercominc' ),
		'singular_name'         => _x( 'Career', 'Career Singular Name', 'enercominc' ),
		'menu_name'             => __( 'Careers', 'enercominc' ),
		'name_admin_bar'        => __( 'Career', 'enercominc' ),
		'archives'              => __( 'Career Archives', 'enercominc' ),
		'attributes'            => __( 'Career Attributes', 'enercominc' ),
		'parent_item_colon'     => __( 'Parent Career:', 'enercominc' ),
		'all_items'             => __( 'All Careers', 'enercominc' ),
		'add_new_item'          => __( 'Add New Career', 'enercominc' ),
		'add_new'               => __( 'Add New', 'enercominc' ),
		'new_item'              => __( 'New Career', 'enercominc' ),
		'edit_item'             => __( 'Edit Career', 'enercominc' ),
		'update_item'           => __( 'Update Career', 'enercominc' ),
		'view_item'             => __( 'View Career', 'enercominc' ),
		'view_items'            => __( 'View Careers', 'enercominc' ),
		'search_items'          => __( 'Search Career', 'enercominc' ),
		'not_found'             => __( 'Not found', 'enercominc' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'enercominc' ),
		'featured_image'        => __( 'Featured Image', 'enercominc' ),
		'set_featured_image'    => __( 'Set featured image', 'enercominc' ),
		'remove_featured_image' => __( 'Remove featured image', 'enercominc' ),
		'use_featured_image'    => __( 'Use as featured image', 'enercominc' ),
		'insert_into_item'      => __( 'Insert into Career', 'enercominc' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Career', 'enercominc' ),
		'items_list'            => __( 'Items list', 'enercominc' ),
		'items_list_navigation' => __( 'Items list navigation', 'enercominc' ),
		'filter_items_list'     => __( 'Filter Careers list', 'enercominc' ),
	);
	$args = array(
		'label'                 => __( 'Career', 'enercominc' ),
		'description'           => __( 'Career Opportunities', 'enercominc' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'				=> 'dashicons-businessperson',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'career', $args );

	/**
	 * Remove Metabox
	 */
	if ( is_admin() ) {
	
		function remove_revolution_slider_meta_boxes() {
			// remove_meta_box( 'mymetabox_revslider_0', 'page', 'normal' );
			// remove_meta_box( 'mymetabox_revslider_0', 'post', 'normal' );
			remove_meta_box( 'mymetabox_revslider_0', 'career', 'normal' );
			remove_meta_box( 'mymetabox_revslider_1', 'career', 'normal' ); // Could add _1 _2 etc in case of multiple sliders per page
			remove_meta_box( 'wpseo_meta', 'career', 'normal');
			remove_meta_box( 'postcustom', 'career', 'normal' );
			remove_meta_box( 'rs-addon-typewriter-meta', 'career', 'normal' );
			
		}
	
		add_action( 'do_meta_boxes', 'remove_revolution_slider_meta_boxes' );
		
	}

}
add_action( 'init', 'career_post_type', 0 );

