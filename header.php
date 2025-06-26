<?php 
/**
 * The header for the theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="container">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dutch
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="wrapper" class="hfeed">
    <header id="header">
        <div id="branding">
            <div id="site-title">
                <h1>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a>
                </h1>
                <div id="site-description"><?php bloginfo('description'); ?></div>
            </div>
                <nav id="menu">
                    <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
                </nav>
        </div>
      
    </header>
<div id="container">