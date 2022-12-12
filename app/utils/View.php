<?php

namespace App\utils;

defined( 'ABSPATH' ) || die( "No Access" );

class View {

	public static function render( string $path, array $data = null ) {

		$path_view = str_replace( '.', DIRECTORY_SEPARATOR, $path );
		$path_view = SALIN_THEME_PATH . DIRECTORY_SEPARATOR . $path_view . '.php';

		if ( file_exists( $path_view ) && is_readable( $path_view ) ) {
			if ( ! is_null( $data ) ) {
				extract( $data );
			}
			include "$path_view";
		}

	}

}