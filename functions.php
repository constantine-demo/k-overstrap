<?php
require_once get_theme_file_path('inc/shortcodes.php');
require_once get_theme_file_path('inc/tinymce/tinymce.php');
require_once get_theme_file_path('inc/posttypes/posttypes.php');
require_once get_theme_file_path('inc/homepage-custom-template.php');
require_once get_theme_file_path('inc/contacts.php');
require_once get_theme_file_path('inc/code.php');
require_once get_theme_file_path('inc/bootstrap-theme/bootstrap-theme.php');
require_once get_theme_file_path('inc/navigation/navigation.php');
require_once get_theme_file_path('inc/footer/footer.php');
if ( class_exists( 'woocommerce' ) ) { require_once get_theme_file_path('woo-functions.php'); }

function main_enqueue_styles() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'child-style-default', get_stylesheet_directory_uri() . '/css/default-styles.css' );
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style') );
}
add_action( 'wp_enqueue_scripts', 'main_enqueue_styles', 99 );

function block_editor_styles() {
	// wp_enqueue_script( 'theme-js', get_template_directory_uri() . '/js/theme.min.js', array('jquery'), null, true  );
}
add_action( 'enqueue_block_editor_assets', 'block_editor_styles' );

/* use this when you know how to add generated styles here */
function only_block_editor_inline_css_all(){
	add_theme_support( 'editor-styles' );
	add_editor_style( get_template_directory_uri() .'/css/theme.min.css' );
	add_editor_style( get_stylesheet_directory_uri().'/css/default-styles.css' );
	add_editor_style( get_stylesheet_directory_uri().'/style.css' );
}
add_action( 'after_setup_theme', 'only_block_editor_inline_css_all',10 );

function add_slick_script() {
	wp_enqueue_script( 'slick-slider', get_stylesheet_directory_uri() . '/slick/slick.min.js', array('jquery'), null, true  );
	wp_enqueue_style( 'slick-style', get_stylesheet_directory_uri() . '/slick/slick.css' );
}
add_action( 'wp_enqueue_scripts', 'add_slick_script' );
add_action( 'admin_enqueue_scripts', 'add_slick_script' );

function add_ekko_script() {
	wp_enqueue_script( 'ekko-lightbox', get_stylesheet_directory_uri() . '/ekko/ekko-lightbox.min.js', array('jquery'), null, true  );
	wp_enqueue_style( 'ekko-lightbox-style', get_stylesheet_directory_uri() . '/ekko/ekko-lightbox.css' );
}
add_action( 'wp_enqueue_scripts', 'add_ekko_script' );
add_action( 'admin_enqueue_scripts', 'add_ekko_script' );

function add_admin_styles() {
	wp_enqueue_style( 'admin_css_bar', get_stylesheet_directory_uri() . '/css/admin-css.css', false, '1.0.0' );
}
add_action( 'admin_enqueue_scripts', 'add_admin_styles' );

function landing_setup_theme_supported_features() {
	add_theme_support( 'align-wide' );
}
add_action( 'after_setup_theme', 'landing_setup_theme_supported_features' );

function manage_landing_widgets(){
	unregister_sidebar( 'footerfull' );
	unregister_sidebar( 'hero' );
	unregister_sidebar( 'herocanvas' );
	unregister_sidebar( 'statichero' );
	register_sidebar( array(
		'name'          => __("Footer")." 1",
		'id'            => "footer-1",
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => "</li>\n",
		'before_title'  => '<h3 class="footer-wigget-title">',
		'after_title'   => "</h3>\n",
	) );
	register_sidebar( array(
		'name'          => __("Footer")." 2",
		'id'            => "footer-2",
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => "</li>\n",
		'before_title'  => '<h3 class="footer-wigget-title">',
		'after_title'   => "</h3>\n",
	) );
	register_sidebar( array(
		'name'          => __("Footer")." 3",
		'id'            => "footer-3",
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => "</li>\n",
		'before_title'  => '<h3 class="footer-wigget-title">',
		'after_title'   => "</h3>\n",
	) );
}
add_action( 'widgets_init', 'manage_landing_widgets', 11 );

/* remooving unnececary templates */
function landing_remove_page_template( $pages_templates ) {
    unset( $pages_templates['template-dummy.php'] );
    unset( $pages_templates['page-templates/both-sidebarspage.php'] );
		unset( $pages_templates['page-templates/empty.php'] );
    return $pages_templates;
}
add_filter( 'theme_page_templates', 'landing_remove_page_template' );

/* settinf ste free logo proportions */
function logo_size_change(){
	remove_theme_support( 'custom-logo' );
	add_theme_support( 'custom-logo', array(
	    'size' => 'thumbnail',
			'flex_width'  => true,
			'flex_height' => true,
	) );
}
add_action( 'after_setup_theme', 'logo_size_change', 11 );

/* remoove new widget support */
add_filter( 'use_widgets_block_editor', '__return_false' );

/*function ms_setup() {
set_post_thumbnail_size( 500, 500, true );
}
add_action( 'after_setup_theme', 'ms_setup' );*/

/* disable gutenberg for woo commerce */
function check_if_page_gutenberg( $can_edit, $post ){
	// filter
	if ( $post->post_type == 'product' ) { return false; };
	return $can_edit;
}
add_filter('use_block_editor_for_post', 'check_if_page_gutenberg',10,2);

/*
------------- Additional menus ------------ */
add_action('init', function() {
	if ( get_theme_mod('bootstap_nav_template_file_path') == 'custom-navigation-template.php' ) {
		register_nav_menu('additional-menu', __( 'Desktop Secondary Menu' ));
		register_nav_menu('main-menu-mobile', __( 'Mobile Navigation Menu' ));
	}
});

function print_menu_shortcode() {
return
	'<nav class="d-none d-lg-block site-custom-navbar navbar navbar-expand bg-white navbar-light text-center flex-grow-1">'.
	wp_nav_menu(
		array(
			'theme_location'  => 'primary',
			'container_class' => 'd-inline-block',
			'menu_class'      => 'nav navbar-nav mx-auto text-uppercase',
			'fallback_cb'     => '',
			'menu_id'         => 'main-menu',
			'depth'           => 1,
			'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
			'echo'						=> false
		)
	).
	'</nav>';
}
add_shortcode('main_menu', 'print_menu_shortcode');

/*
 * --------------- wp menu allways uncollapsed ----------------*/
function make_menu_unfolded() {
	print '<script>jQuery(document).ready(function(){jQuery("body").removeClass("folded")})</script>';
	print '<style>#collapse-menu { display:none; }</style>';
}
add_filter( 'admin_head', 'make_menu_unfolded' );

/*
------------- Register Block Templates ------------ */
add_action('init', function() {
	register_block_style('core/cover', [ 'name' => 'container', 'label' => __('Boxed'), ]);
});


