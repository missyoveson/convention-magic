<?php
get_header();
    while ( have_posts() ) : the_post();
        get_template_part( 'content-parts/content-presentation.php');
    endwhile;
get_footer();