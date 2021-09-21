<?php
add_action( 'customize_register', function($wp_customize){
	// add custom controls to homepage section
  $wp_customize->add_setting( 'custom_homepage_template_active' , array(
      'default'     => false,
      'capability' => 'edit_theme_options',
      'transport'   => 'refresh',
  ) );
  $wp_customize->add_control( 'custom_homepage_template_active', array(
      'settings' => 'custom_homepage_template_active',
      'label'    => __( 'Use custom homepage template', 'landing' ),
      'section'  => 'static_front_page',
      'type'     => 'checkbox',
  ) );
});

// set template for custom homepage and all events page by id
add_filter ('page_template', 'landing_redirect_page_template');
function landing_redirect_page_template($template) {
  $file_path = get_stylesheet_directory() . '/custom-front-page.php';
	if (
      file_exists( $file_path ) &&
      true == get_theme_mod('custom_homepage_template_active') &&
      'page' == get_option('show_on_front') &&
      get_the_ID() == get_option('page_on_front')
    ) {
		 $template = $file_path;
	};
	return $template;
};

//Page disable
add_filter('use_block_editor_for_post_type', 'check_if_is_homepagepage',10,2);
function check_if_is_homepagepage( $can_edit, $post ) {
  if (
      true == get_theme_mod('custom_homepage_template_active') &&
      'page' == get_option('show_on_front') &&
      get_the_ID() == get_option('page_on_front')
    ) {
		remove_post_type_support('page', 'editor');
		return false;
	};
	return true;
}

// Adding new custm rule to ACF plugin if exists
if ( function_exists('get_field') ) {
  add_filter('acf/location/rule_values/page_type', 'acf_location_rule_values_user');
  function acf_location_rule_values_user( $choices ) {
  	$choices['custom_front_page'] = "Custom Front Page (option in customizer)";
    return $choices;
  }
	add_filter('acf/location/rule_match/page_type', 'acf_location_rule_match_page_type', 10, 4);
	function acf_location_rule_match_page_type( $match, $rule, $options, $field_group ) {
	  if($rule['operator'] == "==") {
	  	$test_this = (
				'custom_front_page' == $rule['value'] &&
				'page' == get_option('show_on_front') &&
				true == get_theme_mod('custom_homepage_template_active') &&
				get_the_ID() == get_option('page_on_front')
			);
      if ( $test_this ) return $test_this;
	  }
	  return $match;
	}
}
