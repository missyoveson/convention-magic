<?php


class room {
	function convention_magic_room(){
		$labels = array(
			'name'                       => _x( 'Rooms', 'taxonomy general name', 'convention-magic' ),
			'singular_name'              => _x( 'Room', 'taxonomy singular name', 'convention-magic' ),
			'parent_item'                => null,
			'parent_item_colon'          => null,
			'edit_item'                  => __( 'Edit Room', 'convention-magic' ),
			'update_item'                => __( 'Update Room', 'convention-magic' ),
			'add_new_item'               => __( 'Add New Room', 'convention-magic' ),
			'new_item_name'              => __( 'New Room Name', 'convention-magic' ),
			'add_or_remove_items'        => __( 'Add or remove rooms', 'convention-magic' ),
			'choose_from_most_used'      => __( 'Choose from the most used rooms', 'convention-magic' ),
			'menu_name'                  => __( 'Rooms', 'convention-magic' ),
		);

		$args = array(
			'hierarchical'          => false,
			'labels'                => $labels,
			'show_ui'               => true,
			'show_admin_column'     => true,
			'update_count_callback' => '_update_post_term_count',
			'query_var'             => true,
			'rewrite' => array( 'slug' => 'rooms')
		);
}