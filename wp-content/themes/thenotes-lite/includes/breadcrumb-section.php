<?php global $thenotes_lite; ?>
<!-- BEGIN: BREADCRUMBS -->
<div class="sktwed-breadcrumbs text-center">
	<div class="container">
		<div class="sktwed-breadcrumbs-title">
			<h1 class="breadcrumb-title text-uppercase">
				<?php if( is_404() ) :
					_e('ERROR', 'thenotes-lite');
				elseif ( is_day() ) :
					printf( __( 'Daily Archives: <span>%s</span>', 'thenotes-lite' ), get_the_date() );
				elseif ( is_month() ) :
					printf( __( 'Monthly Archives: <span>%s</span>', 'thenotes-lite' ), get_the_date('F Y') );
				elseif ( is_year() ) :
					printf( __( 'Yearly Archives: <span>%s</span>', 'thenotes-lite' ), get_the_date('Y') );
				elseif ( is_home() ) :
					if( isset( $thenotes_lite['skt-blog-page-text'] ) ) { echo esc_attr( $thenotes_lite['skt-blog-page-text'] ); } else {_e('Blog', 'thenotes-lite'); }
				elseif ( is_author() ) :
					global $wp_query; $curauth = $wp_query->get_queried_object(); printf( __('Author', 'thenotes-lite') . ': ' . $curauth->display_name );
				elseif ( is_category() ) :
					printf( __( 'Category Archives: %s', 'thenotes-lite' ), '<span>' . single_cat_title( '', false ) . '</span>' );
				elseif ( is_tag() ) :
					printf( __( 'Tag Archives : %s', 'thenotes-lite' ), '<span>' . single_tag_title( '', false ) . '</span>' );
				elseif ( is_search() ) :
					_e('Search', 'thenotes-lite');
				else :
					the_title();
				endif;
				?>
				<span class="breacrumbs-sep primary-bgcolor"></span>
			</h1>


			<ul class="sktwed-page-breadcrumbs list-inline">
				<?php if ( is_home() ) { ?>
					<li><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_attr_e('Home', 'thenotes-lite'); ?></a></li>
					<li>/</li>
					<li class="sktwed-state-active"><a href="javascript:void(0);"><?php esc_attr_e('Home', 'thenotes-lite'); ?></a></li>
				<?php } elseif( is_404() ) { ?>
					<li><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_attr_e('Home', 'thenotes-lite'); ?></a></li>
					<li>/</li>
					<li class="sktwed-state-active"><a href="javascript:void(0);"><?php esc_attr_e('404', 'thenotes-lite'); ?></a></li>
				<?php } elseif( ( class_exists('thenotes_lite_breadcrumb_class') ) ) {
					$thenotes_lite_breadcumb = new thenotes_lite_breadcrumb_class();
					$thenotes_lite_breadcumb->thenotes_lite_custom_breadcrumb();
				} ?>
			</ul>
		</div>
	</div>
</div>
<!-- END: BREADCRUMBS -->
