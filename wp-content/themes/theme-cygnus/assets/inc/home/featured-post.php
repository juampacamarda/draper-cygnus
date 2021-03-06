<div class="row">
  <div class=" col-12 col-md-6 d-flex flex-column justify-content-center align-items-center">
    <div class="texto">
      <h2 class="d-none d-lg-block"><?php the_field( 'titulo_entrada_destacada' ); ?></h2>
      <h3 class="d-block d-lg-none"><?php the_field( 'titulo_entrada_destacada' ); ?></h3>
      <p><?php the_field( 'texto_entrada_destacada' ); ?></p>
      <?php $enlace = get_field( 'enlace' ); ?>
      <?php if ( $enlace ) : ?>
      <a href="<?php echo esc_url( $enlace) ; ?>" class="enlace">Read our thesis</a>
      <?php endif; ?>
    </div>
  </div>
  <div class="contenido-posts col-12 col-md-6"> 
    <div class="imagen-post"  <?php if( get_field( 'imagen_de_entrada_destacada' ) ): ?> style="background-image:url('<?php the_field( 'imagen_de_entrada_destacada' ); ?>')"<?php endif; ?>>
    </div>
  </div>
</div>