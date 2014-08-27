<?php

/*
Classe MetaBrasa para criação de MetaBox's
Versão 0.1
*/

$prefixo = 'metabrasa_';

$meta_box = array(
	'id' => 'metabox-metabrasa',
	// Título do MetaBox
	'title' => 'Informa&ccedil;&otilde;es do Projeto',
	// Tipo de Post a usar os MetaBox's
	'page' => 'portfolio',
	'context' => 'side',
	'priority' => 'default',
	// Campos
	'fields' => array(
		array(
		'name' => 'URL do Projeto',
		'desc' => 'Adicione a URL do Projeto',
		'id' => $prefixo . 'url',
		'type' => 'text',
		'std' => ''
		),
	)
);


// Adiciona os MetaBox's (MetaBrasa)	
add_action('admin_menu', 'add_metabrasa');

function add_metabrasa() {
    global $meta_box;
    add_meta_box(
		$meta_box['id'],
		$meta_box['title'], 
		'show_metabrasa',
		$meta_box['page'],
		$meta_box['context'],
		$meta_box['priority']);
}
	
	
// Mostra os MetaBox's (MetaBrasa)
function show_metabrasa() {
    global $meta_box, $post;
    // Use nonce for verification
    echo '<input type="hidden" name="metabrasa_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';

	// Inicia a tabela
	echo '<table class="metabrasa-table">';
    foreach ($meta_box['fields'] as $field) {
    // get current post meta data
    $meta = get_post_meta($post->ID, $field['id'], true);
    
	// Inicia o tr
	echo '<tr>',
    '<th style="width:20%"><label for="', $field['id'], '">', $field['name'], '</label></th></tr>',
    '<td>';
    switch ($field['type']) {
    case 'text':
    echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" size="30" style="width:97%" />', '<br />', '<span class="metabrasa-table-desc">', $field['desc'], '</span>';
    break;
    case 'textarea':
    echo '<textarea name="', $field['id'], '" id="', $field['id'], '" cols="60" rows="4" style="width:97%">', $meta ? $meta : $field['std'], '</textarea>', '<br />', $field['desc'];
    break;
    case 'select':
    echo '<select name="', $field['id'], '" id="', $field['id'], '">';
    foreach ($field['options'] as $option) {
    echo '<option ', $meta == $option ? ' selected="selected"' : '', '>', $option, '</option>';
    }
    echo '</select>';
    break;
    case 'radio':
    foreach ($field['options'] as $option) {
    echo '<input type="radio" name="', $field['id'], '" value="', $option['value'], '"', $meta == $option['value'] ? ' checked="checked"' : '', ' />', $option['name'];
    }
    break;
    case 'checkbox':
    echo '<input type="checkbox" name="', $field['id'], '" id="', $field['id'], '"', $meta ? ' checked="checked"' : '', ' />';
    break;
    }
    echo '</td>',
    '</tr>';
    }
    // Fecha a tabela
	echo '</table><!-- .metabrasa-table -->';
    }
	
	add_action('save_post', 'save_metabrasa');
    // Save data from meta box
    function save_metabrasa($post_id) {
    global $meta_box;
	

	
    // verify nonce
    if (!wp_verify_nonce($_POST['metabrasa_nonce'], basename(__FILE__))) {
    return $post_id;
    }
    // Checa se AutoSave está ativo e o ignora
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return $post_id;
    }
    // Checa as Permissões do Usuário
    if ('page' == $_POST['post_type']) {
    if (!current_user_can('edit_page', $post_id)) {
    return $post_id;
    }
    } elseif (!current_user_can('edit_post', $post_id)) {
    return $post_id;
    }
    
	foreach ($meta_box['fields'] as $field) {
    $old = get_post_meta($post_id, $field['id'], true);
    $new = $_POST[$field['id']];
    if ($new && $new != $old) {
    update_post_meta($post_id, $field['id'], $new);
    } elseif ('' == $new && $old) {
    delete_post_meta($post_id, $field['id'], $old);
    }
    }
    }

 /**
 * Adiciona CSS
 */
function estilo_metrabrasa() {
	wp_enqueue_style(
		'metaboxes-estilo',
		get_bloginfo('stylesheet_directory') . '/metaboxes-estilo.css'
	);
}
add_action('admin_print_styles-post-new.php', 'estilo_metrabrasa');
add_action('admin_print_styles-post.php', 'estilo_metrabrasa');

?>