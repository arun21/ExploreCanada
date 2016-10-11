<?php
/**
 * The Template for displaying all single pages.
 * @package WordPress
 * @SketchThemes
 */
get_header(); ?>

<!-- BEGIN: BLOG -->
<section id="page-wrapper" <?php post_class(); ?>>
	<!-- BEGIN: CONTAINER -->
	<div class="container">
		<div class="row">
			<!-- BEGIN: INNER BLOG SECTION -->
			<div id="content" class="content-wrap col-md-8 col-sm-8">
				<?php if(have_posts()) : ?>
					<?php while(have_posts()) : the_post(); ?>
						<!-- BEGIN: EACH BLOG DIVISION -->
						<div id="post-<?php the_ID(); ?>" class="animatedParent blog-page-section standard-blog">
							<div class="col-md-1 col-sm-1 col-xs-1 post-icon-wrap text-center primary-bgcolor">
								<i class="fa fa-picture-o post-icon"></i>
							</div>
							<div class="col-md-11 col-sm-11 col-xs-11 post-content-wrap">
								<div class="col-md-12 post-inner-content-wrap">
									<?php if(has_post_thumbnail()) { ?>
										<div class="animated fadeInUpShort blog-page-thumbnail">
											<?php the_post_thumbnail('thenotes-lite-blog-page-thumb'); ?>
										</div>
									<?php } ?>

									<div class="animated fadeInUpShort blog-page-des">
										<div id="blog-inner-content" class="blog-inner-content">
											<?php the_content(); ?>
										</div>
									</div>

									<div class="clearfix"></div>

								</div>

								<?php if ('open' == $post->comment_status) { ?>
									<div class="animated fadeInUpShort blog-page-meta-bottom">
										<span class="blog-meta-comment"><i class="fa fa-comment primary-color"></i>&nbsp;&nbsp;<?php comments_popup_link( __('POST A COMMENT', 'thenotes-lite'), __('1 COMMENT ', 'thenotes-lite'), __('% COMMENTS ', 'thenotes-lite'), 'comments-link', __('COMMENTS OFF ', 'thenotes-lite') ); ?></span>
									</div>

									<div class="clearfix"></div>

									<!-- BEGIN: AUTHOR AND COMMENT WRAPPER -->
									<div class="author-comment-wrap">
										<!-- BEGIN: COMMENTS WRAPPER -->
										<?php comments_template(); ?>
										<!-- END: COMMENTS WRAPPER -->
									</div>
									<!-- END: AUTHOR AND COMMENT WRAPPER -->
								<?php } ?>

								<?php wp_link_pages( array('before' => '<p><strong>'.__('Pages :','thenotes-lite').'</strong>','after' => '</p>', __('number','thenotes-lite') ) ); ?>

								<?php edit_post_link( __('Edit','thenotes-lite'), '', ''); ?>

					<?php endwhile; ?>
				<?php else : ?>
					<h2><?php _e('Not Found','thenotes-lite'); ?></h2>
				<?php endif; ?>


							</div>
						</div>
						<!-- END: EACH BLOG DIVISION -->
			</div>
			<!-- END: INNER BLOG SECTION -->

			<!-- BEGIN: SIDEBAR BLOG -->
			<div id="sidebar" class="sktwed-sidebar-wrap col-md-4 col-sm-4">
			   <?php get_sidebar('page'); ?>
			</div>
			<!-- END: SIDEBAR BLOG-->
		</div>
	</div>
	<!-- END: CONTAINER -->
</section>
<!-- END: BLOG -->

<?php get_footer(); ?>
