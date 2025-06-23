<?php

// Setup the dutch theme 
function dutch_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'disable-custom-colors' );
	add_theme_support( 'editor-color-palette', array() );
	add_theme_support( 'disable-custom-gradients' );
	add_theme_support( 'editor-gradient-presets', array() );
	add_theme_support( 'html5', array('search-form','comment-form','comment-list','gallery','caption','script','style',));

	global $content_width;
	if ( ! isset( $content_width ) ) { $content_width = 1080; }
	register_nav_menus( array( 'main-menu' => esc_html__( 'Main Menu', 'dutch' ) ) );
	load_theme_textdomain( 'dutch', get_template_directory() . '/languages' );
	// Remove SVG and Global styles
	remove_action( 'wp_enqueue_scripts','wp_enqueue_global_styles' );

	// Remove wp_footer action that adds global inline styles
	remove_action( 'wp_footer','wp_enqueue_global_styles',1 );

	// Remove render_block filters
	remove_filter( 'render_block','wp_render_duotone_support' );
	remove_filter( 'render_block','wp_restore_group_inner_container' );
	remove_filter( 'render_block','wp_render_layout_support_flag' );
}
add_action( 'after_setup_theme', 'dutch_setup' );

// Enqueue block editor styles
function dutch_block_editor_styles() {
	wp_enqueue_style( 'dutch-block-editor-css', get_theme_file_uri( '/assets/css/block-editor.css' ), false );
}
add_action( 'enqueue_block_editor_assets', 'dutch_block_editor_styles' );

// enqueue styles and scripts 
function dutch_load_scripts() {
	wp_enqueue_style( 'dutch-style', get_stylesheet_uri() );
	wp_enqueue_style( 'dutch-main', get_theme_file_uri( '/build/css/app.css' ), false );
	if ( ( ! is_admin() ) && is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	// remove theme.json
	wp_dequeue_style( 'global-styles' );
}
add_action( 'wp_enqueue_scripts', 'dutch_load_scripts' );


// Custom page navigation for dutch
function dutch_page_navigation() {
	global $wp_query;
	if ( $wp_query->max_num_pages > 1 ) {
		echo '<nav id="nav-below" class="navigation" role="navigation">';
			echo '<ul><li class="nav-next" style="display: inline-block;">';
			previous_posts_link( '&#10094; Newer' );
			
		echo '</li><li class="nav-previous" style="display: inline-block;">';
			next_posts_link( 'Older &#10095;' );
		echo '</li></ul>';
		echo '</nav>';
	}
}

// Register optimised styles 
function dutch_register_optimised_styles() {
    wp_register_style( 'comments-optimized', get_template_directory_uri() . '/assets/css/comments.css' );
    wp_register_style( 'jetpack-optimized', get_template_directory_uri() . '/assets/css/jetpack.css' );
}
add_action('init', 'dutch_register_optimised_styles');

// Enqueue optimised styles 
function dutch_enqueue_optimised_styles() {
    if ( is_singular() && comments_open() || is_singular() && get_comments_number() ) {
        wp_enqueue_style( 'comments-optimized' );
    }
    if ( in_array( 'jetpack/jetpack.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
		wp_enqueue_style( 'jetpack-optimized' );
	}
}
add_action( 'wp_enqueue_scripts', 'dutch_enqueue_optimised_styles' );

// Widget setup and register sidebar 
function dutch_widgets_init() {
	register_sidebar( array(
		'name' => esc_html__( 'Sidebar Widget Area', 'dutch' ),
		'id' => 'primary-widget-area',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
}
add_action( 'widgets_init', 'dutch_widgets_init' );

// Add more characters for excerpt 
function dutch_excerpt_more( $more ) {
	global $post;
	return '<a class="more-link" href="' . get_permalink($post->ID) . '">...</a>';
}
add_filter( 'excerpt_more', 'dutch_excerpt_more' );

// Changed more text link
function dutch_read_more_link() {
	return '... <a class="more-link" href="' . get_permalink() . '">...continue reading</a>';
}
add_filter( 'the_content_more_link', 'dutch_read_more_link' );

// Remove query strings from static resources 
function _remove_script_version( $src ) {
	$parts = explode( '?', $src );
	return $parts[0];
}
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );

// Cleanup header
add_action( 'do_feed_rss2_comments', 'disable_feeds', -1 );
add_action( 'do_feed_atom_comments', 'disable_feeds', -1 );
add_action( 'feed_links_show_comments_feed', '__return_false', -1 );
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );

