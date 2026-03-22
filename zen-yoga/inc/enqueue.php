<?php
/**
 * Enqueue styles and scripts.
 *
 * @package Zen_Yoga
 */

function zen_enqueue_assets() {
	$version = wp_get_theme()->get( 'Version' );

	// Styles (order matters — dependencies chain correctly).
	wp_enqueue_style( 'zen-variables', get_template_directory_uri() . '/assets/css/variables.css', array(), $version );
	wp_enqueue_style( 'zen-base', get_template_directory_uri() . '/assets/css/base.css', array( 'zen-variables' ), $version );
	wp_enqueue_style( 'zen-sections', get_template_directory_uri() . '/assets/css/sections.css', array( 'zen-base' ), $version );
	wp_enqueue_style( 'zen-responsive', get_template_directory_uri() . '/assets/css/responsive.css', array( 'zen-sections' ), $version );
	wp_enqueue_style( 'zen-style', get_stylesheet_uri(), array( 'zen-responsive' ), $version );

	// Scripts (all in footer, deferred).
	wp_enqueue_script( 'zen-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), $version, true );
	wp_enqueue_script( 'zen-smooth-scroll', get_template_directory_uri() . '/assets/js/smooth-scroll.js', array(), $version, true );
	wp_enqueue_script( 'zen-animations', get_template_directory_uri() . '/assets/js/animations.js', array(), $version, true );
}
add_action( 'wp_enqueue_scripts', 'zen_enqueue_assets' );
