<?php
/**
 * Theme setup: support, menus, and core configuration.
 *
 * @package Zen_Yoga
 */

function zen_theme_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'gallery',
		'caption',
		'style',
		'script',
	) );

	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'zen-yoga' ),
	) );
}
add_action( 'after_setup_theme', 'zen_theme_setup' );
