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
  <section id="companies" class="section-post">
    <?php get_template_part('assets/inc/home/companies-content');?>
  </section>
  <section id="blog-destacada" class="section-post post-derecha">
    <?php get_template_part('assets/inc/home/featured-post');?>
  </section>
  <section id="team">
    <div class="container">
      <h2>Investment Team</h2>
      <?php get_template_part('assets/inc/home/carousel-team');?>
    </div>
  </section>
  <section id="tim" class="section-post post-derecha">
    <div class="row">
      <div class=" col-12 col-md-6 d-flex flex-column justify-content-center align-items-center">
        <div class="texto">
          <h2 class="d-none d-lg-block naranjatxt"><?php the_field( 'titulo_Tim' ); ?></h2>
          <h3 class="d-block d-lg-none naranjatxt"><?php the_field( 'titulo_Tim' ); ?></h3>
          <p><?php the_field( 'texto_tim' ); ?></p>
          <div class="logos">
          <?php if( have_rows('logos') ): ?>
            <ul class="nav">
            <?php while( have_rows('logos') ): the_row(); ?>
            <li>
              <a href="<?php the_sub_field('enlace'); ?>">
               <img src="<?php the_sub_field('logo'); ?>" class="img-fluid d-block" alt=""></a>
            </li>
            <?php endwhile; ?>
            </ul>
          <?php endif; ?>
          </div>
          <a href="<?php the_field( 'enlace-tim' ); ?>" class="enlace">an unparalleled legacy</a>
        </div>
      </div>
      <div class="contenido-posts col-12 col-md-6"> 
        <div class="imagen-post"  <?php if( get_field('imagen_de_tim') ): ?> style="background-image:url('<?php the_field('imagen_de_tim'); ?>')"<?php endif; ?>>
          <div class="bajada-img">
            <p><small><?php the_field( 'bajada_foto' ); ?>
            </small></p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php get_template_part('assets/inc/news');?>
</main>
<?php get_footer(form); ?>