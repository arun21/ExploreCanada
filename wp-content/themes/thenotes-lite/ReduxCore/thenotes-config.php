<?php
	/**
	 * ReduxFramework Sample Config File
	 * For full documentation, please visit: http://docs.reduxframework.com/
	 */

	if ( ! class_exists( 'Redux' ) ) {
		return;
	}


	// This is your option name where all the Redux data is stored.
	$opt_name = "thenotes_lite";

	// This line is only for altering the demo. Can be easily removed.
	$opt_name = apply_filters( 'redux_demo/thenotes', $opt_name );

	/**
	 * ---> SET ARGUMENTS
	 * All the possible arguments for Redux.
	 * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
	 * */

	$theme = wp_get_theme(); // For use with some settings. Not necessary.

	$args = array(
		// TYPICAL -> Change these values as you need/desire
		'opt_name'			 => $opt_name,
		// This is where your data is stored in the database and also becomes your global variable name.
		'display_name'		 => $theme->get( 'Name' ),
		// Name that appears at the top of your panel
		'display_version'	  => $theme->get( 'Version' ),
		// Version that appears at the top of your panel
		'menu_type'			=> 'hidden',
		//Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
		'allow_sub_menu'	   => false,
		// Show the sections below the admin menu item or not
		'menu_title'		   => __( 'thenotes Options', 'redux-framework' ),
		'page_title'		   => __( 'thenotes Options', 'redux-framework' ),
		// You will need to generate a Google API key to use this feature.
		// Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
		'google_api_key'	   => '',
		// Set it you want google fonts to update weekly. A google_api_key value is required.
		'google_update_weekly' => false,
		// Must be defined to add google fonts to the typography module
		'async_typography'	 => true,
		// Use a asynchronous font on the front end or font string
		//'disable_google_fonts_link' => true,					// Disable this in case you want to create your own google fonts loader
		'admin_bar'			=> true,
		// Show the panel pages on the admin bar
		'admin_bar_icon'	   => 'dashicons-portfolio',
		// Choose an icon for the admin bar menu
		'admin_bar_priority'   => 50,
		// Choose an priority for the admin bar menu
		'global_variable'	  => '',
		// Set a different name for your global variable other than the opt_name
		'dev_mode'			 => true,
		// Show the time the page took to load, etc
		'update_notice'		=> true,
		// If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
		'customizer'		   => true,
		// Enable basic customizer support
		//'open_expanded'	 => true,					// Allow you to start the panel in an expanded way initially.
		//'disable_save_warn' => true,					// Disable the save warning when a user changes a field

		// OPTIONAL -> Give you extra features
		'page_priority'		=> null,
		// Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
		'page_parent'		  => 'themes.php',
		// For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_theme_page#Parameters
		'page_permissions'	 => 'manage_options',
		// Permissions needed to access the options panel.
		'menu_icon'			=> '',
		// Specify a custom URL to an icon
		'last_tab'			 => '',
		// Force your panel to always open to a specific tab (by id)
		'page_icon'			=> 'icon-themes',
		// Icon displayed in the admin panel next to your menu_title
		'page_slug'			=> '',
		// Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
		'save_defaults'		=> false,
		// On load save the defaults to DB before user clicks save or not
		'default_show'		 => false,
		// If true, shows the default value next to each field that is not the default value.
		'default_mark'		 => '',
		// What to print by the field's title if the value shown is default. Suggested: *
		'show_import_export'   => true,
		// Shows the Import/Export panel when not used as a field.

		// CAREFUL -> These options are for advanced use only
		'transient_time'	   => 60 * MINUTE_IN_SECONDS,
		'output'			   => true,
		// Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
		'output_tag'		   => true,
		// Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
		// 'footer_credit'	 => '',				   // Disable the footer credit of Redux. Please leave if you can help it.

		// FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
		'database'			 => '',
		// possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
		'use_cdn'			  => true,
		// If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

		// HINTS
		'hints'				=> array(
			'icon'		  => 'el el-question-sign',
			'icon_position' => 'right',
			'icon_color'	=> 'lightgray',
			'icon_size'	 => 'normal',
			'tip_style'	 => array(
				'color'   => 'red',
				'shadow'  => true,
				'rounded' => false,
				'style'   => '',
			),
			'tip_position'  => array(
				'my' => 'top left',
				'at' => 'bottom right',
			),
			'tip_effect'	=> array(
				'show' => array(
					'effect'   => 'slide',
					'duration' => '500',
					'event'	=> 'mouseover',
				),
				'hide' => array(
					'effect'   => 'slide',
					'duration' => '500',
					'event'	=> 'click mouseleave',
				),
			),
		)
	);

   // Define image directory path
	$imagepath = get_template_directory_uri().'/images/';


   // Add content after the form.
	$args['footer_text'] = '';

	Redux::setArgs( $opt_name, $args );

	/*
	 * ---> END ARGUMENTS
	 */


	/*
	 * ---> START HELP TABS
	 */

	$tabs = array(
		array(
			'id'	  => 'redux-help-tab-1',
			'title'   => __( 'Theme Information 1', 'redux-framework' ),
			'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework' )
		),
		array(
			'id'	  => 'redux-help-tab-2',
			'title'   => __( 'Theme Information 2', 'redux-framework' ),
			'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework' )
		)
	);
	Redux::setHelpTab( $opt_name, $tabs );

	// Set the help sidebar
	$content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'redux-framework' );
	Redux::setHelpSidebar( $opt_name, $content );


	/*
	 * <--- END HELP TABS
	 */


	/*
	 *
	 * ---> START SECTIONS
	 *
	 */

	/*

		As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


	 */
	Redux::setSection($opt_name, array(
		'title'			=> __( 'General Settings', 'redux-framework' ),

		'icon'			 => 'el el-cog',
		'fields'		   => array(
			array(
					'id'	   => 'skt-primary-color',
					'type'	 => 'color',
					'title'	=> __( 'Primary Theme Color', 'redux-framework' ),
					'desc'	 => __( 'Please choose primary color of theme', 'redux-framework' ),
					'default'  => '#ff7113',
			),
			array(
				'id'		=> 'skt-blog-page-text',
				'type'	  => 'text',
				'title'	 => __('Enter Blog Page Title', 'redux-framework'),
				'desc'	  => __('Enter Blog Page Title text.', 'redux-framework'),
				'default'   => __('Blog', 'thenotes-lite')
			),
		  )
	) );

	Redux::setSection($opt_name, array(
		'title'			=> __( 'Header Settings', 'redux-framework' ),
		'icon'			 => 'el el-home',
		'fields'		   => array(
			array(
				'id'		=> 'skt-logo-width',
				'type'	  => 'text',
				'title'	 => __('Logo Image Width (in pixel)', 'redux-framework'),
				'desc'	  => __('Enter logo image width in pixel.', 'redux-framework'),
				'default'   => '215'
			),
			array(
				'id'		=> 'skt-logo-height',
				'type'	  => 'text',
				'title'	 => __('Logo Image Height (in pixel)', 'redux-framework'),
				'desc'	  => __('Enter logo image height in pixel.', 'redux-framework'),
				'default'   => '75'
			),
			array(
				'id'		=> 'skt-mob-logo-width',
				'type'	  => 'text',
				'title'	 => __('Logo Image Width for mobile view (in pixel)', 'redux-framework'),
				'desc'	  => __('Enter logo image width in pixel.', 'redux-framework'),
				'default'   => '150'
			),
			array(
				'id'		=> 'skt-mob-logo-height',
				'type'	  => 'text',
				'title'	 => __('Logo Image Height for mobile view (in pixel)', 'redux-framework'),
				'desc'	  => __('Enter logo image height in pixel.', 'redux-framework'),
				'default'   => '65'
			),
		)
	) );


	Redux::setSection($opt_name, array(
		'title'			=> __( 'Slider Settings', 'redux-framework' ),
		'icon'			 => 'el el-picture',
		'fields'		   => array(
			array(
				'id'	   => 'skt-slider-options',
				'type'	 => 'radio',
				'title'	=> __('Slider Section', 'redux-framework'),
				'desc'	 => __('Select one of option according to your need.', 'redux-framework'),
				//Must provide key => value pairs for radio options
				'options'  => array(
					'1' => 'Static Image',
					'2' => 'Static Image + Post Slider'
				),
				'default' => '2'
			),
			array(
				'id'		=> 'skt-slider-posts',
				'title'	=> __( 'Post Id\'s to show in slider', 'redux-framework' ),
				'subtitle' => __('Enter comma ( , ) seperated post id\'s', 'redux-framework'),
				'type'	  => 'text',
				'default'   => '',
				'required' => array('skt-slider-options','equals','2')
			),
			array(
				'id'	   => 'skt-slider-txtcolor',
				'type'	 => 'color',
				'title'	=> __( 'Slider Text Color', 'redux-framework' ),
				'desc'	 => __( 'Please choose slider text color', 'redux-framework' ),
				'default'  => '#ffffff',
			),
		)
	) );


	Redux::setSection($opt_name, array(
		'title'		=> __( 'Inner Page Header Settings', 'redux-framework' ),
		'icon'		=> 'el el-picture',
		'fields'	=> array(
			array(
				'id'	   => 'header_background_overlay_color',
				'type'	 => 'color',
				'title'	=> __( 'Header Background Overlay Color', 'redux-framework' ),
				'default'  => '#ffffff',
			),
			array(
				'id'		=> 'header_background_overlay_opacity',
				'title'	=> __( 'Overlay Color Opacity', 'redux-framework' ),
				'type'	  => 'text',
				'default'   => '0.7'
			),
		)
	));

	/**
	 * Custom function for the callback validation referenced above
	 * */
	if ( ! function_exists( 'redux_validate_callback_function' ) ) {
		function redux_validate_callback_function( $field, $value, $existing_value ) {
			$error   = false;
			$warning = false;

			//do your validation
			if ( $value == 1 ) {
				$error = true;
				$value = $existing_value;
			} elseif ( $value == 2 ) {
				$warning = true;
				$value   = $existing_value;
			}

			$return['value'] = $value;

			if ( $error == true ) {
				$return['error'] = $field;
				$field['msg']	= 'your custom error message';
			}

			if ( $warning == true ) {
				$return['warning'] = $field;
				$field['msg']	  = 'your custom warning message';
			}

			return $return;
		}
	}

	/**
	 * Custom function for the callback referenced above
	 */
	if ( ! function_exists( 'redux_my_custom_field' ) ) {
		function redux_my_custom_field( $field, $value ) {
			print_r( $field );
			echo '<br/>';
			print_r( $value );
		}
	}

	/**
	 * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
	 * Simply include this function in the child themes functions.php file.
	 * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
	 * so you must use get_template_directory_uri() if you want to use any of the built in icons
	 * */
	if ( ! function_exists( 'dynamic_section' ) ) {
		function dynamic_section( $sections ) {
			//$sections = array();
			$sections[] = array(
				'title'  => __( 'Section via hook', 'redux-framework' ),
				'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'redux-framework' ),
				'icon'   => 'el el-paper-clip',
				// Leave this as a blank section, no options just some intro text set above.
				'fields' => array()
			);

			return $sections;
		}
	}

	/**
	 * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
	 * */
	if ( ! function_exists( 'change_arguments' ) ) {
		function change_arguments( $args ) {
			//$args['dev_mode'] = true;

			return $args;
		}
	}

	/**
	 * Filter hook for filtering the default value of any given field. Very useful in development mode.
	 * */
	if ( ! function_exists( 'change_defaults' ) ) {
		function change_defaults( $defaults ) {
			$defaults['str_replace'] = 'Testing filter hook!';

			return $defaults;
		}
	}

	/**
	 * Removes the demo link and the notice of integrated demo from the redux-framework plugin
	 */
	if ( ! function_exists( 'remove_demo' ) ) {
		function remove_demo() {
			// Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
			if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
				remove_filter( 'plugin_row_meta', array(
					ReduxFrameworkPlugin::instance(),
					'plugin_metalinks'
				), null, 2 );

				// Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
				remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
			}
		}
	}

