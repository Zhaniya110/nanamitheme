<?php

/*
* Plugin Name: Genre Taxonomy
* Description: A short example showing how to add a taxonomy called Genre.
* Version: 1.0
* Author: zhan
* Author URI: https://zhan883.kz
*/

function wporg_register_taxonomy_genre() {
	 $labels = array(
		 'name'              => _x( 'Genre', 'taxonomy general name' ),
		 'singular_name'     => _x( 'Genre', 'taxonomy singular name' ),
		 'search_items'      => __( 'Search Genres' ),
		 'all_items'         => __( 'All Genres' ),
		 'parent_item'       => __( 'Parent Genre' ),
		 'parent_item_colon' => __( 'Parent Genre:' ),
		 'edit_item'         => __( 'Edit Genr' ),
		 'update_item'       => __( 'Update Genre' ),
		 'add_new_item'      => __( 'Add New Genre' ),
		 'new_item_name'     => __( 'New Genre Name' ),
		 'menu_name'         => __( 'Genre' ),
	 );
	 $args   = array(
		 'hierarchical'      => true, // make it hierarchical (like categories)
		 'labels'            => $labels,
		 'show_ui'           => true,
		 'show_in_rest' => true, // add support for Gutenberg editor
		 'show_admin_column' => true,
		 'query_var'         => true,
		 'rewrite'           => [ 'slug' => 'genre' ],
	 );
	 register_taxonomy( 'genre', [ 'movies' ], $args );
}
add_action( 'init', 'wporg_register_taxonomy_genre' );
?>