<?php
/**
 * kc-tennis-blast functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package kc-tennis-blast
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function kc_tennis_blast_setup() {
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'editor-styles' );
	add_editor_style( 'assets/css/editor.css' );
}
add_action( 'after_setup_theme', 'kc_tennis_blast_setup' );

function kc_tennis_blast_load_custom_fonts() {
	wp_enqueue_style(
		'kc-tennis-blast-fonts',
		'https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Alumni+Sans:wght@400;600;700&display=swap',
		array(),
		null
	);
}
add_action( 'wp_enqueue_scripts', 'kc_tennis_blast_load_custom_fonts' );
add_action( 'enqueue_block_assets', 'kc_tennis_blast_load_custom_fonts' );

function tennis_blast_enqueue_scripts() {
	if ( ! is_admin() ) {
		wp_enqueue_script(
			'coaches-carousel-js',
			get_template_directory_uri() . '/js/coaches-carousel.js',
			array(),
			'1.0',
			true
		);
	}
}
add_action( 'wp_enqueue_scripts', 'tennis_blast_enqueue_scripts' );
