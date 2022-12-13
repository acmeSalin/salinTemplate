<?php

namespace App\core;

defined( 'ABSPATH' ) || die( "No Access" );

class Initializer {

	public function __construct() {

		add_action( 'after_switch_theme', [ $this, 'activate_theme' ] );
		add_action( 'switch_theme', [ $this, 'deactivate_theme' ] );
		add_action( 'after_setup_theme', [ $this, 'setup_theme' ] );

		add_action( 'wp_enqueue_scripts', [ $this, 'register_asset' ] );

		add_action( 'init', [ $this, "initializer" ] );

	}

	public function initializer() {
		//remove stuff from header
		$this->remove_stuff_from_header();
	}

	public function activate_theme() {
	}

	public function deactivate_theme() {
	}

	public function setup_theme() {

		//support theme
		$this->theme_support();

	}

	public function register_asset() {

		//add main css template
		wp_enqueue_style( "salin-main", SALIN_THEME_ASSET_URL . 'css/main.css', [], SALIN_THEME_VERSION, 'all' );

		//remove global styles WordPress
		wp_dequeue_style( 'global-styles' );
		wp_dequeue_style( 'wp-block-library' );
		wp_dequeue_style( 'classic-theme-styles' );
	}

	private function theme_support() {

		add_theme_support( 'title-tag' );

		add_theme_support( 'post-thumbnails' );

		add_image_size( "blog-thumbnail", 417, 235 );

	}

	private function remove_stuff_from_header() {
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
		remove_action( 'wp_head', 'wp_generator' );
		remove_action( 'wp_head', 'rsd_link' );
		remove_action( 'wp_head', 'wlwmanifest_link' );
		remove_action( 'wp_head', 'rest_output_link_wp_head' );
		remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
		remove_action( 'admin_print_styles', 'print_emoji_styles' );
		remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
		remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	}

}