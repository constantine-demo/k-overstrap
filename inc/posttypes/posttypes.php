<?php

require_once get_theme_file_path('inc/posttypes/customizer-posttypes.php');
require_once get_theme_file_path('inc/posttypes/posttypes-primary-register.php');
add_action( 'customize_controls_enqueue_scripts', function(){
	wp_enqueue_script( 'customizer-posttypes-js', get_theme_file_uri('inc/posttypes/customizer-posttypes-check.js'), [], null, true);
});


/* ---------------------------------------------- */
/*                   ADDING CPT                   */
/* ---------------------------------------------- */
function post_type_activate() {
  if ( get_theme_mod( 'services_posttype_active' ) ) { services_post_type_generate(); }
  if ( get_theme_mod( 'portfolio_posttype_active' ) ) { portfolio_post_type_generate(); }
  if ( get_theme_mod( 'team_posttype_active' ) ) { team_post_type_generate(); }
	if ( get_theme_mod( 'catalog_posttype_active' ) ) { catalog_post_type_generate(); }
	if ( get_theme_mod( 'countries_posttype_active' ) ) { countries_post_type_generate(); }
}
add_action( 'init', 'post_type_activate', 0 );


/* Page disable for portfolio and services
----------------------------------------------------------- */
// adds text after header
function render_warning_after_title( $text ) {
  add_action( 'edit_form_after_title', function() use ($text) {
    echo '<div class="notice notice-warning inline">';
    echo '<p>'.__( $text,'text-domain' ).'</p>';
    echo '</div>';
  });
}

function check_if_page( $can_edit, $post ){
	// filter
	if ( $post->post_type == 'page' ) {
		if( 0 != get_theme_mod( 'services_all_page_id' ) && get_theme_mod( 'services_posttype_active' ) && get_the_ID() == get_theme_mod( 'services_all_page_id' )  ) {
			remove_post_type_support( 'page', 'editor' );		// removes editor field
	    render_warning_after_title( 'This page displays all services' );
			return false;}
		if( 0 != get_theme_mod( 'portfolio_posttype_active' ) && get_theme_mod( 'portfolio_posttype_active' ) and get_the_ID() == get_theme_mod( 'portfolio_all_page_id' ) ) {
			remove_post_type_support( 'page', 'editor' );		// removes editor field
			render_warning_after_title( 'This page displays all portfolio' );
			return false;}
		if( 0 != get_theme_mod( 'team_posttype_active' ) && get_theme_mod( 'team_posttype_active' ) and get_the_ID() == get_theme_mod( 'team_all_page_id' ) ) {
			remove_post_type_support( 'page', 'editor' );		// removes editor field
			render_warning_after_title( 'This page displays all team members' );
			return false;}
		if( 0 != get_theme_mod( 'countries_posttype_active' ) && get_theme_mod( 'countries_posttype_active' ) and get_the_ID() == get_theme_mod( 'countries_all_page_id' ) ) {
			remove_post_type_support( 'page', 'editor' );		// removes editor field
			render_warning_after_title( 'This page displays all countries' );
			return false;}
		if( 0 != get_theme_mod( 'catalog_posttype_active' ) && get_theme_mod( 'catalog_posttype_active' ) and get_the_ID() == get_theme_mod( 'catalog_all_page_id' ) ) {
			remove_post_type_support( 'page', 'editor' );		// removes editor field
			render_warning_after_title( 'This page displays catalog items' );
			return false;}
	}
	return $can_edit;
}
add_filter('use_block_editor_for_post', 'check_if_page',10,2);

/* Pages states change for cpt
---------------------------------------------------------- */

function ecs_add_post_state( $post_states, $post ) {
  if(  get_theme_mod( 'services_posttype_active' ) && get_the_ID() == get_theme_mod( 'services_all_page_id' )  ) {
    $post_states[] = 'This page displays all services';
  }
	if( get_theme_mod( 'portfolio_posttype_active' ) and get_the_ID() == get_theme_mod( 'portfolio_all_page_id' ) ) {
		$post_states[] = 'This page displays all portfolio';
	}
	if( get_theme_mod( 'team_posttype_active' ) and get_the_ID() == get_theme_mod( 'team_all_page_id' ) ) {
		$post_states[] = 'This page displays all team members';
	}
	if( get_theme_mod( 'countries_posttype_active' ) and get_the_ID() == get_theme_mod( 'countries_all_page_id' ) ) {
		$post_states[] = 'All countries page';
	}
	if( get_theme_mod( 'catalog_posttype_active' ) and get_the_ID() == get_theme_mod( 'catalog_all_page_id' ) ) {
		$post_states[] = 'This page dispalys all catalog items';
	}
	return $post_states;
}
add_filter( 'display_post_states', 'ecs_add_post_state', 10, 2 );




/* Adding new custm rule to ACF plugin if exists
---------------------------------------------------------- */

if ( function_exists('get_field') ) {
  add_filter('acf/location/rule_values/page_type', 'acf_location_rule_values_cpt');
  function acf_location_rule_values_cpt( $choices ) {
  	$choices['custom_services_post_type_archive'] = "Posttype Services Archives Page (option in customizer)";
		$choices['custom_portfolio_post_type_archive'] = "Posttype Portfolio Archives Page (option in customizer)";
		$choices['custom_team_post_type_archive'] = "Posttype Team Archives Page (option in customizer)";
		$choices['custom_catalog_post_type_archive'] = "Posttype Catalog Archives Page (option in customizer)";
		$choices['custom_countries_post_type_archive'] = "Posttype Countries Archives Page (option in customizer)";
    return $choices;
  }
	add_filter('acf/location/rule_match/page_type', 'acf_location_rule_match_page_type_cpt', 9, 4);
	function acf_location_rule_match_page_type_cpt( $match, $rule, $options, $field_group ) {
		if($rule['operator'] == "==") {
	  	$test_this = (
				'custom_services_post_type_archive' == $rule['value'] &&
				true == get_theme_mod('services_posttype_active') &&
				get_the_ID() == get_theme_mod('services_all_page_id')
			);
			if ( $test_this ) return $test_this;
	  }
		if($rule['operator'] == "==") {
	  	$test_this = (
				'custom_portfolio_post_type_archive' == $rule['value'] &&
				true == get_theme_mod('portfolio_posttype_active') &&
				get_the_ID() == get_theme_mod('portfolio_all_page_id')
			);
			if ( $test_this ) return $test_this;
	  }
		if($rule['operator'] == "==") {
	  	$test_this = (
				'custom_team_post_type_archive' == $rule['value'] &&
				true == get_theme_mod('team_posttype_active') &&
				get_the_ID() == get_theme_mod('team_all_page_id')
			);
			if ( $test_this ) return $test_this;
	  }
		if($rule['operator'] == "==") {
	  	$test_this = (
				'custom_catalog_post_type_archive' == $rule['value'] &&
				true == get_theme_mod('catalog_posttype_active') &&
				get_the_ID() == get_theme_mod('catalog_all_page_id')
			);
			if ( $test_this ) return $test_this;
	  }
		if($rule['operator'] == "==") {
	  	$test_this = (
				'custom_countries_post_type_archive' == $rule['value'] &&
				true == get_theme_mod('countries_posttype_active') &&
				get_the_ID() == get_theme_mod('countries_all_page_id')
			);
			if ( $test_this ) return $test_this;
	  }
	  return $match;
	}
}
