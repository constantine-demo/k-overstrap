<?php

$woocommerce_styles = '

/*-----------------------------------------------*/
/*  -----  WOOCOMMERCE GENERATED STYLES  ------  */
/*-----------------------------------------------*/

.woocommerce .widget_price_filter .ui-slider .ui-slider-range { background-color: #ebe9eb; }
.woocommerce .widget_price_filter .ui-slider .ui-slider-handle, .woocommerce .widget_price_filter .price_slider_wrapper .ui-widget-content {
    background-color: '.$primary_color.';
}
.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button {
    color: '.$primary_color.';
    background-color: transparent;
    border: 1px solid '.$primary_color.';
    border-radius: '.$button_border_radius.';
    transition: all 0.2s;
    font-weight: normal;
}
.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover {
    color: '.$primary_contrast_text.';
    background-color: '.$primary_color.';
}
.woocommerce #respond input#submit:focus, .woocommerce a.button:focus, .woocommerce button.button:focus, .woocommerce input.button:focus {
    -webkit-box-shadow: 0 0 0 0.1rem  '.hexToRgb( $input_border_color_active, 0.4 ).';
    box-shadow: 0 0 0 0.1rem  '.hexToRgb( $input_border_color_active, 0.4 ).';
    outline: none;
}
/* single product quantity area sizes */
.cart .quantity input[type="number"], .woocommerce-Input, billing_state, .select2-container--default .select2-selection--single, #billing_state {
  border-radius:  '.$input_border_radius.';
  color:  '.$input_text_color.';
  background-color:  '.$input_bg_color.';
  border: 1px solid '.$input_border_color.';
}
.select2-container--default .select2-selection--single .select2-selection__rendered { color:  '.$input_text_color.'; }
span.select2-dropdown.select2-dropdown--below { border: 1px solid '.$input_border_color.'; }
.woocommerce-product-search .search-field.form-control { border-radius:  '.$input_border_radius.' 0 0 '.$input_border_radius.'; }
.woocommerce-product-search .input-group-append>.submit { border-radius:  0 '.$input_border_radius.' '.$input_border_radius.' 0; }
/* my account menu colors */
.woocommerce-MyAccount-navigation .list-group-item:first-child { border-top-left-radius: '.$main_border_radius.';  border-top-right-radius: '.$main_border_radius.'; }
.woocommerce-MyAccount-navigation .list-group-item:last-child { border-bottom-right-radius: '.$main_border_radius.';  border-bottom-left-radius: '.$main_border_radius.'; }
.woocommerce-MyAccount-navigation .list-group-item, .woocommerce form.checkout_coupon, .woocommerce form.login, .woocommerce form.register {
  border-color: '.$various_element_border_color.';
}
.woocommerce div.product .woocommerce-tabs ul.tabs li { border-color: '.$various_element_border_color.'; }
.woocommerce div.product .woocommerce-tabs ul.tabs::before { border-bottom: 1px solid '.$various_element_border_color.'; }
.woocommerce nav.woocommerce-pagination ul { border-color: '.$various_element_border_color.'; }
.woocommerce nav.woocommerce-pagination ul li { border-right-color: '.$various_element_border_color.'; }

/* --- woocommerce block styles --- */
.wc-block-grid__product-add-to-cart.wp-block-button .wp-block-button__link {
  color: '.$primary_button_color.';
  border: 1px solid '.$primary_button_color.';
  border-radius: '.$button_border_radius.';
}
.wc-block-grid__product-add-to-cart.wp-block-button .wp-block-button__link:hover {
  background-color: '.$primary_button_color.';
  color:  '.$primary_contrast_text.';
}
.wc-block-grid .wc-block-components-product-title { font-size: 1rem; }
.wc-block-grid__product-add-to-cart.wp-block-button .wp-block-button__link:active  {
  box-shadow: 0 0 0 0.1rem  '.hexToRgb( $primary_button_color, 0.4 ).';
}
.wc-block-grid__product-add-to-cart.wp-block-button .wp-block-button__link:focus {
  box-shadow: 0 0 0 0.2rem  '.hexToRgb( $primary_button_color, 0.4 ).';
}


';
