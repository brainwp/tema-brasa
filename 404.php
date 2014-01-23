<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

	<div id="primary">
		<div id="content" role="main">

			<article id="post-0" class="post error404 not-found">
				<header class="entry-header">
					<h1 class="entry-title-roxo">404</h1>
					<h1 class="entry-title"><?php _e( 'This is somewhat embarrassing, isn&rsquo;t it?', 'twentyeleven' ); ?></h1>
				</header>

				<div class="entry-content">
					<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching, or one of the links below, can help.', 'twentyeleven' ); ?></p>
				</div><!-- .entry-content -->
			</article><!-- #post-0 -->
			
									<?php get_search_form(); ?>
				
		</div><!-- #content -->
									
						<section class="botoes-home">					
						
					<a class="PortfolioAnchor" href="#PortfolioAnchor"><h1 class="portfolio-heading">Portfolio</h1></a>
				
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
		
	</div><!-- #primary -->

<?php get_footer('simples'); ?>
