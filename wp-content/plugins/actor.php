<?php

/*
* Plugin Name: Actor Taxonomy
* Description: A short example showing how to add a taxonomy called Actor.
* Version: 1.0
* Author: zhan
* Author URI: https://zhan883.kz
*/

function wporg_register_taxonomy_Actor() {
	 $labels = array(
		 'name'              => _x( 'Actor', 'taxonomy general name' ),
		 'singular_name'     => _x( 'Actor', 'taxonomy singular name' ),
		 'search_items'      => __( 'Search Actors' ),
		 'all_items'         => __( 'All Actors' ),
		 'parent_item'       => __( 'Parent Actor' ),
		 'parent_item_colon' => __( 'Parent Actor:' ),
		 'edit_item'         => __( 'Edit Genr' ),
		 'update_item'       => __( 'Update Actor' ),
		 'add_new_item'      => __( 'Add New Actor' ),
		 'new_item_name'     => __( 'New Actor Name' ),
		 'menu_name'         => __( 'Actor' ),
	 );
	 $args   = array(
		 'hierarchical'      => true, // make it hierarchical (like categories)
		 'labels'            => $labels,
		 'show_ui'           => true,
		 'show_in_rest' => true, // add support for Gutenberg editor
		 'show_admin_column' => true,
		 'query_var'         => true,
		 'rewrite'           => [ 'slug' => 'actor' ],
	 );
	 register_taxonomy( 'actor', [ 'movies' ], $args );
}
add_action( 'init', 'wporg_register_taxonomy_actor' );
?>