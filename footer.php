<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

	</div><!-- #main -->
</div><!-- #page -->

<div id="separador"></div>

<footer id="colophon" role="contentinfo">

	<div id="content-rodape">
	
	<div id="toggle-footer">

    <div class="slide"><a class="slide-btn" href="#"></a>

    </div>

   

</div>

    

<div id="panel">

				<?php
					/* A sidebar in the footer? Yep. You can can customize
					 * your footer with three columns of widgets.
					 */				
					if ( ! is_404() )
						get_sidebar( 'footer' );				
				?>

</div>




	<hr />
	<div id="dados-footer">
		<div id="descricao-footer"><?php bloginfo( 'name'); ?> - <?php echo date('Y'); ?></div>	   
	    <div id="licenca-footer">Alguns Direitos Reservados <a class="logo-cc" href="http://creativecommons.org/licenses/by-nc-sa/3.0/br/" target="_blank" alt="Sob uma licença Creative Commons">cc</a></div>
		</div>
		<div id="essencial">
			<div id="logo-wordpress"><a href="http://br.wordpress.org" target="_blank" class="a-logo-wordpress"></a></div>
			<div id="frase-footer">Design &eacute; Essencial</div>
		</div>
			</div><!-- #content-footer -->
	</footer><!-- #colophon -->
	
	<?php wp_footer(); ?>
</body>
</html>