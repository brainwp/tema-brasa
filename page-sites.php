<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Tema Brasa
 * @since Twenty Eleven 1.0
 */

get_header('page'); ?>

<div id="primary">
	<div id="content" role="main">
	<?php
	$sites = wp_get_sites();
	foreach($sites as $site): switch_to_blog($site['blog_id']); ?>
	    <ul id="sites">
	       <?php get_template_part('content','sites');?>
	    </ul><!-- #sites -->
	<?php endforeach; ?>

</div><!-- #content -->
</div><!-- #primary -->

<?php get_footer('simples'); ?>
