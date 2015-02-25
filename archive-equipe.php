<?php
/**
 * Template Name: Archive Equipe
 * Description: A full-width template with no sidebar
 *
 * @package Tema Brasa
 */

get_header('page'); ?>

		<div id="primary">
			<div id="content" role="main">
				<article>
					<header class="entry-header">
					<h1 class="entry-title">
						<?php
							if ( $title = get_option('team_title') ) {
								echo $title;
							} else {
								echo "Equipe Brasa";
							}
						?>
					</h1>
				    </header><!-- .entry-header -->
				    
				    <?php while ( have_posts() ) : the_post(); ?>

				        <?php get_template_part( 'content', 'team' ); ?>
 
       				<?php endwhile; // end of the loop. ?>

				</article>
			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer('simples'); ?>