/**
 * Custom JavaScript functions for the customizer controls.
 */
;
wp.customize.bind('ready', function () {
// begin file

var custom_posttypes_array = [ 'services', 'portfolio', 'team', 'catalog', 'countries' ];


/* check unique for homepage and page for post_states
----------------------------------------------------------------*/
custom_posttypes_array.forEach( function( cur_name, no, array ) {

	// settings change service
	wp.customize( cur_name+'_all_page_id', function( setting ) {
		setting.bind( function( value, index ) {

			// check main page
			var code = 'same_as_main';
			var msg_home = 'This page is already used as homepage.';
			if ( value != "0" && value == wp.customize.value('page_on_front')() && wp.customize.value('show_on_front')() == 'page' ) {
				setting.notifications.add( code, new wp.customize.Notification( code, { type: 'error', message:  msg_home } ) );
			} else {
				setting.notifications.remove( code );
			}

			// check posts page
			var code = 'same_as_posts';
			var msg_posts = 'This page is already used as page for posts1.';
			if ( value != "0" && value == wp.customize.value('page_for_posts')() && wp.customize.value('show_on_front')() == 'page' ) {
				setting.notifications.add( code, new wp.customize.Notification( code, { type: 'error', message:  msg_posts } ) );
				alert(wp.customize.value('page_for_posts'));
			} else {
				setting.notifications.remove( code );
			}

		} );
	} );
} );


/* check unique for custom post type pages
----------------------------------------------------------------*/
function clear_all_cpt_error( err_code ) {
	custom_posttypes_array.forEach( function( del_name, no, array ) {
		wp.customize( del_name+'_all_page_id', function( del_setting ) {
			del_setting.notifications.remove( err_code )
		} );
	} );
}

custom_posttypes_array.forEach( function( cur_name, no, array ) {

	// settings change service
	wp.customize( cur_name+'_all_page_id', function( setting ) {
		setting.bind( function( value, index ) {
			clear_all_cpt_error( 'dupplicate_cpt' );

			// check other CPT pages
			custom_posttypes_array.forEach( function( other_value_name ) {
				var other_value_id = wp.customize.value(other_value_name+'_all_page_id')();
				var other_value_allow = wp.customize.value(other_value_name+'_posttype_active')();
				var code = 'dupplicate_cpt';
				var msg_cpt = 'This page is already used in custom post type: "'+other_value_name+'", the latest value overwrites previous';
				console.log ( "code: "+code );
				if ( value != "0" && cur_name!=other_value_name && true == other_value_allow && value == other_value_id ) {
					setting.notifications.add( code, new wp.customize.Notification( code, { type: 'warning', message:  msg_cpt } ) );
				}
			} );

		} );
	} );

} );


// end file
});
