(function($){
	$(document).ready(function() {
		"use strict";

		/* Owl Carousel Home Slider */
		$("#owl-demo").owlCarousel({
		  singleItem : true,
		  pagination : false,
		  autoPlay : true,
		  transitionStyle: "fade",
		});

		// Owl Carousel Gallary Post
		var owl = $(".skt-gallery-post");
			owl.owlCarousel({
			singleItem : true,
			navigation : true,
			pagination : false,
			navigationText : ["<i class='fa fa-caret-left'></i>", "<i class='fa fa-caret-right'></i>"],
			autoplay: true
		});

		// Post Reading Time
		$('.blog-meta-comment').each(function() {
			$(this).readingTime({
				readingTimeTarget: $(this).find('.eta'),
				wordCountTarget: null,
				wordsPerMinute: 270,
				round: true,
				lang: 'en'
			});
		});

		/* Prettyphoto */
		$("a[data-rel^='prettyPhoto']").prettyPhoto({
			hook: 'data-rel',
			animation_speed:'normal',
			theme:'light_square',
			slideshow:3000,
			show_title:false,
			autoplay_slideshow: false,
			social_tools: false
		});
		$("a[rel^='prettyPhoto']").prettyPhoto({
			animation_speed:'normal',
			theme:'light_square',
			slideshow:3000,
			show_title:false,
			autoplay_slideshow: false,
			social_tools: false
		});

		// Header Serch Form
		$('#nav-search').click(function(){
			$('#header-serch-form').addClass('go');
		});
		$("#post-slider-wrapper, #slider-wrapper, #blog-wrapper, #search-wrapper, .sktwed-breadcrumbs").click(function(){
			$('#header-serch-form').removeClass('go');
		});

		// Remove wp empty <p> tags from post content
		$('p:empty').remove();

		$('#post-slider-wrapper,.home-post-slider').sethomesliderheight();

	});

	/* ---------------------------------------------------- */
	/*	SCROLLTOTOP											*/
	/* ---------------------------------------------------- */
	$(window).scroll(function() {
		if ($(this).scrollTop() > 50 ) {
			$('.scrolltop:hidden').stop(true, true).fadeIn();
		} else {
			$('.scrolltop').stop(true, true).fadeOut();
		}
	});

	//MOBILE MENU -----------------------------------------
	//-----------------------------------------------------
	jQuery(document).ready(function(){
	'use strict';
		jQuery('#menu').sktmobilemenu();

		jQuery('#menu.skt-mob-menu li.menu-item-has-children .dropdown').live('click', function(){
			console.log("dropdown clicked");
			if(jQuery(this).hasClass('active')){
				jQuery(this).removeClass('active');
				jQuery(this).prev('ul').stop(true,true).slideUp();
			}
			else{
				jQuery(this).addClass('active');
				jQuery(this).prev('ul').stop(true,true).slideDown();
			}
		});
	});

	(function( $ ) {
	'use strict';
		$.fn.sktmobilemenu = function( options ) {
			var defaults = {
			 'fwidth': 766
			};
			//call in the default otions
			var options = $.extend(defaults, options);
			var obj = $(this);
			return this.each(function() {
				if($(window).width() < options.fwidth) {
					jQuery('.menu-item-has-children').append('<span class="dropdown"><i class="fa fa-angle-down dropdownicon"></i></span>');
					sktMobileRes();
				}

				$(window).resize(function() {
					if($(window).width() < options.fwidth) {
						sktMobileRes();
					} else {
						sktDeskRes();
					}
				});

				function sktMobileRes() {
					obj.addClass('skt-mob-menu').hide();
					$('#sktmenu-toggle').css('display','block');
					$('#sktmenu-toggle').removeClass('active');
				}
				function sktDeskRes() {
					obj.removeClass('skt-mob-menu').show();
					$('#sktmenu-toggle').css('display','none');
				}

				$('#sktmenu-toggle').click( function() {
					if(!$(this).hasClass('active')){
						$(this).addClass('active');
						$('#menu').stop(true,true).slideDown();
					}
					else{
						$(this).removeClass('active');
						$('#menu').stop(true,true).slideUp();
					}
				});
			});
		};
	})( jQuery );

	/* ---------------------------------------------------- */
	/*	Slider in First Fold								*/
	/* ---------------------------------------------------- */
	$.fn.sethomesliderheight = function() {
	'use strict';
		var windowHeight = $(window).height();
		if( windowHeight > 765 ) {
			this.css('height', windowHeight);
		}
	};
	$(window).resize(function() {
		$('#post-slider-wrapper,.home-post-slider').sethomesliderheight();
	});

	/* ---------------------------------------------------- */
	/*	PARALLAX											*/
	/* ---------------------------------------------------- */
	$.fn.parallax = function(xpos, speedFactor) {
	'use strict';
		var firstTop, methods = {};
		if($(window).width() > 1650){
			var staval = "650";
		}else if($(window).width() > 1350){
			var staval = "350";
		}else if($(window).width() > 767){
				var staval = "650";
		}else if($(window).width() > 500){
				var staval = "400";
		}else {
		 	var staval = "200";
		}
		return this.each(function(idx, value) {
			var $this = $(value), firstTop = $this.offset().top;
			if (arguments.length < 1 || xpos === null)
			xpos = "50%";
			if (arguments.length < 2 || speedFactor === null)
			speedFactor = 0.1;
			methods = {
				update: function() {
					var pos = $(window).scrollTop();
					$this.each(function() {
						$this.css('backgroundPosition', xpos + " " + Math.round((firstTop - pos - staval) * speedFactor) + "px");
					});
				},
				init: function() {
					this.update();
					$(window).on('scroll', methods.update);
				}
			}
			return methods.init();
		});
	};

})(jQuery);
