<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Persistence
 * @since Persistence 1.0
 */
?>
</div><!-- #main -->

<footer id="colophon" class="site-footer" role="contentinfo">
	<?php get_sidebar( 'main' ); ?>
	
	<div class="site-info">
		<?php do_action( 'persistence_credits' ); ?>
		
		<span class="site-title">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
		</span>
		
		<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'persistence' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'persistence' ), 'WordPress' ); ?></a>
	</div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>