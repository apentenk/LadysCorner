<?php
/**
 * Recommended way to include parent theme styles.
 * (Please see http://codex.wordpress.org/Child_Themes#How_to_Create_a_Child_Theme)
 *
 */  

add_action( 'wp_enqueue_scripts', 'ladyscorner_style' );
				function ladyscorner_style() {
					wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
					wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style') );
				}

/**
 * Your code goes below.
 */

/**
 * Redirect to the previous page after login via the Ultimate Member login form.
 */
add_filter( 'um_browser_url_redirect_to__filter', function( $url ) {
	if ( empty( $url ) && isset( $_SERVER['HTTP_REFERER'] ) ) {
		$url = esc_url( wp_unslash( $_SERVER['HTTP_REFERER'] ) );
	}
	return add_query_arg( 'umuid', uniqid(), $url );
} );