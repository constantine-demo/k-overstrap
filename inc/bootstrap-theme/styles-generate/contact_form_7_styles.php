<?php

$contact_form_7_styles = '

/*-----------------------------------------------*/
/*  ------  CONTACT FORM 7 THEME COLORS  ------  */
/*-----------------------------------------------*/

/* input fields styles */

.form-control, .wpcf7 .wpcf7-validation-errors,
.wpcf7 input[type=color], .wpcf7 input[type=date], .wpcf7 input[type=datetime-local],
.wpcf7 input[type=datetime], .wpcf7 input[type=email], .wpcf7 input[type=file],
.wpcf7 input[type=month], .wpcf7 input[type=number], .wpcf7 input[type=range],
.wpcf7 input[type=search], /*.wpcf7 input[type=submit],*/ .wpcf7 input[type=tel],
.wpcf7 input[type=text], .wpcf7 input[type=time], .wpcf7 input[type=url],
.wpcf7 input[type=week], .wpcf7 select, .wpcf7 textarea {
  border-radius:  '.$input_border_radius.';
  color:  '.$input_text_color.';
  background-color:  '.$input_bg_color.';
  border-color:  '.$input_border_color.';
}
.form-control::placeholder, .wpcf7-form-control::placeholder { color: inherit; opacity: 0.8; }
.input-group input.btn { border-radius:  '.$input_border_radius.'; }
.form-control:focus, .wpcf7 .wpcf7-validation-errors:focus,
.wpcf7 input:focus[type=color], .wpcf7 input:focus[type=date],
.wpcf7 input:focus[type=datetime-local], .wpcf7 input:focus[type=datetime],
.wpcf7 input:focus[type=email], .wpcf7 input:focus[type=file],
.wpcf7 input:focus[type=month], .wpcf7 input:focus[type=number],
.wpcf7 input:focus[type=range], .wpcf7 input:focus[type=search],
/*.wpcf7 input:focus[type=submit],*/ .wpcf7 input:focus[type=tel],
.wpcf7 input:focus[type=text], .wpcf7 input:focus[type=time],
.wpcf7 input:focus[type=url], .wpcf7 input:focus[type=week],
.wpcf7 select:focus, .wpcf7 textarea:focus {
  border-radius:  '.$input_border_radius.';
  color:  '.$input_text_color.';
  background-color:  '.$input_bg_color.';
  border-color:  '.$input_border_color_active.';
  -webkit-box-shadow: 0 0 0 0.1rem  '.hexToRgb( $input_border_color_active, 0.4 ).';
  box-shadow: 0 0 0 0.1rem  '.hexToRgb( $input_border_color_active, 0.4 ).';
}

/*  submit button styles */

.wpcf7 input[type=submit], .wpcf7 input[type=submit]:focus {
  color:  '.$primary_contrast_text.';
  text-align: center;
  border-color:  '.$primary_border_color.';
  background-color:  '.$primary_color.';
  height: unset;
  /*height: calc(1.5em + .75rem + 2px);*/
  width: unset;
  min-width: 10rem;
  font-size: 1rem;
  line-height: 1.5;
  border-radius:  '.$button_border_radius.';
  display: block;
  margin-left: auto;
  margin-right: auto;
}
.wpcf7 input:hover[type=submit] {
  color:  '.$primary_contrast_text.';
  background-color:  '.$primary_hover.';
  border-color:  '.$primary_border_color.';
  -webkit-box-shadow: none;
  box-shadow: none;
}
.wpcf7 input:not(:disabled):not(.disabled):focus[type=submit] {
  -webkit-box-shadow: 0 0 0 0.1rem  '.hexToRgb( $primary_color, 0.4 ).';
  box-shadow: 0 0 0 0.1rem  '.hexToRgb( $primary_color, 0.4 ).';
}
.wpcf7 input:not(:disabled):not(.disabled):active:focus[type=submit] {
  -webkit-box-shadow: 0 0 0 0.2rem  '.hexToRgb( $primary_color, 0.4 ).';
  box-shadow: 0 0 0 0.2rem  '.hexToRgb( $primary_color, 0.4 ).';
}
.wpcf7 input:not(:disabled):not(.disabled):active[type=submit] {
  color:  '.$primary_contrast_text.';
  border-color:  '.$primary_border_color.';
  background-color:  '.$primary_active.';
}

';
