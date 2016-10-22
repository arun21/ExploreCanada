<?php

// All Query Page Code
add_action( 'admin_menu', 'contact_queries_page' );
function contact_queries_page() {
	add_menu_page( 'Contact Form Queries', 'Contact Form Queries', 'administrator', 'cfw-all-queries', 'contact_queries_page_body', 'dashicons-email-alt', 65);
	add_submenu_page( 'cfw-all-queries', 'Shortcode', 'Shortcode', 'administrator', 'user-contact-form', 'shortcode_page_body');
	add_submenu_page( 'cfw-all-queries', 'Settings', 'Settings','administrator','cfw-settings','cfw_settings_page_body');
}

//all contact queries page body function
function contact_queries_page_body() {
	require_once('all-query-page.php');
}


//shortccode page body
function shortcode_page_body(){
	wp_enqueue_style( 'cfw-bootstrap-css', plugin_dir_url( __FILE__ ).'css/bootstrap.css' );
	wp_enqueue_style( 'cfw-font-awesome-css', plugin_dir_url( __FILE__ ).'css/font-awesome.min.css' );
	wp_enqueue_script( 'cfw-boostrap-js', plugin_dir_url( __FILE__ ).'js/bootstrap.js', array('jquery'), '3.3.6', true );
	?>
	<h2>Contact Form Shortcode - [CFW]</h2>
	<hr>
	<div>
		<p>Use <strong>[CFW]</strong> Shortcode to display Contact Form on any Page / Post.</p>
		<p><strong>Note:</strong> Don't use multiple shortcode on same Page / Post.</p>
	</div>
	<?php
}

// setting page body
function cfw_settings_page_body() {
	require_once('settings-page.php');
}
?>
