<?php

$themename = "Op&ccedil;&otilde;es";
$shortname = "mo";

/** Caminho para o �cone do menu */
$icone = get_bloginfo('stylesheet_directory').'/options/images/icone.png';

$categories = get_categories('hide_empty=0&orderby=name');
$wp_cats = array();
foreach ($categories as $category_list ) {
       $wp_cats[$category_list->cat_ID] = $category_list->cat_name;
}

array_unshift($wp_cats, "Choose a category"); 

/** In�cio das opcoes do formul�rio */
$options = array (

array( "name" => $themename." Options",
	"type" => "title"),

/** In�cio Toggle Informa��es do Rodap� */ 
 
array( "name" => "Informa&ccedil;&otilde;es do Rodap&eacute;",
	"type" => "section"),
array( "type" => "open"),
 

array( "name" => "Licen&ccedil;a",
	"desc" => "Adicione a Licen&ccedil;a de uso do conte&uacute;do do site",
	"id" => $shortname."_licenca",
	"type" => "text",
	"std" => ""),
	
array( "name" => "Frase",
	"desc" => "Adicione o Slogan da Empresa",
	"id" => $shortname."_frase",
	"type" => "text",
	"std" => ""),	
	
	array( "type" => "close"),
	
	/** Fim Toggle Rodap� */
 
);


function mytheme_add_admin() {
 
global $themename, $shortname, $options, $icone;
 
if ( $_GET['page'] == basename(__FILE__) ) {
 
	if ( 'save' == $_REQUEST['action'] ) {
 
		foreach ($options as $value) {
		update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }
 
foreach ($options as $value) {
	if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }
 
	header("Location: admin.php?page=admin_options.php&saved=true");
die;
 
} 
else if( 'reset' == $_REQUEST['action'] ) {
 
	foreach ($options as $value) {
		delete_option( $value['id'] ); }
 
	header("Location: admin.php?page=admin_options.php&reset=true");
die;
 
}
}

add_menu_page($themename, $themename, 'delete_pages', basename(__FILE__), 'mytheme_admin', $icone, 3);
}

function mytheme_add_init() {

$file_dir=get_bloginfo('stylesheet_directory');
wp_enqueue_style("functions", $file_dir."/options/functions.css", false, "1.0", "all");
wp_enqueue_script("rm_script", $file_dir."/options/rm_script.js", false, "1.0");

}
function mytheme_admin() {
 
global $themename, $shortname, $options;
$i=0;
 
if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' salvas.</strong></p></div>';
if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' resetadas.</strong></p></div>';
 
?>
<div class="wrap rm_wrap">
<h2><?php echo $themename; ?> <?php bloginfo( 'blog_name' ); ?></h2>
 
<div class="rm_opts">
<form method="post">
<?php foreach ($options as $value) {
switch ( $value['type'] ) {
 
case "open":
?>
 
<?php break;
 
case "close":
?>
 
</div>
</div>
<br />

 
<?php break;
 
case "title":
?>
<p>Use <?php echo $themename;?> para configurar algumas partes do seu tema.</p>
 
<?php break;
 
case 'text':
?>

<div class="rm_input rm_text">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
 	<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'])  ); } else { echo $value['std']; } ?>" />
 <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
 
 </div>
<?php
break;
 
case 'textarea':
?>

<div class="rm_input rm_textarea">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
 	<textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id']) ); } else { echo $value['std']; } ?></textarea>
 <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
 
 </div>
  
<?php
break;
 
case 'page':
?>

<div class="rm_input rm_select">
<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
<option><?php echo attribute_escape('Selecione um Destaque'); ?></option>
<?php
$paginas = get_pages(); 
foreach ($paginas as $pagina) { ?>
<option <?php if (get_settings( $value['id'] ) == $pagina->post_name) { echo 'selected="selected"'; } ?>><?php echo $pagina->post_name; ?></option><?php } ?>
</select>

	<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
</div>
<?php
break;
 
case "checkbox":
?>

<div class="rm_input rm_checkbox">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
	
<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />


	<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
 </div>
<?php break; 

case "drop":
?>

<div class="rm_input rm_ajuda">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
	
<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>


	<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
 </div>
<?php break; 

case "section":

$i++;

?>

<div class="rm_section">
<div class="rm_title"><h3><img src="<?php bloginfo('stylesheet_directory')?>/options/images/trans.png" class="inactive" alt="""><?php echo $value['name']; ?></h3><span class="submit"><input name="save<?php echo $i; ?>" class="button-primary" type="submit" value="Salvar Altera&ccedil;&otilde;es" />
</span><div class="clearfix"></div></div>
<div class="rm_options">

 
<?php break;
 
}
}
?>
 
<input type="hidden" name="action" value="save" />
</form>
<form method="post">
    <p class="submit">Se precisar deletar todos os dados, 
    <input class="reset" name="reset" type="submit" value="clique aqui" />
    <input type="hidden" name="action" value="reset" />
    .
    </p>
</form>
</div> 
 

<?php
}
?>
<?php
add_action('admin_init', 'mytheme_add_init');
add_action('admin_menu', 'mytheme_add_admin');
?>