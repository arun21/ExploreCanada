<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package martial
 */
?>
<div class="block_cont">
	<div class="block_cont_in">
    <div class="content">
		<p><?php esc_html_e( 'Nothing Found', 'martial-lite' ); ?></p>
		<hr>
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'martial-lite' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'martial-lite' ); ?></p>
			<?php get_search_form(); ?>

		<?php
		else : ?>

			<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'martial-lite' ); ?></p>
			<?php get_search_form(); ?>

		<?php endif; ?>
</div>
	</div>
</div>
