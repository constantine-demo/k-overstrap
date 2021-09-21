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


function filter_function_add_to_navmenu( $items, $args ){
	//print_r($args);
	if( $args->theme_location == 'primary' ) {
		$items.='
	<li class="menu-itemnav-item p-1 d-none d-'.get_theme_mod( 'nav_expand_size', 'md' ).'-inline">
	'.account_fragment_shortcode().add_to_cart_fragment_shortcode().'
	</li>
	';
	}
	return $items;
}
//add_filter( 'wp_nav_menu_items', 'filter_function_add_to_navmenu', 10, 2 );


function filter_function_add_to_navmenu_2( $items, $args ){
	//print_r($args);
	if( $args->theme_location == 'main-menu-mobile' ) {
		$items.='
	<li class="menu-itemnav-item pt-2 pb-3">
	'.get_product_search_form(false).'
	</li>
	';
	}
	return $items;
}
add_filter( 'wp_nav_menu_items', 'filter_function_add_to_navmenu_2', 10, 2 );


/*
------------- PRODUCTS ARCHIVE PAGE ------------ */
function archive_before_output() {
  global $wp_query;
  $cur_cat = $wp_query->get_queried_object()->slug;
  $args = array(
    'post_type' => 'product',
    'stock' => 1,
    'posts_per_page' => 1,
    'meta_key' => 'total_sales',
    'orderby' => 'meta_value_num',
    'tax_query' => array(
        'relation' => 'AND',
        array(
            'taxonomy' => 'product_cat',
            'field' => 'slug',
            'terms' => array( $cur_cat ),
            'operator' => 'AND',
        ),
    ),
  );
  $loop = new WP_Query( $args );
  while ( $loop->have_posts() ) :
    $loop->the_post();
    global $product;
    ?>
      <div class="row align-items-center mb-5 bg-white border shadow-sm no-gutters">
        <div class="col-lg-4 text-center py-3 px-3">
          <?php
            if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog');
            else echo '<img class="img-fluid d-inline-block" src="'.woocommerce_placeholder_img_src().'" alt="My Image Placeholder" width="65px" height="115px" />';
          ?>
        </div>
        <div class="col-lg-5 py-3 px-3">
          <h3 class="mb-3"><?php the_title(); ?></h3>
          <span class="price font-weight-bold d-block mb-3"><?php echo $product->get_price_html(); ?></span>
          <div>
            <a class="btn btn-outline-secondary btn-lg text-uppercase rounded" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
              détails >>
            </a>
          </div>
          <?php //woocommerce_template_loop_add_to_cart( $loop->post, $product ); ?>
        </div>
      </div>
    <?php
  endwhile;
  wp_reset_query();
}
add_shortcode( 'best_selling_single_product', 'archive_before_output' );


/*
------------- PRODUCTS ARCHIVE PAGE ------------ */
function archive_after_output() {
  global $wp_query;
  $cur_cat = $wp_query->get_queried_object()->slug;
  $args = array(
    'post_type' => 'product',
    'stock' => 1,
    'posts_per_page' => 4,
    'meta_key' => 'total_sales',
    'orderby' => 'meta_value_num',
    'tax_query' => array(
        'relation' => 'AND',
        array(
            'taxonomy' => 'product_cat',
            'field' => 'slug',
            'terms' => array( $cur_cat ),
            'operator' => 'AND',
        ),
    ),
  );
  $loop = new WP_Query( $args );
  $post_count = 0;
  echo '<h2 class="has-text-align-center mb-5 mt-5">BEST SELLING PRODUCTS</h2>';
  while ( $loop->have_posts() ) :
    $loop->the_post();
    global $product;
    $post_count += 1;
    if ($post_count!=1) {
      ?>
        <div class="row align-items-center mb-3 bg-white border shadow-sm no-gutters">
          <div class="col-3 col-lg-4 text-center py-3 px-2">
            <?php
              if (has_post_thumbnail( $loop->post->ID )) echo '<img class="img-fluid d-inline-block" src="'.get_the_post_thumbnail_url($loop->post->ID, 'shop_catalog').'" width="100px" height="auto" >';
              else echo '<img class="img-fluid d-inline-block" src="'.woocommerce_placeholder_img_src().'" alt="My Image Placeholder" />';
            ?>
          </div>
          <div class="col-9 col-lg-5 p-2">
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
              <h3 class="mt-3 mb-3 h5"><?php the_title(); ?></h3>
            </a>
            <span class="price font-weight-bold d-block mb-3"><?php echo $product->get_price_html(); ?></span>
            <?php //woocommerce_template_loop_add_to_cart( $loop->post, $product ); ?>
          </div>
        </div>
      <?php
    }
  endwhile;
  wp_reset_query();
}
add_shortcode( 'best_selling_bottom_product', 'archive_after_output' );

function before_loop_content() {
  echo '<h2 class="has-text-align-center mb-4 mt-5 pt-3">PRODUCTS</h2>';
  echo do_shortcode('<div class="mb-4">[searchandfilter id="shop_main_filters"]</div>');
}

add_action('init', function() {
	add_action('woocommerce_archive_description', 'archive_before_output', 1);
  remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20  );
  remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30  );
  add_action('woocommerce_before_shop_loop', 'before_loop_content', 40);
  add_filter( 'woocommerce_show_page_title', '__return_false' );
  remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40  );
  add_action('woocommerce_after_shop_loop', 'archive_after_output', 90);
});


add_action( 'woocommerce_single_product_summary', 'display_size_attribute', 40 );
function display_size_attribute() {
  global $product;
    if ( $product->is_type('simple') ) {
        $taxonomies_str = $product->get_attribute('pa_color');
        $taxonomies_arr = explode( ', ', $taxonomies_str );
        if ($taxonomies_str) {
          echo '<h5 class="mt-3">Color</h5>';
          foreach ( $taxonomies_arr as $tax ) {
            echo '<div class="taxonomy-bage taxonomy-color rounded py-1 px-3 border border-primary d-inline-block mr-2 bg-white" data-tax="'.$tax.'">'.$tax.'</div>';
          }
        }
    }
    if ( $product->is_type('simple') ) {
        $taxonomies_str = $product->get_attribute('pa_capacity');
        $taxonomies_arr = explode( ', ', $taxonomies_str );
        if ($taxonomies_str) {
          echo '<h5 class="mt-3">Capacity</h5>';
          foreach ( $taxonomies_arr as $tax ) {
            echo '<div class="taxonomy-bage taxonomy-capacity rounded py-1 px-3 border border-primary d-inline-block mr-2 bg-white" data-tax="'.$tax.'">'.$tax.'</div>';
          }
        }
    }
    if ( $product->is_type('simple') ) {
        $taxonomies_str = $product->get_attribute('pa_condition');
        $taxonomies_arr = explode( ', ', $taxonomies_str );
        if ($taxonomies_str) {
          echo '<h5 class="mt-3">Condition</h5>';
          foreach ( $taxonomies_arr as $tax ) {
            echo '<div class="taxonomy-bage taxonomy-condition rounded py-1 px-3 border border-primary d-inline-block mr-2 bg-white" data-tax="'.$tax.'">'.$tax.'</div>';
          }
        }
    }
}


function remove_short_description() {
     remove_meta_box( 'postexcerpt', 'product', 'normal');
}
add_action('add_meta_boxes', 'remove_short_description', 999);


function woocommerce_template_single_excerpt() {
    return;
}
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
