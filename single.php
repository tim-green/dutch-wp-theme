<?php 
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package dutch
 */
get_header(); 
?>
<main id="content">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <?php get_template_part( 'entry' ); ?>
        <footer class="entry-footer">
            <div class="post-tag-links"><?php the_tags( '<ul class="tag-links-list"><li class="tag-links" style="display: inline-block;">', '</li> <li class="tag-links" style="display: inline-block;">', '</li></ul>' ); ?></div>
        </footer>
        
        <nav id="nav-below" class="navigation" role="navigation">
            <ul>
                <li class="nav-next" style="display: inline-block;"><?php next_post_link( '%link', '&#10094; Next Post' ); ?></li>
                <li class="nav-previous" style="display: inline-block;"><?php previous_post_link( '%link', 'Prev<span class="nav-abbr">ious</span> Post &#10095;' ); ?></li>
            </ul>
        </nav>
    <?php 
        comments_template(); 
        endwhile; endif; 
    ?>
</main>
<?php 
    get_sidebar(); 
    get_footer(); 
?>