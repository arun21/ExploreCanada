<?php
/**
 * The template part for displaying a hero banner on the front page.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package martial
 */

$martial_display_hero_banner = esc_attr(get_theme_mod( 'martial_hero_show', 'yes' ) );
$martial_display_hero_button1 = esc_attr(get_theme_mod( 'martial_hero_button1_show', 'yes' ) );
$martial_display_hero_button2 = esc_attr(get_theme_mod( 'martial_hero_button2_show', 'yes' ) );

if ( $martial_display_hero_banner === 'yes' ) :
	?>

	<h1><?php echo esc_html( get_theme_mod( 'martial_hero_title', __('Hi, I\'m the Martial Theme for WordPress', 'martial-lite')) ); ?></h1>
	<div class="text">
		<?php echo "<p>". esc_html( get_theme_mod( 'martial_hero_text', 'Lorem ipsum dolor sit amet, elit. Praesent vel interdum diam, in ultricies diam. Proin vehicula sagittis lorem, nec.') ). "</p>"; ?>
		<div class="clear"></div> <?php
		if ( $martial_display_hero_button1 === 'yes' ) {
			echo '<a href="' . esc_url( get_theme_mod( 'martial_hero_button1_link', '#' ) ) . '" class="about">' . esc_html( get_theme_mod( 'martial_hero_button1_text' ) ) . '</a>';
		}
		if ( $martial_display_hero_button2 === 'yes' ) {
			echo '<a href="' . esc_url( get_theme_mod( 'martial_hero_button2_link', '#' ) ) . '" class="about contact">' . esc_html( get_theme_mod( 'martial_hero_button2_text' ) ) . '</a>';
		}
		?>
	</div>
	<div class="clear"></div>
<?php endif;
