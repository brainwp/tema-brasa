<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage Tema Brasa
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
	<?php if ( ! is_active_sidebar( 'sidebar-6' ) )
		return; ?>
<div id="supplementary" class="widget-area" role="complementary">
	<?php if ( is_active_sidebar( 'sidebar-6' ) ) : ?>
	<div class="first front-widgets">
		<?php dynamic_sidebar( 'sidebar-6' ); ?>
	</div><!-- .first -->
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'sidebar-7' ) ) : ?>
	<div class="second front-widgets">
		<?php dynamic_sidebar( 'sidebar-7' ); ?>
	</div><!-- .second -->
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'sidebar-8' ) ) : ?>
	<div class="last front-widgets">
		<?php dynamic_sidebar( 'sidebar-8' ); ?>
	</div><!-- .last -->
	<?php endif; ?>

</div><!-- #supplementary -->

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
