<?php
/*
Template Name: inicio-plantilla
*/
?>
<?php get_header(light); ?>

<main class="site-content">
  <section class="homeportada" <?php if( get_field('foto_portada') ): ?> style="background-image:url('<?php the_field('foto_portada'); ?>')"<?php endif; ?>>
    
      <h3><?php the_field( 'texto_naranja' ); ?></h3>
      <h1><?php the_field( 'frase_pagina' ); ?></h1>
      <div class="boton">
        <a class="btn-scroll" href="#companies"><i class="fas fa-arrow-down"></i></a>
      </div>
    
  </section>
  <section id="companies">
    <div class="row">
      <div id="portfolio-carousel" class="col-12 col-md-6"> 
        <?php 
        $args = array('post_type' => 'portfolio','posts_per_page' => 9,'orderby' => 'menu_order',);
        $query = new WP_query ( $args );
        if ( $query->have_posts() ) { ?>
          <div class="owl-carousel">
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            <article <?php post_class('startup'); ?>>
              <?php if ( get_field( 'imagen-portada' ) ) : ?>
              <div class="imagen-startup" <?php post_class('startup'); ?> style="background-image:url('<?php the_field( 'imagen-portada' ); ?>')">
              </div>
              <?php else: ?>
              <div class="imagen-startup" style="background-image:url('<?php echo get_template_directory_uri(); ?>/assets/img/default-cygnus.png' )">
              </div>
              <?php endif; ?>
              <div class="startup-title">
                <a href="<?php the_permalink(); ?>">
                  <?php if ( get_field( 'logo' ) ) : ?>
                    <img src="<?php the_field( 'logo' ); ?>" class="img-fluid d-block"/>
                  <?php else: ?>
                    <h3><?php the_title(); ?></h3>
                  <?php endif ?>
                  <p><small><?php the_field( 'bajada_foto' ); ?></small></p>
                </a>
              </div>
            </article>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
          </div> 
        <?php } ?>
      </div>
      <div class=" col-12 col-md-6 d-flex flex-column justify-content-center align-items-center">
        <div class="texto">
          <h2>text text text</h2>
          <p>frase frase frase</p>
          <a href="" class="enlace">Enlace</a>
        </div>
      </div>
    </div>
  </section>
  <section>
    <div class="row">
      <div class=" col-12 col-md-6 d-flex flex-column justify-content-center align-items-center">
        <div class="texto">
          <h2>text text text</h2>
          <p>frase frase frase</p>
          <a href="" class="enlace">Enlace</a>
        </div>
      </div>
      <div id="portfolio-carousel" class="col-12 col-md-6"> 
       <div class="imagen-blog"></div>
      </div>
    </div>
  </section>
  <?php get_template_part('assets/inc/news');?>
</main>
<?php get_footer(form); ?>