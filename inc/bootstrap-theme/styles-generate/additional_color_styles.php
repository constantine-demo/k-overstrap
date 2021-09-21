<?php

$additional_color_styles = '

/*-----------------------------------------------*/
/*  -----  success button & other styles  -----  */
/*-----------------------------------------------*/

/*  success colors  */

.bg-success { background-color:  '.$success_color.'!important; }
.text-success { color:  '.$success_color.'!important; }
.border-success { border-color:  '.$success_color.'!important; }
.badge-success { color:   '.blackWhite($success_color, 200).'; background-color:  '.$success_color.'; }
.alert-success {
  color: '.$success_color.';
  background-color: '.hexToRgb( $success_color, 0.2 ).';
  border-color: '.$success_color.';
}
.alert-success .alert-link { color: '.$success_hover.'; }
.table-success, .table-success>td, .table-success>th {
  background-color: '.hexToRgb( $success_color, 0.2 ).';
  border-color: '.$success_color.';
}
.table-hover .table-success:hover>td, .table-hover .table-success:hover>th, .table-hover .table-success:hover {
  background-color: '.hexToRgb( $success_color, 0.25 ).';
}
.form-control.is-valid, .was-validated .form-control:valid, body .was-validated .wpcf7 .wpcf7-validation-errors:valid, body .was-validated .wpcf7 input:valid {
  border-color: '.$success_color.';
  background-image: none;
}
.form-control.is-valid:focus, .was-validated .form-control:valid:focus, body .was-validated .wpcf7 .wpcf7-validation-errors:valid:focus, body .was-validated .wpcf7 input:valid:focus {
  border-color:'.$success_color.';
  box-shadow: 0 0 0 0.2rem '.hexToRgb( $success_color, 0.2 ).';
}
.valid-feedback { color:'.$success_color.' }

.btn-success {
  color:  '.$success_contrast_text.';
  background-color:  '.$success_button_color.';
  border-color:  '.$success_border_color.';
  border-radius:  '.$button_border_radius.';
  padding-left: 1.5rem;
  padding-right: 1.5rem;
}
.btn-success:hover {
  color:  '.$success_contrast_text.';
  background-color:  '.$success_hover.';
  border-color:  '.$success_border_color.';
}
.btn-success.focus, .btn-success:focus,
.btn-success:not(:disabled):not(.disabled).active,
.btn-success:not(:disabled):not(.disabled):active,
.show>.btn-success.dropdown-toggle, .show>.btn-success.dropdown-toggle:focus {
  color:  '.$success_contrast_text.';
  background-color:  '.$success_active.';
  border-color:  '.$success_border_color.';
  -webkit-box-shadow: 0 0 0 0.1rem  '.hexToRgb( $success_button_color, 0.4 ).';
  box-shadow: 0 0 0 0.1rem  '.hexToRgb( $success_button_color, 0.4 ).';
}
.btn-success:not(:disabled):not(.disabled).active:focus,
.btn-success:not(:disabled):not(.disabled):active:focus {
  -webkit-box-shadow: 0 0 0 0.2rem  '.hexToRgb( $success_button_color, 0.4 ).';
  box-shadow: 0 0 0 0.2rem  '.hexToRgb( $success_button_color, 0.4 ).';
}
.btn-success.disabled, .btn-success:disabled {
  color:  '.$success_contrast_text.';
  background-color:  '.$success_button_color.';
  border-color:  '.$success_button_color.';
}
.btn-outline-success {
  color:  '.$success_button_color.';
  border-color:  '.$success_button_color.';
}
.btn-outline-success:hover {
  color:  '.$success_contrast_text.';
  background-color:  '.$success_button_color.';
  border-color:  '.$success_button_color.';
}
.btn-outline-success:not(:disabled):not(.disabled).active:focus,
.btn-outline-success:not(:disabled):not(.disabled):active:focus,
.show>.btn-outline-success.dropdown-toggle:focus {
  -webkit-box-shadow: 0 0 0 0.2rem  '.hexToRgb( $success_button_color, 0.4 ).';
  box-shadow: 0 0 0 0.2rem  '.hexToRgb( $success_button_color, 0.4 ).';
}
.btn-outline-success.focus, .btn-outline-success:focus {
  -webkit-box-shadow: 0 0 0 0.1rem  '.hexToRgb( $success_button_color, 0.4 ).';
  box-shadow: 0 0 0 0.1rem  '.hexToRgb( $success_button_color, 0.4 ).';
}
.btn-outline-success:not(:disabled):not(.disabled).active, .btn-outline-success:not(:disabled):not(.disabled):active,
.show>.btn-outline-success.dropdown-toggle {
  color:  '.$success_contrast_text.';
  background-color:  '.$success_button_color.';
  border-color:  '.$success_border_color.';
}


