<?php
/**
 * The template part for displaying social links on the front page.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package martial
 */

$martial_display_social_links = esc_attr(get_theme_mod( 'martial_header_social_show', 'yes' ) );

if ( $martial_display_social_links === 'yes' ) :
	$martial_facebook_url = esc_url(get_theme_mod( 'martial_header_social_facebook', "http://facebook.com" ) );
	$martial_twitter_url = esc_url(get_theme_mod( 'martial_header_social_twitter', "http://twitter.com" ) );
	$martial_pinterest_url = esc_url(get_theme_mod( 'martial_header_social_pinterest', "http://pinterest.com" ) );
	$martial_linkedin_url = esc_url(get_theme_mod( 'martial_header_social_linkedin', "http://linkedin.com" ) );
	$martial_gplus_url = esc_url(get_theme_mod( 'martial_header_social_gplus', "http://plus.google.com" ) );
	$martial_behance_url = esc_url(get_theme_mod( 'martial_header_social_behance', "http://behance.net" ) );
	$martial_dribbble_url = esc_url(get_theme_mod( 'martial_header_social_dribbble', "http://dribbble.com" ) );
	$martial_flickr_url = esc_url(get_theme_mod( 'martial_header_social_flickr', "http://flickr.com" ) );
	$martial_500px_url = esc_url(get_theme_mod( 'martial_header_social_500px', "http://500px.com" ) );
	$martial_reddit_url = esc_url(get_theme_mod( 'martial_header_social_reddit', "http://reddit.com" ) );
	$martial_wordpress_url = esc_url(get_theme_mod( 'martial_header_social_wordpress', "http://wordpress.com" ) );
	$martial_youtube_url = esc_url(get_theme_mod( 'martial_header_social_youtube', "http://youtube.com" ) );
	$martial_soundcloud_url = esc_url(get_theme_mod( 'martial_header_social_soundcloud', "http://soundcloud.com" ) );
	$martial_medium_url = esc_url(get_theme_mod( 'martial_header_social_medium', "http://medium.com" ) );

	?>

	<ul>
		<?php
		if ( !empty( $martial_facebook_url ) ) {
			echo '<li class="facebook"><a href="' . esc_url( $martial_facebook_url ) . '"><i class="fa fa-facebook"></i></a></li>';
		}
		if ( !empty( $martial_twitter_url ) ) {
			echo '<li class="twitter"><a href="' . esc_url( $martial_twitter_url ) . '"><i class="fa fa-twitter"></i></a></li>';
		}
		if ( !empty( $martial_pinterest_url ) ) {
			echo '<li class="pinterest"><a href="' . esc_url( $martial_pinterest_url ) . '"><i class="fa fa-pinterest"></i></a></li>';
		}
		if ( !empty( $martial_linkedin_url ) ) {
			echo '<li class="linkedin"><a href="' . esc_url( $martial_linkedin_url ) . '"><i class="fa fa-linkedin"></i></a></li>';
		}
		if ( !empty( $martial_gplus_url ) ) {
			echo '<li class="gplus"><a href="' . esc_url( $martial_gplus_url ) . '"><i class="fa fa-google-plus"></i></a></li>';
		}
		if ( !empty( $martial_behance_url ) ) {
			echo '<li class="behance"><a href="' . esc_url( $martial_behance_url ) . '"><i class="fa fa-behance"></i></a></li>';
		}
		if ( !empty( $martial_dribbble_url ) ) {
			echo '<li class="dribbble"><a href="' . esc_url( $martial_dribbble_url ) . '"><i class="fa fa-dribbble"></i></a></li>';
		}
		if ( !empty( $martial_flickr_url ) ) {
			echo '<li class="flickr"><a href="' . esc_url( $martial_flickr_url ) . '"><i class="fa fa-flickr"></i></a></li>';
		}
		if ( !empty( $martial_500px_url ) ) {
			echo '<li class="social500px"><a href="' . esc_url( $martial_500px_url ) . '"><i class="fa fa-500px"></i></a></li>';
		}
		if ( !empty( $martial_reddit_url ) ) {
			echo '<li class="reddit"><a href="' . esc_url( $martial_reddit_url ) . '"><i class="fa fa-reddit"></i></a></li>';
		}
		if ( !empty( $martial_wordpress_url ) ) {
			echo '<li class="wordpress"><a href="' . esc_url( $martial_wordpress_url ) . '"><i class="fa fa-wordpress"></i></a></li>';
		}
		if ( !empty( $martial_youtube_url ) ) {
			echo '<li class="youtube"><a href="' . esc_url( $martial_youtube_url ) . '"><i class="fa fa-youtube"></i></a></li>';
		}
		if ( !empty( $martial_soundcloud_url ) ) {
			echo '<li class="soundcloud"><a href="' . esc_url( $martial_soundcloud_url ) . '"><i class="fa fa-soundcloud"></i></a></li>';
		}
		if ( !empty( $martial_medium_url ) ) {
			echo '<li class="medium"><a href="' . esc_url( $martial_medium_url ) . '"><i class="fa fa-medium"></i></a></li>';
		}
		?>
	</ul>

<?php endif;
