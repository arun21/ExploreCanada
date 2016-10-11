<?php
/**
 * SketchThemes functions and definitions
 *
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
*/
/********************************************************
 INCLUDE REQUIRED FILE FOR THEME (PLEASE DON'T REMOVE IT)
*********************************************************/
require_once(get_template_directory() . '/SketchBoard/functions/admin-init.php');
/********************************************************/

/********************************************************
	REGISTERS THE WIDGETS AND SIDEBARS FOR THE SITE
*********************************************************/
function thenotes_lite_widgets_init()
{
	register_sidebar(array(
		'name' => __('Blog Sidebar', 'thenotes-lite'),
		'id'   => 'blog-sidebar',
		'before_widget' => '<li id="%1$s" class="sktwed-widget-list %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="sktwed-widget-title">',
		'after_title' => '</h3>',
	));

	register_sidebar(array(
		'name' => __('Page Sidebar', 'thenotes-lite'),
		'id'   => 'page-sidebar',
		'before_widget' => '<li id="%1$s" class="sktwed-widget-list %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="sktwed-widget-title">',
		'after_title' => '</h3>',
	));

	register_sidebar(array(
		'name' => __('First Footer Sidebar', 'thenotes-lite'),
		'id'   => 'first-footer-sidebar',
		'before_widget' => '<li id="%1$s" class="sktwed-footer-widget sktwed-widget-list %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="sktwed-footer-widget-title">',
		'after_title' => '</h3>',
	));

	register_sidebar(array(
		'name' => __('Second Footer Sidebar', 'thenotes-lite'),
		'id'   => 'second-footer-sidebar',
		'before_widget' => '<li id="%1$s" class="sktwed-footer-widget sktwed-widget-list %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="sktwed-footer-widget-title">',
		'after_title' => '</h3>',
	));

	register_sidebar(array(
		'name' => __('Third Footer Sidebar', 'thenotes-lite'),
		'id'   => 'third-footer-sidebar',
		'before_widget' => '<li id="%1$s" class="sktwed-footer-widget sktwed-widget-list %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="sktwed-footer-widget-title">',
		'after_title' => '</h3>',
	));

	register_sidebar(array(
		'name' => __('Footer Copyright Sidebar', 'thenotes-lite'),
		'id'   => 'footer-copyright-sidebar',
		'before_widget' => '<li id="%1$s" class="sktwed-footer-widget sktwed-widget-list %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="sktwed-footer-widget-title">',
		'after_title' => '</h3>',
	));
}
add_action( 'widgets_init', 'thenotes_lite_widgets_init' );

/**
 * Sets up theme defaults and registers the various WordPress features that
 * Incart supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To add Visual Editor stylesheets.
 * @uses add_theme_support() To add support for automatic feed links, post
 * formats, and post thumbnails.
 * @uses register_nav_menu() To add support for a navigation menu.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
*/
function thenotes_lite_theme_setup() {
	/*
	* Makes Incart available for translation.
	*
	* Translations can be added to the /languages/ directory.
	* If you're building a theme based on Twenty Thirteen, use a find and
	* replace to change 'thenotes-lite' to the name of your theme in all
	* template files.
	*/
	load_theme_textdomain( 'thenotes-lite', get_template_directory() . '/SketchBoard/includes/languages' );

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	add_theme_support( 'custom-logo',  array(
	   'height'      => 215,
	   'width'       => 75,
	   'flex-width' => true,
	   'flex-height' => true
	   )
	);

	/**
	* SETS UP THE CONTENT WIDTH VALUE BASED ON THE THEME'S DESIGN.
	*/
	global $content_width;
	if ( ! isset( $content_width ) ){
	      $content_width = 900;
	}

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support('post-thumbnails');
	add_image_size('thenotes-lite-blog-page-thumb',770, 360, true);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'Header' => __( 'Main Navigation', 'thenotes-lite' ),
	));

	/**
	 * Filter the arguments used when adding 'custom-background' support in Twenty Sixteen.
	 *
	 * @since TheNotes Lite 1.0.0
	 *
	 * @param array $args {
	 *     An array of custom-background support arguments.
	 *
	 *     @type string $default-color Default color of the background.
	 * }
	 */
	add_theme_support( 'custom-background', apply_filters( 'thenotes_lite_custom_background_args', array(
		'default-color' => '#ffffff',
	) ) );

	/**
	 * Filter the arguments used when adding 'custom-header' support in Twenty Sixteen.
	 *
	 * @since TheNotes Lite 1.0.0
	 *
	 * @param array $args {
	 *     An array of custom-header support arguments.
	 *
	 *     @type string $default-text-color Default color of the header text.
	 *     @type int      $width            Width in pixels of the custom header image. Default 1200.
	 *     @type int      $height           Height in pixels of the custom header image. Default 280.
	 *     @type bool     $flex-height      Whether to allow flexible-height header images. Default true.
	 *     @type callable $wp-head-callback Callback function used to style the header image and text
	 *                                      displayed on the blog.
	 * }
	 */
	add_theme_support( 'custom-header', apply_filters( 'thenotes_lite_custom_header_args', array(
		'default-image' => get_template_directory_uri() . '/images/header-image.jpg',
		'default-text-color'     => 'ffffff',
		'width'                  => 1920,
		'height'                 => 1080,
		'flex-height'            => true,
	) ) );
}
add_action( 'after_setup_theme', 'thenotes_lite_theme_setup' );

/**
 * Filter content with empty post title
 *
 */
function thenotes_lite_untitled($title) {
	if ($title == '') {
		return __('Untitled','thenotes-lite');
	} else {
		return $title;
	}
}
add_filter('the_title', 'thenotes_lite_untitled');

/**
 * Remove unused option
 *
 */
function thenotes_lite_customize_register( $wp_customize ) {
	$wp_customize->remove_control('header_textcolor');
}
add_action( 'customize_register', 'thenotes_lite_customize_register' );

function thenotes_lite_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}

/*================= thenotes Load redux framework=================*/
if (file_exists(dirname(__FILE__).'/ReduxCore/framework.php')) {
	require_once( dirname(__FILE__).'/ReduxCore/framework.php' );
}
if (file_exists(dirname(__FILE__).'/ReduxCore/thenotes-config.php')) {
	require_once( dirname(__FILE__).'/ReduxCore/thenotes-config.php' );
}
