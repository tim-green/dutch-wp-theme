<?php 
    get_header(); 
    if ( have_posts() ) : 
?>
    <header class="header">
    <h2 class="entry-title"><?php printf( esc_html__( 'Search Results for: %s', 'dutch' ), get_search_query() ); ?></h2>
    </header>
    <main id="content">
        <?php 
            while ( have_posts() ) : the_post(); 
             get_template_part( 'entry-summary' );  
            endwhile; 

            dutch_page_navigation(); 
            ?>
        </main>
        <?php else : ?>
            <main id="content">
            <article id="post-zero" class="post no-results not-found">
                <header class="header">
                    <h2 class="entry-title"><?php esc_html_e( 'Nothing Found', 'dutch' ); ?></h2>
                </header>
                <div class="entry-content">
                    <p class="search-error"><?php _e( 'Please try a new search, or select from the Menu or Archives', 'dutch' ); ?></p>
                <div id="search" class="error-search">
                <?php get_search_form(); ?>
            </div>
            </div>
        </article>
    </main>
    <?php endif; 
        get_sidebar(); 
        get_footer(); 
    ?>