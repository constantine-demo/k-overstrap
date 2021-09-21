<?php
// ----------------------------------------------------------------
//                       APPEARENCE SETTINGS
// ----------------------------------------------------------------
function apearence_otions_customize_register( $wp_customize ) {

  $wp_customize->add_section( 'appearence' , array(
    'title'      => __( 'Appearence' ),
    'priority'   => 40,
  ) );

  $wp_customize->add_setting( 'button_border_radius' , array(
    'default'     => '0.25rem',
    //'sanitize_callback' => '',
    'capability' => 'edit_theme_options',
    'transport'   => 'refresh',
  ) );
  $wp_customize->add_control( 'button_border_radius', array(
   'type'       => 'text',
   'label'      => __( 'Buttons Border Radius' ),
   'description' => __('Use css value style with px rem or %'),
   'section'    => 'appearence',
   'settings'   => 'button_border_radius',
 ) );

  $wp_customize->add_setting( 'input_border_radius' , array(
    'default'     => '0.25rem',
    //'sanitize_callback' => '',
    'capability' => 'edit_theme_options',
    'transport'   => 'refresh',
  ) );
  $wp_customize->add_control( 'input_border_radius', array(
    'type'       => 'text',
  	'label'      => __( 'Input Field Border Radius' ),
    'description' => __('Use css value style with px rem or %'),
  	'section'    => 'appearence',
  	'settings'   => 'input_border_radius',
 ) );

 $wp_customize->add_setting( 'main_border_radius' , array(
   'default'     => '0.25rem',
   //'sanitize_callback' => '',
   'capability' => 'edit_theme_options',
   'transport'   => 'refresh',
 ) );
  $wp_customize->add_control( 'main_border_radius', array(
  'type'       => 'text',
  'label'      => __( 'Main Border Radius' ),
  'description' => __('Use css value style with px rem or %'),
  'section'    => 'appearence',
  'settings'   => 'main_border_radius',
  ) );


}
add_action( 'customize_register', 'apearence_otions_customize_register' );
