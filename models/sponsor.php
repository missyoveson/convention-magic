<?php

class sponsor
{
    public static function convention_magic_sponsor(){
        register_post_type( 'convention_magic_sponsor',
            [
                'labels'      => [
                    'name'          => __( 'Sponsors' ),
                    'singular_name' => __( 'Sponsor' ),
                    'add_new' => 'Add New Sponsor',
                    'add_new_item' => 'Add New Sponsor',
                    'edit_item' => 'Edit Sponsor',
                    'new_item' => 'New Sponsor',
                    'all_items' => 'All Sponsors',
                    'view_item' => 'View Sponsor',
                    'search_items' => 'Search Sponsors',
                    'not_found' => 'No Sponsors Found',
                    'not_found_in_trash' => 'No Sponsors found in Trash',
                    'menu_name' => 'Sponsors'
                ],
                'taxonomy' => array('category', 'post_tag', 'rooms'),
                'public'      => true,
                'has_archive' => true,
                'menu_position' => 23,
                'show_in_rest' => true,
                'register_meta_box_cb' => 'convention_magic_sponsor_meta_boxes',
                'supports' => array('title', 'editor', 'excerpt', 'custom-fields','thumbnails', 'page-attributes'),
                'rewrite'     => [ 'slug' => 'events' ]
            ]
        );
    }
    public function convention_magic_sponsor_meta_boxes(){
        add_meta_box(
            'Name',
            __( 'Sponsor Name', 'convention-magic' ),
            'sponsor_name',
            'sponsor',
            'main',
            'high'
        );
        add_meta_box(
          'Logo',
            __('Logo Image', 'convention-magic'),
            'sponsor_image_upload',
            'sponsor',
            'side',
            'low'
        );
        add_meta_box(
            'Description',
            __('Sponsor Description', 'convention-magic'),
            'sponsor_description',
            'sponsor',
            'main',
            'high'
        );
        add_meta_box(
            'Url',
            __('Sponsor\'s Website', 'convention-magic'),
            'sponsor_url',
            'sponsor',
            'main',
            'low'
        );
    }
    public function sponsor_name(){
        wp_nonce_field( plugin_basename( __FILE__ ), 'sponsor_nonce' );
        echo '<label for="sponsor_name">Sponsor Name</label>';
        echo '<input type="text" id="sponsor_name" name="sponsor_name" placeholder="The name of the sponsor" />';
    }

    public function sponsor_image_upload(){
        //TODO:: Write function to upload and include an image
    ?><label for="sponsor-image" class="convention-magic-row-title"><?php _e( 'Sponsor', 'convention-magic' )?></label>
    <input type="text" name="sponsor-image" id="sponsor-image" value="<?php if ( isset ( $convention_magic_meta['meta-image'] ) ) echo $convention_magic_meta['meta-image'][0]; ?>" />
    <input type="button" id="sponsor-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'convention-magic' )?>" />
    <?php
    }

    public function sponsor_description(){
        echo '<label for="sponsor_description">Sponsor\'s Organization Description</label>';
        echo '<textarea type="text" id="sponsor_description" name="sponsor_description"/>';
    }

    public function sponsor_url(){
        echo '<label for="sponsor_url">Sponsor\'s Website</label>';
        echo '<input type="text" id="sponsor_url" name="sponsor_url" placeholder="http://" />';
    }

    public static function sponsor_scripts(){
        wp_enqueue_script('script', plugins_url('assets/js/sponsor-image.js'), array());
    }
    public static function convention_magic_sponsor_hooks(){
        add_action('init', 'convention_magic_sponsor');
        add_action('wp_enqueue_scripts', 'sponsor::sponsor_scripts');
    }
}