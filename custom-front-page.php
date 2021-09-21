<?php
/**
 * 
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>

<div class="wrapper pt-0" id="page-wrapper">

	<div id="content">

		<main class="site-main" id="main">
			
			<p>Custom Front Page</p>

			<?php while ( have_posts() ) : the_post(); ?>




				<?php
				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'loop-templates/content', get_post_format() );
				?>





				<!-- # Page Content -->

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->

	</div><!-- #content -->

</div><!-- #page-wrapper -->

<?php get_footer(); ?>
