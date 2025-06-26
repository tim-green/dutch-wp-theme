<?php 
/**
 * The template to display archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package dutch
 */
    get_header(); 
?>
        <header class="header">
            <h2 class="entry-title"><?php the_archive_title(); ?></h2>
        </header>
        <main id="content">
            <?php 
                if ( have_posts() ) : while ( have_posts() ) : the_post();
                get_template_part( 'entry-summary' ); 
                endwhile; endif;
                dutch_page_navigation(); 
            ?>
        </main>
    <?php 
        get_sidebar(); 
        get_footer(); 
    ?>