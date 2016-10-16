<?php

class sponsor
{
    public function convention_magic_sponsor(){
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
                'supports' => array('title', 'editor', 'excerpt', 'custom-fields','thumbnails', 'page-attributes'),
                'rewrite'     => [ 'slug' => 'events' ]
            ]
        );
    }
    public function sponsor_meta_box(){

    }
    public function sponsor_save(){

    }
}