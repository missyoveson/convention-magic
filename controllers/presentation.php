<?php

class presentation {
	function convention_magic_presentation(){
		register_post_type( 'convention_magic_presentation',
			[
				'labels' => [
					'name' => __( 'Presentations' ),
					'singular_name' => __( 'Presentation' )
				],
				'public' => true,
				'has_archive' => true,
				'rewrite' => [ 'slug' => 'presentations' ]
			]
		);
	}
}