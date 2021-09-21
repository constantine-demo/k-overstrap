<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! is_active_sidebar( 'left-sidebar' ) ) {
	return;
}

?>

<div class="col-md-3 widget-area" id="left-sidebar" role="complementary">

	<?php dynamic_sidebar( 'left-sidebar' ); ?>

</div><!-- #left-sidebar -->