/*-----------------------------------------------*/
/*  -------  info button & other styles  ------  */
/*-----------------------------------------------*/

/*  info colors  */

.bg-info { background-color:  '.$info_color.'!important; }
.text-info { color:  '.$info_color.'!important; }
.border-info { border-color:  '.$info_color.'!important; }
.badge-info { color:   '.blackWhite($info_color, 200).'; background-color:  '.$info_color.'; }
.alert-info {
  color: '.$info_color.';
  background-color: '.hexToRgb( $info_color, 0.2 ).';
  border-color: '.$info_color.';
}
.alert-info .alert-link { color: '.$info_hover.'; }
.table-info, .table-info>td, .table-info>th {
  background-color: '.hexToRgb( $info_color, 0.2 ).';
  border-color: '.$info_color.';
}
.table-hover .table-info:hover>td, .table-hover .table-info:hover>th, .table-hover .table-info:hover {
  background-color: '.hexToRgb( $info_color, 0.25 ).';
}


.btn-info {
  color:  '.$info_contrast_text.';
  background-color:  '.$info_button_color.';
  border-color:  '.$info_border_color.';
  border-radius:  '.$button_border_radius.';
  padding-left: 1.5rem;
  padding-right: 1.5rem;
}
.btn-info:hover {
  color:  '.$info_contrast_text.';
  background-color:  '.$info_hover.';
  border-color:  '.$info_border_color.';
}
.btn-info.focus, .btn-info:focus,
.btn-info:not(:disabled):not(.disabled).active,
.btn-info:not(:disabled):not(.disabled):active,
.show>.btn-info.dropdown-toggle, .show>.btn-info.dropdown-toggle:focus {
  color:  '.$info_contrast_text.';
  background-color:  '.$info_active.';
  border-color:  '.$info_border_color.';
  -webkit-box-shadow: 0 0 0 0.1rem  '.hexToRgb( $info_button_color, 0.4 ).';
  box-shadow: 0 0 0 0.1rem  '.hexToRgb( $info_button_color, 0.4 ).';
}
.btn-info:not(:disabled):not(.disabled).active:focus,
.btn-info:not(:disabled):not(.disabled):active:focus {
  -webkit-box-shadow: 0 0 0 0.2rem  '.hexToRgb( $info_button_color, 0.4 ).';
  box-shadow: 0 0 0 0.2rem  '.hexToRgb( $info_button_color, 0.4 ).';
}
.btn-info.disabled, .btn-info:disabled {
  color:  '.$info_contrast_text.';
  background-color:  '.$info_button_color.';
  border-color:  '.$info_button_color.';
}
.btn-outline-info {
  color:  '.$info_button_color.';
  border-color:  '.$info_button_color.';
}
.btn-outline-info:hover {
  color:  '.$info_contrast_text.';
  background-color:  '.$info_button_color.';
  border-color:  '.$info_button_color.';
}
.btn-outline-info:not(:disabled):not(.disabled).active:focus,
.btn-outline-info:not(:disabled):not(.disabled):active:focus,
.show>.btn-outline-info.dropdown-toggle:focus {
  -webkit-box-shadow: 0 0 0 0.2rem  '.hexToRgb( $info_button_color, 0.4 ).';
  box-shadow: 0 0 0 0.2rem  '.hexToRgb( $info_button_color, 0.4 ).';
}
.btn-outline-info.focus, .btn-outline-info:focus {
  -webkit-box-shadow: 0 0 0 0.1rem  '.hexToRgb( $info_button_color, 0.4 ).';
  box-shadow: 0 0 0 0.1rem  '.hexToRgb( $info_button_color, 0.4 ).';
}
.btn-outline-info:not(:disabled):not(.disabled).active, .btn-outline-info:not(:disabled):not(.disabled):active,
.show>.btn-outline-info.dropdown-toggle {
  color:  '.$info_contrast_text.';
  background-color:  '.$info_button_color.';
  border-color:  '.$info_border_color.';
}


/*-----------------------------------------------*/
/*  -----  warning button & other styles  -----  */
/*-----------------------------------------------*/

