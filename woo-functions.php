<?php

function add_my_currency( $currencies ) {
     $currencies['UAH'] = __( 'Українська гривня', 'woocommerce' );
     return $currencies;
}
add_filter( 'woocommerce_currencies', 'add_my_currency' );

/* rename ua hrivna */
function add_my_currency_symbol( $currency_symbol, $currency ) {
     switch( $currency ) {
          case 'UAH': $currency_symbol = 'грн'; break;
      }
     return $currency_symbol;
}
add_filter('woocommerce_currency_symbol', 'add_my_currency_symbol', 10, 2);


/* -------------------------------------------- */
/*     cart functioanality on top of page       */
/* -------------------------------------------- */

function custom_cart() {
	global $woocommerce;
	?>
	<span class="site-icons-block">
		<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" class="rezolution-account" title="<?php _e('Account',''); ?>"></a>
		<a href="<?php echo wc_get_cart_url() ?>" class="rezolution-cart"></div><span class="count" data-count="<?php echo $woocommerce->cart->cart_contents_count ?>"><?php echo $woocommerce->cart->cart_contents_count ?></span></a>
	</span>
	<?php
}


function add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	$fragments['.rezolution-cart'] = '<a href="' . wc_get_cart_url() . '" class="rezolution-cart"><span class="count" data-count="' . $woocommerce->cart->cart_contents_count . '">' . $woocommerce->cart->cart_contents_count . '</span></a>';
 	return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'add_to_cart_fragment' );


function add_to_cart_fragment_shortcode() {
		global $woocommerce;
    return '
		<span class="site-icons-block">
			<a href="<'.wc_get_cart_url().'" class="rezolution-cart"><span class="count" data-count="'.$woocommerce->cart->cart_contents_count.'">'.$woocommerce->cart->cart_contents_count.'</span></a>
		</span>
		';
}
add_shortcode( 'cart_icon', 'add_to_cart_fragment_shortcode' );

function account_fragment_shortcode() {
		global $woocommerce;
    return '
		<span class="site-icons-block">
			<a href="'.get_permalink( get_option('woocommerce_myaccount_page_id') ).'" class="rezolution-account" title="'.__('Account','').'"></a>
		</span>
		';
}
add_shortcode( 'account_icon', 'account_fragment_shortcode' );

/* add dynamic cart items to main menu
------------------------------------------------------------------------------*/
/*
function filter_function_add_to_navmenu( $items, $args ){
	//print_r($args);
	if( $args->theme_location == 'primary' ) {
		$items.='
    	<li class="menu-itemnav-item p-1 d-none d-'.get_theme_mod( 'nav_expand_size', 'md' ).'-inline">
    	'.account_fragment_shortcode().'
    	</li>
      <li class="menu-itemnav-item p-1 d-none d-'.get_theme_mod( 'nav_expand_size', 'md' ).'-inline">
      '.add_to_cart_fragment_shortcode().'
      </li>
	';
	}
	return $items;
}
add_filter( 'wp_nav_menu_items', 'filter_function_add_to_navmenu', 10, 2 );
*/


/* disable gutenberg for woo commerce
------------------------------------------------------------------------------*/
function check_if_page_gutenberg( $can_edit, $post ){
	// filter
	if ( $post->post_type == 'product' ) { return false; };
	return $can_edit;
}
add_filter('use_block_editor_for_post', 'check_if_page_gutenberg',10,2);


/* remoove short description if needed
------------------------------------------------------------------------------*/
/*
function remove_short_description() {  remove_meta_box( 'postexcerpt', 'product', 'normal'); }
add_action('add_meta_boxes', 'remove_short_description', 999);

function woocommerce_template_single_excerpt() { return; }
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
*/

/*
------------- Additional menus ---------------------------------------------- */
add_action('init', function() {
	register_nav_menu('additional-menu', __( 'Desktop Secondary Menu' ));
	register_nav_menu('main-menu-mobile', __( 'Mobile Navigation Menu' ));
});

function filter_function_add_to_navmenu_mobile( $items, $args ){
	if( $args->theme_location == 'main-menu-mobile' ) {
		$items = '<li class="mt-4 mb-3">'.get_product_search_form(false).'</li>'.$items;
	}
	return $items;
}
add_filter( 'wp_nav_menu_items', 'filter_function_add_to_navmenu_mobile', 10, 2 );
