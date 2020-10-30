<div class="row">
  <div class="contenido-posts col-12 col-md-6"> 
    <?php get_template_part('assets/inc/home/carousel-portfolio');?>
  </div>
  <div class=" col-12 col-md-6 d-flex flex-column justify-content-center align-items-center">
    <div class="texto">
      <h2 class="d-none d-lg-block"><?php the_field( 'titulo_companies' ); ?></h2>
      <h3 class="d-block d-lg-none"><?php the_field( 'titulo_companies' ); ?></h3>
      <p><?php the_field( 'frase_companies' ); ?></p>
      <a href="" class="enlace">See all companies</a>
    </div>
  </div>
</div>