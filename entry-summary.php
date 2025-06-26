<?php
    /**
	 * The template for entry summary
	 *
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package dutch
	 */
?>
<div class="entry-summary">
    <a href="<?php the_permalink(); ?>" rel="bookmark">
        <?php the_title( '<h2 class="entry-title-summary">', '</h2>' ); ?>
        <div class="entry-meta">
            <span class="entry-date">
            <?php   
                    the_time( get_option( 'date_format' ) );  
                    $up_time = get_the_time('U'); 
                    $modified_time = get_the_modified_time('U'); 
                    if ($modified_time >= $up_time + 86400) { echo ", Updated: "; 
                    the_modified_time( get_option( 'date_format' ) ); } 
            ?>
            </span>
        </div>
    </a>
</div>
