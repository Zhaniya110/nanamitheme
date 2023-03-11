<?php

/*
* Plugin Name: Country Taxonomy
* Description: A short example showing how to add a taxonomy called Country.
* Version: 1.0
* Author: zhan
* Author URI: https://zhan883.kz
*/

function wporg_register_taxonomy_country() {
	 $labels = array(
		 'name'              => _x( 'Country', 'taxonomy general name' ),
		 'singular_name'     => _x( 'Country', 'taxonomy singular name' ),
		 'search_items'      => __( 'Search Countries' ),
		 'all_items'         => __( 'All Countries' ),
		 'parent_item'       => __( 'Parent Country' ),
		 'parent_item_colon' => __( 'Parent Country:' ),
		 'edit_item'         => __( 'Edit Country' ),
		 'update_item'       => __( 'Update Country' ),
		 'add_new_item'      => __( 'Add New Country' ),
		 'new_item_name'     => __( 'New Country Name' ),
		 'menu_name'         => __( 'Country' ),
	 );
	 $args   = array(
		 'hierarchical'      => true, // make it hierarchical (like categories)
		 'labels'            => $labels,
		 'show_ui'           => true,
		 'show_in_rest' => true, // add support for Gutenberg editor
		 'show_admin_column' => true,
		 'query_var'         => true,
		 'rewrite'           => [ 'slug' => 'country' ],
	 );
	 register_taxonomy( 'country', [ 'movies' ], $args );
}
add_action( 'init', 'wporg_register_taxonomy_country' );
?>