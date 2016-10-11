<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package martial
 */

if ( !function_exists( 'martial_the_post_navigation' ) ) :
	/**
	 * Display navigation to next/previous post when applicable.
	 *
	 */
	function martial_the_post_navigation() {
		the_post_navigation(
			array(
				'prev_text'                  => __( '%title', 'martial-lite' ),
				'next_text'                  => __( '%title' , 'martial-lite'),
				'in_same_term'               => true,
				'taxonomy'                   => __( 'post_tag', 'martial-lite' ),
				'screen_reader_text' => __( 'Post navigation', 'martial-lite' ),
			) );
	}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function martial_categorized_blog()
{
	if ( false === ( $all_the_cool_cats = get_transient( 'martial_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'martial_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so martial_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so martial_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in martial_categorized_blog.
 */
function martial_category_transient_flusher()
{
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'martial_categories' );
}

add_action( 'edit_category', 'martial_category_transient_flusher' );
add_action( 'save_post', 'martial_category_transient_flusher' );
