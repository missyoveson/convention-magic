<?php
if(!class_exists('schedule')){
    include(PLUGIN_DIR . 'controllers/schedule.php');
}
class presentation {
    public function __construct(){
        $this->convention_magic_presentation();
    }
	static function convention_magic_presentation(){

				$labels = array(
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

                );
                $args = array(
                    'labels' => $labels,
                    'taxonomies' => array('cm-speaker', 'cm-room'),
                    'public'      => true,
                    'has_archive' => true,
                    'show_ui' => true,
                    'show_in_menu' => true,
                    'menu_position' => 6,
                    'menu_icon' => 'dashicons-media-interactive',
                    'menu_name' => 'Presentations',
                    'register_meta_box_cb' => 'presentation::convention_magic_presentation_meta_boxes',
                    'show_in_rest' => true,
                    'rest_base' => 'presentations',
                    'rest_controller_class' => 'WP_REST_Posts_Controller',
                    'supports' => array('title', 'editor', 'page-attributes'),
                    'rewrite'     => [ 'slug' => 'presentations' ]
                );
        register_post_type('cm-presentation', $args);
	}
    static public function convention_magic_presentation_meta_boxes(){
        add_meta_box(
            'Time',
            __('Presentation Time', 'convention-magic'),
            'presentation::presentation_time',
            'cm-presentation',
            'side',
            'low'
        );
        add_meta_box(
            'Speaker',
            __('Presentation Speaker', 'convention-magic'),
            'presentation::presentation_speaker_selection',
            'cm-presentation',
            'side'
        );
    }


    static function presentation_time(){
        wp_nonce_field( plugin_basename( __FILE__ ), 'presentation_nonce' );
        //TODO:: Create function to set presentation time
        $the_date = schedule::set_date();
        $the_time = schedule::set_time();
        $minute = $the_time[1];
        $pm = $the_time[2];
        $hour = $the_time[0];
        $day = $the_date[1];
        $month = $the_date[0];
        $year = $the_date[2];
        $date = schedule::set_schedule($year, $month, $day, $hour, $pm, $minute);
	    }

    static function presentation_speaker_selection(){
        $args = array(
        'show_option_all'         => null, // string
        'show_option_none'        => null, // string
        'hide_if_only_one_author' => null, // string
        'orderby'                 => 'display_name',
        'order'                   => 'ASC',
        'include'                 => null, // string
        'exclude'                 => null, // string
        'multi'                   => false,
        'show'                    => 'display_name',
        'echo'                    => true,
        'selected'                => false,
        'include_selected'        => false,
        'name'                    => 'user', // string
        'id'                      => null, // integer
        'class'                   => null, // string
        'blog_id'                 => $GLOBALS['blog_id'],
        'who'                     => null // string
        );
        wp_dropdown_users($args);
    }
}