/*  warning colors  */

.bg-warning { background-color:  '.$warning_color.'!important; }
.text-warning { color:  '.$warning_color.'!important; }
.border-warning { border-color:  '.$warning_color.'!important; }
.badge-warning { color:   '.blackWhite($warning_color, 200).'; background-color:  '.$warning_color.'; }
.alert-warning {
  color: '.$warning_color.';
  background-color: '.hexToRgb( $warning_color, 0.2 ).';
  border-color: '.$warning_color.';
}
.alert-warning .alert-link { color: '.$warning_hover.'; }
.table-warning, .table-warning>td, .table-warning>th {
  background-color: '.hexToRgb( $warning_color, 0.2 ).';
  border-color: '.$warning_color.';
}
.table-hover .table-warning:hover>td, .table-hover .table-warning:hover>th, .table-hover .table-warning:hover {
  background-color: '.hexToRgb( $warning_color, 0.25 ).';
}

.btn-warning {
  color:  '.$warning_contrast_text.';
  background-color:  '.$warning_button_color.';
  border-color:  '.$warning_border_color.';
  border-radius:  '.$button_border_radius.';
  padding-left: 1.5rem;
  padding-right: 1.5rem;
}
.btn-warning:hover {
  color:  '.$warning_contrast_text.';
  background-color:  '.$warning_hover.';
  border-color:  '.$warning_border_color.';
}
.btn-warning.focus, .btn-warning:focus,
.btn-warning:not(:disabled):not(.disabled).active,
.btn-warning:not(:disabled):not(.disabled):active,
.show>.btn-warning.dropdown-toggle, .show>.btn-warning.dropdown-toggle:focus {
  color:  '.$warning_contrast_text.';
  background-color:  '.$warning_active.';
  border-color:  '.$warning_border_color.';
  -webkit-box-shadow: 0 0 0 0.1rem  '.hexToRgb( $warning_button_color, 0.4 ).';
  box-shadow: 0 0 0 0.1rem  '.hexToRgb( $warning_button_color, 0.4 ).';
}
.btn-warning:not(:disabled):not(.disabled).active:focus,
.btn-warning:not(:disabled):not(.disabled):active:focus {
  -webkit-box-shadow: 0 0 0 0.2rem  '.hexToRgb( $warning_button_color, 0.4 ).';
  box-shadow: 0 0 0 0.2rem  '.hexToRgb( $warning_button_color, 0.4 ).';
}
.btn-warning.disabled, .btn-warning:disabled {
  color:  '.$warning_contrast_text.';
  background-color:  '.$warning_button_color.';
  border-color:  '.$warning_button_color.';
}
.btn-outline-warning {
  color:  '.$warning_button_color.';
  border-color:  '.$warning_button_color.';
}
.btn-outline-warning:hover {
  color:  '.$warning_contrast_text.';
  background-color:  '.$warning_button_color.';
  border-color:  '.$warning_button_color.';
}
.btn-outline-warning:not(:disabled):not(.disabled).active:focus,
.btn-outline-warning:not(:disabled):not(.disabled):active:focus,
.show>.btn-outline-warning.dropdown-toggle:focus {
  -webkit-box-shadow: 0 0 0 0.2rem  '.hexToRgb( $warning_button_color, 0.4 ).';
  box-shadow: 0 0 0 0.2rem  '.hexToRgb( $warning_button_color, 0.4 ).';
}
.btn-outline-warning.focus, .btn-outline-warning:focus {
  -webkit-box-shadow: 0 0 0 0.1rem  '.hexToRgb( $warning_button_color, 0.4 ).';
  box-shadow: 0 0 0 0.1rem  '.hexToRgb( $warning_button_color, 0.4 ).';
}
.btn-outline-warning:not(:disabled):not(.disabled).active, .btn-outline-warning:not(:disabled):not(.disabled):active,
.show>.btn-outline-warning.dropdown-toggle {
  color:  '.$warning_contrast_text.';
  background-color:  '.$warning_button_color.';
  border-color:  '.$warning_border_color.';
}


/*-----------------------------------------------*/
/*  -----  danger button & other styles  ------  */
/*-----------------------------------------------*/

/*  danger colors  */

