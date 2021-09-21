<?php

/* ---------------------------------------- */
/*      ADDING MENU PAGE AT THE BOTTOM      */
/* ---------------------------------------- */
/* add main menu page */
function add_code_sub_menu_page() {
  add_submenu_page(
      'contacts', //parent slug
      'Custom code', // page_title
      'Custom code', // menu_title
      'manage_options', // capability
      'code-edit-sub-page', // menu_slug
      'code_render_admin_page', // function
  );
}
add_action( 'admin_menu' , 'add_code_sub_menu_page' );

/* render options page */
function code_render_admin_page() {
		?>
		<div class="wrap">
			<h2>Theme Code Injections</h2>
			<br>
			<?php settings_errors(); ?>

			<form method="post" action="options.php">
				<?php
					settings_fields( 'code-group' );
					do_settings_sections( 'code' );
					submit_button();
				?>
			</form>
		</div>
    <script>
      jQuery(document).ready(function($) {
        wp.codeEditor.initialize($('#field-site_code_header'), cm_settings);
        wp.codeEditor.initialize($('#field-site_code_body_open'), cm_settings);
        wp.codeEditor.initialize($('#field-site_code_footer'), cm_settings);
      })
    </script>
	<?php }

add_action( 'admin_menu' , 'add_settings_main_menu_page' );



/* ---------------------------------------- */
/*       ADDING SECTIONS AND CONTROLS       */
/* ---------------------------------------- */
function code_page_settings_init()
{

    // register a section in the  page
    add_settings_section(
        'code_section', // section slug
        'Snippets: Analytic / Pixel / Google Fonts / etc.', // section header
        function () { ?>
          <p>Put here snippets in every part of the site with <b>SCRIPT</b> tags</p>
          <p> Ussually it option used for google analyticx and facebook pixel. Also can be used for google fonts adding or any custom script. </p>
        <?php },
        'code' // slug of the page
    );

    // register a setting
    register_setting(
      'code-group', // option group (defined with settings_fields() function)
      'site_code_header' //settings name
    );
    // register field
    add_settings_field(
        'site_code_field_head', // slug of the option use it as field id
        'Code beetween &lthead&gt and &lt/head&gt tags', // name of the field
        function () { render_code_textarea_input('site_code_header'); }, //render field foo
        'code', // page where field renderend
        'code_section' // section where field renderend
    );

    // register a setting
    register_setting(
      'code-group', // option group (defined with settings_fields() function)
      'site_code_body_open' //settings name
    );
    // register field
    add_settings_field(
        'site_code_field_body_open', // slug of the option use it as field id
        'Code after &ltbody&gt open tag', // name of the field
        function () { render_code_textarea_input('site_code_body_open'); }, //render field foo
        'code', // page where field renderend
        'code_section' // section where field renderend
    );

    // register a setting
    register_setting(
      'code-group', // option group (defined with settings_fields() function)
      'site_code_footer' //settings name
    );
    // register field
    add_settings_field(
        'site_code_field_footer', // slug of the option use it as field id
        'Code after all footer scripts right bebore &lt/html&gt tag', // name of the field
        function () { render_code_textarea_input('site_code_footer'); }, //render field foo
        'code', // page where field renderend
        'code_section' // section where field renderend
    );

}
add_action('admin_init', 'code_page_settings_init');


/* ---------------------------------------- */
/*        RENDER CONTROLS FUNCTIONS         */
/* ---------------------------------------- */

function render_code_textarea_input( $name ) {
  echo '<textarea id="field-'.$name.'" rows="5" cols="55" class="regular-text code code-edit-textarea" name="'.$name.'" >'.get_option($name).'</textarea>';
}



add_action('admin_enqueue_scripts', 'codemirror_enqueue_scripts');
function codemirror_enqueue_scripts($hook) {
  $cm_settings['codeEditor'] = wp_enqueue_code_editor(array('type' => 'text/html'));
  wp_localize_script('jquery', 'cm_settings', $cm_settings);
  wp_enqueue_script('wp-theme-plugin-editor');
  wp_enqueue_style('wp-codemirror');
}


/* ---------------------------------------- */
/*         CODE IJECTIONS IN THEME          */
/* ---------------------------------------- */

function add_custom_snippet_to_header(){
  if ( get_option('site_code_header') ) echo get_option('site_code_header');
};
add_action('wp_head', 'add_custom_snippet_to_header');

function add_custom_snippet_to_body(){
  if ( get_option('site_code_body_open') ) echo get_option('site_code_body_open');
};
add_action('wp_body_open', 'add_custom_snippet_to_body', 1);

function add_custom_snippet_to_footer(){
  if ( get_option('site_code_footer') ) echo get_option('site_code_footer');
};
add_action('wp_footer', 'add_custom_snippet_to_footer',999);
