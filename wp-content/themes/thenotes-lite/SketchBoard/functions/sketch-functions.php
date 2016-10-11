<?php

/************************************************
   SKETCH THEME POST EXCERPT LENGTH
************************************************/
function thenotes_lite_excerpt_length($length) {
	return 34;
}
add_filter('excerpt_length', 'thenotes_lite_excerpt_length');

/************************************************
   SKETCH THEME POST EXCERPT MORE
************************************************/
function thenotes_lite_excerpt_more( $more ) {
	return ' ';
}
add_filter('excerpt_more', 'thenotes_lite_excerpt_more');

/********************************************
 thenotes_lite_skeHex2RGB Function
*********************************************/
function thenotes_lite_skeHex2RGB($hexStr, $returnAsString = false, $seperator = ',') {
	$hexStr = preg_replace("/[^0-9A-Fa-f]/", '', $hexStr); // Gets a proper hex string
	$rgbArray = array();
	if (strlen($hexStr) == 6) { //If a proper hex code, convert using bitwise operation. No overhead... faster
		$colorVal = hexdec($hexStr);
		$rgbArray['red'] = 0xFF & ($colorVal >> 0x10);
		$rgbArray['green'] = 0xFF & ($colorVal >> 0x8);
		$rgbArray['blue'] = 0xFF & $colorVal;
	} elseif (strlen($hexStr) == 3) { //if shorthand notation, need some string manipulations
		$rgbArray['red'] = hexdec(str_repeat(substr($hexStr, 0, 1), 2));
		$rgbArray['green'] = hexdec(str_repeat(substr($hexStr, 1, 1), 2));
		$rgbArray['blue'] = hexdec(str_repeat(substr($hexStr, 2, 1), 2));
	} else {
		return false; //Invalid hex color code
	}
	return $returnAsString ? implode($seperator, $rgbArray) : $rgbArray; // returns the rgb string or the associative array
}

/***** Costom Comment Layout ******/
function thenotes_lite_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}

?>
	<div id="comment-<?php comment_ID() ?>" <?php comment_class( empty( $args['has_children'] ) ? 'comment-inner row' : 'comment-inner row parent' ) ?>>
		<div id="div-comment-<?php comment_ID(); ?>" class="comment-body div-depth-<?php echo $depth; ?>">
			<div class="comment-image alignleft">
				<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, 70 ); ?>
			</div>

			<div class="comment-text">
				<h4 class="comment-text-author"><?php echo get_comment_author_link(); ?></h4>
				<p><?php comment_text(); ?></p>
				<div class="comment-time"><?php printf( __('%1$s', 'thenotes-lite'), get_comment_date('M d.Y | h:i a') ); ?></div>
				<div class="text-right reply-<?php echo $depth; ?>"><?php echo comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></div>
			</div>
		</div>
	</div>
	<div class="comment-sep"></div>
<?php
}

/********************************************
	Add Posts ID Coloumn
*********************************************/
add_filter('manage_posts_columns', 'thenotes_lite_posts_columns_id', 5);
add_action('manage_posts_custom_column', 'thenotes_lite_posts_custom_id_columns', 5, 2);

function thenotes_lite_posts_columns_id($defaults){
    $defaults['wps_post_id'] = __('ID', 'thenotes-lite');
    return $defaults;
}

function thenotes_lite_posts_custom_id_columns($column_name, $id){
        if($column_name === 'wps_post_id'){
                echo $id;
    }
}
