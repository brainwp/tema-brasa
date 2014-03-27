<?php

// Adiciona Minhas Opções
 require_once (get_stylesheet_directory() . '/options/admin_options.php');

// Adiciona a função the_excerpt às Páginas
add_post_type_support( 'page', 'excerpt' );

add_theme_support( 'post-thumbnails' );


	// Make Tema Brasa available for translation. Translations can be added to the /languages/ directory.
	load_theme_textdomain( 'tema_brasa', get_template_directory() . '/languages' );

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Grab Twenty Eleven's Ephemera widget.
	require( get_template_directory() . '/inc/widgets.php' );

	//Add support for a custom header image.
	require( get_template_directory() . '/inc/custom-header.php' );


	//Load Jetpack compatibility file.
	require get_template_directory() . '/inc/jetpack.php';


	// Add default posts and comments RSS feed links to <head>.
	add_theme_support( 'automatic-feed-links' );


	// Add support for a variety of post formats
	// add_theme_support( 'post-formats', array( 'aside', 'link', 'gallery', 'status', 'quote', 'image' ) );

	// This theme supports custom background color and image, and here we also set up the default background color.
	//add_theme_support( 'custom-background', array(
		//'default-color' => 'e6e6e6',
	//) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Primary Menu', 'tema_brasa' ) );


/* Redefine the header image width and height ********************************************/
define( 'HEADER_IMAGE_WIDTH', apply_filters( 'twentytwelve_header_image_width', 460 ) );
define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'twentywelve_header_image_height', 290 ) );

// Register sidebars and widgetized areas.

function tema_brasa_widgets_init() {


	register_sidebar( array(
		'name' => __( 'Barra Lateral Principal', 'tema_brasa' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Barra Lateral da Showcase', 'tema_brasa' ),
		'id' => 'sidebar-2',
		'description' => __( 'The sidebar for the optional Showcase Template', 'twentyeleven' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Primeira Area do Rodape', 'tema_brasa' ),
		'id' => 'sidebar-3',
		'description' => __( 'An optional widget area for your site footer', 'twentyeleven' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Segunda Area do Rodape', 'tema_brasa' ),
		'id' => 'sidebar-4',
		'description' => __( 'An optional widget area for your site footer', 'twentyeleven' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Terceira Area do Rodape', 'tema_brasa' ),
		'id' => 'sidebar-5',
		'description' => __( 'An optional widget area for your site footer', 'twentyeleven' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'tema_brasa_widgets_init' );


/**
 * Add two classes to the array of body classes.
 *
 * The first is if the site has only had one author with published posts.
 * The second is if a singular post being displayed
 *
 * @since Twenty Eleven 1.0
 *
 * @param array $classes Existing body classes.
 * @return array The filtered array of body classes.
 */
function twentyeleven_body_classes( $classes ) {

	if ( function_exists( 'is_multi_author' ) && ! is_multi_author() )
		$classes[] = 'single-author';

	if ( is_singular() && ! is_home() && ! is_page_template( 'showcase.php' ) && ! is_page_template( 'sidebar-page.php' ) )
		$classes[] = 'singular';

	return $classes;
}
add_filter( 'body_class', 'twentyeleven_body_classes' );


//include new jQuery

function my_scripts_method() {
wp_deregister_script( 'jquery' );
wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js');
wp_enqueue_script('jquery');
wp_enqueue_script( 'mobile-nav', get_stylesheet_directory_uri() . '/js/mobile_nav.js', array('jquery'));
// Chamando o LigthBox Magnific!
wp_enqueue_script( 'jquery.magnific-popup', get_stylesheet_directory_uri() . '/js/jquery.magnific-popup.js', array('jquery'), '', true );
wp_enqueue_style( 'magnific-popup', get_stylesheet_directory_uri() . '/js/magnific-popup.css' );
}

add_action('wp_enqueue_scripts', 'my_scripts_method');

// Acabaram as coisas do Tema Brasa especificamente

// Remove notificações de update do WP para usuários abaixo do Administrador
global $user_login;
get_currentuserinfo();
if (!current_user_can('update_plugins')) { // checks to see if current user can update plugins
add_action( 'init', create_function( '$a', "remove_action( 'init', 'wp_version_check' );" ), 2 );
add_filter( 'pre_option_update_core', create_function( '$a', "return null;" ) );
}

// Remove o Item Editar do menu Aparência
function remove_editor_menu() {
  remove_action('admin_menu', '_add_themes_utility_last', 101);
}

add_action('_admin_menu', 'remove_editor_menu', 1);

// Custom login
function my_custom_login_logo() {
    echo '<style type="text/css">
        h1 a { background:url('.get_bloginfo('stylesheet_directory').'/images/logo-medio.png) no-repeat scroll center top !important; 
                height: 180px !important; width: 235px !important;  margin-top: -40px !important;  margin-left: 55px !important;
                overflow: hidden;
                }
                body { background-image:url('.get_bloginfo('stylesheet_directory').'/images/bg-2000-1250.jpg) !important; }
                #login { padding: 70px 0 0; }
                
    </style>';
}

add_action('login_head', 'my_custom_login_logo');

// Remove Widgets do Wp-Admin
function remove_dashboard_widgets() {
        global $wp_meta_boxes;

        unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
        unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
        unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);

}

add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );

?>
