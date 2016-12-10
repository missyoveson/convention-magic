<?php
get_header();
    while ( have_posts() ) : the_post();
        get_template_part( 'content-parts/content-schedule.php');
    endwhile;
get_footer();