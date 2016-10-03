<?php


class speaker {
	function convention_magic_speaker(){
		register_post_type( 'convention_magic_speaker',
			[
				'labels' => [
					'name' => __( 'Speakers' ),
					'singular_name' => __( 'Speaker' )
				],
				'public' => true,
				'has_archive' => true,
				'rewrite' => [ 'slug' => 'speakers' ]
			]
		);
	}
}