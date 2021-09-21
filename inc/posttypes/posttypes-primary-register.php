<?php

/*  ----------------------------------------------- */
/*         Register Custom Posttype Services        */
/*  ----------------------------------------------- */
function services_post_type_generate() {
$labels = array(
    'name'                => _x( 'Services', 'Post Type General Name', 'text_domain' ),
    'singular_name'       => _x( 'Service', 'Post Type Singular Name', 'text_domain' ),
		'add_new_item'        => __( 'Add New Service', 'text_domain' ),
);
$rewrite = array(
    'slug'                => get_post_field( 'post_name', get_theme_mod( 'services_all_page_id' ) ),
    'with_front'          => false,
    'pages'               => true,
    'feeds'               => true,
);
$args = array(
    'label'               => __( 'Services', 'text_domain' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', ),
    'taxonomies'          => array(),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'menu_position'       => 5,
    'menu_icon'           => 'dashicons-hammer',
    'show_in_rest'        => true,
    'show_in_admin_bar'   => true,
    'show_in_nav_menus'   => true,
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'rewrite'             => $rewrite,
    'capability_type'     => 'post',
);
register_post_type( 'services', $args );
flush_rewrite_rules( false );
}


/*  ----------------------------------------------- */
/*          Register Custom Posttype Porfolio       */
/*  ----------------------------------------------- */
function portfolio_post_type_generate() {
$labels = array(
    'name'                => _x( 'Portfolio', 'Post Type General Name', 'text_domain' ),
    'singular_name'       => _x( 'Portfolio', 'Post Type Singular Name', 'text_domain' ),
		'add_new_item'        => __( 'Add New Portfolio', 'text_domain' ),
);
$rewrite = array(
    'slug'                => get_post_field( 'post_name', get_theme_mod( 'portfolio_all_page_id' ) ),
    'with_front'          => false,
    'pages'               => true,
    'feeds'               => true,
);
$args = array(
    'label'               => __( 'Portfolio', 'text_domain' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'editor', 'thumbnail', ),
    'taxonomies'          => array(),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'menu_position'       => 5,
    'menu_icon'           => 'dashicons-portfolio',
    'show_in_admin_bar'   => true,
    'show_in_nav_menus'   => true,
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'rewrite'             => $rewrite,
    'capability_type'     => 'post',
);
register_post_type( 'portfolio', $args );
flush_rewrite_rules( false );
}

/*  ----------------------------------------------- */
/*               Register Custom Team               */
/*  ----------------------------------------------- */
function team_post_type_generate() {
$labels = array(
    'name'                => _x( 'Team', 'Post Type General Name', 'text_domain' ),
    'singular_name'       => _x( 'Team', 'Post Type Singular Name', 'text_domain' ),
		'add_new_item'        => __( 'Add New Team member', 'text_domain' ),
);
$rewrite = array(
    'slug'                => get_post_field( 'post_name', get_theme_mod( 'team_all_page_id' ) ),
    'with_front'          => false,
    'pages'               => true,
    'feeds'               => true,
);
$args = array(
    'label'               => __( 'Team', 'text_domain' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'editor', 'thumbnail', ),
    'taxonomies'          => array(),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'menu_position'       => 5,
    'menu_icon'           => 'dashicons-groups',
    'show_in_admin_bar'   => true,
    'show_in_nav_menus'   => true,
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'rewrite'             => $rewrite,
    'capability_type'     => 'post',
);
register_post_type( 'team', $args );
flush_rewrite_rules( false );
}

/*  ----------------------------------------------- */
/*               Register Custom Countries               */
/*  ----------------------------------------------- */
function countries_post_type_generate() {
$labels = array(
    'name'                => _x( 'Countries', 'Post Type General Name', 'text_domain' ),
    'singular_name'       => _x( 'Country', 'Post Type Singular Name', 'text_domain' ),
		'add_new_item'        => __( 'Add new country place', 'text_domain' ),
);
$rewrite = array(
    'slug'                => get_post_field( 'post_name', get_theme_mod( 'countries_all_page_id' ) ),
    'with_front'          => false,
    'pages'               => true,
    'feeds'               => true,
);
$args = array(
    'label'               => __( 'Countries', 'text_domain' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'editor', 'thumbnail', ),
    'taxonomies'          => array(),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'menu_position'       => 5,
    'menu_icon'           => 'dashicons-admin-site-alt',
    'show_in_rest'        => true,
    'show_in_admin_bar'   => true,
    'show_in_nav_menus'   => true,
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'rewrite'             => $rewrite,
    'capability_type'     => 'post',
);
register_post_type( 'countries', $args );
flush_rewrite_rules( false );
}

/*  ----------------------------------------------- */
/*               Register Custom Catalog               */
/*  ----------------------------------------------- */
function catalog_post_type_generate() {
$labels = array(
    'name'                => _x( 'Catalog', 'Post Type General Name', 'text_domain' ),
    'singular_name'       => _x( 'Catalog item', 'Post Type Singular Name', 'text_domain' ),
		'add_new_item'        => __( 'Add catalog item', 'text_domain' ),
);
$rewrite = array(
    'slug'                => get_post_field( 'post_name', get_theme_mod( 'catalog_all_page_id' ) ),
    'with_front'          => false,
    'pages'               => true,
    'feeds'               => true,
);
$args = array(
    'label'               => __( 'Catalog', 'text_domain' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'editor', 'thumbnail', ),
    'taxonomies'          => array(),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'menu_position'       => 5,
    'menu_icon'           => 'dashicons-index-card',
    'show_in_admin_bar'   => true,
    'show_in_nav_menus'   => true,
	//'show_in_rest'        => true,
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'rewrite'             => $rewrite,
    'capability_type'     => 'post',
);
register_post_type( 'catalog', $args );
flush_rewrite_rules( false );
}
