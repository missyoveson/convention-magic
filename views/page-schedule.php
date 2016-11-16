<?php
$args = array(
	'post_type' => array('event', 'presentation'),
    'meta_key'          => 'Time',
    'orderby'           => 'meta_value_num',
);
$query = new WP_Query( $args );

