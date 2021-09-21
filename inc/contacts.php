<?php

// add fa4 to admin
function fa_admin_fonts() {
  echo "	<style>
		@font-face {
		  font-family: 'FontAwesome';
		  src: url('./fonts/fontawesome-webfont.eot?v=4.7.0');
		  src: url('".get_template_directory_uri()."/fonts/fontawesome-webfont.eot?#iefix&v=4.7.0') format('embedded-opentype'), url('".get_template_directory_uri()."/fonts/fontawesome-webfont.woff2?v=4.7.0') format('woff2'), url('".get_template_directory_uri()."/fonts/fontawesome-webfont.woff?v=4.7.0') format('woff'), url('".get_template_directory_uri()."/fonts/fontawesome-webfont.ttf?v=4.7.0') format('truetype'), url('".get_template_directory_uri()."/fonts/fontawesome-webfont.svg?v=4.7.0#fontawesomeregular') format('svg');
		  font-weight: normal;
		  font-style: normal;
		}
		.font-awesome {
			font-family: 'FontAwesome';
		}
	</style>";
}
add_action('admin_head', 'fa_admin_fonts');


/* ---------------------------------------- */
/*      ADDING MENU PAGE AT THE BOTTOM      */
/* ---------------------------------------- */
/* add main menu page */
function add_settings_main_menu_page() {
  add_menu_page(
    'Contacts', // page_title
    'Contacts', // menu_title
    'manage_options', // capability
    'contacts', // menu_slug
    'contacts_render_admin_page', // function
    'dashicons-id-alt', // icon_url
    2 // position
  );
}
/* render options page */
function contacts_render_admin_page() {
		?>
		<div class="wrap">
			<h2>Contacts</h2>
			<br>
			<?php settings_errors(); ?>

			<form method="post" action="options.php">
				<?php
					settings_fields( 'contacts-group' );
					do_settings_sections( 'contacts' );
					submit_button();
				?>
			</form>
		</div>
	<?php }

add_action( 'admin_menu' , 'add_settings_main_menu_page' );



/* ---------------------------------------- */
/*       ADDING SECTIONS AND CONTROLS       */
/* ---------------------------------------- */
function adress_page_settings_init()
{

    // register a section in the  page
    add_settings_section(
        'adress_section', // section slug
        'Adress', // section header
        function () { ?>
          <p>Put here adress once and you can use in all site.</p>
          <p>
            Use shortcodes to put adresses to any part of the site: <b>[phone] [mail] [adress]</b> - for getting raw values<br>
            for ready markup use <b>[ contacts icon="true|false" show="all|phone|mail|adess" class="any_class" ]</b>
          </p>
        <?php },
        'contacts' // slug of the page
    );

    // register a setting
    register_setting(
      'contacts-group', // option group (defined with settings_fields() function)
      'site_phone' //settings name
    );
    // register field
    add_settings_field(
        'site_phone_field', // slug of the option use it as field id
        'Phone(s)', // name of the field
        function () { render_standart_text_input('site_phone'); }, //render field foo
        'contacts', // page where field renderend
        'adress_section' // section where field renderend
    );
    // register a setting
    register_setting(
      'contacts-group', // option group (defined with settings_fields() function)
      'site_mail' //settings name
    );
    // register field
    add_settings_field(
        'site_mail_field', // slug of the option use it as field id
        'Mail(s)', // name of the field
        function () { render_standart_text_input('site_mail'); }, //render field foo
        'contacts', // page where field renderend
        'adress_section' // section where field renderend
    );
    // register a setting
    register_setting(
      'contacts-group', // option group (defined with settings_fields() function)
      'site_adress' //settings name
    );
    // register field
    add_settings_field(
        'site_adress_field', // slug of the option use it as field id
        'Adress', // name of the field
        function () { render_standart_textarea_input('site_adress'); }, //render field foo
        'contacts', // page where field renderend
        'adress_section' // section where field renderend
    );



    // register a section in the  page
    add_settings_section(
        'social_links_section', // section slug
        'Social links', // section header
        function () { ?>
          <p>Put here social inks once and you can use in all site parts</p>
          <p>use <b> [ social_icons size_lass="fa-sm|fa-lg|fa-2x|fa-3x" circle="true|false" color_class="color-class" circle_color_class="color-class" ] </b>
        <?php },
        'contacts' // slug of the page
    );


    for ( $sl=1; $sl<=5; $sl++ ) {
      $current_si_class = 'social_icon_fa_class_'.$sl;
      $current_si_link = 'social_icon_fa_link_'.$sl;
      // register settings for field with two inputs
      register_setting(
        'contacts-group', // option group (defined with settings_fields() function)
        $current_si_class //settings name
      );
      register_setting(
        'contacts-group', // option group (defined with settings_fields() function)
        $current_si_link, //settings name
      );
      // register a field with two inputs
      add_settings_field(
          'social_links_group'.$sl, // slug of the option use it as field id
          'Social link '.$sl, // name of the field
          function () use ($current_si_class,$current_si_link) { render_double_text_input($current_si_class,$current_si_link); }, //render field foo
          'contacts', // page where field renderend
          'social_links_section' // section where field renderend
      );
    }


}
add_action('admin_init', 'adress_page_settings_init');


