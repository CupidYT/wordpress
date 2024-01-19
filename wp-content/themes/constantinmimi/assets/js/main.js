;(function ($, window, document, undefined) {
	'use strict'

	jQuery(document).ready(function ($) {				

		// Partners Logo Carousel
		jQuery(document).ready(function ($) {
			const root = $('html')[0]
			const marqueeElementsDisplayed = parseInt(
				getComputedStyle(root).getPropertyValue(
					'--marquee-elements-displayed'
				),
				10
			)
			const marqueeContent = $('ul.marquee-content')

			root.style.setProperty(
				'--marquee-elements',
				marqueeContent.children().length
			)

			for (let i = 0; i < marqueeElementsDisplayed; i++) {
				marqueeContent.append(marqueeContent.children().eq(i).clone())
			}
		})				

		// Gallery
		$('.gallery .gallery-icon, .image-gallery-carousel').magnificPopup({
			delegate: 'a',
			type: 'image',
			gallery: {
				enabled: true,
			},
		})

		// Prevail Carousel
		$('.customers-slider').slick({
			infinite: true,
			draggable: true,
			slidesToShow: 1,
			slidesToScroll: 1,
			dots: true,
			arrows: false,
		})

		// Upcoming Events Carousel
		$('.upcoming-events-carousel-list').slick({
			infinite: true,
			draggable: true,
			slidesToShow: 4,
			slidesToScroll: 1,
			dots: false,
			arrows: true,
			prevArrow: $('.prev-slide'),
			nextArrow: $('.next-slide'),
		})
		// Upcoming Events Carousel
		$('.atmosfera-carousel-list').slick({
			infinite: true,
			draggable: true,
			slidesToShow: 3,
			slidesToScroll: 1,
			dots: true,
			arrows: true,
			prevArrow: $('.slick-prev'),
			nextArrow: $('.slick-next'),
		})

		// Technologies Carousel
		$('.technologies-carousel').slick({
			infinite: false,
			draggable: true,
			slidesToShow: 4,
			slidesToScroll: 1,
			dots: false,
			arrows: true,
			prevArrow: $('.slick-prev'),
			nextArrow: $('.slick-next'),
			responsive: [
				{
					breakpoint: 1101,
					settings: {
						slidesToShow: 3,
					},
				},
				{
					breakpoint: 769,
					settings: {
						slidesToShow: 2,
					},
				},
				{
					breakpoint: 576,
					settings: {
						slidesToShow: 1,
						dots: true,
						arrows: false,
					},
				},
			],
		})

		// Review Carousel
		$('.reviews-carousel-slider').slick({
			infinite: true,
			draggable: true,
			slidesToShow: 3,
			slidesToScroll: 1,
			dots: false,
			arrows: true,
			prevArrow: $('.slick-prev'),
			nextArrow: $('.slick-next'),			
			responsive: [				
				{
					breakpoint: 769,
					settings: {
						slidesToShow: 2,
					},
				},
				{
					breakpoint: 576,
					settings: {
						slidesToShow: 1,
						dots: true,
						arrows: false,
					},
				},
			],
		})

		// Navigation Fixed
		var lastScrollTop = 0;

		$(window).scroll(function () {
			var st = $(this).scrollTop();

			if (st > lastScrollTop) {
				// Scrolling down
				if (st >= 50) {
					$('.main-header').addClass('main-header-fixed');
				}
			} else {
				// Scrolling up
				if (st < 50) {
					$('.main-header').removeClass('main-header-fixed');
				}
			}

			lastScrollTop = st;
		});

		// Mobile navigation
		$('.menu-open-mobile').click(function () {
			$('body').addClass('mobile-menu-open')
			$('.menu-off-canvas').addClass('mobile-menu-active')
		})

		$('.mobile-menu-close-inner, .site-overlay').click(function () {
			$('body').removeClass('mobile-menu-open')
			$('.menu-off-canvas').removeClass('mobile-menu-active')
		})

		$(document).keydown(function (e) {
			if (e.keyCode == 27) {
				$('body').removeClass('mobile-menu-open')
				$('.menu-off-canvas').removeClass('mobile-menu-active')
			}
		})				

		// Image Gallery Carousel
		$('.image-gallery-carousel').slick({
			infinite: true,
			draggable: true,
			centerMode: true,
			centerPadding: '100px',
			slidesToShow: 3,
			arrows: true,
			dots: false,
			prevArrow:
				'<div class="slick-prev"><svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14"><path d="M12.91 8.09H3.724l3.592 3.593a1.09 1.09 0 1 1-1.543 1.543L.32 7.77a1.09 1.09 0 0 1 0-1.542L5.774.774a1.091 1.091 0 0 1 1.543 1.543L3.725 5.909h9.184a1.09 1.09 0 0 1 0 2.182Z" fill="#2C2C2C"/><path d="M12.91 8.09H3.724l3.592 3.593a1.09 1.09 0 1 1-1.543 1.543L.32 7.77a1.09 1.09 0 0 1 0-1.542L5.774.774a1.091 1.091 0 0 1 1.543 1.543L3.725 5.909h9.184a1.09 1.09 0 0 1 0 2.182Z" fill="#0D0D0D" fill-opacity=".2"/></svg></div>',
			nextArrow:
				'<div class="slick-next"><svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14"><path d="M1.09 8.09h9.185l-3.592 3.593a1.09 1.09 0 1 0 1.543 1.543L13.68 7.77a1.09 1.09 0 0 0 0-1.542L8.226.774a1.091 1.091 0 0 0-1.543 1.543l3.592 3.592H1.091a1.09 1.09 0 0 0 0 2.182Z" fill="#2C2C2C"/><path d="M1.09 8.09h9.185l-3.592 3.593a1.09 1.09 0 1 0 1.543 1.543L13.68 7.77a1.09 1.09 0 0 0 0-1.542L8.226.774a1.091 1.091 0 0 0-1.543 1.543l3.592 3.592H1.091a1.09 1.09 0 0 0 0 2.182Z" fill="#0D0D0D" fill-opacity=".2"/></svg></div>',
			responsive: [
				{
					breakpoint: 1441,
					settings: {
						slidesToShow: 2,
					},
				},
				{
					breakpoint: 576,
					settings: {
						slidesToShow: 1,
						centerPadding: '50px',
					},
				},
			],
		})
	})
	
})(jQuery, window, document)
