<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php if ( is_front_page() && is_home() ) : ?>
	<?php get_template_part( 'global-templates/hero' ); ?>
<?php endif; ?>

<div class="wrapper" id="index-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check and opens the primary div -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">
					<div class="container">
						<div class="row pt-4">
							<?php if ( have_posts() ) : ?>
							<?php /* Start the Loop */ ?>
							<?php while ( have_posts() ) : the_post(); ?>
							<div class="col-12 col-sm-8 col-md-6 col-lg-4 mb-4">
								<div class="card h-100 shadow" id="post-<?php the_ID(); ?>" >
									<a href="<?php echo get_permalink(); ?>" >
										<?php the_post_thumbnail('thumbnail', array('class' => 'card-img-top')); ?>
									</a>
									<div class="card-body d-flex flex-column p-3">
										<?php the_title( sprintf( '<h2 class="h4 card-title"><a href="'.get_permalink().'" >', esc_url( get_permalink() ) ), '&nbsp;>></a></h2>' ); ?>
										<div class="card-subtitle mt-auto text-muted">
											<?php echo get_the_date(); ?>
										</div><!-- .entry-meta -->
										<?php // the_excerpt(); ?>
									</div>
								</div>
							</div>
							<?php endwhile; ?>
						</div>
				  </div>
				<?php else : ?>
					<?php get_template_part( 'loop-templates/content', 'none' ); ?>
				<?php endif; ?>
			</main><!-- #main -->

			</main><!-- #main -->

			<!-- The pagination component -->
			<?php understrap_pagination(); ?>

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #index-wrapper -->

<?php get_footer(); ?>
