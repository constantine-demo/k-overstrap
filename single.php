<?php
/**
 * The template for displaying all single posts.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="single-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

				<?php while ( have_posts() ) : the_post(); ?>
					<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

						<header class="entry-header">
							<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
							<div class="entry-meta mb-2">
								<?php understrap_posted_on(); ?>
							</div><!-- .entry-meta -->
						</header><!-- .entry-header -->

						<?php echo get_the_post_thumbnail( $post->ID, 'large', [ 'class'=>'mb-3' ] ); ?>

						<div class="entry-content">
							<?php the_content(); ?>
							<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),  ) ); ?>
						</div><!-- .entry-content -->

						<footer class="entry-footer mb-3">
							<?php understrap_entry_footer(); ?>
						</footer><!-- .entry-footer -->

					</article><!-- #post-## -->
					<?php understrap_post_nav(); ?>
					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>
				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #single-wrapper -->

<?php get_footer(); ?>
