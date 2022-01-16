<!-- ******************* The Navbar Area ******************* -->
<!-- ******************* The Navbar Area ******************* -->
<?php defined( 'ABSPATH' ) || exit; ?>
<?php $container = get_theme_mod( 'understrap_container_type' ); ?>

<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>

<?php if ( get_option('content_above_navbar') or is_customize_preview() ) : ?>
  <div class="content-above-navbar-wrapper<?php echo $content_above_navbar_bg_color; ?>">
    <div class="content-above-navbar-custom<?php echo ( 'container' == $container ) ? ' container' : ''; ?> ">
      <?php echo do_shortcode(get_option('content_above_navbar')); ?>
    </div>
  </div>
<?php endif; ?>

<nav class="navbar<?php echo $nav_expand_size_class.$menu_bg_color_class.$menu_text_color_class; ?>">

<?php if ( 'container' == $container ) : ?>
  <div class="container">
<?php endif; ?>

    <?php the_site_identity() ?>

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

</nav>
<!-- #site-navigation -->
