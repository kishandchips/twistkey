<?php
/**
 * twistkey functions and definitions
 *
 * @package twistkey
 * @since twistkey 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since twistkey 1.0
 */

if ( ! function_exists( 'twistkey_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since twistkey 1.0
 */
function twistkey_setup() {

	require( get_template_directory() . '/inc/shortcodes.php' );
	
}
endif; // twistkey_setup
add_action( 'after_setup_theme', 'twistkey_setup' );