<?php
/**
 * The template for displaying Comments.
 *
 * 
 *
 * 
 * @package flytonictheme
 * 
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
		<h3 class="commentsheading"><?php comments_number('No Responses', 'One Response', '% Responses' );?> to &#8220;<?php the_title(); ?>&#8221;</h3>

		<ol class="commentlist">
			<?php
				wp_list_comments( array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 50,
				) );
			?>
		</ol><!-- .comment-list -->

		<?php
			// Are there comments to navigate through?
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
		?>
		<nav class="navigation comment-navigation" role="navigation">
			<h1 class="screen-reader-text section-heading"><?php _e( 'Comment navigation', 'highroller' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'highroller' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'highroller' ) ); ?></div>
		</nav><!-- .comment-navigation -->
		<?php endif; // Check for comment navigation ?>

		<?php if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="no-comments"><?php _e( 'Comments are closed.' , 'highroller' ); ?></p>
		<?php endif; ?>

	<?php endif; // have_comments() ?>

	<?php 

	$comments_args = array(
  
  		
 	'title_reply'       => __( 'Leave a Comment' , 'highroller' ),
  	'title_reply_to'    => __( 'Leave a Comment to %s', 'highroller'  ),
  	'cancel_reply_link' => __( 'Cancel Reply' , 'highroller' ),
  	'label_submit'      => __( 'Submit' , 'highroller' ),
  	
  	'comment_notes_before' => '' ,

  	'comment_notes_after' => '',

  	'fields' => apply_filters( 'comment_form_default_fields', array(

    	'author' =>
     	 '<p class="comment-form-author">' .
     	 '<label for="author">' . __( 'Name', 'highroller' ) . ' ' .
     	 ( $req ? '<span class="required"> (required) </span>' : '' ) .
      	'</label> <input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
     	 '" size="30"/></p>',

    	'email' =>
      	'<p class="comment-form-email"><label for="email">' . __( 'Email', 'highroller' ) . ' ' .
      	( $req ? '<span class="required"> (will not be published) (required)</span>' : '' ) .
      	'</label> <input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
      	'" size="30" /></p>',
  
	'url' =>
   	 '<p class="comment-form-url"><label for="url">' . __( 'Website', 'highroller' ) . '</label>' .
    	'<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
    	'" size="30" /></p>',
   	 )
  	),
	);

	comment_form($comments_args); ?>

</div><!-- #comments -->



