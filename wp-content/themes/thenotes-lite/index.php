<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage SketchThemes
 * @since The Notes 1.0.0
 */
?>

<?php
global $thenotes_lite;
get_header();
?>

<!-- BEGIN: BLOG -->
<section id="blog-wrapper" class="blog-sections">
	<!-- BEGIN: CONTAINER -->
	<div class="container">
		<div class="row">
			<!-- BEGIN: INNER BLOG SECTION -->
			<div id="content" class="content-wrap col-md-8 col-sm-8">
				<?php if(have_posts()) : ?>
					<?php while(have_posts()) : the_post(); ?>
						<?php get_template_part( 'content', get_post_format() ); ?>
					<?php endwhile; ?>

					<div class="clearfix"></div>

					<!-- BEGIN: BLOG PAGINATION -->
					<div class="col-md-1 col-sm-1 col-xs-1 post-icon-wrap text-center">
					</div>
					<div class="col-md-11 col-sm-11 col-xs-11 post-content-wrap">
						<div class="col-md-12 post-inner-content-wrap">
							<div class="blog-page-pagination text-right clearfix">
								<div class="alignleft"><?php previous_posts_link(__('&larr;Previous','thenotes-lite')) ?></div>
								<div class="alignright"><?php next_posts_link(__('Next&rarr;','thenotes-lite'),'') ?></div>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
<!-- END: BLOG PAGINATION -->
				<?php else :  ?>
					<?php get_template_part( 'content', 'none' ); ?>
				<?php endif; ?>
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
