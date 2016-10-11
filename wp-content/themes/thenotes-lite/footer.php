<?php
/**
 * The template for displaying the footer.
 * @package WordPress
 * @SketchThemes
 */
global $thenotes_lite;
?>

<div class="clearfix"></div>
	<!-- BEGIN: FOOTER -->
	<footer id="footer-wrapper">

		<!-- BEGIN: CONTAINER -->
		<div class="container">

			<!-- BEGIN: FOOTER SIDEBAR WRAPPER -->
			<div class="row footer-sidebar-wrapper">
				<?php get_sidebar('footer'); ?>
			</div>
			<!-- END: FOOTER SIDEBAR WRAPPER -->

			<div class="row footer-copyright-wrapper">
				<div class="col-md-6 col-sm-6">
					<?php get_sidebar('footer-copyright'); ?>
				</div>
				<div class="col-md-6 col-sm-6 text-right">
					<span><?php printf( __( 'TheNotes Lite By %s', 'thenotes-lite' ), '<a href="'.esc_url('https://sketchthemes.com').'"><strong>SketchThemes</strong></a>'
					); ?></span>
				</div>
			</div>

		</div>
		<!-- END: CONTAINER -->

	</footer>
	<!-- END: FOOTER -->

	<!-- BEGAIN: SCROLL -->
	<div id="backtop">
		<div class='scroll secondary-bgcolor primary-hover-bgcolor icon'><i class="fa fa-4x fa-angle-up"></i></div>
	</div>
	<!-- END: SCROLL -->

</div>
<?php wp_footer(); ?>
</body>
</html>
