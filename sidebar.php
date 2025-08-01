<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dutch
 */
?>
<aside id="sidebar">
<?php if ( is_active_sidebar( 'primary-widget-area' ) ) : ?>
    <div id="primary" class="widget-area">
        <ul class="pwa">
            <?php dynamic_sidebar( 'primary-widget-area' ); ?>
        </ul>
    </div>
<?php endif; ?>
</aside>