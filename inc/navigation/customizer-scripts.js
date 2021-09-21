/**
 * Custom JavaScript functions for the customizer controls.
 */


( function( $ ) {

	// Update the site title in real time...
	wp.customize( 'content_above_navbar', function( value ) {
		value.bind( function( newval ) {
			$( 'body' ).css( {
			//"background-color": 'red'
			});
			if (newval=="") {
				$( '.header-wrapper.wrapper-2columns' ).addClass('justify-content-center');
				$( '.header-wrapper.wrapper-2columns' ).removeClass('justify-content-between');		
			} else {
				$( '.header-wrapper.wrapper-2columns' ).addClass('justify-content-between');
				$( '.header-wrapper.wrapper-2columns' ).removeClass('justify-content-center'); 	
			}
			//console.log("newval:"+newval);
		});
	});
	
	// Update the site title in real time...
	wp.customize( 'content_after_footer', function( value ) {
		if ( wp.customize('content_after_footer').get()=="" ) $( '.content-after-footer-custom' ).addClass('customizer-icon-upper');
		value.bind( function( newval ) {
			if (newval=="") { $( '.content-after-footer-custom' ).addClass('customizer-icon-upper'); } 
			else { $( '.content-after-footer-custom' ).removeClass('customizer-icon-upper'); }
		});
	});
	
	// Update the site title in real time...
	wp.customize( 'copyright_footer', function( value ) {
		if ( wp.customize('copyright_footer').get()=="" ) $( '.copyright-footer-custom' ).addClass('customizer-icon-upper');
		value.bind( function( newval ) {
			if (newval=="") { $( '.copyright-footer-custom' ).addClass('customizer-icon-upper'); } 
			else { $( '.copyright-footer-custom' ).removeClass('customizer-icon-upper'); }
		});
	});
	
})(jQuery);