<?php

// ----------------------------------------------------------------
//                       DEFAULT VARIABLES
// ----------------------------------------------------------------

$all_navbar_templates_array = array(
	'inc/navigation/header-style-default.php' => __( 'Default bootstrap navigation' ),
	'inc/navigation/header-style-two-columns.php' => __( 'Secondary navigation style' ),
	'inc/navigation/header-style-transparent.php' => __( 'Transparent fixed top' ),
	'custom-navigation-template.php' => __( 'Custom navigation template' ),
);
if ( class_exists( 'woocommerce' ) ) {
	$all_navbar_templates_array = array('inc/navigation/header-style-woocommerce.php' => __( 'Default woocommerce navigation' )) + $all_navbar_templates_array;
}
$default_navbar_template = 'inc/navigation/header-style-default.php';
$transparent_navbar_controls_template = 'inc/navigation/header-style-transparent.php';
$transparent_navbar_2_conumns_template = 'inc/navigation/header-style-two-columns.php';
$navbar_color_choices = array(
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
$navbar_size_choices = array(
	'' => __( 'Extra small <576px' ),
	'sm' => __( 'Small ≥576px' ),
	'md' => __( 'Medium ≥768px' ),
	'lg' => __( 'Large ≥992px' ),
	'xl' => __( 'Extra large ≥1200px' ),
);
$navbar_opacity_color_choices = array(
	'bg-primary-25' => __( 'Primary color 25% visible' ),
	'bg-primary-50' => __( 'Primary color 50% visible' ),
	'bg-primary-100' => __( 'Primary color 100% visible' ),
	'bg-secondary-25' => __( 'Secondary color 25% visible' ),
	'bg-secondary-50' => __( 'Secondary color 50% visible' ),
	'bg-secondary-100' => __( 'Secondary color 100% visible' ),
	'bg-white-10' => __( 'White color 10% visible' ),
	'bg-white-25' => __( 'White color 25% visible' ),
	'bg-white-50' => __( 'White color 50% visible' ),
	'bg-white-100' => __( 'White color 100% visible' ),
	'bg-dark-10' => __( 'Dark color 10% visible' ),
	'bg-dark-25' => __( 'Dark color 25% visible' ),
	'bg-dark-50' => __( 'Dark color 50% visible' ),
	'bg-dark-100' => __( 'Dark color 100% visible' ),
	'bg-tranparent' => __( 'Full transparent' ),
);

// ----------------------------------------------------------------
//                       HEADER CUSTOMIZE
// ----------------------------------------------------------------

function header_otions_customize_register( $wp_customize ) {

	// default variables
	global $all_navbar_templates_array;
	global $default_navbar_template;
	global $transparent_navbar_controls_template;
	global $navbar_color_choices;
	global $navbar_size_choices;
	global $navbar_opacity_color_choices;
	global $transparent_navbar_2_conumns_template;

	// adding section
	$wp_customize->add_section( 'header_settings' , array(
    'title'      => __( 'Header style' ),
    'priority'   => 50,
  ) );

	// --------------------------------------------------------
	//                    ADDING CONTROLS
	// --------------------------------------------------------
	// template header
	$wp_customize->add_setting( 'bootstap_nav_template_file_path', array(
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'sanitize_text_field',
	  'default' => $default_navbar_template,
	) );
	$wp_customize->add_control( 'bootstap_nav_template_file_path', array(
	  'type' => 'select',
	  'section' => 'header_settings',
	  'label' => __( 'Header type' ),
	  'description' => __( 'Select header template' ),
	  'choices' => $all_navbar_templates_array,
	) );

	/*   header style
	-------------------------------------------------   */


	$wp_customize->add_setting( 'is_menu_sticky_top' , array(
		'default'     => true,
		'capability' => 'edit_theme_options',
		'transport'   => 'refresh',
	) );
	$wp_customize->add_control( 'is_menu_sticky_top', array(
		'settings' => 'is_menu_sticky_top',
		'label'    => __( 'Fixed top navbar' ),
		'section'  => 'header_settings',
		'type'     => 'checkbox',
		'active_callback' => 'is_opacity_template'
	) );
	$wp_customize->add_setting( 'nav_color_bg_class', array(
		'capability' => 'edit_theme_options',
		//'sanitize_callback' => '',
		'default' => 'bg-primary',
	) );
	$wp_customize->add_control( 'nav_color_bg_class', array(
		'type' => 'select',
		'section' => 'header_settings',
		'label' => __( 'Navigation background color' ),
		//'description' => __( '' ),
		'choices' => $navbar_color_choices,
	) );
	$wp_customize->add_setting( 'nav_text_color-class', array(
		'capability' => 'edit_theme_options',
		//'sanitize_callback' => '',
		'default' => 'navbar-dark',
	) );
	$wp_customize->add_control( 'nav_text_color-class', array(
		'type' => 'select',
		'section' => 'header_settings',
		'label' => __( 'Navigation text color' ),
		//'description' => __( '' ),
		'choices' => array(
			'navbar-dark' => __( 'Text color light' ),
			'navbar-light' => __( 'Text color dark' ),
		),
	) );

	// opacity colors for opacity navbar
	function is_opacity_template() {
		global $transparent_navbar_controls_template;
		if ( get_theme_mod('bootstap_nav_template_file_path') == $transparent_navbar_controls_template ) return true;
		return false;
	}
	$wp_customize->add_setting( 'opacity_nav_color_bg_class', array(
		'capability' => 'edit_theme_options',
		//'sanitize_callback' => '',
		'default' => 'bg-dark-25',
	) );
	$wp_customize->add_control( 'opacity_nav_color_bg_class', array(
		'type' => 'select',
		'section' => 'header_settings',
		'label' => __( 'Navigation opacity on top color' ),
		//'description' => __( '' ),
		'choices' => $navbar_opacity_color_choices,
		'active_callback' => 'is_opacity_template',
	) );
	$wp_customize->add_setting( 'menu_sticky_only_front_page' , array(
		'default'     => true,
		'capability' => 'edit_theme_options',
		'transport'   => 'refresh',
	) );
	$wp_customize->add_control( 'menu_sticky_only_front_page', array(
		'settings' => 'menu_sticky_only_front_page',
		'label'    => __( 'Transparent menu only on front page' ),
		'section'  => 'header_settings',
		'type'     => 'checkbox',
		'active_callback' => 'is_opacity_template',
		),
	);


	/*   logo size
	-------------------------------------------------   */
	$wp_customize->add_setting( 'nav_expand_size', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_html_class',
		'default' => 'md',
	) );
	$wp_customize->add_control( 'nav_expand_size', array(
		'type' => 'select',
		'section' => 'header_settings',
		'label' => __( 'Navbar is expanded at:' ),
		//'description' => __( '' ),
		'choices' => $navbar_size_choices,
	) );

	$wp_customize->add_setting( 'nav_logo_height_mobile' , array(
		'default'     => '50',
		'capability' => 'edit_theme_options',
		'transport'   => 'refresh',
	) );
	$wp_customize->add_control( 'nav_logo_height_mobile', array(
    'type'        => 'range',
    'priority'    => 10,
    'section'     => 'header_settings',
    'label'       => 'Logo height mobile',
    //'description' => '',
    'input_attrs' => array(
        'min'   => 40,
        'max'   => 150,
        'step'  => 1,
        //'class' => '',
        //'style' => '',
    ),
) );

	$wp_customize->add_setting( 'nav_logo_height_desktop' , array(
		'default'     => '50',
		'capability' => 'edit_theme_options',
		'transport'   => 'refresh',
	) );
	$wp_customize->add_control( 'nav_logo_height_desktop', array(
		'type'        => 'range',
		'priority'    => 10,
		'section'     => 'header_settings',
		'label'       => 'Logo height desktop',
		'description' => 'This is the range control description.',
		'input_attrs' => array(
				'min'   => 40,
				'max'   => 150,
				'step'  => 1,
				//'class' => '',
				//'style' => '',
		),
	) );

	/*   header above content
	-------------------------------------------------   */
	function is_not_custom() {
		if (get_theme_mod('bootstap_nav_template_file_path') == 'custom-navigation-template.php') return false;
		return true;
	}

	$wp_customize->add_setting( 'content_above_navbar' , array(
		'default'     => '',
		//'sanitize_callback' => '',
		'capability' => 'edit_theme_options',
		'transport'   => 'postMessage', // 'postMessage' disabled
		'type' => 'option',
	) );
	$wp_customize->selective_refresh->add_partial( "content_above_navbar", [
		'selector'            => ".content-above-navbar-custom",
		'settings'            => [ "content_above_navbar", ],
		'render_callback'     => function () { echo do_shortcode(get_option('content_above_navbar')); },
		'container_inclusive' => false,
	] );
 $wp_customize->add_control( new WP_Customize_Code_Editor_Control( $wp_customize, 'content_above_navbar', array(
    'label'     => 'Header above navigation optional html content',
		'description' => 'Leave this area empty if you want to hide it',
    'code_type' => 'text/html',
    'settings'  => 'content_above_navbar',
    'section'   => 'header_settings',
		//'active_callback' => 'is_not_custom',
 ) ) );


 function is_default_bg_color_above_navbar() {
	 global $transparent_navbar_controls_template;
	 if ( get_theme_mod('bootstap_nav_template_file_path') == $transparent_navbar_controls_template ) return false;
	 return true;
 }
 $wp_customize->add_setting( 'content_above_navbar_bg_color', array(
	 'capability' => 'edit_theme_options',
	 'sanitize_callback' => 'sanitize_html_class',
	 'default' => '',
 ) );
 $wp_customize->add_control( 'content_above_navbar_bg_color', array(
	 'type' => 'select',
	 'section' => 'header_settings',
	 'label' => __( 'Header above navigation color' ),
	 //'description' => __( '' ),
	 'choices' => $navbar_color_choices,
	 'active_callback' => function() { if ( is_default_bg_color_above_navbar() and is_not_custom() ) return true; else return false; } ,
 ) );
 function is_opacity_bg_color_above_navbar() {
	global $transparent_navbar_controls_template;
	if ( get_theme_mod('bootstap_nav_template_file_path') == $transparent_navbar_controls_template ) return true;
	return false;
 }
 $wp_customize->add_setting( 'opacity_before_nav_color_bg_class', array(
	 'capability' => 'edit_theme_options',
	 //'sanitize_callback' => '',
	 'default' => 'bg-dark-25',
 ) );
 $wp_customize->add_control( 'opacity_before_nav_color_bg_class', array(
	 'type' => 'select',
	 'section' => 'header_settings',
	 'label' => __( 'Navigation opacity on top area color' ),
	 //'description' => __( '' ),
	 'choices' => $navbar_opacity_color_choices,
	 'active_callback' => 'is_opacity_bg_color_above_navbar',
 ) );

}
add_action( 'customize_register', 'header_otions_customize_register' );



