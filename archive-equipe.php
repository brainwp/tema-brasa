<?php
/**
 * Template Name: Archive Equipe
 * Description: A full-width template with no sidebar
 *
 * @package Tema Brasa
 */

get_header(); ?>

	<div id="primary" class="full-width">
		<div id="content" role="main">

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header intro">
					<h1 class="entry-title">
						<?php
							if ( $title = get_option('team_title') ) {
								echo $title;
							} else {
								echo "Equipe Brasa";
							}
						?>
					</h1>
					<p class="lead"><?php echo get_option('team_subtitle'); ?></p><!-- .lead -->
				</header><!-- .entry-header -->

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'team' ); ?>

				<?php endwhile; ?>

			</article><!-- #post-<?php the_ID(); ?> -->

			<?php comments_template( '', true ); ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer('simples'); ?>
