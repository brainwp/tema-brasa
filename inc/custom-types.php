<?php
/*
* Register post types
*/
// Register Custom Post Type
function custom_post_type() {

	$labels = array(
		'name'                => _x( 'Equipe', 'Post Type General Name', 'tema-brasa' ),
		'singular_name'       => _x( 'Equipe', 'Post Type Singular Name', 'tema-brasa' ),
		'menu_name'           => __( 'Equipe', 'tema-brasa' ),
		'parent_item_colon'   => __( 'Item parente', 'tema-brasa' ),
		'all_items'           => __( 'Todos membros', 'tema-brasa' ),
		'view_item'           => __( 'Ver membro', 'tema-brasa' ),
		'add_new_item'        => __( 'Adicionar novo membro', 'tema-brasa' ),
		'add_new'             => __( 'Adicionar novo', 'tema-brasa' ),
		'edit_item'           => __( 'Editar item', 'tema-brasa' ),
		'update_item'         => __( 'Atualizar item', 'tema-brasa' ),
		'search_items'        => __( 'Buscar membro', 'tema-brasa' ),
		'not_found'           => __( 'Não encontrado', 'tema-brasa' ),
		'not_found_in_trash'  => __( 'Não encontrado na lixeira', 'tema-brasa' ),
	);
	$args = array(
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-groups',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'equipe', $args );

}

// Hook into the 'init' action
add_action( 'init', 'custom_post_type', 0 );