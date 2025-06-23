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

