<?php

class presentation {
	public static function convention_magic_presentation(){
		register_post_type( 'convention_magic_presentation',
			[
				'labels'      => [
					'name'          => __( 'Presentations' ),
					'singular_name' => __( 'Presentation' ),
					'add_new' => 'Add New Presentation',
					'add_new_item' => 'Add New Presentation',
					'edit_item' => 'Edit Presentation',
					'new_item' => 'New Presentation',
					'all_items' => 'All Presentations',
					'view_item' => 'View Presentation',
					'search_items' => 'Search Presentations',
					'not_found' => 'No Presentations Found',
					'not_found_in_trash' => 'No Presentations found in Trash',

				],
				'taxonomies' => array('category', 'post_tag', 'speakers', 'rooms'),
				'public'      => true,
				'has_archive' => true,
                'show_ui' => true,
                'show_in_menu' => true,
                'menu_position' => 5,
                'menu_icon' => 'dashicons-media-interactive',
                'menu_name' => 'Presentations',
                'show_in_rest' => true,
                'rest_base' => 'presentation',
				'supports' => array('title', 'editor', 'excerpt', 'custom-fields','thumbnails', 'page-attributes'),
				'rewrite'     => [ 'slug' => 'presentations' ]
			]
		);
	}
    public function presentation_meta_box(){

    }
    public function presentation_save(){

    }
}