<?php
function custom_postypes_customize_register($wp_customize) {

  /* Section for posttypes
  -----------------------------------*/
  $wp_customize->add_section( 'custom_posttype' , array(
      'title'      => __( 'Custom post types' ),
      'priority'   => 120,
  ) );


  /* Services CPT setting
  -----------------------------------*/
  $wp_customize->add_setting( 'services_posttype_active' , array(
      'default'     => false,
      'capability' => 'edit_theme_options',
      'transport'   => 'refresh',
  ) );
  $wp_customize->add_control( 'services_posttype_active', array(
      'settings' => 'services_posttype_active',
      'label'    => __( 'Services custom post type enable' ),
      'section'  => 'custom_posttype',
      'type'     => 'checkbox',
  ) );
  function is_services_posttype_active() { return get_theme_mod( 'services_posttype_active' ); }
  $wp_customize->add_setting('services_all_page_id', [
    	'default'     => 0,
      'capability' => 'edit_theme_options',
    	//'sanitize_callback'=>'',
    	'transport'   => 'refresh',
	]);
  $wp_customize->add_control( 'services_all_page',[
  		'type'            => 'dropdown-pages',
  		'label'           => 'Services page',
  		'section'         => 'custom_posttype',
  		//'choices'       => $all_pages_array,
  		'settings'        => 'services_all_page_id',
      'active_callback' => 'is_services_posttype_active',
  		'allow_addition'  => true,
	]);


  /* Portfolio CPT setting
  ------------------------------------*/
  $wp_customize->add_setting( 'portfolio_posttype_active' , array(
      'default'     => false,
      'capability'  => 'edit_theme_options',
      'transport'   => 'refresh',
  ) );
  $wp_customize->add_control( 'portfolio_posttype_active', array(
      'settings' => 'portfolio_posttype_active',
      'label'    => __( 'Portfolio custom post type enable' ),
      'section'  => 'custom_posttype',
      'type'     => 'checkbox',
  ) );
  function is_portfolio_posttype_active() { return get_theme_mod( 'portfolio_posttype_active' ); }
  $wp_customize->add_setting('portfolio_all_page_id', [
    	'default'     => 0,
      'capability' => 'edit_theme_options',
    	//'sanitize_callback'=>'',
    	'transport'   => 'refresh',
	]);
  $wp_customize->add_control( 'portfolio_all_page_id',[
  		'type'            => 'dropdown-pages',
  		'label'           => 'Portfolio page',
  		'section'         => 'custom_posttype',
  		//'choices'       => $all_pages_array,
  		'settings'        => 'portfolio_all_page_id',
      'active_callback' => 'is_portfolio_posttype_active',
  		'allow_addition'  => true,
	]);


  /* Team CPT setting
  ------------------------------------*/
  $wp_customize->add_setting( 'team_posttype_active' , array(
      'default'     => false,
      'capability'  => 'edit_theme_options',
      'transport'   => 'refresh',
  ) );
  $wp_customize->add_control( 'team_posttype_active', array(
      'settings' => 'team_posttype_active',
      'label'    => __( 'Team custom post type enable' ),
      'section'  => 'custom_posttype',
      'type'     => 'checkbox',
  ) );
  function is_team_posttype_active() { return get_theme_mod( 'team_posttype_active' ); }
  $wp_customize->add_setting('team_all_page_id', [
      'default'     => 0,
      'capability' => 'edit_theme_options',
      //'sanitize_callback'=>'',
      'transport'   => 'refresh',
  ]);
  $wp_customize->add_control( 'team_all_page_id',[
      'type'            => 'dropdown-pages',
      'label'           => 'Team page',
      'section'         => 'custom_posttype',
      //'choices'       => $all_pages_array,
      'settings'        => 'team_all_page_id',
      'active_callback' => 'is_team_posttype_active',
      'allow_addition'  => true,
  ]);

  /* Catalog CPT setting
  ------------------------------------*/
  $wp_customize->add_setting( 'catalog_posttype_active' , array(
      'default'     => false,
      'capability'  => 'edit_theme_options',
      'transport'   => 'refresh',
  ) );
  $wp_customize->add_control( 'catalog_posttype_active', array(
      'settings' => 'catalog_posttype_active',
      'label'    => __( 'Catalog custom post type enable' ),
      'section'  => 'custom_posttype',
      'type'     => 'checkbox',
  ) );
  function is_catalog_posttype_active() { return get_theme_mod( 'catalog_posttype_active' ); }
  $wp_customize->add_setting('catalog_all_page_id', [
      'default'     => 0,
      'capability' => 'edit_theme_options',
      //'sanitize_callback'=>'',
      'transport'   => 'refresh',
  ]);
  $wp_customize->add_control( 'catalog_all_page_id',[
      'type'            => 'dropdown-pages',
      'label'           => 'Catalog page',
      'section'         => 'custom_posttype',
      //'choices'       => $all_pages_array,
      'settings'        => 'catalog_all_page_id',
      'active_callback' => 'is_catalog_posttype_active',
      'allow_addition'  => true,
  ]);

  /* Countries CPT setting
  ------------------------------------*/
  $wp_customize->add_setting( 'countries_posttype_active' , array(
      'default'     => false,
      'capability'  => 'edit_theme_options',
      'transport'   => 'refresh',
  ) );
  $wp_customize->add_control( 'countries_posttype_active', array(
      'settings' => 'countries_posttype_active',
      'label'    => __( 'Countries custom post type enable' ),
      'section'  => 'custom_posttype',
      'type'     => 'checkbox',
  ) );
  function is_countries_posttype_active() { return get_theme_mod( 'countries_posttype_active' ); }
  $wp_customize->add_setting('countries_all_page_id', [
      'default'     => 0,
      'capability' => 'edit_theme_options',
      //'sanitize_callback'=>'',
      'transport'   => 'refresh',
  ]);
  $wp_customize->add_control( 'countries_all_page_id',[
      'type'            => 'dropdown-pages',
      'label'           => 'Countries page',
      'section'         => 'custom_posttype',
      //'choices'       => $all_pages_array,
      'settings'        => 'countries_all_page_id',
      'active_callback' => 'is_countries_posttype_active',
      'allow_addition'  => true,
  ]);

}
add_action( 'customize_register', 'custom_postypes_customize_register' );
