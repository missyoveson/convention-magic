<?php
if(!class_exists('time')){
    include(PLUGIN_DIR . 'controllers/time.php');
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
                    'taxonomies' => array('speakers', 'rooms'),
                    'public'      => true,
                    'has_archive' => true,
                    'show_ui' => true,
                    'show_in_menu' => true,
                    'menu_position' => 6,
                    'menu_icon' => 'dashicons-media-interactive',
                    'menu_name' => 'Presentations',
                    'register_meta_box_cb' => 'presentation::convention_magic_presentation_meta_boxes',
                    'show_in_rest' => true,
                    'rest_base' => 'presentation',
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
    }


    static function presentation_time(){
        wp_nonce_field( plugin_basename( __FILE__ ), 'presentation_nonce' );
        //TODO:: Create function to set presentation time
        $minute = 12;
        $pm = false;
        $hour = 12;
        $day = 12;
        $month =12;
        $year =12;
       $date = time::set_time($year, $month, $day, $hour, $pm, $minute);
    }

}