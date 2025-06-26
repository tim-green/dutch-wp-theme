<?php 
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dutch
 */
?>
<div class="clear"></div>
    </div>
            <footer id="footer">
                <div id="search">
                    <?php get_search_form(); ?>
                </div>
                <div id="copyright">
                    <?php bloginfo( 'name' ); ?>
                    <span class="post-count"> website contains <?php $count_posts = wp_count_posts(); $total_posts = $count_posts->publish; echo $total_posts . ' posts'; ?>
                     &copy;  <?php echo date( "Y" ); ?> 
                </span>
                </div>
            </footer>
        </div>
        <?php wp_footer(); ?>
    </body>
</html>