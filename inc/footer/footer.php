<?php

// ----------------------------------------------------------------
//                       DEFAULT VARIABLES
// ----------------------------------------------------------------

$all_footer_templates_array = array(
	'inc/footer/footer-style-default.php' => __( 'Default footer template' ),
	'custom-footer-content.php' => __( 'Custom footer template' ),
);
$default_footer_template = 'inc/footer/footer-style-default.php';
$footer_color_choices = array(
	'bg-primary' => __( 'Primary color' ),
	'bg-secondary' => __( 'Secondary color' ),
	'bg-white' => __( 'White color' ),
	'bg-light' => __( 'Light color' ),
	'bg-dark' => __( 'Dark color' ),
	'bg-info' => __( 'Info background' ),
	'bg-success' => __( 'Success background' ),
	'bg-warning' => __( 'Warning background' ),
	'bg-danger' => __( 'Danger background' ),
	'bg-transparent' => __( 'Transparent background' ),
);
$footer_size_choices = array(
	'' => __( 'Extra small <576px' ),
	'sm' => __( 'Small ≥576px' ),
	'md' => __( 'Medium ≥768px' ),
	'lg' => __( 'Large ≥992px' ),
	'xl' => __( 'Extra large ≥1200px' ),
);

// ----------------------------------------------------------------
//                       Footer CUSTOMIZE
// ----------------------------------------------------------------