// ----------------------------------------------------------------
//                    HEADER CONDITION RENDER
// ----------------------------------------------------------------
function get_site_logo( $height = false ) {
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	if ( $height == false ) $height = get_theme_mod( 'nav_logo_height_desktop', 40 );
	$name = esc_attr( get_bloginfo( 'name', 'display' ) );
	$image = '<img src="'.wp_get_attachment_image_url( $custom_logo_id, 'full' ).'" alt="'.$name.'" style="height:'.$height.'px; width:auto;">';
	if ( $custom_logo_id ) {
		if ( is_front_page() && ! is_paged() ) {
			$html = sprintf( '<span class="navbar-brand custom-logo-link">%1$s</span>',$image );
		}
		else {
				$aria_current = is_front_page() && ! is_paged() ? ' aria-current="page"' : '';
				$html = sprintf( '<a href="%1$s" class="navbar-brand custom-logo-link" rel="home"%2$s>%3$s</a>', esc_url( home_url( '/' ) ), $aria_current, $image );
		}
	} elseif ( is_customize_preview() ) {
		$html = sprintf( '<a href="%1$s" class="navbar-brand custom-logo-link" style="display:none;"><img class="custom-logo" alt="" /></a>', esc_url( home_url( '/' ) ) );
	}
	return $html;
}

