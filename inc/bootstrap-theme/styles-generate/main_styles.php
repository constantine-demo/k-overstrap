<?php

$main_styles = '

  /*-----------------------------------------------*/
  /*  -----------------  COLORS  ----------------  */
  /*-----------------------------------------------*/

  /*  block editor colors  */

  .has-primary-color { color: '. $primary_color.'!important; }
  .has-primary-background-color { background-color: '.$primary_color.'!important; }
  .has-secondary-color { color: '.$secondary_color.'!important; }
  .has-secondary-background-color { background-color: '.$secondary_color.'!important; }
  .has-border-input-color { color: '.$input_border_color.'!important; }
  .has-border-input-background-color { background-color: '.$input_border_color.'!important; }
  .has-theme-text-color { color: '.$body_text_color.'!important; }
  .has-theme-text-background-color { background-color: '.$body_text_color.'!important; }
  .has-success-color { color: '. $success_color.'!important; }
  .has-success-background-color { background-color: '.$success_color.'!important; }
  .has-info-color { color: '. $info_color.'!important; }
  .has-info-background-color { background-color: '.$info_color.'!important; }
  .has-warning-color { color: '. $warning_color.'!important; }
  .has-warning-background-color { background-color: '.$warning_color.'!important; }
  .has-danger-color { color: '. $danger_color.'!important; }
  .has-danger-background-color { background-color: '.$danger_color.'!important; }
  .has-alt_background-color { color: '. $alt_background_color.'!important; }
  .has-alt-background-background-color { background-color: '.$alt_background_color.'!important; }

  body { color:  '.$body_text_color.'; }

  /*   simple link   */

  a { color:  '.$simple_link_color.'; text-decoration: none; background-color: transparent; }
  a:hover { color:  '.$simple_link_color_hover.'; text-decoration: underline; }

  /*  primary colors  */

  .bg-primary { background-color:  '.$primary_color.'!important; }
  .bg-primary-lighter { background-color:  '.$primary_color_lighter.'!important; }
  .bg-primary-darker { background-color:  '.$primary_color_darker.'!important; }
  .text-primary { color:  '.$primary_color.'!important; }
  .border-primary { border-color:  '.$primary_color.'!important; }
  .badge-primary { color:   '.blackWhite($primary_color, 200).'; background-color:  '.$primary_color.'; }
  :focus { outline: 0.1rem solid  '.hexToRgb( $primary_color, 0.4 ).'; }

  .bg-secondary  { background-color:  '.$secondary_color.'!important; }
  .bg-secondary-lighter  { background-color:  '.$secondary_color_lighter.'!important; }
  .bg-secondary-darker  { background-color:  '.$secondary_color_darker.'!important; }
  .text-secondary { color:  '.$secondary_color.'!important; }
  .border-secondary { border-color:  '.$secondary_color.'!important; }
  .badge-secondary { color:   '.blackWhite($secondary_color, 200).'; background-color:  '.$secondary_color.'; }
  .bg-white { background-color: #fff!important; }


  /*  navbar without border  */

  .navbar-toggler { border-radius: 0; border-color: transparent!important; outline: none!important; }
  .dropdown-item.active, .dropdown-item:active { color:  '.$primary_contrast_text.'; background-color:  '.$primary_color.'; }

  /*  all items focus line  */

  .page-link:focus { -webkit-box-shadow: 0 0 0 0.1rem  '.hexToRgb( $primary_color, 0.4 ).'; box-shadow: 0 0 0 0.1rem  '.hexToRgb( $primary_color, 0.4 ).'; }

  /*    webkit dark outline fix/overtake   */

  :focus { outline: 0.1rem solid  '.hexToRgb( $primary_color, 0.4 ).'; }

  /* custom forms controls and element style  */

  .list-group-item.active { color:  '.blackWhite($primary_color, 200).'; background-color:  '.$primary_color.'; border-color:  '.$primary_color.'; }
  .page-link, .page-link:hover { color:  '.$primary_color.'; border: 1px solid #dee2e6; }
  .progress-bar { background-color:  '.$primary_color.'; }
  .page-item.active .page-link, .custom-control-input:checked~.custom-control-label::before,
  .custom-checkbox .custom-control-input:checked~.custom-control-label::before,
  .custom-radio .custom-control-input:checked~.custom-control-label::before {
    color:  '.$primary_contrast_text.';
    background-color:  '.$primary_button_color.';
    border-color:  '.$primary_border_color.';
  }
  .custom-select:focus, .custom-file-input:focus~.custom-file-label {
    border-color:  '.$input_border_color_active.';
    -webkit-box-shadow: 0 0 0 0.1rem  '.hexToRgb( $input_border_color_active, 0.4 ).';
    box-shadow: 0 0 0 0.1rem  '.hexToRgb( $input_border_color_active, 0.4 ).';
  }
  .custom-control-input:focus~.custom-control-label::before {
    outline: 0;
    color:  '.$primary_contrast_text.';
    background-color:  '.$primary_button_color.';
    border-color:  '.$input_border_color_active.';
    -webkit-box-shadow: 0 0 0 0.1rem  '.hexToRgb( $input_border_color_active, 0.4 ).';
    box-shadow: 0 0 0 0.1rem  '.hexToRgb( $input_border_color_active, 0.4 ).';
  }
  .custom-control-input:focus:not(:checked)~.custom-control-label::before { border-color:  '.$input_border_color_active.'; }
  .custom-control-input:not(:disabled):active~.custom-control-label::before {
    color:  '.$primary_contrast_text.';
    background-color:  '.hexToRgb( $primary_color, 0.4 ).';
    border-color:  '.hexToRgb( $primary_color, 0.4 ).';
  }
  .custom-range::-webkit-slider-thumb { background:  '.$primary_button_color.'; }
  .custom-range::-moz-range-thumb { background:  '.$primary_button_color.'; }
  .custom-range::-ms-thumb { background:  '.$primary_button_color.'; }
  .custom-range:focus::-webkit-slider-thumb { box-shadow: 0 0 0 0.1rem  '.hexToRgb( $input_border_color_active, 0.4 ).'; }
  .custom-range:focus::-moz-range-thumb { box-shadow: 0 0 0 0.1rem  '.hexToRgb( $input_border_color_active, 0.4 ).'; }
  .custom-range:focus::-ms-thumb { box-shadow: 0 0 0 0.1rem  '.hexToRgb( $input_border_color_active, 0.4 ).'; }
  .custom-range:active::-webkit-slider-thumb { background-color: '.$primary_active.'; }
  .custom-range:active::-moz-range-thumb{ background-color: '.$primary_active.'; }
  .custom-range::-ms-thumb { background-color: '.$primary_active.'; }
  .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
    color:  '.$primary_contrast_text.';
    background-color:  '.$primary_button_color.';
  }

  /*  tables colors change and alerts color  */

  .table-primary tbody+tbody, .table-primary td, .table-primary th, .table-primary thead th { border-color:  '.hexToRgb( $primary_color, 0.35 ).'; }
  .table-primary, .table-primary>td, .table-primary>th { background-color:  '.hexToRgb( $primary_color, 0.2 ).'; }
  .table-hover .table-primary:hover, .table-hover .table-primary:hover>td, .table-hover .table-primary:hover>th { background-color:  '.hexToRgb( $primary_color, 0.25 ).'; }
  .table-secondary tbody+tbody, .table-secondary td, .table-secondary th, .table-secondary thead th { border-color:  '.hexToRgb( $secondary_color, 0.35 ).'; }
  .table-secondary, .table-secondary>td, .table-secondary>th { background-color:  '.hexToRgb( $secondary_color, 0.2 ).'; }
  .table-hover .table-secondary:hover, .table-hover .table-secondary:hover>td, .table-hover .table-secondary:hover>th { background-color:  '.hexToRgb( $secondary_color, 0.25 ).'; }
  .alert-primary { color:  '.$primary_color.'; background-color:  '.hexToRgb( $primary_color, 0.2 ).'; border-color:  '.hexToRgb( $primary_color, 0.35 ).'; }
  .alert-secondary { color:  '.$secondary_color.'; background-color:  '.hexToRgb( $secondary_color, 0.2 ).'; border-color:  '.hexToRgb( $secondary_color, 0.35 ).'; }
  .alert-primary .alert-link { color: '.$primary_hover.'; }
  .alert-secondary .alert-link { color: '.$secondary_hover.'; }


  /*-----------------------------------------------*/
  /*  ----------  Primary button style  ---------  */
  /*-----------------------------------------------*/

  .btn-primary {
    color:  '.$primary_contrast_text.';
    background-color:  '.$primary_button_color.';
    border-color:  '.$primary_border_color.';
    border-radius:  '.$button_border_radius.';
    padding-left: 1.5rem;
    padding-right: 1.5rem;
  }
  .btn-primary:hover {
    color:  '.$primary_contrast_text.';
    background-color:  '.$primary_hover.';
    border-color:  '.$primary_border_color.';
  }
  .btn-primary.focus, .btn-primary:focus,
  .btn-primary:not(:disabled):not(.disabled).active,
  .btn-primary:not(:disabled):not(.disabled):active,
  .show>.btn-primary.dropdown-toggle, .show>.btn-primary.dropdown-toggle:focus {
    color:  '.$primary_contrast_text.';
    background-color:  '.$primary_active.';
    border-color:  '.$primary_border_color.';
    -webkit-box-shadow: 0 0 0 0.1rem  '.hexToRgb( $primary_button_color, 0.4 ).';
    box-shadow: 0 0 0 0.1rem  '.hexToRgb( $primary_button_color, 0.4 ).';
  }
  .btn-primary:not(:disabled):not(.disabled).active:focus,
  .btn-primary:not(:disabled):not(.disabled):active:focus {
    -webkit-box-shadow: 0 0 0 0.2rem  '.hexToRgb( $primary_button_color, 0.4 ).';
    box-shadow: 0 0 0 0.2rem  '.hexToRgb( $primary_button_color, 0.4 ).';
  }
  .btn-primary.disabled, .btn-primary:disabled {
    color:  '.$primary_contrast_text.';
    background-color:  '.$primary_button_color.';
    border-color:  '.$primary_button_color.';
  }
  .btn-outline-primary, .wpcf7 input[type=submit] {
    color:  '.$primary_button_color.';
    border-color:  '.$primary_button_color.';
  }
  .btn-outline-primary:hover, .wpcf7 input:hover[type=submit] {
    color:  '.$primary_contrast_text.';
    background-color:  '.$primary_button_color.';
    border-color:  '.$primary_button_color.';
  }
  .btn-outline-primary:not(:disabled):not(.disabled).active:focus,
  .btn-outline-primary:not(:disabled):not(.disabled):active:focus,
  .show>.btn-outline-primary.dropdown-toggle:focus, .wpcf7 .show>input.dropdown-toggle:focus[type=submit],
  .wpcf7 input:not(:disabled):not(.disabled).active:focus[type=submit],
  .wpcf7 input:not(:disabled):not(.disabled):active:focus[type=submit] {
    -webkit-box-shadow: 0 0 0 0.2rem  '.hexToRgb( $primary_button_color, 0.4 ).';
    box-shadow: 0 0 0 0.2rem  '.hexToRgb( $primary_button_color, 0.4 ).';
  }
  .btn-outline-primary.focus, .btn-outline-primary:focus, .wpcf7 input.focus[type=submit],
  .wpcf7 input:focus[type=submit] {
    -webkit-box-shadow: 0 0 0 0.1rem  '.hexToRgb( $primary_button_color, 0.4 ).';
    box-shadow: 0 0 0 0.1rem  '.hexToRgb( $primary_button_color, 0.4 ).';
  }
  .btn-outline-primary:not(:disabled):not(.disabled).active, .btn-outline-primary:not(:disabled):not(.disabled):active,
  .show>.btn-outline-primary.dropdown-toggle, .wpcf7 .show>input.dropdown-toggle[type=submit],
  .wpcf7 input:not(:disabled):not(.disabled).active[type=submit], .wpcf7 input:not(:disabled):not(.disabled):active[type=submit] {
    color:  '.$primary_contrast_text.';
    background-color:  '.$primary_button_color.';
    border-color:  '.$primary_border_color.';
  }
  .btn-link { color:  '.$primary_button_color.'; }


  /*-----------------------------------------------*/
  /*  ---------  Secondary button style  --------  */
  /*-----------------------------------------------*/

  .btn-secondary {
    color:  '.$secondary_contrast_text.';
    background-color:  '.$secondary_button_color.';
    border-color:  '.$secondary_border_color.';
    border-radius:  '.$button_border_radius.';
    padding-left: 1.5rem;
    padding-right: 1.5rem;
  }
  .btn-secondary:hover {
    color:  '.$secondary_contrast_text.';
    background-color:  '.$secondary_hover.';
    border-color:  '.$secondary_border_color.';
  }
  .btn-secondary.focus, .btn-secondary:focus,
  .btn-secondary:not(:disabled):not(.disabled).active,
  .btn-secondary:not(:disabled):not(.disabled):active,
  .show>.btn-secondary.dropdown-toggle, .show>.btn-secondary.dropdown-toggle:focus {
    color:  '.$secondary_contrast_text.';
    background-color:  '.$secondary_active.';
    border-color:  '.$secondary_border_color.';
    -webkit-box-shadow: 0 0 0 0.1rem  '.hexToRgb( $secondary_button_color, 0.4 ).';
    box-shadow: 0 0 0 0.1rem  '.hexToRgb( $secondary_button_color, 0.4 ).';
  }
  .btn-secondary:not(:disabled):not(.disabled).active:focus,
  .btn-secondary:not(:disabled):not(.disabled):active:focus {
    -webkit-box-shadow: 0 0 0 0.2rem  '.hexToRgb( $secondary_button_color, 0.4 ).';
    box-shadow: 0 0 0 0.2rem  '.hexToRgb( $secondary_button_color, 0.4 ).';
  }
  .btn-secondary.disabled, .btn-secondary:disabled {
    color:  '.$primary_contrast_text.';
    background-color:  '.$secondary_button_color.';
    border-color:  '.$secondary_button_color.';
  }
  .btn-outline-secondary, .wpcf7 input[type=submit] {
    color:  '.$secondary_button_color.';
    border-color:  '.$secondary_button_color.';
  }
  .btn-outline-secondary:hover, .wpcf7 input:hover[type=submit] {
    color:  '.$secondary_contrast_text.';
    background-color:  '.$secondary_button_color.';
    border-color:  '.$secondary_button_color.';
  }
  .btn-outline-secondary:not(:disabled):not(.disabled).active:focus,
  .btn-outline-secondary:not(:disabled):not(.disabled):active:focus,
  .show>.btn-outline-secondary.dropdown-toggle:focus, .wpcf7 .show>input.dropdown-toggle:focus[type=submit],
  .wpcf7 input:not(:disabled):not(.disabled).active:focus[type=submit],
  .wpcf7 input:not(:disabled):not(.disabled):active:focus[type=submit] {
    -webkit-box-shadow: 0 0 0 0.2rem  '.hexToRgb( $secondary_button_color, 0.4 ).';
    box-shadow: 0 0 0 0.2rem  '.hexToRgb( $secondary_button_color, 0.4 ).';
  }
  .btn-outline-secondary.focus, .btn-outline-secondary:focus, .wpcf7 input.focus[type=submit],
  .wpcf7 input:focus[type=submit] {
    -webkit-box-shadow: 0 0 0 0.1rem  '.hexToRgb( $secondary_button_color, 0.4 ).';
    box-shadow: 0 0 0 0.1rem  '.hexToRgb( $secondary_button_color, 0.4 ).';
  }
  .btn-outline-secondary:not(:disabled):not(.disabled).active, .btn-outline-secondary:not(:disabled):not(.disabled):active,
  .show>.btn-outline-secondary.dropdown-toggle, .wpcf7 .show>input.dropdown-toggle[type=submit],
  .wpcf7 input:not(:disabled):not(.disabled).active[type=submit], .wpcf7 input:not(:disabled):not(.disabled):active[type=submit] {
    color:  '.$primary_contrast_text.';
    background-color:  '.$secondary_button_color.';
    border-color:  '.$primary_border_color.';
  }


  /*-----------------------------------------------*/
  /*  --------  Borders default overtake  -------  */
  /*-----------------------------------------------*/

  .rounded {
    border-radius:  '.$main_border_radius.' !important;
  }
  .rounded-top {
    border-top-left-radius:  '.$main_border_radius.' !important;
    border-top-right-radius:  '.$main_border_radius.' !important;
  }
  .rounded-right {
    border-top-right-radius:  '.$main_border_radius.' !important;
    border-bottom-right-radius:  '.$main_border_radius.' !important;
  }
  .rounded-bottom {
    border-bottom-right-radius:  '.$main_border_radius.' !important;
    border-bottom-left-radius:  '.$main_border_radius.' !important;
  }
  .rounded-left {
    border-top-left-radius:  '.$main_border_radius.' !important;
    border-bottom-left-radius:  '.$main_border_radius.' !important;
  }
  .rounded-big {
    border-radius: calc( '.$main_border_radius.' + 1.5rem ) !important;
  }
  .progress { border-radius: '.$main_border_radius.'; }
  .card { border-color: '.$various_element_border_color.'; }
  .card-header { border-bottom-color: '.$various_element_border_color.'; }
  .card-footer { border-top-color: '.$various_element_border_color.'; }
  .page-link, .page-link:hover { border-color: '.$various_element_border_color.'; }
  .page-item.disabled .page-link { border-color: '.hexToRgb( $various_element_border_color, 0.5 ).'; }
  .nav-tabs .nav-link, .woocommerce div.product .woocommerce-tabs ul.tabs li {
    border-top-left-radius:  '.$button_border_radius.'; border-top-right-radius:  '.$button_border_radius.';
  }
  .nav-tabs { border-bottom: 1px solid '.$various_element_border_color.'; }
  .nav-tabs .nav-link:focus, .nav-tabs .nav-link:hover {
    border-color:  '.$various_element_border_color.' '.$various_element_border_color.' '.$various_element_border_color.';
  }
  .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
    border-color: '.$various_element_border_color.' '.$various_element_border_color.' #fff;
  }
  .input-group-text, .custom-select, .custom-file-label/*, .custom-control-label::before*/ {
    border-color: '.$input_border_color.';
  }
  .woocommerce .widget_shopping_cart .total, .woocommerce.widget_shopping_cart .total {
      border-top: 1px solid '.$various_element_border_color.';
      padding: 10px 0 0;
  }


  /*-----------------------------------------------*/
  /*  -----  border radius various elements  ----  */
  /*-----------------------------------------------*/

  .btn-success, .btn-info, .btn-warning, .btn-danger, .btn-outline-primary, .btn-outline-secondary,
  .btn-outline-success, .btn-outline-info, .btn-outline-warning, .btn-outline-danger, .nav-pills .nav-link {
    border-radius:  '.$button_border_radius.';
  }
  .input-group-text, .custom-select, .custom-file-label {
      border-radius:  '.$input_border_radius.';
  }
  .card, .jumbotron, .breadcrumb, .alert, .toast, .pagination { border-radius:  '.$main_border_radius.'; }
  .list-group-item:first-child { border-top-left-radius:  '.$main_border_radius.'; border-top-right-radius:  '.$main_border_radius.'; }
  .list-group-item:last-child { border-bottom-right-radius:  '.$main_border_radius.'; border-bottom-left-radius:  '.$main_border_radius.'; }
  .pagination-lg .page-item:first-child .page-link, .page-item:first-child .page-link, .pagination-sm .page-item:first-child .page-link {
    border-top-left-radius:  '.$main_border_radius.'; border-bottom-left-radius:  '.$main_border_radius.';
  }
  .pagination-lg .page-item:last-child .page-link, .page-item:last-child .page-link, .pagination-sm .page-item:last-child .page-link {
    border-top-right-radius:  '.$main_border_radius.'; border-bottom-right-radius:  '.$main_border_radius.';
  }


  /*-----------------------------------------------*/
  /*  --  alt background color for various el  --  */
  /*-----------------------------------------------*/
  .jumbotron, .progress, .breadcrumb, .page-link:hover, .form-control:disabled, .form-control[readonly], input[type="range"].custom-range::-webkit-slider-runnable-track,
  .input-group-text {
      background-color: '.$alt_background_color.';
  }
  input[type="file"]::-webkit-file-upload-button { background-color: '.$alt_background_color.';}

  ';
