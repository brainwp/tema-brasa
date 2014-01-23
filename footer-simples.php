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

    	<hr />
		<div id="dados-footer">
			<div id="descricao-footer"><?php bloginfo( 'name'); ?> - <?php echo date('Y'); ?></div>	   
			<div id="licenca-footer"><?php echo stripslashes (get_option('mo_licenca')); ?><a class="logo-cc" href="http://creativecommons.org/licenses/by-nc-sa/3.0/br/" target="_blank">cc</a></div>
		</div>
		<div id="essencial">
			<div id="logo-wordpress"><a href="http://brasa.art.br/sobre-wordpress/" target="_self" class="a-logo-wordpress"></a></div>
			<div id="frase-footer"><?php echo stripslashes (get_option('mo_frase')); ?></div>
		</div>
	</div><!-- #content-footer -->

</footer><!-- #colophon -->
	
	<?php wp_footer(); ?>
</body>
</html>
