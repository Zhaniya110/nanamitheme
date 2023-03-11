<?php

/*
* Plugin Name: Year Taxonomy
* Description: A short example showing how to add a taxonomy called Year.
* Version: 1.0
* Author: zhan
* Author URI: https://zhan883.kz
*/

function wporg_register_taxonomy_Year() {
	 $labels = array(
		 'name'              => _x( 'Year', 'taxonomy general name' ),
		 'singular_name'     => _x( 'Year', 'taxonomy singular name' ),
		 'search_items'      => __( 'Search Years' ),
		 'all_items'         => __( 'All Years' ),
		 'parent_item'       => __( 'Parent Year' ),
		 'parent_item_colon' => __( 'Parent Year:' ),
		 'edit_item'         => __( 'Edit Year' ),
		 'update_item'       => __( 'Update Year' ),
		 'add_new_item'      => __( 'Add New Year' ),
		 'new_item_name'     => __( 'New Year Name' ),
		 'menu_name'         => __( 'Year' ),
	 );
	 $args   = array(
		 'hierarchical'      => true, // make it hierarchical (like categories)
		 'labels'            => $labels,
		 'show_ui'           => true,
		 'show_in_rest' => true, // add support for Gutenberg editor
		 'show_admin_column' => true,
		 'query_var'         => true,
		 'rewrite'           => [ 'slug' => 'year' ],
	 );
	 register_taxonomy( 'year', [ 'movies' ], $args );
}
add_action( 'init', 'wporg_register_taxonomy_year' );
?>