function site_logo( $height=false ) { echo get_site_logo( $height ); }

function site_logo_shortcode_function( $atts ) {
    $atts = shortcode_atts( [ 'height' => false ], $atts, 'button' );
    return get_site_logo( $atts['height'] );
}
add_shortcode( 'site_logo', 'site_logo_shortcode_function' );

// render functions
function the_site_identity() {
	if ( ! has_custom_logo() ) {
		if ( is_front_page() && is_home() ) { ?>
			<h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>
		<?php } else { ?>
			<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a>
		<?php	}
	} else {
		site_logo();
	}
}
add_shortcode('the_site_identity', 'the_site_identity' );

function megastrap_navigation() {

	global $default_navbar_template;
	// header variables
	$menu_bg_color_class = ' '.get_theme_mod( 'nav_color_bg_class', 'bg-primary' );
	$menu_text_color_class = ' '.get_theme_mod( 'nav_text_color-class', 'navbar-dark' );
	$fixed_top_navbar_class = get_theme_mod( 'is_menu_sticky_top', true ) ? ' sticky-top' : '';
	$nav_expand_size_class = ' navbar-expand-'.get_theme_mod( 'nav_expand_size', 'md' );
	$nav_logo_height_mobile = esc_html(get_theme_mod( 'nav_logo_height_mobile', 40 ));
	$nav_logo_height_desktop = esc_html(get_theme_mod( 'nav_logo_height_desktop', 40 ));
	$content_above_navbar_bg_color = ' '.get_theme_mod( 'content_above_navbar_bg_color', '' );

	include get_theme_file_path( get_theme_mod('bootstap_nav_template_file_path', $default_navbar_template) );

	$additionad_header_styles = "
	<style>
		nav .navbar-brand img { height: ".$nav_logo_height_desktop."px!important; width: auto!important; }
		.transparent-sticky.fixed .navbar .navbar-brand img { height: ".$nav_logo_height_mobile."px!important; }
		@media (max-width: 1199px) {
			nav.navbar-expand-xl .navbar-brand img { height: ".$nav_logo_height_mobile."px!important; }
		}
		@media (max-width: 991px) {
			nav.navbar-expand-lg .navbar-brand img { height: ".$nav_logo_height_mobile."px!important; }
		}
		@media (max-width: 767px) {
			nav.navbar-expand-md .navbar-brand img { height: ".$nav_logo_height_mobile."px!important; }
		}
		@media (max-width: 575px) {
			nav.navbar-expand-sm .navbar-brand img { height: ".$nav_logo_height_mobile."px!important; }
		}
		.menu-placeholder { height: calc( 1rem + ".$nav_logo_height_mobile."px )!important; }
	</style>
	";
	echo $additionad_header_styles;  // minify_css()

	/*if (is_customize_preview()) { ?>
		<style>
		.customize-partial-edit-shortcut-content_above_navbar { z-index: 1040; }
		.customize-partial-edit-shortcut-custom_logo { top: 30px; }
		</style>
		<?php
	}*/

}

// styling customizer page with inline styles
function custom_header_customizer_styles() {  ?>
	<style>
		li#customize-control-is_menu_sticky_top, li#customize-control-content_above_navbar,
		li#customize-control-nav_collapse_class, li#customize-control-nav_expand_size {
		  border-top: 1px solid lightgray;
		  padding-top: 1.5rem;
		  margin-top: 1.5rem;
		}
		#customize-control-opacity_before_nav_color_bg_class select,
		#customize-control-opacity_nav_color_bg_class select,
		#customize-control-content_above_navbar_bg_color select,
		#customize-control-nav_expand_size select,
		#customize-control-nav_text_color-class select,
		#customize-control-nav_color_bg_class select {
		  width: 50%;
		}
	</style>
	<?php
}
add_action( 'customize_controls_print_styles', 'custom_header_customizer_styles', 999 );

function navigation_customizer_live_preview() {
  wp_enqueue_script(
    'tcx-theme-customizer',
    get_stylesheet_directory_uri() . '/inc/navigation/customizer-scripts.js',
    array( 'jquery', 'customize-preview' ),'1.0.0', true
  );
}
add_action( 'customize_preview_init', 'navigation_customizer_live_preview' );
