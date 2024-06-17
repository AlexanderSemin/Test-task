<?php get_header(); ?>

<div class="container">
<?php
    while ( have_posts() ) :
        the_post();
		the_content();
        if ( comments_open() || get_comments_number() ) :
            //comments_template();
        endif;
    endwhile;
?>
</div>

<?php get_footer(); ?>
