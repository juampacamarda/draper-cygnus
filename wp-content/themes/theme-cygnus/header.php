<!doctype html>
<html <?php language_attributes(); ?> >
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
       
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">
        <?php if ( get_field( 'codigo_cookies', 'option' ) ) { ?>
            <?php the_field('codigo_cookies', 'option'); ?>
        <?php } ?>
        <?php if ( get_field( 'fb_pixel', 'option' ) ) { ?>
            <?php the_field('fb_pixel', 'option'); ?>
        <?php } ?>
        <?php if ( get_field( 'google_analytics', 'option' ) ) { ?>
            <?php the_field('google_analytics', 'option'); ?>
        <?php } ?>
		<?php wp_head(); ?>
		

	</head>
	<body <?php body_class() ?>>
<div class="site-container">
    <header>
        <div class="container">
            <nav id="menu-theme" class="navbar navbar-expand-lg navbar-light">
                <div class="navbar-brand">
                    <?php
                        // Display the Custom Logo
                        the_custom_logo();

                        // No Custom Logo, just display the site's name
                        if (!has_custom_logo()) {
                            ?>
                        <a href="<?php bloginfo('url'); ?>">
                        <h1><?php echo get_bloginfo( 'name' ); ?></h1> </a>
                    <?php  }else{?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" class="img-fluid"/>
                    <?php } ?>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
                aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <div class="row">
                        
                    
                        <!--menu dinamico-->
                        <?php wp_nav_menu(array(
                        'theme_location' => 'superior',
                        'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
                        'container' =>'div',
                        'container_class' => 'collapse navbar-collapse justify-content-center',
                        'container_id' => 'navbarTogglerDemo02',
                        'menu_class' => 'navbar-nav mt-2 mt-lg-0',
                        'fallback_cb'  => 'WP_Bootstrap_Navwalker::fallback',
                        'walker' =>  new WP_Bootstrap_Navwalker(),
                        ) ); ?>
                        <!--menu dinamico-->

                    </div>
                    
                </div>
            </nav>
        </div>
    </header>
<!--FIN HEADER EMPIEZA CONTENIDO-->