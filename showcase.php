<?php
/**
 * Template Name: Showcase Template
 * Description: A Page Template that showcases Sticky Posts, Asides, and Blog Posts
 *
 * The showcase template in Twenty Eleven consists of a featured posts section using sticky posts,
 * another recent posts area (with the latest post shown in full and the rest as a list)
 * and a left sidebar holding aside posts.
 *
 * We are creating two queries to fetch the proper posts and a custom widget for the sidebar.
 *
 * @package WordPress
 * @subpackage Tema Brasa
 * @since Twenty Eleven 1.0
 */

// Enqueue showcase script for the slider
wp_enqueue_script( 'twentyeleven-showcase', get_stylesheet_directory_uri() . '/js/showcase.js', array( 'jquery' ), '2011-04-28' );

get_header('home'); ?>

<div id="intro-bloco">
					
				<?php while ( have_posts() ) : the_post(); ?>

				<?php endwhile; ?>
					<?php
					/**
					 * We are using a heading by rendering the_content
					 * If we have content for this page, let's display it.
					 */
					if ( '' != get_the_content() )
						get_template_part( 'content', 'intro' );
				?>
						</div>
	
		<nav id="access" role="navigation">
				<h3 class="assistive-text"><?php _e( 'Main menu' ); ?></h3>
				<?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff. */ ?>
				<div class="skip-link"><a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to primary content' ); ?>"><?php _e( 'Skip to primary content' ); ?></a></div>
				<div class="skip-link"><a class="assistive-text" href="#colophon" title="<?php esc_attr_e( 'Skip to secondary content' ); ?>"><?php _e( 'Skip to secondary content' ); ?></a></div>
				<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu. The menu assiged to the primary position is the one used. If none is assigned, the menu with the lowest ID is used. */ ?>
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #access -->


		<div id="primary" class="showcase">
			<div id="content" role="main">
		<div class="vimeo-container">
			<iframe clas="vimeo-home" src="//player.vimeo.com/video/84648861?title=0&amp;byline=0&amp;portrait=0&amp;color=b843a6" width="845" height="475" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
		</div>
			<div id="separador"></div>	
								
				<section class="botoes-home"><p></p>
					<a class="PortfolioAnchor" href="#PortfolioAnchor"><h1 class="portfolio-heading">Portfólio</h1></a>

				<a href="http://web.brasa.art.br">				
				<div id="botao-web">
				<span class="link-web">Web</span>
				</div>
				</a>
	
				<a href="http://design.brasa.art.br">
				<div id="botao-design">
				<span class="link-design">Design</span>
				</div>
				</a>
	
				
				<a href="http://cultura.brasa.art.br">			
				<div id="botao-cultura">
				<span class="link-cultura">Cultura</span>
				</div>
				</a>
				
				</section><!-- .botoes-home -->

				<div id="separador"></div>				
				<h1 class="portfolio-heading">Destaques</h1>

				<div class="featured-posts">
					<?php echo do_shortcode( '[metaslider id=1240]' ); ?>
				</div><!-- .featured-posts -->

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>
