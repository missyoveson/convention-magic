<?php

class sponsor
{
    public static function convention_magic_sponsor(){
        $labels  = array(
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
        );
        $args = array(
            'labels' => $labels,
            'taxonomy' => array('category', 'post_tag', 'rooms'),
            'public'      => true,
            'has_archive' => true,
            'menu_position' => 5,
            'menu_icon' => 'dashicons-money',
            'show_in_rest' => true,
            'register_meta_box_cb' => 'sponsor::convention_magic_sponsor_meta_boxes',
            'supports' => array('title', 'editor', 'thumbnails', 'page-attributes'),
            'rewrite'     => [ 'slug' => 'events' ]
        );
        register_post_type('cm-sponsor', $args);
    }
    public static function convention_magic_sponsor_meta_boxes(){
        add_meta_box(
          'Logo',
            __('Logo Image', 'convention-magic'),
            'sponsor::sponsor_image_upload',
            'cm-sponsor',
            'side',
            'low'
        );
        add_meta_box(
            'Url',
            __('Sponsor\'s Website', 'convention-magic'),
            'sponsor::sponsor_url',
            'cm-sponsor',
            'normal',
            'low'
        );
    }

    public static function sponsor_image_upload(){
    ?><label for="sponsor-image" class="convention-magic-row-title"><?php _e( 'Sponsor', 'convention-magic' )?></label>
    <input type="text" name="sponsor-image" id="sponsor-image" value="<?php if ( isset ( $convention_magic_meta['meta-image'] ) ) echo $convention_magic_meta['meta-image'][0]; ?>" />
    <input type="button" id="sponsor-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'convention-magic' )?>" />
    <?php
    }

    public static function sponsor_url(){
        wp_nonce_field( plugin_basename( __FILE__ ), 'sponsor_nonce' );
        echo '<label for="sponsor_url">Sponsor\'s Website</label>';
        echo '<input type="text" id="sponsor_url" name="sponsor_url" placeholder="http://" />';
    }

    public static function sponsor_scripts(){
        wp_enqueue_script('script', plugins_url('assets/js/sponsor-image.js'), array());
    }

}