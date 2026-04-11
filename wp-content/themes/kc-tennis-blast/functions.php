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
