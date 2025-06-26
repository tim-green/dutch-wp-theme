<?php 
/**
* The main template file 
 *
 * This is the most generic template file in a WordPress theme and one of the two required files for a theme (the other being style.css).
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package dutch
 */
    get_header(); 
?>
    <main id="content">
        <?php 
            if ( have_posts() ) : while ( have_posts() ) : the_post(); 
            get_template_part( 'entry-summary' );
            endwhile; endif; 
            dutch_page_navigation(); 
        ?>
    </main>
<?php get_footer(); ?>