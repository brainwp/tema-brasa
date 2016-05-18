<?php
/* 
* Content equipe
*/
global $post;
$thumb_src = null;
if ( has_post_thumbnail($post->ID) ) {
	$src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
	$thumb_src = $src[0];
}
?>
	<article class="col-sm-10 profile">
		<div class="profile-header">
			<?php if ( $thumb_src ): ?>
			<img src="<?php echo $thumb_src; ?>" alt="<?php the_title(); ?>" class="img-circle">
			<?php endif; ?>
		</div>
		
		<div class="profile-content">
			<h3><?php the_title(); ?></h3>
			<p class="lead position"><?php the_field('team_position'); ?></p>
			<?php the_content(); ?>
			<?php if ( $blog = get_field('team_blog') ): ?>
			<a class="blog-link" href="<?php echo $blog; ?>">
				<?php _e('Ver posts no blog','tema-brasa');?>
			</a>
		    <?php else: ?>
		    <div class="clear-both"></div><!-- .clear-both -->
			<?php endif; ?>
		</div>
		
		<div class="profile-footer">
			<?php if ( $tel = get_field('team_phone') ): ?>
			<a class="tel-href" href="tel:<?php echo $tel; ?>">
				<i class="genericon genericon-handset"></i>
				<div class="tel-toggle"><?php echo $tel; ?></div><!-- .tel-toggle -->
			</a>
			<?php endif; ?>
			<a href="mailto:<?php echo antispambot( get_field('team_email') ); ?>"><i class="genericon genericon-mail"></i></a>
			<?php if ( $twitter = get_field('team_twitter') ): ?>
			<a href="<?php echo $twitter; ?>"><i class="genericon genericon-twitter-alt"></i></a>
			<?php endif; ?>
			<?php if ( $linkedin = get_field('team_linkedin') ): ?>
			<a href="<?php echo $linkedin; ?>"><i class="genericon genericon-linkedin"></i></a>
			<?php endif; ?>
			<?php if ( $github = get_field('team_github') ): ?>
			<a href="<?php echo $github; ?>"><i class="genericon genericon-github"></i></a>
			<?php endif; ?>
			<?php if ( $wporg = get_field('team_wporg') ): ?>
			<a href="<?php echo $wporg; ?>" title="<?php _e('Perfil no WordPress.org','tema-brasa'); ?>"><i class="genericon genericon-wordpress"></i></a>
			<?php endif; ?>
		</div>
	</article>
