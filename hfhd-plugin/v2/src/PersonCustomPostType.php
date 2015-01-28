<?php

namespace HFHD;

class PersonCustomPostType {
	const POST_TYPE	= "hfhd-person-cpt";
	const SLUG 		= "person";

	function __construct() {
		add_action( 'init', 			array( $this, 'registerPostType' ) );
		add_filter( 'enter_title_here', array( $this, 'changeEnterTitleHere' ));
	}
		
	public function onPluginActivated() {
		$this->registerPostType();
		flush_rewrite_rules();
	}
	
	public function onPluginDeactivated() {
		flush_rewrite_rules();
	}
	
	public function registerPostType() {
		
		// UI labels for Custom Post Type
		$labels = array(
			'name'                => _x( 'People', 				'Person CPT plural name', 		'hfhd' ),
			'singular_name'       => _x( 'Person', 				'Person CPT singular_name', 	'hfhd' ),
			'menu_name'           => _x( 'People', 				'Person CPT menu_name', 		'hfhd' ),
			'parent_item_colon'   => _x( 'Parent Person:', 		'Person CPT parent_item_colon',	'hfhd' ),
			'all_items'           => _x( 'All People', 			'Person CPT all_items', 		'hfhd' ),
			'view_item'           => _x( 'View Person', 		'Person CPT view_item', 		'hfhd' ),
			'add_new_item'        => _x( 'Add New Person', 		'Person CPT add_new_item', 		'hfhd' ),
			'add_new'             => _x( 'Add New', 			'Person CPT add_new', 			'hfhd' ),
			'edit_item'           => _x( 'Edit Person', 		'Person CPT edit_item', 		'hfhd' ),
			'update_item'         => _x( 'Update Person', 		'Person CPT update_item', 		'hfhd' ),
			'search_items'        => _x( 'Search Person', 		'Person CPT search_items', 		'hfhd' ),
			'not_found'           => _x( 'Not Found', 			'Person CPT not_found', 		'hfhd' ),
			'not_found_in_trash'  => _x( 'Not found in Trash',	'Person CPT not_found_in_trash','hfhd' ),
		);
	
		// Options for Custom Post Type
		$args = array(
				'labels'             => $labels,
				'public'             => true,
				'publicly_queryable' => true,
				'show_ui'            => true,
				'show_in_menu'       => true,
				'query_var'          => true,
				'rewrite'            => array( 'slug' => PersonCustomPostType::SLUG ),
				'capability_type'    => 'post',
				'has_archive'        => false,
				'hierarchical'       => false,
				'menu_position'      => 5,
				'supports'           => array(	'title',
												'editor',
												'thumbnail',
												'revisions',
												),
		);
		
		register_post_type( PersonCustomPostType::POST_TYPE, $args );
	}
	
	public function changeEnterTitleHere( $title ) {
		
		$screen = get_current_screen();
		
		if  ( PersonCustomPostType::POST_TYPE === $screen->post_type ) {
			$title = _x( 'Enter full name', 'Person CPT enter_title_here', 'hfhd');
		}
		
		return $title;
	}
}
