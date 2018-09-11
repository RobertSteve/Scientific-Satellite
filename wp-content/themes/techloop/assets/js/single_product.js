/* global jssor_options */

jQuery(function ($) {

	$.fn.productImgPreload = function() {
		this.each(function(){
			$('<img/>')[0].src = this;
		});
	};

	var $easyzoom = $( '.single_product_wrapper .images .easyzoom' ).easyZoom(),
		easyZoomApi = $easyzoom.data('easyZoom'),
		items = [],
		index,
		thumb = $( '.single_product_wrapper .images .thumbnail' ),
		enlarge = '.single_product_wrapper .images .enlarge',
		zoom_enabled = true;
	if( thumb.length ) {
		thumb.eq(0).addClass( 'selected' );
		var preloadHref = [];
		preloadHref[0] = thumb.eq(0).data( 'href' );
		if( thumb.eq(1) ){
			preloadHref[1] = thumb.eq(1).data( 'thumb');
			preloadHref[2] = thumb.eq(1).data( 'href');
		}
		$( preloadHref ).productImgPreload();
		thumb.each( function() {
			items.push( {
				src: $( this ).data( 'href' )
			} );
			$( this ).on( 'click', function() {
				thumb.removeClass( 'selected' );
				$this = $( this );
				$this.addClass( 'selected' );
				if( easyZoomApi ) {
					easyZoomApi.teardown();
				}
				zoom_enabled = false;
				$( '.woocommerce-main-image' ).attr( {
					href: $this.data( 'href' )
				} ).find( 'img' ).attr( {
					src: $this.data( 'thumb' ),
					srcset: $this.find( 'img' ).attr( 'srcset' ),
					title: $this.find( 'img' ).attr( 'title' ),
					alt: $this.find( 'img' ).attr( 'alt' )
				} );
				zoom();
				index = $this.index();
				open_popup( index );
				preloadHref = [];
				preloadHref[0] = $this.data( 'href' );
				if( $this.next().length ){
					preloadHref[1] = $this.next().data( 'thumb');
					preloadHref[2] = $this.next().data( 'href');
				} else if( $this.prev().length ){
					preloadHref[1] = $this.prev().data( 'thumb');
					preloadHref[2] = $this.prev().data( 'href');
				}
				$( preloadHref ).productImgPreload();
			} );
		} );
	}

	$( document ).on( 'tm-woo-quick-view-on-show', function() {
		var $easyzoom   = $( '.single_product_wrapper .images .easyzoom' ).easyZoom(),
			easyZoomApi = $easyzoom.data( 'easyZoom' );

		zoom();
		fixVariationImg();
	});

	function open_popup( index ) {
		$( document ).on( 'click.techloop', enlarge, function() {
			$this = $( this );
			$.magnificPopup.open( {
				items: items,
				mainClass: 'mfp-fade',

				gallery: {
					enabled: true,
					preload: [1,1]
				},
				type: 'image'
			}, index );
		} );
	}

	open_popup( 0 );

	function open_popup_thumbnail( index ) {
		$( document ).on( 'click.post-thumbnail__link', enlarge, function() {
			$this = $( this );
			$.magnificPopup.open( {
				items: items,
				mainClass: 'mfp-fade',

				gallery: {
					enabled: true,
					preload: [1,1]
				},
				type: 'image'
			}, index );
		} );
	}

	open_popup_thumbnail( 0 );

	function zoom() {

		if( easyZoomApi ) {
			easyZoomApi.teardown();
			zoom_enabled = false;
		}

		if ( 768 > Math.min( $( window ).width(), screen.width ) ) {
			if( true === zoom_enabled && easyZoomApi ) {
				easyZoomApi.teardown();
				zoom_enabled = false;
			}
		} else {
			if( false === zoom_enabled && easyZoomApi ) {
				easyZoomApi._init();
				zoom_enabled = true;
			}
		}
	}

	zoom();
	$( window ).on( "resize orientationchange", zoom );

	function fixVariationImg() {
		$( '.variations_form' ).each( function() {
			var $this = $( this );
			$this.on( 'reset_image', { variationForm: $this }, onResetImage );
			$this.on( 'found_variation', { variationForm: $this }, onFoundVariation );
		});
	}

	$( window ).load( function() {
		fixVariationImg();
	} );

	function onResetImage( event ) {
		variationsImageUpdate( false, event.data.variationForm );

		if ( undefined === index ) {
			index = 0;
		}

		items[ index ] = {
			src: thumb.eq( index ).data( 'href')
		};
		zoom();
	}

	function onFoundVariation( event, variation ) {
		variationsImageUpdate( variation, event.data.variationForm );

		if ( undefined === index ) {
			index = 0;
		}

		items[ index ] = {
			src: variation.image_link
		};
		zoom();
	}

	function variationsImageUpdate( variation, $form ) {

		var $product       = $form.closest('.product'),
			$product_img   = $product.find( 'div.images .easyzoom img' ),
			$product_link  = $product.find( 'div.images .easyzoom a' );

		if ( variation && variation.image_src && variation.image_src.length > 1 ) {
			$product_img.wc_set_variation_attr( 'src', variation.image_src );
			$product_img.wc_set_variation_attr( 'title', variation.image_title );
			$product_img.wc_set_variation_attr( 'alt', variation.image_alt );
			$product_img.wc_set_variation_attr( 'srcset', variation.image_srcset );
			$product_img.wc_set_variation_attr( 'sizes', variation.image_sizes );
			$product_link.wc_set_variation_attr( 'href', variation.image_link );
			$product_link.wc_set_variation_attr( 'title', variation.image_caption );
		} else {
			$product_img.wc_reset_variation_attr( 'src' );
			$product_img.wc_reset_variation_attr( 'title' );
			$product_img.wc_reset_variation_attr( 'alt' );
			$product_img.wc_reset_variation_attr( 'srcset' );
			$product_img.wc_reset_variation_attr( 'sizes' );
			$product_link.wc_reset_variation_attr( 'href' );
			$product_link.wc_reset_variation_attr( 'title' );
		}
	}

});