function footer_otions_customize_register( $wp_customize ) {

	// default variables
	global $all_footer_templates_array;
	global $default_footer_template;
	global $footer_color_choices;
	global $footer_size_choices;

	/*   Section
	-------------------------------------------------   */
	$wp_customize->add_section( 'footer_settings' , array(
    'title'      => __( 'Footer style' ),
    'priority'   => 55,
  ) );

	// --------------------------------------------------------
	//                   ABOVE FOOTER TEXT
	// --------------------------------------------------------

	/*   Footer TYPE
  -------------------------------------------------   */
	$wp_customize->add_setting( 'footer_template_file_path', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'default' => $default_footer_template,
	) );
	$wp_customize->add_control( 'footer_template_file_path', array(
	  'type' => 'select',
	  'section' => 'footer_settings',
	  'label' => __( 'Footer type' ),
	  'description' => __( 'Select footer template' ),
	  'choices' => $all_footer_templates_array,
	) );

	$wp_customize->add_setting( 'footer_expand_size', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_html_class',
		'default' => 'md',
	) );
	$wp_customize->add_control( 'footer_expand_size', array(
		'type' => 'select',
		'section' => 'footer_settings',
		'label' => __( 'Footer is expanded at:' ),
		//'description' => __( '' ),
		'choices' => $footer_size_choices,
	) );

	$wp_customize->add_setting( 'footer_color_bg_class', array(
		'capability' => 'edit_theme_options',
		//'sanitize_callback' => '',
		'default' => 'bg-primary',
	) );
	$wp_customize->add_control( 'footer_color_bg_class', array(
		'type' => 'select',
		'section' => 'footer_settings',
		'label' => __( 'General footer background color' ),
		//'description' => __( '' ),
		'choices' => $footer_color_choices,
	) );
	$wp_customize->add_setting( 'footer_text_color_class', array(
		'capability' => 'edit_theme_options',
		//'sanitize_callback' => '',
		'default' => 'text-white',
	) );
	$wp_customize->add_control( 'footer_text_color_class', array(
		'type' => 'select',
		'section' => 'footer_settings',
		'label' => __( 'Footer general text color' ),
		//'description' => __( '' ),
		'choices' => array(
			'text-white' => __( 'Text color white' ),
			'text-dark' => __( 'Text color dark' ),
		),
	) );
	$wp_customize->add_setting( 'footer_widget_valign_class', array(
		'capability' => 'edit_theme_options',
		//'sanitize_callback' => '',
		'default' => 'align-items-start',
	) );
	$wp_customize->add_control( 'footer_widget_valign_class', array(
		'type' => 'select',
		'section' => 'footer_settings',
		'label' => __( 'Footer widget vertical align' ),
		//'description' => __( '' ),
		'choices' => array(
			'align-items-start' => __( 'Alignt top' ),
			'align-items-end' => __( 'Alignt bottom' ),
			'align-items-center' => __( 'Align center' ),
		),
	) );


	// --------------------------------------------------------
	//                 content_above_footer
	// --------------------------------------------------------

	$wp_customize->add_setting( 'content_above_footer' , array(
		'default'     => '',
		//'sanitize_callback' => '',
		'capability' => 'edit_theme_options',
		'transport'   => 'postMessage', // 'postMessage' disabled
		'type' => 'option',
	) );
 $wp_customize->add_control( new WP_Customize_Code_Editor_Control( $wp_customize, 'content_above_footer', array(
    'label'     => 'Footer above optional html content',
		'description' => 'Leave this area empty if you want to hide it',
    'code_type' => 'text/html',
    'settings'  => 'content_above_footer',
    'section'   => 'footer_settings',
 ) ) );
 $wp_customize->selective_refresh->add_partial( "content_above_footer", [
	 'selector'            => ".content-above-footer-custom",
	 'settings'            => [ "content_above_footer", ],
	 'render_callback'     => function () { echo do_shortcode(get_option('content_above_footer')); },
	 'container_inclusive' => false,
 ] );

	/*   Footer above colors
	-------------------------------------------------   */
	$wp_customize->add_setting( 'above_footer_color_bg_class', array(
		'capability' => 'edit_theme_options',
		//'sanitize_callback' => '',
		'default' => 'bg-primary',
	) );
	$wp_customize->add_control( 'above_footer_color_bg_class', array(
		'type' => 'select',
		'section' => 'footer_settings',
		'label' => __( 'Section above footer background color' ),
		//'description' => __( '' ),
		'choices' => $footer_color_choices,
	) );

	$wp_customize->add_setting( 'above_footer_text_color_class', array(
		'capability' => 'edit_theme_options',
		//'sanitize_callback' => '',
		'default' => 'text-white',
	) );
	$wp_customize->add_control( 'above_footer_text_color_class', array(
		'type' => 'select',
		'section' => 'footer_settings',
		'label' => __( 'Footer above text color' ),
		//'description' => __( '' ),
		'choices' => array(
			'text-white' => __( 'Text color white' ),
			'text-dark' => __( 'Text color dark' ),
		),
	) );


	// --------------------------------------------------------
	//                 content_after_footer
	// --------------------------------------------------------

	$wp_customize->add_setting( 'content_after_footer' , array(
		'default'     => '',
		//'sanitize_callback' => '',
		'capability' => 'edit_theme_options',
		'transport'   => 'postMessage', // 'postMessage' disabled
		'type' => 'option',
	) );
	$wp_customize->add_control( new WP_Customize_Code_Editor_Control( $wp_customize, 'content_after_footer', array(
		'label'     => 'Footer above optional html content',
		'description' => 'Leave this area empty if you want to hide it',
		'code_type' => 'text/html',
		'settings'  => 'content_after_footer',
		'section'   => 'footer_settings',
	) ) );
	$wp_customize->selective_refresh->add_partial( "content_after_footer", [
	 'selector'            => ".content-after-footer-custom",
	 'settings'            => [ "content_after_footer", ],
	 'render_callback'     => function () { echo do_shortcode(get_option('content_after_footer')); },
	 'container_inclusive' => false,
	] );

	/*   Footer above colors
	-------------------------------------------------   */
	$wp_customize->add_setting( 'after_footer_color_bg_class', array(
		'capability' => 'edit_theme_options',
		//'sanitize_callback' => '',
		'default' => 'bg-primary',
	) );
	$wp_customize->add_control( 'after_footer_color_bg_class', array(
		'type' => 'select',
		'section' => 'footer_settings',
		'label' => __( 'Section after footer background color' ),
		//'description' => __( '' ),
		'choices' => $footer_color_choices,
	) );

	$wp_customize->add_setting( 'after_footer_text_color_class', array(
		'capability' => 'edit_theme_options',
		//'sanitize_callback' => '',
		'default' => 'text-white',
	) );
	$wp_customize->add_control( 'after_footer_text_color_class', array(
		'type' => 'select',
		'section' => 'footer_settings',
		'label' => __( 'Footer after text color' ),
		//'description' => __( '' ),
		'choices' => array(
			'text-white' => __( 'Text color light' ),
			'text-dark' => __( 'Text color dark' ),
		),
	) );


	// --------------------------------------------------------
	//                 copyright_footer
	// --------------------------------------------------------

	$wp_customize->add_setting( 'copyright_footer' , array(
		'default'     => '',
		//'sanitize_callback' => '',
		'capability' => 'edit_theme_options',
		'transport'   => 'postMessage', // 'postMessage' disabled
		'type' => 'option',
	) );
	$wp_customize->add_control( new WP_Customize_Code_Editor_Control( $wp_customize, 'copyright_footer', array(
		'label'     => 'Footer copyright optional html content',
		'description' => 'Leave this area empty if you want to hide it',
		'code_type' => 'text/html',
		'settings'  => 'copyright_footer',
		'section'   => 'footer_settings',
	) ) );
	$wp_customize->selective_refresh->add_partial( "copyright_footer", [
	 'selector'            => ".copyright-footer-custom",
	 'settings'            => [ "copyright_footer", ],
	 'render_callback'     => function () { echo do_shortcode(get_option('copyright_footer')); },
	 'container_inclusive' => false,
	] );

	/*   Footer above colors
	-------------------------------------------------   */
	$wp_customize->add_setting( 'copyright_footer_color_bg_class', array(
		'capability' => 'edit_theme_options',
		//'sanitize_callback' => '',
		'default' => 'bg-secondary',
	) );
	$wp_customize->add_control( 'copyright_footer_color_bg_class', array(
		'type' => 'select',
		'section' => 'footer_settings',
		'label' => __( 'Copyright footer background color' ),
		//'description' => __( '' ),
		'choices' => $footer_color_choices,
	) );

	$wp_customize->add_setting( 'copyright_footer_text_color_class', array(
		'capability' => 'edit_theme_options',
		//'sanitize_callback' => '',
		'default' => 'text-white',
	) );
	$wp_customize->add_control( 'copyright_footer_text_color_class', array(
		'type' => 'select',
		'section' => 'footer_settings',
		'label' => __( 'Copyright text color' ),
		//'description' => __( '' ),
		'choices' => array(
			'text-white' => __( 'Text color light' ),
			'text-dark' => __( 'Text color dark' ),
		),
	) );


 /* ----------- eng settings ----------- */
}
add_action( 'customize_register', 'Footer_otions_customize_register' );



