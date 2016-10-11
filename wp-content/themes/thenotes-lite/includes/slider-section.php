<?php global $thenotes_lite; ?>

<?php if ( isset($thenotes_lite['skt-slider-options']) && $thenotes_lite['skt-slider-options'] == '1') { ?>

	<section id="slider-wrapper">
		<div class="home-slider-wrapper text-center">
			<div class="image-wrapper">
				<img class="skt-header-image" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" src="<?php header_image(); ?>">
			</div>
		</div>
	</section>

<?php } else {

		if( isset($thenotes_lite['skt-slider-posts']) ) {
			$slider_post_ids = explode(',', $thenotes_lite['skt-slider-posts'] );
			$the_query = new WP_Query( array( 'post_type' => 'post', 'post__in' => $slider_post_ids, 'posts_per_page' => -1 ) );
		} else {
			$the_query = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => get_option('posts_per_page') ) );
		}

		if ( $the_query->have_posts() ) : ?>
		<!-- BEGIN: SLIDER -->
		<section id="post-slider-wrapper">
			<div class="home-post-slider text-center">

				<div class="home-post-slider-wrap">
					<div id="owl-demo" class="owl-carousel">
						<!-- the loop -->
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
							<?php
								$author_id    = $post->post_author;
								$author_url   = get_author_posts_url(get_the_author_meta('ID'));
								$author_name  = get_the_author_meta('display_name',$author_id);
								$author_email = get_the_author_meta('user_email',$author_id);
								$author_bio   = get_the_author_meta('description',$author_id);

								$postTitle = get_the_title();
								$postTitle = explode(" ", $postTitle);
								if( count($postTitle) > 3) {
									$postTitle[2] = '<span class="primary-color">'.$postTitle[2];
									$postTitle[3] = $postTitle[3].'</span>';
								}
								$postTitle = implode(" ", $postTitle);
							?>
							<div class="item">
								<div class="post-slider-container">
									<?php if (has_category()) { ?>
										<div class="post-slider-category text-uppercase"><?php the_category(', '); ?></div>
									<?php } ?>
									<div class="post-slider-title text-uppercase"><?php echo wp_kses_post( $postTitle ); ?></div>
									<div class="post-slider-sep"></div>
									<div class="post-slider-date post-slider-meta"><strong><?php _e('DATE', 'thenotes-lite'); ?></strong>: <?php echo get_the_time( get_option('time_format') ); ?></div><div class="post-slider-metasep post-slider-meta">|</div><?php if ( has_tag() ) {
										the_tags('<div class="post-slider-tags post-slider-meta"><strong>'.__('TAG', 'thenotes-lite').'</strong>: ',', ','</div><div class="post-slider-metasep post-slider-meta">|</div>');
									} ?><div class="post-slider-comment post-slider-meta"><strong><?php _e('COMMENTS', 'thenotes-lite') ?></strong>: <?php comments_popup_link( __('POST A COMMENT', 'thenotes-lite'), __('1 COMMENT ', 'thenotes-lite'), __('% COMMENTS ', 'thenotes-lite'), 'comments-link', __('COMMENTS OFF ', 'thenotes-lite') ); ?></div>
								</div>
								<div class="post-slider-author-wrap text-left">
									<div class="post-slider-author-title"><?php _e('ABOUT AUTHOR', 'thenotes-lite'); ?></div>
									<div class="post-slider-author-name text-uppercase font-16"><?php echo esc_attr($author_name); ?></div>
								</div>
							</div>
						<?php endwhile; ?>
						<!-- end of the loop -->
						<?php wp_reset_postdata(); ?>
					</div>
				</div>
			</div>
		</section>

		<?php else : ?>

		<section id="slider-wrapper">
			<div class="image-wrapper">
				<img class="skt-header-image" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" src="<?php header_image(); ?>">
			</div>
		</section>

		<?php endif; ?>

<?php } ?>
