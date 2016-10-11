<?php
/**
 * The template for displaying Comments.
 * The area of the page that contains comments and the comment form.
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
?>

<?php if ( post_password_required() ) { ?>
	<div id="comments" class="comments-wrap">
		<h3 class="comments-heading"><?php esc_attr_e('Comments', 'thenotes-lite'); ?></h3>

		<div class="comments-inner-wrap">
			<p class="comment-notice"><?php esc_attr_e('This post is password protected. Enter the password to view comments.','thenotes-lite'); ?></p>
		</div>
	</div>
<?php return;
} ?>

<div id="comments" class="comments-wrap">
	<h3 class="comments-heading"><?php esc_attr_e('Comments', 'thenotes-lite'); ?></h3>

	<div class="comments-inner-wrap">
		<?php if ( have_comments() ) : ?>
			<?php wp_list_comments( 'callback=thenotes_lite_comment' ); ?>

			<div class="comment-nav">
				<div class="alignleft">
					<?php previous_comments_link() ?>
				</div>

				<div class="alignright">
					<?php next_comments_link() ?>
				</div>
			</div>

		<?php else : // this is displayed if there are no comments so far ?>
			<?php if ( !comments_open() && !is_page() ) : ?>
				<p class="comment-notice"><?php esc_attr_e('Comments are closed.','thenotes-lite'); ?></p>
			<?php else : ?>
				<p class="comment-notice"><?php esc_attr_e('No comments yet...','thenotes-lite'); ?></p>
			<?php endif; ?>
		<?php endif; ?>
	</div>
</div>

<?php if ( comments_open() ) : ?>

<!-- BEGIN: COMMENT FORM WRAPPER -->
<div class="comment-form-wrap">
	<!-- <h3 class="comment-form-heading"><?php esc_attr_e('Leave a Reply', 'thenotes-lite'); ?></h3> -->


	<div class="comment-form-inner row">
		<?php $commenter = wp_get_current_commenter();
			$req = get_option( 'require_name_email' );
			$aria_req = ( $req ? " aria-required='true'" : '' );
		 ?>
		<?php $comment_args = array( 'title_reply'  => esc_attr__( 'Leave a Reply', 'thenotes-lite' ),

  			'title_reply_to'    => esc_attr__( 'Leave a Reply', 'thenotes-lite' ),

			'fields' => apply_filters( 'comment_form_default_fields', array(

			'author' => '<div class="col-xs-12 col-sm-6 col-md-6">
			<label class="comment-input-label" for="author">'.esc_attr__("NAME", "thenotes-lite").'<span class="required">*</span></label>
			<input id="author" class="comment-input-field" name="author" type="text"  placeholder="'. esc_attr__("Type here", "thenotes-lite") .'" value="' . esc_attr( $commenter["comment_author"] ) . '" ' . $aria_req . ' /></div>',

			'email'  => '<div class="col-xs-12 col-sm-6 col-md-6">
			<label class="comment-input-label" for="email">'.esc_attr__("EMAIL", "thenotes-lite").' <span class="required">*</span></label>
			<input id="email" class="comment-input-field" name="email" type="email"  placeholder="'.esc_attr__("Type here", "thenotes-lite").'" value="' . esc_attr(  $commenter["comment_author_email"] ) . '" ' . $aria_req . ' /></div>',

			'website' => '<div class="col-xs-12 col-sm-6 col-md-6">
			<label class="comment-input-label" for="website">'.esc_attr__("WEBSITE", "thenotes-lite").'</label>
			<input id="website" class="comment-input-field" name="website" type="text"  placeholder="'. esc_attr__("Type here", "thenotes-lite") . '" ' .' /></div>',

			'subject' => '<div class="col-xs-12 col-sm-6 col-md-6">
			<label class="comment-input-label" for="subject">'.esc_attr__("SUBJECT", "thenotes-lite").'</label>
			<input id="subject" class="comment-input-field" name="subject" type="text"  placeholder="'. esc_attr__("Type here", "thenotes-lite") . '" ' .' /></div><div class="clearfix"></div>'
			) ),

			'comment_field' => '<div class="col-xs-12 col-sm-12 col-md-12">
			<label class="comment-input-label" for="comment">'.esc_attr__("MESSAGE", "thenotes-lite").' <span class="required">*</span></label>
			<textarea id="comment" class="comment-input-field comment-msg-field" name="comment" rows="1" aria-required="true" placeholder="'.esc_attr__('Type here', 'thenotes-lite').'"' . $aria_req . '></textarea></div><div class="clearfix"></div>',

			'comment_notes_after' => '',

			'label_submit' => esc_attr__('SUBMIT', 'thenotes-lite')

		);
		?>
		<?php comment_form($comment_args); ?>
		</div>
</div>
<!-- END: COMMENT FORM WRAPPER -->
<?php endif; ?>
