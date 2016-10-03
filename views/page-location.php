<?php
/*
 *  Template Name: Location
 */
get_header();

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		?><h1><?php the_title();?></h1> <?php
		the_content();
	} // end while
} // end if

get_footer();