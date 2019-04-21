<?php
/**
 * Persistence Customizer functionality
 *
 * @package WordPress
 * @subpackage Persistence
 * @since Persistence 1.0
 */
 
/**
 * Set up the WordPress core custom header and custom background features.
 *
 * @since Persistence 1.0
 */
function persistence_custom_logo_and_header() {
	/**
	 * Filter the arguments used when adding 'custom-logo' support in Persistence.
	 *
	 * @since Persistence 1.0
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 200,
		'width'       => 200,
		'flex-height' => true,
	) );
	
	/**
	 * Filter the arguments used when adding 'custom-header' support in Persistence.
	 *
	 * @since Persistence 1.0
	 */
	add_theme_support( 'custom-header', apply_filters(
	'persistence_custom_header_args', array(
		'default-text-color' 	=> '#096484',
		'default-image' 		=> '',
		'height' 				=> 600,
		'width' 				=> 1600,
		'flex-height' 			=> true,
		'wp-head-callback' 		=> 'persistence_header_style'
	) ) );
}
add_action( 'after_setup_theme', 'persistence_custom_logo_and_header' );

if ( ! function_exists( 'persistence_the_custom_logo' ) ) :
/** 
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 * @since Persistence 1.0
 */
function persistence_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

if ( ! function_exists( 'persistence_header_style' ) ) :
/**
 * Style the header text displayed on the site.
 *
 * @since Persistence 1.0
 */
function persistence_header_style() { ?>
	<style type="text/css" id="persistence-header-css">
	<?php if ( get_header_image() ) : /*active header image*/ ?>
		.custom-background .site-header,
		.site-header {
			background: url(<?php header_image(); ?>) top center;
			height: 600px;
		}
		.nav-menu {
			text-align: center;
		}
	<?php endif; ?>
	
	<?php if ( ! empty( get_custom_logo() ) ) : /*active custom logo*/ ?>
		.wp-custom-logo .site-header,
		.site-header {
			height: 600px;
		}
		.wp-custom-logo .nav-menu,
		.nav-menu {
			text-align: center;
		}
	<?php else : ?>
		.site-header {
			height: 45px;
		}
		.nav-menu {
			text-align: left;
		}
	<?php endif; ?> 
	
	<?php if ( ! display_header_text() ) : /*active header text*/ ?>
		.site-header .site-title,
		.site-header .site-description {
			position: absolute;
			clip: rect(0 0 0 0);
			clip: rect(0,0,0,0);
		}
		.site-header {
			height: 45px;
		}
		.nav-menu {
			text-align: left;
		}
	<?php else: ?>
		.site-header {
			height: 600px;
		}
		.nav-menu {
			text-align: center;
		}
		<?php if ( get_header_textcolor() != get_theme_support( 'custom-header', 'default-text-color' ) ) : ?>
		.site-header .site-title,
		.site-header .site-title a,
		.site-header .site-title a:hover,
		.site-header .site-description {
			color: #<?php echo esc_attr( get_header_textcolor() ); ?>;
		}
		.social-navigation a {
			border: 1px solid #<?php echo esc_attr( get_header_textcolor() ); ?>;
			color: #<?php echo esc_attr( get_header_textcolor() ); ?>;
		}
		<?php endif; ?>
	<?php endif; ?>
	
	<?php if ( has_nav_menu( 'social' ) ) : /*active social navigation*/ ?>
		.site-header {
			height: 600px;
		}
		.nav-menu {
			text-align: center;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif; ?>