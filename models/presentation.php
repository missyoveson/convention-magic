<?php

class presentation {
    public function __constructor(){

    }
	public function convention_magic_presentation(){
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
                'register_meta_box_cb' => 'convention_magic_presentation_meta_boxes',
                'show_in_rest' => true,
                'rest_base' => 'presentation',
				'supports' => array('title', 'editor', 'excerpt', 'custom-fields','thumbnails', 'page-attributes'),
				'rewrite'     => [ 'slug' => 'presentations' ]
			]
		);
	}
    public function convention_magic_presentation_meta_boxes(){
        add_meta_box(
            'Name',
            __( 'Presentation Name', 'convention-magic' ),
            'presentation_name',
            'presentation',
            'main',
            'high'
        );
        add_meta_box(
            'Time',
            __('Presentation Time', 'convention-magic'),
            'presentation_time',
            'presentation',
            'side',
            'low'
        );
        add_meta_box(
            'Description',
            __('Presentation Description', 'convention-magic'),
            'presentation_description',
            'presentation',
            'main',
            'high'
        );
    }

    public function presentation_name(){
        //TODO:: Create field to set presentation name
    }

    public function presentation_time(){
        //TODO:: Create function to set presentation time
        $date = new DateTime();
    }

    public function presentation_description(){
        //TODO:: Create function to display description fields
    }

    public static function convention_magic_presentation_hooks(){
        add_action('init', 'convention_magic_presentation');
    }
}