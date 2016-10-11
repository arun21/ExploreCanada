<?php
/**
 * Template Name: Page : No Sidebar Template
 *
 * This is the Normal Page Template like default page.php, but this is without sidebar.
 *
 * @package     WordPress
 * @subpackage 	TheNotes Lite
 * @version 	1.0.0
 *
*/
?>

<?php get_header(); ?>

<?php if(have_posts()) : ?>
<?php while(have_posts()) : the_post(); ?>
<section id="page-wrapper" <?php post_class(); ?>>
	<div class="container post-wrap">
		<div class="row">
			<div class="col-md-1 col-sm-1 col-xs-1"></div>
			<div id="content" class="col-md-11 col-sm-11 col-xs-11 content-fullwidth">
				<div class="post" id="post-<?php the_ID(); ?>">
					<div id="blog-inner-content" class="skepost">
						<?php the_content(); ?>
						<?php wp_link_pages( array('before' => '<p><strong>'.__('Pages :','thenotes-lite').'</strong>','after' => '</p>', __('number','thenotes-lite') ) ); ?>
						<?php edit_post_link( __('Edit','thenotes-lite'), '', ''); ?>
					</div>
					<!-- skepost -->
				</div>
				<!-- post -->

				<?php endwhile; ?>
				<?php else :  ?>
					<div class="post">
						<h2><?php _e('Not Found','thenotes-lite'); ?></h2>
					</div>
				<?php endif; ?>
			</div>
			<!-- content -->
		</div>
	</div>
</section>
<?php get_footer(); ?>
