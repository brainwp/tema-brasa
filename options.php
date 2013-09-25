<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 * 
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = wp_get_theme(get_stylesheet_directory() . '/style.css');
	$themename = $themename['Name'];
	$themename = preg_replace("/\W/", "", strtolower($themename) );
	$themename = 'Brasilico';
	
	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);
	
	 echo $themename;
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the "id" fields, make sure to use all lowercase and no spaces.
 *  
 */

function optionsframework_options() {
	
	// Test data
	$test_array = array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five");
	
	// Multicheck Array
	$multicheck_array = array("one" => "French Toast", "two" => "Pancake", "three" => "Omelette", "four" => "Crepe", "five" => "Waffle");
	
	// Multicheck Defaults
	$slider_array = array("on" => "on","off" => "off");
	
	
	// Pull all the categories into an array
	$options_categories = array();  
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
    	$options_categories[$category->cat_ID] = $category->cat_name;
	}
	
	// Pull all the pages into an array
	$options_pages = array();  
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
    	$options_pages[$page->ID] = $page->post_title;
	}
		
	// If using image radio buttons, define a directory path
	$imagepath =  get_stylesheet_directory_uri() . '/images/';
		
	$options = array();
		
	$options[] = array( "name" => "Home",
						"type" => "heading");
						
	$options[] = array( "name" => "Texto de Boas Vindas",
						"desc" => "Conteudo do texto de boas vindas do seu site.",
						"id" => "welcome_text",
						"std" => "",
						"type" => "textarea");
						
	$options[] = array( "name" => "Texto do Botao de Boas Vindas",
						"desc" => "Texto do Botao de Boas Vindas.",
						"id" => "welcome_button",
						"std" => "",
						"type" => "text");
						
	$options[] = array( "name" => "Link do Botao de Boas Vindas",
						"desc" => "URL do link ao qual o link levará o internauta",
						"id" => "welcome_button_link",
						"std" => "",
						"type" => "text");															 	$options[] = array(		'name' => __('Destaque Box 01', 'options_framework_theme'),		'desc' => __('Selecione o Destaque do primeiro Box da Home', 'options_framework_theme'),		'id' => 'select_page_box1',		'type' => 'select',		'options' => $options_pages);			$options[] = array(		'name' => __('Destaque Box 02', 'options_framework_theme'),		'desc' => __('Selecione o Destaque do primeiro Box da Home', 'options_framework_theme'),		'id' => 'select_page_box2',		'type' => 'select',		'options' => $options_pages);					$options[] = array(		'name' => __('Destaque Box 03', 'options_framework_theme'),		'desc' => __('Selecione o Destaque do primeiro Box da Home', 'options_framework_theme'),		'id' => 'select_page_box3',		'type' => 'select',		'options' => $options_pages);
						
	$options[] = array( "name" => "Upload de Imagens",
						"type" => "heading");
						
	$options[] = array( "name" => "Logo",
						"desc" => "Suba a imagem de seu logo aqui. o tamanho dela é absoluto, vc precisa subir do tamanho que quer ver na tela.",
						"id" => "logo_image",
						"type" => "upload");
		$options[] = array( "name" => "Logo Rodape",						"desc" => "Suba a imagem de seu logo que fica no rodape aqui. o tamanho dela é absoluto, vc precisa subir do tamanho que quer ver na tela.",						"id" => "footer_logo_image",						"type" => "upload");	
	$options[] = array( "name" => "Favicon image",
						"desc" => "Upload your favicon image over here or enter url.",
						"id" => "favicon_image",
						"type" => "upload");
						
	$options[] = array( "name" => "Blog Settings",
						"type" => "heading");
						
	$options[] = array( "name" => "Blog Exclude Categories",
						"desc" => "Specify a comma seperated list of category IDs (eg: 1,4,8) or slugs that you would like to exclude from your blog page (eg: uncategorized).",
						"id" => "exclude_cat",
						"std" => "",						
						"type" => "text");												
						
	$options[] = array( "name" => "Infos Rodape",
						"type" => "heading");
						
	$options[] = array( "name" => "Texto do Rodape",
						"desc" => "Enter your company name here.",
						"id" => "footer_cr",
						"std" => "",
						"type" => "text");	
						
	$options[] = array( "name" => "Google Analytics Code",
						"desc" => "You can paste your Google Analytics or other tracking code in this box.",
						"id" => "go_code",
						"std" => "",
						"type" => "textarea");
						
	$options[] = array( "name" => "Youtube URL",
						"desc" => "Insert your Youtube URL here.",
						"id" => "footer_youtube",
						"std" => "",
						"type" => "text");

	$options[] = array( "name" => "Twitter",
						"desc" => "Insert your link to the twitter page here.",
						"id" => "footer_twitter",
						"std" => "",
						"type" => "text");
						
	$options[] = array( "name" => "Facebook",
						"desc" => "Insert your link to the facebook page here.",
						"id" => "footer_facebook",
						"std" => "",
						"type" => "text");
						
	$options[] = array( "name" => "CSS Customizado",
						"type" => "heading");
						
	$options[] = array( "name" => "CSS Customizado",
						"desc" => "Adicione css aqui para modificar o tema ao invés de adicionar no style.css ou estilo.css.",
						"id" => "custom_css",
						"std" => "",
						"type" => "textarea");																			
	return $options;			}