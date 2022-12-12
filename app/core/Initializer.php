<?php

namespace App\core;

defined( 'ABSPATH' ) || die( "No Access" );

class Initializer {

	public function __construct() {

		add_action( 'after_switch_theme', [ $this, 'activate_theme' ] );
		add_action( 'switch_theme', [ $this, 'deactivate_theme' ] );
		add_action( 'after_setup_theme', [ $this, 'setup_theme' ] );

		add_action( 'wp_enqueue_scripts', [ $this, 'register_asset' ] );

	}

	public function activate_theme() {
	}

	public function deactivate_theme() {
	}

	public function setup_theme() {

		//support theme
		$this->theme_support();

		//hide admin bar
		add_filter( "show_admin_bar", "__return_false" );

	}

	public function register_asset() {
		wp_enqueue_style( "salin-main", SALIN_THEME_ASSET_URL . 'css/main.css', [], SALIN_THEME_VERSION, 'all' );
	}

	private function theme_support() {

		add_theme_support( 'title-tag' );

		add_theme_support( 'post-thumbnails' );

		add_image_size( "blog-thumbnail", 417, 235 );

	}

}