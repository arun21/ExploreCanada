<?php
/**
 * The Sketch Custom Template to add custom code (PHP/WORDPRESS)
 * @package WordPress
 * @SketchThemes
 */
?>
<?php
global $thenotes_lite, $post;

$thenotes_lite_primary_color		= isset($thenotes_lite['skt-primary-color']) ? esc_attr( $thenotes_lite['skt-primary-color'] ) : '#ff7113';
$thenotes_lite_slider_txtcolor	= isset($thenotes_lite['skt-slider-txtcolor']) ? esc_attr( $thenotes_lite['skt-slider-txtcolor'] ) : '#fff';
$thenotes_lite_secondary_color	= '#3c4854';

$thenotes_lite_logo_width = isset( $thenotes_lite['skt-logo-width'] ) ? $thenotes_lite['skt-logo-width'] : '215' ;
$thenotes_lite_logo_height = isset( $thenotes_lite['skt-logo-height'] ) ? $thenotes_lite['skt-logo-height'] : '75' ;
$thenotes_lite_moblogo_width = isset( $thenotes_lite['skt-mob-logo-width'] ) ? $thenotes_lite['skt-mob-logo-width'] : '150' ;
$thenotes_lite_moblogo_height = isset( $thenotes_lite['skt-mob-logo-height'] ) ? $thenotes_lite['skt-mob-logo-height'] : '65' ;

$rgb=array();
$rgb = thenotes_lite_skeHex2RGB($thenotes_lite_primary_color);
$R = $rgb['red'];
$G = $rgb['green'];
$B = $rgb['blue'];
$_primary_rgba_color = "rgba(". $R .",". $G .",". $B .",.9)";
?>
<style type="text/css">
.post-slider-container{ color: <?php echo esc_attr($thenotes_lite_slider_txtcolor); ?>; }
.post-slider-sep{border-color: <?php echo esc_attr($thenotes_lite_slider_txtcolor); ?>; }
/*LOGO WIDHT AND HEIGHT*/
img.custom-logo{width:<?php echo esc_attr($thenotes_lite_logo_width).'px' ?>; height:<?php echo esc_attr($thenotes_lite_logo_height).'px' ?>;}
/*FONT COLOR*/
.comments-link:hover,#sktwed-main-sidebar .widget_archive a:hover, #sktwed-main-sidebar .widget_categories a:hover, #sktwed-main-sidebar .widget_pages a:hover, #sktwed-main-sidebar .widget_meta a:hover, #sktwed-main-sidebar .widget_recent_comments a:hover, #sktwed-main-sidebar .widget_recent_entries a:hover, #sktwed-main-sidebar .widget_nav_menu a:hover,
.wp-calendar-head i:hover,.blog-page-metas a:hover,
.owl-buttons i:hover,
.logged-in-as a, #skenav .max-menu li.current a,
.strip-icon i,.iconbox-icon i:hover{color:<?php echo esc_attr($thenotes_lite_primary_color); ?>;}
/*PRIMARY BACKGROUND*/
.search-bar input[type="text"],
#commentform input[type="submit"]:hover,
.horizontal-style::before,
.horizontal-style::after,.iconbox-icon i:hover .featured-style{background-color:<?php echo esc_attr($thenotes_lite_primary_color); ?>; }
/*SECONDARY BACKGROUND COLOR*/
#menu,
#skenav ul ul,
.iconbox-icon i:hover,
.horizontal-style{background-color: <?php echo esc_attr($thenotes_lite_secondary_color); ?>; }
/*HOVER COLOR*/
#skenav ul.max-menu ul.sub-menu li:hover a { background-color: <?php echo esc_attr($thenotes_lite_primary_color); ?>; color:#000000; }
/*BACKGROUND COLOR*/
#skenav ul.max-menu ul.sub-menu li.current a { background-color: <?php echo esc_attr($thenotes_lite_secondary_color); ?>; }
/*Post Slider*/
.post-slider-category a{color: <?php echo esc_attr($thenotes_lite_primary_color); ?>;}

