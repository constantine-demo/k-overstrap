<?php
// ----------------------------------------------------------------
//                       COLORS SETTINGS
// ----------------------------------------------------------------
function settings_colors_customize_register( $wp_customize ) {

  global $default_styles;

  //text color body
  $wp_customize->add_setting( 'body_text_color' , array(
      'default'     => $default_styles['body_text_color'],
      'sanitize_callback' => 'sanitize_hex_color',
      'capability' => 'edit_theme_options',
      'transport'   => 'refresh',
  ) );
  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'body_text_color',
      array('label' => __('Main Text Color'),
      'section' => 'colors',
      'settings' => 'body_text_color')
    )
  );

  //colors primary
  $wp_customize->add_setting( 'primary_color' , array(
      'default'     => $default_styles['primary_color'],
      'sanitize_callback' => 'sanitize_hex_color',
      'capability' => 'edit_theme_options',
      'transport'   => 'refresh',
  ) );
  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'primary_color',
      array('label' => __('Primary Color'),
      'section' => 'colors',
      'settings' => 'primary_color')
    )
  );

  //colors primary button
  $wp_customize->add_setting( 'custom_p_button_colors' , array(
      'default'     => false,
      'capability' => 'edit_theme_options',
      'transport'   => 'refresh',
  ) );
  $wp_customize->add_control( 'custom_p_button_colors', array(
      'settings' => 'custom_p_button_colors',
      'label'    => __( 'Custom primary button options' ),
      'section'  => 'colors',
      'type'     => 'checkbox',
  ) );
  function is_custom_p_button_colors() { return get_theme_mod( 'custom_p_button_colors', false ); }

  $wp_customize->add_setting( 'primary_button_color' , array(
      'default'     => $default_styles['primary_button_color'],
      'sanitize_callback' => 'sanitize_hex_color',
      'capability' => 'edit_theme_options',
      'transport'   => 'refresh',
  ) );
  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'primary_button_color',
      array('label' => __('Primary Button Custom Color'),
      'description' => __('Affects primary button color and some other form elements'),
      'section' => 'colors',
      'active_callback' => 'is_custom_p_button_colors',
      'settings' => 'primary_button_color')
    )
  );
  $wp_customize->add_setting( 'primary_border_color' , array(
      'default'     => $default_styles['primary_border_color'],
      'sanitize_callback' => 'sanitize_hex_color',
      'capability' => 'edit_theme_options',
      'transport'   => 'refresh',
  ) );
  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'primary_border_color',
      array('label' => __('Primary Button Border'),
      'description' => __('Primary button border color'),
      'section' => 'colors',
      'active_callback' => 'is_custom_p_button_colors',
      'settings' => 'primary_border_color')
    )
  );

  $wp_customize->add_setting( 'primary_hover' , array(
      'default'     => $default_styles['primary_hover'],
      'sanitize_callback' => 'sanitize_hex_color',
      'capability' => 'edit_theme_options',
      'transport'   => 'refresh',
  ) );
  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'primary_hover',
      array('label' => __('Primary Button Hover'),
      'description' => __('Primary button hover color'),
      'section' => 'colors',
      'active_callback' => 'is_custom_p_button_colors',
      'settings' => 'primary_hover')
    )
  );

  $wp_customize->add_setting( 'primary_active' , array(
      'default'     => $default_styles['primary_active'],
      'sanitize_callback' => 'sanitize_hex_color',
      'capability' => 'edit_theme_options',
      'transport'   => 'refresh',
  ) );
  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'primary_active',
      array('label' => __('Primary button Active'),
      'description' => __('Primary button active color'),
      'section' => 'colors',
      'active_callback' => 'is_custom_p_button_colors',
      'settings' => 'primary_active')
    )
  );

  $wp_customize->add_setting( 'primary_contrast_text' , array(
      'default'     => $default_styles['primary_contrast_text'],
      'sanitize_callback' => 'sanitize_hex_color',
      'capability' => 'edit_theme_options',
      'transport'   => 'refresh',
  ) );
  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'primary_contrast_text',
      array('label' => __('Primary Contrast Text'),
      'description' => __('Primary button text color'),
      'section' => 'colors',
      'active_callback' => 'is_custom_p_button_colors',
      'settings' => 'primary_contrast_text')
    )
  );

  // colors secondary
  $wp_customize->add_setting( 'secondary_color' , array(
      'default'     => $default_styles['secondary_color'],
      'sanitize_callback' => 'sanitize_hex_color',
      'capability' => 'edit_theme_options',
      'transport'   => 'refresh',
  ) );
  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'secondary_color',
      array('label' => __('Secondary Color'),
      'section' => 'colors',
      'settings' => 'secondary_color')
    )
  );

  //colors primary button
  $wp_customize->add_setting( 'custom_s_button_colors' , array(
      'default'     => false,
      'capability' => 'edit_theme_options',
      'transport'   => 'refresh',
  ) );
  $wp_customize->add_control( 'custom_s_button_colors', array(
      'settings' => 'custom_s_button_colors',
      'label'    => __( 'Custom secondary button options' ),
      'section'  => 'colors',
      'type'     => 'checkbox',
  ) );
  function is_custom_s_button_colors() { return get_theme_mod( 'custom_s_button_colors', false ); }

  $wp_customize->add_setting( 'secondary_button_color' , array(
      'default'     => $default_styles['secondary_button_color'],
      'sanitize_callback' => 'sanitize_hex_color',
      'capability' => 'edit_theme_options',
      'transport'   => 'refresh',
  ) );
  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'secondary_button_color',
      array('label' => __('Secondary Button Custom Color'),
      'description' => __('Affects secondary button color and some other form elements'),
      'section' => 'colors',
      'active_callback' => 'is_custom_s_button_colors',
      'settings' => 'secondary_button_color')
    )
  );
  $wp_customize->add_setting( 'secondary_border_color' , array(
      'default'     => $default_styles['secondary_border_color'],
      'sanitize_callback' => 'sanitize_hex_color',
      'capability' => 'edit_theme_options',
      'transport'   => 'refresh',
  ) );
  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'secondary_border_color',
      array('label' => __('Primary Button Border'),
      'description' => __('Primary button border color'),
      'section' => 'colors',
      'active_callback' => 'is_custom_s_button_colors',
      'settings' => 'secondary_border_color')
    )
  );

  $wp_customize->add_setting( 'secondary_hover' , array(
      'default'     => $default_styles['secondary_hover'],
      'sanitize_callback' => 'sanitize_hex_color',
      'capability' => 'edit_theme_options',
      'transport'   => 'refresh',
  ) );
  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'secondary_hover',
      array('label' => __('Secondary Hover'),
      'description' => __('Secondary button hover color'),
      'section' => 'colors',
      'active_callback' => 'is_custom_s_button_colors',
      'settings' => 'secondary_hover')
    )
  );

  $wp_customize->add_setting( 'secondary_active' , array(
      'default'     => $default_styles['secondary_active'],
      'sanitize_callback' => 'sanitize_hex_color',
      'capability' => 'edit_theme_options',
      'transport'   => 'refresh',
  ) );
  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'secondary_active',
      array('label' => __('Secondary Active'),
      'description' => __('Secondary button active color'),
      'section' => 'colors',
      'active_callback' => 'is_custom_s_button_colors',
      'settings' => 'secondary_active')
    )
  );

  $wp_customize->add_setting( 'secondary_contrast_text' , array(
      'default'     => $default_styles['secondary_contrast_text'],
      'sanitize_callback' => 'sanitize_hex_color',
      'capability' => 'edit_theme_options',
      'transport'   => 'refresh',
  ) );
  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'secondary_contrast_text',
      array('label' => __('Secondary Contrast Text'),
      'description' => __('Secondary button text color'),
      'section' => 'colors',
      'active_callback' => 'is_custom_s_button_colors',
      'settings' => 'secondary_contrast_text')
    )
  );

    // link colors
    $wp_customize->add_setting( 'simple_link_color' , array(
        'default'     => $default_styles['simple_link_color'],
        'sanitize_callback' => 'sanitize_hex_color',
        'capability' => 'edit_theme_options',
        'transport'   => 'refresh',
    ) );
    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        'simple_link_color',
        array('label' => __('Link Color'),
        'section' => 'colors',
        'settings' => 'simple_link_color')
      )
    );

    $wp_customize->add_setting( 'simple_link_color_hover' , array(
        'default'     => $default_styles['simple_link_color_hover'],
        'sanitize_callback' => 'sanitize_hex_color',
        'capability' => 'edit_theme_options',
        'transport'   => 'refresh',
    ) );
    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        'simple_link_color_hover',
        array('label' => __('Link Hover Color'),
        'description' => __('Simple link hover color'),
        'section' => 'colors',
        'settings' => 'simple_link_color_hover')
      )
    );

    // border colors
    $wp_customize->add_setting( 'input_border_color' , array(
        'default'     => $default_styles['input_border_color'],
        'sanitize_callback' => 'sanitize_hex_color',
        'capability' => 'edit_theme_options',
        'transport'   => 'refresh',
    ) );
    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        'input_border_color',
        array('label' => __('Form Input Border Color'),
        'section' => 'colors',
        'settings' => 'input_border_color')
      )
    );

    //additional borders color
    $wp_customize->add_setting( 'custom_border_colors' , array(
        'default'     => false,
        'capability' => 'edit_theme_options',
        'transport'   => 'refresh',
    ) );
    $wp_customize->add_control( 'custom_border_colors', array(
        'settings' => 'custom_border_colors',
        'label'    => __( 'Custom input field border options' ),
        'section'  => 'colors',
        'type'     => 'checkbox',
    ) );
    function is_custom_border_colors() { return get_theme_mod( 'custom_border_colors', false ); }

    $wp_customize->add_setting( 'input_border_color_active' , array(
        'default'     => $default_styles['input_border_color_active'],
        'sanitize_callback' => 'sanitize_hex_color',
        'capability' => 'edit_theme_options',
        'transport'   => 'refresh',
    ) );
    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        'input_border_color_active',
        array('label' => __('Form Input Border Color Active'),
        'description' => __('Changes when input field is selected'),
        'section' => 'colors',
        'active_callback' => 'is_custom_border_colors',
        'settings' => 'input_border_color_active')
      )
    );

    $wp_customize->add_setting( 'input_bg_color' , array(
        'default'     => $default_styles['input_bg_color'],
        'sanitize_callback' => 'sanitize_hex_color',
        'capability' => 'edit_theme_options',
        'transport'   => 'refresh',
    ) );
    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        'input_bg_color',
        array('label' => __('Form Input Background Color'),
        'section' => 'colors',
        'active_callback' => 'is_custom_border_colors',
        'settings' => 'input_bg_color')
      )
    );

    $wp_customize->add_setting( 'input_text_color' , array(
        'default'     => $default_styles['input_text_color'],
        'sanitize_callback' => 'sanitize_hex_color',
        'capability' => 'edit_theme_options',
        'transport'   => 'refresh',
    ) );
    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        'input_text_color',
        array('label' => __('Form Input Text Color'),
        'section' => 'colors',
        'active_callback' => 'is_custom_border_colors',
        'settings' => 'input_text_color')
      )
    );

    $wp_customize->add_setting( 'various_element_border_color' , array(
        'default'     => $default_styles['various_element_border_color'],
        'sanitize_callback' => 'sanitize_hex_color',
        'capability' => 'edit_theme_options',
        'transport'   => 'refresh',
    ) );
    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        'various_element_border_color',
        array('label' => __('Boostrap various elements border color'),
        'section' => 'colors',
        'settings' => 'various_element_border_color')
      )
    );

    //alt background
    $wp_customize->add_setting( 'alt_background_color' , array(
        'default'     => $default_styles['alt_background_color'],
        'sanitize_callback' => 'sanitize_hex_color',
        'capability' => 'edit_theme_options',
        'transport'   => 'refresh',
    ) );
    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        'alt_background_color',
        array('label' => __('Alt Background Color'),
        'section' => 'colors',
        'settings' => 'alt_background_color')
      )
    );

    //additional colors
    $wp_customize->add_setting( 'custom_addition_colors' , array(
        'default'     => false,
        'capability' => 'edit_theme_options',
        'transport'   => 'refresh',
    ) );
    $wp_customize->add_control( 'custom_addition_colors', array(
        'settings' => 'custom_addition_colors',
        'label'    => __( 'Additional colors' ),
        'section'  => 'colors',
        'type'     => 'checkbox',
    ) );
    function is_custom_addition_colors() { return get_theme_mod( 'custom_addition_colors', false ); }

    //colors success
    $wp_customize->add_setting( 'success_color' , array(
        'default'     => $default_styles['success_color'],
        'sanitize_callback' => 'sanitize_hex_color',
        'capability' => 'edit_theme_options',
        'transport'   => 'refresh',
    ) );
    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        'success_color',
        array('label' => __('Success Color'),
        'section' => 'colors',
        'active_callback' => 'is_custom_addition_colors',
        'settings' => 'success_color')
      )
    );

    //colors info
    $wp_customize->add_setting( 'info_color' , array(
        'default'     => $default_styles['info_color'],
        'sanitize_callback' => 'sanitize_hex_color',
        'capability' => 'edit_theme_options',
        'transport'   => 'refresh',
    ) );
    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        'info_color',
        array('label' => __('Info Color'),
        'section' => 'colors',
        'active_callback' => 'is_custom_addition_colors',
        'settings' => 'info_color')
      )
    );

    //colors warning
    $wp_customize->add_setting( 'warning_color' , array(
        'default'     => $default_styles['warning_color'],
        'sanitize_callback' => 'sanitize_hex_color',
        'capability' => 'edit_theme_options',
        'transport'   => 'refresh',
    ) );
    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        'warning_color',
        array('label' => __('Warning Color'),
        'section' => 'colors',
        'active_callback' => 'is_custom_addition_colors',
        'settings' => 'warning_color')
      )
    );

    //colors danger
    $wp_customize->add_setting( 'danger_color' , array(
        'default'     => $default_styles['danger_color'],
        'sanitize_callback' => 'sanitize_hex_color',
        'capability' => 'edit_theme_options',
        'transport'   => 'refresh',
    ) );
    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        'danger_color',
        array('label' => __('Danger Color'),
        'section' => 'colors',
        'active_callback' => 'is_custom_addition_colors',
        'settings' => 'danger_color')
      )
    );

}
add_action( 'customize_register', 'settings_colors_customize_register' );