/* ---------------------------------------- */
/*        RENDER CONTROLS FUNCTIONS         */
/* ---------------------------------------- */

$fa_icons_list = [
  '' => ' --- ',
  'fa-envelope' => '&#xf0e0; Mail',
  'fa-envelope-o' => '&#xf003; Mail',
  'fa-phone' => '&#xf095; Phone',
  'fa-mobile' => '&#xf10b; Mobile',
  'fa-map-marker' => '&#xf041; Place',
  'fa-phone-square' => '&#xf098; Phone',
  'fa-facebook' => '&#xf09a; Facebook',
  'fa-youtube-play' => '&#xf16a; Youtube',
  'fa-instagram' => '&#xf16d; Instag',
  'fa-weibo' => '&#xf18a; Weibo',
  'fa-twitter' => '&#xf099; Twitter',
  'fa-reddit-alien' => '&#xf281; Reddit',
  'fa-pinterest-p' => '&#xf231; Pinterest',
  'fa-tumblr' => '&#xf173; Tumblr',
  'fa-flickr' => '&#xf16e; Flickr',
  'fa-google' => '&#xf1a0; Google',
  'fa-linkedin' => '&#xf0e1; Linkedin',
  'fa-vk' => '&#xf189; VK',
  'fa-odnoklassniki' => '&#xf263; Odnokl',
  'fa-meetup' => '&#xf2e0; Meetup',
  'fa-whatsapp' => '&#xf232; Whatsup',
  'fa-weixin' => '&#xf1d7; Weixin',
  'fa-qq' => '&#xf1d6; QQ',
  'fa-snapchat-ghost' => '&#xf2ac; Snapcht',
  'fa-telegram' => '&#xf2c6; Telegram',
  'fa-map' => '&#xf279; Map',
  'fa-globe' => '&#xf0ac; Globe',
  'fa-user' => '&#xf007; Person',
  'fa-volume-control-phone fa-rotate-315' => '&#xf2a0; Viber'
];
function render_standart_text_input( $name ) {
  echo '<input type="text" name="'.$name.'" class="regular-text code" value="'.get_option($name).'">';
}
function render_standart_textarea_input( $name ) {
  echo '<textarea rows="5" cols="55" class="regular-text code" name="'.$name.'" >'.get_option($name).'</textarea>';
}
function render_double_text_input( $name_1, $name_2 ) {
  global $fa_icons_list;
  $fa_val = get_option($name_1);
  echo '<select class="font-awesome" name="'.$name_1.'" id="'.$name_1.'-field">';
  foreach ( $fa_icons_list as $arr_key => $arr_value ) {
    if ( $fa_val == $arr_key) { $selected = "selected"; } else { $selected = ""; }
    echo '<option value="'.$arr_key.'" '.$selected.'>'.$arr_value.'</option>';
  };
  echo '</select>';
  echo '<input style="margin-left: 1rem" type="text" name="'.$name_2.'" class="regular-text code" value="'.get_option($name_2).'">';
}
