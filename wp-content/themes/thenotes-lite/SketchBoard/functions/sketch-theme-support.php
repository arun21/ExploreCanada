<?php
/*-----------------------------------------
	SKETCH THEMES SUPPORT FILE
-----------------------------------------*/
function thenotes_lite_page_css_class( $css_class, $page ) {
	global $post;
	if ( $post->ID == $page->ID ) {
		$css_class[] = 'current_page_item';
	}
	return $css_class;
}
add_filter( 'page_css_class', 'thenotes_lite_page_css_class', 10, 2 );
