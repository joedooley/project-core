<?php
/**
 * ACF Theme Options Page
 *
 * @package LuminFire\Metro\Core
 * @since   1.0.0
 * @author  Joe Dooley
 * @link    https://luminfire.com/
 */

namespace LuminFire\Metro\Core\Acf;


/**
 * ACF Options Page
 *
 */
function add_theme_options_page() {
	if ( function_exists( 'acf_add_options_page' ) ) {
		acf_add_options_page( array (
			'title'         => 'Metro Library Options',
			'capability'    => 'manage_options',
			'parent_slug'   => 'genesis'
		) );
	}
}

add_action( 'init', __NAMESPACE__ . '\add_theme_options_page' );