// ----------------------------------------------------------------
//                    Footer CONDITION RENDER
// ----------------------------------------------------------------
function megastrap_footer() {

	global $default_footer_template;
	// Footer general variables
	$footer_color_bg_class = ' '.get_theme_mod( 'footer_color_bg_class', 'bg-primary' );
	$footer_text_color_class = ' '.get_theme_mod( 'footer_text_color_class', 'text-white' );
	$footer_expand_size = get_theme_mod( 'footer_expand_size', 'md' );
	$footer_widget_valign_class = ' '.get_theme_mod( 'footer_widget_valign_class', 'align-items-start' );
	// sections variables
	$above_footer_color_bg_class = ' '.get_theme_mod( 'above_footer_color_bg_class', 'bg-primary' );
	$above_footer_text_color_class = ' '.get_theme_mod( 'above_footer_text_color_class', 'text-white' );
	$after_footer_color_bg_class = ' '.get_theme_mod( 'after_footer_color_bg_class', 'bg-primary' );
	$after_footer_text_color_class = ' '.get_theme_mod( 'after_footer_text_color_class', 'text-white' );
	$copyright_footer_color_bg_class = ' '.get_theme_mod( 'copyright_footer_color_bg_class', 'bg-secondary' );
	$copyright_footer_text_color_class = ' '.get_theme_mod( 'copyright_footer_text_color_class', 'text-white' );

	include get_theme_file_path( get_theme_mod('footer_template_file_path',$default_footer_template) );

	$additionad_Footer_styles = "";
	if (is_customize_preview()) $additionad_Footer_styles.='
	<style>
	.customizer-icon-upper button.customize-partial-edit-shortcut-button {top:-30px}
	.customizer-icon-upper.copyright-footer-custom button.customize-partial-edit-shortcut-button {left:0}
	</style>
	';
	echo minify_css($additionad_Footer_styles);

}

// styling customizer page with inline styles
function custom_footer_customizer_styles() {  ?>
	<style>
		li#customize-control-content_after_footer, li#customize-control-content_above_footer,
		li#customize-control-copyright_footer {
			border-top: 1px solid lightgray;
			padding-top: 2rem;
			margin-top: 2rem;
		}
		/* sections classes */
		#customize-control-above_footer_color_bg_class select,
		#customize-control-above_footer_text_color_class select,
		#customize-control-after_footer_color_bg_class select,
		#customize-control-after_footer_text_color_class select,
		#customize-control-copyright_footer_color_bg_class select,
		#customize-control-copyright_footer_text_color_class select,
		/* general classes */
		#customize-control-footer_expand_size select,
		#customize-control-footer_widget_valign_class select,
		#customize-control-footer_color_bg_class select,
		#customize-control-footer_text_color_class select {
			width: 50%;
		}
	</style>
	<?php
}
add_action( 'customize_controls_print_styles', 'custom_footer_customizer_styles', 999 );


/*function footer_customizer_live_preview() {
  wp_enqueue_script(
    'tcx-theme-customizer',
    get_stylesheet_directory_uri() . '/inc/navigation/customizer-scripts.js',
    array( 'jquery', 'customize-preview' ),'1.0.0', true
  );
}
add_action( 'customize_preview_init', 'footer_customizer_live_preview' );*/
