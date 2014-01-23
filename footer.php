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
	
		<div class="fb-like" data-href="http://brasa.art.br" data-send="false" data-layout="button_count" data-width="150" data-show-faces="false">
				<iframe src="//www.facebook.com/plugins/like.php?locale=pt_BR&amp;href=http%3A%2F%2Ffacebook.com/BrasaDesign%2F&amp;send=false&amp;layout=button_count&amp;width=120&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font=lucida+grande&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:120px; height:21px;"></iframe>
	</div>	

    <div class="slide"><a class="slide-btn" href="#"></a>

    </div>

   

</div>

    

<div id="panel">
				<?php
					/* A sidebar in the footer.
					 * your footer with three columns of widgets.
					 */				
						get_sidebar( 'footer' );				
				?>

</div>

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
