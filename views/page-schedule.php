<?php
$query1 = new WP_Query( $args );

if ( $query1->have_posts() ) {
	// The Loop
	while ( $query1->have_posts() ) {
		$query1->the_post();
		echo '<li>' . get_the_title() . '</li>';
	}

	/* Restore original Post Data
	 * NB: Because we are using new WP_Query we aren't stomping on the
	 * original $wp_query and it does not need to be reset with
	 * wp_reset_query(). We just need to set the post data back up with
	 * wp_reset_postdata().
	 */
	wp_reset_postdata();
}

/* The 2nd Query (without global var) */
$query2 = new WP_Query( $args2 );

if ( $query2->have_posts() ) {
	// The 2nd Loop
	while ( $query2->have_posts() ) {
		$query2->the_post();
		echo '<li>' . get_the_title( $query2->post->ID ) . '</li>';
	}

	// Restore original Post Data
	wp_reset_postdata();
}