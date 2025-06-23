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

