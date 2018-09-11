(function ($) {
	$.fn.stickUp = function (options) {
		var getOptions = {
			correctionSelector: '.correctionSelector',
			listenSelector: '.listenSelector',
			active: false,
			pseudo: true
		};

		// var content = document.querySelector( '#sidebar' );
		//console.log(content.classList.contains('.home_page__vertical_menu'));

		// if (document.querySelector('#sidebar') == true) {
		// 	console.log(document.querySelector('#sidebar');
		// };
// console.log(document.querySelector('#sidebar') == true );
		if ( document.querySelector( '#sidebar #vertical_menu' ) ) {
			var verticalMenuWrapBlock = document.querySelector( '#vertical_menu' );
		}


		$.extend( getOptions, options );

		var _this = $( this ),
			_window = $( window ),
			_document = $( document ),
			thisOffsetTop = 0,
			thisOuterHeight = 0,
			thisMarginTop = 0,
			documentScroll = 0,
			pseudoBlock,
			lastScrollValue = 0,
			scrollDir = '',
			tmpScrolled,
			correctionSelector = $( getOptions.correctionSelector ),
			listenSelector = $( getOptions.listenSelector );

		if ( _this.length != 0 ) {
			init();
		}

		function init() {
			thisOffsetTop = parseInt( _this.offset().top );
			thisMarginTop = parseInt( _this.css( "margin-top" ) );
			thisOuterHeight = parseInt( _this.outerHeight( true ) );
			verticalMenuHeight = parseInt($('#vertical_menu').outerHeight( true ) );

			if ( getOptions.pseudo ) {
				$( '<div class="pseudoStickyBlock"></div>' ).insertAfter( _this );
				pseudoBlock = $( '.pseudoStickyBlock' );
				pseudoBlock.css( { "position": "relative", "display": "block" } );
			}

			if ( getOptions.active ) {
				addEventsFunction();
			}

			_this.addClass( 'stuckMenu' );
		}

		function addEventsFunction() {
			_document.on( 'scroll.stickUp', function () {
				tmpScrolled = $( this ).scrollTop();

				if ( tmpScrolled > lastScrollValue ) {
					scrollDir = 'down';
				} else {
					scrollDir = 'up';
				}

				lastScrollValue = tmpScrolled;

				if ( correctionSelector.length != 0 ) {
					correctionValue = correctionSelector.outerHeight( true );
				} else {
					correctionValue = 0;
				}

				documentScroll = parseInt( _window.scrollTop() );

				// if ( thisOffsetTop + thisOuterHeight - correctionValue < documentScroll ) {
				if ( thisOffsetTop + thisOuterHeight < documentScroll ) {
					_this.addClass( 'isStuck' );
					listenSelector.addClass( 'isStuck' );

					if ( document.querySelector( '#sidebar #vertical_menu' ) ) {
						verticalMenuWrapBlock.classList.remove( 'home_page__vertical_menu' );
					}
					if ( getOptions.pseudo ) {
						_this.css( { position: "fixed", top: correctionValue } );
						// pseudoBlock.css( { "height": thisOuterHeight } );
						pseudoBlock.css( { "height": verticalMenuHeight + correctionValue } );
					} else {
						_this.css( { position: "fixed", top: correctionValue } );
					}
				} else {
					_this.removeClass( 'isStuck' );
					listenSelector.removeClass( 'isStuck' );

					if ( document.querySelector( '#sidebar #vertical_menu' ) ) {
						verticalMenuWrapBlock.classList.add( 'home_page__vertical_menu' );
					}

					if ( getOptions.pseudo ) {
						_this.css( { position: "relative", top: 0 } );
						pseudoBlock.css( { "height": 0 } );
					} else {
						_this.css( { position: "absolute", top: 0 } );
					}
				}
			} ).trigger( 'scroll.stickUp' );

			_document.on( "resize", function () {
				if ( _this.hasClass( 'isStuck' ) ) {
					if ( thisOffsetTop != parseInt( pseudoBlock.offset().top ) ) thisOffsetTop = parseInt( pseudoBlock.offset().top );
				} else {
					if ( thisOffsetTop != parseInt( _this.offset().top ) ) thisOffsetTop = parseInt( _this.offset().top );
				}
			} )
		}
	}
})( jQuery );