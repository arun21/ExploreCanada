<?php
/**
 * The template for displaying a "No posts found" message.
 */
?>
<!-- BEGIN: EACH BLOG DIVISION -->
<div id="post-<?php the_ID(); ?>" <?php post_class('animatedParent blog-page-section none-blog'); ?>>
	<div class="col-md-1 col-sm-1 col-xs-1 post-icon-wrap text-center primary-bgcolor">
		<i class="fa fa-search post-icon"></i>
	</div>
	<div class="col-md-11 col-sm-11 col-xs-11 post-content-wrap">
		<div class="col-md-12 post-inner-content-wrap">
			<div class="animated fadeInUpShort blog-page-des">
				<div class="blog-inner-content">
					<h3 class="blog-inner-title"><?php _e('Nothing Found','thenotes-lite'); ?></h3>
					<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
					<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'thenotes-lite' ), admin_url( 'post-new.php' ) ); ?></p>
					<?php elseif ( is_search() ) : ?>
						<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with different keywords.', 'thenotes-lite' ); ?></p>
					<?php get_search_form(); ?>
					<?php else : ?>
						<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'thenotes-lite' ); ?></p>
					<?php get_search_form(); ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END: EACH BLOG DIVISION -->
