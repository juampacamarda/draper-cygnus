<div class="row">
  <div class="contenido-posts col-12 col-md-6"> 
    <?php get_template_part('assets/inc/home/carousel-portfolio');?>
  </div>
  <div class=" col-12 col-md-6 d-flex flex-column justify-content-center align-items-center">
    <div class="texto">
      <h2 class="d-none d-lg-block"><?php the_field( 'titulo_companies' ); ?></h2>
      <h3 class="d-block d-lg-none"><?php the_field( 'titulo_companies' ); ?></h3>
      <p><?php the_field( 'frase_companies' ); ?></p>
      <?php $enlace_portfolio = get_field( 'enlace_portfolio' ); ?>
      <?php if ( $enlace_portfolio ) : ?>
      <a href="<?php echo esc_url( $enlace_portfolio) ; ?>" class="enlace">See all companies</a>
      <?php endif; ?>
    </div>
  </div>
</div>