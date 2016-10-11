<?php
/**
 * The Header for our theme.
 * @package WordPress
 * @SketchThemes
 */
global $thenotes_lite;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<link rel="profile" href="http://gmpg.org/xfn/11"/>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"/>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- BEGIN: LAYOUT/HEADERS/HEADER-1 -->
	<!-- BEGIN: HEADER -->
	<header id="masthead" class="site-header" role="banner">
		<nav id="main-nav" class="navbar navbar-default" data-spy="affix" data-offset-top="78">
			<div class="container-fluid nav-container-fluid">
				<div class="navbar-header primary-bgcolor">
					<?php if( get_custom_logo() ) { ?>
						<?php thenotes_lite_the_custom_logo(); ?>
					<?php }
					if( display_header_text() ) { ?>
						<div id="site-identity">
							<a id="site-title" href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo('name') ?>" ><?php bloginfo('name'); ?></a>
							<div id="site-description"><?php bloginfo( 'description' ); ?></div>
						</div>
					<?php } ?>
				</div>
				<!-- BEGIN: MENU -->
				<?php if ( has_nav_menu('Header') ) {
					wp_nav_menu(array( 'container_id' => 'skenav', 'container_class' => 'skenav', 'menu_id' => 'menu', 'menu_class' => 'nav navbar-nav', 'theme_location' => 'Header' ));
				} ?>
				<!-- END: MENU -->

				<ul id="nav-button-wrap" class="nav navbar-nav navbar-right">
				  <li class="hidden-lg"><a id="sktmenu-toggle"><span class="line line1 primary-bgcolor secondary-focus-color secondary-hover-color"></span><span class="line line2 primary-bgcolor secondary-focus-color secondary-hover-color"></span><span class="line line3 primary-bgcolor secondary-focus-color secondary-hover-color"></span></a></li>
				  <li><a id="nav-search" href="javascript:void(0);"><span class="glyphicon glyphicon-search nav-search-icon primary-color secondary-hover-color secondary-focus-color"></span></a></li>
				</ul>

				<div id="header-serch-form" class="animated fadeInUpShort">
					<?php get_search_form(); ?>
				</div>
			</div>
		</nav>

		<?php if ( is_front_page() ) {
			get_template_part('includes/slider-section');
		} else {
			get_template_part("includes/breadcrumb-section"); ?>
			<div id="header-overlay"></div>
		<?php } ?>
	</header>
	<!-- END: HEADER -->
<!-- END: LAYOUT/HEADERS/HEADER-1 -->

<div class="page">
