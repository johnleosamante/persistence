<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 * @subpackage Persistence
 * @since Persistence 1.0
 */
 
/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
	return;
?>

<div id="comments" class="comments-area">
	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
		<?php
			printf( _nx( 'One thought on &ldquo;%2$s&rsquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'persistence' ),
				number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
		?>
		</h2>
		
		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style' => 'ol',
					'short_ping' => true,
					'avatar_size' => 74,
				) );
			?>
		</ol><!-- .comment-list -->
		
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<nav class="navigation comment-navigation" role="navigation">
			<h1 class="screen-reader-text section-heading"><?php _e( 'Comment navigation', 'persistence' ); ?></h1>
			
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'persistence' ) ); ?></div>
			
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'persistence' ) ); ?></div>
		</nav><!-- .comment-navigation -->
		<?php endif; ?>
		
		<?php if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'persistence' ); ?></p>
		<?php endif; ?>
	<?php endif; ?>
	
	<?php comment_form(); ?>
	
</div><!-- #comments -->