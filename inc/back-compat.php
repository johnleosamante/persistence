<?php
/**
 * Persistence back compat functionality.
 *
 * Prevents Persistence from running on WordPress versions prior to 3.6,
 * since this theme is not meant to be backward compatible and relies on
 * many new functions and markup changes introduced in 3.6.
 *
 * @package WordPress
 * @subpackage Persistence
 * @since Persistence 1.0
 */
 
/**
 * Prevent switching to Persistence an old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since Persistence 1.0
 */
function persistence_switch_theme() {
	switch_theme( WP_DEFAULT_THEME, WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'persistence_upgrade_notice' );
}
add_action( 'after_switch_theme', 'persistence_switch_theme' );

/**
 * Add message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * Persistence on WordPress versions prior to 3.6.
 *
 * @since Persistence 1.0
 */
function persistence_upgrade_notice() {
	$message = sprintf( __( 'Persistence requires at least WordPress version 3.6. You are running version %s. Please upgrade and try again.', 'persistence' ), $GLOBALS['wp-version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevent the Customizer from being loaded on WordPress versions prior to 3.6.
 *
 * @since Persistence 1.0
 */
function persistence_customize() {
	wp_die( sprintf( __( 'Persistence requires at least WordPress version 3.6. You are running version %s. Please upgrade and try again.', 'persistence' ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'persistence_customize' );

/**
 * Prevent the Theme Preview from being loaded on WordPress versions prior to 3.4.
 *
 * @since Persistence 1.0
 */
function persistence_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( __( 'Persistence requires at least WordPress versions 3.6. You are running version %s. Please upgrade and try again.', 'persistence' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'persistence_preview' );
?>