<?php
/*
Template Name: home
*/ 
get_template_part( 'template_parts/header' ); ?>

<?php 
    while ( have_posts() ) : the_post();
        the_content();
    endwhile; 
    ?>
<?php get_template_part( 'template_parts/footer' ); ?>