<?php
/************************************************
   ENQUQUE STYLES AND JAVASCRIPTS
************************************************/
function thenotes_lite_stylesheet(){
	global $is_IE, $thenotes_lite;
	$theme = wp_get_theme();

	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/css/font-awesome.min.css', false, $theme->Version);
	wp_enqueue_style( 'google-font-oswald','//fonts.googleapis.com/css?family=Oswald:400,300,700&subset=latin,latin-ext', false, $theme->Version);
	wp_enqueue_style( 'google-font-opensans','//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&subset=latin,greek,greek-ext,latin-ext,vietnamese,cyrillic,cyrillic-ext', false, $theme->Version);

	// Theme CSS
	wp_enqueue_style( 'thenotes-stylesheet', get_stylesheet_uri() );

	//Owl Carousel Css
	wp_enqueue_style('owl-carousel', get_template_directory_uri().'/css/owl.carousel.css', false, $theme->Version);

	// Animation CSS
	wp_enqueue_style('thenotes-animations-wedding', get_template_directory_uri().'/css/animations-wedding.css', false, $theme->Version);
	wp_enqueue_style('thenotes-animations', get_template_directory_uri().'/css/animations.css', false, $theme->Version);
	if($is_IE) {
		wp_enqueue_style('thenotes-animations-ie-fix', get_template_directory_uri().'/css/animations-ie-fix.css', false, $theme->Version);
	}
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	// Bootstrap CSS
	wp_enqueue_style('bootstrap', get_template_directory_uri().'/css/bootstrap.css', false, $theme->Version);

	// prettyPhoto CSS
	wp_enqueue_style('prettyPhoto', get_template_directory_uri().'/css/prettyPhoto.css', false, $theme->Version);

	// BEGIN: JQUERY
	// Bootstrap Carousel JS
	wp_enqueue_script('jquery-bootstrap',get_template_directory_uri().'/js/bootstrap.js', array('jquery'), '1.0', true );

	// Owl JS
	wp_enqueue_script('jquery-owl-carousel',get_template_directory_uri().'/js/owl.carousel.js',array('jquery'),'1.0',true );

	// PrettyPhoto JS
	wp_enqueue_script('jquery-prettyPhoto',get_template_directory_uri().'/js/jquery.prettyPhoto.js',array('jquery'),'1.0',true );

	// Scrollme JS
	wp_enqueue_script('jquery-animate-it',get_template_directory_uri().'/js/css3-animate-it.js',array('jquery'),'1.0',true );
	wp_enqueue_script('jquery-scrollme',get_template_directory_uri().'/js/jquery.scrollme.js',array('jquery'),'1.0',true );

	// Theme Custom JS
	wp_enqueue_script('thenotes-script',get_template_directory_uri().'/js/script.js',array('jquery'),'1.0',true );

	// ReadingTime JS
	wp_enqueue_script('jquery-readingTime',get_template_directory_uri().'/js/readingTime.js',array('jquery'),'1.0',true );

	// END: JQUERY
}
add_action('wp_enqueue_scripts', 'thenotes_lite_stylesheet');

function thenotes_lite_custom_stylesheet(){
	?>
	<!--[if lt IE 9]>
	<script>
	document.createElement('header');
	document.createElement('nav');
	document.createElement('section');
	document.createElement('article');
	document.createElement('aside');
	document.createElement('footer');
	document.createElement('hgroup');
	document.createElement('figure');
	</script>
	<![endif]-->
	<?php
	require_once(get_template_directory().'/includes/thenotes-custom.php');
}
add_action('wp_head', 'thenotes_lite_custom_stylesheet');

function thenotes_lite_footer_custom_enqueue() {
	// Set Default Current Menu-item when site opens in < 960px resolution
	if(is_front_page()){ ?>
	<script>
		jQuery('document').ready(function(){
			"use strict";
			if(jQuery(window).width() < 960)
			jQuery('ul#menu.mini-menu >li:first-child').addClass('current');
		});
	</script>
	<?php } ?>

	<script type="text/javascript">
	jQuery(window).load(function() {
		var deviceLayout = jQuery(window).width();
		if( deviceLayout > 767 ) {
			// content sidebar height
			var sidebar = jQuery('#sktwed-main-sidebar');
			var content = jQuery('#content');

			var contentHeight = content.height();
			var sidebarHeight = sidebar.height();

			if(contentHeight>sidebarHeight){
				sidebar.css('min-height',contentHeight);
			}
			<?php if ( is_single() || is_page() ) { ?>
				var singleContent = jQuery('.post-content-wrap');
				if (singleContent.height()<sidebarHeight) {
					singleContent.css('min-height',sidebarHeight);
				}
			<?php } ?>
			<?php if ( is_archive() || is_category() || is_tag() || is_home() || is_author() || is_search() ) { ?>
				if (contentHeight<sidebarHeight) {
					var contentHeightFix = sidebarHeight - contentHeight;
					jQuery(content).append('<div class="clearfix"></div><div class="blog-page-section"><div class="col-md-1 col-sm-1 post-icon-wrap"></div><div style="min-height:'+contentHeightFix+'px;" class="col-md-11 col-sm-11 post-content-wrap"></div></div>');
				}
			<?php } ?>
		}
	});
	</script>
<?php }
add_action( 'wp_footer', 'thenotes_lite_footer_custom_enqueue' ,100);
?>
