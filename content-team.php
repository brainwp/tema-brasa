<?php
/* 
* Content equipe
*/
global $post;
$thumb_src = null;
if ( has_post_thumbnail($post->ID) ) {
	$src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' );
	$thumb_src = $src[0];
}
?>
	<article class="col-sm-6 profile">
		<div class="profile-header">
			<?php if ( $thumb_src ): ?>
			<img src="<?php echo $thumb_src; ?>" alt="<?php the_title(); ?>" class="img-circle">
			<?php endif; ?>
		</div>
		
		<div class="profile-content">
			<h3><?php the_title(); ?></h3>
			<p class="lead position"><?php the_field('team_position'); ?></p>
			<?php the_content(); ?>
		</div>
		
		<div class="profile-footer">
			<a href="tel:<?php the_field('team_phone'); ?>"><i class="genericon genericon-handset"></i></a>
			<a href="mailto:<?php echo antispambot( get_field('team_email') ); ?>"><i class="genericon genericon-mail"></i></a>
			<?php if ( $twitter = get_field('team_twitter') ): ?>
			<a href="<?php echo $twitter; ?>"><i class="genericon genereicon-twitter"></i></a>
			<?php endif; ?>
			<?php if ( $linkedin = get_field('team_linkedin') ): ?>
			<a href="<?php echo $linkedin; ?>"><i class="genericon genericon-linkedin"></i></a>
			<?php endif; ?>
			<?php if ( $github = get_field('team_github') ): ?>
			<a href="<?php echo $github; ?>"><i class="genericon genericon-github"></i></a>
			<?php endif; ?>
		</div>
	</article>
