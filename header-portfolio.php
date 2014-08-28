<?php
/**
 * Header template
 *
 * @package Portfolio Press
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic,700italic' rel='stylesheet' type='text/css'>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_stylesheet_uri(); ?>" />
<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="wrapper">
	<div id="main">
    
    <div id="coluna-esquerda">
    <hgroup id="logo">
        <a href="<?php echo network_home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
            <img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/logo-brasa.png" alt="<?php echo bloginfo( 'name' ) ?>" />
        </a>
    </hgroup>
          
    <div id="menu-brasa">
        <ul>
            <?php
			$classe_design = null;
			$classe_web = null;
			$classe_cultura = null;
           // $wpurl = get_bloginfo ('wpurl');
         
            if ( is_tax('jetpack-portfolio-type','design') !== false || has_term('design','jetpack-portfolio-type')) {
                $classe_design = ' atual-design';
            }
            if ( is_tax('jetpack-portfolio-type','web') !== false || has_term('web','jetpack-portfolio-type')) {
	            $classe_web = ' atual-web';
            }
            if ( is_tax('jetpack-portfolio-type','cultura') !== false || has_term('cultura','jetpack-portfolio-type')) {
	            $classe_cultura = ' atual-cultura';
            }
             ?>
            <li class="menu-web<?php echo $classe_web; ?>"><a href="<?php bloginfo('url'); ?>/project-type/web">Web</a></li>
			<li class="menu-design<?php echo $classe_design; ?>"><a href="<?php bloginfo('url'); ?>/project-type/design">Design</a></li>
            <li class="menu-cultura<?php echo $classe_cultura; ?>"><a href="<?php bloginfo('url'); ?>/project-type/cultura">Cultura</a></li>
        </ul>
    </div><!-- #menu-brasa -->
    
    <nav id="navigation">
    
        <h3 class="menu-toggle"><?php _e( 'Menu', 'portfoliopress' ); ?></h3>    
        <?php wp_nav_menu( array( 'theme_location' => 'primary') ); ?>
    </nav><!-- #access -->
</div><!-- #coluna-esquerda -->