(function ($) {
	"use strict";

	$(document.body).on('wc_fragments_refreshed wc_fragments_loaded added_to_cart', function (event) {
		$('.cart-contents').on('click', function () {
			$('.site-header-cart__wrapper').toggleClass('open');
		});
		$(document).on('click', function (e) {
			var target = e.target;
			if (!$(target).is('.site-header-cart__wrapper') && !$(target).parents().is('.site-header-cart__wrapper')) {
				$('.site-header-cart__wrapper').removeClass('open');
			}
		});
	});

	$(document).on('tm_wc_products_changed', initCountdown);

	function initCountdown() {

		$('.tm-products-sale-end-date[data-countdown]').each(function () {
			var $this = $(this),
				initalized = $this.data('initalized'),
				finalDate = $this.data('countdown'),
				format = $this.data('format');

			if (undefined !== initalized) {
				return;
			}

			$this.countdown(finalDate, function (event) {
				$this.html(event.strftime(format));
			});
			$this.data('initalized', true);

		});
	}

	initCountdown();

	function initQty($input) {
		var min = $input.attr('min'),
			max = $input.attr('max');

		$(document).off('click.techloop');
		$(document).on('click.techloop', '.tm-qty-minus', changeQty);
		$(document).on('click.techloop', '.tm-qty-plus', changeQty);

	}

	if ($('.quantity input[type=number]').length) {

		var $input = $('.quantity input[type=number]');

		$('.variations_form ').on('reset_data', function (event) {
			$input.val('1');
		});

		initQty($input);
	}

	$(document).on('tm-woo-quick-view-on-show', function () {
		var $input = $('.quantity input[type=number]');
		initQty($input);
	});

	function changeQty() {

		var $this = $(this),
			$parent = $this.closest('.quantity'),
			$input = $('input[type="number"]', $parent),
			min = $input.attr('min'),
			max = $input.attr('max'),
			current = $input.val();

		current = parseInt(current);
		min = parseInt(min);
		max = parseInt(max);

		if (typeof min === typeof NaN) {
			min = 1;
		}

		if ($this.hasClass('tm-qty-minus')) {
			if (current > min) {
				$input.val(current - 1).trigger('change');
			}
		} else if (typeof max === typeof NaN || current < max || '' === max) {
			$input.val(current + 1).trigger('change');
		}

	}

	function initCarouselThumbnail() {

		$(".woocommerce-product-gallery__trigger").prependTo(".woocommerce-product-gallery > .flex-viewport");

		$('ol.flex-control-nav').wrap("<div class='thumbnails-slider'></div>").addClass('slider-thumbnails');

		var sliderWrap = $('.thumbnails-slider'),
			productGallery = $('.woocommerce-product-gallery'),
			sliderItems = $('.slider-thumbnails > li'),
			itemMargin = productGallery.data('margin'),
			sliderWidth = sliderWrap.outerWidth(true),
			sliderColumns = productGallery.data('columns'),
			itemWidth = (sliderWidth + itemMargin) / sliderColumns - itemMargin,
			windowWidth = $(window).width();

		function carouselInit() {
			sliderWrap.flexslider({
				animation: "slide",
				selector: '.slider-thumbnails > li',
				controlNav: false,
				paginationNav: false,
				slideshow: false,
				itemWidth: itemWidth,
				itemMargin: itemMargin,
				prevText: "",
				nextText: "",
				animationLoop: false
			});
		}

		function carouselResize() {

			if (windowWidth < 768) {
				sliderColumns = 2;

				itemWidth = (sliderWidth + itemMargin) / sliderColumns - itemMargin;
			}

			sliderItems.css({
				'max-width': itemWidth
			});
		}


		$(window).on('load', carouselInit);

		$(window).on('load resize orientationchange', carouselResize);
	}

	$(document).ready(function () {
		if ($('body').hasClass('single-product')) {
			initCarouselThumbnail();
		}
	});


})(jQuery);
