<?php

/* ------------------------------------------------------ */
/*    adding selected colors to block editor palette      */
/* ------------------------------------------------------ */
function mytheme_setup_theme_supported_features() {
  global $default_styles;
  add_theme_support( 'editor-color-palette', array(
    array(
        'name' => __( 'Theme text color', 'themeLangDomain' ),
        'slug' => 'theme-text',
        'color' => get_theme_mod( 'body_text_color', $default_styles['body_text_color'] ),
    ),
    array(
        'name' => __( 'White', 'themeLangDomain' ),
        'slug' => 'white',
        'color' => '#ffffff',
    ),
    array(
        'name' => __( 'Primary Color', 'themeLangDomain' ),
        'slug' => 'primary',
        'color' => get_theme_mod( 'primary_color', $default_styles['primary_color'] ),
    ),
    array(
        'name' => __( 'Secondary Color', 'themeLangDomain' ),
        'slug' => 'secondary',
        'color' => get_theme_mod( 'secondary_color', $default_styles['secondary_color'] ),
    ),
    array(
        'name' => __( 'Border Color', 'themeLangDomain' ),
        'slug' => 'border-input',
        'color' => get_theme_mod( 'input_border_color', $default_styles['input_border_color'] ),
    ),
    array(
        'name' => __( 'Success Color', 'themeLangDomain' ),
        'slug' => 'success',
        'color' => get_theme_mod( 'success_color', $default_styles['success_color'] ),
    ),
    array(
        'name' => __( 'Info Color', 'themeLangDomain' ),
        'slug' => 'info',
        'color' => get_theme_mod( 'info_color', $default_styles['info_color'] ),
    ),
    array(
        'name' => __( 'Warning Color', 'themeLangDomain' ),
        'slug' => 'warning',
        'color' => get_theme_mod( 'warning_color', $default_styles['warning_color'] ),
    ),
    array(
        'name' => __( 'Danger Color', 'themeLangDomain' ),
        'slug' => 'danger',
        'color' => get_theme_mod( 'danger_color', $default_styles['danger_color'] ),
    ),
    array(
        'name' => __( 'Alt Background Color', 'themeLangDomain' ),
        'slug' => 'alt-background',
        'color' => get_theme_mod( 'alt_background_color', $default_styles['alt_background_color'] ),
    ),
  ) );
}
add_action( 'after_setup_theme', 'mytheme_setup_theme_supported_features' );
