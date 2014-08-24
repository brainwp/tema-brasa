<div id="coluna-esquerda">
    <hgroup id="logo">
        <a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
            <img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/logo-brasa.png" alt="<?php echo bloginfo( 'name' ) ?>" />
        </a>
        </<?php echo $heading_tag; ?>>
    </hgroup>
          
    <div id="menu-brasa">
        <ul>
            <?php
            $wpurl = get_bloginfo ('wpurl');
         
            if (strpos($wpurl,'design') !== false) {
                $classe_design = ' class="atual" ';
            }
            if (strpos($wpurl,'web') !== false) {
                $classe_web = ' class="atual" ';
            }
            if (strpos($wpurl,'cultura') !== false) {
                $classe_cultura = ' class="atual" ';
            }
             ?>
            <li <?php echo $classe_web; ?>><a href="http://www.web.brasa.art.br">Web</a></li>
			<li <?php echo $classe_design; ?>><a href="http://www.design.brasa.art.br">Design</a></li>
            <li <?php echo $classe_cultura; ?>><a href="http://www.cultura.brasa.art.br">Cultura</a></li>
        </ul>
    </div><!-- #menu-brasa -->
    
    <nav id="navigation">
    
        <h3 class="menu-toggle"><?php _e( 'Menu', 'portfoliopress' ); ?></h3>
        <div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'portfoliopress' ); ?>"><?php _e( 'Skip to content', 'portfoliopress' ); ?></a></div>
    
        <?php wp_nav_menu( array( 'theme_location' => 'primary') ); ?>
    </nav><!-- #access -->
</div><!-- #coluna-esquerda -->