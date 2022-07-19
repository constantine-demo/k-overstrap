<?php
/**
 * Template name: Bootstrap builder
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>

<div class="wrapper oveflow-hidden py-0 my-0" id="page-wrapper">

	<main class="site-main py-0 my-0" id="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<!-- # Page Content -->

			<?php the_content(); ?>

		<?php endwhile; // end of the loop. ?>

	</main><!-- #main -->

</div><!-- #page-wrapper -->

<?php get_footer(); ?>
