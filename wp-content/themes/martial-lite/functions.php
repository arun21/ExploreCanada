<?php
/**
 * Martial functions and definitions
 *
 * @package martial
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( !isset( $content_width ) ) {
	$content_width = 700; /* pixels */
}

if ( !function_exists( 'martial_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function martial_setup()
	{

		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Martial-Lite, use a find and replace
		 * to change 'martial-lite' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'martial-lite', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Let WordPress manage the logo
		 */
		add_theme_support( 'custom-logo' );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
		) );

		// enable featured images
		add_theme_support( 'post-thumbnails' );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'martial_custom_background_args', array(
			'default-color' => 'f6f6f6',
			'default-image' => '',
			'panel'         => 'martial_colors',
		) ) );

		add_image_size( 'martial-frontpage-blog', 771, 376, true );
	}
endif;
add_action( 'after_setup_theme', 'martial_setup' );

// This theme uses wp_nav_menu() in one location.
register_nav_menus( array(
	'primary' => __( 'Primary Menu', 'martial-lite' ),
) );


// Style the Tag Cloud
function martial_tag_cloud_widget( $args )
{
	$args['largest'] = 12; //largest tag
	$args['smallest'] = 12; //smallest tag
	$args['unit'] = 'px'; //tag font unit
	$args['number'] = '8'; //number of tags
	return $args;
}

add_filter( 'widget_tag_cloud_args', 'martial_tag_cloud_widget' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function martial_widgets_init()
{
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'martial-lite' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<div class="sidebarwidget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer', 'martial-lite' ),
		'id'            => 'martial-footer',
		'before_widget' => '<li class="footerwidget">',
		'after_widget'  => '</li>',
		'before_title'  => '<h4 class="footerwidgettitle">',
		'after_title'   => '</h4>',
	) );
}

add_action( 'widgets_init', 'martial_widgets_init' );

// Load Roboto Font
function martial_fonts_url()
{
	$fonts_url = '';
	$font_families = array();

	// default fonts - Roboto and Arimo
	$roboto = _x( 'on', 'Roboto font: on or off', 'martial-lite' );
	$arimo = _x( 'on', 'Arimo font: on or off', 'martial-lite' );

	if ( 'off' !== $roboto ) {
		$font_families[] = 'Roboto:100,100italic,300,300italic,400,400italic,500,500italic,700,700italic,900,900italic';
	}

	if ( 'off' !== $arimo ) {
		$font_families[] = 'Arimo:400,400italic,700,700italic';
	}

	if ( !empty( $heading_font_family ) && $heading_font_family !== 'none' ) {
		$heading_font = _x( 'on', $heading_font_family . ' font: on or off', 'martial-lite' );
		if ( 'off' !== $heading_font ) {
			$font_families[] = $heading_font_family;
		}
	}

	if ( !empty( $body_font_family ) && $body_font_family !== 'none' && $body_font_family !== $heading_font_family ) {
		$body_font = _x( 'on', $body_font_family . ' font: on or off', 'martial-lite' );
		if ( 'off' !== $body_font ) {
			$font_families[] = $body_font_family;
		}
	}


	// if both body and heading fonts are set in customizer,
	// don't include default Roboto and Arimo fonts
	if ( count( $font_families ) === 4 ) {
		array_slice( $font_families, 2 );
	}

	if ( !empty( $font_families ) ) {
		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
	}

	return $fonts_url;
}

/**
 * Enqueue scripts and styles.
 */
function martial_scripts()
{
	wp_enqueue_style( 'martial-style', get_stylesheet_uri (), array(), '1.0.7' );
	wp_enqueue_style( 'martial-font-awesome', get_template_directory_uri() . '/inc/css/font-awesome.min.css' );
	wp_enqueue_style( 'martial-defaults', get_template_directory_uri() . '/inc/css/defaults.css' );
	wp_enqueue_style( 'martial-cssmenu', get_template_directory_uri() . '/inc/css/cssmenu.css' );
	wp_enqueue_style( 'martial-widgets', get_template_directory_uri() . '/inc/css/widgets.css' );
	wp_enqueue_style( 'martial-upsell', get_template_directory_uri() . '/inc/css/upsell.css' );
	wp_enqueue_style( 'martial-fonts', martial_fonts_url(), array(), null );
	wp_enqueue_script( 'martial-footer-scripts', get_template_directory_uri() . '/inc/js/scripts.js', array( 'jquery' ), '20151107', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'martial_scripts' );

/**
 * Replaces "[...]" with "..." on excerpts
 */
function martial_prefix_excerpt_more( $more ) {
	return ' ...';
}
add_filter( 'excerpt_more', 'martial_prefix_excerpt_more' );


function martial_esc_html( $text )
{
	return strip_tags( $text, '<p><a><i><br><strong><b><em><ul><li><ol><span><h1><h2><h3><h4>' );
}

function martial_pagination( $wp_query_object = null )
{
	global $wp_query;
	$query_object = !empty( $wp_query_object ) ? $wp_query_object : $wp_query;
	if ( !is_page() && $query_object->max_num_pages < 2 ) {
		return;
	}
	$big = 999999999; // need an unlikely integer
	echo '<div class="pagination">';
	echo paginate_links( array(
		'base'    => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format'  => '?paged=%#%',
		'current' => max( 1, get_query_var( 'paged' ) ),
		'total'   => $query_object->max_num_pages
	) );
	echo '</div>';
}

function martial_search_form( $form )
{
	$form = '
			<div class="search">
			<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
			<i class="fa fa-search"></i>
			<input class="textfield" type="text" name="s" value="' . get_search_query() . '">
			<input type="submit" value="' . esc_attr( __( 'Search', 'martial-lite' ) ) . '" class="submit">
			<div class="clear"></div>
			</form>
		</div>

		<script type="text/javascript">
			jQuery(\'.search\').prev(\'h5\').parent(\'.sidebarwidget\').removeClass().addClass(\'search_sec\');
			//jQuery(\'.search_sec h5\').text(el.text());
			//el.remove();
		</script>';

	return $form;
}

add_filter( 'get_search_form', 'martial_search_form', 1 );

require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/themesetup.php';
require get_template_directory() . '/inc/customizer.php';
