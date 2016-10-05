<?php

class event {

	/**
	 *  Create the event custom post type and set the template
	 */
	function convention_magic_event() {
		register_post_type( 'convention_magic_event',
			[
				'labels'      => [
					'name'          => __( 'Events' ),
					'singular_name' => __( 'Event' ),
					'add_new' => 'Add New Event',
					'add_new_item' => 'Add New Event',
					'edit_item' => 'Edit Event',
					'new_item' => 'New Event',
					'all_items' => 'All Events',
					'view_item' => 'View Event',
					'search_items' => 'Search Events',
					'not_found' => 'No Events Found',
					'not_found_in_trash' => 'No Events found in Trash',
					'menu_name' => 'Events'
				],
				'taxonomy' => array('category', 'post_tag', 'rooms'),
				'public'      => true,
				'has_archive' => true,
				'supports' => array('title', 'editor', 'excerpt', 'custom-fields','thumbnails', 'page-attributes'),
				'rewrite'     => [ 'slug' => 'events' ]
			]
		);

	}
}