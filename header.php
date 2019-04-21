<?php
/**
 * The header template for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">.
 *
 * @package WordPress
 * @subpackage Persistence
 * @since Persistence 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
<header id="masthead" class="site-header" role="banner">
	<?php persistence_the_custom_logo(); ?>
		
	<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		
	<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		
	<?php if ( has_nav_menu( 'social' ) ) : ?>
	<nav class="social-navigation" role="navigation">
		<?php
			wp_nav_menu( array(
				'theme_location' => 'social',
				'menu_class' => 'social-links-menu',
				'depth' => 1,
				'link_before' => '<span class="screen-reader-text">',
				'link_after' => '</span>',
			) );
		?>
	</nav><!-- .social-navigation -->
	<?php endif; ?>
	
	<div id="navbar" class="navbar">
		<nav id="site-navigation" class="navigation main-navigation" role="navigation">
			<button class="menu-toggle"><?php _e( 'Menu', 'persistence' ); ?></button>
			<a class="screen-reader-text skip-link" href="#content" title="<?php esc_attr_e( 'Skip to content', 'persistence' ); ?>"><?php _e( 'Skip to content', 'persistence' ); ?></a>
				
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu', 'menu_id' => 'primary-menu' ) ); ?>
		</nav><!-- #site-navigation -->
	</div><!-- #navbar -->
</header><!-- #masthead -->

<div id="main" class="site-main">