/* -------------------------------------------------------------------------- */
/*          This function adds some styles to the WordPress Customizer        */
/* -------------------------------------------------------------------------- */
function custom_colors_customizer_styles() {  ?>
	<style>
    li#customize-control-input_border_color, li#customize-control-alt_background_color,
    li#customize-control-primary_color, li#customize-control-simple_link_color,
    li#customize-control-custom_addition_colors {
      border-top: 1px solid lightgray;
      padding-top: 1.5rem;
      margin-top: 1.5rem;
    }
    li#customize-control-input_text_color,
    li#customize-control-input_border_color_active, li#customize-control-input_bg_color,
    li#customize-control-secondary_contrast_text, li#customize-control-secondary_active,
    li#customize-control-secondary_hover, li#customize-control-secondary_border_color,
    li#customize-control-secondary_button_color, li#customize-control-primary_contrast_text,
    li#customize-control-primary_hover, li#customize-control-primary_active,
    li#customize-control-primary_button_color, li#customize-control-primary_border_color,
    li#customize-control-success_color, li#customize-control-info_color,
    li#customize-control-warning_color, li#customize-control-danger_color {
      background-color: #f9f9f9;
      padding: 0.5rem;
      margin-bottom: 0;
      width: calc( 100% - 1rem );
    }
    li#customize-control-primary_color, li#customize-control-input_border_color {
      margin-bottom: 0.1rem;
    }
    li#customize-control-secondary_color {
      margin-top: 1rem;
      margin-bottom: 0.1rem;
    }

	</style>
	<?php
}
add_action( 'customize_controls_print_styles', 'custom_colors_customizer_styles', 999 );
