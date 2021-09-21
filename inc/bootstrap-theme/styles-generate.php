<?php
/*
 * Theme styles integration
 */
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


function generated_css_styles() {

  global $default_styles;

  /* get customizer values */
  $container = get_theme_mod( 'understrap_container_type' );

  $body_text_color = get_theme_mod( 'body_text_color', $default_styles['body_text_color'] );

  $simple_link_color = get_theme_mod( 'simple_link_color', $default_styles['simple_link_color'] );
  $simple_link_color_hover = get_theme_mod( 'simple_link_color_hover', $default_styles['simple_link_color_hover'] );

  $primary_color = get_theme_mod( 'primary_color', $default_styles['primary_color'] );
  /* additioal primary color button options */
  if ( get_theme_mod( 'custom_p_button_colors', false ) ) {
    $primary_hover = get_theme_mod( 'primary_hover', $default_styles['primary_hover'] );
    $primary_active = get_theme_mod( 'primary_active', $default_styles['primary_active'] );
    $primary_contrast_text = get_theme_mod( 'primary_contrast_text', $default_styles['primary_contrast_text'] );
    $primary_border_color = get_theme_mod( 'primary_border_color', $default_styles['primary_border_color'] );
    $primary_button_color = get_theme_mod( 'primary_button_color', $default_styles['primary_button_color'] );
  } else {
    $primary_hover = adjustBrightness($primary_color, -25);
    $primary_active = adjustBrightness($primary_color, -35);
    $primary_contrast_text = blackWhite($primary_color, 200);
    $primary_border_color = $primary_color;
    $primary_button_color = $primary_color;
  }
  $primary_color_lighter = adjustBrightness($primary_color, 35);
  $primary_color_darker = adjustBrightness($primary_color, -35);

  $secondary_color = get_theme_mod( 'secondary_color', $default_styles['secondary_color'] );
  /* additioal secondary color button options */
  if ( get_theme_mod( 'custom_s_button_colors', false ) ) {
    $secondary_hover = get_theme_mod( 'secondary_hover', $default_styles['secondary_hover'] );
    $secondary_active = get_theme_mod( 'secondary_active', $default_styles['secondary_active'] );
    $secondary_contrast_text = get_theme_mod( 'secondary_contrast_text', $default_styles['secondary_contrast_text'] );
    $secondary_border_color = get_theme_mod( 'secondary_border_color', $default_styles['secondary_border_color'] );
    $secondary_button_color = get_theme_mod( 'secondary_button_color', $default_styles['secondary_button_color'] );
  } else {
    $secondary_hover = adjustBrightness($secondary_color, -25);
    $secondary_active = adjustBrightness($secondary_color, -35);
    $secondary_contrast_text = blackWhite($secondary_color, 200);
    $secondary_border_color = $secondary_color;
    $secondary_button_color = $secondary_color;
  }
  $secondary_color_lighter = adjustBrightness($secondary_color, 35);
  $secondary_color_darker = adjustBrightness($secondary_color, -35);

  $main_border_radius = get_theme_mod( 'main_border_radius', '0.25rem' );
  $button_border_radius = get_theme_mod( 'button_border_radius', '0.25rem' );
  $input_border_radius = get_theme_mod( 'input_border_radius', '0.25rem' );
  $various_element_border_color = get_theme_mod( 'various_element_border_color', $default_styles['various_element_border_color'] );
  $input_border_color = get_theme_mod( 'input_border_color', $default_styles['input_border_color'] );
  /* additioal border color options */
  if ( get_theme_mod( 'custom_border_colors', false ) ) {
    $input_border_color_active = get_theme_mod( 'input_border_color_active', $default_styles['input_border_color_active'] );
    $input_bg_color = get_theme_mod( 'input_bg_color', $default_styles['input_bg_color'] );
    $input_text_color = get_theme_mod( 'input_text_color', $default_styles['input_text_color'] );
  } else {
    $input_border_color_active = adjustBrightness($input_border_color, -25);
    $input_bg_color = $default_styles['if_no_selected_input_bg_color'];
    $input_text_color = $default_styles['if_no_selected_input_text_color'];
  }

  $alt_background_color = get_theme_mod( 'alt_background_color', $default_styles['alt_background_color'] );

  /*success color & button color options */
  if ( get_theme_mod( 'custom_addition_colors', false ) ) {
    $success_color = get_theme_mod( 'success_color', $default_styles['success_color'] );
  } else {
    $success_color = $default_styles['success_color'];
  }
  $success_hover = adjustBrightness($success_color, -25);
  $success_active = adjustBrightness($success_color, -35);
  $success_contrast_text = blackWhite($success_color, 230);
  $success_border_color = $success_color;
  $success_button_color = $success_color;

  /* info color & button color options */
  if ( get_theme_mod( 'custom_addition_colors', false ) ) {
    $info_color = get_theme_mod( 'info_color', $default_styles['info_color'] );
  } else {
    $info_color = $default_styles['info_color'];
  }
  $info_hover = adjustBrightness($info_color, -25);
  $info_active = adjustBrightness($info_color, -35);
  $info_contrast_text = blackWhite($info_color, 230);
  $info_border_color = $info_color;
  $info_button_color = $info_color;

  /* warning color & button color options */
  if ( get_theme_mod( 'custom_addition_colors', false ) ) {
    $warning_color = get_theme_mod( 'warning_color', $default_styles['warning_color'] );
  } else {
    $warning_color = $default_styles['warning_color'];
  }
  $warning_hover = adjustBrightness($warning_color, -25);
  $warning_active = adjustBrightness($warning_color, -35);
  $warning_contrast_text = blackWhite($warning_color, 230);
  $warning_border_color = $warning_color;
  $warning_button_color = $warning_color;

  /* danger color & button color options */
  if ( get_theme_mod( 'custom_addition_colors', false ) ) {
    $danger_color = get_theme_mod( 'danger_color', $default_styles['danger_color'] );
  } else {
    $danger_color = $default_styles['danger_color'];
  }
  $danger_hover = adjustBrightness($danger_color, -25);
  $danger_active = adjustBrightness($danger_color, -35);
  $danger_contrast_text = blackWhite($danger_color, 230);
  $danger_border_color = $danger_color;
  $danger_button_color = $danger_color;


  /* --------------------------------------------- */
  /*       COMDITIONALLY ADDING STYLES PACKS       */
  /* --------------------------------------------- */

  require_once get_theme_file_path('inc/bootstrap-theme/styles-generate/main_styles.php');
  $output_styles = $main_styles;

  require_once get_theme_file_path('inc/bootstrap-theme/styles-generate/contact_form_7_styles.php');
  $output_styles .= $contact_form_7_styles;

  if ( class_exists( 'woocommerce' ) ) {
    require_once get_theme_file_path('inc/bootstrap-theme/styles-generate/woocommerce_styles.php');
    $output_styles .= $woocommerce_styles;
  }

  if ( get_theme_mod( 'custom_addition_colors', false ) ) {
    require_once get_theme_file_path('inc/bootstrap-theme/styles-generate/additional_color_styles.php');
    $output_styles .= $additional_color_styles;
  }

  return $output_styles;

}
