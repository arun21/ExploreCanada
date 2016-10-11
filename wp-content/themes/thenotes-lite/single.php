<?php
/**
 * The Template for displaying all single posts.
 * @package WordPress
 * @SketchThemes
 */
?>

<?php get_header(); ?>

<!-- BEGIN: BLOG -->
<section id="blog-wrapper" class="blog-sections">
	<!-- BEGIN: CONTAINER -->
	<div class="container">
		<div class="row">
			<!-- BEGIN: INNER BLOG SECTION -->
			<div id="content" class="content-wrap col-md-8 col-sm-8">
				<?php if(have_posts()) : ?>
					<?php while(have_posts()) : the_post(); ?>
						<!-- BEGIN: EACH BLOG DIVISION -->
						<div id="post-<?php the_ID(); ?>" <?php post_class('animatedParent blog-page-section standard-blog'); ?>>
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

									<div class="animated fadeInUpShort blog-page-meta">
										<span class="blog-meta-author primary-color"><?php _e('by', 'thenotes-lite'); ?> <?php echo get_the_author_meta('display_name',$post->post_author); ?></span>
										<span class="blog-meta-sep primary-color">|</span>
										<span class="blog-meta-date primary-color"><?php echo get_the_time( get_option( 'time_format' ) ); ?></span>
									</div>

									<div class="animated fadeInUpShort blog-page-des">
										<div id="blog-inner-content" class="blog-inner-content">
											<?php the_content(); ?>
											<?php wp_link_pages( array('before' => '<p><strong>'.__('Pages :','thenotes-lite').'</strong>','after' => '</p>', __('number','thenotes-lite') ) ); ?>
										</div>
									</div>

									<div class="clearfix"></div>


								</div>
								<div class="clearfix"></div>
								<div class="animated fadeInUpShort blog-page-metas">
									<div class="clearfix">
										<?php if (has_category()) { ?>
											<i class="fa fa-folder-open primary-color"></i> <?php the_category(', '); ?>
										<?php } ?>
									</div>
									<div class="clearfix">
										<?php if ( has_tag() ) {
											echo '<i class="fa fa-tags primary-color"></i> ';
											the_tags();
										} ?>
									</div>
								</div>

								<div class="animated fadeInUpShort blog-page-meta-bottom">
									<span class="blog-meta-comment">
									<i class="fa fa-comment primary-color"></i>&nbsp;&nbsp;<?php comments_popup_link( __('POST A COMMENT', 'thenotes-lite'), __('1 COMMENT ', 'thenotes-lite'), __('% COMMENTS ', 'thenotes-lite'), 'comments-link', __('COMMENTS OFF ', 'thenotes-lite') ); ?>
									</span>
								</div>
					<?php endwhile; ?>
				<?php else : ?>
					<h2><?php _e('Not Found','thenotes-lite'); ?></h2>
				<?php endif; ?>


				<!-- BEGIN: BLOG PAGINATION -->
				<div class="col-md-12 sktpagination-wrap">
					<div class="blog-page-pagination post-pagination clearfix">
						<div class="col-md-6 col-sm-6 col-xs-6 previous-post"><?php previous_post_link( '%link', __('PREVIOUS','thenotes-lite') ); ?></div>
						<div class="col-md-6 col-sm-6 col-xs-6 next-post text-right"><?php next_post_link( '%link', __('NEXT','thenotes-lite') ); ?></div>
					</div>
				</div>
				<div class="clearfix"></div>
				<!-- END: BLOG PAGINATION -->

				<div class="clearfix"></div>

				<!-- BEGIN: AUTHOR AND COMMENT WRAPPER -->
				<div class="author-comment-wrap">

					<!-- BEGIN: COMMENTS WRAPPER -->
					<?php comments_template(); ?>
					<!-- END: COMMENTS WRAPPER -->

				</div>
				<!-- END: AUTHOR AND COMMENT WRAPPER -->
				</div>
				</div>
				<!-- END: EACH BLOG DIVISION -->
			</div>
			<!-- END: INNER BLOG SECTION -->

			<!-- BEGIN: SIDEBAR BLOG -->
			<div id="sidebar" class="sktwed-sidebar-wrap col-md-4 col-sm-4">
			   <?php get_sidebar(); ?>
			</div>
			<!-- END: SIDEBAR BLOG-->
		</div>
	</div>
	<!-- END: CONTAINER -->
</section>
<!-- END: BLOG -->

<?php get_footer(); ?>
