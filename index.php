<?php get_header(); ?>
    <main id="content">
        <?php 
            if ( have_posts() ) : while ( have_posts() ) : the_post(); 
            get_template_part( 'entry-summary' );
            endwhile; endif; 
            dutch_page_navigation(); 
        ?>
    </main>
<?php get_footer(); ?>