<?php

class event {
    public function __constructor(){

    }
    public function convention_magic_create_event(){
            $labels     = array(
                'name'          => __( 'Events', 'convention-magic'),
                'singular_name' => __( 'Event', 'convention-magic' ),
                'add_new' => 'Add New Event',
                'add_new_item' => 'Add New Event',
                'edit_item' => 'Edit Event',
                'new_item' => 'New Event',
                'all_items' => 'All Events',
                'view_item' => 'View Event',
                'search_items' => 'Search Events',
                'not_found' => 'No Events Found',
                'not_found_in_trash' => 'No Events found in Trash',
                'menu_name' => 'Events',
                'parent_item_colon' => '',
            );
            $args = array(
                'labels' => $labels,
                'taxonomy' => array('category', 'post_tag', 'rooms'),
                'public'      => true,
                'show_ui' => true,
                'show_in_menu' => true,
                'has_archive' => true,
                'menu_position' => 5,
                'menu_icon' => 'dashicons-calendar-alt',
                'register_meta_box_cb' => 'convention_magic_event_meta_boxes',
                'show_in_rest' => true,
                'description' => '',
                'supports' => array('title', 'editor', 'excerpt', 'custom-fields','thumbnails', 'revisions'),
                'rewrite'     => [ 'slug' => 'events' ]
            );
            register_post_type('event', $args);

	}

    public function convention_magic_event_meta_boxes(){
        add_meta_box(
            'Name',
            __( 'Event Name', 'convention-magic' ),
            'event_name',
            'event',
            'main',
            'high'
        );
        add_meta_box(
          'Time',
            __('Event Time', 'convention-magic'),
            'event_time_set',
            'event',
            'side',
            'high'
        );
        add_meta_box(
          'Description',
            __('Event Description', 'convention-magic'),
            'event_description',
            'event',
            'main',
            'high'
        );
    }

    function event_name($post){
        wp_nonce_field( plugin_basename( __FILE__ ), 'event_nonce' );
        echo '<label for="event_name">Event Name</label>';
        echo '<input type="text" id="event_name" name="event_name" placeholder="The name of the convention event" />';
    }
    function event_time_set(){
        //TODO:: Write function to set the event time in something that will convert to a C# DateTime variable.
        $date = time::set_time();
    }
    function event_description($post){
        echo '<label for="event_description">Event Description</label>';
        echo '<textarea type="text" id="event_description" name="event_description"/>';
    }

    public static function convention_magic_event_hooks(){
        add_action('init', 'convention_magic_create_event');
    }

}
