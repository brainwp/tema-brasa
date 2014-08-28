<?php
/**
 * This template displays portfolio post content
 *
 * @package Portfolio Press
 */

if ( post_password_required() ) {
	echo get_the_password_form();
} else {
	// Set the size of the thumbnails and content width
	$fullwidth = true;
	
	// Query posts if this is being used as a page template
	if ( is_page_template() ) {
	
		global $paged;
	
		if ( get_query_var( 'paged' ) )
			$paged = get_query_var( 'paged' );
		elseif ( get_query_var( 'page' ) )
			$paged = get_query_var( 'page' );
		else
			$paged = 1;
			
		$args = array(
			'post_type' => 'portfolio',
			'posts_per_page' => 16,
			'paged' => $paged );
		query_posts( $args );
	}
?>
<div id="coluna-direita">
<div id="portfolio"<?php if ( $fullwidth ) { echo ' class="full-width"'; }?>>

	<?php  if ( have_posts() ) : $count = 0;
		while ( have_posts() ) : the_post(); $count++;
		$classes = 'portfolio-item item-' . $count;
		if ( $count % 3 == 0 ) {
			$classes .= ' ie-col3';
		}
		if ( !has_post_thumbnail() ) {
			$classes .= ' no-thumb';
		} ?>
		<div class="<?php echo $classes; ?>">
			<?php if ( has_post_thumbnail() ) { ?>
			<a href="<?php the_permalink() ?>" rel="bookmark" class="thumb"><?php the_post_thumbnail( 'galeria' ); ?></a>
			<?php } ?>
			<a href="<?php the_permalink() ?>" rel="bookmark" class="title-overlay cont"><?php the_title() ?></a>

		</div>

		<?php endwhile; ?>

		<?php /* Display navigation to next/previous pages when applicable */ ?>
		<?php global $wp_query;  
		$total_pages = $wp_query->max_num_pages;  
		if ($total_pages > 1){  
		  $current_page = max(1, get_query_var('paged'));  
		  echo '<div class="page_nav">';  
		  echo paginate_links(array(  
			  'base' => get_pagenum_link(1) . '%_%',  
			  'format' => 'page/%#%',  
			  'current' => $current_page,  
			  'total' => $total_pages,  
			  'prev_text' => '<< Anteriores',  
			  'next_text' => 'Pr&oacute;ximos >>'  
			));  
		  echo '</div>';  
		} 
		?>
			
		<?php else: ?>

			<h2 class="title"><?php _e( 'Sua pesquisa acabou sem resultados.', 'portfoliopress' ) ?></h2>

	<?php endif; ?>
</div><!-- #portfolio -->
</div><!-- #coluna-direita -->
<?php } ?>
