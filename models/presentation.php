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
        wp_nonce_field( plugin_basename( __FILE__ ), 'presentation_nonce' );
        echo '<label for="presentation_name">Presentation Name</label>';
        echo '<input type="text" id="presentation_name" name="presentation_name" placeholder="The name of the convention presentation or talk" />';
    }

    public function presentation_time(){
        //TODO:: Create function to set presentation time
       $date = time::set_time();
    }

    public function presentation_description(){
        echo '<label for="presentation_description">Presentation Description</label>';
        echo '<textarea type="text" id="presentation_description" name="presentation_description"/>';
    }

    public static function convention_magic_presentation_hooks(){
        add_action('init', 'convention_magic_presentation');
    }
}