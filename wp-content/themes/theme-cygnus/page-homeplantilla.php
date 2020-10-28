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
  <section id="blog-destacada" class="section-post">
    <?php get_template_part('assets/inc/home/featured-content');?>
  </section>
  <section id="team">
    <div class="container">
      <h2>Investment Team</h2>
      <?php get_template_part('assets/inc/home/carousel-team');?>
    </div>
  </section>
  <?php get_template_part('assets/inc/news');?>
</main>
<?php get_footer(form); ?>