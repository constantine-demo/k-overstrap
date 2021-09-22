<!-- ******************* The Navbar Area ******************* -->

<?php
	defined( 'ABSPATH' ) || exit;
	$nav_expand = get_theme_mod( 'nav_expand_size', 'md' );
?>

<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>

<div class="d-none d-<?=$nav_expand?>-block upper-site-navbar<?php echo $menu_bg_color_class.$menu_text_color_class; ?>">
	<div class="container py-2 px-3 border-bottom border-dark d-flex justify-content-between align-items-center">
		<!-- Output site logo -->
		<?php site_logo(); ?>
		<div class="left-top-menu d-flex justify-content-center align-items-center">
			<?php if(function_exists("get_product_search_form")) get_product_search_form(); ?>
			<?php wp_nav_menu(
				array(
					'theme_location'  => 'additional-menu',
					'container_class' => 'navbar navbar-expand',
					'container_id'    => 'navbarNavDropdown',
					'menu_class'      => 'navbar-nav',
					'fallback_cb'     => '',
					'menu_id'         => 'additional-menu',
					'depth'           => 2,
					'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
				)
			); ?>
			<?php if (class_exists('WooCommerce')) echo do_shortcode("[account_icon][cart_icon]"); ?>
		</div>
	</div>
</div>

<!-- Bootstrap navbar goes here -->
<nav class="d-none d-<?=$nav_expand?>-block site-custom-navbar navbar navbar-expand<?php echo $menu_bg_color_class.$menu_text_color_class; ?>">

  <div class="container">

    <!-- The WordPress Menu goes here -->
    <?php wp_nav_menu(
      array(
        'theme_location'  => 'primary',
        'container_class' => 'mx-auto',
        'menu_class'      => 'nav navbar-nav mx-auto text-uppercase',
        'fallback_cb'     => '',
        'menu_id'         => 'main-menu',
        'depth'           => 2,
        'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
      )
    ); ?>

  </div><!-- .container -->

</nav>


<!-- MOBILE MENU -->

<div class="menu-placeholder d-<?=$nav_expand?>-none"></div>

<nav class="fixed-top d-block d-<?=$nav_expand?>-none mobile-navbar navbar<?php echo $nav_expand_size_class.$menu_bg_color_class.$menu_text_color_class; ?>">

  <div class="container">

    <?php the_site_identity() ?>

		<div class="toggler-group d-flex align-items-center">
			<?php if (class_exists('WooCommerce')) echo do_shortcode("[account_icon][cart_icon]"); ?>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
	      <span class="navbar-toggler-icon"></span>
	    </button>
		</div>

    <!-- The WordPress Menu goes here -->
    <?php wp_nav_menu(
      array(
        'theme_location'  => 'main-menu-mobile',
        'container_class' => 'collapse navbar-collapse',
        'container_id'    => 'navbarNavDropdown',
        'menu_class'      => 'navbar-nav ml-auto',
        'fallback_cb'     => '',
        'menu_id'         => 'main-mobile-menu',
        'depth'           => 2,
        'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
      )
    ); ?>

  </div>

</nav>


<?php /*
<!-- Add class if scolled -->
<script>
  jQuery(function($) {
      $(window).on('scroll', function() {
      if ($(this).scrollTop() >= 10) { $('.site-custom-navbar').addClass('scrolled'); }
      else if ($(this).scrollTop() == 0) { $('.site-custom-navbar').removeClass('scrolled'); }
    });
  });
</script>
*/ ?>

<!-- #Navbar Area -->
