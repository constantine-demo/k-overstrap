<?php


function add_contacts_shortcode($atts) {
	$atts = shortcode_atts( [
		'icon' => false,
		'class' => 'default-style',
		'show' => 'all'
	], $atts, 'button' );
	if ( $atts['show']=='all' ) { $wrapper_tag="div"; } else { $wrapper_tag="span"; };
	$o = '<'.$wrapper_tag.' class="site-contacts '.$atts['class'].'">';
	if ( get_option('site_phone') && ( $atts['show']=='all' || $atts['show']=='phone' ) ) {
		$icon_before = '';
		$icon_after = '';
		if ( $atts['icon'] == true ) {
			$icon_before = '<i class="fa fa-phone icon-shortcode-phone" aria-hidden="true"></i><span class="icon-description">';
			$icon_after = '</span>';
		}
		$o .= '<'.$wrapper_tag.' class="adress-shortcode adress-shortcode-phone">'.$icon_before.get_option('site_phone').$icon_after.'</'.$wrapper_tag.'>';
	};
	if ( get_option('site_mail') && ( $atts['show']=='all' || $atts['show']=='mail' ) ) {
		$icon_before = '';
		$icon_after = '';
		if ( $atts['icon'] == true ) {
			$icon_before = '<i class="fa fa-envelope icon-shortcode-mail" aria-hidden="true"></i><span class="icon-description">';
			$icon_after = '</span>';
		};
		$o .= '<'.$wrapper_tag.' class="adress-shortcode adress-shortcode-mail">'.$icon_before.get_option('site_mail').$icon_after.'</'.$wrapper_tag.'>';
	}
	if ( get_option('site_adress') && ( $atts['show']=='all' || $atts['show']=='adress' ) ) {
		$icon_before = '';
		$icon_after = '';
		if ( $atts['icon'] == true ) {
			$icon_before = '<i class="fa fa-map-marker icon-shortcode-location" aria-hidden="true"></i><span class="icon-description">';
			$icon_after = '</span>';
		}
		$o .= '<'.$wrapper_tag.' class="adress-shortcode adress-shortcode-location">'.$icon_before.get_option('site_adress').$icon_after.'</'.$wrapper_tag.'>';
	};
	$o .= '</'.$wrapper_tag.'>';
  return $o;
}
add_shortcode('contacts', 'add_contacts_shortcode');

add_shortcode('phone', function() { return get_option('site_phone'); } );
add_shortcode('mail', function() { return get_option('site_mail'); } );
add_shortcode('adress', function() { return get_option('site_adress'); } );
add_shortcode('year', function() { return date('Y', time()); } );
add_shortcode('date', function() { return date('m/d/Y', time()); } );

function add_social_shortcode($atts) {
	$atts = shortcode_atts( [
		'class' => 'default-style',
		'circle' => false,
		'circle_color_class' => 'text-secondary',
		'color_class' => 'default-social-icon-color',
		'size_class' => 'fa-lg',
	], $atts, 'button' );

	$s = '<div class="social-icon-shortcode social-icon-set '.$atts['class'].'">';
  for ( $sl=1; $sl<=5; $sl++ ) {
		$current_si_class = 'social_icon_fa_class_'.$sl;
		$current_si_link = 'social_icon_fa_link_'.$sl;
		if ( get_option( $current_si_class ) and get_option( $current_si_link ) ) {
			$s .= '<a href="'.get_option( $current_si_link ).'">';
			if ( $atts['circle'] ) $s .= '<span class="fa-stack '.$atts['size_class'].'"><i class="fa fa-circle fa-stack-2x '.$atts['circle_color_class'].'"></i>';
			$add_class = ($atts['circle']) ? 'with-circle fa-stack-1x' : 'no-circle '.$atts['size_class'];
			$s .= '<i class="fa '.get_option( $current_si_class ).' '.$add_class.' '.$atts['color_class'].'" aria-hidden="true"></i>';
			if ( $atts['circle'] ) $s .= '</span>';
			$s .= '</a>';
		}
	}
	$s .= '</div>';

  return $s;
}
add_shortcode('social_icons', 'add_social_shortcode');


function add_primary_button_shortcode( $atts ) {
    $atts = shortcode_atts( [
			'href' => '#',
			'name' => 'Button'
		], $atts, 'button' );
    return '<a href="'.$atts['href'].'" class="btn btn-primary btn-shortcode">'.$atts['name'].'</a>';
}
add_shortcode( 'button', 'add_primary_button_shortcode' );


function add_secondary_button_shortcode( $atts ) {
    $atts = shortcode_atts( [
			'href' => '#',
			'name' => 'Button'
		], $atts, 'button' );
    return '<a href="'.$atts['href'].'" class="btn btn-secondary btn-shortcode">'.$atts['name'].'</a>';
}
add_shortcode( 'button_secondary', 'add_secondary_button_shortcode' );
