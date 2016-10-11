<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
*/
?>
<!-- BEGIN: EACH BLOG DIVISION -->
<div id="post-<?php the_ID(); ?>" <?php post_class('animatedParent blog-page-section standard-blog'); ?>>
	<div class="col-md-1 col-sm-1 col-xs-1 post-icon-wrap text-center primary-bgcolor">
		<i class="fa fa-picture-o post-icon"></i>
	</div>
	<div class="col-md-11 col-sm-11 col-xs-11 post-content-wrap">
		<div class="col-md-12 post-inner-content-wrap">
			<?php if(has_post_thumbnail()) { ?>
				<div class="animated fadeInUpShort blog-page-thumbnail">
					<?php the_post_thumbnail('thenotes-lite-blog-page-thumb'); ?>
				</div>
			<?php } ?>

			<div class="animated fadeInUpShort blog-page-meta">
				<span class="blog-meta-author primary-color"><?php esc_attr_e('by', 'thenotes-lite'); ?> <?php echo get_the_author_meta('display_name',$post->post_author); ?></span>
				<span class="blog-meta-sep primary-color">|</span>
				<span class="blog-meta-date primary-color"><?php echo get_the_time( get_option( 'time_format' ) ); ?></span>
			</div>

			<div class="animated fadeInUpShort blog-page-des">
				<div class="blog-inner-content">
					<h3 class="blog-inner-title"><a class="secondary-color" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<div class="post-excerpt"><?php the_excerpt(); ?></div>
					<a class="readmore" href="<?php the_permalink(); ?>"><i class="fa fa-bookmark primary-color"></i>&nbsp;&nbsp;<?php esc_attr_e('READ ARTICLE', 'thenotes-lite') ?></a>
				</div>
			</div>

		</div>

		<div class="animated fadeInUpShort blog-page-meta-bottom">
			<span class="blog-meta-comment"><?php echo str_word_count(get_the_content()).' '.esc_attr__('words', 'thenotes-lite'); ?> (<strong class="eta"></strong><strong class="wta"></strong>)</span>
		</div>

	</div>
</div>
<!-- END: EACH BLOG DIVISION -->
