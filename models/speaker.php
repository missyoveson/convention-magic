<?php


class speaker {
	public static function convention_magic_speaker(){
		$labels = array(
			'name'                       => _x( 'Speakers', 'taxonomy general name', 'convention-magic' ),
			'singular_name'              => _x( 'Speaker', 'taxonomy singular name', 'convention-magic' ),
			'search_items'               => __( 'Search Speakers', 'convention-magic' ),
			'popular_items'              => __( 'Popular Speakers', 'convention-magic' ),
			'all_items'                  => __( 'All Speakers', 'convention-magic' ),
			'parent_item'                => null,
			'parent_item_colon'          => null,
			'edit_item'                  => __( 'Edit Speaker', 'convention-magic' ),
			'update_item'                => __( 'Update Speaker', 'convention-magic' ),
			'add_new_item'               => __( 'Add New Speaker', 'convention-magic' ),
			'new_item_name'              => __( 'New Speaker Name', 'convention-magic' ),
			'separate_items_with_commas' => __( 'Separate speakers with commas', 'convention-magic' ),
			'add_or_remove_items'        => __( 'Add or remove speakers', 'convention-magic' ),
			'choose_from_most_used'      => __( 'Choose from the most used speakers', 'convention-magic' ),
			'not_found'                  => __( 'No speakers found.', 'convention-magic' ),
			'menu_name'                  => __( 'Speakers', 'convention-magic' )
		);

		$args = array(
			'hierarchical'          => false,
			'labels'                => $labels,
            'public'                => true,
			'show_ui'               => true,
			'show_admin_column'     => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-businessman',
            'show_in_rest'          => true,
            'rest_base'             => 'speaker',
			'register_meta_box_cb' => 'convention_magic_speaker_meta_boxes',
			'update_count_callback' => '_update_post_term_count',
			'query_var'             => true,
			'rewrite'               => array( 'slug' => 'speakers' ),
		);

		register_taxonomy( 'speakers', 'presentations', $args );
	}

		function convention_magic_speaker_meta_boxes() {
			wp_nonce_field( plugin_basename( __FILE__ ), 'speaker_nonce' );?>
		<div class="form-field">
			<p>
				<label for="speaker-image" class="convention-magic-row-title"><?php _e( 'Speaker', 'convention-magic' )?></label>
				<input type="text" name="speaker-image" id="speaker-image" value="<?php if ( isset ( $convention_magic_meta['meta-image'] ) ) echo $convention_magic_meta['meta-image'][0]; ?>" />
				<input type="button" id="speaker-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'convention-magic' )?>" />
			</p>
            <label for="speaker_url">Speaker\'s Website</label>
            <input type="text" id="speaker_url" name="speaker_url" placeholder="http://" />
		</div>
		<?php
	}
	public function speaker_scripts(){
		wp_enqueue_script('script', plugins_url('assets/js/speaker-image.js'), array());
	}
    public static function convention_magic_speaker_hooks(){
		self::convention_magic_speaker();
		add_action('wp-enqueue-scripts', 'speaker_scripts');
    }
}