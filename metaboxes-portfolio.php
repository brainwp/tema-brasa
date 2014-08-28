<?php
require_once get_template_directory() . '/inc/class-metabox.php';
$portfolio_metabox = new Odin_Metabox(
	'metabrasa_portfolio', // Slug/ID do Metabox (obrigatório)
	'Portfolio', // Nome do Metabox  (obrigatório)
	'jetpack-portfolio', // Slug do Post Type, sendo possível enviar apenas um valor ou um array com vários (opcional)
	'normal', // Contexto (opções: normal, advanced, ou side) (opcional)
	'high' // Prioridade (opções: high, core, default ou low) (opcional)
);
$portfolio_metabox->set_fields(
	array(
		array(
			'id'          => 'metabrasa_url',
			'label'       => 'URL do projeto',
			'type'        => 'text',
			'description' => ''
		)
	)
);

?>