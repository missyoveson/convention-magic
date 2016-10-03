<?php
/*
 * Template for the presentation custom post type.
 */
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		?><h1><?php the_title();?></h1> <?php
		the_content();
	} // end while
} // end if