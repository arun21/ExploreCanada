</div>
<!-- wrapper ends -->
<!-- footer starts -->
<footer>
<div id="footer">
	<div class="footer_in">
		<div class="footer_blocks">
			<ul>
				<?php
				global $wp_customize;
				if ( !empty( $wp_customize ) && $wp_customize->is_preview() && !esc_attr(get_theme_mod( 'martial_content_set', false ) ) ) {
					the_widget(
						'WP_Widget_Text', array(
							'title' => 'TEXT WIDGET',
							'text'  => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam aliquam, risus non vehicula vestibulum, purus tortor tempor mauris, consectetur semper tortor dolor sed mauris. Morbi nunc ipsum' ),
						array(
							'before_widget' => '<li class="footerwidget">',
							'after_widget'  => '</li>',
							'before_title'  => '<h4 class="footerwidgettitle">',
							'after_title'   => '</h4>',
						) );

					the_widget(
						'WP_Widget_Text', array(
							'title' => 'TEXT WIDGET',
							'text'  => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam aliquam, risus non vehicula vestibulum, purus tortor tempor mauris, consectetur semper tortor dolor sed mauris. Morbi nunc ipsum' ),
						array(
							'before_widget' => '<li class="footerwidget">',
							'after_widget'  => '</li>',
							'before_title'  => '<h4 class="footerwidgettitle">',
							'after_title'   => '</h4>',
						) );

					the_widget(
						'WP_Widget_Text', array(
							'title' => 'TEXT WIDGET',
							'text'  => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam aliquam, risus non vehicula vestibulum, purus tortor tempor mauris, consectetur semper tortor dolor sed mauris. Morbi nunc ipsum' ),
						array(
							'before_widget' => '<li class="footerwidget">',
							'after_widget'  => '</li>',
							'before_title'  => '<h4 class="footerwidgettitle">',
							'after_title'   => '</h4>',
						) );
				} else if ( is_active_sidebar( 'martial-footer' ) ) {
					dynamic_sidebar( 'martial-footer' );
				}
				?>
			</ul>
			<div class="clear"></div>
		</div>
		<div class="footer_logo">
			<?php if ( has_custom_logo() ) {
				the_custom_logo();
			}
			?>
			<p>
<a rel="generator" href="<?php echo esc_url( __( 'http://wordpress.org/', 'martial-lite' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'martial-lite' ), 'WordPress' ); ?></a>
<a rel="generator" href="<?php echo esc_url( __( 'http://themefurnace.com/', 'martial-lite' ) ); ?>"><?php printf( __( 'Theme by %s', 'martial-lite' ), 'ThemeFurnace' ); ?></a>
			</p>
		</div>
	</div>
</div>
</footer>
<!-- footer ends -->

<?php wp_footer(); ?>
</body>
</html>
