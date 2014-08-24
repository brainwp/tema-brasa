<?php
/**
 * Template for displaying a portfolio post
 *
 * @package Portfolio Press
 */

get_header( 'portfolio' ); ?>

	<div id="primary">
		<div id="content" role="main">

		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<h1 class="entry-title"><?php the_title(); ?></h1>
				</header><!-- .entry-header -->

				<div class="entry-content">
                
                <div id="slider-single">
                
					<?php   
					$args = array(
						'post_type' => 'attachment',
						'numberposts' => 3,
						'post_status' => null,
						'post_parent' => $post->ID,
						'orderby' => 'menu_order'
					);

					$attachments = get_posts( $args );
					if ( $attachments ) {
						foreach ( $attachments as $attachment ) {
						  $attachment_page = get_attachment_link( $attachment->ID );
							echo '<div class="imagens-slider">';
							echo wp_get_attachment_link( $attachment->ID, 'thumb-municipios', $attachment_page, false, false );
							echo '</div>';
						  }
					 }
					?>               
                
                
				</div><!-- #slider-single -->
                
                <div id="conteudo-single">
                <?php the_content(); ?>
                </div><!-- #conteudo-single -->

				</div><!-- .entry-content -->

				<div id="editar-single">
				<?php edit_post_link( __( 'Editar', 'portfoliopress' ), '<span class="edit-link">', '</span>' ); ?>
				</div>
                
			</article><!-- #post-<?php the_ID(); ?> -->
            
            
            
            
            
            
            
            
            
			
			<nav id="nav-below">
				<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'portfolioplus' ); ?></h1>
				<div class="nav-previous"><?php previous_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Previous post link', 'portfolioplus' ) . '</span>' ); ?></div>
				<div class="nav-next"><?php next_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Next post link', 'portfolioplus' ) . '</span> %title' ); ?></div>
			</nav><!-- #nav-below -->

		<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>