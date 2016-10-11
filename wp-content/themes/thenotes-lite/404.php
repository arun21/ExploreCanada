<?php
/**
 * The template for displaying Error 404 page.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 */
get_header(); ?>

<!-- BEGIN: ERROR SECTION -->
<section id="notfound-wrapper" class="blog-sections">
	<!-- BEGIN: CONTAINER -->
	<div class="container">

		<!-- BEGIN: INNER SECTION -->
		<div id="content" class="content-wrap col-md-12">

					<!-- BEGIN: EACH DIVISION -->
					<div class="animatedParent blog-page-section standard-blog">
						<div class="col-md-1 col-sm-1 col-xs-1 post-icon-wrap text-center primary-bgcolor">
							<i class="fa fa-exclamation post-icon"></i>
						</div>
						<div class="col-md-11 col-sm-11 col-xs-11 post-content-wrap text-center">
							<div class="col-md-12 post-inner-content-wrap">

								<div class="animated fadeInUpShort blog-page-des">
									<div class="blog-inner-content">
										<h3 class="notfound-title"><?php _e('PAGE NOT FOUND', 'thenotes-lite'); ?></h3>
										<div class="notfound-text"><?php _e('WE\'RE SORRY, BUT SOMETHING WENT WRONG.', 'thenotes-lite'); ?></div>
										<div class="image-wrap not-found-img"><img class="primary-bgcolor" alt="404" src="<?php echo get_template_directory_uri(); ?>/images/404.png" /></div>

										<div class="col-md-3 col-sm-3"></div>
										<div class="col-md-6 col-sm-6">

											<div class="sktwed-widget-content">
												<?php get_search_form(); ?>
											</div>

										</div>
										<div class="col-md-3 col-sm-3"></div>
										<div class="height-50"></div>
									</div>
								</div>

								<div class="clearfix"></div>

							</div>

						</div>
					</div>
					<!-- END: EACH DIVISION -->
		</div>
		<!-- END: INNER SECTION -->

	</div>
	<!-- END: CONTAINER -->
</section>
<!-- END: ERROR SECTION -->

<?php get_footer(); ?>
