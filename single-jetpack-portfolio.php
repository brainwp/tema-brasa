<?php
/**
 * Template for displaying a portfolio post
 *
 * @package Portfolio Press
 */

get_header( 'portfolio' ); ?>

	<div id="coluna-direita">
		<div id="content">

			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<h1 class="entry-title"><?php the_title(); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">

						<div id="slider-single">

							<div class="list_carousel">
								<ul id="foo2">
									<?php
									$args = array(
										'post_type' => 'attachment',
										'numberposts' => -1,
										'post_status' => null,
										'post_parent' => $post->ID,
										'orderby' => 'rand'
									);

									$anexos = get_posts ( $args );

									if ( $anexos ) {
										foreach ( $anexos as $anexo ) { ?>

											<?php
											$attachment_id = $anexo->ID;
											$image_attributes = wp_get_attachment_image_src( $attachment_id, 'galeria' );
											$attachment_page = get_attachment_link( $attachment_id );
											$description = $anexo->post_content;
											$url = wp_get_attachment_url( $attachment_id );
											?>
											<li>
												<?php /* if ($description):
                            echo '<div id="desc-slide">' . $description . '</div>';
                            endif; */ ?>
												<a href="<?php echo $url; ?>" class="thickbox image">
													<span class="roll"><p class="p-roll">Ampliar</p></span>
													<img src="<?php echo $image_attributes[0]; ?>" width="<?php echo $image_attributes[1]; ?>" height="<?php echo $image_attributes[2]; ?>" alt="<?php echo apply_filters('the_title', $anexo->post_title); ?>"></a>
											</li>
										<?php } } ?>
								</ul>
								<div class="clearfix"></div>
								<a class="prev" id="prev2" href="#"><span>anterior</span></a>
								<a class="next" id="next2" href="#"><span>seguinte</span></a>
							</div>

						</div><!-- #slider-single -->

						<div id="conteudo-single">
							<?php the_content(); ?>
						</div><!-- #conteudo-single -->


						<?php
						// Pega os dados e salva em variáveis
						$metabrasa_url = get_post_meta($post->ID,'metabrasa_url',TRUE);
						$metabrasa_url = filter_var($metabrasa_url, FILTER_SANITIZE_URL);
						?>

						<?php if (empty($metabrasa_url)) {
						} else { ?>
							<a href="<?php echo $metabrasa_url; ?>" target="_blank">
								<div id="box-single">
									<span>Acesse!</span>
								</div><!-- #box-single -->
							</a>
						<?php }	?>

						<div id="hack-100"></div>

					</div><!-- .entry-content -->

					<div id="editar-single">
						<?php edit_post_link( __( 'Editar', 'portfoliopress' ), '<span class="edit-link">', '</span>' ); ?>
					</div>

				</article><!-- #post-<?php the_ID(); ?> -->

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #coluna-direita -->

<?php get_footer('portfolio'); ?>
