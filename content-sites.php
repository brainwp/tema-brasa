<?php
//content sites
$opts = get_option('brasa_infos_geral');
?>
<li>
	<a href="<?php echo home_url(); ?>"><?php bloginfo('name') ?></a>
	<?php if(!empty($opts) && !empty($opts['brasa_infos_show']) && $opts['brasa_infos_show'] != 0): ?>
	<ul class="sites_info">
		<li><b>Email: <?php echo $opts['brasa_infos_email'];?></b></li>
		<li><b>Telefone: <?php echo $opts['brasa_infos_tel'];?> </b></li>
	</ul><!-- .sites_info -->
<?php endif; ?>
</li>
<!-- #sites -->
