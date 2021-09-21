<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<!-- ******************* OG Meta ******************* -->
	<meta property="og:url" content="<?php echo get_site_url(); ?>"/>
	<meta property="og:title" content="<?php echo bloginfo( 'name' ); ?>"/>
	<meta property="og:image" content="<?php echo get_site_icon_url(); ?>"/>
	<meta property="og:description" content="<?php echo bloginfo( 'description' ); ?>"/>
	<?php wp_head(); ?>
	<?php print_bootstrap_custom_styles(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<div class="site" id="page">

<?php megastrap_navigation(); ?>