// BE SURE TO RENAME THE FUNCTION NAMES TO YOUR OWN NAME OR PREFIX
if ( !function_exists( "redux_add_metaboxes" ) ):
	function redux_add_metaboxes($metaboxes) {
		// Declare your sections
		$boxSections = array();
		$boxSections[] = array(
			//'title'		 => __('General Settings', 'redux-framework'),
			//'icon'		  => 'el-icon-home', // Only used with metabox position normal or advanced
			'fields'		=> array(
				array(
					'id' => 'sidebar',
					//'title' => __( 'Sidebar', 'redux-framework' ),
					'desc' => 'Please select the sidebar you would like to display on this page. Note: You must first create the sidebar under Appearance > Widgets.',
					'type' => 'select',
					'data' => 'sidebars',
				),
			),
		);

		// Declare your metaboxes
		$metaboxes = array();
		$metaboxes[] = array(
			'id'			=> 'sidebar',
			'title'		 => __( 'Sidebar', 'redux-framework' ),
			'post_types'	=> array( 'page'),
			//'page_template' => array('page-test.php'), // Visibility of box based on page template selector
			//'post_format' => array('image'), // Visibility of box based on post format
			'position'	  => 'side', // normal, advanced, side
			'priority'	  => 'high', // high, core, default, low - Priorities of placement
			'sections'	  => $boxSections,
		);

		return $metaboxes;
	}
	// Change {$redux_opt_name} to your opt_name
	add_action("redux/metaboxes/{thenotes}/boxes", "redux_add_metaboxes");
endif;
