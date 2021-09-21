<?php
//-------------------------------------
//              Tiny MCE
//-------------------------------------


// add styles to editor
function add_tiny_mce_admin_styles() {
	/*add_editor_style( 'css/custom-editor-style.css' );*/
	/*add_editor_style( 'css/font-awesome.css' );*/
	/*add_editor_style( 'css/bootstrap-grid.min.css' );*/
}
add_action( 'admin_enqueue_scripts', 'add_tiny_mce_admin_styles' );

function format_change_tiny_mce_before_init($settings) {
		unset($settings['preview_styles']); //enable prewiews
    $settings['theme_advanced_blockformats'] = 'p,h2,h3,h4';
    $style_formats = array(
        array('title' => 'Section Header', 'block' => 'h2'),
        array('title' => 'Paragraph header', 'block' => 'h3'),
        array('title' => 'Small Header', 'block' => 'h4'),
		    array('title' => 'Badge', 'inline' => 'span', 'styles' => array ( 'display' => 'inline-block', 'border' => '1px solid #3F59A7', 'border-radius' => '5px', 'padding' => '2px 5px', 'margin' => '0 2px', 'color' => '#3F59A7' )),
        //array('title' => 'Table styles'),
        //array('title' => 'Table row 1', 'selector' => 'tr', 'classes' => 'tablerow1'),
        //array('title' => 'Red header', 'block' => 'h1', 'styles' => array('color' => '#ff0000')),
        //array('title' => 'Example 1', 'inline' => 'span', 'classes' => 'example1'),
        //array('title' => 'Red text', 'inline' => 'span', 'styles' => array('color' => '#ff0000')),
    );
    $settings['style_formats'] = json_encode( $style_formats );
    return $settings;
}
add_filter('tiny_mce_before_init', 'format_change_tiny_mce_before_init');

function remove_tinymce_buttons( $buttons ) {
	$remove = array( 'formatselect', 'blockquote', 'wp_help', 'wp_more', 'spellchecker',  'dfw', 'styleselect', 'wp_adv' );
	$add = array ( 'indent', 'outdent', 'wp_adv');
	return array_merge(array_diff( $buttons, $remove ),$add);
}
add_filter( 'mce_buttons', 'remove_tinymce_buttons' );

function remove_three_tinymce2_buttons( $buttons ) {
	$remove = array( 'strikethrough', 'forecolor', 'pastetext', 'wp_help', 'charmap',  'charmap', 'charmap', 'hr', 'indent', 'outdent'  );
	$add = array ();
	return array_merge(array_diff( $buttons, $remove ),$add);
}
//add_filter( 'mce_buttons_2', 'remove_three_tinymce2_buttons' );

/*// media button remoove
add_filter( 'wp_editor_settings', function($settings) {
  $settings['media_buttons']=FALSE;
  return $settings;
});*/

// paste as text by default
function ag_tinymce_paste_as_text( $init ) {
	$init['paste_as_text'] = true;
	return $init;
}
//add_filter('tiny_mce_before_init', 'ag_tinymce_paste_as_text');

function my_toolbars( $toolbars )
{
	// Add a new toolbar called "Very Simple"
	// - this toolbar has only 1 row of buttons
	$toolbars['Very Simple' ] = array();
	$toolbars['Very Simple' ][1] = array('bold' , 'italic' , 'bullist', 'removeformat', 'link'  );
	// remove the 'Basic' toolbar completely
	/*unset( $toolbars['Basic' ] );*/
	// return $toolbars - IMPORTANT!
	return $toolbars;
}
add_filter( 'acf/fields/wysiwyg/toolbars' , 'my_toolbars'  );

// set default height
function wptiny($initArray){
    $initArray['height'] = '250px';
    return $initArray;
}
add_filter('tiny_mce_before_init', 'wptiny');


/* p tgs changing tiny */
function tinymce_config_59772( $init ) {
   // Don't remove line breaks
   $init['remove_linebreaks'] = false;
   // Convert newline characters to BR tags
   $init['convert_newlines_to_brs'] = true;
   // Do not remove redundant BR tags
   $init['remove_redundant_brs'] = true;
   print_r ($init);

   // Pass $init back to WordPress
   return $init;
}
//add_filter('tiny_mce_before_init', 'tinymce_config_59772');
