<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="header">
         <figure class="post-feature-image">
            <?php the_post_thumbnail(); ?>
         </figure>

        <?php the_title( '<h2 class="entry-title">', '</h2>' );
            if ( is_single() ) { ?>
        <div class="entry-meta">
            <span class="entry-date">
            <?php 
                the_time( get_option( 'date_format' ) ); 
                $up_time = get_the_time('U'); 
                $modified_time = get_the_modified_time('U'); 
                    if ($modified_time >= $up_time + 86400) { 
                        echo ", Updated: "; 
                the_modified_time( get_option( 'date_format' ) ); }
            ?>
            </span>
        </div>
        <?php } ?>
        </header>
        <div class="entry-content">
        <?php 
            the_content();
            wp_link_pages( array(
            'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'dutch' ) . '</span>',
            'after'       => '</div>',
            'link_before' => '<span>',
            'link_after'  => '</span>',
            ) );
        ?>
    </div>
</article>