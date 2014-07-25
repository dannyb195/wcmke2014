<?php

/**
 * Create a taxonomy
 *
 * @uses  Inserts new taxonomy object into the list
 * @uses  Adds query vars
 *
 * @param string  Name of taxonomy object
 * @param array|string  Name of the object type for the taxonomy object.
 * @param array|string  Taxonomy arguments
 * @return null|WP_Error WP_Error if errors, otherwise null.
 */
function wcmke_2014_tax() {

	$labels = array(
		'name'					=> _x( 'Employees Categories', 'Taxonomy Plural Name', 'wcmke2014' ),
		'singular_name'			=> _x( 'Employees Category', 'Taxonomy Singular Name', 'wcmke2014' ),
		'search_items'			=> __( 'Search Employees Categories', 'wcmke2014' ),
		'popular_items'			=> __( 'Popular Employees Categories', 'wcmke2014' ),
		'all_items'				=> __( 'All Employees Categories', 'wcmke2014' ),
		'parent_item'			=> __( 'Parent Employees Category', 'wcmke2014' ),
		'parent_item_colon'		=> __( 'Parent Employees Category', 'wcmke2014' ),
		'edit_item'				=> __( 'Edit Employees Category', 'wcmke2014' ),
		'update_item'			=> __( 'Update Employees Category', 'wcmke2014' ),
		'add_new_item'			=> __( 'Add New Employees Category', 'wcmke2014' ),
		'new_item_name'			=> __( 'New Employees Category Name', 'wcmke2014' ),
		'add_or_remove_items'	=> __( 'Add or remove Employees Categories', 'wcmke2014' ),
		'choose_from_most_used'	=> __( 'Choose from most used Employees Categories', 'wcmke2014' ),
		'menu_name'				=> __( 'Employees Category', 'wcmke2014' ),
	);

	$args = array(
		'labels'            => $labels,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_admin_column' => false,
		'hierarchical'      => false,
		'show_tagcloud'     => true,
		'show_ui'           => true,
		'query_var'         => true,
		'rewrite'           => true,
		'query_var'         => true,
		'capabilities'      => array(),
	);

	register_taxonomy( 'employees_tax', array( WCMKE_CPT ), $args );
}

add_action( 'init', 'wcmke_2014_tax', 10 );
