<?php
/**
 * Martial Theme Customizer
 *
 * @package martial
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function martial_customize_register( $wp_customize )
{
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	function martial_sanitize_textarea( $text )
	{
		return strip_tags( $text, '<p><a><i><br><strong><b><em><ul><li><ol><span><h1><h2><h3><h4>' );
	}

	function martial_sanitize_integer( $text )
	{
		return ( int )$text;
	}
}

add_action( 'customize_register', 'martial_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function martial_customize_preview_js()
{
	wp_enqueue_script( 'martial_customizer', get_template_directory_uri() . '/inc/js/customizer.js', array( 'customize-preview' ), '20130514', true );
}

add_action( 'customize_preview_init', 'martial_customize_preview_js' );

function martial_sanitize_color_hex( $value )
{
	if ( !preg_match( '/\#[a-fA-F0-9]{6}/', $value ) ) {
		$value = '#ffffff';
	}

	return $value;
}

function martial_sanitize_int( $value )
{
	return (int)$value;
}

function martial_customizer( $wp_customize )
{

	$wp_customize->add_panel( 'martial_homepage', array(
		'title'    => __( 'Homepage Setup', 'martial-lite' ),
		'priority' => 10,
	) );

	$wp_customize->add_panel( 'martial_site_identity', array(
		'title'    => __( 'Site Identity', 'martial-lite' ),
		'priority' => 10,
	) );

	// move "site identity" to a panel first
	$wp_customize->add_section( 'title_tagline', array(
		'title'    => __( 'Title and Tagline', 'martial-lite' ),
		'priority' => 50,
		'panel'    => 'martial_site_identity',
	) );

	// hero banner
	$wp_customize->add_section( 'martial_hero', array(
		'title'       => __( 'Hero Banner', 'martial-lite' ),
		'priority'    => 50,
		'description' => __( 'Big banner section on the front page - background image', 'martial-lite' ),
		'panel'       => 'martial_homepage',
	) );

	$wp_customize->add_setting( 'martial_hero_show', array(
		'default'           => 'yes',
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'martial_hero_show', array(
		'label'    => __( 'Show hero banner', 'martial-lite' ),
		'section'  => 'martial_hero',
		'settings' => 'martial_hero_show',
		'type'     => 'select',
		'choices'  => array( 'yes' => __( 'Yes', 'martial-lite' ), 'no' => __( 'No', 'martial-lite' ) ),
	) );

	$wp_customize->add_setting( 'martial_hero_hide_on_inner_pages', array(
		'default'           => 'yes',
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'martial_hero_hide_on_inner_pages', array(
		'label'    => __( 'Hide hero banner on inner pages', 'martial-lite' ),
		'section'  => 'martial_hero',
		'settings' => 'martial_hero_hide_on_inner_pages',
		'type'     => 'select',
		'choices'  => array( 'yes' => __( 'Yes', 'martial-lite' ), 'no' => __( 'No', 'martial-lite' ) ),
	) );

	$wp_customize->add_setting( 'martial_hero_bg_image', array(
		'default'           => get_template_directory_uri() . '/images/hero-bg.jpg',
		'type'              => 'theme_mod',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'martial_hero_bg_image', array(
		'label'    => __( 'Background image', 'martial-lite' ),
		'section'  => 'martial_hero',
		'settings' => 'martial_hero_bg_image',
	) ) );

	$wp_customize->add_setting( 'martial_hero_title', array(
		'default'           => __( 'Hi, I\'m the Martial Theme for WordPress', 'martial-lite' ),
		'sanitize_callback' => 'sanitize_text_field',
		'type'              => 'theme_mod',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'martial_hero_title', array(
		'label'   => __( 'Title', 'martial-lite' ),
		'section' => 'martial_hero',
	) );

	$wp_customize->add_setting( 'martial_hero_text', array(
		'default'           => 'Lorem ipsum dolor sit amet, elit. Praesent vel interdum diam, in ultricies diam. Proin vehicula sagittis lorem, nec.',
		'sanitize_callback' => 'martial_sanitize_textarea',
		'type'              => 'theme_mod',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'martial_hero_text', array(
		'label'    => __( 'Main text', 'martial-lite' ),
		'section'  => 'martial_hero',
		'settings' => 'martial_hero_text',
		'type'     => 'textarea',
	) );

	$wp_customize->add_setting( 'martial_hero_button1_show', array(
		'default'           => 'yes',
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'martial_hero_button1_show', array(
		'label'    => __( 'Show button 1', 'martial-lite' ),
		'section'  => 'martial_hero',
		'settings' => 'martial_hero_button1_show',
		'type'     => 'select',
		'choices'  => array( 'yes' => __( 'Yes', 'martial-lite' ), 'no' => __( 'No', 'martial-lite' ) ),
	) );

	$wp_customize->add_setting( 'martial_hero_button1_text', array(
		'default'           => __( 'About us', 'martial-lite' ),
		'sanitize_callback' => 'sanitize_text_field',
		'type'              => 'theme_mod',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'martial_hero_button1_text', array(
		'label'    => __( 'Button 1 text', 'martial-lite' ),
		'section'  => 'martial_hero',
		'settings' => 'martial_hero_button1_text',
		'type'     => 'text',
	) );

	$wp_customize->add_setting( 'martial_hero_button1_link', array(
		'default'           => home_url(),
		'sanitize_callback' => 'sanitize_text_field',
		'type'              => 'theme_mod',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'martial_hero_button1_link', array(
		'label'    => __( 'Button 1 link', 'martial-lite' ),
		'section'  => 'martial_hero',
		'settings' => 'martial_hero_button1_link',
		'type'     => 'text',
	) );

	$wp_customize->add_setting( 'martial_hero_button1_bg_color', array(
		'default'           => '#9c9a96',
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'martial_sanitize_color_hex',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hero_button1_bg', array(
		'label'    => __( 'Button 1 background color', 'martial-lite' ),
		'section'  => 'martial_hero',
		'settings' => 'martial_hero_button1_bg_color',
	) ) );

	$wp_customize->add_setting( 'martial_hero_button1_text_color', array(
		'default'           => '#ffffff',
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'martial_sanitize_color_hex',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hero_button1_text', array(
		'label'    => __( 'Button 1 text color', 'martial-lite' ),
		'section'  => 'martial_hero',
		'settings' => 'martial_hero_button1_text_color',
	) ) );

	$wp_customize->add_setting( 'martial_hero_button2_show', array(
		'default'           => 'yes',
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'martial_hero_button2_show', array(
		'label'    => __( 'Show button 2', 'martial-lite' ),
		'section'  => 'martial_hero',
		'settings' => 'martial_hero_button2_show',
		'type'     => 'select',
		'choices'  => array( 'yes' => __( 'Yes', 'martial-lite' ), 'no' => __( 'No', 'martial-lite' ) ),
	) );

	$wp_customize->add_setting( 'martial_hero_button2_text', array(
		'default'           => __( 'Contact', 'martial-lite' ),
		'sanitize_callback' => 'sanitize_text_field',
		'type'              => 'theme_mod',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'martial_hero_button2_text', array(
		'label'    => __( 'Button 2 text', 'martial-lite' ),
		'section'  => 'martial_hero',
		'settings' => 'martial_hero_button2_text',
		'type'     => 'text',
	) );

	$wp_customize->add_setting( 'martial_hero_button2_link', array(
		'default'           => home_url(),
		'sanitize_callback' => 'sanitize_text_field',
		'type'              => 'theme_mod',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'martial_hero_button2_link', array(
		'label'    => __( 'Button 2 link', 'martial-lite' ),
		'section'  => 'martial_hero',
		'settings' => 'martial_hero_button2_link',
		'type'     => 'text',
	) );

	$wp_customize->add_setting( 'martial_hero_button2_bg_color', array(
		'default'           => '#5dc093',
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'martial_sanitize_color_hex',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hero_button2_bg', array(
		'label'    => __( 'Button 2 background color', 'martial-lite' ),
		'section'  => 'martial_hero',
		'settings' => 'martial_hero_button2_bg_color',
	) ) );

	$wp_customize->add_setting( 'martial_hero_button2_text_color', array(
		'default'           => '#ffffff',
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'martial_sanitize_color_hex',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hero_button2_text', array(
		'label'    => __( 'Button 2 text color', 'martial-lite' ),
		'section'  => 'martial_hero',
		'settings' => 'martial_hero_button2_text_color',
	) ) );

	$wp_customize->add_setting( 'martial_hero_blur_enabled', array(
		'default'           => 0,
		'sanitize_callback' => 'martial_sanitize_int',
		'type'              => 'theme_mod',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'martial_hero_blur_enabled', array(
		'label'    => __( 'Blur amount (pixels)', 'martial-lite' ),
		'section'  => 'martial_hero',
		'settings' => 'martial_hero_blur_enabled',
		'type'     => 'text',
	) );

	$wp_customize->add_setting( 'martial_hero_overlay_enabled', array(
		'default'           => 'no',
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'martial_hero_overlay_enabled', array(
		'label'    => __( 'Overlay the image with color', 'martial-lite' ),
		'section'  => 'martial_hero',
		'settings' => 'martial_hero_overlay_enabled',
		'type'     => 'select',
		'choices'  => array( 'yes' => __( 'Yes', 'martial-lite' ), 'no' => __( 'No', 'martial-lite' ) ),
	) );

	$wp_customize->add_setting( 'martial_hero_overlay_color', array(
		'default'           => '#ffffff',
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'martial_sanitize_color_hex',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hero_overlay', array(
		'label'    => __( 'Hero image overlay color', 'martial-lite' ),
		'section'  => 'martial_hero',
		'settings' => 'martial_hero_overlay_color',
	) ) );


	$wp_customize->add_setting( 'martial_hero_overlay_opacity', array(
		'default'           => '30',
		'sanitize_callback' => 'martial_sanitize_int',
		'type'              => 'theme_mod',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'martial_hero_overlay_opacity', array(
		'label'    => __( 'Overlay opacity (between 0 and 100)', 'martial-lite' ),
		'section'  => 'martial_hero',
		'settings' => 'martial_hero_overlay_opacity',
		'type'     => 'text',
	) );

	// end hero banner

	// social
	$wp_customize->add_section( 'martial_header_social', array(
		'title'    => __( 'Social', 'martial-lite' ),
		'priority' => 50,
		'panel'    => 'martial_homepage',
	) );
	$wp_customize->add_setting( 'martial_header_social_show', array(
		'default'           => 'yes',
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'martial_header_social_show', array(
		'label'    => __( 'Show social icons below the hero banner text', 'martial-lite' ),
		'section'  => 'martial_header_social',
		'settings' => 'martial_header_social_show',
		'type'     => 'select',
		'choices'  => array( 'yes' => __( 'Yes', 'martial-lite' ), 'no' => __( 'No', 'martial-lite' ) ),
	) );

	$wp_customize->add_setting( 'martial_header_social_twitter', array(
		'default'           => __( 'http://twitter.com', 'martial-lite' ),
		'sanitize_callback' => 'sanitize_text_field',
		'type'              => 'theme_mod',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'martial_header_social_twitter', array(
		'label'   => __( 'Twitter URL', 'martial-lite' ),
		'section' => 'martial_header_social',
	) );

	$wp_customize->add_setting( 'martial_header_social_facebook', array(
		'default'           => __( 'http://facebook.com', 'martial-lite' ),
		'sanitize_callback' => 'sanitize_text_field',
		'type'              => 'theme_mod',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'martial_header_social_facebook', array(
		'label'   => __( 'Facebook URL', 'martial-lite' ),
		'section' => 'martial_header_social',
	) );

	$wp_customize->add_setting( 'martial_header_social_pinterest', array(
		'default'           => __( 'http://pinterest.com', 'martial-lite' ),
		'sanitize_callback' => 'sanitize_text_field',
		'type'              => 'theme_mod',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'martial_header_social_pinterest', array(
		'label'   => __( 'Pinterest URL', 'martial-lite' ),
		'section' => 'martial_header_social',
	) );

	$wp_customize->add_setting( 'martial_header_social_linkedin', array(
		'default'           => __( 'http://linkedin.com', 'martial-lite' ),
		'sanitize_callback' => 'sanitize_text_field',
		'type'              => 'theme_mod',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'martial_header_social_linkedin', array(
		'label'   => __( 'LinkedIn URL', 'martial-lite' ),
		'section' => 'martial_header_social',
	) );

	$wp_customize->add_setting( 'martial_header_social_gplus', array(
		'default'           => __( 'http://plus.google.com', 'martial-lite' ),
		'sanitize_callback' => 'sanitize_text_field',
		'type'              => 'theme_mod',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'martial_header_social_gplus', array(
		'label'   => __( 'Google+ URL', 'martial-lite' ),
		'section' => 'martial_header_social',
	) );

	$wp_customize->add_setting( 'martial_header_social_behance', array(
		'default'           => __( 'http://behance.net', 'martial-lite' ),
		'sanitize_callback' => 'sanitize_text_field',
		'type'              => 'theme_mod',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'martial_header_social_behance', array(
		'label'   => __( 'Behance URL', 'martial-lite' ),
		'section' => 'martial_header_social',
	) );

	$wp_customize->add_setting( 'martial_header_social_dribbble', array(
		'default'           => __( 'http://dribbble.com', 'martial-lite' ),
		'sanitize_callback' => 'sanitize_text_field',
		'type'              => 'theme_mod',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'martial_header_social_dribbble', array(
		'label'   => __( 'Dribbble URL', 'martial-lite' ),
		'section' => 'martial_header_social',
	) );

	$wp_customize->add_setting( 'martial_header_social_dribbble', array(
		'default'           => __( 'http://dribbble.com', 'martial-lite' ),
		'sanitize_callback' => 'sanitize_text_field',
		'type'              => 'theme_mod',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'martial_header_social_dribbble', array(
		'label'   => __( 'Dribbble URL', 'martial-lite' ),
		'section' => 'martial_header_social',
	) );

	$wp_customize->add_setting( 'martial_header_social_flickr', array(
		'default'           => __( 'http://flickr.com', 'martial-lite' ),
		'sanitize_callback' => 'sanitize_text_field',
		'type'              => 'theme_mod',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'martial_header_social_flickr', array(
		'label'   => __( 'Flickr URL', 'martial-lite' ),
		'section' => 'martial_header_social',
	) );

	$wp_customize->add_setting( 'martial_header_social_500px', array(
		'default'           => __( 'http://500px.com', 'martial-lite' ),
		'sanitize_callback' => 'sanitize_text_field',
		'type'              => 'theme_mod',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'martial_header_social_500px', array(
		'label'   => __( '500px URL', 'martial-lite' ),
		'section' => 'martial_header_social',
	) );

	$wp_customize->add_setting( 'martial_header_social_reddit', array(
		'default'           => __( 'http://reddit.com', 'martial-lite' ),
		'sanitize_callback' => 'sanitize_text_field',
		'type'              => 'theme_mod',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'martial_header_social_reddit', array(
		'label'   => __( 'Reddit URL', 'martial-lite' ),
		'section' => 'martial_header_social',
	) );

	$wp_customize->add_setting( 'martial_header_social_wordpress', array(
		'default'           => __( 'http://wordpress.com', 'martial-lite' ),
		'sanitize_callback' => 'sanitize_text_field',
		'type'              => 'theme_mod',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'martial_header_social_wordpress', array(
		'label'   => __( 'Wordpress URL', 'martial-lite' ),
		'section' => 'martial_header_social',
	) );

	$wp_customize->add_setting( 'martial_header_social_youtube', array(
		'default'           => __( 'http://youtube.com', 'martial-lite' ),
		'sanitize_callback' => 'sanitize_text_field',
		'type'              => 'theme_mod',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'martial_header_social_youtube', array(
		'label'   => __( 'Youtube URL', 'martial-lite' ),
		'section' => 'martial_header_social',
	) );

	$wp_customize->add_setting( 'martial_header_social_soundcloud', array(
		'default'           => __( 'http://soundcloud.com', 'martial-lite' ),
		'sanitize_callback' => 'sanitize_text_field',
		'type'              => 'theme_mod',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'martial_header_social_soundcloud', array(
		'label'   => __( 'Soundcloud URL', 'martial-lite' ),
		'section' => 'martial_header_social',
	) );

	$wp_customize->add_setting( 'martial_header_social_medium', array(
		'default'           => __( 'http://medium.com', 'martial-lite' ),
		'sanitize_callback' => 'sanitize_text_field',
		'type'              => 'theme_mod',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'martial_header_social_medium', array(
		'label'   => __( 'Medium URL', 'martial-lite' ),
		'section' => 'martial_header_social',
	) );
	// end social

	// colors
	$wp_customize->add_panel( 'martial_colors', array(
		'title'    => __( 'Colors', 'martial-lite' ),
		'priority' => 10,

	) );

	$wp_customize->add_section( 'colors', array(
			'title'       => __( 'Customize theme colors', 'martial-lite' ),
			'description' => sprintf( __( '%1$s %2$s.', 'martial-lite' ), '<a href="//themefurnace.com/">Upgrade</a>', 'to a paid plan to customize all the colors and fonts of this theme and get access to 20 more themes, Extra Widgets and customer support' ),
			'priority'    => 35,
			'panel'       => 'martial_colors',
		)
	);

	// end colors

}

add_action( 'customize_register', 'martial_customizer', 11 );
