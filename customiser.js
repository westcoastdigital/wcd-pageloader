(function($) {
    $(function() {
      
	/**
	 * Run function when customizer is ready.
	 */
	wp.customize.bind('ready', function () {
		wp.customize.control('wcd_pageloader_content', function (control) {
			/**
			 * Run function on setting change of control.
			 */
			var $content = $( '#customize-control-wcd_pageloader_content select' ).val();

			if( $content == 'image' ) {
				$( 'li#customize-control-wcd_pageloader_custom_text' ).hide();
				$( 'li#customize-control-wcd_pageloader_font_size').hide();
				$( 'li#customize-control-wcd_pageloader_font').hide();
				$( 'li#customize-control-wcd_pageloader_custom_image').show();
			} else if( $content == 'site_title' ) {
				$( 'li#customize-control-wcd_pageloader_custom_text' ).hide();
				$( 'li#customize-control-wcd_pageloader_font_size').show();
				$( 'li#customize-control-wcd_pageloader_font').show();
				$( 'li#customize-control-wcd_pageloader_custom_image').hide();
			} else if( $content == 'text' ) {
				$( 'li#customize-control-wcd_pageloader_custom_text' ).show();
				$( 'li#customize-control-wcd_pageloader_font_size').show();
				$( 'li#customize-control-wcd_pageloader_font').show();
				$( 'li#customize-control-wcd_pageloader_custom_image').hide();
			} else if( $content == 'logo' ) {
				$( 'li#customize-control-wcd_pageloader_custom_text' ).hide();
				$( 'li#customize-control-wcd_pageloader_font_size').hide();
				$( 'li#customize-control-wcd_pageloader_font').hide();
				$( 'li#customize-control-wcd_pageloader_custom_image').hide();
			} else {
				$( 'li#customize-control-wcd_pageloader_custom_text' ).show();
				$( 'li#customize-control-wcd_pageloader_font_size').show();
				$( 'li#customize-control-wcd_pageloader_font').show();
				$( 'li#customize-control-wcd_pageloader_custom_image').show();
			}

			$( '#customize-control-wcd_pageloader_content select' ).change(function() {

				var $content = $( '#customize-control-wcd_pageloader_content select' ).val();

				if( $content == 'image' ) {
					$( 'li#customize-control-wcd_pageloader_custom_text' ).hide();
					$( 'li#customize-control-wcd_pageloader_font_size').hide();
					$( 'li#customize-control-wcd_pageloader_font').hide();
					$( 'li#customize-control-wcd_pageloader_custom_image').show();
				} else if( $content == 'site_title' ) {
					$( 'li#customize-control-wcd_pageloader_custom_text' ).hide();
					$( 'li#customize-control-wcd_pageloader_font_size').show();
					$( 'li#customize-control-wcd_pageloader_font').show();
					$( 'li#customize-control-wcd_pageloader_custom_image').hide();
				} else if( $content == 'text' ) {
					$( 'li#customize-control-wcd_pageloader_custom_text' ).show();
					$( 'li#customize-control-wcd_pageloader_font_size').show();
					$( 'li#customize-control-wcd_pageloader_font').show();
					$( 'li#customize-control-wcd_pageloader_custom_image').hide();
				} else if( $content == 'logo' ) {
					$( 'li#customize-control-wcd_pageloader_custom_text' ).hide();
					$( 'li#customize-control-wcd_pageloader_font_size').hide();
					$( 'li#customize-control-wcd_pageloader_font').hide();
					$( 'li#customize-control-wcd_pageloader_custom_image').hide();
				} else {
					$( 'li#customize-control-wcd_pageloader_custom_text' ).show();
					$( 'li#customize-control-wcd_pageloader_font_size').show();
					$( 'li#customize-control-wcd_pageloader_font').show();
					$( 'li#customize-control-wcd_pageloader_custom_image').show();
				}

			});

		});
	});

    });
  })(jQuery);