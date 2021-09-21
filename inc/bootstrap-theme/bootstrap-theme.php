<?php

require_once get_theme_file_path('inc/bootstrap-theme/default-styles.php');
require_once get_theme_file_path('inc/bootstrap-theme/common-functions.php');
/* add settings to customizer */
require_once get_theme_file_path('inc/bootstrap-theme/customizer-colors.php');
require_once get_theme_file_path('inc/bootstrap-theme/customizer-apearence.php');
/* CREATE STYLES add function generated_css_styles() */
require_once get_theme_file_path('inc/bootstrap-theme/styles-generate.php');
/* add color palette with bootstrap colors */
require_once get_theme_file_path('inc/bootstrap-theme/add-color-palette.php');


/* place this function in header.php file after wp_head() hook */
function print_bootstrap_custom_styles() {
  echo '<style  type="text/css">'.minify_css(generated_css_styles()).'</style>';
  //echo '<style  type="text/css">'.generated_css_styles().'</style>';
}

function only_block_editor_inline_css_colors(){
  add_editor_style( get_stylesheet_directory_uri().'/inc/bootstrap-theme/theme-colors-css.css' );
}
add_action( 'after_setup_theme', 'only_block_editor_inline_css_colors',99 );

/* catching and changing http request for gutenberg*/
function my_theme_pre_http_request_block_editor_customizer_styles( $response, $parsed_args, $url ) {
	if ( get_stylesheet_directory_uri().'/inc/bootstrap-theme/theme-colors-css.css' === $url ) {
    $response = array(
			'body'     => generated_css_styles(), //*'@import url( "'.get_stylesheet_directory_uri().'/inc/bootstrap-theme/theme-colors-css.php" )',*/
			'headers'  => new Requests_Utility_CaseInsensitiveDictionary(),
			'response' => array(
				'code'    => 200,
				'message' => 'OK',
			),
			'cookies'  => array(),
			'filename' => null,
		);
	}
	return $response;
}
add_filter( 'pre_http_request', 'my_theme_pre_http_request_block_editor_customizer_styles', 10, 3 );
