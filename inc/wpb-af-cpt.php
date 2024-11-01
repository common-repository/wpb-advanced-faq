<?php

/*
	WPB Advanced FAQ
	By WPBean
	
*/


/**
 * Register FAQ post type
 */


if ( ! function_exists('wpb_af_post_type') ) {

function wpb_af_post_type() {

	$labels = array(
		'name'                => esc_html_x( 'FAQ\'s', 'Post Type General Name', 'wpb-advanced-faq' ),
		'singular_name'       => esc_html_x( 'FAQ', 'Post Type Singular Name', 'wpb-advanced-faq' ),
		'menu_name'           => esc_html__( 'FAQ', 'wpb-advanced-faq' ),
		'name_admin_bar'      => esc_html__( 'FAQ', 'wpb-advanced-faq' ),
		'parent_item_colon'   => esc_html__( 'Parent FAQ:', 'wpb-advanced-faq' ),
		'all_items'           => esc_html__( 'All FAQ\'s', 'wpb-advanced-faq' ),
		'add_new_item'        => esc_html__( 'Add New FAQ', 'wpb-advanced-faq' ),
		'add_new'             => esc_html__( 'Add New', 'wpb-advanced-faq' ),
		'new_item'            => esc_html__( 'New FAQ', 'wpb-advanced-faq' ),
		'edit_item'           => esc_html__( 'Edit FAQ', 'wpb-advanced-faq' ),
		'update_item'         => esc_html__( 'Update FAQ', 'wpb-advanced-faq' ),
		'view_item'           => esc_html__( 'View FAQ', 'wpb-advanced-faq' ),
		'search_items'        => esc_html__( 'Search FAQ', 'wpb-advanced-faq' ),
		'not_found'           => esc_html__( 'Not found', 'wpb-advanced-faq' ),
		'not_found_in_trash'  => esc_html__( 'Not found in Trash', 'wpb-advanced-faq' ),
	);
	$rewrite = array(
		'slug'                => 'faq',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args = array(
		'label'               => esc_html__( 'FAQ', 'wpb-advanced-faq' ),
		'description'         => esc_html__( 'WPB Advanced FAQ', 'wpb-advanced-faq' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'author', 'page-attributes', ),
		'show_in_rest' 		  => true,
		'taxonomies'          => array( 'wpb_af_faq_category', 'wpb_af_faq_tags' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 80,
		'menu_icon'           => 'dashicons-editor-help',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,		
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'page',
	);
	register_post_type( 'wpb_af_faq', $args );

}
add_action( 'init', 'wpb_af_post_type', 0 );

}	



/**
 *  Register FAQ category 
 */


if ( ! function_exists( 'wpb_af_faq_category' ) ) {

function wpb_af_faq_category() {

	$labels = array(
		'name'                       => esc_html_x( 'Categories', 'Taxonomy General Name', 'wpb-advanced-faq' ),
		'singular_name'              => esc_html_x( 'Category', 'Taxonomy Singular Name', 'wpb-advanced-faq' ),
		'menu_name'                  => esc_html__( 'Category', 'wpb-advanced-faq' ),
		'all_items'                  => esc_html__( 'All Categories', 'wpb-advanced-faq' ),
		'parent_item'                => esc_html__( 'Parent Category', 'wpb-advanced-faq' ),
		'parent_item_colon'          => esc_html__( 'Parent Category:', 'wpb-advanced-faq' ),
		'new_item_name'              => esc_html__( 'New Category Name', 'wpb-advanced-faq' ),
		'add_new_item'               => esc_html__( 'Add New Category', 'wpb-advanced-faq' ),
		'edit_item'                  => esc_html__( 'Edit Category', 'wpb-advanced-faq' ),
		'update_item'                => esc_html__( 'Update Category', 'wpb-advanced-faq' ),
		'view_item'                  => esc_html__( 'View Category', 'wpb-advanced-faq' ),
		'separate_items_with_commas' => esc_html__( 'Separate categories with commas', 'wpb-advanced-faq' ),
		'add_or_remove_items'        => esc_html__( 'Add or remove categories', 'wpb-advanced-faq' ),
		'choose_from_most_used'      => esc_html__( 'Choose from the most used', 'wpb-advanced-faq' ),
		'popular_items'              => esc_html__( 'Popular Categories', 'wpb-advanced-faq' ),
		'search_items'               => esc_html__( 'Search Categories', 'wpb-advanced-faq' ),
		'not_found'                  => esc_html__( 'Not Found', 'wpb-advanced-faq' ),
	);
	$rewrite = array(
		'slug'                       => 'faq_category',
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_in_rest'				 => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'wpb_af_faq_category', array( 'wpb_af_faq' ), $args );

}
add_action( 'init', 'wpb_af_faq_category', 0 );

}



/**
 * Register FAQ Tags 
 */


if ( ! function_exists( 'wpb_af_faq_tags' ) ) {

function wpb_af_faq_tags() {

	$labels = array(
		'name'                       => esc_html_x( 'Tags', 'Taxonomy General Name', 'wpb-advanced-faq' ),
		'singular_name'              => esc_html_x( 'Tag', 'Taxonomy Singular Name', 'wpb-advanced-faq' ),
		'menu_name'                  => esc_html__( 'Tag', 'wpb-advanced-faq' ),
		'all_items'                  => esc_html__( 'All Tags', 'wpb-advanced-faq' ),
		'parent_item'                => esc_html__( 'Parent Tag', 'wpb-advanced-faq' ),
		'parent_item_colon'          => esc_html__( 'Parent Tag:', 'wpb-advanced-faq' ),
		'new_item_name'              => esc_html__( 'New Tag Name', 'wpb-advanced-faq' ),
		'add_new_item'               => esc_html__( 'Add New Tag', 'wpb-advanced-faq' ),
		'edit_item'                  => esc_html__( 'Edit Tag', 'wpb-advanced-faq' ),
		'update_item'                => esc_html__( 'Update Tag', 'wpb-advanced-faq' ),
		'view_item'                  => esc_html__( 'View Tag', 'wpb-advanced-faq' ),
		'separate_items_with_commas' => esc_html__( 'Separate tags with commas', 'wpb-advanced-faq' ),
		'add_or_remove_items'        => esc_html__( 'Add or remove tags', 'wpb-advanced-faq' ),
		'choose_from_most_used'      => esc_html__( 'Choose from the most used', 'wpb-advanced-faq' ),
		'popular_items'              => esc_html__( 'Popular Tags', 'wpb-advanced-faq' ),
		'search_items'               => esc_html__( 'Search Tags', 'wpb-advanced-faq' ),
		'not_found'                  => esc_html__( 'Not Found', 'wpb-advanced-faq' ),
	);
	$rewrite = array(
		'slug'                       => 'faq_tags',
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'wpb_af_faq_tags', array( 'wpb_af_faq' ), $args );

}
add_action( 'init', 'wpb_af_faq_tags', 0 );

}