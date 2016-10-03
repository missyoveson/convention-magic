<?php


class speaker {
	function convention_magic_speaker(){
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
			'menu_name'                  => __( 'Speakers', 'convention-magic' ),
		);

		$args = array(
			'hierarchical'          => false,
			'labels'                => $labels,
			'show_ui'               => true,
			'show_admin_column'     => true,
			'update_count_callback' => '_update_post_term_count',
			'query_var'             => true,
			'rewrite'               => array( 'slug' => 'speakers' ),
		);

		register_taxonomy( 'speakers', 'events', $args );
	}
		// Add term page
		function convention_magic_taxonomy_add_new_meta_field() {
		// this will add the custom meta field to the add new term page
		?>
		<div class="form-field">
			<label for="term_meta[custom_term_meta]"><?php _e( 'Image', 'convention-magic' ); ?></label>
			<input type="text" name="term_meta[custom_term_meta]" id="term_meta[custom_term_meta]" value="">
			<p class="description"><?php _e( 'Enter a value for this field','convention-magic' ); ?></p>
		</div>
		<?php
	}
}