/*Pagination*/
.blog-content-pagination .c-active a,.blog-content-pagination li a:hover, .blog-page-pagination a:hover{background-color: <?php echo esc_attr($thenotes_lite_primary_color); ?>;}

@media (max-width: 767px) {
	img.custom-logo{width:<?php echo esc_attr($thenotes_lite_moblogo_width).'px' ?>;height:<?php echo esc_attr($thenotes_lite_moblogo_height).'px' ?>;}
}

.footer-social { border: 1px solid #FFFFFF; }
.footer-social:hover { background: none repeat scroll 0 0 <?php echo esc_attr($thenotes_lite_secondary_color); ?>; border: 1px solid <?php echo $thenotes_lite_secondary_color; ?>; }
.footer-social:hover a { color: #FFFFFF; }

#footer_bottom .copyright p, #footer_bottom .refrence_link { color: <?php echo esc_attr($thenotes_lite_primary_color); ?>; }
.skt-iconbox.iconbox-top .iconbox-content h4:after {background-color: <?php echo esc_attr($thenotes_lite_primary_color); ?>;}
.skepost .team .black { color: <?php echo esc_attr($thenotes_lite_primary_color); ?>; }
.skepage .team .team-overlay { background-color: <?php echo esc_attr($thenotes_lite_primary_color); ?>; }
.team-social:hover {background: none repeat scroll 0 0 <?php echo esc_attr($thenotes_lite_secondary_color); ?>; border: 1px solid <?php echo $thenotes_lite_secondary_color; ?>; }
.sketch-theme-black .sketch-close {background-color: <?php echo esc_attr($thenotes_lite_primary_color); ?>; }
.prot_text_wrap h2 {color: <?php echo esc_attr($thenotes_lite_primary_color); ?>; margin-bottom: 27px;}


#wp-calendar tbody a { background-color: <?php echo esc_attr($thenotes_lite_primary_color); ?>; color: #ffffff;}
.wp-calender-head {background-color: <?php echo esc_attr($thenotes_lite_secondary_color); ?>; }
.sktwed-footer-widget .wp-calendar-head{background-color: <?php echo esc_attr($thenotes_lite_primary_color); ?>;}

.reply a:hover, a.comment-edit-link:hover, #cancel-comment-reply-link{color: <?php echo esc_attr($thenotes_lite_secondary_color); ?>;}

#sidebar li.ske-container #wp-calendar .wp-calender-head a:hover,.skt_price_table .price_table_inner .price_button a{color: <?php echo esc_attr($thenotes_lite_secondary_color); ?>; }
#wp-calendar.skt-wp-calendar tbody tr td:last-child,#wp-calendar.skt-wp-calendar tbody tr th:last-child {color:<?php echo esc_attr($thenotes_lite_primary_color); ?>;}

/* BUTTONS STYLE */
.skt_price_table .price_table_inner .price_button a:hover { background: none repeat scroll 0 0 <?php echo esc_attr($thenotes_lite_secondary_color); ?> !important; color: #FFFFFF !important; }
a.large-button:hover, a.small-button:hover, a.medium-button:hover{ background:  none repeat scroll 0 0 <?php echo esc_attr($thenotes_lite_primary_color); ?> !important; color: #FFFFFF !important; }

/* BLOG STYLE */
.post-calendar {background-color: <?php echo esc_attr($thenotes_lite_primary_color); ?>; }
.skt_blog_title { color: <?php echo esc_attr($thenotes_lite_primary_color); ?>; margin-bottom: 9px; }
.skt_blog_middle .btn_readmore,.skt_price_table .price_in_table .value {color: <?php echo esc_attr($thenotes_lite_secondary_color); ?>; }
.news_blog .news-details .skt_blog_commt {color: <?php echo esc_attr($thenotes_lite_primary_color); ?>; }
.news_full_blog .news-details .skt_blog_commt {color: <?php echo esc_attr($thenotes_lite_primary_color); ?>; }
.news_full_blog .full-post-calendar i.fa {color: <?php echo esc_attr($thenotes_lite_primary_color); ?>; }
.bread-title-holder,.skt_price_table .price_table_inner ul li.table_title { background-color: <?php echo esc_attr($thenotes_lite_primary_color); ?>; }
blockquote { background-color: <?php echo esc_attr($_primary_rgba_color); ?>; }
.skt_blog_top .image-gallery-slider .postformat-gallerycontrol-nav li a.postformat-galleryactive { background-color: <?php echo esc_attr($thenotes_lite_secondary_color); ?>; }
.play_button_overlay a.play_btn:hover {background-color: <?php echo esc_attr($thenotes_lite_secondary_color); ?>; }
.play_button_overlay a.play_btn:hover i.fa.fa-play {color: #FFFFFF; }
.play_button_overlay a i.fa.fa-play {color: <?php echo esc_attr($thenotes_lite_secondary_color); ?>;  }
 #thenotes-paginate a:hover{background-color: <?php echo esc_attr($thenotes_lite_secondary_color); ?>; }
 #thenotes-paginate .thenotes-next, #thenotes-paginate .thenotes-prev{background-color:<?php echo esc_attr($thenotes_lite_primary_color); ?>; }
.author_social .team-social {border: 1px solid <?php echo esc_attr($thenotes_lite_primary_color); ?>; }
.skt_price_table .price_table_inner .price_button a {border: 1px solid <?php echo esc_attr($thenotes_lite_secondary_color); ?>; }
.author_social .team-social a {color: <?php echo esc_attr($thenotes_lite_primary_color); ?>; }
.author_social .team-social:hover {background-color: <?php echo esc_attr($thenotes_lite_secondary_color); ?>; border: 1px solid <?php echo esc_attr($thenotes_lite_secondary_color); ?>; }
.author_social .team-social:hover a { color: #FFFFFF; }
.author-comment-section .author_title, .author-comment-section .black.mb, .reply a, .comment-author cite, .commentlist p {color: <?php echo esc_attr($thenotes_lite_primary_color); ?>; }


/* PAGINATION */
#thenotes-paginate .thenotes-page {background-color: <?php echo esc_attr($thenotes_lite_primary_color); ?>;}
#thenotes-paginate .thenotes-current{background-color: <?php echo esc_attr($thenotes_lite_secondary_color); ?>;}
/* SHORTCODE */
.ske_tab_v ul.ske_tabs li.active{border-left-color:<?php echo esc_attr($thenotes_lite_secondary_color); ?>;}
.ske_tab_h ul.ske_tabs li.active{border-top-color:<?php echo esc_attr($thenotes_lite_secondary_color); ?>;}
/* SIDEBAR STYLE */
h3.ske-title {color: <?php echo esc_attr($thenotes_lite_primary_color); ?>; }

.widget_tag_cloud a:hover,.widget_product_tag_cloud a:hover { background-color: <?php echo esc_attr($thenotes_lite_secondary_color); ?>;border:1px solid <?php echo esc_attr($thenotes_lite_secondary_color); ?>; }
#skenav ul ul li:hover, .line {border-bottom: 1px solid <?php echo esc_attr($thenotes_lite_primary_color); ?>; }

/*NEW*/
.main_menu_btn .line, .blog-img-wrap:hover .blog-meta-wrap, .skt-gallery-post.owl-theme .owl-controls .owl-page span, .author-social-wrap > a i, #sktwed-main-sidebar .tagcloud a:hover, .notfound-inner-wrapper .sktwed-sub-button {
	background: <?php echo esc_attr($thenotes_lite_primary_color); ?> none repeat scroll 0 0;
}
.primary-bgcolor, .primary-hover-bgcolor:hover, .video-overlay span, a.view-all-link i.fa, .comment-form-wrap h3.comment-form-heading:after, #sktwed-main-sidebar li.sktwed-widget-list h3.sktwed-widget-title::after, #sktwed-main-sidebar .widget_archive ul > li:hover a:before, .notfound-inner-wrapper .notfound-text h4::after, .author-wrap h3.author-heading::after, .comments-wrap h3.comments-heading:after, .comment-form-wrap h3.comment-form-heading:after {
	background-color: <?php echo esc_attr($thenotes_lite_primary_color); ?>;
}
.comment-time, .comment-time a, .primary-color, .primary-hover-color:hover, .gallery-overlay-ef .fa.fa-search-plus, .gallery-overlay-ef .icon.wedding-gallery-search, .blog-content-wrap > a, .blog-content-wrap > a:hover, .readmore i, .blog-page-des a.readmore:hover, .blog-content-pagination li a:focus, .sktwed-recent-post .sktwed-sidebar-date, .notfound-inner-wrapper h2, .backtohome div a span, div.backbtn-seperator, #wp-calendar.sktwed-wp-calendar tbody tr td:last-child, #wp-calendar.sktwed-wp-calendar tbody tr th:last-child, .sktwed-footer-widget a:hover {
	color: <?php echo esc_attr($thenotes_lite_primary_color); ?>;
}

.slider-text h4.border-text {border-top: 1px solid <?php echo esc_attr($thenotes_lite_primary_color); ?>; }
.blog-img-wrap:hover .blog-meta-wrap:before { border-bottom-color: <?php echo esc_attr($thenotes_lite_primary_color); ?>; }
input[type="submit"]:hover, .comment-reply-link:hover {background-color: <?php echo esc_attr($thenotes_lite_primary_color); ?>; }
#sktwed-main-sidebar .tagcloud a:hover{border-color: <?php echo esc_attr($thenotes_lite_primary_color); ?>;}

/*=========== Secondary Color =============*/
.secondary-color,.secondary-hover-color:hover,.secondary-focus-color:focus{color: #3c4854;}
.comment-text{border-left: 4px solid <?php echo esc_attr($thenotes_lite_primary_color); ?>;}
#post-slider-wrapper{background-image: url(<?php header_image(); ?>);}

@media only screen and (min-width : 310px) and (max-width : 766px) {
	#skenav ul li.current_page_item > a, #skenav ul ul li.current_page_item > a {background-color: <?php echo esc_attr($thenotes_lite_primary_color); ?>;}
}
/*BootStrap Override Class*/
.btn-default:focus, .btn-default.focus, .btn-default:hover{background-color: <?php echo $thenotes_lite_primary_color; ?>; border-color: <?php echo esc_attr($thenotes_lite_primary_color); ?>;}
</style>

<!-- Page Options// -->
<?php

$header_background_overlay_color	 = isset( $thenotes_lite['header_background_overlay_color'] ) ? $thenotes_lite['header_background_overlay_color'] : '#ffffff';
$header_background_overlay_opacity   = isset( $thenotes_lite['header_background_overlay_opacity'] ) ? $thenotes_lite['header_background_overlay_opacity'] : '0.5';

$header_overlay_color= array();
$header_overlay_color= thenotes_lite_skeHex2RGB($header_background_overlay_color);
$hR2  = $header_overlay_color['red'];
$hG2  = $header_overlay_color['green'];
$hB2  = $header_overlay_color['blue'];
$header_overlay_rgba = "rgba(". $hR2 .",". $hG2 .",". $hB2 .",".$header_background_overlay_opacity.")";

if ( !is_front_page() ) { ?>
	<style type="text/css">
		header{
			background-image: url(<?php header_image(); ?>);
			background-repeat: no-repeat;
			background-attachment: scroll;
			background-position: center top;
			background-size: cover;
			position: relative;
		}
		#header-overlay{
			background-color: <?php echo esc_attr($header_overlay_rgba); ?>;
			position: absolute; top: 0; right: 0; bottom: 0; left: 0;
			z-index: 1;
		}
	</style>
<?php } ?>
