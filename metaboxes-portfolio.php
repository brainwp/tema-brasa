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
$team_metabox = new Odin_Metabox(
	'team_metabox', // Slug/ID do Metabox (obrigatório)
	'Team', // Nome do Metabox  (obrigatório)
	'equipe', // Slug do Post Type, sendo possível enviar apenas um valor ou um array com vários (opcional)
	'normal', // Contexto (opções: normal, advanced, ou side) (opcional)
	'high' // Prioridade (opções: high, core, default ou low) (opcional)
);
$team_metabox->set_fields(
	array(
		array(
			'id'          => 'team_position',
			'label'       => 'Cargo',
			'type'        => 'text',
			'description' => ''
		),
		array(
			'id'          => 'team_phone',
			'label'       => 'Telefone',
			'type'        => 'text',
			'description' => ''
		),
		array(
			'id'          => 'team_email',
			'label'       => 'E-mail',
			'type'        => 'text',
			'description' => ''
		),
		array(
			'id'          => 'team_twitter',
			'label'       => 'Twitter',
			'type'        => 'text',
			'description' => ''
		),
		array(
			'id'          => 'team_linkedin',
			'label'       => 'Linkedin',
			'type'        => 'text',
			'description' => ''
		),
		array(
			'id'          => 'team_github',
			'label'       => 'Github',
			'type'        => 'text',
			'description' => ''
		),
		array(
			'id'          => 'team_blog',
			'label'       => __('Posts no blog','tema-brasa'),
			'type'        => 'text',
			'description' => ''
		),
		array(
			'id'          => 'team_wporg',
			'label'       => __('Conta no WordPress.org','tema-brasa'),
			'type'        => 'text',
			'description' => ''
		),
	)
);
?>