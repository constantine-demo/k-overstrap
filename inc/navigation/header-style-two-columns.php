<!-- ******************* The Navbar Area ******************* -->
<?php defined( 'ABSPATH' ) || exit; ?>
<?php $container = get_theme_mod( 'understrap_container_type' ); ?>

<div class="header-upper py-3 px-2<?php echo $content_above_navbar_bg_color.$nav_expand_size_class?>">

  <a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>

  <?php if ( 'container' == $container ) : ?>
    <div class="container">
  <?php endif; ?>

      <div class="header-wrapper wrapper-2columns d-flex align-items-center <?= (get_option('content_above_navbar')) ? "justify-content-between" : "justify-content-center" ?>">

        <?php the_site_identity() ?>

        <?php if ( get_option('content_above_navbar') or is_customize_preview() ) : ?>
          <div class="content-above-navbar-custom text-right">
            <?php echo do_shortcode(get_option('content_above_navbar')); ?>
          </div>
        <?php endif; ?>

      </div>

  <?php if ( 'container' == $container ) : ?>
    </div><!-- .container -->
  <?php endif; ?>

</div>

<nav class="navbar<?php echo $nav_expand_size_class.$fixed_top_navbar_class.$menu_bg_color_class.$menu_text_color_class; ?>">

  <?php if ( 'container' == $container ) : ?>
    <div class="container">
  <?php endif; ?>

    <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- The WordPress Menu goes here -->
    <?php wp_nav_menu(
      array(
        'theme_location'  => 'primary',
        'container_class' => 'collapse navbar-collapse',
        'container_id'    => 'navbarNavDropdown',
        'menu_class'      => 'navbar-nav mx-auto',
        'fallback_cb'     => '',
        'menu_id'         => 'main-menu',
        'depth'           => 3,
        'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
      )
    ); ?>

  <?php if ( 'container' == $container ) : ?>
  </div><!-- .container -->
  <?php endif; ?>

</nav><!-- .site-navigation -->

<script>
jQuery(document).ready(function($) {

  const stuckClass = 'is-stuck';
  const $stickyTopElements = $('.sticky-top');
  const $stickyBottomElements = $('.sticky-bottom');

  const determineSticky = () => {
    $stickyTopElements.each((i, el) => {
      const $el = $(el);
      const stickPoint = parseInt($el.css('top'), 10);
      const currTop = el.getBoundingClientRect().top;
      const isStuck = currTop <= stickPoint;
      $el.toggleClass(stuckClass, isStuck);
    });

    $stickyBottomElements.each((i, el) => {
      const $el = $(el);
      const stickPoint = parseInt($el.css('bottom'), 10);
      const currBottom = el.getBoundingClientRect().bottom;
      const isStuck = currBottom + stickPoint >= window.innerHeight;
      $el.toggleClass(stuckClass, isStuck);
    });
  };

  //run immediately
  determineSticky();

  //Run when the browser is resized or scrolled
  //Uncomment below to run less frequently with a debounce
  //let debounce = null;
  $(window).on('resize scroll', () => {
    //clearTimeout(debounce);
    //debounce = setTimeout(determineSticky, 100);

    determineSticky();
  });

});
</script>
