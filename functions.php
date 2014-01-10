<?php

// Adiciona Minhas Opções
 require_once (get_stylesheet_directory() . '/options/admin_options.php');

// Adiciona a função the_excerpt às Páginas
add_post_type_support( 'page', 'excerpt' );

/* Redefine the header image width and height ********************************************/
define( 'HEADER_IMAGE_WIDTH', apply_filters( 'twentyten_header_image_width', 460 ) );
define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'twentyten_header_image_height', 290 ) );

// Remove o MetaBox Format dos Posts
add_action( 'admin_menu', 'remove_meta_boxes' );
function remove_meta_boxes() {
    remove_meta_box( 'formatdiv', 'post', 'normal' ); // Post format meta box
}

//include new jQuery

function my_scripts_method() {
wp_deregister_script( 'jquery' );
wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js');
wp_enqueue_script('jquery');
wp_enqueue_script( 'mobile-nav', get_stylesheet_directory_uri() . '/js/mobile_nav.js', array('jquery'));
}

add_action('wp_enqueue_scripts', 'my_scripts_method');

?>
