<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="footer-wrapper<?php echo $footer_color_bg_class.$footer_text_color_class; ?>" id="wrapper-footer">

  <?php if ( get_option('content_above_footer') or is_customize_preview() ) : ?>
    <div class="content-above-footer-wrapper<?php echo $above_footer_color_bg_class.$above_footer_text_color_class; ?>">
      <div class="content-above-footer-custom<?php echo ( 'container' == $container ) ? ' container' : ''; ?> ">
        <?php echo do_shortcode( get_option('content_above_footer') ); ?>
      </div>
    </div>
  <?php endif; ?>

  <?php if( is_active_sidebar( 'footer-1' ) or is_active_sidebar( 'footer-2' ) or is_active_sidebar( 'footer-3' ) ): ?>
	<div class="<?php echo esc_attr( $container ); ?>">
		<div class="row pt-4<?php echo $footer_color_bg_class.$footer_text_color_class.$footer_widget_valign_class; ?>">
			<div class="col-12 col-<?=$footer_expand_size?>-4 d-flex flex-column">
			  <ul class="widgets">
				<?php dynamic_sidebar( 'footer-1' ); ?>
			  </ul>
			</div><!--col end -->
			<div class="col-12 col-<?=$footer_expand_size?>-4 d-flex flex-column">
			  <ul class="widgets">
				<?php dynamic_sidebar( 'footer-2' ); ?>
			  </ul>
			</div><!--col end -->
			<div class="col-12 col-<?=$footer_expand_size?>-4 d-flex flex-column">
			  <ul class="widgets">
				<?php dynamic_sidebar( 'footer-3' ); ?>
			  </ul>
			</div><!--col end -->
		</div><!-- row end -->
	</div><!-- container end -->
  <?php endif; ?>

  <?php if ( get_option('content_after_footer') or is_customize_preview() ) : ?>
    <div class="content_after-footer-wrapper<?php echo $after_footer_color_bg_class.$after_footer_text_color_class; ?>">
      <div class="content-after-footer-custom<?php echo ( 'container' == $container ) ? ' container' : ''; ?> ">
        <?php echo do_shortcode( get_option('content_after_footer') ); ?>
      </div>
    </div>
  <?php endif; ?>

  <?php if ( get_option('copyright_footer') or is_customize_preview() ) : ?>
    <div class="copyright-footer-footer-wrapper<?php echo $copyright_footer_color_bg_class.$copyright_footer_text_color_class; ?>">
      <div class="copyright-footer-custom<?php echo ( 'container' == $container ) ? ' container' : ''; ?> ">
        <?php echo do_shortcode( get_option('copyright_footer') ); ?>
      </div>
    </div>
  <?php endif; ?>

</div><!-- wrapper end -->
