<!-- ******************* The Navbar Area ******************* -->
<?php $container = get_theme_mod( 'understrap_container_type' ); ?>
<?php

global $default_styles;
$p_color = get_theme_mod( 'primary_color', $default_styles['primary_color'] );
$s_color = get_theme_mod( 'secondary_color', $default_styles['secondary_color'] );
function get_opacity_colors( $arg, $p_color, $s_color ) {
	switch ( $arg ) {
		case "bg-primary-25": return hexToRgb( $p_color, 0.25 );
		case "bg-primary-50": return hexToRgb( $p_color, 0.5 );
		case "bg-primary-100": return $p_color;
		case "bg-secondary-25": return hexToRgb( $s_color, 0.25 );
		case "bg-secondary-50": return hexToRgb( $s_color, 0.5 );
		case "bg-secondary-100": return $s_color;
		case "bg-white-10": return hexToRgb( "#fdfdfe", 0.1 );
		case "bg-white-25": return hexToRgb( "#fdfdfe", 0.25 );
		case "bg-white-50": return hexToRgb( "#fdfdfe", 0.5 );
		case "bg-white-100": return "#fdfdfe";
		case "bg-dark-10": return hexToRgb( "#444444", 0.1 );
		case "bg-dark-25": return hexToRgb( "#444444", 0.25 );
		case "bg-dark-50": return hexToRgb( "#444444", 0.5 );
		case "bg-dark-100": return "#444444";
	}
	return 'transparent';
}
$transparent_color = get_opacity_colors( get_theme_mod( 'opacity_nav_color_bg_class', 'bg-dark-50' ), $p_color, $s_color );
$opacity_before_nav_color_main = get_opacity_colors( get_theme_mod( 'opacity_before_nav_color_bg_class', 'bg-dark-25' ), $p_color, $s_color );
$is_tranparent_on_homepage = get_theme_mod( 'menu_sticky_only_front_page', true );
?>

<div id="wrapper-navbar" class="" itemscope itemtype="http://schema.org/WebSite">

	<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>

	<div class="transparent-sticky"><!-- site-navigation-wrapper -->

		<?php if ( get_option('content_above_navbar') or is_customize_preview() ) : ?>
		  <div class="content-above-navbar-wrapper header-top-line overflow-auto">
		    <div class="content-above-navbar-custom<?php echo ( 'container' == $container ) ? ' container' : ''; ?> ">
		      <?php echo do_shortcode(get_option('content_above_navbar')); ?>
		    </div>
		  </div>
		<?php endif; ?>

		<nav class="navbar py-lg-3 <?php echo $nav_expand_size_class.$menu_bg_color_class.$menu_text_color_class; ?>">

			<?php if ( 'container' == $container ) : ?>
				<div class="container">
			<?php endif; ?>

				<!-- Your site title as branding in the menu -->
				<?php the_site_identity() ?>
				<!-- end custom logo -->

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
					<span class="navbar-toggler-icon"></span>
				</button>

				<!-- The WordPress Menu goes here -->
				<?php wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'container_class' => 'collapse navbar-collapse',
						'container_id'    => 'navbarNavDropdown',
						'menu_class'      => 'navbar-nav ml-auto',
						'fallback_cb'     => '',
						'menu_id'         => 'main-menu',
						'depth'           => 2,
						'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
					)
				); ?>
			<?php if ( 'container' == $container ) : ?>
			</div><!-- .container -->
			<?php endif; ?>

		</nav><!-- .site-navigation -->

	</div><!-- .site-navigation-wrapper -->


	<script>
		jQuery(function($) {
		    $(window).on('scroll', function() {
				if ($(this).scrollTop() >= 300) {
					$('.transparent-sticky').addClass('fixed');
					$('.transparent-sticky .navbar').addClass('bg-lg-transparent');
					$('.transparent-sticky .navbar').removeClass('py-lg-3');
					$('.transparent-sticky .header-top-line').addClass('d-none');
				} else if ($(this).scrollTop() == 0) {
					$('.transparent-sticky').removeClass('fixed');
					$('.transparent-sticky .navbar').addClass('py-lg-3');
					$('.transparent-sticky .header-top-line').removeClass('d-none');
					if (typeof setPlaceholderHeight == 'function') { setPlaceholderHeight(); }
				}
			});

			<?php if ( $is_tranparent_on_homepage and !is_front_page()  ) : ?>
			function setPlaceholderHeight() {
				$('body').css({"margin-top": $('.transparent-sticky').outerHeight()+"px"});
			}
			setPlaceholderHeight();
			$(window).on('resize', setPlaceholderHeight);
			<?php endif ?>

		});
	</script>
	<style>
		<?php if ( !($is_tranparent_on_homepage and !is_front_page())  ) : ?>
		.transparent-sticky:not(.fixed) .navbar { background-color: <?php echo $transparent_color; ?>!important; }
		<?php endif ?>
		.transparent-sticky .header-top-line { background-color: <?php echo $opacity_before_nav_color_main; ?>!important; }
	</style>

</div><!-- #wrapper-navbar end -->
