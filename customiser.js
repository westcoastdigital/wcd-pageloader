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
			control.setting.bind(function (value) {
				switch (value) {
					/**
					 * Logo
					 */
					case 'logo':
						wp.customize.control('wcd_pageloader_font').deactivate();
						wp.customize.control('wcd_pageloader_custom_text').deactivate();
						wp.customize.control('wcd_pageloader_custom_image').deactivate();
                        break;
                        
					/**
					 * Site Title
					 */
					case 'site_title':
                            wp.customize.control('wcd_pageloader_custom_image').deactivate();
                            wp.customize.control('wcd_pageloader_custom_text').deactivate();
						wp.customize.control('wcd_pageloader_font').activate();
                        break;
                        
					/**
					 * Image
					 */
					case 'image':
                        wp.customize.control('wcd_pageloader_font').deactivate();
						wp.customize.control('wcd_pageloader_custom_text').deactivate();
						wp.customize.control('wcd_pageloader_custom_image').activate();
                        break;
                        
					/**
					 * Custom Text
					 */
					case 'text':
                            wp.customize.control('wcd_pageloader_custom_image').deactivate();
                            wp.customize.control('wcd_pageloader_custom_text').activate();
                        wp.customize.control('wcd_pageloader_font').activate();
                        break;
                        
				}
			});
		});
	});

    });
  })(jQuery);