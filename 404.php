<?php get_header(); ?>
    <main id="content">
        <article class="post not-found">
            <header class="header">
                <h2 class="entry-title"><?php esc_html_e( 'Error 404 - Page not found', 'dutch' ); ?></h2>
            </header>

            <div class="entry-content">
                <h4>Hello, below are some helpful tips:</h4>
                <ul>
                    <li>Use the search form below</li>
                        <div id="search" class="error-search error404">
                            <?php get_search_form(); ?>
                        </div>
                    <li>Select a menu item from the top Menu</li>
                    <li>Look through the archives</li>
                    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">Return to home</a></li>
                    
                </ul>
              
            </div>
        </article>
    </main>
    <?php 
        get_sidebar(); 
        get_footer(); 
    ?>