.bg-danger { background-color:  '.$danger_color.'!important; }
.text-danger { color:  '.$danger_color.'!important; }
.border-danger { border-color:  '.$danger_color.'!important; }
.badge-danger { color:   '.blackWhite($danger_color, 200).'; background-color:  '.$danger_color.'; }
.alert-danger {
  color: '.$danger_color.';
  background-color: '.hexToRgb( $danger_color, 0.2 ).';
  border-color: '.$danger_color.';
}
.alert-danger .alert-link { color: '.$danger_hover.'; }
.table-danger, .table-danger>td, .table-danger>th {
  background-color: '.hexToRgb( $danger_color, 0.2 ).';
  border-color: '.$danger_color.';
}
.table-hover .table-danger:hover>td, .table-hover .table-danger:hover>th, .table-hover .table-danger:hover {
  background-color: '.hexToRgb( $danger_color, 0.25 ).';
}
.form-control.is-invalid, .was-validated .form-control:invalid, body .was-validated .wpcf7 .wpcf7-validation-errors:invalid, body .was-validated .wpcf7 input:invalid {
  border-color: '.$danger_color.';
  background-image: none;
}
.form-control.is-invalid:focus, .was-validated .form-control:invalid:focus, body .was-validated .wpcf7 .wpcf7-validation-errors:invalid:focus, body .was-validated .wpcf7 input:invalid:focus {
  border-color:'.$danger_color.';
  box-shadow: 0 0 0 0.2rem '.hexToRgb( $danger_color, 0.2 ).';
}
.invalid-feedback { color:'.$danger_color.' }

.btn-danger {
  color:  '.$danger_contrast_text.';
  background-color:  '.$danger_button_color.';
  border-color:  '.$danger_border_color.';
  border-radius:  '.$button_border_radius.';
  padding-left: 1.5rem;
  padding-right: 1.5rem;
}
.btn-danger:hover {
  color:  '.$danger_contrast_text.';
  background-color:  '.$danger_hover.';
  border-color:  '.$danger_border_color.';
}
.btn-danger.focus, .btn-danger:focus,
.btn-danger:not(:disabled):not(.disabled).active,
.btn-danger:not(:disabled):not(.disabled):active,
.show>.btn-danger.dropdown-toggle, .show>.btn-danger.dropdown-toggle:focus {
  color:  '.$danger_contrast_text.';
  background-color:  '.$danger_active.';
  border-color:  '.$danger_border_color.';
  -webkit-box-shadow: 0 0 0 0.1rem  '.hexToRgb( $danger_button_color, 0.4 ).';
  box-shadow: 0 0 0 0.1rem  '.hexToRgb( $danger_button_color, 0.4 ).';
}
.btn-danger:not(:disabled):not(.disabled).active:focus,
.btn-danger:not(:disabled):not(.disabled):active:focus {
  -webkit-box-shadow: 0 0 0 0.2rem  '.hexToRgb( $danger_button_color, 0.4 ).';
  box-shadow: 0 0 0 0.2rem  '.hexToRgb( $danger_button_color, 0.4 ).';
}
.btn-danger.disabled, .btn-danger:disabled {
  color:  '.$danger_contrast_text.';
  background-color:  '.$danger_button_color.';
  border-color:  '.$danger_button_color.';
}
.btn-outline-danger {
  color:  '.$danger_button_color.';
  border-color:  '.$danger_button_color.';
}
.btn-outline-danger:hover {
  color:  '.$danger_contrast_text.';
  background-color:  '.$danger_button_color.';
  border-color:  '.$danger_button_color.';
}
.btn-outline-danger:not(:disabled):not(.disabled).active:focus,
.btn-outline-danger:not(:disabled):not(.disabled):active:focus,
.show>.btn-outline-danger.dropdown-toggle:focus {
  -webkit-box-shadow: 0 0 0 0.2rem  '.hexToRgb( $danger_button_color, 0.4 ).';
  box-shadow: 0 0 0 0.2rem  '.hexToRgb( $danger_button_color, 0.4 ).';
}
.btn-outline-danger.focus, .btn-outline-danger:focus {
  -webkit-box-shadow: 0 0 0 0.1rem  '.hexToRgb( $danger_button_color, 0.4 ).';
  box-shadow: 0 0 0 0.1rem  '.hexToRgb( $danger_button_color, 0.4 ).';
}
.btn-outline-danger:not(:disabled):not(.disabled).active, .btn-outline-danger:not(:disabled):not(.disabled):active,
.show>.btn-outline-danger.dropdown-toggle {
  color:  '.$danger_contrast_text.';
  background-color:  '.$danger_button_color.';
  border-color:  '.$danger_border_color.';
}

';
